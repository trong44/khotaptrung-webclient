$(document).ready(function () {
    let modal_charge = $('#rechargeModal');
    let form = modal_charge.find('#modal-form-charge');
    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
    }

    $('select.wide').niceSelect();
    $('#modal-telecom').trigger('change');

    ele = $('select#modal-telecom option').first();
    var telecom = ele.val();
    if (telecom){
        getAmount(telecom);
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
                    if (amounts.length) {
                        amounts.forEach(function (amount,index) {
                            html += `<label class="card-item">
                                        <input type="radio" name="amount" data-ratito="${amount.ratio_true_amount}" value="${amount.amount}" id="card-${index}" hidden ${!index ? 'checked' : ''}>
                                        <label class="card-label" for="card-${index}"><span>${formatNumber(amount.amount)} đ</span></label>
                                     </label>`;
                        });
                    }else {
                        html += `<span class="text-invalid">Chưa cấu hình mệnh giá thẻ</span>`;
                    }
                    $('#modal-amounts').html(html);

                    reload_captcha();
                }
            },
            error: function (data) {
                console.log('Có lỗi phát sinh vui lòng liên hệ QTV để kịp thời xử lý.(getAmount)')


            },
            complete: function (data) {

            }
        });
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

    function postCharge(){
        $.ajax({
            type: "POST",
            url: form.attr('action'),
            cache:false,
            data: form.serialize(), // serializes the form's elements.
            beforeSend: function (xhr) {
                form.closest('.tab-content').toggleClass('load-overlay',true).prepend('<div class="wrap-spin"><div class="loading"><div class="loading-child"></div></div></div>');
            },
            success: function (res) {

                if(res.status === 1){
                    $('#successChargeModal').modal('show');
                    $('#success_charge').html(res.message);
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
                reload_captcha();
            },
            error: function (data) {
                console.log('Có lỗi phát sinh vui lòng liên hệ QTV để kịp thời xử lý.(postCharge)')

            },
            complete: function (data) {
                form.closest('.tab-content').toggleClass('load-overlay',false);
                form.closest('.tab-content').find('.wrap-spin').remove();
            }
        });
    }

    $('#modal-reload-captcha').click(function () {
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
    });

    // Active swiper atm bank list both in modal and in pages
    let swiper_bank_lists = new Swiper('.swiper-bank-list', {
        autoplay: false,
        updateOnImagesReady: true,
        watchSlidesVisibility: false,
        lazyLoadingInPrevNext: false,
        lazyLoadingOnTransitionStart: false,
        slidesPerView: 6,
        speed: 300,
        spaceBetween: 16,
        allowTouchMove: false,
        grabCursor: false,
        observer: true,
        observeParents: true,
        freeMode: false,
        breakpoints: {
            992: {
                allowTouchMove: true,
                slidesPerView: 5,
            },
            768: {
                allowTouchMove: true,
                slidesPerView: 2.8,
                spaceBetween: 12,
            }
        }
    });

});
