<?php

namespace App\Http\Controllers;

use App\Models\Attributes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Models\Brand_Product;
use App\Models\Category_Product;
use App\Models\Product;
use App\Models\Product_Attributes;
use App\Models\Product_Images;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class DetailProductController extends Controller
{

    public function Show_Detail_Product()
    {

        $products = Product::all();
        $product_count = Product::count();
        $categories = Category_Product::whereNotNull('category_parent_id')->get();
        $brands = Brand_Product::all();

        return view('admin.product.detail.all_detail', compact(
            'products',
            'product_count',
            'categories',
            'brands'
        ));
    }


    public function Add_Detail_Product($product_id)
    {

        $Product = Product::with(['category'])->where('product_id', $product_id)->first();
        if ($Product) {
            $category = Category_Product::with('attributes')->where('category_id', $Product->category_id)->first();
            return view('admin.product.detail.add_detail', compact('category', 'Product'));
        } else {
            return redirect()->back()->with('error', 'Product not found');
        }
    }
    public function Edit_Detail_Product($product_id)
    {

        $Product = Product::with('category', 'productAttributes.attribute')
            ->where('product_id', $product_id)
            ->first();

        if ($Product) {
            $category = Category_Product::with('attributes')
                ->where('category_id', $Product->category_id)
                ->first();
            return view('admin.product.detail.edit_detail', compact('Product', 'category'));
        } else {
            return redirect()->back()->with('error', 'Product not found!');
        }
    }


    public function Edit_Attribute_Product($category_id)
    {

        return view('admin.product.detail.edit_detail');
    }
    public function Add_detail_action(Request $request, $product_id)
    {


        $attributes = $request->input('attribute_values');

        foreach ($attributes as $attributeID => $value) {
            Product_Attributes::create([
                'product_id' => $product_id,
                'attribute_id' => $attributeID,
                'attribute_value' => $value,
            ]);
        }
        Session::flash('success', 'Product details added successfully!');
        return redirect('add-detail-product-page');
    }
    public function Update_Detail_action(Request $request, $product_id)
    {


        $attributes = $request->input('attribute_values');

        foreach ($attributes as $attributeID => $value) {
            Product_Attributes::updateOrCreate(
                [
                    'product_id' => $product_id,
                    'attribute_id' => $attributeID
                ],
                [
                    'attribute_value' => $value
                ]
            );
        }
        Session::flash('success', 'Product details udpated successfully!');
        return redirect('add-detail-product-page');
    }

    public function search(Request $request)
    {

        $output = "";
        $products = Product::where('product_name', 'Like', '%' . $request->search . '%')
            ->orWhere('product_price_selling', 'Like', '%' . $request->search . '%')
            ->get();


        $output = view('components.detail_product', compact('products'))->render();
        return response($output);
    }
    public function search_Navbar(Request $request)
    {
        $products = Product::where('product_name', 'Like', '%' . $request->search . '%')
            ->orWhere('product_price_selling', 'Like', '%' . $request->search . '%')
            ->get();

        $products_count = $products->count();

        $output = view('components.detail_product_search', compact('products'))->render();

        return response()->json([
            'output' => $output,
            'products_count' => $products_count,
        ]);
    }

    public function getData(Request $request)
    {

        // dd($request->all());
        $query = Product::where('product_status', 1);


        if ($request->filled(['minCost', 'maxCost'])) {
            $query->whereBetween('product_price_selling', [
                $request->input('minCost'),
                $request->input('maxCost')
            ]);
        }
        if ($request->has('category')) {
            $query->whereIn('category_id', $request->input('category'));
        }

        if ($request->has('brand')) {
            $query->whereIn('brand_id', $request->input('brand'));
        }

        $products = $query->get();
        $output = view('components.detail_product', compact('products'))->render();

        return response()->json(['output' => $output]); // Trả về JSON
    }
    public function get_all_product(Request $request)
    {
        // dd($request->all());
        $query = Product::where('product_status', 1);


        if ($request->filled(['minCost', 'maxCost'])) {
            $query->whereBetween('product_price_selling', [
                $request->input('minCost'),
                $request->input('maxCost')
            ]);
        }
        if ($request->has('category')) {
            $query->whereIn('category_id', $request->input('category'));
        }

        if ($request->has('brand')) {
            $query->whereIn('brand_id', $request->input('brand'));
        }

        $products = $query->get();
        $output = view('components.product_item', compact('products'))->render();

        return response()->json(['output' => $output]); // Trả về JSON
    }

    public function Product_Details($product_id)
    {

        $product_details = Product_Attributes::where('product_id', $product_id)->with('attribute')->get();
        $product_item = Product::where('product_id', $product_id)->first();
        $product_images = Product_Images::where('product_id', $product_id)->get();
        return view('admin.product.detail.product_details', compact(
            'product_item',
            'product_details',
            'product_images'
        ));
    }
    public function Show_add_detail_product()
    {

        $products = Product::with('productAttributes', 'category', 'brand')->get();
        return view('admin.product.detail.add_page', compact('products'));
    }
}
