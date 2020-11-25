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
                            <li><a href="{{ URL::to('danh-muc-con/'.to_sub($product->subcategory_name)) }}">{{ $product->subcategory_name }}</a></li>
                            <li><a href="" class="active">Sản phẩm</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs-area-end -->
    <!-- product-main-area-start -->
    <div class="product-main-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                    <!-- product-main-area-start -->
                    <div class="product-main-area">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                <div class="flexslider">
                                    <ul class="slides">
                                        <li data-thumb="{{ asset(linkImg($product->image_one_small)) }}">
                                            <img src="{{ asset(linkImg($product->image_one)) }}" alt="woman" style="padding: 15px" />
                                        </li>
                                        <li data-thumb="{{ asset(linkImg($product->image_two_small)) }}">
                                            <img src="{{ asset(linkImg($product->image_two)) }}" alt="woman" style="padding: 15px" />
                                        </li>
                                        <li data-thumb="{{ asset(linkImg($product->image_three_small)) }}">
                                            <img src="{{ asset(linkImg($product->image_three)) }}" alt="woman" style="padding: 15px" />
                                        </li>
                                        <li data-thumb="{{ asset(linkImg($product->image_four_small)) }}">
                                            <img src="{{ asset(linkImg($product->image_four)) }}" alt="woman" style="padding: 15px" />
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                                <div class="product-info-main">
                                    <div class="page-title">
                                        <h1>{{ $product->product_name }}</h1>
                                    </div>
{{--                                    <div class="product-info-stock-sku">--}}
{{--                                        <span>Mã sản phẩm</span>--}}
{{--                                        <div class="product-attribute">--}}
{{--                                            <span>{{ $product->product_code }}</span>--}}
{{--                                            <span class="value"></span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="product-reviews-summary">
                                        <div class="reviews-actions">
                                            <a href="">Mã sản phẩm</a>
                                            <a href="" class="view">{{ $product->product_code }}</a>
                                        </div>
                                    </div>
                                    <div class="product-info-price">
                                        <div class="price-final">
                                            @if($product->discount_price == NULl)
                                                <span>{{ formatPrice($product->selling_price) }}</span>
                                            @else
                                                <span>{{ formatPriceSalePer($product->selling_price, $product->discount_price) }}</span>
                                                <span class="old-price">{{ formatPrice($product->selling_price) }}</span>
                                            @endif

                                        </div>
                                    </div>

                                    <div class="product-add-form">
                                        <form action="{{ route('cart.product.add') }}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <h4 style="font-weight: bold;">Màu săc</h4>
                                                    <select class="select" name="productColor" id="productColor" style="width: 140px; height: 45px; background-color: #333; color: white">
                                                        <option>Chọn màu</option>
                                                        @foreach($color as $item)
                                                            <option value="{{ $item }}">{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-lg-5">
                                                    <h4 style="font-weight: bold;">Size</h4>
                                                    <select class="select" name="productSize" id="productSize" style="width: 140px; height: 45px; background-color: #333; color: white">

                                                    </select>
                                                </div>
{{--                                                <div class="col-lg-4">--}}
{{--                                                    <p style="font-weight: bold">Số lượng</p>--}}
{{--                                                    <input type="number" value="1" min="1" name="qty" style="width: 60px">--}}
{{--                                                </div>--}}
                                            </div><br/><br/>
                                            <div class="quality-button">
                                                <input class="qty" name="qty" id="qty" type="number" value="1" min="1" max="">
                                                <input name="maxQty" id="maxQty" type="hidden">
                                                <input type="hidden" id="product_id" name="product_id" value="{{ $product->id }}">
                                            </div>
                                            <button type="submit" class="btn btn-warning" style="padding-bottom: 15px; padding-top: 15px; background-color: #333; border-radius: none">Mua hàng</button>
{{--                                            <a href="#">Mua hàng</a>--}}
                                        </form>
                                    </div>
                                    <div class="product-social-links">
                                        <div class="product-addto-links">
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-pie-chart"></i></a>
                                            <a href="#"><i class="fa fa-envelope-o"></i></a>
                                        </div>
{{--                                        <div class="product-addto-links-text">--}}
{{--                                            <p>Powerwalking to the gym or strolling to the local coffeehouse, the Savvy Shoulder Tote lets you stash your essentials in sporty style! A top-loading compartment provides quick and easy access to larger items, while zippered pockets on the front and side hold cash, credit cards and phone.</p>--}}
{{--                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product-main-area-end -->
                    <!-- product-info-area-start -->
                    <div class="product-info-area mt-80">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active"><a href="#Details" data-toggle="tab">Chi tiết sản phẩm</a></li>
                            <li><a href="#Reviews" data-toggle="tab">Đánh giá sản phẩm</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="Details">
                                <div class="valu">
                                    {!! $product->product_content !!}
                                </div>
                            </div>
                            <div class="tab-pane" id="Reviews">
                                <p>aaaa</p>
                            </div>
                        </div>
                    </div>
                    <!-- product-info-area-end -->
                    <!-- new-book-area-start -->
                    <div class="new-book-area mt-60">
                        <div class="section-title text-center mb-30">
                            <h3>Sản phẩm đang giảm giá</h3>
                        </div>
                        <div class="tab-active-2 owl-carousel">
                            @foreach($productSale as $keySale => $itemSale)
                            <!-- single-product-start -->
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="#">
                                        <img src="{{ $itemSale->avatar }}" alt="book" class="primary" style="width: 200px; height: 240px; " />
                                    </a>
                                    <div class="quick-view">
                                        <a class="action-view" id="{{ $itemSale->id }}" onclick="productSale(this.id)" href="#" data-target="#productModal" data-toggle="modal" title="Xem nhanh">
                                            <i class="fa fa-search-plus"></i>
                                        </a>
                                    </div>
                                    <div class="product-flag">
                                        <ul>
                                            @if($itemSale->hot_new == 1)
                                                <li><span class="sale">new</span></li>
                                            @else
                                            @endif

                                            @if($itemSale->discount_price != NULL)
                                                <li><span class="discount-percentage">-{{ $itemSale->discount_price }}%</span></li>
                                            @else
                                            @endif

                                        </ul>
                                    </div>
                                </div>
                                <div class="product-details text-center">
{{--                                    <div class="product-rating">--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="#"><i class="fa fa-star"></i></a></li>--}}
{{--                                            <li><a href="#"><i class="fa fa-star"></i></a></li>--}}
{{--                                            <li><a href="#"><i class="fa fa-star"></i></a></li>--}}
{{--                                            <li><a href="#"><i class="fa fa-star"></i></a></li>--}}
{{--                                            <li><a href="#"><i class="fa fa-star"></i></a></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
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
                            @endforeach
                        </div>
                    </div>
                    <!-- new-book-area-start -->
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="shop-left">
                        <div class="left-title mb-20">
                            <h4>Sản phẩm cùng danh mục</h4>
                        </div>
                        <div class="random-area mb-30">
                            <div class="product-active-2 owl-carousel">
                                <div class="product-total-2">
                                    @foreach($productRela as $keyRela => $itemRela)
                                        @if($keyRela < 3)
                                    <div class="single-most-product bd mb-18">
                                        <div class="most-product-img">
                                            <a href="{{ URL::to('product/'.to_sub($itemRela->subcategory_name).'/'.to_sub($itemRela->product_name)) }}"><img src="{{ $itemRela->avatar }}" alt="book" /></a>
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
                                            <h4><a href="{{ URL::to('product/'.to_sub($itemRela->subcategory_name).'/'.to_sub($itemRela->product_name)) }}">{{ $itemRela->product_name }}</a></h4>
                                            <div class="product-price">
                                                <ul>
                                                    @if($itemRela->discount_price == NULL)
                                                        <li>{{ formatPrice($itemRela->selling_price) }}</li>
                                                    @else
                                                        <li>{{ formatPriceSalePer($itemRela->selling_price, $itemRela->discount_price) }}</li>
                                                        <li class="old-price">{{ formatPrice($itemRela->selling_price) }}</li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                        @else
                                        @endif
                                    @endforeach
                                </div>
                                <div class="product-total-2">
                                    @foreach($productRela as $keyRela => $itemRela)
                                        @if($keyRela >= 3)
                                            <div class="single-most-product bd mb-18">
                                                <div class="most-product-img">
                                                    <a href="#"><img src="{{ $itemRela->avatar }}" alt="book" /></a>
                                                </div>
                                                <div class="most-product-content">
{{--                                                    <div class="product-rating">--}}
{{--                                                        <ul>--}}
{{--                                                            <li><a href="#"><i class="fa fa-star"></i></a></li>--}}
{{--                                                            <li><a href="#"><i class="fa fa-star"></i></a></li>--}}
{{--                                                            <li><a href="#"><i class="fa fa-star"></i></a></li>--}}
{{--                                                            <li><a href="#"><i class="fa fa-star"></i></a></li>--}}
{{--                                                            <li><a href="#"><i class="fa fa-star"></i></a></li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
                                                    <h4><a href="{{ URL::to('product/'.to_sub($itemRela->subcategory_name).'/'.to_sub($itemRela->product_name)) }}">{{ $itemRela->product_name }}</a></h4>
                                                    <div class="product-price">
                                                        <ul>
                                                            @if($itemRela->discount_price == NULL)
                                                                <li>{{ formatPrice($itemRela->selling_price) }}</li>
                                                            @else
                                                                <li>{{ formatPriceSalePer($itemRela->selling_price, $itemRela->discount_price) }}</li>
                                                                <li class="old-price">{{ formatPrice($itemRela->selling_price) }}</li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                        @endif
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product-main-area-end -->

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
                                <form action="#">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="select-option-part">
                                                <label>Màu*</label>
                                                <select class="select" id="productColor1" name="productColor1" style="width: 140px">
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="select-option-part">
                                                <label>Size*</label>
                                                <select class="select" name="productSize1" id="productSize1" style="width: 90px">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="select-option-part">
                                                <label>Số lượng*</label>
                                                <input type="number" id="number1" name="number1" value="1" min="1" />
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
                                        <input type="hidden" id="product_id1">
                                        <input type="hidden" id="maxQty1">
                                        <button>Thêm vào giỏ hàng</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

{{--    /// RELATIONSHIP--}}
    <script type="text/javascript">
        function productSale(id){
            $.ajax({
                url: "{{ url('product/get/detailProduct/') }}/"+id,
                type: "GET",
                dataType: "json",
                success:function (data){
                    $('#productImg1').attr('src', data.product.image_one);
                    $('#productImg2').attr('src', data.product.image_two);
                    $('#productImg3').attr('src', data.product.image_three);
                    $('#productImg3').attr('src', data.product.image_four);
                    $('#productImgSmall1').attr('src', data.product.image_one_small);
                    $('#productImgSmall2').attr('src', data.product.image_two_small);
                    $('#productImgSmall3').attr('src', data.product.image_three_small);
                    $('#productImgSmall3').attr('src', data.product.image_four_small);
                    $('#productName').text(data.product.product_name);
                    $('#productPrice').text(data.product.selling_price - data.product.selling_price*data.product.discount_price/100);
                    $('select[name="productColor1"]').empty();
                    $('select[name="productColor1"]').append('<option>Chọn màu</option>')
                    $.each(data.color, function (key, item){
                        $('select[name="productColor1"]').append('<option value="'+item+'">'+item+'</option>');
                    })
                    $('#productCode').text(data.product.product_code);
                    $('#productCat').text(data.product.category_name);
                    $('#productSub').text(data.product.subcategory_name);
                    $('#productBrand').text(data.product.brand_name);
                    $('#product_id1').val(data.product.id);
                }
            })
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function (){
            $('select[name="productColor1"]').on("change", function (){
                var product_id = $('#product_id1').val();
                var color = $('#productColor1').val();
                $.ajax({
                    url: "{{ url('product/get/sizeProduct/') }}/"+product_id+'/'+color,
                    type: "GET",
                    dataType: "json",
                    success:function (data){
                        $('#number1').val(1);
                        $('select[name="productSize1"]').empty();
                        $.each(data.product, function (key, item){
                            $('select[name="productSize1"]').append('<option value="'+item.product_size+'">'+item.product_size+'</option>')
                        })
                    }
                })
            })
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function (){
            $('select[name="productSize1"]').on("change", function (){
                var product_id = $('#product_id1').val();
                var color = $('#productColor1').val();
                var size = $('#productSize1').val();
                $.ajax({
                    url: "{{ url('product/get/maxQty/') }}/"+product_id+'/'+color+'/'+size,
                    type: "GET",
                    dataType: 'json',
                    success:function (data){
                        $('#number1').val(1);
                        $('#maxQty1').val(data.product.product_quantity);

                    }
                })
            })
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function (){
            $('#number1').on("input", function (){
                var qty1 = $('#number1').val();
                var maxQty1 = $('#maxQty1').val();
                if(qty1*10 > maxQty1*10){
                    $('#number1').val(maxQty1);
                }else{
                    $('#number1').val(qty1);
                }
            })
        })
    </script>

{{--    // Phần chi tiết sản phẩm--}}
    <script type="text/javascript">
        $(document).ready(function (){
            $('select[name="productColor"]').on("change", function (){
                var product_id = $('#product_id').val();
                var productColor = $('#productColor').val();
                $.ajax({
                    url: "{{ url('product/get/sizeProduct/') }}/"+product_id+'/'+productColor,
                    type: "GET",
                    dataType: 'json',
                    success:function (data){
                        $('#qty').val(1);
                        $('select[name="productSize"]').empty();
                        $('select[name="productSize"]').append('<option>Chọn size</option>')
                        $.each(data.product, function (key, item){
                            $('select[name="productSize"]').append('<option value="'+item.product_size+'">'+item.product_size+'</option>')
                        })

                    }
                })
            })
        })
    </script>
    <script>
        $(document).ready(function (){
            $('select[name="productSize"]').on("change", function (){
                var id_product = $('#product_id').val();
                var productColor = $('#productColor').val();
                var productSize = $('#productSize').val();
                $.ajax({
                    url: "{{ url('product/get/maxQty/') }}/"+id_product+'/'+productColor+'/'+productSize,
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
    <script>
        $(document).ready(function (){
            $('#qty').on("input", function (){
                var qty = $('#qty').val();
                var max = $('#maxQty').val();
                if(qty*10 < max*10){
                    $('#qty').val(qty);

                }else{
                    $('#qty').val(max);
                }
            })
        })
    </script>

@endsection
