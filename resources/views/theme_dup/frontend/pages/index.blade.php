@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head')
@endsection
@push('style')
@endpush
@push('js')

@endpush

@section('meta_robots')
    <meta name="robots" content="index,follow" />
@endsection
@section('content')

    <div class="layout-page">
        <div class="content-layout" >
            <div class="content-banner container px-2" style="background-color: #363636">
                <div class="content-banner-card" style="background-color: #1d1d1d">
                    <ul class="nav " role="tablist" >
                        <li role="presentation" class="nav-item " >
                            <a  class="" data-toggle="tab" href="#top_napthe" role="tab"  >
                                TOP NẠP THẺ THÁNG {{Carbon\Carbon::now()->month}}
                            </a>
                        </li>
                        <li role="presentation" class="active" >

                            <a  class="nav-item active" data-toggle="tab" href="#napthe" role="tab"  >
                                NẠP THẺ

                            </a>
                        </li>
                    </ul>

                    <div class="tab-content px-3" >
                        <div class="tab-pane  fade show " id="top_napthe">
                            <div class="content-banner-card-box">
                                @include('frontend.widget.__top_nap_the')


                            </div>
                        </div>
                        <div class="tab-pane  fade show active" id="napthe">
                            <div class="content-banner-card-form">
                                @include('frontend.widget.__nap_the')
{{--                                {!! widget('frontend.widget.__nap_the') !!}--}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-banner-slide">
                    <div class="slider "  >
                        <div class="row" style="position: relative">
                            <div class="col-12 slider_in pl-0" >
                                <div class="swiper-container mySwiper slider_detail">
                                    <div class="swiper-wrapper">
                                        @include('frontend.widget.__slider__banner')
                                    </div>
                                    <!--                                  <div class="swiper-pagination"></div>-->
                                </div>
                                <div class="swiper-button-prev">
                                    <i class="fas fa-chevron-left"></i>
                                </div>
                                <div class="swiper-button-next">
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-advertise ">
                <div class="container">
                    <marquee width="100%" behavior="scroll" >

                        <p style=""><strong>{!! setting('sys_marquee') !!}</strong>  </p>

                    </marquee>
                </div>
            </div>

            @include('frontend.widget.__dich__vu__noi__bat')
            @include('frontend.widget.__content__home__minigame')



            @include('frontend.widget.__content__home__game')

            @include('frontend.widget.__content__home__dichvu')


            <div class="content-video intro_text" id="lockmoney_taget">
                <div class="container">
                    <div class="content-video-in">
                        {!! setting('sys_intro_text') !!}
                    </div>
                    <div class="view-more">
                        Xem tất cả »
                    </div>
                    <div class="view-less">
                        « Thu gọn
                    </div>
                </div>
            </div>

        </div>

        @include('frontend.widget.__bonus')
{{--        @include('frontend.widget.__menu__taget')--}}

    </div>

    @if(setting('sys_noti_popup') != '')
        <div class="modal fade in" id="noticeModal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">Thông báo</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body" style="font-family: helvetica, arial, sans-serif;">
                        {!! setting('sys_noti_popup') !!}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-turnoff-noti btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase openModalNoti" data-dismiss="modal">Tắt trong 1h</button>
                        <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/notification.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/top_charge/top_charge.js?v={{time()}}"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/charge/charge_home.js?v={{time()}}"></script>

    <script>
        $(document).ready(function(){
            var key = 1;

            $(function() {
                $('.content-items').each(function(key,value){

                    $(this).attr('id', 'target_'+key);
                });
            });
        })
    </script>
@endsection

