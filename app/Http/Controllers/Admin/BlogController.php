<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Response;
use Image;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function blog_category(){
        $blog_cateogry = DB::table('blog_category')->get();
        return view('admin.blog.category', compact('blog_cateogry'));
    }
    public function createBlog_category(Request $request){
        $blog_category_name = $request->blog_category_name;
        $data['blog_category_name'] = $blog_category_name;
        $data['blog_category_name_tosub'] = to_sub($blog_category_name);
        DB::table('blog_category')->insert($data);
        $notification = array(
            'message' => 'Thêm danh mục tin tức thành công!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    public function deleteBlog_category($id){
        DB::table('blog_category')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Xóa danh mục tin tức thành công!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    public function getBlog_category($id){
        $blog_category = DB::table('blog_category')->where('id', $id)->first();
//        dd($blog_category);
        $data = array();
        $data['blog_category_name'] = $blog_category->blog_category_name;
        $data['id'] = $blog_category->id;
        return response(array(
            'blog_category' => $data,
        ));
    }
    public function updateBlog_category(Request $request){
        $data = array();
        $data['blog_category_name'] = $request->blog_category_name;
        $data['blog_category_name_tosub'] = to_sub($request->blog_category_name);
        $id = intval($request->blog_category_id);
//        dd($id);
        DB::table('blog_category')->where('id', $id)->update($data);
        $notification = array(
            'message' => 'Cập nhật danh mục tin tức thành công!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    // Blog post
    public function blog_post(){
        $blog_post = DB::table('blog_post')
            ->join('blog_category', 'blog_post.blog_category_id', 'blog_category.id')
            ->select('blog_post.*', 'blog_category.blog_category_name')
            ->get();
        return view('admin.blog.post', compact('blog_post'));
    }
    public function addBlog_post(){
        $blog_category = DB::table('blog_category')->get();
        return view('admin.blog.add_post', compact('blog_category'));
    }
    public function createBlog_post(Request $request){
        $data = array();
        $data['blog_name'] = $request->blog_name;
        $data['blog_category_id'] = $request->blog_category_id;
        $data['blog_name_tosub'] = to_sub($request->blog_name);
        $data['blog_content'] = $request->blog_content;
        $data['post_author_Id'] = Auth::user()->id;
        $image = $request->blog_image;
        if($image){
            $image_one_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $image_one = Image::make($image)->resize(800, 480)->save('public/media/post/'.$image_one_name);
            $data['blog_image'] = 'public/media/post/'.$image_one_name;
            DB::table('blog_post')->insert($data);
            $notification = array(
                'message' => 'Thêm bài viết tin tức thành công!',
                'alert-type' => 'success',
            );
            return redirect()->route('admin.blog_post')->with($notification);
        }
    }
}
