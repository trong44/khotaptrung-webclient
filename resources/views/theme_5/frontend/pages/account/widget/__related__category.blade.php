@if(isset($data))
<section class="section-related-service related-category">
    <div class="section-header c-mb-24 c-mb-lg-16 justify-content-between">
        <h2 class="section-title fz-lg-15 lh-lg-24">
            Mua tài khoản game khác
        </h2>
        <a href="" class="link arr-right">Xem tất cả</a>
    </div>
    <div class="swiper swiper-related-service card-list">
        <div class="swiper-wrapper">
            @foreach($data as $item)

            <div class="swiper-slide">
                <div class="card">
                    <div class="card-body c-p-16 c-p-lg-8 scale-thumb">
                        <a href="/mua-acc/{{ isset($item->custom->slug) && $item->custom->slug != '' ? $item->custom->slug :  $item->slug }}">
                            <div class="card-thumb c-mb-8">
                                <img src="{{ isset($item->custom->image) ? \App\Library\MediaHelpers::media($item->custom->image) : \App\Library\MediaHelpers::media($item->image) }}" alt="{{ isset($item->custom->slug) && $item->custom->slug != '' ? $item->custom->slug :  $item->slug }}" class="card-thumb-image">
                            </div>
                            <div class="card-attr">
                                <div class="text-title fw-700 text-limit limit-1">
                                    {{ isset($item->custom->title) ? $item->custom->title :  $item->title }}
                                </div>
                                <div class="info-attr">
                                    @if(isset($item->items_count))
                                        @if((isset($item->account_fake) && $item->account_fake > 1) || (isset($item->custom->account_fake) && $item->custom->account_fake > 1))
                                            Đã bán: {{ str_replace(',','.',number_format(round(isset($item->custom->account_fake) ? $item->items_count*$item->custom->account_fake : $item->items_count*$item->account_fake))) }}
                                        @else
                                            Đã bán: {{ $item->items_count }}
                                        @endif

                                    @else
                                        Đã bán: 9999
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
</section>
@endif
