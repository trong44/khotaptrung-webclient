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

                            <div class="col-md-12 left-right" id="showdetailacc">
                                <div class="row marginauto">
                                    <div class="col-lg-6 col-md-12 left-right">
                                        <div class="row marginauto">
                                            <div class="col-lg-12 col-md-12 left-right">
                                                <div class="gallery" style="overflow: hidden">
                                                    <div class="swiper gallery-slider swiper-container-horizontal">
                                                        <div class="swiper-wrapper">
                                                            @foreach(explode('|',$data->image_extension) as $val)
                                                                <div class="swiper-slide">
                                                                    <a data-fancybox="gallerycoverDetail" href="{{\App\Library\MediaHelpers::media($val)}}">
                                                                        <img src="{{\App\Library\MediaHelpers::media($val)}}" alt="">
                                                                    </a>
                                                                </div>
                                                            @endforeach
                                                        </div>

                                                        <div class="swiper-button-prev">
                                                            <img class="lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/nick/back-detail.png" alt="">
                                                        </div>
                                                        <div class="swiper-button-next">
                                                            <img class="lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/nick/pew-detail.png" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12 left-right gallery-thumb-nick">
                                                <div class="gallery-thumb" style="overflow: hidden">
                                                    <div class="swiper gallery-thumbs gallery-thumbsmaxheadth swiper-container-horizontal">
                                                        <div class="swiper-wrapper">
                                                            <div class="swiper-slide">
                                                                <a class="" data-fancybox="gallerycoverDetail" href="https://cdn.upanh.info//storage/upload/product-acc/902/images/0xTbGLPKIv_1648889770.jpg">
                                                                    <div class="row marginauto">
                                                                        <div class="col-md-12 left-right default-overlay-ct swiper-slide-col">
                                                                            <img src="https://cdn.upanh.info//storage/upload/product-acc/902/images/0xTbGLPKIv_1648889770.jpg" alt="" class="lazy">
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            @foreach(explode('|',$data->image_extension) as $val)
                                                                <div class="swiper-slide">
                                                                    <a class="" data-fancybox="gallerycoverDetail" href="{{\App\Library\MediaHelpers::media($val)}}">
                                                                        <div class="row marginauto">
                                                                            <div class="col-md-12 left-right default-overlay-ct swiper-slide-col">
                                                                                <img src="{{\App\Library\MediaHelpers::media($val)}}" alt="" class="lazy">
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

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
                                                                <?php
                                                                    $total = 0;
                                                                ?>
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
                                            <div class="col-md-12 order-lg-12 order-1 left-right">
                                                <div class="row marginauto justify-content-center gallery-right-footer">
                                                    {{-- <div class="col-md-6 col-6 modal-footer-success-col-left-ct">
                                                        <div class="row marginauto">
                                                            <div class="col-md-12 left-right">
                                                                <button type="button" class="button-default-not-nick-ct btn-tra-gop media-web">Trả góp</button>
                                                                <button type="button" class="button-default-not-nick-ct media-mobile button-next-step-one-tra-gop">Trả góp</button>
                                                            </div>
                                                        </div>
                                                    </div> --}}
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
                                                                <div class="row marginauto nick-detail-button">
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
                                                        @else

                                                        @endif
                                                    @else
                                                    <div class="col-md-6 col-6 modal-footer-success-col-left-ct">
                                                        <div class="row marginauto nick-detail-button">
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
                                                    @endif


                                            @if(isset($data->price_atm))
                                            <div class="col-md-6 col-6 modal-footer-success-col-right-ct">
                                                <div class="row marginauto nick-detail-button">
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
                            <div class="swiper gallery-slider swiper-container-horizontal">
                                <div class="swiper-wrapper">
                                    @foreach(explode('|',$data->image_extension) as $val)
                                        <div class="swiper-slide">
                                            <a data-fancybox="gallerycoverDetail" href="{{\App\Library\MediaHelpers::media($val)}}">
                                                <img src="{{\App\Library\MediaHelpers::media($val)}}" alt="">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 left-right">
                        <div class="row marginauto body-row-nick-detail-ct">

                            <div class="col-md-12 left-right" id="showdetailacc">
                                <div class="row marginauto">
                                    <div class="col-12 left-right">
                                        <div class="row marginauto">

                                            <div class="col-lg-12 col-md-12 left-right gallery-thumb-nick">
                                                <div class="gallery-thumb" style="overflow: hidden">
                                                    <div class="swiper gallery-thumbs gallery-thumbsmaxheadth swiper-container-horizontal">
                                                        <div class="swiper-wrapper">
                                                            @foreach(explode('|',$data->image_extension) as $val)
                                                                <div class="swiper-slide">
                                                                    <a class="" data-fancybox="gallerycoverDetail" href="{{\App\Library\MediaHelpers::media($val)}}">
                                                                        <div class="row marginauto">
                                                                            <div class="col-md-12 left-right default-overlay-ct swiper-slide-col">
                                                                                <img src="{{\App\Library\MediaHelpers::media($val)}}" alt="" class="lazy">
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

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
                                                            <div class="row marginauto nick-detail-button">
                                                                <div class="col-md-12 left-right">
                                                                    <a href="/" class="button-not-bg-ct">
                                                                        <ul>
                                                                            <li><small>Thẻ cào</small></li>
                                                                            <li><span>{{ str_replace(',','.',number_format(round($data->price))) }} CARD</span></li>
                                                                        </ul>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-6 modal-footer-success-col-right-ct">
                                                            <div class="row marginauto nick-detail-button">
                                                                <div class="col-md-12 left-right">
                                                                    <a href="/" class="button-not-bg-ct">
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
                                                            <div class="row marginauto nick-detail-button">
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
                        <div class="col-md-12 left-right">
                            <div class="row marginauto body-row-ct footer-row-ct">
                                <div class="col-md-12 left-right">
                                    <span>Mô tả sản phẩm {{ isset($data->category->custom->title) ? $data->category->custom->title :  $data->category->title }} | Mã số: {{ $data->randId }}</span>
                                </div>
                                <div class="col-md-12 left-right footer-row-col-ct content-video-in content-video-in-add">
                                    {!! $data->description !!}
                                </div>

                                <div class="col-md-12 left-right text-center js-toggle-content">
                                    <div class="view-more">
                                        <a href="javascript:void(0)" class="global__link__default">Xem thêm<i class="__icon__default --sm__default --link__default ml-1" style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/svg/xemthem.svg)"></i></a>
                                    </div>
                                    <div class="view-less">
                                        <a href="javascript:void(0)" class="global__link__default">Thu gọn<i class="__icon__default --sm__default --link__default ml-1" style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/svg/rutgon.svg)"></i></a>
                                    </div>
                                </div>

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
                    <form class="formDonhangAccount" action="/acc/{{ $data->randId }}/databuy" method="POST" data-id="{{ $data->id }}">
                        {{ csrf_field() }}
                        <div class="modal-header p-0" style="border-bottom: 0">
                            <div class="row marginauto modal-header-order-ct">
                                <div class="col-12 span__donhang text-center" style="position: relative">
                                    <span>Xác nhận thanh toán</span>
                                    <img class="lazy img-close-ct close-modal-default" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/close.png" alt="">
                                </div>
                            </div>

                        </div>

                        <div class="modal-body modal-body-order-ct">
                            <div class="row marginauto">

                                <div class="col-md-12 left-right title-order-ct">
                                    <span>Thông tin acc</span>
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


                                <div class="col-md-12 left-right padding-order-ct">
                                    <div class="row marginauto">
                                        <div class="col-md-12 left-right background-order-ct">
                                            <div class="row marginauto background-order-row-ct">
                                                <div class="col-auto left-right background-order-col-left-ct">
                                                    <span>Tài khoản</span>
                                                </div>
                                                <div class="col-auto left-right background-order-col-right-ct">
                                                    <small>{{ App\Library\AuthCustom::user()->username }}</small>
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
                                                    <small>{{ $data->groups[0]->title }}</small>
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
                                                <?php $params = json_decode(json_encode($data->params->ext_info),true); ?>
                                                @foreach ($params as $key => $param)
                                                    <div class="row marginauto background-order-body-row-ct">
                                                        <div class="col-auto left-right background-order-col-left-ct">
                                                            <span>{{ $key }}</span>
                                                        </div>
                                                        <div class="col-auto left-right background-order-col-right-ct">
                                                            <small>{{ $param }}</small>
                                                        </div>
                                                    </div>
                                                @endforeach
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

                                <div class="col-md-12 left-right padding-order-footer-ct">
                                    <div class="row marginauto">
                                        <div class="col-md-12 left-right">
                                            @if(App\Library\AuthCustom::check())

                                                @if(App\Library\AuthCustom::user()->balance >= $data->price)
                                                    <button class="button-default-ct openSuccess" type="submit">Xác nhận</button>
                                                @else
                                                    <div class="row marginauto justify-content-center gallery-right-footer">
                                                        <div class="col-md-6 col-6 modal-footer-success-col-left-ct">
                                                            <button type="button" class="button-success-secondary">
                                                                <a href="/nap-the" style="display: block">Nạp thẻ</a>
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
                        </div>
                    </form>
                </div>
            </div>

        </div>

        {{-- HTMl to append to fieldset two of mobile device --}}
        <div id="fieldsetTwoPayment">
            <form class="formDonhangAccount" action="/acc/{{ $data->randId }}/databuy" method="POST" data-id="{{ $data->id }}">
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
                                                <small>{{ App\Library\AuthCustom::user()->username }}</small>
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
                                            <small>{{ $data->groups[0]->title }}</small>
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
                                        <?php $params = json_decode(json_encode($data->params->ext_info),true); ?>
                                        @foreach ($params as $key => $param)
                                            <div class="row marginauto background-order-body-row-ct">
                                                <div class="col-auto left-right background-order-col-left-ct">
                                                    <span>{{ $key }}</span>
                                                </div>
                                                <div class="col-auto left-right background-order-col-right-ct">
                                                    <small>{{ $param }}</small>
                                                </div>
                                            </div>
                                        @endforeach
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
    @endif
@endif
