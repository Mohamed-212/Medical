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

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="{{asset('assets/admin-assets/fonts/fonts.css')}}">

    @if(app()->getLocale() == 'ar')
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('assets/admin-assets/plugins/fontawesome-free/css/all-rtl.min.css')}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{asset('assets/admin-assets/ionicons/2.0.1/css/ionicons-rtl.min.css')}}">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="{{asset('assets/admin-assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4-rtl.min.css')}}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{asset('assets/admin-assets/plugins/icheck-bootstrap/icheck-bootstrap-rtl.min.css')}}">
        <!-- JQVMap -->
        <link rel="stylesheet" href="{{asset('assets/admin-assets/plugins/jqvmap/jqvmap-rtl.min.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('assets/admin-assets/dist/css/adminlte-rtl.min.css')}}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{asset('assets/admin-assets/plugins/overlayScrollbars/css/OverlayScrollbars-rtl.min.css')}}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{asset('assets/admin-assets/plugins/daterangepicker/daterangepicker-rtl.css')}}">
        <!-- summernote -->
        <link rel="stylesheet" href="{{asset('assets/admin-assets/plugins/summernote/summernote-bs4-rtl.min.css')}}">
        <!-- flag icon -->
        <link rel="stylesheet" href="{{asset('assets/admin-assets/plugins/flag-icon-css/css/flag-icon-rtl.min.css')}}">
    @else
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('assets/admin-assets/plugins/fontawesome-free/css/all.min.css')}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{asset('assets/admin-assets/ionicons/2.0.1/css/ionicons.min.css')}}">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="{{asset('assets/admin-assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{asset('assets/admin-assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
        <!-- JQVMap -->
        <link rel="stylesheet" href="{{asset('assets/admin-assets/plugins/jqvmap/jqvmap.min.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('assets/admin-assets/dist/css/adminlte.min.css')}}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{asset('assets/admin-assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{asset('assets/admin-assets/plugins/daterangepicker/daterangepicker.css')}}">
        <!-- summernote -->
        <link rel="stylesheet" href="{{asset('assets/admin-assets/plugins/summernote/summernote-bs4.min.css')}}">
        <!-- flag icon -->
        <link rel="stylesheet" href="{{asset('assets/admin-assets/plugins/flag-icon-css/css/flag-icon.min.css')}}">
    @endif

    @stack('styles')
</head>
