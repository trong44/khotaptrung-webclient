<div class="rotation-header">
    <div class="d-flex align-items-center rotation-header-block">
        <h1>{{$result->group->title}}</h1>
        @if(isset($result->group->params->thele))
            <button class="button-secondary" id="gamRuleButton">Thể lệ</button>
        @endif
    </div>
    @if(isset($result->group->params->fake_num_play))
        <div class="d-flex align-items-center">
            <img onerror="imgError(this)"
                 src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/security-user 1.svg"
                 alt="">
            <p><span id="userCount">
                {{ str_replace(',','.',number_format($result->group->params->fake_num_play)) }}</span>
                người đang chơi
            </p>
        </div>
    @endif
</div>
@if(isset($currentPlayList) && $currentPlayList != '')
    <div class="rotation-notify">
        <img onerror="imgError(this)"
             src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/sound.svg" alt="">
        <marquee class="rotation-marquee">
            <div class="rotation-marquee-item">
                {!! $currentPlayList !!}
            </div>
        </marquee>
    </div>
@endif
<div class="rotation-sale d-block d-lg-none">
    <div class="rotation-sale-header">
        <p><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/flash_img.png"
                alt=""> Flash sale</p>
        <div class="rotation-sale-time">
                    <span><img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/clock.svg"
                               alt=""> Kết thúc trong</span>
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
                    {{ str_replace(',','.',number_format(($result->group->params->percent_sale*$result->group->price)/100 + $result->group->price)) }}
                    đ
                @endif
            </span>
            <span id="rotationSalePrice">{{ str_replace(',','.',number_format($result->group->price)) }} đ</span>

            @if(isset($result->group->params->percent_sale))
                <span
                    id="rotationSaleRatio">Giảm {{ $result->group->params->percent_sale }}%</span>
            @endif
        </p>
    </div>
