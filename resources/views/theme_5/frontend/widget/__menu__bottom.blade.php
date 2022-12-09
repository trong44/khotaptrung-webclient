@if(isset($data) && $data != null)
<ul class="d-flex justify-content-between px-0 c-mb-8 flex-grow-1 flex-shrink-0 ">
    @foreach($data as $key => $item)
        <script>
            $(document).ready(function () {
                if ($('.menu-bottom-item-{{$key}}').hasClass("is-active")) {
                    $('.menu-bottom-item-{{$key}} .menu-bottom_icon').html('<i class="__icon__profile --sm__profile --link__profile" style="--path : url({{ $item->image_icon }})"></i>');
                }
            });
        </script>
        @if($item->url == '/nap-the' || $item->url == '/recharge-atm')
            @if(\App\Library\AuthCustom::check())
                <li class="menu-bottom-item menu-bottom-item-{{$key}} px-0  {{ '/'.request()->path() == $item->url ? 'is-active' : ''}}">
                    <a href="{{$item->url}}" class="d-flex justify-content-center c-p-5 fz-13 fw-400 flex-column align-items-center">
                    <span class="menu-bottom_icon menu-bottom_icon c-pt-6 c-pb-2 text-center  c-mb-4 brs-24">
                            <i class="__icon__profile --sm__profile --link__profile" style="--path : url({{ $item->image }})"></i>
                    </span>
                        <span class="menu-bottom_text fz-12">{{ $item->title }}</span>
                    </a>
                </li>
            @else
                <li class="menu-bottom-item menu-bottom-item-{{$key}} px-0  {{ '/'.request()->path() == $item->url ? 'is-active' : ''}}">
                    <a href="javascript:void(0);" onclick="openLoginModal();" class="d-flex justify-content-center c-p-5 fz-13 fw-400 flex-column align-items-center">
                    <span class="menu-bottom_icon menu-bottom_icon c-pt-6 c-pb-2 text-center  c-mb-4 brs-24">
                            <i class="__icon__profile --sm__profile --link__profile" style="--path : url({{ $item->image }})"></i>
                    </span>
                        <span class="menu-bottom_text fz-12">{{ $item->title }}</span>
                    </a>
                </li>
            @endif
        @elseif($item->url == '/')
            <li class="menu-bottom-item menu-bottom-item-{{$key}} px-0 {{ request()->path() == $item->url ? 'is-active' : ''}}" >
                <a href="{{$item->url}}" class="d-flex justify-content-center c-p-5 fz-13 fw-400 flex-column align-items-center">
                    <span class="menu-bottom_icon menu-bottom_icon c-pt-6 c-pb-2 text-center  c-mb-4 brs-24">
                            <i class="__icon__profile --sm__profile --link__profile" style="--path : url({{ $item->image }})"></i>
                    </span>
                    <span class="menu-bottom_text fz-12">{{ $item->title }}</span>
                </a>
            </li>
        @else
            <li class="menu-bottom-item menu-bottom-item-{{$key}} px-0  {{ '/'.request()->path() == $item->url ? 'is-active' : ''}}">
                <a href="{{$item->url}}" class="d-flex justify-content-center c-p-5 fz-13 fw-400 flex-column align-items-center">
                    <span class="menu-bottom_icon menu-bottom_icon c-pt-6 c-pb-2 text-center  c-mb-4 brs-24">
                            <i class="__icon__profile --sm__profile --link__profile" style="--path : url({{ $item->image }})"></i>
                    </span>
                    <span class="menu-bottom_text fz-12">{{ $item->title }}</span>
                </a>
            </li>
        @endif


    @endforeach

