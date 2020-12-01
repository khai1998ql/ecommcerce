<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // New order View
    public function new_order(){
        $order_name = "new_order";
        $order = DB::table('orders')->where('order_status', 0)->get();
        return view('admin.order.order', compact('order', 'order_name'));
    }
    public function new_orderView($id){
        $order = DB::table('orders')->where('id', $id)->first();
        $orders_details = DB::table('orders_details')
                ->join('products', 'orders_details.product_id', 'products.id')
                ->select('orders_details.*', 'products.avatar')
                ->where('order_id', $id)
                ->get();
        $shipping  = DB::table('shipping')->where('order_id', $id)->first();
        return view('admin.order.view', compact('order', 'orders_details', 'shipping'));
    }

    // Canccel Orrder
    public function _cancel_order($id){
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        DB::table('orders')->where('id', $id)->update(['order_status' => 4, 'updated_at' => $now]);
        $notification = array(
            'message' => 'Hủy đơn hàng thành công!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.order.new_order')->with($notification);
    }
    // Accept order
    public function _accept_order($id){
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        DB::table('orders')->where('id', $id)->update(['order_status' => 1, 'updated_at' => $now]);
        $notification = array(
            'message' => 'Chấp nhận đơn hàng thành công!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.order.new_order')->with($notification);
    }
    // Delivery Process order
    public function _delivery_process_order($id){
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        DB::table('orders')->where('id', $id)->update(['order_status' => 2, 'updated_at' => $now]);
        $notification = array(
            'message' => 'Đơn hàng đã được gửi đi!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.order.new_order')->with($notification);
    }
    // Delivery Done order
    public function _done_order($id){
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        DB::table('orders')->where('id', $id)->update(['order_status' => 3, 'updated_at' => $now]);
        $notification = array(
            'message' => 'Đơn hàng hoàn thành!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.order.new_order')->with($notification);
    }
    // Accept order View
    public function accept_order(){
        $order_name = "accept_order";
        $order = DB::table('orders')->where('order_status', 1)->get();
        return view('admin.order.order', compact('order', 'order_name'));
    }
    public function accept_orderView($id){
        $order = DB::table('orders')->where('id', $id)->first();
        $orders_details = DB::table('orders_details')
            ->join('products', 'orders_details.product_id', 'products.id')
            ->select('orders_details.*', 'products.avatar')
            ->where('order_id', $id)
            ->get();
        $shipping  = DB::table('shipping')->where('order_id', $id)->first();
        return view('admin.order.view', compact('order', 'orders_details', 'shipping'));
    }
    // Delivery order View
    public function delivery_order(){
        $order_name = "accept_order";
        $order = DB::table('orders')->where('order_status', 2)->get();
        return view('admin.order.order', compact('order', 'order_name'));
    }
    public function delivery_orderView($id){
        $order = DB::table('orders')->where('id', $id)->first();
        $orders_details = DB::table('orders_details')
            ->join('products', 'orders_details.product_id', 'products.id')
            ->select('orders_details.*', 'products.avatar')
            ->where('order_id', $id)
            ->get();
        $shipping  = DB::table('shipping')->where('order_id', $id)->first();
        return view('admin.order.view', compact('order', 'orders_details', 'shipping'));
    }
    // Done order View
    public function done_order(){
        $order_name = "accept_order";
        $order = DB::table('orders')->where('order_status', 3)->get();
        return view('admin.order.order', compact('order', 'order_name'));
    }
    public function done_orderView($id){
        $order = DB::table('orders')->where('id', $id)->first();
        $orders_details = DB::table('orders_details')
            ->join('products', 'orders_details.product_id', 'products.id')
            ->select('orders_details.*', 'products.avatar')
            ->where('order_id', $id)
            ->get();
        $shipping  = DB::table('shipping')->where('order_id', $id)->first();
        return view('admin.order.view', compact('order', 'orders_details', 'shipping'));
    }
    // Cancel order View
    public function cancel_order(){
        $order_name = "accept_order";
        $order = DB::table('orders')->where('order_status', 4)->get();
        return view('admin.order.order', compact('order', 'order_name'));
    }
    public function cancel_orderView($id){
        $order = DB::table('orders')->where('id', $id)->first();
        $orders_details = DB::table('orders_details')
            ->join('products', 'orders_details.product_id', 'products.id')
            ->select('orders_details.*', 'products.avatar')
            ->where('order_id', $id)
            ->get();
        $shipping  = DB::table('shipping')->where('order_id', $id)->first();
        return view('admin.order.view', compact('order', 'orders_details', 'shipping'));
    }
}
