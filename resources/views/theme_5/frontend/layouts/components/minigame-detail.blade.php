@extends('frontend.layouts.master')

@section('scripts')
    <script src="/assets/frontend/{{env('THEME_VERSION')}}/js/minigame/minigame.js"></script>
@endsection

@section('content')
    <div class="container">
        <section class="rotation-content c-mb-16">
            <div class="row rotation-content-section">
                <div class="col-12 col-lg-8 c-pr-8 c-px-lg-0">

                    <div class="c-px-lg-16 d-block d-lg-none  c-mb-12">
                        <div class="rotation-header-mobile d-flex justify-content-between">
                            <div class="rotation-header c-pb-8">
                                <h3 class="fw-700 fz-18 lh-24">Vòng quay giải nhiệt hè</h3>
                                <p class="fw-400 fz-13 mb-0"><span id="userCount">1235</span> người đang chơi</p>
                            </div>
                            <div class="rotation-player">
                                <button class="btn secondary">Thể lệ</button>
                            </div>
                        </div>
                    </div>

                    <div class="d-block d-lg-none c-mb-16 c-px-lg-16">
                        <div class="rotation-notify w-100 ">
                            <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/sound_mobile.svg" alt="">
                            <marquee class="rotation-marquee">
                                <div class="rotation-marquee-item">
                                    Danh sách trúng thưởng: &nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;
                                </div>
                            </marquee>
                        </div>
                    </div>

                    <div class="d-block d-lg-none c-mb-16 c-px-lg-16">
                        <div class="rotation-top-mobile brs-12 d-block d-lg-none">
                            <div class="rotation-header-sale c-py-4 c-px-12 d-flex align-items-center justify-content-between">
                                <div class="d-inline-flex align-items-center c-mr-10">
                                    <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/flash_img.png" alt="">
                                    <p class="fw-500 fz-13 lh-20 mb-0">Flash sale</p>
                                </div>
                                <div class="d-inline-flex align-items-center">
                                    <img class="c-mr-4" src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/clock.svg" alt="">
                                    <p class="fz-12 fw-400 mb-0 c-mr-8">Kết thúc trong</p>
                                    <div class="rotation-sale-time">
                                        <ul class="mb-0 p-0">
                                            <li class="d-inline-flex align-items-center justify-content-center brs-4"><span class="fw-600 fz-12" id="hourRemain">10</span></li>
                                            <li class="d-inline-flex align-items-center justify-content-center brs-4"><span class="fw-600 fz-12" id="minuteRemain">2</span></li>
                                            <li class="d-inline-flex align-items-center justify-content-center brs-4"><span class="fw-600 fz-12" id="secondRemain">4</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="rotation-sale-content brs-8 c-py-12 d-flex flex-column align-items-center">
                                <p class="d-flex align-items-center c-mb-0">
                                    <span id="rotationFirstPrice" class="fw-400 fz-12 lh-16 c-mr-8">240.00đ</span>
                                    <span id="rotationSalePrice" class="fw-700 fz-20 lh-28 c-mr-8">160.000đ</span>
                                    <span id="rotationSaleRatio" class="brs-24 fw-400 fz-12 c-py-2 c-px-8 lh-16">Giảm 66%</span>
                                </p>
                                <p class="c-mb-0 fw-400 fz-13">Rẻ vô đối, giá tốt nhất thị trường</p>
                            </div>
                        </div>
                    </div>

                    <div class="rotation-detail c-mb-16 brs-12">
                        <div class="rotation-top c-p-16 d-none d-lg-flex justify-content-between">
                            <div>
                                <div class="rotation-header d-flex align-items-center c-mb-8">
                                    <h3 class="fw-700 fz-24 lh-32 c-mr-8">Vòng quay giải nhiệt hè</h3>
                                    <p class="fw-400 fz-13 mb-0">Thể lệ <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/minigame_info.svg" alt=""></p>
                                </div>
                                <div class="rotation-player d-flex align-items-center">
                                    <img class="c-mr-4" src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/security-user1.svg" alt="">
                                    <p class="fw-400 fz-13 mb-0"><span id="userCount">1235</span> người đang chơi</p>
                                </div>
                            </div>
                            <div class="rotation-header-sale d-flex align-items-start">
                                <div class="d-inline-flex align-items-center c-mr-10">
                                    <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/flash_img.png" alt="">
                                    <p class="fw-700 fz-20 lh-28 mb-0">Flash sale</p>
                                </div>
                                <div class="d-inline-flex align-items-center">
                                    <img class="c-mr-4" src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/clock.svg" alt="">
                                    <p class="fz-13 fw-400 mb-0 c-mr-8">Kết thúc trong</p>
                                    <div class="rotation-sale-time">
                                        <ul class="mb-0 p-0">
                                            <li class="d-inline-flex align-items-center justify-content-center brs-4"><span id="hourRemain">10</span></li>
                                            <li class="d-inline-flex align-items-center justify-content-center brs-4"><span id="minuteRemain">2</span></li>
                                            <li class="d-inline-flex align-items-center justify-content-center brs-4"><span id="secondRemain">4</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="rotation c-p-16" style="background-image: url(/assets/frontend/{{env('THEME_VERSION')}}/image/phu/rotation_bg.png)">
                            <div class="rotation-notify d-none d-lg-flex w-100 c-mb-16">
                                <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/sound.svg" alt="">
                                <marquee class="rotation-marquee">
                                    <div class="rotation-marquee-item">
                                        Danh sách trúng thưởng: &nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;
                                    </div>
                                </marquee>
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="rotation-button">
                                    <img class="lazy" src="/assets/theme_3/image/images_1/rotation-button.png" alt="">
                                </div>
                                <img style="width: 70%" class="lazy" src="/assets/theme_3/image/images_1/rotation-img.png" alt="" id="rotate-play">
                            </div>
                        </div>

                        <div class="row no-gutters">
                            <div class="col-12 col-lg-6 c-p-16 c-py-lg-8">
                                <div class="rotation-points c-mb-16 c-mb-lg-0">
                                    <div class="rotation-points-title c-mb-8 d-flex align-items-center fw-600 fz-16">
                                        <img class="c-mr-4" src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/mdi_police-badge.svg" alt="">
                                        <p class="c-mr-4">Hũ điểm</p>
                                        <div class="info-rotation">
                                            <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/info.svg" alt="">
                                            <div class="rotation-tooltip c-py-8 c-px-12 brs-4">
                                                <p>Mỗi lượt quay sẽ được cộng 10 point.</p>
                                                <p>Tích luỹ đủ số point để nhận thêm lượt quay</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress-wrapper brs-24">
                                        <div class="progress-bar brs-24" style="width: 50%"></div>
                                    </div>
                                </div>
                                <div class="rotation-sale-content brs-8 c-py-8 d-none d-lg-flex justify-content-center">
                                    <p class="d-flex align-items-center c-mb-0">
                                        <span id="rotationFirstPrice" class="fw-400 fz-14 c-mr-8">240.00đ</span>
                                        <span id="rotationSalePrice" class="fw-700 fz-24 lh-32 c-mr-8">160.000đ</span>
                                        <span id="rotationSaleRatio" class="brs-24 fw-500 fz-12 c-py-2 c-px-8">Giảm 66%</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 c-p-16 c-py-lg-8">
                                <div class="rotation-inputs c-mb-24 c-mb-lg-0 row no-gutters">
                                    <div class="col-6 c-pr-6">
                                        <input class="" type="text" placeholder="Nhập mã giảm giá">
                                    </div>
                                    <div class="col-6 c-pl-6">
                                        <select class="rotation-inputs-select" name="type">
                                            <option value="1">Mua X1/10k 1 lần quay</option>
                                            <option value="1">Mua X1/10k 1 lần quay</option>
                                            <option value="1">Mua X1/10k 1 lần quay</option>
                                            <option value="1">Mua X1/10k 1 lần quay</option>
                                            <option value="1">Mua X1/10k 1 lần quay</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row no-gutters d-none d-lg-flex">
                                    <div class="col-12 col-md-6 c-pr-6">
                                        <button class="btn secondary w-100">Chơi thử</button>
                                    </div>
                                    <div class="col-12 col-md-6 c-pl-6">
                                        <button class="btn primary w-100">Quay ngay</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="service-detail-block c-px-lg-16">
                        <h6 class="d-block d-lg-none fz-15 fw-700 lh-24 c-mb-8">Chi tiết dịch vụ</h6>
                        <div class="service-detail brs-12 c-p-16 c-mb-16">
                            <h6 class="fz-15 fw-700 lh-24 c-mb-24 d-none d-lg-block">Chi tiết dịch vụ</h6>
                            <div class="service-detail-content">
                                Chơi game được xem là món ăn tinh thần không thể thiếu được đối với giới trẻ hiện nay, đặc biệt là các game online hay game mobile với nhiều hình thức khác nhau như game chiến thuật, game đối kháng, game thẻ bài, gam kiếm hiệp hay game sinh tồn. Chính vì vậy, nhu cầu nạp game là không thể thiếu và ngày càng tăng cao. Đặc biệt với các game thủ muốn đua top hay muốn có những vật phẩm giá trị trong game. Hãy cùng napgamegiare.net tìm hiểu các thông tin liên quan đến nạp game ngay sau đây nhé !

                                Nạp game là gì?
                                Nạp game hiểu một cách đơn giản là việc nạp tiền vào trong game để mua sắm các vật phẩm, các món đồ trong game hay thực hiện các nhiệm vụ, tăng cấp cho nhân vật trong game. Đây là hình thức vô cùng phổ biến đối với các game thủ. Khi người chơi dùng tiền mặt để nạp vào game thì số tiền này sẽ quy đổi thành một đơn vị, đồng tiền trong game, có thể kể đến như: sò - garena, thóc - funtap, kim cương - gosu,.... Vậy tại sao cần nạp game, nạp game sẽ được những gì ?
                            </div>
                            {{-- <div class="see-more">
                                <span id="seeMore">Xem thêm</span>
                                <span id="seeLess" style="display: none;">Rút gọn</span>
                            </div> --}}
                        </div>
                    </div>

                    <div class="d-block d-lg-none c-mb-16">
                        <div class="rotation-leaderboard c-p-lg-0">
                            <div class="leaderboard-header d-flex align-items-center c-pl-16 c-mb-16">
                                <img class="c-mr-4" src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/top-leaderboard.svg" alt="">
                                <h5 class="fw-700 fz-18 lh-20">Top quay thưởng</h5>
                            </div>
                            <div class="leaderboard-type c-mb-16 brs-8 brs-lg-0 row no-gutters">
                                <ul class="nav justify-content-between row no-gutters w-100 c-p-4 c-p-lg-0" role="tablist">
                                    <li class="nav-item col-4 p-0" role="presentation">
                                        <p class="nav-link text-center mb-0 fw-400 fz-13 brs-8 brs-lg-0 active" data-toggle="tab" href="#leaderboard_m-1" role="tab" aria-selected="true">7 ngày</p>
                                    </li>
                                    <li class="nav-item col-4 p-0" role="presentation">
                                        <p class="nav-link text-center mb-0 fw-400 fz-13 brs-8 brs-lg-0" data-toggle="tab" href="#leaderboard_m-2" role="tab" aria-selected="false">30 ngày</p>
                                    </li>
                                    <li class="nav-item col-4 p-0" role="presentation">
                                        <p class="nav-link text-center mb-0 fw-400 fz-13 brs-8 brs-lg-0" data-toggle="tab" href="#leaderboard_m-3" role="tab" aria-selected="false">60 ngày</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="leaderboard-table">
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="leaderboard_m-1" role="tabpanel">
                                        <div class="leaderboard-content c-px-16">
                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">1</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class="brs-100 w-100 c-pr-12" src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/user_avatar.png" alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Hoàng Phi Hồng</p>
                                                    <span class="fw-400 fz-12">1000 lượt</span>
                                                </div>
                                            </div>
                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">1</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class="brs-100 w-100 c-pr-12" src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/user_avatar.png" alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Hoàng Phi Hồng</p>
                                                    <span class="fw-400 fz-12">1000 lượt</span>
                                                </div>
                                            </div>
                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">1</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class="brs-100 w-100 c-pr-12" src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/user_avatar.png" alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Hoàng Phi Hồng</p>
                                                    <span class="fw-400 fz-12">1000 lượt</span>
                                                </div>
                                            </div>
                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">1</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class="brs-100 w-100 c-pr-12" src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/user_avatar.png" alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Hoàng Phi Hồng</p>
                                                    <span class="fw-400 fz-12">1000 lượt</span>
                                                </div>
                                            </div>
                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">5</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class="brs-100 w-100 c-pr-12" src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/user_avatar.png" alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Hoàng Phi Hồng</p>
                                                    <span class="fw-400 fz-12">1000 lượt</span>
                                                </div>
                                            </div>
                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">6</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class="brs-100 w-100 c-pr-12" src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/user_avatar.png" alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Hoàng Phi Hồng</p>
                                                    <span class="fw-400 fz-12">1000 lượt</span>
                                                </div>
                                            </div>
                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">7</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class="brs-100 w-100 c-pr-12" src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/user_avatar.png" alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Hoàng Phi Hồng</p>
                                                    <span class="fw-400 fz-12">1000 lượt</span>
                                                </div>
                                            </div>
                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">8</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class="brs-100 w-100 c-pr-12" src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/user_avatar.png" alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Hoàng Phi Hồng</p>
                                                    <span class="fw-400 fz-12">1000 lượt</span>
                                                </div>
                                            </div>
                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">9</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class="brs-100 w-100 c-pr-12" src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/user_avatar.png" alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Hoàng Phi Hồng</p>
                                                    <span class="fw-400 fz-12">1000 lượt</span>
                                                </div>
                                            </div>
                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">10</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class="brs-100 w-100 c-pr-12" src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/user_avatar.png" alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Hoàng Phi Hồng</p>
                                                    <span class="fw-400 fz-12">1000 lượt</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="leaderboard_m-2" role="tabpanel">
                                        <div class="leaderboard-content">
                                            <div class="leaderboard-item row no-gutters">
                                                <div class="col-4 leaderboard-item-name">
                                                    <span>1</span>
                                                    <p>Tiến Phú</p>
                                                </div>
                                                <div class="col-4 leaderboard-item-ar">
                                                    {{--                                                    +100.000 kim cương--}}
                                                </div>
                                                <div class="col-4 leaderboard-item-ar">
                                                    1000 lượt
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="leaderboard_m-3" role="tabpanel">
                                        <div class="leaderboard-content" >
                                            <div class="leaderboard-item row no-gutters">
                                                <div class="col-12 leaderboard-item-name text-center justify-content-center">
                                                    Không có dữ liệu
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="leaderboard-seemore">
                                <p>Xem thêm</p>
                            </div>
                            <div class="leaderboard-buttons c-px-16 c-py-8 row no-gutters" style="border-bottom: none;">
                                <div class="col-6 c-pr-5">
                                    <a href="#" class="btn secondary w-100">
                                        Lịch sử quay
                                    </a>
                                </div>
                                <div class="col-6 c-pl-5">
                                    <button class="btn primary w-100">Rút quà</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="rotation-comment-block c-px-lg-16">
                        <h6 class="d-block d-lg-none fw-700 fz-18 lh-24 c-py-16">Bình luận</h6>
                        <div class="rotation-comment chat-history brs-12 c-p-16">
                            <h6 class="fw-700 fz-20 lh-28 c-mb-20  d-none d-lg-block">Bình luận</h6>
                            <ul class="comment-block list-unstyled chat-scroll c-pr-8">
                                <li>
                                    <div class="comment-item d-flex align-items-start c-mb-16">
                                        <div class="comment-avatar c-mr-8">
                                            <img class="brs-100" src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/user_avatar.png" alt="">
                                        </div>
                                        <div class="comment-detail">
                                            <div class="comment-info c-mb-4">
                                                <h6 class="d-inline-block">Khách</h6>
                                                <span class="c-ml-8 fw-400 fz-12">4:30 PM, Vừa xong</span>
                                            </div>
                                            <div class="comment-content fw-400 fz-13">
                                                Cứ tưởng lừa đảo, nạp thử 200k nhận luôn kim cương trong 10s
                                            </div>
                                            <div class="comment-interact c-mt-12">
                                                <span id="likeComment" class="d-inline-flex align-items-center fw-400 fz-12 c-mr-40"><img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/hearts-suit_1.svg" alt=""> Thích</span>
                                                <span id="replyComment" class="d-inline-flex align-items-center fw-400 fz-12"><img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/comment_1.svg" alt=""> Trả lời</span>
                                            </div>
                                        </div>
                                    </div>

                                </li>

                                <li>
                                    <div class="comment-item d-flex align-items-start c-mb-16">
                                        <div class="comment-avatar c-mr-8">
                                            <img class="brs-100" src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/user_avatar.png" alt="">
                                        </div>
                                        <div class="comment-detail">
                                            <div class="comment-info c-mb-4">
                                                <h6 class="d-inline-block">Khách</h6>
                                                <span class="c-ml-8 fw-400 fz-12">4:30 PM, Vừa xong</span>
                                            </div>
                                            <div class="comment-content fw-400 fz-13">
                                                Cứ tưởng lừa đảo, nạp thử 200k nhận luôn kim cương trong 10s
                                            </div>
                                            <div class="comment-interact c-mt-12">
                                                <span id="likeComment" class="d-inline-flex align-items-center fw-400 fz-12 c-mr-40"><img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/hearts-suit_1.svg" alt=""> Thích</span>
                                                <span id="replyComment" class="d-inline-flex align-items-center fw-400 fz-12"><img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/comment_1.svg" alt=""> Trả lời</span>
                                            </div>
                                        </div>
                                    </div>

                                </li>
                                <li>
                                    <div class="comment-item d-flex align-items-start c-mb-16">
                                        <div class="comment-avatar c-mr-8">
                                            <img class="brs-100" src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/user_avatar.png" alt="">
                                        </div>
                                        <div class="comment-detail">
                                            <div class="comment-info c-mb-4">
                                                <h6 class="d-inline-block">Khách</h6>
                                                <span class="c-ml-8 fw-400 fz-12">4:30 PM, Vừa xong</span>
                                            </div>
                                            <div class="comment-content fw-400 fz-13">
                                                Cứ tưởng lừa đảo, nạp thử 200k nhận luôn kim cương trong 10s
                                            </div>
                                            <div class="comment-interact c-mt-12">
                                                <span id="likeComment" class="d-inline-flex align-items-center fw-400 fz-12 c-mr-40"><img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/hearts-suit_1.svg" alt=""> Thích</span>
                                                <span id="replyComment" class="d-inline-flex align-items-center fw-400 fz-12"><img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/comment_1.svg" alt=""> Trả lời</span>
                                            </div>
                                        </div>
                                    </div>

                                </li>
                                <li>
                                    <div class="comment-item d-flex align-items-start c-mb-16">
                                        <div class="comment-avatar c-mr-8">
                                            <img class="brs-100" src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/user_avatar.png" alt="">
                                        </div>
                                        <div class="comment-detail">
                                            <div class="comment-info c-mb-4">
                                                <h6 class="d-inline-block">Khách</h6>
                                                <span class="c-ml-8 fw-400 fz-12">4:30 PM, Vừa xong</span>
                                            </div>
                                            <div class="comment-content fw-400 fz-13">
                                                Cứ tưởng lừa đảo, nạp thử 200k nhận luôn kim cương trong 10s
                                            </div>
                                            <div class="comment-interact c-mt-12">
                                                <span id="likeComment" class="d-inline-flex align-items-center fw-400 fz-12 c-mr-40"><img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/hearts-suit_1.svg" alt=""> Thích</span>
                                                <span id="replyComment" class="d-inline-flex align-items-center fw-400 fz-12"><img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/comment_1.svg" alt=""> Trả lời</span>
                                            </div>
                                        </div>
                                    </div>

                                </li>
                                <li>
                                    <div class="comment-item d-flex align-items-start c-mb-16">
                                        <div class="comment-avatar c-mr-8">
                                            <img class="brs-100" src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/user_avatar.png" alt="">
                                        </div>
                                        <div class="comment-detail">
                                            <div class="comment-info c-mb-4">
                                                <h6 class="d-inline-block">Khách</h6>
                                                <span class="c-ml-8 fw-400 fz-12">4:30 PM, Vừa xong</span>
                                            </div>
                                            <div class="comment-content fw-400 fz-13">
                                                Cứ tưởng lừa đảo, nạp thử 200k nhận luôn kim cương trong 10s
                                            </div>
                                            <div class="comment-interact c-mt-12">
                                                <span id="likeComment" class="d-inline-flex align-items-center fw-400 fz-12 c-mr-40"><img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/hearts-suit_1.svg" alt=""> Thích</span>
                                                <span id="replyComment" class="d-inline-flex align-items-center fw-400 fz-12"><img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/comment_1.svg" alt=""> Trả lời</span>
                                            </div>
                                        </div>
                                    </div>

                                </li>
                                <li>
                                    <div class="comment-item d-flex align-items-start c-mb-16">
                                        <div class="comment-avatar c-mr-8">
                                            <img class="brs-100" src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/user_avatar.png" alt="">
                                        </div>
                                        <div class="comment-detail">
                                            <div class="comment-info c-mb-4">
                                                <h6 class="d-inline-block">Khách</h6>
                                                <span class="c-ml-8 fw-400 fz-12">4:30 PM, Vừa xong</span>
                                            </div>
                                            <div class="comment-content fw-400 fz-13">
                                                Cứ tưởng lừa đảo, nạp thử 200k nhận luôn kim cương trong 10s
                                            </div>
                                            <div class="comment-interact c-mt-12">
                                                <span id="likeComment" class="d-inline-flex align-items-center fw-400 fz-12 c-mr-40"><img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/hearts-suit_1.svg" alt=""> Thích</span>
                                                <span id="replyComment" class="d-inline-flex align-items-center fw-400 fz-12"><img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/comment_1.svg" alt=""> Trả lời</span>
                                            </div>
                                        </div>
                                    </div>

                                </li>
                                <li>
                                    <div class="comment-item d-flex align-items-start c-mb-16">
                                        <div class="comment-avatar c-mr-8">
                                            <img class="brs-100" src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/user_avatar.png" alt="">
                                        </div>
                                        <div class="comment-detail">
                                            <div class="comment-info c-mb-4">
                                                <h6 class="d-inline-block">Khách</h6>
                                                <span class="c-ml-8 fw-400 fz-12">4:30 PM, Vừa xong</span>
                                            </div>
                                            <div class="comment-content fw-400 fz-13">
                                                Cứ tưởng lừa đảo, nạp thử 200k nhận luôn kim cương trong 10s
                                            </div>
                                            <div class="comment-interact c-mt-12">
                                                <span id="likeComment" class="d-inline-flex align-items-center fw-400 fz-12 c-mr-40"><img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/hearts-suit_1.svg" alt=""> Thích</span>
                                                <span id="replyComment" class="d-inline-flex align-items-center fw-400 fz-12"><img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/comment_1.svg" alt=""> Trả lời</span>
                                            </div>
                                        </div>
                                    </div>

                                </li>
                                <li>
                                    <div class="comment-item d-flex align-items-start c-mb-16">
                                        <div class="comment-avatar c-mr-8">
                                            <img class="brs-100" src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/user_avatar.png" alt="">
                                        </div>
                                        <div class="comment-detail">
                                            <div class="comment-info c-mb-4">
                                                <h6 class="d-inline-block">Khách</h6>
                                                <span class="c-ml-8 fw-400 fz-12">4:30 PM, Vừa xong</span>
                                            </div>
                                            <div class="comment-content fw-400 fz-13">
                                                Cứ tưởng lừa đảo, nạp thử 200k nhận luôn kim cương trong 10s
                                            </div>
                                            <div class="comment-interact c-mt-12">
                                                <span id="likeComment" class="d-inline-flex align-items-center fw-400 fz-12 c-mr-40"><img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/hearts-suit_1.svg" alt=""> Thích</span>
                                                <span id="replyComment" class="d-inline-flex align-items-center fw-400 fz-12"><img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/comment_1.svg" alt=""> Trả lời</span>
                                            </div>
                                        </div>
                                    </div>

                                </li>
                                <li>
                                    <div class="comment-item d-flex align-items-start c-mb-16">
                                        <div class="comment-avatar c-mr-8">
                                            <img class="brs-100" src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/user_avatar.png" alt="">
                                        </div>
                                        <div class="comment-detail">
                                            <div class="comment-info c-mb-4">
                                                <h6 class="d-inline-block">Khách</h6>
                                                <span class="c-ml-8 fw-400 fz-12">4:30 PM, Vừa xong</span>
                                            </div>
                                            <div class="comment-content fw-400 fz-13">
                                                Cứ tưởng lừa đảo, nạp thử 200k nhận luôn kim cương trong 10s
                                            </div>
                                            <div class="comment-interact c-mt-12">
                                                <span id="likeComment" class="d-inline-flex align-items-center fw-400 fz-12 c-mr-40"><img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/hearts-suit_1.svg" alt=""> Thích</span>
                                                <span id="replyComment" class="d-inline-flex align-items-center fw-400 fz-12"><img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/comment_1.svg" alt=""> Trả lời</span>
                                            </div>
                                        </div>
                                    </div>

                                </li>
                                <li>
                                    <div class="comment-item d-flex align-items-start c-mb-16">
                                        <div class="comment-avatar c-mr-8">
                                            <img class="brs-100" src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/user_avatar.png" alt="">
                                        </div>
                                        <div class="comment-detail">
                                            <div class="comment-info c-mb-4">
                                                <h6 class="d-inline-block">Khách</h6>
                                                <span class="c-ml-8 fw-400 fz-12">4:30 PM, Vừa xong</span>
                                            </div>
                                            <div class="comment-content fw-400 fz-13">
                                                Cứ tưởng lừa đảo, nạp thử 200k nhận luôn kim cương trong 10s
                                            </div>
                                            <div class="comment-interact c-mt-12">
                                                <span id="likeComment" class="d-inline-flex align-items-center fw-400 fz-12 c-mr-40"><img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/hearts-suit_1.svg" alt=""> Thích</span>
                                                <span id="replyComment" class="d-inline-flex align-items-center fw-400 fz-12"><img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/comment_1.svg" alt=""> Trả lời</span>
                                            </div>
                                        </div>
                                    </div>

                                </li>
                                <li>
                                    <div class="comment-item d-flex align-items-start c-mb-16">
                                        <div class="comment-avatar c-mr-8">
                                            <img class="brs-100" src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/user_avatar.png" alt="">
                                        </div>
                                        <div class="comment-detail">
                                            <div class="comment-info c-mb-4">
                                                <h6 class="d-inline-block">Khách</h6>
                                                <span class="c-ml-8 fw-400 fz-12">4:30 PM, Vừa xong</span>
                                            </div>
                                            <div class="comment-content fw-400 fz-13">
                                                Cứ tưởng lừa đảo, nạp thử 200k nhận luôn kim cương trong 10s
                                            </div>
                                            <div class="comment-interact c-mt-12">
                                                <span id="likeComment" class="d-inline-flex align-items-center fw-400 fz-12 c-mr-40"><img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/hearts-suit_1.svg" alt=""> Thích</span>
                                                <span id="replyComment" class="d-inline-flex align-items-center fw-400 fz-12"><img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/comment_1.svg" alt=""> Trả lời</span>
                                            </div>
                                        </div>
                                    </div>

                                </li>
                                <li>
                                    <div class="comment-item d-flex align-items-start c-mb-16">
                                        <div class="comment-avatar c-mr-8">
                                            <img class="brs-100" src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/user_avatar.png" alt="">
                                        </div>
                                        <div class="comment-detail">
                                            <div class="comment-info c-mb-4">
                                                <h6 class="d-inline-block">Khách</h6>
                                                <span class="c-ml-8 fw-400 fz-12">4:30 PM, Vừa xong</span>
                                            </div>
                                            <div class="comment-content fw-400 fz-13">
                                                Cứ tưởng lừa đảo, nạp thử 200k nhận luôn kim cương trong 10s
                                            </div>
                                            <div class="comment-interact c-mt-12">
                                                <span id="likeComment" class="d-inline-flex align-items-center fw-400 fz-12 c-mr-40"><img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/hearts-suit_1.svg" alt=""> Thích</span>
                                                <span id="replyComment" class="d-inline-flex align-items-center fw-400 fz-12"><img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/comment_1.svg" alt=""> Trả lời</span>
                                            </div>
                                        </div>
                                    </div>

                                </li>
                                <li>
                                    <div class="comment-item d-flex align-items-start c-mb-16">
                                        <div class="comment-avatar c-mr-8">
                                            <img class="brs-100" src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/user_avatar.png" alt="">
                                        </div>
                                        <div class="comment-detail">
                                            <div class="comment-info c-mb-4">
                                                <h6 class="d-inline-block">Khách</h6>
                                                <span class="c-ml-8 fw-400 fz-12">4:30 PM, Vừa xong</span>
                                            </div>
                                            <div class="comment-content fw-400 fz-13">
                                                Cứ tưởng lừa đảo, nạp thử 200k nhận luôn kim cương trong 10s
                                            </div>
                                            <div class="comment-interact c-mt-12">
                                                <span id="likeComment" class="d-inline-flex align-items-center fw-400 fz-12 c-mr-40"><img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/hearts-suit_1.svg" alt=""> Thích</span>
                                                <span id="replyComment" class="d-inline-flex align-items-center fw-400 fz-12"><img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/comment_1.svg" alt=""> Trả lời</span>
                                            </div>
                                        </div>
                                    </div>

                                </li>
                                <li>
                                    <div class="comment-item d-flex align-items-start c-mb-16">
                                        <div class="comment-avatar c-mr-8">
                                            <img class="brs-100" src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/user_avatar.png" alt="">
                                        </div>
                                        <div class="comment-detail">
                                            <div class="comment-info c-mb-4">
                                                <h6 class="d-inline-block">Khách</h6>
                                                <span class="c-ml-8 fw-400 fz-12">4:30 PM, Vừa xong</span>
                                            </div>
                                            <div class="comment-content fw-400 fz-13">
                                                Cứ tưởng lừa đảo, nạp thử 200k nhận luôn kim cương trong 10s
                                            </div>
                                            <div class="comment-interact c-mt-12">
                                                <span id="likeComment" class="d-inline-flex align-items-center fw-400 fz-12 c-mr-40"><img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/hearts-suit_1.svg" alt=""> Thích</span>
                                                <span id="replyComment" class="d-inline-flex align-items-center fw-400 fz-12"><img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/comment_1.svg" alt=""> Trả lời</span>
                                            </div>
                                        </div>
                                    </div>

                                </li>
                            </ul>

                            <div class="commment-input d-flex align-items-center c-mb-20">
                                <div class="comment-user-avatar c-mr-8 d-none d-lg-block">
                                    <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/user_avatar.png" alt="">
                                </div>
                                <input name="message-to-send" type="text" class="input-primary" id="message-to-send">
                            </div>
                            <div class="comment-button">
                                <button type="button" class="btn primary btn-send-message pill-button">Bình luận</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4 c-pl-8 d-none d-lg-block">
                    <div class="rotation-leaderboard c-py-24 c-px-16 brs-12">
                        <div class="leaderboard-buttons c-pb-24 c-mb-16 row no-gutters">
                            <div class="col-6 c-pr-5">
                                <a href="#" class="btn secondary w-100">
                                    Lịch sử quay
                                </a>
                            </div>
                            <div class="col-6 c-pl-5">
                                <button class="btn primary w-100">Rút quà</button>
                            </div>
                        </div>
                        <div class="leaderboard-header d-flex align-items-center c-mb-16">
                            <img class="c-mr-4" src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/top-leaderboard.svg" alt="">
                            <h5 class="fw-700 fz-20 lh-28">Top quay thưởng</h5>
                        </div>
                        <div class="leaderboard-type c-mb-16 brs-8 row no-gutters">
                            <ul class="nav justify-content-between row no-gutters w-100 c-p-4" role="tablist">
                                <li class="nav-item col-4 p-0" role="presentation">
                                    <p class="nav-link text-center mb-0 fw-400 fz-13 brs-8 active" data-toggle="tab" href="#leaderboard-1" role="tab" aria-selected="true">7 ngày</p>
                                </li>
                                <li class="nav-item col-4 p-0" role="presentation">
                                    <p class="nav-link text-center mb-0 fw-400 fz-13 brs-8" data-toggle="tab" href="#leaderboard-2" role="tab" aria-selected="false">30 ngày</p>
                                </li>
                                <li class="nav-item col-4 p-0" role="presentation">
                                    <p class="nav-link text-center mb-0 fw-400 fz-13 brs-8" data-toggle="tab" href="#leaderboard-3" role="tab" aria-selected="false">60 ngày</p>
                                </li>
                            </ul>
                        </div>
                        <div class="leaderboard-table">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="leaderboard-1" role="tabpanel">
                                    <div class="leaderboard-content" >
                                        <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                            <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">1</div>
                                            <div class="leaderboard-item-avt brs-100">
                                                <img class="brs-100 w-100 c-pr-12" src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/user_avatar.png" alt="">
                                            </div>
                                            <div class="leaderboard-item-content">
                                                <p class="fw-500 fz-13 c-mb-0">Hoàng Phi Hồng</p>
                                                <span class="fw-400 fz-12">1000 lượt</span>
                                            </div>
                                        </div>
                                        <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                            <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">1</div>
                                            <div class="leaderboard-item-avt brs-100">
                                                <img class="brs-100 w-100 c-pr-12" src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/user_avatar.png" alt="">
                                            </div>
                                            <div class="leaderboard-item-content">
                                                <p class="fw-500 fz-13 c-mb-0">Hoàng Phi Hồng</p>
                                                <span class="fw-400 fz-12">1000 lượt</span>
                                            </div>
                                        </div>
                                        <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                            <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">1</div>
                                            <div class="leaderboard-item-avt brs-100">
                                                <img class="brs-100 w-100 c-pr-12" src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/user_avatar.png" alt="">
                                            </div>
                                            <div class="leaderboard-item-content">
                                                <p class="fw-500 fz-13 c-mb-0">Hoàng Phi Hồng</p>
                                                <span class="fw-400 fz-12">1000 lượt</span>
                                            </div>
                                        </div>
                                        <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                            <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">1</div>
                                            <div class="leaderboard-item-avt brs-100">
                                                <img class="brs-100 w-100 c-pr-12" src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/user_avatar.png" alt="">
                                            </div>
                                            <div class="leaderboard-item-content">
                                                <p class="fw-500 fz-13 c-mb-0">Hoàng Phi Hồng</p>
                                                <span class="fw-400 fz-12">1000 lượt</span>
                                            </div>
                                        </div>
                                        <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                            <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">5</div>
                                            <div class="leaderboard-item-avt brs-100">
                                                <img class="brs-100 w-100 c-pr-12" src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/user_avatar.png" alt="">
                                            </div>
                                            <div class="leaderboard-item-content">
                                                <p class="fw-500 fz-13 c-mb-0">Hoàng Phi Hồng</p>
                                                <span class="fw-400 fz-12">1000 lượt</span>
                                            </div>
                                        </div>
                                        <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                            <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">6</div>
                                            <div class="leaderboard-item-avt brs-100">
                                                <img class="brs-100 w-100 c-pr-12" src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/user_avatar.png" alt="">
                                            </div>
                                            <div class="leaderboard-item-content">
                                                <p class="fw-500 fz-13 c-mb-0">Hoàng Phi Hồng</p>
                                                <span class="fw-400 fz-12">1000 lượt</span>
                                            </div>
                                        </div>
                                        <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                            <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">7</div>
                                            <div class="leaderboard-item-avt brs-100">
                                                <img class="brs-100 w-100 c-pr-12" src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/user_avatar.png" alt="">
                                            </div>
                                            <div class="leaderboard-item-content">
                                                <p class="fw-500 fz-13 c-mb-0">Hoàng Phi Hồng</p>
                                                <span class="fw-400 fz-12">1000 lượt</span>
                                            </div>
                                        </div>
                                        <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                            <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">8</div>
                                            <div class="leaderboard-item-avt brs-100">
                                                <img class="brs-100 w-100 c-pr-12" src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/user_avatar.png" alt="">
                                            </div>
                                            <div class="leaderboard-item-content">
                                                <p class="fw-500 fz-13 c-mb-0">Hoàng Phi Hồng</p>
                                                <span class="fw-400 fz-12">1000 lượt</span>
                                            </div>
                                        </div>
                                        <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                            <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">9</div>
                                            <div class="leaderboard-item-avt brs-100">
                                                <img class="brs-100 w-100 c-pr-12" src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/user_avatar.png" alt="">
                                            </div>
                                            <div class="leaderboard-item-content">
                                                <p class="fw-500 fz-13 c-mb-0">Hoàng Phi Hồng</p>
                                                <span class="fw-400 fz-12">1000 lượt</span>
                                            </div>
                                        </div>
                                        <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                            <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">10</div>
                                            <div class="leaderboard-item-avt brs-100">
                                                <img class="brs-100 w-100 c-pr-12" src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/user_avatar.png" alt="">
                                            </div>
                                            <div class="leaderboard-item-content">
                                                <p class="fw-500 fz-13 c-mb-0">Hoàng Phi Hồng</p>
                                                <span class="fw-400 fz-12">1000 lượt</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="leaderboard-2" role="tabpanel">
                                    <div class="leaderboard-content">
                                        <div class="leaderboard-item row no-gutters">
                                            <div class="col-4 leaderboard-item-name">
                                                <span>1</span>
                                                <p>Tiến Phú</p>
                                            </div>
                                            <div class="col-4 leaderboard-item-ar">
                                                {{--                                                    +100.000 kim cương--}}
                                            </div>
                                            <div class="col-4 leaderboard-item-ar">
                                                1000 lượt
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="leaderboard-3" role="tabpanel">
                                    <div class="leaderboard-content" >
                                        <div class="leaderboard-item row no-gutters">
                                            <div class="col-12 leaderboard-item-name text-center justify-content-center">
                                                Không có dữ liệu
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="leaderboard-seemore">
                            <p>Xem thêm</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
