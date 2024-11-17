<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{
    public function Show_review($transaction_id)
    {
        $user_id = Auth::user()->id;

        $list_product = Transaction::where('transaction_id', $transaction_id)
            ->where('user_id', $user_id)
            ->where('transaction_status', '=', 5)
            ->with('orders.product')
            ->first();
        $list_review = Reviews::where('transaction_id', $transaction_id)->get();
        return view('pages.reivews.show_review', compact('list_product', 'list_review'));
    }
    public function Store_Review(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'content_review' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);
        $review = new Reviews();
        $review->product_id = $request->product_id;
        $review->user_id = auth()->id();  // Giả sử bạn muốn lưu thông tin người dùng đã đăng nhập
        $review->rating = $request->rating;
        $review->review = $request->content_review;
        $review->transaction_id = $request->input('transactionId');
        $review->save();

        return response()->json(['status' => 'success']);
    }
}
