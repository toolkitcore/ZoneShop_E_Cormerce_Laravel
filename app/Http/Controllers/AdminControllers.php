<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Admin; // Nhập khẩu model Admin


class AdminControllers extends Controller
{
    public function index()
    {
        return view('admin_login');
    }
    public function Show_Dashboard()
    {
        return view('admin.dashboard');
    }
    //login -> dashboard
    public function Dashboard(Request $request)
    {
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $result = Admin::where('admin_email', $admin_email)
            ->where('admin_password', $admin_password)
            ->first();

        if ($result) {
            Session::put('admin_name', $result->admin_name);
            Session::put('admin_id', $result->admin_id);
            Session::flash('success', 'Login Successfully !');
            return Redirect::to('/dashboard');
        } else {
            Session::flash('error', 'Password or Username invalid! Please enter again !');
            return Redirect::to('/admin');
        }
    }
    public function Logout()
    {
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        Session::flash('success', 'Logout Successfully !');
        return Redirect::to('/admin');
    }
    public function Show_profile()
    {
        return view('admin.profile_admin');
    }
}
