@extends('frontend.layouts.master')
@section('content')
<section>
    <div class="container">

        <nav aria-label="breadcrumb" style="margin-top: 10px;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="/dich-vu">Dịch vụ</a></li>

                <li class="breadcrumb-item active" aria-current="page">Mua Ngọc - NRO</li>
            </ol>
        </nav>

        <div class="c-content-box c-size-lg c-overflow-hide c-bg-white font-roboto">
            <div class="notify">

            </div>
            <div class="text-center" style="margin-bottom: 30px;margin-top: 50px;">
                <h1 style="font-size: 1.5rem;font-weight: bold;text-transform: uppercase">Mua Ngọc - NRO</h1>




            </div>
            <form method="POST" action="https://napgamegiare.net/dich-vu/1802/purchase" accept-charset="UTF-8" class="" enctype="multipart/form-data"><input name="_token" type="hidden" value="1d1UtKProIOHCYvd7GjOQ1mwzvuWei6FP3awwoKP">
                <div class="detail-service">


                    <div class="row">

                        <div class="col-md-3">
                            <div class="news_image text-center">
                                <img src="/assets/frontend/{{theme('')->theme_key}}/image/WzYVBBnHTM_1625903140.jpg" alt="Mua Ngọc - NRO">
                            </div>
                        </div>
                        <div class="col-md-5" style="margin-bottom:20px;">

                            <div class="config">


                                <div class="form-group">
                                    <label>Chọn máy chủ:</label>


                                    <select name="server[]" class="server-filter form-control t14" style="">
                                        <option value="0">Vũ trụ 1  </option>
                                        <option value="1">Vũ trụ 2  </option>
                                        <option value="2">Vũ trụ 3  </option>
                                        <option value="3">Vũ trụ 4  </option>
                                        <option value="4">Vũ trụ 5  </option>
                                        <option value="5">Vũ trụ 6  </option>
                                        <option value="6">Vũ trụ 7  </option>
                                        <option value="7">Vũ trụ 8  </option>
                                        <option value="8">Vũ trụ 9  </option>
                                    </select>

                                </div>






                                <div class="form-group">
                                    <label>Nhập số tiền cần mua:</label>
                                    <input
                                        value="20000"
                                        class="form-control t14 price " id="input_pack" type="text" placeholder="Số tiền">
                                    <span style="font-size: 13px;margin-top: 5px;display: block">Số tiền thanh toán phải từ <b style="font-weight:bold;">20,000đ</b>  đến <b style="font-weight:bold;">200,000đ</b> </span>
                                </div>















                                <div class="form-group">
                                    <label>Tài khoản:</label>



                                    <input type="text" class="form-control" required name="customer_data0"
                                           placeholder="Tài khoản" value="">


                                </div>



                                <div class="form-group">
                                    <label>Mật khẩu:</label>



                                    <input type="password" required class="form-control" name="customer_data1"
                                           placeholder="Mật khẩu">
                                </div>





                            </div>
                        </div>
                        <div class="col-md-4">

                            <div class="">
                                <input type="hidden" name="selected" value="">
                                <input type="hidden" name="server">
                                <a id="txtPrice" style="font-size: 20px;font-weight: bold;display: block;margin-bottom: 15px"
                                   class="btn btn-success">Tổng: 0 Xu</a>
                                <button id="btnPurchase" type="button" style="font-size: 18px;font-weight: bold;display: block;margin-bottom: 15px;cursor: pointer" class="btn-auth" ><i class="fa fa-credit-card"
                                                                                                                                                                                         aria-hidden="true"></i> Thanh toán
                                </button>
                            </div>

                            <div class="row"
                                 style="color: #505050;padding:20px;line-height: 2;margin-top: 30px">
                                <p><strong>BẢNG GI&Aacute; NGỌC:&nbsp;</strong></p>

                                <p><strong>Sever 1-8&nbsp;x6.1&nbsp;(100k =&nbsp;610&nbsp;Ngọc).&nbsp;Đ&atilde; Mở B&aacute;n All Server</strong></p>

                                <p><strong>Y&ecirc;u cầu khi mua&nbsp;hồng ngọc:</strong></p>

                                <p><strong>+) Nh&acirc;n vật đứng sẵn tại Si&ecirc;u Thị.&nbsp;</strong></p>

                                <p><strong>+) Để &iacute;t nhất&nbsp;1 ngọc xanh&nbsp;hoặc&nbsp;1 hồng ngọc&nbsp;trong nick v&agrave; tho&aacute;t nick trước khi mua&nbsp;hồng ngọc</strong></p>

                                <p><strong>+) Kh&ocirc;ng kh&oacute;a m&atilde; bảo vệ</strong></p>

                                <p><strong>+) H&agrave;nh trang c&oacute; 2 chỗ trống</strong></p>

                                <p><strong>+) Sử dụng&nbsp;phi&ecirc;n bản game 196 trở l&ecirc;n</strong></p>

                                <p><strong>Lưu &yacute; : Nick bạn phải thỏa m&atilde;n đủ tất cả 5&nbsp;y&ecirc;u cầu mới c&oacute; thể nhận&nbsp;hồng ngọc. Nếu kh&ocirc;ng đủ y&ecirc;u cầu hệ thống sẽ tự động ho&agrave;n ti&ecirc;n v&agrave;o t&agrave;i khoản của bạn</strong></p>

                                <p><strong>Mua&nbsp;hồng ngọc&nbsp;sẽ bị chịu ph&iacute; 5% từ cửa h&agrave;ng k&iacute; gửi : mua 100&nbsp;hồng ngọc&nbsp;th&igrave; sẽ nhận được 95&nbsp;hồng ngọc&nbsp;trong t&agrave;i khoản&nbsp;</strong></p>

                                <p><strong>Ngo&agrave;i ra, c&aacute;c bạn c&oacute; thể&nbsp;<a href="https://napgamegiare.net/mua-the"><span style="color:#e67e22">mua thẻ Carot</span></a><span style="color:#e67e22">&nbsp;</span>gi&aacute; rẻ với chiết khấu l&ecirc;n đến 18%&nbsp;<a href="https://napgamegiare.net/mua-the">tại đ&acirc;y</a></strong></p>
                            </div>

                        </div>
                    </div>
                </div>


                <!-- Modal -->
                <div class="modal fade" id="homealert" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">


                            <div class="modal-header">
                                <div class="col-1"></div>
                                <div class="col-10 text-center"><h6 class="modal-title">Xác nhận thanh toán</h6></div>
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


                                <button type="submit"
                                        class="btn btn-success c-theme-btn c-btn-square c-btn-uppercase c-btn-bold loading" id="d3"
                                        style="">Xác nhận thanh toán
                                </button>



                                <button type="button"
                                        class="btn btn-danger c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase"
                                        data-dismiss="modal">Đóng
                                </button>

                            </div>

                        </div>
                    </div>
                </div>




            </form>

            <div class="job-wide-devider">






                <div class="description">
                    <h2 style="margin-bottom: 23px;font-size: 20px;text-transform: uppercase;">
                        Mô tả</h2>
                </div>
                <div class="row">
                    <div class="col-lg-12 column">
                        <div class="job-details">

                            <div class="article-content content_post ">
                                <div class="special-text">
                                    <table align="center" border="1" cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <tbody>
                                        <tr>
                                            <td><span style="font-size:16px">✅ Mua ngọc uy t&iacute;n</span></td>
                                            <td><span style="font-size:16px"><strong>⭐</strong>Ngọc sạch 100% c&oacute; x&aacute;c nhận từ NPH TeaMobi gửi về thư</span></td>
                                        </tr>
                                        <tr>
                                            <td><span style="font-size:16px">✅ Mua ngọc gi&aacute; rẻ</span></td>
                                            <td><span style="font-size:16px"><strong>⭐</strong>Gi&aacute; rẻ nhất thị trường, ưu đ&atilde;i hơn so với nạp bằng thẻ Carot v&agrave; SMS</span></td>
                                        </tr>
                                        <tr>
                                            <td><span style="font-size:16px">✅ Mua ngọc nhanh</span></td>
                                            <td><span style="font-size:16px"><strong>⭐</strong>Chỉ 30s sau khi thanh to&aacute;n l&agrave; ngọc đ&atilde; c&oacute; trong t&agrave;i khoản</span></td>
                                        </tr>
                                        <tr>
                                            <td><span style="font-size:16px">✅ Mua ngọc an to&agrave;n</span></td>
                                            <td><span style="font-size:16px"><strong>⭐</strong>C&aacute;c giao dịch mua ngọc được m&atilde; h&oacute;a 100%, đảm bảo về bảo mật t&agrave;i khoản kh&aacute;ch h&agrave;ng</span></td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:16px"><strong>Ngọc </strong>l&agrave; một đơn vị tiền tệ trong game<strong> Ngọc Rồng Online</strong>&nbsp;- Tr&ograve; chơi trực tuyến với cốt truyện xoay quanh bộ truyện tranh 7 vi&ecirc;n Ngọc Rồng. Người chơi sẽ h&oacute;a thanh th&agrave;nh một trong những anh h&ugrave;ng của 3 h&agrave;nh tinh: Tr&aacute;i Đất, Xayda, Namếc. C&ugrave;ng luyện tập, tăng cường sức mạnh v&agrave; kỹ năng. Đo&agrave;n kết c&ugrave;ng chiến đấu chống lại c&aacute;c thế lực hung &aacute;c. Game Ngọc Rồng Online hỗ trợ nạp ngọc trực tiếp qua thẻ Vinaphone, Mobifone, Viettel, Gate, Carot.&nbsp;</span></span></p>

                                    <p><span style="font-size:16px">L&agrave;m sao&nbsp;để c&oacute; thật nhiều ngọc&nbsp;với gi&aacute; rẻ nhất&nbsp;th&igrave; lại l&agrave; c&acirc;u hỏi của&nbsp;nhiều người chơi game cần đ&aacute;p &aacute;n. Vậy để&nbsp;c&oacute; ngọc&nbsp;trong nro với gi&aacute; rẻ&nbsp;th&igrave; phải l&agrave;m ra sao ? Ngo&agrave;i c&aacute;ch&nbsp;<a href="https://muathengay.com/">mua thẻ carot</a>&nbsp;để nạp&nbsp;trực tiếp, c&aacute;c bạn c&ograve;n c&oacute; một lựa chọn kh&aacute;c đ&oacute; l&agrave;&nbsp;<em><strong>Mua ngọc nro gi&aacute; rẻ</strong></em>&nbsp;tại website nạp game gi&aacute; rẻ, uy t&iacute;n.&nbsp;Để mua ngọc nro&nbsp;gi&aacute; rẻ bạn cần phải t&igrave;m những địa chỉ&nbsp;<em><strong>b&aacute;n&nbsp;ngọc nro&nbsp;gi&aacute; rẻ, uy t&iacute;n</strong></em>.</span></p>

                                    <p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:16px">Một trong những địa chỉ <strong>nạp ngọc game Ngọc Rồng Online</strong> gi&aacute; rẻ v&agrave; uy t&iacute;n cao được nhiều game thủ v&agrave; c&aacute;c youtuber nhắc đến nhiều trong thời gian qua đ&oacute; ch&iacute;nh l&agrave; web <a href="https://napgamegiare.net/">napgamegiare.net</a>. Tại đ&acirc;y ch&uacute;ng t&ocirc;i cam kết l&agrave; <strong>shop b&aacute;n ngọc uy t&iacute;n v&agrave; gi&aacute; rẻ số 1 tại Việt Nam</strong> hiện nay.&nbsp;</span></span></p>

                                    <p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:16px">Giao diện của trang web hiện đại v&agrave; đơn giản, kh&aacute;ch h&agrave;ng c&oacute; thể thực hiện thao t&aacute;c&nbsp;nhanh gọn lẹ để ho&agrave;n th&agrave;nh giao dịch mua ngọc. Tất cả qu&aacute; tr&igrave;nh từ khi giao dịch đến khi bạn nhận được ngọc sẽ kh&ocirc;ng qu&aacute; 30 gi&acirc;y quy đổi tương ứng với số ngọc v&agrave;o ngay t&agrave;i khoản game. Shop b&aacute;n ngọc của ch&uacute;ng t&ocirc;i đảm bạn với bạn tất cả số lượng ngọc được b&aacute;n ra l&agrave; an to&agrave;n 100% v&igrave; ch&uacute;ng t&ocirc;i l&agrave; đại l&yacute; b&aacute;n ngọc nro được ủy quyền từ&nbsp;</span></span><span style="font-size:16px">NPH TeaMobi.</span></p>

                                    <p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:16px">Những g&oacute;i giao dịch của ch&uacute;ng t&ocirc;i rất đa dạng với tất cả 9 m&aacute;y chủ của game Ngọc Rồng Online. Từ g&oacute;i giao dịch nhỏ nhất với mức gi&aacute; 20000 đồng, bạn đ&atilde; c&oacute; thể sở hữu 150 ngọc. Sau khi lựa chọn được g&oacute;i ngọc ph&ugrave; hợp với nhu cầu bạn chỉ cần nạp, đặt h&agrave;ng v&agrave; thanh to&aacute;n online. Shop ch&uacute;ng t&ocirc;i c&oacute; những y&ecirc;u cầu đối với kh&aacute;ch h&agrave;ng khi mua ngọc:</span></span></p>

                                    <ul>
                                        <li>
                                            <p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:16px">Nh&acirc;n vật đứng sẵn tại Si&ecirc;u Thị.&nbsp;</span></span></p>
                                        </li>
                                        <li>
                                            <p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:16px">Để &iacute;t nhất 1 ngọc trong nick v&agrave; tho&aacute;t nick trước khi mua ngọc&nbsp;</span></span></p>
                                        </li>
                                        <li>
                                            <p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:16px">Kh&ocirc;ng kh&oacute;a m&atilde; bảo vệ</span></span></p>
                                        </li>
                                        <li>
                                            <p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:16px">H&agrave;nh trang c&oacute; 2 chỗ trống</span></span></p>
                                        </li>
                                    </ul>

                                    <p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:16px">Đặc biệt bạn cần lưu &yacute; nick bạn phải thỏa m&atilde;n đủ tất cả 4 y&ecirc;u cầu mới c&oacute; thể nhận ngọc sau khi giao dịch với ch&uacute;ng t&ocirc;i. Nếu kh&ocirc;ng đủ y&ecirc;u cầu của trang web, hệ thống của ch&uacute;ng t&ocirc;i sẽ tự động ho&agrave;n tiền lại v&agrave;o t&agrave;i khoản của bạn. N&ecirc;n bạn kh&ocirc;ng cần phải lo tới vấn đề mất tiền m&agrave; kh&ocirc;ng c&oacute; ngọc trong t&agrave;i khoản. Th&ecirc;m nữa, khi mua ngọc c&aacute;c bạn sẽ bị chịu ph&iacute; 5% từ cửa h&agrave;ng k&yacute; gửi v&igrave; vậy nếu bạn mua 100 ngọc th&igrave; sẽ nhận được 95 ngọc trong t&agrave;i khoản.&nbsp;</span></span></p>

                                    <p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:16px">Đội ngũ nh&acirc;n vi&ecirc;n l&agrave;m 24/7/365 để phục vụ kh&aacute;ch h&agrave;ng mọi l&uacute;c, mọi nơi. Th&ecirc;m v&agrave;o đ&oacute; trang web napgamegiare.net bạn c&oacute; thể thực hiện mua ngọc game Ngọc Rồng Online với nhiều h&igrave;nh thức thanh to&aacute;n đa dạng ph&ugrave; hợp với nhu cầu v&agrave; khả năng của bạn. Ch&iacute;nh v&igrave; vậy mọi giao dịch của c&aacute;c bạn sẽ được thực hiện nhanh gọn lẹ v&agrave; số lượng ngọc bạn mua sẽ được chuyển v&agrave;o t&agrave;i khoản của bạn trong khoảng thời gian dưới 30 gi&acirc;y. Ch&uacute;ng t&ocirc;i cam kết tất cả th&ocirc;ng tin kh&aacute;ch h&agrave;ng sẽ được bảo mật 100% bởi những biện ph&aacute;p tối ưu nhất</span></span></p>

                                    <p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:16px">Cảm ơn c&aacute;c bạn đ&atilde; lựa chọn napgamegiare.net để c&oacute; thể nạp game uy t&iacute;n v&agrave; với gi&aacute; được chiết khấu cao nhất nạp Ngọc Rồng Online từ nh&agrave; ph&aacute;t h&agrave;nh.</span></span></p>

                                    <p><span style="color:#ffffff"><span style="font-size:16px"><span style="font-family:Arial,Helvetica,sans-serif">Bạn đang t&igrave;m kiếm:&nbsp;</span>mua ngọc nro,&nbsp;b&aacute;n ngọc nro,&nbsp;mua ngọc ngọc rồng,&nbsp;mua ngọc xanh nro,&nbsp;shop b&aacute;n ngọc nro,&nbsp;gi&aacute; nạp ngọc nro,&nbsp;c&aacute;ch&nbsp;mua ngọc nro,&nbsp;gi&aacute; ngọc nro,&nbsp;mua b&aacute;n ngọc nro, bảng gi&aacute; ngọc nro,&nbsp;mua ngọc xanh ngọc rồng,&nbsp;mua ngọc rồng online,&nbsp;mua ngọc xanh ngọc rồng online,... th&igrave; napgamegiare.net ch&iacute;nh l&agrave; địa chỉ bạn đang t&igrave;m kiếm</span></span></p>
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

            </div>

            <div class="tab-vertical tutorial_area">
                <div class="panel-group" id="accordion">



                </div>
            </div>




            <div class="main-title" style="margin-top: 30px">
                <h2 style="font-size: 20px;text-transform: uppercase;">Các dịch vụ liên quan</h2>
            </div>

            @include('frontend.pages.widget.__dichvu__lienquan')


            <div class="main-title" style="margin-top: 30px">
                <h2 style="font-size: 20px;text-transform: uppercase;">Bình luận</h2>
            </div>

            <div class="entries" style="margin-bottom: 50px">

                <div class="chat comments box-border">
                    <div class="chat-history">
                        <ul class="list-unstyled chat-scroll">

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:30 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    Cứ tưởng lừa đảo, nạp thử 200k nhận luôn kim cương trong 10s
                                </div>
                            </li>

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:30 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    Đã nạp thành công
                                </div>
                            </li>

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:30 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    Web nạp ngon thế này mà giờ mới biết
                                </div>
                            </li>

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:30 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    Vừa chạy ra quán mua 500k thẻ nạp ăn luôn, ngon quá admin
                                </div>
                            </li>

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:30 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    Kim cương sạch, thanks admin
                                </div>
                            </li>

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:30 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    1 vote uy tín cho web nhé, quá ngon luôn
                                </div>
                            </li>

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:31 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    Web được đấy anh em
                                </div>
                            </li>

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:31 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    Nhập nhầm mã thẻ với serial báo admin xử lý trong vòng 1 nốt nhạc, uy tín quá admin ơi
                                </div>
                            </li>

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:31 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    Anh em nào chưa nạp thì vào nạp ngay đi đang có khuyến mại
                                </div>
                            </li>

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:31 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    Uy tín không anh em.
                                </div>
                            </li>

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:31 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    Nạp thử 200k nhận luôn gấp đôi trong 10s
                                </div>
                            </li>

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:31 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    40k kim cương đã về tài khỏa, thanks admin
                                </div>
                            </li>

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:31 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    Có anh em nào vừa từ youtube qua đây nạp k
                                </div>
                            </li>

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:31 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    Web ngon vl
                                </div>
                            </li>

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:31 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    Vừa nạp 100k xong
                                </div>
                            </li>

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:31 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    Anh em không phải sợ đâu, tôi nạp nhiều web này rồi
                                </div>
                            </li>

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:31 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    Nghe anh em review ngon quá, tôi ra làm cái thẻ 500k nạp đây
                                </div>
                            </li>

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:31 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    Web được đấy anh em
                                </div>
                            </li>


                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:31 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    Đã nạp ở đây 20tr tiền thẻ, vote uy tín nhé
                                </div>
                            </li>

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:31 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    Vãi vừa ấn nạp xong vào game có quà ngay, ngon:v
                                </div>
                            </li>

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:31 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    Đã nạp thành công
                                </div>
                            </li>

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:31 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    Vote 10000k sao nhé, quá uy tín
                                </div>
                            </li>

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:31 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    Vừa nạp xong, quá ngon
                                </div>
                            </li>

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:31 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    Ngon vcl, +1 sao cho admin
                                </div>
                            </li>

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:31 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    Cứ tưởng không được, nạp thử 200k nhận luôn kim cương trong 10s
                                </div>
                            </li>

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:31 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    Web được đấy anh em
                                </div>
                            </li>

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:31 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    Vãi vừa ấn nạp xong vào game có quà ngay, AK47 LV3 vĩnh viễn :v
                                </div>
                            </li>

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:31 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    Vote 10000k sao nhé, quá uy tín
                                </div>
                            </li>

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:31 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    Uy tín nhé anh em
                                </div>
                            </li>

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:31 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    Có anh em nào vừa từ youtube qua đây nạp k
                                </div>
                            </li>

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:31 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    Không scam, web nạp xong ngon đấy !
                                </div>
                            </li>

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:31 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    Đã nhận AK47 rồng xanh lv5 thanks admin
                                </div>
                            </li>

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:31 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    Nghe anh em review ngon quá, tôi ra làm cái thẻ 500k nạp đây
                                </div>
                            </li>

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:31 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    Vote 10000k sao nhé, quá uy tín
                                </div>
                            </li>

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:31 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    Đã nạp ,dịch vụ ok. nạp thêm phát nữa
                                </div>
                            </li>

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:32 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    Đã nạp thành công
                                </div>
                            </li>

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:32 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    Đã đã về tài khỏa, thanks admin
                                </div>
                            </li>

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:32 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    Đã nạp và thấy ngon ngọt nhé ae
                                </div>
                            </li>

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:32 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    Vote 10000k sao nhé, quá uy tín
                                </div>
                            </li>

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:32 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    Ngon vcl, +5 sao cho admin
                                </div>
                            </li>

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:32 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    Có anh em nào vừa từ youtube qua đây nạp k
                                </div>
                            </li>

                            <li>
                                <div class="message-data">
                                    <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                                    <span class="message-data-time">4:32 PM, Vừa xong</span>
                                </div>
                                <div class="message my-message">
                                    Nhập nhầm mã thẻ với serial báo admin xử lý trong vòng 1 nốt nhạc, uy tín quá admin ơi
                                </div>
                            </li>
                        </ul>

                        <div class="chat-message clearfix">
                            <textarea name="message-to-send text-right" id="message-to-send" placeholder="Nhập bình luận..." rows="2"></textarea>
                            <button type="button" class="btn-send-message
                                        pill-button">Gửi bình luận</button>
                        </div> <!-- end chat-message -->
                    </div> <!-- end chat -->
                </div>
            </div>

















        </div>
    </div><!-- /.container -->
