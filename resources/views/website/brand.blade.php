@extends('layouts.website.app')

@section('title')
    {{$brand->name}}
@endsection

@push('styles')

@endpush

@section('content')

    <!-- breadcrumb start -->
    <div class="cv-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cv-breadcrumb-box">
                        <h1>{{$brand->name}}</h1>
                        <ul>
                            <li><a href="{{route('website.home')}}">@lang('general.home')</a></li>
                            <li>{{$brand->name}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
    <!-- shop start -->
    <div class="cv-shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="cv-shop-box">
                        <div class="cv-shop-title">
                            <h2 class="cv-sidebar-title">@lang('general.showing_result')</h2>
                            <p><span>@lang('general.total') : </span>{{$models->count()}}</p>
                        </div>
                        <div class="cv-product-all wow fadeIn" data-wow-delay="0.5s">
                            <div class="cv-gallery-grid">
                                @foreach($models as $model)
                                    <div class="cv-product-box cv-product-item">
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
                                @endforeach
                            </div>
                            <div class="co-12">
                                @if($models->count() > 0)
                                    {{$models->links()}}
                                @else
                                    <div class="cv-shop-title" style="justify-content: center;">
                                        <h2 class="text-muted mb-0 text-center">@lang('general.no_model_found')</h2>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cv-shop-sidebar">
                        <div class="cv-widget cv-search">
                            <h2 class="cv-sidebar-title">@lang('general.search')</h2>
                            <form action="{{route('website.models', [$brand->id])}}" method="get">
                                <input type="text" name="name" value="{{$name}}" placeholder="@lang('general.search_here')"/>
                                <button type="submit" class="cv-btn">@lang('general.search')</button>
                            </form>
                        </div>
                        <div class="cv-widget cv-product-category">
                            <h2 class="cv-sidebar-title">@lang('general.brands')</h2>
                            <ul>
                                @foreach(\App\Helper\Helper::brands() as $brand_model)
                                    <li><a href="{{route('website.models', $brand_model['id'])}}">{{$brand_model['name']}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- shop end -->

@endsection

@push('scripts')

@endpush
