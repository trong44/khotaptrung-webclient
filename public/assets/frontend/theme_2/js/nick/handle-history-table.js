let count_load = 0;
let last_page = 0;
$(document).ready(function () {
    $('.started_at,.ended_at').datetimepicker({
        format: 'DD-MM-YYYY LT',
        useCurrent: false,
        locale:'vi',
        maxDate: moment(),
        icons:
            { time: 'fas fa-clock',
                date: 'fas fa-calendar',
                up: 'fas fa-arrow-up',
                down: 'fas fa-arrow-down',
                previous: 'fas fa-arrow-circle-left',
                next: 'fas fa-arrow-circle-right',
                today: 'far fa-calendar-check-o',
                clear: 'fas fa-trash',
                close: 'far fa-times' },
    });

    // $(document).on('click','.nick-findter',function(){
    //     $('#openFinter').modal('show');
    // });
    $(document).on('click','.prepend-nick',function () {
        let target_name = $(this).data('close');
        if (target_name === 'started_at'){
            $('[name=started_at],[name=ended_at]').val('');
        }
        let target = $(`[name=${target_name}]`);
        target.val('');
        loadDataNick();
        loadDataTableNick();
        $('#modal-filter').modal('hide');
        $('#data_sort select').niceSelect('update');
    });
    $(document).on('click','.reset-find',function(){
        $('#data_sort')[0].reset();
        $('#data_sort select').niceSelect('update');
        loadDataNick();
        loadDataTableNick();
        $('#modal-filter').modal('hide');
    });
    $(document).on('click','.close-modal-default',function(){
        $('#modal-filter').modal('hide');
        $('#showPassword').modal('hide');
        $('#openOrder').modal('hide');
    });
    $(document).on('click', '.paginate__v1 .pagination a',function(e){
        e.preventDefault();
        $('.pagination li').removeClass('active');
        $(this).parent().addClass('active');
        let url = window.location.href;
        let page = $(this).attr('href').split('page=')[1];
        let new_url = updateQueryStringParameter(url,'page',page);
        window.history.pushState({}, null, new_url);
        loadDataTableNick();
    });
    $(document).on('click','.btn-ap-dung',function (e) {
        e.preventDefault();
        loadDataNick();
        loadDataTableNick();
        $('#openFinter').modal('hide');
    });
    $(document).on('click','.js-show-pass',function (e) {
        e.preventDefault();
        let input_password = $('#password');
        if (input_password.attr('type') === "password") {
            input_password.attr('type','text');
            $(this).attr('src','/assets/frontend/theme_3/image/cay-thue/eyehide.png')
        } else {
            input_password.attr('type','password')
            $(this).attr('src','/assets/frontend/theme_3/image/cay-thue/eyeshow.png')
        }
    });
    loadDataTableNick();
    loadDataNick();
});
function loadDataNick(){
    let elm_form = width < 992 ? $('.bottom-sheet .form-filter') : $('.modal .form-filter');
    let overlay_find = $('.filter-history');
    let root_elm = $('#params-filter');
    root_elm.html('');
    let html_append = '';
    let length = 0;
    let sort_data = [];
    let sort_data_el = elm_form.find('[name]');
    Array.from(sort_data_el).forEach(function (elm) {
        if ($(elm)[0].tagName === 'INPUT' && !!$(elm).val().trim()){
            let key = $(elm).attr('name');
            let value = $(elm).val();
            sort_data.push([key,value])
            ++length;
        }
        if ($(elm)[0].tagName === 'SELECT' && !! $(elm).find(':selected').length && $(elm).find(':selected').val()){
            let key = $(elm).attr('name');
            let text = $(elm).find(':selected').text();
            let value = $(elm).find(':selected').val();
            sort_data.push([key,value,text]);
            ++length;
        }
    });
    let url = location.protocol + '//' + location.host + location.pathname;
    let url_return = '';
    for (let i = 0; i < length; i++) {
        let count_params = sort_data[i].length;
        html_append = '';
        html_append += `<div class="tag" data-close="${sort_data[i][0]}">`;
        if (count_params === 2){
            if (sort_data[i][0] === 'started_at' || sort_data[i][0] === 'ended_at'){
                let start = $(elm_form).find('input[name=started_at]');
                let end = $(elm_form).find('input[name=ended_at]');
                if (!!start.val().trim() && !!end.val().trim()){
                    html_append += `${start.val().trim()} - ${end.val().trim()}`;
                }
                else if (!!start.val().trim()){
                    html_append += `Sau - ${sort_data[i][1]}`;
                }
                else if (!!end.val().trim()){
                    html_append += `Trước - ${sort_data[i][1]} `;
                }
            }
            else {
                html_append += `${sort_data[i][1]}`;
            }
        }
        if (count_params === 3) {
            html_append += `${sort_data[i][2]}`;
        }
        html_append += `</div>`;
        root_elm.append(html_append);

        //    add params to url
        if (!i) {
            url_return = url +`?${sort_data[i][0]}=${sort_data[i][1]}`;
        } else {
            url_return += `&${sort_data[i][0]}=${sort_data[i][1]}`;
        }
    }
    const urlParams = new URLSearchParams(window.location.search);
    const page = urlParams.get('page');
    if (!!page){
        url_return += `&page=${page}`;
        url += `?page=${page}`;
    }
    if (length){
        window.history.pushState({}, null, url_return);
    }else {
        window.history.pushState({}, null, url);
    }

    if ($('.tag[data-close=started_at]').length && $('.tag[data-close=ended_at]').length){
        --length;
        $('.tag[data-close=ended_at]').remove();
    }
    overlay_find.attr('data-notify',length);
}
function hasQueryParams(url) {
    return url.includes('?');
}
function updateQueryStringParameter(uri, key, value) {
    var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
    var separator = uri.indexOf('?') !== -1 ? "&" : "?";
    if (uri.match(re)) {
        return uri.replace(re, '$1' + key + "=" + value + '$2');
    }
    else {
        return uri + separator + key + "=" + value;
    }
}
$(document).ready(function () {
    let form_filter = width < 992 ? $('.bottom-sheet .form-filter') : $('.modal .form-filter');
    if (form_filter.length) {
        form_filter.on('submit',function (e) {
            e.preventDefault();
            loadDataNick();
            if (width > 992) {
                $(this).closest('.modal').modal('hide');
            } else {
                closeSheet();
            }
        });

        let url = window.location.href;
        //Load old data on url
        if (hasQueryParams(url)){
            const urlSearchParams = new URLSearchParams(window.location.search);
            const params = Object.fromEntries(urlSearchParams.entries());
            Object.keys(params).forEach(key => {
                let input = $(`.form-filter [name=${key}]`);
                input.val(params[key]);
            });
            $(form_filter).find('select').niceSelect('update');
            loadDataNick(form_filter);
        }
    }

    $(document).on('click','#params-filter .tag',function () {
        let target_name = $(this).data('close');
        if (target_name === 'started_at'){
            $('.form-filter [name=started_at],.form-filter [name=ended_at]').val('');
        }
        let target = $(`.form-filter [name=${target_name}]`);
        target.val('');
        loadDataNick(form_filter);
        $('.form-filter select').niceSelect('update');
    });

});
function checkLastPage() {
    const urlParams = new URLSearchParams(window.location.search);
    const page = urlParams.get('page');
    if (!!page && page > last_page){
        let url = window.location.href;
        let new_url = updateQueryStringParameter(url,'page',1);
        window.history.pushState({}, null, new_url);
        loadDataTableNick();
        return true;
    }
    return false;
}
