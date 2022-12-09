// swiper
let swiper_item_possession = new Swiper('.swiper-withdraw',{
    slidesPerView: 6.5,
    spaceBetween: 32,
    freeMode: true,
    observer: true,
    observeParents: true,
    breakpoints: {
        992: {
            slidesPerView: 2.05,
            spaceBetween: 16,
        }
    },
});

//toggle-password
$('#modal-tab-history [name="started_at"],#modal-tab-history [name="ended_at"]').datetimepicker({
    format: 'DD-MM-YYYY LT',
    useCurrent: false,
    icons:
        { time: 'fas fa-clock',
            date: 'fas fa-calendar',
            up: 'fas fa-arrow-up',
            down: 'fas fa-arrow-down',
            previous: 'fas fa-arrow-circle-left',
            next: 'fas fa-arrow-circle-right',
            today: 'far fa-calendar-check-o',
            language: 'vi',
            clear: 'fas fa-trash',
            close: 'far fa-times' },
    maxDate: moment()

});

$(document).on('click','.toggle-password .eye',function (e) {
    let input = $(this).prev();
    if ($(this).hasClass('show')){
        input.attr('type','text');
    } else {
        input.attr('type','password');
    }
    $(this).toggleClass('show')
});

function getWithDrawItem(game_type,data_query) {
    $('#modal-tab-withdraw .card-body').toggleClass('is-loading',true)
    $.ajax({
        url: '/withdrawitemajax-' + game_type,
        type: 'GET',
        data:data_query,
        success: function (res) {
            if (res.status === 1) {
                //Lịch sử
                $('#table-history-withdraw').html(res.history);
                //Chọn loại vật phẩm
                let result_data = res.result;
                if (result_data.listgametype.length) {
                    let select_game_type = $('#wrap-game-type');
                    select_game_type.empty();
                    result_data.listgametype.forEach(function (item) {
                        let html = `<div class="swiper-slide">
                                        <input type="radio" id="game_type_${item.parent_id}" value="${item.parent_id}" name="game_type" hidden ${item.parent_id === game_type * 1 ? 'checked' : ''}>
                                        <label for="game_type_${item.parent_id}" class="label-item">
                                            <div class="item-thumb">
                                                <img src="/assets/frontend/theme_3/image/icon-qh.png" alt="">
                                            </div>
                                            <div class="item-info">
                                                <div class="t-sub-1">${item.set_number_item || 0}</div>
                                                <div class="t-body-1">${item.image}</div>
                                            </div>
                                        </label>
                                    </div>`;
                        select_game_type.prepend(html);
                    });
                }
              //    Chọn gói vật phẩm
                if (result_data.package.length){
                    let select_package = $('#package');
                    select_package.empty();
                    result_data.package.forEach(function (item) {
                        let html = `<option value="${item.id}">${item.title}</option>`;
                        select_package.append(html);
                    });
                    select_package.niceSelect('update')
                }
                //id game
                let text_id_game =  result_data.gametype.idkey ? result_data.gametype.idkey : 'Id trong game:';
                $('.input-id-game .t-sub-2').text(text_id_game);

            //    password ,phone
                let text_password_phone = result_data.gametype.position ? result_data.gametype.position : 'Số điện thoại ( nếu có ):';
                $('.password-phone .t-sub-2').text(text_password_phone);

                let html_pw_phone = '';
                $('.password-phone .toggle-password,.password-phone input').remove();
                if (result_data.gametype.position === "Mật Khẩu" || result_data.gametype.position === "Mật Khẩu Game"){
                   html_pw_phone = ` <div class="toggle-password">
                                        <input class="input-form w-100" type="password" name="serial" placeholder="Nhập mật khẩu trong game" required="">
                                        <span class="eye"></span>
                                    </div>`;
                } else {
                    html_pw_phone = `<input class="input-form w-100" type="text" name="phone" placeholder="Nhập số điện thoại" required="">`;
                }
                $('.password-phone').append(html_pw_phone);
            }
        }
    }).done(function () {
        $('#modal-tab-withdraw .card-body').removeClass('is-loading');
    });
}

$('#form-withdraw-item').on('submit',function (e) {
    e.preventDefault();
    let data_form = $(this).serializeArray().reduce(function(obj, item) {
        obj[item.name] = item.value;
        return obj;
    }, {});
    $('#modal-tab-withdraw .card-body,#table-history-withdraw').toggleClass('is-loading',true)
    $.ajax({
        url: '/postwithdrawitemajax-' + data_form.game_type,
        type: 'POST',
        data:data_form,
        success:function (res) {
            console.log(res)
            let html_message;
            if (res.status){
                html_message = `<div class="text-invalid message-form mt-2">${res.msg}</div>`;
            }else {
                html_message = `<div class="text-invalid message-form mt-2">${res.msg}</div>`;
            }
            $('.form-message').html(html_message);
        },
    }).done(function () {
        $('#modal-tab-withdraw .card-body,#table-history-withdraw').removeClass('is-loading');
    });
});

let game_type = $('#wrap-game-type').data('game_type');

getWithDrawItem(game_type);

$(document).on('change','input[name="game_type"]',function (event) {
    getWithDrawItem($(this).val());
});

$('#modal-tab-history').on('click','.page-link',function (e) {
    e.preventDefault();
    let url_string = $(this).attr('href');
    let url = new URL(url_string);
    let page = url.searchParams.get('page');
    let game_type = $('input[name="game_type"]:checked').val();

    getWithDrawItem(game_type,{page:page})
})

