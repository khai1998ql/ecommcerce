@extends('admin.admin_layout')

@section('content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.index') }}">Trang chủ</a>
            <a class="breadcrumb-item" href="{{ route('admin.product.index') }}">Sản phẩm</a>
            <span class="breadcrumb-item active">Danh sách sản phẩm</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Danh sách sản phẩm<a href="{{ route('admin.product.add') }}" class="btn btn-sm btn-warning" style="float: right">THÊM MỚI</a></h6>
                <br>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
{{--                            <th class="wd-5p">STT</th>--}}
                            <th class="wd-10p">Mã sản phẩm</th>
                            <th class="wd-10p">Tên sản phẩm</th>
                            <th class="wd-10p">Hình ảnh</th>
                            <th class="wd-5p">Danh mục</th>
{{--                            <th class="wd-10p">Nhãn hiệu</th>--}}
                            <th class="wd-10p">Trạng thái</th>
                            <th class="wd-10p">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($product as $key => $item)
                            <tr>
                                <td>{{ $item->product_code  }}</td>
{{--                                <td>{{ $key +1 }}</td>--}}
                                <td>{{ $item->product_name }}</td>

                                <td><img src="{{ asset($item->image_one) }}" style="width: 70px; height: 70px"></td>
                                <td>{{ $item->category_name }}</td>
{{--                                <td>{{ $item->brand_name }}</td>--}}
                                <td>
                                    @if($item->status == 0)
                                        <span class="badge badge-warning">Inactive</span>
                                    @else
                                        <span class="badge badge-success">Active</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ URL::to('admin/product/show/'.$item->id) }}" title="Xem chi tiết" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                                    <a href="{{ URL::to('admin/product/edit/'.$item->id) }}" title="Sửa" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="{{ URL::to('admin/product/delete/'.$item->id) }}"  id="delete" title="Xóa" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    @if($item->status == 0)
                                        <a href="{{ URL::to('admin/product/status/'.$item->id) }}" title="Active" class="btn btn-sm btn-primary"><i class="fa fa-thumbs-up"></i></a>
                                    @else
                                        <a href="{{ URL::to('admin/product/status/'.$item->id) }}" title="Inactive" class="btn btn-sm btn-primary"><i class="fa fa-thumbs-down"></i></a>
                                    @endif

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

@endsection
