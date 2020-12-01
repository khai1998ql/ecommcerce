<?php

    if(Session::has('orderby')){
        $product = DB::table('products')
            ->join('product_detail', 'products.id', 'product_detail.product_id')
            ->join('subcategories', 'products.subcategory_id', 'subcategories.id')
            ->where('product_detail.product_color', $color)
            ->where('products.status', 1)
            ->distinct('products.id')
            ->select('products.*', 'subcategories.subcategory_name')
            ->orderBy('selling_price', Session::get('orderby'))
            ->paginate(8);
    }else{
        $product = DB::table('products')
            ->join('product_detail', 'products.id', 'product_detail.product_id')
            ->join('subcategories', 'products.subcategory_id', 'subcategories.id')
            ->where('product_detail.product_color', $color)
            ->where('products.status', 1)
            ->distinct('products.id')
            ->select('products.*', 'subcategories.subcategory_name')
            ->paginate(8);
    }


// Lấy màu sản phẩm
$product_detail = DB::table('product_detail')->get();
$dataColor = array();
foreach ($product_detail as $key => $item){
    $dataColor[$key] = $item->product_color;
}
$color = array_unique($dataColor);

// Lấy nhãn hiệu
$brand = DB::table('brands')->get();
// Lấy sản phẩm ngãu nhiên
$Ran = Db::table('products')
    ->join('subcategories', 'products.subcategory_id', 'subcategories.id')
    ->where('products.status', 1)
    ->select('products.*', 'subcategories.subcategory_name')
    ->get();
//    dd($productRan);
$ran = array();
foreach ($Ran as $keyRan => $itemRan){
    $ran[$keyRan] = $itemRan->id;
}
$dataRan1 = array_random($ran, 3);
$productRan1 = array();
foreach ($Ran as $keyRan => $itemRan){
    foreach ($dataRan1 as $keyData => $ItemData){
        if($itemRan->id == $ItemData){
            $productRan1[$keyRan] = $itemRan;
        }
    }
}
$dataRan2 = array_random($ran, 3);
$productRan2 = array();
foreach ($Ran as $keyRan => $itemRan){
    foreach ($dataRan2 as $keyData => $ItemData){
        if($itemRan->id == $ItemData){
            $productRan2[$keyRan] = $itemRan;
        }
    }
}
//    dd($productRan);

