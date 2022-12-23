$(document).ready(function () {

    $(document).on('click', '#handleGetPasswordButton', function (e) {
        e.preventDefault();

        let submitButton = $(this);
        let url = $(submitButton).data('url');
        $(submitButton).prop('disabled', true);

        $.ajax({
            type: "POST",
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data : null, // serializes the form's elements.
            beforeSend: function (xhr) {

            },
            success: function (response) {

                if(response.status == 1){

                    swal({
                        title: "Lấy mật khẩu thành công",
                        text: "Để bảo mật bạn vui lòng thay đổi mật khẩu và tên đăng nhập của tải khoản đã mua!",
                        type: "success",
                        confirmButtonText: "Lấy mật khẩu",
                        showCancelButton: true,
                        cancelButtonText: "Đóng",
                    })
                        .then((result) => {
                            if (result.value) {
                                window.location.reload();
                            } else if (result.dismiss === "Đóng") {
                                window.location.reload();
                            }else {
                                window.location.reload();
                            }
                        })
                }
                else if (response.status == 2){

                    swal(
                        'Thông báo!',
                        response.message,
                        'warning'
                    )
                    $('.loginBox__layma__button__displayabs').prop('disabled', false);
                }else {
                    swal(
                        'Lỗi!',
                        response.message,
                        'error'
                    )
                    $('.loginBox__layma__button__displayabs').prop('disabled', false);
                }
                $('.loading-data__muangay').html('');
            },
            error: function (response) {
                if(response.status === 422 || response.status === 429) {
                    let errors = response.responseJSON.errors;

                    jQuery.each(errors, function(index, itemData) {

                        formSubmit.find('.notify-error').text(itemData[0]);
                        return false; // breaks
                    });
                }else if(response.status === 0){

                    $('#text__errors').html('<span class="text-danger pb-2" style="font-size: 14px">'+response.message+'</span>');
                }
                else {
                    $('#text__errors').html('<span class="text-danger pb-2" style="font-size: 14px">'+'Kết nối với hệ thống thất bại.Xin vui lòng thử lại'+'</span>');
                }
            },
            complete: function (data) {
                $(submitButton).prop('disabled', false);
            }
        })
    });

});
