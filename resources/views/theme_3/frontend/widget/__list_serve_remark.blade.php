
@if(isset($data))
    <div class="block-product mt-fix-20 d-g-md-none">
        <div class="product-header d-flex">
            <h2 class="text-title" >{{ $title??'Dịch vụ nổi bật' }}</h2>
            <div class="navbar-spacer"></div>
        </div>
        <div class="box-product">
            <div class=" list-product  d-flex justify-content-lg-between row" >
                @foreach($data as $item)
                    <div class="item-product item-product-service col-lg-auto col-md-3 col-4">
                        <a   @if($item->target == 1) target="_blank" href="{{ $item->url }}"     @elseif($item->target == 3) @if(!App\Library\AuthCustom::check()) onclick="openLoginModal();" href="#" @else href="{{ $item->url }}"   @endif @else href="{{ $item->url }}"   @endif>
                            @if($item->image_icon)
                                <img onerror="imgError(this)" class="lazy" data-src="{{\App\Library\MediaHelpers::media($item->image_icon)}}" alt="">
                            @else
                                <img onerror="imgError(this)" class="lazy" data-src="/assets/frontend/{{theme('')->theme_key}}/image/service1.png" alt="">
                            @endif
                            <div>{{ $item->title }}</div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endif
