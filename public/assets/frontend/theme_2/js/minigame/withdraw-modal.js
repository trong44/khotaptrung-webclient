// swiper
let swiper_item_possession = new Swiper('.swiper-withdraw',{
    slidesPerView: 5,
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

$('#modalWithdraw [name="started_at"],#modalWithdraw [name="ended_at"]').datetimepicker({
    format: 'DD-MM-YYYY',
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

function getWithDrawItem(game_type,data_query) {
    $('#form-withdraw-item').toggleClass('is-loading',true);
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
                $('.input-id-game .form-label').text(text_id_game);

            //    password ,phone
                let text_password_phone = result_data.gametype.position ? result_data.gametype.position : 'Số điện thoại ( nếu có ):';
                $('.password-phone .form-label').text(text_password_phone);

                let html_pw_phone = '';
                $('.password-phone .toggle-password,.password-phone .text-error,.password-phone input').remove();
                if (result_data.gametype.position === "Mật Khẩu" || result_data.gametype.position === "Mật Khẩu Game"){
                   html_pw_phone = ` <div class="toggle-password">
                                        <input class="password" type="password" name="serial" placeholder="Nhập mật khẩu trong game" required="">
                                    </div>
                                    <span class="text-error"></span>`;
                } else {
                    html_pw_phone = `<input class="input-form w-100" type="text" name="phone" placeholder="Nhập số điện thoại" required="">
                                    <span class="text-error"></span>`;
                }
                $('.password-phone').append(html_pw_phone);
            }
        }
    }).done(function () {
        $('#form-withdraw-item').removeClass('is-loading');
    });
}

$('#form-withdraw-item').on('submit',function (e) {
    e.preventDefault();
    let data_form = $(this).serializeArray().reduce(function(obj, item) {
        obj[item.name] = item.value;
        return obj;
    }, {});
    $('#form-withdraw-item, #table-history-withdraw').toggleClass('is-loading',true);
    $('#withdrawMessage').empty();
    $.ajax({
        url: '/postwithdrawitemajax-' + data_form.game_type,
        type: 'POST',
        data:data_form,
        success:function (res) {
            let html_message;
            if (res.status){
                html_message = `<span class="text-error">${res.msg}</span>`;
            }else {
                html_message = `<span class="text-error">${res.msg}</span>`;
            }
            $('#withdrawMessage').html(html_message);
        },
    }).done(function () {
        $('#form-withdraw-item, #table-history-withdraw').removeClass('is-loading');
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
});

$('#modalWithdraw #resetFormButton').on('click', function (e) {
    e.preventDefault();
    $('#modal-tab-history [name="started_at"],#modal-tab-history [name="ended_at"]').val('');
    $('#modal-tab-history [name="id"],#modal-tab-history [name="status"]').val('');
    $('#modal-tab-history [name="id"],#modal-tab-history [name="status"]').niceSelect('update');
});