</section>


<script>

    $(document).ready(function () {
        $('#btnPurchase').click(function () {

            $('#homealert').modal('show');
        });
    });


    function Confirm(index, serverid) {
        $('[name="server"]').val(serverid);
        $('[name="selected"]').val(index);
        $('#btnPurchase').click();
    }

    var data = jQuery.parseJSON('{"input_auto":"1","idkey":null,"image_oldest":"1","seo_description":"Hệ thống bán Ngọc NRO tự động, uy tín, giá rẻ số 1 Việt Nam. Mua Ngọc nhanh gọn, an toàn. Nhận Ngọc trong game chưa đến 30s sau khi thanh toán. Mỗi ngày chúng tôi thực hiện đến 50.000 giao dịch Ngọc cho khách hàng tại shop","server_mode":"1","server_price":"1","server_id":["0","1","2","3","4","5","6","7","8"],"server_data":["Vũ trụ 1","Vũ trụ 2","Vũ trụ 3","Vũ trụ 4","Vũ trụ 5","Vũ trụ 6","Vũ trụ 7","Vũ trụ 8","Vũ trụ 9"],"server_data_minValue":["20000","20000","20000","20000","20000","20000","20000","20000","20000"],"server_data_maxValue":["200000","200000","200000","200000","200000","200000","200000","200000","200000"],"filter_name":"Ngọc","filter_type":"7","input_pack_min":"20000","input_pack_max":"200000","input_pack_rate":"1","id":["7"],"name":["vip 1"],"price0":["20000"],"price1":["20000"],"price2":["20000"],"price3":["20000"],"price4":["20000"],"price5":["20000"],"price6":["20000"],"price7":["20000"],"price8":["20000"],"discount0":["6.1"],"discount1":["6.1"],"discount2":["6.1"],"discount3":["6.1"],"discount4":["6.1"],"discount5":["6.1"],"discount6":["6.1"],"discount7":["6.1"],"discount8":["5"],"total0":["122"],"total1":["122"],"total2":["122"],"total3":["122"],"total4":["122"],"total5":["122"],"total6":["122"],"total7":["122"],"total8":["100"],"day0":["0"],"day1":["0"],"day2":["0"],"day3":["0"],"day4":["0"],"day5":["0"],"day6":["0"],"day7":["0"],"day8":["0"],"punish_price0":["0"],"punish_price1":["0"],"punish_price2":["0"],"punish_price3":["0"],"punish_price4":["0"],"punish_price5":["0"],"punish_price6":["0"],"punish_price7":["0"],"punish_price8":["0"],"praise_day0":["0"],"praise_day1":["0"],"praise_day2":["0"],"praise_day3":["0"],"praise_day4":["0"],"praise_day5":["0"],"praise_day6":["0"],"praise_day7":["0"],"praise_day8":["0"],"praise_price0":["0"],"praise_price1":["0"],"praise_price2":["0"],"praise_price3":["0"],"praise_price4":["0"],"praise_price5":["0"],"praise_price6":["0"],"praise_price7":["0"],"praise_price8":["0"],"send_name":["Tài khoản","Mật khẩu"],"send_type":["1","5"],"send_id0":[null],"send_data0":[null],"send_id1":[null],"send_data1":[null],"input_send_desc":"Khi mua ngọc tại web các bạn lưu ý để trong nick 1 ngọc và đứng tại siêu thị để nhận ngọc nhanh nhé","captcha":null}');



    var purchase_name = 'Ngọc';

    var server = -1;

    $(".server-filter").change(function (elm, select) {
        server = parseInt($(".server-filter").val());
        $('[name="server"]').val(server);
        UpdatePrice();
    });
    server = parseInt($(".server-filter").val());
    $('[name="server"]').val(server);

