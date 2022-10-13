@foreach($data_menu_category??[] as $item)

    @if ($item->parent_id == 0)
        @if($item->url == "/tin-tuc")
            @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')


                <li class="m1">
                    <a href="{{ setting('sys_zip_shop') }}" @if($item->target==1) target="_blank" @endif>{{$item->title}}</a>
                </li>
            @else
                <li class="m1">
                    <a href="{{$item->url}}" @if($item->target==1) target="_blank" @endif>{{$item->title}}</a>
                </li>
            @endif
        @else
            <li class="m1 mmt">
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

