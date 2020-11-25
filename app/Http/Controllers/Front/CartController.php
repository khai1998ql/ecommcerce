<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Response;

class CartController extends Controller
{
    public function index(){
//        Cart::destroy();
        dd(Cart::content());
//        dd(Cart::total());
    }
    public function productAdd(Request $request){
        $id = $request->product_id;
        $product = DB::table('products')
                ->join('subcategories', 'products.subcategory_id', 'subcategories.id')
                ->where('products.id', $id)
                ->select('products.*', 'subcategories.subcategory_name')
                ->first();
//        dd($request->productColor);
        $data = array();
        $data['id'] = $product->id;
        $data['name'] = $product->product_name;
        $data['qty'] = intval($request->qty);
        $data['price'] = $product->selling_price;
        $data['weight'] = 1;

        $data['options']['size'] = intval($request->productSize);
        $data['options']['color'] = $request->productColor;
        $data['options']['avatar'] = $product->avatar;
        $data['options']['subcategory_name'] = $product->subcategory_name;
        $data['options']['discount_price'] = $product->discount_price;
        $data['options']['max'] = intval($request->maxQty);
//        dd($data);

        if($data['options']['color'] == "Chọn màu" || $data['options']['size'] == 0){
            $notification = array(
                'message' => 'Chọn đầy đủ thông tin trước khi mua hàng!',
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }else{
//            dd($data);
            Cart::add($data);
            $notification = array(
                'message' => 'Thêm sản phẩm vào giỏ hàng thành công!',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        }

    }
    public function cart(){
        if(count(Cart::content()) > 0){
            return view('pages.cart.cart');
        }else{
            $notification = array(
                'message' => 'Chưa có sản phẩm trong giỏ hàng!',
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }

    }
    public function update($id, $qty){
        Cart::update($id, $qty);
        $data = array();
        $price = 1;
        $sale = 0;
        $max = 1;
        foreach (Cart::content() as $key => $item){
            if($key == $id){
                $price = $item->price;
                $sale = $item->options->discount_price;
                $max = $item->options->max;
            }
        }
        $sum = formatSumPriceSalePer($price, $sale, $qty);
//        dd($sum);
        $data = array();
        $data['sum'] = $sum;
        $data['max'] = intval($max);
//        dd($data);

        // Xử lý phần tổng thanh toán

        $sum = 0;
        $sale = 0;
        $valueCoupon = 0;
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
        $total = $sum - $sale - $valueCoupon;

        $data['sumcart'] = formatPrice($sum);
        $data['salecart'] = formatPrice($sale);
        $data['couponcart'] = formatPrice($valueCoupon);
        $data['totalcart'] = formatPrice($total);



        return response::json(array(
            'product' => $data,
        ));
    }
    public function removeCart($rowId){
//        dd($rowId);
        Cart::remove($rowId);
        $notification = array(
            'message' => 'Xóa sản phẩm khỏi giỏ hàng thành công!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    public function coupon(Request $request){
        $coupon_code = $request->coupon_code;
//        dd($coupon_code);
        $coupon = DB::table('coupons')->where('coupon_code', $coupon_code)->first();
        if($coupon){
            $notification = array(
                'message' => 'Thêm mã giảm giá thành công!',
                'alert-type' => 'success',
            );
            Session::put('coupon', array('id ' => $coupon->id, 'coupon_name' => $coupon->coupon_name, 'coupon_code' => $coupon->coupon_code, 'coupon_discount' => $coupon->coupon_discount, 'coupon_type_id' => $coupon->coupon_type_id));
            return Redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Mã giảm giá không tồn tại!',
                'alert-type' => 'error',
            );
            return Redirect()->back()->with($notification);
        }

    }
    public function removeCoupon(){
        if(Session::has('coupon')){
            Session::forget('coupon');
            $notification = array(
                'message' => 'Xóa mã giảm giá thành công!',
                'alert-type' => 'success',
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Mã giảm giá không tồn tai!',
                'alert-type' => 'error',
            );
            return Redirect()->back()->with($notification);
        }

    }
    public function checkout(){
        if(count(Cart::content()) > 0){
            return view('pages.cart.checkout');
        }else{
            $notification = array(
                'message' => 'Bạn cần phải mua hàng trước khi thanh toán!',
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }

    }
    public function addDelivery($id){
//        dd($id);
        $delivery = DB::table('delivery')->where('id', $id)->first();
//        dd($delivery->delivery_fee);
        if(Session::has('delivery')){
            Session::forget('delivery');
        }
        Session::put('delivery', array('id' =>$delivery->id, 'delivery_fee' => $delivery->delivery_fee) );
//        dd(Session::get('delivery')['delivery_fee']);
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
        if(Session::has('delivery')){
            $deliveryValue = Session::get('delivery')['delivery_fee'];
        }
        $total = $sum - $sale - $valueCoupon + $deliveryValue;
        $data = array();
        $data['cartTotal'] = formatPrice($total);
//        dd($data);
        return response::json(array(
            'cart' => $data,
        ));
    }
    public function acceptCheckout(Request $request){
        $data = array();
        $data['ship_name'] = $request->ship_name;
        $data['ship_email'] = $request->ship_email;
        $data['ship_phone'] = $request->ship_phone;
        $data['ship_address'] = $request->ship_address;
        $data['ship_note'] = $request->ship_note;
        $data['payment_type'] = $request->payment;
//        dd($data);
        if($request->payment == "stripe"){
            return view('pages.payment.stripe', compact('data'));
        }
    }

}
