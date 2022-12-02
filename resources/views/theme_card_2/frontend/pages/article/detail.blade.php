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
    <div id="blog" class="blog-custom" style="margin-top: 15px;">
        <div class="container">
            <div class="title-content">
                <div class="title-blog">
                    <div class="row">
                        <div class="col-xl-6">
                            <h3>Bài Viết</h3>
                        </div>

                    </div>
                </div>
            </div>
            <div id="blog-content" class="pt-3 pb-5">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                        <h1>{{ $data->title }}</h1>
                        <p class="mt-3"><i class="fa fa-calendar mr-1"></i>{{ formatDateTime($data->created_at) }}
{{--                            <span class="mx-3">|</span> Danh mục : Hướng dẫn--}}
                        </p>
                        <div class="content-blog-item article-content">
                            {!! $data->content !!}
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                        @include('frontend.widget.__baiviet__lienquan',with(['id'=>$data->id]))
                        @include('frontend.pages.article.widget.__danh__muc')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/article/article-detail.js?v={{time()}}"></script>
    @endif
@endsection
