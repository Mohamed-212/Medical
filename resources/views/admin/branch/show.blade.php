@extends('layouts.admin.app')

@section('title')
    @lang('dashboard.branches')
@endsection

@push('styles')
@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('layouts.admin.includes._breadcrumb',
            ['title' => __('dashboard.branches'),
             'current_page' => __('dashboard.show'),
              'prev_pages' => [
                    'admin.dashboard' => __('dashboard.dashboard'),
                    'admin.branches.index' => __('dashboard.branches')
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
                                            {!! Form::text('name_'.$lang, $branch['name_'.$lang], ['class' => 'form-control', 'placeholder' => __('dashboard.name_'.$lang), 'disabled' => true]) !!}
                                        </div>
                                    @endforeach
                                    @foreach(['ar', 'en'] as $lang)
                                        <div class="form-group">
                                            {!! Html::decode(Form::label(null, __('dashboard.address_'.$lang))) !!}
                                            {!! Form::text('address_'.$lang, $branch['address_'.$lang], ['class' => 'form-control', 'placeholder' => __('dashboard.address_'.$lang), 'disabled' => true]) !!}
                                        </div>
                                    @endforeach
                                    <div class="form-group">
                                        {!! Html::decode(Form::label(null, __('dashboard.email'))) !!}
                                        {!! Form::email('email', $branch->email, ['class' => 'form-control', 'placeholder' => __('dashboard.email'), 'disabled' => true]) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Html::decode(Form::label(null, __('dashboard.mobile'))) !!}
                                        {!! Form::text('mobile', $branch->mobile, ['class' => 'form-control', 'placeholder' => __('dashboard.mobile'), 'disabled' => true]) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Html::decode(Form::label(null, __('dashboard.landline'))) !!}
                                        {!! Form::text('telephone', $branch->telephone, ['class' => 'form-control', 'placeholder' => __('dashboard.landline'), 'disabled' => true]) !!}
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
    <!-- Page specific script -->
    <script>
        $(function () {
            bsCustomFileInput.init();
        });
    </script>
@endpush
