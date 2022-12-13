let auth_check = false;
$(document).ready(function(){
    const csrf_token = $('meta[name="csrf-token"]').attr('content');
    const token =  $('meta[name="jwt"]').attr('content');
    function getInfo(){
        const url = '/ajax/user/account_info';
        // if(token == 'undefined' || token == null || token =='' || token == undefined){
        //     if($(window).width() > 992){
        //
        //         $('.box-loading').hide();
        //         $('.box-logined').show();
        //         $('.box-account').hide();
        //         // đăng nhập, đăng ký
        //         let html = "";
        //         html += '<a href="#" data-toggle="modal" data-target="#modal-login" style="text-transform: uppercase;font-weight: bold">';
        //         html += '<i class="fa fa-user mr-1" aria-hidden="true"></i> Đăng nhập';
        //         html += '</a>';
        //         html += ' <span class="mr-2 ml-2">/</span>';
        //         html += '<a href="#" data-toggle="modal" data-target="#modal-register" style="text-transform: uppercase;font-weight: bold">';
        //         html += '<i class="fa fa-lock mr-1" aria-hidden="true"></i> Đăng ký';
        //         html += '</a>';
        //         $('.box-logined').html(html);
        //
        //     }else {
        //         $('.box-loading').hide();
        //         $('.box-account-mobile').show();
        //         $('.box-account-mobile').html('<a href="#" data-toggle="modal" data-target="#modal-login"><i class="fas fa-user"></i></a>')
        //     }
        //     $('meta[name="jwt"]').attr('content','');
        //     return;
        // }
        $.ajax({
            type: "POST",
            url: url,
            cache:false,
            data: {
                _token:csrf_token,
                jwt:token
            },
            beforeSend: function (xhr) {

            },
            success: function (data) {
                console.log(3636)

                if(data.status === "LOGIN"){

                    $('.box-loading').hide();
                    $('.box-logined').show();
                    $('.box-account').hide();
                    // đăng nhập, đăng ký
                    let html = "";
                    html += '<div class="login">';
                    html += '<span class="btn_login" data-toggle="modal" data-target="#signin"><i class="icon_account ic_login"><img src="/assets/frontend/theme_card_1/image/svg//icon_login.svg" alt="login"></i>Đăng nhập</span>\n';
                    html += '<span style="border: 1px solid #FFFFFF;transform: rotate(104.43deg);background:#ffffff;width:20px;display:inline-block; vertical-align:middle;"></span>\n';
                    html += '<span class="btn_register" data-toggle="modal" data-target="#signup"><i class="icon_account ic_register"><img src="/assets/frontend/theme_card_1/image/svg//icon_register.svg" alt="register"></i>Đăng ký</span>\n';
                    html += ' </div>';
                    $('.wp_login').html(html);
                    $('#store_pay').attr('data-target','#signin').html('Đăng nhập để thanh toán');

                    $('meta[name="jwt"]').attr('content','');

                }
                if(data.status == 401){
                    $('.box-loading').hide();
                    $('.box-logined').show();
                    $('.box-account').hide();
                    // đăng nhập, đăng ký
                    let html = "";
                    html += '<div class="login">';
                    html += '<span class="btn_login" data-toggle="modal" data-target="#signin"><i class="icon_account ic_login"><img src="/assets/frontend/theme_card_1/image/svg//icon_login.svg" alt="login"></i>Đăng nhập</span>\n';
                    html += '<span style="border: 1px solid #FFFFFF;transform: rotate(104.43deg);background:#ffffff;width:20px;display:inline-block; vertical-align:middle;"></span>\n';
                    html += '<span class="btn_register" onclick="window.location.href = \'/register\';"><i class="icon_account ic_register"><img src="/assets/frontend/theme_card_1/image/svg//icon_register.svg" alt="register"></i>Đăng ký</span>\n';
                    html += ' </div>';
                    $('.wp_login').html(html);
                    $('meta[name="jwt"]').attr('content','');
                    $('#store_pay').attr('data-target','#signin').html('Đăng nhập để thanh toán');
                }
                if(data.status === "ERROR"){
                    alert('Lỗi dữ liệu, vui lòng load lại trang để tải lại dữ liệu')
                }
                if(data.status == true){
                    auth_check = true;
                    $('.box-loading').hide();
                    $('.box-logined').hide();
                    $('.box-account').show();
                    $('#manageAcount').html('<a href="#" role="button" class="btnc btn-user dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <i class="fas fa-user"></i> <b>'+data.info.fullname??data.info.username+'</b> <b class="caret"></b> </a>');
                    $('.money_sum').html('<span>Số dư: </span> <span class="tienconlai"><b>'+formatNumber(data.info.balance)+' VNĐ</b> </span>');
                    $('.account_logout').html(' <a rel="nofollow"  onclick="event.preventDefault();\n' +
                        'document.getElementById(\'logout-form\').submit();" id="logoutbtn1"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a> ');

                    $('meta[name="jwt"]').attr('content',data.token);
                    $('#store_pay').attr('data-target','#modal_pay').html('Thanh toán ngay');
                }
            },
            error: function (data) {
                // alert('Có lỗi phát sinh, vui lòng liên hệ QTV để kịp thời xử lý(account_info)!')
                return;
            },
            complete: function (data) {

            }
        });
    }
    getInfo();

    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
    }
    function fn(text, count){
        return text.slice(0, count) + (text.length > count ? "..." : "");
    }

});

