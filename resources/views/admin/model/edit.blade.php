@extends('layouts.admin.app')

@section('title')
    @lang('dashboard.models')
@endsection

@push('styles')

    @if(app()->getLocale() == 'ar')
        <!-- Dropify -->
        <link rel="stylesheet" href="{{asset('assets/admin-assets/dropify/css/dropify-rtl.min.css')}}">
        <!-- slick -->
        <link rel="stylesheet" href="{{asset('assets/admin-assets/slick/slick-rtl.css')}}">
        <link rel="stylesheet" href="{{asset('assets/admin-assets/slick/slick-theme-rtl.css')}}">
    @else
        <!-- Dropify -->
        <link rel="stylesheet" href="{{asset('assets/admin-assets/dropify/css/dropify.min.css')}}">
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
            ['title' => __('dashboard.models'),
             'current_page' => __('dashboard.edit'),
              'prev_pages' => [
                    'admin.dashboard' => __('dashboard.dashboard'),
                    'admin.models.index' => __('dashboard.models')
                ]
            ])

        <!-- Main content -->
        <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- Horizontal Form -->
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">@lang('dashboard.edit')</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                {!! Form::model($model, ['route' => ['admin.models.update', $model->id], 'method' => 'put', 'id' => 'edit_form', 'class' => 'form-horizontal', 'files' => true]) !!}
                                    <div class="card-body">
                                        <div class="form-group">
                                            {!! Html::decode(Form::label(null, __('dashboard.brand') . ' <span class="text-bold text-danger">*</span>')) !!}
                                            {!! Form::select('brand_id', $brands, null, ['placeholder' => __('dashboard.choose one...'), 'class' => 'custom-select']) !!}
                                            @error('brand_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        @foreach(['ar', 'en'] as $lang)
                                            <div class="form-group">
                                                {!! Html::decode(Form::label(null, __('dashboard.name_'.$lang) . ' <span class="text-bold text-danger">*</span>')) !!}
                                                {!! Form::text('name_'.$lang, null, ['class' => 'form-control', 'placeholder' => __('dashboard.name_'.$lang), 'required' => true]) !!}
                                                @error('name_'.$lang)
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        @endforeach
                                        @foreach(['ar', 'en'] as $lang)
                                            <div class="form-group">
                                                {!! Html::decode(Form::label(null, __('dashboard.description_'.$lang) . ' <span class="text-bold text-danger">*</span>')) !!}
                                                {!! Form::textarea('description_'.$lang, null, ['class' => 'form-control summernote', 'placeholder' => __('dashboard.description_'.$lang)]) !!}
                                                @error('description_'.$lang)
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        @endforeach
                                        <div class="multiple-items">
                                            @foreach($model->getImages as $image)
                                                <div>
                                                    <img src="{{$image->image_path}}" alt="model" class="w-100">
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="form-group">
                                            {!! Html::decode(Form::label(null, __('dashboard.images'))) !!}
                                            <input type="file" name="images[]" class="dropify" data-default-file="" accept="image/png, image/jpeg, image/jpg" data-height="220" multiple/>
                                            @error('images')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" form="edit_form" class="btn btn-success">@lang('dashboard.save')</button>
                                    </div>
                                    <!-- /.card-footer -->
                                {!! Form::close() !!}
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
    <!-- Dropify -->
    <script src="{{asset('assets/admin-assets/dropify/js/dropify.min.js')}}"></script>
    <!-- Page specific script -->
    <script>
        $(function () {
            $('.dropify').dropify({
                messages: {
                    'default': "@lang('dashboard.dropify_default')",
                    'replace': "@lang('dashboard.dropify_replace')",
                    'remove': "@lang('dashboard.dropify_remove')",
                    'error': "@lang('dashboard.dropify_error')"
                },
            });
            $('.multiple-items').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1
            });
            $('.summernote').summernote();
            bsCustomFileInput.init();
        });
    </script>
@endpush
