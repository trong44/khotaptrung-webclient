let data_send = {
    amount: 0,
    telecom: '',
    quantity:0,
    _token: $('meta[name="csrf-token"]').attr('content'),
};
let temp = {};
let data_telecom =  {};
$(document).ready(function () {
    $.ajax({
        url: '/ajax/store-card/get-telecom',
        type: 'GET',
        success: function (res) {
            if (res.status) {
                let data = res.data;
                if (data.length) {
                    let list_card_game = $('#list-card-game');
                    let list_card_phone = $('#list_card_phone');
                    data.forEach(function (card) {
                        let html = '';
                        html += `<li class="cards__item tag-card-item tag-card-item-mobile p_0">`;
                        html += `    <input type="radio" id="card-${card.key}" name="card-type" data-key="${card.key}" hidden>`;
                        html += `    <label for="card-${card.key}">`;
                        html += `      <img src="${card.image}" class="card--logo" alt="card-${card.key}">`;
                        html += `    </label>`;
                        html += `</li>`;
                        if (card.params.teltecom_type == "2") {
                            list_card_game.append(html);
                        }
                        if (card.params.teltecom_type == "1") {
                            list_card_phone.append(html)
                        }
                    });
                    list_card_game.find('input[name=card-type]').first().trigger('click')
                    list_card_game.find('.loader').remove();
                }
            }
        }
    });

    $(document).on('change', 'input[name=card-type]', function () {
        let list_card_deno = $('#list_card_deno');
        list_card_deno.find('li,span').remove();
        list_card_deno.find('.loader').show();
        let path_logo = $(this).next().find('img').attr('src');
        data_telecom.image = path_logo;
        data_telecom.key = $(this).data('key');
        let modal_confirm = $('#modal--confirm__payment');
        modal_confirm.find('.card--logo img').attr('src',path_logo);
        $.ajax({
            url: '/ajax/store-card/get-amount',
            type: 'GET',
            data: {
                telecom: $(this).data('key')
            },
            success: function (res) {
                if (res.status) {
                    let data = res.data;
                    if (data.length) {
                        data.forEach(function (deno) {
                            let html = '';
                            html += `<li class="deno__item col-4 col-lg-4">`;
                            html += `    <input type="radio" id="card-${deno.amount}" data-discount="${100 - deno.ratio_default}" data-amount="${deno.amount}" name="card-value" hidden>`;
                            html += `     <label for="card-${deno.amount}" class="deno__value card-item-value">`;
                            html += `         <span>${number_format(deno.amount)} đ</span>`;
                            html += `     </label>`;
                            html += `</li>`;
                            list_card_deno.append(html);
                        })
                        list_card_deno.find('input[name=card-value]').first().trigger('click');
                        list_card_deno.find('.loader').hide()
                    } else {
                        list_card_deno.find('span,li').remove()
                        list_card_deno.append('<span>Chưa cấu hình mệnh giá</span>');
                        list_card_deno.find('.loader').hide();
                    }
                } else {
                    list_card_deno.append('<span>Có lỗi xảy ra</span>')
                }

            }
        });
    });

    $(document).on('click','.js-send-data',function () {
        $.ajax({
            url:'/mua-the',
            type:'POST',
            data: data_send,
            success:function (res) {
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
                            html_card += `                    <img src="/assets/frontend/theme_4/image/icons/coppy.png" alt="icon__copy">`;
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
                            html_card += `                      <img src="/assets/frontend/theme_4/image/icons/coppy.png" alt="icon__copy">`;
                            html_card += `                   </div>`;
                            html_card += `               </div>`;
                            html_card += `         </div>`;
                            html_card += `    </div>`;
                            html_card += `</div>`;
                            $('#modal--success__payment .swiper-wrapper').append(html_card);
                        })
                        $('#modal--success__payment').modal('show');
                    }
                }
                else{
                    $('#message--error--buy').text(res.message);
                    $('#modal--fail__payment').modal('show')
                }
            }
        })
    })
});

$(document).on('click', 'input[name=card-value]', function () {
    updatePrice();
});

$(document).on('click','#btn-confirm',function (e) {
    if ($('input[name=card-value]:checked').length){
        $('#modal--confirm__payment').modal('show');
    }
});

$(document).on('keypress', 'input[name=card-quantity]', function () {
    updatePrice();
});

function updatePrice() {
    let deno = $('input[name=card-value]:checked');

    if (deno.length) {
        let discount = deno.data('discount');
        let amount = deno.data('amount');
        temp.deno = amount;
        let quantity = $('input[name=card-quantity]').val().trim();
        temp.quantity = quantity;
        data_send.amount = amount;
        data_send.telecom = $('input[name=card-type]:checked').data('key');
        data_send.quantity = quantity;

        $('#quantity_modal').text(pad(quantity));
        $('#deno_modal').text(`${number_format(amount)} đ`);
        $('.discount .discount--value').text(`${discount}%`);
        $('#discount_modal').text(`${discount}%`);
        $('.price--total .price--total__value,#total_modal').text(`${number_format((amount - (amount * discount / 100)) * quantity)} đ`);
    }else {

    }
}
