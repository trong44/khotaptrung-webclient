@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head')
@endsection
@section('content')

<section>
        <div class="container">

            @include('frontend.widget.__slider__banner')
            <div class="main-content" style="margin-top: 24px">
                <div class="d-flex justify-content-between">
                    <div class="main-title">
                        <h1>Dịch vụ game</h1>
                    </div>
                    <div class="service-search d-none d-lg-block">
                        <div class="input-group p-box">
                            <input type="text" id="txtSearch" placeholder="Tìm dịch vụ" value="" class="" width="200px">
                            <span class="icon-search"><i class="fas fa-search"></i></span>
                        </div>
                    </div>
                </div>

                @include('frontend.widget.__content__home__dichvu')

                <div class="d-flex justify-content-between" style="padding-top: 24px">
                    <div class="main-title">
                        <h1>Danh mục game</h1>
                    </div>
                    <div class="service-search d-none d-lg-block">
                        <div class="input-group p-box">
                            <input type="text" id="txtSearchNick" placeholder="Tìm danh mục game" value="" class="" width="200px">
                            <span class="icon-search"><i class="fas fa-search"></i></span>
                        </div>
                    </div>
                </div>

                @include('frontend.widget.__content__home__game')

                <div class="d-flex justify-content-between" style="padding-top: 24px">
                    <div class="main-title">
                        <h1>Minigame</h1>
                    </div>
                    <div class="service-search d-none d-lg-block">
                        <div class="input-group p-box">
                            <input type="text" id="txtSearchMinigame" placeholder="Tìm minigame" value="" class="" width="200px">
                            <span class="icon-search"><i class="fas fa-search"></i></span>
                        </div>
                    </div>
                </div>

                @include('frontend.widget.__content__home__minigame')

            <div class="article-content content_post ">
                <div class="special-text">
                    {!! setting('sys_intro_text') !!}
                </div>
                <button  class="expand-button">
                    Xem thêm nội dung
                </button>

            </div>

            <style type="text/css">

                @media       only screen and (max-width: 580px) {
                    .hidetext {
                        max-height: 220px;
                        overflow: hidden;
                    }
                    .intro-text iframe{
                        width: 100%;
                        height: 220px;
                    }
                    .intro-text img {
                        height: auto !important;
                    }
                }
                @media        only screen and (min-width: 580px) {
                    .hidetext {
                        max-height: 220px;
                        overflow: hidden;
                    }
                    .intro-text iframe{
                        width: 100%;
                        height: 641px;
                    }
                }
                .showtext {
                    max-height:initial;
                }
                .viewless,.viewmore{
                    cursor: pointer;
                    color: #f1c40f;
                    padding-top: 10px;
                    font-size: 18px;
                }

                .intro-text img {
                    max-width: 90%;
                }
            </style>
        </div>
    </div><!-- /.container -->
</section>

@endsection
