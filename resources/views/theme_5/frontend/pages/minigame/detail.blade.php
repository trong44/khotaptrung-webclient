@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head',with(['data'=>$result->group]))
@endsection
@section('scripts')
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/minigame/minigame.js"></script>
    <script>


        $('body').on('click','.c_thele',function(e){
            $('#theleModal').modal('show');
        })

        $('body').on('click','.logsHisMinigame',function(e){
            $('.modal-logs-minigame').modal('show');
        })
    </script>
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/nam/minigame.css">
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/minigame/withdraw-modal.js?v={{time()}}"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/minigame/fake-cmt.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/minigame/modal-history-spin-bonus.js?v={{time()}}"></script>
@endsection
@section('content')

    <div class="container c-container" id="minigame-detail">
        <ul class="breadcrumb-list">
            <li class="breadcrumb-item">
                <a href="/" class="breadcrumb-link">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                <a href="minigame" class="breadcrumb-link">Vòng quay</a>
            </li>
            <li class="breadcrumb-item">
                <a href="javascript:void(0)" class="breadcrumb-link">{{$result->group->title}}</a>
            </li>
        </ul>
        <div class="head-mobile">
            <a href="/minigame" class="link-back "></a>

            <p class="head-title text-title">Danh sách minigame</p>

            <a href="/" class="home"></a>
        </div>

        <section class="rotation-content c-mb-40 c-mb-lg-20 c-pt-lg-16">
            <div class="row rotation-content-section">
                <div class="col-12 col-lg-8 c-pr-8 c-px-lg-0">

                    <div class="c-px-lg-16 d-block d-lg-none  c-mb-12">
                        <div class="rotation-header-mobile d-flex justify-content-between">
                            <div class="rotation-header c-pb-8">
                                <h1 class="fw-700 fz-18 lh-24">{{$result->group->title}}</h1>
                                <p class="fw-400 fz-13 mb-0"> <span class="userCount"></span> </p>

                            </div>
                            @if(isset($result->group->params->thele))
                                <div class="rotation-player">
                                    <button class="btn secondary open-sheet" data-target="#sheet-filter">Thể lệ</button>
                                </div>
                            @endif

                        </div>
                    </div>
                    @if(isset($currentPlayList) && $currentPlayList != '')
                        <div class="d-block d-lg-none c-mb-16 c-px-lg-16">
                            <div class="rotation-notify w-100 ">
                                <img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/sound_mobile.svg" alt="">
                                <marquee class="rotation-marquee">
                                    <div class="rotation-marquee-item">
                                        {!! $currentPlayList !!}
                                        {{--                                    Danh sách trúng thưởng: &nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;--}}
                                    </div>
                                </marquee>
                            </div>
                        </div>
                    @endif
                    <div class="d-block d-lg-none c-mb-16 c-px-lg-16">
                        <div class="rotation-top-mobile brs-12 d-block d-lg-none">
                            {{--                            <div class="rotation-header-sale c-py-4 c-px-12 d-flex align-items-center justify-content-between">--}}
                            {{--                                <div class="d-inline-flex align-items-center c-mr-10">--}}
                            {{--                                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/phu/flash_img.png" alt="">--}}
                            {{--                                    <p class="fw-500 fz-13 lh-20 mb-0">Flash sale</p>--}}
                            {{--                                </div>--}}
                            {{--                                <div class="d-inline-flex align-items-center">--}}
                            {{--                                    <img class="c-mr-4" src="/assets/frontend/{{theme('')->theme_key}}/image/svg/clock.svg" alt="">--}}
                            {{--                                    <p class="fz-12 fw-400 mb-0 c-mr-8">Kết thúc trong</p>--}}
                            {{--                                    <div class="rotation-sale-time">--}}
                            {{--                                        <ul class="mb-0 p-0">--}}
                            {{--                                            <li class="d-inline-flex align-items-center justify-content-center brs-4"><span class="fw-600 fz-12" id="hourRemain">10</span></li>--}}
                            {{--                                            <li class="d-inline-flex align-items-center justify-content-center brs-4"><span class="fw-600 fz-12" id="minuteRemain">2</span></li>--}}
                            {{--                                            <li class="d-inline-flex align-items-center justify-content-center brs-4"><span class="fw-600 fz-12" id="secondRemain">4</span></li>--}}
                            {{--                                        </ul>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            <div class="rotation-sale-content brs-12 c-py-12 d-flex flex-column align-items-center">
                                <p class="d-flex align-items-center c-mb-0">
                                    <span id="rotationFirstPrice" class="fw-400 fz-12 lh-16 c-mr-8">
                                         @if(isset($result->group->params->percent_sale))
                                            {{ str_replace(',','.',number_format(($result->group->params->percent_sale*$result->group->price)/100 + $result->group->price)) }} đ
                                        @endif
                                    </span>
                                    <span id="rotationSalePrice" class="fw-700 fz-20 lh-28 c-mr-8">{{ str_replace(',','.',number_format($result->group->price)) }}đ</span>
                                    @if(isset($result->group->params->percent_sale))
                                        <span id="rotationSaleRatio" class="brs-24 fw-400 fz-12 c-py-2 c-px-8 lh-16">Giảm {{ $result->group->params->percent_sale }}%</span>
                                    @endif
                                </p>
                                <p class="c-mb-0 fw-400 fz-13">Rẻ vô đối, giá tốt nhất thị trường</p>
                            </div>
                        </div>
                    </div>

                    <div class="rotation-detail c-mb-16 brs-12">
                        <div class="rotation-top c-p-16 d-none d-lg-flex justify-content-between">
                            <div>
                                <div class="rotation-header d-flex align-items-center c-mb-8">
                                    <h3 class="fw-700 fz-24 lh-32 c-mr-8">{{$result->group->title}}</h3>
                                    @if(isset($result->group->params->thele))

                                        <p class="fw-400 fz-13 mb-0 c_thele">Thể lệ <img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/minigame_info.svg" alt=""></p>
                                    @endif
                                </div>
                                <div class="rotation-player d-flex align-items-center">
                                    <img class="c-mr-4" src="/assets/frontend/{{theme('')->theme_key}}/image/svg/security-user1.svg" alt="">
                                    <p class="fw-400 fz-13 mb-0"><span class="userCount"></span></p>
                                </div>
                            </div>
                            <div class="rotation-header-sale d-flex align-items-start">
                                {{--                                <div class="d-inline-flex align-items-center c-mr-10">--}}
                                {{--                                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/phu/flash_img.png" alt="">--}}
                                {{--                                    <p class="fw-700 fz-20 lh-28 mb-0">Flash sale</p>--}}
                                {{--                                </div>--}}
                                {{--                                <div class="d-inline-flex align-items-center">--}}
                                {{--                                    <img class="c-mr-4" src="/assets/frontend/{{theme('')->theme_key}}/image/svg/clock.svg" alt="">--}}
                                {{--                                    <p class="fz-13 fw-400 mb-0 c-mr-8">Kết thúc trong</p>--}}
                                {{--                                    <div class="rotation-sale-time">--}}
                                {{--                                        <ul class="mb-0 p-0">--}}
                                {{--                                            <li class="d-inline-flex align-items-center justify-content-center brs-4"><span id="hourRemain">10</span></li>--}}
                                {{--                                            <li class="d-inline-flex align-items-center justify-content-center brs-4"><span id="minuteRemain">2</span></li>--}}
                                {{--                                            <li class="d-inline-flex align-items-center justify-content-center brs-4"><span id="secondRemain">4</span></li>--}}
                                {{--                                        </ul>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                            </div>
                        </div>


                        <div class="rotation c-p-16" style="background-image: url(/assets/frontend/{{theme('')->theme_key}}/image/phu/rotation_bg.png)">
                            @if(isset($currentPlayList) && $currentPlayList != '')
                                <div class="rotation-notify d-none d-lg-flex w-100 c-mb-16">
                                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/sound.svg" alt="">
                                    <marquee class="rotation-marquee">
                                        <div class="rotation-marquee-item">
                                            {!! $currentPlayList !!}
                                            {{--                                        Danh sách trúng thưởng: &nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;--}}
                                        </div>
                                    </marquee>
                                </div>
                            @endif

                            @switch($position)
                                @case('rubywheel')

                                <div class="d-flex align-items-center justify-content-center" id="rubywheel">
                                    <div class="rotation-button" id="start-played" style="z-index: 2">
                                        <img class="lazy" src="{{\App\Library\MediaHelpers::media($result->group->image_icon)}}" alt="{{$result->group->title}}" >
                                    </div>
                                    <img style="width: 70%" class="lazy" src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}" alt="{{$result->group->title}}" id="rotate-play">
                                </div>
                                @break
                                @case('flip')
                                {{--                                    <div class="d-flex align-items-center justify-content-center flex-wrap">--}}
                                <div class="rotation" id="flip">
                                    <div class="row boxflip">
                                        @for ($i = 0; $i < count($result->group->items); $i++)
                                            <div class='flipimg col-4 col-sm-4 col-lg-4 flip-box'>
                                                <div data-inner=" inner{{$i}}" class="item_flip_inner">
                                                    <img class="imgnen" src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}">
                                                    <img data-inner="inner{{$i}}" class="flip-box-front inner{{$i}} item_flip_inner_image" src="{{ \App\Library\MediaHelpers::media($result->group->params->image_static) }}">
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                    <div class="row" id="boxfliphide" style="display: none;">
                                        @for ($i = 0; $i < count($result->group->items); $i++)
                                            <div class='flipimg col-4 col-sm-4 col-lg-4 flip-box'>
                                                <div data-inner=" inner{{$i}}" class="item_flip_inner">
                                                    <img class="imgnen" src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}">
                                                    <img data-inner="inner{{$i}}" class="flip-box-front img_remove inner{{$i}} item_flip_inner_image" src="{{ \App\Library\MediaHelpers::media($result->group->params->image_static) }}">
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                                {{--                                    </div>--}}
                                @break
                                @case('slotmachine')
                                <div class="d-flex align-items-center justify-content-center" id="slotmachine">
                                    <div class="item_slot item_slot-ba-qua" style="background: url({{\App\Library\MediaHelpers::media($result->group->params->image_background)}});background-repeat: no-repeat" >
                                        <div class="item_slot_inner">
                                            <div id="slot1"  class="item_slot_inner_img a1" style=""></div>
                                            <div id="slot2" class="item_slot_inner_img a1" style=""></div>
                                            <div id="slot3" class="item_slot_inner_img a1" style=""></div>
                                        </div>
                                    </div>
                                </div>
                                @break
                                @case('slotmachine5')
                                <div class="d-flex align-items-center justify-content-center " id="slotmachine5">
                                    <div class="rotation">
                                        <div class="item_play_spin_five_record" style="background-image: url({{\App\Library\MediaHelpers::media($result->group->params->image_background)}})" >
                                            <div class="item_five_record_inner">
                                                <div id="slot1"  class="item_five_record_inner_img a1" style=""></div>
                                                <div id="slot2" class="item_five_record_inner_img a1" style=""></div>
                                                <div id="slot3" class="item_five_record_inner_img a1" style=""></div>
                                                <div id="slot4" class="item_five_record_inner_img a1" style=""></div>
                                                <div id="slot5" class="item_five_record_inner_img a1" style=""></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @break
                                @case('squarewheel')

                                <div class="d-flex align-items-center justify-content-center flex-wrap">
                                    <table id="squaredesktop" class="square">
                                        <tr>
                                            <td></td>
                                            <td><div  data-num="1" class="gift1 box"><img src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}"/></div></td>
                                            <td><div  data-num="2" class="gift2 box"><img src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}"/></div></td>
                                            <td><div  data-num="3" class="gift3 box"><img src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}"/></div></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><div  data-num="12" class="gift12 box"><img src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}"/></div></td>
                                            <td colspan="3"></td>
                                            <td><div  data-num="4" class="gift4 box"><img src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}"/></div></td>
                                        </tr>
                                        <tr>
                                            <td><div data-num="11" class="gift11 box"><img src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}"/></div></td>
                                            <td colspan="3">
                                                <div class="outer-btn text-center">
                                                    <div class="play btn m-btn m-btn--custom m-btn--icon m-btn--pill" style="" id="start-played">
                                                        <img src="{{\App\Library\MediaHelpers::media($result->group->image_icon)}}" alt="" style="">
                                                    </div>
                                                </div>
                                            </td>
                                            <td><div  data-num="5" class="gift5 box"><img src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}"/></div></td>
                                        </tr>
                                        <tr>
                                            <td><div  data-num="10" class="gift10 box"><img src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}"/></div></td>
                                            <td colspan="3"></td>
                                            <td><div  data-num="6" class="gift6 box"><img src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}"/></div></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><div  data-num="9" class="gift9 box"><img src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}"/></div></td>
                                            <td><div  data-num="8" class="gift8 box"><img src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}"/></div></td>
                                            <td><div  data-num="7" class="gift7 box"><img src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}"/></div></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div>
                                @break
                                @case('smashwheel')
                                @case('rungcay')
                                @case('gieoque')
                                <div class="d-flex align-items-center justify-content-center" id="smashwheel">
                                    <div class="rotation-button rotation-button-quanhuy" id="start-played" >
                                        <img class="lazy" src="{{\App\Library\MediaHelpers::media($result->group->image_icon)}}" alt="{{$result->group->title}}" >
                                    </div>
                                    <img style="background: url({{\App\Library\MediaHelpers::media($result->group->params->image_background)}}) no-repeat center center;background-size: contain;" class="lazy minigame-image" src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}" alt="{{$result->group->title}}" id="lac_lixi">
                                    <input type="hidden" value="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}" id="hdImageLD">
                                    <input type="hidden" value="{{\App\Library\MediaHelpers::media($result->group->params->image_animation)}}" id="hdImageDapLu">
                                </div>
                                @break


                            @endswitch
                        </div>

                        <div class="row no-gutters">
                            <div class="col-12 col-lg-6 c-p-16 c-py-lg-8">
                                @if($result->checkPoint==1)
                                    <div class="rotation-points c-mb-16 c-mb-lg-0">
                                        <div class="rotation-points-title c-mb-8 d-flex align-items-center fw-600 fz-16">
                                            <img class="c-mr-4" src="/assets/frontend/{{theme('')->theme_key}}/image/svg/mdi_police-badge.svg" alt="">
                                            <p class="c-mr-4">Hũ điểm</p>
                                            <div class="info-rotation">
                                                <img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/info.svg" alt="">
                                                <div class="rotation-tooltip c-py-8 c-px-12 brs-4">
                                                    <p>Mỗi lượt quay sẽ được cộng 10 point.</p>
                                                    <p>Tích luỹ đủ số point để nhận thêm lượt quay</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="progress-wrapper brs-24">
                                            <div class="progress-bar brs-24" style="width: {{$result->pointuser<100?$result->pointuser:'100'}}%"></div>
                                        </div>

                                    </div>
                                @endif
                                <div class="rotation-sale-content brs-8 c-py-8 d-none d-lg-flex justify-content-center">
                                    <p class="d-flex align-items-center c-mb-0">
                                        <span id="rotationFirstPrice" class="fw-400 fz-14 c-mr-8">
                                            @if(isset($result->group->params->percent_sale))
                                                {{ str_replace(',','.',number_format(($result->group->params->percent_sale*$result->group->price)/100 + $result->group->price)) }} đ
                                            @endif
                                        </span>
                                        <span id="rotationSalePrice" class="fw-700 fz-24 lh-32 c-mr-8">{{ str_replace(',','.',number_format($result->group->price)) }}đ</span>
                                        @if(isset($result->group->params->percent_sale))
                                            <span id="rotationSaleRatio" class="brs-24 fw-400 fz-12 c-py-2 c-px-8 lh-16">Giảm {{ $result->group->params->percent_sale }}%</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 c-p-16 c-py-lg-8">
                                <div class="rotation-inputs c-mb-24 c-mb-lg-0 row no-gutters">
                                    <div class="col-6 c-pr-6">
                                        <input class="" type="text" placeholder="Nhập mã giảm giá">
                                    </div>
                                    <div class="col-6 c-pl-6">
                                        <select class="rotation-inputs-select" name="type" id="numrolllop">
                                            <option value="1">Mua X1/{{$result->group->price/1000}}k 1 lần quay</option>
                                            @if($result->group->params->price_sticky_3 > 0))
                                            <option value="3">Mua X3/{{$result->group->params->price_sticky_3/1000}}k 3 lần quay</option>
                                            @endif
                                            @if($result->group->params->price_sticky_5 > 0))
                                            <option value="5">Mua X5/{{$result->group->params->price_sticky_5/1000}}k 5 lần quay</option>
                                            @endif
                                            @if($result->group->params->price_sticky_7 > 0))
                                            <option value="7">Mua X7/{{$result->group->params->price_sticky_7/1000}}k 7 lần quay</option>
                                            @endif
                                            @if($result->group->params->price_sticky_10 > 0))
                                            <option value="10">Mua X10/{{$result->group->params->price_sticky_10/1000}}k 10 lần quay</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="row no-gutters d-none d-lg-flex">
                                    @if(isset($result->group->params->is_try))
                                        @if($result->group->params->is_try == 1)

                                            <div class="col-12 col-md-6 c-pr-6">
                                                <button id="playerDemo" class="btn secondary w-100 num-play-try">Chơi thử</button>
                                            </div>
                                        @endif
                                    @endif
                                    <div class="col-12 col-md-6 c-pl-6">
                                        <button id="start-played" class="btn primary w-100 play">Quay ngay</button>
                                    </div>
                                </div>
                                <div class="footer-mobile">

                                    <div class="row marginauto">
                                        @if(isset($result->group->params->is_try))
                                            @if($result->group->params->is_try == 1)
                                                <div class="col-6 pl-0 c-pr-8">
                                                    <button class="btn secondary w-100 num-play-try">Chơi thử</button>
                                                </div>
                                            @endif
                                        @endif
                                        <div class="col-6 pr-0 c-pl-8">
                                            <button id="start-played" class="btn primary w-100  play">Quay ngay</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    @if(isset($result->group->content))
                        <div class="service-detail-block c-mb-16 c-px-lg-16 detailViewBlock">
                            <h6 class="d-block d-lg-none fz-15 fw-700 lh-24 c-mb-8">Chi tiết dịch vụ</h6>
                            <div class="card overflow-hidden detailViewBlock">
                                <div class="card-body c-p-16">
                                    <h2 class="text-title-bold d-none d-lg-block c-mb-24 detailViewBlockTitle">Chi tiết dịch vụ</h2>
                                    @if(substr($result->group->content, 1200))
                                    <div class="content-desc hide detailViewBlockContent">
                                    @else
                                    <div class="content-desc detailViewBlockContent">
                                    @endif
                                        {!! $result->group->content !!}
                                    </div>
                                </div>
                                @if(substr($result->group->content, 1200))
                                <div class="card-footer text-center">
                                    <span class="see-more" data-content="Xem thêm nội dung"></span>
                                </div>
                                @endif
                            </div>
                        </div>
                    @endif

                    {{--                    top quay thưởng--}}
                    <div class="d-block d-lg-none c-mb-16">
                        <div class="rotation-leaderboard c-p-lg-0">
                            <div class="leaderboard-header d-flex align-items-center c-pl-16 c-mb-16">
                                <img class="c-mr-4" src="/assets/frontend/{{theme('')->theme_key}}/image/svg/top-leaderboard.svg" alt="">
                                <h5 class="fw-700 fz-18 lh-20">Top quay thưởng</h5>
                            </div>
                            <div class="leaderboard-type c-mb-16 brs-8 brs-lg-0 row no-gutters">
                                <ul class="nav justify-content-between row no-gutters w-100 c-p-4 c-p-lg-0" role="tablist">
                                    <li class="nav-item col-4 p-0" role="presentation">
                                        <p class="nav-link text-center mb-0 fw-400 fz-13 brs-8 brs-lg-0 active" data-toggle="tab" href="#leaderboard_m-1" role="tab" aria-selected="true">Hôm nay</p>
                                    </li>
                                    <li class="nav-item col-4 p-0" role="presentation">
                                        <p class="nav-link text-center mb-0 fw-400 fz-13 brs-8 brs-lg-0" data-toggle="tab" href="#leaderboard_m-2" role="tab" aria-selected="false">7 ngày</p>
                                    </li>
                                    <li class="nav-item col-4 p-0" role="presentation">
                                        <p class="nav-link text-center mb-0 fw-400 fz-13 brs-8 brs-lg-0" data-toggle="tab" href="#leaderboard_m-3" role="tab" aria-selected="false">Quà đua top</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="leaderboard-table">
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="leaderboard_m-1" role="tabpanel">
                                        <div class="leaderboard-content c-px-16">

                                            @if(isset($topDayList))
                                                @foreach($topDayList as $key => $item)
                                                    <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                        <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">{{ $key + 1 }}</div>
                                                        <div class="leaderboard-item-avt brs-100">
                                                            <img class="brs-100 w-100 c-pr-12" src="/assets/frontend/{{theme('')->theme_key}}/image/phu/user_avatar.png" alt="">
                                                        </div>
                                                        <div class="leaderboard-item-content">
                                                            <p class="fw-500 fz-13 c-mb-0">{{$item['name']}}</p>
                                                            <span class="fw-400 fz-12">{{ str_replace(',','.',number_format($item['numwheel'])) }} lượt</span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="leaderboard_m-2" role="tabpanel">
                                        <div class="leaderboard-content">
                                            @if(isset($top7DayList))
                                                @foreach($top7DayList as $key => $item)
                                                    <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                        <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">{{ $key + 1 }}</div>
                                                        <div class="leaderboard-item-avt brs-100">
                                                            <img class="brs-100 w-100 c-pr-12" src="/assets/frontend/{{theme('')->theme_key}}/image/phu/user_avatar.png" alt="">
                                                        </div>
                                                        <div class="leaderboard-item-content">
                                                            <p class="fw-500 fz-13 c-mb-0">{{$item['name']}}</p>
                                                            <span class="fw-400 fz-12">{{ str_replace(',','.',number_format($item['numwheel'])) }} lượt</span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="leaderboard-item row no-gutters">
                                                    <div class="col-12 leaderboard-item-name text-center justify-content-center">
                                                        Không có dữ liệu
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="leaderboard_m-3" role="tabpanel">
                                        <div class="leaderboard-content" >
                                            @if(isset($result->group->params->phanthuong))
                                                <div class="leaderboard-item row no-gutters">
                                                    {!!$result->group->params->phanthuong!!}

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
                                </div>
                            </div>
                            <div class="leaderboard-seemore">
                                <p>Xem thêm</p>
                            </div>
                        </div>
                    </div>
                    {{-- button mobile--}}
                    <div class="d-block d-lg-none c-mb-16">
                        @if (\App\Library\AuthCustom::check())
                            <div class="c-px-16">
                                <div class="leaderboard-items brs-8 c-mb-4 c-px-12 c-py-8 d-flex align-items-center">
                                    <span class="fw-400 fz-13 c-mr-8 lh-16">Bạn đang có:</span>
                                    <p class="c-mb-0 fw-700 fz-15 lh-24">{{ str_replace(',','.',number_format($result->number_item)) }} {{ $result->name_item->image??'' }}</p>
                                </div>
                            </div>
                        @endif
                        <div class="leaderboard-buttons c-px-16 c-py-8 row no-gutters" style="border-bottom: none;">
                            <div class="col-6 c-pr-5">
                                <a href="javascript:void(0)" class="btn secondary w-100 logsHisMinigameMobile open-sheet modal_spin_bonus__mobile" data-target="#sheet-filter-02" >
                                    Lịch sử quay
                                </a>
                            </div>
                            <div class="col-6 c-pl-5">
                                <a class="btn primary w-100" href="/withdrawitem-{{$result->group->params->game_type}}">Rút quà</a>
                            </div>
                        </div>
                    </div>
                    {{--                    top quay thưởng--}}

                    <div class="rotation-comment-block c-px-lg-16">
                        <h6 class="d-block d-lg-none fw-700 fz-18 lh-24 c-py-16">Bình luận</h6>
                        <div class="rotation-comment chat-history brs-12 c-p-16">
                            <h6 class="fw-700 fz-20 lh-28 c-mb-20  d-none d-lg-block">Bình luận</h6>
                            <ul class="comment-block list-unstyled chat-scroll c-pr-8">

                            </ul>

                            <div class="commment-input d-flex align-items-center c-mb-20">
                                <div class="comment-user-avatar c-mr-8 d-none d-lg-block">
                                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/phu/user_avatar.png" alt="">
                                </div>
                                <input name="message-to-send" type="text" class="input-primary" id="message-to-send">
                            </div>
                            <div class="comment-button">
                                <button type="button" class="btn primary btn-send-message pill-button">Bình luận</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4 c-pl-8 d-none d-lg-block">
                    <div class="rotation-leaderboard c-py-16 c-px-16 brs-12">
                        @if (\App\Library\AuthCustom::check())
                            <div class="leaderboard-items brs-8 c-mb-12 c-px-12 c-py-8 d-flex align-items-center">
                                <span class="fw-400 fz-13 c-mr-8 lh-16">Bạn đang có:</span>
                                <p class="c-mb-0 fw-700 fz-15 lh-24">{{ str_replace(',','.',number_format($result->number_item)) }} {{ $result->name_item->image??'' }}</p>
                            </div>
                        @endif
                        <div class="leaderboard-buttons c-pb-24 c-mb-16 row no-gutters">
                            <div class="col-6 c-pr-5">
                                <a href="javascript:void(0)" class="btn secondary w-100 modal_spin_bonus">
                                    Lịch sử quay
                                </a>
                            </div>
                            <div class="col-6 c-pl-5">
                                <a href="javascript:void(0)" class="btn primary w-100 modal_withdraw_items">
                                    Rút quà
                                </a>
                            </div>
                        </div>
                        <div class="leaderboard-header d-flex align-items-center c-mb-16">
                            <img class="c-mr-4" src="/assets/frontend/{{theme('')->theme_key}}/image/svg/top-leaderboard.svg" alt="">
                            <h5 class="fw-700 fz-20 lh-28">Top quay thưởng</h5>
                        </div>
                        <div class="leaderboard-type c-mb-16 brs-8 row no-gutters">
                            <ul class="nav justify-content-between row no-gutters w-100 c-p-4" role="tablist">
                                <li class="nav-item col-4 p-0" role="presentation">
                                    <p class="nav-link text-center mb-0 fw-400 fz-13 brs-8 active" data-toggle="tab" href="#leaderboard-1" role="tab" aria-selected="true">Hôm nay</p>
                                </li>
                                <li class="nav-item col-4 p-0" role="presentation">
                                    <p class="nav-link text-center mb-0 fw-400 fz-13 brs-8" data-toggle="tab" href="#leaderboard-2" role="tab" aria-selected="false">7 ngày</p>
                                </li>
                                <li class="nav-item col-4 p-0" role="presentation">
                                    <p class="nav-link text-center mb-0 fw-400 fz-13 brs-8" data-toggle="tab" href="#leaderboard-3" role="tab" aria-selected="false">Quà đua top</p>
                                </li>
                            </ul>
                        </div>
                        <div class="leaderboard-table">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="leaderboard-1" role="tabpanel">
                                    <div class="leaderboard-content" >

                                        @if(isset($topDayList))
                                            @foreach($topDayList as $key => $item)
                                                <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                    <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">{{ $key + 1 }}</div>
                                                    <div class="leaderboard-item-avt brs-100">
                                                        <img class="brs-100 w-100 c-pr-12" src="/assets/frontend/{{theme('')->theme_key}}/image/phu/user_avatar.png" alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">{{$item['name']}}</p>
                                                        <span class="fw-400 fz-12">{{ str_replace(',','.',number_format($item['numwheel'])) }} lượt</span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="leaderboard-item row no-gutters">
                                                <div class="col-12 leaderboard-item-name text-center justify-content-center">
                                                    Không có dữ liệu
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="leaderboard-2" role="tabpanel">
                                    <div class="leaderboard-content">
                                        @if(isset($top7DayList))
                                            @foreach($top7DayList as $key => $item)
                                                <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                    <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">{{ $key + 1 }}</div>
                                                    <div class="leaderboard-item-avt brs-100">
                                                        <img class="brs-100 w-100 c-pr-12" src="/assets/frontend/{{theme('')->theme_key}}/image/phu/user_avatar.png" alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">{{$item['name']}}</p>
                                                        <span class="fw-400 fz-12">{{ str_replace(',','.',number_format($item['numwheel'])) }} lượt</span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="leaderboard-item row no-gutters">
                                                <div class="col-12 leaderboard-item-name text-center justify-content-center">
                                                    Không có dữ liệu
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="leaderboard-3" role="tabpanel">
                                    <div class="leaderboard-content" >
                                        @if(isset($result->group->params->phanthuong))
                                            <div class="leaderboard-item c-p-8 align-items-center">
                                                {!!$result->group->params->phanthuong!!}
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
                            </div>
                        </div>
                        <div class="leaderboard-seemore">
                            <p>Xem thêm</p>
                        </div>
                    </div>
                </div>


            </div>
        </section>

        {{--            Vòng quayy free fire   --}}

        {{--        @include('frontend.pages.minigame.widget.__play__recently')--}}
        {{--            Vòng quay liên quân   --}}
        @include('frontend.pages.minigame.widget.__related__minigame', ['data_minigame' => $result->group->id])

        {{--        Modal thể lệ    --}}

        <div class="modal fade modal-big" id="theleModal">
            <div class="modal-dialog modal-dialog-centered modal-custom">
                <div class="modal-content c-p-24">
                    <div class="modal-header">
                        <h2 class="modal-title center">Thể lệ</h2>
                        <button type="button" class="close" data-dismiss="modal"></button>
                    </div>
                    <div class="modal-body pl-0 pr-0 c-pt-24 c-pb-24">
                        <div class="card--gray c-p-16">
                            <div class="card--attr justify-content-between  c-mb-16">
                                {!! $result->group->params->thele !!}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn primary"  data-dismiss="modal">Chơi thử</button>
                    </div>
                </div>
            </div>
        </div>



        {{--         @endif--}}
        <!-- Sheet Thể lệ  -->
        <div class="bottom-sheet" id="sheet-filter" aria-hidden="true" data-height="36">
            <div class="layer"></div>
            <div class="content-bottom-sheet bar-slide">
                <form action="" class="form-filter">
                    <div class="sheet-header">
                        <h2 class="text-title center">
                            Thể lệ
                        </h2>
                        <label class="close"></label>
                    </div>
                    <div class="sheet-body overflow-visible">
                        <!-- body -->
                        {!! $result->group->params->thele !!}
                    </div>
                    <div class="sheet-footer">
                        <button class="btn primary close" style="opacity: 1;">Chơi thử</button>

                    </div>
                </form>
            </div>
        </div>

        <!-- Sheet History Mobile -->

        <div class="bottom-sheet" id="sheet-filter-02" aria-hidden="true" data-height="50">
            <div class="layer"></div>
            <div class="content-bottom-sheet bar-slide">
                <form action="" class="form-filter">
                    <div class="sheet-header">
                        <h2 class="text-title center">
                            Lịch sử quay thưởng
                        </h2>
                        <label class="close"></label>
                    </div>
                    <div class="sheet-body overflow-visible c-p-0">
                        <div id="data-ajax-mobile-render"></div>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <input type="hidden" class="started_at" name="started_at" value="{{ $result->group->started_at??0 }}">
    <input type="hidden" id="type_play" value="real">
    <input type="text" id="checkPoint" name="checkPoint" value="{{$result->checkPoint}}">

    <!-- Modal rút quà -->
    <div class="modal fade" id="modalWithdraw" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content c-p-0">
                <div class="modal-header c-p-24 align-items-center">
                    <h5 class="modal-title fw-700 fz-15 lh-24">Rút vật phẩm</h5>
                    <button type="button" class="close" data-dismiss="modal"></button>
                </div>
                <div class="modal-body p-0">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#modal-tab-withdraw" role="tab">Rút vật phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#modal-tab-history" role="tab">Lịch sử</a>
                        </li>
                    </ul>
                    <div class="tab-content c-p-0">
                        <div class="tab-pane fade show active" id="modal-tab-withdraw" role="tabpanel">
                            <form action="" id="form-withdraw-item">
                                @csrf
                                <div class="item-block-tab c-p-16">
                                    <div class="input-group">
                                        <div class="form-label">Chọn vật phẩm bạn đang sở hữu</div>
                                        <div class="swiper swiper-withdraw">
                                            <div class="swiper-wrapper" id="wrap-game-type" data-game_type="{{ @$result->group->params->game_type }}">

                                            </div>
                                        </div>
                                        <span class="text-error"></span>
                                    </div>
                                </div>
                                <div class="item-input-tab">
                                    <div class="input-group">
                                        <div class="form-label">
                                            Chọn gói rút
                                        </div>
                                        <select name="package" id="package" class="wide select-withdraw">
                                            <option value="">Chọn gói</option>
                                        </select>
                                        <span class="text-error"></span>
                                    </div>
                                    <div class="input-group input-id-game">
                                        <div class="form-label">
                                            Tài khoản trong game
                                        </div>
                                        <input class="" type="text" name="idgame" placeholder="Nhập tài khoản trong game" required="">
                                        <span class="text-error"></span>
                                    </div>
                                    <div class="input-group password-phone">
                                        <div class="form-label">
                                            Mật khẩu trong game
                                        </div>
                                        <div class="toggle-password">
                                            <input class="password" type="password" name="serial" placeholder="Nhập mật khẩu trong game" required="">
                                        </div>
                                        <span class="text-error"></span>
                                    </div>
                                    <div id="withdrawMessage"></div>
                                    <div class="d-flex c-mt-24 justify-content-end">
                                        <button type="submit" class="btn primary" style="width: 40%">Rút ngay</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="modal-tab-history" role="tabpanel">
                            <div class="history-block-tab">
                                <div style="width: 100%">
                                    <form action="" class="form-search history">
                                        <input type="search" placeholder="Tìm kiếm" class=" has-submit">
                                        <button type="submit"></button>
                                    </form>
                                </div>
                                <div class="value-filter">
                                    <div class="show-modal-filter noselect">Bộ lọc</div>
                                </div>
                                <div class="row history-tab-inputs">
                                    <div class="col-7 c-pr-4">
                                        <div class="row">
                                            <div class="col-6 c-pr-4">
                                                <div class="input-group">
                                                    <div class="form-label">
                                                        Loại giao dịch
                                                    </div>
                                                    <select name="id" class="wide">
                                                        <option value="" selected disabled hidden>Chọn</option>
                                                        <option value="ngoc-rong">Ngoc rong</option>
                                                        <option value="cf-online">CF Online</option>
                                                    </select>
                                                    <span class="text-error"></span>
                                                </div>
                                            </div>
                                            <div class="col-6 c-pl-4">
                                                <div class="input-group">
                                                    <div class="form-label">
                                                        Trạng thái
                                                    </div>
                                                    <select name="status" class="wide">
                                                        <option value="" selected disabled hidden>Chọn</option>
                                                        <option value="1">Hủy</option>
                                                        <option value="0">Thành công</option>
                                                    </select>
                                                    <span class="text-error"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-5 c-pl-4">
                                        <div class="row">
                                            <div class="col-6 c-pr-4">
                                                <div class="input-group">
                                                    <div class="form-label">
                                                        Từ ngày
                                                    </div>
                                                    <input type="text" name="started_at" class="date-right" placeholder="Chọn">
                                                    <span class="text-error"></span>
                                                </div>
                                            </div>
                                            <div class="col-6 c-pl-4">
                                                <div class="input-group">
                                                    <div class="form-label">
                                                        Đến ngày
                                                    </div>
                                                    <input type="text" name="ended_at" class="date-right" placeholder="Chọn">
                                                    <span class="text-error"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-7 c-pr-4">

                                    </div>
                                    <div class="col-5 c-pl-4">
                                        <div class="row">
                                            <div class="col-6 c-pr-4">
                                                <div class="btn ghost" id="resetFormButton" style="width:100%;">Xóa bộ lọc</div>
                                            </div>
                                            <div class="col-6 c-pl-4">
                                                <div class="btn primary" style="width:100%;">Xem kết quả</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="history-list-tab">
                                <div id="table-history-withdraw"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--  Modal Lịch sử quay -->
    <div class="modal fade" id="modal-spin-bonus" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content c-p-0">
                <div class="modal-header c-p-24 align-items-center">
                    <h5 class="modal-title fw-700 fz-15 lh-24">Lịch sử quay thưởng</h5>
                    <button type="button" class="close" data-dismiss="modal"></button>
                </div>
                <div class="modal-body c-p-0">
                    <div id="data-ajax-render" data-id="{{ @$result->group->id }}">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal quay thành công -->
    <div class="modal fade modal-small" id="noticeModal">
        <div class="modal-dialog modal-dialog-centered modal-custom">
            <div class="modal-content">
                <div class="modal-header justify-content-center p-0">
                    {{--                    Ảnh Thành công    --}}
                    <img class="c-pt-20 c-pb-20" src="/assets/frontend/{{theme('')->theme_key}}/image/son/success.png" alt="">
                    <button type="button" class="close close_modal" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body text-center c-pl-24 c-pr-24 pt-0 pb-0">
                    {{--                    Content 3  --}}
                    <p class="fw-700 fz-15 fz-lg-15 fz-md-14 fz-sm-12 c-mt-12 mb-0 text-title-theme">Chúc mừng bạn đã quay trúng</p>
                    <div class="rotation-prize-detail content-popup fw-400 fz-13 fz-lg-13 fz-md-12 fz-sm-11 c-mt-10 mb-0">
                    </div>
                </div>
                <div class="modal-footer c-p-24">
                    <a class="btn secondary modal_withdraw_items" href="#" >Rút quà</a>
                    <button class="btn primary"  data-dismiss="modal">Chơi tiếp</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-small" id="naptheModal" role="dialog" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered modal-custom">
            <div class="modal-content">
                <div class="modal-header justify-content-center p-0">
                    {{--                    Ảnh Thành công    --}}
                    <img class="c-pt-20 c-pb-20" src="/assets/frontend/{{theme('')->theme_key}}/image/son/thatbai.png" alt="">
                    <button type="button" class="close close_modal" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body text-center c-pl-24 c-pr-24 pt-0 pb-0">
                    {{--                    Content 3  --}}
                    <div class="rotation-prize-detail content-popup fw-700 fz-15 fz-lg-15 fz-md-14 fz-sm-12 c-mt-12 mb-0 text-title-theme">
                    </div>
                </div>
                <div class="modal-footer c-p-24">
                    <a href="javascript:void(0);" class="handle-recharge-modal btn secondary" data-tab="1" data-dismiss="modal">Nạp tiền</a>
                    <button class="btn primary"  data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

    @foreach(config('constants.'.'game_type') as $item => $key)
        <input type="hidden" id="withdrawruby_{{$item}}" value="{{$key}}">
    @endforeach
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.0/handlebars.min.js"></script>
    <input type="hidden" id="position_input" value="{{ @$position }}">
    <input type="hidden" id="group_id" value="{{ @$result->group->id}}">
    <input type="hidden" id="image_static" value="{{ @\App\Library\MediaHelpers::media($result->group->params->image_static) }}">
    <input type="hidden" id="count_item" value="{{count($result->group->items)}}">

    <script type="text/javascript">
        $( document ).ready(function() {

            $('body').on('click', '.modal_withdraw_items', function(e) {

                if (!auth_check) {
                    let width = $(window).width();
                    if ( width > 1200 ) {
                        $('#loginModal').modal('show');
                        $('#loginModal #modal-login-container').removeClass('right-panel-active');
                        return;
                    } else {
                        $('.mobile-auth-form #formLoginMobile').css('display', 'flex');
                        $('.mobile-auth-form #formRegisterMobile').css('display', 'none');
                        $('.mobile-auth .head-mobile h1').text('Đăng nhập');
                        $('.mobile-auth').css('transform', 'translateX(0)');
                        return;
                    }
                }

                $('#modalWithdraw').modal('show');
                $('#noticeModal').modal('hide');
            })

            $('body').on('click', '.modal_spin_bonus', function(e) {
                if (!auth_check) {
                    let width = $(window).width();
                    if ( width > 1200 ) {
                        $('#loginModal').modal('show');
                        $('#loginModal #modal-login-container').removeClass('right-panel-active');
                        return;
                    } else {
                        $('.mobile-auth-form #formLoginMobile').css('display', 'flex');
                        $('.mobile-auth-form #formRegisterMobile').css('display', 'none');
                        $('.mobile-auth .head-mobile h1').text('Đăng nhập');
                        $('.mobile-auth').css('transform', 'translateX(0)');
                        return;
                    }
                }

                $('#modal-spin-bonus').modal('show');
            })

            $('body').on('click', '.modal_spin_bonus__mobile', function(e) {
                if (!auth_check) {
                    let width = $(window).width();
                    setTimeout(function(){
                        if ( width > 1200 ) {
                            $('#loginModal').modal('show');
                            setTimeout(() => {
                                $('#loginModal #modal-login-container').removeClass('right-panel-active');
                            }, 200);

                            return;
                        } else {
                            $('.mobile-auth-form #formLoginMobile').css('display', 'flex');
                            $('.mobile-auth-form #formRegisterMobile').css('display', 'none');
                            $('.mobile-auth .head-mobile h1').text('Đăng nhập');
                            $('.mobile-auth').css('transform', 'translateX(0)');

                            return;
                        }
                    }, 0);
                }
            })

            $("#btnWithdraw").on("click", function () {
                $('#noticeModal').modal('hide');
            })
        })
    </script>

    <!-- script -->
    <script id="history-template" type="text/x-handlebars-template">
        <tr>
            <td class="text-danger"><b>@{{idCustomer}}</b></td>
            <td class="base-color"><b>@{{txtHistory}}</b></td>
        </tr>
    </script>
    <script id="message-template" type="text/x-handlebars-template">
        <li>
            <div class="comment-item d-flex align-items-start c-mb-16">
                <div class="comment-avatar c-mr-8">
                    <img class="brs-100" src="/assets/frontend/{{theme('')->theme_key}}/image/phu/user_avatar.png" alt="">
                </div>
                <div class="comment-detail">
                    <div class="comment-info c-mb-4">
                        <h6 class="d-inline-block text-primary-color" >Bạn </h6>
                        <span class="c-ml-8 fw-400 fz-12">@{{time}}, Vừa xong</span>
                    </div>
                    <div class="comment-content fw-400 fz-13">
                        @{{messageOutput}}
                    </div>
                    <div class="comment-interact c-mt-12">
                        <span id="likeComment" class="d-inline-flex align-items-center fw-400 fz-12 c-mr-40"><img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/hearts-suit_1.svg" alt=""> Thích</span>
                        <span id="replyComment" class="d-inline-flex align-items-center fw-400 fz-12"><img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/comment_1.svg" alt=""> Trả lời</span>
                    </div>
                </div>
            </div>
        </li>


    </script>
    <script id="message-response-template" type="text/x-handlebars-template">
        <li>
            <div class="comment-item d-flex align-items-start c-mb-16">
                <div class="comment-avatar c-mr-8">
                    <img class="brs-100" src="/assets/frontend/{{theme('')->theme_key}}/image/phu/user_avatar.png" alt="">
                </div>
                <div class="comment-detail">
                    <div class="comment-info c-mb-4">
                        <h6 class="d-inline-block">Khách </h6>
                        <span class="c-ml-8 fw-400 fz-12">@{{time}}, Vừa xong</span>
                    </div>
                    <div class="comment-content fw-400 fz-13">
                        @{{response}}
                    </div>
                    <div class="comment-interact c-mt-12">
                        <span id="likeComment" class="d-inline-flex align-items-center fw-400 fz-12 c-mr-40"><img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/hearts-suit_1.svg" alt=""> Thích</span>
                        <span id="replyComment" class="d-inline-flex align-items-center fw-400 fz-12"><img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/comment_1.svg" alt=""> Trả lời</span>
                    </div>
                </div>
            </div>
        </li>
    </script>

    @switch($position)
        @case('rubywheel')
        <script src="/assets/frontend/{{theme('')->theme_key}}/js/minigame/rubywheel.js?v={{time()}}"></script>
        @break
        @case('flip')
        <style type="text/css">
            .boxflip .active {
                animation: rotation 100ms infinite linear;
            }

            .boxflip .tran {
                opacity: 0 !important;
            }

            @keyframes rotation {
                100% {
                    transform: rotatey(360deg);
                }
            }
        </style>
        <script src="/assets/frontend/{{theme('')->theme_key}}/js/minigame/flip.js?v={{time()}}"></script>
        @foreach($result->group->items as $item)
            <input type="hidden" class="image_gift"
                   value="{{ \App\Library\MediaHelpers::media($item->image) }}">
        @endforeach
        @break
        @case('slotmachine')
        <script src="/assets/frontend/{{theme('')->theme_key}}/js/minigame/slotmachine.js?v={{time()}}"></script>
        <style>
            @php
                $count = 0;
            @endphp

            @foreach($result->group->items as $gift)
                @php
                    $count++;
                @endphp
                .a{{$count}} {
                background-image: url("{{@\App\Library\MediaHelpers::media($gift->image)}}") !important;
            }
            @endforeach

            #slot1, #slot2, #slot3 {
                display: inline-block;
                margin-top: 2px;
                margin-left: 1px;
                margin-right: 45px;
                margin: 0 25px;
                background-size: 100px 79px;
                width: 100px;
                height: 79px;
                padding: 0 28px;
                background-repeat: no-repeat;
            }

            /*  Lap top  */
            @media only screen and (min-width: 992px) and (max-width: 1200px) {
                #slot1, #slot2, #slot3 {
                    background-size: 60px 48px !important;
                    width: 60px !important;
                    margin: 0 28px !important;
                    height: 48px;
                }
            }

            @media only screen and (min-width: 573px) and (max-width: 768px) {
                #slot1, #slot2, #slot3 {
                    background-size: 64px 48px !important;
                    width: 64px !important;
                    margin: 0 22px !important;
                    height: 50px !important;
                }
            }

            @media only screen and (min-width: 376px) and (max-width: 573px) {
                #slot1, #slot2, #slot3 {
                    background-size: 56px 40px !important;
                    width: 48px !important;
                    margin: 0px 9px !important;
                    height: 48px !important;
                }

            }

            @media only screen and (max-width: 376px) {
                #slot1, #slot2, #slot3 {
                    background-size: 56px 40px !important;
                    width: 48px !important;
                    margin: 0px 9px !important;
                    height: 48px !important;
                }
            }
        </style>
        @break
        @case('slotmachine5')
        <script src="/assets/frontend/{{theme('')->theme_key}}/js/minigame/slotmachine5.js?v={{time()}}"></script>
        <style>
            @php
                $count = 0;
            @endphp
            @foreach($result->group->items as $gift)
                @php
                    $count++;
                @endphp
                .a{{$count}} {
                background-image: url("{{@\App\Library\MediaHelpers::media($gift->image)}}") !important;
            }

            @endforeach
            #slot1, #slot2, #slot3, #slot4, #slot5 {
                display: inline-block;
                margin-top: 2px;
                margin-left: 1px;
                margin-right: 45px;
                margin: 0 6px;
                background-size: 100px 93px;
                width: 100px;
                height: 93px;
                background-repeat: no-repeat;
            }

            @media only screen and (min-width: 992px) and (max-width: 1200px) {
                #slot1, #slot2, #slot3, #slot4, #slot5 {
                    background-size: 80px 80px !important;
                    width: 80px !important;
                    height: 80px !important;
                    margin: 0 5px !important;
                }
            }

            @media only screen and (min-width: 573px) and (max-width: 768px) {
                #slot1, #slot2, #slot3, #slot4, #slot5 {
                    background-size: 74px 74px !important;
                    width: 74px !important;
                    height: 74px !important;
                    margin: 0 5.5px !important;
                }
            }

            @media only screen and (min-width: 376px) and (max-width: 573px) {
                #slot1, #slot2, #slot3, #slot4, #slot5 {
                    background-size: 54px 52px !important;
                    width: 54px !important;
                    height: 54px !important;
                    margin: 0 4.3px !important;
                }

            }

            @media only screen and (max-width: 376px) {
                #slot1, #slot2, #slot3, #slot4, #slot5 {
                    background-size: 54px 52px !important;
                    width: 54px !important;
                    height: 54px !important;
                    margin: 0 4.3px !important;
                }
            }
        </style>
        @break
        @case('squarewheel')
        @if(isset($result->group->items) && count($result->group->items)>0)
            <script>
                @foreach($result->group->items as $index=>$item)
                $('.gift' + ({{$index}}+1)).attr('id', "id" +{{$item->item_id}});
                $('.gift' + ({{$index}}+1) + ' img').attr('src', '{{\App\Library\MediaHelpers::media($item->image)}}');
                @endforeach
            </script>
        @endif
        <script src="/assets/frontend/{{theme('')->theme_key}}/js/minigame/squarewheel.js"></script>
        <style>
            .box img.active {
                box-shadow: 0 0 1px #fff, 0 0 2px #fff, 0 0 45px #f00, 0 0 30px #ff0013, 0 0 25px #f10303
            }
        </style>
        @break
        @case('smashwheel')
        @case('rungcay')
        @case('gieoque')
        <script src="/assets/frontend/{{theme('')->theme_key}}/js/minigame/smashwheel.js?v={{time()}}"></script>
        @break
    @endswitch


    <script>
        function getgifbonus() {
            console.log($('#checkPoint').val())
            if ($('#checkPoint').val() != "1") {
                return;
            }
        }
    </script>
@endsection

