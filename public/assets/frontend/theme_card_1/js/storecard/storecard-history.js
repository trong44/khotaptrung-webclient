$(document).ready(function(){
    let page = $('#hidden_page_storecard').val();
    const csrf_token = $('meta[name="csrf-token"]').attr('content');
    const token =  $('meta[name="jwt"]').attr('content');
    $('body').on('click','i.la-copy',function(e){
        data = $(this).data('id');
        var $temp = $("<input>");
        $("body #copy").html($temp);
        $temp.val($.trim(data)).select();
        document.execCommand("copy");
        $temp.remove();
        toastr.success('Sao chép thành công!');
    });

    $('body').on('click', '.paginate__v1_storecard .pagination a',function(event){
        event.preventDefault();

        var page = $(this).attr('href').split('page=')[1];

        $('#hidden_page_storecard').val(page);

        $('li').removeClass('active');
        $(this).parent().addClass('active');

        var id = $('.id_storecard').val();
        var started_at = $('.started_at_storecard').val();
        var ended_at =  $('.ended_at_storecard').val();

        let html_loading = '';
        html_loading += '<div class="row justify-content-center position-absolute" style="top: 50%;left: 50%" id="loading-data">';
        html_loading += '<div class="loading-wrap mb-3">';
        html_loading += '<span class="modal-loader-spin mb-3"></span>';
        html_loading += '</div>';
        html_loading += '</div>';
        $("#data_store_card").empty().html('');
        $("#data_store_card").empty().html(html_loading);


        loadDataStoreCardHistory(page,id,started_at,ended_at);
    });
    loadDataStoreCardHistory();
    function loadDataStoreCardHistory(page,id,started_at,ended_at) {
        if (page == null || page == '' || page == undefined){
            page = 1;
        }

        request = $.ajax({
            type: 'GET',
            url: '/lich-su-mua-the',
            data: {
                page:page,
                id:id,
                started_at:started_at,
                ended_at:ended_at,
            },
            beforeSend: function (xhr) {

            },
            success: (data) => {
                console.log(data)
                if (data.status == 1){
                    $("#data_store_card").empty().html('');
                    $("#data_store_card").empty().html(data.data);
                }else if (data.status == 0) {
                    var html = '';
                    html += '<div class="table-responsive" id="tableacchstory">';
                    html += '<table class="table table-hover table-custom-res">';
                    html += '<tbody>';
                    html += '<tr><td colspan="8"><span style="color: red;font-size: 16px;">Không có dữ liệu</span></td></tr>';
                    html += '</tbody>';
                    html += '</table>';
                    html += '</div>';

                    $("#data_store_card").empty().html('');
                    $("#data_store_card").empty().html(html);
                }
                $('.data-card').show()


            },
            error: function (data) {

            },
            complete: function (data) {

            }
        });
    }

    $(document).on('submit', '.form-store-card', function(e){
        e.preventDefault();


        var started_at_data = $('.started_at').val();
        if (started_at_data == null || started_at_data == undefined || started_at_data == ''){
            $('.started_at_storecard').val('');
        }else {
            $('.started_at_storecard').val(started_at_data);
        }

        var ended_at_data =  $('.ended_at').val();
        if (ended_at_data == null || ended_at_data == undefined || ended_at_data == ''){
            $('.ended_at_storecard').val('');
        }else {
            $('.ended_at_storecard').val(ended_at_data);
        }
        var id_storecard = $('.id_storecard').val();

        if (id_storecard == null || id_storecard == undefined || id_storecard == ''){
            $('.id_storecard').val('');
        }else {
            $('.id_storecard').val(id_storecard);
        }

        var id_storecard = $('.id_storecard').val();
        var started_at = $('.started_at_storecard').val();
        var ended_at =  $('.ended_at_storecard').val();
        var page = $('#hidden_page_storecard').val();

        let html_loading = '';
        html_loading += '<div class="row justify-content-center position-absolute" style="top: 50%;left: 50%" id="loading-data">';
        html_loading += '<div class="loading-wrap mb-3">';
        html_loading += '<span class="modal-loader-spin mb-3"></span>';
        html_loading += '</div>';
        html_loading += '</div>';
        $("#data_store_card").empty().html('');
        $("#data_store_card").empty().html(html_loading);


        loadDataStoreCardHistory(page,id_storecard,started_at,ended_at);
    });

    $('body').on('click','i.la-copy',function(e){
        data = $(this).data('id');
        var $temp = $("<input>");
        $("body #copy").html($temp);
        $temp.val($.trim(data)).select();
        document.execCommand("copy");
        $temp.remove();
    });

})
