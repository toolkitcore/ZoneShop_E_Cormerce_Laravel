<?php

namespace App\Http\Controllers;

include 'app/Http/Requests/validateAttributesText.php';

use App\Models\Attributes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Models\Category_Product;
use App\Models\Product_Attributes;
use Attribute;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class AttributesProductController extends Controller
{
    public function Show_Attribute_Product()
    {
        // Lấy tất cả các category product kèm theo các attributes
        $categories = Category_Product::with('attributes')->get();

        // Trả về view với danh sách categories và attributes
        return view('admin.attribute.all_attribute_product', compact('categories'));
    }

    public function Add_Attribute_Product()
    {
        $categories = Category_Product::all();
        return view('admin.attribute.add_attribute_product', compact('categories'));
    }
    public function Edit_Attribute_Product($category_id)
    {
        $attributes = Attributes::where('category_id', $category_id)->get();
        $category_item = Category_Product::where('category_id', $category_id)->first();
        return view('admin.attribute.edit_attribute_product', compact('attributes', 'category_item'));
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
    public function Update_Attribute_Action(Request $request)
    {
        // lỗi validate lỗi 500 
        // $request->validate([
        //     'attribute_id' => 'required|integer|exists:attributes,attribute_id',
        //     'attribute_name' => 'required|string|max:255',
        //     'category_id' => 'required|integer|exists:categories,category_id', // Kiểm tra category_id
        // ]);

        $attribute = Attributes::find($request->attribute_id);

        if ($attribute->category_id !== $request->category_id) {
            return response()->json(['success' => false, 'message' => 'Attribute does not belong to this category.']);
        }

        $attribute->attribute_name = $request->attribute_name;

        if ($attribute->save()) {
            return response()->json(['success' => true, 'message' => 'Attribute updated successfully!']);
        } else {
            return response()->json(['error' => false, 'message' => 'Failed to update attribute.']);
        }
    }
    public function Delete_attribute_action(Request $request)
    {
        $attribute = Attributes::find($request->attribute_id);
        if (!$attribute) {
            return response()->json(['success' => false, 'message' => 'Attribute not found.']);
        }
        if ($attribute->category_id !== $request->category_id) {
            return response()->json(['success' => false, 'message' => 'Attribute does not belong to this category.']);
        }

        if ($attribute->delete()) {
            return response()->json(['success' => true, 'message' => 'Attribute deleted successfully!']);
        } else {
            return response()->json(['error' => true, 'message' => 'Failed to delete attribute.']);
        }
    }
    public function Delete_list_attribute_action($category_id)
    {
        $deletedCount = Attributes::where('category_id', $category_id)->delete();
        if ($deletedCount > 0) {
            Session::flash('success', 'Delete list attributes successfully!');
        } else {
            Session::flash('error', 'No attributes found for this category!');
        }
        return redirect()->route('all-attribute-product');
    }

    public function Add_attribute_action_detail(Request $request)
    {
        if ($request->attribute_name != '') {
            Attributes::create([
                'attribute_name' => $request->attribute_name,
                'category_id' => $request->category_id,
            ]);
            return response()->json(['success' => true, 'message' => 'Attribute add successfully!']);
            redirect()->back();
        }
        return response()->json(['error' => 'Failed to add attribute.']);
    }
}
