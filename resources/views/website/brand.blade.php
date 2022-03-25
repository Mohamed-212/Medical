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
    <!-- blog start -->
    <div class="cv-blog-page spacer-top spacer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="cv-blog-page-box">
                        <div class="row">
                            @foreach($models as $model)
                                <div class="col-md-6">
                                    <div class="cv-blog-box">
                                        <div class="cv-blog-img">
                                            <img src="{{$model->getImages[0]['image_path']}}" style="height: 250px" alt="image" class="img-fluid"/>
                                        </div>
                                        <div class="cv-blog-data">
                                            <a href="{{route('website.models.show', $model->id)}}" class="cv-blog-title">{{$model->name}}</a>
                                            <i class="line-clamp2"></i>
                                            {!! $model->description !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-md-12">
                                @if($models->count() > 0)
                                    {{$models->links()}}
                                @else
                                    <div class="cv-blog-box">
                                        <div class="cv-blog-data">
                                            <div class="cv-blog-data">
                                                <h2 class="text-muted mb-0 text-center">@lang('general.no_model_found')</h2>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cv-blog-sidebar">
                        <div class="cv-widget cv-search">
                            <h2 class="cv-sidebar-title">Search</h2>
                            <form action="{{route('website.models', [$brand->id])}}" method="get">
                                <input type="text" name="name" value="{{$name}}" placeholder="@lang('general.search_here')"/>
                                <button type="submit" class="cv-btn">@lang('general.search')</button>
                            </form>
                        </div>
                        <div class="cv-widget cv-product-category">
                            <h2 class="cv-sidebar-title">@lang('general.brands')</h2>
                            <ul>
                                @foreach(config('website.brands') as $brand_model)
                                    <li><a href="{{route('website.models', $brand_model->id)}}">{{$brand_model->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog end -->

@endsection

@push('scripts')

@endpush
