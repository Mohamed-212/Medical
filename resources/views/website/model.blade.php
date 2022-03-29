@extends('layouts.website.app')

@section('title')
    {{$model->name}}
@endsection

@push('styles')
    <style>
        .cv-arrival{
            background: #f8fdff;
        }
        tr:not(:last-child){
            border-bottom: 1px solid #d4f0ff;
        }
    </style>
@endpush

@section('content')

    <!-- breadcrumb start -->
    <div class="cv-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cv-breadcrumb-box">
                        <h1>{{$model->name}}</h1>
                        <ul>
                            <li><a href="{{route('website.home')}}">@lang('general.home')</a></li>
                            <li>{{$model->name}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
    <!-- blog start -->
    <div class="cv-blog-single spacer-top spacer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cv-blog-single-box row">
                        <div id="carouselExampleIndicators" class="carousel slide col-md-6" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                @foreach($model->getImages as $index => $image)
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$index}}" @if($index == 0) class="active" aria-current="true" @endif aria-label="Slide {{$index+1}}"></button>
                                @endforeach
                            </div>
                            <div class="carousel-inner">
                                @foreach($model->getImages as $index => $image)
                                    <div class="carousel-item @if($index == 0) active @endif ">
                                        <img src="{{$image->image_path}}" style="height: 350px" class="d-block w-100" alt="image">
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev bg-info" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next bg-info" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <div class="cv-blog-data col-md-6">
                            <h2 class="cv-blog-title">{{$model->name}}</h2>
                            <table class="w-100">
                                <tbody>
                                    <tr>
                                        <th>@lang('general.device_brand')</th>
                                        <td>{{$model->brand}}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('general.device_model')</th>
                                        <td>{{$model->modeel}}</td>
                                    </tr>
                                    <tr>
                                        <th class="pe-3">@lang('general.specification')</th>
                                        <td>{!! $model->description !!}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog end -->

    <!-- new arrivals start -->
    <div class="cv-arrival cv-product-three cv-product-slider spacer-top-less">
        <div class="container">
            <div class="cv-heading">
                <h1>@lang('general.all_models_title')</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach($models as $model)
                                <div class="swiper-slide">
                                    <div class="cv-product-box">
                                        <div class="cv-product-img">
                                            <img src="{{$model->getImages[0]['image_path']}}" style="height: 250px" alt="image" class="img-fluid"/>
                                            <div class="cv-product-button">
                                                <a href="{{route('website.models.show', $model->id)}}" class="cv-btn"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 461.312 461.312">
                                                        <g>
                                                            <path d="M230.656,156.416c-40.96,0-74.24,33.28-74.24,74.24s33.28,74.24,74.24,74.24s74.24-33.28,74.24-74.24
                                                        S271.616,156.416,230.656,156.416z M225.024,208.64c-9.216,0-16.896,7.68-16.896,16.896h-24.576
                                                        c0.512-23.04,18.944-41.472,41.472-41.472V208.64z"></path>
                                                        </g>
                                                        <g>
                                                            <path d="M455.936,215.296c-25.088-31.232-114.688-133.12-225.28-133.12S30.464,184.064,5.376,215.296
                                                        c-7.168,8.704-7.168,21.504,0,30.72c25.088,31.232,114.688,133.12,225.28,133.12s200.192-101.888,225.28-133.12
                                                        C463.104,237.312,463.104,224.512,455.936,215.296z M230.656,338.176c-59.392,0-107.52-48.128-107.52-107.52
                                                        s48.128-107.52,107.52-107.52s107.52,48.128,107.52,107.52S290.048,338.176,230.656,338.176z"></path>
                                                        </g>
                                                    </svg> @lang('general.view_detail') </a>
                                            </div>
                                        </div>
                                        <div class="cv-product-data">
                                            <a href="{{route('website.models.show', $model->id)}}" class="cv-price-title">{{$model->name}}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- new arrivals end -->

@endsection

@push('scripts')

@endpush
