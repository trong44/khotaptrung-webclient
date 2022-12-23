

@if(isset($data) && count($data))


<div class="ads-banner row box-product class_c_slider_banner" id="c_slider_banner">
    <div class="banner-slide-v2 col-lg-9 col-md-12 swiper-general">
        <div class=" swiper swiper-banner brs-12">
            <div class="swiper-wrapper">

                @foreach($data[0] as $item)
                    @if(isset($item->image))
                        <div class="swiper-slide">
                            <img onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="">
                        </div>
                    @endif
                @endforeach

            </div>

            <div class="swiper-button-prev" id="c_slider_banner-prev">
                <img src="./assets/frontend/theme_3/image/swiper-prev.svg" alt="">
            </div>
            <div class="swiper-button-next" id="c_slider_banner-next">
                <img src="./assets/frontend/theme_3/image/swiper-next.svg" alt="">
            </div>

        </div>
        <div class="swiper-pagination"></div>
        <div class="banner-content">
            <div class="container  " >
                <div class="d-flex justify-content-between">
                    @if(setting('sys_marquee'))
                        <div class="rotation-notify-home text-slider  rotation-notify-home-fix">
                            <img class="img-text-slider" src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/sound.svg" alt="">
                            <marquee class="rotation-marquee marquee-move">

                                <div class="rotation-marquee-item marquee-item">
                                    {!! setting('sys_marquee') !!}
                                </div>
                            </marquee>
                        </div>
                    @endif

                </div>

            </div>
        </div>
    </div>

    @if(isset($data[1]) && count($data[1]))
    <div class="col-md-3 d-none d-lg-flex flex-column justify-content-between swiper-general_right" style="min-height: 100%">

        @foreach($data[1] as $item1)

        <div class="ads-banner-second brs-12">

            <a href="{{ isset($item1->url) ? $item1->url : "#" }}">
                <img src="{{\App\Library\MediaHelpers::media($item1->image)}}" alt="" >
            </a>

        </div>

        @endforeach

    </div>
    @else
        <div class="col-md-3 d-none d-lg-flex flex-column justify-content-between swiper-general_right" style="min-height: 100%">
            <div class="ads-banner-second brs-12">
                <a href="">
                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/banner01.png" alt="" >
                </a>

            </div>
            <div class="ads-banner-second brs-12">
                <a href="">
                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/banner02.png" alt="" >

                </a>
            </div>

        </div>
    @endif
</div>
@endif


