@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head',with(['data'=>$data]))
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
                                Hiện tại không có dữ liệu nào phù hợp với yêu cầu của bạn! Hệ thống cập nhật nick thường xuyên bạn vui lòng theo dõi web trong thời gian tới !
                            @endif
                        </span>
                    </div>
                </div>

            </div>

        </div>
    @else

        <div class="item_buy">
            <div class="container">
                <div class="news_breadcrumbs">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 col-md-12">
                                <ul class="news_breadcrumbs_theme news_breadcrumbs_theme__show">
                                    <li><a href="/" class="news_breadcrumbs_theme_trangchu news_breadcrumbs_theme_trangchu_a">Trang chủ</a></li>
                                    <li>/</li>
                                    <li><a href="/mua-acc" class="news_breadcrumbs_theme_tintuc_a"><p class="news_breadcrumbs_theme_tintuc">Mua Acc</p></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item_buy_list row pt-5">
                    @if(isset($data) && count($data))
                        @foreach($data as $item)
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 ppk">
                                <div class="game-list-content">
                                    <div class="game-list-image">
                                        <a class="account_category" href="/mua-acc/{{ isset($item->custom->slug) && $item->custom->slug != '' ? $item->custom->slug :  $item->slug }}">
                                            {{--                                                Anh khuyen mai--}}
                                            @if(isset($item->image_icon))
                                                <img class="game-list-image-sticky lazy" src="{{ isset($item->custom->image_icon) ?  \App\Library\MediaHelpers::media($item->custom->image_icon) :  \App\Library\MediaHelpers::media($item->image_icon) }}" alt="">
                                            @else
                                                <img class="game-list-image-sticky" src="/assets/frontend/{{theme('')->theme_key}}/images/giamgia.png" alt="">
                                            @endif
                                            @if(isset($item->image))
                                                <img class="game-list-image-in lazy" src="{{ isset($item->custom->image) ? \App\Library\MediaHelpers::media($item->custom->image) : \App\Library\MediaHelpers::media($item->image) }}" alt="">
                                            @else
                                                <img class="game-list-image-in" src="/assets/frontend/{{theme('')->theme_key}}/images/ff.jpg" alt="">
                                            @endif
                                            {{--                                                Anh chinh --}}

                                        </a>
                                    </div>
                                    <div class="game-list-title">
                                        <a class="account_category" href="/mua-acc/{{ isset($item->custom->slug) && $item->custom->slug != '' ? $item->custom->slug :  $item->slug }}">
                                            <h3><strong>{{ isset($item->custom->title) ? $item->custom->title :  $item->title }}</strong></h3>
                                        </a>
                                    </div>
                                    <div class="game-list-description">
                                        <div class="countime"></div>

                                        @if(isset($item->items_count))
                                            @if((isset($item->account_fake) && $item->account_fake > 1) || (isset($item->custom->account_fake) && $item->custom->account_fake > 1))
                                                <p style="color: #212529;">Số tài khoản: {{ str_replace(',','.',number_format(round(isset($item->custom->account_fake) ? $item->items_count*$item->custom->account_fake : $item->items_count*$item->account_fake))) }} </p>
                                            @else
                                                <p style="color: #212529;">Số tài khoản: {{ $item->items_count }} </p>
                                            @endif

                                        @else
                                            <p style="color: #FFFFFF">Số tài khoản: 9999 </p>
                                        @endif
                                        {{--                            <span class="game-list-description-old-price"></span>--}}
                                        {{--                            <span class="game-list-description-new-price"></span>--}}
                                    </div>
                                    <div class="game-list-more">
                                        <div class="game-list-more-view" >
                                            <a class="account_category" href="/mua-acc/{{ isset($item->custom->slug) && $item->custom->slug != '' ? $item->custom->slug :  $item->slug }}">

                                                @if(isset($item->custom) && isset($item->custom->meta) && isset($item->custom->meta->image_btn))
                                                    @foreach($item->custom->meta as $key =>$val)
                                                        @if($key == "image_btn")
                                                            <img src="{{\App\Library\MediaHelpers::media($val)}}" alt="" >
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <img src="/assets/frontend/{{theme('')->theme_key}}/images/muangay.jpg" alt="">
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="row pb-3 pt-3">
                            <div class="col-md-12 text-center">
                                <span style="color: red;font-size: 16px;">Hiện tại chưa có dịch vụ ! Hệ thống sẽ cập nhật dịch vụ thường xuyên bạn vui lòng theo dõi web trong thời gian tới !</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    @endif
@endsection
