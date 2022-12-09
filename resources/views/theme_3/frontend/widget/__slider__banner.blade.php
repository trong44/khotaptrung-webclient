

<div class="ads-banner row box-product class_c_slider_banner" id="c_slider_banner">
    <div class="banner-slide-v2 col-lg-12 col-md-12 swiper-generalv2">
        <div class=" swiper swiper-banner brs-12">
            <div class="swiper-wrapper">

                @foreach($data as $item)
                    @if(isset($item->image))
                        <div class="swiper-slide">
                            <img onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="">
                        </div>
                    @elseif(isset($item->image_banner))
                        <div class="swiper-slide">
                            <img onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($item->image_banner)}}" alt="">
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
            <div class="container">
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

</div>



