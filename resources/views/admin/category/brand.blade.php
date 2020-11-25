@extends('admin.admin_layout')

@section('content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.index') }}">Trang chủ</a>
            <a class="breadcrumb-item" href="index.html">Danh mục</a>
            <span class="breadcrumb-item active">Nhãn hiệu sản phẩm</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Danh sách nhãn hiệu sản phẩm<a href="" class="btn btn-sm btn-warning" style="float: right" data-toggle="modal" data-target="#exampleModal">THÊM MỚI</a></h6>
                <br>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">STT</th>
                            <th class="wd-30p">Tên nhãn hiệu</th>
                            <th class="wd-30p">Logo</th>
                            <th class="wd-30p">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($brand as $key => $item)
                            <tr>
                                <td>{{ $key +1 }}</td>
                                <td>{{ $item->brand_name }}</td>
                                <td><img src="{{ asset($item->brand_logo) }}" title="{{ $item->brand_name }}" style="width: 70px; height: 50px"></td>
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




    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        function brandEdit(id){
            $.ajax({
                url: "{{ url('admin/brand/edit/') }}/"+id,
                type: "GET",
                dataType: "json",
                success:function (data){
                    $('#brand_name_old').val(data.brand.brand_name);
                    $('#brand_logo_old').val(data.brand.brand_logo);
                    $('#brand_id').val(data.brand.id);
                }
            })
        }
    </script>

    {{--    <script type="text/javascript">--}}
{{--        function subcategoryEdit(id){--}}
{{--            $.ajax({--}}
{{--                url: "{{ url('admin/subcategory/edit/') }}/"+id,--}}
{{--                type: "GET",--}}
{{--                dataType: "json",--}}
{{--                success:function (data){--}}
{{--                    $('#subcategory_old').val(data.subcategory.subcategory_name);--}}
{{--                    $('#category_id').val(data.subcategory.category_id);--}}
{{--                    $('#subcategory_id').val(data.subcategory.id);--}}
{{--                }--}}
{{--            })--}}
{{--        }--}}
{{--    </script>--}}


@endsection
