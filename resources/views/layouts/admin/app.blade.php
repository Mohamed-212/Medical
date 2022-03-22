<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">

<!-- BEGIN: Head-->
@include('layouts.admin.includes._head')
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="hold-transition sidebar-mini layout-fixed" dir="{{(app()->getLocale() == 'ar')?"rtl":"ltr"}}">

    <!-- wrapper -->
    <div class="wrapper">

        <!-- BEGIN: Loader-->
        @include('layouts.admin.includes._loader')
        <!-- END: Loader-->

        <!-- BEGIN: Header-->
        @include('layouts.admin.includes._header')
        <!-- END: Header-->

        <!-- BEGIN: Main Menu-->
        @include('layouts.admin.includes._aside')
        <!-- END: Main Menu-->

        <!-- BEGIN: Footer-->
        @yield('content')
        <!-- END: Content-->

        <!-- BEGIN: Footer-->
        @include('layouts.admin.includes._footer')
        <!-- END: Footer-->

        <!-- BEGIN: Theme options-->
        @include('layouts.admin.includes._control_sidebar')
        <!-- END: Theme options-->

    </div>
    <!-- ./wrapper -->

    <!-- BEGIN: Script-->
    @include('layouts.admin.includes._scripts')
    <!-- END: Script-->

</body>
<!-- END: Body-->
</html>
