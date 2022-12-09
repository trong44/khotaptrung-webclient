@if(isset($data))
    <div class="banner-slide swiper-general">
        <div class=" swiper swiper-banner brs-12">
            <div class="swiper-wrapper">
                @foreach($data as $item)

                    <div class="swiper-slide">
                        <img src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="napgamegiare">
                    </div>

                @endforeach
            </div>

            <div class="navigation slider-next "></div>
            <div class="navigation slider-prev "></div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
@endif

