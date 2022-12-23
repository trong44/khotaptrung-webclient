@extends('frontend.layouts.master')
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('content')
    <div class="account">

        <div class="account_content">
            <div class="container">
                @include('frontend.pages.account.sidebar')
                <div class="account_sidebar_content">
                    <div class="account_sidebar_content_title">
                        <p>LỊCH SỬ NHẬN LIXI ĐẦU XUÂN</p>
                        <div class="account_sidebar_content_line"></div>
                    </div>
                    <div class="account_content_transaction_history">
                        <form action="">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span >Tên quà</span>
                                        <input type="text"  class="form-control" placeholder="Tên quà">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <div class="input-group date" id="transaction_history_start">
                                        <span class="input-group-btn">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                            <input type="text" class="form-control" name="start" autocomplete="off" placeholder="Từ ngày">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <div class="input-group date" id="transaction_history_end">
                                        <span class="input-group-btn input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                        </span>
                                            <input type="text" class="form-control input-group-addon" name="start" autocomplete="off" placeholder="Đến ngày">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="submit" style="margin-right: 16px" class="btn c-theme-btn c-btn-square m-b-10" value="Tìm kiếm" >
                                    <a href="" class="btn c-btn-square m-b-10 btn-danger">Tất cả</a>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-hover table-custom-res">
                                <thead>
                                <tr>
                                    <th>Thời gian</th>
                                    <th>ID</th>
                                    <th>Phần thưởng	</th>
                                    <th>Số vật phẩm</th>

                                </tr>

                                </thead>
                                <tbody>
                                <tr>
                                    <td>Thời gian</td>
                                    <td>ID</td>
                                    <td>Phần thưởng	</td>
                                    <td>Số vật phẩm</td>

                                </tr>
                                </tbody>
                            </table>
                        </div>


                    </div>
                    <div class="special_service" style="">
                        <div class="special_service_title">
                            <p>DỊCH VỤ NỔI BẬT</p>
                            <div class="special_service_line"></div>
                        </div>
                            <div class="special_service_content_slide" >
                                <div class="swiper-container special_service_content_slide_detail">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide" >
                                            <div class="special_service_content_slide_detail_in">
                                                <a href="">
                                                    <img src="https://shopas.net/storage/images/70Uzt1vAH3_1609902976.jpg" alt="">
                                                </a>

                                            </div>

                                        </div>
                                        <div class="swiper-slide" >
                                            <div class="special_service_content_slide_detail_in">
                                                <a href="">
                                                    <img src="https://shopas.net/storage/images/70Uzt1vAH3_1609902976.jpg" alt="">
                                                </a>

                                            </div>

                                        </div>
                                        <div class="swiper-slide" >
                                            <div class="special_service_content_slide_detail_in">
                                                <a href="">
                                                    <img src="https://shopas.net/storage/images/70Uzt1vAH3_1609902976.jpg" alt="">
                                                </a>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
