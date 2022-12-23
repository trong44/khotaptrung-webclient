@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head')
@endsection
@section('meta_robots')
    <meta name="robots" content="index,follow" />
@endsection
@section('content')

    <div class="" style="width:100%;position: relative;">
        @if($data == null)
        @else
            <div class="divcontent1">
                <div class="left ">
                    <div class="row">
                        <div class="col-md-12 col-xs-12 main-tintuc-left">

                            <ul class="bread_crumb">
                                <li><a href="/" title="Trang chủ">Trang chủ</a> ›</li>
                                @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                                    <li class="active"><a href="{{ setting('sys_zip_shop') }}" class="active">Tin tức</a> ›</li>
                                @else
                                    <li class="active"><a href="/blog" title="Tin tức">Tin tức</a> ›</li>
                                @endif
                                <li class="active">
                                    @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                                        <a href="{{ setting('sys_zip_shop') }}/{{ $title->slug }}" class="active">{{ $title->title }}</a>
                                    @else
                                        <a href="/tin-tuc/{{ $title->slug }}" class="active">{{ $title->title }}</a>
                                    @endif
                                </li>

                            </ul>
                            <h1 class="h1_list">{{$title->title}}</h1>
                        </div>

                        <div class="main_list_new" >
                            <div class="article_data">
                                @include('frontend.pages.article.widget.__datalist')
                            </div>
                        </div>
                    </div>
                </div>
                @include('frontend.pages.article.widget.__danh__muc')


            </div>
        @endif
    </div>
    <input type="hidden" name="hidden_page" class="hidden_page" value="1" />
    <input type="hidden" name="slug" class="slug-article" value="{{ $slug }}" />
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/article/articlecategory.js"></script>

@endsection
