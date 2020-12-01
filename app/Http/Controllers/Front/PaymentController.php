<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceMail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Session;

class PaymentController extends Controller
{
    public function stripe(Request $request){
        // Thông tin giỏ hàng
        $sum = 0;
        $sale = 0;
        $valueCoupon = 0;
        $deliveryValue = 0;
        foreach (Cart::content() as $item){
            $sum += intval($item->price) * intval($item->qty);
            $sale += intval($item->price) * intval($item->options->discount_price)/100 * intval($item->qty);
        }
        if(Session::has('coupon')){
            $type = Session::get('coupon')['coupon_type_id'];
            $value = intval(Session::get('coupon')['coupon_discount']);
//                                dd($value);
            if($type == 1){
                $valueCoupon = ($sum - $sale) * $value / 100;
            }elseif($type == 2){
                $valueCoupon = $value;
            }
//                                dd($valueCoupon);
//                                if(Session::get('coupon')->)
        }
        if(Session::has('delivery'))   {
            $deliveryValue = Session::get('delivery')['delivery_fee'];
        }

        $total = $sum - $sale - $valueCoupon + $deliveryValue;


        \Stripe\Stripe::setApiKey('sk_test_51HmVaRGuw3rAuQaWNQNzHC6SA6PbxkVW03UKILOknJeHAOY5cyzlcOZecGKvaghcEOV81TG1oQaQYyxLUDSvTV9R00OZX2v0av');
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => $total,
            'currency' => 'vnd',
            'description' => 'Thanh toán đợn hàng!',
            'source' => $token,
        ]);
//        dd($charge);

        // Inssert thông tin đơn hàng
        $data = array();

        if(Auth::check()){
            $data['user_id'] = Auth::user()->id;
            $data['order_type'] = 1;
        }else{
            $data['order_type'] = 0;
        }
        $data['payment_id'] = $charge->payment_method;
        $data['payment_type'] = $request->payment_type;
        $data['order_code'] = mt_rand(1000000, 9999999);
        $data['subtotal'] = $sum;
        $data['sale'] = $sale;
        $data['coupon'] = $valueCoupon;
        $data['delivery'] = $deliveryValue;
        $data['total'] = $total;
        $data['order_status'] = 0;
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $data['created_at'] = $now;
//        dd($data);
        $order_id = DB::table('orders')->insertGetId($data);


        // Insert thông tin khách mua
        $shipping = array();
        $shipping['order_id'] = $order_id;
        $shipping['ship_name'] = $request->ship_name;
        $shipping['ship_email'] = $request->ship_email;
        $shipping['ship_phone'] = $request->ship_phone;
        $shipping['ship_address'] = $request->ship_address;
        $shipping['ship_note'] = $request->ship_note;
        DB::table('shipping')->insert($shipping);
//        dd($shipping);
        $shipping['order_code'] = $data['order_code'];

        // Insert thông tin chi tiết đơn hàng
        foreach (Cart::content() as $item){
            $orders_details = array();
            $orders_details['order_id'] = $order_id;
            $orders_details['product_id'] = $item->id;
            $orders_details['product_name'] = $item->name;
            $orders_details['color'] = $item->options->color;
            $orders_details['size'] = $item->options->size;
            $orders_details['quantity'] = intval($item->qty);
            $orders_details['singleprice'] = intval($item->price);
            $orders_details['singlesale'] = intval($item->price * $item->options->discount_price);
            $orders_details['totalprice'] = intval($item->price*(100 - $item->options->discount_price) / 100 * $item->qty);
//            dd($orders_details);
            DB::table('orders_details')->insert($orders_details);
            $product_quantity = intval($item->qty);
            DB::table('product_detail')
                        ->where('product_id', $item->id)
                        ->where('product_color', $item->options->color)
                        ->where('product_size', $item->options->size)
                        ->update(['product_quantity' => DB::raw('product_quantity - '.  $product_quantity), 'product_detail_sold' => DB::raw('product_detail_sold + ' .$product_quantity)]);
            DB::table('products')->where('id', $item->id)->update(['product_sold' => DB::raw('product_sold + ' .$product_quantity)]);
        }
        // Gửi mail
        $email = $request->ship_email;
        Mail::to($email)->send(new InvoiceMail($shipping));

        $notification = array(
            'message' => 'Đặt hàng thành công!',
            'alert-type' => 'success',
        );
        return redirect()->route('index')->with($notification);

    }
    public function checkthu(){
        return view('pages.mail.invoice');
    }
}
