<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">

<!-- BEGIN: Head-->
@include('layouts.website.includes._head')
<!-- END: Head-->

<!-- BEGIN: Body-->
<body dir="{{(app()->getLocale() == 'ar')?"rtl":"ltr"}}">

    <!-- preloader start -->
    @include('layouts.website.includes._loader')
    <!-- preloader end -->

    <!-- main wrapper start -->
    <div class="cv-main-wrapper">

        <!-- BEGIN: Header-->
        @include('layouts.website.includes._header')
        <!-- END: Header-->

        <!-- BEGIN: Footer-->
        @yield('content')
        <!-- END: Content-->

        <!-- BEGIN: Footer-->
        @include('layouts.website.includes._footer')
        <!-- END: Footer-->

    </div>
    <!-- main wrapper start -->

    <!-- BEGIN: Script-->
    @include('layouts.website.includes._scripts')
    <!-- END: Script-->

</body>
<!-- END: Body-->
</html>
