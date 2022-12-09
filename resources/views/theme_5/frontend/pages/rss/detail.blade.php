@extends('frontend.layouts.master')



@section('content')

    <div class="container container-fix">
        <div class="card c-mt-20">
            <div class="card-header">
                <h2 class="card-title">
                    RSS
                </h2>
                <div class="t-title-3">Khái niệm RSS</div>
                <p>RSS ( viết tắt từ Really Simple Syndication ) là một tiêu chuẩn định dạng tài liệu dựa trên XML nhằm giúp người sử dụng dễ dàng cập nhật và tra cứu thông tin một cách nhanh chóng và thuận tiện nhất bằng cách tóm lược thông tin vào trong một đoạn dữ liệu ngắn gọn, hợp chuẩn.</p>
                <p>Dữ liệu này được các chương trình đọc tin chuyên biệt ( gọi là News reader) phân tích và hiển thị trên máy tính của người sử dụng. Trên trình đọc tin này, người sử dụng có thể thấy những tin chính mới nhất, tiêu đề, tóm tắt và cả đường link để xem toàn bộ tin.</p>
                <div class="t-title-3">Kênh do {{\Request::server ("HTTP_HOST")}} cung cấp</div>
                <div class="menu-category c-mt-16">
                    <div class="container c-container">
                        <ul class="d-flex justify-content-between px-0">
                            <li class="w-100 c-px-4">
                                <a href="/rss-nick">
                                    <div class="c-p-8 brs-8 d-flex justify-content-center">
                                        <img onerror="imgError(this)" src="/assets/frontend/{{theme('')->theme_key}}/icons/dichvugame.svg" class="c-pr-4" style="width: 24px;">
                                        <span class="fw-500 fz-15 lh-24 ">Mua acc</span>
                                    </div>
                                </a>
                            </li>
                            <li class="w-100 c-px-4">
                                <a href="/rss-service">
                                    <div class="c-p-8 brs-8 d-flex justify-content-center">
                                        <img onerror="imgError(this)" src="/assets/frontend/{{theme('')->theme_key}}/icons/dichvugame.svg" class="c-pr-4" style="width: 24px;">
                                        <span class="fw-500 fz-15 lh-24 ">Dịch vụ</span>
                                    </div>
                                </a>
                            </li>
                            <li class="w-100 c-px-4">
                                <a href="/rss-article">
                                    <div class="c-p-8 brs-8 d-flex justify-content-center">
                                        <img onerror="imgError(this)" src="/assets/frontend/{{theme('')->theme_key}}/icons/dichvugame.svg" class="c-pr-4" style="width: 24px;">
                                        <span class="fw-500 fz-15 lh-24 ">Tin tức</span>
                                    </div>
                                </a>
                            </li>
                            <li class="w-100 c-px-4">
                                <a href="/rss-minigame">
                                    <div class="c-p-8 brs-8 d-flex justify-content-center">
                                        <img onerror="imgError(this)" src="/assets/frontend/{{theme('')->theme_key}}/icons/dichvugame.svg" class="c-pr-4" style="width: 24px;">
                                        <span class="fw-500 fz-15 lh-24 ">Minigame</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection