@php
$data_viewed = Cookie::get('viewed_account') ?? '[]';
$data_viewed = json_decode($data_viewed,true);
@endphp
@if(count($data_viewed))
<section class="section-category watched">
    <div class="section-header c-mb-24 c-mb-lg-16">
        <h2 class="section-title fz-lg-15">
            Tài khoản đã xem
        </h2>
    </div>

<!-- Đặt tên class cho swiper sau đó config trong file "public/assets/frontend/{{theme('')->theme_key}}/js/swiper-slider-conf/swiper-slider-conf.js" -->
    <!-- Nếu có giao diện giống nhau hoàn toàn thì có thể dùng chung config (chung tên class 'class-config-demo') -->

    <div class="swiper class-config-account-viewed">
        <div class="swiper-wrapper data_watched">
            @forelse($data_viewed as $key => $acc_viewed)
            <div class="swiper-slide">
                <div class="item-category">
                    <div class="card">
                        <a href="/acc/{{ @$acc_viewed['randId'] }}" class="card-body scale-thumb c-p-16 c-p-lg-12">
                            <div class="account-thumb c-mb-8">
                                <img src="{{\App\Library\MediaHelpers::media($acc_viewed['image'])}}" alt="" class="account-thumb-image">
                            </div>
                            <div class="account-title">
                                <div class="text-title fw-700 text-limit limit-1">{{ @$acc_viewed['category'] }}</div>
                            </div>
                            <div class="account-info c-mb-8">
                                <div class="info-attr">Đã bán: {{ @$acc_viewed['buy_account'] }}</div>
                                <div class="info-attr">ID: #{{ @$acc_viewed['randId'] }}</div>
                            </div>
                            <div class="price">
                                <div class="price-current w-100">{{ str_replace(',','.',number_format($acc_viewed['price'])) }} đ</div>
                                <div class="price-old c-mr-8">{{ str_replace(',','.',number_format($acc_viewed['price_old'])) }} đ</div>
                                <div class="discount">{{ @$acc_viewed['promotion'] }} %</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            @endforelse
        </div>
        <div class="navigation slider-next"></div>
        <div class="navigation slider-prev"></div>
    </div>

</section>
@endif
