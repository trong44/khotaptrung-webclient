@php
    $data_viewed = Cookie::get('viewed_account') ?? '[]';
    $data_viewed = json_decode($data_viewed,true);
@endphp
@if(count($data_viewed))
    <div class="shop_product_another pt-3">
        <div class="c-content-title-1">
            <h3 class="c-center c-font-uppercase c-font-bold title__tklienquan">Tài khoản đã xem</h3>
            <div class="c-line-center c-theme-bg"></div>
        </div>
        <div class="shop_product_another_content">
            <div class="item_buy_list row">
                @foreach($data_viewed as $item)
                    <div class="col-6 col-sm-6 col-lg-3 fixcssacount">
                        <div class="item_buy_list_in">
                            <div class="item_buy_list_img">
                                <a href="/acc/{{ $item['randId'] }}">
                                    @if(isset($item['image']))
                                        <img class="lazy item_buy_list_img-main" src="{{\App\Library\MediaHelpers::media($item['image'])}}" alt="{{ $item['randId'] }}">
                                    @else
                                        <img class="item_buy_list_img-sale" src="/assets/frontend/theme_6/image/mgg.png" alt="">
                                    @endif
                                    <span>MS: {{ $item['randId'] }} </span>
                                </a>
                            </div>
                            <div class="item_buy_list_description">
                                bảo hành 100%,lỗi hoàn tiền
                            </div>
                            <div class="item_buy_list_info">
                                <div class="row">
                                    <?php
                                    $index = 0;
                                    ?>

                                    @if(isset($item['groups']))
                                        <?php
                                        $att_values = $item['groups'];
                                        ?>
                                        {{--                                                @dd($att_valuesv2)--}}
                                        @foreach($att_values as $att_value)

                                            @if(isset($att_value->module) && $att_value->module == 'acc_label' && $att_value->is_slug_override == null)
                                                <?php
                                                $index++;
                                                ?>
                                                @if($index < 5)
                                                    @if(isset($att_value->parent))
                                                        <div class="row" style="margin: 0 auto;width: 100%">
                                                            <div class="col-auto item_buy_list_info_inacc fixcssacount">
                                                                {{ $att_value->parent->title??null }} :
                                                            </div>
                                                            <div class="col-auto item_buy_list_info_inaccright fixcssacount" style="color: #666;font-weight: 600;margin-left: auto">
                                                                {{--                                                                {{ $att_valuev2->title??null }}--}}
                                                                {{ isset($att_value->title) ? \Str::limit($att_value->title,16) : null }}

                                                            </div>
                                                        </div>
                                                    @endif
                                                @endif
                                            @endif
                                        @endforeach
                                    @endif
                                    @if(isset($item->params))
                                        @if(isset($item->params->rank_info))

                                            @foreach($item->params->rank_info as $rank_info)
                                                @if($rank_info->queueType == "RANKED_TFT")
                                                @elseif($rank_info->queueType == "RANKED_SOLO_5x5")
                                                    <?php
                                                    $index = $index + 1;
                                                    ?>
                                                    <div class="row" style="margin: 0 auto;width: 100%">
                                                        <div class="col-auto item_buy_list_info_inacc fixcssacount">
                                                            Rank :
                                                        </div>
                                                        <div class="col-auto item_buy_list_info_inaccright fixcssacount" style="color: #666;font-weight: 600;margin-left: auto">
                                                            {{--                                                                {{ $att_valuev2->title??null }}--}}
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
                                        @if(isset($item->params->count))
                                            @if(isset($item->params->count->champions))
                                                <?php
                                                $index = $index + 1;
                                                ?>
                                                <div class="row" style="margin: 0 auto;width: 100%">
                                                    <div class="col-auto item_buy_list_info_inacc fixcssacount">
                                                        Số tướng :
                                                    </div>
                                                    <div class="col-auto item_buy_list_info_inaccright fixcssacount" style="color: #666;font-weight: 600;margin-left: auto">
                                                        {{--                                                                {{ $att_valuev2->title??null }}--}}
                                                        {{ $item->params->count->champions }}

                                                    </div>
                                                </div>

                                            @endif
                                            @if(isset($item->params->count->skins))
                                                <?php
                                                $index = $index + 1;
                                                ?>
                                                <div class="row" style="margin: 0 auto;width: 100%">
                                                    <div class="col-auto item_buy_list_info_inacc fixcssacount">
                                                        Trang phục :
                                                    </div>
                                                    <div class="col-auto item_buy_list_info_inaccright fixcssacount" style="color: #666;font-weight: 600;margin-left: auto">
                                                        {{--                                                                {{ $att_valuev2->title??null }}--}}
                                                        {{ $item->params->count->skins }}

                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                    @endif
                                    @if(isset($item->params) && isset($item->params->ext_info))
                                        <?php $params = json_decode(json_encode($item->params->ext_info),true) ?>
                                        @if(isset($item->category->childs) && count($item->category->childs)>0)
                                            @foreach($item->category->childs as $index=>$att)
                                                @if($att->position == 'text')
                                                    @if(isset($att->childs))
                                                        @foreach($att->childs as $child)
                                                            @foreach($params as $key => $param)
                                                                @if($key == $child->id)
                                                                    <div class="row" style="margin: 0 auto;width: 100%">
                                                                        <div class="col-auto item_buy_list_info_inacc fixcssacount">
                                                                            {{ $child->title }}:
                                                                        </div>
                                                                        <div class="col-auto item_buy_list_info_inaccright fixcssacount" style="color: #666;font-weight: 600;margin-left: auto">
                                                                            {{--                                                                {{ $att_valuev2->title??null }}--}}
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
                            <div class="item_buy_list_more">
                                <div class="row">
                                    <div class="col-12 fixcssacount">
                                        <div class="item_buy_list_price">
                                            <span>{{ str_replace(',','.',number_format($item['price_old'])) }}đ  </span>
                                            {{ str_replace(',','.',number_format($item['price'])) }}đ
                                        </div>
                                    </div>
                                    <a href="/acc/{{ $item['randId'] }}" class="col-12 fixcssacount">
                                        <div class="item_buy_list_view">
                                            Chi tiết
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif


