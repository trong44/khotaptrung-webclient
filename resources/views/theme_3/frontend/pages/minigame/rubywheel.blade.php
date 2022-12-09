@extends('theme_3.frontend.layouts.master')
@section('styles')
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/style_phu/breadcrumb.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/style_phu/spin.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/style_phu/layout_page.css">
@endsection
@section('scripts')
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/js_phu/spin.js"></script>
@endsection
@section('content')
{{--    Tho      --}}
    <div class="container_page container">
        <section class="breadcrumb-container">
            <ul class="breadcrumb breadcrumb-arrow">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="minigame">Danh mục vòng quay</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">{{$result->group->title}}</a></li>
            </ul>
        </section>
        <section class="breadcrumb-mobile">
            <a href="/minigame" style="display: block">
                <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/back.svg" alt="">
            </a>
            <h3>{{$result->group->title}}</h3>
        </section>
        <section class="rotation-content">
            <div class="row rotation-content-section">
                <div class="col-12 col-lg-7 rotation-col-left">
                    <div class="rotation-detail">
                        <div class="rotation-header">
                            <h3>{{$result->group->title}}</h3>
                            @if(isset($result->group->params->thele))
                                <button class="button-secondary" id="gamRuleButton">Thể lệ</button>
                            @endif
                        </div>
                        <div class="rotation-player">
                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/security-user 1.svg" alt="">
                            @if(isset($result->group->params->fake_num_play))
                                <p><span id="userCount">
                                    {{ str_replace(',','.',number_format($result->group->params->fake_num_play)) }}</span> người đang chơi
                                </p>
                            @endif
                        </div>
                        @if(isset($currentPlayList) && $currentPlayList != '')
                            <div class="rotation-notify">
                                <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/sound.svg" alt="">
                                <marquee class="rotation-marquee">
                                    <div class="rotation-marquee-item">
                                        {!! $currentPlayList !!}
                                    </div>
                                </marquee>
                            </div>
                        @endif
                        <div class="rotation-sale">
                            <div class="rotation-sale-header">
                                <p><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/flash_img.png" alt=""> Flash sale</p>
                                <div class="rotation-sale-time">
                                    <span><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/clock.svg" alt=""> Kết thúc trong</span>
                                    <ul>
                                        <li><span id="hourRemain"></span></li>
                                        <li><span id="minuteRemain"></span></li>
                                        <li><span id="secondRemain"></span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="rotation-sale-content">
                                <p>
                                    <span id="rotationFirstPrice">
                                        @if(isset($result->group->params->percent_sale))
                                            {{ str_replace(',','.',number_format(($result->group->params->percent_sale*$result->group->price)/100 + $result->group->price)) }} đ
                                        @endif
                                    </span>
                                    <span id="rotationSalePrice">{{ str_replace(',','.',number_format($result->group->price)) }} đ</span>

                                    @if(isset($result->group->params->percent_sale))
                                        <span id="rotationSaleRatio">Giảm {{ $result->group->params->percent_sale }}%</span>
                                    @endif
                                </p>
                            </div>
                        </div>

                        <div class="rotation">
                            <div class="item_spin ">
                                <div class="rotation-button ani-zoom" id="start-played">
                                    <img class="lazy" src="{{\App\Library\MediaHelpers::media($result->group->image_icon)}}" alt="{{$result->group->title}}">
                                </div>

                                <img style="width: 100%" class="lazy" src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}" alt="{{$result->group->title}}" id="rotate-play">
                            </div>
                        </div>
                        @if($result->checkPoint==1)
                        <div class="rotation-points">
                            <div class="rotation-points-title">
                                <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/mdi_police-badge.svg" alt="">
                                <p>Hũ điểm</p>
                                <div class="info-rotation">
                                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/info.svg" alt="">
                                    <div class="rotation-tooltip">
                                        <p>Mỗi lượt quay sẽ được cộng 10 point.</p>
                                        <p>Tích luỹ đủ số point để nhận thêm lượt quay</p>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-wrapper">
                                <div class="progress-bar" style="width: {{$result->pointuser<100?$result->pointuser:'100'}}%"></div>
                            </div>
                        </div>
                        @endif
                        <div class="rotation-inputs row">
                            @if($result->checkVoucher==1)
                                <div class="col-12 col-md-6 item_spin_sale-off">
                                    <input class="input-primary" type="text" placeholder="Nhập mã giảm giá">
                                </div>
                            @endif
                            <div class="col-12 col-md-6">
                                <select class="rotation-inputs-select select-primary" name="type" id="numrolllop">
                                    <option value="1">Mua X1/{{$result->group->price/1000}}k 1 lần quay</option>
                                    @if($result->group->params->price_sticky_3 > 0))
                                    <option value="3">Mua X3/{{$result->group->params->price_sticky_3/1000}}k 1 lần quay</option>
                                    @endif
                                    @if($result->group->params->price_sticky_5 > 0))
                                    <option value="5">Mua X5/{{$result->group->params->price_sticky_5/1000}}k 1 lần quay</option>
                                    @endif
                                    @if($result->group->params->price_sticky_7 > 0))
                                    <option value="7">Mua X7/{{$result->group->params->price_sticky_7/1000}}k 1 lần quay</option>
                                    @endif
                                    @if($result->group->params->price_sticky_10 > 0))
                                    <option value="10">Mua X10/{{$result->group->params->price_sticky_10/1000}}k 1 lần quay</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="rotation-buttons row">
                            @if($result->group->params->is_try == 1)
                                <div class="col-6">
                                    <button id="playerDemo" class="button-secondary button-demo num-play-try">Chơi thử</button>
                                </div>
                            @endif
                            <div class="col-6">
                                <button id="start-played" class="button-primary button-play">Quay ngay</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-5 rotation-col-right">
                    <div class="service-detail d-lg-none d-xl-none">
                        <h6>Chi tiết dịch vụ</h6>
                        <div class="service-detail-content">
                            @if(isset($result->group->content))
                                {!! $result->group->content !!}
                            @endif
                        </div>
                    </div>
                    <div class="rotation-leaderboard">
                        <div class="leaderboard-buttons row d-none d-lg-flex d-xl-flex">
                            <div class="col-6">
                                <a href="{{route('getLog',[$result->group->id])}}" class="the-a-lich-su button-not-bg-ct button-secondary history-spin-button">
                                    Lịch sử quay
                                </a>
                            </div>
                            <div class="col-6">
                                <button class="button-primary">Rút quà</button>
                            </div>
                        </div>
                        <div class="leaderboard-header">
                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/top-leaderboard.png" alt="">
                            <h5>Top quay thưởng</h5>
                        </div>
                        <div class="leaderboard-type row no-gutters">
                            <div class="col-4">
                                <div class="listed-date">
                                    Hôm nay
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="listed-date">
                                    7 ngày
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="listed-date">
                                    Quà đua top
                                </div>
                            </div>
                            <div class="date-listing"></div>
                        </div>
                        <div class="leaderboard-table">
                            <div class="leaderboard-head row no-gutters">
                                <div class="leaderboard-head-item col-4">
                                    <p>Tài khoản</p>
                                </div>
                                <div class="leaderboard-head-item col-4">
                                    {{--                                    <p>Giải thưởng</p>--}}
                                </div>
                                <div class="leaderboard-head-item col-4">
                                    <p>Lượt quay</p>
                                </div>
                            </div>
                            <div class="leaderboard-content leaderboard-1">
                                @if(isset($topDayList))
                                    @foreach($topDayList as $key => $item)
                                        @if($key < 3)
                                            <div class="leaderboard-item row no-gutters">
                                                <div class="col-4 leaderboard-item-name">
                                                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/rating.svg" alt="">
                                                    <p>{{$item['name']}}</p>
                                                </div>
                                                <div class="col-4 leaderboard-item-ar">
                                                    {{--                                                    +100.000 kim cương--}}
                                                </div>
                                                <div class="col-4 leaderboard-item-ar">
                                                    {{ str_replace(',','.',number_format($item['numwheel'])) }} lượt
                                                </div>
                                            </div>
                                        @else
                                            <div class="leaderboard-item row no-gutters">
                                                <div class="col-4 leaderboard-item-name">
                                                    <span>{{ $key + 1 }}</span>
                                                    <p>{{$item['name']}}</p>
                                                </div>
                                                <div class="col-4 leaderboard-item-ar">
                                                    {{--                                                    +100.000 kim cương--}}
                                                </div>
                                                <div class="col-4 leaderboard-item-ar">
                                                    {{ str_replace(',','.',number_format($item['numwheel'])) }} lượt
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif

                            </div>
                            <div class="leaderboard-content leaderboard-2" style="display: none;">
                                @if(isset($top7DayList))
                                    @foreach($top7DayList as $key => $item)
                                        @if($key < 3)
                                            <div class="leaderboard-item row no-gutters">
                                                <div class="col-4 leaderboard-item-name">
                                                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/rating.svg" alt="">
                                                    <p>{{$item['name']}}</p>
                                                </div>
                                                <div class="col-4 leaderboard-item-ar">
                                                    {{--                                                    +100.000 kim cương--}}
                                                </div>
                                                <div class="col-4 leaderboard-item-ar">
                                                    {{ str_replace(',','.',number_format($item['numwheel'])) }} lượt
                                                </div>
                                            </div>
                                        @else
                                            <div class="leaderboard-item row no-gutters">
                                                <div class="col-4 leaderboard-item-name">
                                                    <span>{{ $key + 1 }}</span>
                                                    <p>{{$item['name']}}</p>
                                                </div>
                                                <div class="col-4 leaderboard-item-ar">
                                                    {{--                                                    +100.000 kim cương--}}
                                                </div>
                                                <div class="col-4 leaderboard-item-ar">
                                                    {{ str_replace(',','.',number_format($item['numwheel'])) }} lượt
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif

                            </div>
                            <div class="leaderboard-content leaderboard-3" style="display: none;">
                                @if(isset($result->group->params->phanthuong))
                                    <div class="leaderboard-item row no-gutters">
                                        <div class="col-12 leaderboard-item-name">
                                            {!!$result->group->params->phanthuong!!}
                                        </div>
                                    </div>
                                @else
                                    <div class="leaderboard-item row no-gutters">
                                        <div class="col-12 leaderboard-item-name text-center justify-content-center">
                                            Không có dữ liệu
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="leaderboard-seemore">
                            <p>Xem thêm</p>
                        </div>
                        <div class="leaderboard-buttons row d-lg-none d-xl-none">
                            <div class="col-6">
                                <button class="button-secondary history-spin-button">Lịch sử quay</button>
                            </div>
                            <div class="col-6">
                                <button class="button-primary">Rút quà</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row rotation-content-section">
                <div class="col-12 col-lg-5 d-none d-lg-block d-xl-block rotation-col-left">
                    <div class="service-detail">
                        <h6>Chi tiết dịch vụ</h6>
                        <div class="service-detail-content">
                            @if(isset($result->group->content))
                                {!! $result->group->content !!}
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-7 rotation-col-right">
                    <div class="rotation-comment chat-history">
                        <h6>Bình luận</h6>
                        <ul class="comment-block list-unstyled chat-scroll">

                            <li>
                                <div class="comment-item">
                                    <div class="comment-avatar">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/user_avatar.png" alt="">
                                    </div>
                                    <div class="comment-detail">
                                        <div class="comment-info">
                                            <h6>Khách</h6>
                                            <span>4:30 PM, Vừa xong</span>
                                        </div>
                                        <div class="comment-content">
                                            Cứ tưởng lừa đảo, nạp thử 200k nhận luôn kim cương trong 10s
                                        </div>
                                        <div class="comment-interact">
                                            <span id="likeComment"><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/hearts-suit 1.svg" alt=""> Thích</span>
                                            <span id="replyComment"><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/comment 1.svg" alt=""> Trả lời</span>
                                        </div>
                                    </div>
                                </div>

                            </li>

                            <li>

                                <div class="comment-item">
                                    <div class="comment-avatar">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/user_avatar.png" alt="">
                                    </div>
                                    <div class="comment-detail">
                                        <div class="comment-info">
                                            <h6>Khách</h6>
                                            <span>4:30 PM, Vừa xong</span>
                                        </div>
                                        <div class="comment-content">
                                            Đã nạp thành công
                                        </div>
                                        <div class="comment-interact">
                                            <span id="likeComment"><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/hearts-suit 1.svg" alt=""> Thích</span>
                                            <span id="replyComment"><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/comment 1.svg" alt=""> Trả lời</span>
                                        </div>
                                    </div>
                                </div>


                            </li>

                            <li>

                                <div class="comment-item">
                                    <div class="comment-avatar">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/user_avatar.png" alt="">
                                    </div>
                                    <div class="comment-detail">
                                        <div class="comment-info">
                                            <h6>Khách</h6>
                                            <span>4:30 PM, Vừa xong</span>
                                        </div>
                                        <div class="comment-content">
                                            Web nạp ngon thế này mà giờ mới biết
                                        </div>
                                        <div class="comment-interact">
                                            <span id="likeComment"><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/hearts-suit 1.svg" alt=""> Thích</span>
                                            <span id="replyComment"><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/comment 1.svg" alt=""> Trả lời</span>
                                        </div>
                                    </div>
                                </div>

                            </li>

                            <li>

                                <div class="comment-item">
                                    <div class="comment-avatar">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/user_avatar.png" alt="">
                                    </div>
                                    <div class="comment-detail">
                                        <div class="comment-info">
                                            <h6>Khách</h6>
                                            <span>4:30 PM, Vừa xong</span>
                                        </div>
                                        <div class="comment-content">
                                            Vừa chạy ra quán mua 500k thẻ nạp ăn luôn, ngon quá admin
                                        </div>
                                        <div class="comment-interact">
                                            <span id="likeComment"><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/hearts-suit 1.svg" alt=""> Thích</span>
                                            <span id="replyComment"><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/comment 1.svg" alt=""> Trả lời</span>
                                        </div>
                                    </div>
                                </div>


                            </li>

                            <li>

                                <div class="comment-item">
                                    <div class="comment-avatar">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/user_avatar.png" alt="">
                                    </div>
                                    <div class="comment-detail">
                                        <div class="comment-info">
                                            <h6>Khách</h6>
                                            <span>4:30 PM, Vừa xong</span>
                                        </div>
                                        <div class="comment-content">
                                            Kim cương sạch, thanks admin
                                        </div>
                                        <div class="comment-interact">
                                            <span id="likeComment"><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/hearts-suit 1.svg" alt=""> Thích</span>
                                            <span id="replyComment"><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/comment 1.svg" alt=""> Trả lời</span>
                                        </div>
                                    </div>
                                </div>

                            </li>

                            <li>

                                <div class="comment-item">
                                    <div class="comment-avatar">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/user_avatar.png" alt="">
                                    </div>
                                    <div class="comment-detail">
                                        <div class="comment-info">
                                            <h6>Khách</h6>
                                            <span>4:30 PM, Vừa xong</span>
                                        </div>
                                        <div class="comment-content">
                                            1 vote uy tín cho web nhé, quá ngon luôn
                                        </div>
                                        <div class="comment-interact">
                                            <span id="likeComment"><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/hearts-suit 1.svg" alt=""> Thích</span>
                                            <span id="replyComment"><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/comment 1.svg" alt=""> Trả lời</span>
                                        </div>
                                    </div>
                                </div>

                            </li>

                            <li>

                                <div class="comment-item">
                                    <div class="comment-avatar">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/user_avatar.png" alt="">
                                    </div>
                                    <div class="comment-detail">
                                        <div class="comment-info">
                                            <h6>Khách</h6>
                                            <span>4:30 PM, Vừa xong</span>
                                        </div>
                                        <div class="comment-content">
                                            Web được đấy anh em
                                        </div>
                                        <div class="comment-interact">
                                            <span id="likeComment"><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/hearts-suit 1.svg" alt=""> Thích</span>
                                            <span id="replyComment"><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/comment 1.svg" alt=""> Trả lời</span>
                                        </div>
                                    </div>
                                </div>

                            </li>

                            <li>

                                <div class="comment-item">
                                    <div class="comment-avatar">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/user_avatar.png" alt="">
                                    </div>
                                    <div class="comment-detail">
                                        <div class="comment-info">
                                            <h6>Khách</h6>
                                            <span>4:30 PM, Vừa xong</span>
                                        </div>
                                        <div class="comment-content">
                                            Nhập nhầm mã thẻ với serial báo admin xử lý trong vòng 1 nốt nhạc, uy tín quá admin ơi
                                        </div>
                                        <div class="comment-interact">
                                            <span id="likeComment"><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/hearts-suit 1.svg" alt=""> Thích</span>
                                            <span id="replyComment"><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/comment 1.svg" alt=""> Trả lời</span>
                                        </div>
                                    </div>
                                </div>

                            </li>

                            <li>

                                <div class="comment-item">
                                    <div class="comment-avatar">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/user_avatar.png" alt="">
                                    </div>
                                    <div class="comment-detail">
                                        <div class="comment-info">
                                            <h6>Khách</h6>
                                            <span>4:30 PM, Vừa xong</span>
                                        </div>
                                        <div class="comment-content">
                                            Anh em nào chưa nạp thì vào nạp ngay đi đang có khuyến mại
                                        </div>
                                        <div class="comment-interact">
                                            <span id="likeComment"><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/hearts-suit 1.svg" alt=""> Thích</span>
                                            <span id="replyComment"><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/comment 1.svg" alt=""> Trả lời</span>
                                        </div>
                                    </div>
                                </div>

                            </li>

                            <li>

                                <div class="comment-item">
                                    <div class="comment-avatar">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/user_avatar.png" alt="">
                                    </div>
                                    <div class="comment-detail">
                                        <div class="comment-info">
                                            <h6>Khách</h6>
                                            <span>4:30 PM, Vừa xong</span>
                                        </div>
                                        <div class="comment-content">
                                            Uy tín không anh em.
                                        </div>
                                        <div class="comment-interact">
                                            <span id="likeComment"><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/hearts-suit 1.svg" alt=""> Thích</span>
                                            <span id="replyComment"><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/comment 1.svg" alt=""> Trả lời</span>
                                        </div>
                                    </div>
                                </div>

                            </li>

                            <li>

                                <div class="comment-item">
                                    <div class="comment-avatar">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/user_avatar.png" alt="">
                                    </div>
                                    <div class="comment-detail">
                                        <div class="comment-info">
                                            <h6>Khách</h6>
                                            <span>4:31 PM, Vừa xong</span>
                                        </div>
                                        <div class="comment-content">
                                            Nạp thử 200k nhận luôn gấp đôi trong 10s.
                                        </div>
                                        <div class="comment-interact">
                                            <span id="likeComment"><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/hearts-suit 1.svg" alt=""> Thích</span>
                                            <span id="replyComment"><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/comment 1.svg" alt=""> Trả lời</span>
                                        </div>
                                    </div>
                                </div>

                            </li>

                            <li>

                                <div class="comment-item">
                                    <div class="comment-avatar">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/user_avatar.png" alt="">
                                    </div>
                                    <div class="comment-detail">
                                        <div class="comment-info">
                                            <h6>Khách</h6>
                                            <span>4:31 PM, Vừa xong</span>
                                        </div>
                                        <div class="comment-content">
                                            40k kim cương đã về tài khỏa, thanks admin.
                                        </div>
                                        <div class="comment-interact">
                                            <span id="likeComment"><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/hearts-suit 1.svg" alt=""> Thích</span>
                                            <span id="replyComment"><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/comment 1.svg" alt=""> Trả lời</span>
                                        </div>
                                    </div>
                                </div>

                            </li>

                            <li>

                                <div class="comment-item">
                                    <div class="comment-avatar">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/user_avatar.png" alt="">
                                    </div>
                                    <div class="comment-detail">
                                        <div class="comment-info">
                                            <h6>Khách</h6>
                                            <span>4:31 PM, Vừa xong</span>
                                        </div>
                                        <div class="comment-content">
                                            Có anh em nào vừa từ youtube qua đây nạp k
                                        </div>
                                        <div class="comment-interact">
                                            <span id="likeComment"><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/hearts-suit 1.svg" alt=""> Thích</span>
                                            <span id="replyComment"><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/comment 1.svg" alt=""> Trả lời</span>
                                        </div>
                                    </div>
                                </div>

                            </li>

                            <li>

                                <div class="comment-item">
                                    <div class="comment-avatar">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/user_avatar.png" alt="">
                                    </div>
                                    <div class="comment-detail">
                                        <div class="comment-info">
                                            <h6>Khách</h6>
                                            <span>4:31 PM, Vừa xong</span>
                                        </div>
                                        <div class="comment-content">
                                            Web ngon vl
                                        </div>
                                        <div class="comment-interact">
                                            <span id="likeComment"><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/hearts-suit 1.svg" alt=""> Thích</span>
                                            <span id="replyComment"><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/comment 1.svg" alt=""> Trả lời</span>
                                        </div>
                                    </div>
                                </div>

                            </li>

                            <li>

                                <div class="comment-item">
                                    <div class="comment-avatar">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/user_avatar.png" alt="">
                                    </div>
                                    <div class="comment-detail">
                                        <div class="comment-info">
                                            <h6>Khách</h6>
                                            <span>4:31 PM, Vừa xong</span>
                                        </div>
                                        <div class="comment-content">
                                            Vừa nạp 100k xong
                                        </div>
                                        <div class="comment-interact">
                                            <span id="likeComment"><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/hearts-suit 1.svg" alt=""> Thích</span>
                                            <span id="replyComment"><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/comment 1.svg" alt=""> Trả lời</span>
                                        </div>
                                    </div>
                                </div>

                            </li>

                            <li>

                                <div class="comment-item">
                                    <div class="comment-avatar">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/user_avatar.png" alt="">
                                    </div>
                                    <div class="comment-detail">
                                        <div class="comment-info">
                                            <h6>Khách</h6>
                                            <span>4:31 PM, Vừa xong</span>
                                        </div>
                                        <div class="comment-content">
                                            Anh em không phải sợ đâu, tôi nạp nhiều web này rồi
                                        </div>
                                        <div class="comment-interact">
                                            <span id="likeComment"><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/hearts-suit 1.svg" alt=""> Thích</span>
                                            <span id="replyComment"><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/comment 1.svg" alt=""> Trả lời</span>
                                        </div>
                                    </div>
                                </div>

                            </li>

                            {{--                                <li>--}}

                            {{--                                    <div class="comment-item comment-item-own">--}}

                            {{--                                        <div class="comment-detail comment-detail-own">--}}
                            {{--                                            <div class="comment-info comment-info-own">--}}

                            {{--                                                <span>4:31 PM, Vừa xong</span>--}}
                            {{--                                                <h6>Tiểu lý phi down</h6>--}}
                            {{--                                            </div>--}}
                            {{--                                            <div class="comment-content">--}}
                            {{--                                                Nghe anh em review ngon quá, tôi ra làm cái thẻ 500k nạp đây--}}
                            {{--                                            </div>--}}
                            {{--                                            <div class="comment-interact comment-interact-own">--}}
                            {{--                                                <span id="likeComment"><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/hearts-suit 1.svg" alt=""> Thích</span>--}}
                            {{--                                                <span id="replyComment"><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/comment 1.svg" alt=""> Trả lời</span>--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}
                            {{--                                        <div class="comment-avatar">--}}
                            {{--                                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/user_avatar.png" alt="">--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}

                            {{--                                </li>--}}
                        </ul>

                        <div class="commment-input">
                            <input name="message-to-send" type="text" class="input-primary" id="message-to-send">
                        </div>
                        <div class="comment-button">
                            <button type="button" class="button-primary btn-send-message pill-button">Bình luận</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @if($groups_other!=null)
            <div class=" block-product mt-fix-20 ">
                <div class="product-header d-flex">
                    <span>
                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/flash_sales.png" alt="">
                    </span>
                    <p class="text-title"><span>Mini game liên quan</span></p>
                    <div class="product-catecory"></div>

                </div>
                <div class="box-product">
                    <div class="swiper-container list-minigame list-product" >
                        <div class="swiper-wrapper">
                            @foreach($groups_other as $key => $item)
                                <div class="swiper-slide" >
                                    <a href="{{route('getIndex',[$item->slug])}}">
                                        <div class="item-product__box-img">

                                            <img src="{{ \App\Library\MediaHelpers::media($item->image) }}" alt="{{$item->title}}">

                                        </div>
                                        <div class="item-product__box-content">


                                            <div class="item-product__box-name">
                                                {{$item->title}}
                                            </div>
                                            <div class="item-product__box-sale">
                                                Đã bán: {{isset($item->params->fake_num_play)?($item->params->fake_num_play+$item->order_gate_count):$item->order_gate_count}}
                                            </div>
                                            <div class="item-product__box-price">

                                                <div class="special-price">{{number_format($item->price)}} đ</div>
                                                <div class="old-price">{{number_format($item->price*100/80)}} đ</div>
                                                <div class="item-product__sticker-percent">
                                                    -50%
                                                </div>
                                            </div>

                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

<div class="modal fade rotation-modal" id="noticeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header rotation-modal-header">
                <h5 class="modal-title">Chúc mừng bạn đã quay trúng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/close.png" alt="">
                </button>
            </div>
            <div class="modal-body rotation-prize-body">
                <div class="rotation-prize-img">
                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/verify 1.png" alt="">
                </div>
                <div class="rotation-prize-detail content-popup">
                    <div class="appendContent" style='color:blue'></div>
                    {{--                        <p>Giải thưởng: <span id="rotationValue" style="font-weight: 600; color: #000000;">100.000 Kim cương</span></p>--}}
                    {{--                        <p>Bonus: <span id="rotationBonus" style="font-weight: 600; color: #000000;">100 Kim cương</span></p>--}}
                    {{--                        <p>Tổng nhận được: <span id="rotationTotal" style="font-weight: 600; color: #F67600;">100.100 Kim cương</span></p>--}}
                </div>
                <div class="rotation-modal-btn row no-gutters">
                    <div class="col-6">
                        <button id="btnWithdraw" class="button-secondary">Rút quà</button>
                    </div>
                    <div class="col-6" style="text-align: right;">
                        <button class="button-primary" data-dismiss="modal">Chơi tiếp</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="naptheModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">Thông báo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body content-popup" style="font-family: helvetica, arial, sans-serif;">
                Bạn đã hết lượt chơi. Nạp thẻ để chơi tiếp!
            </div>
            <div class="modal-footer">
                <a href="/nap-the" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--pill" >Nạp thẻ</a>
                <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

@if(isset($result->group->params->thele))
    @include('theme_3.frontend.widget.modal.__rotation_rule',with(['thele'=>$result->group->params->thele]))
@endif
<input type="hidden" class="started_at" name="started_at" value="{{ $result->group->started_at??0 }}">

@foreach(config('constants.'.'game_type') as $item => $key)
    <input type="hidden" id="withdrawruby_{{$item}}" value="{{$key}}">
@endforeach
<input type="hidden" id="type_play" value="real">
<input type="hidden" name="checkPoint" value="{{$result->checkPoint}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
    function animate(options) {
        var start = performance.now();
        requestAnimationFrame(function animate(time) {
            var timeFraction = (time - start) / options.duration;
            if (timeFraction > 1) timeFraction = 1;
            var progress = options.timing(timeFraction)
            options.draw(progress);
            if (timeFraction < 1) {
                requestAnimationFrame(animate);
            }
        });
    }
    $(document).ready(function(e) {

        var saleoffpass = "";
        //var saleoffmessage = "";
        var userpoint = 0;
        var numrollbyorder = 0;
        var roll_check = true;
        var num_loop = 4;
        var angle_gift = '';
        var num_gift = '{{count($result->group->items)}}';
        var gift_detail = '';
        var num_roll_remain = 0;
        var angles = 0;
        var arrxgt;
        var free_wheel = 0;
        var value_gif_bonus = '';
        var msg_random_bonus = '';
        //var arrDiscount = '';

        $('body').delegate('#start-played', 'click', function() {
            $('#type_play').val('real');
            play();
        });

        $('body').delegate('.num-play-try', 'click', function() {
            $('#type_play').val('try');
            play();
        });

        //Click nút quay
        function play(){
            if (roll_check) {
                roll_check = false;
                saleoffpass = $("#saleoffpass").val();
                numrolllop = $("#numrolllop").val();
                $.ajax({
                    url: '/minigame-play',
                    datatype: 'json',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        id: '{{$result->group->id}}',
                        numrolllop: numrolllop,
                        numrollbyorder: numrollbyorder,
                        typeRoll: $('#type_play').val(),
                        saleoffpass: saleoffpass,
                    },
                    type: 'POST',
                    success: function(data) {
                        if (data.status == 4) {
                            location.href='/login?return_url='+window.location.href;
                        } else if (data.status == 3) {
                            roll_check = true;
                            $('#naptheModal').modal('show')
                            return;
                        } else if (data.status == 0) {
                            roll_check = true;
                            $('#noticeModal .content-popup').text(data.msg);
                            $('#noticeModal').modal('show');
                            return;
                        }
                        numrollbyorder = parseInt(data.numrollbyorder) + 1;
                        gift_detail = data.gift_detail;
                        gift_revice = data.arr_gift;
                        //arrDiscount = data.arrDiscount;
                        arrxgt = data.xgt;
                        if (data.xgt > 0) {
                            xvalue = data.xgt[data.xgt.length - 1];
                        } else {
                            xvalue = 0;
                        }
                        value_gif_bonus = data.value_gif_bonus;
                        msg_random_bonus = data.msg_random_bonus;
                        xvalueaDD = data.xValue;
                        free_wheel = data.free_wheel;
                        num_roll_remain = gift_detail.num_roll_remain;
                        angles = 0;
                        angle_gift = gift_detail.order * (360 / num_gift);
                        loop();

                        if($('#type_play').val()=='real'){
                            userpoint = data.userpoint;
                            if(userpoint<100){
                                $(".item_spin_progress_bubble").css("width", data.userpoint + "%")
                            }else{
                                $(".item_spin_progress_bubble").css("width", "100%");
                                $(".item_spin_progress_bubble").addClass('clickgif');
                            }
                            $(".item_spin_progress_percent").html(data.userpoint + "/100 point");
                            $("#saleoffpass").val("");
                            //saleoffmessage = data.saleMessage;
                        }
                    },
                    error: function() {
                        $('#noticeModal .content-popup').text('Có lỗi xảy ra. Vui lòng thử lại!');
                        $('#noticeModal').modal('show');
                    }
                })
            }
        };


        function getgifbonus() {
            if($('#checkPoint').val() != "1"){
                return;
            }
            $.ajax({
                url: '/minigame-bonus',
                datatype: 'json',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    id: '{{$result->group->id}}',
                },
                type: 'POST',
                success: function(data) {
                    if (data.status == 0) {
                        $('#noticeModal .content-popup').text(data.msg);
                        $('#noticeModal').modal('show');
                        return;
                    }
                    $('#noticeModal .content-popup').append(data.msg + " - " + data.arr_gift[0].title);
                    //$("#noticeModalNoHu #btnWithdraw").hide();
                    $('#noticeModal').modal('show');
                    var userpoint = data.userpoint;
                    if(userpoint<100){
                        $(".item_spin_progress_bubble").css("width", data.userpoint + "%");
                        $(".item_spin_progress_bubble").removeClass('clickgif');
                    }else{
                        $(".item_spin_progress_bubble").css("width", "100%");
                        $(".item_spin_progress_bubble").addClass('clickgif');
                    }
                    $(".item_spin_progress_percent").html(data.userpoint + "/100 point");
                    $(".pyro").show();
                    setTimeout(function(){
                        $(".pyro").hide();
                    },6000)
                },
                error: function() {
                    $('#noticeModal .content-popup').text('Có lỗi xảy ra. Vui lòng thử lại!');
                    $('#noticeModal').modal('show');
                }
            })
        }

        function loop() {
            $('#rotate-play').css({
                "transform": "rotate(" + angles + "deg)"
            });

            if ((parseInt(angles) - 10) <= -(((num_loop * 360) + angle_gift))) {
                angles = parseInt(angles) - 2;
            } else {
                angles = parseInt(angles) - 10;
            }

            if (angles >= -((num_loop * 360) + angle_gift)) {
                requestAnimationFrame(loop);
            } else {
                roll_check = true;

                $("#btnWithdraw").show();
                if (gift_detail.winbox == 0) {
                    $("#btnWithdraw").hide();
                } else {
                    if (gift_detail.gift_type == 0) {
                        // $("#btnWithdraw").html("Rút " + $("#withdrawruby_" + gift_detail.game_type).val());
                        $("#btnWithdraw").html("Rút Quà");
                        $("#btnWithdraw").attr('href', '/withdrawitem-' + gift_detail.game_type);
                    } else if (gift_detail.gift_type == 1) {
                        $("#btnWithdraw").html("Kiểm tra nick trúng");
                        $("#btnWithdraw").attr('href', '/minigame-logacc-' + $('#group_id').val());
                        // } else if (gift_detail.gift_type == 'nrocoin') {
                        //     $("#btnWithdraw").html("Rút vàng");
                        //     $("#btnWithdraw").attr('href', '/withdrawservice?id=' + $("#ID_NROCOIN").val());
                        // } else if (gift_detail.gift_type == 'nrogem') {
                        //     $("#btnWithdraw").html("Rút ngọc");
                        //     $("#btnWithdraw").attr('href', '/withdrawservice?id=' + $("#ID_NROGEM").val());
                        // } else if (gift_detail.gift_type == 'nroxu') {
                        //     $("#btnWithdraw").html("Rút xu");
                        //     $("#btnWithdraw").attr('href', '/withdrawservice?id=' + $("#ID_NINJAXU").val());
                    } else if (gift_detail.gift_type == 2) {
                        $("#btnWithdraw").html("Load lại trang");
                        $("#btnWithdraw").removeAttr("href");
                        $("#btnWithdraw").addClass('reLoad');
                    } else {
                        $("#btnWithdraw").hide();
                    }

                }
                if (gift_revice.length > 0) {
                    $html = "";
                    $strDiscountcode="";
                    // if(saleoffmessage.length > 0)
                    // {
                    //     $html += "<br/><span style='font-size: 14px;color: #f90707;font-style: italic;display: block;text-align: center;'>"+saleoffmessage+"</span><br/>";
                    // }

                    if($('#type_play').val() == "real")
                    {
                        if(gift_revice.length == 1)
                        {
                            // if(arrDiscount[0] != "")
                            // {
                            //     $strDiscountcode="<span>Bạn nhận được 1 mã giảm giá khuyến mãi đi kèm: <b>"+arrDiscount[0]+"</b></span>";
                            // }
                            $html += "<span>Kết quả: "+gift_revice[0]["title"]+"</span><br/>";
                            if(gift_detail.winbox == 1){
                                $html += "<span>Mua X1: Nhận được "+gift_revice[0]['parrent'].params.value+"</span><br/>";
                                //$html += "<span>Quay được "+(xvalue+3)+" hình trùng nhau. Nhận X"+(xvalueaDD[0])+" giải thưởng: "+gift_revice[0]['parrent'].params.value*(xvalueaDD[0])+""+msg_random_bonus[0]+"</span><br/>"+$strDiscountcode;
                                $html += "<span>Tổng cộng: "+parseInt(gift_revice[0]['parrent'].params.value)*(parseInt(xvalueaDD[0]))+"</span>";
                            }
                        }
                        else
                        {
                            $totalRevice = 0;
                            $html += "<span>Kết quả: Nhận "+gift_revice.length+" phần thưởng cho "+gift_revice.length+" lượt quay.</span><br/>";
                            $html += "<span><b>Mua X"+gift_revice.length+":</b></span><br/>";
                            for($i=0;$i<gift_revice.length;$i++)
                            {
                                // if(arrDiscount[$i] != "")
                                // {
                                //     $strDiscountcode="<span>Bạn nhận được 1 mã giảm giá khuyến mãi đi kèm: <b>"+arrDiscount[$i]+"</b></span>";
                                // }
                                $html += "<span>Lần quay "+($i + 1)+": "+gift_revice[$i]["title"];
                                if(gift_revice[$i].winbox == 1){
                                    $html +=" - nhận được: "+gift_revice[$i]['parrent'].params.value+" X"+(parseInt(xvalueaDD[$i]))+" = "+parseInt(gift_revice[$i]['parrent'].params.value)*(parseInt(xvalueaDD[$i]))+""+msg_random_bonus[$i]+"</span><br/>"+$strDiscountcode+"<br/>";
                                }
                                else
                                {
                                    $html +=""+msg_random_bonus[$i]+"<br/>"+$strDiscountcode+"<br/>";
                                }
                                $totalRevice +=  parseInt(gift_revice[$i]['parrent'].params.value)*(parseInt(xvalueaDD[$i]))+ parseInt(value_gif_bonus[$i]);
                            }

                            $html += "<span><b>Tổng cộng: "+$totalRevice+"</b></span>";
                        }
                    }
                    else
                    {
                        $("#btnWithdraw").hide();
                        if(gift_revice.length == 1)
                        {
                            $html += "<span>Kết quả chơi thử: "+gift_revice[0]["title"]+"</span><br/>";
                            if(gift_detail.winbox == 1){
                                $html += "<span>Mua X1: Nhận được "+gift_revice[0]['parrent'].params.value+"</span><br/>";
                                //$html += "<span>Quay được "+(xvalue+3)+" hình trùng nhau. Nhận X"+(xvalueaDD[0])+" giải thưởng: "+gift_revice[0]['parrent'].params.value*(xvalueaDD[0])+""+msg_random_bonus[0]+"</span><br/>";
                                $html += "<span>Tổng cộng: "+parseInt(gift_revice[0]['parrent'].params.value)*(parseInt(xvalueaDD[0]))+"</span>";
                            }
                        }
                        else
                        {
                            $totalRevice = 0;
                            $html += "<span>Kết quả chơi thử: Nhận "+gift_revice.length+" phần thưởng cho "+gift_revice.length+" lượt quay.</span><br/>";
                            $html += "<span><b>Mua X"+gift_revice.length+":</b></span><br/>";
                            for($i=0;$i<gift_revice.length;$i++)
                            {
                                $html += "<span>Lần quay "+($i + 1)+": "+gift_revice[$i]['parrent'].title;
                                if(gift_revice[$i].winbox == 1){
                                    $html +=" - nhận được: "+gift_revice[$i]['parrent'].params.value+" X"+(parseInt(xvalueaDD[$i]))+" = "+parseInt(gift_revice[$i]['parrent'].params.value)*(parseInt(xvalueaDD[$i]))+""+msg_random_bonus[$i]+"</span><br/>";
                                }
                                else
                                {
                                    $html +=""+msg_random_bonus[$i]+"<br/>";
                                }
                                $totalRevice +=  parseInt(gift_revice[$i]['parrent'].params.value)*(parseInt(xvalueaDD[$i]))+ parseInt(value_gif_bonus[$i]);
                            }

                            $html += "<span><b>Tổng cộng: "+$totalRevice+"</b></span>";
                        }
                    }
                }

                $('#noticeModal .content-popup').html($html);

                if (userpoint > 99) {
                    getgifbonus();
                }
                $('#noticeModal').modal('show');
            }
        }
    });
    $('body').delegate('.reLoad', 'click', function() {
        location.reload();
    })
</script>

<script id="history-template" type="text/x-handlebars-template">
    <tr>
        <td class="text-danger"><b>@{{idCustomer}}</b></td>
        <td class="base-color"><b>@{{txtHistory}}</b></td>
    </tr>
</script>
<script id="message-template" type="text/x-handlebars-template">
    <li>

        <div class="comment-item comment-item-own">

            <div class="comment-detail comment-detail-own">
                <div class="comment-info comment-info-own">

                    <span>@{{time}} , Vừa xong</span>
                    <h6>Bạn</h6>
                </div>
                <div class="comment-content comment-content-own">
                    @{{messageOutput}}
                </div>
                <div class="comment-interact comment-interact-own">
                    <span id="likeComment"><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/hearts-suit 1.svg" alt=""> Thích</span>
                    <span id="replyComment"><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/comment 1.svg" alt=""> Trả lời</span>
                </div>
            </div>
            <div class="comment-avatar">
                <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/user_avatar.png" alt="">
            </div>
        </div>

    </li>

</script>

<script id="message-response-template" type="text/x-handlebars-template">
    <li>
        <div class="comment-item">
            <div class="comment-avatar">
                <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/user_avatar.png" alt="">
            </div>
            <div class="comment-detail">
                <div class="comment-info">
                    <h6>Khách</h6>
                    <span>@{{time}}, Vừa xong</span>
                </div>
                <div class="comment-content">
                    @{{response}}
                </div>
                <div class="comment-interact">
                    <span id="likeComment"><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/hearts-suit 1.svg" alt=""> Thích</span>
                    <span id="replyComment"><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/comment 1.svg" alt=""> Trả lời</span>
                </div>
            </div>
        </div>

    </li>
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.0/handlebars.min.js"></script>
<script id="rendered-js">
    (function () {

        var chat = {
            messageToSend: '',
            messageResponses: [
                'Dịch vụ nạp uy tín ghê',
                'Uy tín không anh em.',
                'Vãi vừa ấn nạp xong vào game có ngay (y)',
                'Web uy tín đấy, vừa nạp 500k xong.',
                'Nãy có ông bạn nạp 500k xong vào nạp luôn, quá xịn admin ơi.',
                'Thanks admin <3 , uy tín lắm luôn',
                'Nhanh gọn uy tín, thanks admin',
                'Web xịn không scam nha mọi người',
                'Hàng sạch, thanks admin',
                'Vừa nạp xong, quá ngon',
                'Web ok không anh em, có scam không?',
                'Vừa chạy ra quán mua 500k thẻ nạp ăn luôn, ngon quá admin',
                'Nhập nhầm mã thẻ với serial báo admin xử lý trong vòng 1 nốt nhạc, uy tín quá admin ơi',
                'Cứ tưởng lừa đảo, nạp thử 200k nhận luôn kim cương trong 10s',
                '1 vote uy tín cho web nhé, quá ngon luôn',
                'Bị lừa nhiều rồi, giờ mới tìm được web uy tín, thanks ad',
                'Vừa nạp 100k xong',
                'Web ngon vl',
                'Anh em nào chưa nạp thì vào nạp ngay đi đang có khuyến mại',
                'Uy tín lắm admin',
                'Vote 10000k sao nhé, quá uy tín',
                'Có anh em nào vừa từ youtube qua đây nạp k',
                'Ông em vừa giới thiệu, nạp cái ăn luôn, ngon vc',
                'Uy tín nhé anh em',
                'Đã nạp thành công',
                'Đã nạp ở đây 20tr tiền thẻ, vote uy tín nhé',
                'Web nạp ngon thế này mà giờ mới biết',
                'Đã nạp, nhanh lắm nhé',
                'Ngon vcl, +5 sao cho admin',
                'Nghe anh em review ngon quá, tôi ra làm cái thẻ 500k nạp đây',
                'Không scam, web nạp thật, nhận thật nhé !',
                'Đã nạp và thấy ngon ngọt nhé ae',
                'Web này trùm nạp mẹ rồi',
                'Web được đấy anh em',
                'Thấy web được nhiều anh em nạp rồi, yên tâm nạp hehe',
                'Anh em không phải sợ đâu, tôi nạp nhiều web này rồi',
                'Web xịn không scam nha mọi người'
            ],
            init: function () {
                this.cacheDOM();
                this.bindEvents();
                this.render();
            },
            cacheDOM: function () {
                this.$chatHistory = $('.chat-history');
                this.$button = $('.btn-send-message');
                this.$textarea = $('#message-to-send');
                this.$chatHistoryList = this.$chatHistory.find('ul');
            },
            bindEvents: function () {
                this.$button.on('click', this.addMessage.bind(this));
                this.$textarea.on('keyup', this.addMessageEnter.bind(this));
            },
            render: function () {

                this.scrollToBottom();
                if (this.messageToSend.trim() !== '') {
                    var template = Handlebars.compile($("#message-template").html());
                    var context = {
                        messageOutput: this.messageToSend,
                        time: this.getCurrentTime()
                    };
                    this.$chatHistoryList.append(template(context));
                    this.scrollToBottom();
                    this.$textarea.val('');
                }
                // history-card
                var templateHistoryResponse = Handlebars.compile($("#history-template").html());
                var arrayTelCo = ['VIETTEL', 'VINAPHONE', 'MOBIFONE', 'VIETNAMOBILE', 'ZING'];
                var arrayPrice = ['10.000 đ', '20.000 đ', '30.000 đ', '50.000 đ', '100.000 đ', '200.000 đ', '300.000 đ', '500.000 đ', '1.000.000 đ'];
                var html = '';
                for (var i = 0; i < 10; i++) {
                    var contentHistory = {
                        idCustomer: '******' + Math.floor(100000 + Math.random() * 900000),
                        txtHistory: 'Nạp thành công thẻ ' + arrayTelCo[Math.floor(1 + Math.random() * arrayTelCo.length) - 1] + ' mệnh giá ' + arrayPrice[Math.floor(1 + Math.random() * arrayPrice.length) - 1]
                    }
                    html += templateHistoryResponse(contentHistory);
                }
                $('#tblHistory').html(html);
                setInterval(function () {
                    var html = '';
                    for (var i = 0; i < 10; i++) {
                        var contentHistory = {
                            idCustomer: '******' + Math.floor(100000 + Math.random() * 900000),
                            txtHistory: 'Nạp thành công thẻ ' + arrayTelCo[Math.floor(1 + Math.random() * arrayTelCo.length) - 1] + ' mệnh giá ' + arrayPrice[Math.floor(1 + Math.random() * arrayPrice.length) - 1]
                        }
                        html += templateHistoryResponse(contentHistory);
                    }
                    $('#tblHistory').html(html);
                }, 60000);

                setInterval(function () {
                    // responses
                    var templateResponse = Handlebars.compile($("#message-response-template").html());
                    var contextResponse = {
                        response: this.getRandomItem(this.messageResponses),
                        time: this.getCurrentTime()
                    };
                    this.$chatHistoryList.append(templateResponse(contextResponse));
                    this.scrollToBottom();
                }.bind(this), 5000);
            },
            addMessage: function () {
                this.messageToSend = this.$textarea.val();
                this.render();
            },
            addMessageEnter: function (event) {
                // enter was pressed
                if (event.keyCode === 13) {
                    this.addMessage();
                }
            },
            scrollToBottom: function () {
                $('.chat-scroll').scrollTop($('.chat-scroll')[0].scrollHeight);
            },
            getCurrentTime: function () {
                return new Date().toLocaleTimeString().
                replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3");
            },
            getRandomItem: function (arr) {
                return arr[Math.floor(Math.random() * arr.length)];
            }
        };

        chat.init();

    })();
    //# sourceURL=pen.js
</script>
@endsection

