@if(isset($data))

<div class="menu-category">
    <div class="container container-fix">
        <ul>
            @foreach($data as $item)
                @if(isset($item->url) && $item->url != '')
                    @if($item->url == '/nap-the' || $item->url =='/recharge-atm')
                    <li>
                       <a class="{{ '/'.request()->path() == $item->url ? 'nav-profile-active' : ''}} check_auth_menu"  @if($item->target == 1) target="_blank" href="{{ $item->url }}"     @elseif($item->target == 3) @if(!App\Library\AuthCustom::check()) onclick="openLoginModal();" href="#" @else href="{{ $item->url }}"   @endif @else href="{{ $item->url }}"   @endif>
                            @if($item->image_icon)
                                 <img onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($item->image_icon)}}" alt="">
                            @else
                                 <img onerror="imgError(this)" src="/assets/frontend/{{theme('')->theme_key}}/image/service1.png" alt="">
                            @endif

                            <span id="nav-charge">{{ $item->title }}</span>
                        </a>
                    </li>
                    @elseif($item->url == '/tin-tuc')
                        @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                            <li>
                                <a class="{{ '/'.request()->path() == $item->url ? 'nav-profile-active' : ''}}"  @if($item->target == 1) target="_blank" href="{{ setting('sys_zip_shop') }}"     @elseif($item->target == 3) @if(!App\Library\AuthCustom::check()) onclick="openLoginModal();" href="#" @else href="{{ setting('sys_zip_shop') }}"   @endif @else href="{{ setting('sys_zip_shop') }}"   @endif>
                                    @if($item->image_icon)
                                        <img onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($item->image_icon)}}" alt="">
                                    @else
                                        <img onerror="imgError(this)" src="/assets/frontend/{{theme('')->theme_key}}/image/service1.png" alt="">
                                    @endif

                                    <span id="nav-charge">{{ $item->title }}</span>
                                </a>
                            </li>
                        @else
                            <li>
                                <a class="{{ '/'.request()->path() == $item->url ? 'nav-profile-active' : ''}}"  @if($item->target == 1) target="_blank" href="{{ $item->url }}"     @elseif($item->target == 3) @if(!App\Library\AuthCustom::check()) onclick="openLoginModal();" href="#" @else href="{{ $item->url }}"   @endif @else href="{{ $item->url }}"   @endif>
                                    @if($item->image_icon)
                                        <img onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($item->image_icon)}}" alt="">
                                    @else
                                        <img onerror="imgError(this)" src="/assets/frontend/{{theme('')->theme_key}}/image/service1.png" alt="">
                                    @endif

                                    <span id="nav-charge">{{ $item->title }}</span>
                                </a>
                            </li>
                        @endif
                    @else
                        <li>
                            <a class="{{ '/'.request()->path() == $item->url ? 'nav-profile-active' : ''}}"  @if($item->target == 1) target="_blank" href="{{ $item->url }}"     @elseif($item->target == 3) @if(!App\Library\AuthCustom::check()) onclick="openLoginModal();" href="#" @else href="{{ $item->url }}"   @endif @else href="{{ $item->url }}"   @endif>
                                @if($item->image_icon)
                                    <img onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($item->image_icon)}}" alt="">
                                @else
                                    <img onerror="imgError(this)" src="/assets/frontend/{{theme('')->theme_key}}/image/service1.png" alt="">
                                @endif

                                <span id="nav-charge">{{ $item->title }}</span>
                            </a>
                        </li>

                    @endif
                @else
                    <li>
                        <a class="{{ '/'.request()->path() == $item->url ? 'nav-profile-active' : ''}}"  @if($item->target == 1) target="_blank" href="{{ $item->url }}"     @elseif($item->target == 3) @if(!App\Library\AuthCustom::check()) onclick="openLoginModal();" href="#" @else href="{{ $item->url }}"   @endif @else href="{{ $item->url }}"   @endif>
                            @if($item->image_icon)
                                <img onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($item->image_icon)}}" alt="">
                            @else
                                <img onerror="imgError(this)" src="/assets/frontend/{{theme('')->theme_key}}/image/service1.png" alt="">
                            @endif

                            <span id="nav-charge">{{ $item->title }}</span>
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</div>
@endif
