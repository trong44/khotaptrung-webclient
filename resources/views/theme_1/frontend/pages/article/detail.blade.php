@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head',with(['data'=>$data]))
@endsection
@section('meta_robots')
    <meta name="robots" content="index,follow" />
@endsection
@section('content')
    @if($data == null)
        <div class="item_buy">
            <div class="container pt-3">
                <div class="row pb-3 pt-3">
                    <div class="col-md-12 text-center">
                            <span style="color: red;font-size: 16px;">
                                @if(isset($message))
                                    {{ $message }}
                                @else
                                    Hiện tại không có dữ liệu nào phù hợp với yêu cầu của bạn! Hệ thống cập nhật nick thường xuyên bạn vui lòng theo dõi web trong thời gian tới !
                                @endif
                            </span>
                    </div>
                </div>
            </div>
        </div>
    @else
    @if(isset($data->params) && isset($data->params->article_type))
        {!! $data->params->article_type !!}
    @endif
    <div class="news">
        <div class="news_breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 trangchu-auto col-md-12">
                        <ul class="news_breadcrumbs_theme news_breadcrumbs_theme__show">
                            <li><a href="/" class="news_breadcrumbs_theme_trangchu news_breadcrumbs_theme_trangchu_a">Trang chủ</a></li>
                            <li>/</li>
                            <li>
                                @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                                <a href="{{ setting('sys_zip_shop') }}" class="news_breadcrumbs_theme_tintuc_a"><p class="news_breadcrumbs_theme_tintuc">Tin tức</p></a>
                                @else
                                    <a href="/tin-tuc" class="news_breadcrumbs_theme_tintuc_a"><p class="news_breadcrumbs_theme_tintuc">Tin tức</p></a>
                                @endif
                            </li>
                            <li>/</li>
                            <li class="news_breadcrumbs_theme__li"><a href="javascript:void(0)" class="news_breadcrumbs_theme_title_a"><p class="news_breadcrumbs_theme_title">{{ $data->title }}</p></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="news_content">
            <div class="container">
                <div class="row news_content_in">
                    <div class="col-md-9 col-sm-12">
                        <div class="col-md-12 pl-0 pr-0">
                            <h1 class="news_content_p">{{ $data->title }}</h1>
                            <div class="news_content_line"></div>
                        </div>
                        <div class="news_detail">
                            <div class="news_detail_content fix-image-acount">
                                {!! $data->content !!}
                            </div>
                        </div>
                    </div>
                    @include('frontend.pages.article.widget.__danh__muc')
                </div>
            </div>
        </div>
        @include('frontend.widget.__bai__viet__lien__quan')
    </div>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/article/article-detail.js?v={{time()}}"></script>
    @endif
    @include('frontend.widget.__theme')

@endsection

