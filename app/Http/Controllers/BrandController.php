<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Models\Brand_Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class BrandController extends Controller
{
    public function Show_Brand()
    {
        $brands = Brand_Product::paginate(6);
        return view('admin.brand.all_brand_product', compact('brands'));
    }
    public function Add_Brand()
    {
        $brands = Brand_Product::all();
        return view('admin.brand.add_brand_product', compact('brands'));
    }

    public function Add_Brand_Action(Request $request)
    {
        $data = new Brand_Product();
        $data->brand_name = $request->brand_name;
        $data->brand_desc = $request->brand_desc;
        $data->brand_status = (int)$request->brand_status;
        $data->save();

        Session::flash('message', 'Add brand Successfully !');
        return Redirect('add-brand-product');
    }
    // SET STATUS FOR brand 
    public function Set_Active_Brand_Product($brand_id)
    {
        Brand_Product::where('brand_id', $brand_id)->update(['brand_status' => 1]);

        Session::flash('message', 'Activate the brand product successfurlly!');
        return Redirect('/all-brand-product');
    }
    public function Set_UnActive_Brand_Product($brand_id)
    {
        Brand_Product::where('brand_id', $brand_id)->update(['brand_status' => 0]);

        Session::flash('message', 'Uctivate the brand product successfurlly!');
        return Redirect('/all-brand-product');
    }
    //show page edit brand 
    public function Edit_Brand_Product($brand_id)
    {

        $edit_Brand_Product = Brand_Product::where('brand_id', $brand_id)->get();
        $brands = Brand_Product::all();

        $manager_Brand_Product = view('admin.brand.edit_brand_product')
            ->with('edit_brand_product', $edit_Brand_Product)
            ->with('brands', $brands);

        return view('admin_layout')
            ->with('admin.brand.all_brand_product', $manager_Brand_Product);
    }

    public function Update_Brand_Product(Request $request, $brand_id)
    {
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_desc'] = $request->brand_desc;

        DB::table('tbl_Brand_Product')->where('brand_id', $brand_id)->update($data);
        Session::flash('message', 'Update the brand product Successfully !');
        return Redirect::to('all-brand-product');
    }
    public function Delete_Brand_Product($brand_id)
    {
        Brand_Product::where('brand_id', $brand_id)->delete();
        Session::flash('message', 'Delete the brand Product Successfully');
        return Redirect('all-brand-product');
    }
}
