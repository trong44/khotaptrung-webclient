@if(empty($data->data))

    @if(isset($items) && count($items) > 0)
        @foreach ($items as $item)

            {{--                Nick random   --}}
            @if($item->status == 1)
                @if($data->display_type == 2)

                    <div class="item-account">
                        <div class="card card-hover h-100">
                            <a href="javascript:void(0)" data-id="{{ $item->randId }}" class="card-body scale-thumb buyacc">
                                <div class="account-thumb c-mb-8">
                                    @if(isset($data->params->thumb_default) && isset($data->params))
                                        <img src="{{\App\Library\MediaHelpers::media($data->params->thumb_default)}}" alt="{{\App\Library\MediaHelpers::media($data->title)}}" class="account-thumb-image lazy" onerror="imgError(this)">
                                    @else
                                        @if(isset($data->image))
                                            <img onerror="imgError(this)" class="account-thumb-image lazy" src="{{\App\Library\MediaHelpers::media($data->image)}}" alt="{{ $item->randId }}">
                                        @else
                                            <img onerror="imgError(this)" class="account-thumb-image lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/no-image.png" alt="No-image">
                                        @endif
                                    @endif
                                </div>
                                <div class="account-title">
                                    <div class="text-title fw-700 text-limit limit-1">{{ isset($data->custom->title) ? $data->custom->title :  $data->title }}</div>
                                </div>
                                <div class="account-info c-mb-8">
                                    <div class="info-attr">
                                        @if(isset($data->items_count))
                                            @if((isset($data->account_fake) && $data->account_fake > 1) || (isset($data->custom->account_fake) && $data->custom->account_fake > 1))
                                                Đã bán: {{ str_replace(',','.',number_format(round(isset($data->custom->account_fake) ? $data->items_count*$data->custom->account_fake : $data->items_count*$data->account_fake))) }}
                                            @else
                                                Đã bán: {{ $data->items_count }}
                                            @endif

                                        @else

                                        @endif
                                    </div>
                                    <div class="info-attr c-mb-8">
                                        ID: #{{ $item->randId }}
                                    </div>
                                </div>
                                @php
                                    if (isset($data->price_old)) {
                                        $sale_percent = (($data->price_old - $data->price) / $data->price_old) * 100;
                                        $sale_percent = round($sale_percent, 0, PHP_ROUND_HALF_UP);
                                    } else {
                                        $sale_percent = 0;
                                    }
                                @endphp
                                <div class="price">
                                    @if ($sale_percent > 0)
                                        <div class="price-current w-100">{{ str_replace(',','.',number_format($data->price)) }}đ</div>
                                        <div class="price-old c-mr-8">{{ str_replace(',','.',number_format($data->price_old)) }}đ</div>
                                        <div class="discount">{{$sale_percent}}%</div>
                                    @else
                                        <div class="price-current w-100 c-pb-16">{{ str_replace(',','.',number_format($data->price)) }}đ</div>
                                    @endif
                                </div>
                                <div class="price c-pt-12 c-pt-lg-8">
                                    <button type="button" class="w-100 btn secondary">Mua ngay</button>
                                </div>
                            </a>
                        </div>

                    </div>


