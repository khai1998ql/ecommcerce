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
                            <li><a href="{{ route('blog') }}">Tin tức</a></li>
                            <li><a href="" class="active">Tin tức chi tiết</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs-area-end -->
    <!-- blog-main-area-start -->
    <div class="blog-main-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">

                    <div class="single-blog mb-50">
                        <div class="blog-left-title">
                            <h3>Danh mục tin tức</h3>
                        </div>
                        <div class="blog-side-menu">
                            <ul>
                                @foreach($blog_category as $item)
                                <li><a href="#">{{ $item->blog_category_name }} (2)</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                    <div class="blog-main-wrapper">
                        <div class="author-destils mb-30">
                            <div class="author-left">
                                <div class="author-img">
                                    <a href="#"><img src="{{ asset($blog_detail->admin_avatar) }}" alt="man" /></a>
                                </div>
                                <div class="author-description">
                                    <p>Đăng bở:
                                        <a href=""><span>{{ $blog_detail->name }}</span></a>
                                    </p>
{{--                                    <span>May 15 2017</span>--}}
                                </div>
                            </div>
                        </div>
{{--                        <div class="blog-img mb-30">--}}
{{--                            <img src="{{ asset($blog_detail->blog_image) }}" alt="blog" />--}}
{{--                        </div>--}}
                        <div class="single-blog-content">
                            <div class="single-blog-title">
                                <h3>{{ $blog_detail->blog_name }}</h3>
                            </div>
                            <div class="blog-single-content">
                                {!! $blog_detail->blog_content !!}
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog-main-area-end -->

@endsection
