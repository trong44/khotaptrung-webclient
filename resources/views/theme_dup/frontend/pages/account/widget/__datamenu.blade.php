@if(isset($data))
    <ul class="news_breadcrumbs_theme news_breadcrumbs_theme__show">
        <li><a href="/" class="news_breadcrumbs_theme_trangchu news_breadcrumbs_theme_trangchu_a">Trang chủ</a></li>
        <li>/</li>
        <li><a href="/mua-acc" class="news_breadcrumbs_theme_tintuc_a"><p class="news_breadcrumbs_theme_tintuc">Mua Acc</p></a></li>
        <li>/</li>
        <li><a href="/mua-acc/{{ isset($data->category->custom->slug) ? $data->category->custom->slug :  $data->category->slug }}" class="news_breadcrumbs_theme_tintuc_a"><p class="news_breadcrumbs_theme_tintuc">{{ isset($data->category->custom->title) ? $data->category->custom->title :  $data->category->title }}</p></a></li>
    </ul>
@endif
