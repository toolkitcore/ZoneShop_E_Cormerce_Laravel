<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Product_Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
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


    public function Upload_Image_Product(Request $request, $product_id)
    {


        if ($request->hasFile('file')) {

            $uploadPath = "public/uploads/images/product/";

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
    public function Delete_images($product_id)
    {

        $list_images_of_product = Product_Images::where('product_id', $product_id)->get();
        $product_item = Product::where('product_id', $product_id)->first();
        return view('admin.images.delete_images', compact('product_item', 'list_images_of_product'));
    }
    public function Delete_choice(Request $request)
    {

        $imageIds = $request->input('image_ids');

        if ($imageIds) {
            foreach ($imageIds as $id) {
                $image = Product_Images::find($id);
                if ($image) {
                    $imagePath = $image->image_name;
                    if (File::exists($imagePath)) {
                        unlink($imagePath);
                    } else {
                        // Ghi log lỗi
                        Log::error("Failed to delete file: {$imagePath}");
                    }
                    $image->delete();
                }
            }
            Session::flash('success', 'Delete list images of product successfully!');
            return Redirect('/product-images');
        }
        Session::flash('warning', 'There is no photo deleted');
        return Redirect('/product-images');
    }
}
