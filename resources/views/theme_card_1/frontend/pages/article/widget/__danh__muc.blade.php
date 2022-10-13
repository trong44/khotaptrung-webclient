@if(isset($datacate) && count($datacate) > 0)
<div class="right right_list">
    <div class="right-home">

        <div class="item_news chtg">
            <div class="divcauhoithuonggap">
                <h4>Danh mục</h4>
                <div class="main_news">
                    @foreach($datacate as $val)
                        <div class="tt_news">
                            @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                                <a href="{{ setting('sys_zip_shop') }}/{{ $val->slug }}" class="btn-slug  right_news" data-slug="{{ $val->slug }}">{{ $val->title }} ({{ $val->count_item }})</a>
                            @else
                                <a href="/tin-tuc/{{ $val->slug }}" class="btn-slug right_news" data-slug="{{ $val->slug }}">{{ $val->title }} ({{ $val->count_item }})</a>
                            @endif
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endif
