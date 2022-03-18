@if(isset($slug))
    <div class="col-md-3 col-xs-12">
        <div class="news_content_category">
            <div class="news_content_category_title">
                <p>Danh mục</p>
                <div class="news_content_category_line"></div>
            </div>
            <ul class="news_content_category_menu">
                <li><i class="fas fa-chevron-right"></i> <a href="/tin-tuc">Tất cả ({{ $count }})</a></li>

                @if(isset($datacategory) && count($datacategory) > 0)
                    @foreach($datacategory as $val)
                        <li><i class="fas fa-chevron-right"></i> <a href="/tin-tuc?dm={{ $val->slug }}" data-slug="{{ $val->slug }}">{{ $val->title }} ({{ $val->count_item }})</a> </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
@else
    <div class="col-md-3 col-xs-12">
        <div class="news_content_category">
            <div class="news_content_category_title">
                <p>Danh mục</p>
                <div class="news_content_category_line"></div>
            </div>
            <ul class="news_content_category_menu">
                <li><i class="fas fa-chevron-right"></i> <a href="javascript:void(0)" class="btn-tatca">Tất cả ({{ $count }})</a></li>

                @if(isset($datacategory) && count($datacategory) > 0)
                    @foreach($datacategory as $val)
                        <li><i class="fas fa-chevron-right"></i> <a href="javascript:void(0)" class="btn-slug" data-slug="{{ $val->slug }}">{{ $val->title }} ({{ $val->count_item }})</a> </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
@endif
