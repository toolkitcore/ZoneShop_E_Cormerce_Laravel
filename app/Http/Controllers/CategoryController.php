<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Models\Category_Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function Show_Category()
    {
        $categories = Category_Product::orderBy('category_id', 'desc')->get();
        return view('admin.all_category_product', compact('categories'));
    }
    public function Add_Category()
    {
        return view('admin.add_category_product');
    }

    public function Add_Category_Action(Request $request)
    {
        $data = new Category_Product();
        $data->category_name = $request->category_name;
        $data->category_parent_id = 1; // default is 1: admin
        $data->category_desc = $request->category_desc;
        $data->category_status = (int)$request->category_status;

        if ($request->category_image == '') {
            $data->category_image = '';
        } else {

            $get_image = $request->file('category_image');
            if ($get_image) {
                $get_name_image = $get_image->getClientOriginalName();
                $name_image = current(explode('.', $get_name_image));
                // lấy đuôi mở rộng của file
                $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
                $get_image->move('public/uploads/category', $new_image);
                $data->category_image = $new_image;

                $data->save();
                Session::put('message', 'Add Category Successfully !');
                return Redirect::to('add-category-product');
            }
        }
        $data->save();
        // Thiết lập thông báo
        Session::put('message', 'Add Category Successfully !');
        return Redirect('add-category-product');
    }
    // SET STATUS FOR CATEGORY 
    public function Set_Active_category_product($category_id)
    {
        Category_Product::where('category_id', $category_id)->update(['category_status' => 1]);

        Session::put('message', 'Activate the category product successfurlly!');
        return Redirect('/all-category-product');
    }
    public function Set_UnActive_category_product($category_id)
    {
        Category_Product::where('category_id', $category_id)->update(['category_status' => 0]);

        Session::put('message', 'Uctivate the category product successfurlly!');
        return Redirect('/all-category-product');
    }
    //show page edit category 
    public function Edit_Category_product($caterory_id)
    {

        $edit_category_product = Category_Product::where('category_id', $caterory_id)->get();
        $manager_category_product = view('admin.edit_category_product')->with('edit_category_product', $edit_category_product);

        return view('admin_layout')->with('admin.all_category_product', $manager_category_product);
    }

    public function Update_Category_product(Request $request, $category_id)
    {
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_desc'] = $request->category_desc;

        $get_image = $request->file('category_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/category', $new_image);
            $data['category_image'] = $new_image;

            DB::table('tbl_category_product')->where('category_id', $category_id)->update($data);
            Session::put('message', 'Update the Category product Successfully !');
            return Redirect::to('all-category-product');
        }

        DB::table('tbl_category_product')->where('category_id', $category_id)->update($data);
        Session::put('message', 'Update the Category product Successfully !');
        return Redirect::to('all-category-product');
    }
}
