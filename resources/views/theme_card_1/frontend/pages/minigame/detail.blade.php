@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head',with(['data'=>$result->group]))
@endsection

@section('styles')

@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.0/handlebars.min.js"></script>
    {{--
        <script src="/assets/frontend/{{theme('')->theme_key}}/js/minigame/main.js"></script>
    --}}
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/minigame-v2/fake-cmt.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/minigame-v2/swiper.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/js_phu/spin.js"></script>

    <script src="/assets/frontend/{{theme('')->theme_key}}/js/js_trong/modal-rut-vp.js?v={{time()}}"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/js_trong/modal-history-spin-bonus.js?v={{time()}}"></script>
@endsection
@section('content')

    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/style_phu/breadcrumb.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/style_phu/spin.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/minigame-v2.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/style_phu/withdraw_items.css">
    @if($position  != 'slotmachine' && $position != 'squarewheel')
        <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/spin.css">
    @endif
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/style_phu/layout_page.css">

    <!-- Modal rút quà -->
    <div class="modal fade" id="modal-withdraw-items" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Rút vật phẩm</h5>
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
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="modal-tab-withdraw" role="tabpanel">
                            <div class="card">
                                <div class="card-body is-loading">
                                    <form action="" id="form-withdraw-item">
                                        @csrf
                                        <div class="t-sub-1 t-color-title">
                                            Chọn vật phẩm bạn đang sở hữu
                                        </div>
                                        <div class="swiper swiper-withdraw">
                                            <div class="swiper-wrapper" id="wrap-game-type"
                                                 data-game_type="{{ @$result->group->params->game_type }}">
                                                <div class="swiper-slide">
                                                    <input type="radio" id="item-radio-0" name="game_type" hidden
                                                           checked>
                                                    <label for="item-radio-0" class="label-item">
                                                        <div class="item-thumb">
                                                            <img src="/assets/frontend/theme_3/image/icon-qh.png"
                                                                 alt="">
                                                        </div>
                                                        <div class="item-info">
                                                            <div class="t-body-1">Liên quân</div>
                                                            <div class="t-sub-1">10.000</div>
                                                            <div class="t-body-1">Quân huy</div>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div class="swiper-slide">
                                                    <input type="radio" id="item-radio-1" name="game_type" hidden>
                                                    <label for="item-radio-1" class="label-item">
                                                        <div class="item-thumb">
                                                            <img src="/assets/frontend/theme_3/image/icon-qh.png"
                                                                 alt="">
                                                        </div>
                                                        <div class="item-info">
                                                            <div class="t-body-1">Liên quân</div>
                                                            <div class="t-sub-1">10.000</div>
                                                            <div class="t-body-1">Quân huy</div>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div class="swiper-slide">
                                                    <input type="radio" id="item-radio-2" name="game_type" hidden>
                                                    <label for="item-radio-2" class="label-item">
                                                        <div class="item-thumb">
                                                            <img src="/assets/frontend/theme_3/image/icon-qh.png"
                                                                 alt="">
                                                        </div>
                                                        <div class="item-info">
                                                            <div class="t-body-1">Liên quân</div>
                                                            <div class="t-sub-1">10.000</div>
                                                            <div class="t-body-1">Quân huy</div>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div class="swiper-slide">
                                                    <input type="radio" id="item-radio-3" name="game_type" hidden>
                                                    <label for="item-radio-3" class="label-item">
                                                        <div class="item-thumb">
                                                            <img src="/assets/frontend/theme_3/image/icon-qh.png"
                                                                 alt="">
                                                        </div>
                                                        <div class="item-info">
                                                            <div class="t-body-1">Liên quân</div>
                                                            <div class="t-sub-1">10.000</div>
                                                            <div class="t-body-1">Quân huy</div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="t-sub-2 t-color-title mb-2">
                                            Chọn vật phẩm bạn đang sở hữu
                                        </div>
                                        <select name="package" id="package" class="wide select-withdraw">
                                            <option value="">Chọn gói</option>
                                        </select>
                                        <div class="user-info">
                                            <div class="input-id-game">
                                                <div class="t-sub-2 t-color-title mb-2">
                                                    Tài khoản trong game
                                                </div>
                                                <input class="input-form w-100" type="text" name="idgame" placeholder="Nhập tài khoản trong game" required="">
                                            </div>
                                            <div class="password-phone">
                                                <div class="t-sub-2 t-color-title mb-2">
                                                    Mật khẩu trong game
                                                </div>
                                                <!--
                                                 <div class="toggle-password">
                                                    <input class="input-form w-100" type="password" name="serial" placeholder="Nhập mật khẩu trong game" required="">
                                                    <span class="eye"></span>
                                                </div>
                                                 -->
                                            </div>
                                        </div>
                                        <div class="form-message"></div>
                                        <button type="submit" class="button-primary">Thực hiện</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="modal-tab-history" role="tabpanel">
                            <div class="row marginauto logs-content p-0">
                                <div class="col-md-12 px-0">
                                    <div class="row marginauto">
                                        <div class="col-12 left-right">
                                            <form class="search-txns">
                                                <div class="row marginauto body-form-search-ct">
                                                    <div class="col-auto left-right">
                                                        <input autocomplete="off" type="text" name="search" class="input-search-log-ct search" placeholder="Nhập từ khóa">
                                                        <img   src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/search.png" alt="">
                                                    </div>
                                                    <div class="col-4 body-form-search-button-ct media-web">
                                                        <button type="submit" class="timkiem-button-ct btn-timkiem" style="position: relative">
                                                            <span class="span-timkiem">Tìm kiếm</span>
                                                            <div class="row justify-content-center loading-data__timkiem"></div>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-auto ml-auto left-right">

                                            <div class="row marginauto justify-content-end nick-findter-row">

                                                <div class="col-auto nick-findter" style="position: relative">
                                                    <ul>
                                                        <li class="li-boloc">Bộ lọc</li>
                                                        <li class="margin-findter">
                                                            <img   src="/assets/frontend/{{theme('')->theme_key}}/image/nick/filter.png" alt="">
                                                            <span class="overlay-find">0</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 px-0" id="table-history-withdraw">

                                </div>
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
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Lịch sử quay thưởng</h5>
                    <button type="button" class="close" data-dismiss="modal"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="history-search">
                        <div class="t-sub-2">
                            Tìm kiếm
                        </div>
                        <div class="row marginauto body-form-search-ct">
                            <div class="col-10 px-0">
                                <input autocomplete="off" type="text" name="search" class="input-search-log-ct search w-100" placeholder="Nhập từ khóa">
                                <img   src="/assets/frontend/theme_3/image/cay-thue/search.png" alt="">
                            </div>
                            <div class="col-2 body-form-search-button-ct media-web">
                                <button type="submit" class="timkiem-button-ct btn-timkiem w-100" style="position: relative">
                                    <span class="span-timkiem">Tìm kiếm</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div id="data-ajax-render" data-id="{{ @$result->group->id }}">

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--         Vong quay vong vong      --}}
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
            <p>{{$result->group->title}}</p>
        </section>
        <section class="rotation-content">
            <div class="row rotation-content-section">
                <div class="col-12 col-lg-7 rotation-col-left">
                    <div class="rotation-detail">
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
                                        <img onerror="imgError(this)"
                                             src="{{\App\Library\MediaHelpers::media($result->group->image_icon)}}"
                                             alt="{{$result->group->title}}">
                                    </div>

                                    <img onerror="imgError(this)" style="width: 100%"

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
                                <div class="rotation-button rotation-button-quanhuy" id="start-played">

                                    <img onerror="imgError(this)"

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
                                    <div class="progress-bar" style="width: {{$result->pointuser<100?$result->pointuser:'100'}}%"></div>
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
                                    @if(isset($result->group->params->is_try))
                                        @if($result->group->params->is_try == 1)
                                            <div class="col-4 button-col">
                                                <button id="playerDemo" class="button-secondary button-demo num-play-try">Chơi thử</button>
                                            </div>
                                        @endif
                                    @endif
                                        <div class="col-8 button-rainbow button-col" style="--bg-color: #ecf0f1">
                                            <button id="start-played" class="button-primary button-play play b_button">Quay
                                                ngay
                                            </button>
                                        </div>
                                </div>
                            </div>
                            {{--                                <div class="b_item button-rainbow" style="--bg-color: #ecf0f1">--}}
                            {{--                                    <button class="b_button">Click Me!--}}
                            {{--                                        <div class="rainbow"></div>--}}
                            {{--                                    </button>--}}
                            {{--                                </div>--}}
                        </div>
                    </div>
                    <div class="service-detail">
                        <h2>Chi tiết dịch vụ</h2>

                        <div class="service-detail-content">
                            @if(isset($result->group->content))
                                {!! $result->group->content !!}
                            @endif
                        </div>
                    </div>
                    <div class="rotation-leaderboard leaderboard-md d-lg-none d-xl-none">
                        <div class="leaderboard-buttons row">
                            <div class="col-12">
                                @if(isset($result->number_item))

                                    <div class="existing-items">
                                        <span class="t-body-1">Bạn đang có:</span>
                                        <div class="number_item">{{ str_replace(',','.',number_format($result->number_item)) }} {{ $result->name_item->image }}</div>
                                    </div>
                                @else
                                    @if(App\Library\AuthCustom::check())
                                        <div class="existing-items">
                                            <span class="t-body-1">Bạn đang có:</span>
                                            <div class="number_item">0 {{ $result->name_item->image }}</div>
                                        </div>
                                    @endif
                                @endif
                            </div>
                            <div class="col-6 leaderboard-col">
                                <a href="{{route('getLog',[$result->group->id])}}" class="the-a-lich-su button-not-bg-ct button-secondary history-spin-button">Lịch sử quay</a>
                            </div>
                            <div class="col-6 leaderboard-col">
                                <button class="button-primary">Rút quà</button>
                            </div>
                        </div>
                        <div class="leaderboard-header">
                            <img onerror="imgError(this)"
                                 src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/top-leaderboard.png"
                                 alt="">
                            <p>Top quay thưởng</p>
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
                                    @endforeach
                                @endif

                            </div>
                            <div class="leaderboard-content leaderboard-2" style="display: none;">
                                @if(isset($top7DayList))
                                    @foreach($top7DayList as $key => $item)
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
                                    @endforeach
                                @endif

                            </div>
                            <div class="leaderboard-content leaderboard-3" style="display: none;">
                                @if(isset($result->group->params->phanthuong))
                                    <div class="leaderboard-item row no-gutters">
                                        <div class="col-12 leaderboard-item-name d-block">
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
                    </div>
                    <div class="rotation-comment chat-history">
                        <h2>Bình luận</h2>
                        <ul class="comment-block list-unstyled chat-scroll">



                        </ul>

                        <div class="commment-input">
                            <div class="comment-user-avatar">
                                <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/user_avatar.png"
                                     alt="">
                            </div>
                            <input name="message-to-send" type="text" class="input-primary" id="message-to-send">
                        </div>
                        <div class="comment-button">
                            <button type="button" class="button-primary btn-send-message pill-button">Bình luận</button>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-5 d-none d-lg-block d-xl-block rotation-col-right">
                    <div class="rotation-leaderboard leaderboard-lg">
                        <div class="leaderboard-buttons row d-none d-lg-flex">
                            <div class="col-12">
                                @if(isset($result->number_item))

                                    <div class="existing-items">
                                        <span class="t-body-1">Bạn đang có:</span>
                                        <div class="number_item">{{ str_replace(',','.',number_format($result->number_item)) }} {{ $result->name_item->image }}</div>
                                    </div>
                                @else
                                    @if(App\Library\AuthCustom::check())
                                        <div class="existing-items">
                                            <span class="t-body-1">Bạn đang có:</span>
                                            <div class="number_item">0 {{ $result->name_item->image }}</div>
                                        </div>
                                    @endif
                                @endif
                            </div>
                            <div class="col-6 leaderboard-col">
                                <button type="button" class="the-a-lich-su button-not-bg-ct button-secondary history-spin-button modal_spin_bonus">Lịch sử quay</button>

                            </div>
                            <div class="col-6 leaderboard-col">
                                <button class="button-primary modal_withdraw_items" type="button" >Rút quà
                                </button>
                            </div>
                        </div>
                        <div class="leaderboard-header">
                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/top-leaderboard.png"
                                 alt="">
                            <p>Top quay thưởng</p>
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
                                    @endforeach
                                @endif

                            </div>
                            <div class="leaderboard-content leaderboard-2" style="display: none;">
                                @if(isset($top7DayList))
                                    @foreach($top7DayList as $key => $item)
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
                                    @endforeach
                                @endif

                            </div>
                            <div class="leaderboard-content leaderboard-3" style="display: none;">
                                @if(isset($result->group->params->phanthuong))
                                    <div class="leaderboard-item row no-gutters">
                                        <div class="col-12 leaderboard-item-name d-block">
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
                    <p class="text-title"><span>Minigame liên quan</span></p>
                    <div class="product-catecory"></div>

                </div>
                <div class="box-product minigame-detail_swiper">
                    <div class="swiper swiper-container swiper-banne swiper-list-item list-minigame swiper-list-item-minigame overflow-hidden" style="background: none;box-shadow: none">
                        <div class=" swiper-wrapper" style="padding-bottom: 16px">
                            @foreach($groups_other as $item)

                                <div class="list-item image swiper-slide">
                                    <a href="/minigame-{{ $item->slug}}">
                                        <img src="{{\App\Library\MediaHelpers::media($item->image)}}"
                                             alt="{{ $item->slug   }}" class="entries_item-img list-item-img">
                                        <div class="card-attr">
                                            <div class="text-title fw-700 text-limit limit-1">
                                                {{ $item->title   }}
                                            </div>
                                            <div class="info-attr">
                                                Đã quay: {{isset($item->params->fake_num_play)?($item->params->fake_num_play+$item->order_gate_count):$item->order_gate_count}}
                                            </div>
                                            <div class="price">
                                                @if(isset($item->params->percent_sale))
                                                    <div class="price-current">{{ str_replace(',','.',number_format($item->price)) }} đ</div>
                                                    <div class="price-old c-mr-8">{{ str_replace(',','.',number_format(($item->params->percent_sale*$item->price)/100 + $item->price)) }} đ</div>
                                                    <div class="discount">{{ $item->params->percent_sale }}%</div>
                                                @else
                                                    <div class="price-current w-100">{{ str_replace(',','.',number_format($item->price)) }} đ</div>
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                    {{--                                    <div class="card">--}}
                                    {{--                                        <div class="card-body c-p-16 c-p-lg-12 scale-thumb">--}}

                                    {{--                                            <a href="/minigame-{{ $item->slug}}">--}}
                                    {{--                                                <div class="card-thumb c-mb-8">--}}
                                    {{--                                                    <img onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="" class="card-thumb-image">--}}
                                    {{--                                                </div>--}}
                                    {{--                                                <div class="card-attr">--}}
                                    {{--                                                    <div class="text-title fw-700 text-limit limit-1" style="text-align: left">--}}
                                    {{--                                                        {{ $item->title   }}--}}
                                    {{--                                                    </div>--}}
                                    {{--                                                    <div class="info-attr">--}}
                                    {{--                                                        Đã quay: {{isset($item->params->fake_num_play)?($item->params->fake_num_play+$item->order_gate_count):$item->order_gate_count}}--}}
                                    {{--                                                    </div>--}}
                                    {{--                                                    <div class="price">--}}
                                    {{--                                                        @if(isset($item->params->percent_sale))--}}
                                    {{--                                                            <div class="price-current w-100">{{ str_replace(',','.',number_format($item->price)) }} đ</div>--}}
                                    {{--                                                            <div class="price-old c-mr-8">{{ str_replace(',','.',number_format(($item->params->percent_sale*$item->price)/100 + $item->price)) }} đ</div>--}}
                                    {{--                                                            <div class="discount">{{ $item->params->percent_sale }}%</div>--}}

                                    {{--                                                        @else--}}
                                    {{--                                                            <div class="price-current w-100">{{ str_replace(',','.',number_format($item->price)) }} đ</div>--}}
                                    {{--                                                        @endif--}}
                                    {{--                                                    </div>--}}
                                    {{--                                                </div>--}}
                                    {{--                                            </a>--}}

                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                </div>

                            @endforeach

                        </div>

                        <div class="navigation swiper-list-prev"></div>
                        <div class="navigation swiper-list-next"></div>

                    </div>

                </div>
            </div>
        @endif
    </div>

    @if(isset($result->group->params->thele))
        @include('frontend.widget.modal.__rotation_rule',with(['thele'=>$result->group->params->thele]))
    @endif

    <input type="hidden" class="started_at" name="started_at" value="{{ $result->group->started_at??0 }}">
    <input type="hidden" id="type_play" value="real">
    <input type="hidden" id="checkPoint" name="checkPoint" value="{{$result->checkPoint}}">

    <div class="modal fade rotation-modal" id="noticeModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered animated" role="document">
            <div class="modal-content">
                <div class="modal-header rotation-modal-header">
                    <p class="modal-title">Chúc mừng bạn đã quay trúng</p>
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
                                                <p>Giải thưởng: <span id="rotationValue" style="font-weight: 600; color: #000000;">100.000 Kim cương</span></p>
                                                <p>Bonus: <span id="rotationBonus" style="font-weight: 600; color: #000000;">100 Kim cương</span></p>
                                                <p>Tổng nhận được: <span id="rotationTotal" style="font-weight: 600; color: #f25922;">100.100 Kim cương</span></p>
                    </div>
                    <div class="rotation-modal-btn row no-gutters">
                        <div class="col-12">

                            @if(App\Library\AuthCustom::check())
                                <a href="javascript:void(0)" class="btn button-secondary modal_withdraw_items">Rút quà</a>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--<div class="modal fade login show default-Modal" id="naptheModal">--}}
    {{--    <div class="modal-dialog modal-md modal-dialog-centered login animated">--}}
    {{--        <!--        <div class="image-login"></div>-->--}}
    {{--        <div class="modal-content">--}}
    {{--            <div class="modal-header modal-header-success-ct">--}}
    {{--                <div class="row marginauto modal-header-success-row-ct text-center">--}}
    {{--                    <div class="col-md-12 text-center" style="position: relative">--}}
    {{--                        <span>Thông báo</span>--}}
    {{--                        <div class="close" data-dismiss="modal" aria-label="Close">--}}
    {{--                            <img class=" img-close-ct close-modal-default"--}}
    {{--                                 src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/close.png" alt="">--}}

    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}

    {{--            <div class="modal-body modal-body-success-ct">--}}
    {{--                <div class="row marginauto justify-content-center">--}}
    {{--                    <div class="col-auto">--}}
    {{--                        <img   src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/reject.png"--}}
    {{--                               alt="">--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="row marginauto modal-body-span-success-ct justify-content-center">--}}
    {{--                    <div class="col-md-12 left-right text-center">--}}
    {{--                        <span style="font-size: 14px">Tài khoản của quý khách hiện không đủ để thanh toán, vui lòng nạp tiền để tiếp tục.</span>--}}
    {{--                    </div>--}}

    {{--                </div>--}}
    {{--                <div class="row marginauto justify-content-center modal-footer-success-ct">--}}
    {{--                    <div class="col-md-6 col-6 modal-footer-success-col-left-ct pr-fix-4 pl-0">--}}
    {{--                        <div class="row marginauto modal-footer-success-row-not-ct">--}}
    {{--                            <div class="col-md-12 left-right">--}}
    {{--                                <a href="javascript:void(0)" class="button-not-bg-ct" data-dismiss="modal"--}}
    {{--                                   style="display: flex;justify-content: center"><span>Đóng</span></a>--}}
    {{--                            </div>--}}

    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="col-md-6 col-6 modal-footer-success-col-left-ct pl-fix-4 pr-0">--}}
    {{--                        <div class="row marginauto modal-footer-success-row-ct">--}}

    {{--                            <div class="col-md-12 left-right">--}}

    {{--                                <a href="javascript:void(0)" class="button-not-bg-ct btn-open-recharge" data-tab="1"--}}
    {{--                                   data-dismiss="modal"--}}
    {{--                                   style="display: flex;justify-content: center"><span>Nạp thêm</span></a>--}}

    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}

    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--</div>--}}

    {{--    <input type="text" value="{{ isset($result->seddingchat)? $result->seddingchat->params_plus : '' }}" class="chatArrayDefault">--}}

    {{--    <input type="text" value="{{ isset($result->seddingchat)? $result->seddingchat->params : '' }}" class="chatArray">--}}

    <input type="hidden" value="{{ json_encode($arrUserName)??'' }}" class="arrUserName">

    <input type="hidden" value="{{ isset($result->seddingchat)? $result->seddingchat->total_item : 12 }}" class="total_item">

    <input type="hidden" value="{{ isset($result->seddingchat)? $result->seddingchat->price : 120 }}" class="max_time">

    <input type="hidden" value="{{ isset($result->seddingchat)? $result->seddingchat->price_old : 30 }}" class="min_time">

    @foreach(config('constants.'.'game_type') as $item => $key)
        <input type="hidden" id="withdrawruby_{{$item}}" value="{{$key}}">
    @endforeach
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <input type="hidden" id="position_input" value="{{ @$position }}">
    <input type="hidden" id="group_id" value="{{ @$result->group->id}}">
    <input type="hidden" id="image_static"
           value="{{ @\App\Library\MediaHelpers::media($result->group->params->image_static) }}">
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

            <div class="comment-item comment-item-own comment-item-user">

                <div class="comment-detail comment-detail-own">
                    <div class="comment-info comment-info-own">

                        <span>@{{time}} , Vừa xong</span>
                        <p>Bạn</p>
                    </div>
                    <div class="comment-content comment-content-own">
                        @{{messageOutput}}
                    </div>
                    <div class="comment-interact comment-interact-own">
                        <span id="likeComment"><img
                                src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/hearts-suit 1.svg" alt=""> Thích</span>
                        <span id="replyComment"><img
                                src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/comment 1.svg" alt=""> Trả lời</span>
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
                        <p>Khách</p>
                        <span>@{{time}}, Vừa xong</span>
                    </div>
                    <div class="comment-content">
                        @{{response}}
                    </div>
                    <div class="comment-interact">
                        <span id="likeComment"><img
                                src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/hearts-suit 1.svg" alt=""> Thích</span>
                        <span id="replyComment"><img
                                src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/comment 1.svg" alt=""> Trả lời</span>
                    </div>
                </div>
            </div>

        </li>
    </script>

    <script type="text/javascript">
        $( document ).ready(function() {

            $('body').on('click', '.modal_withdraw_items', function(e) {

                if (!auth_check) {
                    $('#signin').modal('show');
                    return
                }

                $('#modal-withdraw-items').modal('show');
            })

            $('body').on('click', '.modal_spin_bonus', function(e) {
                if (!auth_check) {
                    $('#signin').modal('show');
                    return
                }

                $('#modal-spin-bonus').modal('show');
            })



            $("#btnWithdraw").on("click", function () {
                $('#noticeModal').modal('hide');
            })
        })
    </script>

    @switch($position)
        @case('rubywheel')
        <script src="/assets/frontend/{{theme('')->theme_key}}/js/minigame-v2/rubywheel.js?v={{time()}}"></script>
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
        <script src="/assets/frontend/{{theme('')->theme_key}}/js/minigame-v2/flip.js?v={{time()}}"></script>
        @foreach($result->group->items as $item)
            <input type="hidden" class="image_gift"
                   value="{{ \App\Library\MediaHelpers::media($item->image) }}">
        @endforeach
        @break
        @case('slotmachine')
        <script src="/assets/frontend/{{theme('')->theme_key}}/js/minigame-v2/slotmachine.js?v={{time()}}"></script>
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
        <script src="/assets/frontend/{{theme('')->theme_key}}/js/minigame-v2/slotmachine5.js?v={{time()}}"></script>
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
        <script src="/assets/frontend/{{theme('')->theme_key}}/js/minigame-v2/squarewheel.js"></script>
        <style>
            .box img.active {
                box-shadow: 0 0 1px #fff, 0 0 2px #fff, 0 0 45px #f00, 0 0 30px #ff0013, 0 0 25px #f10303
            }
        </style>
        @break
        @case('smashwheel')
        @case('rungcay')
        @case('gieoque')
        <script src="/assets/frontend/{{theme('')->theme_key}}/js/minigame-v2/smashwheel.js?v={{time()}}"></script>
        @break
    @endswitch
@endsection


