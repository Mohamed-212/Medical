<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="212Solutions">
    <meta name="author" content="Mohamed Hassan">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{asset('assets/website-assets/css/bootstrap-rtl.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/website-assets/css/all-rtl.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/website-assets/css/font-rtl.css')}}">
        <link rel="stylesheet" href="{{asset('assets/website-assets/css/swiper-rtl.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/website-assets/css/style-rtl.css')}}">
        <!-- flag icon -->
        <link rel="stylesheet" href="{{asset('assets/admin-assets/plugins/flag-icon-css/css/flag-icon-rtl.min.css')}}">
        <style>
            @media screen and (min-width: 1200px) {
                .cv-sub-mmenu li {
                    position: relative;
                }

                .submenu {
                    display: none;
                    position: absolute;
                    right: 100%;
                    top: 0px;
                }

                .cv-sub-mmenu > li:hover {
                    background-color: #f1f1f1
                }

                .cv-sub-mmenu > li:hover > .submenu {
                    display: block;
                }
                ul li h3{
                    font-size: 18px;
                    font-weight: 600;
                    text-transform: uppercase;
                    color: #3cbcff;
                    letter-spacing: 2px;
                }
            }
        </style>
    @else
        <link rel="stylesheet" href="{{asset('assets/website-assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/website-assets/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/website-assets/css/font.css')}}">
        <link rel="stylesheet" href="{{asset('assets/website-assets/css/swiper.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/website-assets/css/style.css')}}">
        <!-- flag icon -->
        <link rel="stylesheet" href="{{asset('assets/admin-assets/plugins/flag-icon-css/css/flag-icon.min.css')}}">
        <style>
            @media screen and (min-width: 1200px) {
                .cv-sub-mmenu li {
                    position: relative;
                }

                .submenu {
                    display: none;
                    position: absolute;
                    left: 100%;
                    top: 0px;
                }

                .cv-sub-mmenu > li:hover {
                    background-color: #f1f1f1
                }

                .cv-sub-mmenu > li:hover > .submenu {
                    display: block;
                }
                ul li h3{
                    font-size: 18px;
                    font-weight: 600;
                    text-transform: uppercase;
                    color: #3cbcff;
                    letter-spacing: 2px;
                }
            }
        </style>
    @endif

    <link rel="shortcut icon" href="{{asset('assets/website-assets/images/fav.png')}}" type="image/x-icon">
    <style>
        div.line-clamp2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            min-height: 52px;
        }
        .cv-blog-single-box .cv-blog-data {
            padding: 20px 30px;
        }
        #carouselExampleIndicators{
            height: 350px;
        }
        @media screen and (max-width: 1199px){
            ul.cv-sub-mmenu li h3 {
                font-size: 18px;
                font-weight: 600;
                padding: 12px 15px;
                color: #3cbcff;
                text-transform: capitalize;
                margin-bottom: 0;
            }
            li>ul>li a {
                color: #222;
                padding: 10px 15px;
                display: block;
            }
            li ul li{
                padding-left: 20px;
            }
        }
    </style>
    @stack('styles')
</head>
