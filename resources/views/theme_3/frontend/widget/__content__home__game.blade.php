
@if(isset($data) && count($data) > 0)
    <div class="block-product mt-fix-20">
        <div class="product-header d-flex">

        <span>
            <img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/nickindex.svg" alt="">
        </span>
            <p class="text-title" >Nick ngon giá rẻ</p>

            <div class="navbar-spacer"></div>

            <div class="text-view-more">

                <a href="/mua-acc" class="global__link">Xem thêm<i class="__icon --sm --link ml-1" style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/svg/arrowright.svg)"></i></a>

            </div>
        </div>

        <div class="box-product">
            <div class="swiper-container list-product swiper-service" >
                <div class="swiper-wrapper">
                    @foreach($data as $key => $item)
                        <div class="swiper-slide" >
                            <a href="/mua-acc/{{ isset($item->custom->slug) && $item->custom->slug != '' ? $item->custom->slug :  $item->slug }}">
                                <div class="item-product__box-img">

                                    <img onerror="imgError(this)" class="lazy" data-src="{{ isset($item->custom->image) ? \App\Library\MediaHelpers::media($item->custom->image) :  \App\Library\MediaHelpers::media($item->image) }}" alt="">

                                </div>
                                <div class="item-nick-name text-title limit-1">{{ isset($item->custom->title) ? $item->custom->title :  $item->title }}</div>
                            </a>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif
