@if(isset($data))

    <ul class="breadcrumb-list d-none d-lg-flex">
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
@endif
