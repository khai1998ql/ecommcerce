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
                            <li><a href="" class="active">Giỏ hàng</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs-area-end -->
    <!-- entry-header-area-start -->
    <div class="entry-header-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="entry-header-title">
                        <h2>Giỏ hàng của bạn</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- entry-header-area-end -->
    <!-- cart-main-area-start -->
    <div class="cart-main-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form action="#">
                        @csrf
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                <tr>
                                    <th class="product-thumbnail">STT</th>
                                    <th class="product-name">Tên sản phẩm</th>
                                    <th class="product-thumbnail">Hình ảnh</th>
                                    <th class="product-price">Màu</th>
                                    <th class="product-price">Size</th>
                                    <th class="product-price">Giá</th>
                                    <th class="product-price">Giảm giá</th>
                                    <th class="product-quantity">Số lượng</th>
                                    <th class="product-subtotal">Tổng</th>
                                    <th class="product-remove">Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $count = 1;
                                ?>
                                @foreach(Cart::content() as $key => $item)

                                <tr>
                                    <td class="product-name">{{ $count++ }}<input type="hidden" id="max{{ $item->rowId }}" value="{{ $item->options->max }}"></td>
                                    <td class="product-name"><a href="{{ URL::to('product/'.to_sub($item->options->subcategory_name).'/'.to_sub($item->name)) }}">{{ $item->name }}</a></td>
                                    <td class="product-thumbnail"><a href="{{ URL::to('product/'.to_sub($item->options->subcategory_name).'/'.to_sub($item->name)) }}"><img src="{{ asset($item->options->avatar) }}" /></a></td>
                                    <td class="product-price"><span class="amount">{{ $item->options->color }}</span></td>
                                    <td class="product-price"><span class="amount">{{ $item->options->size }}</span></td>
                                    <td class="product-price"><span class="amount">{{ $item->price }}</span></td>
                                    <td class="product-price"><span class="amount">{{ $item->options->discount_price }}</span></td>
                                    <td class="product-quantity"><input type="number" id="{{ $item->rowId }}" oninput="changeInput(this.id)" value="{{ $item->qty }}" min="1" max="{{ $item->options->max }}"></td>
                                    <td class="product-subtotal"><span id="sum{{ $item->rowId }}">{{ formatSumPriceSalePer($item->price, $item->options->discount_price, $item->qty) }}</span></td>
                                    <td class="product-remove"><a href="{{ URL::to('cart/remove/'.$item->rowId) }}" class="btn btn-sm btn-danger" id="deleteProduct"><i class="fa fa-times" style="color: white"></i></a></td>
{{--                                    <td></td>--}}
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                @if(Session::has('coupon'))
                    <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12">

                    </div>
                @else
                    <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12">
                        <div class="coupon">
                            <h3>Mã giảm giá</h3>
                            {{--                        <p>Nhập mã giảm giá.</p>--}}
                            <form action="{{ route('cart.coupon') }}" method="post">
                                @csrf
                                <input type="text" name="coupon_code" placeholder="Mã giảm giá">
                                <button type="submit" class="btn btn-success">Sử dụng</button>
                            </form>
                        </div>
                    </div>
                @endif

                <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
                    <div class="cart_totals">
                        <?php
//                        dd(Cart::content());
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
//                            dd($total);
//                        dd(Auth::user()->id);
                        ?>
                        <h2>Tổng giỏ hàng</h2>
                        <table>
                            <tbody>
                            <tr class="cart-subtotal">
                                <th>Tổng giá trị đơn hàng</th>
                                <td>
                                    <span class="amount" id="sumcart">{{ formatPrice($sum) }}</span>
                                </td>
                            </tr>
                            <tr class="cart-subtotal">
                                <th>Giảm giá</th>
                                <td>
                                    <span class="amount" id="salecart">{{ formatPrice($sale) }}</span>
                                </td>
                            </tr>
                            @if(Session::has('coupon'))
                            <tr class="cart-subtotal">
                                <th>Mã giảm giá - (<span style="color: red">{{ Session::get('coupon')['coupon_code'] }}</span>) - (<span>{{ Session::get('coupon')['coupon_name'] }}</span>)  <a href="{{ route('cart.coupon.remove') }}" class="btn btn-sm btn-danger" id="deleteCoupon" title="Xóa mã giảm giá">X</a></th>
                                <td>
                                    <span class="amount" id="couponcart">{{ formatPrice($valueCoupon) }}</span>
                                </td>
                            </tr>
                            @else
                            @endif
                            <tr class="order-total">
                                <th>Tổng tiền phải thanh toán</th>
                                <td>
                                    <strong>
                                        <span class="amount" id="totalcart">{{ formatPrice($total) }}</span>
                                    </strong>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="wc-proceed-to-checkout">
                            <a href="{{ route('cart.checkout') }}">Thanh toán đơn hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cart-main-area-end -->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        function changeInput(id){
            var rowId = '#'+id;
            var qty = parseInt($(rowId).val());
            var sum = '#'+'sum'+id;
            var maxStr = '#'+'max'+id;
            var max = parseInt($(maxStr).val());
            if(qty > max){
                qty = max;
                $(rowId).val(max);
            }
            $.ajax({
                url: "{{ url('cart/update/') }}/"+id+'/'+qty,
                type: "GET",
                dataType: "json",
                success:function (data){
                    $(sum).text(data.product.sum);
                    $('#sumcart').text(data.product.sumcart);
                    $('#salecart').text(data.product.salecart);
                    $('#couponcart').text(data.product.couponcart);
                    $('#totalcart').text(data.product.totalcart);
                }
            })
        }
    </script>
@endsection
