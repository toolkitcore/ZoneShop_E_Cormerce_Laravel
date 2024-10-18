<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Product_Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductImagesController extends Controller
{
    public function Show_Images()
    {
        $product_images = Product_Images::with('product')->get();
        $products = Product::orderBy('category_id', 'asc')->with('category')->get();
        return view('admin.images.show_images', compact('product_images', 'products'));
    }
    public function Add_Images($product_id)
    {
        $product_item = Product::where('product_id', $product_id)->first();
        return view('admin.images.add_images', compact('product_item'));
    }
    public function Edit_Images($product_id)
    {

        $product_item = Product::where('product_id', $product_id)->first();
        $product_images = Product_Images::where('product_id', $product_id)->get();
        return view('admin.images.edit_images', compact('product_item', 'product_images'));
    }

    public function Update_Images(Request $request, $product_id)
    {
        if ($request->hasFile('update')) {
            $uploadPath = "public/uploads/images/";

            $file = $request->file('update');

            $extention = $file->getClientOriginalExtension();
            $filename = time() . '-' . rand(0, 99) . '.' . $extention;
            $file->move($uploadPath, $filename);

            $finalImageName = $uploadPath . $filename;

            Product_Images::create([
                'product_id' => $product_id,
                'image_name' => $finalImageName
            ]);
            return response()->json(['message' => 'Image Update Successfully']);
        } else {
            return response()->json(['error' => 'File update failed.']);
        }
    }
    public function Delete_Images_choice($product_id)
    {
        // Tìm và xóa các ảnh liên quan đến sản phẩm
        $images = Product_Images::where('product_id', $product_id)->get();
        foreach ($images as $image) {
            // Xóa tệp hình ảnh từ hệ thống (nếu cần)
            if (file_exists(public_path($image->image_name))) {
                unlink(public_path($image->image_name));
            }
            // Xóa hình ảnh trong cơ sở dữ liệu
            $image->delete();
        }
        Session::flash('success', 'Update product images successfully !');
        return redirect('product-images');
    }

    public function Upload_Image_Product(Request $request, $product_id)
    {

        if ($request->hasFile('file')) {

            $uploadPath = "public/uploads/images/";

            $file = $request->file('file');

            $extention = $file->getClientOriginalExtension();
            $filename = time() . '-' . rand(0, 99) . '.' . $extention;
            $file->move($uploadPath, $filename);

            $finalImageName = $uploadPath . $filename;

            Product_Images::create([
                'product_id' => $product_id,
                'image_name' => $finalImageName
            ]);
            return response()->json(['message' => 'Image Uploaded Successfully']);
        } else {
            return response()->json(['error' => 'File upload failed.']);
        }
    }
}
