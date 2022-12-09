
@if(isset($data) && count($data) > 0)
    <div class="block-product c-p-16" style="margin-top: 16px">
        <div class="product-header d-flex">

        <span>
            <img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/nickindex.svg" alt="">
        </span>
            <h2 class="text-title" >{{ $title??'Các dịch vụ liên quan' }}</h2>

            <div class="navbar-spacer"></div>

{{--            <div class="text-view-more">--}}

{{--                <a href="/mua-acc" class="global__link">Xem thêm<i class="__icon --sm --link ml-1" style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/svg/arrowright.svg)"></i></a>--}}

{{--            </div>--}}
        </div>

        <div class="box-product">
            <div class="swiper-container list-product swiper-service" >
                <div class="swiper-wrapper">

                    @foreach($data as $key => $item)

                        <div class="swiper-slide" >
                            <a href="{{ isset($item->url) ? $item->url :  '' }}">
                                <div class="item-product__box-img">

                                    <img onerror="imgError(this)" class="lazy" data-src="{{ isset($item->image) ? \App\Library\MediaHelpers::media($item->image) : '' }}" alt="">

                                </div>
                                <div class="item-nick-name">{{ isset($item->title) ? $item->title :  '' }}</div>
                            </a>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif
