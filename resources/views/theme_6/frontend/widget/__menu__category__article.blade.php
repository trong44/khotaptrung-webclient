@if(isset($data) && count($data) > 0)

<div class="col-lg-3 col-md-12 col-xs-12">
    <div class="news_content_category">
        <div class="news_content_category_title">
            <p>Danh mục</p>
            <div class="news_content_category_line"></div>
        </div>
        <ul class="news_content_category_menu">
            <li><i class="fas fa-chevron-right"></i> <a href="/tin-tuc" class="btn-tatca">
                    @php
                        $count = 0;
                        foreach ($data as $val){
                            $count = $count + $val->count_item;
                        }
                    @endphp
                 Tất cả ({{ $count }})</a>
            </li>

                @foreach($data as $val)
                    <li><i class="fas fa-chevron-right"></i> <a href="/tin-tuc/{{ $val->slug }}" class="btn-slug" data-slug="{{ $val->slug }}">{{ $val->title }} ({{ $val->count_item }})</a> </li>
                @endforeach
        </ul>
    </div>
</div>
@endif
