@extends('admin.admin_layout')

@section('content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.index') }}">Trang chủ</a>
            <a class="breadcrumb-item" href="index.html">Danh mục</a>
            <span class="breadcrumb-item active">Danh mục con</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Danh sách danh mục con<a href="" class="btn btn-sm btn-warning" style="float: right" data-toggle="modal" data-target="#exampleModal">THÊM MỚI</a></h6>
                <br>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">STT</th>
                            <th class="wd-30p">Tên danh mục con</th>
                            <th class="wd-30p">Tên danh mục</th>
                            <th class="wd-30p">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subcategory as $key => $item)
                            <tr>
                                <td>{{ $key +1 }}</td>
                                <td>{{ $item->subcategory_name }}</td>
                                <td>{{ $item->category_name }}</td>
                                <td>
                                    {{--                                        <a href="" class="btn btn-info">Sửa</a>--}}
                                    <button id="{{ $item->id }}"  class="btn btn-info" data-toggle="modal" data-id="{{ $item->id }}" data-target="#exampleModal1" onclick="subcategoryEdit(this.id)">Sửa</button>
                                    <a href="{{ URL::to('admin/subcategory/delete/'.$item->id) }}" class="btn btn-danger" id="delete">Xóa</a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Thêm mới danh mục con</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.subcategory.create') }}" method="POST">
                    @csrf
                    <div class="modal-body pd-20">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục con</label>
                            <input type="text" class="form-control" id="subcategory_name" aria-describedby="emailHelp" name="subcategory_name" placeholder="Tên danh mục con">
                            <br>
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <select class="form-control" name="category_id">
                                @foreach($category as $item)
                                    <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                @endforeach
                            </select>
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
                    <h5 class="modal-title" id="exampleModalLabel">Sửa danh mục con</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.subcategory.update') }}" method="POST">
                    @csrf
                    <div class="modal-body pd-20">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục con</label>
                            <input type="text" class="form-control" id="subcategory_old" aria-describedby="emailHelp" name="subcategory_name">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <select class="form-control" name="category_id" id="category_id">
                                @foreach($category as $item)
                                <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="modal-footer">
                            <input type="hidden" id="subcategory_id" name="subcategory_id">
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
        function subcategoryEdit(id){
            $.ajax({
                url: "{{ url('admin/subcategory/edit/') }}/"+id,
                type: "GET",
                dataType: "json",
                success:function (data){
                    $('#subcategory_old').val(data.subcategory.subcategory_name);
                    $('#category_id').val(data.subcategory.category_id);
                    $('#subcategory_id').val(data.subcategory.id);
                }
            })
        }
    </script>


{{--    <script type="text/javascript">--}}
{{--        function categoryEdit(id){--}}
{{--            $.ajax({--}}
{{--                url: "{{ url('admin/category/edit/') }}/"+id,--}}
{{--                type: "GET",--}}
{{--                dataType: "json",--}}
{{--                success:function (data){--}}
{{--                    $('#category_old').val(data.category.category_name);--}}
{{--                    $('#category_id').val(data.category.id);--}}
{{--                }--}}
{{--            })--}}
{{--        }--}}
{{--    </script>--}}


@endsection
