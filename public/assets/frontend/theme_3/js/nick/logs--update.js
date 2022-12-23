$(document).ready(function (e) {
    //copy text input;
    $(document).on('click','.js_copy_input',function (e) {
        e.preventDefault();
        let val = $(this).parent().find('input').val();
        navigator.clipboard.writeText(val);
    });
    $(document).on('submit', '.search-txns', function(e){
        e.preventDefault();
        let keyword = $('.search-txns .search').val();
        let query = {
            page:1,
            serial:keyword,
        }
        loadDataTable(query)
    });
    $(document).on('click','.show_chitiet',function (e) {
        e.preventDefault();
        $('#showPassword').modal('show');
        let id = $(this).data('id');
        let title = $($(`.js_title_item[data-id=${id}]`)).val();

        let html_password = '';
        let html_time = '';
        let html_attr = '';
        let html_other = '';
        let html_button = '';

        // name account
        $('.data-tai-khoan input').val(title);
        // password,time
        let password = $(`.js_password_item[data-id=${id}]`);
        let time = $(`.js_time_item[data-id=${id}]`).val();
        if (password.length){
            html_password += `<input id="password" readonly autocomplete="off" class="input-defautf-ct" type="password" value="${password.val()}" placeholder="Mật khẩu">`;
            html_password += '<img class="lazy img-copy js_copy_input test" src="/assets/frontend/theme_3/image/nick/copy.png" alt="" data-tippy-content="Đã copy mật khẩu">';
            html_password += '<div class="getCopypass">';
            html_password += '<img class="lazy img-show-password js-show-pass" src="/assets/frontend/theme_3/image/cay-thue/eyeshow.png" alt="">';
            html_password += '</div>';

            html_time += '<small>';
            html_time += 'Đã lấy mật khẩu lúc: ' + time;
            html_time += '</small>';
            html_button += `<button class="btn -secondary btn-big close-modal-default" type="button">Đóng</button>`;
        } else {
            html_password += '<input id="password" readonly autocomplete="off" class="input-defautf-ct" type="password" value="******" placeholder="Mật khẩu">';
            html_button += `<button class="btn -primary btn-big get-first-pass" type="button" data-id="${id}">Lấy mật khẩu</button>`;
            // html_password += `<img class="lazy img-copy" src="/assets/frontend/theme_3/image/nick/copy.png" id="getpass" alt="" data-id="${id}">`;
        }
        $('.data-time').html(html_time);
        $('.data-password').html(html_password);
        $('.data-button').html(html_button);
        // attribute
        let input_attr_cate = $(`.js_attr_category[data-id=${id}]`);
        // let input_attr_value = $('.js_attr_value[data-id=${id}]');
        if (input_attr_cate.length){
            let attrs = JSON.parse(input_attr_cate.val());
            let params = JSON.parse($(`.js_params_item[data-id=${id}]`).val());
            attrs.forEach(function (attr) {
                if (attr.position === 'text' && attr.childs.length){
                    attr.childs.forEach(function (child) {
                        if (Object.keys(params).length){
                            Object.keys(params.ext_info).forEach(function(key_info) {
                                if (key_info == child.id && child.is_slug_override == 1){
                                    html_attr += '<div class="row marginauto add-child">';
                                    html_attr += `<div class="col-md-12 left-right body-title-detail-span-ct"><span>${child.title}</span></div>`;
                                    html_attr += '<div class="col-md-12 left-right body-title-detail-select-ct email-success-nick">';
                                    html_attr += `<input readonly autocomplete="off" placeholder="${params.ext_info[key_info]}" class="input-defautf-ct" type="text" value="${params.ext_info[key_info]}">`;
                                    html_attr += '</div>';
                                    html_attr += '</div>';
                                }
                            });
                        }
                    });
                }
            });
        }
        // let input_attr_label = $(`.js_attr_label[data-id=${id}]`);
        // if (input_attr_label.length){
        //     Array.from(input_attr_label).forEach(function (elm) {
        //         let group_id = $(elm).data('gr');
        //         let label = $(elm).val();
        //         let value = $(`.js_attr_value[data-id=${id}][data-gr=${group_id}]`).val();
        //         html_attr += '<div class="row marginauto add-child">';
        //         html_attr += `<div class="col-md-12 left-right body-title-detail-span-ct"><span>${label}</span></div>`;
        //         html_attr += '<div class="col-md-12 left-right body-title-detail-select-ct email-success-nick">';
        //         html_attr += `<input readonly autocomplete="off" placeholder="${value}" class="input-defautf-ct" type="text" value="${value}">`;
        //         html_attr += '</div>';
        //         html_attr += '</div>';
        //     });
        // }
        $('.data-child').html(html_attr);
        /* thong tin bo sung */
               let input_other = $(`.js_idkey_item[data-id=${id}]`);
        if (input_other.length){
            html_other += '<div class="row marginauto add-child">';
            html_other += '<div class="col-md-12 left-right body-title-detail-span-ct"><span>T.tin bổ sung:</span></div>';
            html_other += '<div class="col-md-12 left-right body-title-detail-select-ct email-success-nick">';
            html_other += '<input readonly autocomplete="off" placeholder="Thông tin bổ sung" class="input-defautf-ct" type="text" value="' + input_other.val() + '">';
            html_other += '</div>';
            html_other += '</div>';
        }
        $('.data-ttbxung').html(html_other);
        tippy('.js_copy_input', {trigger: 'click', placement: 'right'});
    });
    // GET FIRST PASSWORD
    $(document).on('click','.get-first-pass',function (e) {
        let html = '';
        html += `<div class="loading m-auto">`;
        html += `<div class="loading-child">`;
        html+= `</div>`;
        html+= `</div>`;
        $(this).html(html);
        $(this).removeClass('-primary get-first-pass');
        $(this).addClass('is_load');
        $.ajax({
            url:'/lich-su-mua-account/get-first-pass',
            type:'GET',
            data:{
                id:$(this).data('id'),
            },
            beforeSend: function (xhr) {

            },
            success: function (res) {
                if (res.status){
                //    refresh info
                    let html_password = '';
                    let html_time = '';
                    html_password += `<input id="password" readonly autocomplete="off" class="input-defautf-ct" type="password" value="${res.key}" placeholder="Mật khẩu">`;
                    html_password += '<img class="lazy img-copy" src="/assets/frontend/theme_3/image/nick/copy.png" alt="">';
                    html_password += '<div class="getCopypass">';
                    html_password += '<img class="lazy img-show-password js-show-pass" src="/assets/frontend/theme_3/image/cay-thue/eyeshow.png" alt="">';
                    html_password += '</div>';

                    html_time += '<small>';
                    html_time += 'Đã lấy mật khẩu thành công lúc: ' + res.time;
                    html_time += '</small>';

                    $('.data-time').html(html_time);
                    $('.data-password').html(html_password);

                    let new_btn = '';
                    new_btn += `<button class="btn -secondary btn-big close-modal-default" type="button">Đóng</button>`;
                    $('.data-button').html(new_btn);

                    let tbody = $('#table-default tbody');
                    let input_pw_hide = '';
                    let input_time_hide = '';
                    input_pw_hide = `<input type="hidden" class="js_password_item" data-id="${res.id}" value="${res.key}">`;
                    input_time_hide = `<input type="hidden" class="js_time_item" data-id="${res.id}" value="${res.time}">`;
                    tbody.append(input_pw_hide);
                    tbody.append(input_time_hide);
                }
                else {
                    let html_time = '';
                    html_time += '<small>';
                    html_time += res.message;
                    html_time += '</small>';
                    $('.data-time').html(html_time);

                    let new_btn = '';
                    new_btn += `<button class="btn -secondary btn-big close-modal-default" type="button">Đóng</button>`;
                    $('.data-button').html(new_btn);
                }
            },
            error: function (data) {

            },
            complete: function (data) {

            }
        })
    });
})
function loadDataTable(query = {page:1,serial:'',key:'',price:'',status:'',started_at:'',ended_at:'',sort_by_data:'',id_data:''}) {
    let url = window.location.href;
    let table = $('#data_pay_account_history');

    //add overlay and loading
    let tbody = $('#table-default tbody');
    tbody.addClass('is_load');
    if (count_load){
        let html_loading = '';
        html_loading += `<div class="loading-table">`;
        html_loading += `<div class="loading">`;
        html_loading += `<div class="loading-child"></div>`;
        html_loading += `</div>`;
        html_loading += `</div>`;
        tbody.prepend(html_loading);
    }
    //Load old data on url
    if (hasQueryParams(url)){
        const urlSearchParams = new URLSearchParams(window.location.search);
        const params = Object.fromEntries(urlSearchParams.entries());
        Object.keys(params).forEach(key => {
            query[key] = params[key];
            let input = $(`#data_sort [name=${key}]`);
            input.val(params[key]);
        });
        $('#data_sort select').niceSelect('update');
    }
    $.ajax({
        type: 'GET',
        url: '/lich-su-mua-account',
        data: query,
        beforeSend: function (xhr) {

        },
        success: (res) => {
            if(res.status){
                table.html(res.html);
                last_page = res.last_page;
                if (checkLastPage()){
                    return;
                }
            }else {
                table.find('.loading-table').remove();
                let html = '';
                html += `<tr style="width: 100%" id="table-notdata"><td colspan="7" class="text-center"><span>Tài khoản của quý khách chưa phát sinh giao dịch.</span></td></tr>`;
                $('table#table-default tbody').html(html);
                $('#data_pay_account_history .default-paginate').html('');
                tbody.removeClass('is_load');
            }
            // $('#data_pay_account_history .table-logs').toggleClass('table-responsive',!!res.status)
            $('#data_pay_account_history .default-paginate').removeClass('default-paginate-addpadding');
        },
        error: function (data) {

        },
        complete: function (data) {

        }
    });
    ++count_load;
}
