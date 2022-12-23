@if(isset($data))

    <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow " style="background-color: #fff;border-radius: 12px;">
    @foreach($data??[] as $item)
        @if ($item->parent_id == 0)
            <li class="m-menu__item {{ '/'.request()->path() == $item->url ? 'active' : ''}}  " aria-haspopup="true">
                <a href="{{$item->url?$item->url:$item->slug}}" class="m-menu__link d-flex">
                    <div class="account-sidebar"></div>
                    <span class="m-menu__link-text my-auto"> {{$item->title}}</span>
                </a>
            </li>
                @foreach ($data as $key_child => $child_item)
                    @if ($item->id == $child_item->parent_id)
                        <li class="m-menu__item {{ '/'.request()->path() == $child_item->url ? 'active' : ''}}  " aria-haspopup="true">
                            <a href="{{$child_item->url?$child_item->url:$item->slug}}" class="m-menu__link d-flex">
                                {{--            <i class="m-menu__link-icon fas fa-user"><span></span></i>--}}
                                {{--            <div class="col-auto left-right global__link__profile">--}}
                                {{--                <i class="__icon__profile --sm__profile --link__profile" style="--path : url({{ $item->image_icon??'' }})"></i>--}}
                                {{--            </div>--}}
                                <div class="icon-sidebar" style="--path:url({{ $child_item->image_icon??'' }})"></div>
                                <span class="m-menu__link-text my-auto"> {{$child_item->title}}</span>
                            </a>
                        </li>
                    @endif
                @endforeach


        @endif
    @endforeach

</ul>
@endif
