$(document).ready(function(){
    let page = $('#hidden_page_atm').val();

    // get tele

    function getIdCode(){
        var url = '/ajax/transfer-code';
        $.ajax({
            type: "GET",
            url: url,
            success: function (data) {
                if(data.status == 1){
                    let html = '';
                    html += '<div class="transfer-title" style="font-weight: 600">  Nội dung chuyển khoản  </div>'
                    html += '<div class="transfer-result d-flex"><p class="text-danger">'+ data.data +'</p>  <span style="padding-left: 8px;cursor: pointer"><i class="fas fa-copy"  data-id="'+ data.data +'"></i></span>   </div>';
                    $('.transfer-code').html(html)
                }
            },
            error: function (data) {
                swal({
                    title: "Lỗi !",
                    text: "Có lỗi phát sinh vui lòng liên hệ QTV để kịp thời xử lý.",
                    icon: "error",
                    buttons: {
                        cancel: "Đóng",
                    },
                })
            },
            complete: function (data) {
            }
        });
    }
    getIdCode();
    paycartDataChargeATMHistory();

    $(document).on('click', '.paginate__v1__nt .pagination a',function(event){
        event.preventDefault();

        var page = $(this).attr('href').split('page=')[1];

        $('#hidden_page_atm').val(page);

        $('li').removeClass('active');
        $(this).parent().addClass('active');
        paycartDataChargeATMHistory(page);


    });
    paycartDataChargeATMHistory();
    function paycartDataChargeATMHistory(page) {
        if (page == null || page == '' || page == undefined){
            page = 1;
        }
        request = $.ajax({
            type: 'GET',
            url: '/transfer/data',
            data: {
                page:page,
            },
            beforeSend: function (xhr) {
                let html = '';
                html += '  <div class="body-box-loadding result-amount-loadding" style="position: absolute;top: 100%;left: 50%">';
                html += ' <div class="d-flex justify-content-center">';
                html += '   <span class="pulser"></span>';
                html += ' </div>';
                html += ' </div>';
                $("#recharge_atm_data tbody").html(html);
            },
            success: (data) => {

                if (data.status == 1){

                    $("#recharge_atm_data").empty().html('');
                    $("#recharge_atm_data").empty().html(data.data);
                }else if (data.status == 0){
                    var html = '';
                    html += '<div class="table-responsive" id="tableacchstory">';
                    html += '<table class="table table-hover table-custom-res">';
                    html += '<thead><tr> <th>Thời gian</th><th>Số tiền</th><th>Thực nhận</th><th>Trạng thái</th></tr></thead>';
                    html += '<tbody>';
                    html += '<tr class="account_content_transaction_history"><td colspan="8"><span style="color: red;font-size: 16px;">Không có dữ liệu !</span></td></tr>';
                    html += '</tbody>';
                    html += '</table>';
                    html += '</div>';

                    $("#recharge_atm_data").empty().html('');
                    $("#recharge_atm_data").empty().html(html);
                }

            },
            error: function (data) {

            },
            complete: function (data) {
                $('.user-manager .menu-content ').css('min-height','auto')
            }
        });
    }

})
