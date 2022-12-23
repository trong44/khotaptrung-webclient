$(document).ready(function (e) {
    $('.add-active_dich-vu-da-mua-2-1').addClass('active');

    // $('#openEdit').modal('show');

    $('.wide').niceSelect();

    $('body').on('click','.btn-close',function(e){
        $('#openDelete').modal('hide');
        $('#openEdit').modal('hide');
    });

    $('body').on('click','.btn-delete',function(e){
        $('#openDelete').modal('show');
    })

    $('body').on('click','.btn-open-edit',function(e){
        $('#openEdit').modal('show');
    })

    // Click event of the showPassword button
    $('.show-btn-password').on('click', function(){

        // Get the password field
        var passwordField = $('#password');

        // Get the current type of the password field will be password or text
        var passwordFieldType = passwordField.attr('type');

        // Check to see if the type is a password field
        if(passwordFieldType == 'password')
        {
            // Change the password field to text
            passwordField.attr('type', 'text');

            var htmlpass = '';
            htmlpass += '<img class="lazy" src="/assets/frontend/theme_3/image/images_1/eye-show.svg" alt="">';
            $('.show-btn-password').html('');
            $('.show-btn-password').html(htmlpass);

            // Change the Text on the show password button to Hide
            $(this).val('Hide');
        } else {
            var htmlpass = '';
            htmlpass += '<img class="lazy" src="/assets/frontend/theme_3/image/images_1/eye-hide.svg" alt="">';
            $('.show-btn-password').html('');
            $('.show-btn-password').html(htmlpass);

            // If the password field type is not a password field then set it to password
            passwordField.attr('type', 'password');

            // Change the value of the show password button to Show
            $(this).val('Show');
        }
    });

    $('.show-btn-password-mobile').on('click', function(){

        // Get the password field
        var passwordField = $('#password-mobile');

        // Get the current type of the password field will be password or text
        var passwordFieldType = passwordField.attr('type');

        // Check to see if the type is a password field
        if(passwordFieldType == 'password')
        {
            // Change the password field to text
            passwordField.attr('type', 'text');

            var htmlpass = '';
            htmlpass += '<img class="lazy" src="/assets/theme_3/image/cay-thue/eyeshow.png" alt="">';
            $('.show-btn-password-mobile').html('');
            $('.show-btn-password-mobile').html(htmlpass);

            // Change the Text on the show password button to Hide
            $(this).val('Hide');
        } else {
            var htmlpass = '';
            htmlpass += '<img class="lazy" src="/assets/theme_3/image/cay-thue/eyehide.png" alt="">';
            $('.show-btn-password-mobile').html('');
            $('.show-btn-password-mobile').html(htmlpass);

            // If the password field type is not a password field then set it to password
            passwordField.attr('type', 'password');

            // Change the value of the show password button to Show
            $(this).val('Show');
        }
    });

    $(document).on('submit', '.destroyForm', function(e){
        e.preventDefault();
        $('.destroyForm .span-ap-dung').html('');
        var htmlloading = '';
        htmlloading += '<div class="loading"></div>';
        $('.destroyForm .btn-ap-dung .loading-data__timkiem').html('');
        $('.destroyForm .btn-ap-dung .loading-data__timkiem').html(htmlloading);

        var formSubmit = $(this);
        var url = formSubmit.attr('action');
        var btnSubmit = formSubmit.find(':submit');
        btnSubmit.prop('disabled', true);

        $.ajax({
            type: "POST",
            url: url,
            data: formSubmit.serialize(), // serializes the form's elements.
            beforeSend: function (xhr) {

            },
            success: function (response) {
                // console.log(response)
                if(response.status == 1){
                    $('#openDelete').modal('hide');

                    $('.btnDestroy__data').html('');
                    swal({
                        title: "Thông báo!",
                        text: response.message,
                        type: "success",
                        confirmButtonText: "Đóng!",
                    })
                        .then((result) => {
                            if (result.value) {
                                window.location.reload();
                            }
                        })
                }else if (response.status == 0){
                    var html = '';
                    html += '<span style="color: #DA4343;font-size: 12px">' + response.message + '</span>';

                    $('.error__deleteserrvice').html('');
                    $('.error__deleteserrvice').html(html);
                }

                $('.btn-ap-dung .loading-data__timkiem').html('');
                $('.span-ap-dung').html('Xác nhận');
            },
            error: function (response) {
                if(response.status === 422 || response.status === 429) {
                    let errors = response.responseJSON.errors;

                    jQuery.each(errors, function(index, itemData) {
                        // console.log(itemData);
                        formSubmit.find('.notify-error').text(itemData[0]);
                        return false; // breaks
                    });
                }else if(response.status === 0){
                    alert(response.message);
                    $('#text__errors').html('<span class="text-danger pb-2" style="font-size: 14px">'+response.message+'</span>');
                }
                else {
                    $('#text__errors').html('<span class="text-danger pb-2" style="font-size: 14px">'+'Kết nối với hệ thống thất bại.Xin vui lòng thử lại'+'</span>');
                }
            },
            complete: function (data) {
                btnSubmit.prop('disabled', false);
            }
        })


    })

    $(document).on('submit', '.editForm', function(e){
        e.preventDefault();

        $('.editForm .span-ap-dung').html('');
        var htmlloading = '';
        htmlloading += '<div class="loading"></div>';
        $('.editForm .btn-ap-dung .loading-data__timkiem').html('');
        $('.editForm .btn-ap-dung .loading-data__timkiem').html(htmlloading);

        var formSubmit = $(this);
        var url = formSubmit.attr('action');
        var btnSubmit = formSubmit.find(':submit');
        btnSubmit.prop('disabled', true);

        $.ajax({
            type: "POST",
            url: url,
            data: formSubmit.serialize(), // serializes the form's elements.
            beforeSend: function (xhr) {

            },
            success: function (response) {

                if(response.status == 1){

                    swal({
                        title: "Thông báo!",
                        text: response.message,
                        type: "success",
                        confirmButtonText: "Đóng!",
                    })
                        .then((result) => {
                            if (result.value) {
                                window.location.reload();
                            }
                        })
                    $('#edit_info').modal('hide');
                }else if (response.status == 0){
                    var html = '';
                    html += '<span style="color: red;font-size: 12px">' + response.message + '</span>';
                    $('.error__editerrvice').css('padding-top',16);
                    $('.error__editerrvice').html('');
                    $('.error__editerrvice').html(html);
                }
                else {
                    swal(
                        'Thông báo!',
                        response.message,
                        'warning'
                    )
                    $('#edit_info').modal('hide');
                }
                $('.btn-ap-dung .loading-data__timkiem').html('');
                $('.span-ap-dung').html('Xác nhận');
            },
            error: function (response) {
                if(response.status === 422 || response.status === 429) {
                    let errors = response.responseJSON.errors;

                    jQuery.each(errors, function(index, itemData) {
                        // console.log(itemData);
                        formSubmit.find('.notify-error').text(itemData[0]);
                        return false; // breaks
                    });
                }else if(response.status === 0){
                    alert(response.message);
                    $('#text__errors').html('<span class="text-danger pb-2" style="font-size: 14px">'+response.message+'</span>');
                }
                else {
                    $('#text__errors').html('<span class="text-danger pb-2" style="font-size: 14px">'+'Kết nối với hệ thống thất bại.Xin vui lòng thử lại'+'</span>');
                }
            },
            complete: function (data) {
                btnSubmit.prop('disabled', false);
            }
        })


    })

    $('#chatFrom').submit(function (e) {
        e.preventDefault();
        var formSubmit = $(this);
        var url = formSubmit.attr('action');
        var btnSubmit = formSubmit.find(':submit');
        btnSubmit.prop('disabled', true);

        $.ajax({
            type: "POST",
            url: url,
            data: formSubmit.serialize(), // serializes the form's elements.
            beforeSend: function (xhr) {

            },
            success: function (response) {

                if(response.status == 1){

                    swal({
                        title: "Gửi tin nhắn thành công",
                        type: "success",
                        confirmButtonText: "Về dịch vụ đã mua",
                        showCancelButton: true,
                        cancelButtonText: "Đóng",
                    })
                        .then((result) => {
                            if (result.value) {
                                window.location = '/dich-vu-da-mua';
                            } else if (result.dismiss === "Đóng") {
                                location.reload();
                            }else {
                                location.reload();
                            }
                        })
                }
                else if (response.status == 2){
                    $('.loadModal__acount').modal('hide');

                    swal(
                        'Thông báo!',
                        response.message,
                        'warning'
                    )
                    $('.loginBox__layma__button__displayabs').prop('disabled', false);
                }else {
                    $('.loadModal__acount').modal('hide');
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
                    alert(response.message);
                    $('#text__errors').html('<span class="text-danger pb-2" style="font-size: 14px">'+response.message+'</span>');
                }
                else {
                    $('#text__errors').html('<span class="text-danger pb-2" style="font-size: 14px">'+'Kết nối với hệ thống thất bại.Xin vui lòng thử lại'+'</span>');
                }
            },
            complete: function (data) {
                btnSubmit.prop('disabled', false);
            }
        })


    })
})
