<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@lang('auth.login')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="{{asset('assets/admin-assets/fonts/fonts.css')}}">

@if(app()->getLocale() == 'ar')
    <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('assets/admin-assets/plugins/fontawesome-free/css/all-rtl.min.css')}}">
        <!-- iCheck -->
        <link rel="stylesheet"
              href="{{asset('assets/admin-assets/plugins/icheck-bootstrap/icheck-bootstrap-rtl.min.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('assets/admin-assets/dist/css/adminlte-rtl.min.css')}}">
@else
    <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('assets/admin-assets/plugins/fontawesome-free/css/all.min.css')}}">
        <!-- iCheck -->
        <link rel="stylesheet"
              href="{{asset('assets/admin-assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('assets/admin-assets/dist/css/adminlte.min.css')}}">
    @endif
</head>
<body class="hold-transition login-page" dir="{{(app()->getLocale() == 'ar')?"rtl":"ltr"}}">
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a class="h1"><b>Admin</b>LTE</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">@lang('auth.login_to_your_account')</p>

            <form method="POST" action="{{ route('admin.login') }}">
                @csrf
                @include('layouts.admin.includes._flash_messages')
                <div class="input-group mb-3">
                    <input type="email" placeholder="@lang('auth.email')"
                           class="form-control @error('email') is-invalid @enderror" name="email"
                           value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" placeholder="@lang('auth.password')"
                           class="form-control @error('password') is-invalid @enderror" name="password" required
                           autocomplete="current-password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-7">
                        <div class="icheck-primary">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">
                                @lang('auth.remember_me')
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-5">
                        <button type="submit" class="btn btn-primary btn-block">@lang('auth.login')</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('assets/admin-assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/admin-assets/dist/js/adminlte.js')}}"></script>
</body>
</html>
