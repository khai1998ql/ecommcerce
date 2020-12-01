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
            <span class="breadcrumb-item active">Thông tin sản phẩm</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Thông tin sản phẩm</h6>
                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" style="font-weight: bold">Têm sản phẩm: </label>
                                <p>{{ $product->product_name }}</p>
                            </div>
                        </div><!-- col-6 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" style="font-weight: bold">Mã sản phẩm: </label>
                                <p>{{ $product->product_code }}</p>
                            </div>
                        </div><!-- col-6 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label" style="font-weight: bold">Danh mục sản phẩm:</label>
                                <p>{{ $product->category_name }}</p>
                            </div>
                        </div><!-- col-6 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label" style="font-weight: bold">Danh mục con:</label>
                                <p>{{ $product->subcategory_name }}</p>
                            </div>
                        </div><!-- col-6 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label" style="font-weight: bold">Nhãn hiêu:</label>
                                <p>{{ $product->brand_name }}</p>
                            </div>
                        </div><!-- col-6 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" style="font-weight: bold">Giá bản:</label>
                                <p>{{ $product->selling_price }}</p>
                            </div>
                        </div><!-- col-6 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" style="font-weight: bold">Giảm giá(%)</label>
                                @if($product->discount_price == null)
                                    <p>0</p>
                                @else
                                <p>{{ $product->discount_price }}</p>

                                @endif
                            </div>
                        </div><!-- col-6 -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" style="font-weight: bold">Mô tả sản phẩm:</label>
                                <p>{!! $product->product_content !!}</p>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" style="font-weight: bold">Bảng danh sách sản phẩm:</label>
                            </div>
                        </div><!-- col-4 -->
{{--                        //  Lấy danh sách sản phẩm(màu-size-color)--}}
                        @php
                            $product_id = $product->id;
                            $product_detail = DB::table('product_detail')->where('product_id', $product_id)->get();
                        @endphp
                        <div class="col-lg-12 card">
                            <table class="table response">
                                <thead>
                                    <th scope="col">STT</th>
                                    <th scope="col">Mầu</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">Số lượng còn lại</th>
                                </thead>
                                <tbody>
                                    @foreach($product_detail as $key => $item)
                                        <tr>
                                            <td scope="col">{{ $key + 1 }}</td>
                                            <td scope="col">{{ $item->product_color }}</td>
                                            <td scope="col">{{ $item->product_size }}</td>
                                            <td scope="col">{{ $item->product_quantity }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <br/><br/><br/>
                        <div class="col-lg-3">
                            <label class="form-control-label">Avatar: </label><br/><br/>
                            <img src="{{ asset($product->avatar) }}" style="width: 100px;height: 100px">
                        </div><!-- col -->
                        <div class="col-lg-3">
                            <label class="form-control-label">Hình 1: </label><br/><br/>
                            <img src="{{ asset($product->image_one) }}" style="width: 100px;height: 100px">
                        </div><!-- col -->
                        <div class="col-lg-3 mg-t-40 mg-lg-t-0">
                            <label class="form-control-label">Hình 2: </label><br/><br/>
                            <img src="{{ asset($product->image_two) }}" style="width: 100px;height: 100px">
                        </div><!-- col -->
                        <div class="col-lg-3 mg-t-40 mg-lg-t-0">
                            <label class="form-control-label">Hình 3: </label><br/><br/>
                            <img src="{{ asset($product->image_three) }}" style="width: 100px;height: 100px">
                        </div><!-- col -->
                    </div><!-- row -->
                    <br/><hr><br/>
                    <div class="row">
                        <div class="col-lg-4">
                            @if($product->hot_deal == 1)
                                <span><p class="badge badge-success">Active</p> Giảm giá</span>
                            @else
                                <span><p class="badge badge-danger">Inactive</p> Giảm giá</span>
                            @endif
                        </div><!-- col-3 -->
                        <div class="col-lg-4">
                            @if($product->best_rated == 1)
                                <span><p class="badge badge-success">Active</p> Giá tốt</span>
                            @else
                                <span><p class="badge badge-danger">Inactive</p> Giá tốt</span>
                            @endif
                        </div><!-- col-3 -->
                        <div class="col-lg-4">
                            @if($product->hot_new == 1)
                                <span><p class="badge badge-success">Active</p> Mới</span>
                            @else
                                <span><p class="badge badge-danger">Inactive</p> Mới</span>
                            @endif
                        </div><!-- col-3 -->
                        <div class="col-lg-4">
                            @if($product->buyone_getone == 1)
                                <span><p class="badge badge-success">Active</p> Mua 1 tặng 1</span>
                            @else
                                <span><p class="badge badge-danger">Inactive</p> Mua 1 tặng 1</span>
                            @endif
                        </div><!-- col-3 -->
                        <div class="col-lg-4">
                            @if($product->hot_deal == 1)
                                <span><p class="badge badge-success">Active</p> Xu hướng</span>
                            @else
                                <span><p class="badge badge-danger">Inactive</p> Xu hướng</span>
                            @endif
                        </div><!-- col-3 -->
                    </div>
{{--                    <br/><br/>--}}
{{--                    <div class="form-layout-footer" style="text-align: center">--}}
{{--                        <button type="submit" class="btn btn-info mg-r-5">Thêm</button>--}}
{{--                        <a href="" class="btn btn-secondary">Trở về</a>--}}
{{--                        --}}{{--                        <button class="btn btn-secondary">Cancel</button>--}}
{{--                    </div><!-- form-layout-footer -->--}}

                </div><!-- form-layout -->
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
