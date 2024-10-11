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
        $categories = Category_Product::paginate(6);
        return view('admin.category.all_category_product', compact('categories'));
    }
    public function Add_Category()
    {
        $categories = Category_Product::all();
        return view('admin.category.add_category_product', compact('categories'));
    }

    public function CheckNumberSortOrderCategory($number_check, $category_parent_id)
    {
        $categories = Category_Product::where('category_parent_id', $category_parent_id)->get();
        $maxSortOrder = 0;
        $isNumberInList = false;

        foreach ($categories as $item) {
            if ($item->category_sort_order == $number_check) {
                $isNumberInList = true;
            }

            if ($item->category_sort_order > $maxSortOrder) {
                $maxSortOrder = $item->category_sort_order;
            }
        }

        if (!$isNumberInList) {
            return $number_check;
        }

        return $maxSortOrder + 1;
    }


    public function Add_Category_Action(Request $request)
    {
        $data = new Category_Product();
        $data->category_name = $request->category_name;

        if ($request->category_parent_id == '') {
            $data->category_parent_id = null;
        } else {
            $data->category_parent_id = $request->category_parent_id;
        }

        $data->category_desc = $request->category_desc;
        $data->category_status = (int)$request->category_status;
        $data->category_sort_order =
            $this->CheckNumberSortOrderCategory((int)$request->category_sort_order, $data->category_parent_id);

        if ($request->category_image == '') {
            $data->category_image = '';
        } else {
            $get_image = $request->file('category_image');
            if ($get_image) {
                $get_name_image = $get_image->getClientOriginalName();
                $name_image = current(explode('.', $get_name_image));
                $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
                $get_image->move('public/uploads/category', $new_image);
                $data->category_image = $new_image;
            }
        }

        $data->save();

        // Lưu thông báo vào session để hiển thị sau redirect
        Session::flash('success', 'Add Category Successfully!');

        return Redirect::to('add-category-product');
    }


    // SET STATUS FOR CATEGORY
    public function Set_Active_category_product($category_id)
    {
        Category_Product::where('category_id', $category_id)->update(['category_status' => 1]);

        Session::flash('success', 'Activate the category product successfurlly!');
        return Redirect('/all-category-product');
    }
    public function Set_UnActive_category_product($category_id)
    {
        Category_Product::where('category_id', $category_id)->update(['category_status' => 0]);

        Session::flash('success', 'Uctivate the category product successfurlly!');
        return Redirect('/all-category-product');
    }
    //show page edit category 
    public function Edit_Category_product($caterory_id)
    {

        $edit_category_product = Category_Product::where('category_id', $caterory_id)->get();
        $categories = Category_Product::all();

        $manager_category_product = view('admin.category.edit_category_product')
            ->with('edit_category_product', $edit_category_product)
            ->with('categories', $categories);

        return view('admin_layout')
            ->with('admin.category.all_category_product', $manager_category_product);
    }

    public function Update_Category_product(Request $request, $category_id)
    {
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_desc'] = $request->category_desc;
        if ($request->category_parent_id == '') {
            $data['category_parent_id'] = null;
        } {
            $data['category_parent_id'] = $request->category_parent_id;
        }
        $data['category_sort_order'] =
            $this->CheckNumberSortOrderCategory((int)$request->category_sort_order, $data['category_parent_id']);

        $get_image = $request->file('category_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/category', $new_image);
            $data['category_image'] = $new_image;

            DB::table('tbl_category_product')->where('category_id', $category_id)->update($data);
            Session::flash('success', 'Update the Category product Successfully !');
            return Redirect::to('all-category-product');
        }

        DB::table('tbl_category_product')->where('category_id', $category_id)->update($data);
        Session::flash('success', 'Update the Category product Successfully !');
        return Redirect::to('all-category-product');
    }
    public function Delete_Category_product($category_id)
    {
        Category_Product::where('category_id', $category_id)->delete();
        Session::flash('success', 'Delete the Category Product Successfully');
        return Redirect('all-category-product');
    }

    public function Filter_Category_Root()
    {
        $category_root = Category_Product::whereNull('category_parent_id')->get();
        Redirect('all-category-product')->with('category_root', $category_root);
    }
}
