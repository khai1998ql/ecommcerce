@extends('admin.admin_layout')

@section('content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.index') }}">Trang chủ</a>
            <a class="breadcrumb-item" href="index.html">Danh mục</a>
            <span class="breadcrumb-item active">Phiếu giảm giá</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Danh sách phiểu giảm giá<a href="" class="btn btn-sm btn-warning" style="float: right" data-toggle="modal" data-target="#exampleModal">THÊM MỚI</a></h6>
                <br>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">STT</th>
                            <th class="wd-30p">Tên phiếu</th>
                            <th class="wd-30p">Mã phiếu</th>
                            <th class="wd-30p">Loại phiếu</th>
                            <th class="wd-30p">Giá trị</th>
                            <th class="wd-30p">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($coupon as $key => $item)
                            <tr>
                                <td>{{ $key +1 }}</td>
                                <td>{{ $item->coupon_name }}</td>
                                <td>{{ $item->coupon_code }}</td>
                                <td>{{ $item->coupon_type_name }}</td>
                                <td>{{ $item->coupon_discount }}</td>
                                <td>
                                    {{--                                        <a href="" class="btn btn-info">Sửa</a>--}}
                                    <button id="{{ $item->id }}"  class="btn btn-info" data-toggle="modal" data-id="{{ $item->id }}" data-target="#exampleModal1" onclick="couponEdit(this.id)">Sửa</button>
                                    <a href="{{ URL::to('admin/coupon/delete/'.$item->id) }}" class="btn btn-danger" id="delete">Xóa</a>
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
                <div class="mg-b-2">Copyright &copy; 2017. Starlight. All Rights Reserved.</div>
                <div>Made by ThemePixels.</div>
            </div>
            <div class="footer-right d-flex align-items-center">
                <span class="tx-uppercase mg-r-10">Share:</span>
                <a target="_blank" class="pd-x-5" href="https://www.facebook.com/sharer/sharer.php?u=http%3A//themepixels.me/starlight"><i class="fa fa-facebook tx-20"></i></a>
                <a target="_blank" class="pd-x-5" href="https://twitter.com/home?status=Starlight,%20your%20best%20choice%20for%20premium%20quality%20admin%20template%20from%20Bootstrap.%20Get%20it%20now%20at%20http%3A//themepixels.me/starlight"><i class="fa fa-twitter tx-20"></i></a>
            </div>
        </footer>
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <!-- Modal Thêm danh mục -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm mới phiếu giảm giá</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.coupon.create') }}" method="POST">
                    @csrf
                    <div class="modal-body pd-20">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên phiếu</label>
                            <input type="text" class="form-control" id="coupon_name" aria-describedby="emailHelp" name="coupon_name" placeholder="Tên phiếu">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã phiếu</label>
                            <input type="text" class="form-control" id="coupon_code" aria-describedby="emailHelp" name="coupon_code" placeholder="Mã phiếu">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Loại phiếu</label>
                            <select class="form-control" name="coupon_type_id">
                                @foreach($coupon_type as $item)
                                    <option value="{{ $item->id }}">{{ $item->coupon_type_name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá trị</label>
                            <input type="text" class="form-control" id="coupon_discount" aria-describedby="emailHelp" name="coupon_discount" placeholder="Giá trị">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Sửa danh mục-->
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sửa phiếu giảm giá</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.coupon.update') }}" method="POST">
                    @csrf
                    <div class="modal-body pd-20">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên phiếu</label>
                            <input type="text" class="form-control" id="coupon_name_old" aria-describedby="emailHelp" name="coupon_name">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã phiếu</label>
                            <input type="text" class="form-control" id="coupon_code_old" aria-describedby="emailHelp" name="coupon_code">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Loại phiếu</label>
                            <select class="form-control" name="coupon_type_id" id="coupon_type_id_old">
                                @foreach($coupon_type as $item)
                                    <option value="{{ $item->id }}">{{ $item->coupon_type_name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá trị</label>
                            <input type="text" class="form-control" id="coupon_discount_old" aria-describedby="emailHelp" name="coupon_discount">

                        </div>
                        <div class="modal-footer">
                            <input type="hidden" id="coupon_id" name="coupon_id">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">Sửa</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        function couponEdit(id){
            $.ajax({
                url: "{{ url('admin/coupon/edit/') }}/"+id,
                type: "GET",
                dataType: "json",
                success:function (data){
                    $('#coupon_name_old').val(data.coupon.coupon_name);
                    $('#coupon_code_old').val(data.coupon.coupon_code);
                    $('#coupon_type_id_old').val(data.coupon.coupon_type_id);
                    $('#coupon_discount_old').val(data.coupon.coupon_discount);
                    $('#coupon_id').val(data.coupon.id);
                }
            })
        }
    </script>



@endsection
