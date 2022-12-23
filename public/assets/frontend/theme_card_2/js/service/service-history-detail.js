$(document).ready(function(){

    $('body').on('click','#btnDestroy',function(e){
        e.preventDefault();
        var id = $(this).data('id');

        console.log(id)
        getDestroyModal(id);

    })

    function getDestroyModal(id) {

        request = $.ajax({
            type: 'GET',
            url: 'destroyservice',
            data: {
                id:id
            },
            beforeSend: function (xhr) {

            },
            success: (data) => {

                if (data.status == 1){

                    $('#destroyModal').modal('show');
                }else {
                    window.location.reload();
                }


            },
            error: function (data) {

            },
            complete: function (data) {

            }
        });
    }

    $(document).on('submit', '.destroyForm', function(e){
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
                // console.log(response)
                if(response.status == 1){
                    $('#destroyModal').modal('hide');

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
                    html += '<span style="color: red;font-size: 12px">' + response.message + '</span>';

                    $('.error__deleteserrvice').html('');
                    $('.error__deleteserrvice').html(html);
                }

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

    $('body').on('click','#btn-edit',function(e){
        e.preventDefault();
        var id = $(this).data('id');
        var index = $('.index').val();

        getEditModal(id,index);

    })




    function getEditModal(id,index) {

        request = $.ajax({
            type: 'GET',
            url: 'editservice',
            data: {
                id:id,
                index:index
            },
            beforeSend: function (xhr) {

            },
            success: (data) => {

                if (data.status == 1){

                    $('#edit_info').modal('show');
                }else {
                    window.location.reload();
                }


            },
            error: function (data) {

            },
            complete: function (data) {

            }
        });
    }

    $(document).on('submit', '.editForm', function(e){
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

})
