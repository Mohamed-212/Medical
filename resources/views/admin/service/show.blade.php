@extends('layouts.admin.app')

@section('title')
    @lang('dashboard.services')
@endsection

@push('styles')

    @if(app()->getLocale() == 'ar')
        <!-- slick -->
        <link rel="stylesheet" href="{{asset('assets/admin-assets/slick/slick-rtl.css')}}">
        <link rel="stylesheet" href="{{asset('assets/admin-assets/slick/slick-theme-rtl.css')}}">
    @else
        <!-- slick -->
        <link rel="stylesheet" href="{{asset('assets/admin-assets/slick/slick.css')}}">
        <link rel="stylesheet" href="{{asset('assets/admin-assets/slick/slick-theme.css')}}">
    @endif

    <style>
        .slick-prev:before, .slick-next:before{
            font-size: 30px;
            color: #0881ff;
        }
    </style>

@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('layouts.admin.includes._breadcrumb',
            ['title' => __('dashboard.services'),
             'current_page' => __('dashboard.show'),
              'prev_pages' => [
                    'admin.dashboard' => __('dashboard.dashboard'),
                    'admin.services.index' => __('dashboard.services')
                ]
            ])

        <!-- Main content -->
        <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- Horizontal Form -->
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">@lang('dashboard.show')</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    @foreach(['ar', 'en'] as $lang)
                                        <div class="form-group">
                                            {!! Html::decode(Form::label(null, __('dashboard.name_'.$lang))) !!}
                                            {!! Form::text('name_'.$lang, $service['name_'.$lang], ['class' => 'form-control', 'placeholder' => __('dashboard.name_'.$lang), 'disabled' => true]) !!}
                                        </div>
                                    @endforeach
                                    @foreach(['ar', 'en'] as $lang)
                                        <div class="form-group">
                                            {!! Html::decode(Form::label(null, __('dashboard.description_'.$lang))) !!}
                                            {!! Form::textarea('description_'.$lang, $service['description_'.$lang], ['class' => 'form-control summernote', 'placeholder' => __('dashboard.description_'.$lang), 'disabled' => true]) !!}
                                        </div>
                                    @endforeach
                                    <div class="multiple-items">
                                        @foreach($service->getImages as $image)
                                            <div>
                                                <img src="{{$image->image_path}}" alt="model" class="w-100">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <a class="btn btn-info" href="{{url()->previous()}}">@lang('dashboard.back')</a>
                                </div>
                                <!-- /.card-footer -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
        <!-- /.content -->
    </div>
@endsection

@push('scripts')
    <!-- bs-custom-file-input -->
    <script src="{{asset('assets/admin-assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <!-- slick -->
    <script src="{{asset('assets/admin-assets/slick/slick.js')}}"></script>
    <!-- Page specific script -->
    <script>
        $(function () {
            $('.multiple-items').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1
            });
            $(".summernote").each(function() {
                $(this).summernote('disable');
            });
            bsCustomFileInput.init();
        });
    </script>
@endpush
