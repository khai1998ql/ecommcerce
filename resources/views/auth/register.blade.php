@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('public/login_user/css/style.css')}}">
{{--<div class="container">--}}
    <div class="wrapper">
        <div class="inner">
            <div class="image-holder">
                <img src="{{ asset('public/login_user/images/registration-form-4.jpg')}}" alt="">
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h3>Đăng ký</h3>
                <div class="form-holder active">
                    <input type="text" id="name" placeholder="Nhập tên của bạn!" class="form-control" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-holder">
                    <input type="email" id="email" placeholder="Nhập email của bạn!" class="form-control" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-holder">
                    <input type="text" id="phone" placeholder="Nhập sđt của bạn!" class="form-control" class="form-control @error('phone') is-invalid @enderror" name="phone" required autocomplete="phone">
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-holder">
                    <input type="password" id="password" placeholder="Nhập mật khẩu!" class="form-control" style="font-size: 15px;" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-holder">
                    <input type="password" id="password_confirmation" placeholder="Nhập lại mật khẩu!" class="form-control" name="password_confirmation" required autocomplete="new-password">

                </div>
                <div class="form-login">
                    <button type="submit">Đăng ký</button>
                    <p>Đã có tài khoản? Nhấn vào <a href="{{ route('login') }}">đây</a> để đăng nhập</p>
                </div>
            </form>
        </div>
    </div>
{{--</div>--}}
    <script src="{{ asset('public/login_user/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('public/login_user/js/main.js')}}"></script>
@endsection
