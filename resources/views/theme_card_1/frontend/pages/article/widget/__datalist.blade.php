
{{--<hr>--}}
{{--<div class="pull-right pagination">--}}
{{--    <div class="col-sm-12" style="text-align:right">--}}
{{--        <div id="paginate-aricles" class="mt-5">--}}
{{--            <ul class="pagination pagination-sm">--}}

{{--                <li class="page-item disabled"><span class="page-link">&laquo;</span></li>--}}



{{--                <li class="page-item active"><span class="page-link">1</span></li>--}}
{{--                <li class="page-item" ><a class="page-link" href="https://thegarenagiare.com/blog?page=2">2</a></li>--}}




{{--                <li class="page-item"><a class="page-link" href="https://thegarenagiare.com/blog?page=2" rel="next">&raquo;</a></li>--}}
{{--            </ul>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

@if(isset($data) )
    @foreach($data as $item)
        <div class="blog-item mb-4">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="item-blog-img">
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
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                    <h3>
                        @if(isset($item->url_redirect_301))
                            <a target="_blank" href="{{ $item->url_redirect_301 }}"> {{ $item->title }} </a>
                        @else
                            @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                                <a href="{{ setting('sys_zip_shop') }}/{{ $item->slug }}"> {{ $item->title }} </a>
                            @else
                                <a href="/tin-tuc/{{ $item->slug }}"> {{ $item->title }} </a>
                            @endif
                        @endif
                    </h3>
                    <div class="note-item-blog">
                        <p>
                            <span class="time_list">
                                <i class="far fa-clock"></i>
                                @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                                    @if(isset($item->published_at))
                                        {{ formatDateTime($item->published_at) }}
                                    @else
                                       {{ formatDateTime($item->created_at) }}
                                    @endif

                                @else
                                    {{ formatDateTime($item->created_at) }}
                                @endif
                                <span class="mx-1">|</span> Danh mục : <a href="huong-dan">{{ $item->groups[0]->title ?? '' }}</a>
                            </span>
                        </p>
                        <div class="item-content">
                            <p> {!! $item->seo_description !!}</p>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    @endforeach
@else
    <div class="blog-item mb-4">
    <div class="row pb-3 pt-3">
        <div class="col-md-12 text-center">
            <span style="color: red;font-size: 16px;">Không có dữ liệu !</span>
        </div>
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
