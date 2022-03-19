<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.dashboard')}}" class="brand-link">
        <img src="{{asset('assets/admin-assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">@lang('dashboard.logo')</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('assets/admin-assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('admin.dashboard')}}" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('admin.devices.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>@lang('dashboard.devices')</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.brands.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>@lang('dashboard.brands')</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.models.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>@lang('dashboard.models')</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.services.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>@lang('dashboard.services')</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.branches.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>@lang('dashboard.branches')</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.company.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>@lang('dashboard.company_info')</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
