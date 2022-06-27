@if(isset($data))
<div class="block-product mt-fix-20 d-none d-g-md-block">
    <div class="product-header d-flex">
        <p class="text-title" >Dịch vụ nổi bật</p>
        <div class="navbar-spacer"></div>
    </div>
    <div class="box-product">
        <div class=" d-flex justify-content-lg-between row" >
            @foreach($data as $item)
                <div class="item-product item-product-service col-lg-auto col-md-3 col-4 mb-fix-16">
                    <a  href="{{ $item->url }}" @if($item->target) target="_blank" @endif>
                        @if($item->image)
                            <img src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="">
                        @else
                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/service1.png" alt="">
                        @endif
                        <div>{{ $item->title }}</div>
                    </a>
                </div>
            @endforeach


        </div>
    </div>
</div>
@endif
