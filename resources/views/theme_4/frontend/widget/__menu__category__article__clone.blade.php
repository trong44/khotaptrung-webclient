@if(isset($dataclone) && count($dataclone) > 0)

<div class="col-md-3 col-xs-12">
    <!-- BEGIN: CONTENT/BLOG/BLOG-SIDEBAR-1 -->
    <div class="c-content-ver-nav">
        <div class="c-content-title-1 c-theme c-title-md c-margin-t-40">
            <h3 class="c-font-bold c-font-uppercase">Danh mục</h3>
            <div class="c-line-left c-theme-bg"></div>
        </div>
        <ul class="c-menu c-arrow-dot1 c-theme">
            @php
                $count = 0;
                foreach ($data as $val){
                    $count = $count + $val->count_item;
                }
            @endphp
            <li>
                @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                <a href="{{ setting('sys_zip_shop') }}">Tất cả ({{ $count }})</a>
                @else
                    <a href="/tin-tuc">Tất cả ({{ $count }})</a>
                @endif
            </li>
            @foreach($data as $val)
                <li>
                    @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                    <a href="{{ setting('sys_zip_shop') }}/{{ $val->slug }}" class="btn-slug" data-slug="{{ $val->slug }}">{{ $val->title }} ({{ $val->count_item }})</a>
                    @else
                        <a href="/tin-tuc/{{ $val->slug }}" class="btn-slug" data-slug="{{ $val->slug }}">{{ $val->title }} ({{ $val->count_item }})</a>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
@endif













</div>
