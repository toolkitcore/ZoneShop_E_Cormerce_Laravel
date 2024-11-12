<?php

namespace App\Http\Controllers;

use App\Models\Category_Product;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function Add_Post()
    {
        $category = Category_Product::whereNull('category_parent_id')->get();
        return view('admin.post.add_post', compact('category'));
    }
    public function Add_Post_Action(Request $request)
    {
        $data = $request->all();

        // Kiểm tra xem có file hình ảnh không
        if ($request->hasFile('post_image')) {
            $get_image = $request->file('post_image');
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = pathinfo($get_name_image, PATHINFO_FILENAME);
            $new_image = $name_image . '_' . time() . '.' . $get_image->getClientOriginalExtension();
            $path = 'public/uploads/blog/post';

            // Di chuyển file vào thư mục uploads
            $get_image->move($path, $new_image);

            // Lưu đường dẫn hình ảnh
            $data['post_image'] = 'public/uploads/blog/post/' . $new_image;
        }

        // Lấy nội dung HTML từ Quill editor
        $content = $request->input('content');  // Nội dung HTML

        // Lưu thông tin bài viết vào cơ sở dữ liệu
        $post = Posts::create([
            'title' => $request->input('post_title'),
            'category' => $request->input('category_id'),
            'content' => $content,  // Lưu nội dung HTML
            'post_image' => $data['post_image'] ?? null,
            'post_des' => $request->input('post_des'),
        ]);

        // Trả về phản hồi sau khi lưu thành công
        return response()->json([
            'message' => 'Post added successfully',
            'redirect_url' => route('posts')  // Đường dẫn để chuyển hướng sau khi thêm
        ]);
    }


    public function Show_List_Post()
    {
        $posts = Posts::paginate(6);
        return view('admin.post.list_post', compact('posts'));
    }
    public function Delete_Post($id)
    {
        $posts = Posts::where('id', $id)->delete();
        Session::flash('success', 'Delete post successfully !');
        return redirect(route('posts'));
    }
    public function Detail_Post($id)
    {
        $post_item = Posts::where('id', $id)->first();
        return view('admin.post.post_detail', compact('post_item'));
    }
    public function Edit_Post()
    {
        return view('admin.post.edit_post');
    }
}
