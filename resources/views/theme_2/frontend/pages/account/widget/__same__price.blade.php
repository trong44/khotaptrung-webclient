@if(isset($data) && count($data))
<section class="section-category same-price">
    <div class="section-header c-mb-24 c-mb-lg-16">
        <h2 class="section-title fz-lg-15">
            {{--            <i class="icon-title c-mr-8" style="--path:url(/assets/frontend/{{theme('')->theme_key}}/image/svg/1362.svg)"></i>--}}
            Tài khoản đồng giá
        </h2>
        <a href="" class="link arr-right ml-auto">Xem thêm</a>
    </div>

    <!-- Đặt tên class cho swiper sau đó config trong file "public/assets/frontend/{{theme('')->theme_key}}/js/swiper-slider-conf/swiper-slider-conf.js" -->
    <!-- Nếu có giao diện giống nhau hoàn toàn thì có thể dùng chung config (chung tên class 'class-config-demo') -->

    <div class="swiper class-config-demo">
        <div class="swiper-wrapper">

            @foreach($data as $item)
            <div class="swiper-slide">
                <div class="item-category">
                    <div class="card">
                        <a href="/acc/{{ $item->randId }}" class="card-body scale-thumb c-p-16">
                            <div class="account-thumb c-mb-8">
                                <img src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="{{ $item->title }}" class="account-thumb-image">
                            </div>
                            <div class="account-title">
                                <div class="text-title fw-700 text-limit limit-1">#{{ $item->randId }}</div>
                            </div>
{{--                            <div class="account-info c-mb-8">--}}
{{--                                <div class="info-attr">--}}
{{--                                    Đã bán: 45.000--}}
{{--                                </div>--}}
{{--                                <div class="info-attr">--}}
{{--                                    ID: #451234--}}
{{--                                </div>--}}
{{--                            </div>--}}

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

                            @php
                                if (isset($item->price_old)) {
                                    $sale_percent = (($item->price_old - $item->price) / $item->price_old) * 100;
                                    $sale_percent = round($sale_percent, 0, PHP_ROUND_HALF_UP);
                                } else {
                                    $sale_percent = 0;
                                }
                            @endphp
                            <div class="price">
                                <div class="price-current w-100">{{ str_replace(',','.',number_format($item->price)) }}đ</div>
                                <div class="price-old c-mr-8">{{ str_replace(',','.',number_format($item->price_old)) }}đ</div>
                                <div class="discount">{{$sale_percent}}%</div>
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
