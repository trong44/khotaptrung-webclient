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
                    $('.box-loading').hide();
                    $('.box-logined').show();
                    $('.box-account').hide();
                    // đăng nhập, đăng ký
                    let html = "";
                    html += ' <button style="font-family: \'Nunito\', sans-serif;" type="button" class="btn btn-header" data-toggle="modal" data-target="#modalLogin">Đăng nhập</button>';
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
                    html += ' <button style="font-family: \'Nunito\', sans-serif;" type="button" class="btn btn-header" data-toggle="modal" data-target="#modalLogin">Đăng nhập</button>';
                    $('.wp_login').html(html);
                    $('#store_pay').attr('data-target','#signin').html('Đăng nhập để thanh toán');

                    $('meta[name="jwt"]').attr('content','');
                }
                if(data.status === "ERROR"){
                    alert('Lỗi dữ liệu, vui lòng load lại trang để tải lại dữ liệu')
                }
                if(data.status == true){

                    $('.box-loading').hide();
                    $('.box-logined').hide();
                    $('.box-account').show();
                    let html = "";
                    html += '<div class="m-card-user__pic">'
                    html += '<img class="img-fluid m--img-rounded m--marginless" src="/assets/frontend/theme_card_2/image/svg/anhdaidien.svg" alt="" />'
                    html += '</div>'
                    html += '<div class="m-card-user__details">'
                    html += '<span class="m-card-user__name m--font-weight-500">'+data.info.username+'</span>'
                    html += '<a href="" style="text-transform: none" class="m-card-user__email m--font-weight-300 m-link">Số dư: '+formatNumber(data.info.balance)+' VNĐ</a>'
                    html += '</div>'

                    $('.manageAcount').html(html);
                    $('.m-topbar__username').html(data.info.username);
                    $('.account_logout').html(' <a rel="nofollow"  onclick="event.preventDefault();\n' +
                        'document.getElementById(\'logout-form\').submit();" class="btn m-btn--pill tn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a> ');

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