</script>

<script id="history-template" type="text/x-handlebars-template">
        <tr>
            <td class="text-danger"><b>@{{idCustomer}}</b></td>
            <td class="base-color"><b>@{{txtHistory}}</b></td>
        </tr>
    </script>
<script id="message-template" type="text/x-handlebars-template">
        <li class="clearfix">
            <div class="message-data align-right">
                <span class="message-data-time" > @{{time}} , Vừa xong</span> &nbsp; &nbsp;
                <span class="message-data-name" >Bạn</span> <i class="fa fa-circle me"></i>
            </div>
            <div class="message other-message float-right">
                @{{messageOutput}}            </div>
        </li>
    </script>

<script id="message-response-template" type="text/x-handlebars-template">
        <li>
            <div class="message-data">
                <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                <span class="message-data-time"> @{{time}}, Vừa xong</span>
            </div>
            <div class="message my-message">
                @{{response}}            </div>
        </li>
    </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.0/handlebars.min.js"></script>
<script id="rendered-js">
    (function () {

        var chat = {
            messageToSend: '',
            messageResponses: [
                'Dịch vụ nạp uy tín ghê',
                'Uy tín không anh em.',
                'Vãi vừa ấn nạp xong vào game có ngay (y)',
                'Web uy tín đấy, vừa nạp 500k xong.',
                'Nãy có ông bạn nạp 500k xong vào nạp luôn, quá xịn admin ơi.',
                'Thanks admin <3 , uy tín lắm luôn',
                'Nhanh gọn uy tín, thanks admin',
                'Web xịn không scam nha mọi người',
                'Hàng sạch, thanks admin',
                'Vừa nạp xong, quá ngon',
                'Web ok không anh em, có scam không?',
                'Vừa chạy ra quán mua 500k thẻ nạp ăn luôn, ngon quá admin',
                'Nhập nhầm mã thẻ với serial báo admin xử lý trong vòng 1 nốt nhạc, uy tín quá admin ơi',
                'Cứ tưởng lừa đảo, nạp thử 200k nhận luôn kim cương trong 10s',
                '1 vote uy tín cho web nhé, quá ngon luôn',
                'Bị lừa nhiều rồi, giờ mới tìm được web uy tín, thanks ad',
                'Vừa nạp 100k xong',
                'Web ngon vl',
                'Anh em nào chưa nạp thì vào nạp ngay đi đang có khuyến mại',
                'Uy tín lắm admin',
                'Vote 10000k sao nhé, quá uy tín',
                'Có anh em nào vừa từ youtube qua đây nạp k',
                'Ông em vừa giới thiệu, nạp cái ăn luôn, ngon vc',
                'Uy tín nhé anh em',
                'Đã nạp thành công',
                'Đã nạp ở đây 20tr tiền thẻ, vote uy tín nhé',
                'Web nạp ngon thế này mà giờ mới biết',
                'Đã nạp, nhanh lắm nhé',
                'Ngon vcl, +5 sao cho admin',
                'Nghe anh em review ngon quá, tôi ra làm cái thẻ 500k nạp đây',
                'Không scam, web nạp thật, nhận thật nhé !',
                'Đã nạp và thấy ngon ngọt nhé ae',
                'Web này trùm nạp mẹ rồi',
                'Web được đấy anh em',
                'Thấy web được nhiều anh em nạp rồi, yên tâm nạp hehe',
                'Anh em không phải sợ đâu, tôi nạp nhiều web này rồi',
                'Web xịn không scam nha mọi người'
            ],

            init: function () {
                this.cacheDOM();
                this.bindEvents();
                this.render();
            },
            cacheDOM: function () {
                this.$chatHistory = $('.chat-history');
                this.$button = $('.btn-send-message');
                this.$textarea = $('#message-to-send');
                this.$chatHistoryList = this.$chatHistory.find('ul');
            },
            bindEvents: function () {
                this.$button.on('click', this.addMessage.bind(this));
                this.$textarea.on('keyup', this.addMessageEnter.bind(this));
            },
            render: function () {

                this.scrollToBottom();
                if (this.messageToSend.trim() !== '') {
                    var template = Handlebars.compile($("#message-template").html());
                    var context = {
                        messageOutput: this.messageToSend,
                        time: this.getCurrentTime()
                    };
                    this.$chatHistoryList.append(template(context));
                    this.scrollToBottom();
                    this.$textarea.val('');
                }
                // history-card
                var templateHistoryResponse = Handlebars.compile($("#history-template").html());
                var arrayTelCo = ['VIETTEL', 'VINAPHONE', 'MOBIFONE', 'VIETNAMOBILE', 'ZING'];
                var arrayPrice = ['10.000 đ', '20.000 đ', '30.000 đ', '50.000 đ', '100.000 đ', '200.000 đ', '300.000 đ', '500.000 đ', '1.000.000 đ'];
                var html = '';
                for (var i = 0; i < 10; i++) {
                    var contentHistory = {
                        idCustomer: '******' + Math.floor(100000 + Math.random() * 900000),
                        txtHistory: 'Nạp thành công thẻ ' + arrayTelCo[Math.floor(1 + Math.random() * arrayTelCo.length) - 1] + ' mệnh giá ' + arrayPrice[Math.floor(1 + Math.random() * arrayPrice.length) - 1]
                    }
                    html += templateHistoryResponse(contentHistory);
                }
                $('#tblHistory').html(html);
                setInterval(function () {
                    var html = '';
                    for (var i = 0; i < 10; i++) {
                        var contentHistory = {
                            idCustomer: '******' + Math.floor(100000 + Math.random() * 900000),
                            txtHistory: 'Nạp thành công thẻ ' + arrayTelCo[Math.floor(1 + Math.random() * arrayTelCo.length) - 1] + ' mệnh giá ' + arrayPrice[Math.floor(1 + Math.random() * arrayPrice.length) - 1]
                        }
                        html += templateHistoryResponse(contentHistory);
                    }
                    $('#tblHistory').html(html);
                }, 60000);

                setInterval(function () {
                    // responses
                    var templateResponse = Handlebars.compile($("#message-response-template").html());
                    var contextResponse = {
                        response: this.getRandomItem(this.messageResponses),
                        time: this.getCurrentTime()
                    };
                    this.$chatHistoryList.append(templateResponse(contextResponse));
                    this.scrollToBottom();
                }.bind(this), 5000);
            },

            addMessage: function () {
                this.messageToSend = this.$textarea.val();
                this.render();
            },
            addMessageEnter: function (event) {
                // enter was pressed
                if (event.keyCode === 13) {
                    this.addMessage();
                }
            },
            scrollToBottom: function () {
                $('.chat-scroll').scrollTop($('.chat-scroll')[0].scrollHeight);
            },
            getCurrentTime: function () {
                return new Date().toLocaleTimeString().
                replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3");
            },
            getRandomItem: function (arr) {
                return arr[Math.floor(Math.random() * arr.length)];
            }
        };

        chat.init();

    })();
    //# sourceURL=pen.js
