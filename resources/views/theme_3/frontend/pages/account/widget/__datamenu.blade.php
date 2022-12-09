@if(isset($data))
    {{--  Header mobile  --}}
    <section class="media-mobile">
        <div class="container container-fix banner-mobile-container-ct">

            <div class="row marginauto banner-mobile-row-ct">
                <div class="col-auto left-right" style="width: 10%">
                    <a href="/mua-acc/{{ isset($data->category->custom->slug) ? $data->category->custom->slug :  $data->category->slug }}" class="previous-step-one" style="line-height: 28px">
                        <img  src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/back.png" alt="" >
                    </a>
                </div>

                <div class="col-auto left-right banner-mobile-span text-center" style="width: 80%">
                    <p>{{ isset($data->category->custom->title) ? $data->category->custom->title :  $data->category->title }}</p>
                </div>
                <div class="col-auto left-right" style="width: 10%">
                </div>
            </div>

        </div>
    </section>

    {{--  Menu  --}}
    <section class="media-web">
        <div class="container container-fix menu-container-ct">
            <ul>
                <li><a href="/">Trang chủ</a></li>
                <li class="menu-container-li-ct"><img  src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/arrow-right.png" alt=""></li>
                <li class="menu-container-li-ct"><a href="/mua-acc">Danh mục Shop Account</a></li>
                <li class="menu-container-li-ct"><img  src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/arrow-right.png" alt=""></li>
                <li class="menu-container-li-ct"><a href="/mua-acc/{{ isset($data->category->custom->slug) ? $data->category->custom->slug :  $data->category->slug }}">{{ isset($data->category->custom->title) ? $data->category->custom->title :  $data->category->title }}</a></li>
                <li class="menu-container-li-ct"><img  src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/arrow-right.png" alt=""></li>
                <li class="menu-container-li-ct"><a href="#">Chi tiết Nick</a></li>
            </ul>
        </div>
    </section>
@endif
