<?php

namespace App\Http\Controllers;

use App\Models\PosterHome;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class PosterHomeController extends Controller
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
    public function All_Poster()
    {
        $this->AuthLogin();
        $posters = PosterHome::all();
        return view('admin.pages.posters.all_poster', compact('posters'));
    }
    public function Add_Poster()
    {
        $this->AuthLogin();
        return view('admin.pages.posters.add_poster');
    }

    public function Add_Poster_Action(Request $request)
    {
        $this->AuthLogin();
        $poster = new PosterHome();

        $get_image = $request->file('product_image');
        if ($get_image) {
            $imageExtension = $get_image->getClientOriginalExtension();
            $image = Image::make($get_image);
            $width = $image->width();
            $height = $image->height();

            if ($width != 1300 || $height != 500) {
                Session::flash('error', 'Picture must size: 1300x500px.');
                return redirect()->back()->withInput();
            }

            $get_name_image = $get_image->getClientOriginalName();
            $name_image = pathinfo($get_name_image, PATHINFO_FILENAME);
            $new_image = $name_image . '_' . time() . '.' . $get_image->getClientOriginalExtension();
            $path = 'public/uploads/posters';
            $get_image->move($path, $new_image);
            $poster->poster_image = $path . '/' . $new_image;
        }
        $poster->save();

        Session::flash('success', 'Add poster successfully !');
        return redirect()->back()->with('success', 'Poster has been added successfully.');
    }
    public function Delete_Poster($id)
    {
        $this->AuthLogin();
        PosterHome::where('id', $id)->delete();
        Session::flash('success', 'Delete poster successfully!');
        return redirect('all-poster');
    }
    public function Set_Active_Poster($id)
    {
        $this->AuthLogin();
        PosterHome::where('id', $id)->update(['poster_status' => 1]);

        Session::flash('success', 'Active the poster successfurlly!');
        return Redirect('/all-poster');
    }
    public function Set_UnActive_Poster($id)
    {
        $this->AuthLogin();
        PosterHome::where('id', $id)->update(['poster_status' => 0]);

        Session::flash('success', 'UnActive the poster successfurlly!');
        return Redirect('/all-poster');
    }
}
