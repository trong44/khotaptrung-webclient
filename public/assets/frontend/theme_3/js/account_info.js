$(document).ready(function(){
    const csrf_token = $('meta[name="csrf-token"]').attr('content');
    const token =  $('meta[name="jwt"]').attr('content');
    function getInfo(){
        const url = '/user/account_info';
        if(token == 'undefined' || token == null || token =='' || token == undefined){
            if($(window).width() > 992){
                $('.box-loading').hide();
                $('.box-logined').show();
                $('.box-registed').show();
                $('.box-account').hide();
                $('.box-deposit-charge').hide();
                $('.box-logined').html(' <a class="btn btn-submit" onclick="openLoginModal();">Đăng nhập</a>');
                $('.box-registed').html(' <a class="btn btn-submit" onclick="openRegisterModal();">Đăng ký</a>');
            }
            $('meta[name="jwt"]').attr('content','jwt');


            return;
        }
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
                        $('.box-registed').show();
                        $('.box-account').hide();
                        $('.box-deposit-charge').hide();
                        $('.box-logined').html(' <a class="btn btn-submit" onclick="openLoginModal();">Đăng nhập</a>');
                        $('.box-registed').html(' <a class="btn btn-submit" onclick="openRegisterModal();">Đăng ký</a>');
                    }



                    $('meta[name="jwt"]').attr('content','jwt');

                }
                if(data.status == 401){


                }
                if(data.status === "ERROR"){
                    alert('Lỗi dữ liệu, vui lòng load lại trang để tải lại dữ liệu')
                }
                if(data.status == true){

                    $('.box-loading').hide();
                    $('.box-logined').hide();
                    $('.box-registed').hide();
                    $('.box-account').show();
                    $('.box-deposit-charge').show();
                    $('#account-id').html(' <span >ID: </span>'+ data.info.id );
                    $('.box-deposit-charge').html(' <a class="btn btn-submit" href="/nap-the">Nạp thẻ </a>' );
                    $('#account-name').html(fn(data.info.username, 12) );
                    $('.account-balance').html('Số dư: ' +formatNumber(data.info.balance) );
                    $('#account-balance').html(' <span >Số dư: </span>'+ formatNumber(data.info.balance) );
                    $('.log-out-button').html(' <a class="btn btn-submit" onclick="event.preventDefault();\n' +
                        'document.getElementById(\'logout-form\').submit();">Đăng xuất</a>');
                    $(document).on('scroll',function(){
                        if($(window).width() > 1024){
                            if ($(this).scrollTop() > 100) {
                                $("#logout").css("display","none");

                            } else {
                                $("#logout").css("display","inline");
                            }
                        }

                    });

                }
            },
            error: function (data) {
                alert('Có lỗi phát sinh, vui lòng liên hệ QTV để kịp thời xử lý(account_info)!')
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

