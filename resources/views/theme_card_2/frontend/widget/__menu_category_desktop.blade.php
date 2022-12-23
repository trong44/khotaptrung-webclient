<ul class="m-nav m-nav--inline">
    @foreach($data??[] as $item)
        @if ($item->parent_id == 0)
            @if($item->url == "/tin-tuc")
                @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')

                    <li class="m-nav__item hvr-underline-from-left">
                        <a href="{{ setting('sys_zip_shop') }}" @if($item->target==1) target="_blank" @endif>{{$item->title}}</a>
                    </li>
                @else
                    <li class="m-nav__item hvr-underline-from-left">
                        <a href="{{$item->url}}" @if($item->target==1) target="_blank" @endif>{{$item->title}}</a>
                    </li>
                @endif
            @elseif($item->url == '/nap-the' || $item->url =='/recharge-atm')

                @if(!App\Library\AuthCustom::check())
                    <li class="m-nav__item hvr-underline-from-left">
                        <a href="#" data-toggle="modal" data-target="#modalLogin" @if($item->target==1) target="_blank" @endif>{{$item->title}}</a>
                    </li>
                @else
                    <li class="m-nav__item hvr-underline-from-left">
{{--                        <a href="{{$item->url}}" @if($item->target==1) target="_blank" @endif>{{$item->title}}</a>--}}
                        <a href="{{$item->url}}" data-toggle="modal" data-target="#recharge_card" @if($item->target==1) target="_blank" @endif>{{$item->title}}</a>
                    </li>
                @endif
            @else
                <li class="m-nav__item hvr-underline-from-left ">
                    <a href="{{$item->url}}" @if($item->target==1) target="_blank" @endif>{{$item->title}}</a>
                    <ul class="sub-menu" >
                        @foreach ($data??[] as $key_child => $child_item)
                            @if ($item->id == $child_item->parent_id)
                                <li class="menu-item">
                                    <a  href="{{$child_item->url}}" class="\">{{$child_item->title}}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </li>
            @endif
        @endif
    @endforeach

</ul>


{{--<li class="m-nav__item hvr-underline-from-left">--}}
{{--    <a href="/">Trang chủ</a>--}}
{{--</li>--}}
{{--<li  class="m-nav__item hvr-underline-from-left" data-toggle="modal" data-target="#modalLogin">--}}
{{--    <a href="">Nạp tiền</a>--}}
{{--</li>--}}
{{--<li class="m-nav__item hvr-underline-from-left" data-toggle="modal" data-target="#modalLogin">--}}
{{--    <a href="">Lịch sử giao dịch</a>--}}
{{--</li>--}}
{{--<li class="m-nav__item hvr-underline-from-left">--}}
{{--    <a href="/blog">Tin Tức</a>--}}
{{--</li>--}}

