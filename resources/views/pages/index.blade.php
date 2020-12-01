<?php

    // Lấy sản phẩm mới
    $productNew = DB::table('products')
            ->join('categories', 'products.category_id', 'categories.id')
            ->join('subcategories', 'products.subcategory_id', 'subcategories.id')
            ->where('products.status', 1)
            ->where('products.hot_new', 1)
            ->select('products.*', 'subcategories.subcategory_name')
            ->orderBy('products.id', 'DESC')
            ->limit(10)
            ->get();
    // Lấy sản phẩm đàng giảm giá
    $productSale = DB::table('products')
        ->join('categories', 'products.category_id', 'categories.id')
        ->join('subcategories', 'products.subcategory_id', 'subcategories.id')
        ->where('products.status', 1)
        ->where('products.discount_price', '>', 0)
        ->select('products.*', 'subcategories.subcategory_name')
        ->orderBy('products.discount_price', 'DESC')
        ->limit(10)
        ->get();
    // Lấy sản phẩm nhiều lượt xem

    $productView = DB::table('products')
        ->join('categories', 'products.category_id', 'categories.id')
        ->join('subcategories', 'products.subcategory_id', 'subcategories.id')
        ->where('products.status', 1)
        ->select('products.*', 'subcategories.subcategory_name')
        ->orderBy('products.product_view', 'DESC')
        ->limit(10)
        ->get();
    // Lấy 7 cặp sản phẩm mới nhất
    $dataR = DB::table('products')
        ->join('categories', 'products.category_id', 'categories.id')
        ->join('subcategories', 'products.subcategory_id', 'subcategories.id')
        ->where('products.status', 1)
        ->select('products.*', 'subcategories.subcategory_name')
        ->orderBy('products.id', 'DESC')
        ->get();
    $dataNew = array();
    $count = 1;
    $count1 = 1;
    $count2 = 1;
    foreach($dataR as $key => $item){
        if($item->id %2 == 1){
            $dataNew[$count1++][1] = $item;
        }else{
            $dataNew[$count2++][2] = $item;
        }
        if($count1 == 8 && $count2 == 8){
            break;
        }
    }
//    dd($dataNew);

?>


