<div class="col-12 col-lg-8 c-pr-8 c-px-lg-0">

    <div class="c-px-lg-16 d-block d-lg-none  c-mb-12">
        <div class="rotation-header-mobile d-flex justify-content-between">
            <div class="rotation-header c-pb-8">
                <h3 class="fw-700 fz-18 lh-24">{{$result->group->title}}</h3>
                @if(isset($result->group->params->fake_num_play))
                    <p class="fw-400 fz-13 mb-0">
                        <span id="userCount">{{ str_replace(',','.',number_format($result->group->params->fake_num_play)) }}</span> người đang chơi
                    </p>
                @endif

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
                @if(isset($currentPlayList) && $currentPlayList != '')
                    <div class="rotation-player d-flex align-items-center">
                        <img class="c-mr-4" src="/assets/frontend/{{theme('')->theme_key}}/image/svg/security-user1.svg" alt="">
                        <p class="fw-400 fz-13 mb-0"><span id="userCount">{{ str_replace(',','.',number_format($result->group->params->fake_num_play)) }}</span> người đang chơi</p>
                    </div>
                @endif
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
                            @if($result->group->params->price_sticky_3 > 0)
                            <option value="3">Mua X3/{{$result->group->params->price_sticky_3/1000}}k 1 lần quay</option>
                            @endif
                            @if($result->group->params->price_sticky_5 > 0)
                            <option value="5">Mua X5/{{$result->group->params->price_sticky_5/1000}}k 1 lần quay</option>
                            @endif
                            @if($result->group->params->price_sticky_7 > 0)
                            <option value="7">Mua X7/{{$result->group->params->price_sticky_7/1000}}k 1 lần quay</option>
                            @endif
                            @if($result->group->params->price_sticky_10 > 0)
                            <option value="10">Mua X10/{{$result->group->params->price_sticky_10/1000}}k 1 lần quay</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="row no-gutters d-none d-lg-flex">
                    @if($result->group->params->is_try == 1)

                        <div class="col-12 col-md-6 c-pr-6">
                            @if (!\App\Library\AuthCustom::check())
                                <button class="btn secondary w-100" onclick="openLoginModal();">Chơi thử</button>
                            @else
                                <button id="playerDemo" class="btn secondary w-100 num-play-try">Chơi thử</button>
                            @endif
                        </div>
                    @endif
                    <div class="col-12 col-md-6 c-pl-6">
                        @if (!\App\Library\AuthCustom::check())
                            <button class="btn primary w-100">Quay ngay</button>
                        @else
                            <button id="start-played" class="btn primary w-100 play">Quay ngay</button>
                        @endif
                    </div>
                </div>
                <div class="footer-mobile">

                    <div class="row marginauto">
                        @if($result->group->params->is_try == 1)
                            <div class="col-6 pl-0 c-pr-8">
                                @if (!\App\Library\AuthCustom::check())
                                    <button class="btn secondary w-100" onclick="openLoginModal();">Chơi thử</button>
                                @else
                                    <button class="btn secondary w-100 num-play-try">Chơi thử</button>
                                @endif
                            </div>
                        @endif
                        <div class="col-6 pr-0 c-pl-8">
                            @if (!\App\Library\AuthCustom::check())
                                <button class="btn primary w-100">Quay ngay</button>
                            @else
                                <button id="start-played" class="btn primary w-100 play">Quay ngay</button>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="c-mb-16 c-pl-lg-16 c-pr-lg-16">
        {{--                        @include('frontend.pages.components.description')--}}
    </div>
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
            <div class="leaderboard-buttons c-px-16 c-py-8 row no-gutters" style="border-bottom: none;">
                <div class="col-6 c-pr-5">
                    <a href="javascript:void(0)" class="btn secondary w-100 logsHisMinigameMobile open-sheet" data-target="#sheet-filter-02" >
                        Lịch sử quay
                    </a>
                </div>
                <div class="col-6 c-pl-5">
                    <a class="btn primary w-100" href="/withdrawitem-{{$result->group->params->game_type}}">Rút quà</a>
                </div>
            </div>
        </div>
    </div>
    {{--                    top quay thưởng--}}

    <div class="rotation-comment-block c-px-lg-16">
        <h6 class="d-block d-lg-none fw-700 fz-18 lh-24 c-py-16">Bình luận</h6>
        <div class="rotation-comment chat-history brs-12 c-p-16">
            <h6 class="fw-700 fz-20 lh-28 c-mb-20  d-none d-lg-block">Bình luận</h6>
            <ul class="comment-block list-unstyled chat-scroll c-pr-8">

                <li>
                    <div class="comment-item d-flex align-items-start c-mb-16">
                        <div class="comment-avatar c-mr-8">
                            <img class="brs-100" src="/assets/frontend/{{theme('')->theme_key}}/image/phu/user_avatar.png" alt="">
                        </div>
                        <div class="comment-detail">
                            <div class="comment-info c-mb-4">
                                <h6 class="d-inline-block">Khách</h6>
                                <span class="c-ml-8 fw-400 fz-12">4:30 PM, Vừa xong</span>
                            </div>
                            <div class="comment-content fw-400 fz-13">
                                Cứ tưởng lừa đảo, nạp thử 200k nhận luôn kim cương trong 10s
                            </div>
                            <div class="comment-interact c-mt-12">
                                <span id="likeComment" class="d-inline-flex align-items-center fw-400 fz-12 c-mr-40"><img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/hearts-suit_1.svg" alt=""> Thích</span>
                                <span id="replyComment" class="d-inline-flex align-items-center fw-400 fz-12"><img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/comment_1.svg" alt=""> Trả lời</span>
                            </div>
                        </div>
                    </div>

                </li>
                <li>
                    <div class="comment-item d-flex align-items-start c-mb-16">
                        <div class="comment-avatar c-mr-8">
                            <img class="brs-100" src="/assets/frontend/{{theme('')->theme_key}}/image/phu/user_avatar.png" alt="">
                        </div>
                        <div class="comment-detail">
                            <div class="comment-info c-mb-4">
                                <h6 class="d-inline-block">Khách</h6>
                                <span class="c-ml-8 fw-400 fz-12">4:30 PM, Vừa xong</span>
                            </div>
                            <div class="comment-content fw-400 fz-13">
                                Cứ tưởng lừa đảo, nạp thử 200k nhận luôn kim cương trong 10s
                            </div>
                            <div class="comment-interact c-mt-12">
                                <span id="likeComment" class="d-inline-flex align-items-center fw-400 fz-12 c-mr-40"><img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/hearts-suit_1.svg" alt=""> Thích</span>
                                <span id="replyComment" class="d-inline-flex align-items-center fw-400 fz-12"><img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/comment_1.svg" alt=""> Trả lời</span>
                            </div>
                        </div>
                    </div>

                </li>
                <li>
                    <div class="comment-item d-flex align-items-start c-mb-16">
                        <div class="comment-avatar c-mr-8">
                            <img class="brs-100" src="/assets/frontend/{{theme('')->theme_key}}/image/phu/user_avatar.png" alt="">
                        </div>
                        <div class="comment-detail">
                            <div class="comment-info c-mb-4">
                                <h6 class="d-inline-block">Khách</h6>
                                <span class="c-ml-8 fw-400 fz-12">4:30 PM, Vừa xong</span>
                            </div>
                            <div class="comment-content fw-400 fz-13">
                                Cứ tưởng lừa đảo, nạp thử 200k nhận luôn kim cương trong 10s
                            </div>
                            <div class="comment-interact c-mt-12">
                                <span id="likeComment" class="d-inline-flex align-items-center fw-400 fz-12 c-mr-40"><img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/hearts-suit_1.svg" alt=""> Thích</span>
                                <span id="replyComment" class="d-inline-flex align-items-center fw-400 fz-12"><img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/comment_1.svg" alt=""> Trả lời</span>
                            </div>
                        </div>
                    </div>

                </li>
                <li>
                    <div class="comment-item d-flex align-items-start c-mb-16">
                        <div class="comment-avatar c-mr-8">
                            <img class="brs-100" src="/assets/frontend/{{theme('')->theme_key}}/image/phu/user_avatar.png" alt="">
                        </div>
                        <div class="comment-detail">
                            <div class="comment-info c-mb-4">
                                <h6 class="d-inline-block">Khách</h6>
                                <span class="c-ml-8 fw-400 fz-12">4:30 PM, Vừa xong</span>
                            </div>
                            <div class="comment-content fw-400 fz-13">
                                Hàng sạch, thanks admin
                            </div>
                            <div class="comment-interact c-mt-12">
                                <span id="likeComment" class="d-inline-flex align-items-center fw-400 fz-12 c-mr-40"><img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/hearts-suit_1.svg" alt=""> Thích</span>
                                <span id="replyComment" class="d-inline-flex align-items-center fw-400 fz-12"><img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/comment_1.svg" alt=""> Trả lời</span>
                            </div>
                        </div>
                    </div>

                </li>
                <li>
                    <div class="comment-item d-flex align-items-start c-mb-16">
                        <div class="comment-avatar c-mr-8">
                            <img class="brs-100" src="/assets/frontend/{{theme('')->theme_key}}/image/phu/user_avatar.png" alt="">
                        </div>
                        <div class="comment-detail">
                            <div class="comment-info c-mb-4">
                                <h6 class="d-inline-block">Khách</h6>
                                <span class="c-ml-8 fw-400 fz-12">5:30 PM, Vừa xong</span>
                            </div>
                            <div class="comment-content fw-400 fz-13">
                                Nhanh gọn uy tín, thanks admin
                            </div>
                            <div class="comment-interact c-mt-12">
                                <span id="likeComment" class="d-inline-flex align-items-center fw-400 fz-12 c-mr-40"><img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/hearts-suit_1.svg" alt=""> Thích</span>
                                <span id="replyComment" class="d-inline-flex align-items-center fw-400 fz-12"><img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/comment_1.svg" alt=""> Trả lời</span>
                            </div>
                        </div>
                    </div>

                </li>
                <li>
                    <div class="comment-item d-flex align-items-start c-mb-16">
                        <div class="comment-avatar c-mr-8">
                            <img class="brs-100" src="/assets/frontend/{{theme('')->theme_key}}/image/phu/user_avatar.png" alt="">
                        </div>
                        <div class="comment-detail">
                            <div class="comment-info c-mb-4">
                                <h6 class="d-inline-block">Khách</h6>
                                <span class="c-ml-8 fw-400 fz-12">4:30 PM</span>
                            </div>
                            <div class="comment-content fw-400 fz-13">
                                Cứ tưởng lừa đảo, nạp thử 200k nhận luôn kim cương trong 10s
                            </div>
                            <div class="comment-interact c-mt-12">
                                <span id="likeComment" class="d-inline-flex align-items-center fw-400 fz-12 c-mr-40"><img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/hearts-suit_1.svg" alt=""> Thích</span>
                                <span id="replyComment" class="d-inline-flex align-items-center fw-400 fz-12"><img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/comment_1.svg" alt=""> Trả lời</span>
                            </div>
                        </div>
                    </div>

                </li>
                <li>
                    <div class="comment-item d-flex align-items-start c-mb-16">
                        <div class="comment-avatar c-mr-8">
                            <img class="brs-100" src="/assets/frontend/{{theme('')->theme_key}}/image/phu/user_avatar.png" alt="">
                        </div>
                        <div class="comment-detail">
                            <div class="comment-info c-mb-4">
                                <h6 class="d-inline-block">Khách</h6>
                                <span class="c-ml-8 fw-400 fz-12">6:30 PM</span>
                            </div>
                            <div class="comment-content fw-400 fz-13">
                                Anh em không phải sợ đâu, tôi nạp nhiều web này rồi
                            </div>
                            <div class="comment-interact c-mt-12">
                                <span id="likeComment" class="d-inline-flex align-items-center fw-400 fz-12 c-mr-40"><img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/hearts-suit_1.svg" alt=""> Thích</span>
                                <span id="replyComment" class="d-inline-flex align-items-center fw-400 fz-12"><img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/comment_1.svg" alt=""> Trả lời</span>
                            </div>
                        </div>
                    </div>

                </li>


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
    <div class="rotation-leaderboard c-py-24 c-px-16 brs-12">
        <div class="leaderboard-buttons c-pb-24 c-mb-16 row no-gutters">
            <div class="col-6 c-pr-5">
                <a href="javascript:void(0)" class="btn secondary w-100 logsHisMinigame">
                    Lịch sử quay
                </a>
            </div>
            <div class="col-6 c-pl-5">
                <a  href="/withdrawitem-{{$result->group->params->game_type}}" class="btn primary w-100">Rút quà</a>
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
                <div class="modal-footer">
                    <button class="btn primary"  data-dismiss="modal">Chơi thử</button>
                </div>
            </div>
        </div>
    </div>
