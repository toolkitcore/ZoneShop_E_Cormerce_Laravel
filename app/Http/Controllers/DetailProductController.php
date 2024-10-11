<?php

namespace App\Http\Controllers;

use App\Models\Attributes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Models\Brand_Product;
use App\Models\Category_Product;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class DetailProductController extends Controller
{
    // public function Show_Detail_Product($category_id)
    // {
    //     $category = Category_Product::with('attributes')->where('category_id', $category_id)->first();

    //     return view('admin.product.detail.all_detail', compact('category'));
    // }
    public function Show_Detail_Product()
    {
        $products = Product::all();
        $product_count = Product::count();
        $categories = Category_Product::all();
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

    public function Edit_Attribute_Product($category_id)
    {

        return view('admin.product.detail.edit_detail');
    }
    public function Add_detail_action(Request $request)
    {
        $checklistAttributes = $request->attribute_name;
        if ($checklistAttributes) {
            $result = validateAttributesText($checklistAttributes);
            if (is_string($result)) {
                $data = new Attributes();
                $data->category_id = $request->category_id;
                $data->attribute_name = $result;
                $data->save();
                Session::flash('success', 'Add Attributes Successfully!');
                return redirect('add-attribute-product');
            } else if ($result !== false) {
                foreach ($result as $key) {
                    $data = new Attributes();
                    $data->category_id = $request->category_id;
                    $data->attribute_name = $key;
                    $data->save();
                }
                Session::flash('success', 'Add Attributes Successfully!');
                return redirect('add-attribute-product');
            } else {
                return redirect('add-attribute-product')->withInput(); // Trả về với input đã nhập
            }
        } else {
            Session::flash('error', 'Please provide attributes.');
            return redirect('add-attribute-product')->withInput(); // Trả về với input đã nhập
        }
    }
}
