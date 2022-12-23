@if(isset($data) && count($data))
<div class="ads-banner row c-mt-16 c-mt-md-0  c-pb-12 c-pb-lg-28">
    <div class="banner-slide col-lg-9 col-md-12  c-pr-8 c-pr-lg-16 swiper-general">
        <div class=" swiper swiper-banner brs-12">
            <div class="swiper-wrapper">

                @foreach($data[0] as $item)
                    @if(isset($item->image))
                        <div class="swiper-slide">
                            <img class="lazy" onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="">
                        </div>
                    @endif
                @endforeach

            </div>

            <div class="navigation slider-next "></div>
            <div class="navigation slider-prev "></div>

        </div>
        <div class="swiper-pagination"></div>
    </div>

    @if(isset($data[1]) && count($data[1]))
        <div class="col-md-3 c-pl-8 d-none d-lg-flex flex-column justify-content-between " style="min-height: 100%">

            @foreach($data[1] as $item1)

            <div class="ads-banner-second brs-12">
                <a href="{{ isset($item1->url) ? $item1->url : "#" }}">
                    <img src="{{\App\Library\MediaHelpers::media($item1->image)}}" alt="" >
                </a>

            </div>

            @endforeach

        </div>
    @else
    <div class="col-md-3 c-pl-8 d-none d-lg-flex flex-column justify-content-between " style="min-height: 100%">
        <div class="ads-banner-second brs-12">
            <a href="">
                <img src="/assets/frontend/{{theme('')->theme_key}}/image/son/banner01.png" alt="" >
            </a>

        </div>
        <div class="ads-banner-second brs-12">
            <a href="">
                <img src="/assets/frontend/{{theme('')->theme_key}}/image/son/banner02.png" alt="" >

            </a>
        </div>

    </div>
    @endif
</div>
@endif


