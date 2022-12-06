@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head')
@endsection
@section('meta_robots')
    <meta name="robots" content="index,follow" />
@endsection
@section('content')

{{--mua thẻ--}}
<div id="content">

    @if(setting('sys_theme_ver_page_build'))

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

    @include('frontend.widget.__card_purchase')
    <!--popup work start here-->
        @include('frontend.widget.__slider__banner')

        @include('frontend.widget.__card_purchase')

        {{--decription mua thẻ--}}
        @include('frontend.widget.__intro__text')

        @include('frontend.widget.__list_serve_remark_image')
        {{--bài viết liên quan--}}
        @include('frontend.widget.__baiviet__trangchu')

    @endif

</div>
@include('frontend.widget.__bonus')
<script src="/assets/frontend/{{theme('')->theme_key}}/js/storecard/store_card.js?v={{time()}}"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/js/config/swiper-slider-conf.js"></script>
@endsection
