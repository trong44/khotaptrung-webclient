@extends('frontend.layouts.master')
@section('styles')
{{--    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/line-awesome.min.css">--}}
@endsection
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('content')

    <div class="account">

        <div class="account_content">
            <div class="container">
                @include('frontend.layouts.includes.menu_profile')
                <div class="account_sidebar_content">
                    <div class="account_sidebar_content_title">
                        <p>THẺ CÀO ĐÃ MUA</p>
                        <div class="account_sidebar_content_line"></div>
                    </div>
                    <div class="account_content_transaction_history">
                        <form class="form-store-card account_content_transaction_history__v2">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span >Thẻ cào</span>
                                        <input type="text" name="serial" class="form-control serial" placeholder="Mã thẻ, Serial...">

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <div class="input-group date" id="transaction_history_start">
                                        <span class="input-group-btn input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                            <input type="text" class="form-control input-group-addon started_at" name="started_at" autocomplete="off" placeholder="Từ ngày">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <div class="input-group date" id="transaction_history_end">
                                        <span class="input-group-btn input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                        </span>
                                            <input type="text" class="form-control input-group-addon ended_at" name="ended_at" autocomplete="off" placeholder="Đến ngày">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <button class="btn c-theme-btn c-btn-square m-b-10" type="submit">
                                        <i class="fas fa-search"></i> Tìm kiếm
                                    </button>
                                </div>
                            </div>
{{--                            <div class="row">--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <a href="javascript:void(0)" class="btn c-btn-square m-b-10 btn-danger btn-hom-nay mb-2 mr-2"><i class="fas fa-calendar-alt"></i> Hôm nay</a>--}}
{{--                                    <a href="javascript:void(0)" class="btn c-btn-square m-b-10 btn-danger btn-hom-qua mb-2 mr-2"><i class="fas fa-calendar-alt"></i> Hôm qua </a>--}}
{{--                                    <a href="javascript:void(0)" class="btn c-btn-square m-b-10 btn-danger btn-thang-nay mb-2 mr-2"><i class="fas fa-calendar-alt"></i> Tháng này</a>--}}
{{--                                    <a href="javascript:void(0)" class="btn c-btn-square m-b-10 c-theme-btn btn-all mb-2 mr-2"><i class="fas fa-calendar-alt"></i> Tất cả</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </form>

                        <div id="data_store_card" style="position: relative">
                            <div class="body-box-loadding result-amount-loadding" style="position: absolute;top: 100%;left: 50%">
                                <div class="d-flex justify-content-center">
                                    <span class="pulser"></span>
                                </div>
                            </div>
                            @include('frontend.pages.storecard.widget.__store__card__history')
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <style>
        .purchased-item .item-content {
            border: 1px solid #ccc;
            border-radius: 0.25rem;
            position: relative;
        }
        .purchased-item .item-content:before {
            content: '';
            width: 100%;
            height: 25%;
            background: -moz-linear-gradient(top, rgba(0, 0, 0, 0.05) 0%, rgba(0, 0, 0, 0) 100%);
            background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0.05) 0%, rgba(0, 0, 0, 0) 100%);
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.05) 0%, rgba(0, 0, 0, 0) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#0d000000', endColorstr='#00000000', GradientType=0);
            z-index: 1;
            position: absolute;
            left: 0;
            top: 0;
            border-left-top-radius: 0.25rem;
            border-right-top-radius: 0.25rem;
        }
        .purchased-item .item-content .inner {
            padding: 0.5rem 1rem;
            position: relative;
            z-index: 10;
        }
        /*.purchased-item .item-content .inner:before, .purchased-item .item-content .inner:after {*/
        /*    content: '';*/
        /*    width: 1px;*/
        /*    height: 20px;*/
        /*    background: #ccc;*/
        /*    position: absolute;*/
        /*    bottom: -15px;*/
        /*}*/
        .purchased-item .item-content .inner:before {
            left: -1px;
            z-index: 10;
        }
        .purchased-item .item-content .inner:after {
            right: -1px;
            z-index: 5;
        }
        .purchased-item .item-content:after {
            content: '';
            width: 100%;
            height: 20px;
            background: url(../img/purchased-bottom-arr.png) 50% 100% repeat-x;
            position: absolute;
            bottom: -16px;
            left: 0;
        }
        .purchased-item .item-content .item-logo {
            line-height: 32px;
            height: 32px;
        }
        .purchased-item .item-content .item-logo .logo {
            max-height: 32px;
        }
        .purchased-item:hover .item-content {
            border-color: #666;
        }
        .purchased-item:hover .item-content:before {
            background: #fff;
        }
        .purchased-item:hover .item-content .inner:before, .purchased-item:hover .item-content .inner:after {
            background-color: #666;
        }
        .purchased-item:hover .item-content:after {
            background: url(../img/purchased-bottom-arr-hover.png) 50% 100% repeat-x;
        }

    </style>

    <input type="hidden" name="id_storecard" class="id_storecard" value="">
    <input type="hidden" name="started_at_storecard" class="started_at_storecard" value="">
    <input type="hidden" name="ended_at_storecard" class="ended_at_storecard" value="">
    <input type="hidden" name="hidden_page_storecard" id="hidden_page_storecard" class="hidden_page_storecard" value="1" />

    <script src="/assets/frontend/{{theme('')->theme_key}}/js/storeCard/storecard-history.js?v={{time()}}"></script>

@endsection
