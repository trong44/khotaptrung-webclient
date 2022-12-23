$(document).ready(function (e) {
    $(document).on('submit', '.search-txns', function(e){
        e.preventDefault();
        let id = $('.search-txns .search').val();
        let query = {
            page:1,
            id:id,
        }
        loadDataTable(query);
    });
})
function loadDataTable(query = {
    page: 1 ,
    id:'',
    slug_category:'',
    status:'',
    started_at:'',
    ended_at:'',
}) {
    let url = window.location.href;
    let table = $('#data_service_history');

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
    ++count_load;
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
        url: '/dich-vu-da-mua',
        data: query,
        beforeSend: function (xhr) {

        },
        success: (res) => {
            if(res.status){
                last_page = res.last_page;
                if (checkLastPage()){
                    return;
                }
                table.html(res.data);
            }else {
                table.find('.loading-table').remove();
                let html = '';
                html += `<tr style="width: 100%" id="table-notdata"><td colspan="7" class="text-center"><span>Tài khoản của quý khách chưa phát sinh giao dịch.</span></td></tr>`;
                $('table#table-default tbody').html(html);
                $('#data_service_history .default-paginate').html('');
                tbody.removeClass('is_load');
            }
            // $('#data_service_history .table-logs').toggleClass('table-responsive',!!res.status)
            $('#data_service_history .default-paginate').removeClass('default-paginate-addpadding');
        },
        error: function (data) {

        },
        complete: function (data) {

        }
    });
}
