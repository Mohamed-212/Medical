@extends('layouts.admin.app')

@section('title')
    @lang('dashboard.devices')
@endsection

@push('styles')
@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('layouts.admin.includes._breadcrumb',
            ['title' => __('dashboard.devices'),
             'current_page' => __('dashboard.edit'),
              'prev_pages' => [
                    'admin.dashboard' => __('dashboard.dashboard'),
                    'admin.devices.index' => __('dashboard.devices')
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
                                {!! Form::model($device, ['route' => ['admin.devices.update', $device->id], 'method' => 'put', 'id' => 'edit_form', 'class' => 'form-horizontal']) !!}
                                    <div class="card-body">
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
    <!-- Page specific script -->
    <script>
        $(function () {
            bsCustomFileInput.init();
        });
    </script>
@endpush
