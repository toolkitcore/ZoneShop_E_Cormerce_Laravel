<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Brand_Product;
use App\Models\Category_Product;
use App\Models\PosterHome;
use App\Models\Product;
use App\Models\Product_Attributes;
use App\Models\Reviews;
use App\Models\SliderHome;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

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
        $slider_home = SliderHome::with('product')->get();
        $poster_home = PosterHome::where('poster_status', '=', 1)->get();
        $feed_back = Reviews::with('user')->take(5)->get();
        $topSellingProducts = DB::table('tbl_transactions')
            ->join('tbl_orders', 'tbl_orders.transaction_id', '=', 'tbl_transactions.transaction_id')
            ->join('tbl_product', 'tbl_orders.product_id', '=', 'tbl_product.product_id')
            ->where('tbl_transactions.transaction_status', '=', 5)
            ->select(
                'tbl_product.product_id',
                'tbl_product.product_image',
                'tbl_product.product_name',
                'tbl_product.product_price_selling',
                'tbl_product.product_price_original',
                DB::raw('SUM(tbl_orders.order_qty) as total_qty')
            )
            ->groupBy(
                'tbl_product.product_id',
                'tbl_product.product_name',
                'tbl_product.product_image',
                'tbl_product.product_price_selling',
                'tbl_product.product_price_original',
            )
            ->orderByDesc('total_qty') // Orders by the total quantity in descending order
            ->get();

        return view(
            'pages.home',
            compact(
                'categories',
                'products',
                'slider_home',
                'poster_home',
                'topSellingProducts',
                'feed_back'
            )
        );
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
        $review_product = Reviews::where('product_id', $product_id)->get();
        $review_product_count = Reviews::where('product_id', $product_id)->count();
        $average_rate = Reviews::where('product_id', $product_id)->avg('rating');

        return view(
            'pages.single_product',
            compact(
                'product',
                'product_related',
                'review_product',
                'review_product_count',
                'average_rate',
            )
        );
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
            ->orderBy('transaction_id', 'desc')
            ->get();

        return view('pages.account.show_account', compact('transaction_list', 'address_default'));
    }
}
