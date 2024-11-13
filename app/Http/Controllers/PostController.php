<?php

namespace App\Http\Controllers;

use App\Models\Category_Product;
use App\Models\Posts;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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

        if ($request->hasFile('post_image')) {
            $get_image = $request->file('post_image');
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = pathinfo($get_name_image, PATHINFO_FILENAME);
            $new_image = $name_image . '_' . time() . '.' . $get_image->getClientOriginalExtension();
            $path = 'public/uploads/blog/post';

            $get_image->move($path, $new_image);

            $data['post_image'] = 'public/uploads/blog/post/' . $new_image;
        }

        $content = $request->input('content');  // Nội dung HTML

        // Lưu thông tin bài viết vào cơ sở dữ liệu
        $post = Posts::create([
            'title' => $request->input('post_title'),
            'category' => $request->input('category_id'),
            'content' => $content,  // Lưu nội dung HTML
            'post_image' => $data['post_image'] ?? null,
            'post_des' => $request->input('post_des'),
        ]);

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
        $post = Posts::find($id);

        if ($post && $post->post_image) {
            $imagePath = public_path('storage/' . $post->post_image);

            if (File::exists($imagePath)) {
                unlink($imagePath); // Xóa file ảnh
            }
        }

        $post->delete();

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
    public function Show_Blog()
    {
        $blog = Posts::orderBy('created_at', 'desc')->paginate(4);
        $blog_Latest  = Posts::orderBy('created_at', 'desc')->take(3)->get();
        return view('pages.blog.all_post', compact('blog', 'blog_Latest'));
    }
    public function Show_Blog_Detail($id)
    {
        $post = Posts::where('id', $id)->with(['comments', 'comments.user'])->first();

        if (!$post) {
            return redirect('blog');
        }

        $post_related = Posts::where('category', $post->category)
            ->where('id', '!=', $post->id)
            ->get();
        $blog_Latest = Posts::orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('pages.blog.blog_detail', compact('post', 'blog_Latest', 'post_related'));
    }
}
