<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
    public function Show_Review_Product()
    {

        $list_review = Reviews::with(['product', 'user'])->orderBy('id', 'desc')->get();
        return view('admin.review.show_review', compact('list_review'));
    }
    public function Set_Active_Review($id)
    {

        Reviews::where('id', $id)->update(['is_approved' => true]);

        Session::flash('success', 'Active the review successfully!');
        return Redirect('/review-product');
    }
    public function Set_UnActive_Review($id)
    {

        Reviews::where('id', $id)->update(['is_approved' => false]);

        Session::flash('success', 'UnActive the review successfully!');
        return Redirect('/review-product');
    }
    public function Delete_Review($id)
    {

        Reviews::where('id', $id)->delete();
        Session::flash('success', 'Delete review successfully!');
        return redirect('review-product');
    }
    public function Show_FeedBack()
    {

        $list_feedback = Reviews::where('is_featured', 1)->with(['user', 'product'])->get();
        return view('admin.pages.feedback.show_feedback', compact('list_feedback'));
    }
    public function Add_FeedBack()
    {

        $list_feedback = Reviews::with(['user', 'product'])->orderBy('rating', 'desc')->get();
        return view('admin.pages.feedback.add_feedback', compact('list_feedback'));
    }
    public function Set_Active_Feedback($id)
    {

        Reviews::where('id', $id)->update(['is_featured' => true]);

        Session::flash('success', 'Active the feedback successfully!');
        return Redirect('/add-feedback');
    }
    public function Set_UnActive_Feedback($id)
    {

        Reviews::where('id', $id)->update(['is_featured' => false]);

        Session::flash('success', 'UnActive the fe  edback successfully!');
        return Redirect('/add-feedback');
    }
    public function Delete_Feedback($id)
    {

        Reviews::where('id', $id)->update(['is_featured' => false]);

        Session::flash('success', 'UnActive the fe  feeedback successfully!');
        return Redirect('/all-feedback');
    }
}
