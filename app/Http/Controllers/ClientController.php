<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Brand_Product;
use App\Models\Category_Product;
use App\Models\Product;
use App\Models\Product_Attributes;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    // show page About
    public function Show_About()
    {
        return view('pages.about');
    }

    //  Show page Contact
    public function Show_Contact()
    {
        return view('pages.contact');
    }

    // Show page Home
    public function Show_Page_Home()
    {
        $products = Product::with('productImages', 'category')->take(8)->get();
        $categories = Category_Product::whereNotNull('category_parent_id')->get();
        return view('pages.home', compact('categories', 'products'));
    }

    // Show page Product detail
    public function Show_Single_Product($product_id)
    {
        $product = Product::where('product_id', $product_id)
            ->with('productImages', 'category', 'brand', 'productAttributes.attribute')
            ->first();
        if (!$product) {
            Session::flash('error', 'Product not exist!!');
            return redirect()->route('trang-chu')->with('error', 'Sản phẩm không tồn tại.');
        }
        $product_related = Product::where('category_id', $product->category_id)
            ->where('product_id', '!=', $product->product_id)
            ->get();

        return view('pages.single_product', compact('product', 'product_related'));
    }

    // Show page all product
    public function Show_List_Product()
    {
        $products = Product::all();
        $categories = Category_Product::whereNotNull('category_parent_id')->get();
        $brands = Brand_Product::all();
        return view('pages.all_product', compact('products', 'categories', 'brands'));
    }

    // Show page list product category
    public function Show_Category_Product($category_id)
    {
        $products = Product::where('category_id', $category_id)
            ->with('category')
            ->get();
        $category = Category_Product::where('category_id', $category_id)->first();
        return view('pages.all_product_category', compact('products', 'category'));
    }

    // Show page Cart
    public function Show_Cart()
    {
        return view('pages.cart.cart');
    }

    public function Show_Account()
    {
        if (!auth()->check()) {
            Session::flash('warning', 'Please Login !!!');
            return redirect()->route('login');
        }
        $user_id = Auth::user()->id;
        $address_default = Address::where('user_id', $user_id)->first();
        $transaction_list = Transaction::where('user_id', $user_id)
            ->with('orders')
            ->get();

        return view('pages.account.show_account', compact('transaction_list', 'address_default'));
    }
}
