<section class="flash-sale c-mb-40 c-mb-lg-8 c-mt-24 c-mt-lg-28">
    <div class="section-header c-mb-16">

        <div class="section-title fz-lg-18 lh-lg-28">
            <i class="icon-title c-mr-8 d-inline-block d-lg-none" style="--path:url(/assets/frontend/{{theme('')->theme_key}}/image/son/top.svg)"></i>
            Top vòng quay <span class="today d-none d-lg-block"></span>
        </div>
    </div>
    @if(isset($data) && count($data) > 0)
    <div class="swiper js-flash-sale-swiper card-list">
        <div class="swiper-wrapper">

            @foreach($data as $key => $item)
                @if($key<6)
            <div class="swiper-slide">
                <div class="block-item scale-thumb">
                    <div class="block-thumb top-buy" data-content="Top {{ $key + 1 }}">
                        <a href="/minigame-{{ $item->slug }}">
                            @if(isset($item->image))
                                <img src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="{{ $item->title }}" class="block-thumb-image lazy">
                            @endif
                        </a>
                    </div>
                    <a href="/minigame-{{ $item->slug }}" class="block-info c-mb-16 c-mt-12">
                        <div class="block-title">{{ $item->title }}</div>
                        <div class="text-sold c-mb-12">Đã chơi: {{isset($item->params->fake_num_play)?($item->params->fake_num_play+$item->order_gate_count):$item->order_gate_count}}</div>
                        <div class="price">
                            <div class="price-current">
                                {{ str_replace(',','.',number_format($item->price)) }}đ
                            </div>
                            @if(isset($item->params->percent_sale))
                                <div class="price-old c-mx-8">{{ str_replace(',','.',number_format(($item->params->percent_sale*$item->price)/100 + $item->price)) }} đ</div>
                            @endif
                            @if(isset($item->params->percent_sale))
                                <div class="discount">
                                    -{{ $item->params->percent_sale }}%
                                </div>
                            @endif

                        </div>
                    </a>
                    <div class="block-footer">
                        <a href="/minigame-{{ $item->slug }}" class="btn secondary w-100">Chơi ngay</a>
                    </div>
                </div>
            </div>
                @endif
            @endforeach

        </div>
        <div class="navigation slider-next"></div>
        <div class="navigation slider-prev"></div>
    </div>
    @endif
</section>
