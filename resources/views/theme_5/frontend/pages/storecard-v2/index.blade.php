@extends('frontend.layouts.master')
@section('styles')
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/trong/buy-card-v2.css">
@endsection
@section('content')
    <div class="c-container container">
        <!-- head mobile -->
{{--        <div class="head-mobile">--}}
{{--            <a href="/service-mobile" class="link-back"></a>--}}

{{--            <h1 class="head-title t-sub-2">--}}
{{--                Mua thẻ--}}
{{--            </h1>--}}

{{--            <a href="/" class="home"></a>--}}
{{--        </div>--}}
        <!-- breadcrum -->
        <ul class="breadcrumb-list">
            <li class="breadcrumb-item">
                <a href="/" class="breadcrumb-link">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                <a href="/mua-the" class="breadcrumb-link">Mua thẻ</a>
            </li>
        </ul>
        <!-- end breadcrum -->
        <!-- Banner -->
        @include('frontend.widget.__slider__banner__napthe')
    <!-- End -->
        <div class="c-mt-32 d-block d-lg-none">
            <p class="t-title-1 c-mb-0 c-pb-8">
                Danh mục thẻ
            </p>
            <hr class="c-mx-n16">
        </div>
        <ul class="nav nav-tabs size-auto c-mx-n16 d-table d-lg-none vw-100" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="tab active" data-toggle="tab" href="#tab-card-game" role="tab" aria-selected="false">Thẻ game</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="tab" data-toggle="tab" href="#tab-card-phone" role="tab" aria-selected="true">Thẻ điện thoại</a>
            </li>
        </ul>
        <div class="content-wrap c-mt-24">
            <!-- Nav danh mục -->
            <div class="nav-buy-card d-none d-lg-block">
                <div class="card">
                    <div class="c-px-16 c-py-12">
                        <div class="t-title-1 title-color">Danh mục thẻ</div>
                    </div>
                    <div class="card-body c-p-0">
                        <a class="section--card p-lg-3" data-toggle="collapse" href="#card--game__nav" role="button" aria-expanded="true">
                            <span class="t-sub-1">
                                THẺ GAME
                            </span>
                            <span class="d-flex align-items-center">
                                <i class="icon-default size-20" style="--path : url(/assets/frontend/theme_5/image/svg/arrow-down.svg)"></i>
                            </span>
                        </a>
                        <ul class="collapse card-list show is-load" id="card--game__nav">
                            <div class="loading-wrap"><span class="modal-loader-spin"></span></div>
                            <!-- JS PASTE HTML HERE -->
                        </ul>

                        <a class="section--card p-lg-3" data-toggle="collapse" href="#card--phone__nav" role="button" aria-expanded="true">
                            <span class="t-sub-1">
                                THẺ ĐIỆN THOẠI
                            </span>
                            <span class="d-flex align-items-center">
                                <i class="icon-default size-20" style="--path : url(/assets/frontend/theme_5/image/svg/arrow-down.svg)"></i>
                            </span>
                        </a>
                        <ul class="collapse card-list show is-load" id="card--phone__nav">
                            <div class="loading-wrap"><span class="modal-loader-spin"></span></div>
                            <!-- JS PASTE HTML HERE -->
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End nav danh mục -->
            <!-- content -->
            <div class="page--card__content c-ml-16 c-ml-lg-0">
                <!-- card game -->
                <div class="card c-mb-16 d-none d-lg-block" id="card-game">
                    <div class="card--head c-px-16 c-py-12">
                        <div class="t-title-2">
                            Thẻ Game
                        </div>
                    </div>
                    <div class="c-px-16">
                        <hr>
                    </div>
                    <div class="card-body c-px-16 c-pt-16 c-pb-0">
                        <div class="row c-mx-n8 card-wrap is-load">
                            <div class="loading-wrap"><span class="modal-loader-spin"></span></div>
                            <!-- JS PASTE HTML HERE -->
                        </div>
                    </div>
                </div>
                <!-- end card game -->

            <!-- Thẻ điẹn thoại -->
                <div class="card c-mb-16 d-none d-lg-block" id="card-phone">
                    <div class="card--head c-px-16 c-py-12">
                        <div class="t-title-2">
                            Thẻ Điện Thoại
                        </div>
                    </div>
                    <div class="c-px-16">
                        <hr>
                    </div>
                    <div class="card-body c-px-16 c-pt-16 c-pb-0">
                        <div class="row c-mx-n8 card-wrap is-load">
                            <div class="loading-wrap"><span class="modal-loader-spin"></span></div>
                            <!-- JS PASTE HTML HERE -->
                        </div>
                    </div>
                </div>

                <div class="tab-content d-block d-lg-none">
                    <div class="tab-pane fade active show" id="tab-card-game" role="tabpanel">
                        <div class="row c-mx-lg-n6 card-wrap is-load">
                            <div class="loading-wrap"><span class="modal-loader-spin"></span></div>
                            <!-- JS PASTE HTML HERE -->
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-card-phone" role="tabpanel">
                        <div class="row c-mx-lg-n6 card-wrap is-load">
                            <div class="loading-wrap"><span class="modal-loader-spin"></span></div>

                            <!-- JS PASTE HTML HERE -->
                        </div>
                    </div>
                </div>
                <!-- Dịch vụ liên quan -->
            @include('frontend.widget.__services__other')
                <!-- Mô tả dịch vụ -->
                <div class="card overflow-hidden c-mt-16 c-mb-24 c-mb-lg-16">
                    <div class="card-body c-px-16">
                        <h2 class="text-title-bold c-mb-24">Chi tiết dịch vụ</h2>
                        <div class="content-desc">
                            {!! setting('sys_store_card_content') !!}
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <span class="see-more" data-content="Xem thêm nội dung"></span>
                    </div>
                </div>
            </div>
            <!-- end -->
        </div>

        <input type="hidden" value="index" id="is_view">
    </div>
@endsection
@section('scripts')
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/store-card-v2/main.js"></script>
@endsection