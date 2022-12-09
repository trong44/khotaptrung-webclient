$(document).ready(function(){
    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
    }
    function getInfo(){
        const url = '/profile-info';
        // if(token == 'undefined' || token == null || token =='' || token == undefined){
        //     $('#info .loading').remove();
        //     $('#logout .loading').remove();
        //     $('#info').attr('href','/login')
        //     $('#logout').attr('href','/register')
        //     $('#info').html('<i class="fas fa-profile"></i> Đăng nhập')
        //     $('#logout').html('<i class="fas fa-profile"></i> Đăng kí')
        //     return;
        // }
        $.ajax({
            type: "GET",
            url: url,
            beforeSend: function (xhr) {

            },
            success: function (data) {
                if(data.status === "LOGIN"){
                    window.location.href = '/logout';
                    // method = method || 'post';
                    return;
                }
                if(data.status === "ERROR"){
                    alert('Lỗi dữ liệu, vui lòng load lại trang để tải lại dữ liệu')
                }
                if(data.status == true){
                    $('#info_id').html(data.info.id)
                    $('#info_name').html(data.info.fullname??data.info.username)
                    $('#info_balance').html(formatNumber(data.info.balance))
                }
            },
            error: function (data) {
                alert('Có lỗi phát sinh, vui lòng liên hệ QTV để kịp thời xử lý!')
                return;
            },
            complete: function (data) {

            }
        });
    }
    getInfo();
});
