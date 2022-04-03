@extends('layouts.website.app')

@section('title')
    @lang('general.about_us')
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
                        <h1>@lang('general.about_us')</h1>
                        <ul>
                            <li><a href="{{route('website.home')}}">@lang('general.home')</a></li>
                            <li>@lang('general.about_us')</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
    <!-- about start -->
    <div class="cv-about">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-5">
                    <div class="cv-about-img spacer-top">
                        <img src="{{asset('assets/website-assets/images/about.png')}}" alt="image" class="img-fluid"/>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="cv-about-content">
                        <p>{!! \App\Helper\Helper::setup()['about_us_'.app()->getLocale()]['value'] !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about end -->

@endsection

@push('scripts')

@endpush
