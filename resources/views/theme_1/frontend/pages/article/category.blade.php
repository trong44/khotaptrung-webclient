@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head')
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
            <div class="news">
                <div class="news_breadcrumbs">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="news_breadcrumbs_theme">
                                    <li><a href="/" class="news_breadcrumbs_theme_trangchu news_breadcrumbs_theme_trangchu_a">Trang chủ</a></li>
                                    <li>/</li>
                                    <li><a href="/tin-tuc" class="news_breadcrumbs_theme_tintuc_a"><h3 class="news_breadcrumbs_theme_tintuc">Tin tức</h3></a></li>
                                    <li>/</li>
                                    <li><a href="/tin-tuc/{{ $title->slug }}" class="news_breadcrumbs_theme_title_a"><h1 class="news_breadcrumbs_theme_title">{{ $title->title }}</h1></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="booking_detail"></div>
                <div class="news_content">
                    <div class="container">
                        <div class="row news_content_in">
                            <div class="col-md-9 col-sm-12">
                                <form>
                                    <div class="row">

                                        <div class="col-md-4" style="margin-bottom: 15px">
                                            <input type="text" class="form-control input-news" placeholder="Nhập từ khoá...">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="submit" class="btn btn-news" value="Tìm kiếm">
                                            <a href="/tin-tuc" class="btn btn-danger">Tất Cả</a>
                                        </div>

                                    </div>
                                </form>
                                <div class="article_data">
                                    @include('frontend.pages.article.widget.__datalist')
                                </div>
                            </div>
                            @include('frontend.widget.__menu__category__article')
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="hidden_page" class="hidden_page" value="1" />
            <input type="hidden" name="slug" class="slug-article" value="{{ $slug }}" />

            <script src="/assets/frontend/{{theme('')->theme_key}}/js/article/articlecategory.js"></script>
        @endif
@endsection


