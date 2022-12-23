@if(isset($data) && count($data) > 0)
<div class="content-items">
    <div class="container">
        <div class="items-title">
            <h2>Dịch vụ nổi bật</h2>
            <div class="items-title-lines"></div>
        </div>

        <div class="game-list row" id="dichvunoibat">
            <div class="col-12 item_play_dif_slide pt-3" >
                <div class="swiper-container item_play_dif_slide_detail item_news" >
                    <div class="swiper-wrapper">
                        @foreach($data as $item)
                        <div class="swiper-slide swiper-slide__size" >
                            <div class="item_play_dif_slide_detail_in_active item_play_dif_slide_detail_in_active__size store_card_slide">
                                <div class="item_play_dif_slide_img">
                                    @if($item->target == 1)
                                        <a target="_blank" href="{{ $item->url }}">
                                            <img data-original="{{\App\Library\MediaHelpers::media($item->image)}}" alt=""  class="img-fluid lazy item_play_dif_slide_img_main">
                                        </a>
                                    @else
                                        <a href="{{ $item->url }}">
                                            <img data-original="{{ \App\Library\MediaHelpers::media($item->image) }}" alt=""  class="img-fluid lazy item_play_dif_slide_img_main">
                                        </a>
                                    @endif
                                </div>
                            </div>

                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endif