{{--                    Form thanh toán nick random  formThanhToanNickRandom --}}

                    <div class="formDonhangAccount{{ $item->randId }} formThanhToanNickRandom">
                        @if(App\Library\AuthCustom::check() && App\Library\AuthCustom::user()->balance >= $data->price)
                        <form class="formDonhangAccount" data-ranid="{{ $item->randId }}" action="/ajax/acc/{{ $item->randId }}/databuy" method="POST">
                        @else
                        <form class="formDonhangAccount">
                        @endif
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
                                        <div class="card--attr__value fz-13 fw-500">{{ isset($data->custom->title) ? $data->custom->title :  $data->title }}</div>
                                    </div>
                                    <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                                        <div class="card--attr__name fw-400 fz-13 text-center">
                                            Giá tiền
                                        </div>
                                        <div class="card--attr__value fz-13 fw-500">{{ str_replace(',','.',number_format($data->price)) }} đ</div>
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
                                    @if(App\Library\AuthCustom::check())
                                        <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                                            <div class="card--attr__name fz-13 fw-400 text-center">
                                                Số dư tài khoản
                                            </div>
                                            <div class="card--attr__value fz-13 fw-500">
                                                {{ str_replace(',','.',number_format(round(\App\Library\AuthCustom::user()->balance))) }} đ
                                            </div>
                                        </div>
                                    @endif
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
                                @if(App\Library\AuthCustom::check() && App\Library\AuthCustom::user()->balance < $data->price)
                                    <div class="card--gray c-mb-0 c-mt-16 c-pt-8 c-pb-8 c-pl-12 c-pr-12">
                                        <p class="card--attr__payment_failed c-mb-0 fw-400 fz-13 lh-20">
                                            Tài khoản của bạn không đủ để thanh toán, vui lòng nạp tiền để tiếp tục giao dịch
                                        </p>
                                    </div>
                                @endif
                            </div>
                            <div class="modal-footer">
                                @if(App\Library\AuthCustom::check())
                                    @if(App\Library\AuthCustom::user()->balance < $data->price)
                                        <button type="button" class="btn ghost" disabled>Thanh toán</button>
                                        <button type="button" data-dismiss="modal" class="btn primary" data-toggle="modal" data-target="#rechargeModal">Nạp tiền</button>
                                    @else
                                        <button type="submit" class="btn primary">Thanh toán</button>
                                    @endif
                                @else
                                    <button type="button" class="btn primary" data-dismiss="modal" onclick="openLoginModal();">Đăng nhập</button>
                                @endif
                            </div>
                        </form>
                    </div>
                @else

                    <div class="item-account">
                        <div class="card card-hover h-100">
                            <a href="/acc/{{ $item->randId }}" class="card-body scale-thumb">
                                <div class="account-thumb c-mb-8">
                                    <img onerror="imgError(this)"  src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="{{ $item->randId??'' }}"
                                         class="account-thumb-image lazy">
                                </div>
                                <div class="account-title">
                                    <div class="text-title fw-700 text-limit limit-1">{{ isset($data->custom->title) ? $data->custom->title :  $data->title }}</div>
                                </div>
                                <div class="account-info c-mb-8">
                                    <div class="info-attr">
                                        @if(isset($data->items_count))
                                            @if((isset($data->account_fake) && $data->account_fake > 1) || (isset($data->custom->account_fake) && $data->custom->account_fake > 1))
                                                Đã bán: {{ str_replace(',','.',number_format(round(isset($data->custom->account_fake) ? $data->items_count*$data->custom->account_fake : $data->items_count*$data->account_fake))) }}
                                            @else
                                                Đã bán: {{ $data->items_count }}
                                            @endif

                                        @else

                                        @endif
                                    </div>
                                    <div class="info-attr c-mb-8">
                                        ID: #{{ $item->randId }}
                                    </div>
                                    <?php
                                    $total = 0;
                                    ?>

                                    @if(isset($item->groups))
                                        <?php
                                        $att_values = $item->groups;
                                        ?>

                                        {{--                                            @dd($att_values)--}}
                                        @foreach($att_values as $att_value)
                                            {{--            @dd($att_value)--}}
                                            @if($att_value->module == 'acc_label' && $att_value->is_slug_override == null)
                                                @if(isset($att_value->parent))
                                                    @if($total < 4)
                                                        <?php
                                                        $total = $total + 1;
                                                        ?>
                                                            <div class="info-attr">
                                                                {{ $att_value->parent->title??null }}: {{ isset($att_value->title)? \Str::limit($att_value->title,16) : null }}
                                                            </div>
                                                    @endif
                                                @endif
                                            @endif
                                        @endforeach
                                    @endif
                                    @if(isset($item->params))
                                        @if($data->slug == "nick-lien-minh")
                                            @if(isset($item->params->rank_info))

                                                @foreach($item->params->rank_info as $rank_info)

                                                    @if($rank_info->queueType == "RANKED_TFT")
                                                    @elseif($rank_info->queueType == "RANKED_SOLO_5x5")
                                                        <?php
                                                        $total = $total + 1;
                                                        ?>
                                                        <div class="info-attr">
                                                            Rank :
                                                            @if($rank_info->tier == "NONE")
                                                                CHƯA CÓ RANK
                                                            @else
                                                                {{ config('module.acc.auto_lm_rank.'.$rank_info->tier ) }} - {{ $rank_info->division }}
                                                            @endif
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif

                                            @if(isset($item->params->count))
                                                @if(isset($item->params->count->champions))
                                                    <?php
                                                    $total = $total + 1;
                                                    ?>
                                                    <div class="info-attr">
                                                        Số tướng :
                                                        {{ $item->params->count->champions }}
                                                    </div>

                                                @endif
                                                @if(isset($item->params->count->skins))
                                                    <?php
                                                    $total = $total + 1;
                                                    ?>
                                                    <div class="info-attr">
                                                        Trang phục :
                                                        {{ $item->params->count->skins }}
                                                    </div>

                                                @endif
                                            @endif
                                        @elseif($data->slug == "nick-ninja-school")

                                            @php
                                                $server = null;
                                                $info = array();

                                                $params = $item->params;
                                                if (isset($params->server)){
                                                    $server = $params->server;
                                                }
                                                if (isset($params->info) && count($params->info)){
                                                    $info = $params->info;
                                                }
                                            @endphp
                                            @if(isset($server))
                                                <?php
                                                $total = $total + 1;
                                                ?>
                                                    <div class="info-attr">
                                                        Server :
                                                        {{ $server??'' }}
                                                    </div>


                                            @endif

                                            @if(isset($info) && count($info))
                                                @foreach($info as $ke => $in)
                                                    @if(in_array($in->name,config('module.acc.auto_ninja_list_tt')))
                                                        <?php
                                                        $total = $total + 1;
                                                        ?>
                                                        <div class="info-attr">
                                                            {{ $in->name??'' }} :
                                                            @if($in->name == 'Yên')
                                                                {{ str_replace(',','.',number_format($in->value??'')) }}
                                                            @else
                                                                {{ $in->value??'' }}
                                                            @endif
                                                        </div>

                                                    @endif
                                                @endforeach
                                            @endif
                                        @elseif($data->slug == "nick-ngoc-rong-online")

                                            @php
                                                $server = null;
                                                $info = array();

                                                $params = $item->params;
                                                if (isset($params->server)){
                                                    $server = $params->server;
                                                }
                                                if (isset($params->info) && count($params->info)){
                                                    $info = $params->info;
                                                }
                                            @endphp
                                            @if(isset($server))
                                                <?php
                                                $total = $total + 1;
                                                ?>
                                                <div class="info-attr">
                                                    Server :
                                                    {{ $server??'' }}
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
                                                                    <div class="info-attr">
                                                                        {{ $in->name??'' }} :
                                                                        @if(isset($in->value) && count($in->value) )
                                                                            {{ count($in->value) }}
                                                                        @endif
                                                                    </div>
                                                                @endif

                                                            @elseif($in->name == 'Hành tinh' || $in->name == 'Bông tai' )
                                                                <?php
                                                                $total = $total + 1;
                                                                ?>
                                                                <div class="info-attr">
                                                                    {{ $in->name??'' }} :
                                                                    {{ $param??null }}
                                                                    {{ $in->value }}
                                                                </div>
                                                            @endif

                                                        @endif

                                                    @endif
                                                @endforeach
                                            @endif
                                        @endif

                                    @endif
                                    @if(isset($item->params) && isset($item->params->ext_info))
                                        <?php
                                        $params = json_decode(json_encode($item->params->ext_info),true);
                                        ?>

                                        @if($total < 4)
                                            @if(!is_null($dataAttribute) && count($dataAttribute)>0)
                                                @foreach($dataAttribute as $index=>$att)
                                                    @if($att->position == 'text')
                                                        @if(isset($att->childs))
                                                            @foreach($att->childs as $child)
                                                                @foreach($params as $key => $param)
                                                                    @if($key == $child->id && $child->is_slug_override == null)

                                                                        @if($total < 4)
                                                                            <?php
                                                                            $total = $total + 1;
                                                                            ?>
                                                                                <div class="info-attr">
                                                                                    {{ $child->title??null }}: {{ isset($param) ? \Str::limit($param,16) : null }}
                                                                                </div>
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                            @endforeach
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endif
                                    @endif
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

                @endif
            @endif
        @endforeach

    @endif
@endif

<div class="c-pt-24 w-100">
    @if(isset($items) && count($items))
        {{ $items->appends(request()->query())->links('pagination::pagination_3_0') }}
    @endif
</div>


