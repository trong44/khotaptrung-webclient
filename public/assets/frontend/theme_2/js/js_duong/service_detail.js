$('input[numberic]').on('keypress', function (e) {
    var angka = (e.which) ? e.which : e.keyCode
    if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
        return false;
    return true;
});
let input_params_hide =$('#data_params');
let data_params;
// let purchase_name;
let input_pack = $('#input_pack');
let txt_price = $('#txt-price');
// let server = -1;
server = parseInt($('select[name=server] option').filter(':selected').val());
if (input_params_hide.length){
    data_params = JSON.parse(input_params_hide.val());
    data_params['filter_type'] == 7 ? purchase_name = data_params['filter_name'] : purchase_name = 'VNĐ';
    switch (data_params['filter_type']) {
        // Dạng tiền tệ
        case '3':
            break
        // chọn một
        case '4':
            $("select[name=selected]").change(function (elm, select) {
                itemselect = parseInt($('select[name=selected] option').filter(':selected').val());
                UpdatePrice4();
            });
            $("select[name=server]").change(function (elm, select) {
                server = parseInt($('select[name=server] option').filter(':selected').val());
                UpdatePrice4();
            });
            let itemselect_value = parseInt($('select[name=selected] option').filter(':selected').val());
            let itemselect_name = $('select[name=selected] option').filter(':selected').text();
            UpdatePrice4();

        function UpdatePrice4() {
            let price = 0;
            if (itemselect_value == -1) {
                return;
            }
            if (data_params.server_mode == 1 && data_params.server_price == 1) {
                let s_price = data_params["price" + server];
                price = parseInt(s_price[itemselect_value]);
            } else {
                let s_price = data_params["price"];
                price = parseInt(s_price[itemselect_value]);
            }

            price = price.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1.');
            price = price.split('').reverse().join('').replace(/^[\.]/, '');
            txt_price.text(price + ' VNĐ');

            //    Modal
            $('.service_pack').html(`<div>${itemselect_name}</div>`);
            $('.total--price').text(`${price} VNĐ`);
            //    Mobile
        }

            break;
        // Dạng chọn nhiều
        case '5':
            $('.select-multi input[type="checkbox"]').change(function () {
                UpdatePrice5();
                checkPack();
            });

        function UpdatePrice5() {
            let checked = $('.select-multi input[type="checkbox"]:checked');
            var total = 0;
            var itemselect = '';
            if (data_params.server_mode == 1 && data_params.server_price == 1) {
                var s_price = data_params["price" + server];
            } else {
                var s_price = data_params["price"];
            }

            if (checked.length > 0) {
                checked.each(function (idx, elm) {
                    total += parseInt(s_price[$(elm).val()]);
                    if (!!itemselect) {
                        itemselect += '|';
                    }
                    itemselect += $(this).val();
                });
                $('input[name=selected]').val(itemselect)
            }
            total = total.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1.');
            total = total.split('').reverse().join('').replace(/^[\.]/, '');
            txt_price.text(total + ' VNĐ');
            //    modal
            $('.total--price').text(total + ' VNĐ');
        }

        function checkPack() {
            let checked = $('.select-multi input[type="checkbox"]:checked');
            if (checked.length) {
                $('.service_pack').html('');
                checked.each(function (elm) {
                    let text = $(this).parent().find('.text-label').text().trim();
                    let html = '';
                    html += `<div>`;
                    html += `${text}`;
                    html += `</div>`;
                    $('.service_pack').append(html);
                });
            }
        }

            break
        // trong khoảng
        case '6':
            $('.js-selected').on('change', function () {
                UpdatePrice6();
            });
            UpdatePrice6();

        function UpdatePrice6() {
            let rank_from = $('select[name=rank_from] option').filter(':selected').val();
            let rank_to = $('select[name=rank_to] option').filter(':selected').val();
            let rank_from_name = $('select[name=rank_from] option').filter(':selected').text();
            let rank_to_name = $('select[name=rank_to] option').filter(':selected').text();
            let price = data_params.price;

            let total = 0;
            if (rank_from < rank_to) {
                for (var i = parseInt(rank_from + 1); i <= rank_to; i++) {
                    total += parseInt(price[i] - price[i - 1]);
                }
            }


            total = total.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1.');
            total = total.split('').reverse().join('').replace(/^[\.]/, '');
            txt_price.html(total + ' VNĐ');

            //    Modal
            $('.service_pack').html(`<div>${rank_from_name} - ${rank_to_name}</div>`);
            $('.total--price').text(`${total} VNĐ`);
        }

            break;
        // điền số tiền
        case '7':
        function UpdateTotal() {
            var price = parseInt(input_pack.val().replace(/\./g, ''));
            if (typeof price != 'number' || price < data_params['input_pack_min'] || price > data_params['input_pack_max']) {
                // $('button[type="submit"]').addClass('not-allow');
                txt_price.text('Tiền nhập sai');
                return;
            }
            var total = 0;
            var index = 0;
            var current = 0;
            var discount = 0;
            let server_id = server;
            let price_show = price.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1.');
            price_show = price_show.split('').reverse().join('').replace(/^[\.]/, '');
            if (!!price) {

                if (data_params.server_mode == 1 && data_params.server_price == 1) {
                    var s_price = data_params["price" + server_id];
                    var s_discount = data_params["discount" + server_id];
                    for (var i = 0; i < s_price.length; i++) {

                        if (price >= s_price[i] && s_price[i] != null) {
                            current = s_price[i];
                            index = i;
                            discount = s_discount[i];
                            total = price * s_discount[i];
                        }
                    }
                } else {
                    var s_price = data_params["price"];
                    var s_discount = data_params["discount"];
                    discount = s_discount[server_id];
                    total = price * discount;
                }

                total = parseInt(total / 1000 * data_params.input_pack_rate);
                $('#txt-discount').val(discount);
                total = total.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1.');
                total = total.split('').reverse().join('').replace(/^[\.]/, '');
                txt_price.html('');
                txt_price.text(total + " " + purchase_name);

                // thông tin modal
                $('.service_pack').html(`<div>${total} ${purchase_name}</div>`);
                $('.total--price').text(`${price_show} VNĐ`);
            } else {
                txt_price.text('Tiền nhập sai');

                // thông tin modal
                $('.service_pack').html(`<div>Tiền nhập sai</div>`);
                $('.total--price').text(`${price_show} VNĐ`);
            }
        }

            input_pack.bind('focus keyup', function () {
                UpdateTotal();
            });
            $('select[name=server]').on('change', function () {
                UpdateTotal();
            });
            UpdateTotal()
            break;
        default:
    }

}


