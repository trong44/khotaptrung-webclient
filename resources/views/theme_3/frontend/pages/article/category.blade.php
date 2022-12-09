@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head')
@endsection
@section('meta_robots')
    <meta name="robots" content="index,follow" />
@endsection
@section('scripts')
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/js_trong/script_trong.js"></script>
@endsection
@section('content')
    <div class="container-fix container">
        {{--breadcrum--}}
        <ul class="breadcrum--list">
            <li class="breadcrum--item">
                <a href="/" class="breadcrum--link">Trang chủ</a>
            </li>
            <li class="breadcrum--item">
                <a href="#" class="breadcrum--link">Tin tức</a>
            </li>
            <li class="breadcrum--item">
                <a href="" class="breadcrum--link">{{ $title->title??'' }}</a>
            </li>
        </ul>
        {{--content--}}
        <div class="card--mobile__title">
            @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
            <a href="{{ setting('sys_zip_shop') }}" class="card--back">
                <img src="/assets/frontend/{{theme('')->theme_key}}/image/icons/back.png" alt="">
            </a>
            @else
                <a href="/tin-tuc" class="card--back">
                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/icons/back.png" alt="">
                </a>
            @endif
            <h4>Tin cộng đồng</h4>
        </div>

        {{--       Article Slider  --}}
        @include('frontend.pages.article.widget.__slider__bai__viet')
        {{--End--}}

        <div class="row" id="card--body__news">
            <div class="col-12 col-lg-8" id="list-article">
                {{-- <div class="card --custom" id="weeky-hot-games">
                    <div class="card--header">
                        <div class="card--header__title">
                            Game hot trong tuần
                        </div>
                    </div>
                    <div class="card--body">
                        <div>
                            <div class="swiper-container swiper-weekly-hot-games">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide" >
                                        <a href="javascript:void(0);">
                                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/image_52.png" alt="">
                                        </a>
                                    </div>
                                    <div class="swiper-slide" >
                                        <a href="javascript:void(0);">
                                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/image_52.png" alt="">
                                        </a>
                                    </div>
                                    <div class="swiper-slide" >
                                        <a href="javascript:void(0);">
                                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/image_52.png" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="card --custom p-3 d-none d-lg-block" id="new-article-update">
                    <div class="card--header">
                        <div class="card--header__title">
                            {{$title->title??''}}
                        </div>
                    </div>
                    <div class="card--body">
                        @if(isset($data) )
                            @foreach($data as $key=> $item)
                                @if($key >= 5)
                                    <div class="article px-3">
                                        <div class="row">
                                            <div class="col-4 col-lg-4 p-0">
                                                <div class="article--thumbnail">
                                                    @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                                                    <a href="{{ setting('sys_zip_shop') }}/{{ $item->slug }}">
                                                        <img onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="" class="article--thumbnail__image">
                                                    </a>
                                                    @else
                                                        <a href="/tin-tuc/{{ $item->slug }}">
                                                            <img onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="" class="article--thumbnail__image">
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-8 col-lg-8 article--info">
                                                <div class="article--title mb-3 mb-lg-0">
                                                    @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                                                    <a href="{{ setting('sys_zip_shop') }}/{{ $item->slug }}" class="article--title__link">
                                                        {{ $item->title }}
                                                    </a>
                                                    @else
                                                        <a href="/tin-tuc/{{ $item->slug }}" class="article--title__link">
                                                            {{ $item->title }}
                                                        </a>
                                                    @endif
                                                </div>
                                                <div class="article--description d-none d-lg-block">
                                                    {!! $item->description !!}
                                                </div>
                                                <div class="article--date">
                                                    <i class="__icon calendar mr-2"></i>
                                                    @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                                                        @if(isset($item->published_at))
                                                            {{ formatDateTime($item->published_at) }}
                                                        @else
                                                        {{ formatDateTime($item->created_at) }}
                                                        @endif
                                                    @else
                                                    {{ formatDateTime($item->created_at) }}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <div class="row pb-3 pt-3">
                                <div class="col-md-12 text-center">
                                    <span style="color: red;font-size: 16px;">Không có dữ liệu !</span>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="col-md-12 left-right justify-content-end default-paginate">
                        @if(isset($data))
                            @if($data->total()>1)
                        <div class="row marinautooo justify-content-center">
                            <div class="col-auto">
                                <div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">
                                    {{ $data->appends(request()->query())->links('pagination::bootstrap-default-4') }}
                                </div>
                            </div>
                        </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>

           @include('frontend.widget.__menu__category__article_theme_3')
        </div>
    </div>
@endsection