@extends('layouts.app')
@section('content')
    <!-- banner-area-start -->
    <div class="banner-area banner-res-large ptb-35">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="single-banner">
                        <div class="banner-img">
                            <a href="#"><img src="{{ asset('public/frontend/img/banner/1.png')}}" alt="banner" /></a>
                        </div>
                        <div class="banner-text">
                            <h4>Giao hàng miễn phí</h4>
                            <p>Hóa đơn từ 500.000 Đ</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="single-banner">
                        <div class="banner-img">
                            <a href="#"><img src="{{ asset('public/frontend/img/banner/2.png')}}" alt="banner" /></a>
                        </div>
                        <div class="banner-text">
                            <h4>Hoàn tiền khi không hài lòng</h4>
                            <p>Hoàn tiền khi không hài lòng</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 hidden-sm col-xs-12">
                    <div class="single-banner">
                        <div class="banner-img">
                            <a href="#"><img src="{{ asset('public/frontend/img/banner/3.png')}}" alt="banner" /></a>
                        </div>
                        <div class="banner-text">
                            <h4>Thanh toán online</h4>
                            <p>Hỗ trợ thanh toán online</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="single-banner mrg-none-xs">
                        <div class="banner-img">
                            <a href="#"><img src="{{ asset('public/frontend/img/banner/4.png')}}" alt="banner" /></a>
                        </div>
                        <div class="banner-text">
                            <h4>Liên hệ để được hỗ trợ</h4>
                            <p>Gọi ngay : 0355123450</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner-area-end -->
    <!-- slider-area-start -->
    <div class="slider-area">
        <div class="slider-active owl-carousel">
            <div class="single-slider pt-125 pb-130 bg-img" style="background-image:url({{ asset('public/frontend/img/slider/1.jpg')}});">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="slider-content slider-animated-1 text-center">
                                <h1>Huge Sale</h1>
                                <h2>koparion</h2>
                                <h3>Now starting at £99.00</h3>
                                <a href="#">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider slider-h1-2 pt-215 pb-100 bg-img" style="background-image:url({{ asset('public/frontend/img/slider/2.jpg')}});">
                <div class="container">
                    <div class="slider-content slider-content-2 slider-animated-1">
                        <h1>We can help get your</h1>
                        <h2>Books in Order</h2>
                        <h3>and Accessories</h3>
                        <a href="#">Contact Us Today!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider-area-end -->
    <!-- product-area-start -->
    <div class="product-area pt-95 xs-mb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-50">
                        <h2>Sản phẩm nổi bật</h2>
{{--                        <p>Browse the collection of our best selling and top interresting products. <br /> ll definitely find what you are looking for..</p>--}}
                    </div>
                </div>
                <div class="col-lg-12">
                    <!-- tab-menu-start -->
                    <div class="tab-menu mb-40 text-center">
                        <ul>
                            <li class="active"><a href="#Audiobooks" data-toggle="tab">Sản phẩm mới	</a></li>
                            <li><a href="#books"  data-toggle="tab">Đang giảm giá</a></li>
                            <li><a href="#bussiness" data-toggle="tab">Nhiều lượt xem</a></li>
                        </ul>
                    </div>
                    <!-- tab-menu-end -->
                </div>
            </div>
            <!-- tab-area-start -->
            <div class="tab-content">
                <div class="tab-pane active" id="Audiobooks">
                    <div class="tab-active owl-carousel">
                        @foreach($productNew as $key => $item)
                        <!-- single-product-start -->
                        <div class="product-wrapper">
                            <div class="product-img">
                                <a href="{{ URL::to('product/'.to_sub($item->subcategory_name).'/'.to_sub($item->product_name)) }}">
                                    <img src="{{ asset($item->avatar)}}" class="primary" />
                                </a>
                                <div class="quick-view">
                                    <a class="action-view" id="{{ $item->id }}" onclick="detail(this.id)" data-target="#productModal"  href="#" data-toggle="modal" title="Thêm nhanh sản phẩm">
                                        <i class="fa fa-search-plus"></i>
                                    </a>
                                </div>
                                <div class="product-flag">
                                    <ul>
                                        @if($item->hot_new == 1)
                                            <li><span class="sale">new</span></li>
                                        @else
                                        @endif

                                        @if($item->discount_price != NULL)
                                            <li><span class="discount-percentage">-{{ $item->discount_price }}%</span></li>
                                        @else
                                        @endif

                                    </ul>
                                </div>
                            </div>
                            <div class="product-details text-center">
                                <h4><a href="{{ URL::to('product/'.to_sub($item->subcategory_name).'/'.to_sub($item->product_name)) }}">{{ $item->product_name }}</a></h4>
                                <div class="product-price">
                                    <ul>
                                        @if($item->discount_price != NULL)
                                            <li>{{ formatPriceSalePer($item->selling_price, $item->discount_price) }}</li>
                                            <li class="old-price">{{ formatPrice($item->selling_price) }}</li>
                                        @else
                                            <li>{{ formatPrice($item->selling_price) }}</li>
                                        @endif

                                    </ul>
                                </div>
                            </div>
                            <div class="product-link">
                                <div class="product-button">
                                    <a href="#" id="{{ $item->id }}" onclick="detail(this.id)" data-target="#productModal" data-toggle="modal" title="Thêm nhanh sản phẩm"><i class="fa fa-shopping-cart"></i>Thêm nhanh</a>
                                </div>
                                <div class="add-to-link">
                                    <ul>
                                        <li><a href="{{ URL::to('product/'.to_sub($item->subcategory_name).'/'.to_sub($item->product_name)) }}" title="Chi tiết sản phẩm"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- single-product-end -->
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="books">
                    <div class="tab-active owl-carousel">
                        @foreach($productSale as $key => $item)
                        <!-- single-product-start -->
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="{{ URL::to('product/'.to_sub($item->subcategory_name).'/'.to_sub($item->product_name)) }}">
                                        <img src="{{ asset($item->avatar)}}" class="primary" />
                                    </a>
                                    <div class="quick-view">
                                        <a class="action-view" id="{{ $item->id }}" onclick="detail(this.id)" href="#" data-target="#productModal" data-toggle="modal" title="Thêm nhanh sản phẩm">
                                            <i class="fa fa-search-plus"></i>
                                        </a>
                                    </div>
                                    <div class="product-flag">
                                        <ul>
                                            @if($item->hot_new == 1)
                                                <li><span class="sale">new</span></li>
                                            @else
                                            @endif

                                            @if($item->discount_price != NULL)
                                                <li><span class="discount-percentage">-{{ $item->discount_price }}%</span></li>
                                            @else
                                            @endif

                                        </ul>
                                    </div>
                                </div>
                                <div class="product-details text-center">
                                    <h4><a href="{{ URL::to('product/'.to_sub($item->subcategory_name).'/'.to_sub($item->product_name)) }}">{{ $item->product_name }}</a></h4>
                                    <div class="product-price">
                                        <ul>
                                            @if($item->discount_price != NULL)
                                                <li>{{ formatPriceSalePer($item->selling_price, $item->discount_price) }}</li>
                                                <li class="old-price">{{ formatPrice($item->selling_price) }}</li>
                                            @else
                                                <li>{{ formatPrice($item->selling_price) }}</li>
                                            @endif

                                        </ul>
                                    </div>
                                </div>
                                <div class="product-link">
                                    <div class="product-button">
                                        <a href="#" id="{{ $item->id }}" onclick="detail(this.id)" data-target="#productModal" data-toggle="modal" title="Thêm nhanh sản phẩm"><i class="fa fa-shopping-cart"></i>Thêm nhanh</a>
                                    </div>
                                    <div class="add-to-link">
                                        <ul>
                                            <li><a href="{{ URL::to('product/'.to_sub($item->subcategory_name).'/'.to_sub($item->product_name)) }}" title="Chi tiết sản phẩm"><i class="fa fa-external-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-end -->
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="bussiness">
                    <div class="tab-active owl-carousel">
                    @foreach($productView as $key => $item)
                        <!-- single-product-start -->
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="{{ URL::to('product/'.to_sub($item->subcategory_name).'/'.to_sub($item->product_name)) }}">
                                        <img src="{{ asset($item->avatar)}}" class="primary" />
                                    </a>
                                    <div class="quick-view">
                                        <a class="action-view" id="{{ $item->id }}" onclick="detail(this.id)" href="#" data-target="#productModal" data-toggle="modal" title="Thêm nhanh sản phẩm">
                                            <i class="fa fa-search-plus"></i>
                                        </a>
                                    </div>
                                    <div class="product-flag">
                                        <ul>
                                            @if($item->hot_new == 1)
                                                <li><span class="sale">new</span></li>
                                            @else
                                            @endif

                                            @if($item->discount_price != NULL)
                                                <li><span class="discount-percentage">-{{ $item->discount_price }}%</span></li>
                                            @else
                                            @endif

                                        </ul>
                                    </div>
                                </div>
                                <div class="product-details text-center">
                                    <h4><a href="{{ URL::to('product/'.to_sub($item->subcategory_name).'/'.to_sub($item->product_name)) }}">{{ $item->product_name }}</a></h4>
                                    <div class="product-price">
                                        <ul>
                                            @if($item->discount_price != NULL)
                                                <li>{{ formatPriceSalePer($item->selling_price, $item->discount_price) }}</li>
                                                <li class="old-price">{{ formatPrice($item->selling_price) }}</li>
                                            @else
                                                <li>{{ formatPrice($item->selling_price) }}</li>
                                            @endif

                                        </ul>
                                    </div>
                                </div>
                                <div class="product-link">
                                    <div class="product-button">
                                        <a href="#" id="{{ $item->id }}" onclick="detail(this.id)" data-target="#productModal" data-toggle="modal" title="Thêm nhanh sản phẩm"><i class="fa fa-shopping-cart"></i>Thêm nhanh</a>
                                    </div>
                                    <div class="add-to-link">
                                        <ul>
                                            <li><a href="{{ URL::to('product/'.to_sub($item->subcategory_name).'/'.to_sub($item->product_name)) }}" title="Chi tiết sản phẩm"><i class="fa fa-external-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-end -->
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- tab-area-end -->
        </div>
    </div>
    <!-- product-area-end -->
    <!-- new-book-area-start -->
    <div class="new-book-area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title bt text-center pt-100 mb-30 section-title-res">
                        <h2>Sản phẩm mới nhất</h2>
                    </div>
                </div>
            </div>
            <div class="tab-active owl-carousel">
                @foreach($dataNew as $key => $item)
