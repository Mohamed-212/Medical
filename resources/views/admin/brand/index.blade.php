@extends('layouts.admin.app')

@section('title')
    @lang('dashboard.brands')
@endsection

@push('styles')

    @if(app()->getLocale() == 'ar')
        <!-- DataTables -->
        <link rel="stylesheet" href="{{asset('assets/admin-assets/plugins/datatables-bs4/css/dataTables.bootstrap4-rtl.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/admin-assets/plugins/datatables-responsive/css/responsive.bootstrap4-rtl.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/admin-assets/plugins/datatables-buttons/css/buttons.bootstrap4-rtl.min.css')}}">
    @else
        <!-- DataTables -->
        <link rel="stylesheet" href="{{asset('assets/admin-assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/admin-assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/admin-assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    @endif

@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

    @include('layouts.admin.includes._breadcrumb',
        ['title' => __('dashboard.brands'),
         'current_page' => __('dashboard.brands'),
          'prev_pages' => [
                'admin.dashboard' => __('dashboard.dashboard')
            ]
        ])

    <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <button type="button" href="{{route('admin.brands.create')}}" class="btn btn-primary" data-toggle="modal" data-target="#modal-create"> <i class="fas fa-plus"></i>
                                        @lang('dashboard.create') </button>
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @include('layouts.admin.includes._flash_messages')
                                <table id="example1" class="table table-bordered table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>@lang('dashboard.sn')</th>
                                        <th>@lang('dashboard.name')</th>
                                        <th>@lang('dashboard.device')</th>
                                        <th>@lang('dashboard.actions')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($brands as $index => $brand)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{$brand->name}}</td>
                                            <td>{{$brand->getDevice->name}}</td>
                                            <td>
                                                <a href="{{route('admin.brands.show', $brand->id)}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                <a href="{{route('admin.brands.edit', $brand->id)}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                                {!! Form::open(['route' => ['admin.brands.destroy', $brand->id], 'method' => 'delete', 'class' => 'd-inline-block']) !!}
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
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

    <!-- .modal -->
    <div class="modal fade" id="modal-create">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">@lang('dashboard.create')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'admin.brands.store', 'method' => 'post', 'id' => 'create_form']) !!}
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
                    <div class="form-group">
                        {!! Html::decode(Form::label(null, __('dashboard.device') . ' <span class="text-bold text-danger">*</span>')) !!}
                        {!! Form::select('device_id', $devices, null, ['placeholder' => __('dashboard.choose one...'), 'class' => 'custom-select']) !!}
                        @error('device_id')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" form="create_form" class="btn btn-success">@lang('dashboard.save')</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection

@push('scripts')
    <!-- DataTables  & Plugins -->
    <script src="{{asset('assets/admin-assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/admin-assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/admin-assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/admin-assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/admin-assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/admin-assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/admin-assets/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('assets/admin-assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/admin-assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/admin-assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/admin-assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/admin-assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <!-- Page specific script -->
    <script>
        $(function () {
            @if($errors && count($errors) > 0)
            $('#modal-create').modal('show');
            @endif
            $("#example1").DataTable({
                "responsive": true, "lengthChange": true, "autoWidth": false,
                "language": {"url": dataTablesLanguageLink},
            });
        });
    </script>
@endpush
