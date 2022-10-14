@extends('frontend.layouts.master')
@section('content')
{{--    slide--}}
@include('frontend.widget.__slider__banner')

{{--mua thẻ--}}
<div id="content">
    @include('frontend.widget.__card_purchase')

</div>
{{--decription mua thẻ--}}
@if(setting('sys_store_card_content'))
<div class="intro-text" style="margin:40px 0px;color:#fff">
    <div class="container">
        <!-- Begin: Testimonals 1 component -->
        <div class="c-content-client-logos-slider-1  c-bordered hidetext" data-slider="owl">
            <!-- Begin: Title 1 component -->
            {!! setting('sys_store_card_content') !!}
        </div>
        <!-- End-->
        <span style="color: #2F6A7C;font-weight:bold;font-size:15px;float:right;padding-top:20px;" class="viewmore">Xem tất cả »</span>
    </div>
</div>
@endif
{{--bài viết liên quan--}}
    @include('frontend.widget.__baiviet__trangchu')
<script src="/assets/frontend/{{theme('')->theme_key}}/js/storecard/store_card.js?v={{time()}}"></script>

@endsection
