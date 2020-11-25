@extends('layouts.app')
@section('content')
    <style type="text/css" rel="stylesheet">
        /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
        .StripeElement {
            box-sizing: border-box;

            height: 40px;

            padding: 10px 12px;

            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;

            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }
    </style>
    <!-- breadcrumbs-area-start -->
    <div class="breadcrumbs-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-menu">
                        <ul>
                            <li><a href="{{ route('index') }}">Trang chủ</a></li>
                            <li><a href="{{ route('cart.cart') }}">Giỏ hàng</a></li>
                            <li><a href="{{ route('cart.checkout') }}">Thanh toán</a></li>
                            <li><a href="" class="active">Thanh toán bằng Stripe</a></li>
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
                                                    <input type="radio" name="delivery" id="{{ $itemDe->id }}" value="{{ $itemDe->id }}"
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
                        <h3>Nhập thông tin thẻ</h3>
                        <form action="{{ route('payment.stripe') }}" method="post" id="payment-form">
                            @csrf
                            <div class="form-row">
                                <label for="card-element">
                                    Credit or debit card
                                </label>
                                <div id="card-element">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>

                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                            </div>
                            <br/>
                            <input type="hidden" name="ship_name" value="{{ $data['ship_name'] }}">
                            <input type="hidden" name="ship_email" value="{{ $data['ship_email'] }}">
                            <input type="hidden" name="ship_phone" value="{{ $data['ship_phone'] }}">
                            <input type="hidden" name="ship_address" value="{{ $data['ship_address'] }}">
                            <input type="hidden" name="ship_note" value="{{ $data['ship_note'] }}">
                            <input type="hidden" name="payment_type" value="{{ $data['payment_type'] }}">
                            <button class="btn btn-sm btn-success">Thanh toán</button>
                        </form>
                    </div>
                </div>


            </div>
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
    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript">
        // Create a Stripe client.
        var stripe = Stripe('pk_test_51HmVaRGuw3rAuQaWZX3f2MMTxmkLjtxFLoLVGs7BlbYtZhOniNeQF8GlN8iP6ZQSDFJdi0BN14immZH17C2cAWt800odor9Hsr');

        // Create an instance of Elements.
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {style: style});

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.on('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });

        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }
    </script>
@endsection
