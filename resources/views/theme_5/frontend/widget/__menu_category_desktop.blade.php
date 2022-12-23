

<div class="menu-category ">
    <div class="container c-container">
        <ul class="d-flex justify-content-between px-0">
            @foreach ($data??[] as $key_child => $item)
                @if (!\App\Library\AuthCustom::check())
                    @if($item->url == '/nap-the' || $item->url =='/recharge-atm')

                        <li class="w-100 c-px-4">
                            <a href="javascript:void(0);" onclick="openLoginModal();" @if($item->target==1) target="_blank" @endif >
                                <div class="c-p-8 brs-8 {{ '/'.request()->path() == $item->url ? 'active' : ''}}  d-flex justify-content-center" style="white-space: nowrap;">
                                    @if($item->image_icon)
                                        <img src="{{\App\Library\MediaHelpers::media($item->image_icon)}}" alt="" class="c-pr-4">
                                    @else
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/nam/storecard.svg" alt="" class="c-pr-4">
                                    @endif
                                    <span class="fw-500 fz-15 lh-24 ">{{ $item->title }}</span>
                                </div>
                            </a>
                        </li>
                    @else
                        <li class="w-100 c-px-4">
                            <a href="{{$item->url}}" @if($item->target==1) target="_blank" @endif >
                                <div class="c-p-8 brs-8 {{ '/'.request()->path() == $item->url ? 'active' : ''}}  d-flex justify-content-center" style="white-space: nowrap;">
                                    @if($item->image_icon)
                                        <img src="{{\App\Library\MediaHelpers::media($item->image_icon)}}" alt="" class="c-pr-4">
                                    @else
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/nam/storecard.svg" alt="" class="c-pr-4">
                                    @endif
                                    <span class="fw-500 fz-15 lh-24 ">{{ $item->title }}</span>
                                </div>
                            </a>
                        </li>
                    @endif
                @else
                    <li class="w-100 c-px-4">
                        <a href="{{$item->url}}" @if($item->target==1) target="_blank" @endif >
                            <div class="c-p-8 brs-8 {{ '/'.request()->path() == $item->url ? 'active' : ''}}  d-flex justify-content-center" style="white-space: nowrap;">
                                @if($item->image_icon)
                                    <img src="{{\App\Library\MediaHelpers::media($item->image_icon)}}" alt="" class="c-pr-4">
                                @else
                                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/nam/storecard.svg" alt="" class="c-pr-4">
                                @endif
                                <span class="fw-500 fz-15 lh-24 ">{{ $item->title }}</span>
                            </div>
                        </a>
                    </li>
                @endif
            @endforeach


        </ul>
    </div>
</div>



