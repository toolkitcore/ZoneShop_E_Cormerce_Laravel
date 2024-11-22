<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CustomerController extends Controller
{

    public function Show_Customer()
    {

        $count_customers = Transaction::distinct('user_id')->count('user_id');
        $count_order = Orders::count('product_id');
        $count_invoice = Transaction::sum('transaction_amount');
        $transaction = Transaction::with(['orders', 'user', 'deliveryAddress'])->get();
        return view(
            'admin.customers.show_customer',
            compact(
                'count_customers',
                'count_order',
                'count_invoice',
                'transaction',
            )
        );
    }
    public function Show_Customer_Detail($id)
    {

        $user = User::where('id', $id)->first();
        $transaction = Transaction::where('user_id', $id)
            ->with(['orders', 'user', 'deliveryAddress'])
            ->get();
        $total_invoice = Transaction::where('user_id', $id)
            ->count('transaction_id');
        $total_expense = Transaction::where('user_id', $id)
            ->sum('transaction_amount');
        $total_invoice_1 = Transaction::where('user_id', $id)
            ->get();
        $total_order = 0;
        foreach ($total_invoice_1 as $key => $value) {
            $total_order += Orders::where('transaction_id', $value->transaction_id)
                ->count('order_id');
        }
        return view(
            'admin.customers.detail_customer',
            compact(
                'user',
                'transaction',
                'total_invoice',
                'total_order',
                'total_expense',
            )
        );
    }
}