</div>

{{--        Modal lịch sử   --}}

<div class="modal fade modal-big modal-logs-minigame" id="minigameLogs">
    <div class="modal-dialog modal-dialog-centered modal-custom">
        <div class="modal-content c-p-24">
            <div class="modal-header">
                <h2 class="modal-title center">Lịch sử trúng thưởng</h2>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>
            <div class="modal-body pl-0 pr-0 c-pt-24 c-pb-24">
                <div class="card--gray">
                    <div class="card--attr justify-content-between d-flex c-mb-16 default-table" id="logs-minigame">
                        <table class="table table-responsive-lg table-striped table-hover table-logs">
                            <thead>
                            <tr class="row marginauto">
                                <th class="fw-500 fz-13 lh-20 text-title text-center col-auto">Giải thưởng</th>
                                <th class="fw-500 fz-13 lh-20 text-title text-right col-auto ml-auto">Thời gian</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($logs))
                                @foreach($logs->log as $item)
                                    <tr class="row marginauto">
                                        <td class="text-left col-auto fw-400 fz-13 lh-20 c-pl-16 c-pt-8 c-pb-8 pr-0">{{$item->item_ref->title}}</td>
                                        <td class="text-right col-auto ml-auto fw-400 fz-13 lh-20 pl-0 c-pt-8 c-pb-8 c-pr-16">{{$item->created_at}}</td>
                                    </tr>
                                @endforeach
                            @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn primary"  href="/withdrawitem-{{$result->group->params->game_type}}">Rút quà</a>



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
                <button class="btn secondary js-reset-form">Thiết lập lại</button>
                <button class="btn primary js-submit-form">Xem kết quả</button>
            </div>
        </form>
    </div>