</ul>
@else
<ul class="d-flex justify-content-between px-0 c-mb-8 flex-grow-1 flex-shrink-0 ">
    <li class="menu-bottom-item px-0  @if(Request::is('/')) is-active @endif @if(Request::is('/')) is-active @endif">
        <a href="/" class="d-flex justify-content-center c-p-5 fz-13 fw-400 flex-column align-items-center">

                    <span class="menu-bottom_icon c-pt-6 c-pb-2 text-center  c-mb-4 brs-24">
                        @if(Request::is('/'))
                            <i class="__icon__profile --sm__profile --link__profile" style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/nam/menu-bottom-home_active.svg)"></i>
                        @else
                            <i class="__icon__profile --sm__profile --link__profile" style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/nam/menu-bottom-home.svg)"></i>

                        @endif
                    </span>

            <span class="menu-bottom_text fz-12">Home</span>
        </a>
    </li>
    <li class="menu-bottom-item px-0  @if(Request::is('service-mobile')) is-active @endif">
        <a href="/service-mobile" class="d-flex justify-content-center c-p-5 fz-13 fw-400 flex-column align-items-center">
                    <span class="menu-bottom_icon c-pt-6 c-pb-2 text-center  c-mb-4 brs-24">
                      @if(Request::is('service-mobile'))
                            <i class="__icon__profile --sm__profile --link__profile" style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/nam/menu-bottom-service_active.svg)"></i>
                        @else
                            <i class="__icon__profile --sm__profile --link__profile" style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/nam/menu-bottom-service.svg)"></i>
                        @endif
                    </span>

            <span class="menu-bottom_text fz-12">Dịch vụ</span>
        </a>
    </li>
    <li class="menu-bottom-item px-0 @if(Request::is('nap-the') || Request::is('recharge-atm')) is-active @endif ">
        @if (\App\Library\AuthCustom::check())
            <a href="/nap-the" class="d-flex justify-content-center c-p-5 fz-13 fw-400 flex-column align-items-center">
                        <span class="menu-bottom_icon c-pt-6 c-pb-2 text-center  c-mb-4 brs-24">
                            @if(Request::is('nap-the') || Request::is('recharge-atm'))
                                <i class="__icon__profile --sm__profile --link__profile" style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/nam/menu-bottom-charge_active.svg)"></i>
                            @else
                                <i class="__icon__profile --sm__profile --link__profile" style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/nam/menu-bottom-charge.svg)"></i>
                            @endif
                        </span>

                <span class="menu-bottom_text fz-12">Nạp tiền</span>
            </a>
        @else
            <a href="javascript:void(0);" onclick="openLoginModal();" class="d-flex justify-content-center c-p-5 fz-13 fw-400 flex-column align-items-center">
                        <span class="menu-bottom_icon c-pt-6 c-pb-2 text-center  c-mb-4 brs-24">
                            @if(Request::is('nap-the') || Request::is('recharge-atm'))
                                <i class="__icon__profile --sm__profile --link__profile" style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/nam/menu-bottom-charge_active.svg)"></i>
                            @else
                                <i class="__icon__profile --sm__profile --link__profile" style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/nam/menu-bottom-charge.svg)"></i>
                            @endif
                        </span>

                <span class="menu-bottom_text fz-12">Nạp tiền</span>
            </a>
        @endif

    </li>
    <li class="menu-bottom-item px-0 @if(Request::is('minigame')) is-active @endif ">
        <a href="/minigame" class="d-flex justify-content-center c-p-5 fz-13 fw-400 flex-column align-items-center">
                    <span class="menu-bottom_icon c-pt-6 c-pb-2 text-center  c-mb-4 brs-24">
                       @if(Request::is('minigame'))
                            <i class="__icon__profile --sm__profile --link__profile" style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/nam/menu-bottom-minigame_active.svg)"></i>
                        @else
                            <i class="__icon__profile --sm__profile --link__profile" style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/nam/menu-bottom-minigame.svg)"></i>
                        @endif
                    </span>

            <span class="menu-bottom_text fz-12">Mini Game</span>
        </a>
    </li>
    <li class="menu-bottom-item px-0   @if(Request::is('profile')) is-active @endif">
        <a href="/profile" class="d-flex justify-content-center c-p-5 fz-13 fw-400 flex-column align-items-center">
                    <span class="menu-bottom_icon c-pt-6 c-pb-2  text-center  c-mb-4 brs-24">
                       @if(Request::is('profile'))
                            <i class="__icon__profile --sm__profile --link__profile" style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/nam/menu-bottom-profile_active.svg)"></i>

                        @else
                            <i class="__icon__profile --sm__profile --link__profile" style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/nam/menu-bottom-profile.svg)"></i>

                        @endif

                    </span>

            <span class="menu-bottom_text fz-12">Tài khoản</span>
        </a>
    </li>

@endif
