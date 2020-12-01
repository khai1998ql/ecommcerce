<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function blog(){
        $blog_post = DB::table('blog_post')
            ->join('admins', 'blog_post.post_author_id', 'admins.id')
            ->select('blog_post.*', 'admins.name', 'admins.admin_avatar')
            ->get();
        $blog_category = DB::table('blog_category')->get();

        return view('pages.blog.blog', compact('blog_post', 'blog_category'));
    }
    public function blog_detail($blog_name_tosub){
        $blog_detail = DB::table('blog_post')
            ->join('admins', 'blog_post.post_author_id', 'admins.id')
            ->where('blog_name_tosub', $blog_name_tosub)
            ->select('blog_post.*', 'admins.name', 'admins.admin_avatar')
            ->first();
        $blog_category = DB::table('blog_category')->get();
        return view('pages.blog.blog_detail', compact('blog_detail', 'blog_category'));
    }
}
