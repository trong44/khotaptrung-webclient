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
                    let select_game_type = $('#select_game_type');
                    select_game_type.empty();
                    result_data.listgametype.forEach(function (item) {
                        let html = `<option value="${item.parent_id}" ${item.parent_id === game_type * 1 ? 'selected' : ''}>${item.title}</option>`;
                        select_game_type.prepend(html);
                        var total_price = 0;
                        if (item.set_number_item){
                            total_price = item.set_number_item;
                        }

                        total_price = total_price.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
                        total_price = total_price.split('').reverse().join('').replace(/^[\.]/,'');

                        item.parent_id === game_type * 1 ? $('.text--danger').text(`Số vật phẩm hiện có: ${total_price} ${item.image}`) : '';
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
                // server
                let has_server = !!result_data.service;
                let input_wrap = $('#input-server');
                if (has_server) {
                    if(result_data.service.idkey !== 'roblox_buyserver') {
                        let service_params = JSON.parse(result_data.service.params)
                        let input_server = `<div class="t-sub-2 t-color-title my_8">Chọn máy chủ:</div>`;
                        input_server += '<select name="server" class="form-control">';
                        service_params.server_data.forEach((server,idx) => {
                            if(!!server && server.indexOf('[DELETE]') === -1){
                                input_server += `<option value="${service_params.server_id[idx]}">${server}</option>`
                            }
                        })
                        input_server += '</select>';
                        input_wrap.html(input_server);
                    } else  {
                        input_wrap.empty();
                    }
                } else {
                    input_wrap.empty();
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
                                        <input class="form-control" type="password" name="serial" placeholder="Nhập mật khẩu trong game" required="">
                                        <span class="eye"></span>
                                    </div>`;
                } else {
                    html_pw_phone = `<input class="form-control" type="text" name="phone" placeholder="Nhập số điện thoại" required="">`;
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

let game_type = $('#select_game_type').data('game_type');
getWithDrawItem(game_type);

$(document).on('change','#select_game_type',function (event) {
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

