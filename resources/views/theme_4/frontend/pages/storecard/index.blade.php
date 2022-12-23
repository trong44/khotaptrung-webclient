@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head')
@endsection
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('scripts')
    <script type="text/javascript" src="/assets/frontend/{{theme('')->theme_key}}/js/storeCard/store_card.js"></script>
@endsection
@section('content')
    <section>
        <div class="container">

            <nav aria-label="breadcrumb" style="margin-top: 10px;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>

                    <li class="breadcrumb-item active" aria-current="page">Mua thẻ cào</li>
                </ol>
            </nav>

            <div class="c-content-box c-size-lg c-overflow-hide c-bg-white font-roboto">
                <div class="notify">

                </div>
                <div class="text-center" style="margin-bottom: 30px;margin-top: 50px;">
                    <h1 style="font-size: 1.5rem;font-weight: bold;text-transform: uppercase">Mua thẻ cào</h1>

                </div>
                <form method="POST" action="https://napgamegiare.net/mua-the" accept-charset="UTF-8" class="" enctype="multipart/form-data"><input name="_token" type="hidden" value="1d1UtKProIOHCYvd7GjOQ1mwzvuWei6FP3awwoKP">
                    <div class="detail-service">


                        <div class="row">

                            <div class="col-md-3">
                                <div class="news_image text-center">
                                    <img src="/assets/frontend/images/store-card.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-md-5" style="margin-bottom:20px;">

                                <div class="config">
                                    <div class="form-group">
                                        <label>Chọn nhà mạng:</label>

                                        <select name="card-type" class="server-filter form-control t14" style="">
                                            @foreach($telecoms as $val)
                                                <option value="{{$val->key}}" data-img="{{$val->image}}">{{$val->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Mệnh giá:</label>
                                        <select name="amount" id="amount" class="server-filter form-control t14" style="">
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Số lượng:</label>
                                        <select name="card-quantity" id="quantity" class="server-filter form-control t14" style="">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <a id="txtPrice" style="font-size: 20px;font-weight: bold;display: block;margin-bottom: 15px;line-height: 20px;" class="btn btn-success">Tổng: <span id="cardPrice">0</span> VNĐ</a>
                                @if (!\App\Library\AuthCustom::check())
                                    <a class="btn-auth" style="font-size: 18px;font-weight: bold;display: block;margin-bottom: 15px; color: #fff" data-toggle="modal" data-target="#modal-login"><i class="fa fa-key" aria-hidden="true"></i> Đăng nhập để thanh toán</a>
                                @else
                                    <button id="btnPurchase" type="button" style="font-size: 18px;font-weight: bold;display: block;margin-bottom: 15px;cursor: pointer" class="btn-auth"><i class="fa fa-credit-card" aria-hidden="true"></i> Thanh toán
                                    </button>
                                @endif
                            </div>
                        </div>



                    </div>


                    <!-- Modal xác nhận -->
                    <div class="modal fade" id="homealert" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">


                                <div class="modal-header">
                                    <div class="col-1"></div>
                                    <div class="col-10 text-center"><h6 class="modal-title">Xác nhận nạp thẻ</h6></div>
                                    <div class="col-1 ">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>

                                <div class="modal-body">
                                    <p> Bạn thực sự muốn thanh toán?</p>

                                </div>
                                <div class="modal-footer">

                                    <button type="submit" class="btn btn-success" id="btnConfirmPurchase" style="">Xác nhận thanh toán
                                    </button>

                                    <button type="button" class="btn btn-danger c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng
                                    </button>

                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Modal thành công -->
                    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">


                                <div class="modal-header">
                                    <div class="col-1"></div>
                                    <div class="col-10 text-center"><h6 class="modal-title">Mua thẻ thành công</h6></div>
                                    <div class="col-1 ">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>

                                <div class="modal-body">
                                    <div class="swiper-card-purchase">
                                        <!-- Additional required wrapper -->
                                        <div class="swiper-wrapper">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>


                <div class="description">
                    <h2 style="margin-bottom: 23px;font-size: 20px;text-transform: uppercase;">
                        Mô tả</h2>
                </div>
                <div class="row">
                    <div class="col-lg-12 column">
                        <div class="job-details">

                            <div class="article-content content_post ">
                                <div class="special-text">
                                    {!! setting('sys_store_card_content') !!}
                                </div>
                                <button class="expand-button">
                                    Xem thêm nội dung
                                </button>

                            </div>

                            <style type="text/css">

                                #successModal .swiper-card-purchase {
                                    overflow: hidden;
                                }

                                @media        only screen and (max-width: 580px) {
                                    .hidetext {
                                        max-height: 220px;
                                        overflow: hidden;
                                    }
                                    .intro-text iframe{
                                        width: 100%;
                                        height: 220px;
                                    }
                                    .intro-text img {
                                        height: auto !important;
                                    }
                                }
                                @media        only screen and (min-width: 580px) {
                                    .hidetext {
                                        max-height: 220px;
                                        overflow: hidden;
                                    }
                                    .intro-text iframe{
                                        width: 100%;
                                        height: 641px;
                                    }
                                }
                                .showtext {
                                    max-height:initial;
                                }
                                .viewless,.viewmore{
                                    cursor: pointer;
                                    color: #f1c40f;
                                    padding-top: 10px;
                                    font-size: 18px;
                                }

                                .intro-text img {
                                    max-width: 90%;
                                }
                            </style>

                        </div>
                    </div>
                </div>

                @include('frontend.widget.__dichvu__lienquan')

                @include('frontend.widget.__tai__khoan__lien__quan')

            </div>

        </div><!-- /.container -->
    </section>
@endsection





