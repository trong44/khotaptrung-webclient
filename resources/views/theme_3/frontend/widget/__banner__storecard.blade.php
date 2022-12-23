@if(isset($data))
    <div class="poster__banner _mt-125 _mt-sm-0">
        <div class="swiper js--swiper__banner mb-n4">
            <div class="swiper-wrapper">
                @foreach($data as $item)
                    @if(isset($item->image))
                        <div class="swiper-slide">
                            <a href="#" class="banner__link">
                                <img onerror="imgError(this)" class="" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="POSTER BANNER">
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="swiper-pagination --custom"></div>
        </div>
    </div>
@else

<div class="poster__banner _mt-125 _mt-sm-0">
    <div class="swiper js--swiper__banner mb-n4">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <a href="#" class="banner__link">
                    <img onerror="imgError(this)"  src="/assets/frontend/{{theme('')->theme_key}}/image/store_card_bg.png" class="banner__image" alt="POSTER BANNER">
                </a>
            </div>
        </div>
        <div class="swiper-pagination --custom"></div>
    </div>
</div>
@endif
