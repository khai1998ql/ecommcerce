@extends('admin.admin_layout')

@section('content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.index') }}">Trang chủ</a>
            <a class="breadcrumb-item" href="index.html">Tin tức</a>
            <span class="breadcrumb-item active">Danh mục </span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Danh sách danh mục tin tức<a href="" class="btn btn-sm btn-warning" style="float: right" data-toggle="modal" data-target="#exampleModal">THÊM MỚI</a></h6>
                <br>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">STT</th>
                            <th class="wd-30p">Tên danh mục</th>
                            <th class="wd-30p">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($blog_cateogry as $key => $item)
                            <tr>
                                <td>{{ $key +1 }}</td>
                                <td>{{ $item->blog_category_name }}</td>
                                <td>
                                    {{--                                        <a href="" class="btn btn-info">Sửa</a>--}}
                                    <button id="{{ $item->id }}"  class="btn btn-info" data-toggle="modal" data-target="#exampleModal1" onclick="blog_category(this.id)">Sửa</button>
                                    <a href="{{ URL::to('admin/blog/blog_category/delete/'.$item->id) }}" class="btn btn-danger" id="delete">Xóa</a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Thêm mới danh mục tin tức</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.blog_category.create') }}" method="POST">
                    @csrf
                    <div class="modal-body pd-20">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục tin tức</label>
                            <input type="text" class="form-control" id="blog_category_name" aria-describedby="emailHelp" name="blog_category_name" placeholder="Tên danh mục tin tức">
                            <br>

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
                    <h5 class="modal-title" id="exampleModalLabel">Sửa danh mục tin tức</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.blog_category.update') }}" method="POST">
                    @csrf
                    <div class="modal-body pd-20">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục tin tức</label>
                            <input type="text" class="form-control" id="blog_category_name_old" aria-describedby="emailHelp" name="blog_category_name">
                            <br>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" id="blog_category_id" name="blog_category_id">
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
        function blog_category(id){
            $.ajax({
                url: "{{ url('admin/blog/blog_category/get/') }}/"+id,
                type: "GET",
                dataType: "json",
                success:function (data){
                    $('#blog_category_name_old').val(data.blog_category.blog_category_name);
                    $('#blog_category_id').val(data.blog_category.id);
                }
            })
        }
    </script>



@endsection
