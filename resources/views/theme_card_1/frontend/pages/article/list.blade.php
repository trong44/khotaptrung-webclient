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
                <div class="left">
                    <div class="row">
                        <div class="col-md-12 col-xs-12 main-tintuc-left">

                            <ul class="bread_crumb">
                                <li><a href="/" title="Trang chủ">Trang chủ</a> ›</li>
                                @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                                    <li><a href="{{ setting('sys_zip_shop') }}" class="active">Tin tức</a></li>
                                @else
                                    <li class="active"><a href="/blog" title="Tin tức">Tin tức</a></li>
                                @endif

                            </ul>
                            <h1 class="h1_list">Tin tức</h1>
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
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/article/article.js"></script>

@endsection
