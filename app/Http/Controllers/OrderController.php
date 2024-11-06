<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function Show_checkout()
    {
        if (!auth()->check()) {
            return redirect(route('login')); // Sửa 'ridirect' thành 'redirect'
        }
        return view('pages.checkout.show_checkout');
    }
}
