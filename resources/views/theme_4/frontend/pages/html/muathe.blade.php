@extends('frontend.layouts.master')
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

                                    <select name="telecom_key" id="telecom_key" class="server-filter form-control t14" style="">
                                        <option value="CARROT">Carot ( Teamobi )</option>
                                        <option value="GARENA">Garena</option>
                                        <option value="ZING">Zing ( Vina Game )</option>
                                        <option value="FUNCARD">Funcard</option>
                                        <option value="GATE">Gate ( FPT Online )</option>
                                        <option value="GOSU">Gosu</option>
                                        <option value="APPOTA">Appota</option>
                                        <option value="SCOIN">Scoin ( VTC Mobile )</option>
                                        <option value="VCOIN">Vcoin ( VTC Online )</option>
                                        <option value="SOHACOIN">SohaCoin</option>
                                        <option value="VIETTEL">Viettel</option>
                                        <option value="MOBIFONE">Mobifone</option>
                                        <option value="VINAPHONE">Vinaphone</option>
                                        <option value="VIETNAMOBILE">Vietnamobile</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Mệnh giá:</label>
                                    <select name="amount" id="amount" class="server-filter form-control t14" style="">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Số lượng:</label>
                                    <select name="quantity" id="quantity" class="server-filter form-control t14" style="">
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

                                <div class="form-group">
                                    <label>Mật khẩu cấp 2:</label>
                                    <input name="password2" type="password" placeholder="Mật khẩu cấp 2"
                                           class="server-filter form-control t14" maxlength="32" style="height: 42px;">
                                </div>


                            </div>
                        </div>
                        <div class="col-md-4">
                            <a id="txtPrice" style="font-size: 20px;font-weight: bold;display: block;margin-bottom: 15px"
                               class="btn btn-success">Tổng: 0 Xu</a>
                            <a style="font-size: 18px;font-weight: bold;display: block;margin-bottom: 15px" class="btn-auth"
                               href="/login"
                               data-toggle="modal"
                               data-target="#modal-login"><i class="fa fa-key" aria-hidden="true"></i> Đăng nhập để thanh
                                toán</a>

                        </div>
                    </div>



                </div>


                <!-- Modal -->
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

                                <a class="btn-auth" href="/login">Đăng nhập</a>


                                <button type="button"
                                        class="btn btn-danger c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase"
                                        data-dismiss="modal">Đóng
                                </button>

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
                                <p><span style="font-size:16px"><strong><a href="https://napgamegiare.net/"><span style="color:#e74c3c">Napgamegiare.net</span></a></strong> cung cấp dịch vụ b&aacute;n&nbsp;thẻ game online gi&aacute; rẻ với chiết khấu từ 4 đến 18%. Ch&uacute;ng t&ocirc;i c&oacute; b&aacute;n đầy đủ c&aacute;c loại thẻ game phổ biến hiện nay như:<strong> thẻ garena, thẻ zing, thẻ vcoin, thẻ scoin, thẻ funcard, thẻ gate, thẻ gosu, thẻ appota, thẻ carot, thẻ soha, ...</strong></span></p>

                                <p><span style="font-size:16px">Thẻ game gồm m&atilde; thẻ v&agrave; số serial thẻ người d&ugrave;ng cần nhập ch&iacute;nh x&aacute;c c&aacute;c th&ocirc;ng tin n&agrave;y để sử dụng thẻ&nbsp;game. Dưới đ&acirc;y l&agrave; mệnh gi&aacute; v&agrave; chiết khấu chi tiết cho từng loại thẻ ( chiết khấu c&oacute; thể thay đổi l&ecirc;n xuống từng thời điểm )</span></p>

                                <table align="center" border="1" cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                    <tbody>
                                    <tr>
                                        <td style="text-align:center"><span style="font-size:16px"><strong>Thẻ c&agrave;o Carot (Teamobi)</strong></span></td>
                                        <td style="text-align:center"><span style="font-size:16px"><strong>Mệnh gi&aacute;</strong></span></td>
                                        <td style="text-align:center"><span style="font-size:16px"><strong>Chiết khấu</strong></span></td>
                                        <td style="text-align:center"><span style="font-size:16px"><strong>Gi&aacute; b&aacute;n (VNĐ)</strong></span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Carot 1 triệu (1.000.000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">1.000.000&nbsp;VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">18%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">820.000 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Carot 500k (500.000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">500.000&nbsp;VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">18%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">410.000 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Carot 200k (200.000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">200.000&nbsp;VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">18%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">164.000 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Carot 100k (100.000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">100.000&nbsp;VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">18%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">82.000 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Carot&nbsp;50k (50000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">50.000 VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">18%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">41.000 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center"><span style="font-size:16px"><strong>Thẻ c&agrave;o Vcoin (VTC)</strong></span></td>
                                        <td style="text-align:center"><span style="font-size:16px"><strong>Mệnh gi&aacute;</strong></span></td>
                                        <td style="text-align:center"><span style="font-size:16px"><strong>Chiết khấu</strong></span></td>
                                        <td style="text-align:center"><span style="font-size:16px"><strong>Gi&aacute; b&aacute;n (VNĐ)</strong></span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Vcoin 500k(500000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">500.000&nbsp;VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">4%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">480.000 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Vcoin 200k(200000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">200.000&nbsp;VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">4%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">192.000 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Vcoin 100k(100000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">100.000&nbsp;VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">4%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">96.000 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Vcoin 50k(50000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">50.000 VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">4%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">48.000 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Vcoin 20k(20000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">20.000 VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">2%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">19.600 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Vcoin 10k(10000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">10.000 VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">2%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">9.800 VNĐ</span></td>
                                    </tr>
                                    </tbody>
                                    <tbody>
                                    <tr>
                                        <td style="text-align:center"><span style="font-size:16px"><strong>Thẻ c&agrave;o Zing</strong></span></td>
                                        <td style="text-align:center"><span style="font-size:16px"><strong>Mệnh gi&aacute;</strong></span></td>
                                        <td style="text-align:center"><span style="font-size:16px"><strong>Chiết khấu</strong></span></td>
                                        <td style="text-align:center"><span style="font-size:16px"><strong>Gi&aacute; b&aacute;n (VNĐ)</strong></span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Zing 500k(500000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">500.000&nbsp;VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">6%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">470.000 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Zing 200k(200000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">200.000&nbsp;VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">6%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">198.000 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Zing 100k(100000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">100.000&nbsp;VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">6%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">94.000 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Zing 50k(50000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">50.000 VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">6%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">47.000 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Zing 20k(20000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">20.000 VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">6%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">18.800 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Zing 10k(10000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">10.000 VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">6%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">9.400 VNĐ</span></td>
                                    </tr>
                                    </tbody>
                                    <tbody>
                                    <tr>
                                        <td style="text-align:center"><span style="font-size:16px"><strong>Thẻ c&agrave;o Gate (FPT)</strong></span></td>
                                        <td style="text-align:center"><span style="font-size:16px"><strong>Mệnh gi&aacute;</strong></span></td>
                                        <td style="text-align:center"><span style="font-size:16px"><strong>Chiết khấu</strong></span></td>
                                        <td style="text-align:center"><span style="font-size:16px"><strong>Gi&aacute; b&aacute;n (VNĐ)</strong></span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Gate 500k(500000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">500.000&nbsp;VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">4.5%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">477.500 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Gate 200k(200000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">200.000&nbsp;VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">4.5%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">191.000 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Gate 100k(100000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">100.000&nbsp;VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">4.5%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">95.500 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Gate&nbsp;&nbsp;50k(50000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">50.000 VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">4.5%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">47.750 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Gate 20k(20000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">20.000 VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">3%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">19.400 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Gate 10k(10000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">10.000 VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">3%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">9.700 VNĐ</span></td>
                                    </tr>
                                    </tbody>
                                    <tbody>
                                    <tr>
                                        <td style="text-align:center"><span style="font-size:16px"><strong>Thẻ c&agrave;o Garena</strong></span></td>
                                        <td style="text-align:center"><span style="font-size:16px"><strong>Mệnh gi&aacute;</strong></span></td>
                                        <td style="text-align:center"><span style="font-size:16px"><strong>Chiết khấu</strong></span></td>
                                        <td style="text-align:center"><span style="font-size:16px"><strong>Gi&aacute; b&aacute;n (VNĐ)</strong></span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Garena 500k(500000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">500.000&nbsp;VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">5%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">475.000 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Garena 200k(200000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">200.000&nbsp;VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">5%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">190.000 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Garena 100k(100000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">100.000&nbsp;VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">5%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">95.000 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Garena 50k(50000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">50.000 VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">5%%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">47.500 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Garena 20k(20000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">20.000 VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">4%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">19.200 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center"><span style="font-size:16px"><strong>Thẻ c&agrave;o Scoin (VTC)</strong></span></td>
                                        <td style="text-align:center"><span style="font-size:16px"><strong>Mệnh gi&aacute;</strong></span></td>
                                        <td style="text-align:center"><span style="font-size:16px"><strong>Chiết khấu</strong></span></td>
                                        <td style="text-align:center"><span style="font-size:16px"><strong>Gi&aacute; b&aacute;n (VNĐ)</strong></span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Scoin 500k(500000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">500.000&nbsp;VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">5%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">475.000 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Scoin 200k(200000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">200.000&nbsp;VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">5%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">190.000 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Scoin 100k(100000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">100.000&nbsp;VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">5%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">95.000 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Scoin 50k(50000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">50.000 VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">5%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">47.500 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Scoin 20k(20000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">20.000 VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">3%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">19.400 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Scoin 10k(10000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">10.000 VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">3%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">9.700 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center"><span style="font-size:16px"><strong>Thẻ c&agrave;o Appota</strong></span></td>
                                        <td style="text-align:center"><span style="font-size:16px"><strong>Mệnh gi&aacute;</strong></span></td>
                                        <td style="text-align:center"><span style="font-size:16px"><strong>Chiết khấu</strong></span></td>
                                        <td style="text-align:center"><span style="font-size:16px"><strong>Gi&aacute; b&aacute;n (VNĐ)</strong></span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Appota 500k(500000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">500.000&nbsp;VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">6%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">470.000 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Appota 200k(200000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">200.000&nbsp;VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">6%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">198.000 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Appota 100k(100000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">100.000&nbsp;VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">6%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">94.000 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Appota 50k(50000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">50.000 VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">6%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">47.000 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Appota 20k(20000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">20.000 VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">6%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">18.800 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Appota 10k(10000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">10.000 VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">6%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">9.400 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center"><span style="font-size:16px"><strong>Thẻ c&agrave;o Funcard</strong></span></td>
                                        <td style="text-align:center"><span style="font-size:16px"><strong>Mệnh gi&aacute;</strong></span></td>
                                        <td style="text-align:center"><span style="font-size:16px"><strong>Chiết khấu</strong></span></td>
                                        <td style="text-align:center"><span style="font-size:16px"><strong>Gi&aacute; b&aacute;n (VNĐ)</strong></span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Funcard 500k(500000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">500.000&nbsp;VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">7%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">465.500 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Funcard 200k(200000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">200.000&nbsp;VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">7%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">186.000 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Funcard 100k(100000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">100.000&nbsp;VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">7%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">93.000 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Funcard&nbsp;&nbsp;50k(50000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">50.000 VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">7%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">46.500 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Funcard 20k(20000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">20.000 VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">7%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">18.600 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Funcard 10k(10000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">10.000 VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">7%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">9.300 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center"><span style="font-size:16px"><strong>Thẻ c&agrave;o Sohacoin</strong></span></td>
                                        <td style="text-align:center"><span style="font-size:16px"><strong>Mệnh gi&aacute;</strong></span></td>
                                        <td style="text-align:center"><span style="font-size:16px"><strong>Chiết khấu</strong></span></td>
                                        <td style="text-align:center"><span style="font-size:16px"><strong>Gi&aacute; b&aacute;n (VNĐ)</strong></span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Sohacoin 500k(500000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">500.000&nbsp;VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">5%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">475.000 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Sohacoin 200k(200000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">200.000&nbsp;VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">5%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">190.000 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Sohacoin 100k(100000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">100.000&nbsp;VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">5%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">95.000 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Sohacoin 50k(50000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">50.000 VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">5%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">47.500 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Sohacoin 20k(20000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">20.000 VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">4%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">19.200 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center"><span style="font-size:16px"><strong>Thẻ c&agrave;o Gosu (Gosu)</strong></span></td>
                                        <td style="text-align:center"><span style="font-size:16px"><strong>Mệnh gi&aacute;</strong></span></td>
                                        <td style="text-align:center"><span style="font-size:16px"><strong>Chiết khấu</strong></span></td>
                                        <td style="text-align:center"><span style="font-size:16px"><strong>Gi&aacute; b&aacute;n (VNĐ)</strong></span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Gosu 500k(500000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">500.000&nbsp;VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">4.5%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">477.500 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Gosu 200k(200000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">200.000&nbsp;VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">4.5%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">191.000 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Gosu 100k(100000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">100.000&nbsp;VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">4.5%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">95.500 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Gosu&nbsp; 50k(50000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">50.000 VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">4.5%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">47.750 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Gosu&nbsp;20k(20000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">20.000 VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">3%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">19.400 VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size:16px">Thẻ Gosu 10k(10000)</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">10.000 VNĐ</span></td>
                                        <td style="text-align:center"><span style="font-size:16px">3%</span></td>
                                        <td style="text-align:right"><span style="font-size:16px">9.700 VNĐ</span></td>
                                    </tr>
                                    </tbody>
                                </table>

                                <p>&nbsp;</p>

                                <h3><span style="font-size:16px"><strong>Hướng dẫn mua thẻ game online tại website&nbsp;<a href="https://napgamegiare.net/">napgamegiare.net</a></strong></span></h3>

                                <p><span style="font-size:16px">Sau đ&acirc;y ch&uacute;ng t&ocirc;i sẽ hướng dẫn bạn c&aacute;ch mua thẻ game online gi&aacute; rẻ, nhanh ch&oacute;ng, hấp dẫn.</span></p>

                                <h4><span style="font-size:16px"><strong>Bước 1</strong>: <strong>Đăng nhập website</strong></span></h4>

                                <p><span style="font-size:16px">Truy cập v&agrave; đăng nhập v&agrave;o website&nbsp;<strong><a href="https://napgamegiare.net/">napgamegiare.net</a></strong>&nbsp;bằng&nbsp;<strong>facebook</strong>&nbsp;hoặc&nbsp;<a href="http://L%C3%A0m%20th%E1%BA%BF%20n%C3%A0o%20%C4%91%E1%BB%83%20n%E1%BA%A1p%20FC%20Fifa%20online%204%20m%E1%BB%A9c%20gi%C3%A1%20t%E1%BB%91t%20l%C3%A0%20%C4%91i%E1%BB%81u%20m%C3%A0%20b%E1%BA%A5t%20c%E1%BB%A9%20ng%C6%B0%E1%BB%9Di%20ch%C6%A1i%20game%20n%C3%A0o%20c%C5%A9ng%20mong%20mu%E1%BB%91n.%20Ngo%C3%A0i%20ra,%20kh%C3%B4ng%20ph%E1%BA%A3i%20game%20th%E1%BB%A7%20n%C3%A0o%20c%C5%A9ng%20bi%E1%BA%BFt%20c%C3%A1ch%20n%E1%BA%A1p%20game%20gi%C3%A1%20m%E1%BB%81m%20v%C3%A0%20%C4%91%E1%BB%8Ba%20ch%E1%BB%89%20n%E1%BA%A1p%20game%20%C4%91%C6%B0%E1%BB%A3c%20%C4%91%C3%A1nh%20gi%C3%A1%20cao.%20Th%C3%B4ng%20tin%20b%C3%AAn%20d%C6%B0%E1%BB%9Bi,%20napgamegiare.net%20s%E1%BA%BD%20cung%20c%E1%BA%A5p%20cho%20b%E1%BA%A1n%20nh%E1%BB%AFng%20th%C3%B4ng%20tin%20b%E1%BB%95%20%C3%ADch.%20%20Nh%E1%BB%AFng%20%C4%91i%E1%BB%81u%20c%E1%BA%A7n%20bi%E1%BA%BFt%20khi%20n%E1%BA%A1p%20FC%20Fifa%20online%204%20%20%20Cash%20l%C3%A0%20ti%E1%BB%81n%20t%E1%BB%87%20trong%20game%20fo4%20%C4%91%C6%B0%E1%BB%A3c%20nhi%E1%BB%81u%20ng%C6%B0%E1%BB%9Di%20ch%C6%A1i%20game%20nh%C3%A0%20garena%20mong%20mu%E1%BB%91n%20c%C3%B3%20%C4%91%C6%B0%E1%BB%A3c.%20Ng%C6%B0%E1%BB%9Di%20ch%C6%A1i%20s%E1%BA%BD%20d%C3%B9ng%20ti%E1%BB%81n%20n%C3%A0y%20%C4%91%E1%BB%83%20mua%20c%C3%A1c%20g%C3%B3i%20v%E1%BA%ADt%20ph%E1%BA%A9m%20trong%20c%E1%BB%ADa%20h%C3%A0ng%20v%C3%A0%20gia%20nh%E1%BA%ADp%20ch%C6%A1i%20c%C3%A1c%20event%20c%E1%BB%A7a%20fifa.%20%20MC%20v%C3%A0%20FC%20l%C3%A0%20hai%20%C4%91%C6%A1n%20v%E1%BB%8B%20ti%E1%BB%81n%20t%E1%BB%87%20ch%E1%BB%89%20d%C3%A0nh%20cho%20hai%20b%E1%BA%A3n%20FO4%20:%20%20FC%20cho%20FO4%20PC%20%20MC%20s%E1%BB%AD%20d%E1%BB%A5ng%20cho%20FO4%20mobile%20%20%C4%90%E1%BB%83%20c%C3%B3%20FC%20trong%20t%C3%A0i%20kho%E1%BA%A3n,%20c%C3%A1c%20ng%C6%B0%E1%BB%9Di%20d%C3%B9ng%20c%E1%BA%A7n%20n%E1%BA%A1p%20FC%20th%C3%B4ng%20qua%20c%C3%A1c%20c%C3%A1ch%20th%E1%BB%A9c%20nh%C6%B0:%20quy%20%C4%91%E1%BB%95i%20s%C3%B2%20sang%20FC,%20n%E1%BA%A1p%20FC%20b%E1%BA%B1ng%20th%E1%BA%BB%20ng%C3%A2n%20h%C3%A0ng,%20n%E1%BA%A1p%20FC%20tr%E1%BB%B1c%20ti%E1%BA%BFp%20v%C3%A0o%20game%20th%C3%B4ng%20qua%20website%20uy%20t%C3%ADn.%20B%E1%BA%A1n%20mu%E1%BB%91n%20n%E1%BA%A1p%20FC%20m%E1%BB%A9c%20gi%C3%A1%20m%E1%BB%81m%20th%C3%AC%20b%E1%BA%A1n%20c%E1%BA%A7n%20t%C3%ACm%20nh%E1%BB%AFng%20khu%20v%E1%BB%B1c%20n%E1%BA%A1p%20game%20FO4%20gi%C3%A1%20b%C3%A8o%20%C4%91%E1%BB%83%20mua%20th%E1%BA%BB%20ch%C6%A1i%20game%20chi%E1%BA%BFt%20kh%E1%BA%A5u%20cao.%20M%E1%BB%99t%20trong%20nh%E1%BB%AFng%20%C4%91%E1%BB%8Ba%20ch%E1%BB%89%20n%E1%BA%A1p%20FC%20tr%E1%BB%B1c%20ti%E1%BA%BFp%20v%C3%A0o%20game%20v%E1%BB%9Bi%20m%E1%BB%A9c%20gi%C3%A1%20c%E1%BB%B1c%20k%E1%BB%B3%20h%E1%BA%A5p%20d%E1%BA%ABn%20ch%C3%ADnh%20l%C3%A0%20trang%20web%20napgamegiare.net.%20%20Truy%20c%E1%BA%ADp%20%C4%91%E1%BB%83%20th%E1%BB%B1c%20hi%E1%BB%87n%20giao%20d%E1%BB%8Bch%20ngay.%20%20%20%20%C4%90%E1%BB%8Ba%20ch%E1%BB%89%20n%E1%BA%A1p%20FC%20Fifa%20Online%204%20gi%C3%A1%20r%E1%BA%BB%20%C4%90%E1%BB%83%20n%E1%BA%A1p%20FC%20gi%C3%A1%20m%E1%BB%81m,%20b%E1%BA%A1n%20c%E1%BA%A7n%20t%C3%ACm%20nh%E1%BB%AFng%20%C4%91%E1%BB%8Ba%20ch%E1%BB%89%20n%E1%BA%A1p%20Fifa%20Online%204%20gi%C3%A1%20r%E1%BA%BB.%20M%E1%BB%99t%20trong%20c%C3%A1c%20khu%20v%E1%BB%B1c%20n%E1%BA%A1p%20FO4%20chi%20ph%C3%AD%20r%E1%BA%BB%20%C4%91%C6%B0%E1%BB%A3c%20r%E1%BA%A5t%20m%E1%BB%99t%20s%E1%BB%91%20anh%20em%20ng%C6%B0%E1%BB%9Di%20ch%C6%A1i%20game,%20youtuber%20%C4%91%E1%BB%81%20c%E1%BA%ADp%20%C4%91%E1%BA%BFn%20trong%20th%E1%BB%9Di%20gian%20qua%20th%E1%BB%B1c%20s%E1%BB%B1%20l%C3%A0%20trang%20web%20napgamegiare.net.%20%C4%90%C3%A2y%20ch%C3%ADnh%20l%C3%A0%20c%E1%BB%ADa%20h%C3%A0ng%20n%E1%BA%A1p%20FC%20FO4%20%C4%91%C6%B0%E1%BB%A3c%20%C4%91%C3%A1nh%20gi%C3%A1%20cao%20s%E1%BB%91%201%20%E1%BB%9F%20th%E1%BB%9Di%20%C4%91i%E1%BB%83m%20hi%E1%BB%87n%20t%E1%BA%A1i.%20T%E1%BA%A1i%20shop,%20b%E1%BA%A1n%20c%C3%B3%20th%E1%BB%83%20ch%E1%BB%8Dn%20c%C3%A1c%20g%C3%B3i%20n%E1%BA%A1p%20FC%20t%E1%BB%AB%2016FC%20%C4%91%E1%BA%BFn%20340FC%20v%E1%BB%9Bi%20m%E1%BB%A9c%20gi%C3%A1%20ch%E1%BB%89%20t%E1%BB%AB%207.500%20%C4%91%E1%BB%93ng,%20%C4%91%C3%A2y%20l%C3%A0%20g%C3%B3i%20n%E1%BA%A1p%20FC%20v%C3%B4%20c%C3%B9ng%20r%E1%BA%BB.%20%20%20%20L%C3%BD%20do%20n%C3%AAn%20n%E1%BA%A1p%20FC%20FO4%20t%E1%BA%A1i%20napgamegiare.net%20napgamegiare.net%20c%C3%A0ng%20l%C3%BAc%20c%C3%A0ng%20nh%E1%BA%ADn%20%C4%91%C6%B0%E1%BB%A3c%20s%E1%BB%B1%20quan%20t%C3%A2m%20c%E1%BB%A7a%20nh%E1%BB%AFng%20ng%C6%B0%E1%BB%9Di%20ch%C6%A1i%20game%20b%E1%BB%9Fi:%20%20H%C6%A1n%2010.000+%20giao%20d%E1%BB%8Bch%20%C4%91%C6%B0%E1%BB%A3c%20th%E1%BB%B1c%20hi%E1%BB%87n%20m%E1%BB%97i%20ng%C3%A0y%20t%E1%BA%A1i%20website,%20kh%E1%BA%B3ng%20%C4%91%E1%BB%8Bnh%20s%E1%BB%B1%20uy%20t%C3%ADn%20v%C3%A0%20tin%20t%C6%B0%E1%BB%9Fng%20c%E1%BB%A7a%20kh%C3%A1ch%20h%C3%A0ng%20d%C3%A0nh%20cho%20shop.%20%20Trang%20web%20c%C3%B2n%20n%E1%BA%A1p%20c%C3%A1c%20tr%C3%B2%20ch%C6%A1i%20kh%C3%A1c%20nh%C6%B0:%20n%E1%BA%A1p%20qu%C3%A2n%20huy%20li%C3%AAn%20qu%C3%A2n,%20n%E1%BA%A1p%20kc%20bns,%20n%E1%BA%A1p%20rp%20li%C3%AAn%20minh,%20uc%20pubg,...%20%20T%E1%BA%A1i%20napgamegiare.net%20b%E1%BA%A1n%20c%C3%B2n%20c%C3%B3%20th%E1%BB%83%20mua%20%C4%91%C6%B0%E1%BB%A3c%20th%E1%BA%BB%20game%20c%E1%BB%A7a%20c%C3%A1c%20NPH%20kh%C3%A1c%20nh%C6%B0:%20garena,%20zing,%20funcard,%20gate,%20carot,%20appota,%20scoin,%20soha,%20vcoin,%20gosu%20v%C3%A0%20card%20phone:%20vinaphone,%20viettel,%20mobi.%20%20napgamegiare.net%20c%C3%B3%20giao%20di%E1%BB%87n%20%C4%91%E1%BA%B9p,%20%C4%91%C6%A1n%20gi%E1%BA%A3%20,%20b%E1%BA%A1n%20s%E1%BA%BD%20d%E1%BB%85%20d%C3%A0ng%20d%C3%B9ng%20tr%C3%AAn%20c%C3%A1c%20m%C3%A1y%20c%C3%B3%20m%E1%BA%A1ng%20nh%C6%B0:%20%C4%91i%E1%BB%87n%20tho%E1%BA%A1i%20th%C3%B4ng%20minh,%20m%C3%A1y%20t%C3%ADnh%20b%E1%BA%A3ng,%20m%C3%A1y%20t%C3%ADnh%20x%C3%A1ch%20tay,....%20%20C%C3%A1ch%20n%E1%BA%A1p%20Fc%20c%E1%BB%B1c%20k%E1%BB%B3%20%C4%91%C6%A1n%20gi%E1%BA%A3n,%20b%E1%BA%A1n%20ch%E1%BB%89%20c%E1%BA%A7n%20ch%E1%BB%8Dn%20g%C3%B3i%20FC%20m%C3%ACnh%20c%E1%BA%A7n%20n%E1%BA%A1p,%20%C4%91%E1%BA%B7t%20mua%20v%C3%A0%20tr%E1%BA%A3%20tr%E1%BB%B1c%20tuy%E1%BA%BFn%20b%E1%BA%B1ng%20ti%E1%BB%81n%20c%C3%B3%20trong%20t%C3%A0i%20kho%E1%BA%A3n%C2%A0l%C3%A0%20b%E1%BA%A1n%20%C4%91%C3%A3%20c%C3%B3%20ngay%20FC%20trong%20game%20garena%20Fifa%20online%204.%20%20Th%E1%BB%9Di%20gian%20mua%20b%C3%A1n%20v%C3%A0%20nh%E1%BA%ADn%20FC%20trong%20game%20kh%C3%B4ng%20t%E1%BB%9Bi%2030%20gi%C3%A2y.%C2%A0%20%20Khi%20giao%20d%E1%BB%8Bch%20mua%20b%C3%A1n%20FC%20t%E1%BA%A1i%20napgamegiare.net%20b%E1%BA%A1n%20ho%C3%A0n%20to%C3%A0n%20y%C3%AAn%20t%C3%A2m%20v%E1%BB%81%20s%E1%BB%91%20FC%20n%C3%A0y%20v%C3%A0%20ch%C3%BAng%20t%C3%B4i%20xin%20cam%20k%E1%BA%BFt%20FC%20%C4%91%C6%B0%E1%BB%A3c%20tung%20ra%20th%E1%BB%8B%20tr%C6%B0%E1%BB%9Dng%20l%C3%A0%20ho%C3%A0n%20to%C3%A0n%20s%E1%BA%A1ch%20s%E1%BA%BD%20v%C3%A0%20an%20to%C3%A0n%20100%%20%20napgamegiare.net%20lu%C3%B4n%20b%E1%BA%A3o%20v%E1%BB%87%20danh%20t%C3%ADnh%20ng%C6%B0%E1%BB%9Di%20ti%C3%AAu%20d%C3%B9ng%20v%E1%BB%9Bi%20m%E1%BB%99t%20gi%E1%BA%A3i%20ph%C3%A1p%20b%E1%BA%A3o%20m%E1%BA%ADt%20t%E1%BB%91i%20%C6%B0u%20nh%E1%BA%A5t.%20%C4%90%E1%BB%99i%20ng%C5%A9%20nh%C3%A2n%20s%E1%BB%B1%20lu%C3%B4n%20tr%E1%BB%B1c%2024%20/%207%20/%20365%20chu%E1%BA%A9n%20b%E1%BB%8B%20%C4%91%E1%BA%A7y%20%C4%91%E1%BB%A7%20%C4%91%E1%BB%83%20%C4%91%C3%A1p%20%E1%BB%A9ng%20kh%C3%A1ch%20h%C3%A0ng%20m%E1%BB%8Di%20l%C3%BAc,%20m%E1%BB%8Di%20n%C6%A1i.%20%20T%E1%BA%A1i%20napgamegiare.net,%20b%E1%BA%A1n%20s%E1%BA%BD%20mua%20FC%20FO4%20v%E1%BB%9Bi%20nh%E1%BB%AFng%20c%C3%A1ch%20phong%20ph%C3%BA%20nh%C6%B0:%20n%E1%BA%A1p%20FC%20b%E1%BA%B1ng%20card%20%C4%91i%E1%BB%87n%20tho%E1%BA%A1i%20ho%E1%BA%B7c%20th%E1%BA%BB%20ch%C6%A1i%20game%20kh%C3%A1c,%20mua%20FC%20FO4%20b%E1%BA%B1ng%20v%C3%AD%20ti%E1%BB%81n%20online%20-%20atm,%20...%20%20V%E1%BB%9Bi%20nh%E1%BB%AFng%20%C6%B0u%20%C4%91i%E1%BB%83m%20n%E1%BB%95i%20tr%E1%BB%99i%20tr%C3%AAn,%20d%C6%B0%E1%BB%9Dng%20nh%C6%B0%20ai%20ai%20trong%20m%E1%BB%8Di%20ng%C6%B0%E1%BB%9Di%20c%C5%A9ng%20s%E1%BA%BD%20ch%E1%BB%8Dn%20l%E1%BB%B1a%20n%E1%BA%A1p%20game%20FO4%20t%E1%BA%A1i%20napgamegiare.net%20ph%E1%BA%A3i%20kh%C3%B4ng?%20Truy%20c%E1%BA%ADp%20ngay.%20%20%20%20H%C6%B0%E1%BB%9Bng%20d%E1%BA%ABn%20n%E1%BA%A1p%20FC%20Fifa%20Online%204%20t%E1%BA%A1i%20website%20napgamegiare.net%20Sau%20%C4%91%C3%A2y%20ch%C3%BAng%20t%C3%B4i%20s%E1%BA%BD%20h%C6%B0%E1%BB%9Bng%20d%E1%BA%ABn%20b%E1%BA%A1n%20c%C3%A1ch%20n%E1%BA%A1p%20FC%20Fifa%20Online%204%20gi%C3%A1%20r%E1%BA%BB,%20nhanh%20ch%C3%B3ng,%20h%E1%BA%A5p%20d%E1%BA%ABn.%20%20B%C6%B0%E1%BB%9Bc%201:%20%C4%90%C4%83ng%20nh%E1%BA%ADp%20website%20Truy%20c%E1%BA%ADp%20v%C3%A0%20%C4%91%C4%83ng%20nh%E1%BA%ADp%20v%C3%A0o%20website%20napgamegiare.net%20b%E1%BA%B1ng%20facebook%20ho%E1%BA%B7c%20t%E1%BA%A1o%20t%C3%A0i%20kho%E1%BA%A3n%20m%E1%BB%9Bi.%20%20%20%20B%C6%B0%E1%BB%9Bc%202:%20N%E1%BA%A1p%20ti%E1%BB%81n%20v%C3%A0o%20t%C3%A0i%20kho%E1%BA%A3n%20website%20%C4%90%E1%BB%83%20c%C3%B3%20th%E1%BB%83%20n%E1%BA%A1p%20FC%20v%C3%A0o%20game%20Fifa%20Online%204%20b%E1%BA%A1n%20c%E1%BA%A7n%20n%E1%BA%A1p%20ti%E1%BB%81n%20v%C3%A0o%20t%C3%A0i%20kho%E1%BA%A3n.%20C%C3%B3%202%20c%C3%A1ch%20n%E1%BA%A1p%20ti%E1%BB%81n%20v%C3%A0o%20t%C3%A0i%20kho%E1%BA%A3n.%20%20N%E1%BA%A1p%20ti%E1%BB%81n%20v%C3%A0o%20t%C3%A0i%20kho%E1%BA%A3n%20b%E1%BA%B1ng%20th%E1%BA%BB%20%C4%91i%E1%BB%87n%20tho%E1%BA%A1i%20ho%E1%BA%B7c%20th%E1%BA%BB%20game.%C2%A0%20%20S%E1%BB%AD%20d%E1%BB%A5ng%20ATM%20-%20v%C3%AD%20%C4%91i%E1%BB%87n%20t%E1%BB%AD%20%C4%91%E1%BB%83%20n%E1%BA%A1p%20ti%E1%BB%81n%20v%C3%A0o%20t%C3%A0i%20kho%E1%BA%A3n.%20%20%3E%3E%3E%20Tham%20kh%E1%BA%A3o:%C2%A0H%C6%B0%E1%BB%9Bng%20d%E1%BA%ABn%20n%E1%BA%A1p%20ti%E1%BB%81n%20v%C3%A0o%20website%20napgamegiare.net%20%20N%E1%BA%A1p%20ti%E1%BB%81n%20v%C3%A0o%20website%20ngay.%20%20%20%20B%C6%B0%E1%BB%9Bc%203:%20N%E1%BA%A1p%20game%20Sau%20khi%20n%E1%BA%A1p%20ti%E1%BB%81n%20v%C3%A0o%20t%C3%A0i%20kho%E1%BA%A3n%20website,%20b%E1%BA%A1n%20%C4%91%E1%BA%BFn%20m%E1%BB%A5c%20%E2%80%9CTrang%20ch%E1%BB%A7%22%20%C4%91%E1%BB%83%20ti%E1%BA%BFn%20h%C3%A0nh%20n%E1%BA%A1p%20FC%20v%C3%A0o%20game%20FO4.%20Ch%E1%BB%8Dn%20g%C3%B3i%20FC,%20nh%E1%BA%ADp%20t%C3%AAn%20t%C3%A0i%20kho%E1%BA%A3n%20v%C3%A0%20m%E1%BA%ADt%20kh%E1%BA%A9u%20game%20FO4%20m%C3%A0%20b%E1%BA%A1n%20%C4%91ang%20ch%C6%A1i,%20nh%E1%BA%A5n%20thanh%20to%C3%A1n.%20%20%20%20V%E1%BA%ADy%20l%C3%A0,%20ch%E1%BB%89%20v%E1%BB%9Bi%203%20thao%20t%C3%A1c%20c%E1%BB%B1c%20k%E1%BB%B3%20%C4%91%C6%A1n%20gi%E1%BA%A3n,%20b%E1%BA%A1n%20%C4%91%C3%A3%20d%E1%BB%85%20d%C3%A0ng%20n%E1%BA%A1p%20FC%20v%C3%A0o%20game%20FO4%20m%E1%BB%99t%20c%C3%A1ch%20d%E1%BB%85%20d%C3%A0ng%20v%C3%A0%20%C4%91%C6%A1n%20gi%E1%BA%A3n.%20%20Truy%20c%E1%BA%ADp%20website%20napgamegiare.net%20%C4%91%E1%BB%83%20n%E1%BA%A1p%20RP%20gi%C3%A1%20r%E1%BA%BB%20ngay.%C2%A0%20%20%20%20napgamegiare.net%C2%A0-%20N%E1%BA%A1p%20All%20Game%20Gi%C3%A1%20R%E1%BA%BB,%20Uy%20T%C3%ADn%20S%E1%BB%91%201%20Vi%E1%BB%87t%20Nam%20%20%3E%3E%3E%20Xem%20th%C3%AAm:%20%20-%C2%A0H%C6%B0%E1%BB%9Bng%20d%E1%BA%ABn%20n%E1%BA%A1p%20RP%20Li%C3%AAn%20Minh%20gi%C3%A1%20r%E1%BA%BB,%20uy%20t%C3%ADn,%20h%E1%BA%A5p%20d%E1%BA%ABn%20%20-%C2%A0H%C6%B0%E1%BB%9Bng%20d%E1%BA%ABn%20n%E1%BA%A1p%20Kim%20C%C6%B0%C6%A1ng%20Free%20Fire%20gi%C3%A1%20r%E1%BA%BB,%20uy%20t%C3%ADn,%20h%E1%BA%A5p%20d%E1%BA%ABn%20%20-%C2%A0H%C6%B0%E1%BB%9Bng%20d%E1%BA%ABn%20n%E1%BA%A1p%20Qu%C3%A2n%20Huy%20Li%C3%AAn%20Qu%C3%A2n%20gi%C3%A1%20r%E1%BA%BB,%20an%20to%C3%A0n%20%20-%C2%A0H%C6%B0%E1%BB%9Bng%20d%E1%BA%ABn%20n%E1%BA%A1p%20game%20gi%C3%A1%20r%E1%BA%BB,%20chi%E1%BA%BFt%20kh%E1%BA%A5u%20cao%20%20-%C2%A0H%C6%B0%E1%BB%9Bng%20d%E1%BA%ABn%20mua%20th%E1%BA%BB%20game%20online%20gi%C3%A1%20r%E1%BA%BB,%20uy%20t%C3%ADn%20ch%E1%BA%A5t%20l%C6%B0%E1%BB%A3ng"><strong>tạo t&agrave;i khoản mới</strong></a>.</span></p>

                                <p style="text-align:center"><span style="font-size:16px"><img alt="đăng ký tài khoản" src="https://napgamegiare.net/upload/userfiles/images/image(1).png" /></span></p>

                                <h4><span style="font-size:16px"><strong>Bước 2:&nbsp;Nạp tiền v&agrave;o t&agrave;i khoản website</strong></span></h4>

                                <p><span style="font-size:16px">Để c&oacute; thể mua thẻ game bạn cần nạp tiền v&agrave;o t&agrave;i khoản. C&oacute; 2 c&aacute;ch nạp tiền v&agrave;o t&agrave;i khoản.</span></p>

                                <ul>
                                    <li>
                                        <p><span style="font-size:16px">Nạp tiền v&agrave;o t&agrave;i khoản bằng thẻ điện thoại hoặc thẻ game.&nbsp;</span></p>
                                    </li>
                                    <li>
                                        <p><span style="font-size:16px">Sử dụng ATM - v&iacute; điện tử để nạp tiền v&agrave;o t&agrave;i khoản.</span></p>
                                    </li>
                                </ul>

                                <blockquote>
                                    <p><span style="font-size:16px"><strong>&gt;&gt;&gt; Tham khảo:</strong>&nbsp;<strong><a href="https://napgamegiare.net/tin-tuc/huong-dan-nap-tien-vao-website-napgamegiarenet">Hướng dẫn nạp tiền v&agrave;o website napgamegiare.net</a></strong></span></p>
                                </blockquote>

                                <p style="text-align:center"><span style="font-size:16px"><strong><a href="https://napgamegiare.net/nap-the"><img alt="nạp tiền vào website" src="https://napgamegiare.net/upload/userfiles/images/nut-nap-ngay.gif" style="height:79px; width:200px" /></a></strong></span></p>

                                <h4><span style="font-size:16px"><strong>Bước 3</strong>: <strong>Mua thẻ game</strong></span></h4>

                                <p><span style="font-size:16px">Sau khi nạp tiền v&agrave;o t&agrave;i khoản website, bạn đến mục &ldquo;<strong><a href="https://napgamegiare.net/mua-the">MUA THẺ GAME GI&Aacute; RẺ</a></strong>&quot; để tiến h&agrave;nh mua thẻ game. Chọn NPH game bạn muốn mua, chọn mệnh gi&aacute;, số lượng muốn mua, rồi nhấn thanh to&aacute;n.</span></p>

                                <p style="text-align:center"><span style="font-size:16px"><img alt="mua thẻ game giá rẻ" src="https://napgamegiare.net/upload/userfiles/images/image(13).png" /></span></p>

                                <p><span style="font-size:16px">Kiểm tra th&ocirc;ng tin thẻ đ&atilde; mua v&agrave;o mục &ldquo;<strong><a href="https://napgamegiare.net/mua-the/log">Lịch sử mua thẻ</a></strong>&quot;</span></p>

                                <p style="text-align:center"><span style="font-size:16px"><img alt="lịch sử mua thẻ" src="https://napgamegiare.net/upload/userfiles/images/image(14).png" /></span></p>

                                <p><span style="font-size:16px">Vậy l&agrave;, chỉ với 3 thao t&aacute;c cực kỳ đơn giản, bạn đ&atilde; dễ d&agrave;ng mua thẻ game online một c&aacute;ch dễ d&agrave;ng v&agrave; đơn giản. Truy cập website&nbsp;<strong><a href="https://napgamegiare.net/">napgamegiare.net</a></strong>&nbsp;để mua thẻ game online gi&aacute; rẻ ngay.&nbsp;</span></p>
                            </div>
                            <button class="expand-button">
                                Xem thêm nội dung
                            </button>

                        </div>

                        <style type="text/css">

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

            <div class="main-title" style="margin-top: 30px">
                <h2 style="font-size: 20px;text-transform: uppercase;">Các dịch vụ liên quan</h2>
            </div>

            <div class="entries" style="margin-bottom: 50px">


                <div class="slick-slider">
                    <div class="item image">
                        <a href="/dich-vu/nap-kim-cuong-free-fire">
                            <img src="https://napgamegiare.net/assets/frontend/{{theme('')->theme_key}}/image/FAvf7Eh36I_1625567566.jpg" alt="Nạp Kim Cương - Free Fire" width="120px">
                            <h3 class="text-title">Nạp Kim Cương - Free Fire</h3>
                        </a>
                    </div>
                    <div class="item image">
                        <a href="/dich-vu/nap-kim-cuong-free-fire">
                            <img src="https://napgamegiare.net/assets/frontend/{{theme('')->theme_key}}/image/FAvf7Eh36I_1625567566.jpg" alt="Nạp Kim Cương - Free Fire" width="120px">
                            <h3 class="text-title">Nạp Kim Cương - Free Fire</h3>
                        </a>
                    </div>
                    <div class="item image">
                        <a href="/dich-vu/nap-kim-cuong-free-fire">
                            <img src="https://napgamegiare.net/assets/frontend/{{theme('')->theme_key}}/image/FAvf7Eh36I_1625567566.jpg" alt="Nạp Kim Cương - Free Fire" width="120px">
                            <h3 class="text-title">Nạp Kim Cương - Free Fire</h3>
                        </a>
                    </div>  <div class="item image">
                        <a href="/dich-vu/nap-kim-cuong-free-fire">
                            <img src="https://napgamegiare.net/assets/frontend/{{theme('')->theme_key}}/image/FAvf7Eh36I_1625567566.jpg" alt="Nạp Kim Cương - Free Fire" width="120px">
                            <h3 class="text-title">Nạp Kim Cương - Free Fire</h3>
                        </a>
                    </div>
                    <div class="item image">
                        <a href="/dich-vu/nap-kim-cuong-free-fire">
                            <img src="https://napgamegiare.net/assets/frontend/{{theme('')->theme_key}}/image/FAvf7Eh36I_1625567566.jpg" alt="Nạp Kim Cương - Free Fire" width="120px">
                            <h3 class="text-title">Nạp Kim Cương - Free Fire</h3>
                        </a>
                    </div>
                    <div class="item image">
                        <a href="/dich-vu/nap-kim-cuong-free-fire">
                            <img src="https://napgamegiare.net/assets/frontend/{{theme('')->theme_key}}/image/FAvf7Eh36I_1625567566.jpg" alt="Nạp Kim Cương - Free Fire" width="120px">
                            <h3 class="text-title">Nạp Kim Cương - Free Fire</h3>
                        </a>
                    </div>
                    <div class="item image">
                        <a href="/dich-vu/nap-kim-cuong-free-fire">
                            <img src="https://napgamegiare.net/assets/frontend/{{theme('')->theme_key}}/image/FAvf7Eh36I_1625567566.jpg" alt="Nạp Kim Cương - Free Fire" width="120px">
                            <h3 class="text-title">Nạp Kim Cương - Free Fire</h3>
                        </a>
                    </div>
                    <div class="item image">
                        <a href="/dich-vu/nap-kim-cuong-free-fire">
                            <img src="https://napgamegiare.net/assets/frontend/{{theme('')->theme_key}}/image/FAvf7Eh36I_1625567566.jpg" alt="Nạp Kim Cương - Free Fire" width="120px">
                            <h3 class="text-title">Nạp Kim Cương - Free Fire</h3>
                        </a>
                    </div>
                    <div class="item image">
                        <a href="/dich-vu/nap-kim-cuong-free-fire">
                            <img src="https://napgamegiare.net/assets/frontend/{{theme('')->theme_key}}/image/FAvf7Eh36I_1625567566.jpg" alt="Nạp Kim Cương - Free Fire" width="120px">
                            <h3 class="text-title">Nạp Kim Cương - Free Fire</h3>
                        </a>
                    </div>
                    <div class="item image">
                        <a href="/dich-vu/nap-kim-cuong-free-fire">
                            <img src="https://napgamegiare.net/assets/frontend/{{theme('')->theme_key}}/image/FAvf7Eh36I_1625567566.jpg" alt="Nạp Kim Cương - Free Fire" width="120px">
                            <h3 class="text-title">Nạp Kim Cương - Free Fire</h3>
                        </a>
                    </div>
                    <div class="item image">
                        <a href="/dich-vu/nap-kim-cuong-free-fire">
                            <img src="https://napgamegiare.net/assets/frontend/{{theme('')->theme_key}}/image/FAvf7Eh36I_1625567566.jpg" alt="Nạp Kim Cương - Free Fire" width="120px">
                            <h3 class="text-title">Nạp Kim Cương - Free Fire</h3>
                        </a>
                    </div> <div class="item image">
                        <a href="/dich-vu/nap-kim-cuong-free-fire">
                            <img src="https://napgamegiare.net/assets/frontend/{{theme('')->theme_key}}/image/FAvf7Eh36I_1625567566.jpg" alt="Nạp Kim Cương - Free Fire" width="120px">
                            <h3 class="text-title">Nạp Kim Cương - Free Fire</h3>
                        </a>
                    </div>



                </div>
            </div>

        </div>



    </div><!-- /.container -->
</section>

<script>

    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    }

    $(".noty-pass .checkbox label").click(function () {
        alert();
        if ($("#check-pass").prop("checked") == false) {
            $("#check-pass").prop({checked: true});
            $("input#password").attr("type", "text");
        } else {
            $("#check-pass").prop({checked: false});
            $("input#password").attr("type", "password");
        }
    });
    $('.modal-auth').css('padding-left', 0)


    $(document).ready(function () {


        $('#modal-register').on('show.bs.modal', function () {

            $('.panel-register').show();
            $('.panel-register-success').hide();
        });

        $('#formRegister').submit(function (e) {
            e.preventDefault();
            var formSubmit = $(this);
            var url = formSubmit.attr('action');
            var btnSubmit = formSubmit.find(':submit');
            btnSubmit.text('Đang xử lý...');
            btnSubmit.prop('disabled', true);

            $.ajax({
                type: "POST",
                url: url,
                data: formSubmit.serialize(), // serializes the form's elements.
                beforeSend: function (xhr) {

                },
                success: function (response) {
                    if (response.success) {
                        formSubmit.find('.notify-error').text(response.message);
                        setTimeout(location.reload.bind(location), 1000);

                        // formSubmit[0].reset();
                        // $('.panel-register').hide();
                        // $('.panel-register-success').show();
                    }
                },
                error: function (response) {
                    if (response.status === 422 || response.status === 429) {
                        let errors = response.responseJSON.errors;

                        jQuery.each(errors, function (index, itemData) {
                            console.log(itemData);
                            formSubmit.find('.notify-error').text('');
                            formSubmit.find('.notify-error').text(itemData[0]);
                            return false; // breaks
                        });
                    } else {
                        alert('Kết nối với hệ thống thất bại.Xin vui lòng thử lại');

                    }
                },
                complete: function (data) {
                    btnSubmit.text('Đăng ký');
                    btnSubmit.prop('disabled', false);
                }
            });

        });
        //login
        $('#formLogin').submit(function (e) {

            e.preventDefault();

            var formSubmit = $(this);
            var url = formSubmit.attr('action');
            var btnSubmit = formSubmit.find(':submit');
            btnSubmit.text('Đang xử lý...');
            btnSubmit.prop('disabled', true);

            $.ajax({
                type: "POST",
                url: url,
                data: formSubmit.serialize(), // serializes the form's elements.
                beforeSend: function (xhr) {

                },
                success: function (response) {
                    if (response.success) {
                        window.location.reload();
                    }
                },
                error: function (response) {
                    if (response.status === 422 || response.status === 429) {
                        let errors = response.responseJSON.errors;

                        jQuery.each(errors, function (index, itemData) {
                            formSubmit.find('.notify-error').text('');
                            formSubmit.find('.notify-error').text(itemData[0]);
                            formSubmit.find('#password').text('');
                            return false; // breaks
                        });
                    } else {
                        alert('Kết nối với hệ thống thất bại.Xin vui lòng thử lại');

                    }
                },
                complete: function (data) {
                    btnSubmit.text('Đăng nhập');
                    btnSubmit.prop('disabled', false);
                }
            });

        });

        //login
        $('#formForgot').submit(function (e) {


            e.preventDefault();

            var formSubmit = $(this);
            var url = formSubmit.attr('action');
            var btnSubmit = formSubmit.find(':submit');
            btnSubmit.text('Đang xử lý...');
            btnSubmit.prop('disabled', true);

            $.ajax({
                type: "POST",
                url: url,
                data: formSubmit.serialize(), // serializes the form's elements.
                beforeSend: function (xhr) {

                },
                success: function (response) {
                    if (response.success) {
                        formSubmit.find('.notify-success').text(response.message);
                    } else {
                        formSubmit.find('.notify-error').text(response.message);
                    }
                },
                error: function (response) {
                    if (response.status === 422 || response.status === 429) {
                        let errors = response.responseJSON.errors;

                        jQuery.each(errors, function (index, itemData) {

                            formSubmit.find('.notify-error').text('');
                            formSubmit.find('.notify-error').text(itemData[0]);
                            return false; // breaks
                        });
                    } else {
                        formSubmit.find('.notify-error').text('Kết nối với hệ thống thất bại.Xin vui lòng thử lại');
                    }
                },
                complete: function (data) {
                    btnSubmit.text('Xác nhận');
                    btnSubmit.prop('disabled', false);
                }
            });

        });
    });
</script>

<script>

    $(document).ready(function () {
        $('#btnPurchase').click(function () {

            $('#homealert').modal('show');
        });


        GetAmount();
        $("#telecom_key").on('change', function () {
            GetAmount();

        });

        $("#amount").on('change', function () {
            UpdatePrice();
        });

        $("#quantity").on('change', function () {
            UpdatePrice();
        });

        function GetAmount() {

            var telecom_key = $("#telecom_key").val();
            var getamount = $.get("/mua-the/get-amount?telecom_key=" + telecom_key, function (data, status) {

                $("#amount").find('option').remove();
                $("#amount").html(data).val($("#amount option:first").val());
                ;
                UpdatePrice();
            }).done(function () {

            }).fail(function () {

                alert("Không tìm thấy mệnh giá phù hợp");
            })
        }

        function UpdatePrice() {
            var amount = $("#amount").val();
            var ratio = $('#amount option:selected').attr('rel-ratio');
            var quantity = $("#quantity").val();

            if (amount == '' || amount == null || ratio == '' || ratio == null || quantity == '' || quantity == null) {

                $('#txtPrice').html('Tổng: ' + 0 + ' VNĐ');
                $('#txtPrice').removeClass().addClass('bounceIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                    $(this).removeClass();
                });
                console.log('amount:' + amount);
                console.log('ratio:' + ratio);
                console.log('quantity:' + quantity);
                return;
            }


            if (ratio <= 0 || ratio == "" || ratio == null) {
                ratio = 100;
            }

            var sale = amount - (amount * ratio / 100);

            var total = (amount - sale) * quantity;
            $('#txtPrice').html('Tổng: ' + total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' VNĐ');
            $('#txtPrice').removeClass().addClass('bounceIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                $(this).removeClass();
            });

        }

    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.xt').click(function () {
            $('.content_bvct').css('height', 'unset');
            $('.xt').hide();
        });




        $('.expand-button').on('click', function() {

            $('.special-text').toggleClass('-expanded');

            if ($('.special-text').hasClass('-expanded')) {
                $('.expand-button').html('Thu gọn nội dung');
            } else {
                $('.expand-button').html('Xem thêm nội dung');
            }
        });
    });


</script>

<script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "101990968825701");
    chatbox.setAttribute("attribution", "biz_inbox");

    window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v11.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
@endsection

<!-- Messenger Plugin chat Code -->
<div id="fb-root"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "101990968825701");
    chatbox.setAttribute("attribution", "biz_inbox");

    window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v11.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script><div id="m_scroll_top" class="m-scroll-top">
    <i class="fas fa-arrow-up"></i>
</div>


<style>
    .m-scroll-top.show {
        display: block;
    }
    .m-scroll-top {
        width: 40px;
        height: 40px;
        position: fixed;
        bottom: 120px;
        right: 20px;
        cursor: pointer;
        text-align: center;
        vertical-align: middle;
        display: none;
        padding-top: 9px;
        z-index: 110;
        border-radius: 100%;
        background-color: #fff;
        box-shadow: 0 2px 6px 0 rgb(0 0 0 / 20%), 0 1px 1px 0 rgb(0 0 0 / 20%);
    }
</style>



<!-- Modal -->
<div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">


            <div class="modal-header">
                <div class="col-1"></div>
                <div class="col-10 text-center"><h6 class="modal-title">Đăng nhập</h6></div>
                <div class="col-1 ">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>

            <div class="modal-body">
                <form id="formLogin" action="/login" method="POST">
                    <input type="hidden" name="_token" value="1d1UtKProIOHCYvd7GjOQ1mwzvuWei6FP3awwoKP">
                    <div class=" text-center">
                        <div class="my-4 text-center">
                            <b class="text-danger"></b>
                            <span class="help-block text-danger notify-error">
                                                               <strong></strong>
                                                        </span>
                        </div>

                    </div>
                    <div class="form-group">
                        <label>Tài khoản hoặc email</label>
                        <input type="text" class="form-control"
                               placeholder="Tài khoản hoặc email" name="username">
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="password" id="password" class="form-control" autocomplete="off"
                               placeholder="Nhập mật khẩu" name="password">
                    </div>

                    <div class="form-row form-group">
                        <div class="col-6">
                            <label class="form-check-label">
                                <input class="" type="checkbox" name="remember"> Ghi nhớ
                            </label>

                        </div>
                        <div class="col-6 text-right">
                            <a class="btn-a-forgot text-right" href="#" style="color:#007bff;">Bạn quên mật khẩu?</a>
                        </div>

                    </div>


                    <button type="submit" class="btn btn-primary btn-block"><span
                            class="glyphicon glyphicon-off"></span> Đăng nhập
                    </button>


                    <div class="modal-bottom" style="margin-top: 15px">
                        <p class="text-center">
                            <a href="http://fb.nhapnick.com/napgamegiare_net"class="btn  btn-social btn-facebook btn-flat d-inline-block" style="margin-bottom:5px"><img
                                    src="/assets/frontend/images/facebook-icon.png" alt="" width="32px" height="32px"></a>
                        </p>
                        <p class="text-center">
                            Bạn chưa có tài khoản. <a class="btn-a-register" href="#" data-dismiss="modal"
                                                      data-toggle="modal" data-target="#modal-register"
                                                      style="color:#007bff">Đăng kí ngay !</a>
                        </p>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modal-register" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">


            <div class="modal-header">
                <div class="col-1"></div>
                <div class="col-10 text-center"><h6 class="modal-title">Đăng ký</h6></div>
                <div class="col-1 ">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>

            <div class="modal-body">
                <form id="formRegister" action="/register" method="POST">
                    <input type="hidden" name="_token" value="1d1UtKProIOHCYvd7GjOQ1mwzvuWei6FP3awwoKP">
                    <div class=" text-center">
                        <div class="my-4 text-center">
                            <b class="text-danger"></b>
                            <span class="help-block text-danger notify-error">
                                                               <strong></strong>
                                                        </span>
                        </div>

                    </div>
                    <div class="form-group">
                        <label>Tài khoản <span style="color: red">(*)</span></label>

                        <input type="text" class="form-control" autocomplete="off" placeholder="Tài khoản"
                               value="" name="username">
                    </div>


                    <div class="form-row">

                        <div class="form-group col-md-6 ">
                            <label>Mật khẩu <span style="color: red">(*)</span></label>
                            <input type="password" class="form-control" autocomplete="off" placeholder="Mật khẩu"
                                   value="" name="password">
                        </div>
                        <div class="form-group col-md-6 ">
                            <label>Xác nhân mật khẩu <span style="color: red">(*)</span></label>
                            <input type="password" class="form-control" autocomplete="off"
                                   placeholder="Xác nhận mật khẩu" name="password_confirmation">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Email <span style="color: red">(*)</span></label>
                        <input type="email" class="form-control" autocomplete="off"
                               value="" placeholder="Email" name="email">

                    </div>
                    <div class="form-group">
                        <label>Số điện thoại <span style="color: red">(*)</span></label>
                        <input type="text" class="form-control" autocomplete="off"
                               value="" placeholder="Số điện thoại" maxlength="11"
                               name="phone">
                    </div>


                    <button type="submit" class="btn btn-primary btn-block"><span
                            class="glyphicon glyphicon-off"></span> Đăng ký
                    </button>


                    <div class="modal-bottom">
                        <p class="text-center" style="margin-top: 15px">
                            Đã có tài khoản. <a class="btn-a-login" href="#" data-dismiss="modal" data-toggle="modal"
                                                data-target="#modal-login" style="color:#007bff">Đăng nhập tại đây !</a>
                        </p>
                    </div>


                </form>
            </div>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-atm" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <form method="POST" action="https://napgamegiare.net/mua-the" accept-charset="UTF-8" enctype="multipart/form-data"><input name="_token" type="hidden" value="1d1UtKProIOHCYvd7GjOQ1mwzvuWei6FP3awwoKP">


                <div class="modal-header">
                    <div class="col-1"></div>
                    <div class="col-10 text-center"><h6 class="modal-title">Nạp tiền từ ATM/Ví điện tử</h6></div>
                    <div class="col-1 ">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="c-content-tab-4 c-opt-3" role="tabpanel">


                        <!--<div class="text-center" style="text-transform: uppercase;margin: 20px 0;"><a href="/huong-dan-mua-nick-bang-atm-tai-nickvn" style="color: #f31700 !important;font-size: 15px">Hướng dẫn chi tiết nạp tiền từ ATM - VÍ Tại đây</a></div>-->
                        <ul class="nav  justify-content-center atm-control" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#bank" role="tab" data-toggle="tab" class="c-font-16 active"  aria-expanded="true">ATM</a>
                            </li>
                            <li role="presentation" class="">
                                <a href="#wallet" role="tab" data-toggle="tab" class="c-font-16" aria-expanded="false">Ví điện tử</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in show" id="bank">
                                <div>
                                    <p style="text-align:center"><strong>&gt;&gt; <a href="https://napgamegiare.net/tin-tuc/huong-dan-nap-tien-vao-website-napgamegiarenet"><span style="color:#2980b9">Hướng dẫn nạp&nbsp;Game&nbsp;bằng ATM</span></a> &lt;&lt;</strong></p>

                                    <table align="center" border="1" cellpadding="10" cellspacing="1" class="table table-bordered table-striped">
                                        <tbody>
                                        <tr>
                                            <th colspan="2">T&ecirc;n chủ khoản: TRẦN VĂN SƠN</th>
                                            <th>Chi nh&aacute;nh</th>
                                        </tr>
                                        <tr>
                                            <td><strong>Vietcombank</strong></td>
                                            <th style="text-align:right"><strong>0491000165748</strong></th>
                                            <td style="text-align:center"><strong>H&Agrave; NỘI</strong></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Agribank</strong></td>
                                            <th style="text-align:right"><strong>1507205852938</strong></th>
                                            <td style="text-align:center"><strong>H&Agrave; NỘI</strong></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Techcombank</strong></td>
                                            <th style="text-align:right"><strong>19032691413020</strong></th>
                                            <td style="text-align:center"><strong>H&Agrave; NỘI</strong></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Mbbank</strong></td>
                                            <th style="text-align:right"><strong>0080114849007</strong></th>
                                            <td style="text-align:center"><strong>H&Agrave; NỘI</strong></td>
                                        </tr>
                                        <tr>
                                            <td><strong>VietinBank</strong></td>
                                            <th style="text-align:right"><strong>100873246867</strong></th>
                                            <td style="text-align:center"><strong>H&Agrave; NỘI</strong></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="tut-charge" style="background-color: #ffffff;padding-top: 15px">
                                    <p style="text-align:center"><span style="color:#000000">Nội dung thanh to&aacute;n:&nbsp;<strong>&nbsp;napgamegiare.net&nbsp;+&nbsp;{ID web hoặc T&ecirc;n TK đăng k&yacute;}</strong></span></p>

                                    <p style="text-align:center"><span style="color:#000000">Chuyển xong li&ecirc;n hệ fanpage :&nbsp;</span><u><a href="https://www.facebook.com/Na%CC%A3p-all-game-online-uy-ti%CC%81n-gia%CC%81-re%CC%89-101990968825701" target="_blank"><span style="color:#c0392b"><strong>Chăm S&oacute;c Kh&aacute;ch H&agrave;ng</strong></span></a></u><span style="color:#000000">&nbsp;hoặc Hotline&nbsp;<strong>0792.000.792</strong>&nbsp;để được xử l&yacute;</span></p>
                                </div>


                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="wallet">
                                <div>
                                    <p style="text-align:center"><strong>&gt;&gt; <a href="https://napgamegiare.net/tin-tuc/huong-dan-nap-tien-vao-website-napgamegiarenet"><span style="color:#2980b9">Hướng dẫn nạp&nbsp;Game&nbsp;bằng V&iacute; Điện Tử</span></a> &lt;&lt;</strong></p>

                                    <table align="center" border="1" cellpadding="10" cellspacing="1" class="table table-bordered table-striped">
                                        <tbody>
                                        <tr>
                                            <td><strong>Tsr (thesieure.com)</strong></td>
                                            <td style="text-align:center"><strong>dichvume</strong></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Azpro ( azpro.vn)</strong></td>
                                            <td style="text-align:center"><strong>dichvume</strong></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tut-charge" style="background-color: #ffffff;padding-top: 15px">
                                    <p style="text-align:center"><span style="color:#000000">Nội dung thanh to&aacute;n:&nbsp;<strong>&nbsp;napgamegiare.net&nbsp;+&nbsp;{ID web hoặc T&ecirc;n TK đăng k&yacute;}</strong></span></p>

                                    <p style="text-align:center"><span style="color:#000000">Chuyển xong li&ecirc;n hệ fanpage :&nbsp;</span><u><a href="https://www.facebook.com/Na%CC%A3p-all-game-online-uy-ti%CC%81n-gia%CC%81-re%CC%89-101990968825701" target="_blank"><span style="color:#c0392b"><strong>Chăm S&oacute;c Kh&aacute;ch H&agrave;ng</strong></span></a></u><span style="color:#000000">&nbsp;hoặc Hotline&nbsp;<strong>0792.000.792</strong>&nbsp;để được xử l&yacute;</span></p>
                                </div>


                            </div>
                        </div>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>

                </div>
            </form>

        </div>
    </div>
</div>











<script type="text/javascript" src="/assets/frontend/plugins/slick/slick.min.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script type="text/javascript" src="/assets/frontend/js/script.js"></script>






</body>
</html>


