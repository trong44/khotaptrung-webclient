$(document).ready(function(){

    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
    }
    // function getCaptcha(){
    //     $.ajax({
    //         type: 'GET',
    //         url: 'first-captcha',
    //         success: function (data) {
    //             $(".captcha_trangchu span").html(data.captcha);
    //         }
    //     });
    // }
    // getCaptcha();
    // $('#reload_trangchu').click(function () {
    //     $.ajax({
    //         type: 'GET',
    //         url: 'reload-captcha',
    //         success: function (data) {
    //             $(".captcha_trangchu span").html(data.captcha);
    //         }
    //     });
    //
    // });

    function getTelecom(){

        var url = '/get-tele-card';
        $.ajax({
            type: "GET",
            url: url,
            beforeSend: function (xhr) {
                $('#form-content').hide();
            },
            success: function (data) {
                if(data.status == 1){
                    let html = '';
                    if(data.data.length > 0){
                        $.each(data.data,function(key,value){
                            html += '<option value="'+value.key+'">'+value.key+'</option>';
                        });
                    }
                    else{
                        html += '<option value="">-- Vui lòng chọn nhà mạng --</option>';
                    }
                    $('select#telecom').html(html)
                    ele = $('select#telecom option').first();
                    var telecom = ele.val();
                    getAmount(telecom);
                    paycartDataChargeHistory();

                    $('#loading-data').remove();
                    $('#form-content').show();
                    $('#form-content').removeClass('hide');
                }
                // else{
                //     swal({
                //         title: "Có lỗi xảy ra !",
                //         text: data.message,
                //         icon: "error",
                //         buttons: {
                //             cancel: "Đóng",
                //         },
                //     })
                // }
            },
            error: function (data) {
                swal({
                    title: "Lỗi !",
                    text: "Có lỗi phát sinh vui lòng liên hệ QTV để kịp thời xử lý.",
                    icon: "error",
                    buttons: {
                        cancel: "Đóng",
                    },
                })
            },
            complete: function (data) {

            }
        });
    }

    function getAmount(telecom){
        if(telecom == null){
            html = '<option value="">-- Vui lòng chọn mệnh giá, sai mất thẻ --</option>';
            $('slect#amount').html(html)
            return;
        }
        var url = '/get-amount-tele-card';
        $.ajax({
            type: "GET",
            url: url,
            data: {
                telecom:telecom
            },
            beforeSend: function (xhr) {

            },
            success: function (data) {
                if(data.status == 1){
                    let html = '';
                    html += '<option value="">-- Vui lòng chọn mệnh giá, sai mất thẻ --</option>';
                    if(data.data.length > 0){
                        $.each(data.data,function(key,value){
                            html += '<option value="'+ value.amount +'" rel-ratio="'+ value.ratio_default+'">'+ formatNumber(value.amount)  +' VNĐ - Nhận ' + value.ratio_true_amount +'% </option>';
                        });
                    }
                    $('select#amount').html(html);
                }
                // else{
                //     swal({
                //         title: "Có lỗi xảy ra !",
                //         text: data.message,
                //         icon: "error",
                //         buttons: {
                //             cancel: "Đóng",
                //         },
                //     })
                // }
            },
            error: function (data) {
                swal({
                    title: "Lỗi !",
                    text: "Có lỗi phát sinh vui lòng liên hệ QTV để kịp thời xử lý.",
                    icon: "error",
                    buttons: {
                        cancel: "Đóng",
                    },
                })
            },
            complete: function (data) {

            }
        });
    }

    $('body').on('change','#telecom',function(){
        var telecom = $(this).val();
        getAmount(telecom)
    });

    getTelecom();

    $('#form-charge').submit(function (e) {
        e.preventDefault();
        var formSubmit = $(this);
        var url = formSubmit.attr('action');
        var btnSubmit = formSubmit.find(':submit');
        btnSubmit.text('Đang xử lý...');
        btnSubmit.prop('disabled', true);
        $.ajax({
            type: "POST",
            url: url,
            cache:false,
            data: formSubmit.serialize(), // serializes the form's elements.
            beforeSend: function (xhr) {

            },
            success: function (data) {

                if(data.status == 1){
                    swal({
                        title: "Thành công !",
                        text: data.message,
                        icon: "success",
                    })
                }
                else if(data.status == 401){
                    window.location.href = '/login?return_url='+window.location.href;
                }
                else if(data.status == 0){
                    swal({
                        title: "Nạp thẻ thất bại !",
                        text: data.message,
                        icon: "error",
                        buttons: {
                            cancel: "Đóng",
                        },
                    })
                }
                else{
                    swal({
                        title: "Có lỗi xảy ra !",
                        text: data.message,
                        icon: "error",
                        buttons: {
                            cancel: "Đóng",
                        },
                    })
                }
            },
            error: function (data) {
                swal({
                    title: "Có lỗi xảy ra !",
                    text: "Có lỗi phát sinh vui lòng liên hệ QTV để kịp thời xử lý.",
                    icon: "error",
                    buttons: {
                        cancel: "Đóng",
                    },
                })
            },
            complete: function (data) {
                $('#reload_trangchu').trigger('click');
                formSubmit.trigger("reset");
                btnSubmit.text('Nạp thẻ');
                btnSubmit.prop('disabled', false);
            }
        });
    });

    $(document).on('click', '.paginate__v1__nt .pagination a',function(event){
        event.preventDefault();

        var page = $(this).attr('href').split('page=')[1];

        $('#hidden_page_service_nt').val(page);

        $('li').removeClass('active');
        $(this).parent().addClass('active');


        paycartDataChargeHistory(page);
    });

    function paycartDataChargeHistory(page) {

        request = $.ajax({
            type: 'GET',
            url: '/get-tele-card/data',
            data: {
                page:page,
            },
            beforeSend: function (xhr) {

            },
            success: (data) => {
                if (data.status == 1){
                    $(".paycartdata").empty().html('');
                    $(".paycartdata").empty().html(data.data);
                }else if (data.status == 0){
                    var html = '';
                    html += '<div class="table-responsive" id="tableacchstory">';
                    html += '<table class="table table-hover table-custom-res">';
                    html += '<thead><tr><th>Thời gian</th><th>Nhà mạng</th><th>Mã thẻ</th><th>serial</th><th>Mệnh giá</th><th>Kết quả</th><th>Thực nhận</th></tr></thead>';
                    html += '<tbody>';
                    html += '<tr><td colspan="8"><span style="color: red;font-size: 16px;">' + data.message + '</span></td></tr>';
                    html += '</tbody>';
                    html += '</table>';
                    html += '</div>';

                    $(".paycartdata").empty().html('');
                    $(".paycartdata").empty().html(html);
                }

            },
            error: function (data) {

            },
            complete: function (data) {

            }
        });
    }
});
