@extends('frontend.layouts.master')

@section('seo_head')
    @include('frontend.widget.__seo_head')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@push('js')
    <script>
        $(document).ready(function(){
            $('.item-tin-tuc').addClass('active')
        });
    </script>
@endpush
@section('content')
    @php

    $url_zip = null;

    if (setting('sys_zip_shop') && setting('sys_zip_shop') != ''){
        $url_zip = setting('sys_zip_shop');
    }

    @endphp


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
        <div class="site-content-body alt first pt-0 pb-0 d-flex justify-content-between align-items-center">
            <ul class="nav nav-line">
                <li class="nav-item active">
                    <a href="{{ isset($url_zip) ? $url_zip : "/tin-tuc" }}" class="nav-link">Tin tức chung</a>
                </li>
                @include('frontend.widget.__menu__article')
            </ul>
            <div>
                <div class="input-group input-group-search">
                    <form action="{{ isset($url_zip) ? $url_zip : "/tin-tuc" }}" method="get" class="form_new  input-group input-group-search">
                        <input type="text" name="querry" value="" placeholder="Từ khóa" class="form-control btn_new">
                        <button class="btn bg-transparent text-secondary" type="submit"><i class="las la-search"></i></button>
                    </form>
                </div>
            </div>

        </div>
        <div class="site-content-body bg-white last">
            <h4 class="title-style-left mb-3">Tin tức tổng hợp</h4>
            <div class="row">
                <div class="col-lg-9 article_data">
                    @include('frontend.pages.article.widget.__datalist')
                </div>
                <div class="col-lg-3">
                    @include('frontend.widget.__menu__category__article__index')
                </div>
            </div>
        </div>
        <div class="after"></div>

        <input type="hidden" name="hidden_page" class="hidden_page" value="1" />
        <input type="hidden" name="slug" class="slug-article" value="" />

        <script src="/assets/frontend/{{theme('')->theme_key}}/js/article/article.js"></script>
    @endif


    {{--    @if(isset($category))--}}
    {{--        --}}
    {{--    @else--}}


    {{--    @endif--}}

@endsection
