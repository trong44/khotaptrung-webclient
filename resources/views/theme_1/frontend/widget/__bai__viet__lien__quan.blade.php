@if(isset($data))
    <div class="container item_play_dif__img">
        <div class="row">
            <div class="col-md-12">
                <div class="h3" style="font-size: 24px;font-weight: 700">BÀI VIẾT LIÊN QUAN</div>
                <div class="news_content_line"></div>
            </div>
            <div class="col-12 item_play_dif_slide pt-3 pb-5" >
                <div class="swiper-container item_play_dif_slide_detail item_news" >
                    <div class="swiper-wrapper">
                        @foreach($data as $item)
                            <div class="swiper-slide swiper-slide__size" >
                                <div class="item_play_dif_slide_detail_in_active item_play_dif_slide_detail_in_active__size">
                                    <div class="item_play_dif_slide_img">
                                        @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                                            <a href="{{ setting('sys_zip_shop') }}/{{ $item->slug }}">
                                                @if(isset($item->image))
                                                    <img src="{{\App\Library\MediaHelpers::media($item->image)}}" alt=""  class="img-fluid swiper-lazy item_play_dif_slide_img_main">
                                                @else
                                                    <img src="/assets/frontend/{{theme('')->theme_key}}/images/fff.jpg" alt=""  class="img-fluid swiper-lazy item_play_dif_slide_img_main">
                                                @endif
                                            </a>
                                        @else
                                            <a href="/tin-tuc/{{ $item->slug }}">
                                                @if(isset($item->image))
                                                    <img src="{{\App\Library\MediaHelpers::media($item->image)}}" alt=""  class="img-fluid swiper-lazy item_play_dif_slide_img_main">
                                                @else
                                                    <img src="/assets/frontend/{{theme('')->theme_key}}/images/fff.jpg" alt=""  class="img-fluid swiper-lazy item_play_dif_slide_img_main">
                                                @endif
                                            </a>
                                        @endif

                                    </div>
                                    <div class="item_play_dif_slide_title item_play_dif_slide_title_hea text-limit limit-2">
                                        <span>{{ $item->title }}</span>
                                    </div>
                                    <div class="text_article_theme1 text-limit limit-3" style="color: #ffffff">
                                        <div style="padding: 0 8px">
                                            {!! $item->description !!}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <div class="swiper-button-prev">
                    <i class="fas fa-chevron-left"></i>
                </div>
                <div class="swiper-button-next">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/main.css">

@endif
