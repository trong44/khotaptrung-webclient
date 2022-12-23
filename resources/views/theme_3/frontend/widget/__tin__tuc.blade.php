@if(isset($data))
<div class=" block-product mt-fix-20 mt-md-fix-8">
    <div class="product-header d-flex">
        <span>
            <img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/tintucindex.svg" alt="">
        </span>
        <h2 class="text-title">{{ $title??'Tin tức' }}</h2>
        <div class="navbar-spacer"></div>
        <div class="text-view-more">
            @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
            <a href="{{ setting('sys_zip_shop') }}" class="global__link">Xem thêm<i class="__icon --sm --link ml-1" style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/svg/arrowright.svg)"></i></a>
            @else
                <a href="/tin-tuc" class="global__link">Xem thêm<i class="__icon --sm --link ml-1" style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/svg/arrowright.svg)"></i></a>
            @endif
        </div>
    </div>
{{--    <div class="box-product-content tab-content">--}}
    <div class="box-product-content ">


{{--                <div class="box-product tab-pane fade show active" id="news_game-{{ $item->slug }}" role="tabpanel" >--}}
            <div class="box-product news-home" role="tabpanel" >
                <div class="swiper-container  list-news" >
                    <div class="swiper-wrapper">
                        @foreach($data as $val)

                        <div class="swiper-slide" >
                            @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                            <a href="{{ setting('sys_zip_shop') }}/{{ $val->slug }}">
                                <div class="item-product__box-img item-news-img">
                                    @if(isset($val->image))
                                    <img onerror="imgError(this)" class="lazy" data-src="{{\App\Library\MediaHelpers::media($val->image)}}" alt="">
                                    @else
                                    <img onerror="imgError(this)" class="img-list-nick-category lazy" data-src="/assets/frontend/theme_3/image/images_1/no-image.png" alt="No-image">
                                    @endif
                                </div>
                                <div class="item-product__box-content item-news-content">

                                    <div class="item-product__box-name mh_item-product__box-name text-limit limit-2">
                                        {{ $val->title }}
                                    </div>
                                    <div class="item-product__box-date">
                                        @if(isset($val->published_at))
                                        {{ formatDateTime($val->published_at) }}
                                        @else
                                            {{ formatDateTime($val->created_at) }}
                                        @endif
                                    </div>


                                </div>
                            </a>
                            @else
                                <a href="/tin-tuc/{{ $val->slug }}">
                                    <div class="item-product__box-img item-news-img">
                                        @if(isset($val->image))
                                            <img onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($val->image)}}" alt="">
                                        @else
                                            <img onerror="imgError(this)" class="img-list-nick-category lazy" src="/assets/frontend/theme_3/image/images_1/no-image.png" alt="No-image">
                                        @endif
                                    </div>
                                    <div class="item-product__box-content item-news-content">


                                        <div class="item-product__box-name mh_item-product__box-name text-limit limit-2">
                                            {{ $val->title }}
                                        </div>
                                        <div class="item-product__box-date">
                                            {{ formatDateTime($val->created_at) }}
                                        </div>


                                    </div>
                                </a>
                            @endif
                        </div>

                        @endforeach
                    </div>
                    <div class="swiper-button-prev">
                        <img src="./assets/frontend/theme_3/image/swiper-prev.svg" alt="">
                    </div>
                    <div class="swiper-button-next">
                        <img src="./assets/frontend/theme_3/image/swiper-next.svg" alt="">
                    </div>

                </div>

            </div>


    </div>

</div>
@endif
