@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head')
@endsection
@section('meta_robots')
    <meta name="robots" content="index,follow" />
@endsection
@section('content')

@if($data == null)
    <div class="item_buy">
        <div class="container pt-3" style="padding-bottom: 600px">
            <div class="row pb-3 pt-3">
                <div class="col-md-12 text-center">
                        <span style="color: red;font-size: 16px;">
                            @if(isset($message))
                                {{ $message }}
                            @else
                                Hiện tại không có dữ liệu nào phù hợp với yêu cầu của bạn! Hệ thống cập nhật dịch vụ thường xuyên bạn vui lòng theo dõi web trong thời gian tới !
                            @endif
                        </span>
                </div>
            </div>

        </div>

    </div>
@else

    <div id="blog" class="mb-5">
        <div class="news_breadcrumbs">
            <div class="container pl-0 pr-0">
                <div class="row" style="width: 100%;margin: 0 auto">
                    <div class="col-lg-10 col-md-12">
                        <ul class="news_breadcrumbs_theme news_breadcrumbs_theme__show">
                            <li><a href="/"
                                   class="news_breadcrumbs_theme_trangchu news_breadcrumbs_theme_trangchu_a">Trang
                                    chủ</a></li>
                            <li>/</li>
                            <li><a href="/mua-acc" class="news_breadcrumbs_theme_tintuc_a">
                                    <p
                                        class="news_breadcrumbs_theme_tintuc">Mua Acc</p>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container pl-0 pr-0" style="margin-top: 24px">
            <div class="wapper-blog">
                <div class="row">
                    @foreach($data as $key => $item)
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 ppk">

                            <a href="/mua-acc/{{ isset($item->custom->slug) && $item->custom->slug != '' ? $item->custom->slug :  $item->slug }}">
                                @if(isset($item->image))
                                    <img class="image" src="{{ isset($item->custom->image) ? \App\Library\MediaHelpers::media($item->custom->image) : \App\Library\MediaHelpers::media($item->image) }}" alt="">
                                @else
                                    <img class="image" src="/assets/frontend/{{theme('')->theme_key}}/images/ff.jpg" alt="">
                                @endif
                            </a>
                            <div class="content-title mt-3">
                                @if(isset($item->items_count))
                                    @if((isset($item->account_fake) && $item->account_fake > 1) || (isset($item->custom->account_fake) && $item->custom->account_fake > 1))
                                        <p style="color: #212529;font-size: 12px">Số tài khoản: {{ str_replace(',','.',number_format(round(isset($item->custom->account_fake) ? $item->items_count*$item->custom->account_fake : $item->items_count*$item->account_fake))) }} </p>
                                    @else
                                        <p style="color: #212529;font-size: 12px">Số tài khoản: {{ $item->items_count }} </p>
                                    @endif

                                @else
                                    <p style="color: #212529;font-size: 12px">Số tài khoản: 0 </p>
                                @endif
                            </div>
                            <div class="content-title mt-3">
                                <p>
                                    <a href="/mua-acc/{{ isset($item->custom->slug) && $item->custom->slug != '' ? $item->custom->slug :  $item->slug }}">{{ isset($item->custom->title) ? $item->custom->title :  $item->title }}</a>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>


    <div class="item_buy">
        <div class="news_breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-8">
                        <ul class="news_breadcrumbs_theme">
                            <li><a href="/" class="news_breadcrumbs_theme_trangchu news_breadcrumbs_theme_trangchu_a">Trang chủ</a></li>
                            <li>/</li>
                            <li><a href="/dich-vu" class="news_breadcrumbs_theme_title_a"><h1 class="news_breadcrumbs_theme_title">Dịch vụ</h1></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">

            <div class="item_buy_form">
                <form class="form_get_show_service">
                    <div class="row">
                        <div class="col-3 item_buy_form_search">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    Tìm kiếm

                                </span>
                                <input type="text" name="title" class="form-control title" placeholder="Tìm kiếm">
                            </div>
                        </div>
                        <div class="col-3 item_buy_form_search">
                            <div class="input-group">
                                <button type="submit" class="btn btn-category-service btn-timkiem" style="position: relative">
                                    <span class="btn_timkiem_text">Tìm kiếm</span>
                                    <div class="row justify-content-center loading-data__timkiem">

                                    </div>
                                </button>
                                <a href="javascript:void(0)" class="btn btn-danger btn-tatca" style="position: relative">
                                    <span class="btn-all_text">Tất cả</span>
                                    <div class="row justify-content-center loading-data__timkiem">

                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="item_buy_filter">
                <label for="item_buy_filter_input" class="item_buy_filter_in btn btn-success" style="cursor: pointer;">
                    <i class="fas fa-filter"></i> Tìm kiếm
                </label>
                <input type="checkbox" hidden class="item_buy_filter_input" id="item_buy_filter_input" >
                <label for="item_buy_filter_input" class="item_buy_filter_overlay">

                </label>
                <div class="item_buy_form-mobile">
                    <div class="item_buy_form-mobile_title">
                        <label for="item_buy_filter_input" class="item_buy_form-mobile_close" >
                            <i class="fas fa-times"></i>
                        </label>
                        <p>Tìm kiếm</p>
                    </div>
                    <hr>
                    <div class="item_buy_form-mobile_search">
                        <form class="form_category_service_mobile">
                            <div class="row">
                                <div class="col-12 item_buy_form_search">
                                    <div class="input-group">
                                        <span class="input-group-addon">Tìm kiếm</span>
                                        <input type="text" name="title" class="form-control input-news-mobile title" placeholder="Tìm kiếm">
                                    </div>
                                </div>
                                <div class="col-12 item_buy_form_search">
                                    <div class="input-group">
                                        <button type="submit" class="btn btn-category-service-mobile btn_timkiem_mobile" style="position: relative">
                                            Tìm kiếm
                                            <div class="row justify-content-center loading-data__timkiem">

                                            </div>
                                        </button>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-tatca-mobile">
                                            Tất cả
                                            <div class="row justify-content-center loading-data__timkiem">

                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="item_buy_list row" id="getshowservice_data">
                @include('frontend.pages.service.widget.__datalist')
            </div>

        </div>
    </div>
    <input type="hidden" name="hidden_page" id="hidden_page_service__show" value="1" />
    <input type="hidden" name="title_data" class="title_data" value="" />

    <script src="/assets/frontend/{{theme('')->theme_key}}/js/service/service.js"></script>
@endif
@endsection


