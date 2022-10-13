<!DOCTYPE html>
<html lang="vi">

<!-- begin::Head -->
<head>
    <meta charset="utf-8"/>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0, user-scalable=no" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="/assets/frontend/{{theme('')->theme_key}}/css/style.bundle.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/frontend/{{theme('')->theme_key}}/lib/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/frontend/{{theme('')->theme_key}}/css/index.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/frontend/{{theme('')->theme_key}}/css/profile.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/frontend/{{theme('')->theme_key}}/css/blog.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/frontend/{{theme('')->theme_key}}/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/frontend/{{theme('')->theme_key}}/css/style_nam.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/owl-carousel/owl.theme.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/owl-carousel/owl.transitions.css">
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/vendors/vendors.bundle.js" type="text/javascript"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/jquery.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/owl-carousel/slider.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>

</head>
<style>

</style>
<!-- begin::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

<!-- BEGIN: LAYOUT/HEADERS/HEADER-1 -->
<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
    @include('frontend.layouts.includes.header')
    <div class="modal fade" id="noticeModal" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title"
                        style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">Thông
                        báo</h4>
                </div>

                <div class="modal-body" style="font-family: helvetica, arial, sans-serif;">
                    <p style="text-align:center"><strong><span style="font-size:14px"><span style="color:#000000">Nh&acirc;n dịp khai trương chức năng b&aacute;n thẻ.</span></span></strong><br/>
                        <img alt="Thẻ Game Online Vnsupermark.com: Mua Thẻ Garena Chiết Khấu 6% Không Giới  Hạn Số Lượng Thẻ Nạp"
                            src="https://1.bp.blogspot.com/-Li9SK9J_SuY/XbquaHnonuI/AAAAAAAABSk/FgWthlbpck8KucNI1WAjkO83glppF2lsACNcBGAsYHQ/s1600/mua-the-garena.png"
                            style="height:150px; width:200px"/></p>

                    <p style="text-align:center">Hệ thống giảm gi&aacute;&nbsp;thẻ cực sốc đối với tất cả c&aacute;c
                        loại thẻ.</p>
                </div>
                <div class="modal-footer">
                    <button type="button"
                            class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase"
                            data-dismiss="modal">Đóng
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $.ajax({
            url: "/nap-the",
            type: "GET",
            success: function (data) {
                let html = '';
                html += '<option value>';
                html += '-- Chọn loại thẻ --';
                html += '</option>';
                $.each(data.telecom, function (key, value) {
                    html += '<option value="' + value['key'] + '">';
                    html += value['key'];
                    html += '</option>';
                });
                $('#type').html(html);
            }
        });

        GetAmount();
        $("#type").on('change', function () {
            GetAmount();
        });

        function formatNumber(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        }

        function GetAmount() {

            var telecom_key = $("#type").val();
            var getamount = $.get("/nap-the/get-auto-amount?telecom_key=" + telecom_key, function (data, status) {
                let html = '';
                html += '<option value>';
                html += '-- Chọn mệnh giá --';
                html += '</option>';
                $.each(data.telecom_value, function (key, value) {
                    html += '<option r-default="' + value['type_charge'] + '" rel-ratio="' + value['agency_ratio_true_amount'] + '" value="' + value['amount'] + '">';
                    html += formatNumber(value['amount']);
                    html += " VNĐ ";
                    html += " - ";
                    html += value['ratio_true_amount'];
                    html += "%";
                    html += '</option>';

                    $('#amount').html(html);
                });
            }).done(function () {

            });
        }

        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#recharge-card-form").on('submit', function (event) {
                event.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    type: 'POST',
                    url: '/nap-the',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $('.ajax-loader').show();
                    },
                    success: (data) => {
                        if (data.errors) {
                            $('#captcha').val('');
                            $('#imgcaptcha').trigger('click');
                            html = '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                            html += '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                            html += '</button>';
                            html += '<span>' + data.errors + '</span>' + '<br>';
                            html += '</div>';
                            $('#render-errors').html(html);
                        } else {
                            $('#recharge_card').modal('hide');
                            $('.refresh').val('');
                            $('#imgcaptcha').trigger('click');
                            swal(
                                'Thành công !',
                                data.success,
                                'success'
                            )
                        }
                    },
                    complete: function () {
                        $('.ajax-loader').hide();
                    }
                });
            });

        });

    </script>

    <div class="ajax-loader"></div>


    <div id="main">
        <div class="container">
            @yield('content')
        </div>
    </div>
