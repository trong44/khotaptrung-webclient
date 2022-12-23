
        <ul  class="navbar-nav ml-auto mr-2 ">
            @foreach($data??[] as $item)
                @if ($item->parent_id == 0)
                    @if($item->url == '/tin-tuc')
                        @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                            <li class="nav-item ">
                                <a  rel=""  href="{{ setting('sys_zip_shop') }}" @if($item->target==1) target="_blank" @endif class="c-link nav-link">{{$item->title}} </a>
                            </li>
                        @else
                            <li class="nav-item ">
                                <a  rel=""  href="{{ $item->url??'/' }}" @if($item->target==1) target="_blank" @endif class="c-link nav-link">{{$item->title}} </a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item ">
                            <a  rel=""  href="{{$item->url??'/'}}" @if($item->target==1) target="_blank" @endif class="c-link nav-link">{{$item->title}} </a>
                            <ul id="children-of-{{$item->id}}" class="@foreach ($data as $key_child => $child_item)  @if ($item->id == $child_item->parent_id) dropdown-menu @endif  @endforeach c-menu-type-classic c-pull-left " >
                                @foreach ($data??[] as $key_child => $child_item)
                                    @if ($item->id == $child_item->parent_id)
                                        <li class="menu-item">
                                            <a  href="{{ $child_item->url??'/' }}" @if($child_item->target==1) target="_blank" @endif class="\">{{$child_item->title}}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endif
            @endforeach
        </ul>

