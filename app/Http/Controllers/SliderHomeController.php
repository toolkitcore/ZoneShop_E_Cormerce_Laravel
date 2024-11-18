<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SliderHome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SliderHomeController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return redirect('dashboard');
        } else {
            return redirect('admin')->send();
        }
    }
    public function All_Slider()
    {
        $this->AuthLogin();
        $sliders = SliderHome::with('product')->get();
        return view('admin.pages.sliders.all_slider', compact('sliders'));
    }
    public function Add_Slider()
    {
        $this->AuthLogin();
        $list_slider = SliderHome::all();
        $usedProductIds = $list_slider->pluck('product_id')->toArray();
        $products = Product::whereNotIn('product_id', $usedProductIds)->get();
        return view('admin.pages.sliders.add_slider', compact('products'));
    }

    public function Add_Slider_Action(Request $request)
    {
        $this->AuthLogin();
        if ($request->input('product_id') == null) {
            Session::flash('error', 'Please choice product');
            return redirect()->back()->withInput();
        } elseif ($request->file('product_image') == null) {
            Session::flash('error', 'Please choose image for product');
            return redirect()->back()->withInput();
        }
        $slider = new SliderHome();
        $slider->product_id = $request->input('product_id');

        $get_image = $request->file('product_image');
        if ($get_image) {
            $imageExtension = $get_image->getClientOriginalExtension();
            if ($imageExtension !== 'png') {
                Session::flash('error', 'Only .png images are allowed.');
                return redirect()->back()->withInput();
            }

            $get_name_image = $get_image->getClientOriginalName();
            $name_image = pathinfo($get_name_image, PATHINFO_FILENAME);
            $new_image = $name_image . '_' . time() . '.' . $get_image->getClientOriginalExtension();
            $path = 'public/uploads/sliders';
            $get_image->move($path, $new_image);
            $slider->slider_image = $path . '/' . $new_image;
        }
        $slider->save();

        Session::flash('success', 'Add slider successfully !');
        return redirect()->back()->with('success', 'Slider has been added successfully.');
    }
    public function Delete_Slider($id)
    {
        $this->AuthLogin();
        $slider = SliderHome::where('id', $id)->delete();
        Session::flash('success', 'Delete item successfully!');
        return redirect('all-sliders');
    }
}
