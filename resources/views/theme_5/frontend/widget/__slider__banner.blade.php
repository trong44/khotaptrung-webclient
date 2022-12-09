@if($data)
<div class="banner-slide swiper-general c-mt-24 c-mt-lg-16 c-mb-16 c-mb-lg-28">
    <div class=" swiper swiper-banner brs-12">

        <div class="swiper-wrapper">

            @foreach($data as $item)
                @if(isset($item->image))
                    <div class="swiper-slide">
                        <img onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="">
                    </div>
                @endif
            @endforeach

        </div>

        <div class="navigation slider-next "></div>
        <div class="navigation slider-prev "></div>
    </div>
    <div class="swiper-pagination"></div>
</div>
@endif
