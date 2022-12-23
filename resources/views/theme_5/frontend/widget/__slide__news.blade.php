{{--@if(isset($data) && count($data) > 0)--}}
{{--<div class="slide-card c-p-16 c-mt-16 c-p-lg-12 swiper-general banner-news">--}}
{{--    <div class=" swiper news-ads-slide brs-12">--}}
{{--        <div class=" swiper-wrapper">--}}
{{--            @forelse($data as $key => $item)--}}
{{--                @if($key == 3)--}}
{{--                    @break--}}
{{--                @endif--}}
{{--            <div class="swiper-slide">--}}
{{--                <a href="/tin-tuc/{{ $item->slug }}">--}}
{{--                    <div class="row c-px-16 ">--}}
{{--                        <div class="col-lg-8 col-12 col-md-12 c-px-0 news-ads-img brs-12">--}}
{{--                            <img src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-4 col-12 col-md-12 c-pr-0 c-py-0 c-pl-32 c-pl-lg-0 c-pt-lg-24 news-ads-content">--}}

{{--                            <div class="news-title fw-700 fz-32 lh-40 limit-6 fz-lg-18 lh-lg-24 text-limit">--}}
{{--                                {{ $item->title }}--}}
{{--                            </div>--}}
{{--                            <div class="news-title-content c-mt-24 fw-500 fz-15 lh-24 limit-4 text-limit d-none d-lg-block ">--}}
{{--                                {!! $item->description !!}--}}
{{--                            </div>--}}
{{--                            <div class="news-info d-flex c-mt-12 fz-12 lh-16 d-block d-lg-none">--}}
{{--                                <div class="c-mr-8">--}}
{{--                                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/nam/clock.svg" alt="" class="c-mr-2">--}}
{{--                                    {{ formatDateTime($item->created_at) }}--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/nam/author.svg" alt="" class="c-mr-2">--}}
{{--                                    An Nguyen--}}
{{--                                </div>--}}


{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}

{{--            </div>--}}
{{--            @empty--}}
{{--            @endforelse--}}
{{--        </div>--}}

{{--        <div class="navigation slider-next "></div>--}}
{{--        <div class="navigation slider-prev "></div>--}}
{{--    </div>--}}
{{--    <div class="swiper-pagination"></div>--}}
{{--</div>--}}
{{--@endif--}}


@if(isset($data) )

    <div class="ads-banner row f_box-product" id="c_slider_banner">
        <div class="col-lg-6 col-md-12 top_box-product">
            @foreach($data as $key=> $item)
                @if($key == 0)
                    <div class="fix_ads-banner-fecond fix_ads-banner-second_top fix_ads-banner-ffist brs-12 h-100">
                        @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                            <a href="/blog/{{ $item->slug }}" >
                                @if(isset($item->image))
                                    <img onerror="imgError(this)" class="lazy" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="">
                                @else
                                    <img onerror="imgError(this)" class="img-list-nick-category lazy" src="/assets/frontend/theme_3/image/images_1/no-image.png" alt="No-image">
                                @endif
                            </a>
                        @else
                            <a href="/tin-tuc/{{ $item->slug }}" >
                                @if(isset($item->image))
                                    <img onerror="imgError(this)" class="lazy" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="">
                                @else
                                    <img onerror="imgError(this)" class="img-list-nick-category lazy" src="/assets/frontend/theme_3/image/images_1/no-image.png" alt="No-image">
                                @endif
                            </a>
                        @endif

                        <div class="item-article-content">
                            <div class="item-article-name text-limit limit-1">{{ @$item->title }}</div>
                            <div class="item-article-user text-limit limit-1">{!! @$item->description !!}</div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="col-lg-3 col-6 d-lg-flex flex-column justify-content-between center_swiper-general_right" style="min-height: 100%">

            @foreach($data as $key=> $item)
                @if($key == 1 || $key == 2)
                    <div class="fix_ads-banner-second fix_ads-banner-fist brs-12">
                        @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                            <a href="/blog/{{ $item->slug }}" >
                                @if(isset($item->image))
                                    <img onerror="imgError(this)" class="lazy" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="">
                                @else
                                    <img onerror="imgError(this)" class="img-list-nick-category lazy" src="/assets/frontend/theme_3/image/images_1/no-image.png" alt="No-image">
                                @endif
                            </a>
                        @else
                            <a href="/tin-tuc/{{ $item->slug }}" >
                                @if(isset($item->image))
                                    <img onerror="imgError(this)" class="lazy" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="">
                                @else
                                    <img onerror="imgError(this)" class="img-list-nick-category lazy" src="/assets/frontend/theme_3/image/images_1/no-image.png" alt="No-image">
                                @endif
                            </a>
                        @endif

                        <div class="item-article-content-secon">
                            <div class="item-article-name text-limit limit-1">{{ @$item->title }}</div>
                            <div class="item-article-user text-limit limit-1">{!! @$item->description !!}</div>
                        </div>
                    </div>
                @endif
            @endforeach

        </div>

        <div class="col-lg-3 col-6 d-lg-flex flex-column justify-content-between end_swiper-general_right" style="min-height: 100%">
            @foreach($data as $key=> $item)
                @if($key == 3 || $key == 4)

                    <div class="fix_ads-banner-second fix_ads-banner-fist brs-12">
                        <a href="/tin-tuc/{{ $item->slug }}" >
                            @if(isset($item->image))
                                <img onerror="imgError(this)" class="lazy" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="">
                            @else
                                <img onerror="imgError(this)" class="img-list-nick-category lazy" src="/assets/frontend/theme_3/image/images_1/no-image.png" alt="No-image">
                            @endif
                        </a>
                        <div class="item-article-content-secon">
                            <div class="item-article-name text-limit limit-1">{{ @$item->title }}</div>
                            <div class="item-article-user text-limit limit-1">{!! @$item->description !!}</div>
                        </div>
                    </div>

                @endif
            @endforeach
        </div>
    </div>

@endif