</div>

{{--     bottom-sheet lịch sử   --}}

<!-- Sheet Filter Mobile -->

<div class="bottom-sheet" id="sheet-filter-02" aria-hidden="true" data-height="50">
    <div class="layer"></div>
    <div class="content-bottom-sheet bar-slide">
        <form action="" class="form-filter">
            <div class="sheet-header">
                <h2 class="text-title center">
                    Lịch sử trúng thưởng
                </h2>
                <label class="close"></label>
            </div>
            <div class="sheet-body overflow-visible">
                <!-- body -->
                <div class="card--gray">
                    <div class="card--attr justify-content-between d-flex c-mb-16 default-table" id="sheet-minigame-his">
                        <table class="table table-striped table-hover table-logs">
                            <thead>
                            <tr class="row marginauto">
                                <th class="fw-500 fz-13 lh-20 text-title text-left col-auto">Giải thưởng</th>
                                <th class="fw-500 fz-13 lh-20 text-title text-right col-auto ml-auto">Thời gian</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($logs))
                                @foreach($logs->log as $item)
                                    <tr class="row marginauto">
                                        <td class="text-left col-auto fw-400 fz-13 lh-20 c-pl-16 c-pt-8 c-pb-8 pr-0">{{$item->item_ref->title}}</td>
                                        <td class="text-right col-auto ml-auto fw-400 fz-13 lh-20 pl-0 c-pt-8 c-pb-8 c-pr-16">{{$item->created_at}}</td>
                                    </tr>
                                @endforeach
                            @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="sheet-footer">
                <a  href="/withdrawitem-{{$result->group->params->game_type}}" class="btn primary js-submit-form">Rút quà</a>
            </div>
        </form>
    </div>
