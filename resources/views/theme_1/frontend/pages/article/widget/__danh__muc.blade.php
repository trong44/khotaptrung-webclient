@if(isset($datacate) && count($datacate) > 0)

    <div class="col-lg-3 col-md-12 col-xs-12">
        <div class="news_content_category">
            <div class="news_content_category_title">
                <p>Danh mục</p>
                <div class="news_content_category_line"></div>
            </div>
            <ul class="news_content_category_menu">
                <li><i class="fas fa-chevron-right"></i>
                    @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                    <a href="{{ setting('sys_zip_shop') }}" class="btn-tatca">
                        @php
                            $count = 0;
                            foreach ($datacate as $val){
                                $count = $count + $val->count_item;
                            }
                        @endphp
                        Tất cả ({{ $count }})</a>
                    @else
                        <a href="/tin-tuc" class="btn-tatca">
                            @php
                                $count = 0;
                                foreach ($datacate as $val){
                                    $count = $count + $val->count_item;
                                }
                            @endphp
                            Tất cả ({{ $count }})</a>
                    @endif
                </li>

                @foreach($datacate as $val)
                    <li><i class="fas fa-chevron-right"></i>
                        @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                        <a href="{{ setting('sys_zip_shop') }}/{{ $val->slug }}" class="btn-slug" data-slug="{{ $val->slug }}">{{ $val->title }} ({{ $val->count_item }})</a>
                        @else
                            <a href="/tin-tuc/{{ $val->slug }}" class="btn-slug" data-slug="{{ $val->slug }}">{{ $val->title }} ({{ $val->count_item }})</a>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

