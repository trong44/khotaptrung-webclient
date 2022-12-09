@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head',with(['data'=>$data]))
@endsection
@section('meta_robots')
    <meta name="robots" content="index,follow" />
@endsection
@section('content')

<div class="divcontent1">
    <div class="left left_list mt-0">
        <div class="">
            <div class=" main-tintuc-left">

                <ul class="bread_crumb" style="margin-bottom: 15px">
                    <li><a href="/" title="Trang chủ">Trang chủ</a> ›</li>
                    @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                        <li class="active"><a href="{{ setting('sys_zip_shop') }}" class="active">Tin tức</a> ›</li>
                    @else
                        <li class="active"><a href="/tin-tuc" class="active">Tin tức</a> ›</li>
                    @endif
                    <li class="active"><a href="javascript:void(0)" title="Tin tức">{{ $data->title }}</a> </li>
                </ul>
                <div class="main_list_new" >
                    <div id="main_content">
                        <div class="title_head">
                            <div>
                                <span>Tin tức</span>
                            </div>
                        </div>

                        <h1 id="bd_title">{{ $data->title }}</h1>
                        @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                            @if(isset($data->published_at))
                                <p>
                                    <span class="time_list">   <i class="far fa-clock"></i> {{ formatDateTime($data->published_at) }}</span>
                                </p>
                            @else
                                <p>
                                    <span class="time_list">   <i class="far fa-clock"></i> {{ formatDateTime($data->created_at) }}</span>
                                </p>
                            @endif
                        @else
                            <p>
                                <span class="time_list">   <i class="far fa-clock"></i> {{ formatDateTime($data->created_at) }}</span>
                            </p>
                        @endif

                        <div class="article-content">
                            {!! $data->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('frontend.pages.article.widget.__danh__muc')
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/article/article-detail.js?v={{time()}}"></script>

</div>
@endsection
