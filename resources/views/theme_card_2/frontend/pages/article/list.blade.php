@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head')
@endsection
@section('meta_robots')
    <meta name="robots" content="index,follow" />
@endsection
@section('content')
    <div id="blog" class="blog-custom" style="margin-top: 15px;">
        <div class="container">
            <div class="title-content">
                <div class="title-blog">
                    <div class="row">
                        <div class="col-xl-6">
                            <h1>BÀI VIẾT</h1>
                        </div>

                    </div>
                </div>
            </div>
            <div id="blog-content" class="pt-3 pb-5">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        @include('theme_card_2.frontend.pages.article.widget.__datalist')

                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                        @include('frontend.pages.article.widget.__danh__muc')
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 left-right justify-content-end paginate__v1_index paginate__v1_mobie frontend__panigate">

                        @if(isset($data))
                            @if($data->total()>1)
                                <div class="row marinautooo paginate__history paginate__history__fix justify-content-center">
                                    <div class="col-auto paginate__category__col">
                                        <div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">
                                            {{ $data->appends(request()->query())->links('pagination::bootstrap-4') }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
