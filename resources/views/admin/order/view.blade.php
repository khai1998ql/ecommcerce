@extends('admin.admin_layout')

@section('content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.index') }}">Trang chủ</a>
            <a class="breadcrumb-item" href="{{ route('admin.order.new_order') }}">Danh sách đơn hàng mới</a>
            <span class="breadcrumb-item active">Chi tiết đơn hàng</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Chi tiết đơn hàng</h6>
                <br>
                <div class="table-wrapper">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">Thông tin chi tiết <strong>Đơn hàng</strong></div>
                                <div class="card-body">
                                    <table class="table">
                                        <tr>
                                            <th>Mã đơn hàng: </th>
                                            <th>{{ $order->order_code }}</th>
                                        </tr>
                                        <tr>
                                            <th>Loại khách hàng: </th>
                                            <th>
                                                @if($order->order_type == 0)
                                                    <span class="badge badge-warning" style="color: black">Khách</span>
                                                @else
                                                    <span class="badge badge-success">Thành viên</span>
                                                @endif
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>Loại thanh toán: </th>
                                            <th>{{ $order->payment_type }}</th>
                                        </tr>
                                        <tr>
                                            <th>Mã thanh toán: </th>
                                            <th>{{ $order->payment_id }}</th>
                                        </tr>
                                        <tr>
                                            <th>Tổng tính: </th>
                                            <th>{{ $order->subtotal }}</th>
                                        </tr>
                                        <tr>
                                            <th>Giảm giá: </th>
                                            <th>{{ $order->sale }}</th>
                                        </tr>
                                        <tr>
                                            <th>Mã giảm giá: </th>
                                            <th>{{ $order->coupon }}</th>
                                        </tr>
                                        <tr>
                                            <th>Phí vẫn chuyển: </th>
                                            <th>{{ $order->delivery }}</th>
                                        </tr>
                                        <tr>
                                            <th>Tổng đơn hàng: </th>
                                            <th>{{ $order->total }}</th>
                                        </tr>
                                        <tr>
                                            <th>Trạng thái: </th>
                                            <th>
                                                @if($order->order_status == 0)
                                                    <span class="badge badge-warning">Chờ xử lý</span></td>
                                                @elseif($order->order_status == 1)
                                                    <span class="badge badge-primary">Đã xác nhận</span></td>
                                                @elseif($order->order_status == 2)
                                                    <span class="badge badge-info">Đã gửi hàng</span></td>
                                                @elseif($order->order_status == 3)
                                                    <span class="badge badge-success">Hoàn thành</span></td>
                                                @elseif($order->order_status == 4)
                                                    <span class="badge badge-danger">Đã hủy</span></td>
                                                @endif
                                            </th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">Thông tin chi tiết <strong>Khách hàng</strong></div>
                                <div class="card-body">
                                    <table class="table">
                                        <tr>
                                            <th>Tên khách hàng: </th>
                                            <th>{{ $shipping->ship_name }}</th>
                                        </tr>
                                        <tr>
                                            <th>Email khách hàng: </th>
                                            <th>{{ $shipping->ship_email }}</th>
                                        </tr>
                                        <tr>
                                            <th>Sđt khách hàng: </th>
                                            <th>{{ $shipping->ship_phone }}</th>
                                        </tr>
                                        <tr>
                                            <th>Địa chỉ khách hàng: </th>
                                            <th>{{ $shipping->ship_address }}</th>
                                        </tr>
                                        <tr>
                                            <th>Ghi chú: </th>
                                            <th>{{ $shipping->ship_note }}</th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card col-lg-12 ">
                            <div class="card-header">Chi tiết <strong>sản phẩm đơn hàng</strong></div>
                            <div class="table-wapper">
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th class="wd-5p">STT</th>
                                            <th class="wd-15p">Tên sản phẩm</th>
                                            <th class="wd-15p">Hình ảnh</th>
                                            <th class="wd-15p">Giá</th>
                                            <th class="wd-15p">Giảm giá(%)</th>
                                            <th class="wd-15p">Màu</th>
                                            <th class="wd-15p">Size</th>
                                            <th class="wd-15p">Số lượng</th>
                                            <th class="wd-15p">Tổng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders_details as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->product_name }}</td>
                                            <td><img src="{{ $item->avatar }}" style="width: 100px; height: 100px"></td>
                                            <td>{{ $item->singleprice }}</td>
                                            <td>{{ $item->singlesale }}</td>
                                            <td>{{ $item->color }}</td>
                                            <td>{{ $item->size }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->totalprice }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @if($order->order_status == 0)
                            <a href="{{ URL::to('admin/order/accept/'.$order->id) }}" class="btn btn-info">Chấp nhận đơn hàng</a>
                            <a href="{{ URL::to('admin/order/cancel/'.$order->id) }}" class="btn btn-danger">Hủy đơn hàng</a>

                        @elseif($order->order_status == 1)
                            <a href="{{ URL::to('admin/order/delivery_process/'.$order->id) }}" class="btn btn-info">Giao hàng cho khách</a>
                        @elseif($order->order_status == 2)
                            <a href="{{ URL::to('admin/order/done/'.$order->id) }}" class="btn btn-success">Hoàn thành giao hàng</a>
                        @elseif($order->order_status == 3)
                            <strong class="text-success text-center">Đơn hàng đã đã được giao xong!</strong>
                        @else
                            <strong class="text-danger text-center">Đơn hàng đã bị hủy!</strong>
                        @endif
                    </div>
                </div><!-- table-wrapper -->
            </div><!-- card -->
        </div><!-- sl-pagebody -->
        <footer class="sl-footer">
            <div class="footer-left">
                <div class="mg-b-2">Học viện Công nghệ Bưu chính Viễn thông</div>
                <div>Khoa Công nghệ Thông tin</div>
            </div>

        </footer>
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->





@endsection
