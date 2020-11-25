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
    // Lấy 7 cặp sản phẩm ngẫu nhiên
    $dataR = DB::table('products')->orderBy('id', 'DESC')->get();
    $dataNumber = array();
    foreach($dataR as $key => $item){
        
    }

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
                            <h4>Free shipping item</h4>
                            <p>For all orders over $500</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="single-banner">
                        <div class="banner-img">
                            <a href="#"><img src="{{ asset('public/frontend/img/banner/2.png')}}" alt="banner" /></a>
                        </div>
                        <div class="banner-text">
                            <h4>Money back guarantee</h4>
                            <p>100% money back guarante</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 hidden-sm col-xs-12">
                    <div class="single-banner">
                        <div class="banner-img">
                            <a href="#"><img src="{{ asset('public/frontend/img/banner/3.png')}}" alt="banner" /></a>
                        </div>
                        <div class="banner-text">
                            <h4>Cash on delivery</h4>
                            <p>Lorem ipsum dolor consecte</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="single-banner mrg-none-xs">
                        <div class="banner-img">
                            <a href="#"><img src="{{ asset('public/frontend/img/banner/4.png')}}" alt="banner" /></a>
                        </div>
                        <div class="banner-text">
                            <h4>Help & Support</h4>
                            <p>Call us : + 0123.4567.89</p>
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
                        <h2>Sản phẩm ngẫu nhiên</h2>
                    </div>
                </div>
            </div>
            <div class="tab-active owl-carousel">
                <div class="tab-total">
                    <!-- single-product-start -->
                    <div class="product-wrapper mb-40">
                        <div class="product-img">
                            <a href="#">
                                <img src="{{ asset('public/frontend/img/product/1.jpg')}}" alt="book" class="primary" />
                            </a>
                            <div class="quick-view">
                                <a class="action-view" href="#" data-target="#productModal" data-toggle="modal" title="Quick View">
                                    <i class="fa fa-search-plus"></i>
                                </a>
                            </div>
                            <div class="product-flag">
                                <ul>
                                    <li><span class="sale">new</span> </li>
                                    <li><span class="discount-percentage">-5%</span></li>
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
                            <h4><a href="#">Joust Duffle Bag</a></h4>
                            <div class="product-price">
                                <ul>
                                    <li>$60.00</li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-link">
                            <div class="product-button">
                                <a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            <div class="add-to-link">
                                <ul>
                                    <li><a href="product-details.html" title="Details"><i class="fa fa-external-link"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- single-product-end -->
                    <!-- single-product-start -->
                    <div class="product-wrapper">
                        <div class="product-img">
                            <a href="#">
                                <img src="{{ asset('public/frontend/img/product/18.jpg')}}" alt="book" class="primary" />
                            </a>
                            <div class="quick-view">
                                <a class="action-view" href="#" data-target="#productModal" data-toggle="modal" title="Quick View">
                                    <i class="fa fa-search-plus"></i>
                                </a>
                            </div>
                            <div class="product-flag">
                                <ul>
                                    <li><span class="sale">new</span> <br></li>
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
                            <h4><a href="#">Driven Backpack</a></h4>
                            <div class="product-price">
                                <ul>
                                    <li>$34.00</li>
                                    <li class="old-price">$36.00</li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-link">
                            <div class="product-button">
                                <a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            <div class="add-to-link">
                                <ul>
                                    <li><a href="product-details.html" title="Details"><i class="fa fa-external-link"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- single-product-end -->
                </div>
                <div class="tab-total">
                    <!-- single-product-start -->
                    <div class="product-wrapper mb-40">
                        <div class="product-img">
                            <a href="#">
                                <img src="{{ asset('public/frontend/img/product/3.jpg')}}" alt="book" class="primary" />
                            </a>
                            <div class="quick-view">
                                <a class="action-view" href="#" data-target="#productModal" data-toggle="modal" title="Quick View">
                                    <i class="fa fa-search-plus"></i>
                                </a>
                            </div>
                            <div class="product-flag">
                                <ul>
                                    <li><span class="sale">new</span> <br></li>
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
                            <h4><a href="#">Chaz Kangeroo Hoodie</a></h4>
                            <div class="product-price">
                                <ul>
                                    <li>$52.00</li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-link">
                            <div class="product-button">
                                <a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            <div class="add-to-link">
                                <ul>
                                    <li><a href="product-details.html" title="Details"><i class="fa fa-external-link"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- single-product-end -->
                    <!-- single-product-start -->
                    <div class="product-wrapper">
                        <div class="product-img">
                            <a href="#">
                                <img src="{{ asset('public/frontend/img/product/10.jpg')}}" alt="book" class="primary" />
                            </a>
                            <div class="quick-view">
                                <a class="action-view" href="#" data-target="#productModal" data-toggle="modal" title="Quick View">
                                    <i class="fa fa-search-plus"></i>
                                </a>
                            </div>
                            <div class="product-flag">
                                <ul>
                                    <li><span class="sale">new</span> </li>
                                    <li><span class="discount-percentage">-5%</span></li>
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
                            <h4><a href="#">Fusion Backpack</a></h4>
                            <div class="product-price">
                                <ul>
                                    <li>$59.00</li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-link">
                            <div class="product-button">
                                <a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            <div class="add-to-link">
                                <ul>
                                    <li><a href="product-details.html" title="Details"><i class="fa fa-external-link"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- single-product-end -->
                </div>
                <div class="tab-total">
                    <!-- single-product-start -->
                    <div class="product-wrapper mb-40">
                        <div class="product-img">
                            <a href="#">
                                <img src="{{ asset('public/frontend/img/product/5.jpg')}}" alt="book" class="primary" />
                            </a>
                            <div class="quick-view">
                                <a class="action-view" href="#" data-target="#productModal" data-toggle="modal" title="Quick View">
                                    <i class="fa fa-search-plus"></i>
                                </a>
                            </div>
                            <div class="product-flag">
                                <ul>
                                    <li><span class="sale">new</span> </li>
                                    <li><span class="discount-percentage">-5%</span></li>
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
                            <h4><a href="#">Set of Sprite Yoga Straps</a></h4>
                            <div class="product-price">
                                <ul>
                                    <li>$34.00</li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-link">
                            <div class="product-button">
                                <a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            <div class="add-to-link">
                                <ul>
                                    <li><a href="product-details.html" title="Details"><i class="fa fa-external-link"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- single-product-end -->
                    <!-- single-product-start -->
                    <div class="product-wrapper">
                        <div class="product-img">
                            <a href="#">
                                <img src="{{ asset('public/frontend/img/product/19.jpg')}}" alt="book" class="primary" />
                            </a>
                            <div class="quick-view">
                                <a class="action-view" href="#" data-target="#productModal" data-toggle="modal" title="Quick View">
                                    <i class="fa fa-search-plus"></i>
                                </a>
                            </div>
                            <div class="product-flag">
                                <ul>
                                    <li><span class="sale">new</span> </li>
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
                            <h4><a href="#">Compete Track Tote</a></h4>
                            <div class="product-price">
                                <ul>
                                    <li>$32.00</li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-link">
                            <div class="product-button">
                                <a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            <div class="add-to-link">
                                <ul>
                                    <li><a href="product-details.html" title="Details"><i class="fa fa-external-link"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- single-product-end -->
                </div>
                <div class="tab-total">
                    <!-- single-product-start -->
                    <div class="product-wrapper mb-40">
                        <div class="product-img">
                            <a href="#">
                                <img src="{{ asset('public/frontend/img/product/7.jpg')}}" alt="book" class="primary" />
                            </a>
                            <div class="quick-view">
                                <a class="action-view" href="#" data-target="#productModal" data-toggle="modal" title="Quick View">
                                    <i class="fa fa-search-plus"></i>
                                </a>
                            </div>
                            <div class="product-flag">
                                <ul>
                                    <li><span class="sale">new</span> <br></li>
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
                            <h4><a href="#">Strive Shoulder Pack</a></h4>
                            <div class="product-price">
                                <ul>
                                    <li>$30.00</li>
                                    <li class="old-price">$32.00</li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-link">
                            <div class="product-button">
                                <a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            <div class="add-to-link">
                                <ul>
                                    <li><a href="product-details.html" title="Details"><i class="fa fa-external-link"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- single-product-end -->
                    <!-- single-product-start -->
                    <div class="product-wrapper">
                        <div class="product-img">
                            <a href="#">
                                <img src="{{ asset('public/frontend/img/product/4.jpg')}}" alt="book" class="primary" />
                            </a>
                            <div class="quick-view">
                                <a class="action-view" href="#" data-target="#productModal" data-toggle="modal" title="Quick View">
                                    <i class="fa fa-search-plus"></i>
                                </a>
                            </div>
                            <div class="product-flag">
                                <ul>
                                    <li><span class="sale">new</span> </li>
                                    <li><span class="discount-percentage">-5%</span></li>
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
                            <h4><a href="#">Chaz Kangeroo Hoodie</a></h4>
                            <div class="product-price">
                                <ul>
                                    <li>$52.00</li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-link">
                            <div class="product-button">
                                <a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            <div class="add-to-link">
                                <ul>
                                    <li><a href="product-details.html" title="Details"><i class="fa fa-external-link"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- single-product-end -->
                </div>
                <div class="tab-total">
                    <!-- single-product-start -->
                    <div class="product-wrapper mb-40">
                        <div class="product-img">
                            <a href="#">
                                <img src="{{ asset('public/frontend/img/product/9.jpg')}}" alt="book" class="primary" />
                            </a>
                            <div class="quick-view">
                                <a class="action-view" href="#" data-target="#productModal" data-toggle="modal" title="Quick View">
                                    <i class="fa fa-search-plus"></i>
                                </a>
                            </div>
                            <div class="product-flag">
                                <ul>
                                    <li><span class="discount-percentage">-5%</span></li>
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
                            <h4><a href="#">Wayfarer Messenger Bag</a></h4>
                            <div class="product-price">
                                <ul>
                                    <li>$35.00</li>
                                    <li class="old-price">$40.00</li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-link">
                            <div class="product-button">
                                <a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            <div class="add-to-link">
                                <ul>
                                    <li><a href="product-details.html" title="Details"><i class="fa fa-external-link"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- single-product-end -->
                    <!-- single-product-start -->
                    <div class="product-wrapper">
                        <div class="product-img">
                            <a href="#">
                                <img src="{{ asset('public/frontend/img/product/8.jpg')}}" alt="book" class="primary" />
                            </a>
                            <div class="quick-view">
                                <a class="action-view" href="#" data-target="#productModal" data-toggle="modal" title="Quick View">
                                    <i class="fa fa-search-plus"></i>
                                </a>
                            </div>
                            <div class="product-flag">
                                <ul>
                                    <li><span class="sale">new</span> </li>
                                    <li><span class="discount-percentage">-5%</span></li>
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
                            <h4><a href="#">Rival  Messenger</a></h4>
                            <div class="product-price">
                                <ul>
                                    <li>$35.00</li>
                                    <li class="old-price">$40.00</li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-link">
                            <div class="product-button">
                                <a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            <div class="add-to-link">
                                <ul>
                                    <li><a href="product-details.html" title="Details"><i class="fa fa-external-link"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- single-product-end -->
                </div>
                <div class="tab-total">
                    <!-- single-product-start -->
                    <div class="product-wrapper mb-40">
                        <div class="product-img">
                            <a href="#">
                                <img src="{{ asset('public/frontend/img/product/11.jpg')}}" alt="book" class="primary" />
                            </a>
                            <div class="quick-view">
                                <a class="action-view" href="#" data-target="#productModal" data-toggle="modal" title="Quick View">
                                    <i class="fa fa-search-plus"></i>
                                </a>
                            </div>
                            <div class="product-flag">
                                <ul>
                                    <li><span class="sale">new</span></li>
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
                            <h4><a href="#">Impulse Duffle</a></h4>
                            <div class="product-price">
                                <ul>
                                    <li>$74.00</li>
                                    <li class="old-price">$78.00</li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-link">
                            <div class="product-button">
                                <a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            <div class="add-to-link">
                                <ul>
                                    <li><a href="product-details.html" title="Details"><i class="fa fa-external-link"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- single-product-end -->
                    <!-- single-product-start -->
                    <div class="product-wrapper">
                        <div class="product-img">
                            <a href="#">
                                <img src="{{ asset('public/frontend/img/product/3.jpg')}}" alt="book" class="primary" />
                            </a>
                            <div class="quick-view">
                                <a class="action-view" href="#" data-target="#productModal" data-toggle="modal" title="Quick View">
                                    <i class="fa fa-search-plus"></i>
                                </a>
                            </div>
                            <div class="product-flag">
                                <ul>
                                    <li><span class="sale">new</span> </li>
                                    <li><span class="discount-percentage">-5%</span></li>
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
                            <h4><a href="#">Crown Summit</a></h4>
                            <div class="product-price">
                                <ul>
                                    <li>$36.00</li>
                                    <li class="old-price">$38.00</li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-link">
                            <div class="product-button">
                                <a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            <div class="add-to-link">
                                <ul>
                                    <li><a href="product-details.html" title="Details"><i class="fa fa-external-link"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- single-product-end -->
                </div>
            </div>
        </div>
    </div>
    <!-- new-book-area-start -->
    <!-- recent-post-area-start -->
    <div class="recent-post-area pt-95 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-30 section-title-res">
                        <h2>Latest from our blog</h2>
                    </div>
                </div>
                <div class="post-active owl-carousel text-center">
                    <div class="col-lg-12">
                        <div class="single-post">
                            <div class="post-img">
                                <a href="#"><img src="{{ asset('public/frontend/img/post/1.jpg')}}" alt="post" /></a>
                                <div class="blog-date-time">
                                    <span class="day-time">06</span>
                                    <span class="moth-time">Dec</span>
                                </div>
                            </div>
                            <div class="post-content">
                                <h3><a href="#">Nam tincidunt vulputate felis</a></h3>
                                <span class="meta-author"> Demo Posthemes </span>
                                <p>Discover five of our favourite dresses from our new collection that are destined to be worn and loved immediately.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="single-post">
                            <div class="post-img">
                                <a href="blog-details.html"><img src="{{ asset('public/frontend/img/post/2.jpg')}}" alt="post" /></a>
                                <div class="blog-date-time">
                                    <span class="day-time">06</span>
                                    <span class="moth-time">Dec</span>
                                </div>
                            </div>
                            <div class="post-content">
                                <h3><a href="blog-details.html">Interdum et malesuada</a></h3>
                                <span class="meta-author"> Demo Posthemes </span>
                                <p>Discover five of our favourite dresses from our new collection that are destined to be worn and loved immediately.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="single-post">
                            <div class="post-img">
                                <a href="blog-details.html"><img src="{{ asset('public/frontend/img/post/3.jpg')}}" alt="post" /></a>
                                <div class="blog-date-time">
                                    <span class="day-time">07</span>
                                    <span class="moth-time">Dec</span>
                                </div>
                            </div>
                            <div class="post-content">
                                <h3><a href="blog-details.html">What is Bootstrap?</a></h3>
                                <span class="meta-author"> Demo Posthemes </span>
                                <p>Discover five of our favourite dresses from our new collection that are destined to be worn and loved immediately.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="single-post">
                            <div class="post-img">
                                <a href="blog-details.html"><img src="{{ asset('public/frontend/img/post/4.jpg')}}" alt="post" /></a>
                                <div class="blog-date-time">
                                    <span class="day-time">08</span>
                                    <span class="moth-time">Dec</span>
                                </div>
                            </div>
                            <div class="post-content">
                                <h3><a href="blog-details.html">Etiam eros massa</a></h3>
                                <span class="meta-author"> Demo Posthemes </span>
                                <p>Discover five of our favourite dresses from our new collection that are destined to be worn and loved immediately.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- recent-post-area-end -->
    <!-- social-group-area-start -->
    <div class="social-group-area ptb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="section-title-3">
                        <h3>Latest Tweets</h3>
                    </div>
                    <div class="twitter-content">
                        <div class="twitter-icon">
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </div>
                        <div class="twitter-text">
                            <p>
                                Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum notare quam
                            </p>
                            <a href="#">posthemes</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="section-title-3">
                        <h3>Stay Connected</h3>
                    </div>
                    <div class="link-follow">
                        <ul>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                            <li class="hidden-sm"><a href="#"><i class="fa fa-vimeo"></i></a></li>
                            <li class="hidden-sm"><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- social-group-area-end -->


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
