@if(isset($datacate) && count($datacate) > 0)
<div class="tag-content mt-5">
    <div class="content-blog-item">
        <h3>Danh mục:</h3>
        <hr class="lines">
    </div>
    <div class="tag-content-item">
        <ul class="tags">
            @foreach($datacate as $val)
                @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                    <li><a href="{{ setting('sys_zip_shop') }}/{{ $val->slug }}" class="tag" data-slug="{{ $val->slug }}">{{ $val->title }} ({{ $val->count_item }}) </a></li>

                @else
                    <li><a href="/tin-tuc/{{ $val->slug }}" class="tag" data-slug="{{ $val->slug }}">{{ $val->title }} ({{ $val->count_item }}) </a></li>

                @endif

            @endforeach
        </ul>
    </div>
</div>
@endif
