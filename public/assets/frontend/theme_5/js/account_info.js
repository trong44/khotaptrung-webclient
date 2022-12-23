let auth_check = false;
$(document).ready(function(){

    const csrf_token = $('meta[name="csrf-token"]').attr('content');
    const token =  $('meta[name="jwt"]').attr('content');

    getInfo();
    function getInfo(){

        const url = '/ajax/user/account_info';
        // if(token == 'undefined' || token == null || token =='' || token == undefined){
        //
        //         $('.box-loading').hide();
        //         $('.box-logined').show();
        //         $('.box-account').hide();
        //
        //         // đăng nhập, đăng ký
        //
        //           let html = '';
        //           html += '<div class="box-icon brs-8 " >';
        //           html += ' <img src="/assets/frontend/theme_5/image/nam/profile.svg" alt="" >';
        //           html += '</div>';
        //
        //           $('.account-logined').html(html);
        //           $('.box-account_nologined').show();
        //           $('.box-account_logined').hide();
        //
        //
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
                    let html = '';
                    html += '<div class="box-icon brs-8 " >';
                    html += ' <img src="/assets/frontend/theme_5/image/nam/profile.svg" alt="" >';
                    html += '</div>';

                    $('.account-logined').html(html);
                    $('.account-logined').removeClass("box-account-open");
                    $('.account-logined').attr('onclick','openLoginModal()');
                    $('.box-account_nologined').show();
                    $('.box-account_logined').hide();
                    $('meta[name="jwt"]').attr('content','');

                }
                if(data.status == 401){
                    $('.box-loading').hide();
                    $('.box-logined').show();
                    $('.box-account').hide();
                    // đăng nhập, đăng ký
                    let html = '';
                    html += '<div class="box-icon brs-8 " >';
                    html += ' <img src="/assets/frontend/theme_5/image/nam/profile.svg" alt="" >';
                    html += '</div>';

                    $('.account-logined').html(html);
                    $('.account-logined').removeClass("box-account-open");
                    $('.account-logined').attr('onclick','openLoginModal()');
                    $('.box-account_nologined').show();
                    $('.box-account_logined').hide();
                    $('meta[name="jwt"]').attr('content','');

                }
                if(data.status === "ERROR"){
                    alert('Lỗi dữ liệu, vui lòng load lại trang để tải lại dữ liệu')
                }
                if(data.status == true){
                    auth_check = true;
                    $('.box-loading').hide();
                    $('.box-account_nologined').hide();
                    $('.box-account_logined').show();
                    $('.account-logined').addClass('box-account-open');

                    // profile
                    let html = '';
                    html += '<div class="d-flex ">';
                    html += '<div class="account-name">';
                    html += '<div  class="text-right title-color fw-500">'+fn(data.info.fullname??data.info.username, 12)+'</div>';
                    html += '<div class="account-balance fw-400">Số dư: '+formatNumber(data.info.balance)+'</div>';
                    html += '</div>';
                    html += '<div class="account-avatar c-ml-12">';
                    html += '<img src="/assets/frontend/theme_5/image/nam/anhdaidien.svg" alt="">';
                    html += '</div>';
                    html += '</div>';

                    $('.account-logined').html(html);
                    $('.account-name-sidebar').html(data.info.fullname??data.info.username);
                    $('.account-balance-sidebar').html('Số dư: <span>'+formatNumber(data.info.balance)+'</span>');
                    $('.account-id-sidebar').html('ID: <span>'+data.info.id+'</span>');

                    let htmtLogout = '';
                    htmtLogout += '<a href="javascript:void(0);" onclick="event.preventDefault();document.getElementById(\'logout-form\').submit();" class="d-block align-items-center d-flex">';
                    htmtLogout += '<div class="sidebar-item-icon brs-8 c-p-8 c-mr-12">';
                    htmtLogout += '<img src="/assets/frontend/theme_5/image/nam/log-out.svg" alt="" style="width: 24px;height: 24px">';
                    htmtLogout += '</div>';
                    htmtLogout += '<p class="sidebar-item-text fw-400 fz-12 mb-0">Đăng xuất</p>';
                    htmtLogout += '</a>';

                    $('.log-out-button').html(htmtLogout);


                    let htmlProfile = '';
                    htmlProfile += '<div class="sidebar-section-avt brs-100 c-mr-12">'
                    htmlProfile += '<img class="brs-100" src="/assets/frontend/theme_5/image/nam/avatar.png" alt="">'
                    htmlProfile += '</div>'
                    htmlProfile += '<div class="sidebar-section-info">'
                    htmlProfile += '<p class="sidebar-section-title c-mb-4 fz-15 fw-500 sidebar-user-name">'+data.info.fullname??data.info.username+'</p>'
                    htmlProfile += '<p class="sidebar-section-info-text c-mb-4 fz-13 fw-500 sidebar-user-balance">Số dư: <span>'+formatNumber(data.info.balance)+'</span></p>'
                    htmlProfile += ' <p class="sidebar-section-info-text mb-0 fz-13 fw-500 sidebar-user-id">ID: <span>'+data.info.id+'</span></p>'
                    htmlProfile += ' </div>'

                    $('.sidebar-user-profile').html(htmlProfile);

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


    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
    }
    function fn(text, count){
        return text.slice(0, count) + (text.length > count ? "..." : "");
    }

});

