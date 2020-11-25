@extends('admin.admin_layout')

@section('content')
    {{--    // Multi tag input--}}
    {{--    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>--}}
    <link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.index') }}">Trang chủ</a>
            <a class="breadcrumb-item" href="{{ route('admin.product.index') }}">Sản phẩm</a>
            <span class="breadcrumb-item active">Sửa thông tin phẩm sản phẩm</span>
        </nav>
{{--        // Sửa chung--}}
        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Sửa thông tin sản phẩm</h6>
                <form  method="post" action="{{ route('admin.product.update.info') }}">
                    @csrf
                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Têm sản phẩm: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_name" value="{{ $product->product_name }}">
                                </div>
                            </div><!-- col-6 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Mã sản phẩm: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_code" value="{{ $product->product_code }}">
                                </div>
                            </div><!-- col-6 -->
                            <div class="col-lg-6">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Danh mục sản phẩm: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" data-placeholder="Danh mục sản phẩm" name="category_id" id="category_id">
                                        <option>Chon danh mục sản phẩm</option>
                                        @foreach($category as $item)
                                            <option <?php if($item->id == $product->category_id){ echo "selected"; } ?> value="{{ $item->id }}">{{ $item->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-6 -->
                            <div class="col-lg-6">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Danh mục con: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" data-placeholder="Danh mục con" name="subcategory_id" id="subcategory_id">
                                        @foreach($subcategory as $item)
                                            <option <?php if($item->id == $product->subcategory_id){ echo "selected"; } ?> value="{{ $item->id }}">{{ $item->subcategory_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-6 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Nhãn hiêu: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" data-placeholder="Nhãn hiệu" name="brand_id">
                                        @foreach($brand as $item)
                                            <option <?php if($item->id == $product->brand_id){ echo "selected"; } ?> value="{{ $item->id }}">{{ $item->brand_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-6 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Giá bản: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="selling_price" value="{{ $product->selling_price }}">
                                </div>
                            </div><!-- col-6 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Giảm giá(%): <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="discount_price" value="{{ $product->discount_price }}">
                                </div>
                            </div><!-- col-6 -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Mô tả sản phẩm: <span class="tx-danger">*</span></label>
                                    <textarea class="form-control" name="product_content" id="summernote">{!! $product->product_content !!}</textarea>
                                </div>
                            </div><!-- col-4 -->
{{--                            lấy chi tiết sản phẩm  theo(mau, size, qty)--}}
                            @php
                                $detail = DB::table('product_detail')->where('product_id', $product->id)->get();
                                $count = count($detail);
                                $arrStt = array();
                            @endphp
                            @foreach($detail as $key => $item)
                                @php
                                    $arrStt[$key] = $item->id;
                                    $data_detail = array();
                                    $data_detail['product_color'] = $item->product_color;
                                    $data_detail['product_size'] = $item->product_size;
                                    $data_detail['product_quantity'] = $item->product_quantity;
                                    $detail = implode(',', $data_detail);
                                @endphp
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Nhập (màu. size, qty):</label><br/>
                                        <input class="form-control" type="text" name="detail_{{ $item->id }}" value="{{ $detail }}" id="input" data-role="tagsinput">
                                    </div>
                                </div><!-- col-6 -->
                            @endforeach
{{--                            Gộp chuỗi stt--}}
                            @php
                                $stt = implode(',', $arrStt);
                            @endphp
{{--                            @for($i = 1; $i <= 16; $i++)--}}
{{--                                --}}
{{--                            @endfor--}}
                            <br/><br/><br/>

                        </div><!-- row -->
                        <br/><hr><br/>
                        <div class="row">
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" <?php if($product->hot_deal == 1){ echo "checked"; } ?> name="hot_deal" value="1"><span>Giảm giá</span>
                                </label>
                            </div><!-- col-3 -->
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" <?php if($product->best_rated == 1){ echo "checked"; } ?> name="best_rated" value="1"><span>Giá tốt</span>
                                </label>
                            </div><!-- col-3 -->
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" <?php if($product->hot_new == 1){ echo "checked"; } ?> name="hot_new" value="1"><span>Mới</span>
                                </label>
                            </div><!-- col-3 -->
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" <?php if($product->buyone_getone == 1){ echo "checked"; } ?> name="buyone_getone" value="1"><span>Mua 1 tặng 1</span>
                                </label>
                            </div><!-- col-3 -->
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" <?php if($product->trend == 1){ echo "checked"; } ?> name="trend" value="1"><span>Xu hướng</span>
                                </label>
                            </div><!-- col-3 -->
                        </div>
                        <br/><br/>
                        <div class="form-layout-footer" style="text-align: center">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="count" value="{{ $count }}">
                            <input type="hidden" name="stt" value="{{ $stt }}">
                            <button type="submit" class="btn btn-info mg-r-5">Sửa</button>
                            <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">Trở về</a>
                            {{--                        <button class="btn btn-secondary">Cancel</button>--}}
                        </div><!-- form-layout-footer -->

                    </div><!-- form-layout -->
                </form>
            </div><!-- card -->

        </div><!-- sl-pagebody -->
{{--        // Sửa phần (mầu, size, qty)--}}
        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Thêm thuộc tính sản phẩm</h6>
                <form  method="post" action="{{ route('admin.product.update.detail') }}">
                    @csrf
                    <div class="form-layout">
                        <div class="row mg-b-25">

                            @for($i = 1; $i <= 16; $i++)
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Nhập (màu. size, qty):({{ $i }})</label><br/>
                                        <input class="form-control" type="text" name="detail{{ $i }}" id="input" data-role="tagsinput">
                                    </div>
                                </div><!-- col-6 -->
                            @endfor

                        </div><!-- row -->

                        <br/><br/>
                        <div class="form-layout-footer" style="text-align: center">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="btn btn-info mg-r-5">Thêm</button>
                            <a href="" class="btn btn-secondary">Trở về</a>
                            {{--                        <button class="btn btn-secondary">Cancel</button>--}}
                        </div><!-- form-layout-footer -->

                    </div><!-- form-layout -->
                </form>
            </div><!-- card -->

        </div><!-- sl-pagebody -->

{{--        // Sừa phần anh--}}
        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Thay đổi hình ảnh sản phẩm</h6>
                <form  method="post" action="{{ route('admin.product.update.image') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-layout">
                        <h5 style="font-weight: bold; color: red">Hình ảnh cũ</h5>
                        <div class="row mg-b-25">
                            <div class="col-lg-3">
                                <label class="form-control-label">Avatar:<br/>
                                <img src="{{ asset($product->avatar) }}" style="width: 100px;height: 100px">
                            </div><!-- col -->
                            <div class="col-lg-3">
                                <label class="form-control-label">Hình 1:</label><br/>
                                <img src="{{ asset($product->image_one) }}" style="width: 100px;height: 100px">
                            </div><!-- col -->
                            <div class="col-lg-3 mg-t-40 mg-lg-t-0">
                                <label class="form-control-label">Hình 2:</label><br/>
                                <img src="{{ asset($product->image_two) }}" style="width: 100px;height: 100px">
                            </div><!-- col -->
                            <div class="col-lg-3 mg-t-40 mg-lg-t-0">
                                <label class="form-control-label">Hình 3:</label><br/>
                                <img src="{{ asset($product->image_three) }}" style="width: 100px;height: 100px">
                            </div><!-- col -->
                        </div><!-- row -->
                        <br/><br/>
                        <h5 style="font-weight: bold; color: red">Hình ảnh cập nhật</h5><br>
                        <div class="row mg-b-25">

                            <div class="col-lg-2">
                                <label class="form-control-label">Avatar: <span class="tx-danger">*</span></label><br/>
                                <label class="custom-file">
                                    <input type="file" id="file" class="custom-file-input" name="avatar" onchange="readURL0(this);">
                                    <span class="custom-file-control"></span>
                                    <img src="#" id="zero">
                                </label>
                            </div><!-- col -->
                            <div class="col-lg-2">
                                <label class="form-control-label">Hình 1: <span class="tx-danger">*</span></label><br/>
                                <label class="custom-file">
                                    <input type="file" id="file" class="custom-file-input" name="image_one" onchange="readURL1(this);">
                                    <span class="custom-file-control"></span>
                                    <img src="#" id="one">
                                </label>
                            </div><!-- col -->
                            <div class="col-lg-2 mg-t-40 mg-lg-t-0">
                                <label class="form-control-label">Hình 2: <span class="tx-danger">*</span></label><br/>
                                <label class="custom-file">
                                    <input type="file" id="file" class="custom-file-input" name="image_two" onchange="readURL2(this);">
                                    <span class="custom-file-control"></span>
                                    <img src="#" id="two">
                                </label>
                            </div><!-- col -->
                            <div class="col-lg-2 mg-t-40 mg-lg-t-0">
                                <label class="form-control-label">Hình 3: <span class="tx-danger">*</span></label><br/>
                                <label class="custom-file">
                                    <input type="file" id="file" class="custom-file-input" name="image_three" onchange="readURL3(this);">
                                    <span class="custom-file-control"></span>
                                    <img src="#" id="three">
                                </label>
                            </div><!-- col -->
                            <div class="col-lg-2 mg-t-40 mg-lg-t-0">
                                <label class="form-control-label">Hình 4: <span class="tx-danger">*</span></label><br/>
                                <label class="custom-file">
                                    <input type="file" id="file" class="custom-file-input" name="image_four" onchange="readURL4(this);">
                                    <span class="custom-file-control"></span>
                                    <img src="#" id="four">
                                </label>
                            </div><!-- col -->
                        </div><!-- row -->

                        <br/><br/>
                        <div class="form-layout-footer" style="text-align: center">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="btn btn-info mg-r-5">Cập nhật</button>
                            <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">Trở về</a>
                            {{--                        <button class="btn btn-secondary">Cancel</button>--}}
                        </div><!-- form-layout-footer -->

                    </div><!-- form-layout -->
                </form>
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

    // Multi tag input
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    // Danh mục con
    <script type="text/javascript">
        $(document).ready(function (){
            $('select[name="category_id"]').on("change", function (){
                var category_id = $(this).val();
                if(category_id){
                    $.ajax({
                        url: "{{ url('admin/product/get/subcategory/') }}/"+category_id,
                        type: "GET",
                        dataType: "json",
                        success:function (data){
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data.subcategory, function (key, item){
                                $('select[name="subcategory_id"]').append('<option value="'+item.id+'">'+item.subcategory_name+'</option>');
                            })
                        }
                    })
                }else {
                    alert("...!");
                }
            })
        })
    </script>

    <script type="text/javascript">
        function readURL0(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#zero')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
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
    <script type="text/javascript">
        function readURL2(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#two')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script type="text/javascript">
        function readURL3(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#three')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script type="text/javascript">
        function readURL4(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#four')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
