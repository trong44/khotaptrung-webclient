@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head',with(['data'=>$data]))
@endsection
@section('meta_robots')
    <meta name="robots" content="index,follow" />
@endsection
@section('content')

    <div class="container c-container" id="account-category">
        <ul class="breadcrumb-list">
            <li class="breadcrumb-item">
                <a href="/" class="breadcrumb-link">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                <a href="/mua-acc" class="breadcrumb-link">Shop Account</a>
            </li>
        </ul>
        <div class="head-mobile">
            <a href="/service-mobile" class="link-back"></a>

            <p class="head-title text-title">Shop Account</p>

            <a href="/" class="home"></a>
        </div>
        {{--            Slider baner    --}}
        @include('frontend.widget.__slider__banner__account')
        {{--            Top hôm nay    --}}
{{--        @include('frontend.pages.account.widget.__top__today')--}}

        <section class="listing-service c-mb-16 c-mt-16">
            <div class="section-header justify-content-between c-pb-20 c-pb-lg-16">
                <h2 class="section-title fw-700 fz-20 lh-28 ">Danh sách mục Shop Account</h2>
                <form action="" class="form-search" method="POST" id="service-form">
                    <input type="search" placeholder="Chọn game muốn mua account" id="keyword--search" class="has-submit media-web">
                    <input type="search" placeholder="Tìm kiếm" id="mobile_keyword--search" class="search media-mobile">
                    <button class="media-web" type="submit"></button>
                </form>
            </div>
            <hr>
            <div class="text-title fw-700 c-py-16 c-py-lg-8 c-mb-lg-8">
                Chọn game muốn mua account
            </div>
            @if($data == null)
                <div class="item_buy">

                    <div class="container pt-3">
                        <div class="row pb-3 pt-3">
                            <div class="col-md-12 text-center">
                        <span style="color: red;font-size: 16px;">
                            @if(isset($message))
                                {{ $message }}
                            @else
                                Hiện tại không có dữ liệu nào phù hợp với yêu cầu của bạn! Hệ thống cập nhật nick thường xuyên bạn vui lòng theo dõi web trong thời gian tới !
                            @endif
                        </span>
                            </div>
                        </div>

                    </div>

                </div>
            @else

            <div class="list-service">
            @if(isset($data) && count($data))
                @foreach($data as $item)
                    @if ($item->display_type == 2)
                    <div class="item-service js-service randomAccountItem">
                    @elseif ($item->display_type == 1)
                    <div class="item-service js-service normalAccountItem">
                    @else
                    <div class="item-service js-service">
                    @endif
                        <div class="card card-hover">
                            <a href="/mua-acc/{{ isset($item->custom->slug) && $item->custom->slug != '' ? $item->custom->slug :  $item->slug }}" class="card-body scale-thumb c-p-16 c-p-lg-12">
                                <div class="account-thumb c-mb-8">
                                    <img src="{{ isset($item->custom->image) ? \App\Library\MediaHelpers::media($item->custom->image) : \App\Library\MediaHelpers::media($item->image) }}" alt="{{ isset($item->custom->slug) && $item->custom->slug != '' ? $item->custom->slug :  $item->slug }}" class="account-thumb-image lazy" onerror="imgError(this)">
                                </div>
                                <div class="account-title">
                                    <div class="text-title fw-700 text-limit limit-1">{{ isset($item->custom->title) ? $item->custom->title :  $item->title }}</div>
                                </div>
                                <div class="account-info">
                                    <div class="info-attr">
                                        @if(isset($item->items_count))
                                            @if((isset($item->account_fake) && $item->account_fake > 1) || (isset($item->custom->account_fake) && $item->custom->account_fake > 1))
                                                Đã bán: {{ str_replace(',','.',number_format(round(isset($item->custom->account_fake) ? $item->items_count*$item->custom->account_fake : $item->items_count*$item->account_fake))) }}
                                            @else
                                                Đã bán: {{ $item->items_count }}
                                            @endif

                                        @else
                                            Đã bán: 9999
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
                <div class="col-12  text-center my-3" id="text-empty" style="display: none">
                    <span class="text-danger">Không có kết quả nào phù hợp</span>
                </div>
            @endif
            </div>
            @endif
        </section>

        {{--            Dịch vụ khác   --}}
        @include('frontend.widget.__services__other')
    </div>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/nick/category.js?v={{time()}}"></script>
@endsection

