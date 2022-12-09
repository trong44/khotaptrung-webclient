
@if(isset($data) && count($data) > 0)

    <div class="container item_play_dif__img pt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="h3" style="font-size: 24px;font-weight: 700">DỊCH VỤ LIÊN QUAN</div>
                <div class="news_content_line"></div>
            </div>
            <div class="col-12 item_play_dif_slide pt-3 pb-5" >
                <div class="swiper-container item_play_dif_slide_detail item_news" >
                    <div class="swiper-wrapper">
                        @foreach($data as $item)
                            <div class="swiper-slide swiper-slide__size" >
                                <div class="item_play_dif_slide_detail_in_active item_play_dif_slide_detail_in_active__size store_card_slide">
                                    <div class="item_play_dif_slide_img">
                                        <a href="/dich-vu/{{ isset($item->custom->slug) ? $item->custom->slug :  $item->slug }}">
                                            @if(isset($item->image) || isset($item->custom->image))
                                                <img data-original="{{\App\Library\MediaHelpers::media(isset($item->custom->image) ? $item->custom->image :  $item->image)}}" alt=""  class="img-fluid lazy item_play_dif_slide_img_main">
                                            @else
                                                <img data-original="/assets/frontend/{{theme('')->theme_key}}/images/fff.jpg" alt=""  class="img-fluid lazy item_play_dif_slide_img_main">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="item_play_dif_slide_title">
                                        <span>{{ isset($item->custom->title) ? $item->custom->title :  $item->title }}</span>
                                    </div>
                                    <div class="item_play_dif_slide_description__size">
                                        <div class="game-list-more-view">
                                            <a href="" class="account_category">
                                                <img src="http://127.0.0.1:8000/assets/frontend/theme_1/images/muangay.jpg" alt="">
                                            </a>
                                        </div>
{{--                                        {!! isset($item->custom->description) ? $item->custom->description :  $item->description !!}--}}
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

@endif
