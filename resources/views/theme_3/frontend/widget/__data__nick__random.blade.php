@if(isset($data))

    @forelse($data as $items)
        @php
            $dataAttribute = null;

            if (isset($items->childs) && count($items->childs)){
                $dataAttribute = $items->childs;
            }
        @endphp

        <div class="col-12 col-md-6 col-lg-3 pr-fix-10 pl-fix-10">
            <div class="block-product mb-md-fix-12">
                <div class="product-header d-flex">
                    <span>
                        @if(isset($items->image_icon) || isset($items->custom->image_icon))
                            <img src="{{ isset($items->custom->image_icon) && $items->custom->image_icon != '' ? $items->custom->image_icon :  $items->image_icon }}" alt="">
                        @endif
                    </span>
                    <p class="text-title">{{ isset($items->custom->title) ? $items->custom->title :  $items->title }}</p>
                    <div class="navbar-spacer"></div>
                    <a href="/mua-acc/{{ isset($items->custom->slug) && $items->custom->slug != '' ? $items->custom->slug :  $items->slug }}" class="link arr-right d-lg-none">Xem tất cả</a>
                </div>
                @if(isset($items->items) && count($items->items) > 0)
                    @if($items->display_type == 2)
                        <div class="box-product box-other-nick">
                            <div class="list-product d-g-md-none mt-fix-4">
                                @foreach($items->items as $item)
                                    @if($item->status = 1)
                                        <div class="item-product item-other-nick mt-fix-16">
                                            <a href="javascript:void(0)">
                                                <div class="item-product__box-img item-product__box-img__random">
                                                    <img onerror="imgError(this)" class="lazy" data-src="{{\App\Library\MediaHelpers::media($items->image)}}" alt="{{ $item->randId??'' }}">

                                                    @if(App\Library\AuthCustom::check())
                                                        <button type="button" class="button-secondary list-item-nick-button buyacchome"  data-id="{{ $item->randId }}">Mua ngay</button>

                                                    @else
                                                        <button type="button" class="button-secondary list-item-nick-button " onclick="openLoginModal()">Mua ngay</button>
                                                    @endif


                                                </div>
                                                <div class="item-product__box-content">
                                                    <div class="item-product__box-name limit-1 text-limit">
                                                        {{ isset($items->custom->title) ? $items->custom->title :  $items->title }}
                                                    </div>
                                                    <div class="item-product__box-id" style="padding: 0">
                                                        ID: #{{ @$item->randId}}
                                                    </div>
                                                    @php
                                                        if (isset($item->price_old)) {
                                                            $sale_percent = (($item->price_old - $item->price) / $item->price_old) * 100;
                                                            $sale_percent = round($sale_percent, 0, PHP_ROUND_HALF_UP);
                                                        } else {
                                                            $sale_percent = 0;
                                                        }
                                                    @endphp
                                                    <div class="item-product__box-price">

                                                        <div class="special-price d-block">{{ str_replace(',','.',number_format($item->price)) }}đ</div>
                                                        <div class="old-price ml-0">{{ str_replace(',','.',number_format($item->price_old)) }}đ</div>
                                                        @if($sale_percent > 0)
                                                            <div class="item-product__sticker-percent">
                                                                - {{$sale_percent}}%
                                                            </div>
                                                        @endif
                                                    </div>


                                                </div>

                                            </a>
                                        </div>

                                        <div class="formDonhangAccountHome{{ $item->randId }} formThanhToanNickRandomHome" style="display: none">
                                            <form class="formDonhangAccountHome" action="/ajax/acc/{{ $item->randId }}/databuy" method="POST">
                                                {{ csrf_field() }}
                                                <div class="modal-header p-0" style="border-bottom: 0">
                                                    <div class="row marginauto modal-header-order-ct">
                                                        <div class="col-12 span__donhang text-center" style="position: relative">
                                                            <span>Xác nhận thanh toán</span>

                                                            <img class="lazy img-close-ct close-modal-default" data-dismiss="modal" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/close.png" alt="">

                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="modal-body modal-body-order-ct">
                                                    <div class="row marginauto">

                                                        <div class="col-md-12 left-right title-order-ct">
                                                            <span>Thông tin acc</span>
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
{{--                                                                    <div class="row marginauto background-order-body-row-ct">--}}
{{--                                                                        <div class="col-auto left-right background-order-col-left-ct">--}}
{{--                                                                            <span>Nhà phát hành</span>--}}
{{--                                                                        </div>--}}
{{--                                                                        <div class="col-auto left-right background-order-col-right-ct">--}}
{{--                                                                            <small>{{ isset($items->custom->title) ? $items->custom->title :  $items->title }}</small>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}

                                                                    <div class="row marginauto background-order-body-row-ct">
                                                                        <div class="col-auto left-right background-order-col-left-ct">
                                                                            <span>Tên game</span>
                                                                        </div>
                                                                        <div class="col-auto left-right background-order-col-right-ct">
                                                                            <small>{{ isset($items->custom->title) ? $items->custom->title :  $items->title }}</small>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row marginauto background-order-body-row-ct">
                                                                        <div class="col-auto left-right background-order-col-left-ct">
                                                                            <span>Giá tiền</span>
                                                                        </div>
                                                                        <div class="col-auto left-right background-order-col-right-ct">
                                                                            <small>
                                                                                @if(isset($items->price))
                                                                                    {{ str_replace(',','.',number_format($items->price)) }}đ
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

                                                                    @if(isset($item->groups))
                                                                        <?php $att_values = $item->groups ?>
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
                                                                    @if(isset($item->params) && isset($item->params->ext_info))
                                                                        <?php $params = json_decode(json_encode($item->params->ext_info),true) ?>
                                                                        @if(!is_null($dataAttribute) && count($dataAttribute)>0)
                                                                            @foreach($dataAttribute as $index=>$att)
                                                                                @if($att->position == 'text')
                                                                                    @if(isset($att->childs))
                                                                                        @foreach($att->childs as $child)
                                                                                            @foreach($params as $key => $param)
                                                                                                @if($key == $child->id)
                                                                                                    <div class="row marginauto background-order-body-row-ct">
                                                                                                        <div class="col-auto left-right background-order-col-left-ct">
                                                                                                            <span>{{ $child->title }}</span>
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
                                                                            @if(isset($items->price))
                                                                                {{ str_replace(',','.',number_format($items->price)) }}đ
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
                                                                        @if(App\Library\AuthCustom::user()->balance < $items->price)
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

                                                                        @if(App\Library\AuthCustom::user()->balance >= $items->price)
                                                                            <button class="button-default-ct button-next-step-two" type="submit">Xác nhận</button>
                                                                        @else
                                                                            <button class="button-default-ct btn-open-recharge" type="button" data-tab="1" data-dismiss="modal">Nạp tiền</button>
                                                                        @endif
                                                                    @else
                                                                        <button class="button-default-ct" data-dismiss="modal" type="button" onclick="openLoginModal();">Đăng nhập</button>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    @endif
                                @endforeach
                            </div>
                            <div class="swiper-container list-product list-other-nick mt-fix-12 d-none d-g-md-block">
                                <div class="swiper-wrapper">
                                    @foreach($items->items as $item)
                                        @if($item->status = 1)
                                            <div class="swiper-slide">
                                                <div class="item-product__box-img">
                                                    <a href="javascript:void(0)">
                                                        <img onerror="imgError(this)" class="lazy" data-src="{{\App\Library\MediaHelpers::media($items->image)}}" alt="{{ $item->randId??'' }}">
                                                    </a>
                                                </div>
                                                <div class="item-product__box-content">

                                                    <a href="javascript:void(0)">
                                                        <div class="item-product__box-name limit-1 text-limit">
                                                            {{ isset($items->custom->title) ? $items->custom->title :  $items->title }}
                                                        </div>
                                                        <div class="item-product__box-id" style="padding: 0">
                                                            ID: #{{ @$item->randId}}
                                                        </div>
                                                        <div class="item-product__box-rank">

                                                        </div>
                                                        <div class="item-product__box-price">

                                                            <div class="special-price">{{ str_replace(',','.',number_format($items->price)) }}đ</div>
                                                            <div class="old-price">{{ str_replace(',','.',number_format($items->price_old)) }}đ</div>
                                                            @if($sale_percent > 0)
                                                                <div class="item-product__sticker-percent">
                                                                    - {{$sale_percent}}%
                                                                </div>
                                                            @endif
                                                        </div>
                                                        @if(App\Library\AuthCustom::check())
                                                            <button type="button" class="button-secondary list-item-nick-button buyacchome"  data-id="{{ $item->randId }}">Mua ngay</button>

                                                        @else
                                                            <button type="button" class="button-secondary list-item-nick-button " onclick="openLoginModal()">Mua ngay</button>
                                                        @endif
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                        </div>

                    @else
                        <div class="box-product box-other-nick">
                            <div class="list-product d-g-md-none mt-fix-4">
                                @foreach($items->items as $item)
                                    @if($item->status = 1)
                                        <div class="item-product item-other-nick mt-fix-16">
                                            <a href="/acc/{{ $item->randId }}">
                                                <div class="item-product__box-img">
                                                    <img onerror="imgError(this)" class="lazy" data-src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="{{ $item->randId??'' }}">
                                                </div>
                                                <div class="item-product__box-content">
                                                    <div class="item-product__box-name limit-1 text-limit">
                                                        {{ isset($items->custom->title) ? $items->custom->title :  $items->title }}
                                                    </div>
                                                    <div class="item-product__box-id" style="padding: 0">
                                                        ID: #{{ @$item->randId}}
                                                    </div>
                                                    @php
                                                        if (isset($item->price_old)) {
                                                            $sale_percent = (($item->price_old - $item->price) / $item->price_old) * 100;
                                                            $sale_percent = round($sale_percent, 0, PHP_ROUND_HALF_UP);
                                                        } else {
                                                            $sale_percent = 0;
                                                        }
                                                    @endphp
                                                    <div class="item-product__box-price">

                                                        <div class="special-price d-block">{{ str_replace(',','.',number_format($item->price)) }}đ</div>
                                                        <div class="old-price ml-0">{{ str_replace(',','.',number_format($item->price_old)) }}đ</div>
                                                        @if($sale_percent > 0)
                                                            <div class="item-product__sticker-percent">
                                                                - {{$sale_percent}}%
                                                            </div>
                                                        @endif
                                                    </div>

                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="swiper-container list-product list-other-nick mt-fix-12 d-none d-g-md-block">
                                <div class="swiper-wrapper">
                                    @foreach($items->items as $item)
                                        @if($item->status = 1)
                                            <div class="swiper-slide">
                                                <div class="item-product__box-img">
                                                    <a href="/acc/{{ $item->randId }}">
                                                        <img onerror="imgError(this)" class="lazy" data-src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="{{ $item->randId??'' }}">
                                                    </a>
                                                </div>
                                                <div class="item-product__box-content">

                                                    <a href="/acc/{{ $item->randId }}">
                                                        <div class="item-product__box-name limit-1 text-limit">
                                                            {{ isset($items->custom->title) ? $items->custom->title :  $items->title }}
                                                        </div>
                                                        <div class="item-product__box-id" style="padding: 0">
                                                            ID: #{{ @$item->randId}}
                                                        </div>

                                                        <div class="item-product__box-price">

                                                            <div class="special-price">{{ str_replace(',','.',number_format($item->price)) }}đ</div>
                                                            <div class="old-price">{{ str_replace(',','.',number_format($item->price_old)) }}đ</div>
                                                            @if($sale_percent > 0)
                                                                <div class="item-product__sticker-percent">
                                                                    - {{$sale_percent}}%
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    @endif
                @endif
                <div class="mt-2 d-lg-block d-none">
                    <a href="/mua-acc/{{ isset($items->custom->slug) && $items->custom->slug != '' ? $items->custom->slug :  $items->slug }}" class="global__link__default">Xem thêm<i class="__icon__default --sm__default --link__default ml-1" style="--path : url(/assets/frontend/theme_3/image/svg/xemthem.svg)"></i></a>
                </div>
            </div>

        </div>

    @empty

    @endforelse
@endif
