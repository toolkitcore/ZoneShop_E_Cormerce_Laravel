<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function Show_Product()
    {
        return view('admin.product.all_product');
    }
    public function Add_Product()
    {
        return view('admin.product.add_product');
    }
    public function Edit_Product()
    {
        return view('admin.product.edit_product');
    }
}
