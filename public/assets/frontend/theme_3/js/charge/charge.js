$(document).ready(function(){

    var telecom = $('select#telecom').first().val();

    if (telecom){
        if (telecom.length > 0){
            getAmount(telecom);
        }else {
            $('.amount-loading').addClass('d-none');
            $('#amount').removeClass('d-none');
            $('#amount_mobile').removeClass('d-none');
        }
    } else {
        $('.amount-loading').addClass('d-none');
        $('#amount').removeClass('d-none');
        $('#amount_mobile').removeClass('d-none');
    }

    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
    }

    function reload_captcha() {
        $.ajax({
            type: 'GET',
            url: '/reload-captcha',
            success: function (data) {

                $(".captcha_1 span").html(data.captcha);
            }
        });
    }

    $('#reload_1').click(function () {
        $('.refresh-captcha img').toggleClass("down");
        $.ajax({
            type: 'GET',
            url: 'reload-captcha2',
            success: function (data) {
                // console.log(data)
                $(".captcha_1 span").html(data);
            }
        });

    });

    function getTelecom(){
        var url = '/ajax/get-tele-card';
        $.ajax({
            type: "GET",
            url: url,
            success: function (data) {
                if(data.status == 1){
                    let html = '';
                    if(data.data.length > 0){
                        $.each(data.data,function(key,value){
                            html += '<option value="'+value.key+'">'+value.title+'</option>';
                        });
                    }
                    else{
                        html += '<option value="">-- Vui lòng chọn nhà mạng --</option>';
                    }
                    $('select#telecom').html(html)
                    $('.select-form').niceSelect('update');
                    ele = $('select#telecom option').first();
                    var telecom = ele.val();
                    if (telecom.length > 0){
                        getAmount(telecom);
                    }else {
                        $('.amount-loading').remove();
                    }
                    $('.charge_name').html(' <small>'+telecom+'</small>')
                    $('.loading-data').remove();
                    $('#form-charge2').removeClass('hide_charge');
                }
            },
            error: function (data) {
                console.log('Có lỗi phát sinh vui lòng liên hệ QTV để kịp thời xử lý.(getTelecom)')

            },
            complete: function (data) {
            }
        });

    }
    $('.charge_name').html(' <small>'+telecom+'</small>')
    function getAmount(telecom){
        var url = '/ajax/get-amount-tele-card';
        $.ajax({
            type: "GET",
            url: url,
            data: {
                telecom:telecom
            },
            beforeSend: function (xhr) {
                $('.amount-loading').removeClass('d-none');
                $('#amount').addClass('d-none');
                $('#amount_mobile').addClass('d-none');
            },
            success: function (data) {
                $('.amount-loading').addClass('d-none');

                if(data.status == 1){
                    $('#amount').removeClass('d-none');
                    $('#amount_mobile').removeClass('d-none');

                    let html = '';
                    // html += '<option value="">-- Vui lòng chọn mệnh giá, sai mất thẻ --</option>';
                    if(data.data.length > 0){
                        $.each(data.data,function(key,value){
                            html += '<div class=" col-4 col-md-4 pl-fix-4 pr-fix-4 check-radio-form charge-card-form">'
                            if (key == 0){
                                html += '<input  name="amount" type="radio" id="recharge_amount_'+key+'" data-ratito="'+value.ratio_true_amount+'" value="'+value.amount+'"  hidden checked>'
                            }else {
                                html += '<input  name="amount" type="radio" id="recharge_amount_'+key+'" data-ratito="'+value.ratio_true_amount+'" value="'+value.amount+'" hidden>'
                            }

                            html += '<label for="recharge_amount_'+key+'">'
                            html += '<p>'+ formatNumber(value.amount)  +'đ</p>'
                            html += ' </label>'
                            html += '  </div>'
                            // html += '<option value="'+ value.amount +'" rel-ratio="'+ value.ratio_default+'">'+ formatNumber(value.amount)  +' VNĐ - Nhận ' + value.ratio_true_amount +'% </option>';
                        });
                    }


                    if($(window).width() > 992){
                        $('#amount').html(html);
                    }else {
                        $('#amount_mobile').html(html);
                    }

                    amount_checked =  $('input[name=amount]:checked');
                    updatePriceCharge()
                    $('.charge_amount').html(' <small>'+  formatNumber(amount_checked.val())+'</small>')
                    $('.charge_price').html(' <span>'+  formatNumber(amount_checked.val())+'</span>')
                    $('.charge_ratito').html(' <small>'+  formatNumber(amount_checked.attr("data-ratito"))+'</small>')
                    $('input[name=amount]').change(function(){
                        $('.charge_amount').html(' <small>'+ formatNumber($(this).val()) +'</small>')
                        $('.charge_price').html(' <span>'+ formatNumber($(this).val()) +'</span>')
                        $('.charge_ratito').html(' <small>'+ formatNumber($(this).attr("data-ratito")) +'</small>')

                    });


                    reload_captcha()
                }
                else{
                    console.log('Có lỗi xảy ra ('+data.message+')')


                }
            },
            error: function (data) {
                console.log('Có lỗi phát sinh vui lòng liên hệ QTV để kịp thời xử lý.(getAmount)')


            },
            complete: function (data) {

            }
        });
    }



    $('body').on('change','#telecom',function(){
        var telecom = $(this).val();
        $('.charge_name').html(' <small>'+telecom+'</small>')
        $('.charge_amount').html('')
        $('.charge_price').html('')
        $('.charge_ratito').html('')
        getAmount(telecom)
    });

    // getTelecom();

    var formSubmit = $('#form-charge2');
    var url = formSubmit.attr('action');
    var btnSubmit = formSubmit.find(':submit');
    let width = $(window).width();
    var current_fs, next_fs, previous_fs; //fieldsets
    var left, opacity, scale; //fieldset properties which we will animate
    var animating; //flag to prevent quick multi-click glitches

    function postCharge(){
        $.ajax({
            type: "POST",
            url: url,
            cache:false,
            data: formSubmit.serialize(), // serializes the form's elements.
            beforeSend: function (xhr) {

            },
            success: function (data) {
                $('#openCharge').modal('hide');

                if(data.status == 1){
                    $('#successChargeModal').modal('show');
                    $('#success_charge').html(data.message)

                }
                else if(data.status == 401){
                    window.location.href = '/login?return_url='+window.location.href;
                }
                else if(data.status == 0){
                    $('#rejectChargeModal').modal('show');
                    $('#reject_charge').html(data.message)
                }
                else{

                    console.log('Có lỗi xảy ra ('+data.message+')')

                }
            },
            error: function (data) {
                console.log('Có lỗi phát sinh vui lòng liên hệ QTV để kịp thời xử lý. (post charge)')


            },
            complete: function (data) {
                $('#reload_1').trigger('click');
                formSubmit.trigger("reset");
                btnSubmit.text('Nạp thẻ');
                btnSubmit.prop('disabled', false);
                $('.btn-confirm-charge').text('Xác nhận');
                $('.btn-confirm-charge').prop('disabled', false);
            }
        });
    }

    formSubmit.submit(function (e) {
        e.preventDefault();
        e.stopPropagation();

        if (width < 992){
            if (animating) return false;
            animating = true;
            current_fs = $('#fieldset-one_transaction');
            next_fs = $('#fieldset-two-charge');
            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function (now, mx) {
                    left = (now * 50) + "%";
                    opacity = 1 - now;
                    next_fs.css({'left': left, 'opacity': opacity});
                },
                complete: function () {
                    current_fs.hide();
                    animating = false;
                },
                easing: 'easeInOutBack'
            });
        }else {
            $('#openCharge').modal('show');
        }


    });
    $('.btn-confirm-charge').on('click', function (m) {
        btnSubmit.text('Đang xử lý...');
        btnSubmit.prop('disabled', true);
        $('.btn-confirm-charge').text('Đang xử lý...');
        $('.btn-confirm-charge').prop('disabled', true);
        if (width < 992){
            postCharge()
        }else {
            postCharge()
        }
        return false;

    });

    function updatePriceCharge() {

        var amount=amount_checked.val();
        var ratio=amount_checked.attr("data-ratito");
        if(ratio<=0 || ratio=="" || ratio==null){
            ratio=100;
        }
        var sale=amount-(amount*ratio/100);
        var total=amount-sale;
        // var total=sale*quantity;
        var totalnotsale = amount
        if(sale != 0){
            $('.charge_total').html('<span>' + total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + 'đ</span>');

        }else {
            $('.charge_total').html('<span>' + totalnotsale.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + 'đ</span>');

        }
        $('input[name=amount]').change(function(){

            var amount=$(this).val();
            var ratio=$(this).attr("data-ratito");

            if(ratio<=0 || ratio=="" || ratio==null){
                ratio=100;
            }
            var sale=amount-(amount*ratio/100);
            var total=amount-sale;
            // var total=sale*quantity;
            var totalnotsale = amount
            if(sale != 0){
                $('.charge_total').html('<span>' + total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + 'đ</span>');

            }else {
                $('.charge_total').html('<span>' + totalnotsale.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + 'đ</span>');

            }
        });
    }


    $('#nav_charge').click(function () {
        let base_url = `${window.location.origin}/nap-the`;
        window.history.pushState("charge_card","", base_url);
        $('#charge_title').text('Nạp thẻ cào')
    });
    $('#nav_charge_atm').click(function () {
        let base_url = `${window.location.origin}/recharge-atm`;
        window.history.pushState("charge_card","", base_url);
        $('#charge_title').text('ATM tự động')
    });
});
