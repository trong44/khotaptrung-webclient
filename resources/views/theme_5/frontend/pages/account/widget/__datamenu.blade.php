@if(isset($data))

    <ul class="breadcrumb-list">
        <li class="breadcrumb-item">
            <a href="/" class="breadcrumb-link">Trang chủ</a>
        </li>
        <li class="breadcrumb-item">
            <a href="/mua-acc" class="breadcrumb-link">Shop Account</a>
        </li>
        <li class="breadcrumb-item">
            <a href="/mua-acc/{{ isset($data->category->custom->slug) ? $data->category->custom->slug :  $data->category->slug }}" class="breadcrumb-link">{{ isset($data->category->custom->title) ? $data->category->custom->title :  $data->category->title }}</a>
        </li>
        <li class="breadcrumb-item">
            <a href="javascript:void(0)" class="breadcrumb-link">Chi tiết nick</a>
        </li>
    </ul>
    <div class="head-mobile">
        <a href="/mua-acc/{{ isset($data->category->custom->slug) ? $data->category->custom->slug :  $data->category->slug }}" class="link-back"></a>

        <h1 class="head-title text-title text-limit limit-1">Danh sách {{ isset($data->category->custom->title) ? $data->category->custom->title :  $data->category->title }}</h1>

        <a href="/" class="home"></a>
    </div>
@endif
