@extends('admin.admin_layout')

@section('content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.index') }}">Trang chủ</a>
{{--            <a class="breadcrumb-item" href="index.html">Danh sach</a>--}}
            <span class="breadcrumb-item active">Danh sách đơn hàng</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Danh sách đơn hàng</h6>
                <br>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-5p">STT</th>
                            <th class="wd-10p">MĐH</th>
                            <th class="wd-15p">HTTT</th>
                            <th class="wd-15p">LKH</th>
                            <th class="wd-15p">Tổng tiền</th>
                            <th class="wd-15p">Trạng thái</th>
                            <th class="wd-15p">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order as $key => $item)
                            <tr>
                                <td>{{ $key +1 }}</td>
                                <td>{{ $item->order_code }}</td>
                                <td>{{ $item->payment_type }}</td>
                                <td>
                                    @if($item->order_type == 0)
                                        <span class="badge badge-warning" style="color: black">Khách</span>
                                    @else
                                        <span class="badge badge-success">Thành viên</span>
                                    @endif
                                </td>
                                <td>{{ $item->total }}</td>
                                <td>
                                    @if($item->order_status == 0)
                                    <span class="badge badge-warning">Chờ xử lý</span></td>
                                    @elseif($item->order_status == 1)
                                        <span class="badge badge-primary">Đã xác nhận</span></td>
                                    @elseif($item->order_status == 2)
                                        <span class="badge badge-info">Đã gửi hàng</span></td>
                                    @elseif($item->order_status == 3)
                                        <span class="badge badge-success">Hoàn thành</span></td>
                                    @elseif($item->order_status == 4)
                                        <span class="badge badge-danger">Đã hủy</span></td>
                                    @endif
                                <td>
                                    <a href="{{ URL::to('admin/order/'.$order_name.'/view/'.$item->id) }}" class="btn btn-sm btn-danger">Chi tiết</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
