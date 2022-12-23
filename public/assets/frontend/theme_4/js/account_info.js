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
                if(data.status === "LOGIN"){
                    if($(window).width() > 992){

                        $('.box-loading').hide();
                        $('.box-logined').show();
                        $('.box-account').hide();
                        // đăng nhập, đăng ký
                        let html = "";
                        html += '<a href="#" data-toggle="modal" data-target="#modal-login" style="text-transform: uppercase;font-weight: bold">';
                        html += '<i class="fa fa-user mr-1" aria-hidden="true"></i> Đăng nhập';
                        html += '</a>';
                        html += ' <span class="mr-2 ml-2">/</span>';
                        html += '<a href="#" data-toggle="modal" data-target="#modal-register" style="text-transform: uppercase;font-weight: bold">';
                        html += '<i class="fa fa-lock mr-1" aria-hidden="true"></i> Đăng ký';
                        html += '</a>';
                        $('.box-logined_data').html(html);
                    }else {
                        $('.box-loading').hide();
                        $('.box-account-mobile').show();
                        $('.box-account-mobile_data').html('<a href="#" data-toggle="modal" data-target="#modal-login"><i class="fas fa-user"></i></a>')
                    }

                    $('meta[name="jwt"]').attr('content','');

                }
                if(data.status == 401){

                    if($(window).width() > 992){

                        $('.box-loading').hide();
                        $('.box-logined').show();
                        $('.box-account').hide();
                        // đăng nhập, đăng ký
                        let html = "";
                        html += '<a href="#" data-toggle="modal" data-target="#modal-login" style="text-transform: uppercase;font-weight: bold">';
                        html += '<i class="fa fa-user mr-1" aria-hidden="true"></i> Đăng nhập';
                        html += '</a>';
                        html += ' <span class="mr-2 ml-2">/</span>';
                        html += '<a href="#" data-toggle="modal" data-target="#modal-register" style="text-transform: uppercase;font-weight: bold">';
                        html += '<i class="fa fa-lock mr-1" aria-hidden="true"></i> Đăng ký';
                        html += '</a>';
                        $('.box-logined_data').html(html);
                    }else {
                        $('.box-loading').hide();
                        $('.box-account-mobile').show();
                        $('.box-account-mobile_data').html('<a href="#" data-toggle="modal" data-target="#modal-login"><i class="fas fa-user"></i></a>')
                    }

                    $('meta[name="jwt"]').attr('content','');
                }
                if(data.status === "ERROR"){
                    alert('Lỗi dữ liệu, vui lòng load lại trang để tải lại dữ liệu')
                }
                if(data.status == true){

                    auth_check = true;

                    if($(window).width() > 992){
                        $('.box-loading').hide();
                        $('.box-logined').hide();
                        $('.box-account').show();
                        let html = "";
                        html += '<div class="btn-group d-none d-lg-block show " >';
                        html += '<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="border: 1px solid #cccccc;border-radius: 5px;padding: 10px 19px;margin-left: 50px">\n';
                        html += '<div class="text" style="display: inline-block">';
                        html += '<img class="" src="/assets/frontend/theme_4/image/svg/anhdaidien.svg" width="20px" height="20px" style="border-radius: 50%;margin-top: -1px;margin-right: 5px">';
                        html += '<span id="account-name">'+fn(data.info.fullname??data.info.username, 12)+'</span>';
                        html += '</div>';
                        html += '</a>';
                        html += ' <div id="information-account" class="dropdown-menu dropdown-menu-right information-account ">';
                        html += '<a href="#" class="dropdown-item account-balance"> <i class="fas fa-wallet"></i> Số dư: '+formatNumber(data.info.balance)+'</a>';
                        html += '<a href="/thong-tin" class="dropdown-item"><i class="fas fa-file-alt"></i> Thông tin cá nhân </a>';
                        html += '<a href="/nap-the" class="dropdown-item"><i class="far fa-money-bill-alt"></i> Nạp thẻ </a>';
                        html += '<a href="/lich-su-giao-dich" class="dropdown-item"><i class="far fa-clock"></i> Biến động số dư </a>';
                        html += '<a href="#" class="dropdown-item" onclick="event.preventDefault();\n' +
                            'document.getElementById(\'logout-form\').submit();"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>';
                        html += '  </div>';

                        $('.box-account_data').html(html);


                    }else {
                        $('.box-loading').hide();
                        $('.box-account-mobile').show();
                        let html = "";
                        html += '<a class="dropdown-toggle" data-target="information-account-mobile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                        html += ' <i class="fas fa-user"></i>';
                        html += '</a>';
                        html += '<div id="information-account-mobile" class="dropdown-menu dropdown-menu-right information-account">';
                        html += ' <a href="#" class="dropdown-item"><i class="fas fa-wallet"></i> Số dư: '+formatNumber(data.info.balance)+'</a>';
                        html += '<a href="/thong-tin" class="dropdown-item"><i class="fas fa-file-alt"></i> Thông tin cá nhân </a>';
                        html += '<a href="/nap-the" class="dropdown-item"><i class="far fa-money-bill-alt"></i> Nạp thẻ </a>';
                        html += ' <a href="/lich-su-giao-dich" class="dropdown-item"><i class="far fa-clock"></i> Biến động số dư </a>';
                        html += '<a href="#" class="dropdown-item" onclick="event.preventDefault();\n' +
                            'document.getElementById(\'logout-form\').submit();"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>';
                        html += '  </div>';
                        $('.box-account-mobile_data').html(html);
                    }
                    $('meta[name="jwt"]').attr('content',data.token);

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

