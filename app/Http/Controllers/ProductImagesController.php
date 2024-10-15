<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Product_Images;
use Illuminate\Http\Request;

class ProductImagesController extends Controller
{
    public function Show_Images()
    {
        return view('admin.images.show_images');
    }
    public function Add_Images($product_id)
    {
        $product_item = Product::where('product_id', $product_id)->first();
        return view('admin.images.add_images', compact('product_item'));
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
