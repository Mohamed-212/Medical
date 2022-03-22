<!-- footer start -->
<div class="cv-footer cv-footer-two spacer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="cv-foot-box cv-foot-logo">
                    <img src="{{asset('assets/website-assets/images/logo.svg')}}" alt="image" class="img-fluid"/>
                    <p>@lang('general.footer_brief')</p>
                    <div class="cv-foot-payment">
                        <a href="javascript:;"><img src="{{asset('assets/website-assets/images/pay1.png')}}" alt="image" class="img-fluid"/></a>
                        <a href="javascript:;"><img src="{{asset('assets/website-assets/images/pay2.png')}}" alt="image" class="img-fluid"/></a>
                        <a href="javascript:;"><img src="{{asset('assets/website-assets/images/pay3.png')}}" alt="image" class="img-fluid"/></a>
                        <a href="javascript:;"><img src="{{asset('assets/website-assets/images/pay4.png')}}" alt="image" class="img-fluid"/></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="cv-foot-box cv-foot-links">
                    <h2>@lang('general.branches')</h2>
                    <ul>
                        @if(config('website.branches'))
                            @foreach(config('website.branches') as $branch)
                                <li>
                                    <a href="javascript">{{$branch->name}}</a>
                                    <p>{{$branch->address}}</p>
                                </li>
                            @endforeach
                        @else
                            <li>
                                <a href="javascript">@lang('general.main_branch')</a>
                                <p>{{config('website.setup')['address']['value']}}</p>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="cv-foot-box cv-foot-contact">
                    <h2>@lang('general.contact_us')</h2>
                    <p><span>@lang('general.phone') : </span>{{config('website.setup')['phone']['value']}}</p>
                    <p><span>@lang('general.email') : </span>{{config('website.setup')['email']['value']}}</p>
                    <p><span>@lang('general.address') : </span>{{config('website.setup')['address']['value']}}</p>
                    <ul class="cv-foot-social">
                        <li><a href="{{config('website.setup')['facebook']['value']}}">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m15.997 3.985h2.191v-3.816c-.378-.052-1.678-.169-3.192-.169-3.159 0-5.323 1.987-5.323 5.639v3.361h-3.486v4.266h3.486v10.734h4.274v-10.733h3.345l.531-4.266h-3.877v-2.939c.001-1.233.333-2.077 2.051-2.077z"/></svg>
                            </a></li>
                        <li><a href="{{config('website.setup')['twitter']['value']}}">
                                <svg viewBox="-21 -81 681.33464 681" xmlns="http://www.w3.org/2000/svg"><path d="m200.964844 515.292969c241.050781 0 372.871094-199.703125 372.871094-372.871094 0-5.671875-.117188-11.320313-.371094-16.9375 25.585937-18.5 47.824218-41.585937 65.371094-67.863281-23.480469 10.441406-48.753907 17.460937-75.257813 20.636718 27.054687-16.230468 47.828125-41.894531 57.625-72.488281-25.320313 15.011719-53.363281 25.917969-83.214844 31.808594-23.914062-25.472656-57.964843-41.402344-95.664062-41.402344-72.367188 0-131.058594 58.6875-131.058594 131.03125 0 10.289063 1.152344 20.289063 3.398437 29.882813-108.917968-5.480469-205.503906-57.625-270.132812-136.921875-11.25 19.363281-17.742188 41.863281-17.742188 65.871093 0 45.460938 23.136719 85.605469 58.316407 109.082032-21.5-.660156-41.695313-6.5625-59.351563-16.386719-.019531.550781-.019531 1.085937-.019531 1.671875 0 63.46875 45.171875 116.460938 105.144531 128.46875-11.015625 2.996094-22.605468 4.609375-34.558594 4.609375-8.429687 0-16.648437-.828125-24.632812-2.363281 16.683594 52.070312 65.066406 89.960937 122.425781 91.023437-44.855469 35.15625-101.359375 56.097657-162.769531 56.097657-10.5625 0-21.003906-.605469-31.2617188-1.816407 57.9999998 37.175781 126.8710938 58.871094 200.8867188 58.871094"/></svg>
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer end -->
<!-- copyright start -->
<div class="cv-copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>&copy; 2022. @lang('general.all_right_reserved_by') <span class="text-dark">212 Solutions</span></p>
            </div>
        </div>
    </div>
</div>
<!-- copyright end -->
