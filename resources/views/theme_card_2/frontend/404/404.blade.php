{{--@extends('errors::minimal')--}}

{{--@section('title', __('Not Found'))--}}
@extends('.theme_1.frontend.layouts.master')

@section('content')
    <section>
        <div class="row marginauto justify-content-center">
            <div class="col-auto center" style="padding-top: 176px;padding-bottom: 215px;">
                <img src="/assets/frontend/theme_1/images/dog.png" alt="">
                <br>
                <br>
                <span>Trang không tồn tại. Vui lòng thử lại sau</span>
                <br>
                <br>
                <a class="loginBox__layma__button loginBox__layma__button404" href="/"><span>Về trang chủ</span></a>
            </div>
        </div>
    </section>
@endsection
{{--@section('code', '404')--}}
{{--@section('message', __('Not Found'))--}}
