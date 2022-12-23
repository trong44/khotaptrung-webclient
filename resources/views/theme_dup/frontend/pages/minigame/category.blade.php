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
                                    <li><a href="/minigame" class="news_breadcrumbs_theme_tintuc_a"><p class="news_breadcrumbs_theme_tintuc">Minigame</p></a></li>
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
                                        <a class="account_category" href="/minigame-{{ $item->slug }}">
                                            {{--                                                Anh khuyen mai--}}
                                            @if(isset($item->params->image_percent_sale))
                                                <img class="game-list-image-sticky lazy" src="{{\App\Library\MediaHelpers::media($item->params->image_percent_sale)}}" alt="">
                                            @else

                                            @endif
                                            @if(isset($item->image))
                                                <img class="game-list-image-in lazy" data-original="{{\App\Library\MediaHelpers::media($item->image)}}" alt="">
                                            @else
                                                <img class="game-list-image-in lazy" data-original="/assets/frontend/{{theme('')->theme_key}}/images/ff.jpg" alt="">
                                            @endif
                                            {{--                                                Anh chinh --}}

                                        </a>
                                    </div>
                                    <div class="game-list-title">
                                        <a class="account_category" href="/minigame-{{ $item->slug }}">
                                            <h3><strong>{{ $item->title }}</strong></h3>
                                        </a>
                                    </div>
                                    <div class="game-list-description">
                                        <div class="countime"></div>
                                        <p>Đã quay:  {{isset($item->params->fake_num_play)?($item->params->fake_num_play+$item->order_gate_count):$item->order_gate_count}} </p>

                                        <div class="row marginauto price-minigame">
                                            <div class="col-md-12 left-right">
                                                @if(isset($item->params->percent_sale))
                                                    <span class="oldPrice">{{ str_replace(',','.',number_format($item->price/((100 - $item->params->percent_sale)/100))) }} đ</span>
                                                @else
                                                @endif
                                                <span class="newPrice">{{ str_replace(',','.',number_format($item->price)) }} đ</span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="game-list-more">
                                        <div class="game-list-more-view" >
                                            <a class="account_category" href="/minigame-{{ $item->slug }}">
                                                @if(isset($item->params->image_view_all))
                                                    <img src="{{\App\Library\MediaHelpers::media($item->params->image_view_all)}}" alt="" class="lazy">
                                                @else
                                                    @if(isset(theme('')->theme_config->sys_button_home))
                                                        @if(theme('')->theme_config->sys_button_home == 'sys_button_home_text')
                                                            <div class="col-xs-12 w-75 m-auto">
                                                                <div class="btn-view-more mt-3">
                                                                    Xem tất cả
                                                                </div>
                                                            </div>
                                                        @else
                                                            <img src="/assets/frontend/{{theme('')->theme_key}}/images/muangay.jpg" alt="">

                                                        @endif
                                                    @else
                                                        <img src="/assets/frontend/{{theme('')->theme_key}}/images/muangay.jpg" alt="">
                                                    @endif
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
