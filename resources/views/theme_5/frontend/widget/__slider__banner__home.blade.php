{{--@dd(theme('')->theme_config->sys_theme_ver)--}}
@if(isset(theme('')->theme_config->sys_theme_ver))
    @if(theme('')->theme_config->sys_theme_ver == 'sys_theme_ver3.0')
        @if(isset($data))
        <div class="ads-banner row c-mt-16 c-mb-24 c-mb-lg-20">
            <div class="banner-slide col-lg-9 col-md-12  c-pr-8 c-pr-lg-16 swiper-general">
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
        </div>
        @endif
    @else
        @if(isset($data))
        <div class="banner-slide swiper-general c-mt-16 c-mb-24 c-mb-lg-20">
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
    @endif
@endif




