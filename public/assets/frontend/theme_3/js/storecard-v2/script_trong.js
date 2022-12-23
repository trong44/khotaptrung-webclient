
// see more desc service
$('.js-toggle-content').click(function () {
    handleToggleContent();
});

// ondblclick on mobile
if ($(window).width() < 1200) {
    var touchtime = 0;
    $(".card--desc__content").on("click", function() {
        if (touchtime == 0) {
            // set first click
            touchtime = new Date().getTime();
        } else {
            // compare first click to this click and see if they occurred within double click threshold
            if (((new Date().getTime()) - touchtime) < 800) {
                // double click occurred
                handleToggleContent();
                touchtime = 0;
            } else {
                // not a double click so set as a new first click
                touchtime = new Date().getTime();
            }
        }
    });
}

function handleToggleContent(){
    $('.js-toggle-content .view-less').toggle();
    $('.js-toggle-content .view-more').toggle();
    let card_desc = $('.card--desc__content');
    card_desc.toggleClass('content-video-in-add');
    if ($('.view-less').is(":visible")) {
        let initialHeight = card_desc.css('max-height', 'initial').height();
        card_desc.animate({maxHeight: initialHeight + 16},250)
    } else {
        card_desc.animate({maxHeight: 280},250)
    }
}

// Coppy text vào bộ nhớ
$(document).on('click','.js-copy-text', function () {
    let text_value = $(this).parent().find('.card__info').text().trim();
    navigator.clipboard.writeText(text_value);
});

tippy('.js-copy-text', {
    // default
    trigger: 'click',
    content: "Đã coppy !",
    placement: 'right',
});


// option swiper card
var swiper_card = new Swiper(".slider--card", {
    slidesPerView: 1,
    spaceBetween: 16,
    freeMode: true,
    observer: true,
    observeParents: true,
    loop:false,
});

// option swiper article banner
var swiper_article= new Swiper(".article--slider", {
    autoplay: {
        // disableOnInteraction: false,
        delay:3000
    },
    speed:500,
    pagination: {
        el: ".swiper-pagination.--custom",
        clickable: true
    },
    loop:true,
});

// option swiper article article
var swiper_article_banner = new Swiper(".article--slider__news", {
    spaceBetween: 16,
    slidesPerView:4,
    allowTouchMove: false,
    breakpoints: {
        1190: {
            slidesPerView: 2.25,
            allowTouchMove: true,
        }
    },
});

let swiper_buy_card = new Swiper(".js--swiper__banner", {
    autoplay: {
        disableOnInteraction: true,
        delay: 3000
    },
    pagination: {
        el: ".swiper-pagination.--custom",
        clickable: true
    },
    speed: 500,
    loop: true,
});

let service_swiper = new Swiper(".js-swipe-service", {
    autoplay: {
        delay: 3000
    },
    freeMode: true,
    spaceBetween: 16,
    slidesPerView: 3.75,
    breakpoints: {
        1190: {
            slidesPerView: 1.45,
        }
    },
    speed: 500,
    observer: true,
    observeParents: true,
});

let card_other_swiper = new Swiper(".card--other__swipe", {
    autoplay: {
        delay: 3000
    },
    navigation: {
        nextEl: ".card-other-next",
        prevEl: ".card-other-prev",
    },
    breakpoints: {
        1190: {
            slidesPerView: 1.5,
        }
    },
    spaceBetween: 16,
    freeMode: true,
    slidesPerView: 4,
    speed: 500,
    observer: true,
    observeParents: true,
});

let swipe_card = new Swiper(".js--card__swipe", {
    autoplay: {
        delay: 3000
    },
    breakpoints: {
        1190: {
            freeMode: true,
        }
    },
    freeMode: true,
    spaceBetween: 16,
    slidesPerView: 1.5,
    speed: 500,
    observer: true,
    observeParents: true,
});

$(document).ready(function () {
    let data_send = {
        amount: 0,
        telecom: '',
        quantity:0,
        _token: $('meta[name="csrf-token"]').attr('content'),
    };
    if ($(window).width() > 1199){
        // handle modal show
        $(document).on('click', '.btn-buy-card', function () {
            let elm = $(this).parent();
            let amount = elm.find('.card--deno').data('amount');
            let quantity = elm.find('input.input--amount').val();
            let ratio_default = elm.find('.card--deno').data('ratio_default') * 1;
            let discount = 100 - ratio_default;
            let total_price = (amount - (amount * discount / 100)) * quantity;

            // set data send
            data_send.amount = amount;
            data_send.telecom = elm.find('.card--deno').data('key');
            data_send.quantity = quantity;

            $('#detail--deno__card').text(number_format(amount) + 'đ');
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
                        $('#modal--success__payment .card--attr__deno').text(number_format(data_send.amount) + 'đ');
                        $('#modal--success__payment .card--attr__quantity').text(pad(data_send.quantity));
                        if (data_send.quantity > 1){
                            swiper_card.params.slidesPerView = 1.25;
                        } else {
                            swiper_card.params.slidesPerView = 1;
                        }
                        if (data_send.quantity > 0){
                            $('#modal--success__payment .swiper-wrapper').empty();
                            data.data_card.forEach(function (card) {
                                let html_card = '';
                                html_card += `<div class="swiper-slide card__detail">`;
                                html_card += `  <div class="card--header__detail">`;
                                html_card += `      <div class="card--info__wrap">`;
                                html_card += `          <div class="card--logo">`;
                                html_card += `            <img src="${$('img#detail--logo__card').attr('src')}" alt="telecom_logo">`;
                                html_card += `          </div>`;
                                html_card += `          <div class="card--info">`;
                                html_card += `              <div class="card--info__name">`;
                                html_card += `                  ${$('img#detail--logo__card').data('key')}`;
                                html_card += `              </div>`;
                                html_card += `               <div class="card--info__value">`;
                                html_card += `                    ${number_format(data_send.amount)} đ`;
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

        $('body').on('click','.js_step', function (e) {
            // chặn tất cả những sự kiện ( modal ... )
            e.stopPropagation();
            e.preventDefault();
            if (e.target.tagName === 'BUTTON'){
                // set info card
                let elm = $(this).parent();
                let amount = elm.find('.card--deno').data('amount');
                let quantity = elm.find('input.input--amount').val();
                let ratio_default = elm.find('.card--deno').data('ratio_default') * 1;
                let discount = 100 - ratio_default;
                let total_price = (amount - (amount * discount / 100)) * quantity;

                // set data send
                data_send.amount = amount;
                data_send.telecom = elm.find('.card--deno').data('key');
                data_send.quantity = quantity;

                $('#detail--deno__mobile').text(number_format(amount) + 'đ');
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
                            html_card += `               <img src="${$('img#detail--logo__card').attr('src')}" alt="telecom_logo">`;
                            html_card += `            </div>`;
                            html_card += `            <div class="card--info">`;
                            html_card += `               <div class="card--info__name">`;
                            html_card += `                   ${$('img#detail--logo__card').data('key')}`;
                            html_card += `               </div>`;
                            html_card += `               <div class="card--info__value">`;
                            html_card += `                   ${number_format(data_send.amount)} đ`;
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
