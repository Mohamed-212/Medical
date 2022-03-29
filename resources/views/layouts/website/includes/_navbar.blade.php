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
                            <li><a href="{{route('website.about')}}">@lang('general.about_us')</a></li>
{{--                            <li class="cv-children-menu cv-mega-li"><a href="javascript:;">@lang('general.devices')</a>--}}
{{--                                <div class="cv-mega-menu row">--}}
{{--                                    @foreach(config('website.devices') as $device)--}}
{{--                                        <div class="cm-menu-list">--}}
{{--                                            <ul>--}}
{{--                                                <li>--}}
{{--                                                    <h3>{{$device->name}}</h3>--}}
{{--                                                </li>--}}
{{--                                                @foreach($device->getBrands as $brand)--}}
{{--                                                    <li><a href="{{route('website.models', $brand->id)}}">{{$brand->name}}</a></li>--}}
{{--                                                @endforeach--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                            </li>--}}
                            <li class="cv-children-menu">
                                <a href="javascript:;">@lang('general.devices')</a>
                                <ul class="cv-sub-mmenu">
                                    @foreach(config('website.devices') as $device)
                                        <li><h3>{{$device->name}}</h3>
                                            <ul class="cv-sub-mmenu submenu">
                                                @foreach($device->getBrands as $brand)
                                                    <li><a href="{{route('website.models', $brand->id)}}">{{$brand->name}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="cv-children-menu">
                                <a href="javascript:;">@lang('general.services')</a>
                                <ul class="cv-sub-mmenu">
                                    @if(config('website.services'))
                                        @foreach(config('website.services') as $service)
                                            <li><a href="{{route('website.services.show', $service->id)}}">{{$service->name}}</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                            <li><a href="{{route('website.contact')}}">@lang('general.contact_us')</a></li>
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
