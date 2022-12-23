
@foreach($data??[] as $item)
    @if ($item->parent_id == 0)
        @if($item->url == "/tin-tuc")
            @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                <li>
                    <a @foreach ($data as $key_child => $child_item) @if ($item->id == $child_item->parent_id) data-toggle="collapse" class="nav_mobile-collapse" href="#menuchild_item" role="button" aria-expanded="true" aria-controls="collapseExample"  @else href="/blog" @endif  @endforeach @if($item->target==1) target="_blank" @endif>{{$item->title}}</a>
                </li>
            @else
                <li>
                    <a @foreach ($data as $key_child => $child_item) @if ($item->id == $child_item->parent_id) data-toggle="collapse" class="nav_mobile-collapse" href="#menuchild_item" role="button" aria-expanded="true" aria-controls="collapseExample"  @else href="{{$item->url}}" @endif  @endforeach @if($item->target==1) target="_blank" @endif>{{$item->title}}</a>
                </li>
                <ul class="sub-menu collapse" id="menuchild_item" >
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
            <li>
                <a @foreach ($data as $key_child => $child_item) @if ($item->id == $child_item->parent_id) data-toggle="collapse" class="nav_mobile-collapse" href="#menuchild_item" role="button" aria-expanded="true" aria-controls="collapseExample"  @else href="{{$item->url}}" @endif  @endforeach @if($item->target==1) target="_blank" @endif>{{$item->title}}</a>
            </li>
            <ul class="sub-menu collapse" id="menuchild_item" >
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
