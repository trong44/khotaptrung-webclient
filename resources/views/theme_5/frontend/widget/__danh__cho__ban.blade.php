

<section class="section-category-tab c-pt-32 c-pt-lg-24 c-pb-lg-6">
    <div class="section-header c-mb-20 c-mb-lg-16 justify-content-between">
        <h2 class="section-title c-py-lg-8">

            {{ $title??'Dành cho bạn' }}

        </h2>
        <ul class="nav nav-tabs size-auto" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="tab active" data-toggle="tab" href="#tab-1" role="tab" aria-selected="true">Tài khoản game</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="tab" data-toggle="tab" href="#tab-2" role="tab" aria-selected="false">Game yêu thích</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="tab" data-toggle="tab" href="#tab-3" role="tab" aria-selected="false">Gợi ý cho bạn</a>
            </li>
        </ul>
        <a href="" class="link arr-right d-none d-lg-block">Xem tất cả</a>
    </div>

<!-- Đặt tên class cho swiper sau đó config trong file "public/assets/frontend/{{theme('')->theme_key}}/js/swiper-slider-conf/swiper-slider-conf.js" -->
    <!-- Nếu có giao diện giống nhau hoàn toàn thì có thể dùng chung config (chung tên class 'class-config-demo') -->
    <div class="tab-content c-mt-24 c-mt-lg-16">
        <div class="tab-pane fade show active" id="tab-1" role="tabpanel">
            <div class="swiper class-config-demo card-list">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="item-category">
                            <div class="card">
                                <a href="" class="card-body scale-thumb c-p-16 c-p-lg-12">
                                    <div class="account-thumb c-mb-8">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/son/nick01.png" alt="" class="account-thumb-image">
                                    </div>
                                    <div class="account-title">
                                        <div class="text-title fw-700 text-limit limit-1">Nick Freefire random....</div>
                                    </div>
                                    <div class="account-info c-mb-8">
                                        <div class="info-attr">
                                            Đã bán: 45.000
                                        </div>
                                    </div>
                                    <div class="price">
                                        <div class="price-current w-100">250.000đ</div>
                                        <div class="price-old c-mr-8">250.000đ</div>
                                        <div class="discount">10%</div>
                                    </div>
                                </a>
                                <a href="" class="btn secondary lg-sm c-mx-16 c-mb-16 c-mx-lg-12 c-mb-lg-12">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="item-category">
                            <div class="card">
                                <a href="" class="card-body scale-thumb c-p-16 c-p-lg-12">
                                    <div class="account-thumb c-mb-8">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/son/nick02.png" alt="" class="account-thumb-image">
                                    </div>
                                    <div class="account-title">
                                        <div class="text-title fw-700 text-limit limit-1">Nick Freefire random....</div>
                                    </div>
                                    <div class="account-info c-mb-8">
                                        <div class="info-attr">
                                            Đã bán: 45.000
                                        </div>
                                    </div>
                                    <div class="price">
                                        <div class="price-current w-100">250.000đ</div>
                                        <div class="price-old c-mr-8">250.000đ</div>
                                        <div class="discount">10%</div>
                                    </div>
                                </a>
                                <a href="" class="btn secondary lg-sm c-mx-16 c-mb-16 c-mx-lg-12 c-mb-lg-12">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="item-category">
                            <div class="card">
                                <a href="" class="card-body scale-thumb c-p-16 c-p-lg-12">
                                    <div class="account-thumb c-mb-8">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/son/nick03.png" alt="" class="account-thumb-image">
                                    </div>
                                    <div class="account-title">
                                        <div class="text-title fw-700 text-limit limit-1">Nick Freefire random....</div>
                                    </div>
                                    <div class="account-info c-mb-8">
                                        <div class="info-attr">
                                            Đã bán: 45.000
                                        </div>
                                    </div>
                                    <div class="price">
                                        <div class="price-current w-100">250.000đ</div>
                                        <div class="price-old c-mr-8">250.000đ</div>
                                        <div class="discount">10%</div>
                                    </div>
                                </a>
                                <a href="" class="btn secondary lg-sm c-mx-16 c-mb-16 c-mx-lg-12 c-mb-lg-12">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="item-category">
                            <div class="card">
                                <a href="" class="card-body scale-thumb c-p-16 c-p-lg-12">
                                    <div class="account-thumb c-mb-8">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/son/nick04.png" alt="" class="account-thumb-image">
                                    </div>
                                    <div class="account-title">
                                        <div class="text-title fw-700 text-limit limit-1">Nick Freefire random....</div>
                                    </div>
                                    <div class="account-info c-mb-8">
                                        <div class="info-attr">
                                            Đã bán: 45.000
                                        </div>
                                    </div>
                                    <div class="price">
                                        <div class="price-current w-100">250.000đ</div>
                                        <div class="price-old c-mr-8">250.000đ</div>
                                        <div class="discount">10%</div>
                                    </div>
                                </a>
                                <a href="" class="btn secondary lg-sm c-mx-16 c-mb-16 c-mx-lg-12 c-mb-lg-12">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="item-category">
                            <div class="card">
                                <a href="" class="card-body scale-thumb c-p-16 c-p-lg-12">
                                    <div class="account-thumb c-mb-8">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/son/nick05.png" alt="" class="account-thumb-image">
                                    </div>
                                    <div class="account-title">
                                        <div class="text-title fw-700 text-limit limit-1">Nick Freefire random....</div>
                                    </div>
                                    <div class="account-info c-mb-8">
                                        <div class="info-attr">
                                            Đã bán: 45.000
                                        </div>
                                    </div>
                                    <div class="price">
                                        <div class="price-current w-100">250.000đ</div>
                                        <div class="price-old c-mr-8">250.000đ</div>
                                        <div class="discount">10%</div>
                                    </div>
                                </a>
                                <a href="" class="btn secondary lg-sm c-mx-16 c-mb-16 c-mx-lg-12 c-mb-lg-12">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="item-category">
                            <div class="card">
                                <a href="" class="card-body scale-thumb c-p-16 c-p-lg-12">
                                    <div class="account-thumb c-mb-8">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/son/nick01.png" alt="" class="account-thumb-image">
                                    </div>
                                    <div class="account-title">
                                        <div class="text-title fw-700 text-limit limit-1">Nick Freefire random....</div>
                                    </div>
                                    <div class="account-info c-mb-8">
                                        <div class="info-attr">
                                            Đã bán: 45.000
                                        </div>
                                    </div>
                                    <div class="price">
                                        <div class="price-current w-100">250.000đ</div>
                                        <div class="price-old c-mr-8">250.000đ</div>
                                        <div class="discount">10%</div>
                                    </div>
                                </a>
                                <a href="" class="btn secondary lg-sm c-mx-16 c-mb-16 c-mx-lg-12 c-mb-lg-12">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="item-category">
                            <div class="card">
                                <a href="" class="card-body scale-thumb c-p-16 c-p-lg-12">
                                    <div class="account-thumb c-mb-8">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/son/minigame01.png" alt="" class="account-thumb-image">
                                    </div>
                                    <div class="account-title">
                                        <div class="text-title fw-700 text-limit limit-1">Nick Freefire random....</div>
                                    </div>
                                    <div class="account-info c-mb-8">
                                        <div class="info-attr">
                                            Đã bán: 45.000
                                        </div>
                                    </div>
                                    <div class="price">
                                        <div class="price-current w-100">250.000đ</div>
                                        <div class="price-old c-mr-8">250.000đ</div>
                                        <div class="discount">10%</div>
                                    </div>
                                </a>
                                <a href="" class="btn secondary lg-sm c-mx-16 c-mb-16 c-mx-lg-12 c-mb-lg-12">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navigation slider-next"></div>
                <div class="navigation slider-prev"></div>
            </div>
        </div>
        <div class="tab-pane fade" id="tab-2" role="tabpanel">
            <div class="swiper class-config-demo card-list">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="item-category">
                            <div class="card">
                                <a href="" class="card-body scale-thumb c-p-16 c-p-lg-12">
                                    <div class="account-thumb c-mb-8">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/son/nick03.png" alt="" class="account-thumb-image">
                                    </div>
                                    <div class="account-title">
                                        <div class="text-title fw-700 text-limit limit-1">Nick Freefire random....</div>
                                    </div>
                                    <div class="account-info c-mb-8">
                                        <div class="info-attr">
                                            Đã bán: 45.000
                                        </div>
                                    </div>
                                    <div class="price">
                                        <div class="price-current w-100">250.000đ</div>
                                        <div class="price-old c-mr-8">250.000đ</div>
                                        <div class="discount">10%</div>
                                    </div>
                                </a>
                                <a href="" class="btn secondary lg-sm c-mx-16 c-mb-16 c-mx-lg-12 c-mb-lg-12">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="item-category">
                            <div class="card">
                                <a href="" class="card-body scale-thumb c-p-16 c-p-lg-12">
                                    <div class="account-thumb c-mb-8">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/son/nick04.png" alt="" class="account-thumb-image">
                                    </div>
                                    <div class="account-title">
                                        <div class="text-title fw-700 text-limit limit-1">Nick Freefire random....</div>
                                    </div>
                                    <div class="account-info c-mb-8">
                                        <div class="info-attr">
                                            Đã bán: 45.000
                                        </div>
                                    </div>
                                    <div class="price">
                                        <div class="price-current w-100">250.000đ</div>
                                        <div class="price-old c-mr-8">250.000đ</div>
                                        <div class="discount">10%</div>
                                    </div>
                                </a>
                                <a href="" class="btn secondary lg-sm c-mx-16 c-mb-16 c-mx-lg-12 c-mb-lg-12">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="item-category">
                            <div class="card">
                                <a href="" class="card-body scale-thumb c-p-16 c-p-lg-12">
                                    <div class="account-thumb c-mb-8">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/trong/framse19968.png" alt="" class="account-thumb-image">
                                    </div>
                                    <div class="account-title">
                                        <div class="text-title fw-700 text-limit limit-1">Nick Freefire random....</div>
                                    </div>
                                    <div class="account-info c-mb-8">
                                        <div class="info-attr">
                                            Đã bán: 45.000
                                        </div>
                                    </div>
                                    <div class="price">
                                        <div class="price-current w-100">250.000đ</div>
                                        <div class="price-old c-mr-8">250.000đ</div>
                                        <div class="discount">10%</div>
                                    </div>
                                </a>
                                <a href="" class="btn secondary lg-sm c-mx-16 c-mb-16 c-mx-lg-12 c-mb-lg-12">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="item-category">
                            <div class="card">
                                <a href="" class="card-body scale-thumb c-p-16 c-p-lg-12">
                                    <div class="account-thumb c-mb-8">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/trong/framse19968.png" alt="" class="account-thumb-image">
                                    </div>
                                    <div class="account-title">
                                        <div class="text-title fw-700 text-limit limit-1">Nick Freefire random....</div>
                                    </div>
                                    <div class="account-info c-mb-8">
                                        <div class="info-attr">
                                            Đã bán: 45.000
                                        </div>
                                    </div>
                                    <div class="price">
                                        <div class="price-current w-100">250.000đ</div>
                                        <div class="price-old c-mr-8">250.000đ</div>
                                        <div class="discount">10%</div>
                                    </div>
                                </a>
                                <a href="" class="btn secondary lg-sm c-mx-16 c-mb-16 c-mx-lg-12 c-mb-lg-12">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="item-category">
                            <div class="card">
                                <a href="" class="card-body scale-thumb c-p-16 c-p-lg-12">
                                    <div class="account-thumb c-mb-8">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/trong/framse19968.png" alt="" class="account-thumb-image">
                                    </div>
                                    <div class="account-title">
                                        <div class="text-title fw-700 text-limit limit-1">Nick Freefire random....</div>
                                    </div>
                                    <div class="account-info c-mb-8">
                                        <div class="info-attr">
                                            Đã bán: 45.000
                                        </div>
                                    </div>
                                    <div class="price">
                                        <div class="price-current w-100">250.000đ</div>
                                        <div class="price-old c-mr-8">250.000đ</div>
                                        <div class="discount">10%</div>
                                    </div>
                                </a>
                                <a href="" class="btn secondary lg-sm c-mx-16 c-mb-16 c-mx-lg-12 c-mb-lg-12">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="item-category">
                            <div class="card">
                                <a href="" class="card-body scale-thumb c-p-16 c-p-lg-12">
                                    <div class="account-thumb c-mb-8">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/trong/framse19968.png" alt="" class="account-thumb-image">
                                    </div>
                                    <div class="account-title">
                                        <div class="text-title fw-700 text-limit limit-1">Nick Freefire random....</div>
                                    </div>
                                    <div class="account-info c-mb-8">
                                        <div class="info-attr">
                                            Đã bán: 45.000
                                        </div>
                                    </div>
                                    <div class="price">
                                        <div class="price-current w-100">250.000đ</div>
                                        <div class="price-old c-mr-8">250.000đ</div>
                                        <div class="discount">10%</div>
                                    </div>
                                </a>
                                <a href="" class="btn secondary lg-sm c-mx-16 c-mb-16 c-mx-lg-12 c-mb-lg-12">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="item-category">
                            <div class="card">
                                <a href="" class="card-body scale-thumb c-p-16 c-p-lg-12">
                                    <div class="account-thumb c-mb-8">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/trong/framse19968.png" alt="" class="account-thumb-image">
                                    </div>
                                    <div class="account-title">
                                        <div class="text-title fw-700 text-limit limit-1">Nick Freefire random....</div>
                                    </div>
                                    <div class="account-info c-mb-8">
                                        <div class="info-attr">
                                            Đã bán: 45.000
                                        </div>
                                    </div>
                                    <div class="price">
                                        <div class="price-current w-100">250.000đ</div>
                                        <div class="price-old c-mr-8">250.000đ</div>
                                        <div class="discount">10%</div>
                                    </div>
                                </a>
                                <a href="" class="btn secondary lg-sm c-mx-16 c-mb-16 c-mx-lg-12 c-mb-lg-12">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navigation slider-next"></div>
                <div class="navigation slider-prev"></div>
            </div>
        </div>
        <div class="tab-pane fade" id="tab-3" role="tabpanel">
            <div class="swiper class-config-demo card-list">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="item-category">
                            <div class="card">
                                <a href="" class="card-body scale-thumb c-p-16 c-p-lg-12">
                                    <div class="account-thumb c-mb-8">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/trong/image 2.png" alt="" class="account-thumb-image">
                                    </div>
                                    <div class="account-title">
                                        <div class="text-title fw-700 text-limit limit-1">Nick Freefire random....</div>
                                    </div>
                                    <div class="account-info c-mb-8">
                                        <div class="info-attr">
                                            Đã bán: 45.000
                                        </div>
                                    </div>
                                    <div class="price">
                                        <div class="price-current w-100">250.000đ</div>
                                        <div class="price-old c-mr-8">250.000đ</div>
                                        <div class="discount">10%</div>
                                    </div>
                                </a>
                                <a href="" class="btn secondary lg-sm c-mx-16 c-mb-16 c-mx-lg-12 c-mb-lg-12">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="item-category">
                            <div class="card">
                                <a href="" class="card-body scale-thumb c-p-16 c-p-lg-12">
                                    <div class="account-thumb c-mb-8">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/trong/image 2.png" alt="" class="account-thumb-image">
                                    </div>
                                    <div class="account-title">
                                        <div class="text-title fw-700 text-limit limit-1">Nick Freefire random....</div>
                                    </div>
                                    <div class="account-info c-mb-8">
                                        <div class="info-attr">
                                            Đã bán: 45.000
                                        </div>
                                    </div>
                                    <div class="price">
                                        <div class="price-current w-100">250.000đ</div>
                                        <div class="price-old c-mr-8">250.000đ</div>
                                        <div class="discount">10%</div>
                                    </div>
                                </a>
                                <a href="" class="btn secondary lg-sm c-mx-16 c-mb-16 c-mx-lg-12 c-mb-lg-12">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="item-category">
                            <div class="card">
                                <a href="" class="card-body scale-thumb c-p-16 c-p-lg-12">
                                    <div class="account-thumb c-mb-8">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/trong/image 2.png" alt="" class="account-thumb-image">
                                    </div>
                                    <div class="account-title">
                                        <div class="text-title fw-700 text-limit limit-1">Nick Freefire random....</div>
                                    </div>
                                    <div class="account-info c-mb-8">
                                        <div class="info-attr">
                                            Đã bán: 45.000
                                        </div>
                                    </div>
                                    <div class="price">
                                        <div class="price-current w-100">250.000đ</div>
                                        <div class="price-old c-mr-8">250.000đ</div>
                                        <div class="discount">10%</div>
                                    </div>
                                </a>
                                <a href="" class="btn secondary lg-sm c-mx-16 c-mb-16 c-mx-lg-12 c-mb-lg-12">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="item-category">
                            <div class="card">
                                <a href="" class="card-body scale-thumb c-p-16 c-p-lg-12">
                                    <div class="account-thumb c-mb-8">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/trong/image 2.png" alt="" class="account-thumb-image">
                                    </div>
                                    <div class="account-title">
                                        <div class="text-title fw-700 text-limit limit-1">Nick Freefire random....</div>
                                    </div>
                                    <div class="account-info c-mb-8">
                                        <div class="info-attr">
                                            Đã bán: 45.000
                                        </div>
                                    </div>
                                    <div class="price">
                                        <div class="price-current w-100">250.000đ</div>
                                        <div class="price-old c-mr-8">250.000đ</div>
                                        <div class="discount">10%</div>
                                    </div>
                                </a>
                                <a href="" class="btn secondary lg-sm c-mx-16 c-mb-16 c-mx-lg-12 c-mb-lg-12">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="item-category">
                            <div class="card">
                                <a href="" class="card-body scale-thumb c-p-16 c-p-lg-12">
                                    <div class="account-thumb c-mb-8">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/trong/image 2.png" alt="" class="account-thumb-image">
                                    </div>
                                    <div class="account-title">
                                        <div class="text-title fw-700 text-limit limit-1">Nick Freefire random....</div>
                                    </div>
                                    <div class="account-info c-mb-8">
                                        <div class="info-attr">
                                            Đã bán: 45.000
                                        </div>
                                    </div>
                                    <div class="price">
                                        <div class="price-current w-100">250.000đ</div>
                                        <div class="price-old c-mr-8">250.000đ</div>
                                        <div class="discount">10%</div>
                                    </div>
                                </a>
                                <a href="" class="btn secondary lg-sm c-mx-16 c-mb-16 c-mx-lg-12 c-mb-lg-12">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="item-category">
                            <div class="card">
                                <a href="" class="card-body scale-thumb c-p-16 c-p-lg-12">
                                    <div class="account-thumb c-mb-8">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/trong/image 2.png" alt="" class="account-thumb-image">
                                    </div>
                                    <div class="account-title">
                                        <div class="text-title fw-700 text-limit limit-1">Nick Freefire random....</div>
                                    </div>
                                    <div class="account-info c-mb-8">
                                        <div class="info-attr">
                                            Đã bán: 45.000
                                        </div>
                                    </div>
                                    <div class="price">
                                        <div class="price-current w-100">250.000đ</div>
                                        <div class="price-old c-mr-8">250.000đ</div>
                                        <div class="discount">10%</div>
                                    </div>
                                </a>
                                <a href="" class="btn secondary lg-sm c-mx-16 c-mb-16 c-mx-lg-12 c-mb-lg-12">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="item-category">
                            <div class="card">
                                <a href="" class="card-body scale-thumb c-p-16 c-p-lg-12">
                                    <div class="account-thumb c-mb-8">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/trong/image 2.png" alt="" class="account-thumb-image">
                                    </div>
                                    <div class="account-title">
                                        <div class="text-title fw-700 text-limit limit-1">Nick Freefire random....</div>
                                    </div>
                                    <div class="account-info c-mb-8">
                                        <div class="info-attr">
                                            Đã bán: 45.000
                                        </div>
                                    </div>
                                    <div class="price">
                                        <div class="price-current w-100">250.000đ</div>
                                        <div class="price-old c-mr-8">250.000đ</div>
                                        <div class="discount">10%</div>
                                    </div>
                                </a>
                                <a href="" class="btn secondary lg-sm c-mx-16 c-mb-16 c-mx-lg-12 c-mb-lg-12">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navigation slider-next"></div>
                <div class="navigation slider-prev"></div>
            </div>
        </div>
    </div>

</section>
<div class="c-pt-8 border-bottom-destop c-pt-lg-2"></div>
