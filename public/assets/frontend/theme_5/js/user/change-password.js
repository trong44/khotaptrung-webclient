let content_history = $('.loadding-content');
let wrap_history = content_history.length ? content_history.parent() : '';


function changePassword(data) {
    var formSubmit = $('#form-changePassword');
    var url = formSubmit.attr('action');
    var btnSubmit = formSubmit.find(':submit');

    $.ajax({
        type: "POST",
        url: url,
        cache:false,
        data: formSubmit.serialize(), // serializes the form's elements.
        beforeSend: function (xhr) {
            if (!wrap_history.hasClass('is-load')){
                wrap_history.addClass('is-load');
                let loading =  '<div class="loading-wrap"><span class="modal-loader-spin"></span></div>';
                wrap_history.prepend(loading);
            }
        },
        success: function (res) {
            if (res.status == 'LOGIN'){
                openLoginModal();
            }

            if (res.status == 1){

                $('.modal_message').text(res.message)
                $('#successModal').modal('show');
                $('.password-error').html('')
            }else {
                $('#FailChangePasswordModal').modal('show');
                $('.password-error').html(res.message)

            }
        },
        error: function (data) {
            alert('Kết nối với hệ thống thất bại.Xin vui lòng thử lại');
            btnSubmit.text('Đăng nhập');
        },
        complete: function (data) {

            /*Dừng loading khi tải xong*/
            wrap_history.removeClass('is-load')
            wrap_history.find('.loading-wrap').remove();

            formSubmit.trigger("reset");
        }
    });
}
