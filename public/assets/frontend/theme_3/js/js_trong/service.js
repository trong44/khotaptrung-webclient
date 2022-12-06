new Swiper('#service-related',{
    autoplay: false,
    updateOnImagesReady: true,
    watchSlidesVisibility: false,
    lazyLoadingInPrevNext: false,
    lazyLoadingOnTransitionStart: false,
    slidesPerView: 5,
    speed: 300,
    spaceBetween: 16,
    touchMove: true,
    grabCursor: true,
    observer: true,
    observeParents: true,
    breakpoints: {
        992: {
            freeMode: true,
            slidesPerView: 4,
        },
        768: {
            freeMode: true,
            slidesPerView: 2.25,
        }
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

$('.service-form').on('submit', function (e) {
    e.preventDefault();
    let keyword = convertToSlug($(this).find('[name="search"]').val());
    let is_empty = true;
    let text_empty = $('#text-empty');
    text_empty.hide();
    $('.js-service').each(function (i,elm) {
        let slug_service = $(elm).find('img').attr('alt');
        slug_service = convertToSlug(slug_service);
        $(this).toggle(slug_service.indexOf(keyword) > -1);
        if (slug_service.indexOf(keyword) > -1){
            is_empty  = false;
        }
    });
    if (is_empty){
        text_empty.show();
    }
});

function convertToSlug(title) {
    var slug;
    //Đổi chữ hoa thành chữ thường
    slug = title.toLowerCase();
    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, "-");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    // trả về kết quả
    return slug;
}

// only allow numeric input
$('input[numberic]').on('keypress', function (e) {
    var angka = (e.which) ? e.which : e.keyCode
    if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
        return false;
    return true;
});
let input_params_hide =$('#data_params');
let data_params;
let purchase_name;
let input_pack = $('#input_pack');
let txt_price = $('#txt-price');
let server = -1;
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
                itemselect= itemselect_value = parseInt($('select[name=selected] option').filter(':selected').val());
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
            $('.service_pack').html(`<small>${itemselect_name}</small>`);
            $('.total--price').text(`${price} VNĐ`);
            //    Mobile
        }

            break;
        // Dạng chọn nhiều
        case '5':
            $('#select-multi input[type="checkbox"]').change(function () {
                UpdatePrice5();
                checkPack();
            });

        function UpdatePrice5() {
            let checked = $('#select-multi input[type="checkbox"]:checked');
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
            let checked = $('#select-multi input[type="checkbox"]:checked');
            if (checked.length) {
                $('.service_pack').html('')
                checked.each(function (elm) {
                    let text = $(this).parent().find('.label--checkbox__name').text().trim();
                    let html = '';
                    html += `<small>`;
                    html += `${text}`;
                    html += `</small>`;
                    $('.service_pack').append(html);
                });
            }
        }

            break
        // trong khoảng
        case '6':
            $('.js-selected').on('change', function () {

                var type = $(this).data("type");

                UpdatePrice6(type);
            });

            UpdatePrice6();

        function UpdatePrice6(type) {
            let rank_from = ($('select[name=rank_from]').val()) * 1;
            let rank_to = ($('select[name=rank_to]').val()) * 1;

            let rank_from_name = $('select[name=rank_from] option').filter(':selected').text();
            let rank_to_name = $('select[name=rank_to] option').filter(':selected').text();
            let price = data_params.price;

            let total = 0;
            if (rank_from < rank_to) {
                // console.log(parseInt(rank_from + 1),rank_to)
                for (var i = parseInt(rank_from) + 1; i <= rank_to; i++) {
                    total += parseInt(price[i] - price[i - 1]);
                }
            }else {

                if (type == 0){

                    $('.data-select-rank-end ul li[data-value=' + rank_to + ']').removeClass('selected');

                    rank_to = rank_from + 1;
                    for (var i = parseInt(rank_from) + 1; i <= rank_to; i++) {
                        total += parseInt(price[i] - price[i - 1]);
                    }
                    $('select[name=rank_to]').val(rank_to);
                    $('.data-select-rank-end ul li[data-value=' + rank_to + ']').addClass('selected');
                    rank_to_name = $('.data-select-rank-end ul li[data-value=' + rank_to + ']').text();

                    $('.data-select-rank-end .current').html('');
                    $('.data-select-rank-end .current').html(rank_to_name);

                }else{

                    $('.data-select-rank-start ul li[data-value=' + rank_from + ']').removeClass('selected');

                    rank_from = rank_to - 1;
                    for (var i = parseInt(rank_from) + 1; i <= rank_to; i++) {
                        total += parseInt(price[i] - price[i - 1]);
                    }
                    $('select[name=rank_from]').val(rank_from);
                    // $('select[name=rank_from] option').val(rank_from);
                    $('.data-select-rank-start ul li[data-value=' + rank_from + ']').addClass('selected');
                    rank_from_name = $('.data-select-rank-start ul li[data-value=' + rank_from + ']').text();

                    $('.data-select-rank-start .current').html('');
                    $('.data-select-rank-start .current').html(rank_from_name);
                }

                // txt_price.html('Mức rank chọn không hợp lệ');
                // return
            }


            total = total.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1.');
            total = total.split('').reverse().join('').replace(/^[\.]/, '');
            txt_price.html(total + ' VNĐ');

            //    Modal
            $('.service_pack').html(`<small>${rank_from_name} - ${rank_to_name}</small>`);
            $('.total--price').text(`${total} VNĐ`);
        }

            break;
        // điền số tiền
        case '7':
        function UpdateTotal() {

            var price = parseInt(input_pack.val().replace(/\./g, ''));
            if (typeof price != 'number' || price < data_params['input_pack_min'] || price > data_params['input_pack_max']) {
                // $('button[type="submit"]').addClass('not-allow');
                txt_price.text('Tiền nhập không đúng');
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
                    let s_discount = data_params["discount"];
                    data_params.price.forEach((price_mark,idx) => {
                        if (price >= price_mark){
                            discount = s_discount[idx];
                        }
                    })
                    total = price * discount;
                }
                total = parseInt(total / 1000 * data_params.input_pack_rate);
                $('#txt-discount').val(discount);
                total = total.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1.');
                total = total.split('').reverse().join('').replace(/^[\.]/, '');
                txt_price.html('');
                txt_price.text(total + " " + purchase_name);

                // thông tin modal
                $('.service_pack').html(`<small>${total} ${purchase_name}</small>`);
                $('.total--price').text(`${price_show} VNĐ`);
            } else {
                txt_price.text('Tiền nhập không đúng');

                // thông tin modal
                $('.service_pack').html(`<small>Tiền nhập không đúng</small>`);
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

$('.submit-form').on('click', function () {
    /*check conf tiền hay ko*/
    let price_balance = ($('#surplus').val()) * 1;
    let elm_text_total = Array.from($('.total--price'));
    let elm_price = $(document).width() > 992 ? elm_text_total[0] : elm_text_total[1];
    let price_total = ($(elm_price).text().match(/\d/g).join("")) * 1;
    if (price_balance < price_total) {
        $('#openOrder').modal('hide');
        $('#rechargeModal').modal('show');
        return
    }

    let data_form = $('#formDataService').serializeArray().reduce(function (obj, item) {
        obj[item.name] = item.value;
        return obj;
    }, {});

    let url = $('#formDataService').attr('action');
    if (data_form.selected){
        data_form.selected = data_form.selected.replace(/\./g, "");
    }

    //loading btn;
    $(this).html('Đang xử lý...');
    $.ajax({
        type: "POST",
        url: url,
        data: data_form,
        success: function (res) {
            if (res.status) {
                $('.js-message-res span').text(res.message)
                if ($(document).width() > 1200){
                    $('.openSuccess').trigger('click')
                } else {
                    $('.button-next-step-two').trigger('click');
                }
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
if (table_bot.length){
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
}
// Sau khi nhập đúng thì in ra màn hình
