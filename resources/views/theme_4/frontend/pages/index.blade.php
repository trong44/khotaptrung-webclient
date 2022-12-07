@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head')
@endsection
@section('content')

<section>
    <div class="container">

        @include('frontend.widget.__slider__banner')

        <div class="main-content" style="margin-top: 24px">

            @if(setting('sys_theme_ver_page_build') )

                @php
                    $dat = explode(',',setting('sys_theme_ver_page_build'));
                    $data_title = null;
                    $data_widget = null;
                    foreach($dat as $key => $it){
                        if ($key == 0){
                            $data_title = explode('|',$it);
                        }else{
                            $data_widget = explode('|',$it);
                        }
                    }
                @endphp
                @if(isset($data_widget))
                    @foreach($data_widget as $key => $value)
                        @include('frontend.widget.'.$value.'',with(['title'=>$data_title[$key]]))
                    @endforeach
                @endif
            @else

                @include('frontend.widget.__content__home__game')

                @include('frontend.widget.__content__home__dichvu')

                @include('frontend.widget.__content__home__minigame')

            @endif
{{--            @include('frontend.widget.__content__home__dichvu')--}}

{{--            @include('frontend.widget.__content__home__game')--}}

{{--            @include('frontend.widget.__content__home__minigame')--}}
            @if(setting('sys_intro_text') != '')
            <div class="article-content content_post ">
                <div class="special-text">
                    {!! setting('sys_intro_text') !!}
                </div>
                <button  class="expand-button">
                    Xem thêm nội dung
                </button>
            </div>
            @endif
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
@include('frontend.widget.__bonus')
@endsection
