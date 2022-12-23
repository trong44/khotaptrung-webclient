@if(isset($data))
<div class="card --custom mt-1 p-3">
    <div class="card--header">
        <div class="card--header__title">
            <div class="title__icon mr-1"><img src="/assets/frontend/{{theme('')->theme_key}}/image/icons/lightning.svg" alt=""></div>
            <h4>Bài viết cùng chủ đề</h4>
        </div>
    </div>

    <div class="box-product-content ">

        <div class="box-product news-home" role="tabpanel" >
            <div class="swiper-container  list-news" >
                <div class="swiper-wrapper">
                    @foreach($data as $val)

                        @if ($val->id === $data_article->id)
                            @continue
                        @endif

                        <div class="swiper-slide" >
                            @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                            <a href="{{ setting('sys_zip_shop') }}/{{ $val->slug }}">
                                <div class="item-product__box-img item-news-img">
                                    @if(isset($val->image))
                                        <img onerror="imgError(this)" data-src="{{\App\Library\MediaHelpers::media($val->image)}}" alt="" class="lazy">
                                    @else
                                        <img onerror="imgError(this)" class="img-list-nick-category lazy" data-src="/assets/frontend/theme_3/image/images_1/no-image.png"  alt="No-image">
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
                    <img src="/assets/frontend/theme_3/image/swiper-prev.svg" alt="">
                </div>
                <div class="swiper-button-next">
                    <img src="/assets/frontend/theme_3/image/swiper-next.svg" alt="">
                </div>

            </div>

        </div>

    </div>
</div>
@endif
