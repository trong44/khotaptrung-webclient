<div class="col-lg-4 d-none d-lg-block">
    @if(isset($data_category) && count($data_category) > 0)
        <div class="card --custom">
            <div class="nav-bar-hr">
                <div class="row marginauto nav-bar-nick nav-bar-parent">
                    <div class="col-md-12 left-right">
                        <div class="row marginauto nav-bar-article-title">
                            <div class="col-12 left-right">
                                <span>Danh mục</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row marginauto nav-bar-nick nav-bar-child add-active_withdraw-money">
                    <div class="col-12 left-right">
                        <a href="/tin-tuc">
                            <div class="row marginauto">
                                <div class="col-auto left-right">
                                    <i class="__icon --md --path__custom" style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/icons/cat-news-all.png)"></i>
                                </div>
                                <div class="col-10 nav-bar-log-top-body-col">
                                            <span> @php
                                                    $count = 0;
                                                    foreach ($data_category as $val){
                                                        $count = $count + $val->count_item;
                                                    }
                                                @endphp
                                                Tất cả ({{ $count }})</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @foreach($data_category as $val)
                    <div class="row marginauto nav-bar-nick nav-bar-child add-active_withdraw-items">
                        <div class="col-12 left-right">
                            <a href="/tin-tuc/{{ $val->slug }}" data-slug="{{ $val->slug }}">
                                <div class="row marginauto">
                                    <div class="col-auto left-right">
                                        <i class="__icon --md --path__custom" style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/icons/cat-news-game.png)"></i>
                                    </div>
                                    <div class="col-10 nav-bar-log-top-body-col">
                                            <span>
                                                {{ $val->title }} ({{ $val->count_item }})
                                            </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    <div class="card --custom">
        <div class="nav-bar-hr">
            <div class="row marginauto nav-bar-nick nav-bar-parent">
                <div class="col-md-12 left-right">
                    <div class="row marginauto nav-bar-article-title">
                        <div class="d-flex col-12 left-right">
                            <span>Tin hot</span>
                            <div class="navbar-spacer"></div>
                            <div class="text-view-more">
                                <a href="javascript:void(0);" class="global__link">Xem thêm<i class="__icon --sm --link ml-1" style="--path : url(/assets/frontend/theme_3/image/svg/arrowright.svg)"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(isset($data) )
                @foreach($data as $key=> $item)
                    @if($key >= 4)
                        @break
                    @endif
                        <div class="sub-article">
                            <div class="row">
                                <div class="col-6 sub-article--thumbnail-container">
                                    <div class="sub-article--thumbnail">
                                        <a href="/tin-tuc/{{ $item->slug }}">
                                            <img onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="" class="sub-article--thumbnail__image">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 sub-article--info">
                                    <a href="/tin-tuc/{{ $item->slug }}" class="sub-article--title__link">
                                        {{ $item->title }}
                                    </a>
                                </div>
                            </div>
                        </div>
                @endforeach
            @else
                <div class="row pb-3 pt-3">
                    <div class="col-md-12 text-center">
                        <span style="color: red;font-size: 16px;">Không có dữ liệu !</span>
                    </div>
                </div>
            @endif

        </div>
    </div>

    <div class="card --custom">
        <div class="nav-bar-hr">
            <div class="row marginauto nav-bar-nick nav-bar-parent">
                <div class="col-md-12 left-right">
                    <div class="row marginauto nav-bar-article-title">
                        <div class="d-flex col-12 left-right">
                            <span>Tin review game</span>
                            <div class="navbar-spacer"></div>
                            <div class="text-view-more">
                                <a href="javascript:void(0);" class="global__link">Xem thêm<i class="__icon --sm --link ml-1" style="--path : url(/assets/frontend/theme_3/image/svg/arrowright.svg)"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(isset($data) )
                @foreach($data as $key=> $item)
                    @if($key >= 4)
                        <div class="sub-article">
                            <div class="row">
                                <div class="col-6 sub-article--thumbnail-container">
                                    <div class="sub-article--thumbnail">
                                        <a href="/tin-tuc/{{ $item->slug }}">
                                            <img onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="" class="sub-article--thumbnail__image">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 sub-article--info">
                                    <a href="/tin-tuc/{{ $item->slug }}" class="sub-article--title__link">
                                        {{ $item->title }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($key >= 5)
                        @break
                    @endif
                @endforeach
            @else
                <div class="row pb-3 pt-3">
                    <div class="col-md-12 text-center">
                        <span style="color: red;font-size: 16px;">Không có dữ liệu !</span>
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>

<div class="col-12 d-block d-lg-none" id="articleCategory">
    <div class="card --custom">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" data-toggle="tab" href="#tab-recenntly-update" role="tab"
                    aria-selected="true">Mới cập nhật</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-toggle="tab" href="#tab-hot-articles" role="tab"
                    aria-selected="false">Tin hot</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-toggle="tab" href="#tab-top-review" role="tab"
                    aria-selected="false">Top review</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active show" id="tab-recenntly-update" role="tabpanel">
                <div>
                    @if(isset($data) )
                        @foreach($data as $key=> $item)
                            @if($key >= 4)
                                <div class="sub-article">
                                    <div class="row">
                                        <div class="col-6 sub-article--thumbnail-container">
                                            <div class="sub-article--thumbnail">
                                                <a href="/tin-tuc/{{ $item->slug }}">
                                                    <img onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="" class="sub-article--thumbnail__image">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-6 sub-article--info">
                                            <div class="sub-article--title mb-3 mb-lg-0">
                                                <a href="/tin-tuc/{{ $item->slug }}" class="sub-article--title__link">
                                                    {{ $item->title }}
                                                </a>
                                            </div>
                                            <div class="sub-article--description d-none d-lg-block">
                                                {!! $item->description !!}
                                            </div>
                                            <div class="sub-article--date">
                                                <i class="__icon calendar mr-2"></i>
                                                {{ formatDateTime($item->created_at) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <div class="row pb-3 pt-3">
                            <div class="col-md-12 text-center">
                                <span style="color: red;font-size: 16px;">Không có dữ liệu !</span>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="col-12 left-right default-paginate mt-3 pb-3">
                    @if(isset($data))
                        @if($data->total()>1)
                            <div class="row marinautooo justify-content-center">
                                <div class="col-auto">
                                    <div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">
                                        {{ $data->appends(request()->query())->links('pagination::bootstrap-default-4') }}
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
            <div class="tab-pane fade" id="tab-hot-articles" role="tabpanel">
                @if(isset($data) )
                    @foreach($data as $key=> $item)
                        @if($key >= 4)
                            @break
                        @endif
                            <div class="sub-article">
                                <div class="row">
                                    <div class="col-6 sub-article--thumbnail-container">
                                        <div class="sub-article--thumbnail">
                                            <a href="/tin-tuc/{{ $item->slug }}">
                                                <img onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="" class="sub-article--thumbnail__image">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-6 sub-article--info">
                                        <a href="/tin-tuc/{{ $item->slug }}" class="sub-article--title__link">
                                            {{ $item->title }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                @else
                    <div class="row pb-3 pt-3">
                        <div class="col-md-12 text-center">
                            <span style="color: red;font-size: 16px;">Không có dữ liệu !</span>
                        </div>
                    </div>
                @endif
            </div>
            <div class="tab-pane fade" id="tab-top-review" role="tabpanel">
                @if(isset($data) )
                    @foreach($data as $key=> $item)
                        @if($key >= 4)
                            <div class="sub-article">
                                <div class="row">
                                    <div class="col-6 sub-article--thumbnail-container">
                                        <div class="sub-article--thumbnail">
                                            <a href="/tin-tuc/{{ $item->slug }}">
                                                <img onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="" class="sub-article--thumbnail__image">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-6 sub-article--info">
                                        <a href="/tin-tuc/{{ $item->slug }}" class="sub-article--title__link">
                                            {{ $item->title }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($key >= 5)
                            @break
                        @endif
                    @endforeach
                @else
                    <div class="row pb-3 pt-3">
                        <div class="col-md-12 text-center">
                            <span style="color: red;font-size: 16px;">Không có dữ liệu !</span>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>