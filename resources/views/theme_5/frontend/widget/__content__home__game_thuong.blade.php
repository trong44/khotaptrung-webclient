@if(isset($data) && count($data) > 0)
    <section class="section-related-service c-pt-32 c-mt-lg-6 c-mb-lg-6 media-web">
        <div class="section-header c-mb-8 c-mb-lg-16 justify-content-between">
            <h2 class="section-title fz-lg-15 lh-lg-24">
                <i class="icon-title c-mr-8" style="--path:url(/assets/frontend/{{theme('')->theme_key}}/image/svg/acc-game.svg)"></i>
                {{ $title??'Nick thường' }}
            </h2>
            <a href="/mua-acc?type=1" class="link arr-right">Xem tất cả</a>
        </div>
        <div class="swiper swiper-related-service card-list">
            <div class="swiper-wrapper">

                @foreach($data as $item)
                    @if($item->display_type == 1)
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-body c-p-16 c-p-lg-12 scale-thumb">

                                <a href="/mua-acc/{{ isset($item->custom->slug) && $item->custom->slug != '' ? $item->custom->slug :  $item->slug }}">
                                    <div class="card-thumb c-mb-8">
                                        <img onerror="imgError(this)" src="{{ isset($item->custom->image) ? \App\Library\MediaHelpers::media($item->custom->image) :  \App\Library\MediaHelpers::media($item->image) }}" alt="" class="card-thumb-image">
                                    </div>
                                    <div class="card-attr">
                                        <div class="text-title fw-700 text-limit limit-1">
                                            {{ isset($item->custom->title) ? $item->custom->title :  $item->title }}
                                        </div>
                                        <div class="info-attr">

                                            @if(isset($item->items_count))
                                                @if((isset($item->account_fake) && $item->account_fake > 1) || (isset($item->custom->account_fake) && $item->custom->account_fake > 1))
                                                    Số tài khoản: {{ str_replace(',','.',number_format(round(isset($item->custom->account_fake) ? $item->items_count*$item->custom->account_fake : $item->items_count*$item->account_fake))) }}
                                                @else
                                                    Số tài khoản: {{ $item->items_count }}
                                                @endif

                                            @else
                                                Số tài khoản: 0
                                            @endif

                                        </div>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach

            </div>
            <div class="navigation slider-next"></div>
            <div class="navigation slider-prev"></div>
        </div>
    </section>
    <section class="acc-game-v2 media-mobile c-mt-12 c-mt-lg-24 c-mb-12 c-mb-lg-6">
        <div class="section-header c-mb-24 c-mb-lg-20 justify-content-between">
            <h2 class="section-title fz-lg-20 lh-lg-24">
                <i class="icon-title c-mr-8" style="--path:url(/assets/frontend/{{theme('')->theme_key}}/image/svg/acc-game.svg)"></i>
                {{ $title??'' }}
            </h2>
            <a href="/mua-acc?type=1" class="link arr-right">Xem tất cả</a>
        </div>
        <div class="list-category content-desc-nick hide">
            @foreach($data as $item)
                @if($item->display_type == 1)
                <div class="item-category c-px-8 c-mb-12 c-px-lg-6">
                    <div class="card">
                        <div class="card-body c-p-16 c-p-lg-12 scale-thumb">
                            <a href="/mua-acc/{{ isset($item->custom->slug) && $item->custom->slug != '' ? $item->custom->slug :  $item->slug }}">
                                <div class="card-thumb c-mb-8">
                                    <img onerror="imgError(this)" src="{{ isset($item->custom->image) ? \App\Library\MediaHelpers::media($item->custom->image) :  \App\Library\MediaHelpers::media($item->image) }}" alt="" class="card-thumb-image">
                                </div>
                                <div class="card-attr">
                                    <div class="text-title fw-700 text-limit limit-1">
                                        {{ isset($item->custom->title) ? $item->custom->title :  $item->title }}
                                    </div>
                                    <div class="info-attr">
                                        @if(isset($item->items_count))
                                            @if((isset($item->account_fake) && $item->account_fake > 1) || (isset($item->custom->account_fake) && $item->custom->account_fake > 1))
                                                Số tài khoản: {{ str_replace(',','.',number_format(round(isset($item->custom->account_fake) ? $item->items_count*$item->custom->account_fake : $item->items_count*$item->account_fake))) }}
                                            @else
                                                Số tài khoản: {{ $item->items_count }}
                                            @endif

                                        @else
                                            Số tài khoản: 0
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
        <div class="card-footer-nick text-center">
            <span class="see-more-nick" data-content="Xem thêm nội dung"></span>
        </div>
    </section>
    <div class="c-pt-8 border-bottom-destop c-mt-lg-16"></div>
@endif
