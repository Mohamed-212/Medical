<!-- main header start -->
<div class="cv-header-two">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-7">
                <div class="cv-logo">
                    <a href="{{route('website.home')}}"><img src="{{asset('assets/website-assets/images/logo-color.svg')}}" alt="image" class="img-fluid"/></a>
                </div>
            </div>
            <div class="col-lg-9 col-5">
                <div class="cv-nav-bar">
                    <div class="cv-menu">
                        <ul>
                            <li><a href="{{route('website.home')}}">@lang('general.home')</a></li>
                            <li><a href="about.html">@lang('general.about_us')</a></li>
                            <li class="cv-children-menu cv-mega-li"><a href="javascript:;">@lang('general.devices')</a>
                                <div class="cv-mega-menu">
                                    <div class="cm-menu-list">
                                        <ul>
                                            <li>
                                                <h3>Face Mask</h3>
                                            </li>
                                            <li><a href="shop.html">N95 masks</a></li>
                                            <li><a href="shop.html">Prana air masks</a></li>
                                            <li><a href="shop.html">Totobobo masks</a></li>
                                            <li><a href="shop.html">Oxiclear masks</a></li>
                                            <li><a href="shop.html">Noymi masks</a></li>
                                        </ul>
                                    </div>
                                    <div class="cm-menu-list">
                                        <ul>
                                            <li>
                                                <h3>PPE kit</h3>
                                            </li>
                                            <li><a href="shop.html">General free size</a></li>
                                            <li><a href="shop.html">Disposable kit</a></li>
                                            <li><a href="shop.html">Surgical gown</a></li>
                                            <li><a href="shop.html">Non woven kit</a></li>
                                            <li><a href="shop.html">Pp spun bond</a></li>
                                        </ul>
                                    </div>
                                    <div class="cm-menu-list">
                                        <ul>
                                            <li>
                                                <h3>safety suits</h3>
                                            </li>
                                            <li><a href="shop.html">Nonwoven laminated</a></li>
                                            <li><a href="shop.html">100 gsm disposable</a></li>
                                            <li><a href="shop.html">Polypropylene 90 GSM</a></li>
                                            <li><a href="shop.html">Disposable</a></li>
                                            <li><a href="shop.html">Body coveralls</a></li>
                                        </ul>
                                    </div>
                                    <div class="cm-menu-list">
                                        <ul>
                                            <li>
                                                <h3>Eye protect</h3>
                                            </li>
                                            <li><a href="shop.html">safety goggles</a></li>
                                            <li><a href="shop.html">Zoom goggles</a></li>
                                            <li><a href="shop.html">Sleeping masks</a></li>
                                            <li><a href="shop.html">Eye lense</a></li>
                                            <li><a href="shop.html">Eye protector</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="cv-children-menu">
                                <a href="javascript:;">@lang('general.services')</a>
                                <ul class="cv-sub-mmenu">
                                    @if(config('website.services'))
                                        @foreach(config('website.services') as $service)
                                            <li><a href="blog-single.html">{{$service->name}}</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                            <li><a href="contact.html">@lang('general.contact_us')</a></li>
                            <!-- Language Dropdown Menu -->
                            <li class="cv-children-menu">
                                <a href=""> @if(app()->getLocale() == 'ar') @lang('general.arabic') @else @lang('general.english') @endif
                                    <i class="flag-icon @if(app()->getLocale() == 'ar') flag-icon-eg @else flag-icon-us @endif "></i>
                                </a>
                                <ul class="cv-sub-mmenu">
                                    <li>
                                        <a href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}" >
                                            <i class="flag-icon flag-icon-us mr-2"></i> @lang('general.english')
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}" >
                                            <i class="flag-icon flag-icon-eg mr-2"></i> @lang('general.arabic')
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="cv-head-icon">
                        <div class="cv-toggle-nav">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- main header end -->
