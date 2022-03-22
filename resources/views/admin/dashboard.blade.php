@extends('layouts.admin.app')

@section('title')
    @lang('dashboard.dashboard')
@endsection

@push('styles')

@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('layouts.admin.includes._breadcrumb',
            ['title' => __('dashboard.dashboard'),
             'current_page' => __('dashboard.dashboard'),
              'prev_pages' => []
            ])

            @php
                if(app()->getLocale() == 'ar')
                    $arrow_class = 'fa-arrow-circle-left';
                else
                    $arrow_class = 'fa-arrow-circle-right';
            @endphp

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{$devices}}</h3>
                                <p>@lang('dashboard.devices')</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-folder"></i>
                            </div>
                            <a href="{{route('admin.devices.index')}}" class="small-box-footer">@lang('dashboard.more_info') <i class="fas {{$arrow_class}}"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{$brands}}</h3>
                                <p>@lang('dashboard.brands')</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-android-folder"></i>
                            </div>
                            <a href="{{route('admin.brands.index')}}" class="small-box-footer">@lang('dashboard.more_info') <i class="fas {{$arrow_class}}"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{$models}}</h3>
                                <p>@lang('dashboard.models')</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-android-folder-open"></i>
                            </div>
                            <a href="{{route('admin.models.index')}}" class="small-box-footer">@lang('dashboard.more_info') <i class="fas {{$arrow_class}}"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{$services}}</h3>
                                <p>@lang('dashboard.services')</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-android-apps"></i>
                            </div>
                            <a href="{{route('admin.services.index')}}" class="small-box-footer">@lang('dashboard.more_info') <i class="fas {{$arrow_class}}"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@push('scripts')

@endpush
