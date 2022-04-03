@extends('layouts.website.app')

@section('title')
    @lang('general.home')
@endsection

@push('styles')

@endpush

@section('content')

    <!-- banner start -->
    <div class="cv-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="cv-banner-two-text cv-banner-three-text">
                        <h1>@lang('general.header_title')</h1>
                        <p>@lang('general.header_brief')</p>
                        <a href="{{route('website.models', \App\Helper\Helper::devices()[0]['get_brands'][0]['id'])}}" class="cv-btn">@lang('general.show_models')</a>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="cv-banner-img-three">
                        <img src="{{asset('assets/website-assets/images/banner3.png')}}" alt="images" class="img-fluid"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner end -->

    <!-- new arrivals start -->
    <div class="cv-arrival cv-product-three cv-product-slider spacer-top-less">
        <div class="container">
            <div class="cv-heading">
                <h1>@lang('general.all_models_title')</h1>
                <p>@lang('general.all_models_brief')</p>
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
