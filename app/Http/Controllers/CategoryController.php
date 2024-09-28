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
        $categories = Category_Product::All();
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

        $data->save();
        // Thiết lập thông báo
        Session::put('message', 'Add Category Successfully !');
        return Redirect('add-category-product');
    }
}