?>
@extends('layouts.app')
@section('content')

    <!-- breadcrumbs-area-start -->
    <div class="breadcrumbs-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-menu">
                        <ul>
                            <li><a href="{{ route('index') }}">Trang chủ</a></li>
                            <li><a href="" class="active">Tìm kiếm sản phầm có màu: <span style="color: red">{{ $arrayColor['color'] }}</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs-area-end -->
    <!-- shop-main-area-start -->
    <div class="shop-main-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="shop-left">
                        <div class="section-title-5 mb-30">
                            <h2>Gợi ý mua hàng</h2>
                        </div>
                        <div class="left-title mb-20">
                            <h4>Theo màu</h4>
                        </div>
                        <ul class="list-group">
                            @foreach($color as $keyColor => $itemColor)
                                <?php
                                $product_detail = DB::table('product_detail')->where('product_color', $itemColor)->select('product_id')->groupBy('product_id')->get();
                                //                                    dd($product_detail);
                                ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="{{ URL::to('search/color/'.$itemColor) }}">{{ $itemColor }}</a>
                                    <span class="badge badge-primary badge-pill">{{ count($product_detail) }}</span>
                                </li>
                            @endforeach
                        </ul>
                        <div class="left-title mb-20">
                            <h4>Theo nhãn hiệu</h4>
                        </div>
                        <ul class="list-group">
                            @foreach($brand as $keyBrand => $itemBrand)
                                <?php
                                $product_brand = DB::table('products')->where('brand_id', $itemBrand->id)->get();
                                ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="{{ URL::to('search/brand/'.$itemBrand->brand_name) }}">{{ $itemBrand->brand_name }}</a>
                                    <span class="badge badge-primary badge-pill">{{ count($product_brand) }}</span>
                                </li>
                            @endforeach
                        </ul>
                        <div class="left-title mb-20">
                            <h4>Theo giá</h4>
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="{{ URL::to('search/price/0/200000') }}">Từ 0-{{ formatPrice(200000) }}</a>
                                    <span class="badge badge-primary badge-pill">14</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="{{ URL::to('search/price/200000/500000') }}">Từ {{ formatPrice(200000) }}-{{ formatPrice(500000) }}</a>
                                    <span class="badge badge-primary badge-pill">2</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="{{ URL::to('search/price/500000/500000') }}">Từ {{ formatPrice(500000) }} trở lên</a>
                                    <span class="badge badge-primary badge-pill">1</span>
                                </li>
                            </ul>
                        </div>
                        <div class="left-title mb-20">
                            <h4>Sản phẩm ngẫu nhiên</h4>
                        </div>
                        <div class="random-area mb-30">
                            <div class="product-active-2 owl-carousel">
                                <div class="product-total-2">
                                    @foreach($productRan1 as $key => $item)
                                        <div class="single-most-product bd mb-18">
                                            <div class="most-product-img">
                                                <a href="{{ URL::to('product/'.to_sub($item->subcategory_name).'/'.to_sub($item->product_name)) }}"><img src="{{ $item->avatar }}" /></a>
                                            </div>
                                            <div class="most-product-content">
                                                {{--                                            <div class="product-rating">--}}
                                                {{--                                                <ul>--}}
                                                {{--                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>--}}
                                                {{--                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>--}}
                                                {{--                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>--}}
                                                {{--                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>--}}
                                                {{--                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>--}}
                                                {{--                                                </ul>--}}
                                                {{--                                            </div>--}}
                                                <h4><a href="{{ URL::to('product/'.to_sub($item->subcategory_name).'/'.to_sub($item->product_name)) }}">{{ $item->product_name }}</a></h4>
                                                <div class="product-price">
                                                    <ul>
                                                        @if($item->discount_price == NULL)
                                                            <li>{{ formatPrice($item->selling_price) }}</li>
                                                        @else
                                                            <li>{{ formatPriceSalePer($item->selling_price, $item->discount_price) }}</li>
                                                            <li class="old-price">{{ formatPrice($item->selling_price) }}</li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="product-total-2">
                                    @foreach($productRan2 as $key => $item)
                                        <div class="single-most-product bd mb-18">
                                            <div class="most-product-img">
                                                <a href="{{ URL::to('product/'.to_sub($item->subcategory_name).'/'.to_sub($item->product_name)) }}"><img src="{{ $item->avatar }}" /></a>
                                            </div>
                                            <div class="most-product-content">
                                                {{--                                            <div class="product-rating">--}}
                                                {{--                                                <ul>--}}
                                                {{--                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>--}}
                                                {{--                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>--}}
                                                {{--                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>--}}
                                                {{--                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>--}}
                                                {{--                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>--}}
                                                {{--                                                </ul>--}}
                                                {{--                                            </div>--}}
                                                <h4><a href="{{ URL::to('product/'.to_sub($item->subcategory_name).'/'.to_sub($item->product_name)) }}">{{ $item->product_name }}</a></h4>
                                                <div class="product-price">
                                                    <ul>
                                                        @if($item->discount_price == NULL)
                                                            <li>{{ formatPrice($item->selling_price) }}</li>
                                                        @else
                                                            <li>{{ formatPriceSalePer($item->selling_price, $item->discount_price) }}</li>
                                                            <li class="old-price">{{ formatPrice($item->selling_price) }}</li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                    {{--                    <div class="category-image mb-30">--}}
                    {{--                        <a href="#"><img src="img/banner/32.jpg" alt="banner" /></a>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="section-title-5 mb-30">--}}
                    {{--                        <h2>Book</h2>--}}
                    {{--                    </div>--}}
                    <div class="toolbar mb-30">
                        <div class="shop-tab">
                            <div class="tab-3">
                                <ul>
                                    <li class="active"><a href="#th" data-toggle="tab"><i class="fa fa-th-large"></i>Lưới</a></li>
                                    <li><a href="#list" data-toggle="tab"><i class="fa fa-bars"></i>Danh sách</a></li>
                                </ul>
                            </div>
                            <div class="list-page">
                                <?php
                                $page = 1;
                                if(isset($_GET['page'])){
                                    $page = intval($_GET['page']);
                                }else{
                                    $page = 1;
                                }
                                $x = 1 + ($page-1) * 8;
                                $y = count($product) + ($page - 1) * 8;

                                $productY = DB::table('products')
                                    ->join('product_detail', 'products.id', 'product_detail.product_id')
                                    ->join('subcategories', 'products.subcategory_id', 'subcategories.id')
                                    ->where('product_detail.product_color', $arrayColor['color'])
                                    ->where('products.status', 1)
                                    ->distinct('products.id')
                                    ->select('products.*', 'subcategories.subcategory_name')
                                    ->get();
                                $sum = count($productY);

                                ?>
                                <p>Hiển thị  {{ $x }}-{{ $y }} trong tổng {{ $sum }} sản phẩm</p>
                            </div>
                        </div>
                        <div class="toolbar-sorter">
                            <span>Sắp xếp</span>
                            <select id="orderby" name="orderby" class="sorter-options" data-role="sorter">
                                <option <?php if(Session::has('orderby')){ if(Session::get('orderby') == "ASC"){ echo 'selected="selected"'; } } ?>  value="ASC"> Giá từ thấp lên cao </option>
                                <option <?php if(Session::has('orderby')){ if(Session::get('orderby') == "DESC"){ echo 'selected="selected"'; } } ?> value="DESC"> Giá từ cao xuống thấp </option>
                                <option <?php if(!Session::has('orderby')){ echo 'selected="selected"'; } ?> value="1">Theo danh sách</option>
                            </select>
                            {{--                                <a href="#"><i class="fa fa-arrow-up"></i></a>--}}
                        </div>
                    </div>
                    <!-- tab-area-start -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="th">
                            <div class="row">
                            @foreach($product as $itemPro)
                                <!--                                    --><?php
                                    //                                        dd($itemPro);
                                    //                                    ?>
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <!-- single-product-start -->
                                        <div class="product-wrapper mb-40">
                                            <div class="product-img">
                                                <a href="#">
                                                    <img src="{{ asset($itemPro->avatar) }}" alt="book" class="primary" />
                                                </a>
                                                <div class="quick-view">
                                                    <a class="action-view" id="{{ $itemPro->id }}" onclick="detail(this.id)"  href="#" data-target="#productModal" data-toggle="modal" title="Xem nhanh">
                                                        <i class="fa fa-search-plus"></i>
                                                    </a>
                                                </div>
                                                <div class="product-flag">
                                                    <ul>
                                                        @if($itemPro->hot_new == 1)
                                                            <li><span class="sale">new</span></li>
                                                        @else

                                                        @endif

                                                        @if($itemPro->discount_price != NULL)
                                                            <li><span class="discount-percentage">-{{ $itemPro->discount_price }}%</span></li>
                                                        @else

                                                        @endif

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-details text-center">
                                                <div class="product-rating">
                                                    <ul>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    </ul>
                                                </div>
                                                <h4><a href="{{ URL::to('product/'.to_sub($itemPro->subcategory_name).'/'.to_sub($itemPro->product_name)) }}">{{ $itemPro->product_name }}</a></h4>
                                                <div class="product-price">
                                                    <ul>
                                                        @if($itemPro->discount_price == NULL)
                                                            <li>{{ formatPrice($itemPro->selling_price) }}</li>
                                                        @else
                                                            <li>{{ formatPriceSalePer($itemPro->selling_price, $itemPro->discount_price) }}</li>
                                                            <li class="old-price">{{ formatPrice($itemPro->selling_price) }}</li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-link">
                                                <div class="product-button">
                                                    <a href="#" id="{{ $itemPro->id }}" onclick="detail(this.id)" title="Thêm vào giỏ hàng" data-target="#productModal" data-toggle="modal"><i class="fa fa-shopping-cart"></i>Thêm nhanh</a>
                                                </div>
                                                <div class="add-to-link">
                                                    <ul>
                                                        <li><a href="{{ URL::to('product/'.to_sub($itemPro->subcategory_name).'/'.to_sub($itemPro->product_name)) }}" title="Chi tiết"><i class="fa fa-external-link"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single-product-end -->
                                    </div>

                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="list">
                        @foreach($product as $itemPro)
                            <!-- single-shop-start -->
                                <div class="single-shop mb-30">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="product-wrapper-2">
                                                <div class="product-img">
                                                    <a href="#">
                                                        <img src="{{ asset($itemPro->avatar) }}" alt="book" class="primary" style="width: 200px;height: 300px" />
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                            <div class="product-wrapper-content">
                                                <div class="product-details">
                                                    <div class="product-rating">
                                                        <ul>
                                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <h4><a href="{{ URL::to('product/'.to_sub($itemPro->subcategory_name).'/'.to_sub($itemPro->product_name)) }}">{{ $itemPro->product_name }}</a></h4>
                                                    <div class="product-price">
                                                        <ul>
                                                            @if($itemPro->discount_price == NULL)
                                                                <li>{{ formatPrice($itemPro->selling_price) }}</li>
                                                            @else
                                                                <li>{{ formatPriceSalePer($itemPro->selling_price, $itemPro->discount_price) }}</li>
                                                                <li class="old-price">{{ formatPrice($itemPro->selling_price) }}</li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                    <p>{!! str_limit($itemPro->product_content, $limit = 4) !!}</p>
                                                </div>
                                                <div class="product-link">
                                                    <div class="product-button">
                                                        <a href="#" title="Mua ngay" id="{{ $itemPro->id }}" onclick="detail(this.id)"  href="#" data-target="#productModal" data-toggle="modal"><i class="fa fa-shopping-cart"></i>Mua nhanh</a>
                                                    </div>
                                                    <div class="add-to-link">
                                                        <ul>
                                                            <li><a href="{{ URL::to('product/'.to_sub($itemPro->subcategory_name).'/'.to_sub($itemPro->product_name)) }}" title="Chi tiết sản phẩm"><i class="fa fa-external-link"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-shop-end -->
                            @endforeach
                        </div>
                    </div>
                    <!-- tab-area-end -->
                    <!-- pagination-area-start -->
                    <div class="row" style="float: right">
                        {{ $product->links() }}
                    </div>
                    <!-- pagination-area-end -->
                </div>
            </div>
        </div>
    </div>
    <!-- shop-main-area-end -->
    <!-- Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <div class="modal-tab">
                                <div class="product-details-large tab-content">
                                    <div class="tab-pane active" id="image-1">
                                        <img src="" alt="" id="productImg1" style="padding: 15px" /><br>
                                    </div>

                                    <div class="tab-pane" id="image-2">
                                        <img src="" alt="" id="productImg2" style="padding: 15px" /><br>
                                    </div>
                                    <div class="tab-pane" id="image-3">
                                        <img src="" alt="" id="productImg3" style="padding: 15px" /><br>
                                    </div>
                                    <div class="tab-pane" id="image-4">
                                        <img src="" alt="" id="productImg4" style="padding: 15px" /><br>
                                    </div>
                                </div>
                                <div class="product-details-small quickview-active owl-carousel">
                                    <a class="active" href="#image-1"><img src="" alt="" id="productImgSmall1" /></a>
                                    <a href="#image-2"><img src="" alt="" id="productImgSmall2" /></a>
                                    <a href="#image-3"><img src="" alt="" id="productImgSmall3" /></a>
                                    <a href="#image-4"><img src="" alt="" id="productImgSmall4" /></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                            <div class="modal-pro-content">
                                <h4 id="productName"></h4>
                                <div class="price">
                                    <span id="productPrice"></span>
                                </div>
                                {{--                                <p id="productContent"></p>--}}
                                <form action="{{ route('cart.product.add') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="select-option-part">
                                                <label>Màu*</label>
                                                <select class="select" id="productColor" name="productColor">
                                                    {{--                                                    <option value="">S</option>--}}
                                                    {{--                                                    <option value="">M</option>--}}
                                                    {{--                                                    <option value="">L</option>--}}
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="select-option-part">
                                                <label>Size*</label>
                                                <select class="select" name="productSize" id="productSize">
                                                    {{--                                                    <option value="">S</option>--}}
                                                    {{--                                                    <option value="">M</option>--}}
                                                    {{--                                                    <option value="">L</option>--}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="select-option-part">
                                                <label>Số lượng*</label>
                                                <input type="number" id="qty" name="qty" min="1" value="1" />
                                            </div>

                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <h4>Thông tín sản phẩm</h4>
                                        <div class="col-lg-8">
                                            <ul class="list-group">
                                                <li class="list-group-item">Mã sản phẩm: <span id="productCode" style="float: right;"></span></li>
                                                <li class="list-group-item">Danh mục: <span id="productCat" style="float: right;"></span></li>
                                                <li class="list-group-item">Danh mục con: <span id="productSub" style="float: right;"></span></li>
                                                <li class="list-group-item">Nhãn hiệu: <span id="productBrand" style="float: right;"></span></li>
                                                <li class="list-group-item">Trạng thái: <span class="badge" style="background: green; color: white;">Có sẵn</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <br/><br/>
                                    <div class="row">
                                        <input type="hidden" name="maxQty" id="maxQty">
                                        <input type="hidden" id="product_id" name="product_id">
                                        <button>Thêm vào giỏ hàng</button>
                                    </div>

                                </form>
                                {{--                                <span><i class="fa fa-check"></i> In stock</span>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->


    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script type="text/javascript">

        function detail(id){


            $.ajax({
                url: "{{ url('/product/get/detailProduct/') }}/"+id,
                type: "GET",
                dataType: "json",
                success:function (data){
                    $('#productImg1').removeAttr('src');
                    $('#productImg2').removeAttr('src');
                    $('#productImg3').removeAttr('src');
                    $('#productImg3').removeAttr('src');

                    $('#productImgSmall1').removeAttr('src');
                    $('#productImgSmall2').removeAttr('src');
                    $('#productImgSmall3').removeAttr('src');
                    $('#productImgSmall4').removeAttr('src');

                    $('#product_id').val(data.product.id);
                    $('#productName').text(data.product.product_name);
                    $('#productPrice').text(data.product.selling_price - data.product.selling_price*data.product.discount_price/100);
                    $('#productCode').text(data.product.product_code);
                    $('#productCat').text(data.product.category_name);
                    $('#productSub').text(data.product.subcategory_name);
                    $('#productBrand').text(data.product.brand_name);

                    $('#productImg1').attr('src', data.product.image_one);
                    $('#productImg2').attr('src', data.product.image_two);
                    $('#productImg3').attr('src', data.product.image_three);
                    $('#productImg4').attr('src', data.product.image_four);


                    $('#productImgSmall1').attr('src', data.product.image_one_small);
                    $('#productImgSmall2').attr('src', data.product.image_two_small);
                    $('#productImgSmall3').attr('src', data.product.image_three_small);
                    $('#productImgSmall4').attr('src', data.product.image_four_small);
                    $('select[name="productColor"]').empty();
                    $('select[name="productColor"]').append('<option>Chọn màu</option>')
                    $.each(data.color, function (key, item){
                        $('select[name="productColor"]').append('<option value="'+item+'">'+item+'</option>')
                    })


                }
            })
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function (){
            $('select[name="productColor"]').on("change", function (){
                var product_id = $('#product_id').val();
                var color = $('#productColor').val();
                $.ajax({
                    url: "{{ url('product/get/sizeProduct/') }}/"+product_id+'/'+color,
                    type: "GET",
                    dataType: "json",
                    success:function (data){
                        $('#qty').val(1);
                        var d = $('select[name="productSize"]').empty();
                        $('select[name="productSize"]').append('<option>Chọn size</option>')
                        $.each(data.product, function (key, item){
                            $('select[name="productSize"]').append('<option value="'+item.product_size+'">'+item.product_size+'</option>')
                        })
                    }
                })
            })
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function (){
            $('select[name="productSize"]').on("change", function (){
                var product_id = $('#product_id').val();
                var color = $('#productColor').val();
                var size = $('#productSize').val();
                $.ajax({
                    url: "{{ url('product/get/maxQty/') }}/"+product_id+'/'+color+'/'+size,
                    type: "GET",
                    dataType: "json",
                    success:function (data){
                        $('#maxQty').val(data.product.product_quantity);
                        $('#qty').attr('max', data.product.product_quantity);
                        $('#qty').val(1);
                    }
                })
            })
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function (){
            $('#qty').on("input", function (){
                var qty = $('#qty').val();
                var maxQty = $('#maxQty').val();
                if(qty*10 > maxQty*10){
                    $('#qty').val(maxQty);
                }else{
                    $('#qty').val(qty);
                }
            })
        })
    </script>
    {{--    // Sắp xép--}}
    <script type="text/javascript">
        $(document).ready(function (){
            $('select[name="orderby"]').on("change", function (){
                var orderby = $('select[name="orderby"]').val();
                $.ajax({
                    url: "{{ url('search/orderby/') }}/"+orderby,
                    type: "GET",
                    success:function (data){
                        location.reload();
                    }
                })
            })
        })
    </script>
@endsection