</div>
<div class="" id="togger"></div>
<div class="modal fade" id="showInfor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">MUA THẺ THÀNH CÔNG</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-action">
                <div id="showInforDetails"></div>
                <table class="table m-table m-table--head-bg-success text-center">
                    <thead>
                    <tr class="text-center" style="background-color: #eef1f5;">
                        <td colspan="2"><b>THÔNG TIN ĐƠN HÀNG</b></td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td width="40%"><b>Mã số</b></td>
                        <td id="id-item"></td>
                    </tr>
                    <tr>
                        <td><b>Mô tả</b></td>
                        <td id="description-item"></td>
                    </tr>
                    <tr>
                        <td><b>Trạng thái</b></td>
                        <td><span class="btn btn-success btn-sm m-btn m-btn--custom ">Hoàn thành</span></td>
                    </tr>
                    <tr>
                        <td><b>Số tiền</b></td>
                        <td id="money-item"></td>
                    </tr>
                    <tr>
                        <td><b>Chiết khấu</b></td>
                        <td id="txns-item"></td>
                    </tr>
                    </tbody>
                </table>
                <table class="table m-table m-table--head-bg-success">
                    <thead>
                    <tr class="text-center" style="background-color: #eef1f5;">
                        <td colspan="2"><b>DANH SÁCH MÃ THẺ</b></td>
                    </tr>
                    <tr class="text-center">
                        <td>Mã thẻ</td>
                        <td>Serial</td>
                    </tr>
                    </thead>
                    <tbody id="store_card" class="text-center">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
            </div>
        </div>
    </div>
</div>


