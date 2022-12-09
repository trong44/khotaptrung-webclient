paycartDataChargeATMHistory();
// let page = $('#hidden_page_atm').val();

$('body').on('click', '.paginate__v1_index_transfer .pagination a',function(event){
    event.preventDefault();

    var page = $(this).attr('href').split('page=')[1];
    $('.data-card').show()
    $('#hidden_page_atm').val(page);

    $('li').removeClass('active');
    $(this).parent().addClass('active');
    paycartDataChargeATMHistory(page);


});

function paycartDataChargeATMHistory(page) {

    request = $.ajax({
        type: 'GET',
        url: '/transfer/data',
        data: {
            page:page,
        },
        beforeSend: function (xhr) {

        },
        success: (data) => {

            if (data.status == 1){

                $("#data_recharge_atm").empty().html('');
                $("#data_recharge_atm").empty().html(data.data);
            }else if (data.status == 0){
                var html = '';
                html += '<div class="table-responsive" id="tableacchstory">';
                html += '<table class="table table-hover table-custom-res">';
                html += '<thead><tr> <th>Thời gian</th><th>Số tiền</th><th>Thực nhận</th><th>Trạng thái</th></tr></thead>';
                html += '<tbody>';
                html += '<tr><td colspan="8"><span style="color: red;font-size: 16px;">Không có dữ liệu</span></td></tr>';
                html += '</tbody>';
                html += '</table>';
                html += '</div>';

                $("#data_recharge_atm").empty().html('');
                $("#data_recharge_atm").empty().html(html);
            }
            $('.data-card').show()

        },
        error: function (data) {

        },
        complete: function (data) {

        }
    });
}
