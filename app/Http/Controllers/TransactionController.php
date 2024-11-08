<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function Show_Transaction()
    {
        return view('admin.order.transaction.show_transaction');
    }
}
