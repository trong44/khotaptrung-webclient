@if(isset($data) )

    <div class="ads-banner row f_box-product" id="c_slider_banner">
        <div class="col-lg-6 col-md-12 top_box-product">
            @foreach($data as $key=> $item)
                @if($key == 0)
                    <div class="fix_ads-banner-fecond fix_ads-banner-second_top fix_ads-banner-ffist brs-12">
                        @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                        <a href="{{ setting('sys_zip_shop') }}/{{ $item->slug }}" >
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
                        <a href="{{ setting('sys_zip_shop') }}/{{ $item->slug }}" >
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
                    @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                        <div class="fix_ads-banner-second fix_ads-banner-fist brs-12">
                            <a href="{{ setting('sys_zip_shop') }}/{{ $item->slug }}" >
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
                    @else
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


                @endif
            @endforeach
        </div>
    </div>

@endif
