@php
    $data_viewed = Cookie::get('viewed_account') ?? '[]';
    $data_viewed = json_decode($data_viewed,true);
@endphp

@if(count($data_viewed))
    <div class="art-list" style="width: 100%">
        <div class="d-flex justify-content-between" style="padding-top: 8px;padding-bottom: 16px">
            <div class="main-title" style="margin-bottom: 0">
                <h1>Tài khoản đã xem</h1>
            </div>
        </div>

        <div class="entries">
            <div class="row fix-border fix-border-nick justify-content-center" id="showslideracc">
                @foreach($data_viewed as $item)
                <div class="col-md-3 col-sm-6 col-6 entries_item" style="display: block">
                    <a href="/acc/{{ $item['randId'] }}">
                        @if(isset($item['image']))
                            <img src="{{\App\Library\MediaHelpers::media($item['image'])}}" alt="{{ $item['randId'] }}" class="entries_item-img">
                        @else
                            <img class="item_buy_list_img-main" src="/assets/frontend/{{theme('')->theme_key}}/image/anhconten.jpg" alt="">
                        @endif
                            <h2 class="text-title text-left  fw-bold" style="color: #434657;margin-bottom: 8px">#STS {{ $item['randId'] }}</h2>

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
                        <h2 class="text-left"
                            style="color: rgb(238, 70, 35);font-size: 16px;margin-bottom: 0;margin-top: 8px">{{ str_replace(',','.',number_format($item['price_old'])) }}đ </h2>
                        <p class="text-left"
                           style="color: #82869E;margin-bottom: 0;font-size: 14px;text-decoration: line-through;"> {{ str_replace(',','.',number_format($item['price'])) }}đ
                            <span class="badge badge-success" style="margin-left: 4px;padding-top: 4px;background: rgb(238, 70, 35);">23%</span>
                        </p>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
