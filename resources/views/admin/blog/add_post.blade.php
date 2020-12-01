@extends('admin.admin_layout')

@section('content')
    {{--    // Multi tag input--}}
    {{--    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>--}}
    <link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.index') }}">Trang chủ</a>
            <a class="breadcrumb-item" href="{{ route('admin.blog_post') }}">Tin tức</a>
            <span class="breadcrumb-item active">Thêm bài viết tin tức</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Thêm bài viết tin tức<a href="{{ route('admin.blog_post') }}" class="btn btn-success btn-sm" style="float: right">TẤT CẢ TIN TỨC</a></h6>
                <form  method="post" action="{{ route('admin.blog_post.create') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Tiêu đề bài viết: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="blog_name" placeholder="Nhập tiêu đề" required>
                                </div>
                            </div><!-- col-6 -->
                            <div class="col-lg-6">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Danh mục bài viết: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" data-placeholder="Danh mục bài viết" name="blog_category_id" id="blog_category_id" required>
                                        <option>Chon danh mục blog</option>
                                        @foreach($blog_category as $item)

                                            <option value="{{ $item->id }}">{{ $item->blog_category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-6 -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Nội dung bài viết: <span class="tx-danger">*</span></label>
                                    <textarea class="form-control" name="blog_content" id="summernote" required></textarea>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-12">
                                <label class="form-control-label">Hình đại diện: <span class="tx-danger">*</span></label><br/>
                                <label class="custom-file">
                                    <input type="file" id="file" class="custom-file-input" name="blog_image" onchange="readURL1(this);" required>
                                    <span class="custom-file-control"></span>
                                    <img src="#" id="one">
                                </label>
                            </div><!-- col -->

                        <br/><br/>
                        </div>
                        <div class="form-layout-footer" style="text-align: center">
                            <button type="submit" class="btn btn-info mg-r-5">Thêm</button>
                            <a href="" class="btn btn-secondary">Trở về</a>
                            {{--                        <button class="btn btn-secondary">Cancel</button>--}}
                        </div><!-- form-layout-footer -->

                    </div><!-- form-layout -->
                </form>
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

    // Multi tag input
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

    <script type="text/javascript">
        function readURL1(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#one')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection
