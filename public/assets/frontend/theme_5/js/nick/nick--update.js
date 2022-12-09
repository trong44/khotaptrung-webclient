$(document).ready(function () {

    $('#idFilterForm').on('submit', function (e) {
        e.preventDefault();
       let id =  $(this).find('input[name=search]').val();
       $('#data_sort input[name=id_data]').val(id);
        loadDataNick();
       loadDataTableNick();
    });

    $('.item-sort-nick-label').on('click', function (e) {
        let id = $(this).attr('for');
        let query = {
            page:1,
            sort_by_data:$(`#${id}`).val(),
        }
        loadDataTableNick(query);
    });



    // Function when user search
    $('.media-form-search').submit(function (e) {
        e.preventDefault();
        let searchValue = $(this).find('input.input-search-ct').val().toLowerCase();
        $('.body-detail-nick-col-ct').css('display', 'block');
        $('.body-detail-nick-col-ct').each(function () {
            let title = $(this).data('title').toLowerCase();
            if (title.indexOf(searchValue) < 0) {
                $(this).css('display', 'none');
            }
        });
    });
});

function loadDataTableNick(query = {page:1,id_data:'',title_data:'',price_data:'',status_data:'',select_data:'',sort_by_data:''}) {
    let url = window.location.href;
    let slug = $('.slug').val();
    let url_ajax = '/mua-acc/' + slug;
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
        url: url_ajax,
        data: query,
        beforeSend: function (xhr) {
            $("#account_data").empty().html('');
            $("#listLoader").removeClass('d-none');
        },
        success: (res) => {
            $('.loading').css('display','none');
            if (res.status){
                last_page = res.last_page;
                if (checkLastPage()){
                    return;
                }
                $("#account_data").html(res.data);
            }else {
                let html = '';
                html += '<div class="row pb-3 pt-3"><div class="col-md-12 text-center"><span style="color: red;font-size: 16px;">' + res.message + '</span></div></div>';
                $("#account_data").html(html);
            }
        },
        error: function (data) {

        },
        complete: function (data) {
            $("#listLoader").addClass('d-none');
        }
    });
}

function handleToggleContent(selector){
    $('.js-toggle-content .view-less').toggle();
    $('.js-toggle-content .view-more').toggle();
    let elm = $(selector);
    elm.toggleClass('content-video-in-add');
    if ($('.view-less').is(":visible")) {
        let initialHeight = elm.css('max-height', 'initial').height();
        elm.animate({maxHeight: initialHeight + 16},250)
    } else {
        elm.animate({maxHeight: 280},250)
    }
}
