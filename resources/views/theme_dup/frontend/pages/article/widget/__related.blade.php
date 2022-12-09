@if(isset($dataitem))
    <div class="container item_play_dif__img">
        <div class="row">
            <div class="col-md-12">
                <div class="h3" style="font-size: 24px;font-weight: 700;color: white">BÀI VIẾT LIÊN QUAN</div>
                <div class="news_content_line"></div>
            </div>
            <div class="col-12 item_play_dif_slide pt-3 pb-5" >
                <div class="swiper-container item_play_dif_slide_detail item_news" >
                    <div class="swiper-wrapper">
                        @foreach($dataitem->data as $item)
                            <div class="swiper-slide swiper-slide__size" >
                                <div class="item_play_dif_slide_detail_in_active item_play_dif_slide_detail_in_active__size">
                                    <div class="item_play_dif_slide_img">
                                        @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                                        <a href="/blog/{{ $item->slug }}">
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
                                    <div class="item_play_dif_slide_title">
                                        <span>{{ $item->title }}</span>
                                    </div>
                                    <div class="item_play_dif_slide_description__size">
                                        {{--                                {!! substr($item->description, 0, 150); !!}--}}
                                        {!! $item->seo_description !!}
                                        {{--                                @if(strlen($item->description) < 120)--}}
                                        {{--                                    {!! substr($item->description, 0, 120); !!}--}}
                                        {{--                                @else--}}
                                        {{--                                    {!! substr($item->description, 0, 120); !!}...--}}
                                        {{--                                @endif--}}
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