<script>
    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
    }

    $.ajax({
        url: "/mua-the",
        type: "GET",
        success: function (data) {
            let html = '';
            // html += '<div id="flex-box">';
            $.each(data.store_telecom, function (key, value) {
                html += '<li>';
                html += '<div class="nav-link link-supplier text-center" >';
                html += '<input name="telecom_key" value="' + value['key'] + '" id="myCheckbox' + key + '" type="radio" />';
                html += '<label class="item-wapper ' + value['key'] + '" for="myCheckbox' + key + '" onClick="reply_click(this.id)" id="' + value['key'] + '">';
                if (value['image']) {
                    html += "<img class=\"img-fluid\" src=\"" + value["image"] + "\">";
                } else {
                    html += value['title'];
                }
                // html += value['title'];
                html += '</label></div>';
                html += '</li>';
            });
            // html += '</div>';
            $('#tab-supplier').html(html);
        }
    });

    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    }


    function reply_click(clicked_id) {
        let html = '';
        var getamount = $.get("/mua-the/get-amount?telecom_key=" + clicked_id, function (data, status) {
            $.each(data.store_telecom_value, function (key, value) {
                html += '<div class="text-center">';
                html += '<input type="radio" name="amount" class="amount" id="CheckboxSupplier' + key + '" value="' + value['amount'] + '" rel-ratio="' + value['ratio_default'] + '"/>';
                html += '<input style="display: none" type="text" id="price_' + value['amount'] + '" class="ratio_default" value="' + value['ratio_default'] + '"/>';
                html += '<label class="item-content" for="CheckboxSupplier' + key + '">';
                html += '<h5>' + formatNumber(value['amount']) + ' VNĐ </h5>';
                html += '<p>Giá: <span>' + formatNumber(value['amount'] * value['ratio_default'] / 100) + ' VNĐ</span></p>';
                html += '</label></div>';
            });
            $('#render-supplier').html(html);

            let button = '';
            button += '<div class="form-group m-form__group row ml-1">';
            button += '<label class="col-lg-2 col-md-4 col-sm-4 col-4 col-form-label" style="font-weight:bold;font-size:16px;color:#2F6A7C">Số lượng: </label>';
            button += '<div class="col-lg-2 col-md-4 col-sm-4 col-4">';
            button += '<select class="form-control m-input m-input--air" name="quantity" id="quantity" style="border-color: #0000004f;">';
            for (i = 1; i <= 10; i++) {
                button += '<option class="quantity" value="' + i + '">' + i + '</option>';
            }

            button += '</select></div></div>';
            $('#button').html(button);

            var render_denominations = clicked_id;
            $('.denominations').html(render_denominations);
            $(".price_supplier").html("Chưa chọn");
            $(".price_sale").html("0");
            $(".render_quantity").html("1");
            $(".total_price").html("0");
        });

        var top = $("#content").offset().top;
        $([document.documentElement, document.body]).animate({
            scrollTop: top
        }, 500);

    }

    $("#recharge_supplier").on('submit', function (event) {
        event.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: '/mua-the',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $(".content-ajax").hide();
                $('.ajax-loader').show();
            },
            success: (data) => {
                if (data.errors) {
                    $('#modal_pay').modal('hide');
                    swal(
                        'Lỗi !',
                        data.errors,
                        'error'
                    )
                } else {
                    $('#modal_pay').modal('hide');
                    $('#showInfor').modal('show');
                    let html = '';
                    html += '<div class="id-infor" data-id="' + data.id + '"></div>';
                    $('#showInforDetails').html(html);
                    var id = $(".id-infor").data('id');
                    $.ajax({
                        url: "/mua-the/" + id + "/thong-tin-the",
                        type: "GET",
                        success: function (data) {
                            // console.log(data.data.id);
                            $("#id-item").html(id);
                            $("#description-item").html(data.data.description);
                            $("#money-item").html(formatNumber(data.data.price) + " VNĐ");
                            $("#txns-item").html(100 - (data.data.txns[0].ratio) + " %");
                            //
                            // console.log(data.data.store_card);
                            let html = '';
                            $.each(data.arr, function (key, value) {
                                html += '<tr>';
                                html += '<td class="pin"><span>' + value['pin_item'] + '</span>&nbsp;<i style="cursor: pointer" class="fa fa-copy copyPin" aria-hidden="true"></i></td>';
                                html += '<td class="serial"><span>' + value['serial_item'] + ' </span>&nbsp;<i style="cursor: pointer" class="fa fa-copy copySerial" aria-hidden="true"></i></td>';
                                html += '</tr>';
                            });
                            $('#store_card').html(html);
                        }
                    });
                }
            },
            complete: function () {
                $('.ajax-loader').hide();
                $(".content-ajax").show();
            }
        });
    });

    $('#store_card').on('click', '.copyPin', function () {
        var text = $(this).prev().text()
        var $temp = $("<input>");
        $("#store_card").append($temp);
        $temp.val(text).select();
        document.execCommand("copy");
        $temp.remove();
    });
    $('#store_card').on('click', '.copySerial', function () {
        var text = $(this).prev().text()
        var $temp = $("<input>");
        $("#store_card").append($temp);
        $temp.val(text).select();
        document.execCommand("copy");
        $temp.remove();
    });

</script>


