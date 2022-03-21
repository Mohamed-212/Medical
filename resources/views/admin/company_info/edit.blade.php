@extends('layouts.admin.app')

@section('title')
    @lang('dashboard.company_info')
@endsection

@push('styles')
@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('layouts.admin.includes._breadcrumb',
            ['title' => __('dashboard.company_info'),
             'current_page' => __('dashboard.company_info'),
              'prev_pages' => [
                    'admin.dashboard' => __('dashboard.dashboard')
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
                                <form action="{{route('admin.company.update')}}" method="post" id="edit_form" class="form-horizontal">
                                    @csrf
                                    <div class="card-body">
                                        @include('layouts.admin.includes._flash_messages')
                                        @foreach(['ar', 'en'] as $lang)
                                            <div class="form-group">
                                                {!! Html::decode(Form::label(null, __('dashboard.about_us_'.$lang) . ' <span class="text-bold text-danger">*</span>')) !!}
                                                {!! Form::textarea('about_us_'.$lang, old('about_us_'.$lang, array_key_exists('about_us_'.$lang, $setup)?$setup['about_us_'.$lang]['value']:''), ['class' => 'form-control summernote', 'placeholder' => __('dashboard.about_us_'.$lang)]) !!}
                                                @error('about_us_'.$lang)
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        @endforeach
                                        @foreach(['ar', 'en'] as $lang)
                                            <div class="form-group">
                                                {!! Html::decode(Form::label(null, __('dashboard.address_'.$lang) . ' <span class="text-bold text-danger">*</span>')) !!}
                                                {!! Form::text('address_'.$lang, old('address_'.$lang, array_key_exists('address_'.$lang, $setup)?$setup['address_'.$lang]['value']:''), ['class' => 'form-control', 'placeholder' => __('dashboard.address_'.$lang), 'required' => true]) !!}
                                                @error('address_'.$lang)
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        @endforeach
                                        <div class="form-group">
                                            {!! Html::decode(Form::label(null, __('dashboard.email') . ' <span class="text-bold text-danger">*</span>')) !!}
                                            {!! Form::email('email', old('email', array_key_exists('email', $setup)?$setup['email']['value']:''), ['class' => 'form-control', 'placeholder' => __('dashboard.email'), 'required' => true]) !!}
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            {!! Html::decode(Form::label(null, __('dashboard.mobile') . ' <span class="text-bold text-danger">*</span>')) !!}
                                            {!! Form::text('mobile', old('mobile', array_key_exists('mobile', $setup)?$setup['mobile']['value']:''), ['class' => 'form-control', 'placeholder' => __('dashboard.mobile'), 'required' => true]) !!}
                                            @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            {!! Html::decode(Form::label(null, __('dashboard.landline') . ' <span class="text-bold text-danger">*</span>')) !!}
                                            {!! Form::text('telephone', old('telephone', array_key_exists('telephone', $setup)?$setup['telephone']['value']:''), ['class' => 'form-control', 'placeholder' => __('dashboard.landline'), 'required' => true]) !!}
                                            @error('telephone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            {!! Html::decode(Form::label(null, __('dashboard.facebook') . ' <span class="text-bold text-danger">*</span>')) !!}
                                            {!! Form::text('facebook', old('facebook', array_key_exists('facebook', $setup)?$setup['facebook']['value']:''), ['class' => 'form-control', 'placeholder' => __('dashboard.facebook'), 'required' => true]) !!}
                                            @error('facebook')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            {!! Html::decode(Form::label(null, __('dashboard.twitter') . ' <span class="text-bold text-danger">*</span>')) !!}
                                            {!! Form::text('twitter', old('twitter', array_key_exists('twitter', $setup)?$setup['twitter']['value']:''), ['class' => 'form-control', 'placeholder' => __('dashboard.twitter'), 'required' => true]) !!}
                                            @error('twitter')
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
                                </form>
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
    <!-- Page specific script -->
    <script>
        $(function () {
            $('.summernote').summernote();
            bsCustomFileInput.init();
        });
    </script>
@endpush
