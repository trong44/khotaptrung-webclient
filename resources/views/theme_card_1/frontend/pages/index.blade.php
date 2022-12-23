@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head')
@endsection
@section('meta_robots')
    <meta name="robots" content="index,follow" />
@endsection
@section('content')
    <div style="width:100%;position: relative;" class="homeitem">
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

        @include('frontend.widget.__card_purchase')
        <!--popup work start here-->
            @include('frontend.widget.__content__home__dichvu')
            @include('frontend.widget.__content__home__game')
            @include('frontend.widget.__content__home__minigame')
            @include('frontend.widget.__dichvu__lienquan')
            @include('frontend.widget.__intro__text')

    @endif

    </div>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/storecard/store_card.js?v={{time()}}"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/service/showdetailservice.js?v={{time()}}"></script>

    @include('frontend.widget.__bonus')
@endsection
