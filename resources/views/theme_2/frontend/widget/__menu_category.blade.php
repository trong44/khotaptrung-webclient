@if(isset($data_menu_category) && count($data_menu_category) > 0)
    @foreach($data_menu_category as $item)
        @if ($item->parent_id == 0)
            @if($item->url == '/tin-tuc')
                @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                    <li class="nav-item item-home item-{{substr($item->url, 1)}}">
                        <a href="{{ setting('sys_zip_shop') }}" class="nav-link">{{$item->title}}</a>
                    </li>
                @else
                    <li class="nav-item item-home item-{{substr($item->url, 1)}}">
                        <a href="{{$item->url??'/'}}" class="nav-link">{{$item->title}}</a>
                    </li>
                @endif
            @else
                <li class="nav-item item-home item-{{substr($item->url, 1)}}">
                    <a href="{{$item->url??'/'}}" class="nav-link">{{$item->title}}</a>
                </li>
            @endif

        @endif
    @endforeach
@endif
