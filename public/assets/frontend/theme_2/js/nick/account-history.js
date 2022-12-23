$(document).ready(function () {

    let htmlLoading = '<div class="text-center ajax-loading-store load_spinner"><div class="cv-spinner"><span class="spinner"></span></div></div>';

    loadDataAccountHistory();

    $('body').on('click', '.paginate__v1 .pagination a',function(event){
        event.preventDefault();

        var page = $(this).attr('href').split('page=')[1];

        var serial_data = $('.serial_data').val();
        var key_data = $('.key_data').val();
        var price_data = $('.price_data').val();
        var status_data = $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data = $('.ended_at_data').val();

        loadDataAccountHistory(page,serial_data,key_data,price_data,status_data,started_at_data,ended_at_data);
    });

    $(document).on('submit', '.form-charge__accountls', function(e){
        e.preventDefault();

        var page = 1;
        var serial = $('.serial').val();
        var key = $('.key').val();
        var price = $('.price').val();
        var status = $('.status').val();
        var started_at = $('.started_at').val();
        var ended_at = $('.ended_at').val();

        if (started_at == null || started_at == undefined || started_at == ''){
            $('.started_at_data').val('');
        }else {
            $('.started_at_data').val(started_at);
        }

        if (ended_at == null || ended_at == undefined || ended_at == ''){
            $('.ended_at_data').val('');
        }else {
            $('.ended_at_data').val(ended_at);
        }

        if (serial == null || serial == undefined || serial == ''){
            $('.serial_data').val('');
        }else {
            $('.serial_data').val(serial);
        }

        if (key == null || key == undefined || key == ''){
            $('.key_data').val('');
        }else {
            $('.key_data').val(key);
        }

        if (price == null || price == undefined || price == ''){
            $('.price_data').val('');
        }else {
            $('.price_data').val(price);
        }

        if (status == null || status == undefined || status == ''){
            $('.status_data').val('');
        }else {
            $('.status_data').val(status);
        }


        var serial_data = $('.serial_data').val();
        var key_data = $('.key_data').val();
        var price_data = $('.price_data').val();
        var status_data = $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data = $('.ended_at_data').val();

        loadDataAccountHistory(page,serial_data,key_data,price_data,status_data,started_at_data,ended_at_data);

    });

    $('body').on('click','.btn-all',function(e){
        e.preventDefault();

        $('.serial_data').val('');
        $('.key_data').val('');
        $('.price_data').val('');
        $('.status_data').val('');
        $('.started_at_data').val('');
        $('.ended_at_data').val('');

        var page = 1;
        var serial_data = $('.serial_data').val();
        var key_data = $('.key_data').val();
        var price_data = $('.price_data').val();
        var status_data = $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data = $('.ended_at_data').val();

        loadDataAccountHistory(page,serial_data,key_data,price_data,status_data,started_at_data,ended_at_data);

    });

    function loadDataAccountHistory(page,id_data,key_data,price_data,status_data,started_at_data,ended_at_data) {

        if (page == null || page == '' || page == undefined){
            page = 1;
        }

        $.ajax({
            type: 'GET',
            url: '/lich-su-mua-account',
            data: {
                page:page,
                id:id_data,
                key:key_data,
                price: price_data,
                status:status_data,
                started_at:started_at_data,
                ended_at:ended_at_data,
            },
            beforeSend: function (xhr) {
                /*Thêm loading khi tải*/
                $('#data_lich__su_history').html(htmlLoading);
            },
            success: (res) => {
                if (res.status == 1) {
                    $('#data_lich__su_history').html(res.html);
                }
                if (!res.status) {
                    let textHtml = '<p class="text-center text-danger">Không có dữ liệu!</p>'
                    $('#data_lich__su_history').html(textHtml);
                }
            },
            error: function (data) {

            },
            complete: function (data) {

            }
        });
    }
});
