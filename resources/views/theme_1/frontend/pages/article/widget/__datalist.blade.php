@if(isset($data) )
    @foreach($data as $item)
        <div class="news_content_list">
            <div class="news_content_list_item">
                <div class="news_content_list_image">
                    @if(isset($item->url_redirect_301))
                        <a target="_blank" href="{{ $item->url_redirect_301 }}">
                            <img src="{{\App\Library\MediaHelpers::media($item->image)}}" class="lazy" alt="">
                        </a>
                    @else
                        @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                            <a href="{{ setting('sys_zip_shop') }}/{{ $item->slug }}">
                                <img src="{{\App\Library\MediaHelpers::media($item->image)}}" class="lazy" alt="">
                            </a>
                        @else
                            <a href="/tin-tuc/{{ $item->slug }}">
                                <img src="{{\App\Library\MediaHelpers::media($item->image)}}" class="lazy" alt="">
                            </a>
                        @endif

                    @endif

                </div>

                <div class="news_content_list_info">
                    <div class="news_content_list_title">
                        @if(isset($item->url_redirect_301))
                            <a target="_blank" href="{{ $item->url_redirect_301 }}"> {{ $item->title }} </a>
                        @else
                            @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                            <a href="{{ setting('sys_zip_shop') }}/{{ $item->slug }}"> {{ $item->title }} </a>
                            @else
                                <a href="/tin-tuc/{{ $item->slug }}"> {{ $item->title }} </a>
                            @endif
                        @endif
                    </div>

                    <div class="news_content_list_date">
                        <div>
                            @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                                @if(isset($item->published_at))
                                    <i class="fas fa-calendar-alt"></i> {{ formatDateTime($item->published_at) }}
                                @else
                                    <i class="fas fa-calendar-alt"></i> {{ formatDateTime($item->created_at) }}
                                @endif

                            @else
                                <i class="fas fa-calendar-alt"></i> {{ formatDateTime($item->created_at) }}
                            @endif
                        </div>
                        <div>
                            <i class="fas fa-newspaper"></i><a href=""> {{@$item->groups[0]->title }} </a>
                        </div>
                    </div>

                    <div class="news_content_list_decription">
                        {!! $item->seo_description !!}
                    </div>
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

<div class="row">
    <div class="col-md-12 left-right justify-content-end paginate__v1_index paginate__v1_mobie frontend__panigate">

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
</div>







