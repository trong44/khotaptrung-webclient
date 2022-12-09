
@if(isset($data) && count($data) > 0)
    <div class="mb-5" style="margin-top: 70px">
        <div class="title-content">
            <h3>Các dịch vụ liên quan</h3>
        </div>
        <div class="wapper-blog">
            <div class="swiper swiper-related-service">
                <div class="swiper-wrapper">
                    @foreach($data as $key => $item)
                        <div class="swiper-slide">

                            <div class="">
                                <a href="{{ isset($item->url) ? $item->url :  '' }}"
                                   title="Đổi thẻ game Appota bằng thẻ cào giá rẻ, uy tín, chất lượng">
                                    <img style="width: 100%" class="image" src="{{ isset($item->image) ? \App\Library\MediaHelpers::media($item->image) : '' }}"
                                         title="{{$item->title}}">
                                </a>
                                <div class="content-title mt-3">
                                    <p>
                                        <a href="{{ isset($item->url) ? $item->url :  '' }}">{{ isset($item->title) ? $item->title :  '' }}</a>
                                    </p>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
                <div class="navigation slider-next"></div>
                <div class="navigation slider-prev"></div>
            </div>
            <h5 style="float: right"><a class="hvr-underline-from-left see-more" href="/tin-tuc">Xem tất cả <i class="fas fa-angle-double-right"></i></a></h5>
        </div>
    </div>

@endif

