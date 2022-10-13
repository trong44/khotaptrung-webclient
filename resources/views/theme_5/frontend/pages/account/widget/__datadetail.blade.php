@if(isset($data))
    @if($data->status == 1)

        <section class="acc-detail data-account-detail">
            <div class="section-content row">
                <div class="col-12 col-lg-7 c-pr-8 c-pr-lg-15">
                    <div class="card account-thumb">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-thumb" role="tabpanel">
                                <div class="card-body c-p-16 c-p-lg-0 mx-n3 mx-lg-0 d-flex">
                                    <div class="swiper gallery-top d-none d-lg-block">
                                        <div class="swiper-wrapper">
                                            @foreach(explode('|',$data->image_extension) as $val)
    
                                                <div class="swiper-slide">
                                                    <div class="gallery-photo" >
                                                        <img class="lazy" onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($val)}}" alt="mua-nick" >
                                                    </div>
                                                </div>
    
                                            @endforeach
    
    
                                        </div>
                                    </div>
    
                                    <div class="swiper gallery-thumbs c-ml-16 c-ml-lg-0">
                                        <div class="swiper-wrapper">
                                            @foreach(explode('|',$data->image_extension) as $val)
                                            <div class="swiper-slide">
                                                <div class="gallery-photo d-none d-lg-block" data-target="#accDetail" data-toggle="modal" data-backdrop="static" data-keyboard="false">
                                                    <img class="lazy" onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($val)}}" alt="mua-nick" >
                                                </div>
    
                                                <div class="gallery-photo d-lg-none" data-fancybox="galleryNickDetail" href="{{\App\Library\MediaHelpers::media($val)}}">
                                                    <img class="lazy" onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($val)}}" alt="mua-nick" >
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-video" role="tabpanel">
                                Coming soon...
                            </div>
                        </div>
                        <div class="nav-controller c-px-lg-0 c-my-lg-12">
                            <div class="swiper-pagination d-none d-lg-flex">
                                <div class="navigation slider-prev v2 c-mr-8"></div>
                                <div class="navigation slider-next v2"></div>
                            </div>
                            <ul class="nav nav-tabs size-auto" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="tab-show-acc active count-thumb" data-toggle="tab" href="#tab-thumb" role="tab"
                                       aria-selected="true"></a>
                                </li>
                                <li class="c-mx-4"></li>
                                <li class="nav-item" role="presentation">
                                    <a class="tab-show-acc video" data-toggle="tab" href="#tab-video" role="tab"
                                       aria-selected="false">Video</a>
                                </li>
                            </ul>
                        </div>
    
                        @if(isset($card_percent))
                            @if($card_percent == 0)
                                <div class="group-btn d-flex d-lg-none" style="--data-between: 12px">
                                    <a href="javascript:void(0);" class="handle-recharge-modal btn pink two-line" data-tab="1">
                                        <span class="line-1" style="white-space: nowrap;">Mua bằng Thẻ cào</span>
                                        <span class="line-2">{{ str_replace(',','.',number_format(round($data->price))) }} đ</span>
                                    </a>
                                    @if(isset($data->price_atm))
                                        <a href="javascript:void(0);" class="handle-recharge-modal btn pink two-line" data-tab="2">
                                            <span class="line-1" style="white-space: nowrap;">Mua bằng ATM, Momo</span>
                                            <span class="line-2">{{ str_replace(',','.',number_format(round($data->price_atm))) }} đ</span>
                                        </a>
                                    @endif
                                </div>
                            @else
                                @if(isset($data->price_atm))
                                    <div class="group-btn d-flex d-lg-none" style="--data-between: 12px">
                                        <a href="javascript:void(0);" class="handle-recharge-modal btn pink two-line" data-tab="2">
                                            <span class="line-1" style="white-space: nowrap;">Mua bằng ATM, Momo</span>
                                            <span class="line-2">{{ str_replace(',','.',number_format(round($data->price_atm))) }} đ</span>
                                        </a>
                                    </div>
                                @endif
                            @endif
                        @else
                            <div class="group-btn d-flex d-lg-none" style="--data-between: 12px">
                                <a href="javascript:void(0);" class="handle-recharge-modal btn pink two-line" data-tab="1">
                                    <span class="line-1" style="white-space: nowrap;">Mua bằng Thẻ cào</span>
                                    <span class="line-2">{{ str_replace(',','.',number_format(round($data->price))) }} đ</span>
                                </a>
                                @if(isset($data->price_atm))
                                    <a href="javascript:void(0);" class="handle-recharge-modal btn pink two-line" data-tab="2">
                                        <span class="line-1" style="white-space: nowrap;">Mua bằng ATM, Momo</span>
                                        <span class="line-2">{{ str_replace(',','.',number_format(round($data->price_atm))) }} đ</span>
                                    </a>
                                @endif
                            </div>
                        @endif

                        <div class="d-block d-lg-none c-pt-28 c-pb-16">
                            <hr>
                        </div>

                        <div class="text-title c-py-8 d-block d-lg-none">
                            Thông tin acc
                        </div>

                        <table class="table-acc-info c-mb-24 d-table d-lg-none">
                            @if(isset($game_auto_props) && count($game_auto_props))
                                @php
                                    $total_tuong = 0;
                                    $total_bieucam = 0;
                                    $total_chuongluc = 0;
                                    $total_sandau = 0;
                                    $total_linhthu = 0;
                                    $total_trangphuc = 0;
                                    $total_thongtinchung = 0;

                                    if(isset($game_auto_props) && count($game_auto_props)){
                                        foreach($game_auto_props as $game_auto_prop){
                                            if($game_auto_prop->key == 'champions'){
                                                $total_tuong = $total_tuong + 1;
                                                if(isset($game_auto_prop->childs) && count($game_auto_prop->childs)){
                                                    foreach($game_auto_prop->childs as $c_child){
                                                        $total_trangphuc = $total_trangphuc + 1;
                                                    }
                                                }
                                            }elseif ($game_auto_prop->key == 'emotes'){
                                                $total_bieucam = $total_bieucam + 1;
                                            }elseif ($game_auto_prop->key == 'tftdamageskins'){
                                                $total_chuongluc = $total_chuongluc + 1;
                                            }elseif ($game_auto_prop->key == 'tftmapskins'){
                                                $total_sandau = $total_sandau + 1;
                                            }elseif ($game_auto_prop->key == 'tftcompanions'){
                                                $total_linhthu = $total_linhthu + 1;
                                            }
                                        }
                                    }
                                @endphp
                                <tr>
                                    <td><span class="link-color">Tướng</span></td>
                                    <td><span>{{ $total_tuong }}</span></td>
                                    <td><a href="javascript:void(0)" class="link blue eye btn-show-tuong show-modal-champ">Xem</a></td>
                                </tr>
                                <tr>
                                    <td><span class="link-color">Trang phục</span></td>
                                    <td><span>{{ $total_trangphuc }}</span></td>
                                    <td><a href="javascript:void(0)" class="link blue eye btn-show-tuong show-modal-skin">Xem</a></td>
                                </tr>
                                <tr>
                                    <td><span class="link-color">Linh thú TFT</span></td>
                                    <td><span>{{ $total_linhthu }}</span></td>
                                    <td><a href="javascript:void(0)" class="link blue eye btn-show-tuong show-modal-animal">Xem</a></td>
                                </tr>

                                @if(isset($data->params))
                                    @if(isset($data->params->rank_info) && count($data->params->rank_info))

                                        @foreach($data->params->rank_info as $key_rank => $rank_info)
                                            @if($rank_info->queueType == "RANKED_TFT")
                                                <tr>
                                                    <td><span class="link-color">RANKED TFT</span></td>
                                                    <td><span>@if($rank_info->tier == "NONE")
                                                                {{ $rank_info->tier }}
                                                            @else
                                                                {{ config('module.acc.auto_lm_rank.'.$rank_info->tier ) }} - {{ $rank_info->division }}
                                                            @endif</span></td>
                                                    <td></td>
                                                </tr>
                                            @elseif($rank_info->queueType == "RANKED_SOLO_5x5")

                                                <tr>
                                                    <td><span class="link-color">RANKED SOLO</span></td>
                                                    <td><span>
                                                        @if($rank_info->tier == "NONE")
                                                                {{ $rank_info->tier }}
                                                            @else
                                                                {{ config('module.acc.auto_lm_rank.'.$rank_info->tier ) }} - {{ $rank_info->division }}
                                                            @endif
                                                        </span>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            @endif
                                        @endforeach

                                    @endif
                                @endif
                            @else
                            @endif
                            
                            @if(isset($data->groups))
                                <?php $att_values = $data->groups ?>
                                @foreach($att_values as $att_value)
                                    @if(isset($att_value->module) && $att_value->module == 'acc_label' && $att_value->is_slug_override == null)
                                        @if(isset($att_value->parent))
                                            <tr>
                                                <td>
                                                    <span class="link-color">
                                                        {{ $att_value->parent->title??null }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span>
                                                        {{ $att_value->title??null }}
                                                    </span>
                                                </td>
                                                {{--                                                    <td>--}}
                                                {{--                                                        <a href="javascript:void(0)" class="link blue eye btn-show-tuong">Xem</a>--}}
                                                {{--                                                    </td>--}}
                                            </tr>

                                        @endif
                                    @endif
                                @endforeach

                            @endif

                            @if(isset($data->params) && isset($data->params->ext_info))
                                <?php $params = json_decode(json_encode($data->params->ext_info),true) ?>
                                @if(!is_null($dataAttribute) && count($dataAttribute)>0)
                                    @foreach($dataAttribute as $index=>$att)
                                        @if($att->position == 'text')
                                            @if(isset($att->childs))
                                                @foreach($att->childs as $child)
                                                    @foreach($params as $key => $param)
                                                        @if($key == $child->id && $child->is_slug_override == null)
                                                            <tr>
                                                                <td>
                                                                    <span class="link-color">
                                                                        {{ $child->title??'' }}
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <span>
                                                                        {{ $param }}
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            @endif
                                        @endif
                                    @endforeach
                                @endif
                            @endif

                        </table>
                    </div>
                    @if ($data->description || !empty($data->description))
                        <div class="account-desc c-mt-16 detailViewBlock">
                            <h2 class="text-title-bold d-block d-lg-none c-mb-8">Chi tiết dịch vụ</h2>
                            <div class="card overflow-hidden">
                                <div class="card-body c-px-16">
                                    <h2 class="text-title-bold d-none d-lg-block c-mb-24 detailViewBlockTitle">Chi tiết dịch vụ</h2>
                                    @if(substr($data->description, 1200))
                                        <div class="content-desc hide detailViewBlockContent">
                                    @else
                                    <div class="content-desc detailViewBlockContent">
                                    @endif
                                        {!! $data->description !!}
                                    </div>
                                </div>
                                @if(substr($data->description, 1200))
                                    <div class="card-footer text-center">
                                        <span class="see-more open-sheet" data-content="Xem thêm nội dung" data-target="#sheet-view-more"></span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>

                <div class="col-12 col-lg-5 c-pl-8 c-pl-lg-15">
                    <div class="card account-detail-info js_sticky" data-top="140">
                        <div class="card-body c-p-16 mx-n3 mx-lg-0">
                            <div class="section-title title-color fz-lg-18 lh-lg-24">{{ isset($data->category->custom->title) ? $data->category->custom->title :  $data->category->title }}</div>
                            <div class="text-title fw-700 c-mb-6 d-none d-lg-block">Mã số: #{{ $data->randId }}</div>
                            <span class="d-block d-lg-none link-color c-mb-8">
                                Mã số: {{ $data->randId }}
                            </span>
                            <hr>
                            <div class="d-block d-lg-none c-pb-12"></div>
    
                            <div class="text-title c-py-8 d-none d-lg-block">
                                Thông tin acc
                            </div>
    
                            <table class="table-acc-info c-mb-24 d-none d-lg-table">
                                @if(isset($game_auto_props) && count($game_auto_props))
                                    <tr>
                                        <td><span class="link-color">Tướng</span></td>
                                        <td><span>{{ $total_tuong }}</span></td>
                                        <td><a href="javascript:void(0)" class="link blue eye btn-show-tuong show-modal-champ">Xem</a></td>
                                    </tr>
                                    <tr>
                                        <td><span class="link-color">Trang phục</span></td>
                                        <td><span>{{ $total_trangphuc }}</span></td>
                                        <td><a href="javascript:void(0)" class="link blue eye btn-show-tuong show-modal-skin">Xem</a></td>
                                    </tr>
                                    <tr>
                                        <td><span class="link-color">Linh thú TFT</span></td>
                                        <td><span>{{ $total_linhthu }}</span></td>
                                        <td><a href="javascript:void(0)" class="link blue eye btn-show-tuong show-modal-animal">Xem</a></td>
                                    </tr>
    
                                    @if(isset($data->params))
                                        @if(isset($data->params->rank_info) && count($data->params->rank_info))
    
                                            @foreach($data->params->rank_info as $key_rank => $rank_info)
                                                @if($rank_info->queueType == "RANKED_TFT")
                                                    <tr>
                                                        <td><span class="link-color">RANKED TFT</span></td>
                                                        <td><span>@if($rank_info->tier == "NONE")
                                                                    {{ $rank_info->tier }}
                                                                @else
                                                                    {{ config('module.acc.auto_lm_rank.'.$rank_info->tier ) }} - {{ $rank_info->division }}
                                                                @endif</span></td>
                                                        <td></td>
                                                    </tr>
                                                @elseif($rank_info->queueType == "RANKED_SOLO_5x5")
    
                                                    <tr>
                                                        <td><span class="link-color">RANKED SOLO</span></td>
                                                        <td><span>
                                                        @if($rank_info->tier == "NONE")
                                                                    {{ $rank_info->tier }}
                                                                @else
                                                                    {{ config('module.acc.auto_lm_rank.'.$rank_info->tier ) }} - {{ $rank_info->division }}
                                                                @endif
                                                        </span>
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                @endif
                                            @endforeach
    
                                        @endif
                                    @endif
                                @else
                                @endif

                                @if(isset($data->groups))
                                    <?php $att_values = $data->groups ?>
                                    @foreach($att_values as $att_value)
                                        @if(isset($att_value->module) && $att_value->module == 'acc_label' && $att_value->is_slug_override == null)
                                            @if(isset($att_value->parent))
                                                    <tr>
                                                        <td>
                                                            <span class="link-color">
                                                                {{ $att_value->parent->title??null }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span>
                                                                {{ $att_value->title??null }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                            @endif
                                        @endif
                                    @endforeach
                                @endif
    
                                @if(isset($data->params) && isset($data->params->ext_info))
                                    <?php $params = json_decode(json_encode($data->params->ext_info),true) ?>
                                    @if(!is_null($dataAttribute) && count($dataAttribute)>0)
                                        @foreach($dataAttribute as $index=>$att)
                                            @if($att->position == 'text')
                                                @if(isset($att->childs))
                                                    @foreach($att->childs as $child)
                                                        @foreach($params as $key => $param)
                                                            @if($key == $child->id && $child->is_slug_override == null)
                                                                <tr>
                                                                    <td>
                                                                <span class="link-color">
                                                                    {{ $child->title??'' }}
                                                                </span>
                                                                    </td>
                                                                    <td>
                                                                <span>
                                                                    {{ $param }}
                                                                </span>
                                                                    </td>
                                                                    {{--                                                    <td>--}}
                                                                    {{--                                                        <a href="javascript:void(0)" class="link blue eye btn-show-tuong">Xem</a>--}}
                                                                    {{--                                                    </td>--}}
                                                                </tr>
    
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                @endif
                                            @endif
                                        @endforeach
                                    @endif
                                @endif
    
                            </table>
                            @php
                                if (isset($data->price_old)) {
                                    $sale_percent = (($data->price_old - $data->price) / $data->price_old) * 100;
                                    $sale_percent = round($sale_percent, 0, PHP_ROUND_HALF_UP);
                                } else {
                                    $sale_percent = 0;
                                }
                            @endphp
                            <div class="card disabled-color">
                                <div class="card-body text-center c-p-0">
                                    <div class="price-acc">
                                        @if ($sale_percent > 0)
                                            <div class="price-old fz-lg-12 lh-lg-16">
                                                {{ str_replace(',','.',number_format($data->price_old)) }}đ
                                            </div>
                                        @endif
                                        <div class="price-current fz-lg-20 lh-lg-28 c-mx-8">
                                            {{ str_replace(',','.',number_format($data->price)) }}đ
                                        </div>
                                        @if ($sale_percent > 0)
                                            <div class="discount">
                                                -{{ $sale_percent }}%
                                            </div>
                                        @endif
                                    </div>
                                    <span>
                                        Rẻ vô đối, giá tốt nhất thị trường
                                    </span>
                                </div>
                            </div>
                            <div class="c-py-24 d-none d-lg-block">
                                <hr>
                            </div>
                            <div class="group-btn c-mb-16 d-none d-lg-flex " style="--data-between: 12px">
                                <button class="btn secondary tinhnang">Trả góp</button>
                                @if(\App\Library\AuthCustom::check())
                                    @if(\App\Library\AuthCustom::user()->balance < $data->price)
                                        <button type="button" class="btn primary the-cao-atm">Mua ngay</button>
                                    @else
                                        <button type="button" class="btn primary btn-muangay">Mua ngay</button>
                                    @endif
                                @else
                                    <button type="button" class="btn primary" onclick="openLoginModal()">Mua ngay</button>
                                @endif
    
    
                            </div>
                            @if(isset($card_percent))
                                @if($card_percent == 0)
                                    <div class="group-btn d-none d-lg-flex" style="--data-between: 12px">
                                        <a href="javascript:void(0);"  class="handle-recharge-modal btn pink two-line" data-tab="1">
                                            <span class="line-1" style="white-space: nowrap;">Mua bằng Thẻ cào</span>
                                            <span class="line-2">{{ str_replace(',','.',number_format(round($data->price))) }} đ</span>
                                        </a>
                                        @if(isset($data->price_atm))
                                        <a href="javascript:void(0);"  class="handle-recharge-modal btn pink two-line" data-tab="2">
                                            <span class="line-1" style="white-space: nowrap;">Mua bằng ATM, Momo</span>
                                            <span class="line-2">{{ str_replace(',','.',number_format(round($data->price_atm))) }} đ</span>
                                        </a>
                                        @endif
                                    </div>
                                @else
                                    @if(isset($data->price_atm))
                                    <div class="group-btn d-none d-lg-flex" style="--data-between: 12px">
                                        <a href="javascript:void(0);"  class="handle-recharge-modal btn pink two-line" data-tab="2">
                                            <span class="line-1" style="white-space: nowrap;">Mua bằng ATM, Momo</span>
                                            <span class="line-2">{{ str_replace(',','.',number_format(round($data->price_atm))) }} đ</span>
                                        </a>
                                    </div>
                                    @endif
                                @endif
                            @else
                                <div class="group-btn d-none d-lg-flex" style="--data-between: 12px">
                                    <a href="javascript:void(0);"  class="handle-recharge-modal btn pink two-line" data-tab="1">
                                        <span class="line-1" style="white-space: nowrap;">Mua bằng Thẻ cào</span>
                                        <span class="line-2">{{ str_replace(',','.',number_format(round($data->price))) }} đ</span>
                                    </a>
                                    @if(isset($data->price_atm))
                                    <a href="javascript:void(0);"  class="handle-recharge-modal btn pink two-line" data-tab="2">
                                        <span class="line-1" style="white-space: nowrap;">Mua bằng ATM, Momo</span>
                                        <span class="line-2">{{ str_replace(',','.',number_format(round($data->price_atm))) }} đ</span>
                                    </a>
                                    @endif
                                </div>
                            @endif
    
                        </div>
                    </div>
                </div>

            </div>

            <div class="footer-mobile">
                <div class="group-btn" style="--data-between: 12px">
                    <button class="btn secondary tinhnang">Mua trả góp</button>
                    @if(App\Library\AuthCustom::check())
                        @if(App\Library\AuthCustom::user()->balance < $data->price)
                            <button class="btn primary the-cao-atm">Mua Ngay</button>
                        @else
                            <button class="btn primary js-step" data-target="#step2">Mua Ngay</button>
                        @endif
                    @else
                        <button class="btn primary" onclick="openLoginModal()">Mua Ngay</button>
                    @endif

                </div>
            </div>

            {{--  sử lý step  --}}

            <div class="step" id="step2">
                <form class="formDonhangAccount" action="/ajax/acc/{{ $data->randId }}/databuy" method="POST">
                    {{ csrf_field() }}
                <div class="head-mobile">
                    <a href="javascript:void(0) " class="link-back close-step"></a>

                    <h1 class="head-title text-title">Xác nhận thanh toán</h1>

                    <a href="/" class="home"></a>
                </div>
                <div class="body-mobile">

                    <div class="body-mobile-content c-p-16">
                        <div class="dialog--content__title fw-700 fz-15 c-mb-12 text-title-theme">
                            Thông tin mua Acc
                        </div>
                        <div class="card--gray c-mb-16 c-pt-8 c-pb-8 c-pl-12 c-pr-12 brs-8 g_mobile-content">
                            <div class="card--attr justify-content-between d-flex c-mb-8 text-center">
                                <div class="card--attr__name fw-400 fz-13 text-center text-order">
                                    Game
                                </div>
                                <div class="card--attr__value fz-13 fw-500">{{ isset($data->category->custom->title) ? $data->category->custom->title :  $data->category->title }}</div>
                            </div>
                            <div class="card--attr justify-content-between d-flex c-mb-8 text-center">
                                <div class="card--attr__name fw-400 fz-13 text-center text-order">
                                    Giá tiền
                                </div>
                                <div class="card--attr__value fz-13 fw-500">{{ str_replace(',','.',number_format($data->price)) }} đ</div>
                            </div>
                        </div>

                        <div class="card--gray c-mb-16 c-pt-8 c-pb-8 c-pl-12 c-pr-12 brs-8 g_mobile-content">

                            @if(isset($game_auto_props) && count($game_auto_props))
                                <div class="card--attr justify-content-between d-flex c-mb-8 text-center">
                                    <div class="card--attr__name fw-400 fz-13 text-center text-order">
                                        Tướng
                                    </div>
                                    <div class="card--attr__value fz-13 fw-500">{{ $total_tuong }}</div>
                                </div>
                                <div class="card--attr justify-content-between d-flex c-mb-8 text-center">
                                    <div class="card--attr__name fw-400 fz-13 text-center text-order">
                                        Trang phục
                                    </div>
                                    <div class="card--attr__value fz-13 fw-500">{{ $total_trangphuc }}</div>
                                </div>
                                <div class="card--attr justify-content-between d-flex c-mb-8 text-center">
                                    <div class="card--attr__name fw-400 fz-13 text-center text-order">
                                        Linh thú TFT
                                    </div>
                                    <div class="card--attr__value fz-13 fw-500">{{ $total_linhthu }}</div>
                                </div>

                                @if(isset($data->params))
                                    @if(isset($data->params->rank_info) && count($data->params->rank_info))

                                        @foreach($data->params->rank_info as $key_rank => $rank_info)
                                            @if($rank_info->queueType == "RANKED_TFT")
                                                <div class="card--attr justify-content-between d-flex c-mb-8 text-center">
                                                    <div class="card--attr__name fw-400 fz-13 text-center text-order">
                                                        RANKED TFT
                                                    </div>
                                                    <div class="card--attr__value fz-13 fw-500">
                                                        @if($rank_info->tier == "NONE")
                                                            {{ $rank_info->tier }}
                                                        @else
                                                            {{ config('module.acc.auto_lm_rank.'.$rank_info->tier ) }} - {{ $rank_info->division }}
                                                        @endif
                                                    </div>
                                                </div>
                                            @elseif($rank_info->queueType == "RANKED_SOLO_5x5")
                                                <div class="card--attr justify-content-between d-flex c-mb-8 text-center">
                                                    <div class="card--attr__name fw-400 fz-13 text-center text-order">
                                                        RANKED SOLO
                                                    </div>
                                                    <div class="card--attr__value fz-13 fw-500">
                                                        @if($rank_info->tier == "NONE")
                                                            {{ $rank_info->tier }}
                                                        @else
                                                            {{ config('module.acc.auto_lm_rank.'.$rank_info->tier ) }} - {{ $rank_info->division }}
                                                        @endif
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach

                                    @endif
                                @endif
                            @else
                            @endif

                            @if(isset($data->groups))
                                <?php $att_values = $data->groups ?>
                                @foreach($att_values as $att_value)
                                    @if($att_value->module == 'acc_label' && $att_value->is_slug_override == null)
                                        @if(isset($att_value->parent))
                                            <div class="card--attr justify-content-between d-flex c-mb-8 text-center">
                                                <div class="card--attr__name fw-400 fz-13 text-center text-order">
                                                    {{ $att_value->parent->title??null }}
                                                </div>
                                                <div class="card--attr__value fz-13 fw-500">{{ $att_value->title??null }}</div>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            @endif

                            @if(isset($data->params) && isset($data->params->ext_info))
                                <?php $params = json_decode(json_encode($data->params->ext_info),true) ?>
                                @if(!is_null($dataAttribute) && count($dataAttribute)>0)
                                    @foreach($dataAttribute as $index=>$att)
                                        @if($att->position == 'text')
                                            @if(isset($att->childs))
                                                @foreach($att->childs as $child)
                                                    @foreach($params as $key => $param)
                                                        @if($key == $child->id && $child->is_slug_override == null)
                                                            <div class="card--attr justify-content-between d-flex c-mb-8 text-center">
                                                                <div class="card--attr__name fw-400 fz-13 text-center text-order">
                                                                    {{ $child->title??'' }}
                                                                </div>
                                                                <div class="card--attr__value fz-13 fw-500">{{ $param }}</div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            @endif
                                        @endif
                                    @endforeach
                                @endif
                            @endif

                        </div>

                        <div class="card--gray c-mb-16 c-pt-8 c-pb-8 c-pl-12 c-pr-12 brs-8 g_mobile-content">
                            <div class="card--attr justify-content-between d-flex c-mb-8 text-center">
                                <div class="card--attr__name fz-13 fw-400 text-center text-order">
                                    Phương thức thanh toán
                                </div>
                                <div class="card--attr__value fz-13 fw-500">
                                    Tài khoản Shopbrand
                                </div>
                            </div>
                            <div class="card--attr justify-content-between d-flex c-mb-8 text-center">
                                <div class="card--attr__name fw-400 fz-13 text-center">
                                    Phí thanh toán
                                </div>
                                <div class="card--attr__value fz-13 fw-500">
                                    Miễn phí
                                </div>
                            </div>
                        </div>
                        <div class="card--gray c-mb-0 c-pt-8 c-pb-8 c-pl-12 brs-8 c-pr-12 g_mobile-content">
                            <div class="card--attr__total justify-content-between d-flex text-center">
                                <div class="card--attr__name fw-400 fz-13 text-center text-order">
                                    Tổng thanh toán
                                </div>
                                <div class="card--attr__value fz-13 fw-500"><a href="javascript:void(0)" class="c-text-primary">{{ str_replace(',','.',number_format($data->price)) }} đ</a></div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="footer-mobile">
                    <div class="group-btn" style="--data-between: 12px">
                        <button type="submit" class="btn primary">Xác nhận</button>
                    </div>
                </div>
                </form>
            </div>

            <div class="step" id="step3">
                <div class="head-mobile">
                    <a href="javascript:void(0) " class="link-back close-step"></a>

                    <h1 class="head-title text-title">Xác nhận thanh toán</h1>

                    <a href="/" class="home"></a>
                </div>
                <div class="body-mobile">
                    <div class="body-mobile-content c-p-16">
                        <div class="dialog--content__title fw-700 fz-15 c-mb-12 text-title-theme">
                            Thông tin mua thẻ
                        </div>
                        <div class="card--gray c-mb-16 c-pt-8 c-pb-8 c-pl-12 c-pr-12 brs-8 g_mobile-content">
                            <div class="card--attr justify-content-between d-flex c-mb-8 text-center">
                                <div class="card--attr__name fw-400 fz-13 text-center text-order">
                                    Loại thẻ
                                </div>
                                <div class="card--attr__value fz-13 fw-500">10.000đ</div>
                            </div>
                            <div class="card--attr justify-content-between d-flex c-mb-8 text-center">
                                <div class="card--attr__name fw-400 fz-13 text-center text-order">
                                    Mệnh giá
                                </div>
                                <div class="card--attr__value fz-13 fw-500">10.000đ</div>
                            </div>
                            <div class="card--attr justify-content-between d-flex c-mb-8 text-cente text-order">
                                <div class="card--attr__name fw-400 fz-13 text-center">
                                    Số lượng
                                </div>
                                <div class="card--attr__value fz-13 fw-500">01</div>
                            </div>
                            <div class="card--attr justify-content-between d-flex c-mb-8 text-center text-order">
                                <div class="card--attr__name fw-400 fz-13 text-center">
                                    Chiết khấu
                                </div>
                                <div class="card--attr__value fz-13 fw-500">1%</div>
                            </div>
                        </div>
                        <div class="card--gray c-mb-16 c-pt-8 c-pb-8 c-pl-12 c-pr-12 brs-8 g_mobile-content">
                            <div class="card--attr justify-content-between d-flex c-mb-8 text-center">
                                <div class="card--attr__name fz-13 fw-400 text-center text-order">
                                    Phương thức thanh toán
                                </div>
                                <div class="card--attr__value fz-13 fw-500">
                                    Tài khoản Shopbrand
                                </div>
                            </div>
                            <div class="card--attr justify-content-between d-flex c-mb-8 text-center">
                                <div class="card--attr__name fw-400 fz-13 text-center">
                                    Phí thanh toán
                                </div>
                                <div class="card--attr__value fz-13 fw-500">
                                    Miễn phí
                                </div>
                            </div>
                        </div>
                        <div class="card--gray c-mb-0 c-pt-8 c-pb-8 c-pl-12 brs-8 c-pr-12 g_mobile-content">
                            <div class="card--attr__total justify-content-between d-flex text-center">
                                <div class="card--attr__name fw-400 fz-13 text-center text-order">
                                    Tổng thanh toán
                                </div>
                                <div class="card--attr__value fz-13 fw-500"><a href="javascript:void(0)" class="c-text-primary">9.900 đ</a></div>
                            </div>
                        </div>

                        <div class="dialog--content__title c-mt-24 fw-500 fz-15 c-mb-12 text-title-theme">
                            Thông tin trả góp
                        </div>

                        {{--                Thoong tin tra gop    --}}
                        <div class="card--gray c-mb-16 c-pt-8 c-pb-8 c-pl-12 c-pr-12 brs-8 g_mobile-content">
                            <div class="c-mt-8">
                                <label class="c-mb-4 fw-500 fz-13 lh-20">Trả lần 1</label>
                                <div class="col-md-12 p-0">
                                    <input type="text" name="" id="" placeholder="placeholder">
                                </div>
                            </div>
                            <div class="c-mt-8">
                                <label class="c-mb-4 fw-500 fz-13 lh-20">Trả lần 2</label>
                                <div class="col-md-12 p-0">
                                    <input type="text" name="" id="" placeholder="placeholder">
                                </div>
                            </div>
                            <div class="c-mt-12">
                                <label class="c-mb-4 fw-500 fz-13 lh-20">Mã bảo vệ</label>
                                <div class="col-md-12 p-0 d-flex">
                                    <input class="input-form w-100" type="text" placeholder="Nhập mã bảo vệ">
                                    <div class="c-ml-8 c-mr-8">
                                        <div>
                                            <span>
                                                  <img class="lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/son/macacha.png" alt="">
                                            </span>
                                        </div>
                                    </div>
                                    <button class="refresh-captcha">
                                        <img class="lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/son/refresh.png" alt="">
                                    </button>

                                </div>
                            </div>
                        </div>


                        <div class="dialog--content__title c-mt-24 fw-500 fz-13 c-mb-12 text-title-theme">
                            Quy định trả góp
                        </div>
                        <div class="c-mt-8 m_content-tra-gop brs-8">
                            <div class="col-md-12 c-py-12 c-px-8">
                                <ul class="c-pl-20">
                                    <li>Trả góp ban đầu 20% giá trị tài khoản dự kiến mua để giữ tài khoản. Áp dụng cho tài khoản trị giá từ 200.000đ trở lên.</li>
                                    <li>Thời gian trả góp: 7 ngày. Không tính ngày xác nhận trả góp.</li>
                                    <li>Phí trả góp: 0%</li>
                                    <li>Trong thời gian trả góp bạn phải hoàn tất phần còn lại để giao dịch hoàn tất.</li>
                                    <li>Trường hợp quá thời gian trả góp giao dịch của bạn sẽ tự động bị hủy bỏ và hoàn lại 20% số tiền đã góp ban đầu.Lúc này tài khoản được tự do. (Ví dụ: tài khoản cần mua trị giá 1 triệu, trả góp ban đầu 200.000đ.</li>
                                    <li>Nếu quá thời gian giao dịch trả góp bị hủy bỏ thì bạn sẽ nhận lại 20% tức 40.000đ trong tài khoản) Quy trình giao dịch đều xử lý tự động, bạn không thể gọi hỗ trợ gia hạn thêm ngày trả góp hoặc đổi khác quy định trên.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="footer-mobile">
                    <div class="group-btn" style="--data-between: 12px">
                        <button class="btn primary btn-success-mobile">Xác nhận</button>
                    </div>
                </div>
            </div>
        </section>
    @else
        <div class="item_buy">

            <div class="container pt-3">
                <div class="row pb-3 pt-3">
                    <div class="col-md-12 text-center">
                        <span style="color: red;font-size: 16px;">
                            Tài khoản không tồn tại,hoặc đã được mua!
                        </span>
                    </div>
                </div>

            </div>

        </div>
    @endif
@endif

{{--    Modal xác nhận thanh toán--}}
<div class="modal fade modal-big loadModal__acount" id="orderModal">
    <div class="modal-dialog modal-dialog-centered modal-custom">
        <div class="modal-content c-p-24">
            <form class="formDonhangAccount" action="/ajax/acc/{{ $data->randId }}/databuy" method="POST">
                {{ csrf_field() }}
            <div class="modal-header">
                <h2 class="modal-title center">Xác nhận thanh toán</h2>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>
            <div class="modal-body pl-0 pr-0 c-pt-24 c-pb-24">
                <div class="dialog--content__title fw-700 fz-13 c-mb-12 text-title-theme">
                    Thông tin mua Acc
                </div>
                <div class="card--gray c-mb-16 c-pt-8 c-pb-8 c-pl-12 c-pr-12">
                    <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                        <div class="card--attr__name fw-400 fz-13 text-center">
                            Game
                        </div>
                        <div class="card--attr__value fz-13 fw-500">{{ isset($data->category->custom->title) ? $data->category->custom->title :  $data->category->title }}</div>
                    </div>
                    <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                        <div class="card--attr__name fw-400 fz-13 text-center">
                            Giá tiền
                        </div>
                        <div class="card--attr__value fz-13 fw-500">{{ str_replace(',','.',number_format($data->price)) }} đ</div>
                    </div>
                </div>


                <div class="card--gray c-mb-16 c-pt-8 c-pb-8 c-pl-12 c-pr-12">

                    @if(isset($game_auto_props) && count($game_auto_props))
                        <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                            <div class="card--attr__name fw-400 fz-13 text-center">
                                Tướng
                            </div>
                            <div class="card--attr__value fz-13 fw-500">{{ $total_tuong }}</div>
                        </div>
                        <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                            <div class="card--attr__name fw-400 fz-13 text-center">
                                Trang phục
                            </div>
                            <div class="card--attr__value fz-13 fw-500">{{ $total_trangphuc }}</div>
                        </div>
                        <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                            <div class="card--attr__name fw-400 fz-13 text-center">
                                Linh thú TFT
                            </div>
                            <div class="card--attr__value fz-13 fw-500">{{ $total_linhthu }}</div>
                        </div>

                        @if(isset($data->params))
                            @if(isset($data->params->rank_info) && count($data->params->rank_info))

                                @foreach($data->params->rank_info as $key_rank => $rank_info)
                                    @if($rank_info->queueType == "RANKED_TFT")
                                        <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                                            <div class="card--attr__name fw-400 fz-13 text-center">
                                                RANKED TFT
                                            </div>
                                            <div class="card--attr__value fz-13 fw-500">
                                                @if($rank_info->tier == "NONE")
                                                    {{ $rank_info->tier }}
                                                @else
                                                    {{ config('module.acc.auto_lm_rank.'.$rank_info->tier ) }} - {{ $rank_info->division }}
                                                @endif
                                            </div>
                                        </div>
                                    @elseif($rank_info->queueType == "RANKED_SOLO_5x5")
                                        <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                                            <div class="card--attr__name fw-400 fz-13 text-center">
                                                RANKED SOLO
                                            </div>
                                            <div class="card--attr__value fz-13 fw-500">
                                                @if($rank_info->tier == "NONE")
                                                    {{ $rank_info->tier }}
                                                @else
                                                    {{ config('module.acc.auto_lm_rank.'.$rank_info->tier ) }} - {{ $rank_info->division }}
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            @endif
                        @endif
                    @else
                    @endif

                    @if(isset($data->groups))
                        <?php $att_values = $data->groups ?>
                        @foreach($att_values as $att_value)
                            @if($att_value->module == 'acc_label' && $att_value->is_slug_override == null)
                                @if(isset($att_value->parent))
                                    <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                                        <div class="card--attr__name fw-400 fz-13 text-center">
                                            {{ $att_value->parent->title??null }}
                                        </div>
                                        <div class="card--attr__value fz-13 fw-500">{{ $att_value->title??null }}</div>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    @endif

                    @if(isset($data->params) && isset($data->params->ext_info))
                        <?php $params = json_decode(json_encode($data->params->ext_info),true) ?>
                        @if(!is_null($dataAttribute) && count($dataAttribute)>0)
                            @foreach($dataAttribute as $index=>$att)
                                @if($att->position == 'text')
                                    @if(isset($att->childs))
                                        @foreach($att->childs as $child)
                                            @foreach($params as $key => $param)
                                                @if($key == $child->id && $child->is_slug_override == null)
                                                    <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                                                        <div class="card--attr__name fw-400 fz-13 text-center">
                                                            {{ $child->title??'' }}
                                                        </div>
                                                        <div class="card--attr__value fz-13 fw-500">{{ $param }}</div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    @endif
                                @endif
                            @endforeach
                        @endif
                    @endif

                </div>

                <div class="card--gray c-mb-16 c-pt-8 c-pb-8 c-pl-12 c-pr-12">
                    <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                        <div class="card--attr__name fz-13 fw-400 text-center">
                            Phương thức thanh toán
                        </div>
                        <div class="card--attr__value fz-13 fw-500">
                            Tài khoản Shopbrand
                        </div>
                    </div>
                    <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                        <div class="card--attr__name fw-400 fz-13 text-center">
                            Phí thanh toán
                        </div>
                        <div class="card--attr__value fz-13 fw-500">
                            Miễn phí
                        </div>
                    </div>
                </div>
                <div class="card--gray c-mb-0 c-pt-8 c-pb-8 c-pl-12 c-pr-12">
                    <div class="card--attr__total justify-content-between d-flex c-mb-16 text-center">
                        <div class="card--attr__name fw-400 fz-13 text-center">
                            Tổng thanh toán
                        </div>
                        <div class="card--attr__value fz-13 fw-500"><a href="javascript:void(0)" class="c-text-primary">{{ str_replace(',','.',number_format($data->price)) }} đ</a></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn primary">Xác nhận</button>
            </div>
            </form>
        </div>
    </div>
</div>

{{--    Modal xác nhận thanh toán--}}
<div class="modal fade modal-big" id="orderModalNot">
    <div class="modal-dialog modal-dialog-centered modal-custom">
        <div class="modal-content c-p-24">
            <div class="modal-header">
                <h2 class="modal-title center">Xác nhận thanh toán</h2>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>
            <div class="modal-body pl-0 pr-0 c-pt-24 c-pb-24">
                <div class="dialog--content__title fw-700 fz-13 c-mb-12 text-title-theme">
                    Thông tin mua thẻ
                </div>
                <div class="card--gray c-mb-16 c-pt-8 c-pb-8 c-pl-12 c-pr-12">
                    <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                        <div class="card--attr__name fw-400 fz-13 text-center">
                            Loại thẻ
                        </div>
                        <div class="card--attr__value fz-13 fw-500">10.000đ</div>
                    </div>
                    <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                        <div class="card--attr__name fw-400 fz-13 text-center">
                            Mệnh giá
                        </div>
                        <div class="card--attr__value fz-13 fw-500">10.000đ</div>
                    </div>
                    <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                        <div class="card--attr__name fw-400 fz-13 text-center">
                            Số lượng
                        </div>
                        <div class="card--attr__value fz-13 fw-500">01</div>
                    </div>
                    <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                        <div class="card--attr__name fw-400 fz-13 text-center">
                            Chiết khấu
                        </div>
                        <div class="card--attr__value fz-13 fw-500">1%</div>
                    </div>
                </div>
                <div class="card--gray c-mb-16 c-pt-8 c-pb-8 c-pl-12 c-pr-12">
                    <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                        <div class="card--attr__name fz-13 fw-400 text-center">
                            Phương thức thanh toán
                        </div>
                        <div class="card--attr__value fz-13 fw-500">
                            Tài khoản Shopbrand
                        </div>
                    </div>
                    <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                        <div class="card--attr__name fw-400 fz-13 text-center">
                            Phí thanh toán
                        </div>
                        <div class="card--attr__value fz-13 fw-500">
                            Miễn phí
                        </div>
                    </div>
                </div>
                <div class="card--gray c-mb-0 c-pt-8 c-pb-8 c-pl-12 c-pr-12">
                    <div class="card--attr__total justify-content-between d-flex c-mb-16 text-center">
                        <div class="card--attr__name fw-400 fz-13 text-center">
                            Tổng thanh toán
                        </div>
                        <div class="card--attr__value fz-13 fw-500"><a href="javascript:void(0)" class="c-text-primary">9.900 đ</a></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn primary">Xác nhận</button>

            </div>
        </div>
    </div>
</div>


<div class="modal fade login show order-modal" id="accDetail" aria-modal="true" data-backdrop="static" data-keyboard="false">

    <div class="modal-dialog step-tab-panel  modal-dialog-centered  animated">
        <!--        <div class="image-login"></div>-->
        <div class="modal-content p-0">
            <div class="modal-header p-0" style="border-bottom: 0">
                <div class="row marginauto modal-header-order-ct pt-fix-16 pb-fix-16">
                    <div class="col-12 span__donhang" style="position: relative">
                        <div class="row marginauto ">
                            <div class="col-md-12 left-right">
                                <span class="fw-600">Mã số: {{ $data->randId }}</span>
                            </div>
                            <div class="col-md-12 left-right">
                                <small>MỤC: {{ isset($data->category->custom->title) ? $data->category->custom->title :  $data->category->title }}</small>
                            </div>
                        </div>
                        <div class="close" data-dismiss="modal" aria-label="Close">
                            <img class="lazy img-close-ct close-modal-default" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/close.png" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-body modal-body-order-ct">
                <div class="row marginauto">

                    <div class="d-flex">
                    {{--                                <div id="myCarousel" class="carousel slide acc-holder" data-ride="carousel">--}}
                    {{--                                    <!-- Indicators -->--}}
                    {{--                                    <ol class="">--}}
                    {{--                                        @foreach(explode('|',$data->image_extension) as $key => $val)--}}
                    {{--                                            <li data-target="#myCarousel" data-slide-to="{{$key+1}}" class="acc-holder_slides">--}}
                    {{--                                                <img src="{{\App\Library\MediaHelpers::media($val)}}" alt="" />--}}
                    {{--                                            </li>--}}

                    {{--                                        @endforeach--}}
                    {{--                                    </ol>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="prevAccount">--}}
                    {{--                                    <a class="prev" onclick="plusSlides(-1)">--}}
                    {{--                                        <img src="/assets/frontend/theme_3/image/swiper-prev.svg" alt="">--}}
                    {{--                                    </a>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="nextAccount">--}}
                    {{--                                    <a class="next" onclick="plusSlides(1)">--}}
                    {{--                                        <img src="/assets/frontend/theme_3/image/swiper-next.svg" alt="">--}}
                    {{--                                    </a>--}}
                    {{--                                </div>--}}



                    <!-- main images -->
                        <div class="acc-holder ">
                            @foreach(explode('|',$data->image_extension) as $key => $val)

                                <div class="acc-holder_slides " >
                                    <a class="acc-holder_expand" data-fancybox="galleryAccount" href="{{\App\Library\MediaHelpers::media($val)}}">
                                        <i class="__icon__profile --sm__profile --link__profile --link--acc" style="--path : url(/assets/frontend/theme_5/image/nam/expand-acc.svg)"></i>
                                        {{--                                            <img src="/assets/frontend/theme_3/image/svg/expand-acc.svg" alt="">--}}
                                    </a>
                                    <div class="acc-holder_badge">{{$key+1}} / {{count(explode('|',$data->image_extension))}}</div>
                                    <img src="{{\App\Library\MediaHelpers::media($val)}}" alt="" />
                                </div>
                            @endforeach


                            <div class="prevAccount">
                                <a class="prev" onclick="plusSlides(-1)">
                                    <img src="/assets/frontend/theme_3/image/swiper-prev.svg" alt="">
                                </a>
                            </div>
                            <div class="nextAccount">
                                <a class="next" onclick="plusSlides(1)">
                                    <img src="/assets/frontend/theme_3/image/swiper-next.svg" alt="">
                                </a>
                            </div>


                        </div>

                        <!-- thumnails in a row -->
                        <div class="flex-grow-1 ml-fix-12">
                            <div class="row acc-thumbnail  mx-0">
                                @foreach(explode('|',$data->image_extension) as $key => $val)
                                    <div class="acc-thumbnail_column col-md-3 c-px-6 c-mb-12 ">
                                        <div class="acc-thumbnail_badge" onclick="currentSlide({{$key+1}})">{{$key+1}}</div>
                                        <img class="acc-thumbnail-image" src="{{\App\Library\MediaHelpers::media($val)}}" onclick="currentSlide({{$key+1}})" alt="Caption One">
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<script>

    var slideIndex = 1;
    var slideIndex1 = 1;
    var ImageIndex = 0;
    function swipe(event, direction){
        var midpoint = Math.floor(screen.width/2);
        var px = event.pageX;
        var items = document.getElementsByClassName('acc-holder_slides');
        var itemActive = items[ImageIndex];
        if (direction === 'left') {
            itemActive.style.marginLeft = '-100%';
            itemActive.style.transition = '1s ';
            ImageIndex = ImageIndex < items.length - 1 ? ImageIndex + 1 : ImageIndex;
        }else{
            itemActive.style.marginLeft = '0';
            itemActive.style.transition = '1s ';
            ImageIndex = ImageIndex >= 1 ? ImageIndex - 1 : 0;
        }
    }
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("acc-holder_slides");
        var dots = document.getElementsByClassName("acc-thumbnail_column");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}

        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
            // slides[i].style.display = "inline";
        }



        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        // slides[slideIndex-1].style.display = "inline";
        dots[slideIndex-1].className += " active";
    }



</script>
