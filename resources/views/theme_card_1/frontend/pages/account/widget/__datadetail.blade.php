@if(isset($data))
    @if($data->status == 1)
        <div class="row bs-normal">
            <div class="col-lg-6 col-12">
                <div class="gallery" style="overflow: hidden">
                    @if(isset($game_auto_props) && count($game_auto_props) && $data_category->slug == 'nick-lien-minh')
                        <img src="{{\App\Library\MediaHelpers::media($data->image)}}" alt="" >
                    @else
                        <div class="swiper gallery-slider">
                            <div class="swiper-wrapper">
                                @foreach(explode('|',$data->image_extension) as $val)
                                    <div class="swiper-slide">
                                        <a data-fancybox="gallerycoverDetail" href="{{\App\Library\MediaHelpers::media($val)}}">
                                            <img src="{{\App\Library\MediaHelpers::media($val)}}" alt="" >
                                        </a>
                                    </div>
                                @endforeach
                            </div>

                            <div class="swiper-button-prev">
                                <i class="fas fa-chevron-left"></i>
                            </div>
                            <div class="swiper-button-next">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </div>

                        <div class="swiper gallery-thumbs gallery-thumbsmaxheadth">
                            <div class="swiper-wrapper">
                                @foreach(explode('|',$data->image_extension) as $val)
                                    <div class="swiper-slide">
                                        <a data-fancybox="gallerycoverDetail" href="{{\App\Library\MediaHelpers::media($val)}}">
                                            <img src="{{\App\Library\MediaHelpers::media($val)}}" alt="" class="lazy">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6 col-12 gallery__right">
                <div class="row bs-normal gallery__row fixcssacount">
                    <div class="col-12">
                        <div class="row bs-normal gallery__01">
                            <div class="col-md-12 gallery__01__row">
                                <div class="row bs-normal">
                                    <div class="col-auto">
                                        <span class="gallery__01__span">Mã số:</span>
                                    </div>
                                    <div class="col-md-8 col-8 pl-0">
                                        <span class="gallery__01__span">#{{ $data->randId }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 gallery__01__row2">
                                <div class="row bs-normal">
                                    <div class="col-auto">
                                        <span class="gallery__02__span">Danh mục:</span>
                                    </div>
                                    <div class="col-md-8 col-6  pl-0">
                                        <a class="theashow"  href="/mua-acc/{{ isset($data->category->custom->slug) ? $data->category->custom->slug :  $data->category->slug }}"><span class="gallery__02__span">{{ isset($data->category->custom->title) ? $data->category->custom->title :  $data->category->title }}</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 gallery__pt">
                        <div class="row bs-normal gallery__02">
                            <div class="col-12 gallery__01__row">
                                <div class="row bs-normal">
                                    @if(isset($card_percent))
                                        @if($card_percent == 0)
                                            <div class="col-5">
                                                <div class="row bs-normal text-left">
                                                    <div class="col-12">
                                                        <span class="gallery__02__span__02">THẺ CÀO</span>
                                                    </div>
                                                    <div class="col-12">

                                                        <span class="gallery__01__span__02">{{ str_replace(',','.',number_format(round($data->price))) }} CARD</span>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-2 gallery__01__span__02md">
                                                <div class="row bs-normal text-center">
                                                    <div class="col-12">
                                                        <span class="hoac">Hoặc</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="row bs-normal text-right">
                                                    <div class="col-12">
                                                        <span class="gallery__02__span__02">ATM</span>
                                                    </div>
                                                    <div class="col-12">

                                                        @if(isset($data->price_atm))
                                                            <span class="gallery__01__span__02">{{ str_replace(',','.',number_format(round($data->price_atm))) }} ATM</span>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-5">
                                                <div class="row bs-normal text-left">
                                                    <div class="col-12">
                                                        <span class="gallery__02__span__02">ATM</span>
                                                    </div>
                                                    <div class="col-12">
                                                        @if(isset($data->price_atm))
                                                            <span class="gallery__01__span__02">{{ str_replace(',','.',number_format(round($data->price_atm))) }} ATM</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @else
                                        <div class="col-5">
                                            <div class="row bs-normal text-left">
                                                <div class="col-12">
                                                    <span class="gallery__02__span__02">THẺ CÀO</span>
                                                </div>
                                                <div class="col-12">

                                                    <span class="gallery__01__span__02">{{ str_replace(',','.',number_format(round($data->price))) }} CARD</span>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-2 gallery__01__span__02md">
                                            <div class="row bs-normal text-center">
                                                <div class="col-12">
                                                    <span class="hoac">Hoặc</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="row bs-normal text-right">
                                                <div class="col-12">
                                                    <span class="gallery__02__span__02">ATM</span>
                                                </div>
                                                <div class="col-12">

                                                    @if(isset($atm_percent))
                                                        <span class="gallery__01__span__02">{{ str_replace(',','.',number_format(round($atm_percent*$data->price_atm/100))) }} ATM</span>
                                                    @else
                                                        @if(isset($data->price_atm))
                                                            <span class="gallery__01__span__02">{{ str_replace(',','.',number_format(round($data->price_atm))) }} ATM</span>
                                                        @endif
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 pl-0 pr-0">
                        <div class="row bs-normal scroll-default" style="margin: 0">
                            @if(isset($game_auto_props) && count($game_auto_props))
                                @if($data_category->slug == 'nick-lien-minh')
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
                                                }elseif ($game_auto_prop->key == 'skins'){
                                                    $total_trangphuc = $total_trangphuc + 1;
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

                                    <div class="col-md-12">
                                        <div class="row bs-normal gallery__03">
                                            <div class="col-md-12 gallery__01__row">
                                                <div class="row bs-normal">
                                                    <div class="col-auto span__dangky__auto">
                                                        <i class="fas fa-angle-right"></i>
                                                    </div>
                                                    <div class="col-md-4 col-4 pl-0">
                                                        <span class="span__dangky">Tướng</span>
                                                    </div>
                                                    <div class="col-md-1 col-2 pl-0 pr-0">
                                                        <span class="span__dangky">{{ $total_tuong }}</span>
                                                    </div>
                                                    <div class="col-md-6 col-4 pl-0 pr-0">
                                                        <a href="javascript:void(0)" class="lm_xemthem lm_xemthem_tuong">Xem</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="row bs-normal gallery__03">
                                            <div class="col-md-12 gallery__01__row">
                                                <div class="row bs-normal">
                                                    <div class="col-auto span__dangky__auto">
                                                        <i class="fas fa-angle-right"></i>
                                                    </div>
                                                    <div class="col-md-4 col-4 pl-0">
                                                        <span class="span__dangky">Trang phục</span>
                                                    </div>
                                                    <div class="col-md-1 col-2 pl-0">
                                                        <span class="span__dangky">{{ $total_trangphuc }}</span>

                                                    </div>
                                                    <div class="col-md-6 col-4 pl-0 pr-0">
                                                        <a href="javascript:void(0)" class="lm_xemthem lm_xemthem_trangphuc">Xem</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="row bs-normal gallery__03">
                                            <div class="col-md-12 gallery__01__row">
                                                <div class="row bs-normal">
                                                    <div class="col-auto span__dangky__auto">
                                                        <i class="fas fa-angle-right"></i>
                                                    </div>
                                                    <div class="col-md-4 col-4 pl-0">
                                                        <span class="span__dangky">Linh thú TFT</span>
                                                    </div>
                                                    <div class="col-md-1 col-2 pl-0">
                                                        <span class="span__dangky">{{ $total_linhthu }}</span>

                                                    </div>
                                                    <div class="col-md-6 col-4 pl-0 pr-0">
                                                        <a href="javascript:void(0)" class="lm_xemthem lm_xemthem_linhthu">Xem</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @if(isset($data->params))
                                        @if(isset($data->params->rank_info) && count($data->params->rank_info))
                                            @foreach($data->params->rank_info as $key_rank => $rank_info)
                                                @if($rank_info->queueType == "RANKED_TFT")
                                                    <div class="col-md-12">
                                                        <div class="row bs-normal gallery__03">
                                                            <div class="col-md-12 gallery__01__row">
                                                                <div class="row bs-normal">
                                                                    <div class="col-auto span__dangky__auto">
                                                                        <i class="fas fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col-md-4 col-4 pl-0">
                                                                        <span class="span__dangky">RANKED TFT</span>
                                                                    </div>
                                                                    <div class="col-md-6 col-6 pl-0">
                                                                        @if($rank_info->tier == "NONE")
                                                                            <span class="span__dangky">CHƯA CÓ RANK</span>
                                                                        @else

                                                                            <span class="span__dangky">{{ config('module.acc.auto_lm_rank.'.$rank_info->tier ) }} - {{ $rank_info->division }}</span>

                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif($rank_info->queueType == "RANKED_SOLO_5x5")
                                                    <div class="col-md-12">
                                                        <div class="row bs-normal gallery__03">
                                                            <div class="col-md-12 gallery__01__row">
                                                                <div class="row bs-normal">
                                                                    <div class="col-auto span__dangky__auto">
                                                                        <i class="fas fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col-md-4 col-4 pl-0">
                                                                        <span class="span__dangky">RANKED SOLO</span>
                                                                    </div>
                                                                    <div class="col-md-6 col-6 pl-0">

                                                                        @if($rank_info->tier == "NONE")
                                                                            <span class="span__dangky">CHƯA CÓ RANK</span>
                                                                        @else
                                                                            <span class="span__dangky">{{ config('module.acc.auto_lm_rank.'.$rank_info->tier ) }} - {{ $rank_info->division }}</span>
                                                                        @endif

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endif
                                @elseif($data_category->slug == 'nick-ninja-school')
                                    @php
                                        $server = null;
                                        $params = null;
                                        $info = array();
                                        if (isset($data->params)){
                                            $params = $data->params;
                                            if (isset($params->server)){
                                                $server = $params->server;
                                            }
                                            if (isset($params->info) && count($params->info)){
                                                $info = $params->info;
                                            }
                                        }
                                    @endphp
                                    @if(isset($server))

                                        <div class="col-md-12">
                                            <div class="row bs-normal gallery__03">
                                                <div class="col-md-12 gallery__01__row">
                                                    <div class="row bs-normal">
                                                        <div class="col-auto span__dangky__auto">
                                                            <i class="fas fa-angle-right"></i>
                                                        </div>
                                                        <div class="col-md-4 col-4 pl-0">
                                                            <span class="span__dangky">Server</span>
                                                        </div>
                                                        <div class="col-md-1 col-2 pl-0 pr-0">
                                                            <span class="span__dangky">{{ $server??null }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @endif
                                    @if(isset($info) && count($info))
                                        @foreach($info as $ke => $in)
                                            @if(in_array($in->name,config('module.acc.auto_ninja_tt')))

                                                <div class="col-md-12">
                                                    <div class="row bs-normal gallery__03">
                                                        <div class="col-md-12 gallery__01__row">
                                                            <div class="row bs-normal">
                                                                <div class="col-auto span__dangky__auto">
                                                                    <i class="fas fa-angle-right"></i>
                                                                </div>
                                                                <div class="col-md-4 col-4 pl-0">
                                                                    <span class="span__dangky">{{ $in->name??'' }}</span>
                                                                </div>
                                                                <div class="col-md-1 col-2 pl-0 pr-0">
                                                                    <span class="span__dangky">@if($in->name == 'Yên')
                                                                            {{ str_replace(',','.',number_format($in->value??'')) }}
                                                                        @else
                                                                            {{ $in->value??'' }}
                                                                        @endif</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            @endif
                                        @endforeach
                                    @endif
                                @elseif($data_category->slug == 'nick-ngoc-rong-online')
                                    @php
                                        $server = null;
                                        $params = null;
                                        $info = array();
                                        if (isset($data->params)){
                                            $params = $data->params;
                                            if (isset($params->server)){
                                                $server = $params->server;
                                            }
                                            if (isset($params->info) && count($params->info)){
                                                $info = $params->info;
                                            }
                                        }
                                    @endphp
                                    @if(isset($server))

                                        <div class="col-md-12">
                                            <div class="row bs-normal gallery__03">
                                                <div class="col-md-12 gallery__01__row">
                                                    <div class="row bs-normal">
                                                        <div class="col-auto span__dangky__auto">
                                                            <i class="fas fa-angle-right"></i>
                                                        </div>
                                                        <div class="col-md-4 col-4 pl-0">
                                                            <span class="span__dangky">Server</span>
                                                        </div>
                                                        <div class="col-md-1 col-2 pl-0 pr-0">
                                                            <span class="span__dangky">{{ $server??null }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @endif

                                    @if(isset($info) && count($info))
                                        @foreach($info as $ke => $in)
                                            @if(in_array($in->name,config('module.acc.auto_nro_list_tt')))

                                                @if($total < 4)

                                                    @if($in->name == 'Skill Pet' || $in->name == 'Cải trang')
                                                        @if($in->name == 'Skill Pet')
                                                        @elseif($in->name == 'Cải trang')
                                                            <?php
                                                            $total = $total + 1;
                                                            ?>
                                                            <div class="col-md-12">
                                                                <div class="row bs-normal gallery__03">
                                                                    <div class="col-md-12 gallery__01__row">
                                                                        <div class="row bs-normal">
                                                                            <div class="col-auto span__dangky__auto">
                                                                                <i class="fas fa-angle-right"></i>
                                                                            </div>
                                                                            <div class="col-md-4 col-4 pl-0">
                                                                                <span class="span__dangky">{{ $in->name??'' }}</span>
                                                                            </div>
                                                                            <div class="col-md-1 col-2 pl-0 pr-0">
                                                                                <span class="span__dangky">
                                                                                    @if(isset($in->value) && count($in->value) )
                                                                                        {{ count($in->value) }}
                                                                                    @endif    
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif

                                                    @elseif($in->name == 'Hành tinh' || $in->name == 'Bông tai' )
                                                        <?php
                                                        $total = $total + 1;
                                                        ?>
                                                        <div class="col-md-12">
                                                            <div class="row bs-normal gallery__03">
                                                                <div class="col-md-12 gallery__01__row">
                                                                    <div class="row bs-normal">
                                                                        <div class="col-auto span__dangky__auto">
                                                                            <i class="fas fa-angle-right"></i>
                                                                        </div>
                                                                        <div class="col-md-4 col-4 pl-0">
                                                                            <span class="span__dangky">{{ $in->name??'' }}</span>
                                                                        </div>
                                                                        <div class="col-md-1 col-2 pl-0 pr-0">
                                                                            <span class="span__dangky">
                                                                                {{ $param??null }}
                                                                                {{ $in->value }}    
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif

                                                @endif

                                            @endif
                                        @endforeach
                                    @endif
                                    
                                @endif
                            @endif

                            @if(isset($data->groups))
                                <?php $att_values = $data->groups ?>
                                @foreach($att_values as $att_value)
                                    @if(isset($att_value->module) && $att_value->module == 'acc_label' && $att_value->is_slug_override == null)
                                        @if(isset($att_value->parent))
                                            <div class="col-md-12">
                                                <div class="row bs-normal gallery__03">
                                                    <div class="col-md-12 gallery__01__row">
                                                        <div class="row bs-normal">
                                                            <div class="col-auto span__dangky__auto">
                                                                <i class="fas fa-angle-right"></i>
                                                            </div>
                                                            <div class="col-md-4 col-4 pl-0">
                                                                <span class="span__dangky">{{ $att_value->parent->title??null }}</span>
                                                            </div>
                                                            <div class="col-md-6 col-6 pl-0">
                                                                <span class="span__dangky">{{ $att_value->title??null }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            @endif

                            @if(isset($data->params) && isset($data->params->ext_info))
                                <?php $params = json_decode(json_encode($data->params->ext_info),true) ?>
                                @if(isset($dataAttribute))
                                    @foreach($dataAttribute as $index=>$att)
                                        @if($att->position == 'text')
                                            @if(isset($att->childs))
                                                @foreach($att->childs as $child)
                                                    @foreach($params as $key => $param)
                                                        @if($key == $child->id && $child->is_slug_override == null)

                                                            <div class="col-md-12">
                                                                <div class="row bs-normal gallery__03">
                                                                    <div class="col-md-12 gallery__01__row">
                                                                        <div class="row bs-normal">
                                                                            <div class="col-auto span__dangky__auto">
                                                                                <i class="fas fa-angle-right"></i>
                                                                            </div>
                                                                            <div class="col-md-4 col-4 pl-0">
                                                                                <span class="span__dangky">{{ $child->title??'' }}</span>
                                                                            </div>
                                                                            <div class="col-md-6 col-6 pl-0">
                                                                                <span class="span__dangky">{{ $param }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
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
                    </div>

                    <div class="col-12 gallery__bottom">
                        <div class="row bs-normal text-center">
                            <div class="col-12 gallery__01__row">
                                <div class="row bs-normal gallery__01__row2">
                                    <div class="col-12 pl-0 pr-0">
                                        <button class="btn btn-danger gallery__bottom__span gallery__bottom__span_bg buyacc" style="position: relative;" data-id="{{ encodeItemID($data->id) }}"><i class="fas fa-cart-arrow-down"></i>&ensp;Mua ngay
                                            <div class="row bs-normal justify-content-center loading-data__buyacc">
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-12 pl-0 pr-0 gallery__bottom">
                                        <div class="row bs-normal atmvdtntc">
                                            <div class="col-md-6 col-sm-6 col-6 atmvdt">
                                                @if(App\Library\AuthCustom::check())
                                                    <a href="/nap-the"  class="btn btn-warning gallery__bottom__span_bg__2 gallery__bottom__span" style="color:#FFFFFF;">ATM - VÍ ĐIỆN TỬ</a>
                                                @else
                                                    <button class="btn btn-warning gallery__bottom__span_bg__2 gallery__bottom__span" style="color:#FFFFFF;" data-toggle="modal" data-target="#signin">ATM - VÍ ĐIỆN TỬ</button>
                                                @endif
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-6 ntc">
                                                @if(App\Library\AuthCustom::check())
                                                    <a href="/nap-the" class="btn btn-warning gallery__bottom__span_bg__2 gallery__bottom__span" style="color:#FFFFFF;">NẠP THẺ CÀO</a>
                                                @else
                                                    <button class="btn btn-warning gallery__bottom__span_bg__2 gallery__bottom__span" style="color:#FFFFFF;" data-toggle="modal" data-target="#signin">NẠP THẺ CÀO</button>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade modal__account modal__buyacount loadModal__acount" id="LoadModal" role="dialog" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog__account" role="document">
                <div class="modal-content modal-content_accountlist">

                    @if(App\Library\AuthCustom::check() && App\Library\AuthCustom::user()->balance >= $data->price)
                        <form class="formDonhangAccount" action="/ajax/acc/{{ $data->randId }}/databuy" method="POST">
                        @else
                        <form class="formDonhangAccount">
                        @endif
                            {{ csrf_field() }}

                            <div class="modal-header">
                                <span class="nick-modal-header">Xác nhận mua tài khoản</span>
                                <img data-dismiss="modal" class="nick-modal-header-close" src="/assets/frontend/{{theme('')->theme_key}}/image/son/close.svg" alt="">
                            </div>

                            <div class="modal-body">
                                <div class="c-content-tab-4 c-opt-3" role="tabpanel">
                                    <ul class="nav nav-justified nav-justified__ul" role="tablist">
                                        <li role="presentation" class="active justified__ul_li">
                                            <a href="#paymentv2" role="tab" data-toggle="tab" aria-selected="true" class="c-font-16 active">Thanh toán</a>
                                        </li>
                                        <li role="presentation" class="justified__ul_li">
                                            <a href="#info2" role="tab" data-toggle="tab" aria-selected="false" class="c-font-16">Thông tin tài khoản</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active show" id="paymentv2">
                                            <p class="c-tab-header-account">Thông tin tài khoản #{{ $data->randId }}</p>
                                            <div class="table-nick-properties">
                                                @if(isset($data->params))
                                                    @if(isset($data->params->rank_info) && count($data->params->rank_info))
                                                        <div class="table-nick-items justify-content-between d-flex">
                                                            <div class="table-properties-name">Nhà phát hành</div>
                                                            <div class="table-properties-value">Garena</div>
                                                        </div>
                                                    @else
                                                        <div class="table-nick-items justify-content-between d-flex">
                                                            <div class="table-properties-name">Nhà phát hành</div>
                                                            <div class="table-properties-value">{{  @$data->groups[0]->title }}</div>
                                                        </div>
                                                    @endif
                                                @endif
    
                                                <div class="table-nick-items justify-content-between d-flex">
                                                    <div class="table-properties-name">Tên game</div>
                                                    <div class="table-properties-value">{{ isset($data->category->custom->title) ? $data->category->custom->title :  $data->category->title }}</div>
                                                </div>
    
                                                <div class="table-nick-items justify-content-between d-flex">
                                                    <div class="table-properties-name">Giá tiền</div>
                                                    <div class="table-properties-value">
                                                        @if(isset($data->category->params->price) && isset($data->category->params))
                                                            {{ str_replace(',','.',number_format($data->category->params->price)) }} đ
                                                        @else
                                                            {{ str_replace(',','.',number_format($data->price)) }} đ
                                                        @endif
                                                    </div>
                                                </div>
    
                                                @if(App\Library\AuthCustom::check())
                                                    <div class="table-nick-items justify-content-between d-flex">
                                                        <div class="table-properties-name">Số dư</div>
                                                        <div class="table-properties-value">
                                                            {{ str_replace(',','.',number_format(round(\App\Library\AuthCustom::user()->balance))) }} đ
                                                        </div>
                                                    </div>
                                                @endif
    
                                            </div>
                                            <div class="c-account-price-block justify-content-between d-flex">
                                                <div class="c-account-price-title">Số tiền cần thanh toán</div>
                                                    <div class="c-account-price-value">
                                                        @if(isset($data->category->params->price) && isset($data->category->params))
                                                            {{ str_replace(',','.',number_format($data->category->params->price)) }} đ
                                                        @else
                                                            {{ str_replace(',','.',number_format($data->price)) }} đ
                                                        @endif
                                                    </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="info2">
                                            <p class="c-tab-header-account">Chi tiết tài khoản #{{ $data->randId }}</p>
                                            <div class="table-nick-properties">
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
                                                    <div class="table-nick-items justify-content-between d-flex">
                                                        <div class="table-properties-name">Tướng</div>
                                                        <div class="table-properties-value">{{ $total_tuong }}</div>
                                                    </div>

                                                    <div class="table-nick-items justify-content-between d-flex">
                                                        <div class="table-properties-name">Trang phục</div>
                                                        <div class="table-properties-value">{{ $total_trangphuc }}</div>
                                                    </div>

                                                    <div class="table-nick-items justify-content-between d-flex">
                                                        <div class="table-properties-name">Linh thú TFT</div>
                                                        <div class="table-properties-value">{{ $total_linhthu }}</div>
                                                    </div>

                                                    @if(isset($data->params))
                                                        @if(isset($data->params->rank_info) && count($data->params->rank_info))

                                                            @foreach($data->params->rank_info as $key_rank => $rank_info)
                                                                @if($rank_info->queueType == "RANKED_TFT")
                                                                    <div class="table-nick-items justify-content-between d-flex">
                                                                        <div class="table-properties-name">RANKED TFT</div>
                                                                        <div class="table-properties-value">
                                                                            @if($rank_info->tier == "NONE")
                                                                                {{ $rank_info->tier }}
                                                                            @else

                                                                                {{ config('module.acc.auto_lm_rank.'.$rank_info->tier ) }} - {{ $rank_info->division }}

                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                @elseif($rank_info->queueType == "RANKED_SOLO_5x5")
                                                                    <div class="table-nick-items justify-content-between d-flex">
                                                                        <div class="table-properties-name">RANKED SOLO</div>
                                                                        <div class="table-properties-value">
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
                                                @endif

                                                @if(isset($data->groups))
                                                    <?php $att_values = $data->groups ?>

                                                    @foreach($att_values as $att_value)
                                                        @if($att_value->module == 'acc_label' && $att_value->is_slug_override == null)
                                                            @if(isset($att_value->parent))
                                                                <div class="table-nick-items justify-content-between d-flex">
                                                                    <div class="table-properties-name">{{ $att_value->parent->title??null }}</div>
                                                                    <div class="table-properties-value">
                                                                        {{ $att_value->title??null }}
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                @endif

                                                @if(isset($data->params) && isset($data->params->ext_info))
                                                    <?php $params = json_decode(json_encode($data->params->ext_info),true) ?>
                                                    @if(isset($dataAttribute))
                                                        @foreach($dataAttribute as $index=>$att)
                                                            @if($att->position == 'text')
                                                                @if(isset($att->childs))
                                                                    @foreach($att->childs as $child)
                                                                        @foreach($params as $key => $param)
                                                                            @if($key == $child->id && $child->is_slug_override == null)
                                                                                <div class="table-nick-items justify-content-between d-flex">
                                                                                    <div class="table-properties-name">{{ $child->title??'' }}</div>
                                                                                    <div class="table-properties-value">
                                                                                        {{ $param }}
                                                                                    </div>
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
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                @if(App\Library\AuthCustom::check())

                                    @if(App\Library\AuthCustom::user()->balance < $data->price)
                                    <div class="nick-footer-notify">
                                        <p style="color: #DA4343;">Số dư tài khoản không đủ để thanh toán vui lòng nạp tiền để tiếp tục giao dịch</p>
                                    </div>
                                    <div class="d-flex justify-content-center w-100">
                                        <button class="btn-nick btn-ghost" disabled>Thanh toán</button>
                                        <a href="/nap-the" class="btn-nick btn-primary">Nạp tiền</a>
                                    </div>
                                    @else
                                        <div class="nick-footer-notify">
                                            <p style="color: #1473CC;">Tài khoản của bạn chưa cấu hình ODP nên chỉ cần click vào nút xác nhận mua để hoàn tất giao dịch</p>
                                        </div>
                                        <button type="submit" class="btn-nick btn-primary loginBox__layma__button__displayabs" style="position: relative">Thanh toán</button>
                                    @endif
                                @else
                                    <button class="btn-nick btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#signin">Đăng nhập</button>
                                @endif
                            </div>
                        </form>

                </div>
            </div>
        </div>

        <div class="modal fade modal__account" role="dialog" id="successModal" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog__account" role="document">
                <div class="modal-content modal-content_accountlist">

                    <div class="modal-header">
                        <span class="nick-modal-header">Thanh toán thành công</span>
                        <img data-dismiss="modal" class="nick-modal-header-close" src="/assets/frontend/{{theme('')->theme_key}}/image/svg/close.svg" alt="">
                    </div>

                    <div class="modal-body">
                        <div class="modal-account-success-image d-flex justify-content-center w-100">
                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/group.png" alt="">
                        </div>
                        <div class="input-group nick-success-input-group" style="width: 100%">
                            <label>ID tài khoản</label>
                            <input type="text" class="form-control" style="width:100%" value="{{ $data->randId }}" readonly>
                        </div>
                        <div class="nick-notify-success-block">
                            <p>Nick của bạn được sẽ gửi tới trang Lịch sử mua Nick, vui lòng kiểm tra và đăng nhập vào Game, thay đổi mật khẩu để bảo mật cho tài khoản đã mua</p>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="d-flex justify-content-center w-100">
                            <a class="btn-nick btn-secondary" href="/">Trang chủ</a>
                            <a class="btn-nick btn-primary" href="/lich-su-mua-account">Lịch sử</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    @else
        <div class="row bs-normal pb-3 pt-3">
            <div class="col-12 text-center">
                    <span style="color: red;font-size: 16px;">
                        @if(isset($message))
                            {{ $message }}
                        @else
                            Hiện tại không có dữ liệu nào phù hợp với yêu cầu của bạn! Hệ thống cập nhật nick thường xuyên bạn vui lòng theo dõi web trong thời gian tới !
                        @endif
                    </span>
            </div>
        </div>
    @endif
@endif

<style>
    .scroll-default{
        padding-right: 4px;
        max-height: 176px;
        overflow-y: auto;
        overflow-x: hidden;
    }

    .scroll-default:hover::-webkit-scrollbar-thumb{
        background-color: #DCDEE9;
    }

    .scroll-default::-webkit-scrollbar-track
    {
        position: absolute;
        top: 100px;
        left: -60px;
        background-color:  #ffffff;
        border: none;
    }

    .scroll-default::-webkit-scrollbar
    {
        width: 8px;
        border: none;
    }

    .scroll-default::-webkit-scrollbar-thumb
    {
        /*Màu thanh sroll*/
        background: #BCBFD6;
        border-radius: 100px;
        border: none;
        margin-left: 20px;
        height: 20px;
    }

</style>
<script src="/assets/frontend/{{theme('')->theme_key}}/js/account/slider.js"></script>