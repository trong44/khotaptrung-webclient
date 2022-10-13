@extends('frontend.layouts.master')
@section('content')

<div class="divcontent1">
    <div class="left left_list">
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

                        {!! $data->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('frontend.pages.article.widget.__danh__muc')

</div>
@endsection
