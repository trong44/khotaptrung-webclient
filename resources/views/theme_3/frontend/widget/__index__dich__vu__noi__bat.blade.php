
@if(isset($data))

    <div class="block-product mt-fix-20 d-g-md-none">
        <div class="product-header d-flex">

            <p class="text-title" >Dịch vụ nổi bật</p>
            <div class="navbar-spacer"></div>

            {{--                <div class="text-view-more">--}}
            {{--                    --}}{{--                <a href="">--}}
            {{--                    --}}{{--                    Xem thêm <img src="/assets/frontend/{{theme('')->theme_key}}/image/view_more.png" alt="">--}}
            {{--                    --}}{{--                </a>--}}
            {{--                    <a href="/dich-vu" class="global__link">Xem thêm<i class="__icon --sm --link ml-1" style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/icons/arrow-right-blue.png)"></i></a>--}}
            {{--                </div>--}}
        </div>


        <div class="box-product">
            <div class=" list-product  d-flex justify-content-lg-between row" >
                @foreach($data as $item)
                    <div class="item-product item-product-service col-lg-auto col-md-3 col-4">

                        @if($item->target)
                            <a  href="{{ $item->url }}">
                                @else
                                    <a target="_blank" href="{{ $item->url }}">
                                        @endif
                                        <img class="lazy" data-src="{{ $item->image_icon }}" alt="">
                                        <div>{{ $item->title }}</div>
                                    </a>
                            </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

@endif