</div>

<input type="hidden" class="started_at" name="started_at" value="{{ $result->group->started_at??0 }}">
<input type="hidden" id="type_play" value="real">
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
                <a class="btn secondary" href="/withdrawitem-{{$result->group->params->game_type}}" >Rút quà</a>
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

<input type="hidden" id="position_input" value="{{ @$position }}">
<input type="hidden" id="group_id" value="{{ @$result->group->id}}">
<input type="hidden" id="image_static" value="{{ @\App\Library\MediaHelpers::media($result->group->params->image_static) }}">
<input type="hidden" id="count_item" value="{{count($result->group->items)}}">
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
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/minigame/rubywheel.js"></script>
    @break
    @case('flip')
    <style type="text/css">
        .boxflip .active {
            animation: rotation 100ms infinite linear;
        }
        .boxflip .tran {
            opacity: 0!important;
        }

        @keyframes rotation {
            100%{ transform:rotatey(360deg); }
        }
    </style>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/minigame/flip.js"></script>
    @foreach($result->group->items as $item)
        <input type="hidden" class="image_gift" value="{{ \App\Library\MediaHelpers::media($item->parrent->image) }}">
    @endforeach
    @break
    @case('slotmachine')
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/minigame/slotmachine.js"></script>
    <style>
        @php
    $count = 0;
