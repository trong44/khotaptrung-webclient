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
    $('.wide').niceSelect();
    $(document).on('click','.nick-findter',function(){
        $('#openFinter').modal('show');
    });

    $(document).on('click','.prepend-nick',function () {
        let target_name = $(this).data('close');
        if (target_name === 'started_at'){
            $('[data-query=started_at],[data-query=ended_at]').val('');
        } else {
            $(`[data-query=${target_name}]`).val('');
        }
        loadData();
        loadDataTable();
        $('#openFinter').modal('hide');
        $('#data_sort select').niceSelect('update');
    });
    $(document).on('click','.reset-find',function(){
        $('#data_sort')[0].reset();
        $('#data_sort select').niceSelect('update');
        loadData();
        loadDataTable();
        $('#openFinter').modal('hide');
    });
    $(document).on('click','.close-modal-default',function(){
        $('#openFinter').modal('hide');
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
        loadData();
        loadDataTable();
    });

    $(document).on('click','.btn-ap-dung',function (e) {
        e.preventDefault();
        loadData();
        loadDataTable();
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
    loadDataTable();
    loadData();
});
function loadData(){
    let overlay_find = $('.overlay-find');
    let root_elm = $('.nick-findter-data');
    root_elm.html('');
    let html_append = '';
    let length = 0;
    let sort_data = [];
    let sort_data_el = $('#data_sort [data-query]');
    Array.from(sort_data_el).forEach(function (elm) {
        if ($(elm)[0].tagName === 'INPUT' && !!$(elm).val().trim()){
            let key = $(elm).attr('data-query');
            let value = $(elm).val();
            sort_data.push([key,value])
            ++length;
        }
        if ($(elm)[0].tagName === 'SELECT' && !! $(elm).find(':selected').length && $(elm).val() || $(elm).data('query') === 'select_data'){
            let key = $(elm).attr('data-query');
            let text = $(elm).find(':selected').text();
            let value = $(elm).find(':selected').val() || '';
            sort_data.push([key,value,text]);
            ++length;
        }
    });
    let url = location.protocol + '//' + location.host + location.pathname;
    let url_return = '';
    for (let i = 0; i < length; i++) {
        let count_params = sort_data[i].length;
        html_append = '';
        html_append += `<div class="col-auto prepend-nick" data-close="${sort_data[i][0]}">`;
        if (count_params == 2){
            if (sort_data[i][0] == 'started_at' || sort_data[i][0] == 'ended_at'){
                let start = $('input[data-query=started_at]');
                let end = $('input[data-query=ended_at]');
                if (!!start.val().trim() && !!end.val().trim()){
                    html_append += `<a href="javascript:void(0)">${start.val().trim()} - ${end.val().trim()} </a>`;
                }
                else if (!!start.val().trim()){
                    html_append += `<a href="javascript:void(0)">Sau - ${sort_data[i][1]} </a>`;
                }
                else if (!!end.val().trim()){
                    html_append += `<a href="javascript:void(0)">Trước - ${sort_data[i][1]} </a>`;
                }
            }
            else {
                html_append += `<a href="javascript:void(0)">${sort_data[i][1]}</a>`;
            }
        }
        if (count_params == 3) {
            html_append += `<a href="javascript:void(0)">${sort_data[i][2]}</a>`;
        }
        html_append += `<img class="lazy close-item-nick imgae-nick-game" src="/assets/frontend/theme_3/image/nick/close.png" alt="">`;
        html_append += `</div>`;
        root_elm.append(html_append);

        //    add params to url
        if (!i) {
            url_return = url +`?${sort_data[i][0]}=${sort_data[i][1]}`;
        } else {
            /*Nếu mà nó trùng name nhau thì giá trị sẽ ngăn cách nhau bằng | chứ không thêm key mới vào url*/
            if (sort_data[i][0] === sort_data[i - 1][0]) {
                url_return += `|${sort_data[i][1]}`;
            }
            else {
                url_return += `&${sort_data[i][0]}=${sort_data[i][1]}`;
            }
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

    if ($('.prepend-nick[data-close=started_at]').length && $('.prepend-nick[data-close=ended_at]').length){
        --length;
        $('.prepend-nick[data-close=ended_at]').remove();
    }
    overlay_find.html(length);
    overlay_find.toggle(!!length);
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
function checkLastPage() {
    const urlParams = new URLSearchParams(window.location.search);
    const page = urlParams.get('page');
    if (!!page && page > last_page){
        let url = window.location.href;
        let new_url = updateQueryStringParameter(url,'page',1);
        window.history.pushState({}, null, new_url);
        loadDataTable();
        return true;
    }
    return false;
}


