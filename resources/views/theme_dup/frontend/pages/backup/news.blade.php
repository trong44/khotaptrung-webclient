@extends('frontend.theme_1.layouts.master')
@section('content')
    {{--    aaaaaaaaaaaa--}}
    <div class="news">
        <div class="news_breadcrumbs">
            <div class="container">
                <div class="news_breadcrumbs_title"><a href="">blog tin tức</a></div>
                <ul class="news_breadcrumbs_theme">
                    <li><a href="">Trang chủ</a></li>
                    <li>/</li>
                    <li><a href=""><h1>Blog tin tức</h1></a></li>
                </ul>
            </div>
        </div>
        <div class="news_content">
            <div class="container">
                <form>
                <div class="row">

                    <div class="col-md-4" style="margin-bottom: 15px">
                        <input type="text" class="form-control input-news" placeholder="Nhập từ khoá...">
                    </div>
                    <div class="col-md-4">
                        <input type="submit" class="btn btn-news" value="Tìm kiếm">
                        <input type="submit" class="btn btn-tatca" value="Tất cả">
                    </div>

                </div>
                </form>
                <div class="row">

                    <div class="col-md-9 col-sm-12">
                        <div class="news_content_list" id="article_data">

                        </div>
                    </div>

                    <div class="col-md-3 col-xs-12">
                        <div class="news_content_category">
                            <div class="news_content_category_title">
                                <p>Danh mục</p>
                                <div class="news_content_category_line"></div>
                            </div>
                            <ul class="news_content_category_menu">
                                <li><i class="fas fa-chevron-right"></i> <a href="javascript:void(0)" class="btn-tatca">Tất cả ({{ $count }})</a></li>

                                @if(isset($datacategory) && count($datacategory) > 0)
                                    @foreach($datacategory as $val)
                                        <li><i class="fas fa-chevron-right"></i> <a href="javascript:void(0)" class="btn-slug" data-slug="{{ $val->slug }}">{{ $val->title }} ({{ $val->count_item }})</a> </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
    <input type="hidden" name="slug" id="slug-article" value="" />
    <input type="hidden" name="append" id="append-article" value="0" />
    <script src="/assets/frontend/js/article/article.js"></script>
@endsection