@endphp
@foreach($result->group->items as   $gift)
    @php
        $count++;
    @endphp
        .a{{$count}}{background-image: url("{{@\App\Library\MediaHelpers::media($gift->parrent->image)}}") !important;}
        @endforeach
    </style>
    @break
    @case('slotmachine5')
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/minigame/slotmachine5.js"></script>
    <style>
        @php
    $count = 0;
@endphp
@foreach($result->group->items as $gift)
    @php
        $count++;
    @endphp
    .a{{$count}}{background-image: url("{{@\App\Library\MediaHelpers::media($gift->parrent->image)}}") !important;}
        @endforeach

    </style>
    @break
    @case('squarewheel')
    @if(isset($result->group->items) && count($result->group->items)>0)
        <script>
            @foreach($result->group->items as $index=>$item)
            $('.gift'+({{$index}}+1)).attr('id',"id"+{{$item->item_id}});
            $('.gift'+({{$index}}+1)+' img').attr('src','{{\App\Library\MediaHelpers::media($item->parrent->image)}}');
            @endforeach
        </script>
    @endif
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/minigame/squarewheel.js"></script>
    <style>
        .box img.active{box-shadow:0 0 1px #fff, 0 0 2px #fff, 0 0 45px #f00, 0 0 30px #ff0013, 0 0 25px #f10303}
    </style>
    @break
    @case('smashwheel')
    @case('rungcay')
    @case('gieoque')
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/minigame/smashwheel.js"></script>
    @break

@endswitch

<script src="/assets/frontend/{{theme('')->theme_key}}/js/minigame/fake-cmt.js"></script>
<script>

    $('body').on('click','.c_thele',function(e){
        $('#theleModal').modal('show');
    })

    $('body').on('click','.logsHisMinigame',function(e){
        $('.modal-logs-minigame').modal('show');
    })

    if (width < 992){
        /*Step Mobile*/
        $('body').on('click','.js-step',function () {
            let selector = $(this).data('target');
            let elm = $(selector);
            elm.css('transform','translateX(0)');
        })
        $('body').on('click','.close-step',function (e) {
            e.preventDefault();
            let elm = $(this).closest('.step');
            elm.css('transform','translateX(130%)')
        })

        /*Box-shadow*/
        $('.body-mobile').on('scroll',function () {
            $('.head-mobile').toggleClass('box-shadow',!!$(this).scrollTop())
        })
    }
</script>
