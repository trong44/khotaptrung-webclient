

@if(isset($data))

<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
    @foreach($data??[] as $item)
        @if ($item->parent_id == 0)
            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover" >
            @if($item->url != '' || $item->url != null)
                <a href=" {{$item->url}}" class="m-menu__link m-menu__link__user" style="padding: 9px 16px;">
                    <div class="icon-sidebar" style="--path:url({{ $item->image_icon??'' }})"></div>
                    <span class="m-menu__link-text" style="padding-left: 42px">{{$item->title}}</span>
                </a>
            @else
                <a href="javascript:void(0)" class="m-menu__link m-menu__toggle" style="padding: 9px 16px;">
                    <div class="icon-sidebar" style="--path:url({{ $item->image_icon??'' }})"></div>
                    <span class="m-menu__link-text" style="padding-left: 42px">{{$item->title}} <span style="padding-left: 18px"></span><i class="fa-solid fa-angle-right"></i></span>
                </a>
            @endif
            @foreach ($data as $key_child => $child_item)
                @if ($item->id == $child_item->parent_id)
                    <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                            <li class="m-menu__item " aria-haspopup="true">
                                <a href="{{$child_item->url?$child_item->url:$child_item->slug}}" class="m-menu__link ">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                    <span class="m-menu__link-text">{{$child_item->title}}</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                @endif
            @endforeach
            </li>
        @endif
    @endforeach


</ul>
@endif
