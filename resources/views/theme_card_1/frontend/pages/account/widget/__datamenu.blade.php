@if(isset($data))
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="/mua-acc">Mua acc</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="/mua-acc/{{ isset($data->category->custom->slug) ? $data->category->custom->slug :  $data->category->slug }}">{{ isset($data->category->custom->title) ? $data->category->custom->title :  $data->category->title }}</a></li>
    </ol>
@endif
