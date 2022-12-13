
    let $item_selected, $server;
    let input_pack = $('#input_pack');
    let $text_total = $('.total__price');

    $server = $('body select[name="server"]').val();
    // Data bot
    let table_bot = $('#table-bot');
    if (table_bot.length) {
        $.ajax({
            type: 'GET',
            url: '/show-bot',
            data: {
                slug: $params.slug,
            },
            success: (response) => {
                if (response.status) {
                    table_bot.empty().html(response.data);
                }
            },
        })
    }

    let purchase_name = $params['filter_type'] * 1 === 7 ? $params['filter_name'] : 'VNĐ';


    let number_format = wNumb({
        thousand: '.',
        suffix: ` ${purchase_name}`,
    });


    switch ($params['filter_type']) {
        // dạng tiền tệ
        case '3':
            //chưa sử dụng
            break
        // Dạng chọn một
        case '4':
            let input_selected = $('select[name="selected"]');
            let input_server = $('select[name="server"]');

            $item_selected = input_selected.val();
            $server = input_server.val();
            input_selected.on('change', function () {
                $item_selected = $(this).val();
                setPrice();
            })
            input_server.on('change', function () {
                $server = $(this).val();
                setPrice();
            });
            setPrice();

        function setPrice() {
            let price = 0;
            if ($item_selected * 1 === -1) {
                return;
            }

            if ($params.server_mode * 1 === 1 && $params.server_price * 1 === 1) {

                let s_price = $params["price" + $server];

                price = parseInt(s_price[$item_selected]);

            } else {

                let s_price = $params["price"];

                price = parseInt(s_price[$item_selected]);

            }

            price = number_format.to(price)
            $text_total.text(price);
        }

            break;
        case '5':
            $('.input-checkbox input[type="checkbox"]').on('change', function () {
                setPrice5();
            });

        function setPrice5() {
            let checked = $('.input-checkbox input[type="checkbox"]:checked');
            let total = 0;
            let s_price;
            $item_selected = '';

            if ($params.server_mode * 1 === 1 && $params.server_price * 1 === 1) {
                s_price = $params["price" + $server];
            } else {
                s_price = $params["price"];
            }
            if (checked.length) {
                let $elm_pack =$('.show-pack');
                $elm_pack.empty();
                Array.from(checked).forEach(function (elm, id) {
                    let value = $(elm).val()
                    total += s_price[value] * 1;
                    $item_selected ? $item_selected += '|' : '';
                    $item_selected += value;

                    let service_name = $(elm).parent().find('.text-label').text().trim();
                    let html_pack = `<div class="t-sub-3 text-right">${service_name}</div><hr>`;
                    $elm_pack.append(html_pack);
                });
                $('input[name=selected]').val($item_selected)
            }
            total = number_format.to(total);
            $text_total.text(total);
        }

            break
        // trong khoảng
        case '6':
            $('.js-change-selected').on('change', function () {

                let type = $(this).data("type");

                UpdatePrice6(type);
            });

            UpdatePrice6();

        function UpdatePrice6(type) {
            let $elm_pack =$('.show-pack');
            let input_rank_from = $('select[name=rank_from]');
            let input_rank_to = $('select[name=rank_to]');

            let rank_from = input_rank_from.val() * 1;
            let rank_to = input_rank_to.val() * 1;

            let price = $params.price;

            let total = 0;
            if (rank_from < rank_to) {
                for (let i = parseInt(rank_from) + 1; i <= rank_to; i++) {
                    total += parseInt(price[i] - price[i - 1]);
                }
            } else {

                if (type * 1 === 0) {
                    rank_to = rank_from + 1;
                    for (var i = parseInt(rank_from) + 1; i <= rank_to; i++) {
                        total += parseInt(price[i] - price[i - 1]);
                    }
                    input_rank_to.val(rank_to);
                    input_rank_to.niceSelect('update')
                } else {

                    rank_from = rank_to - 1;
                    for (let i = parseInt(rank_from) + 1; i <= rank_to; i++) {
                        total += parseInt(price[i] - price[i - 1]);
                    }
                    input_rank_from.val(rank_from);
                    input_rank_from.niceSelect('update')
                }
            }
            let text_rank_from = input_rank_from.find('option:selected').text()
            let text_rank_to = input_rank_to.find('option:selected').text()
            let html_pack = `<div class="t-sub-3 text-right">${text_rank_from} - ${text_rank_to}</div>`;
            $elm_pack.html(html_pack);

            total = number_format.to(total);
            $text_total.text(total);
        }

            break;
        // điền số tiền
        case '7':
            input_pack.on('input', function () {
                this.value = numberFormat($(this).val())
            });

        function UpdateTotal() {

            let price = input_pack.val().replace(/\./g, '') *1;
            if (price < $params['input_pack_min'] || price > $params['input_pack_max']) {
                $text_total.text('Tiền nhập không đúng');
                return;
            }
            let server_id = $server;
            let total = 0, index, current, discount = 0;
            if (!!price) {
                if ($params.server_mode * 1 === 1 && $params.server_price * 1 === 1) {
                    let s_price = $params["price" + server_id];
                    let s_discount = $params["discount" + server_id];
                    for (let i = 0; i < s_price.length; i++) {
                        if (price >= s_price[i] && !!s_price[i]) {
                            current = s_price[i];
                            index = i;
                            discount = s_discount[i];
                            total = price * s_discount[i];
                        }
                    }
                } else {
                    let s_discount = $params["discount"];
                    $params.price.forEach((price_mark,idx) => {
                        if (price >= price_mark){
                            discount = s_discount[idx];
                        }
                    })
                    total = price * discount;
                }
                total = parseInt(total / 1000 * $params.input_pack_rate);

                $('#txt-discount').val(discount);// input hệ số:

                total = number_format.to(total);

                $text_total.text(total);
                let html_pack = `<div class="t-sub-3 text-right">${total}</div>`;
                $('.show-pack').html(html_pack);

                $('.total__price__modal').html(number_format.to(price).replace(purchase_name,'VNĐ'));
            } else {
                $text_total.text('Tiền nhập không đúng');
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
            break
    }
    function numberFormat(number) {
        let new_numb = number.replace(/\./g, "").toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1.');
        return new_numb.split('').reverse().join('').replace(/^[\.]/, '');
    }

//Validator
$(document).ready(function () {
    function checkFormValid() {
        let form = $('#form-service-detail');
        let inputs =  form.find('input[type="text"],input[type="password"]');
        let $ok = 1;
        Array.from(inputs).forEach(function (elm) {

            if (!$(elm).val()){

                $(elm).toggleClass('invalid shake-animate',true);
                $(elm).next().text('Trường này không được để trống !');
                $ok = 0;

            }else {
                $(elm).next().empty();
                $(elm).toggleClass('invalid shake-animate',false);

            }

        });

        let checkboxs = $('#select-service input[type="checkbox"]:checked,.service-select input[type="checkbox"]:checked');

        if ($('.service-select input[type="checkbox"]').length){
            if (!checkboxs.length) {
                $ok = 0;
                $('.error-selected').text('Cần chọn ít nhất 1 dịch vụ để thanh toán')
            } else {
                $('.error-selected').empty()
            }
        }

        // confirm rule
        let checkbox_rule = $('input.confirm-rule');
        if(checkbox_rule.length) {
            if (!checkbox_rule.is(':checked')){
                $ok = 0;
                checkbox_rule.parent().next().text('Vui lòng xác nhận thông tin trên!');
            }else {
                checkbox_rule.parent().next().empty()
            }
        }

        return $ok;
    }
    $('.show-confirm').on('click',function (e) {
        e.preventDefault();
        if (checkFormValid()) {
            width > 992 ? $('.show__modal').trigger('click') : $('.show__step').trigger('click')
        } else {

        }
    })
})

// Handle Submit

$('.submit-data-form').on('click',function (e) {
    e.preventDefault();
    let form = $('#form-service-detail');
    let $data = form.serializeArray().reduce(function (obj, item) {
        obj[item.name] = item.value;
        return obj;
    }, {});

    $(this).empty().html('Đang xử lý...');

     $.ajax({
         url:form.attr('action'),
         type:'POST',
         data:$data,
         success:function (res) {
             if (res.status*1 ===1){

                 $('#modal-success-message').text(res.message);

                 $('#orderSuccses').modal('show');
             }else {
                 $('#modal-failed-message').text(res.message)
                 $('#orderFailed').modal('show');
             }
         }
     }).done(function () {
         $('.submit-data-form').html('Xác nhận');
         width > 992 ? $('#orderModal').modal('hide') : '';
     })
})
