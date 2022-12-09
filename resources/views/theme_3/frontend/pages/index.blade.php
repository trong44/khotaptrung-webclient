@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head')
@endsection
@section('styles')
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/lib_bootstrap.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/minigame.css">
@endsection

@section('content')
    @if(isset(theme('')->theme_config->sys_theme_ver))


        @php
            $dat = explode(',',setting('sys_theme_ver_page_build'));
            $data_title = null;
            $data_widget = null;
            foreach($dat as $key => $it){
                if ($key == 0){
                    $data_title = explode('|',$it);
                }else{
                    $data_widget = explode('|',$it);
                }
            }


        @endphp
        @if(isset($data_widget))
        <div class="container container-fix">
            @foreach($data_widget as $key => $value)
                @include('frontend.widget.'.$value.'',with(['title'=>$data_title[$key]]))
            @endforeach
        </div>
        @endif
    @else
{{--        <div class="banner-home " >--}}
{{--            @include('frontend.widget.__slider__banner')--}}
{{--            <div class="banner-content">--}}
{{--                <div class="container  container-fix" >--}}
{{--                    <div class="d-flex justify-content-between">--}}
{{--                        <div class="box-list-service d-g-lg-none">--}}
{{--                            <p><img src="/assets/frontend/{{theme('')->theme_key}}/image/service-page-icon.png" alt="" id="menu_service">Danh mục dịch vụ</p>--}}
{{--                            <hr>--}}
{{--                            @include('frontend.widget.__list_service')--}}
{{--                        </div>--}}

{{--                        @if(setting('sys_marquee'))--}}
{{--                            <div class="rotation-notify-home text-slider  ">--}}
{{--                                <img class="img-text-slider" src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/sound.svg" alt="">--}}
{{--                                <marquee class="rotation-marquee marquee-move">--}}

{{--                                    <div class="rotation-marquee-item marquee-item">--}}
{{--                                        {!! setting('sys_marquee') !!}--}}
{{--                                    </div>--}}
{{--                                </marquee>--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                        <div class="box-list-top top-list d-g-lg-none">--}}
{{--                            <p><img src="/assets/frontend/{{theme('')->theme_key}}/image/star_top.png" alt="" id="menu_top_list"> Top nạp T{{Carbon\Carbon::now()->month}}</p>--}}

{{--                            @include('frontend.widget.__top_nap_the')--}}

{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="container container-fix">

            @include('frontend.widget.__slider__banner__home')

            @include('frontend.widget.__list_serve_remark_mobile')
            {{--            Hot sale--}}
            @include('frontend.widget.__hotsale')
            {{--            Chơi gần đây--}}
            @include('frontend.widget.__play__recently__home')
            {{--            Top nạp thẻ mobile--}}
            @include('frontend.widget.__top_nap_the_mobile')
            {{--        Dịch vụ game--}}
            @include('frontend.widget.__service_game')
            {{--             Minigame--}}
            @include('frontend.widget.__content__home__minigame')

            @include('frontend.widget.__list_serve_remark')
            {{--                        Nạp thẻ--}}
            @include('frontend.widget.__nap_the')
            {{--                Danh mục mua acc--}}
            @include('frontend.widget.__content__home__game__random')
            @include('frontend.widget.__content__home__game_thuong')
            {{--                @include('frontend.widget.__random__account')--}}
            {{--                     Dịch vụ nổi bật--}}
            @include('frontend.widget.__tin__tuc')
            @include('frontend.widget.__abount__us')
        </div>
    @endif

{{--    <div class="menu-side-item" style="">--}}
{{--        <a href="#" class=" go-top" style="display: inline;">--}}
{{--            <img src="/assets/frontend/theme_3/image/back-top.svg" alt="" style=" ">--}}
{{--        </a>--}}
{{--    </div>--}}
    @include('frontend.widget.__bonus')
    @include('theme_3.frontend.widget.modal.__confirm_charge')
    @include('theme_3.frontend.widget.modal.__success_charge')
    @include('theme_3.frontend.widget.modal.__reject_charge')
    @include('theme_3.frontend.widget.modal.__success_charge_atm')
    @include('theme_3.frontend.widget.modal.__success_wallet_card')



    <script src="/assets/frontend/theme_3/js/js_phu/purchase_card.js?v={{time()}}"></script>
{{--    <script src="https://cdnjs.com/libraries/handlebars.js"></script>--}}
{{--    <script src="https://github.com/wycats/handlebars.js"></script>--}}
    <script src="/assets/frontend/theme_3/js/charge/charge_home.js?v={{time()}}"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/nick/nick-random.js?v={{time()}}"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/nick/buyaccrandomhome.js?v={{time()}}"></script>
    @if(\App\Library\AuthFrontendCustom::check())
        <script src="/assets/frontend/theme_3/js/transfer/transfer.js?v={{time()}}"></script>
    @endif


@endsection

