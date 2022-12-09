@if(isset($data))

    <section class="section-related-service related-service mb-2" style="padding-bottom: 16px">
        <div class="section-header c-mb-16 c-mb-lg-8 justify-content-between">

            <h4 class="text-primary">Các dịch vụ liên quan</h4>

            {{--            <a href="/dich-vu" class="link arr-right">Xem tất cả</a>--}}
        </div>
        <div class="swiper swiper-related-service">
            <div class="swiper-wrapper">
                @foreach($data as $key => $item)
                    <div class="swiper-slide">
                        <div class="card brs-0">
                            <div class="card-body c-p-12 c-p-lg-8 scale-thumb brs-0">
                                <a href="{{ isset($item->url) ? $item->url :  '' }}">
                                    <div class="card-thumb c-mb-8 brs-4">
                                        <img  src="{{ isset($item->image) ? \App\Library\MediaHelpers::media($item->image) : '' }}" alt="" class="card-thumb-image">
                                    </div>
                                    <div class="card-attr">
                                        <div class="text-title fw-700 text-limit limit-1">
                                            {{ isset($item->title) ? $item->title :  '' }}
                                        </div>

                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="navigation slider-next"></div>
            <div class="navigation slider-prev"></div>
        </div>
    </section>
@endif
