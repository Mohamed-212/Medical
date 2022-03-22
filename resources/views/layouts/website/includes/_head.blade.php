<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{asset('assets/website-assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/website-assets/css/all-rtl.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/website-assets/css/font-rtl.css')}}">
        <link rel="stylesheet" href="{{asset('assets/website-assets/css/swiper-rtl.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/website-assets/css/style-rtl.css')}}">
        <!-- flag icon -->
        <link rel="stylesheet" href="{{asset('assets/admin-assets/plugins/flag-icon-css/css/flag-icon-rtl.min.css')}}">
    @else
        <link rel="stylesheet" href="{{asset('assets/website-assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/website-assets/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/website-assets/css/font.css')}}">
        <link rel="stylesheet" href="{{asset('assets/website-assets/css/swiper.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/website-assets/css/style.css')}}">
        <!-- flag icon -->
        <link rel="stylesheet" href="{{asset('assets/admin-assets/plugins/flag-icon-css/css/flag-icon.min.css')}}">
    @endif

    <link rel="shortcut icon" href="{{asset('assets/website-assets/images/fav.png')}}" type="image/x-icon">

    @stack('styles')
</head>
