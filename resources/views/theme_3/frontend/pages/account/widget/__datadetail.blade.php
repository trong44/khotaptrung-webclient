@if(isset($data))
    @if($data->status == 1)
        <section>
            <div class="container container-fix body-container-ct">

                {{--                    Web mobile --}}
                <div class="row marginauto body-container-row-ct body-container-row-mobile-ct media-web">

                    <div class="col-md-12 left-right">
                        <div class="row marginauto body-row-nick-detail-ct">

                            <div class="col-md-12 left-right">
                                <div class="row marginauto body-header-nick-detail-ct">
                                    <div class="col-auto left-right">
                                        <img class="lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/caythue.png" alt="">
                                    </div>
                                    <div class="col-md-10 col-10 body-header-col-ct">
                                        <h3>Chi tiết #{{ $data->randId }}</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 left-right">
                                <div class="row marginauto">
                                    <div class="col-lg-6 col-md-12 left-right">

                                        <div class="row marginauto">
                                            <div class="col-lg-12 col-md-12 left-right">
                                                <div class="gallery" style="overflow: hidden">
                                                    @if(isset($game_auto_props) && count($game_auto_props) && $data_category->slug == 'nick-lien-minh')
                                                        @if(isset($data->image_extension))
                                                            @php
                                                                $image_extension = explode('|',$data->image_extension);
                                                                array_push($image_extension,$data->image);
                                                                $count = 0;
                                                                foreach($image_extension as $key => $val){
                                                                    if($val != ''){
                                                                        $count = $count + 1;
                                                                    }
                                                                }
                                                            @endphp
                                                            <div class="swiper gallery-slider swiper-container-horizontal">
                                                                <div class="swiper-wrapper">
                                                                    @foreach($image_extension as $val)
                                                                        @if($val != '')
                                                                        <div class="swiper-slide">
                                                                            <a  data-target="#accDetail" data-toggle="modal" data-backdrop="static" data-keyboard="false" class="d-none d-lg-block ">

                                                                                <img onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($val)}}" alt="">
                                                                            </a>
                                                                        </div>
                                                                        @endif
                                                                    @endforeach
                                                                </div>

                                                                <div class="swiper-button-prev">
                                                                    <img class="lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/nick/back-detail.png" alt="">
                                                                </div>
                                                                <div class="swiper-button-next">
                                                                    <img class="lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/nick/pew-detail.png" alt="">
                                                                </div>
                                                            </div>
                                                        @else
                                                        <img src="{{\App\Library\MediaHelpers::media($data->image)}}" alt="" style="width: 100%">
                                                        @endif
                                                    @else
                                                        <div class="swiper gallery-slider swiper-container-horizontal">
                                                            <div class="swiper-wrapper">
                                                                @foreach(explode('|',$data->image_extension) as $val)
                                                                    @if($val != '')
                                                                    <div class="swiper-slide">
                                                                        <a  data-target="#accDetail" data-toggle="modal" data-backdrop="static" data-keyboard="false" class="d-none d-lg-block ">

                                                                            <img onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($val)}}" alt="">
                                                                        </a>
                                                                    </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>

                                                            <div class="swiper-button-prev">
                                                                <img class="lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/nick/back-detail.png" alt="">
                                                            </div>
                                                            <div class="swiper-button-next">
                                                                <img class="lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/nick/pew-detail.png" alt="">
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            @if(isset($game_auto_props) && count($game_auto_props) && $data_category->slug == 'nick-lien-minh')
                                                @if(isset($data->image_extension))
                                                    <div class="col-lg-12 col-md-12 left-right gallery-thumb-nick">
                                                        <div class="gallery-thumb" style="overflow: hidden">
                                                            <div class="swiper gallery-thumbs gallery-thumbsmaxheadth swiper-container-horizontal">
                                                                <div class="swiper-wrapper">
                                                                    @php
                                                                        $image_extension = explode('|',$data->image_extension);
                                                                        array_push($image_extension,$data->image);
                                                                        $count = 0;
                                                                        foreach($image_extension as $key => $val){
                                                                            if($val != ''){
                                                                                $count = $count + 1;
                                                                            }
                                                                        }
                                                                    @endphp
{{--                                                                    <div class="swiper-slide">--}}
{{--                                                                        <a  class="d-lg-block d-none ">--}}
{{--                                                                            <img onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($data->image)}}" alt="">--}}
{{--                                                                        </a>--}}
{{--                                                                    </div>--}}
                                                                    @foreach($image_extension as $val)
                                                                        @if($val != '')
                                                                        <div class="swiper-slide">

                                                                            <a  class="d-lg-block d-none ">
                                                                                <img onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($val)}}" alt="">
                                                                            </a>
                                                                        </div>
                                                                        @endif
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @else
                                            <div class="col-lg-12 col-md-12 left-right gallery-thumb-nick">
                                                <div class="gallery-thumb" style="overflow: hidden">
                                                    <div class="swiper gallery-thumbs gallery-thumbsmaxheadth swiper-container-horizontal">
                                                        <div class="swiper-wrapper">
                                                            @foreach(explode('|',$data->image_extension) as $val)
                                                                @if($val != '')
                                                                <div class="swiper-slide">

                                                                    <a  class="d-lg-block d-none ">
                                                                        <img onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($val)}}" alt="">
                                                                    </a>
                                                                </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            <div class="col-md-12 left-right footer-detail-account-col">
                                                <div class="row marginauto footer-detail-account">
                                                    <div class="col-lg-12 gallery-footer">
                                                        <div class="row marginauto gallery-footer-row">
                                                            <div class="col-auto left-right">
                                                                <ul>
                                                                    @if(isset($data->price) && isset($data->price_old))
                                                                        <li class="gallery-footer-fisrt-li">{{ str_replace(',','.',number_format($data->price_old)) }}đ</li>
                                                                        <li class="gallery-footer-two-li">{{ str_replace(',','.',number_format($data->price)) }}đ</li>
                                                                        @php
                                                                            $sale_percent = (($data->price_old - $data->price) / $data->price_old) * 100;
                                                                            $sale_percent = round($sale_percent, 0, PHP_ROUND_HALF_UP);
                                                                        @endphp
                                                                        <li class="gallery-footer-three-li">
                                                                            <span>Giảm {{$sale_percent}}%</span>
                                                                        </li>
                                                                    @elseif (isset($data->price))
                                                                        <li class="gallery-footer-two-li">{{ str_replace(',','.',number_format($data->price)) }}đ</li>
                                                                    @endif
                                                                </ul>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 gallery-footer-bottom">
                                                        <div class="row marginauto gallery-footer-row-bottom">
                                                            <div class="col-auto left-right">
                                                                <span>Rẻ vô đối, giá tốt nhất thị trường</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 left-right col-md-12">
                                        <div class="row marginauto">
                                            <div class="col-md-12 order-lg-1 order-12 left-right">
                                                <div class="row marginauto gallery-right">
                                                    <div class="col-md-12 left-right">
                                                        <div class="row marginauto gallery-right-top">
                                                            <div class="col-md-12 left-right gallery-last-child">

                                                                <div class="row marginauto gallery-right-top-header">
                                                                    <div class="col-md-12 left-right">
                                                                        <span>Mã số: {{ $data->randId }}</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right">
                                                                        <small>MỤC: {{ isset($data->category->custom->title) ? $data->category->custom->title :  $data->category->title }}</small>
                                                                    </div>
                                                                </div>

                                                                <div class="row marginauto gallery-right-top-title">
                                                                    <div class="col-md-12 left-right">
                                                                        <span>Thông tin acc</span>
                                                                    </div>
                                                                </div>

                                                                {{--                                                    bat dau vonh lap   --}}
                                                                <div class="row marginauto scroll-default">
                                                                    <div class="col-md-12 left-right">
                                                                        <?php
                                                                        $total = 0;
                                                                        ?>

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
                                                                                @if($total < 7)
                                                                                    <?php
                                                                                    $total = $total + 1;
                                                                                    ?>
                                                                                    <div class="row marginauto gallery-right-top-body-black gallery-right-top-body-span">
                                                                                        <div class="col-auto gallery-col-auto-left left-right">
                                                                                            <small>Tướng</small>
                                                                                        </div>
                                                                                        <div class="col-auto gallery-col-auto-right left-right d-flex justify-content-between">
                                                                                            <span>{{ $total_tuong }}</span>
                                                                                            <span class="see-modal-acc" id="show-modal-champ">Xem</span>
                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                                @if($total < 7)
                                                                                    <?php
                                                                                    $total = $total + 1;
                                                                                    ?>
                                                                                    <div class="row marginauto gallery-right-top-body-black gallery-right-top-body-span">
                                                                                        <div class="col-auto gallery-col-auto-left left-right">
                                                                                            <small>Trang phục</small>
                                                                                        </div>
                                                                                        <div class="col-auto gallery-col-auto-right left-right d-flex justify-content-between">
                                                                                            <span>{{ $total_trangphuc }}</span>
                                                                                            <span class="see-modal-acc" id="show-modal-skin">Xem</span>
                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                                @if($total < 7)
                                                                                    <?php
                                                                                    $total = $total + 1;
                                                                                    ?>
                                                                                    <div class="row marginauto gallery-right-top-body-black gallery-right-top-body-span ">
                                                                                        <div class="col-auto gallery-col-auto-left left-right">
                                                                                            <small>Linh thú TFT</small>
                                                                                        </div>
                                                                                        <div class="col-auto gallery-col-auto-right left-right  d-flex justify-content-between">
                                                                                            <span>{{ $total_linhthu }}</span>
                                                                                            <span class="see-modal-acc" id="show-modal-animal">Xem</span>
                                                                                        </div>
                                                                                    </div>
                                                                                @endif

                                                                                @if(isset($data->params))
                                                                                    @if(isset($data->params->rank_info) && count($data->params->rank_info))

                                                                                        @foreach($data->params->rank_info as $key_rank => $rank_info)
                                                                                            @if($rank_info->queueType == "RANKED_TFT")
                                                                                                @if($total < 7)
                                                                                                    <?php
                                                                                                    $total = $total + 1;
                                                                                                    ?>
                                                                                                    <div class="row marginauto gallery-right-top-body-black gallery-right-top-body-span">
                                                                                                        <div class="col-auto gallery-col-auto-left left-right">
                                                                                                            <small>RANKED TFT</small>
                                                                                                        </div>
                                                                                                        <div class="col-auto gallery-col-auto-right left-right">
                                                                                                    <span>
                                                                                                        @if($rank_info->tier == "NONE")
                                                                                                            CHƯA CÓ RANK
                                                                                                        @else
                                                                                                            {{ config('module.acc.auto_lm_rank.'.$rank_info->tier ) }} - {{ $rank_info->division }}
                                                                                                        @endif
                                                                                                    </span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endif
                                                                                            @elseif($rank_info->queueType == "RANKED_SOLO_5x5")
                                                                                                @if($total < 7)
                                                                                                    <?php
                                                                                                    $total = $total + 1;
                                                                                                    ?>
                                                                                                    <div class="row marginauto gallery-right-top-body-black gallery-right-top-body-span">
                                                                                                        <div class="col-auto gallery-col-auto-left left-right">
                                                                                                            <small>RANKED SOLO</small>
                                                                                                        </div>
                                                                                                        <div class="col-auto gallery-col-auto-right left-right">
                                                                                                    <span>
                                                                                                        @if($rank_info->tier == "NONE")
                                                                                                            CHƯA CÓ RANK
                                                                                                        @else
                                                                                                            {{ config('module.acc.auto_lm_rank.'.$rank_info->tier ) }} - {{ $rank_info->division }}
                                                                                                        @endif
                                                                                                    </span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endif
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
                                                                                        <?php
                                                                                        $total = $total + 1;
                                                                                        ?>
                                                                                    <div class="row marginauto gallery-right-top-body-black gallery-right-top-body-span">
                                                                                        <div class="col-auto gallery-col-auto-left left-right">
                                                                                            <small>Server</small>
                                                                                        </div>
                                                                                        <div class="col-auto gallery-col-auto-right left-right">
                                                                                    <span>
                                                                                        {{ $server??null }}
                                                                                    </span>
                                                                                        </div>
                                                                                    </div>

                                                                                @endif
                                                                                @if(isset($info) && count($info))
                                                                                    @foreach($info as $ke => $in)
                                                                                        @if(in_array($in->name,config('module.acc.auto_ninja_tt')))
                                                                                                <?php
                                                                                                $total = $total + 1;
                                                                                                ?>
                                                                                            <div class="row marginauto gallery-right-top-body-black gallery-right-top-body-span">
                                                                                                <div class="col-auto gallery-col-auto-left left-right">
                                                                                                    <small>{{ $in->name??'' }}</small>
                                                                                                </div>
                                                                                                <div class="col-auto gallery-col-auto-right left-right">
                                                                                    <span>
                                                                                        @if($in->name == 'Yên')
                                                                                            {{ str_replace(',','.',number_format($in->value??'')) }}
                                                                                        @else
                                                                                            {{ $in->value??'' }}
                                                                                        @endif
                                                                                    </span>
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
                                                                                    <?php
                                                                                    $total = $total + 1;
                                                                                    ?>
                                                                                    <div class="row marginauto gallery-right-top-body-black gallery-right-top-body-span">
                                                                                        <div class="col-auto gallery-col-auto-left left-right">
                                                                                            <small>Server</small>
                                                                                        </div>
                                                                                        <div class="col-auto gallery-col-auto-right left-right">
                                                                                            <span>
                                                                                                {{ $server??null }}
                                                                                            </span>
                                                                                        </div>
                                                                                    </div>

                                                                                @endif
                                                                                @if(isset($info) && count($info))
                                                                                    @foreach($info as $ke => $in)
                                                                                        @if(in_array($in->name,config('module.acc.auto_nro_tt')))

                                                                                            @if($in->name == 'Skill Pet' || $in->name == 'Cải trang')
                                                                                                @if($in->name == 'Skill Pet')
                                                                                                    @if(isset($in->value) && count($in->value) )
                                                                                                        @foreach($in->value as $k_value => $value)
                                                                                                            @if($k_value != 0)
                                                                                                                <?php
                                                                                                                $total = $total + 1;
                                                                                                                ?>
                                                                                                                <div class="row marginauto gallery-right-top-body-black gallery-right-top-body-span">
                                                                                                                    <div class="col-auto gallery-col-auto-left left-right">
                                                                                                                        <small>Skill {{ $k_value + 1 }}</small>
                                                                                                                    </div>
                                                                                                                    <div class="col-auto gallery-col-auto-right left-right">
                                                                                                                        <span>
                                                                                                                            {{ $value->name }} - {{ $value->value }}
                                                                                                                        </span>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            @endif
                                                                                                        @endforeach
                                                                                                    @endif
                                                                                                @elseif($in->name == 'Cải trang')
                                                                                                    <?php
                                                                                                    $total = $total + 1;
                                                                                                    ?>
                                                                                                    <div class="row marginauto gallery-right-top-body-black gallery-right-top-body-span">
                                                                                                        <div class="col-auto gallery-col-auto-left left-right">
                                                                                                            <small>{{ $in->name??'' }}</small>
                                                                                                        </div>
                                                                                                        <div class="col-auto gallery-col-auto-right left-right">
                                                                                                            <span>
                                                                                                                @if(isset($in->value) && count($in->value) )
                                                                                                                    @foreach($in->value as $value)
                                                                                                                        {{ $value }} <br>
                                                                                                                    @endforeach
                                                                                                                @endif
                                                                                                            </span>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                @endif
                                                                                            @elseif($in->name == 'Hành tinh' || $in->name == 'Bông tai')
                                                                                                <?php
                                                                                                $total = $total + 1;
                                                                                                ?>
                                                                                                <div class="row marginauto gallery-right-top-body-black gallery-right-top-body-span">
                                                                                                    <div class="col-auto gallery-col-auto-left left-right">
                                                                                                        <small>{{ $in->name??'' }}</small>
                                                                                                    </div>
                                                                                                    <div class="col-auto gallery-col-auto-right left-right">
                                                                                                        <span>
                                                                                                            {{ $in->value }}
                                                                                                        </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            @endif

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
                                                                                        @if($total < 7)
                                                                                            <?php
                                                                                            $total = $total + 1;
                                                                                            ?>
                                                                                            <div class="row marginauto gallery-right-top-body-black gallery-right-top-body-span">
                                                                                                <div class="col-auto gallery-col-auto-left left-right">
                                                                                                    <small>{{ $att_value->parent->title??null }}</small>
                                                                                                </div>
                                                                                                <div class="col-auto gallery-col-auto-right left-right">
                                                                                                    <span>{{ $att_value->title??null }}</span>
                                                                                                </div>
                                                                                            </div>
                                                                                        @endif
                                                                                    @endif
                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                        @if($total < 7)

                                                                            @if(isset($data->params) && isset($data->params->ext_info))
                                                                                <?php $params = json_decode(json_encode($data->params->ext_info),true) ?>
                                                                                @if(isset($dataAttribute))
                                                                                    @foreach($dataAttribute as $index=>$att)
                                                                                        @if($att->position == 'text')
                                                                                            @if(isset($att->childs))
                                                                                                @foreach($att->childs as $child)
                                                                                                    @foreach($params as $key => $param)
                                                                                                        <?php
                                                                                                        $total = $total + 1;
                                                                                                        ?>
                                                                                                        @if($key == $child->id && $child->is_slug_override == null)

                                                                                                            <div class="row marginauto gallery-right-top-body-black gallery-right-top-body-span">
                                                                                                                <div class="col-auto gallery-col-auto-left left-right">
                                                                                                                    <small>{{ $child->title??'' }}</small>
                                                                                                                </div>
                                                                                                                <div class="col-auto gallery-col-auto-right left-right">
                                                                                                                    <span>{{ $param }}</span>
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

                                                                        @endif

                                                                        @if ($total < 7)
                                                                            @for ($i = 0; $i < 7 - $total; $i++)
                                                                                <div class="row marginauto gallery-right-top-body-black gallery-right-top-body-span"></div>
                                                                            @endfor
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 order-lg-12 order-1 left-right">
                                                <div class="row marginauto justify-content-center gallery-right-footer">

                                                    <div class="col-md-12 col-12 nick-detail-purchase-button">
                                                        <div class="row marginauto">
                                                            <div class="col-md-12 left-right">
                                                                @if (App\Library\AuthCustom::check())
                                                                    <button type="button" class="button-default-nick-ct btn-mua-ngay media-web">Mua ngay</button>
                                                                @else
                                                                    <button type="button" class="button-default-nick-ct btn-mua-ngay media-web" onclick="openLoginModal();">Mua ngay</button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row marginauto justify-content-center gallery-right-footer">
                                                    @if(isset($card_percent))
                                                        @if($card_percent == 0)
                                                            <div class="col-md-6 col-6 modal-footer-success-col-left-ct">
                                                                <div class="row marginauto nick-detail-button btn-open-recharge" data-tab="1">
                                                                    <div class="col-md-12 left-right">
                                                                        <a href="javascript:void(0);" class="button-not-bg-ct">
                                                                            <ul>
                                                                                <li><small>Thẻ cào</small></li>
                                                                                <li><span>{{ str_replace(',','.',number_format(round($data->price))) }} CARD</span></li>
                                                                            </ul>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else

                                                        @endif
                                                    @else
                                                        <div class="col-md-6 col-6 modal-footer-success-col-left-ct">
                                                            <div class="row marginauto nick-detail-button btn-open-recharge" data-tab="1">
                                                                <div class="col-md-12 left-right">
                                                                    <a href="javascript:void(0);" class="button-not-bg-ct">
                                                                        <ul>
                                                                            <li><small>Thẻ cào</small></li>
                                                                            <li><span>{{ str_replace(',','.',number_format(round($data->price))) }} CARD</span></li>
                                                                        </ul>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif

                                                    @if(isset($data->price_atm))
                                                        <div class="col-md-6 col-6 modal-footer-success-col-right-ct">
                                                            <div class="row marginauto nick-detail-button btn-open-recharge" data-tab="2">
                                                                <div class="col-md-12 left-right">
                                                                    <a href="javascript:void(0);" class="button-not-bg-ct">
                                                                        <ul>
                                                                            <li><small>ATM, Momo</small></li>
                                                                            <li><span>{{ str_replace(',','.',number_format(round($data->price_atm))) }} ATM</span></li>


                                                                        </ul>
                                                                    </a>

                                                                </div>
                                                            </div>
                                                        </div>
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

                {{--                    Mobile    --}}
                <div class="row marginauto body-container-row-ct body-container-row-mobile-ct media-mobile">

                    <div class="col-md-12 left-right">
                        <div class="row marginauto body-row-nick-detail-ct">
                            <div class="col-md-12 left-right">
                                <div class="row marginauto body-header-nick-detail-title-mobile body-header-nick-detail-ct">
                                    <div class="col-auto left-right">
                                        <img class="lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/caythue.png" alt="">
                                    </div>
                                    <div class="col-md-10 col-10 body-header-col-ct">
                                        <h1>Chi tiết #{{ $data->randId }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 left-right">
                        <div class="gallery" style="overflow: hidden">
                            @if(isset($game_auto_props) && count($game_auto_props) && $data_category->slug == 'nick-lien-minh')
                                @if(isset($data->image_extension))

                                    <div class="swiper gallery-slider-mobile swiper-container-horizontal">
                                        @php
                                            $image_extension = explode('|',$data->image_extension);
                                            array_push($image_extension,$data->image);
                                            $count = 0;
                                            foreach($image_extension as $key => $val){
                                                if($val != ''){
                                                    $count = $count + 1;
                                                }
                                            }
                                        @endphp
                                        <div class="swiper-wrapper">
                                            @foreach($image_extension as $key => $val)
                                                @if($val != '')
                                                <div class="swiper-slide">
                                                    <a data-fancybox="gallerycoverDetail" href="{{\App\Library\MediaHelpers::media($val)}}" class="d-lg-none">
                                                        <img onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($val)}}" alt="">
                                                    </a>
                                                </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @else
                                <img src="{{\App\Library\MediaHelpers::media($data->image)}}" alt="" style="width: 100%">
                                @endif
                            @else
                                <div class="swiper gallery-slider-mobile swiper-container-horizontal">
                                    <div class="swiper-wrapper">
                                        @foreach(explode('|',$data->image_extension) as $key => $val)
                                            @if($val != '')
                                            <div class="swiper-slide">
                                                <a data-fancybox="gallerycoverDetail" href="{{\App\Library\MediaHelpers::media($val)}}" class="d-lg-none">
                                                    <img onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($val)}}" alt="">
                                                </a>
                                            </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12 left-right">
                        <div class="row marginauto body-row-nick-detail-ct">
                            <div class="col-md-12 left-right">
                                <div class="row marginauto">
                                    <div class="col-12 left-right">
                                        <div class="row marginauto">
                                            @if(isset($game_auto_props) && count($game_auto_props) && $data_category->slug == 'nick-lien-minh')
                                                @if(isset($data->image_extension))
                                                    @php
                                                        $image_extension = explode('|',$data->image_extension);
                                                        array_push($image_extension,$data->image);
                                                        $count = 0;
                                                        foreach($image_extension as $key => $val){
                                                            if($val != ''){
                                                                $count = $count + 1;
                                                            }
                                                        }
                                                    @endphp
                                                    <div class="col-lg-12 col-md-12 left-right gallery-thumb-nick">
                                                        <div class="gallery-thumb" style="overflow: hidden">
                                                            <div class="swiper gallery-thumbs-mobile gallery-thumbsmaxheadth swiper-container-horizontal">
                                                                <div class="swiper-wrapper">

                                                                    @foreach($image_extension as $val)
                                                                        @if($val != '')
                                                                            <div class="swiper-slide">
                                                                                <a class="" >
                                                                                    <div class="row marginauto">
                                                                                        <div class="col-md-12 left-right default-overlay-ct swiper-slide-col">
                                                                                            <img src="{{\App\Library\MediaHelpers::media($val)}}" alt="" class="lazy">
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @else
                                            <div class="col-lg-12 col-md-12 left-right gallery-thumb-nick">
                                                <div class="gallery-thumb" style="overflow: hidden">
                                                    <div class="swiper gallery-thumbs-mobile gallery-thumbsmaxheadth swiper-container-horizontal">
                                                        <div class="swiper-wrapper">
                                                            @foreach(explode('|',$data->image_extension) as $val)
                                                                @if($val != '')
                                                                <div class="swiper-slide">
                                                                    <a class="" >
                                                                        <div class="row marginauto">
                                                                            <div class="col-md-12 left-right default-overlay-ct swiper-slide-col">
                                                                                <img src="{{\App\Library\MediaHelpers::media($val)}}" alt="" class="lazy">
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            <div class="col-md-12 left-right footer-detail-account-col">
                                                <div class="row marginauto footer-detail-account">
                                                    <div class="col-lg-12 gallery-footer">
                                                        <div class="row marginauto gallery-footer-row">
                                                            <div class="col-auto left-right">
                                                                <ul>
                                                                    @if(isset($data->price) && isset($data->price_old))
                                                                        <li class="gallery-footer-fisrt-li">{{ str_replace(',','.',number_format($data->price_old)) }}đ</li>
                                                                        <li class="gallery-footer-two-li">{{ str_replace(',','.',number_format($data->price)) }}đ</li>
                                                                        @php
                                                                            $sale_percent = (($data->price_old - $data->price) / $data->price_old) * 100;
                                                                            $sale_percent = round($sale_percent, 0, PHP_ROUND_HALF_UP);
                                                                        @endphp
                                                                        <li class="gallery-footer-three-li">
                                                                            <span>Giảm {{$sale_percent}}%</span>
                                                                        </li>
                                                                    @elseif (isset($data->price))
                                                                        <li class="gallery-footer-two-li">{{ str_replace(',','.',number_format($data->price)) }}đ</li>
                                                                    @endif
                                                                </ul>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 gallery-footer-bottom">
                                                        <div class="row marginauto gallery-footer-row-bottom">
                                                            <div class="col-auto left-right">
                                                                <span>Rẻ vô đối, giá tốt nhất thị trường</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 left-right">
                                        <div class="row marginauto">
                                            <div class="col-md-12 order-lg-1 order-12 left-right">
                                                <div class="row marginauto gallery-right">
                                                    <div class="col-md-12 left-right">
                                                        <div class="row marginauto gallery-right-top">
                                                            <div class="col-md-12 left-right gallery-last-child">

                                                                <div class="row marginauto gallery-right-top-header">
                                                                    <div class="col-md-12 left-right">
                                                                        <span>Mã số: {{ $data->randId }}</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right">
                                                                        <small>MỤC: {{ isset($data->category->custom->title) ? $data->category->custom->title :  $data->category->title }}</small>
                                                                    </div>
                                                                </div>

                                                                <div class="row marginauto gallery-right-top-title">
                                                                    <div class="col-md-12 left-right">
                                                                        <span>Thông tin acc</span>
                                                                    </div>
                                                                </div>
                                                                @if(isset($game_auto_props) && count($game_auto_props))
                                                                    @if($data_category->slug == 'nick-lien-minh')
                                                                        <div class="row marginauto gallery-right-top-body-black gallery-right-top-body-span">
                                                                            <div class="col-auto gallery-col-auto-left left-right">
                                                                                <small>Tướng</small>
                                                                            </div>
                                                                            <div class="col-auto gallery-col-auto-right left-right d-flex justify-content-between">
                                                                                <span>{{ $total_tuong }}</span>
                                                                                <span class="see-modal-acc" id="show-modal-champ">Xem</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row marginauto gallery-right-top-body-black gallery-right-top-body-span">
                                                                            <div class="col-auto gallery-col-auto-left left-right">
                                                                                <small>Trang phục</small>
                                                                            </div>
                                                                            <div class="col-auto gallery-col-auto-right left-right d-flex justify-content-between">
                                                                                <span>{{ $total_trangphuc }}</span>
                                                                                <span class="see-modal-acc" id="show-modal-skin">Xem</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row marginauto gallery-right-top-body-black gallery-right-top-body-span ">
                                                                            <div class="col-auto gallery-col-auto-left left-right">
                                                                                <small>Linh thú TFT</small>
                                                                            </div>
                                                                            <div class="col-auto gallery-col-auto-right left-right  d-flex justify-content-between">
                                                                                <span>{{ $total_linhthu }}</span>
                                                                                <span class="see-modal-acc" id="show-modal-animal">Xem</span>
                                                                            </div>
                                                                        </div>

                                                                        @if(isset($data->params))
                                                                            @if(isset($data->params->rank_info) && count($data->params->rank_info))

                                                                                @foreach($data->params->rank_info as $key_rank => $rank_info)
                                                                                    @if($rank_info->queueType == "RANKED_TFT")
                                                                                        <div class="row marginauto gallery-right-top-body-black gallery-right-top-body-span">
                                                                                            <div class="col-auto gallery-col-auto-left left-right">
                                                                                                <small>RANKED TFT</small>
                                                                                            </div>
                                                                                            <div class="col-auto gallery-col-auto-right left-right">
                                                                                                <span>
                                                                                                    @if($rank_info->tier == "NONE")
                                                                                                        CHƯA CÓ RANK
                                                                                                    @else
                                                                                                        {{ config('module.acc.auto_lm_rank.'.$rank_info->tier ) }} - {{ $rank_info->division }}
                                                                                                    @endif
                                                                                                </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    @elseif($rank_info->queueType == "RANKED_SOLO_5x5")
                                                                                        <div class="row marginauto gallery-right-top-body-black gallery-right-top-body-span">
                                                                                            <div class="col-auto gallery-col-auto-left left-right">
                                                                                                <small>RANKED SOLO</small>
                                                                                            </div>
                                                                                            <div class="col-auto gallery-col-auto-right left-right">
                                                                                                <span>
                                                                                                    @if($rank_info->tier == "NONE")
                                                                                                        CHƯA CÓ RANK
                                                                                                    @else
                                                                                                        {{ config('module.acc.auto_lm_rank.'.$rank_info->tier ) }} - {{ $rank_info->division }}
                                                                                                    @endif
                                                                                                </span>
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
                                                                            <div class="row marginauto gallery-right-top-body-black gallery-right-top-body-span">
                                                                                <div class="col-auto gallery-col-auto-left left-right">
                                                                                    <small>Server</small>
                                                                                </div>
                                                                                <div class="col-auto gallery-col-auto-right left-right d-flex justify-content-between">
                                                                                    <span>{{ $server??null }}</span>
                                                                                </div>
                                                                            </div>

                                                                        @endif
                                                                        @if(isset($info) && count($info))
                                                                            @foreach($info as $ke => $in)
                                                                                @if(in_array($in->name,config('module.acc.auto_ninja_tt')))

                                                                                    <div class="row marginauto gallery-right-top-body-black gallery-right-top-body-span">
                                                                                        <div class="col-auto gallery-col-auto-left left-right">
                                                                                            <small>{{ $in->name??'' }}</small>
                                                                                        </div>
                                                                                        <div class="col-auto gallery-col-auto-right left-right d-flex justify-content-between">
                                                                                            <span>@if($in->name == 'Yên')
                                                                                                    {{ str_replace(',','.',number_format($in->value??'')) }}
                                                                                                @else
                                                                                                    {{ $in->value??'' }}
                                                                                                @endif</span>
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
                                                                            <div class="row marginauto gallery-right-top-body-black gallery-right-top-body-span">
                                                                                <div class="col-auto gallery-col-auto-left left-right">
                                                                                    <small>Server</small>
                                                                                </div>
                                                                                <div class="col-auto gallery-col-auto-right left-right d-flex justify-content-between">
                                                                                    <span>{{ $server??null }}</span>
                                                                                </div>
                                                                            </div>

                                                                        @endif
                                                                        @if(isset($info) && count($info))
                                                                            @foreach($info as $ke => $in)
                                                                                @if(in_array($in->name,config('module.acc.auto_nro_tt')))

                                                                                    @if($in->name == 'Skill Pet' || $in->name == 'Cải trang')
                                                                                        @if($in->name == 'Skill Pet')
                                                                                            @if(isset($in->value) && count($in->value) )
                                                                                                @foreach($in->value as $k_value => $value)
                                                                                                    @if($k_value != 0)
                                                                                                        <div class="row marginauto gallery-right-top-body-black gallery-right-top-body-span">
                                                                                                            <div class="col-auto gallery-col-auto-left left-right">
                                                                                                                <small>Skill {{ $k_value + 1 }}</small>
                                                                                                            </div>
                                                                                                            <div class="col-auto gallery-col-auto-right left-right">
                                                                                                                <span>
                                                                                                                    {{ $value->name }} - {{ $value->value }}
                                                                                                                </span>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                    @endif
                                                                                                @endforeach
                                                                                            @endif
                                                                                        @elseif($in->name == 'Cải trang')
                                                                                            <div class="row marginauto gallery-right-top-body-black gallery-right-top-body-span">
                                                                                                <div class="col-auto gallery-col-auto-left left-right">
                                                                                                    <small>{{ $in->name??'' }}</small>
                                                                                                </div>
                                                                                                <div class="col-auto gallery-col-auto-right left-right">
                                                                                                    <span>
                                                                                                        @if(isset($in->value) && count($in->value) )
                                                                                                            @foreach($in->value as $value)
                                                                                                                {{ $value }} <br>
                                                                                                            @endforeach
                                                                                                        @endif
                                                                                                    </span>
                                                                                                </div>
                                                                                            </div>

                                                                                        @endif
                                                                                    @elseif($in->name == 'Hành tinh' || $in->name == 'Bông tai')
                                                                                        <div class="row marginauto gallery-right-top-body-black gallery-right-top-body-span">
                                                                                            <div class="col-auto gallery-col-auto-left left-right">
                                                                                                <small>{{ $in->name??'' }}</small>
                                                                                            </div>
                                                                                            <div class="col-auto gallery-col-auto-right left-right">
                                                                                                <span>
                                                                                                    {{ $in->value }}
                                                                                                </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    @endif

                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    @endif
                                                                @else

                                                                @endif
                                                                {{--                                                    bat dau vonh lap   --}}
                                                                @if(isset($data->groups))
                                                                    <?php $att_values = $data->groups ?>
                                                                    @foreach($att_values as $att_value)
                                                                        @if(isset($att_value->module) && $att_value->module == 'acc_label' && $att_value->is_slug_override == null)
                                                                            @if(isset($att_value->parent))
                                                                                <div class="row marginauto gallery-right-top-body-black gallery-right-top-body-span">
                                                                                    <div class="col-auto gallery-col-auto-left left-right">
                                                                                        <small>{{ $att_value->parent->title??null }}</small>
                                                                                    </div>
                                                                                    <div class="col-auto gallery-col-auto-right left-right">
                                                                                        <span>{{ $att_value->title??null }}</span>
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

                                                                                                <div class="row marginauto gallery-right-top-body-black gallery-right-top-body-span">
                                                                                                    <div class="col-auto gallery-col-auto-left left-right">
                                                                                                        <small>{{ $child->title??'' }}</small>
                                                                                                    </div>
                                                                                                    <div class="col-auto gallery-col-auto-right left-right">
                                                                                                        <span>{{ $param }}</span>
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
                                            <div class="col-md-12 order-lg-12 order-1 left-right">
                                                <div class="row marginauto justify-content-center gallery-right-footer">
                                                    {{-- <div class="col-md-6 col-6 modal-footer-success-col-left-ct">
                                                        <div class="row marginauto">
                                                            <div class="col-md-12 left-right">
                                                                <button type="button" class="button-default-not-nick-ct media-web">Trả góp</button>
                                                                <button type="button" class="button-default-not-nick-ct media-mobile button-next-step-one-tra-gop">Trả góp</button>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                    <div class="col-md-12 col-12 modal-footer-success-col-right-ct" style="padding: 0 !important">
                                                        <div class="row marginauto">
                                                            <div class="col-md-12 left-right">
                                                                @if (App\Library\AuthCustom::check())
                                                                    <button type="button" class="button-default-nick-ct media-mobile button-next-step-one">Mua ngay</button>
                                                                @else
                                                                    <button type="button" class="button-default-nick-ct media-mobile" onclick="openLoginModal();">Mua ngay</button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                @if(isset($card_percent))
                                                    <div class="row marginauto justify-content-center gallery-right-footer">
                                                        <div class="col-md-6 col-6 modal-footer-success-col-left-ct">
                                                            <div class="row marginauto nick-detail-button btn-open-recharge" data-tab="1">
                                                                <div class="col-md-12 left-right">
                                                                    <a href="/nap-the" class="button-not-bg-ct">
                                                                        <ul>
                                                                            <li><small>Thẻ cào</small></li>
                                                                            <li><span>{{ str_replace(',','.',number_format(round($data->price))) }} CARD</span></li>
                                                                        </ul>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-6 modal-footer-success-col-right-ct">
                                                            <div class="row marginauto nick-detail-button btn-open-recharge" data-tab="2">
                                                                <div class="col-md-12 left-right">
                                                                    <a href="/recharge-atm" class="button-not-bg-ct">
                                                                        <ul>
                                                                            <li><small>ATM, Momo</small></li>
                                                                            @if(isset($data->price_atm))
                                                                                <li><span>{{ str_replace(',','.',number_format(round($data->price_atm))) }} ATM</span></li>
                                                                            @endif
                                                                        </ul>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="row marginauto justify-content-center gallery-right-footer">
                                                        <div class="col-md-12 col-12 modal-footer-success-col-right-ct">
                                                            <div class="row marginauto nick-detail-button btn-open-recharge" data-tab="2">
                                                                <div class="col-md-12 left-right">
                                                                    <a href="/" class="button-not-bg-ct">
                                                                        <ul>
                                                                            <li><small>ATM, Momo</small></li>
                                                                            @if(formatPrice($data->price) == '')
                                                                                <li><span>{{ round($data->price) }} ATM</span></li>
                                                                            @else
                                                                                <li><span>{{ str_replace(',','.',number_format($data->price)) }} ATM</span></li>
                                                                            @endif
                                                                        </ul>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
        </section>
        @if(isset($data->description))
            <section>
                <div class="container container-fix body-container-ct">
                    <div class="row marginauto body-container-row-ct">
                        <div class="col-md-12 left-right detailViewBlock">
                            <div class="row marginauto body-row-ct footer-row-ct">
                                <div class="col-md-12 left-right">
                                    <span class="detailViewBlockTitle">Mô tả sản phẩm {{ isset($data->category->custom->title) ? $data->category->custom->title :  $data->category->title }} | Mã số: {{ $data->randId }}</span>
                                </div>
                                @if(substr($data->description,1200))
                                <div class="col-md-12 left-right footer-row-col-ct content-video-in content-video-in-add detailViewBlockContent">
                                @else
                                <div class="col-md-12 left-right footer-row-col-ct content-video-in detailViewBlockContent">
                                @endif
                                    {!! $data->description !!}
                                </div>

                                @if(substr($data->description,1200))
                                <div class="col-md-12 left-right text-center js-toggle-content">
                                    <div class="view-more">
                                        <a href="javascript:void(0)" class="global__link__default">Xem thêm<i class="__icon__default --sm__default --link__default ml-1" style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/svg/xemthem.svg)"></i></a>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        @endif

        @if (App\Library\AuthCustom::check())
            <div class="modal fade login show order-modal" id="openOrder" aria-modal="true">

                <div class="modal-dialog step-tab-panel modal-lg modal-dialog-centered login animated">
                    <!--        <div class="image-login"></div>-->
                    <div class="modal-content">
                        <form class="formDonhangAccount" action="/ajax/acc/{{ $data->randId }}/databuy" method="POST" data-id="{{ $data->id }}">
                            {{ csrf_field() }}
                            <div class="modal-header p-0" style="border-bottom: 0">
                                <div class="row marginauto modal-header-order-ct">
                                    <div class="col-12 span__donhang text-center" style="position: relative">
                                        <span>Xác nhận thanh toán</span>
                                        <img class="img-close-ct close-modal-default" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/close.png" alt="">
                                    </div>
                                </div>

                            </div>

                            <div class="modal-body modal-body-order-ct">
                                <div class="row marginauto">
                                    <div class="col-md-12 left-right title-order-ct">
                                        <span>Thông tin acc</span>
                                    </div>
                                    <div class="col-md-12 left-right padding-order-ct">
                                        <div class="row marginauto">
                                            <div class="col-md-12 left-right background-order-ct">
                                                <div class="row marginauto background-order-row-ct">
                                                    <div class="col-auto left-right background-order-col-left-ct">
                                                        <span>Tài khoản</span>
                                                    </div>
                                                    <div class="col-auto left-right background-order-col-right-ct">
                                                        <small>{{ App\Library\AuthCustom::getName() }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 left-right padding-order-ct">
                                        <div class="row marginauto">
                                            <div class="col-md-12 left-right background-order-ct">
                                                <div class="row marginauto background-order-body-row-ct">
                                                    <div class="col-auto left-right background-order-col-left-ct">
                                                        <span>Nhà phát hành</span>
                                                    </div>
                                                    <div class="col-auto left-right background-order-col-right-ct">
                                                        @if(isset($data->params))
                                                            @if(isset($data->params->rank_info) && count($data->params->rank_info))
                                                                <small>Garena</small>
                                                            @else
                                                                <small>
                                                                    @if (isset($data->groups[0]))
                                                                        {{ $data->groups[0]->title }}
                                                                    @endif
                                                                </small>
                                                            @endif
                                                        @endif

                                                    </div>
                                                </div>

                                                <div class="row marginauto background-order-body-row-ct">
                                                    <div class="col-auto left-right background-order-col-left-ct">
                                                        <span>Tên game</span>
                                                    </div>
                                                    <div class="col-auto left-right background-order-col-right-ct">
                                                        <small>{{ isset($data->category->custom->title) ? $data->category->custom->title :  $data->category->title }}</small>
                                                    </div>
                                                </div>

                                                <div class="row marginauto background-order-body-row-ct">
                                                    <div class="col-auto left-right background-order-col-left-ct">
                                                        <span>Giá tiền</span>
                                                    </div>
                                                    <div class="col-auto left-right background-order-col-right-ct">
                                                        <small>
                                                            @if(isset($data->category->params->price) && isset($data->category->params))
                                                                {{ str_replace(',','.',number_format($data->category->params->price)) }} đ
                                                            @else
                                                                {{ str_replace(',','.',number_format($data->price)) }} đ
                                                            @endif
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-12 left-right padding-order-ct">
                                        <div class="row marginauto">
                                            <div class="col-md-12 left-right background-order-ct">
                                                @if(isset($game_auto_props) && count($game_auto_props))
                                                    @if($data_category->slug == 'nick-lien-minh')
                                                        <div class="row marginauto background-order-body-row-ct">
                                                            <div class="col-auto left-right background-order-col-left-ct">
                                                                <span>Tướng</span>
                                                            </div>
                                                            <div class="col-auto left-right background-order-col-right-ct">
                                                                <small>{{ $total_tuong }}</small>
                                                            </div>
                                                        </div>
                                                        <div class="row marginauto background-order-body-row-ct">
                                                            <div class="col-auto left-right background-order-col-left-ct">
                                                                <span>Trang phục</span>
                                                            </div>
                                                            <div class="col-auto left-right background-order-col-right-ct">
                                                                <small>{{ $total_trangphuc }}</small>
                                                            </div>
                                                        </div>
                                                        <div class="row marginauto background-order-body-row-ct">
                                                            <div class="col-auto left-right background-order-col-left-ct">
                                                                <span>Linh thú TFT</span>
                                                            </div>
                                                            <div class="col-auto left-right background-order-col-right-ct">
                                                                <small>{{ $total_linhthu }}</small>
                                                            </div>
                                                        </div>

                                                        @if(isset($data->params))
                                                            @if(isset($data->params->rank_info) && count($data->params->rank_info))

                                                                @foreach($data->params->rank_info as $key_rank => $rank_info)
                                                                    @if($rank_info->queueType == "RANKED_TFT")
                                                                        <div class="row marginauto background-order-body-row-ct">
                                                                            <div class="col-auto left-right background-order-col-left-ct">
                                                                                <span>RANKED TFT</span>
                                                                            </div>
                                                                            <div class="col-auto left-right background-order-col-right-ct">
                                                                                <small>
                                                                                    @if($rank_info->tier == "NONE")
                                                                                        CHƯA CÓ RANK
                                                                                    @else
                                                                                        {{ config('module.acc.auto_lm_rank.'.$rank_info->tier ) }} - {{ $rank_info->division }}
                                                                                    @endif
                                                                                </small>
                                                                            </div>
                                                                        </div>
                                                                    @elseif($rank_info->queueType == "RANKED_SOLO_5x5")
                                                                        <div class="row marginauto background-order-body-row-ct">
                                                                            <div class="col-auto left-right background-order-col-left-ct">
                                                                                <span>RANKED SOLO</span>
                                                                            </div>
                                                                            <div class="col-auto left-right background-order-col-right-ct">
                                                                                <small>
                                                                                    @if($rank_info->tier == "NONE")
                                                                                        CHƯA CÓ RANK
                                                                                    @else
                                                                                        {{ config('module.acc.auto_lm_rank.'.$rank_info->tier ) }} - {{ $rank_info->division }}
                                                                                    @endif
                                                                                </small>
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

                                                            <div class="row marginauto background-order-body-row-ct">
                                                                <div class="col-auto left-right background-order-col-left-ct">
                                                                    <span>Server</span>
                                                                </div>
                                                                <div class="col-auto left-right background-order-col-right-ct">
                                                                    <small>{{ $server??null }}</small>
                                                                </div>
                                                            </div>

                                                        @endif
                                                        @if(isset($info) && count($info))
                                                            @foreach($info as $ke => $in)
                                                                @if(in_array($in->name,config('module.acc.auto_ninja_tt')))
                                                                    <div class="row marginauto background-order-body-row-ct">
                                                                        <div class="col-auto left-right background-order-col-left-ct">
                                                                            <span>{{ $in->name??'' }}</span>
                                                                        </div>
                                                                        <div class="col-auto left-right background-order-col-right-ct">
                                                                            <small>@if($in->name == 'Yên')
                                                                                    {{ str_replace(',','.',number_format($in->value??'')) }}
                                                                                @else
                                                                                    {{ $in->value??'' }}
                                                                                @endif</small>
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

                                                            <div class="row marginauto background-order-body-row-ct">
                                                                <div class="col-auto left-right background-order-col-left-ct">
                                                                    <span>Server</span>
                                                                </div>
                                                                <div class="col-auto left-right background-order-col-right-ct">
                                                                    <small>{{ $server??null }}</small>
                                                                </div>
                                                            </div>

                                                        @endif
                                                        @if(isset($info) && count($info))
                                                            @foreach($info as $ke => $in)
                                                                @if(in_array($in->name,config('module.acc.auto_nro_tt')))
                                                                    
                                                                    @if($in->name == 'Skill Pet' || $in->name == 'Cải trang')
                                                                        @if($in->name == 'Skill Pet')
                                                                            @if(isset($in->value) && count($in->value) )
                                                                                @foreach($in->value as $k_value => $value)
                                                                                    @if($k_value != 0)
                                                                                        <div class="row marginauto gallery-right-top-body-black gallery-right-top-body-span">
                                                                                            <div class="col-auto gallery-col-auto-left left-right">
                                                                                                <small>Skill {{ $k_value + 1 }}</small>
                                                                                            </div>
                                                                                            <div class="col-auto gallery-col-auto-right left-right">
                                                                                                <span>
                                                                                                    {{ $value->name }} - {{ $value->value }}
                                                                                                </span>
                                                                                            </div>
                                                                                        </div>

                                                                                    @endif
                                                                                @endforeach
                                                                            @endif
                                                                        @elseif($in->name == 'Cải trang')
                                                                            <div class="row marginauto gallery-right-top-body-black gallery-right-top-body-span">
                                                                                <div class="col-auto gallery-col-auto-left left-right">
                                                                                    <small>{{ $in->name??'' }}</small>
                                                                                </div>
                                                                                <div class="col-auto gallery-col-auto-right left-right">
                                                                                    <span>
                                                                                        @if(isset($in->value) && count($in->value) )
                                                                                            @foreach($in->value as $value)
                                                                                                {{ $value }} <br>
                                                                                            @endforeach
                                                                                        @endif
                                                                                    </span>
                                                                                </div>
                                                                            </div>

                                                                        @endif
                                                                    @elseif($in->name == 'Hành tinh' || $in->name == 'Bông tai')
                                                                        <div class="row marginauto gallery-right-top-body-black gallery-right-top-body-span">
                                                                            <div class="col-auto gallery-col-auto-left left-right">
                                                                                <small>{{ $in->name??'' }}</small>
                                                                            </div>
                                                                            <div class="col-auto gallery-col-auto-right left-right">
                                                                                <span>
                                                                                    {{ $in->value }}
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    @endif

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
                                                                <div class="row marginauto background-order-body-row-ct">
                                                                    <div class="col-auto left-right background-order-col-left-ct">
                                                                        <span>{{ $att_value->parent->title??null }}</span>
                                                                    </div>
                                                                    <div class="col-auto left-right background-order-col-right-ct">
                                                                        <small>{{ $att_value->title??null }}</small>
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
                                                                                <div class="row marginauto background-order-body-row-ct">
                                                                                    <div class="col-auto left-right background-order-col-left-ct">
                                                                                        <span>{{ $child->title??'' }}</span>
                                                                                    </div>
                                                                                    <div class="col-auto left-right background-order-col-right-ct">
                                                                                        <small>{{ $param }}</small>
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

                                    <div class="col-md-12 left-right padding-order-ct">
                                        <div class="row marginauto">
                                            <div class="col-md-12 left-right background-order-ct">
                                                <div class="row marginauto background-order-row-ct">
                                                    <div class="col-auto left-right background-order-col-left-ct">
                                                        <span>Tổng thanh toán</span>
                                                    </div>
                                                    <div class="col-auto left-right background-order-col-right-ct">
                                                    <span>
                                                        @if(isset($data->category->params->price) && isset($data->category->params))
                                                            {{ str_replace(',','.',number_format($data->category->params->price)) }} đ
                                                        @else
                                                            {{ str_replace(',','.',number_format($data->price)) }} đ
                                                        @endif
                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 left-right" id="order-errors">
                                        <div class="row marginauto order-errors">
                                            <div class="col-md-12 left-right">
                                                @if(App\Library\AuthCustom::check())
                                                    @if(App\Library\AuthCustom::user()->balance < $data->price)
                                                        <small>Bạn không đủ số dư để mua tài khoản này. Bạn hãy click vào nút nạp thẻ để nạp thêm và mua tài khoản.</small>
                                                    @endif
                                                @else
                                                    <small>Bạn phải đăng nhập mới có thể mua tài khoản tự động.</small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-12 left-right padding-order-footer-ct">
                                        <div class="row marginauto">
                                            <div class="col-md-12 left-right">
                                                @if(App\Library\AuthCustom::check())

                                                    @if(App\Library\AuthCustom::user()->balance >= $data->price)
                                                        <button class="button-default-ct openSuccess" type="submit">Xác nhận</button>
                                                    @else
                                                        <button class="button-default-ct btn-open-recharge" type="button" data-tab="1" data-dismiss="modal">Nạp tiền</button>
                                                    @endif
                                                @else
                                                    <button class="button-default-ct" type="button" onclick="openLoginModal();">Đăng nhập</button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

            {{-- HTMl to append to fieldset two of mobile device --}}
            <div id="fieldsetTwoPayment">
                <form class="formDonhangAccount" action="/ajax/acc/{{ $data->randId }}/databuy" method="POST" data-id="{{ $data->id }}">
                    {{ csrf_field() }}
                    <section>
                        <div class="container container-fix banner-mobile-container-ct">
                            <div class="row marginauto banner-mobile-row-ct">
                                <div class="col-auto left-right" style="width: 10%">
                                    <img class="lazy previous-step-one" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/back.png" alt="" >
                                </div>

                                <div class="col-auto left-right banner-mobile-span text-center" style="width: 80%">
                                    <h3>Xác nhận thanh toán</h3>
                                </div>
                                <div class="col-auto left-right" style="width: 10%">
                                </div>
                            </div>

                        </div>
                    </section>

                    <section class="max-header-fix">
                        <div class="row marginauto" style="padding: 12px 16px">

                            <div class="col-md-12 left-right title-order-ct">
                                <span>Thông tin acc</span>
                            </div>

                            <div class="col-md-12 left-right" id="order-errors">
                                <div class="row marginauto order-errors">
                                    <div class="col-md-12 left-right purchaseError">
                                        @if(App\Library\AuthCustom::check())
                                            @if(App\Library\AuthCustom::user()->balance < $data->price)
                                                <small>Bạn không đủ số dư để mua tài khoản này. Bạn hãy click vào nút nạp thẻ để nạp thêm và mua tài khoản.</small>
                                            @endif
                                        @else
                                            <small>Bạn phải đăng nhập mới có thể mua tài khoản tự động.</small>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            @if (App\Library\AuthCustom::check())
                                <div class="col-md-12 left-right padding-order-ct">
                                    <div class="row marginauto">
                                        <div class="col-md-12 left-right background-order-ct">
                                            <div class="row marginauto background-order-row-ct">
                                                <div class="col-auto left-right background-order-col-left-ct">
                                                    <span>Tài khoản</span>
                                                </div>
                                                <div class="col-auto left-right background-order-col-right-ct">
                                                    <small>{{ App\Library\AuthCustom::getName() }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="col-md-12 left-right padding-order-ct">
                                <div class="row marginauto">
                                    <div class="col-md-12 left-right background-order-ct">
                                        <div class="row marginauto background-order-body-row-ct">
                                            <div class="col-auto left-right background-order-col-left-ct">
                                                <span>Nhà phát hành</span>
                                            </div>
                                            <div class="col-auto left-right background-order-col-right-ct">
                                                @if(isset($data->params))
                                                    @if(isset($data->params->rank_info) && count($data->params->rank_info))
                                                        <small>Garena</small>
                                                    @else
                                                        <small>
                                                            @if (isset($data->groups[0]))
                                                                {{ $data->groups[0]->title }}
                                                            @endif
                                                        </small>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row marginauto background-order-body-row-ct">
                                            <div class="col-auto left-right background-order-col-left-ct">
                                                <span>Tên game</span>
                                            </div>
                                            <div class="col-auto left-right background-order-col-right-ct">
                                                <small>{{ isset($data->category->custom->title) ? $data->category->custom->title :  $data->category->title }}</small>
                                            </div>
                                        </div>

                                        <div class="row marginauto background-order-body-row-ct">
                                            <div class="col-auto left-right background-order-col-left-ct">
                                                <span>Giá tiền</span>
                                            </div>
                                            <div class="col-auto left-right background-order-col-right-ct">
                                                <small>
                                                    @if(isset($data->category->params->price) && isset($data->category->params))
                                                        {{ str_replace(',','.',number_format($data->category->params->price)) }} đ
                                                    @else
                                                        {{ str_replace(',','.',number_format($data->price)) }} đ
                                                    @endif
                                                </small>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-12 left-right padding-order-ct">
                                <div class="row marginauto">
                                    <div class="col-md-12 left-right background-order-ct">
                                        @if(isset($game_auto_props) && count($game_auto_props))
                                            @if($data_category->slug == 'nick-lien-minh')
                                                <div class="row marginauto background-order-body-row-ct">
                                                    <div class="col-auto left-right background-order-col-left-ct">
                                                        <span>Tướng</span>
                                                    </div>
                                                    <div class="col-auto left-right background-order-col-right-ct">
                                                        <small>{{ $total_tuong }}</small>
                                                    </div>
                                                </div>
                                                <div class="row marginauto background-order-body-row-ct">
                                                    <div class="col-auto left-right background-order-col-left-ct">
                                                        <span>Trang phục</span>
                                                    </div>
                                                    <div class="col-auto left-right background-order-col-right-ct">
                                                        <small>{{ $total_trangphuc }}</small>
                                                    </div>
                                                </div>
                                                <div class="row marginauto background-order-body-row-ct">
                                                    <div class="col-auto left-right background-order-col-left-ct">
                                                        <span>Linh thú TFT</span>
                                                    </div>
                                                    <div class="col-auto left-right background-order-col-right-ct">
                                                        <small>{{ $total_linhthu }}</small>
                                                    </div>
                                                </div>

                                                @if(isset($data->params))
                                                    @if(isset($data->params->rank_info) && count($data->params->rank_info))

                                                        @foreach($data->params->rank_info as $key_rank => $rank_info)
                                                            @if($rank_info->queueType == "RANKED_TFT")
                                                                <div class="row marginauto background-order-body-row-ct">
                                                                    <div class="col-auto left-right background-order-col-left-ct">
                                                                        <span>RANKED TFT</span>
                                                                    </div>
                                                                    <div class="col-auto left-right background-order-col-right-ct">
                                                                        <small>
                                                                            @if($rank_info->tier == "NONE")
                                                                                CHƯA CÓ RANK
                                                                            @else
                                                                                {{ config('module.acc.auto_lm_rank.'.$rank_info->tier ) }} - {{ $rank_info->division }}
                                                                            @endif
                                                                        </small>
                                                                    </div>
                                                                </div>
                                                            @elseif($rank_info->queueType == "RANKED_SOLO_5x5")
                                                                <div class="row marginauto background-order-body-row-ct">
                                                                    <div class="col-auto left-right background-order-col-left-ct">
                                                                        <span>RANKED SOLO</span>
                                                                    </div>
                                                                    <div class="col-auto left-right background-order-col-right-ct">
                                                                        <small>
                                                                            @if($rank_info->tier == "NONE")
                                                                                CHƯA CÓ RANK
                                                                            @else
                                                                                {{ config('module.acc.auto_lm_rank.'.$rank_info->tier ) }} - {{ $rank_info->division }}
                                                                            @endif
                                                                        </small>
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

                                                    <div class="row marginauto background-order-body-row-ct">
                                                        <div class="col-auto left-right background-order-col-left-ct">
                                                            <span>Server</span>
                                                        </div>
                                                        <div class="col-auto left-right background-order-col-right-ct">
                                                            <small>{{ $server??null }}</small>
                                                        </div>
                                                    </div>

                                                @endif
                                                @if(isset($info) && count($info))
                                                    @foreach($info as $ke => $in)
                                                        @if(in_array($in->name,config('module.acc.auto_ninja_tt')))
                                                            <div class="row marginauto background-order-body-row-ct">
                                                                <div class="col-auto left-right background-order-col-left-ct">
                                                                    <span>{{ $in->name??'' }}</span>
                                                                </div>
                                                                <div class="col-auto left-right background-order-col-right-ct">
                                                                    <small>@if($in->name == 'Yên')
                                                                            {{ str_replace(',','.',number_format($in->value??'')) }}
                                                                        @else
                                                                            {{ $in->value??'' }}
                                                                        @endif</small>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
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

                                                    <div class="row marginauto background-order-body-row-ct">
                                                        <div class="col-auto left-right background-order-col-left-ct">
                                                            <span>Server</span>
                                                        </div>
                                                        <div class="col-auto left-right background-order-col-right-ct">
                                                            <small>{{ $server??null }}</small>
                                                        </div>
                                                    </div>

                                                @endif
                                                @if(isset($info) && count($info))
                                                    @foreach($info as $ke => $in)
                                                        @if(in_array($in->name,config('module.acc.auto_nro_tt')))
                                                            <div class="row marginauto background-order-body-row-ct">
                                                                <div class="col-auto left-right background-order-col-left-ct">
                                                                    <span>{{ $in->name??'' }}</span>
                                                                </div>
                                                                <div class="col-auto left-right background-order-col-right-ct">
                                                                    <small>
                                                                        @if($in->name == 'tên nhân vật' || $in->name == 'cấp độ')
                                                                            {{ $in->value??'' }}
                                                                        @else
                                                                            {{ str_replace(',','.',number_format($in->value??'')) }}
                                                                        @endif</small>
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
                                                        <div class="row marginauto background-order-body-row-ct">
                                                            <div class="col-auto left-right background-order-col-left-ct">
                                                                <span>{{ $att_value->parent->title??null }}</span>
                                                            </div>
                                                            <div class="col-auto left-right background-order-col-right-ct">
                                                                <small>{{ $att_value->title??null }}</small>
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
                                                                        <div class="row marginauto background-order-body-row-ct">
                                                                            <div class="col-auto left-right background-order-col-left-ct">
                                                                                <span>{{ $child->title??'' }}</span>
                                                                            </div>
                                                                            <div class="col-auto left-right background-order-col-right-ct">
                                                                                <small>{{ $param }}</small>
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

                            <div class="col-md-12 left-right padding-order-ct">
                                <div class="row marginauto">
                                    <div class="col-md-12 left-right background-order-ct">
                                        <div class="row marginauto background-order-row-ct">
                                            <div class="col-auto left-right background-order-col-left-ct">
                                                <span>Tổng thanh toán</span>
                                            </div>
                                            <div class="col-auto left-right background-order-col-right-ct">
                                            <span>
                                                @if(isset($data->category->params->price) && isset($data->category->params))
                                                    {{ str_replace(',','.',number_format($data->category->params->price)) }} đ
                                                @else
                                                    {{ str_replace(',','.',number_format($data->price)) }} đ
                                                @endif
                                            </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 left-right padding-order-footer-ct fixcungbuttonmobile">
                                <div class="row marginauto" style="padding: 12px 16px">
                                    <div class="col-md-12 left-right">
                                        @if(App\Library\AuthCustom::check())

                                            @if(App\Library\AuthCustom::user()->balance >= $data->price)
                                                <button class="button-default-ct button-next-step-two" type="submit">Xác nhận</button>
                                            @else
                                                <div class="row marginauto justify-content-center gallery-right-footer">
                                                    <div class="col-md-6 col-6 modal-footer-success-col-left-ct">
                                                        <button type="button" class="button-success-secondary">
                                                            <a href="/nap-the" style="display: block">Nap thẻ</a>
                                                        </button>
                                                    </div>
                                                    <div class="col-md-6 col-6 modal-footer-success-col-right-ct">
                                                        <button type="button" class="button-success-primary">
                                                            <a href="/recharge-atm" style="display: block">ATM, Momo</a>
                                                        </button>
                                                    </div>
                                                </div>
                                            @endif
                                        @else
                                            <button class="button-default-ct" type="button" onclick="openLoginModal();">Đăng nhập</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <input type="hidden" name="previous" class="input-back-step-two" value="Trang trước"/>
                </form>
            </div>
        @endif

        <div class="modal fade login show order-modal" id="accDetail" aria-modal="true" data-backdrop="static" data-keyboard="false">

            <div class="modal-dialog step-tab-panel  modal-dialog-centered  animated">
                <!--        <div class="image-login"></div>-->
                <div class="modal-content">
                    <div class="modal-header p-0" style="border-bottom: 0">
                        <div class="row marginauto modal-header-order-ct pt-fix-16 pb-fix-16">
                            <div class="col-12 span__donhang" style="position: relative">
                                <div class="row marginauto ">
                                    <div class="col-md-12 left-right">
                                        <span>Mã số: {{ $data->randId }}</span>
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
                                    @php
                                        $image_extension = explode('|',$data->image_extension);
                                        array_push($image_extension,$data->image);
                                        $count = 0;
                                        foreach($image_extension as $key => $val){
                                            if($val != ''){
                                                $count = $count + 1;
                                            }
                                        }
                                    @endphp

                                    @foreach($image_extension as $key => $val)
                                    @if($val != '')
                                    <div class="acc-holder_slides " >
                                        <a class="acc-holder_expand" data-fancybox="galleryAccount" href="{{\App\Library\MediaHelpers::media($val)}}">
                                            <i class="__icon__profile --sm__profile --link__profile --link--acc" style="--path : url(/assets/frontend/theme_3/image/svg/expand-acc.svg)"></i>
{{--                                            <img src="/assets/frontend/theme_3/image/svg/expand-acc.svg" alt="">--}}
                                        </a>
                                        <div class="acc-holder_badge">{{$key+1}} / {{ $count }}</div>
                                        <img src="{{\App\Library\MediaHelpers::media($val)}}" alt="" />
                                    </div>
                                    @endif
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
                                        @foreach($image_extension as $key => $val)
                                            @if($val != '')
                                            <div class="acc-thumbnail_column col-md-3 px-fix-6 mb-fix-12">
                                                <div class="acc-thumbnail_badge" onclick="currentSlide({{$key+1}})">{{$key+1}}</div>
                                                <img class="acc-thumbnail-image" src="{{\App\Library\MediaHelpers::media($val)}}" onclick="currentSlide({{$key+1}})" alt="Caption One">
                                            </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <style>
            .scroll-default{
                padding-right: 4px;
                max-height: 292px;
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


    @endif

@endif
