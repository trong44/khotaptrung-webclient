@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head',with(['data'=>$data]))
@endsection
@section('meta_robots')
    <meta name="robots" content="index,follow" />
@endsection

@section('content')
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/theme_main.css">
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

        <div class="item_buy" style="padding-bottom: 16px">
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

                <div class="item_buy_list row pt-3">
                    @if(isset($data) && count($data))
                        @foreach($data as $key => $item)
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 ppk">
                                <div class="game-list-content">
                                    <div class="game-list-image">
                                        <a class="account_category" href="/minigame-{{ $item->slug}}">
                                            <img src="{{\App\Library\MediaHelpers::media($item->image)}}"
                                                 alt="{{ $item->slug   }}" class="game-list-image-in lazy">
                                        </a>
                                    </div>
                                    <div class="game-list-title" style="padding-left: 8px;padding-right: 8px">
                                        <a class="account_category text-limit limit-1" href="/dich-vu/{{ $item->slug}}">
                                            <h3 style="padding-bottom: 0"><strong>{{ $item->title }}</strong></h3>
                                        </a>
                                    </div>
                                    <div class="game-list-description" style="margin-bottom: 8px">
                                        <div class="countime"></div>
                                        <span>Đã quay: {{isset($item->params->fake_num_play)?($item->params->fake_num_play+$item->order_gate_count):$item->order_gate_count}}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="row pb-3 pt-3">
                            <div class="col-md-12 text-center">
                                <span style="color: red;font-size: 16px;">Hiện tại chưa có minigame ! Hệ thống sẽ cập nhật dịch vụ thường xuyên bạn vui lòng theo dõi web trong thời gian tới !</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    @endif
@endsection
