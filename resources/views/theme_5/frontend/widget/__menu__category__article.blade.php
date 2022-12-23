@if(isset($data) && count($data) > 0)
    <div>
        <ul class="nav nav-tabs article-list size-auto d-lg-table w-100" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="tab {{ request()->is('tin-tuc') ? 'active' : '' }}" href="/tin-tuc" style="display: flex">
                    <span class="icon-custom c-pl-lg-22" style="--path-icon:url('/assets/frontend/theme_5/image/svg/news-all.svg')">Tất cả tin tức</span>
                </a>
            </li>
            @foreach($data as $val)
                <li class="nav-item" role="presentation">
                    <a class="tab {{ request()->is('tin-tuc/'.$val->slug) ? 'active' : '' }} " href="/tin-tuc/{{$val->slug}}" style="display: flex">
                        <span class="icon-custom c-pl-lg-22" style="--path-icon:url({{ $val->image_icon ?? '/assets/frontend/theme_5/image/svg/news-all.svg' }})"> {{ $val->title }} </span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endif

