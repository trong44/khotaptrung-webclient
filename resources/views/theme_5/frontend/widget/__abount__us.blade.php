@if(setting('sys_intro_text') != '')
    <div class="c-mb-16 c-mt-16">
        <div class="card overflow-hidden detailViewBlock">
            <div class="card-body c-px-16">
                <div class="content-desc hide detailViewBlockContent">

                    {!! setting('sys_intro_text') !!}
                </div>
            </div>
            <div class="card-footer text-center">
                <span class="see-more" data-content="Xem thêm nội dung"></span>
            </div>
        </div>
    </div>
@endif


<div class=" mt-fix-20 c-container c-pb-24 c-pt-17 section-about">
    <div class="box-product c-mt-md-18">
        <div class="swiper-container  list-intro">
            <div class="swiper-wrapper">
                <div class="swiper-slide item-about-us c-p-md-16 c-mr-16 h-auto">
                    <div>
                        <div class="item-intro-img c-pt-16">
                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/duong/intro1.svg" alt="">
                        </div>
                        <div class="list-intro-title list-intro-title-mobile fz-18 fw-500">
                            Sản phẩm, dịch vụ đa dạng, cập nhật thường xuyên
                        </div>
                        <div class="list-intro-content fz-13 fw-400">
                            Hệ thống luôn cung cấp, cập nhật những sản phẩm mới/hot nhất của các dòng game trên thị trường.
                        </div>
                    </div>

                </div>
                <div class="swiper-slide item-about-us c-p-md-16 c-mr-16 h-auto">
                    <div>
                        <div class="item-intro-img c-pt-16">
                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/duong/intro2.svg" alt="">
                        </div>
                        <div class="list-intro-title list-intro-title-mobile fz-18 fw-500">
                            Hàng nghìn khách hàng tin tưởng
                        </div>
                        <div class="list-intro-content fz-13 fw-400">
                            Hơn 260.000 giao dịch thành công mỗi ngày. Chúng tôi luôn đặt uy tín, chất lượng dịch vụ lên hàng đầu.
                        </div>
                    </div>


                </div>
                <div class="swiper-slide item-about-us c-p-md-16 c-mr-16 h-auto">
                    <div>
                        <div class="item-intro-img c-pt-16">
                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/duong/intro3.svg" alt=""></div>
                        <div class="list-intro-title list-intro-title-mobile fz-18 fw-500">
                            Trung tâm trợ giúp hỗ trợ tư vấn 24/24
                        </div>
                        <div class="list-intro-content fz-13 fw-400">
                            Đội ngũ chăm sóc khách hàng luôn tư vấn và hỗ trợ nhiệt tình khi gặp sự cố trong quá trình trải nghiệm sản phẩm.
                        </div>
                    </div>


                </div>
                <div class="swiper-slide item-about-us c-p-md-16 c-mr-16 h-auto">
                    <div>
                        <div class="item-intro-img c-pt-16">
                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/duong/intro4.svg" alt=""></div>
                        <div class="list-intro-title list-intro-title-mobile fz-18 fw-500">
                            Giá cả ưu đãi, siêu rẻ trên thị trường
                        </div>
                        <div class="list-intro-content fz-13 fw-400">
                            Cung cấp những sản phẩm với giá cả tốt nhất cùng với đó là những ưu đãi vô cùng hấp dẫn.
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
