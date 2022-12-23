@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head',with(['data'=>$data]))
@endsection
@section('meta_robots')
    <meta name="robots" content="index,follow" />
@endsection
@section('content')
<section>

    @if(isset($data->params) && isset($data->params->article_type))
        {!! $data->params->article_type !!}
    @endif

    <div class="container">

        @if($data == null)
            <div class="item_buy">
                <div class="container pt-3">
                    <div class="row pb-3 pt-3">
                        <div class="col-md-12 text-center">
                            <span style="color: red;font-size: 16px;">
                                @if(isset($message))
                                    {{ $message }}
                                @else
                                    Hiện tại không có dữ liệu nào phù hợp với yêu cầu của bạn! Hệ thống cập nhật thường xuyên bạn vui lòng theo dõi web trong thời gian tới !
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
        <nav aria-label="breadcrumb" style="margin-top: 10px;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>

                <li class="breadcrumb-item" aria-current="page">
                    @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                    <a href="{{ setting('sys_zip_shop') }}" title="tin-tuc">Tin tức</a>
                    @else
                        <a href="/tin-tuc" title="tin-tuc">Tin tức</a>
                    @endif
                </li>
                <li class="breadcrumb-item active">{{ $data->title }}</li>
            </ol>
        </nav>

        <div class="c-content-box c-size-md">
            <div class="row">
                <div class="col-md-9">
                    <h1 class="article-title title_custom"> {{ $data->title }}</h1>
                    <div class="article_cat_date">
                        <div style="display: inline-block;margin-right: 15px"><i class="far fa-clock" aria-hidden="true"></i> {{ formatDateTime($data->created_at) }}</div>
                        @if(isset($data->groups[0]))
                        <div style="display: inline-block">
                            <i class="far fa-newspaper" aria-hidden="true"></i>
                            @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                            <a
                                href="{{ setting('sys_zip_shop') }}/{{ $data->groups[0]->slug }}"
                                title="{{ $data->groups[0]->title }}">{{ $data->groups[0]->title }}</a>
                            @else
                                <a
                                    href="/tin-tuc/{{ $data->groups[0]->slug }}"
                                    title="{{ $data->groups[0]->title }}">{{ $data->groups[0]->title }}</a>
                            @endif
                        </div>
                        @endif
                    </div>
                    <div class="article-content">
                        {!! $data->content !!}
                    </div>
                </div>

                @include('frontend.widget.__menu__category__article')

            </div>

            <div class="row">
                <div class="col-md-12">
                    @include('frontend.widget.__dichvu__lienquan')
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    @include('frontend.widget.__tai__khoan__lien__quan')
                </div>
            </div>
        </div>
        <!-- END: BLOG LISTING  -->

        <!-- END: PAGE CONTENT -->
        <script src="/assets/frontend/{{theme('')->theme_key}}/js/article/article-detail.js?v={{time()}}"></script>
        @endif



    </div><!-- /.container -->
</section>
@endsection