<!--                    --><?php
////                        dd($item);
//
//                    ?>
                <div class="tab-total">
                    @foreach($item as $keyPro => $itemPro)
                    <!-- single-product-start -->
                    <div class="product-wrapper mb-40">
                        <div class="product-img">
                            <a href="{{ URL::to('product/'.to_sub($itemPro->subcategory_name).'/'.to_sub($itemPro->product_name)) }}">
                                <img src="{{ asset($itemPro->avatar)}}" class="primary" />
                            </a>
                            <div class="quick-view">
                                <a class="action-view" href="#" id="{{ $itemPro->id }}}" onclick="detail(this.id)" data-target="#productModal" data-toggle="modal" title="Quick View">
                                    <i class="fa fa-search-plus"></i>
                                </a>
                            </div>
                            <div class="product-flag">
                                <ul>
                                    @if($itemPro->hot_new == 1)
                                        <li><span class="sale">new</span> </li>
                                    @else
                                    @endif

                                    @if($itemPro->discount_price != NULL)
                                        <li><span class="discount-percentage">-{{ $itemPro->discount_price }}}%</span></li>
                                    @else
                                    @endif

                                </ul>
                            </div>
                        </div>
                        <div class="product-details text-center">
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
                                <a href="#" id="{{ $itemPro->id }}" onclick="detail(this.id)" data-target="#productModal" data-toggle="modal" title="Thêm nhanh"><i class="fa fa-shopping-cart"></i>Thêm nhanh </a>
                            </div>
                            <div class="add-to-link">
                                <ul>
                                    <li><a href="{{ URL::to('product/'.to_sub($itemPro->subcategory_name).'/'.to_sub($itemPro->product_name)) }}" title="Xem chi tiết"><i class="fa fa-external-link"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- single-product-end -->
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- new-book-area-start -->




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
                url: "{{ url('product/get/detailProduct/') }}/"+id,
                type: "GET",
                dataType: "json",
                success:function (data){


                    $('select[name="productSize"]').empty();
                    $('#qty').val(1);

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
                var qty = parseInt($('#qty').val());
                var maxQty = parseInt($('#maxQty').val());
                if(qty > maxQty){
                    $('#qty').val(maxQty);
                }else{
                    $('#qty').val(qty);
                }
            })
        })
    </script>




@endsection
