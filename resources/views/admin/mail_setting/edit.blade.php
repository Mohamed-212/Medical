@extends('layouts.admin.app')

@section('title')
    @lang('dashboard.mail_setting')
@endsection

@push('styles')
@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('layouts.admin.includes._breadcrumb',
            ['title' => __('dashboard.mail_setting'),
             'current_page' => __('dashboard.mail_setting'),
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
                                <form action="{{route('admin.mail.update')}}" method="post" id="edit_form" class="form-horizontal">
                                    @csrf
                                    <div class="card-body">
                                        @include('layouts.admin.includes._flash_messages')
                                        <div class="form-group">
                                            {!! Html::decode(Form::label(null, __('dashboard.host') . ' <span class="text-bold text-danger">*</span>')) !!}
                                            {!! Form::text('host', old('host', $setup['host']), ['class' => 'form-control', 'placeholder' => __('dashboard.host'), 'required' => true]) !!}
                                            @error('host')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            {!! Html::decode(Form::label(null, __('dashboard.port') . ' <span class="text-bold text-danger">*</span>')) !!}
                                            {!! Form::text('port', old('port', $setup['port']), ['class' => 'form-control', 'placeholder' => __('dashboard.port'), 'required' => true]) !!}
                                            @error('port')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            {!! Html::decode(Form::label(null, __('dashboard.encryption') . ' <span class="text-bold text-danger">*</span>')) !!}
                                            {!! Form::text('encryption', old('encryption', $setup['encryption']), ['class' => 'form-control', 'placeholder' => __('dashboard.encryption'), 'required' => true]) !!}
                                            @error('encryption')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            {!! Html::decode(Form::label(null, __('dashboard.username') . ' <span class="text-bold text-danger">*</span>')) !!}
                                            {!! Form::email('username', old('username', $setup['username']), ['class' => 'form-control', 'placeholder' => __('dashboard.username'), 'required' => true]) !!}
                                            @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            {!! Html::decode(Form::label(null, __('dashboard.password') . ' <span class="text-bold text-danger">*</span>')) !!}
                                            <input type="password" name="password" value="{{old('password', $setup['password'])}}" class="form-control" placeholder="@lang('dashboard.password')" required>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                {!! Html::decode(Form::label(null, __('dashboard.send_to') . ' <span class="text-bold text-danger">*</span>')) !!}
                                                <button type="button" class="btn btn-primary mb-3 float-right add"><i class="fa fa-plus"></i></button>
                                            </div>
                                            <div id="to">
                                                @foreach($setup['to'] as $index => $to)
                                                    <div>
                                                        <div class="input-group mb-3">
                                                            {!! Form::email('to[]', old('to.'.$index, $setup['to'][$index]), ['class' => 'form-control', 'placeholder' => __('dashboard.username'), 'required' => true]) !!}
                                                            @if($index > 0)
                                                                <span class="input-group-append">
                                                                    <button type="button" class="btn btn-danger btn-flat delete"><i class="fa fa-trash"></i></button>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
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
            $('body').on('click', '.delete', function (){
                $(this).parent().parent().parent().remove();
            });
            $('.add').click(function (){
                $('#to').append(
                    '<div>' +
                        '<div class="input-group mb-3">' +
                            '{!! Form::email('to[]', null, ['class' => 'form-control', 'placeholder' => __('dashboard.username'), 'required' => true]) !!}' +
                            '<span class="input-group-append">' +
                                '<button type="button" class="btn btn-danger btn-flat delete"><i class="fa fa-trash"></i></button>' +
                            '</span>' +
                        '</div>' +
                    '</div>'
                );
            });
        });
    </script>
@endpush
