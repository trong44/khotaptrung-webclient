@extends('frontend.layouts.master')



@section('content')
    <div class="container">
        <div id="rss-detail">
            <h2 class="">RSS</h2>
            <strong class="">Khái niệm RSS</strong>
            <p>RSS ( viết tắt từ Really Simple Syndication ) là một tiêu chuẩn định dạng tài liệu dựa trên XML nhằm giúp người sử dụng dễ dàng cập nhật và tra cứu thông tin một cách nhanh chóng và thuận tiện nhất bằng cách tóm lược thông tin vào trong một đoạn dữ liệu ngắn gọn, hợp chuẩn.</p>
            <p>Dữ liệu này được các chương trình đọc tin chuyên biệt ( gọi là News reader) phân tích và hiển thị trên máy tính của người sử dụng. Trên trình đọc tin này, người sử dụng có thể thấy những tin chính mới nhất, tiêu đề, tóm tắt và cả đường link để xem toàn bộ tin.</p>
            <strong class="">Kênh do {{\Request::server ("HTTP_HOST")}} cung cấp</strong>
            <div class="rss-detail-list row">
                <div class="col-3">
                    <a class="" href="/rss-nick">
                        <span id="nav-charge">Mua acc</span>
                    </a>
                </div>
                <div class="col-3">
                    <a class="" href="/rss-service">
                        <span id="nav-charge">Dịch vụ</span>
                    </a>
                </div>
                <div class="col-3">
                    <a class="" href="/rss-article">
                        <span id="nav-charge">Tin tức</span>
                    </a>
                </div>
                <div class="col-3">
                    <a class="" href="/rss-minigame">
                        <span id="nav-charge">Minigame</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
