@extends('frontend.layouts.master')



@section('content')

    <div class="container container-fix">
        <div class="block-product mt-fix-20 d-g-md-none">
            <h2 class="title-page">RSS</h2>
            <strong class="sub-title-page">Khái niệm RSS</strong>
            <p>RSS ( viết tắt từ Really Simple Syndication ) là một tiêu chuẩn định dạng tài liệu dựa trên XML nhằm giúp người sử dụng dễ dàng cập nhật và tra cứu thông tin một cách nhanh chóng và thuận tiện nhất bằng cách tóm lược thông tin vào trong một đoạn dữ liệu ngắn gọn, hợp chuẩn.</p>
            <p>Dữ liệu này được các chương trình đọc tin chuyên biệt ( gọi là News reader) phân tích và hiển thị trên máy tính của người sử dụng. Trên trình đọc tin này, người sử dụng có thể thấy những tin chính mới nhất, tiêu đề, tóm tắt và cả đường link để xem toàn bộ tin.</p>
            <strong class="sub-title-page">Kênh do {{\Request::server ("HTTP_HOST")}} cung cấp</strong>
            <div class="menu-category mt-fix-12">
                <div class="container container-fix">
                    <ul>
                        <li>
                            <a class="" href="/rss-nick">
                                <img onerror="imgError(this)" src="/assets/frontend/{{theme('')->theme_key}}/icons/dichvugame.svg" alt="">

                                <span id="nav-charge">Mua acc</span>
                            </a>
                        </li>
                        <li>
                            <a class="" href="/rss-service">
                                <img onerror="imgError(this)" src="/assets/frontend/{{theme('')->theme_key}}/icons/muaaccgame.svg" alt="">

                                <span id="nav-charge">Dịch vụ</span>
                            </a>
                        </li>
                        <li>
                            <a class="" href="/rss-article">
                                <img onerror="imgError(this)" src="/assets/frontend/{{theme('')->theme_key}}/icons/tintuc.svg" alt="">

                                <span id="nav-charge">Tin tức</span>
                            </a>
                        </li>
                        <li>
                            <a class="" href="/rss-minigame">
                                <img onerror="imgError(this)" src="/assets/frontend/{{theme('')->theme_key}}/icons/vongquay.svg" alt="">

                                <span id="nav-charge">Minigame</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>


    </div>
@endsection
