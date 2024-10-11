<?php

namespace App\Http\Controllers;

use App\Models\Brand_Product;
use App\Models\Category_Product;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function Show_Product()
    {
        $products = Product::with(['brand', 'category'])->paginate(6);

        return view('admin.product.all_product', compact('products'));
    }
    public function Add_Product()
    {
        $Categories = Category_Product::all();
        $Brands = Brand_Product::all();
        return view('admin.product.add_product')
            ->with('categories', $Categories)
            ->with('brands', $Brands);
    }
    public function Add_Product_Action(Request $request)
    {
        // dd($request->all());

        $data = new Product();
        $data->product_name = $request->product_name;
        $data->product_description = $request->product_description;
        $data->product_status = (int)$request->product_status;
        $data->product_quantity = (int)$request->product_quantity;
        $data->product_price_original = $request->product_price_original;
        $data->product_price_selling = $request->product_price_selling;
        $data->category_id = $request->category_id;
        $data->brand_id = $request->brand_id;

        // Xử lý hình ảnh
        $get_image = $request->file('product_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = pathinfo($get_name_image, PATHINFO_FILENAME); // Sử dụng pathinfo để lấy tên file
            $new_image = $name_image . '_' . time() . '.' . $get_image->getClientOriginalExtension(); // Thay đổi random bằng time
            $path = 'public/uploads/product';
            $get_image->move($path, $new_image);
            $data->product_image = $path . '/' . $new_image;
        }
        try {
            $data->save();
            Session::flash('success', 'Add Product Successfully!');
        } catch (\Exception $e) {
            Session::flash('error', 'Failed to add product!');
            return Redirect::back()->withInput(); // Quay lại với input trước đó
        }


        return Redirect::to('add-detail-product/' . $data->product_id);
    }
    public function Set_Active_product($product_id)
    {
        Product::where('product_id', $product_id)->update(['product_status' => 1]);

        Session::flash('success', 'Active the product successfurlly!');
        return Redirect('/all-product');
    }
    public function Set_UnActive_product($product_id)
    {
        Product::where('product_id', $product_id)->update(['product_status' => 0]);

        Session::flash('success', 'UnActive the product successfurlly!');
        return Redirect('/all-product');
    }
    public function Edit_product($product_id)
    {

        $edit_product = Product::where('product_id', $product_id)->get();
        $categories = Category_Product::all();
        $brands = Brand_Product::all();

        $manager_product = view('admin.product.edit_product')
            ->with('edit_product', $edit_product)
            ->with('categories', $categories)
            ->with('brands', $brands);

        return view('admin_layout')
            ->with('admin.category.all_category_product', $manager_product);
    }

    public function Update_product(Request $request, $product_id)
    {

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_description'] = $request->product_description;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_price_original'] = $request->product_price_original;
        $data['product_price_selling'] = $request->product_price_selling;
        $data['category_id'] = $request->category_id;
        $data['brand_id'] = $request->brand_id;

        $get_image = $request->file('product_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $path = 'public/uploads/product';
            $get_image->move($path, $new_image);
            $data['product_image'] = $path . '/' . $new_image;

            DB::table('tbl_product')->where('product_id', $product_id)->update($data);
            Session::flash('success', 'Update the Product Successfully !');
            return Redirect::to('all-product');
        }

        DB::table('tbl_product')->where('product_id', $product_id)->update($data);
        Session::flash('success', 'Update the product Successfully !');
        return Redirect::to('all-product');
    }
    public function Delete_product($product_id)
    {
        Product::where('product_id', $product_id)->delete();
        Session::flash('success', 'Delete the Product Successfully');
        return Redirect('all-product');
    }
}
