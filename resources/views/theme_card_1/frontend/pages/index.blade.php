@extends('frontend.layouts.master')

@section('content')
    <div style="width:100%;position: relative;" class="homeitem">
        <div class="item">
            <div class="index_title">
                <span><img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/ic_h1.svg" alt="mua thẻ điện thoại online"></span>
                <h1> mua thẻ online</h1>
            </div>
            @include('frontend.widget.__card_purchase')
        </div>
        <!--popup work start here-->


        <div class="clr"></div>
        @if(setting('sys_store_card_content'))
        <div class="wp_content_post_index">
            <div class="post_index">
                    <div class="content_bvct">
                        {!! setting('sys_store_card_content') !!}
                    </div>
                    <span class="xt more">Xem thêm</span>
                    <span class="xt tg" style="display: none;">Thu gọn</span>

                    <script type="text/javascript">
                        $('.more').click(function () {
                            $('.content_bvct').css('height', 'unset');
                            $('.more').hide();
                            $('.tg').show();
                        });
                        $('.tg').click(function () {
                            $('.content_bvct').css('height', '1000px');
                            $('.more').show();
                            $('.tg').hide();
                        });
                    </script>
                </div>
        </div>
        @endif
    </div>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/storecard/store_card.js?v={{time()}}"></script>

@endsection
