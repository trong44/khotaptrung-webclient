$(document).ready(function () {
    // getListCard();

    //Get amount of the card just been choosen when render
    getCardAmount($('input[name="card-type"]').val());

    //Listen to onchange event in input card-type
    $('input[name="card-type"]').change(function (e) {
        e.preventDefault();
        getCardAmount($(this).val());
    });

    var swiper_card = new Swiper(".slider--card", {
        slidesPerView: 1,
        spaceBetween: 16,
        freeMode: true,
        observer: true,
        observeParents: true,
    });
    var slider_card_telecom = new Swiper(".slider--card__telecom", {
        slidesPerView: 2.5,
        spaceBetween: 8,
        freeMode: true,
        observer: true,
        observeParents: true,
    });
    var slider_card_amount = new Swiper(".slider--card__amount", {
        slidesPerView: 2.5,
        spaceBetween: 8,
        freeMode: true,
        observer: true,
        observeParents: true,
    });

    var dataSend = {
        amount: 0,
        telecom: '',
        quantity: 0,
        _token: $('meta[name="csrf-token"]').attr('content'),
    }

    $('#btn-confirm').on('click', function (e) {
        e.preventDefault();
        resetConfirmModal();
        prepareConfirmModal();
        resetMobileConfirm();
        prepareMobileConfirm();
        prepareDataSend();
    });

    $(document).on('click', '#modal--confirm__payment #confirmSubmitButton', function(e) {
        e.preventDefault();
        $.ajax({
            url:'/ajax/mua-the',
            type:'POST',
            data: dataSend,
            beforeSend: function () {
                $('#confirmSubmitButton').prop("disabled", true);
                $('#confirmSubmitButton').text("Đang xử lý");
                resetSuccessModal();
            },
            success:function (res) {
                // handle data callback
                $('#modal--confirm__payment').modal('hide');
                if(res.status && res.status != 401){
                    let data = res.data;
                    let cardImage = $('input[name="card-type"]:checked').data('img');
                    let cardName = $('input[name="card-type"]:checked').val();

                    $('#modal--success__payment .card__message').text(res.message);
                    $('#modal--success__payment #successCard').attr('src', cardImage);
                    $('#modal--success__payment #successPrice').text(formatNumber(dataSend.amount) + ' đ');
                    $('#modal--success__payment #successQuantity').text(dataSend.quantity);
                    if (data.length > 0){

                        //Append HTML for desktop layout
                        data.forEach(function (card) {
                            let html_card = '';
                            html_card += `<div class="swiper-slide card__detail">`;
                            html_card += `  <div class="card--header__detail">`;
                            html_card += `      <div class="card--info__wrap">`;
                            html_card += `          <div class="card--logo">`;
                            html_card += `            <img src="${cardImage}" alt="telecom_logo">`;
                            html_card += `          </div>`;
                            html_card += `          <div class="card--info">`;
                            html_card += `              <div class="card--info__name">`;
                            html_card += `                  ${cardName}`;
                            html_card += `              </div>`;
                            html_card += `               <div class="card--info__value">`;
                            html_card += `                    ${formatNumber(dataSend.amount)} đ`;
                            html_card += `                </div>`;
                            html_card += `            </div>`;
                            html_card += `        </div>`;
                            html_card += `    </div>`;
                            html_card += `    <div class="card--gray">`;
                            html_card += `      <div class="card--attr">`;
                            html_card += `            <div class="card--attr__name">`;
                            html_card += `              Mã thẻ`;
                            html_card += `            </div>`;
                            html_card += `            <div class="card--attr__value">`;
                            html_card += `              <div class="card__info">`;
                            html_card += `                  ${card.pin}`;
                            html_card += `               </div>`;
                            html_card += `               <div class="icon--coppy js-copy-text">`;
                            html_card += `                    <img src="/assets/frontend/theme_3/image/icons/coppy.png" alt="icon__copy">`;
                            html_card += `                </div>`;
                            html_card += `            </div>`;
                            html_card += `        </div>`;
                            html_card += `        <div class="card--attr">`;
                            html_card += `             <div class="card--attr__name">`;
                            html_card += `                 Số Series`;
                            html_card += `              </div>`;
                            html_card += `              <div class="card--attr__value">`;
                            html_card += `                  <div class="card__info">`;
                            html_card += `                      ${card.serial}`;
                            html_card += `                   </div>`;
                            html_card += `                   <div class="icon--coppy js-copy-text">`;
                            html_card += `                      <img src="/assets/frontend/theme_3/image/icons/coppy.png" alt="icon__copy">`;
                            html_card += `                   </div>`;
                            html_card += `               </div>`;
                            html_card += `         </div>`;
                            html_card += `    </div>`;
                            html_card += `</div>`;
                            $('#modal--success__payment .swiper-wrapper').append(html_card);
                        });
                    }

                    if (data.length > 1){
                        swiper_card.params.slidesPerView = 1.25;
                    } else {
                        swiper_card.params.slidesPerView = 1;
                    }

                    swiper_card.update();

                    $('#modal--success__payment').modal('show');
                }
                else {
                    $('#message--error--buy').text(res.message);
                    $('#modal--fail__payment').modal('show');
                }
            },
            error: function (res) {
                $('#message--error--buy').text('');
                $('#modal--fail__payment').modal('show');
            },
            complete: function () {
                $('#confirmSubmitButton').prop("disabled", false);
                $('#confirmSubmitButton').text("Xác nhận");
            }
        });

        $('#modal--confirm__payment').modal('hide');
    });

    $('#confirmMobileButton').on('click', function(e) {
        e.preventDefault();
        $.ajax({
            url:'/ajax/mua-the',
            type:'POST',
            data: dataSend,
            beforeSend: function () {
                $('#confirmMobileButton').prop("disabled", true);
                $('#confirmMobileButton').text("Đang xử lý");
                resetSuccessMobile();
            },
            success:function (res) {
                // handle data callback
                if(res.status && res.status != 401) {
                    let data = res.data;
                    let cardImage = $('input[name="card-type"]:checked').data('img');
                    let cardName = $('input[name="card-type"]:checked').val();

                    $('#modal--success__payment .card__message').text(res.message);
                    $('#modal--success__payment #successCard').attr('src', cardImage);
                    $('#modal--success__payment #successPrice').text(formatNumber(dataSend.amount) + ' đ');
                    $('#modal--success__payment #successQuantity').text(dataSend.quantity);
                    if (data.length > 0){

                        //Append HTML for mobile layout
                        data.forEach(function (card) {
                            let html_card_mobile = '';
                            html_card_mobile += `<div class="card__detail">`;
                            html_card_mobile += `<div class="card--header__detail">`;
                            html_card_mobile += `<div class="card--info__wrap">`;
                            html_card_mobile += `<div class="card--logo">`;
                            html_card_mobile += `<img src="${cardImage}" alt="">`;
                            html_card_mobile += `</div>`;
                            html_card_mobile += `<div class="card--info">`;
                            html_card_mobile += `<div class="card--info__name">`;
                            html_card_mobile += `${cardName}`;
                            html_card_mobile += `</div>`;
                            html_card_mobile += `<div class="card--info__value">`;
                            html_card_mobile += ` ${formatNumber(dataSend.amount)} đ`;
                            html_card_mobile += `</div>`;
                            html_card_mobile += `</div>`;
                            html_card_mobile += `</div>`;
                            html_card_mobile += `</div>`;
                            html_card_mobile += `<div class="card--gray">`;
                            html_card_mobile += `<div class="card--attr">`;
                            html_card_mobile += `<div class="card--attr__name">`;
                            html_card_mobile += `Mã thẻ`;
                            html_card_mobile += `</div>`;
                            html_card_mobile += `<div class="card--attr__value -bold">`;
                            html_card_mobile += `<div class="card__info">`;
                            html_card_mobile += `${card.pin}`;
                            html_card_mobile += `</div>`;
                            html_card_mobile += `<div class="icon--coppy js-copy-text">`;
                            html_card_mobile += `<img src="/assets/frontend/theme_3/image/icons/coppy.png" alt="">`;
                            html_card_mobile += `</div>`;
                            html_card_mobile += `</div>`;
                            html_card_mobile += `</div>`;
                            html_card_mobile += `<div class="card--attr">`;
                            html_card_mobile += `<div class="card--attr__name">`;
                            html_card_mobile += `Seri`;
                            html_card_mobile += `</div>`;
                            html_card_mobile += `<div class="card--attr__value -bold">`;
                            html_card_mobile += `<div class="card__info">`;
                            html_card_mobile += `${card.pin}`;
                            html_card_mobile += `</div>`;
                            html_card_mobile += `<div class="icon--coppy js-copy-text">`;
                            html_card_mobile += `<img src="/assets/frontend/theme_3/image/icons/coppy.png" alt="">`;
                            html_card_mobile += `</div>`;
                            html_card_mobile += `</div>`;
                            html_card_mobile += `</div>`;
                            html_card_mobile += `</div>`;
                            html_card_mobile += `</div>`;

                            $('#mobile--success__payment .card--list').append(html_card_mobile);
                        });
                    }

                    $('.mobile--confirm__payment').hide();
                    $('.mobile--success__payment').show();
                }
                else {
                    $('#message--error--buy').text(res.message);
                    $('#modal--fail__payment').modal('show');
                }
            },
            error: function (res) {
                $('#message--error--buy').text('');
                $('#modal--fail__payment').modal('show');
            },
            complete: function () {
                $('#confirmMobileButton').prop("disabled", false);
                $('#confirmMobileButton').text("Xác nhận");
            }
        });

    });

    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
    }

    function getListCard () {
        $.ajax({
            url: '/ajax/store-card/get-telecom',
            type: 'GET',
            success: function (res) {
                if (res.status) {
                    let data = res.data;
                    let loop_index = 0;
                    data.forEach(function (card) {
                        if($(window).width() > 992){
                            let html = '';
                            html += `<li class="cards__item col-4 col-lg-2 p_0">`;
                            //Check if it is the first loop
                            if (loop_index === 0) {
                                html += `<input type="radio" id="card-${card.id}" value="${card.key}" data-img="${card.image}" name="card-type" checked hidden>`;
                            } else {
                                html += `<input type="radio" id="card-${card.id}" value="${card.key}" data-img="${card.image}" name="card-type" hidden>`;
                            }
                            html += `<label for="card-${card.id}">`;
                            html += `<img src="${card.image}" class="card--logo" alt="${card.title}">`;
                            html += `</label>`;
                            html += `</li>`;

                            //Increase loop index
                            loop_index++;

                            if (card.params && card.params.teltecom_type) {
                                //Apepnd HTML
                                if (card.params.teltecom_type == 2) {
                                    $('#cardGameList').append(html);
                                }
                                if (card.params.teltecom_type == 1) {
                                    $('#cardPhoneList').append(html);
                                }

                            } else {
                                $('#cardPhoneList').append(html);
                            }
                        }else {
                            // mobile
                            let html_mobile = '';
                            html_mobile += `<div class="swiper-slide">`;
                            html_mobile += `<div class="cards__item  w-100">`;
                            //Check if it is the first loop
                            if (loop_index === 0) {
                                html_mobile += `<input type="radio" id="card-${card.id}" value="${card.key}" data-img="${card.image}" name="card-type" checked hidden>`;
                            } else {
                                html_mobile += `<input type="radio" id="card-${card.id}" value="${card.key}" data-img="${card.image}" name="card-type" hidden>`;
                            }
                            html_mobile += `<label for="card-${card.id}">`;
                            html_mobile += `<img src="${card.image}" class="card--logo" alt="${card.title}">`;
                            html_mobile += `</label>`;
                            html_mobile += `</div>`;
                            html_mobile += `</div>`;

                            //Increase loop index
                            loop_index++;

                            if (card.params && card.params.teltecom_type) {
                                //Apepnd HTML
                                if (card.params.teltecom_type == 2) {
                                    $('#cardGameListMobile').append(html_mobile);
                                }
                                if (card.params.teltecom_type == 1) {
                                    $('#cardPhoneListMobile').append(html_mobile);
                                }

                            } else {
                                $('#cardPhoneListMobile').append(html_mobile);
                            }
                        }
                    });

                    //Get amount of the card just been choosen when render
                    getCardAmount($('input[name="card-type"]').val());

                    //Listen to onchange event in input card-type
                    $('input[name="card-type"]').change(function (e) {
                        e.preventDefault();
                        getCardAmount($(this).val());
                    });

                    $('.section--amount__card').removeClass('d-none');
                }
            },
            error: function () {
                console.log('Đã xảy ra lỗi khi load dữ liệu! Vui lòng load lại trang! (getListCard storecard)')
                // alert("Đã xảy ra lỗi khi load dữ liệu! Vui lòng load lại trang!")
            },
            complete: function () {
                $('#cardGameList .loader').addClass('d-none');
            }
        });
    };

    function getCardAmount (cardKey) {
        $.ajax({
            url: '/ajax/store-card/get-amount',
            type: 'GET',
            data: {
                telecom: cardKey
            },
            beforeSend: function () {
                //Display none wrapper
                $('.denos--wrap').addClass('d-none');
                //Add loading effect
                $('#amountWidget .loader').removeClass('d-none');
            },
            success: function (res) {
                if (res.status) {
                    let data = res.data;
                    let loop_index = 0;

                    //Empty element
                    $('#cardAmountList').empty();


                    if (!data.length) {

                        $('#cardAmountList').append('<p class="text-center c-mb-0">Chưa có mệnh giá của thẻ</p>');

                        resetAmountWidget();

                        $('#btn-confirm').prop('disabled', true);
                    } else {
                        data.forEach(function (card) {
                            let html = '';
                            html += `<li class="deno__item col-4 col-lg-4">`;
                            //Check if it is the first loop
                            if (loop_index === 0) {
                                html += `<input type="radio" id="amount-${card.id}" value="${card.amount}" data-discount="${card.ratio_default}" name="card-value" checked hidden>`;
                            } else {
                                html += `<input type="radio" id="amount-${card.id}" value="${card.amount}" data-discount="${card.ratio_default}" name="card-value" hidden>`;
                            }
                            html += `<label for="amount-${card.id}" class="deno__value">`;
                            html += `<span>${formatNumber(card.amount)} đ</span>`;
                            html += `</label>`;
                            html += `</li>`;

                            //Increase loop index
                            loop_index++;

                            // Append new HTML amount
                            $('#cardAmountList').append(html);

                        });

                        //prepare the input field and update price related value
                        $('input[name="card-amount"]').val(1);
                        prepareAmountWidget();

                        //Activate onchange, oninput function for input field inside
                        $('input[name="card-value"]').change(function (e) {
                            e.preventDefault();
                            prepareAmountWidget();
                        });
                        $('input[name="card-amount"]').on('input', function (e) {
                            e.preventDefault();
                            prepareAmountWidget();
                        });

                        //Make btn no longer disable when failed get data
                        $('#btn-confirm').prop('disabled', false);
                    }

                    $('.denos--wrap').removeClass('d-none');

                }
            },
            complete: function () {
                $('#amountWidget .loader').addClass('d-none');
            }
        });
    }

    function resetAmountWidget () {
        $('.discount--value').text(`0%`);
        $('.price--total__value').text(`0 đ`);
    }

    function prepareAmountWidget () {
        let discountCardValue = $('input[name="card-value"]:checked').data('discount');
        $('input[name="card-discount"]').val(discountCardValue);

        if (isNaN(100 - discountCardValue)) {
            $('.discount--value').text(`0%`);
        } else {
            $('.discount--value').text(`${100 - discountCardValue}%`);
        }

        if (isNaN(calculatePrice())) {
            $('.price--total__value').text(`0 đ`);
        } else {
            $('.price--total__value').text(`${formatNumber( calculatePrice() )} đ`);
        }
    }

    //Calculate price
    function calculatePrice () {
        let amount = $('input[name="card-value"]:checked').val();
        let quantity = $('input[name="card-amount"]').val();
        let discount = $('input[name="card-discount"]').val();

        let discountPerCard = amount - (amount * discount /100);
        let totalPrice = (amount - discountPerCard) * quantity;
        let totalNotSale = amount * quantity;

        if (discountPerCard) {
            return totalPrice;
        }

        return totalNotSale;
    }

    //Reset data in confirm modal
    function resetMobileConfirm () {
        $('#confirmMobileCard').empty();
        $('#confirmMobilePrice').text('');
        $('#confirmMobileQuantity').text('');
        $('#confirmMobileDiscount').text('');
        $('#confirmMobileTotal').text('');
        $('#totalMobileBill').text('');
    }

    function resetConfirmModal () {
        $('#modal--confirm__payment #confirmPrice').text('');
        $('#modal--confirm__payment #confirmQuantity').text('');
        $('#modal--confirm__payment #confirmDiscount').text('');
        $('#modal--confirm__payment #confirmTotal').text('');
        $('#modal--confirm__payment #totalBill').text('');
    }

    function resetSuccessModal() {
        $('#modal--success__payment .card__message').text('');
        $('#modal--success__payment #successPrice').text('');
        $('#modal--success__payment #successQuantity').text('');
        $('#modal--success__payment .swiper-wrapper').empty();
        swiper_card.update();
    }

    function resetSuccessMobile() {
        $('#mobile--success__payment .card__message').text('');
        $('#mobile--success__payment .card--list').empty();
    }

    //append new data into confirm modal
    function prepareConfirmModal() {
        let confirmCard = $('input[name="card-type"]:checked').data('img');
        let confirmPrice = $('input[name="card-value"]:checked').val();
        let confirmQuantity = $('input[name="card-amount"]').val();
        let confirmDiscount = $('input[name="card-value"]:checked').data('discount');

        $('#modal--confirm__payment #confirmCard').attr('src',confirmCard);
        $('#modal--confirm__payment #confirmPrice').text(`${formatNumber( confirmPrice )} đ`);
        $('#modal--confirm__payment #confirmQuantity').text(confirmQuantity);
        $('#modal--confirm__payment #confirmDiscount').text(`${100 - confirmDiscount}%`);
        $('#modal--confirm__payment #confirmTotal').text(`${formatNumber( calculatePrice() )} đ`);
        $('#modal--confirm__payment #totalBill').text(`${formatNumber( calculatePrice() )} đ`);
    }

    function prepareMobileConfirm () {
        let confirmCard = $('input[name="card-type"]:checked').data('img');
        let confirmPrice = $('input[name="card-value"]:checked').val();
        let confirmQuantity = $('input[name="card-amount"]').val();
        let confirmDiscount = $('input[name="card-value"]:checked').data('discount');

        console.log(confirmCard, confirmPrice, confirmQuantity, confirmDiscount);

        $('#confirmMobileCard').attr('src',confirmCard);
        $('#confirmMobilePrice').text(`${formatNumber( confirmPrice )} đ`);
        $('#confirmMobileQuantity').text(confirmQuantity);
        $('#confirmMobileDiscount').text(`${100 - confirmDiscount}%`);
        $('#confirmMobileTotal').text(`${formatNumber( calculatePrice() )} đ`);
        $('#totalMobileBill').text(`${formatNumber( calculatePrice() )} đ`);
    }

    //Append new data to submit to backend
    function prepareDataSend() {
        let amount = $('input[name="card-value"]:checked').val();
        let telecom = $('input[name="card-type"]:checked').val();
        let quantity = $('input[name="card-amount"]').val();

        dataSend.amount = amount;
        dataSend.telecom = telecom.toUpperCase();
        dataSend.quantity = quantity;

    }
});
