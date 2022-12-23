

let url_edited = window.location.href.toLowerCase();
window.history.pushState({}, null, url_edited);
$(document).ready(function () {
    let route_is = $('#isRequest').val();
    let card_is = $('#isTelecom').val();
    let value_is = $('#isValue').val();
    let auth_check = !!$('#auth').val();
    let breadcrum = $('.breadcrum--list');
    let width = $(document).width();
    let data_telecom = {};
    let temp = {};
    if (route_is === 'getStoreCard' || route_is === 'showDetailCard' || route_is === 'showListCard') {
        $.ajax({
            url: '/ajax/store-card/get-telecom',
            type: 'GET',
            success: function (res) {
                if (res.status) {
                    let grid_game_card = $('#grid--game__card');
                    let grid_phone_card = $('#grid--phone__card');
                    let card_nav_game = $('#card--game__nav');
                    let card_nav_phone = $('#card--phone__nav');
                    let card_other = $('#card--other__wrapper');
                    let data = res.data;
                    data.forEach(function (card) {
                        if (card.key.toLowerCase() === card_is) {
                            data_telecom = card
                        }
                        if (!!card.params && card.params.teltecom_type == 2) {
                            card.title = 'Thẻ ' + card.title;
                        }
                        let html = '';
                        html += `<div class="col-4 col-lg-3 px-1 px-lg-2 mb-lg-2">`;
                        html += `<a href="/mua-the-${card.key.toLowerCase()}" class="scratch-card">`;
                        html += `<div class="card--thumb">`;
                        html += `<img src="${card.image}" class="card--thumb__image py-1 py-lg-0" alt="${card.title}">`;
                        html += `</div>`;
                        html += `<div class="card--name" style="--bg-color: ${card.params ? card.params.color : '' };text-transform: capitalize;">`;
                        html += `${card.title.toLowerCase()}`;
                        html += `</div>`;
                        html += `</a>`;
                        // _______________
                        let html_nav = '';
                        let nav_active = '';
                        if (card.key.toLowerCase() === card_is) {
                            nav_active = 'active'
                        }
                        html_nav += `<li class="card-item ${nav_active}">`;
                        html_nav += `<a href="/mua-the-${card.key.toLowerCase()}" class="card-item_link">`;
                        html_nav += `<div class="card-item_thumb mr-2">`;
                        html_nav += `<img src="${card.image}" alt="Icon ${card.title}">`;
                        html_nav += `</div>`;
                        html_nav += `<span class="card-item_name" style="text-transform: capitalize;">`;
                        html_nav += `${card.title.toLowerCase()}`;
                        html_nav += `</span>`;
                        html_nav += `</li>`;
                        // ________________

                        if (route_is === 'getStoreCard') {

                            if (!!card.params && card.params.teltecom_type == 2) {
                                grid_game_card.append(html);
                            } else  {
                                grid_phone_card.append(html);
                            }
                        }
                        $('.loader').remove();
                        if (!!card.params && card.params.teltecom_type == 2) {
                            card_nav_game.append(html_nav)
                        }else {
                            card_nav_phone.append(html_nav)
                        }
                    });
                    if (route_is === 'showListCard') {
                        // Các loại thẻ khác
                        data.forEach(function (card) {
                            if (!!card.params && !!data_telecom.params){
                                if ( card.params.teltecom_type == data_telecom.params.teltecom_type && card.key != data_telecom.key) {

                                    let html_other = '';
                                    html_other += `<div class="swiper-slide">`;
                                    html_other += `    <a href="/mua-the-${card.key.toLowerCase()}" class="scratch-card">`;
                                    html_other += `        <div class="card--thumb">`;
                                    html_other += `            <img src="${card.image}" class="card--thumb__image" alt="">`;
                                    html_other += `        </div>`;
                                    html_other += `        <div class="card--name" style="--bg-color: ${!!card.params ? card.params.color : 'var(--primary-color)'};text-transform: capitalize">`;
                                    html_other += `             ${card.title.toLowerCase()}`;
                                    html_other += `        </div>`;
                                    html_other += `    </a>`;
                                    html_other += `</div>`;
                                    // _____________
                                    card_other.append(html_other);
                                }
                            }

                        })
                        $('.swiper').css('overflow', 'hidden');
                    }
                    if (route_is === 'showListCard' || route_is === 'showDetailCard'){
                        getListAmount();
                    }
                }
            }
        })
    }
    function getListAmount(){
        if (route_is === 'showListCard' || route_is === 'showDetailCard') {
            $.ajax({
                url: '/ajax/store-card/get-amount',
                type: 'GET',
                data: {
                    telecom: card_is
                },
                success: function (res) {
                    if (res.status) {
                        let data = res.data;
                        if (route_is === 'showListCard') {
                            // breadcrum
                            let new_bc = '';
                            new_bc += `<li class="breadcrum--item">`;
                            new_bc += `<a href="/mua-the-${card_is}" class="breadcrum--link" style="text-transform: capitalize;">Thẻ ${card_is.toLowerCase()}</a>`;
                            new_bc += `</li>`;
                            $('.breadcrum--list').append(new_bc)

                            let grid_card = $('#card--desktop__value');
                            if (data.length){
                                $('#card--value .card--title').text(card_is.toLowerCase())
                                data.forEach(function (card) {
                                    if (width > 1199){
                                        // Desktop
                                        let html_desktop_value = '';
                                        html_desktop_value += `<div class="col-4 col-lg-3 px-lg-2 mb-lg-4">`;
                                        html_desktop_value += `    <a href="/mua-the-${card_is}-${kFormatter(card.amount)}" class="scratch-card">`;
                                        html_desktop_value += `        <div class="card--thumb">`;
                                        html_desktop_value += `            <img src="${data_telecom.image}" class="card--thumb__image" alt="">`;
                                        html_desktop_value += `        </div>`;
                                        html_desktop_value += `        <div class="card--name" style="--bg-color: ${!!data_telecom.params ? data_telecom.params.color : 'var(--primary-color)'};">`;
                                        html_desktop_value += `             ${number_format(card.amount)} VND`;
                                        html_desktop_value += `        </div>`;
                                        html_desktop_value += `    </a>`;
                                        html_desktop_value += `    <input type="hidden" class="ratio_default" value="${card.ratio_default}">`;
                                        html_desktop_value += `    <div class="card--deno my-lg-1" data-amount="${card.amount}">`;
                                        html_desktop_value += `       Mệnh giá ${number_format(card.amount)} đ`;
                                        html_desktop_value += `    </div>`;
                                        html_desktop_value += `    <div class="card--unit__price">`;
                                        html_desktop_value += `         Đơn giá: ${number_format(card.amount - (card.amount * (100 - card.ratio_default) / 100))} đ`;
                                        html_desktop_value += `    </div>`;
                                        html_desktop_value += `    <div class="card--amount _mt-075">`;
                                        html_desktop_value += `        <span class="card--amount__title">`;
                                        html_desktop_value += `           Số lượng`;
                                        html_desktop_value += `        </span>`;
                                        html_desktop_value += `        <div class="card--amount__group">`;
                                        html_desktop_value += `            <button class="btn--amount -minus js-amount" data-action="minus">`;
                                        html_desktop_value += `                <img src="/assets/frontend/theme_3/image/icons/minus.png" alt="">`;
                                        html_desktop_value += `            </button>`;
                                        html_desktop_value += `            <input type="text" name="card-amount" class="input--amount" value="1" numberic="">`;
                                        html_desktop_value += `            <button class="btn--amount -add js-amount" data-action="add">`;
                                        html_desktop_value += `                <img src="/assets/frontend/theme_3/image/icons/add.png" alt="">`;
                                        html_desktop_value += `            </button>`;
                                        html_desktop_value += `        </div>`;
                                        html_desktop_value += `    </div>`;
                                        if (auth_check){
                                            html_desktop_value += `<button type="button" class="btn -secondary w-100 _mt-075 btn-buy-card"  data-toggle="modal" data-target="#modal--confirm__payment">Chọn mua</button>`;
                                        }else {
                                            html_desktop_value += `<button type="button" class="btn -secondary w-100 _mt-075 btn-buy-card" onclick="openLoginModal();">Chọn mua</button>`;
                                        }
                                        html_desktop_value += `</div>`;

                                        grid_card.append(html_desktop_value);
                                    }else {
                                        //mobile
                                        let html_mobile_value = '';
                                        html_mobile_value += `<div class="swiper-slide">`;
                                        html_mobile_value += `        <a href="/mua-the-${card_is}-${kFormatter(card.amount)}" class="scratch-card">`;
                                        html_mobile_value += `            <div class="card--thumb">`;
                                        html_mobile_value += `                <img src="${data_telecom.image}" class="card--thumb__image" alt="">`;
                                        html_mobile_value += `            </div>`;
                                        html_mobile_value += `            <div class="card--name" style="--bg-color: ${!!data_telecom.params ? data_telecom.params.color : 'var(--primary-color)'};">`;
                                        html_mobile_value += `                ${number_format(card.amount)} VND`;
                                        html_mobile_value += `            </div>`;
                                        html_mobile_value += `        </a>`;
                                        html_mobile_value += `        </a>`;
                                        html_mobile_value += `    <input type="hidden" class="ratio_default" value="${card.ratio_default}">`;
                                        html_mobile_value += `        <div class="card--deno my-lg-1" data-amount="${card.amount}">`;
                                        html_mobile_value += `              Mệnh giá ${number_format(card.amount)} đ`;
                                        html_mobile_value += `        </div>`;
                                        html_mobile_value += `        <div class="card--unit__price">`;
                                        html_mobile_value += `              Đơn giá: ${number_format(card.amount - (card.amount * (100 - card.ratio_default) / 100))} đ`;
                                        html_mobile_value += `        </div>`;
                                        html_mobile_value += `        <div class="card--amount _mt-075">`;
                                        html_mobile_value += `            <span class="card--amount__title">`;
                                        html_mobile_value += `                Số lượng`;
                                        html_mobile_value += `            </span>`;
                                        html_mobile_value += `            <div class="card--amount__group">`;
                                        html_mobile_value += `                 <button class="btn--amount -minus js-amount" data-action="minus">`;
                                        html_mobile_value += `                     <img src="/assets/frontend/theme_3/image/icons/minus.png" alt="">`;
                                        html_mobile_value += `                 </button>`;
                                        html_mobile_value += `                 <input type="text" name="card-amount" class="input--amount" value="1" numberic="">`;
                                        html_mobile_value += `                   <button class="btn--amount -add js-amount" data-action="add">`;
                                        html_mobile_value += `                       <img src="/assets/frontend/theme_3/image/icons/add.png" alt="">`;
                                        html_mobile_value += `                  </button>`;
                                        html_mobile_value += `            </div>`;
                                        html_mobile_value += `        </div>`;
                                        if (auth_check){
                                            html_mobile_value += `      <button type="button" class="btn -secondary w-100 _mt-075 js_step" data-go_to="step2">Chọn mua</button>`;
                                        }else {
                                            html_mobile_value += `      <button type="button" class="btn -secondary w-100 _mt-075" onclick="openLoginModal();">Chọn mua</button>`;
                                        }
                                        html_mobile_value += `      </div>`;

                                        $('#card--value__mobile').append(html_mobile_value);
                                    }
                                });
                            }else {
                                let html_empty = '<span class="m-auto text-danger --bold">Chưa cấu hình mệnh giá thẻ!</span>'
                                $('#card--value__mobile').html(html_empty);
                                grid_card.html(html_empty);
                            }

                            $('.loader').remove();
                        }
                        if (route_is === 'showDetailCard') {
                            //    Breadcrum
                            let cat_bc = '';
                            cat_bc += `<li class="breadcrum--item">`;
                            cat_bc += `<a href="/mua-the-${card_is}" class="breadcrum--link" style="text-transform: capitalize;">Thẻ ${card_is}</a>`;
                            cat_bc += `</li>`;

                            let value_bc = '';
                            value_bc += `<li class="breadcrum--item">`;
                            value_bc += `<a href="/mua-the-${card_is}-${value_is}" class="breadcrum--link" style="text-transform: capitalize;">Thẻ ${value_is}</a>`;
                            value_bc += `</li>`;
                            breadcrum.append(cat_bc);
                            breadcrum.append(value_bc);
                            // Card Title
                            $('#card--value .card--title').css('text-transform', 'capitalize').text('Thẻ ' + card_is.toLowerCase() + ` ${value_is}`);


                            let card_same = $('#card--same__wrapper');
                            data.forEach(function (card) {
                                if (kFormatter(card.amount) === value_is) {
                                    let html_current = '';
                                    html_current += `<div class="col-12 col-lg-3 px-lg-2 mb-lg-4">`;
                                    html_current += `<div class="col-8 col-lg-12 p-0">`;
                                    html_current += `    <div class="scratch-card card--single">`;
                                    html_current += `        <div class="card--thumb">`;
                                    html_current += `            <img src="${data_telecom.image}" class="card--thumb__image" alt="">`;
                                    html_current += `        </div>`;
                                    html_current += `        <div class="card--name" style="--bg-color: ${!!data_telecom.params ? data_telecom.params.color : 'var(--primary-color)'};">`;
                                    html_current += `             ${number_format(card.amount)} VND`;
                                    html_current += `        </div>`;
                                    html_current += `    </div>`;
                                    html_current += `</div>`;
                                    html_current += `    <input type="hidden" class="ratio_default" value="${card.ratio_default}">`;
                                    html_current += `    <div class="card--deno my-lg-1" data-amount="${card.amount}">`;
                                    html_current += `       Mệnh giá ${number_format(card.amount)} đ`;
                                    html_current += `    </div>`;
                                    html_current += `    <div class="card--unit__price">`;
                                    html_current += `         Đơn giá: ${number_format(card.amount - (card.amount * (100 - card.ratio_default) / 100))} đ`;
                                    html_current += `    </div>`;
                                    html_current += `    <div class="card--amount _mt-075">`;
                                    html_current += `        <span class="card--amount__title">`;
                                    html_current += `           Số lượng`;
                                    html_current += `        </span>`;
                                    html_current += `        <div class="card--amount__group">`;
                                    html_current += `            <button class="btn--amount -minus js-amount" data-action="minus">`;
                                    // html_current += `                <img src="/assets/frontend/theme_3/image/icons/minus.png" alt="">`;
                                    html_current += `            </button>`;
                                    html_current += `            <input type="text" name="card-amount" class="input--amount" value="1" numberic="">`;
                                    html_current += `            <button class="btn--amount -add js-amount" data-action="add">`;
                                    html_current += `<!--                <img src="/assets/frontend/theme_3/image/icons/add.png" alt="">-->`;
                                    html_current += `            </button>`;
                                    html_current += `        </div>`;
                                    html_current += `    </div>`;
                                    if (width > 1199) {
                                        if (auth_check){
                                            html_current += `<button type="button" class="btn -secondary w-100 _mt-075 btn-buy-card"  data-toggle="modal" data-target="#modal--confirm__payment">Chọn mua</button>`;
                                        }else {
                                            html_current += `<button type="button" class="btn -secondary w-100 _mt-075 btn-buy-card" onclick="openLoginModal();">Chọn mua</button>`;
                                        }
                                    }else{
                                        if (auth_check){
                                            html_current += `      <button type="button" class="btn -secondary w-100 _mt-075 js_step" data-go_to="step2">Chọn mua</button>`;
                                        }else {
                                            html_current += `      <button type="button" class="btn -secondary w-100 _mt-075" onclick="openLoginModal();">Chọn mua</button>`;
                                        }
                                    }
                                    html_current += `</div>`;

                                    $('#card--wrap__single').append(html_current);
                                } else {
                                    let html_same = '';
                                    html_same += `<div class="swiper-slide">`;
                                    html_same += `    <a href="/mua-the-${card_is}-${kFormatter(card.amount)}" class="scratch-card">`;
                                    html_same += `        <div class="card--thumb">`;
                                    html_same += `            <img src="${data_telecom.image}" class="card--thumb__image" alt="">`;
                                    html_same += `        </div>`;
                                    html_same += `        <div class="card--name" style="--bg-color: ${!!data_telecom.params ? data_telecom.params.color : 'var(--primary-color)'};text-transform: capitalize">`;
                                    html_same += `             ${number_format(card.amount)} VND`;
                                    html_same += `        </div>`;
                                    html_same += `    </a>`;
                                    html_same += `</div>`;
                                    // _____________
                                    card_same.append(html_same);
                                }
                            })
                        }
                    }
                }
            })
        }
    }
    let data_send = {
        amount: 0,
        telecom: '',
        quantity:0,
        _token: $('meta[name="csrf-token"]').attr('content'),
    };
    if (width > 1199){
        // handle modal show
        $(document).on('click', '.btn-buy-card', function () {
            let elm = $(this).parent();
            let deno = elm.find('.card--deno').data('amount');
            temp.deno = deno;
            let quantity = elm.find('input.input--amount').val();
            temp.quantity = quantity;
            let ratio_default = parseFloat(elm.find('input.ratio_default').val());
            let discount = 100 - ratio_default;
            let total_price = (deno - (deno * discount / 100)) * quantity;

            // set data send
            data_send.amount = deno;
            data_send.telecom = card_is.toUpperCase();
            data_send.quantity = quantity;

            $('#detail--logo__card').attr('src', data_telecom.image);
            $('#detail--deno__card').text(number_format(deno) + 'đ');
            $('#detail--quantity__card').text(pad(quantity));
            $('#detail--discount__card').text(discount + '%');
            $('#detail--total__card').text(number_format(total_price) + ' đ');
        });
        //submit data
        $('.js-send-data').on('click',function () {
            // call ajax here
            $.ajax({
                url:'/ajax/mua-the',
                type:'POST',
                data: data_send,
                success:function (res) {
                    // handle data callback
                    $('#modal--confirm__payment').modal('hide');
                    if(res.status){
                        let data = res.data;
                        $('#modal--success__payment .card__message').text(res.message);
                        $('#modal--success__payment .telecom__logo').attr('src',data_telecom.image);
                        $('#modal--success__payment .card--attr__deno').text(number_format(temp.deno) + 'đ');
                        $('#modal--success__payment .card--attr__quantity').text(pad(temp.quantity));
                        if (temp.quantity > 1){
                            swiper_card.params.slidesPerView = 1.25;
                        }else {
                            swiper_card.params.slidesPerView = 1;
                        }
                        if (temp.quantity > 0){
                            $('#modal--success__payment .swiper-wrapper').empty()
                            data.data_card.forEach(function (card) {
                                let html_card = '';
                                html_card += `<div class="swiper-slide card__detail">`;
                                html_card += `  <div class="card--header__detail">`;
                                html_card += `      <div class="card--info__wrap">`;
                                html_card += `          <div class="card--logo">`;
                                html_card += `            <img src="${data_telecom.image}" alt="telecom_logo">`;
                                html_card += `          </div>`;
                                html_card += `          <div class="card--info">`;
                                html_card += `              <div class="card--info__name">`;
                                html_card += `                  ${data_telecom.key}`;
                                html_card += `              </div>`;
                                html_card += `               <div class="card--info__value">`;
                                html_card += `                    ${number_format(temp.deno)} đ`;
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
                                $('#modal--success__payment .swiper-wrapper').append(html_card)
                            })
                            $('#modal--success__payment').modal('show')
                            tippy('.js-copy-text', {
                                // default
                                trigger: 'click',
                                content: "Đã coppy !",
                                placement: 'right',
                            });
                        }
                    }
                    else {
                        $('#message--error--buy').text(res.message);
                        $('#modal--fail__payment').modal('show')
                    }

                }
            })
        })
    } else {
        // Next step
        let step_1 = $('#buy-card');
        let step_2 = $('.mobile--confirm__payment');
        let step_3 = $('.mobile--success__payment');
        let step_3_1 = $('.mobile--fail__payment');

        $(document).on('click','.js_step', function (e) {
            // chặn tất cả những sự kiện ( modal ... )
            e.stopPropagation();
            e.preventDefault();

            if (e.target.tagName === 'BUTTON'){
                // set info card
                let elm = $(this).parent();
                let deno = elm.find('.card--deno').data('amount');
                temp.deno = deno;
                let quantity = elm.find('input.input--amount').val();
                temp.quantity = quantity;
                let ratio_default = parseFloat(elm.find('input.ratio_default').val());
                let discount = 100 - ratio_default;
                let total_price = (deno - (deno * discount / 100)) * quantity;

                // set data send
                data_send.amount = deno;
                data_send.telecom = card_is.toUpperCase();
                data_send.quantity = quantity;

                $('#detail--logo__mobile').attr('src', data_telecom.image);
                $('#detail--deno__mobile').text(number_format(deno) + 'đ');
                $('#detail--quantity__mobile').text(pad(quantity));
                $('#detail--discount__mobile').text(discount + '%');
                $('#detail--total__mobile').text(number_format(total_price) + ' đ');
            }

            handleToggleStep($(this).data('go_to'));
        });
        function handleToggleStep(step) {
            step_1.fadeOut();
            step_2.fadeOut();
            step_3.fadeOut();
            step_3_1.fadeOut();
            switch (step) {
                case 'step1':
                    step_1.fadeIn();
                    break;
                case 'step2':
                    step_2.fadeIn();
                    break;
                case 'step3':
                    step_3.fadeIn();
                    break;
                case 'step3_1':
                    step_3_1.fadeIn();
                    break;
            }
        }
        //        submit data
        $('.js-send-data').on('click',function () {
            // call ajax here
            $.ajax({
                url:'/ajax/mua-the',
                type:'POST',
                data: data_send,
                success:function (res) {
                    // handle data callback
                    if (res.status){
                        let data = res.data;
                        $('.mobile--success__payment .card__message').text(res.message);
                        handleToggleStep('step3');
                        data.data_card.forEach(function (card) {
                            let html_card = '';
                            html_card += `<div class="card__detail">`;
                            html_card += `   <div class="card--header__detail">`;
                            html_card += `       <div class="card--info__wrap">`;
                            html_card += `           <div class="card--logo">`;
                            html_card += `               <img src="${data_telecom.image}" alt="telecom_logo">`;
                            html_card += `            </div>`;
                            html_card += `            <div class="card--info">`;
                            html_card += `               <div class="card--info__name">`;
                            html_card += `                   ${data_telecom.key}`;
                            html_card += `               </div>`;
                            html_card += `               <div class="card--info__value">`;
                            html_card += `                   ${number_format(temp.deno)} đ`;
                            html_card += `               </div>`;
                            html_card += `             </div>`;
                            html_card += `        </div>`;
                            html_card += `    </div>`;
                            html_card += `    <div class="card--gray">`;
                            html_card += `       <div class="card--attr">`;
                            html_card += `            <div class="card--attr__name">`;
                            html_card += `               Mã thẻ`;
                            html_card += `             </div>`;
                            html_card += `             <div class="card--attr__value -bold">`;
                            html_card += `                <div class="card__info">`;
                            html_card += `                  ${card.pin}`;
                            html_card += `                </div>`;
                            html_card += `                <div class="icon--coppy js-copy-text">`;
                            html_card += `                   <img src="/assets/frontend/theme_3/image/icons/coppy.png" alt="">`;
                            html_card += `                 </div>`;
                            html_card += `              </div>`;
                            html_card += `        </div>`;
                            html_card += `       <div class="card--attr">`;
                            html_card += `            <div class="card--attr__name">`;
                            html_card += `               Số Series`;
                            html_card += `            </div>`;
                            html_card += `            <div class="card--attr__value -bold">`;
                            html_card += `               <div class="card__info">`;
                            html_card += `                  ${card.serial}`;
                            html_card += `                </div>`;
                            html_card += `                <div class="icon--coppy js-copy-text">`;
                            html_card += `                   <img src="/assets/frontend/theme_3/image/icons/coppy.png" alt="">`;
                            html_card += `                 </div>`;
                            html_card += `              </div>`;
                            html_card += `        </div>`;
                            html_card += `     </div>`;
                            html_card += `</div>`;

                            $('.mobile--success__payment .card--list').append(html_card);
                        });
                        tippy('.js-copy-text', {
                            // default
                            trigger: 'click',
                            content: "Đã coppy !",
                            placement: 'right',
                        });
                    }else {
                        $('.mobile--fail__payment .card__message').text(res.message);
                        handleToggleStep('step3_1');
                    }
                }
            })
        })
    }
})