function checkboxRequired(selector) {
    let checkboxs = $(`${selector}:checked`);
    return !checkboxs.length;
}
/* js submit form */

$('.submit-form').on('click', function () {
    /*check conf tiền hay ko*/
    let price_balance = ($('.logged-in .text-end').clone().children().remove().end().text().trim().match(/\d/g).join("")) * 1;
    let elm_text_total = Array.from($('.total--price'));
    let elm_price = $(document).width() > 992 ? elm_text_total[0] : elm_text_total[1];
    let price_total = ($(elm_price).text().match(/\d/g).join("")) * 1;
    if (price_balance < price_total) {
        $('#orderModal').modal('hide');
        $('#rechargeModal').modal('show');
        return
    }

    let data_form = $('#formDataService').serializeArray().reduce(function (obj, item) {
        obj[item.name] = item.value;
        return obj;
    }, {});
    let url = $('#formDataService').attr('action');
    data_form.selected = data_form.selected.replace(/\./g, "");

    //loading btn;
    $(this).html('Đang xử lý...');
    $.ajax({
        type: "POST",
        url: url,
        data:  new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function (res) {
            if (res.status) {
                    $('.js-message-res span').text(res.message)
                if ($(document).width() > 1200){
                    $('.openSuccess').trigger('click')
                } else {
                    $('.button-next-step-two').trigger('click');
                }
                $('#successModal').modal('show');
            }
            else {
                $('.modal__error__message small').text(res.message)
            }
        },
        complete:function () {
            $('.submit-form').html('Xác nhận');
        }
    });

})

// BOT
let table_bot = $('#table-bot');
$.ajax({
    type: 'GET',
    url: '/show-bot',
    data: {
        slug: $('#slug').val(),
    },
    success: (response) => {
        if (response.status){
            table_bot.html('');
            table_bot.html(response.data);
        }
    },
})


/* check dk show modal vs step*/
$('body').on('click','.btnPay',function(){
    let is_ok = 1;
    let required = $('input[required_service]');
    let html = '';
    if (required.length){
        required.each(function () {
            $(this).toggleClass('invalid',!$(this).val().trim());
            if (!$(this).val().trim()){
                is_ok = 0;
                let text = $(this).parent().prev().text().trim().toLowerCase();
                $(this).parent().next().html(html)
            }else {
                $(this).parent().next().text('')
            }
        });
    }


    if (is_ok){
        if ($(document).width() > 1200) {
            $('#orderModal').modal('show');
        }else {
            $('.stepService').trigger('click')
        }
    }
});


$('.openSuccess').on('click', function(){
    $('#successModal').modal('show');
    $('#orderModal').modal('hide');
})

/* js validate form service */
    let errorMsg = Array.from($(".error"));
// Adding the submit event Listener
let validate_input = $('[required_service]');
$('.btnPay').on('click', function(e){
    e.preventDefault();
    engine(validate_input[0], 0, "Vui lòng điền thông tin yêu cầu !");
    engine(validate_input[1], 1, "Vui lòng nhập mật khẩu !");
    engine(validate_input[2], 2, "Vui lòng điền thông tin yêu cầu !");
    engine(validate_input[3], 3, "Vui lòng điền thông tin yêu cầu !");
});

// engine function which will do all the works

function engine (id, serial, message) {
    if (id.value.trim() === "") {
        setTimeout(function () {
            errorMsg[serial].innerHTML = message;
        },5)
        id.style.border = "1px solid red";
    } else {
        errorMsg[serial].innerHTML = "";
        id.style.border = "1px solid green";
    }
};

/* show bot*/
$(document).ready(function() {
    const media = "http://cdn.upanh.info/";

    var slug = $('#slug').val();

    getShowBot(slug)

    function getShowBot(slug) {
        request = $.ajax({
            type: 'GET',
            url: '/show-bot',
            data: {
                slug: slug
            },
            beforeSend: function (xhr) {

            },
            success: (response) => {

                if (response.status == 1) {
                    $('.data-bot').html('');
                    $('.data-bot').html(response.data);
                }
            },
            error: function (data) {

            },
            complete: function (data) {

            }
        });
    }
});
