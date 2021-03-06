@extends('admin.admin_layout')

@section('content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.index') }}">Trang chủ</a>
{{--            <a class="breadcrumb-item" href="index.html">Danh mục</a>--}}
            <span class="breadcrumb-item active">Tin tức</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Danh sách tin tức<a href="{{ route('admin.blog_post.add') }}" class="btn btn-success btn-sm" style="float: right">THÊM MỚI</a></h6>
                <br>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">STT</th>
                            <th class="wd-30p">Tên tiêu đề tin tức</th>
                            <th class="wd-30p">Danh mục tin tức</th>
                            <th class="wd-30p">Hình ảnh</th>
                            <th class="wd-30p">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($blog_post as $key => $item)
                            <tr>
                                <td>{{ $key +1 }}</td>
                                <td>{{ $item->blog_name }}</td>
                                <td>{{ $item->blog_category_name }}</td>
                                <td><img src="{{ asset($item->blog_image) }}" title="{{ $item->blog_name }}" style="width: 70px; height: 50px"></td>
                                <td>
                                    {{--                                        <a href="" class="btn btn-info">Sửa</a>--}}
                                    <button id="{{ $item->id }}"  class="btn btn-info" data-toggle="modal" data-target="#exampleModal1" onclick="brandEdit(this.id)">Sửa</button>
                                    <a href="{{ URL::to('admin/brand/delete/'.$item->id) }}" class="btn btn-danger" id="delete">Xóa</a>
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

    <!-- Modal Thêm danh mục con-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm mới nhãn hiệu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.brand.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body pd-20">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên nhãn hiệu</label>
                            <input type="text" class="form-control" id="brand_name" aria-describedby="emailHelp" name="brand_name" placeholder="Tên nhãn hiệu">
                            <br>
                            <label for="exampleInputEmail1">Logo nhãn hiệu</label><br>
                            <input type="file" name="brand_logo" id="brand_logo">
                            {{--                            <input type="text" class="form-control" id="category_name" aria-describedby="emailHelp" name="category_name" placeholder="Tên danh mục">--}}
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
    <!-- Modal Sửa danh mục con-->
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sửa nhãn hiệu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.brand.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body pd-20">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên nhạn hiệu</label>
                            <input type="text" class="form-control" id="brand_name_old" aria-describedby="emailHelp" name="brand_name">
                            <br/><br/>
                            <label for="exampleInputEmail1">Logo nhãn hiệu</label><br>
                            <input type="file" name="brand_logo" id="brand_logo">

                        </div>
                        <div class="modal-footer">
                            <input type="hidden" id="brand_id" name="brand_id">
                            <input type="hidden" id="brand_logo_old" name="brand_logo_old">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">Sửa</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection
