@if(isset($data) )
    @foreach($data as $items)
        @php
            $dataAttribute = null;

            if (isset($items->childs) && count($items->childs)){
                $dataAttribute = $items->childs;
            }
        @endphp

        <section class="acc-game c-pt-32 c-pt-lg-24 c-pb-lg-6">
            <div class="section-header c-mb-24 c-mb-lg-16 justify-content-between">
                <h2 class="section-title fz-lg-15 lh-lg-24">
                    @if(isset($items->image_icon) || isset($items->custom->image_icon))
                        <i class="icon-title c-mr-8" style="--path:url({{ isset($items->custom->image_icon) && $items->custom->image_icon != '' ? $items->custom->image_icon :  $items->image_icon }})"></i>
                    @endif
                    {{ isset($items->custom->title) ? $items->custom->title :  $items->title }}
                </h2>
                <a href="/mua-acc/{{ isset($items->custom->slug) && $items->custom->slug != '' ? $items->custom->slug :  $items->slug }}" class="link arr-right">Xem tất cả</a>
            </div>

            @if(isset($items->items) && count($items->items) > 0)
                <div class="swiper swiper-acc-game card-list">
                    <div class="swiper-wrapper">
                        @foreach($items->items as $item)
                            @if($items->display_type == 2)
                                <div class="swiper-slide">
                                    <div class="item-category">
                                        <div class="card">
                                            <a href="javascript:void(0)" class="card-body scale-thumb c-p-16 c-p-lg-12">
                                                <div class="account-thumb c-mb-8">

                                                    <img onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($items->image)}}" alt="{{ $item->randId??'' }}" class="account-thumb-image">
                                                </div>
                                                <div class="account-title">
                                                    <div class="text-title fw-700 text-limit limit-1">{{ isset($items->custom->title) ? $items->custom->title :  $items->title }}</div>
                                                </div>
                                                <div class="account-info c-mb-8">
                                                    <div class="info-attr">
                                                        @if(isset($items->items_count))
                                                            @if((isset($items->account_fake) && $items->account_fake > 1) || (isset($items->custom->account_fake) && $items->custom->account_fake > 1))
                                                                Số tài khoản: {{ str_replace(',','.',number_format(round(isset($items->custom->account_fake) ? $items->items_count*$items->custom->account_fake : $items->items_count*$items->account_fake))) }}
                                                            @else
                                                                Số tài khoản: {{ $items->items_count }}
                                                            @endif

                                                        @else
                                                            Số tài khoản: 0
                                                        @endif
                                                    </div>
                                                </div>
                                                @php
                                                    if (isset($items->price_old)) {
                                                        $sale_percent = (($items->price_old - $items->price) / $items->price_old) * 100;
                                                        $sale_percent = round($sale_percent, 0, PHP_ROUND_HALF_UP);
                                                    } else {
                                                        $sale_percent = 0;
                                                    }
                                                @endphp
                                                @if(isset($items->price))
                                                    <div class="price">
                                                        @if ($sale_percent > 0)
                                                            <div class="price-current w-100">{{ str_replace(',','.',number_format($items->price)) }}đ</div>
                                                            <div class="price-old c-mr-8">{{ str_replace(',','.',number_format($items->price_old??$items->price)) }}đ</div>
                                                            <div class="discount">{{$sale_percent}}%</div>
                                                        @else
                                                            <div class="price-current w-100 c-pb-16">{{ str_replace(',','.',number_format($items->price)) }}đ</div>
                                                        @endif
                                                    </div>
                                                @else
                                                    <div style="height: 40px">

                                                    </div>
                                                @endif
                                            </a>

                                            @if(App\Library\AuthCustom::check())

                                                @if(App\Library\AuthCustom::user()->balance < $items->price)
                                                    <a href="javascript:void(0)" class="btn secondary lg-sm c-mx-16 c-mb-16 c-mx-lg-12 c-mb-lg-12 the-cao-atm-home">Mua ngay</a>

                                                @else
                                                    <a href="javascript:void(0)" class="btn secondary lg-sm c-mx-16 c-mb-16 c-mx-lg-12 c-mb-lg-12 buyacchome" data-id="{{ $item->randId }}">Mua ngay</a>

                                                @endif
                                            @else
                                                <a href="javascript:void(0)" class="btn secondary lg-sm c-mx-16 c-mb-16 c-mx-lg-12 c-mb-lg-12" onclick="openLoginModal()">Mua ngay</a>
                                            @endif

                                        </div>
                                    </div>
                                </div>

                                {{--                    Form thanh toán nick random  formThanhToanNickRandom --}}

                                <div class="formDonhangAccountHome{{ $item->randId }} formThanhToanNickRandomHome">
                                    <form class="formDonhangAccountHome" action="/acc/{{ $item->randId }}/databuy" method="POST">
                                        {{ csrf_field() }}
                                        <div class="modal-header">
                                            <p class="modal-title center">Xác nhận thanh toán</p>
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
                                                    <div class="card--attr__value fz-13 fw-500">{{ isset($items->custom->title) ? $items->custom->title :  $items->title }}</div>
                                                </div>
                                                <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                                                    <div class="card--attr__name fw-400 fz-13 text-center">
                                                        Giá tiền
                                                    </div>
                                                    <div class="card--attr__value fz-13 fw-500">{{ str_replace(',','.',number_format($items->price)) }} đ</div>
                                                </div>
                                            </div>


                                            <div class="card--gray c-mb-16 c-pt-8 c-pb-8 c-pl-12 c-pr-12">
                                                @if(isset($item->groups))
                                                    <?php $att_values = $item->groups ?>
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
                                                @if(isset($item->params) && isset($item->params->ext_info))
                                                    <?php $params = json_decode(json_encode($item->params->ext_info),true) ?>
                                                    @if(!is_null($dataAttribute) && count($dataAttribute)>0)
                                                        @foreach($dataAttribute as $index=>$att)
                                                            @if($att->position == 'text')
                                                                @if(isset($att->childs))
                                                                    @foreach($att->childs as $child)
                                                                        @foreach($params as $key => $param)
                                                                            @if($key == $child->id)

                                                                                <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                                                                                    <div class="card--attr__name fw-400 fz-13 text-center">
                                                                                        {{ $child->title??null }}
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
                                                    <div class="card--attr__value fz-13 fw-500"><a href="javascript:void(0)" class="c-text-primary">{{ str_replace(',','.',number_format($items->price)) }} đ</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn primary">Xác nhận</button>

                                        </div>
                                    </form>
                                </div>
                            @else
                                <div class="swiper-slide">
                                    <div class="item-category">
                                        <div class="card">
                                            <a href="/acc/{{ $item->randId }}" class="card-body scale-thumb c-p-16 c-p-lg-12">
                                                <div class="account-thumb c-mb-8">
                                                    <img src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="{{ $item->randId??'' }}" class="account-thumb-image">
                                                </div>
                                                <div class="account-title">
                                                    <div class="text-title fw-700 text-limit limit-1">{{ isset($items->custom->title) ? $items->custom->title :  $items->title }}</div>
                                                </div>
                                                <div class="account-info c-mb-8">
                                                    <div class="info-attr">
                                                        @if(isset($items->items_count))
                                                            @if((isset($items->account_fake) && $items->account_fake > 1) || (isset($items->custom->account_fake) && $items->custom->account_fake > 1))
                                                                Số tài khoản: {{ str_replace(',','.',number_format(round(isset($items->custom->account_fake) ? $items->items_count*$items->custom->account_fake : $items->items_count*$items->account_fake))) }}
                                                            @else
                                                                Số tài khoản: {{ $items->items_count }}
                                                            @endif

                                                        @else
                                                            Số tài khoản: 0
                                                        @endif
                                                    </div>
                                                </div>
                                                @php
                                                    if (isset($item->price_old)) {
                                                        $sale_percent = (($item->price_old - $item->price) / $item->price_old) * 100;
                                                        $sale_percent = round($sale_percent, 0, PHP_ROUND_HALF_UP);
                                                    } else {
                                                        $sale_percent = 0;
                                                    }
                                                @endphp
                                                <div class="price">
                                                    @if ($sale_percent > 0)
                                                        <div class="price-current w-100">{{ str_replace(',','.',number_format($item->price)) }}đ</div>
                                                        <div class="price-old c-mr-8">{{ str_replace(',','.',number_format($item->price_old)) }}đ</div>
                                                        <div class="discount">{{$sale_percent}}%</div>
                                                    @else
                                                        <div class="price-current w-100 c-pb-16">{{ str_replace(',','.',number_format($item->price)) }}đ</div>
                                                    @endif
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif
        </section>
        <div class="c-pt-8 border-bottom-destop"></div>
    @endforeach
@endif
