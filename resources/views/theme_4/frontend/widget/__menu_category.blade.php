

<ul  class="navbar-nav ml-auto mr-2">

    <li class="nav-item ">
        <a  rel=""  href="{{$item->url}}" @if($item->target==1) target="_blank" @endif class="c-link nav-link">{{$item->title}}</a>
        <ul id="children-of-{{$item->id}}" class=" dropdown-menu c-menu-type-classic c-pull-left " >
            @foreach ($data??[] as $key_child => $child_item)
                @if ($item->id == $child_item->parent_id)
                    <li class="menu-item">
                        <a  href="{{$child_item->url}}" @if($child_item->target==1) target="_blank" @endif class="\">{{$child_item->title}}</a>
                    </li>
                @endif
            @endforeach
        </ul>
    </li>




{{--    <li class="nav-item ">--}}
{{--        <a  rel=""  href="#modalLogin" class="c-link nav-link">Nạp Tiền<span class="c-arrow c-toggler1"></span></a>--}}
{{--        <ul id="children-of-1265" class=" dropdown-menu c-menu-type-classic c-pull-left " >--}}
{{--            <li class="nav-item ">--}}
{{--                <a  rel="" href="/nap-the" class="">Nạp Thẻ C&agrave;o</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item ">--}}
{{--                <a  rel="" href="/recharge-atm" class="">Nạp ATM / V&iacute; Tự Động</a></li>--}}
{{--            <li class="nav-item ">--}}
{{--                <a target='_blank' rel="" href="/tin-tuc/slug" class="">Hướng Dẫn Nạp ATM Tự Động</a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </li>--}}
{{--    <li class="nav-item ">--}}
{{--        <a  rel=""  href="/mua-the" class="c-link nav-link">Mua thẻ</a>--}}
{{--    </li>--}}
{{--    <li class="nav-item ">--}}
{{--        <a  rel=""  href="/tin-tuc/slug" class="c-link nav-link">UY T&Iacute;N SHOP</a>--}}
{{--    </li>--}}
{{--    <li class="nav-item ">--}}
{{--        <a  rel=""  href="/tin-tuc" class="c-link nav-link">Tin tức</a>--}}
{{--    </li>--}}
</ul>
    @endif
@endforeach
