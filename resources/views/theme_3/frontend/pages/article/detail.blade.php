@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head',with(['data'=>$data]))
@endsection
@section('styles')
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/style_trong.css">
@endsection
@section('scripts')
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/js_trong/script_trong.js"></script>
@endsection
@section('meta_robots')
    <meta name="robots" content="index,follow" />
@endsection
@section('content')

    @if($data == null)
        <div class="item_buy">
            <div class="container pt-3">
                <div class="row pb-3 pt-3">
                    <div class="col-md-12 text-center">
                            <span style="color: red;font-size: 16px;">
                                @if(isset($message))
                                    {{ $message }}
                                @else
                                    Hiện tại không có dữ liệu nào phù hợp với yêu cầu của bạn! Hệ thống cập nhật thường xuyên bạn vui lòng theo dõi web trong thời gian tới !
                                @endif
                            </span>
                    </div>
                </div>
            </div>
        </div>
    @else
        @if(isset($data->params) && isset($data->params->article_type))
            {!! $data->params->article_type !!}
        @endif
    <div class="container-fix container">
        {{--breadcrum--}}
        <ul class="breadcrum--list">
            <li class="breadcrum--item">
                <a href="/" class="breadcrum--link">Trang chủ</a>
            </li>
            <li class="breadcrum--item">
                @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                    <a href="{{ setting('sys_zip_shop') }}" class="breadcrum--link">Tin tức</a>
                @else
                    <a href="/tin-tuc" class="breadcrum--link">Tin tức</a>
                @endif

            </li>
            <li class="breadcrum--item">
                <a href="javascript:void(0)" class="breadcrum--link">{{$data -> title}}</a>
            </li>
        </ul>
        {{--content--}}
        <div class="card--mobile__title">
            @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                <a href="{{ setting('sys_zip_shop') }}" class="card--back">
                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/icons/back.png" alt="">
                </a>
            @else
                <a href="/tin-tuc" class="card--back">
                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/icons/back.png" alt="">
                </a>
            @endif

            <p>Chi tiết tin tức</p>
        </div>
        <div class="row mb-0 mb-lg-3">
            <div class="col-12 col-lg-9" id="article-detail-left">
                <div class="card --custom p-3">
                    <article id="article--detail" class="content-autolink">
                        <h1 class="article--title">
                            {{$data -> title}}
                        </h1>
                        <div class="article--info">
                            @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                                @if(isset($data->published_at))
                                    {{ formatDateTime($data->published_at) }}
                                @else
                                    {{ formatDateTime($data->created_at) }}
                                @endif
                            @else
                                {{ formatDateTime($data->created_at) }}
                            @endif
                        </div>
                        <div class="article--thumbnail py-4">
                            <img onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($data->image)}}" alt="" class="article--thumbnail__image py-3">
                        </div>
                        <div class="article--content pb-3">
                            <div class="article--content__text pb-2">
                                {!! $data->content !!}
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <div class="col-12 col-lg-3" id="article-detail-right">
                {{-- <div class="card --custom" id="article-related-minigames">
                    <div class="card--header">
                        <div class="card--header__title">
                            Minigame liên quan
                        </div>
                    </div>
                    <div class="acc-related">
                        <div class="row">
                            <div class="col-6 acc-related--thumbnail-container">
                                <div class="acc-related--thumbnail">
                                    <a href="javascript:void(0);">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/image_51.png" alt="" class="acc-related--thumbnail__image">
                                    </a>
                                </div>
                            </div>
                            <div class="col-6 acc-related--info">
                                <div class="acc-related--info-name">
                                    <a href="javascript:void(0);">
                                        Acc liên quan siêu vip
                                    </a>
                                </div>
                                <div class="acc-related--info-sale">
                                    Đã bán: 68,9K
                                </div>
                                <div class="acc-related--info-price">
                                    15.000đ
                                </div>
                                <div class="acc-related--info-price-sale-price">
                                    <span>30.000đ</span>
                                    <div class="item-product__sticker-percent">
                                        -50%
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="acc-related">
                        <div class="row">
                            <div class="col-6 acc-related--thumbnail-container">
                                <div class="acc-related--thumbnail">
                                    <a href="javascript:void(0);">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/image_51.png" alt="" class="acc-related--thumbnail__image">
                                    </a>
                                </div>
                            </div>
                            <div class="col-6 acc-related--info">
                                <div class="acc-related--info-name">
                                    <a href="javascript:void(0);">
                                        Acc liên quan siêu vip
                                    </a>
                                </div>
                                <div class="acc-related--info-sale">
                                    Đã bán: 68,9K
                                </div>
                                <div class="acc-related--info-price">
                                    15.000đ
                                </div>
                                <div class="acc-related--info-price-sale-price">
                                    <span>30.000đ</span>
                                    <div class="item-product__sticker-percent">
                                        -50%
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="acc-related">
                        <div class="row">
                            <div class="col-6 acc-related--thumbnail-container">
                                <div class="acc-related--thumbnail">
                                    <a href="javascript:void(0);">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/image_51.png" alt="" class="acc-related--thumbnail__image">
                                    </a>
                                </div>
                            </div>
                            <div class="col-6 acc-related--info">
                                <div class="acc-related--info-name">
                                    <a href="javascript:void(0);">
                                        Acc liên quan siêu vip
                                    </a>
                                </div>
                                <div class="acc-related--info-sale">
                                    Đã bán: 68,9K
                                </div>
                                <div class="acc-related--info-price">
                                    15.000đ
                                </div>
                                <div class="acc-related--info-price-sale-price">
                                    <span>30.000đ</span>
                                    <div class="item-product__sticker-percent">
                                        -50%
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="acc-related">
                        <div class="row">
                            <div class="col-6 acc-related--thumbnail-container">
                                <div class="acc-related--thumbnail">
                                    <a href="javascript:void(0);">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/image_51.png" alt="" class="acc-related--thumbnail__image">
                                    </a>
                                </div>
                            </div>
                            <div class="col-6 acc-related--info">
                                <div class="acc-related--info-name">
                                    <a href="javascript:void(0);">
                                        Acc liên quan siêu vip
                                    </a>
                                </div>
                                <div class="acc-related--info-sale">
                                    Đã bán: 68,9K
                                </div>
                                <div class="acc-related--info-price">
                                    15.000đ
                                </div>
                                <div class="acc-related--info-price-sale-price">
                                    <span>30.000đ</span>
                                    <div class="item-product__sticker-percent">
                                        -50%
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card --custom" id="article-giftcode">
                    <div class="card--header">
                        <div class="card--header__title">
                            Giftcode
                        </div>
                    </div>
                    <div class="acc-related">
                        <div class="row">
                            <div class="col-3 acc-related--thumbnail-container">
                                <div class="acc-related--thumbnail">
                                    <a href="javascript:void(0);">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/image_52.png" alt="" class="acc-related--thumbnail__image">
                                    </a>
                                </div>
                            </div>
                            <div class="col-9 acc-related--info">
                                <div class="acc-related--info-name">
                                    <a href="javascript:void(0);">
                                        Ngôi sao giải trí
                                    </a>
                                </div>
                                <div class="acc-related--info-sale">
                                    Số lượng: 494/500
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="acc-related">
                        <div class="row">
                            <div class="col-3 acc-related--thumbnail-container">
                                <div class="acc-related--thumbnail">
                                    <a href="javascript:void(0);">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/image_52.png" alt="" class="acc-related--thumbnail__image">
                                    </a>
                                </div>
                            </div>
                            <div class="col-9 acc-related--info">
                                <div class="acc-related--info-name">
                                    <a href="javascript:void(0);">
                                        Giang hồ Kì hiệp 3D sắp ra mắt
                                    </a>
                                </div>
                                <div class="acc-related--info-sale">
                                    Số lượng: 494/500
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="acc-related">
                        <div class="row">
                            <div class="col-3 acc-related--thumbnail-container">
                                <div class="acc-related--thumbnail">
                                    <a href="javascript:void(0);">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/image_52.png" alt="" class="acc-related--thumbnail__image">
                                    </a>
                                </div>
                            </div>
                            <div class="col-9 acc-related--info">
                                <div class="acc-related--info-name">
                                    <a href="javascript:void(0);">
                                        Cửu thiên Mobile sắp ra mắt
                                    </a>
                                </div>
                                <div class="acc-related--info-sale">
                                    Số lượng: 494/500
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="acc-related">
                        <div class="row">
                            <div class="col-3 acc-related--thumbnail-container">
                                <div class="acc-related--thumbnail">
                                    <a href="javascript:void(0);">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/image_52.png" alt="" class="acc-related--thumbnail__image">
                                    </a>
                                </div>
                            </div>
                            <div class="col-9 acc-related--info">
                                <div class="acc-related--info-name">
                                    <a href="javascript:void(0);">
                                        Loạn chiến 3Q sắp ra mắt
                                    </a>
                                </div>
                                <div class="acc-related--info-sale">
                                    Số lượng: 494/500
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <div id="article-detail-advertise" class="d-none d-lg-block">
                    @include('frontend.pages.article.widget.__ads__article')
                </div>

            </div>
        </div>
{{--        Cùng chủ đề--}}
        @include('frontend.widget.__bai__viet__lien__quan', ['data_article' => $data])
    </div>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/article/article-detail.js?v={{time()}}"></script>
    @endif
@endsection
