
    <div class="row">
        <div class="art-list">
            @if(isset($data) )
                @foreach($data as $item)
                    <div class="a-item">
                        <div class="thumbnail-image img-thumbnail">
                            @if(isset($item->url_redirect_301))
                                <a target="_blank" href="{{ $item->url_redirect_301 }}"><img src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="{{ $item->title }}"></a>
                            @else
                                @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                                <a href="{{ setting('sys_zip_shop') }}/{{ $item->slug }}"><img src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="{{ $item->title }}"></a>
                                @else
                                    <a href="/tin-tuc/{{ $item->slug }}"><img src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="{{ $item->title }}"></a>
                                @endif
                            @endif

                        </div>
                        <div class="info">
                            <div class="article_title ">
                                <h2>
                                    @if(isset($item->url_redirect_301))
                                        <a target="_blank" href="{{ $item->url_redirect_301 }}" style="text-transform: initial;">{{ $item->title }}</a>
                                    @else
                                        @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                                        <a href="{{ setting('sys_zip_shop') }}/{{ $item->slug }}" style="text-transform: initial;">{{ $item->title }}</a>
                                        @else
                                            <a href="/tin-tuc/{{ $item->slug }}" style="text-transform: initial;">{{ $item->title }}</a>
                                        @endif
                                    @endif

                                </h2>
                            </div>
                            <div class="article_cat_date">
                                <div style="display: inline-block;margin-right: 15px">
                                    <i class="far fa-clock" aria-hidden="true"></i>
                                    @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                                        @if(isset($item->published_at))
                                            {{ formatDateTime($item->published_at) }}
                                        @else
                                            {{ formatDateTime($item->created_at) }}
                                        @endif
                                    @else
                                        {{ formatDateTime($item->created_at) }}
                                    @endif
                                </div>
                                <div style="display: inline-block">
                                    <i class="far fa-newspaper" aria-hidden="true"></i>
                                    @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                                    <a href="{{ setting('sys_zip_shop') }}/{{ $item->groups[0]->slug }}" title="Hướng dẫn">{{ $item->groups[0]->title }}</a>
                                    @else
                                        <a href="/tin-tuc/{{ $item->groups[0]->slug }}" title="Hướng dẫn">{{ $item->groups[0]->title }}</a>
                                    @endif
                                </div>
                            </div>
                            <div class="article_description hidden-xs">{!! $item->seo_description !!}</div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>

    <div class="row d-flex justify-content-center" style="margin-top: 20px;">

        @if(isset($data))
            @if($data->total()>1)
                <div class="row marinautooo paginate__history paginate__history__fix justify-content-center">
                    <div class="col-auto paginate__category__col">
                        <div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">
                            {{ $data->appends(request()->query())->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            @endif
        @endif
    </div>




