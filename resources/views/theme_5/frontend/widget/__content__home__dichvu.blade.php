@if(isset($data) && count($data) > 0)
    <section class="section-related-service c-pt-32 c-pt-lg-6 c-pb-12 c-pb-lg-6 media-web">
        <div class="section-header c-mb-8 c-mb-lg-16 justify-content-between">
            <h2 class="section-title fz-lg-15 lh-lg-24">
                <i class="icon-title c-mr-8" style="--path:url(/assets/frontend/{{theme('')->theme_key}}/image/svg/acc-game.svg)"></i>
                {{ $title??'Dịch vụ game' }}
            </h2>
            <a href="/dich-vu" class="link arr-right">Xem tất cả</a>
        </div>
        @if (!setting('sys_theme_service_list') || setting('sys_theme_service_list') == 1 )
            <div class="swiper swiper-related-service card-list">
                <div class="swiper-wrapper">
                    @foreach($data as $item)

                        <div class="swiper-slide">
                            <div class="card">
                                <div class="card-body c-p-16 c-p-lg-12 scale-thumb">
                                    <a href="/dich-vu/{{ $item->slug}}">
                                        <div class="card-thumb c-mb-8">
                                            <img onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="" class="lazy card-thumb-image">
                                        </div>
                                        <div class="card-attr">
                                            <div class="text-title fw-700 text-limit limit-1">
                                                {{ $item->title  }}
                                            </div>
                                            <div class="info-attr">
                                                @if(isset($item->total_order))
                                                    @if($item->params_plus)
                                                        @foreach($item->params_plus as $key => $val)
                                                            @if($key == 'fk_buy')
                                                                Giao dịch: {{ str_replace(',','.',number_format($item->total_order + $val)) }}
                                                            @endif
                                                        @endforeach

                                                    @else
                                                        Giao dịch: {{ str_replace(',','.',number_format($item->total_order)) }}
                                                    @endif

                                                @else
                                                    @if($item->params_plus)
                                                        @foreach($item->params_plus as $key => $val)
                                                            @if($key == 'fk_buy')
                                                                Giao dịch: {{ str_replace(',','.',number_format($val)) }}
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        Giao dịch: 0
                                                    @endif

                                                @endif
                                            </div>
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
        @elseif (setting('sys_theme_service_list') > 1)
            <div class="list-category">
                @foreach($data as $key => $item)

                    @if ( $key == (setting('sys_theme_service_list') * 5) )
                        @break;
                    @endif

                    <div class="item-category c-px-8 c-mb-12 c-px-lg-6">
                        <div class="card">
                            <div class="card-body c-p-16 c-p-lg-12 scale-thumb">
                                <a href="/dich-vu/{{ $item->slug}}">
                                    <div class="card-thumb c-mb-8">
                                        <img onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="" class="lazy card-thumb-image">
                                    </div>
                                    <div class="card-attr">
                                        <div class="text-title fw-700 text-limit limit-1">
                                            {{ $item->title  }}
                                        </div>
                                        <div class="info-attr">
                                            @if(isset($item->total_order))
                                                @if($item->params_plus)
                                                    @foreach($item->params_plus as $key => $val)
                                                        @if($key == 'fk_buy')
                                                            Giao dịch: {{ str_replace(',','.',number_format($item->total_order + $val)) }}
                                                        @endif
                                                    @endforeach

                                                @else
                                                    Giao dịch: {{ str_replace(',','.',number_format($item->total_order)) }}
                                                @endif

                                            @else
                                                @if($item->params_plus)
                                                    @foreach($item->params_plus as $key => $val)
                                                        @if($key == 'fk_buy')
                                                            Giao dịch: {{ str_replace(',','.',number_format($val)) }}
                                                        @endif
                                                    @endforeach
                                                @else
                                                    Giao dịch: 0
                                                @endif

                                            @endif
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        @endif
    </section>

    <section class="acc-game-v2 media-mobile c-pt-12 c-pt-lg-6 c-pb-12 c-pb-lg-6">
        <div class="section-header c-mb-24 c-mb-lg-20 justify-content-between">
            <h2 class="section-title fz-lg-20 lh-lg-24">
                <i class="icon-title c-mr-8" style="--path:url(/assets/frontend/{{theme('')->theme_key}}/image/svg/acc-game.svg)"></i>
                {{ $title??'Dịch vụ game' }}
            </h2>
            <a href="/dich-vu" class="link arr-right">Xem tất cả</a>
        </div>
        <div class="list-category content-desc-nick hide">
            @foreach($data as $item)

                <div class="item-category c-px-8 c-mb-12 c-px-lg-6">
                    <div class="card">
                        <div class="card-body c-p-16 c-p-lg-12 scale-thumb">
                            <a href="/dich-vu/{{ $item->slug}}">
                                <div class="card-thumb c-mb-8">
                                    <img onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="" class="card-thumb-image">
                                </div>
                                <div class="card-attr">
                                    <div class="text-title fw-700">
                                        {{ $item->title  }}
                                    </div>
                                    <div class="info-attr">
                                        @if(isset($item->total_order))
                                            @if($item->params_plus)
                                                @foreach($item->params_plus as $key => $val)
                                                    @if($key == 'fk_buy')
                                                        Giao dịch: {{ str_replace(',','.',number_format($item->total_order + $val)) }}
                                                    @endif
                                                @endforeach

                                            @else
                                                Giao dịch: {{ str_replace(',','.',number_format($item->total_order)) }}
                                            @endif

                                        @else
                                            @if($item->params_plus)
                                                @foreach($item->params_plus as $key => $val)
                                                    @if($key == 'fk_buy')
                                                        Giao dịch: {{ str_replace(',','.',number_format($val)) }}
                                                    @endif
                                                @endforeach
                                            @else
                                                Giao dịch: 0
                                            @endif

                                        @endif
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
        <div class="card-footer-nick text-center">
            <span class="see-more-nick" data-content="Xem thêm nội dung"></span>
        </div>
    </section>
    <div class="c-pt-8 border-bottom-destop c-pt-lg-2"></div>
@endif
