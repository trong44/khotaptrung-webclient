@extends('frontend.layouts.master')
@section('styles')
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/trong-style/distance.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/trong-style/buy-card.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/style_trong.css">
@endsection
@section('scripts')
{{--    <script src="/assets/frontend/{{theme('')->theme_key}}/js/storecard-v2/buy-card.js"></script>--}}
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/storecard-v2/script_trong.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/storecard-v2/input.js"></script>
@endsection
@section('seo_head')
    @include('frontend.widget.__seo_head')
@endsection
@section('meta_robots')
    <meta name="robots" content="index,follow" />
@endsection
@section('content')
    <div class="container-fix container" id="buy-card">
        <input type="hidden" value="{{ request()->route()->getName() }}" id="isRequest">
        {{--        BANNER --}}

        @include('frontend.widget.__banner__storecard')
        {{--        END BANNER--}}
        {{--breadcrum--}}
        <ul class="breadcrum--list">
            <li class="breadcrum--item">
                <a href="/" class="breadcrum--link">Trang chủ</a>
            </li>
            <li class="breadcrum--item">
                <a href="/mua-the" class="breadcrum--link">Mua thẻ</a>
            </li>
        </ul>
        {{-- end breadcrum--}}
        <div class="row mx-0">
            {{--            NAV CATEGORY--}}
            <div class="col-lg-3 d-none d-lg-block pl-0 _pr-125">
                <div class="card --custom card__nav">
                    <div class="card--head _py-075 pl-3">
                        <div class="card--title">Danh mục thẻ</div>
                    </div>
                    <div class="card--body">
                        <a class="section--card p-lg-3" data-toggle="collapse" href="#card--game__navV2" role="button"
                           aria-expanded="true">
                            <span class="section--card__title">
                                THẺ GAME
                            </span>
                            <span class="d-flex align-items-center">
                                <i class="__icon --arrow --path__custom" style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/icons/arrows/arrow-down.png)"></i>
                            </span>
                        </a>
                        <ul class="collapse card-list show" id="card--game__navV2">
                            {{-- CARD LINK HERE--}}
                            @foreach($telecoms as $key => $telecom)
                                @if($telecom->params->teltecom_type == 2)
                                     <li class="card-item ${nav_active}">
                                         <a href="/mua-the-{{ strtolower($telecom->key) }}" class="card-item_link">
                                             <div class="card-item_thumb mr-2">
                                                 <img src="{{ $telecom->image }}" alt="Icon {{ $telecom->title }}">
                                             </div>
                                             <span class="card-item_name" style="text-transform: capitalize;">
                                                Thẻ {{ strtolower($telecom->title) }}
                                            </span>
                                         </a>
                                     </li>
                                @endif
                            @endforeach
                        </ul>

                        <a class="section--card p-lg-3" data-toggle="collapse" href="#card--phone__nav" role="button"
                           aria-expanded="true">
                            <span class="section--card__title">
                                THẺ ĐIỆN THOẠI
                            </span>
                            <span class="d-flex align-items-center">
                                <i class="__icon --arrow --path__custom"
                                   style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/icons/arrows/arrow-down.png)"></i>
                            </span>
                        </a>
                        <ul class="collapse card-list show" id="card--phone__nav">
                            {{-- CARD LINK HERE--}}
                            @foreach($telecoms as $key => $telecom)
                                @if($telecom->params->teltecom_type == 1)
                                    <li class="card-item ${nav_active}">
                                        <a href="/mua-the-{{ strtolower($telecom->key) }}" class="card-item_link">
                                            <div class="card-item_thumb mr-2">
                                                <img src="{{ $telecom->image }}" alt="Icon {{ $telecom->title }}">
                                            </div>
                                            <span class="card-item_name" style="text-transform: capitalize;">
                                                Thẻ {{ strtolower($telecom->title) }}
                                            </span>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            {{--            END NAV CATEGORY--}}

