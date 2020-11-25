<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Đặt hàng thành công</title>
    <link type="text/css" rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
{{--    <script type="text/javascript" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>--}}
</head>
<body>
<?php
    //    use CarbonCarbon;
    use Carbon\Carbon;

    $dt = Carbon::now('Asia/Ho_Chi_Minh');
    $date1 = $dt->addDays(3)->toDateString();
    //    dd($date1);
    $date = date('d-m-Y', strtotime($date1));
    //    dd($date);

    // Xử lý phần Cart
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
?>

    <div  style="border: 2px solid dodgerblue;">
        <div class="container">
            <h1 style="color: black; font-weight: bold; text-align: center; margin-top: 30px">ECOMMERCE SHOP</h1>
            <hr style="border: none; height: 10px; width: 100%; background-color: dodgerblue">
            <br/>
            <div class="row">
                <h3>Cảm ơn quý khách đã đặt hàng tại website chúng tôi!</h3>
                <p>Đơn hàng #{{ $info['order_code'] }} đã được tiếp nhận và đang trong quá trình xử lý.</p>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <h3>Thông tin thanh toán</h3>
                    <p>Họ tên: <span>{{ $info['ship_name'] }}</span> </p>
                    <p>Số điện thoại: <span>{{ $info['ship_phone'] }}</span></p>
                    <p>Email: <span>{{ $info['ship_email'] }}</span></p>
                </div>
                <div class="col-lg-6">
                    <h3>Địa chỉ giao hàng</h3>
                    <p>Địa chỉ: <span>{{ $info['ship_address'] }}</span></p>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p><span style="font-weight: bold">Phương thức thanh toán: </span>Thanh toán khi nhận hàng</p>
                    <p><span style="font-weight: bold">Thời gian giao hàng dự kiến: </span>{{ $date }}</p>
                    <p><span style="font-weight: bold">Trạng thái đơn hàng: </span>Mới</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-response">
                        <thead>
                            <tr style="background-color: deepskyblue">
                                <th scope="col" colspan="3" style="border: 3px solid white; color: white">Sản phẩm</th>
                                <th scope="col" style="border: 3px solid white; color: white">Đơn giá</th>
                                <th scope="col" style="border: 3px solid white; color: white">Số lượng</th>
                                <th scope="col" style="border: 3px solid white; color: white">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(Cart::content() as $item)
                            <tr style="background-color: whitesmoke">
                                <td scope="col" colspan="3" style="border: 3px solid white;">{{ $item->name }}</td>
                                <td scope="col" style="text-align: center;border: 3px solid white;">{{ formatPrice($item->price) }}</td>
                                <td scope="col" style="text-align: center;border: 3px solid white;">{{ $item->qty }}</td>
                                <td scope="col" style="text-align: center;border: 3px solid white;">{{ formatSumPriceSalePer($item->price, 0, $item->qty) }}</td>
                            </tr>
                            @endforeach
                            <tr style="background-color: ghostwhite">
                                <td scope="col" colspan="5" style="text-align: right">Tổng tạm tính: </td>
                                <td scope="col" style="text-align: center">{{ formatPrice($sum) }}</td>
                            </tr>
                            <tr style="background-color: ghostwhite">
                                <td scope="col" colspan="5" style="text-align: right">Khuyến mãi: </td>
                                <td scope="col" style="text-align: center">{{ formatPrice($sale) }}</td>
                            </tr>
                            @if(Session::has('coupon'))
                            <tr style="background-color: ghostwhite">
                                <td scope="col" colspan="5" style="text-align: right">Mã giảm giá: </td>
                                <td scope="col" style="text-align: center">{{ formatPrice($valueCoupon) }}</td>
                            </tr>
                            @else
                            @endif
                            <tr style="background-color: whitesmoke">
                                <td scope="col" colspan="5" style="text-align: right"><span style="font-weight: bold">Tổng giá trị đơn hàng: </span> </td>
                                <td scope="col" style="text-align: center">{{ formatPrice($total) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row" style="margin-left: 20px">
                <div class="col-lg-12">
                    <div style="border: 3px dotted dodgerblue; padding: 15px 0px 0px 15px">
                        <p>Ghi chú: {{ $info['ship_note'] }}</p>
                    </div><br/><br/>
                </div>

            </div>
        </div>
    </div>
    <div>
{{--        //  Xóa session--}}
        <?php
            if(Session::has('coupon')){
                Session::forget('coupon');
            }
            if(Session::has('delivery'))   {
                Session::forget('delivery');
            }
            Cart::destroy();
        ?>
    </div>
</body>
</html>
