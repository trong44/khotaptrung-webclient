@if(isset($data) && count($data))
    <section class="section-category section-category_c same-price">
        <div class="section-header c-mb-24 c-mb-lg-16">
            <h2 class="section-title fz-lg-15">
                {{--            <i class="icon-title c-mr-8" style="--path:url(/assets/frontend/{{theme('')->theme_key}}/image/svg/1362.svg)"></i>--}}
                Tài khoản đã xem
            </h2>
        </div>

    <!-- Đặt tên class cho swiper sau đó config trong file "public/assets/frontend/{{theme('')->theme_key}}/js/swiper-slider-conf/swiper-slider-conf.js" -->
        <!-- Nếu có giao diện giống nhau hoàn toàn thì có thể dùng chung config (chung tên class 'class-config-demo') -->

        <div class="swiper class-config-demo_v2">
            <div class="swiper-wrapper">

                @foreach($data as $item)
                    @if ($item->randId == $ran_id)
                        @continue;
                    @endif
                    <div class="swiper-slide">
                        <div class="item-category">
                            <div class="card">
                                <a href="/acc/{{ $item->randId }}" class="card-body scale-thumb c-p-16 c-p-lg-12">
                                    <div class="account-thumb c-mb-8">
                                        <img src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="{{ $item->randId }}" class="account-thumb-image lazy">
                                    </div>
                                    <div class="account-title c-mb-8">
                                        <div class="text-title fw-700 text-limit limit-1">#{{ $item->randId }}</div>
                                    </div>

                                    <?php
                                    $total = 0;
                                    $index = 0;
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

                                    @if(isset($item->params) && isset($item->params->ext_info))
                                        <?php $params = json_decode(json_encode($item->params->ext_info),true) ?>
                                        @if(isset($item->category->childs) && count($item->category->childs)>0)
                                            @foreach($item->category->childs as $index=>$att)
                                                @if($att->position == 'text')
                                                    @if(isset($att->childs))
                                                        @foreach($att->childs as $child)
                                                            @foreach($params as $key => $param)
                                                                @if($key == $child->id)
                                                                    {{ $child->title??null }}: {{ isset($param) ? \Str::limit($param,16) : null }}
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    @endif

                                                @endif
                                            @endforeach
                                        @endif
                                    @endif
                                    @if(isset($item->params))
                                        @if(isset($slug))
                                            @if($slug == "nick-lien-minh")
                                                @if(isset($item->params->rank_info))

                                                    @foreach($item->params->rank_info as $rank_info)
                                                        @if($rank_info->queueType == "RANKED_TFT")
                                                        @elseif($rank_info->queueType == "RANKED_SOLO_5x5")
                                                            <?php
                                                            $index = $index + 1;
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
                                                        $index = $index + 1;
                                                        ?>
                                                        <div class="info-attr">
                                                            Số tướng : {{ $item->params->count->champions }}
                                                        </div>
                                                    @endif
                                                    @if(isset($item->params->count->skins))
                                                        <?php
                                                        $index = $index + 1;
                                                        ?>
                                                        <div class="info-attr">
                                                            Trang phục : {{ $item->params->count->skins }}
                                                        </div>
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
                                                    <div class="info-attr">
                                                        Server:
                                                        {{ $server??'' }}
                                                    </div>


                                                @endif

                                                @if(isset($info) && count($info))
                                                    @foreach($info as $ke => $in)
                                                        @if(in_array($in->name,config('module.acc.auto_ninja_list_tt')))

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
                                                    <div class="info-attr">
                                                        Server:
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

                                    @endif
                                    @php
                                        if (isset($item->price_old)) {
                                            $sale_percent = (($item->price_old - $item->price) / $item->price_old) * 100;
                                            $sale_percent = round($sale_percent, 0, PHP_ROUND_HALF_UP);
                                        } else {
                                            $sale_percent = 0;
                                        }
                                    @endphp
                                    <div class="price c-mt-8">
                                        <div class="price-current w-100">{{ str_replace(',','.',number_format($item->price)) }}đ</div>
                                        @if($sale_percent > 0)
                                            <div class="price-old c-mr-8">{{ str_replace(',','.',number_format($item->price_old)) }}đ</div>
                                            <div class="discount">{{$sale_percent}}%</div>
                                        @endif
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="navigation slider-next"></div>
            <div class="navigation slider-prev"></div>
        </div>

    </section>

@endif
