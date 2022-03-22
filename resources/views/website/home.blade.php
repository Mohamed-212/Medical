@extends('layouts.website.app')

@section('title')
    @lang('general.home')
@endsection

@push('styles')

@endpush

@section('content')

    <!-- banner start -->
    <div class="cv-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="cv-banner-two-text cv-banner-three-text">
                        <p class="cv-banner-cat">Upto 50% Off On Every Product</p>
                        <h1>Medical personal protective equipment</h1>
                        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                        <button class="cv-btn">Shop now</button>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="cv-banner-img-three">
                        <img src="https://via.placeholder.com/400x648" alt="images" class="img-fluid"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner end -->

    <!-- partner start -->
    <div class="cv-partners spacer-top spacer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <a href="javascript:;"><img src="https://via.placeholder.com/156x78" alt="image" class="img-fluid"/></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="javascript:;"><img src="https://via.placeholder.com/156x78" alt="image" class="img-fluid"/></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="javascript:;"><img src="https://via.placeholder.com/156x78" alt="image" class="img-fluid"/></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="javascript:;"><img src="https://via.placeholder.com/156x78" alt="image" class="img-fluid"/></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="javascript:;"><img src="https://via.placeholder.com/156x78" alt="image" class="img-fluid"/></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- partner end -->

@endsection

@push('scripts')

@endpush
