@if(setting('sys_intro_text') != '')
    <section>
        <div class="font-detail-service container container-fix body-container-ct">
            <div class="row marginauto body-container-row-ct">
                <div class="col-md-12 left-right detailViewBlock">
                    <div class="row marginauto body-row-ct footer-row-ct">

                        <div class="col-md-12 left-right footer-row-col-ct content-video-in content-video-in-add detailViewBlockContent">
                            {!!  setting('sys_intro_text') !!}
                        </div>

                        <div class="col-md-12 left-right text-center js-toggle-content noselect">
                            <div class="view-more">
                                <a href="javascript:void(0)" class="global__link__default">Xem thêm<i class="__icon__default --sm__default --link__default ml-1" style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/svg/xemthem.svg)"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endif



<div class="block-product mt-fix-20">

    <div class="box-product">
        <div class="swiper-container  list-intro" >
            <div class="swiper-wrapper">
                <div class="swiper-slide" >
                    <div class="item-intro-img">
                        <img data-src="/assets/frontend/{{theme('')->theme_key}}/image/intro1.png" class="lazy" alt=""></div>
                    <div class="list-intro-title">
                        Sản phẩm, dịch vụ đa dạng, cập nhật thường xuyên
                    </div>
                    <div class="list-intro-content">
                        Hệ thống luôn cung cấp, cập nhật những sản phẩm mới/hot nhất của các dòng game trên thị trường.
                    </div>

                </div>
                <div class="swiper-slide" >
                    <div class="item-intro-img">
                        <img data-src="/assets/frontend/{{theme('')->theme_key}}/image/intro2.png" alt="" class="lazy"></div>
                    <div class="list-intro-title">
                        Hàng nghìn khách hàng tin tưởng
                    </div>
                    <div class="list-intro-content">
                        Hơn 260.000 giao dịch thành công mỗi ngày. Chúng tôi luôn đặt uy tín, chất lượng dịch vụ lên hàng đầu.
                    </div>

                </div>
                <div class="swiper-slide" >
                    <div class="item-intro-img">
                        <img data-src="/assets/frontend/{{theme('')->theme_key}}/image/intro3.png" alt="" class="lazy"></div>
                    <div class="list-intro-title">
                        Trung tâm trợ giúp hỗ trợ tư vấn 24/24
                    </div>
                    <div class="list-intro-content">
                        Đội ngũ chăm sóc khách hàng luôn tư vấn và hỗ trợ nhiệt tình khi gặp sự cố trong quá trình trải nghiệm sản phẩm.
                    </div>

                </div>
                <div class="swiper-slide" >
                    <div class="item-intro-img">
                        <img data-src="/assets/frontend/{{theme('')->theme_key}}/image/intro4.png" alt="" class="lazy"></div>
                    <div class="list-intro-title">
                        Giá cả ưu đãi, siêu rẻ trên thị trường
                    </div>
                    <div class="list-intro-content">
                        Cung cấp những sản phẩm với giá cả tốt nhất cùng với đó là những ưu đãi vô cùng hấp dẫn.
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
