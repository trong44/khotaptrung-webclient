@foreach($data??[] as $key  => $item)
    @if ($item->parent_id == 0)
        @if($item->url == "/tin-tuc")
            @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                <li>
                    <a @foreach ($data as $key_child => $child_item) @if ($item->id == $child_item->parent_id) data-toggle="collapse" class="nav_mobile-collapse" href="#menuchild_item" role="button" aria-expanded="true" aria-controls="collapseExample"  @else href="{{ setting('sys_zip_shop') }}" @endif  @endforeach @if($item->target==1) target="_blank" @endif>{{$item->title}}</a>
                </li>
            @else
                @if($item->url != '' || $item->url != null )
                    @if($item->url == '#')
                        <li>
                            <a  data-toggle="collapse" class="nav_mobile-collapse" href="#menuchild_item_{{$key}}" role="button" aria-expanded="true" aria-controls="collapseExample" >{{$item->title}}</a>
                        </li>
                    @else
                        <li>
                            <a href="{{$item->url}}" @if($item->target==1) target="_blank" @endif>{{$item->title}}</a>
                        </li>
                    @endif



                @else
                    <li>
                        <a  data-toggle="collapse" class="nav_mobile-collapse" href="#menuchild_item_{{$key}}" role="button" aria-expanded="true" aria-controls="collapseExample" >{{$item->title}}</a>
                    </li>
                @endif
                <ul class="sub-menu collapse" id="menuchild_item_{{$key}}" >
                    @foreach ($data as $key_child => $child_item)
                        @if ($item->id == $child_item->parent_id)
                            <li class="menu-item">
                                <a  href="{{$child_item->url}}" @if($item->target==1) target="_blank" @endif>{{$child_item->title}}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            @endif
        @else
            @if($item->url != '' || $item->url != null )
                @if($item->url == '#')
                    <li>
                        <a  data-toggle="collapse" class="nav_mobile-collapse" href="#menuchild_item_{{$key}}" role="button" aria-expanded="true" aria-controls="collapseExample" >{{$item->title}}</a>
                    </li>
                @else
                    <li>
                        <a href="{{$item->url}}" @if($item->target==1) target="_blank" @endif>{{$item->title}}</a>
                    </li>
                @endif



            @else
                <li>
                    <a  data-toggle="collapse" class="nav_mobile-collapse" href="#menuchild_item_{{$key}}" role="button" aria-expanded="true" aria-controls="collapseExample" >{{$item->title}}</a>
                </li>
            @endif
            <ul class="sub-menu collapse" id="menuchild_item_{{$key}}" >
                @foreach ($data as $key_child => $child_item)
                    @if ($item->id == $child_item->parent_id)
                        <li class="menu-item">
                            <a  href="{{$child_item->url}}" @if($item->target==1) target="_blank" @endif>{{$child_item->title}}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
        @endif

    @endif
@endforeach
{{--<li>--}}
{{--    <a @foreach ($data as $key_child => $child_item) @if ($item->id == $child_item->parent_id) data-toggle="collapse" class="nav_mobile-collapse" href="#menuchild_item" role="button" aria-expanded="true" aria-controls="collapseExample"  @else href="{{$item->url}}" @endif  @endforeach @if($item->target==1) target="_blank" @endif>{{$item->title}}</a>--}}
{{--</li>--}}
