$(document).ready(function(){
    const csrf_token = $('meta[name="csrf-token"]').attr('content');
    const token =  $('meta[name="jwt"]').attr('content');
    let page = $('#hidden_page_service').val();

    $('body').on('click', '.paginate__v1 .pagination a',function(event){
        event.preventDefault();

        var page = $(this).attr('href').split('page=')[1];

        $('#hidden_page_service').val(page);


        let html_loading = '';
        html_loading += '<div class="text-center ajax-loading-store load_spinner ajax-loading-data" >';
        html_loading += '<div class="cv-spinner">';
        html_loading += '<span class="spinner"></span>';
        html_loading += '</div>';
        html_loading += '</div>';
        $('.data-card').show()

        $("#data_lich__su_history").empty().html('');
        $("#data_lich__su_history").empty().html(html_loading);

        $('li').removeClass('active');
        $(this).parent().addClass('active');
        var id_txns_data = $('.id_txns_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data = $('.ended_at_data').val();

        loadDataAccountList(page,id_txns_data,started_at_data,ended_at_data)
    });

    $(document).on('submit', '.form-charge__accounttxns', function(e){
        e.preventDefault();

        let html_loading = '';
        html_loading += '<div class="text-center ajax-loading-store load_spinner" >';
        html_loading += '<div class="cv-spinner">';
        html_loading += '<span class="spinner"></span>';
        html_loading += '</div>';
        html_loading += '</div>';
        $('.data-card').show()

        $("#data_lich__su_history").empty().html('');
        $("#data_lich__su_history").empty().html(html_loading);

        var id = $('.id_txns_data').val();
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

        if (id == null || id == undefined || id == ''){
            $('.id_txns_data').val('');
        }else {
            $('.id_txns_data').val(id);
        }


        var id_txns_data = $('.id_txns_data').val();

        var started_at_data = $('.started_at_data').val();
        var ended_at_data = $('.ended_at_data').val();
        var page = $('#hidden_page_service').val();


        loadDataAccountList(page,id_txns_data,started_at_data,ended_at_data)

    });



    loadDataAccountList()

    function loadDataAccountList(page,config_data,status_data,started_at_data,ended_at_data,sort_by_data) {
        if (page == null || page == '' || page == undefined){
            page = 1;
        }
        request = $.ajax({
            type: 'GET',
            url: '/lich-su-giao-dich',
            data: {
                page:page,
                config:config_data,
                status:status_data,
                started_at:started_at_data,
                ended_at:ended_at_data,
                sort_by:sort_by_data,
            },
            beforeSend: function (xhr) {

            },
            success: (data) => {

                $('.loading-data__timkiem').html('');

                if (data.status == 1){


                    $("#data_lich__su_history").empty().html('');
                    $("#data_lich__su_history").empty().html(data.data);

                    // $(".booking_detail")[0].scrollIntoView();

                }else if (data.status == 0){
                    var html = '';
                    html += '<div class="table-responsive">';
                    html += '<table class="table table-hover table-custom-res">';
                    html += '<thead><tr><th>Thời gian</th><th>ID</th><th>Tài khoản </th><th>Giao dịch</th><th>Số tiền</th><th>Số dư cuối</th><th>Nội dung</th><th>Trạng thái</th></tr></thead>';
                    html += '<tbody>';
                    html += '<tr><td colspan="8"><span style="color: red;font-size: 16px;">' + data.message + '</span></td></tr>';
                    html += '</tbody>';
                    html += '</table>';
                    html += '</div>';

                    $("#data_lich__su_history").empty().html('');
                    $("#data_lich__su_history").empty().html(html);

                }
                $('.data-card').show()

            },
            error: function (data) {

            },
            complete: function (data) {

            }
        });
    }
})
