@if(isset($data) && count($data))

    @foreach($data as $item)
        @if($item->status == 1)
            @if ($item->randId == $ran_id)
                @continue;
            @endif
        <div class="col-md-3 col-sm-6 col-6 entries_item" style="display: block">
            <a href="/acc/{{ $item->randId }}">
                <img src="{{\App\Library\MediaHelpers::media($item->image)}}"
                     alt="{{ $item->title }}" class="entries_item-img">
                <h2 class="text-title text-left  fw-bold" style="color: #434657;margin-bottom: 8px">#{{ $item->randId }}</h2>
                <?php
                $total = 0;
                ?>
                
                @if(isset($item->groups))
                    <?php
                    $att_values = $item->groups;
                    ?>
                    @foreach($att_values as $att_value)
                        {{--            @dd($att_value)--}}
                        @if($att_value->module == 'acc_label' && $att_value->is_slug_override == null)
                            {{--                                                        @dd($att_value->parent)--}}
                            @if(isset($att_value->parent))
                                @if($total < 4)
                                    <?php
                                    $total = $total + 1;
                                    ?>
                                    <p class="text-left" style="color: #82869E;margin-bottom: 4px">{{ $att_value->parent->title??null }}: {{ isset($att_value->title)? \Str::limit($att_value->title,16) : null }}</p>
                                @endif
                            @endif
                        @endif
                    @endforeach
                @endif

                @if(isset($item->params))
                    @if($slug == "nick-lien-minh")
                        @if(isset($item->params->rank_info))

                            @foreach($item->params->rank_info as $rank_info)
                                @if($rank_info->queueType == "RANKED_TFT")

                                @elseif($rank_info->queueType == "RANKED_SOLO_5x5")
                                    <p class="text-left" style="color: #82869E;margin-bottom: 4px">Rank:
                                        @if($rank_info->tier == "NONE")
                                            CHƯA CÓ RANK
                                        @else
                                            {{ config('module.acc.auto_lm_rank.'.$rank_info->tier ) }} - {{ $rank_info->division }}
                                        @endif
                                    </p>
                                @endif
                            @endforeach
                        @endif
                        @if(isset($item->params->rank_level))
                            <p class="text-left" style="color: #82869E;margin-bottom: 4px">Level:
                                {{ $item->params->rank_level }}
                            </p>

                        @endif

                        @if(isset($item->params->count))
                            @if(isset($item->params->count->champions))
                                <p class="text-left" style="color: #82869E;margin-bottom: 4px">Số tướng :
                                    {{ $item->params->count->champions }}
                                </p>
                            @endif
                            @if(isset($item->params->count->skins))
                                <p class="text-left" style="color: #82869E;margin-bottom: 4px">Trang phục :
                                    {{ $item->params->count->skins }}
                                </p>
                            @endif
                        @endif
                    @elseif($slug == "nick-ninja-school")

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
                            <p class="text-left" style="color: #82869E;margin-bottom: 4px">Server:
                                {{ $server??'' }}
                            </p>
                        @endif

                        @if(isset($info) && count($info))
                            @foreach($info as $ke => $in)
                                @if(in_array($in->name,config('module.acc.auto_ninja_list_tt')))
                                    <p class="text-left" style="color: #82869E;margin-bottom: 4px">{{ $in->name??'' }}:
                                        @if($in->name == 'Yên')
                                            {{ str_replace(',','.',number_format($in->value??'')) }}
                                        @else
                                            {{ $in->value??'' }}
                                        @endif
                                    </p>
                                @endif
                            @endforeach
                        @endif
                    @elseif($slug == "nick-ngoc-rong-online")

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
                            <p class="text-left" style="color: #82869E;margin-bottom: 4px">Server:
                                {{ $server??'' }}
                            </p>
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
                                                <p class="text-left" style="color: #82869E;margin-bottom: 4px">
                                                    {{ $in->name??'' }}:
                                                    @if(isset($in->value) && count($in->value) )
                                                        {{ count($in->value) }}
                                                    @endif
                                                </p>
                                            @endif

                                        @elseif($in->name == 'Hành tinh' || $in->name == 'Bông tai' )
                                            <?php
                                            $total = $total + 1;
                                            ?>
                                            <p class="text-left" style="color: #82869E;margin-bottom: 4px">
                                                {{ $in->name??'' }}:
                                                {{ $param??null }}
                                                {{ $in->value }}
                                            </p>
                                        @endif

                                    @endif

                                @endif
                            @endforeach
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
                                                @if($total < 4)
                                                    <?php
                                                    $total = $total + 1;
                                                    ?>
                                                    <p class="text-left" style="color: #82869E;margin-bottom: 4px">{{ $child->title??null }}: {{ isset($param) ? \Str::limit($param,16) : null }}</p>
                                                @endif
                                            @endif
                                        @endforeach
                                    @endforeach
                                @endif

                            @endif
                        @endforeach
                    @endif
                @endif
                
                @php
                    if (isset($item->price_old)) {
                        $sale_percent = (($item->price_old - $item->price) / $item->price_old) * 100;
                        $sale_percent = round($sale_percent, 0, PHP_ROUND_HALF_UP);
                    } else {
                        $sale_percent = 0;
                    }
                @endphp
                <h2 class="text-left" style="color: rgb(238, 70, 35);font-size: 16px;margin-bottom: 0;margin-top: 8px">{{ str_replace(',','.',number_format($item->price)) }}đ</h2>
                <p class="text-left" style="color: #82869E;margin-bottom: 0;font-size: 14px;text-decoration: line-through;">{{ str_replace(',','.',number_format($item->price_old)) }}đ <span class="badge badge-success" style="margin-left: 4px;padding-top: 4px;background: rgb(238, 70, 35);">{{ $sale_percent }}%</span></p>
            </a>
        </div>
        @endif
    @endforeach

@endif