</div>
@switch($position)
    @case('rubywheel')
    <div class="rotation">
        <div class="item_spin ">
            <div class="rotation-button ani-zoom " {{ \App\Library\AuthCustom::check() ?  'id=start-played' : 'onclick=openLoginModal();'}} >
                <img onerror="imgError(this)" class="lazy"
                     src="{{\App\Library\MediaHelpers::media($result->group->image_icon)}}"
                     alt="{{$result->group->title}}">
            </div>

            <img onerror="imgError(this)" style="width: 100%" class="lazy"
                 src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}"
                 alt="{{$result->group->title}}" id="rotate-play">
        </div>
    </div>
    @break
    @case('flip')
    <div class="rotation">
        <div class="row boxflip">
            @for ($i = 0; $i < count($result->group->items); $i++)
                <div class='flipimg col-4 col-sm-4 col-lg-4 flip-box'>
                    <div data-inner=" inner{{$i}}" class="item_flip_inner">
                        <img onerror="imgError(this)" class="imgnen"
                             src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}">
                        <img onerror="imgError(this)" data-inner="inner{{$i}}"
                             class="flip-box-front inner{{$i}} item_flip_inner_image"
                             src="{{ \App\Library\MediaHelpers::media($result->group->params->image_static) }}">
                    </div>
                </div>
            @endfor
        </div>
        <div class="row" id="boxfliphide" style="display: none;">
            @for ($i = 0; $i < count($result->group->items); $i++)
                <div class='flipimg col-4 col-sm-4 col-lg-4 flip-box'>
                    <div data-inner=" inner{{$i}}" class="item_flip_inner">
                        <img onerror="imgError(this)" class="imgnen"
                             src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}">
                        <img onerror="imgError(this)" data-inner="inner{{$i}}"
                             class="flip-box-front img_remove inner{{$i}} item_flip_inner_image"
                             src="{{ \App\Library\MediaHelpers::media($result->group->params->image_static) }}">
                    </div>
                </div>
            @endfor
        </div>
    </div>
    @break
    @case('slotmachine')
    <div class="rotation">
        <div class="item_slot item_slot-ba-qua"
             style="background: url({{\App\Library\MediaHelpers::media($result->group->params->image_background)}});background-repeat: no-repeat">
            <div class="item_slot_inner">
                <div id="slot1" class="item_slot_inner_img a1" style=""></div>
                <div id="slot2" class="item_slot_inner_img a1" style=""></div>
                <div id="slot3" class="item_slot_inner_img a1" style=""></div>
            </div>
        </div>
    </div>
    @break
    @case('slotmachine5')

    <div class="rotation">
        <div class="item_play_spin_five_record"
             style="background-image: url({{\App\Library\MediaHelpers::media($result->group->params->image_background)}})">
            <div class="item_five_record_inner">
                <div id="slot1" class="item_five_record_inner_img a1" style=""></div>
                <div id="slot2" class="item_five_record_inner_img a1" style=""></div>
                <div id="slot3" class="item_five_record_inner_img a1" style=""></div>
                <div id="slot4" class="item_five_record_inner_img a1" style=""></div>
                <div id="slot5" class="item_five_record_inner_img a1" style=""></div>
            </div>
        </div>
    </div>
    @break
    @case('squarewheel')



    <div class="item_square" style="display: flex; flex-wrap: wrap;">

        <table id="squaredesktop" class="square">
            <tr>
                <td></td>
                <td>
                    <div data-num="1" class="gift1 box"><img onerror="imgError(this)"
                                                             src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}"/>
                    </div>
                </td>
                <td>
                    <div data-num="2" class="gift2 box"><img onerror="imgError(this)"
                                                             src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}"/>
                    </div>
                </td>
                <td>
                    <div data-num="3" class="gift3 box"><img onerror="imgError(this)"
                                                             src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}"/>
                    </div>
                </td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <div data-num="12" class="gift12 box"><img onerror="imgError(this)"
                                                               src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}"/>
                    </div>
                </td>
                <td colspan="3"></td>
                <td>
                    <div data-num="4" class="gift4 box"><img onerror="imgError(this)"
                                                             src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}"/>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div data-num="11" class="gift11 box"><img onerror="imgError(this)"
                                                               src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}"/>
                    </div>
                </td>
                <td colspan="3">
                    <div class="outer-btn text-center">
                        <div class="play btn m-btn m-btn--custom m-btn--icon m-btn--pill"
                             style="" {{ \App\Library\AuthCustom::check() ?  'id=start-played' : 'onclick=openLoginModal();'}}>
                            <img onerror="imgError(this)"
                                 src="{{\App\Library\MediaHelpers::media($result->group->image_icon)}}"
                                 alt="" style="">
                        </div>
                    </div>
                </td>
                <td>
                    <div data-num="5" class="gift5 box"><img onerror="imgError(this)"
                                                             src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}"/>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div data-num="10" class="gift10 box"><img onerror="imgError(this)"
                                                               src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}"/>
                    </div>
                </td>
                <td colspan="3"></td>
                <td>
                    <div data-num="6" class="gift6 box"><img onerror="imgError(this)"
                                                             src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}"/>
                    </div>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <div data-num="9" class="gift9 box"><img onerror="imgError(this)"
                                                             src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}"/>
                    </div>
                </td>
                <td>
                    <div data-num="8" class="gift8 box"><img onerror="imgError(this)"
                                                             src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}"/>
                    </div>
                </td>
                <td>
                    <div data-num="7" class="gift7 box"><img onerror="imgError(this)"
                                                             src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}"/>
                    </div>
                </td>
                <td></td>
            </tr>
        </table>


    </div>
    @break
    @case('smashwheel')
    @case('rungcay')
    @case('gieoque')

    <div class="rotation">
        <div class="rotation-button rotation-button-quanhuy" {{ \App\Library\AuthCustom::check() ?  'id=start-played' : 'onclick=openLoginModal();'}}>
            <img onerror="imgError(this)" class="lazy"
                 src="{{\App\Library\MediaHelpers::media($result->group->image_icon)}}" alt="">
        </div>
        <img src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}"
             id="lac_lixi"
             style="width: 100%;max-width: 100%;opacity: 1;background: url({{\App\Library\MediaHelpers::media($result->group->params->image_background)}}) no-repeat center center;background-size: contain;"
             alt="">
        <input type="hidden" onerror="imgError(this)"
               value="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}"
               id="hdImageLD">
        <input type="hidden" onerror="imgError(this)"
               value="{{\App\Library\MediaHelpers::media($result->group->params->image_animation)}}"
               id="hdImageDapLu">
    </div>
    @break
@endswitch
<div class="pyro">
    <div class="before"></div>
    <div class="after"></div>
</div>
@if($result->checkPoint==1)
    <div class="rotation-points">
        <div class="rotation-points-title">
            <img
                src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/mdi_police-badge.svg"
                alt="">
            <p>Hũ điểm</p>
            <div class="info-rotation">
                <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/info.svg"
                     alt="">
                <div class="rotation-tooltip">
                    <p>Mỗi lượt quay sẽ được cộng 10 point.</p>
                    <p>Tích luỹ đủ số point để nhận thêm lượt quay</p>
                </div>
            </div>
        </div>
        <div class="progress-wrapper">
            <div class="progress-bar"
                 style="width: {{$result->pointuser<100?$result->pointuser:'100'}}%"></div>
            <span class="progress-tooltip">Điểm của bạn: {{$result->pointuser<100?$result->pointuser:'100'}}/100</span>
        </div>
    </div>
