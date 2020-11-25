@extends('admin.admin_layout')

@section('content')
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{ asset('public/login_user/css/style.css')}}">

<div class="wrapper">
    <div class="inner">
        <div class="image-holder">
            <img src="{{ asset('public/login_user/images/registration-form-4.jpg')}}" alt="">
        </div>
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf
            <h3>Đăng nhập</h3>
            <div class="form-holder">
                <input type="email" id="email" placeholder="Nhập email của bạn!" class="form-control" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
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
            <div class="form-login">
                <button type="submit">Đăng nhập</button>
                <p>Chưa có tài khoản? Nhấn vào <a href="{{ route('register') }}">đây</a> để đăng ký</p>
            </div>
        </form>
    </div>
</div>

    <script src="{{ asset('public/login_user/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('public/login_user/js/main.js')}}"></script>


@endsection
