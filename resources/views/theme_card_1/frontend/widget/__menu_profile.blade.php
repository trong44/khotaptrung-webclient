<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
    @foreach($data??[] as $item)

    <li class="m-menu__item {{ '/'.request()->path() == $item->url ? 'active' : ''}}  " aria-haspopup="true">
        <a href="{{$item->url?$item->url:$item->slug}}" class="m-menu__link d-flex">
{{--            <i class="m-menu__link-icon fas fa-user"><span></span></i>--}}
{{--            <div class="col-auto left-right global__link__profile">--}}
{{--                <i class="__icon__profile --sm__profile --link__profile" style="--path : url({{ $item->image_icon??'' }})"></i>--}}
{{--            </div>--}}
            <div class="icon-sidebar" style="--path:url({{ $item->image_icon??'' }})"></div>
            <span class="m-menu__link-text my-auto"> {{$item->title}}</span>
        </a>
    </li>
    @endforeach

</ul>
