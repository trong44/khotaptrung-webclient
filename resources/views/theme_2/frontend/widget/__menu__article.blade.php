
@if(isset($data))
    @foreach($data as $val)
        <li class="nav-item active{{ $val->slug }}">
            @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
            <a href="{{ setting('sys_zip_shop') }}/{{ $val->slug }}" class="nav-link">{{ $val->title }}</a>
            @else
                <a href="/tin-tuc/{{ $val->slug }}" class="nav-link">{{ $val->title }}</a>
            @endif
        </li>
    @endforeach
@endif