@endif
<div class="rotation-inputs row">
    @if($result->checkVoucher==1)
        <div class="col-12 col-lg-6 item_spin_sale-off rotation-col">
            <input class="input-primary" type="text" placeholder="Nhập mã giảm giá">
        </div>
    @endif
    <div class="col-12 col-lg-6 rotation-col">
        <select class="rotation-inputs-select select-primary" name="type" id="numrolllop">
            <option value="1">Mua X1/{{$result->group->price/1000}}k 1 lần quay</option>
            @if($result->group->params->price_sticky_3 > 0))
            <option value="3">Mua X3/{{$result->group->params->price_sticky_3/1000}}k 1 lần
                quay
            </option>
            @endif
            @if($result->group->params->price_sticky_5 > 0))
            <option value="5">Mua X5/{{$result->group->params->price_sticky_5/1000}}k 1 lần
                quay
            </option>
            @endif
            @if($result->group->params->price_sticky_7 > 0))
            <option value="7">Mua X7/{{$result->group->params->price_sticky_7/1000}}k 1 lần
                quay
            </option>
            @endif
            @if($result->group->params->price_sticky_10 > 0))
            <option value="10">Mua X10/{{$result->group->params->price_sticky_10/1000}}k 1 lần
                quay
            </option>
            @endif
        </select>
    </div>
</div>
<div class="rotation-buttons row">
    <div class="col-12 col-lg-6 rotation-col">
        <div class="rotation-sale-secondary d-none d-lg-flex">
            <div class="first-sale-price">
                @if(isset($result->group->params->percent_sale))
                    {{ str_replace(',','.',number_format(($result->group->params->percent_sale*$result->group->price)/100 + $result->group->price)) }}đ
                @endif
            </div>
            <div class="second-sale-price">
                {{ str_replace(',','.',number_format($result->group->price)) }}đ
            </div>
            @if(isset($result->group->params->percent_sale))
                <div class="third-sale-price">
                    <span>Giảm {{ $result->group->params->percent_sale }}%</span>
                </div>
            @endif
        </div>
    </div>
    <div class="col-12 col-lg-6 rotation-col">
        <div class="row">
            @if($result->group->params->is_try == 1)
                @if (App\Library\AuthCustom::check())
                <div class="col-6 button-col">
                    <button id="playerDemo" class="button-secondary button-demo num-play-try">Chơi thử
                    </button>
                </div>
                @else
                    <div class="col-6 button-col">
                        <button type="button" onclick="openLoginModal();" class="button-secondary button-demo">Chơi thử
                        </button>
                    </div>
                @endif
            @endif
            @if (App\Library\AuthCustom::check())
                <div class="col-6 button-rainbow button-col" style="--bg-color: #ecf0f1">
                    <button id="start-played" class="button-primary button-play play b_button">Quay
                        ngay
                    </button>
                </div>
            @else
                <div class="col-6 button-rainbow button-col" style="--bg-color: #ecf0f1">
                    <button type="button" class="button-primary button-play b_button"
                            onclick="openLoginModal();">Quay ngay
                    </button>
                </div>
            @endif
        </div>
    </div>
    {{--                                <div class="b_item button-rainbow" style="--bg-color: #ecf0f1">--}}
    {{--                                    <button class="b_button">Click Me!--}}
    {{--                                        <div class="rainbow"></div>--}}
    {{--                                    </button>--}}
    {{--                                </div>--}}
</div>


<input type="hidden" class="started_at" name="started_at" value="{{ $result->group->started_at??0 }}">
<input type="hidden" id="position_input" value="{{ @$position }}">
<input type="hidden" id="count_item" value="{{count($result->group->items)}}">
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
            opacity: 0 !important;
        }

        @keyframes rotation {
            100% {
                transform: rotatey(360deg);
            }
        }
    </style>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/minigame/flip.js"></script>
    @foreach($result->group->items as $item)
        <input type="hidden" class="image_gift"
               value="{{ \App\Library\MediaHelpers::media($item->parrent->image) }}">
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
    .a{{$count}} {
            background-image: url("{{@\App\Library\MediaHelpers::media($gift->parrent->image)}}") !important;
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
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/minigame/slotmachine5.js"></script>
    <style>
        @php
    $count = 0;
@endphp
@foreach($result->group->items as $gift)
    @php
        $count++;
    @endphp
    .a{{$count}} {
            background-image: url("{{@\App\Library\MediaHelpers::media($gift->parrent->image)}}") !important;
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
            $('.gift' + ({{$index}}+1) + ' img').attr('src', '{{\App\Library\MediaHelpers::media($item->parrent->image)}}');
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
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/minigame/smashwheel.js"></script>
    @break
@endswitch
