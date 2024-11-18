<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class CommentController extends Controller
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
    public function Send_Comment(Request $request)
    {

        Comments::create([
            'post_id' => $request->input('post_id'),
            'user_id' => Auth::user()->id,
            'content' => $request->input('content'),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Comment successfully',
        ]);
    }
}
