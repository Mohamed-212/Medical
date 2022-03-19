<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Language Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="flag-icon @if(app()->getLocale() == 'ar') flag-icon-eg @else flag-icon-us @endif "></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right p-0">
                <a href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}" class="dropdown-item active">
                    <i class="flag-icon flag-icon-us mr-2"></i> @lang('dashboard.english')
                </a>
                <a href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}" class="dropdown-item">
                    <i class="flag-icon flag-icon-eg mr-2"></i> @lang('dashboard.arabic')
                </a>
            </div>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.logout')}}" class="nav-link btn btn-danger text-white">
                <i class="ion ion-log-out"></i> @lang('auth.logout')
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
