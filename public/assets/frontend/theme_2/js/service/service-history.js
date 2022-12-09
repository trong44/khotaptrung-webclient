$(document).ready(function(){
    const csrf_token = $('meta[name="csrf-token"]').attr('content');
    const token =  $('meta[name="jwt"]').attr('content');
    let page = $('#hidden_page').val();

    $('body').on('click', '.paginate__v1 .pagination a',function(event){
        event.preventDefault();

        var page = $(this).attr('href').split('page=')[1];

        $('#hidden_page').val(page);

        $('li').removeClass('active');
        $(this).parent().addClass('active');

        let html_loading = '';
        html_loading += '<div class="text-center ajax-loading-store load_spinner ajax-loading-data" >';
        html_loading += '<div class="cv-spinner">';
        html_loading += '<span class="spinner"></span>';
        html_loading += '</div>';
        html_loading += '</div>';
        $("#data_lich__su_history").empty().html('');
        $("#data_lich__su_history").empty().html(html_loading);

        var id_data = $('.id_data').val();
        var key_data = $('.key_data').val();
        var status_data = $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data = $('.ended_at_data').val();

        loadDataServiceHistory(page,id_data,key_data,status_data,started_at_data,ended_at_data)
    });

    loadDataServiceHistory()

    function loadDataServiceHistory(page,id_data,key_data,status_data,started_at_data,ended_at_data) {

        if (page == null || page == '' || page == undefined){
            page = 1;
        }

        request = $.ajax({
            type: 'GET',
            url: '/dich-vu-da-mua',
            data: {
                page:page,
                id:id_data,
                key:key_data,
                status:status_data,
                started_at:started_at_data,
                ended_at:ended_at_data,
            },
            beforeSend: function (xhr) {

            },
            success: (data) => {
                $('.loading-data__timkiem').html('');

                if (data.status == 1){
                    $('#data_lich__su_history').empty().html('');
                    $('#data_lich__su_history').empty().html(data.data);

                }else if (data.status == 0){
                    var html = '';
                    html += '<div class="table-responsive">';
                        html += '<table class="table table-hover table-custom-res">';
                            html += '<thead><tr><th>Thời gian</th><th>ID</th><th>MGD SMS</th><th>Dịch vụ</th><th>Trị giá</th><th>Thạng thái</th><th>Thao tác</th></tr></thead>';
                            html += '<tbody>';
                            html += '<tr><td colspan="8"><span style="color: red;font-size: 16px;">' + data.message + '</span></td></tr>';
                            html += '</tbody>';
                        html += '</table>';
                    html += '</div>';

                    $('#data_lich__su_history').empty().html('');
                    $('#data_lich__su_history').empty().html(html);
                }

            },
            error: function (data) {

            },
            complete: function (data) {

            }
        });
    }

    $(document).on('submit', '.account_service_history__v2', function(e){
        e.preventDefault();

        var htmlloading = '';
        htmlloading += '<div class="loading"></div>';
        $('.btn-timkiem .loading-data__timkiem').html('');
        $('.btn-timkiem .loading-data__timkiem').html(htmlloading);

        var id = $('.id').val();
        var key = $('.key').val();
        var status = $('.status').val();
        var started_at = $('.started_at').val();
        var ended_at = $('.ended_at').val();

        if (id == null || id == undefined || id == ''){
            $('.id_data').val('');
        }else {
            $('.id_data').val(id);
        }

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

        if (key == null || key == undefined || key == ''){
            $('.key_data').val('');
        }else {
            $('.key_data').val(key);
        }

        if (status == null || status == undefined || status == ''){
            $('.status_data').val('');
        }else {
            $('.status_data').val(status);
        }


        var id_data = $('.id_data').val();
        var key_data = $('.key_data').val();
        var status_data = $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data = $('.ended_at_data').val();
        var page = $('#hidden_page').val();

        loadDataServiceHistory(page,id_data,key_data,status_data,started_at_data,ended_at_data)

    });

    $('body').on('click','.btn-all',function(e){
        e.preventDefault();

        var htmlloading = '';
        htmlloading += '<div class="loading"></div>';
        $('.btn-all .loading-data__timkiem').html('');
        $('.btn-all .loading-data__timkiem').html(htmlloading);

        $('.id_data').val('');
        $('.key_data').val('');
        $('.status_data').val('');
        $('.started_at_data').val('');
        $('.ended_at_data').val('');

        var id_data = $('.id_data').val();
        var key_data = $('.key_data').val();
        var status_data = $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data = $('.ended_at_data').val();
        var page = $('#hidden_page').val();

        loadDataServiceHistory(page,id_data,key_data,status_data,started_at_data,ended_at_data)

    });

    $('body').on('click','.btn-hom-nay',function(e){
        e.preventDefault();

        var htmlloading = '';
        htmlloading += '<div class="loading"></div>';
        $('.btn-hom-nay .loading-data__timkiem').html('');
        $('.btn-hom-nay .loading-data__timkiem').html(htmlloading);

        var datestartTime = $('.started_at_day_dv').val();

        var dateEndTime = $('.end_at_day_dv').val();

        $('.id_data').val('');
        $('.key_data').val('');
        $('.status_data').val('');
        $('.started_at_data').val(datestartTime);
        $('.ended_at_data').val(dateEndTime);

        var id_data = $('.id_data').val();
        var key_data =  $('.key_data').val();
        var status_data =  $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data =  $('.ended_at_data').val();
        var page = $('#hidden_page').val();

        loadDataServiceHistory(page,id_data,key_data,status_data,started_at_data,ended_at_data)

    });

    $('body').on('click','.btn-hom-qua',function(e){
        e.preventDefault();

        var htmlloading = '';
        htmlloading += '<div class="loading"></div>';
        $('.btn-hom-qua .loading-data__timkiem').html('');
        $('.btn-hom-qua .loading-data__timkiem').html(htmlloading);

        var datestartTime = $('.started_at_yes_dv').val();
        var dateEndTime = $('.end_at_yes_dv').val();

        $('.id_data').val('');
        $('.key_data').val('');
        $('.status_data').val('');
        $('.started_at_data').val(datestartTime);
        $('.ended_at_data').val(dateEndTime);

        var id_data = $('.id_data').val();
        var key_data =  $('.key_data').val();
        var status_data =  $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data =  $('.ended_at_data').val();
        var page = $('#hidden_page').val();

        loadDataServiceHistory(page,id_data,key_data,status_data,started_at_data,ended_at_data)

    });

    $('body').on('click','.btn-thang-nay',function(e){
        e.preventDefault();

        var htmlloading = '';
        htmlloading += '<div class="loading"></div>';
        $('.btn-thang-nay .loading-data__timkiem').html('');
        $('.btn-thang-nay .loading-data__timkiem').html(htmlloading);

        var datestartTime = $('.started_at_month_dv').val();
        var dateEndTime = $('.end_at_month_dv').val();

        $('.id_data').val('');
        $('.key_data').val('');
        $('.status_data').val('');
        $('.started_at_data').val(datestartTime);
        $('.ended_at_data').val(dateEndTime);

        var id_data = $('.id_data').val();
        var key_data =  $('.key_data').val();
        var status_data =  $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data =  $('.ended_at_data').val();
        var page = $('#hidden_page').val();

        loadDataServiceHistory(page,id_data,key_data,status_data,started_at_data,ended_at_data)

    });

})
