@extends('layouts.app')
@section('content')

    <!-- breadcrumbs-area-start -->
    <div class="breadcrumbs-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-menu">
                        <ul>
                            <li><a href="{{ route('index') }}">Trang chủ</a></li>
                            <li><a href="{{ route('cart.cart') }}">Giỏ hàng</a></li>
                            <li><a href="" class="active">Thanh toán</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs-area-end -->

    <!-- checkout-area-start -->
    <div class="checkout-area mb-70">
        <div class="container">
            <form action="{{ route('cart.checkout.accept') }}" method="post">
                @csrf
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="your-order">
                        <h3>Đơn hàng của bạn</h3>
                        <div class="your-order-table table-responsive">
                            <table>
                                <thead>
                                <tr>
                                    <th class="product-name" style="color: red">Tên sản phẩm</th>
                                    <th class="product-total" style="color: red">Tổng</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(Cart::content() as $key => $item)
                                <tr class="cart_item">
                                    <td class="product-name">
                                        {{ $item->name }} <strong class="product-quantity"> × {{ $item->qty }}</strong>
                                    </td>
                                    <td class="product-total">
                                        <span class="amount">{{ formatSumPriceSalePer($item->price, $item->options->discount_price, $item->qty) }}</span>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                <?php
                                //                        dd(Cart::content());
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
                                //                            dd($total);
                                ?>
                                <tfoot>
                                <tr class="cart-subtotal">
                                    <th style="color: red">Tổng tiền</th>
                                    <td><span class="amount" style="color: red">{{ formatPrice($sum) }}</span></td>
                                </tr>
                                <tr class="cart-subtotal">
                                    <th style="color: red">Giảm giá</th>
                                    <td><span class="amount" style="color: red">{{ formatPrice($sale) }}</span></td>
                                </tr>
                                @if(Session::has('coupon'))
                                <tr class="cart-subtotal">
                                    <th style="color: red">Mã giảm giá</th>
                                    <td><span class="amount" style="color: red">{{ formatPrice($valueCoupon) }}</span></td>
                                </tr>
                                @endif
                                <?php
                                    $delivery = DB::table('delivery')->get();
//                                        dd($delivery);

                                ?>
                                <tr class="shipping">
                                    <th style="color: red">Hình thức vẫn chuyển</th>
                                    <td>
                                        <ul>
                                            @foreach($delivery as $itemDe)
                                            <li>
                                                <input type="radio" name="delivery" id="{{ $itemDe->id }}" value="{{ $itemDe->id }}" required
                                                <?php
                                                    if(Session::has('delivery'))   {
                                                        if($itemDe->id == Session::get('delivery')['id']){
                                                            echo "checked";
                                                        }
                                                    }
                                                ?>
                                                >
                                                <label>
                                                    {{ $itemDe->delivery_name }}: <span class="amount">{{ formatPrice($itemDe->delivery_fee) }}</span>
                                                </label>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                                <tr class="order-total">
                                    <th style="color: red">Tổng tiền thanh toán</th>
                                    <td><strong><span class="amount" id="cartTotal">{{ formatPrice($total) }}</span></strong>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="checkbox-form">
                        <h3>Thông tin người nhận</h3>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="checkout-form-list">
                                    <label>Họ tên<span class="required">*</span></label>
                                    <input type="text" required name="ship_name" value="<?php if(Auth::user()){ echo Auth::user()->name; } ?>" placeholder="Nhập họ tên!" required>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="checkout-form-list">
                                    <label>Email<span class="required">*</span></label>
                                    <input type="text" required name="ship_email" value="<?php if(Auth::user()){ echo Auth::user()->email; } ?>" placeholder="Nhập địa chỉ!" required>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="checkout-form-list">
                                    <label>Số điện thoại<span class="required">*</span></label>
                                    <input type="text" required name="ship_phone" value="<?php if(Auth::user()){ echo Auth::user()->phone; } ?>" placeholder="Nhập số điện thoại!" required>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="checkout-form-list">
                                    <label>Địa chỉ<span class="required">*</span></label>
                                    <input type="text" required name="ship_address" value="<?php if(Auth::user()){ echo Auth::user()->address; } ?>" placeholder="Nhập địa chỉ!" required>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="order-notes">
                                    <div class="checkout-form-list">
                                        <label>Ghi chú</label>
                                        <textarea rows="10" name="ship_note" cols="30" placeholder="Ghi chú!" id="checkout-mess"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="contact_form_title text-center" style="color: red; font-size: 22px">Chọn phương thức thanh toán</div>
                                <div class="form-group">
                                    <ul class="logos_list">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <li><input type="radio" name="payment" required value="nhanhang"><img src="{{ asset('public/media/payment/nhanhang.jpg') }}" style="width: 120px; height: 120px" title="Thanh toán khi nhận hàng!"></li>
                                            </div>
                                            <div class="col-lg-6">
                                                <li><input type="radio" name="payment" required value="stripe"><img src="{{ asset('public/media/payment/mastercard.png') }}" style="width: 120px; height: 120px" title="Thanh toán bằng thẻ Stripe"></li>
                                            </div>
                                            <div class="col-lg-6">
                                                <li><input type="radio" name="payment" required value="paypal"><img src="{{ asset('public/media/payment/paypal.png') }}" style="width: 120px; height: 120px"></li>
                                            </div>
                                            <div class="col-lg-6">
                                                <li><input type="radio" name="payment" required value="ideal"><img src="{{ asset('public/media/payment/mollie.png') }}" style="width: 120px; height: 120px"></li>
                                            </div>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                            <br/>
                            <div class="payment-method">
                                <div class="order-button-payment">
                                    <input type="submit" value="Thanh toán">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- checkout-area-end -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('input:radio[name=delivery]').click(function(){
                var id = $(this).val();
                $.ajax({
                    url: "{{ url('cart/add/delivery/') }}/"+id,
                    type: "GET",
                    dataType: "json",
                    success:function (data){
                        $('#cartTotal').text(data.cart.cartTotal);
                    }
                })
            });
        });
    </script>
@endsection
