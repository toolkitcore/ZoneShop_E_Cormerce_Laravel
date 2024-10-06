<?php

namespace App\Http\Controllers;

include 'app/Http/Requests/validateAttributesText.php';

use App\Models\Attributes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Models\Category_Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class AttributesProductController extends Controller
{
    public function Show_Attribute_Product()
    {
        return view('admin.attribute.all_attribute_product');
    }
    public function Add_Attribute_Product()
    {
        $categories = Category_Product::all();
        return view('admin.attribute.add_attribute_product', compact('categories'));
    }
    public function Edit_Attribute_Product()
    {

        return view('admin.attribute.edit_attribute_product');
    }
    public function Add_attribute_action(Request $request)
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
