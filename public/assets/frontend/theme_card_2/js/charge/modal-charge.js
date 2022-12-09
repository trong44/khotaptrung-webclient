$(document).ready(function () {
    let modal_charge = $('#recharge_card');
    let form = modal_charge.find('#modal-form-charge');
    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
    }
    var btnSubmit = form.find(':submit');

    /*Get Telecom*/
    if (modal_charge.length){
        $.ajax({
            url:'/ajax/get-tele-card',
            type:'GET',
            success:function (res) {
                if (res.status === 1){
                    let telecoms = res.data;
                    let html = '';
                    if (telecoms.length){
                        telecoms.forEach(function (telecom) {
                            html += `<option value="${telecom.key}">${telecom.title}</option>`;
                        });
                    }else {
                        html += '<option value="">-- Vui lòng chọn nhà mạng --</option>';
                    }
                    modal_charge.find('#modal-telecom').html(html);
                }
                // $('select').niceSelect();
                $('#modal-telecom').trigger('change');
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
        });
    }
    $(document).on('change','#modal-telecom',function () {
        getAmount($(this).val());
    });

    function getAmount(telecom){
        var url = '/ajax/get-amount-tele-card';
        $.ajax({
            type: "GET",
            url: url,
            data: {
                telecom:telecom
            },
            success: function (res) {
                if (res.status ===1){
                    let amounts = res.data;
                    let html = '';
                    html += '<option value="">-- Vui lòng chọn mệnh giá, sai mất thẻ --</option>';
                    if (amounts.length) {
                        amounts.forEach(function (amount,index) {
                            html+=`<option value="${amount.amount}">${formatNumber(amount.amount)} - Nhận ${amount.ratio_true_amount}%</option>`
                        });
                    }
                    $('#modal-amounts').html(html);

                    reload_captcha_modal();
                }
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

    function reload_captcha_modal() {
        $.ajax({
            type: 'GET',
            url: '/reload-captcha',
            success: function (data) {
                $(".captcha_1 span").html(data.captcha);
            }
        });
    }

    function postCharge(){
        $.ajax({
            type: "POST",
            url: form.attr('action'),
            cache:false,
            data: form.serialize(), // serializes the form's elements.
            beforeSend: function (xhr) {
                // form.closest('.tab-content').toggleClass('load-overlay',true).prepend('<div class="wrap-spin"><div class="loading"><div class="loading-child"></div></div></div>');
            },
            success: function (res) {

                if(res.status === 1){
                    swal({
                        title: "Thành công !",
                        text: res.message,
                        icon: "success",
                    })

                    form.find('.message-form').empty();
                }

                if(res.status === 401){
                    window.location.href = '/login?return_url='+window.location.href;
                }
                if(res.status === 0){
                    form.find('.message-form').text(res.message);
                }
                form.closest('.tab-content').toggleClass('load-overlay',false);
                form.closest('.tab-content').find('.wrap-spin').remove();
                reload_captcha_modal();
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
                // form.closest('.tab-content').toggleClass('load-overlay',false);
                // form.closest('.tab-content').find('.wrap-spin').remove();
                btnSubmit.text('Nạp thẻ');
                btnSubmit.prop('disabled', false);
            }
        });
    }

    $('body').on('click','#modal-reload-captcha',function () {
        $('.refresh-captcha img').toggleClass("down");
        $.ajax({
            type: 'GET',
            url: '/reload-captcha2',
            success: function (data) {
                // console.log(data)
                $(".captcha_1 span").html(data);
            }
        });
    });

    form.on('submit',function (e) {
        e.preventDefault();
        postCharge();
        var loadingText = '<i class="fas fa-circle-notch fa-spin"></i> Đang xử lý...';
        btnSubmit.html(loadingText).prop('disabled', false);
        btnSubmit.attr("disabled", true);

    });

});
