$(document).ready(function(){
    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
    }
    function getInfo(){
        const url = '/profile-info'
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
                    $('#info_id').val(data.info.id)
                    $('#info_name').val(data.info.fullname??data.info.username)
                    $('#info_balance').val(formatNumber(data.info.balance))
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
    $('#form-changePassword').submit(function (e) {
        e.preventDefault();
        var formSubmit = $(this);
        var url = formSubmit.attr('action');
        var btnSubmit = formSubmit.find(':submit');

        var loadingText = '<i class="fas fa-circle-notch fa-spin"></i> Đang xử lý...';
        btnSubmit.html(loadingText).prop('disabled', false);
        btnSubmit.attr("disabled", true);
        $.ajax({
            type: "POST",
            url: url,
            cache:false,
            data: formSubmit.serialize(), // serializes the form's elements.
            beforeSend: function (xhr) {
            },
            success: function (data) {
                if(data.status == 1){
                    let html = '';
                    html += '<div class="alert alert-success alert-dismissible" role="alert">';
                    html += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+ data.message;
                    html += '</div>';
                    $('#change-password-result').html(html);
                    // window.location.href = '/';

                }else{
                    let html = '';
                    html += '<div class="alert alert-danger alert-dismissible" role="alert">';
                    html += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+ data.message;
                    html += '</div>';
                    $('#change-password-result').html(html);
                }

            },
            error: function (data) {
                alert('Kết nối với hệ thống thất bại.Xin vui lòng thử lại');
                btnSubmit.text('Đăng nhập');
            },
            complete: function (data) {
                formSubmit.trigger("reset");

                btnSubmit.text('Cập nhật');
                btnSubmit.prop('disabled', false);
            }
        });
    });
});