{{--            PAGE TITLE MOBILE--}}
            <div class="card --custom col-12 d-block d-lg-none">
                <div class="page--mobile__title">
                    Danh mục thẻ
                </div>
            </div>
{{--            END PAGE TITLE MOBILE--}}

            {{--            PAGE CONTENT--}}
            <div class="col-12 col-lg-9 p-0 page--card__content">
                {{--            CARD GAME --}}
                <div class="card --custom _mb-125 _mb-sm-075 px-3 px-lg-0" id="card-game">
                    <div class="card--head px-lg-3 _py-075">
                        <div class="card--title">
                            Thẻ Game
                        </div>
                    </div>
                    <div class="card--body p-lg-2">
                        <div class="row mx-lg-0 _px-sm-075 _pb-sm-075" id="grid--game__card">
                                {{-- SHOW CARD HERE--}}
                            @foreach($telecoms as $key => $telecom)
                                @if($telecom->params->teltecom_type == 2)
                                     <div class="col-4 col-lg-3 px-1 px-lg-2 mb-lg-2">
                                         <a href="/mua-the-{{ strtolower($telecom->key) }}" class="scratch-card">
                                             <div class="card--thumb">
                                                 <img src="{{ $telecom->image }}" class="card--thumb__image py-1 py-lg-0" alt="{{ $telecom->title }}">
                                             </div>
                                             <div class="card--name" style="--bg-color: {{ @$telecom->params->color }};text-transform: capitalize;">
                                                 {{ $telecom->title }}
                                             </div>
                                         </a>
                                     </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                {{--            END CARD GAME--}}

                {{--            CARD PHONE--}}
                <div class="card --custom _mb-125 _mb-sm-075 px-3 px-lg-0" id="card-phone">
                    <div class="card--head px-lg-3 _py-075">
                        <div class="card--title">
                            Thẻ Điện Thoại
                        </div>
                    </div>
                    <div class="card--body p-lg-2">
                        <div class="row mx-lg-0 _px-sm-075 _pb-sm-075"  id="grid--phone__card">
                            {{-- SHOW CARD HERE--}}
                            @foreach($telecoms as $key => $telecom)
                                @if($telecom->params->teltecom_type != 2)
                                    <div class="col-4 col-lg-3 px-1 px-lg-2 mb-lg-2">
                                        <a href="/mua-the-{{ strtolower($telecom->key) }}" class="scratch-card">
                                            <div class="card--thumb">
                                                <img src="{{ $telecom->image }}" class="card--thumb__image py-1 py-lg-0" alt="{{ $telecom->title }}">
                                            </div>
                                            <div class="card--name" style="--bg-color: {{ @$telecom->params->color }};text-transform: capitalize;">
                                                {{ $telecom->title }}
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                {{--            END CARD PHONE--}}

                {{--            SERVICE RELATED--}}
                <div class="card --custom _mb-125 _mb-sm-075 p-3 p-lg-0" id="service-related">
                    @include('frontend.widget.__list_serve_remark_image')
                </div>
                {{--            END SERVICE RELATED--}}

                {{--                SERVICE DESC--}}
                <div class="card --custom p-3 p-lg-3">
                    <div class="card--desc__title mb-4">
                        Mô tả dịch vụ
                    </div>
                    <div class="card--desc__content content-video-in-add p-0 overflow-hidden" style="max-height: 280px;">
                        {!! setting('sys_store_card_content') !!}
                    </div>
                    <div class="col-md-12 left-right text-center js-toggle-content">
                        <div class="view-more">
                            <span class="global__link">Xem thêm<i class="__icon --sm --link ml-1" style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/icons/arrow-down.png)"></i></span>
                        </div>
                        <div class="view-less" style="display: none;">
                            <span class="global__link">Thu gọn<i class="__icon --sm --link ml-1" style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/icons/iconright.png)"></i></span>
                        </div>
                    </div>
                </div>
                {{--                END SERVICE DESC--}}

            </div>
            {{--            END PAGE CONTENT--}}
        </div>
    </div>
@endsection
