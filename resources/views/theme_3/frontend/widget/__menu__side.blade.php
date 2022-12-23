<div class="menu-side" style=" ">
    @foreach($data??[] as $item)
        @if($item->parent_id == 0)
    @if($item->url == '/nap-the' || $item->url =='/recharge-atm')
        <div class="menu-side-item" style="">
            <a href="{{$item->url??'/'}}" class="check_auth_menu">
                <span data-tooltip="{{ $item->title }}" class="coming-soon">
                    @if($item->image_icon)
                        <img src="{{\App\Library\MediaHelpers::media($item->image_icon)}}" alt="">
                    @else
                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/service1.png" alt="">
                    @endif
                </span>
            </a>
        </div>
    @elseif($item->url == '/tin-tuc')
        @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
            <div class="menu-side-item" style="">
                <a href="{{setting('sys_zip_shop')}}" class="">
                    <span data-tooltip="{{ $item->title }}" class="coming-soon">
                        @if($item->image_icon)
                            <img src="{{\App\Library\MediaHelpers::media($item->image_icon)}}" alt="">
                        @else
                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/service1.png" alt="">
                        @endif
                    </span>
                </a>
            </div>
        @else
            <div class="menu-side-item" style="">
                <a href="{{$item->url??'/'}}" class="">
                    <span data-tooltip="{{ $item->title }}" class="coming-soon">
                        @if($item->image_icon)
                            <img src="{{\App\Library\MediaHelpers::media($item->image_icon)}}" alt="">
                        @else
                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/service1.png" alt="">
                        @endif
                    </span>
                </a>
            </div>
        @endif
    @else
            <div class="menu-side-item" style="">
                <a href="{{$item->url??'/'}}" class="">
                    <span data-tooltip="{{ $item->title }}" class="coming-soon">
                        @if($item->image_icon)
                            <img src="{{\App\Library\MediaHelpers::media($item->image_icon)}}" alt="">
                        @else
                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/service1.png" alt="">
                        @endif
                    </span>
                </a>
            </div>
    @endif
        @endif

    @endforeach

    <div class="menu-side-item" style="" >
        <a href="#" class=" go-top">
            <img class="lazy" data-src="/assets/frontend/{{theme('')->theme_key}}/image/back-top.svg" alt="" style=" ">
        </a>

    </div>

</div>

