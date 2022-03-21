@extends('layouts.admin.app')

@section('title')
    @lang('dashboard.services')
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
        ['title' => __('dashboard.services'),
         'current_page' => __('dashboard.services'),
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
                                    <a href="{{route('admin.services.create')}}" class="btn btn-primary"> <i class="fas fa-plus"></i>
                                        @lang('dashboard.create') </a>
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
                                        <th>@lang('dashboard.actions')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($services as $index => $service)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{$service->name}}</td>
                                            <td>
                                                <a href="{{route('admin.services.show', $service->id)}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                <a href="{{route('admin.services.edit', $service->id)}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                                {!! Form::open(['route' => ['admin.services.destroy', $service->id], 'method' => 'delete', 'class' => 'd-inline-block']) !!}
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
            $("#example1").DataTable({
                "responsive": true, "lengthChange": true, "autoWidth": false,
                "language": {"url": dataTablesLanguageLink},
            });
        });
    </script>
@endpush
