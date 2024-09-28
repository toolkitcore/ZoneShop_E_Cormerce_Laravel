<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Show_Page_Home()
    {
        return view('pages.home');
    }
    public function Show_About()
    {
        return view('pages.about');
    }
}