<div id="togger"></div>
<div class="modal fade" id="noticeModal" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="loader" style="text-align: center">
            <div class="m-loader m-loader--lg ajax-loader" style="width: 30px; display: none;"></div>
        </div>
        <div class="modal-content">
            &lt;p style=&quot;text-align:center&quot;&gt;&lt;strong&gt;&lt;span style=&quot;font-size:14px&quot;&gt;&lt;span
            style=&quot;color:#000000&quot;&gt;Nh&amp;acirc;n dịp khai trương chức năng b&amp;aacute;n thẻ.&lt;/span&gt;&lt;/span&gt;&lt;/strong&gt;&lt;br
            /&gt;
            &lt;img alt=&quot;Thẻ Game Online Vnsupermark.com: Mua Thẻ Garena Chiết Khấu 6% Không Giới Hạn Số Lượng
            Thẻ Nạp&quot; src=&quot;https://1.bp.blogspot.com/-Li9SK9J_SuY/XbquaHnonuI/AAAAAAAABSk/FgWthlbpck8KucNI1WAjkO83glppF2lsACNcBGAsYHQ/s1600/mua-the-garena.png&quot;
            style=&quot;height:150px; width:200px&quot; /&gt;&lt;/p&gt;

            &lt;p style=&quot;text-align:center&quot;&gt;Hệ thống giảm gi&amp;aacute;&amp;nbsp;thẻ cực sốc đối với
            tất cả c&amp;aacute;c loại thẻ.&lt;/p&gt;
        </div>
    </div>
</div>


<div class="modal fade" id="LoadModal" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="loader" style="text-align: center"><img src="/assets/frontend/images/loader.gif"
                                                            style="width: 50px;height: 50px;display: none"></div>
        <div class="modal-content">
        </div>
    </div>
</div>



@include('frontend.layouts.includes.footer')


@include('frontend.widget.modal.__login')



<div id="m_scroll_top" class="m-scroll-top">
    <i class="fa-solid fa-arrow-up"></i>
</div>
<div class="modal fade" id="noticeModal" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="loader" style="text-align: center">
            <img src="/assets/frontend/images/loader.gif" style="width: 50px;height: 50px;display: none"></div>
        <div class="modal-content">
            &lt;p style=&quot;text-align:center&quot;&gt;&lt;strong&gt;&lt;span style=&quot;font-size:14px&quot;&gt;&lt;span
            style=&quot;color:#000000&quot;&gt;Nh&amp;acirc;n dịp khai trương chức năng b&amp;aacute;n thẻ.&lt;/span&gt;&lt;/span&gt;&lt;/strong&gt;&lt;br
            /&gt;
            &lt;img alt=&quot;Thẻ Game Online Vnsupermark.com: Mua Thẻ Garena Chiết Khấu 6% Không Giới Hạn Số Lượng Thẻ
            Nạp&quot; src=&quot;https://1.bp.blogspot.com/-Li9SK9J_SuY/XbquaHnonuI/AAAAAAAABSk/FgWthlbpck8KucNI1WAjkO83glppF2lsACNcBGAsYHQ/s1600/mua-the-garena.png&quot;
            style=&quot;height:150px; width:200px&quot; /&gt;&lt;/p&gt;

            &lt;p style=&quot;text-align:center&quot;&gt;Hệ thống giảm gi&amp;aacute;&amp;nbsp;thẻ cực sốc đối với tất
            cả c&amp;aacute;c loại thẻ.&lt;/p&gt;
        </div>
    </div>
</div>


<div class="modal fade" id="LoadModal" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="loader" style="text-align: center"><img src="/assets/frontend/images/loader.gif"
                                                            style="width: 50px;height: 50px;display: none"></div>
        <div class="modal-content">
        </div>
    </div>
</div>


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
        $(".toggle-password").click(function () {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    });
</script>


<script src="/assets/frontend/{{theme('')->theme_key}}/lib/scripts.bundle.js" type="text/javascript"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/lib/sweetalert2.js" type="text/javascript"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/js/dashboard.js" type="text/javascript"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/js/index.js" type="text/javascript"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/js/main.js" type="text/javascript"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/lib/bootstrap-datetimepicker/bootstrap-datetimepicker.js" type="text/javascript"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/lib/bootstrap-datetimepicker/bootstrap-datepicker.js" type="text/javascript"></script>
</body>
<!-- end::Body -->
</html>