</script>

//dạng nhập tiền thành toán
<script>
    var min = parseInt('20000');
    var max = parseInt('200000');
    $('#txtPrice').html('Tổng: 0 ' + purchase_name);

    function UpdatePrice() {

        var container = $('.m-datatable__body').html('');


        if (data.server_mode == 1 && data.server_price == 1) {

            var s_price = data["price" + server];
            var s_discount = data["discount" + server];
        } else {
            var s_price = data["price"];
        }


        for (var i = 0; i < data.name.length; i++) {

            var price = s_price[i];
            var discount = s_price[i];


            if (s_price != null && s_discount != null) {
                var ptemp = '';

                if (data.length == 1) {
                    ptemp = '<td style="width:180px;" class="m-datatable__cell"> <a class="btn-style border-color" href="/service/purchase/2.html?selected=' + price + '&server=' + server + '">Thanh toán</a> </td> </tr>';
                } else {
                    ptemp = '<td style="width:180px;" class="m-datatable__cell"> <a onclick="Confirm(' + price + ',' + server + ')" class="btn-style border-color">Thanh toán</a> </td> </tr>';
                }
                var temp = '<tr class="m-datatable__row m-datatable__row--even">' +
                    '<td style="width:30px;" class="m-datatable__cell">' + (i + 1) + '</td>' +
                    '<td class="m-datatable__cell">' + data.name[i] + '</td>' +
                    '<td style="width:150px;" class="m-datatable__cell">' + price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' VNĐ</td>' +
                    '<td style="width:250px;" class="m-datatable__cell">' + discount + '</td>' +
                    '<td style="width:180px;" class="m-datatable__cell">' + (parseInt(price * discount / 1000 * data.input_pack_rate)).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' ' + purchase_name + '</td>' + ptemp

                $(temp).appendTo(container);
            }
        }
        UpdateTotal();
    }

    function UpdateTotal() {
        var price = parseInt($('#input_pack').val().replace(/,/g, ''));

        if (typeof price != 'number' || price < min || price > max) {
            $('button[type="submit"]').addClass('not-allow');

            $('#txtPrice').html('Tiền nhập không đúng');
            return;
        } else {
            $('button[type="submit"]').removeClass('not-allow');
        }
        var total = 0;
        var index = 0;
        var current = 0;
        var discount = 0;


        if (data.server_mode == 1 && data.server_price == 1) {

            var s_price = data["price" + server];
            var s_discount = data["discount" + server];
        } else {
            var s_price = data["price"];
            var s_discount = data["discount"];
        }
        for (var i = 0; i < s_price.length; i++) {

            if (price >= s_price[i] && s_price[i] != null) {
                current = s_price[i];
                index = i;
                discount = s_discount[i];
                total = price * s_discount[i];

            }
        }

        total = parseInt(total / 1000 * data.input_pack_rate);

        $('#txtDiscount').val(discount);
        $('#txtPrice').html('Tổng: ' + (total).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " " + purchase_name);
        $('#txtPrice').removeClass().addClass('bounceIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
            $(this).removeClass();
        });
        $('[name="selected"]').val(price);
        $('.m-datatable__body tbody tr.selected').removeClass('selected');
        $('.m-datatable__body tbody tr').eq(index).addClass('selected');
    }

    $('#input_pack').bind('focus keyup', function () {
        UpdateTotal();
    });
    $(document).ready(function () {
        UpdatePrice();
    });

    function ConfirmBuy(value) {
        var index = $('.server-filter').val();
        Confirm(value, index);
    }
</script>

<script>
    $(document).ready(function () {
        $('.load-modal').each(function (index, elem) {
            $(elem).unbind().click(function (e) {
                e.preventDefault();
                e.preventDefault();
                var curModal = $('#LoadModal');
                curModal.find('.modal-content').html("<div class=\"loader\" style=\"text-align: center\"><img src=\"/assets/frontend/images/loader.gif\" style=\"width: 50px;height: 50px;\"></div>");
                curModal.modal('show').find('.modal-content').load($(elem).attr('rel'));
            });
        });
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
@endsection
