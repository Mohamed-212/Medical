@extends('layouts.website.app')

@section('title')
    {{$service->name}}
@endsection

@push('styles')
    <style>
        .cv-arrival{
            background: #f8fdff;
        }
        .bg-info {
            background-color: #b7b7b7 !important
        }
        .modal-dialog {
            width: 80%;
            max-width: unset;
            margin: 1.75rem auto;
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
                        <h1>{{$service->name}}</h1>
                        <ul>
                            <li><a href="{{route('website.home')}}">@lang('general.home')</a></li>
                            <li>{{$service->name}}</li>
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
                        <div id="carouselExampleIndicators" class="carousel slide col-md-5" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                @foreach($service->getImages as $index => $image)
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$index}}" @if($index == 0) class="active" aria-current="true" @endif aria-label="Slide {{$index+1}}"></button>
                                @endforeach
                            </div>
                            <div class="carousel-inner">
                                @foreach($service->getImages as $index => $image)
                                    <div class="carousel-item @if($index == 0) active @endif ">
                                        <img src="{{$image->image_path}}" style="height: 350px" class="d-block w-100" alt="image">
                                    </div>
                                @endforeach
                            </div>
                            @if(app()->getLocale() == 'ar')
                                <button class="carousel-control-next bg-info" type="button"
                                        data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                                <button class="carousel-control-prev bg-info" type="button"
                                        data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                            @else
                                <button class="carousel-control-prev bg-info" type="button"
                                        data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next bg-info" type="button"
                                        data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            @endif
                        </div>
                        <div class="cv-blog-data col-md-7">
                            <h2 class="cv-blog-title">{{$service->name}}</h2>
                            {!! $service->description !!}
                            <button type="button" class="cv-btn submitForm mt-4 w-100"
                                    data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">@lang('general.request_quote')</button>
                            @include('layouts.website.includes._flash_messages')
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
                <h1>@lang('general.all_services_title')</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach($services as $service)
                                <div class="swiper-slide">
                                    <div class="cv-product-box">
                                        <div class="cv-product-img">
                                            <img src="{{$service->getImages[0]['image_path']}}" style="height: 250px" alt="image" class="img-fluid"/>
                                            <div class="cv-product-button">
                                                <a href="{{route('website.services.show', $service->id)}}" class="cv-btn"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 461.312 461.312">
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
                                            <a href="{{route('website.services.show', $service->id)}}" class="cv-price-title">{{$service->name}}</a>
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
    <!-- Modal -->
    <div class="modal fade modal-dialog-scrollable" id="exampleModal" tabindex="-1"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'website.models.mail.send', 'method' => 'post', 'id' => 'create_form']) !!}
                    {!! Form::hidden('service', $service->name) !!}
                    <div class="row mb-3">
                        <div class="form-group col-md-6">
                            {!! Html::decode(Form::label(null, __('general.first_name') . ' <span class="text-bold text-danger">*</span>')) !!}
                            {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => __('general.first_name'), 'required' => true]) !!}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Html::decode(Form::label(null, __('general.last_name') . ' <span class="text-bold text-danger">*</span>')) !!}
                            {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => __('general.last_name'), 'required' => true]) !!}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="form-group col-md-6">
                            {!! Html::decode(Form::label(null, __('general.email') . ' <span class="text-bold text-danger">*</span>')) !!}
                            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => __('general.email'), 'required' => true]) !!}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Html::decode(Form::label(null, __('general.phone') . ' <span class="text-bold text-danger">*</span>')) !!}
                            {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => __('general.phone'), 'required' => true]) !!}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="form-group col-md-6">
                            {!! Html::decode(Form::label(null, __('general.company') . ' <span class="text-bold text-danger">*</span>')) !!}
                            {!! Form::text('company', null, ['class' => 'form-control', 'placeholder' => __('general.company'), 'required' => true]) !!}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Html::decode(Form::label(null, __('general.position_title') . ' <span class="text-bold text-danger">*</span>')) !!}
                            {!! Form::text('position_title', null, ['class' => 'form-control', 'placeholder' => __('general.position_title'), 'required' => true]) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            {!! Html::decode(Form::label(null, __('general.how_may_we_help_you') . ' <span class="text-bold text-danger">*</span>')) !!}
                            {!! Form::textarea('message', null, ['class' => 'form-control', 'required' => true]) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" form="create_form" class="btn btn-success">@lang('general.send')</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush
