$(document).ready(function(){

    getCardAmount($('select[name="card-type"]').val());

    var dataSend = {
        amount: 0,
        telecom: '',
        quantity: 0,
        _token: $('meta[name="csrf-token"]').attr('content'),
    }

    var swiper_card = new Swiper(".swiper-card-purchase", {
        slidesPerView: 1,
        spaceBetween: 16,
        freeMode: true,
        observer: true,
        observeParents: true,
    });

    $('#btnPurchase').on('click', function (e) {
        e.preventDefault();
        prepareDataSend();
        $('#homealert').modal('show');
    });

    $(document).on('click', '#btnConfirmPurchase', function(e) {
        e.preventDefault();
        $.ajax({
            url:'/ajax/mua-the',
            type:'POST',
            data: dataSend,
            beforeSend: function () {
                $('#btnConfirmPurchase').prop("disabled", true);
                $('#btnConfirmPurchase').text("Đang xử lý");
                $('.swiper-card-purchase .swiper-wrapper').empty();
            },
            success:function (res) {
                // handle data callback
                $('#homealert').modal('hide');
                if(res.status && res.status != 401){
                    let data = res.data;

                    amount_card = dataSend.amount;
                    telecom_card = dataSend.telecom;
                    telecom_card_img =  $('select[name="card-type"]').find(':selected').data('img');
                    

                    if (data.length > 0){

                        //Append HTML for desktop layout
                        data.forEach(function (card) {
                            let html_card = '';
                            html_card += ' <div class="swiper-slide card__detail">'
                            html_card += ' <div class="card--header__detail p-3">'
                            html_card += ' <div class="card--info__wrap">'
                            html_card += '<div class="card--info__wrap d-flex">'
                            html_card += ' <div class="card--logo d-flex">'
                            html_card += ' <img src="'+telecom_card_img+'" alt="">'
                            html_card += ' </div>'
                            html_card += ' <div class="card--info">'
                            html_card += '<div class="card--info__name " >'+telecom_card+'</div>'
                            html_card += '<div class="card--info__value ">'
                            html_card += ' <a href="javascript:void(0)" class="text-primary" >'+formatNumber(amount_card)+' đ</a>'
                            html_card += ' </div>'
                            html_card += ' </div>'
                            html_card += ' </div>'
                            html_card += ' </div>'
                            html_card += ' </div>'
                            html_card += '  <div class="card--gray p-2 m-2" style="background-color: #F8F8FC;border-radius: 4px">'
                            html_card += ' <div class="card--attr justify-content-between d-flex text-center">'
                            html_card += ' <div class="card--attr__name fw-400 fz-13 text-center">Mã thẻ</div>'
                            html_card += ' <div class="card--attr__value fz-13 fw-500 d-flex">'
                            html_card += ' <div class="card__info c-mr-8">'+card.pin+'</div>'
                            html_card += ' <div class="icon--coppy js-copy-text">'
                            html_card += ' <b class="ml-2"><i style="cursor: pointer" class="fa fa-copy copyData" data-copy="'+card.pin+'" aria-hidden="true"></i></b>\n'
                            html_card += ' </div>'
                            html_card += ' </div>'
                            html_card += ' </div>'
                            html_card += '  <div class="card--attr justify-content-between pt-0 d-flex text-center">'
                            html_card += ' <div class="card--attr justify-content-between pt-0 d-flex text-center"> Seri</div>'
                            html_card += ' <div class="card--attr__value fz-13 fw-500 d-flex">'
                            html_card += ' <div class="card__info c-mr-8">'+card.serial+'</div>'
                            html_card += ' <div class="icon--coppy js-copy-text">'
                            html_card += ' <b class="ml-2"><i style="cursor: pointer" class="fa fa-copy copyData" data-copy="'+card.serial+'" aria-hidden="true"></i></b>\n'
                            html_card += ' </div>'
                            html_card += '</div>'
                            html_card += ' </div>'
                            html_card += ' </div>'
                            html_card += ' </div>'
                            $('.swiper-card-purchase .swiper-wrapper').append(html_card);
                        });
                    }

                    if (data.length > 1){
                        swiper_card.params.slidesPerView = 1.25;
                    } else {
                        swiper_card.params.slidesPerView = 1;
                    }

                    swiper_card.update();

                    $('#successModal').modal('show');
                }
                else if(res.status == 401){
                    window.location.href = '/login?return_url='+window.location.href;
                }
                else if(res.status == 0){
                    swal({
                        title: "Mua thẻ thất bại !",
                        text: res.message,
                        icon: "error",
                        buttons: {
                            cancel: "Đóng",
                        },
                    })

                }
                else{
                    swal({
                        title: "Có lỗi xảy ra !",
                        text: res.message,
                        icon: "error",
                        buttons: {
                            cancel: "Đóng",
                        },
                    })
                }
            },
            error: function (res) {
                swal({
                    title: "Có lỗi xảy ra !",
                    text: res.message,
                    icon: "error",
                    buttons: {
                        cancel: "Đóng",
                    },
                })
            },
            complete: function () {
                $('#btnConfirmPurchase').prop("disabled", false);
                $('#btnConfirmPurchase').text("Xác nhận");
            }
        });
    });

    //Listen to onchange event in input card-type
    $('select[name="card-type"]').change(function (e) {
        e.preventDefault();
        getCardAmount($(this).val());
    });

    //Activate onchange, oninput function for input field inside
    $('select[name="amount"]').change(function (e) {
        e.preventDefault();
        preparePriceBtn();
    });
    $('select[name="card-quantity"]').on('change', function (e) {
        e.preventDefault();
        preparePriceBtn();
    });

    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
    }

    function getCardAmount (cardKey) {
        $.ajax({
            url: '/ajax/store-card/get-amount',
            type: 'GET',
            data: {
                telecom: cardKey
            },
            beforeSend: function () {
                $('#amount').empty();
            },
            success: function (res) {
                if (res.status) {
                    let data = res.data;
                    let loop_index = 0;

                    if (!data.length) {
                        $('#amount').append('<option value="" selected>Chưa có mệnh giá của thẻ</option>');
                        $('#btnPurchase').prop('disabled', true);
                        preparePriceBtn();
                    } else {
                        data.forEach(function (card) {
                            let html = '';
                            //Check if it is the first loop
                            if (loop_index === 0) {
                                html += `<option value="${card.amount}" data-ratio="${card.ratio_default}" selected>${formatNumber(card.amount)} VNĐ - ${100 - card.ratio_default}%</option>`;
                            } else {
                                html += `<option value="${card.amount}" data-ratio="${card.ratio_default}">${formatNumber(card.amount)} VNĐ - ${100 - card.ratio_default}%</option>`;
                            }

                            //Increase loop index
                            loop_index++;

                            // Append new HTML amount
                            $('#amount').append(html);

                        });

                        //prepare the input field and update price related value
                        $('select[name="card-quantity"]').val(1);

                        //Make btn no longer disable when failed get data
                        $('#btnPurchase').prop('disabled', false);
                        preparePriceBtn();
                    }

                }
            },
            complete: function () {

            }
        });
    }

    function preparePriceBtn () {
        let price = calculatePrice();
        if (price) {
            price = formatNumber(price);
            $('#cardPrice').text(price);
        } else {
            $('#cardPrice').text('0');
            $('#btnPurchase').prop('disabled', true);
        }
    }

    //Calculate price
    function calculatePrice () {
        let amount = $('select[name="amount"]').find(':selected').val();
        let quantity = $('select[name="card-quantity"]').val();
        let discount = $('select[name="amount"]').find(':selected').data('ratio');

        let discountPerCard = amount - (amount * discount /100);
        let totalPrice = (amount - discountPerCard) * quantity;
        let totalNotSale = amount * quantity;

        if (discountPerCard) {
            return totalPrice;
        }

        return totalNotSale;
    }

    function resetSuccessModal() {
        $('#modal--success__payment .card__message').text('');
        $('#modal--success__payment #successPrice').text('');
        $('#modal--success__payment #successQuantity').text('');
        $('#modal--success__payment .swiper-wrapper').empty();
    }

    //Append new data to submit to backend
    function prepareDataSend() {
        let amount = $('select[name="amount"]').find(':selected').val();
        let telecom = $('select[name="card-type"]').val();
        let quantity = $('select[name="card-quantity"]').val();

        dataSend.amount = amount;
        dataSend.telecom = telecom.toUpperCase();
        dataSend.quantity = quantity;

        console.log(dataSend);
    }
});
