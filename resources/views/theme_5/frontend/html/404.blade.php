@extends('frontend.layouts.master')

@section('content')
    <section>
        <div class="container container-fix left-right">
            <div class="row marginauto justify-content-center theme-404-row" style="background: #FFFFFF">
                <div class="col-auto center">
                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/404.png" alt="">
                </div>
                <div class="col-12 text-center theme-404-title">
                    <span>Không tìm thấy trang</span>
                </div>
                <div class="col-12 text-center theme-404-content">
                    <small>Rất tiếc, trang bạn yêu cầu không được tìm thấy, </small>
                </div>
                <div class="col-12 text-center theme-404-body">
                    <small>vui lòng trở lại trang chủ. </small>
                </div>
                <div class="col-auto left-right button-404 text-center">
                    <div class="row marginauto modal-footer-success-row-ct">
                        <div class="col-md-12 left-right text-center">
                            <a href="/" class="button-bg-ct"><span>Nạp thêm</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
{{--@section('code', '404')--}}
{{--@section('message', __('Not Found'))--}}
