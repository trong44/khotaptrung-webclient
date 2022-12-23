@if(isset($data))
<div class="block-product mt-fix-20 d-none d-g-md-block">
    <div class="product-header d-flex">

        <p class="text-title" >Dịch vụ nổi bật</p>
        <div class="navbar-spacer"></div>

        {{--                <div class="text-view-more">--}}

        {{--                    <a href="/dich-vu" class="global__link">Xem thêm<i class="__icon --sm --link ml-1" style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/icons/arrow-right-blue.png)"></i></a>--}}

        {{--                </div>--}}
    </div>

    <div class="box-product">
        <div class=" d-flex justify-content-lg-between row" >

            @foreach($data as $item)

                <div class="item-product item-product-service col-lg-auto col-md-3 col-4 mb-fix-16">


                    @if($item->target)
                        <a  href="{{ $item->url }}">
                            @else
                                <a target="_blank" href="{{ $item->url }}">
                                    @endif
                                    <img src="{{ $item->image_icon }}" alt="">
                                    <div>{{ $item->title }}</div>
                                </a>
                        </a>
                </div>
            @endforeach


        </div>
    </div>
</div>
@endif
