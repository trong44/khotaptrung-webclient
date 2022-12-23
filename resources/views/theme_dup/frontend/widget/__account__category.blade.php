@if(isset($sliders) && count($sliders))
<div class="col-12 item_play_dif_slide pt-3 pb-5" >
    <div class="swiper-container item_play_dif_slide_detail item_news" >
        <div class="swiper-wrapper">
            @foreach($sliders as $slider)

            <div class="swiper-slide swiper-slide__size" >
                <div class="item_play_dif_slide_detail_in_active item_play_dif_slide_detail_in_active__size">
                    <div class="item_buy_list_in">
                        <div class="item_buy_list_img">
                            <a href="/mua-ngay/chi-tiet">
                                <img class="item_buy_list_img-main" src="	https://shopas.net/storage/images/CGuYto7yjj_1645585924.jpg" alt="">
                                <img class="item_buy_list_img-sale" src="https://shopas.net/storage/images/qf9WoDujJ6_1618225522.png"  alt="">
                                <span>MS: {{ $slider->id }}</span>
                            </a>
                        </div>
                        <div class="item_buy_list_description">
                            bảo hành 100%,lỗi hoàn tiền
                        </div>
                        <div class="item_buy_list_info">
                            <div class="row">

                                <div class="col-6 item_buy_list_info_in">
                                    Đăng ký : <b>Facebook</b>
                                </div>
                                <div class="col-6 item_buy_list_info_in">
                                    Pet : <b>Có</b>
                                </div>
                                <div class="col-6 item_buy_list_info_in">
                                    Rank : <b>Kim cương</b>
                                </div>
                                <div class="col-6 item_buy_list_info_in">
                                    Ghi chú : <b>Tuyệt vời</b>
                                </div>

                            </div>
                        </div>
                        <div class="item_buy_list_more">
                            <div class="row">
                                <div class="col-12 ">
                                    <div class="item_buy_list_price">
                                        <span>{{ formatPrice($slider->price_old) }}đ </span>
                                        {{ formatPrice($slider->price) }}đ
                                    </div>

                                </div>
                                <a href="/mua-ngay/chi-tiet" class="col-12">
                                    <div class="item_buy_list_view">
                                        Chi tiết
                                    </div>
                                </a>

                            </div>
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
@endif
