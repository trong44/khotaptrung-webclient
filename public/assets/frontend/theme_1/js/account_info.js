let auth_check = false;
$(document).ready(function(){
    const csrf_token = $('meta[name="csrf-token"]').attr('content');
    function getInfo(){
        const url = '/ajax/user/account_info';
        $.ajax({
            type: "POST",
            url: url,
            cache:false,
            data: {
                _token:csrf_token,
            },
            beforeSend: function (xhr) {

            },
            success: function (data) {
                if(data.status === "LOGIN"){
                    $('#info .loading').remove();
                    $('#logout .loading').remove();
                    if (window.location.pathname == '/login'){
                        $('#info').attr('href','')
                    }else {
                        $('#info').attr('href','/login?return_url='+window.location.href)
                    }
                    if (window.location.pathname == '/login'){
                        $('#info_tab_mobile').attr('href','#')

                    }else {
                        $('#info_tab_mobile').attr('href','/login?return_url='+window.location.href)
                    }
                    $('#logout').attr('href','/register')
                    $('#info').html('<i class="fas fa-user"></i> Đăng nhập')
                    $('#logout').html('<i class="fas fa-user"></i> Đăng kí')

                    // $('#info').addClass('open-modal-login');


                    $('#info_mobile .loading').remove();
                    $('#logout_mobile .loading').remove();
                    $('#info_mobile').attr('href','/login?return_url='+window.location.href)
                    $('#logout_mobile').attr('href','/register')
                    $('#info_mobile').html('Đăng nhập')
                    $('#logout_mobile').html('Đăng kí')

                    $('#info_tab_mobile .loading').remove();
                    $('#logout_tab_mobile .loading').remove();
                    // $('#info_tab_mobile').attr('href','/login?return_url='+window.location.href)
                    $('#logout_tab_mobile').attr('href','/register')
                    $('#info_tab_mobile').html('<i class="fas fa-user"></i> Đăng nhập')
                    $('#logout_tab_mobile').html('<i class="fas fa-user"></i> Đăng kí')
                    $('meta[name="jwt"]').attr('content','');
                    // $('#form-charge-submit').html('<a href="/login" class="btn btn-submit" >Nạp thẻ</a>')

                }
                if(data.status == 401){
                    $('#info .loading').remove();
                    $('#logout .loading').remove();
                    if (window.location.pathname == '/login'){
                        $('#info').attr('href','')
                    }else {
                        $('#info').attr('href','/login?return_url='+window.location.href)
                    }
                    if (window.location.pathname == '/login'){
                        $('#info_tab_mobile').attr('href','#')

                    }else {
                        $('#info_tab_mobile').attr('href','/login?return_url='+window.location.href)
                    }
                    $('#logout').attr('href','/register')
                    $('#info').html('<i class="fas fa-user"></i> Đăng nhập')
                    $('#logout').html('<i class="fas fa-user"></i> Đăng kí')


                    $('#info_mobile .loading').remove();
                    $('#logout_mobile .loading').remove();
                    $('#info_mobile').attr('href','/login?return_url='+window.location.href)
                    $('#logout_mobile').attr('href','/register')
                    $('#info_mobile').html('Đăng nhập')
                    $('#logout_mobile').html('Đăng kí')

                    $('#info_tab_mobile .loading').remove();
                    $('#logout_tab_mobile .loading').remove();
                    // $('#info_tab_mobile').attr('href','/login?return_url='+window.location.href)
                    $('#logout_tab_mobile').attr('href','/register')
                    $('#info_tab_mobile').html('<i class="fas fa-user"></i> Đăng nhập')
                    $('#logout_tab_mobile').html('<i class="fas fa-user"></i> Đăng kí')
                    $('meta[name="jwt"]').attr('content','');
                    // $('#form-charge-submit').html('<a href="/login" class="btn btn-submit" >Nạp thẻ</a>')

                }
                if(data.status === "ERROR"){
                    console.log('Lỗi dữ liệu, vui lòng load lại trang để tải lại dữ liệu')

                }
                if(data.status == true){
                    auth_check = true;

                    //Hết minigame
                    $('#username').val(data.info.fullname??data.info.username);
                    $('#info .loading').remove();
                    $('#logout .loading').remove();
                    $('#info').attr('href','/thong-tin')
                    $('#logout').attr('href','/logout')

                    // mobile tab
                    $('#info_tab_mobile .loading').remove();
                    $('#logout_tab_mobile .loading').remove();
                    $('#info_tab_mobile').attr('href','/thong-tin')
                    $('#logout_tab_mobile').attr('href','/logout')

                    $('#logout-form').attr('href','/logout')

                    $('#logout').attr('onclick','event.preventDefault();\ndocument.getElementById(\'logout-form\').submit();')
                    $('#info').html('<i class="fas fa-user"></i> '+ fn(data.info.fullname??data.info.username, 6)  +' - $' +formatNumber(data.info.balance));

                    $('#formProfile #user_id').val(data.info.id);

                    $('#logout').html('<i class="fas fa-user"></i> Đăng xuất')


                    // mobile
                    $('#info_mobile .loading').remove();
                    $('#logout_mobile .loading').remove();
                    $('#info_mobile').attr('href','/thong-tin')
                    // $('#logout_mobile').attr('href','/logout')

                    $('#logout_mobile').attr('onclick','event.preventDefault();\ndocument.getElementById(\'logout-form\').submit();')
                    $('#info_mobile').html(fn(data.info.fullname??data.info.username, 8) +' - $' +formatNumber(data.info.balance))
                    $('#logout_mobile').css('display','none')


                    $('#logout_tab_mobile').attr('onclick','event.preventDefault();\ndocument.getElementById(\'logout-form\').submit();')
                    $('#info_tab_mobile').html('<i class="fas fa-user"></i> '+fn(data.info.fullname??data.info.username, 12) +' - $' +formatNumber(data.info.balance))
                    $('#logout_tab_mobile').html('<i class="fas fa-user"></i> Đăng xuất');
                    $('meta[name="jwt"]').attr('content',data.jwt);
                    // $('#form-charge-submit').html('<button class="btn btn-submit" type="submit">Nạp thẻ</button>')
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
                console.log('Có lỗi phát sinh, vui lòng liên hệ QTV để kịp thời xử lý(account_info)!')
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


    // let config =  JSON.parse($('#array-auto').val());

    // $('#content').autoLink(config);

});

