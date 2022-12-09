@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head')
@endsection
@section('meta_robots')
    <meta name="robots" content="index,follow" />
@endsection
@section('content')
    {{--    aaaaaaaaaaaa--}}
    @if($data == null)
        <div class="item_buy">

            <div class="container pt-3">
                <div class="row pb-3 pt-3">
                    <div class="col-md-12 text-center">
                        <span style="color: red;font-size: 16px;">
                            Không có bài viết nào.
                        </span>
                    </div>
                </div>

            </div>

        </div>
    @else
        <div class="scrollarticalheader"></div>
        <div class="news">
            <div class="news_breadcrumbs">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-8">
                            <ul class="news_breadcrumbs_theme">
                                <li><a href="/" class="news_breadcrumbs_theme_trangchu news_breadcrumbs_theme_trangchu_a">Trang chủ</a></li>
                                <li>/</li>
                                @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                                    <li><a href="/blog" class="news_breadcrumbs_theme_title_a"><h1 class="news_breadcrumbs_theme_title">Blog</h1></a></li>
                                @else
                                    <li><a href="/tin-tuc" class="news_breadcrumbs_theme_title_a"><h1 class="news_breadcrumbs_theme_title">Tin tức</h1></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="news_content">
                <div class="container">
                    <div class="row news_content_in">
                        <div class="col-lg-9 col-md-12 col-sm-12">
                            <form>
                                <div class="row">

                                    <div class="col-md-4" style="margin-bottom: 15px">
                                        <input type="text" class="form-control input-news" placeholder="Nhập từ khoá...">
                                    </div>
                                    <div class="col-md-5 col-12">
                                        <div class="row">
                                            <div class="col-auto pr-0">
                                                <input type="submit" class="btn btn-news" value="Tìm kiếm">
                                            </div>
                                            <div class="col-lg-5 col-md-6 col-6 pl-0">
                                                @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                                                <a href="/blog" class="btn btn-danger">Tất Cả</a>
                                                @else
                                                    <a href="/tin-tuc" class="btn btn-danger">Tất Cả</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>

                            <div class="article_data">
                                @include('frontend.pages.article.widget.__datalist')
                            </div>
                        </div>
                        @include('frontend.pages.article.widget.__danh__muc')
                    </div>
                </div>
            </div>
        </div>
{{--        <input type="hidden" name="hidden_page" class="hidden_page" value="1" />--}}
{{--        <input type="hidden" name="slug" class="slug-article" value="" />--}}

        <script src="/assets/frontend/{{theme('')->theme_key}}/js/article/article.js"></script>
    @endif

@endsection

