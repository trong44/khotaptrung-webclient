@if(isset($datacate))
<section class="bottom-container-ct-fix">
    <div class="container container-fix body-container-ct">
        <div class="row marginauto body-container-row-ct body-container-row-mobile-ct">
            <div class="col-md-12 left-right">
                <div class="row marginauto body-row-ct media-ctbg-ct">
                    <div class="col-md-12 left-right napgamekhac">
                        <div class="row marginauto">
                            <div class="col-md-12 text-left left-right">
                                <span>Các dịch vụ khác</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 left-right">
                        <div class="row marginauto body-detail-ct box-product swiper-nap-game">
                            <div class="swiper-container list-nap-game col-md-12 text-left left-right" id="service-related">
                                <div class="swiper-wrapper">
                                    @forelse($datacate as $k_cat => $service)
                                        @if(isset($current_id) && $current_id == $service->id)
                                            @continue
                                        @else
                                        @endif
                                    <div class="swiper-slide body-detail-ctng-col-ct">
                                        <a href="/dich-vu/{{@$service->slug}}">
                                            <div class="row marginauto hover-overlay-ct">
                                                <div class="col-md-12 left-right default-overlay-ct service--thumbnail">
                                                    <img onerror="imgError(this)" class="lazy" src="{{@\App\Library\MediaHelpers::media($service->image)}}" alt="">
                                                </div>
                                                <div class="col-md-12 left-right text-center body-detail-col-span-ct">
                                                    <span>{{ $service->title }}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                            <div class="swiper-button-prev">
                                <img src="/assets/frontend/theme_3/image/swiper-prev.svg" alt="">
                            </div>
                            <div class="swiper-button-next">
                                <img src="/assets/frontend/theme_3/image/swiper-next.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endif
