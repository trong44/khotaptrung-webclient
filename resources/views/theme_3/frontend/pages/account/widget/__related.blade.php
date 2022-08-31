@if(isset($data) && count($data))
<div class="container container-fix body-container-ct">
    <div class="row marginauto body-container-row-ct body-container-row-mobile-ct">
        <div class="col-md-12 left-right">
            <div class="row marginauto body-row-ct media-ctbg-ct">

                <div class="col-md-12 left-right napgamekhac">
                    <div class="row marginauto">
                        <div class="d-flex col-md-12 text-left left-right">
                            <span>Tài khoản liên quan</span>
                            <div class="navbar-spacer"></div>
                            <div class="text-view-more">
                                <a href="/mua-acc/{{ $data[0]->category->slug }}" class="global__link">Xem thêm<i class="__icon --sm --link ml-1" style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/svg/arrowright.svg)"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 left-right">
                    <div class="row nick-sider-header product-list-category">
                        <div class="swiper-container list-dong-gia col-md-12 text-left left-right">
                            <div class="swiper-wrapper">
                                @foreach($data as $item)
                                    <div class="swiper-slide body-detail-nick-slider-ct">
                                        <a href="/acc/{{ $item->randId }}" class="list-item-nick-hover">
                                            <div class="row marginauto ">
                                                <div class="col-md-12 left-right default-overlay-nick-ct related-acc-detail">
                                                    @if(isset($item->image))
                                                        <img class="lazy" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="{{ $item->randId }}">
                                                    @else
                                                    <img class="lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/no-image.png" alt="No-image">
                                                    @endif
                                                </div>
                                                <div class="col-md-12 left-right list-item-nick">
                                                    <div class="row marginauto list-item-nick-body">
                                                        <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                            <span>ID: {{ $item->randId }}</span>
                                                        </div>
                                                        <?php
                                                            $index = 0;
                                                        ?>
                                                        @if(isset($item->groups))
                                                            <?php
                                                                $att_values = $item->groups;
                                                            ?>
                                                            {{--                                                @dd($att_valuesv2)--}}
                                                            @foreach($att_values as $att_value)

                                                                @if(isset($att_value->module) && $att_value->module == 'acc_label' && $att_value->is_slug_override == null)

                                                                    @if($index < 4)
                                                                        @if(isset($att_value->parent))
                                                                            <?php
                                                                                $index++;
                                                                            ?>
                                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                                <small>{{ $att_value->parent->title??null }}: {{ isset($att_value->title) ? \Str::limit($att_value->title,16) : null }}</small>
                                                                            </div>
                                                                        @endif
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        @endif

                                                        @if ($index < 4)
                                                            @for ($i = 0; $i < 4 - $index; $i++)
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct"></div>
                                                            @endfor
                                                        @endif

                                                        <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                            <ul>
                                                                @if(isset($item->price))
                                                                    <li class="fist-li-account">{{ str_replace(',','.',number_format($item->price)) }}đ</li>
                                                                    <li class="second-li-account">{{ str_replace(',','.',number_format($item->price_old??$item->price)) }}đ</li>
                                                                    @php
                                                                        if (isset($item->price_old)) {
                                                                            $sale_percent = (($item->price_old - $item->price) / $item->price_old) * 100;
                                                                            $sale_percent = round($sale_percent, 0, PHP_ROUND_HALF_UP);
                                                                        } else {
                                                                            $sale_percent = 0;
                                                                        }
                                                                    @endphp
                                                                    <li class="three-li-account">-{{$sale_percent}}%</li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-button-prev">
                                <img src="/assets/frontend/{{theme('')->theme_key}}/image/swiper-prev.svg" alt="">
                            </div>
                            <div class="swiper-button-next">
                                <img src="/assets/frontend/{{theme('')->theme_key}}/image/swiper-next.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endif

@php
    $data_viewed = Cookie::get('viewed_account') ?? '[]';
    $data_viewed = json_decode($data_viewed,true);
@endphp
@if(count($data_viewed))
    <div class="container container-fix body-container-ct">
        <div class="row marginauto body-container-row-ct body-container-row-mobile-ct">
            <div class="col-md-12 left-right">
                <div class="row marginauto body-row-ct media-ctbg-ct">

                    <div class="col-md-12 left-right napgamekhac">
                        <div class="row marginauto">
                            <div class="col-md-12 text-left left-right">
                                <span>Tài khoản đã xem</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 left-right">
                        <div class="row nick-sider-header product-list-category">
                            <div class="swiper-container view_dong_gia class-config-account-viewed col-md-12 text-left left-right">
                                <div class="swiper-wrapper data_watched">
                                    @forelse($data_viewed as $key => $acc_viewed)
                                        <div class="swiper-slide body-detail-nick-slider-ct">
                                            <a href="/acc/{{ @$acc_viewed['randId'] }}" class="list-item-nick-hover">
                                                <div class="row marginauto ">
                                                    <div class="col-md-12 left-right default-overlay-nick-ct related-acc-detail"><img class="lazy" src="{{\App\Library\MediaHelpers::media($acc_viewed['image'])}}" alt=""></div>
                                                    <div class="col-md-12 left-right list-item-nick">
                                                        <div class="row marginauto list-item-nick-body">
                                                            <div class="col-md-12 left-right text-left body-detail-account-col-span-ct"><span>ID: #{{ @$acc_viewed['randId'] }}</span></div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct"><small>Đã bán: {{ @$acc_viewed['buy_account'] }}</small></div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <ul>
                                                                    <li class="fist-li-account">{{ str_replace(',','.',number_format($acc_viewed['price'])) }}đ</li>
                                                                    <li class="second-li-account">{{ str_replace(',','.',number_format($acc_viewed['price_old'])) }}đ</li>
                                                                    <li class="three-li-account">-{{ @$acc_viewed['promotion'] }}%</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                                <div class="swiper-button-prev">
                                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/swiper-prev.svg" alt="">
                                </div>
                                <div class="swiper-button-next">
                                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/swiper-next.svg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endif
