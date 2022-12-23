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
        //     $('#info').html('<i class="fas fa-user"></i> Đăng nhập')
        //     $('#logout').html('<i class="fas fa-user"></i> Đăng kí')
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
                    console.log('Lỗi dữ liệu, vui lòng load lại trang để tải lại dữ liệu')
                }
                if(data.status == true){
                    $('#info_id').html('<span>'+data.info.id+'</span>')
                    $('#info_name').html('<span>'+data.info.fullname??data.info.username+'</span>')
                    $('#info_balance').html('<span>'+data.info.balance+'</span>')
                    $('#info_balance').html('<span><i class="text-danger">'+formatNumber(data.info.balance)+'</i></span>')
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
