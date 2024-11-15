<?php

namespace App\Http\Controllers;

use App\Mail\InvoiceOrderMail;
use App\Models\Transaction;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session as FacadesSession;

class TransactionController extends Controller
{
    public function Show_Transaction()
    {
        return view('admin.order.transaction.show_transaction');
    }
    public function Confirm_Order($transaction_id)
    {
        $transaction_item = Transaction::where('transaction_id', $transaction_id)->first();

        if ($transaction_item) {
            $transaction_item->update([
                'transaction_status' => 2,
            ]);
            $transaction = Transaction::where('transaction_id', $transaction_id)
                ->with([
                    'pickupAddress',
                    'deliveryAddress',
                    'orders',
                    'orders.product'
                ])
                ->first();

            if (!$transaction) {
                Session::flash('error', 'Something Went Wrong !!!');
            } else {
                try {
                    Mail::to($transaction->deliveryAddress->email)->send(new InvoiceOrderMail($transaction));
                    Session::flash('success', 'Send Mail Invoice Successfully !');
                } catch (\Throwable $th) {
                    Session::flash('error', 'Something Went Wrong !!');
                }
            }
        }
        Session::flash('success', 'Confirm Order Successfully !!!');
        return redirect('order-detail/' . $transaction_id);
    }
    public function Confirm_Package($transaction_id)
    {
        $transaction = Transaction::where('transaction_id', $transaction_id)->first();

        if ($transaction) {
            $transaction->update([
                'transaction_status' => 3,
            ]);
        }
        Session::flash('success', 'Confirm Package Order Successfully !!!');
        return redirect('order-detail/' . $transaction_id);
    }
    public function Confirm_Ship($transaction_id)
    {
        $transaction = Transaction::where('transaction_id', $transaction_id)->first();

        if ($transaction) {
            $transaction->update([
                'transaction_status' => 4,
            ]);
        }
        Session::flash('success', 'Confirm Shipping Order Successfully !!!');
        return redirect('order-detail/' . $transaction_id);
    }
    public function Confirm_Completed($transaction_id)
    {
        $transaction = Transaction::where('transaction_id', $transaction_id)->first();

        if ($transaction) {
            $transaction->update([
                'transaction_status' => 5,
            ]);
        }
        Session::flash('success', 'Completed Order Successfully !!!');
        return redirect('order-detail/' . $transaction_id);
    }
    public function Cancel_Order($transaction_id)
    {
        $transaction = Transaction::where('transaction_id', $transaction_id)->first();

        if ($transaction) {
            $transaction->update([
                'transaction_status' => 6,
            ]);
        }
        Session::flash('success', 'Cancel Order Successfully !!!');
        return redirect('order-detail/' . $transaction_id);
    }
}
