<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        return view('admin.home');
    }
    public function logout(){
        Auth::logout();
        $notification = array(
            'message' => 'Đăng xuất quản trị viên thành công!',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.login')->with($notification);
    }
}
