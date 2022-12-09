@extends('frontend.layouts.master')

@section('content')
    <div class="container c-container-side">
        <ul class="breadcrumb-list">
            <li class="breadcrumb-item">
                <a href="/" class="breadcrumb-link">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                <a href="/thong-tin" class="breadcrumb-link">Thông tin tài khoản</a>
            </li>
        </ul>

        <div class="row">
            <div class="g-history-left">
                @include('frontend.widget.__menu_profile')
            </div>
        </div>


    </div>

@endsection
