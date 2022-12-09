$(document).ready(function (e) {

    $('body').on('click','.nick-findter',function(){
        $('#openFinter').modal('show')
    });

    $('.wide').niceSelect();

    $('.started_at').datetimepicker({
        format: 'DD-MM-YYYY LT',
        useCurrent: false,
        icons:
            { time: 'fas fa-clock',
                date: 'fas fa-calendar',
                up: 'fas fa-arrow-up',
                down: 'fas fa-arrow-down',
                previous: 'fas fa-arrow-circle-left',
                next: 'fas fa-arrow-circle-right',
                today: 'far fa-calendar-check-o',
                language: 'vi',
                clear: 'fas fa-trash',
                close: 'far fa-times' },
        maxDate: moment()

    });

    $('.ended_at').datetimepicker({
        format: 'DD-MM-YYYY LT',
        useCurrent: false,
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
        maxDate: moment()
    });


    function loadData() {
        var index = 0;
        var isSet = false;
        var defaulthtml = '';
        $('.nick-findter-data').html('');
        $('.nick-findter-data').html(defaulthtml);

        var id = $('.id').val();

        if (id == null || id == undefined || id == ''){}else {
            if ($('.prepend-nick').hasClass('prepend-nick-id')){
                return false;
            }
            if (parseInt(id.length) > 50){
                return false;
            }
            var htmlid = '';
            htmlid += '<div class="col-auto prepend-nick prepend-nick-id" style="position: relative"><a href="javascript:void(0)">' + id + '</a><img class="lazy close-item-nick imgae-nick-id" src="/assets/frontend/theme_3/image/nick/close.png" alt=""></div>';
            $('.nick-findter-data').prepend(htmlid);
            isSet = true;
            index = index + 1;
        }

        var statusvalue = $('.status-finter-nick .list .option.selected').data('value');
        var status = $('.status-finter-nick .list .option.selected').text();

        if (status == null || status == undefined || status == '' || statusvalue == null || statusvalue == undefined || statusvalue == 'Chọn'){}else {
            if ($('.prepend-nick').hasClass('prepend-nick-status')){
                return false;
            }

            var htmlstatus = '';
            htmlstatus += '<div class="col-auto prepend-nick prepend-nick-status" style="position: relative"><a href="javascript:void(0)">' + status + '</a><img class="lazy close-item-nick imgae-nick-status" src="/assets/frontend/theme_3/image/nick/close.png" alt=""></div>';
            $('.nick-findter-data').prepend(htmlstatus);
            isSet = true;
            index = index + 1;
        }

        var transactionvalue = $('.transaction-finter-nick .list .option.selected').data('value');
        var transaction = $('.transaction-finter-nick .list .option.selected').text();

        if (transaction == null || transaction == undefined || transaction == '' || transactionvalue == null || transactionvalue == undefined || transactionvalue == 'Chọn'){}else {
            if ($('.prepend-nick').hasClass('prepend-nick-transaction')){
                return false;
            }
            var htmlrank = '';
            htmlrank += '<div class="col-auto prepend-nick prepend-nick-transaction" style="position: relative"><a href="javascript:void(0)">' + transaction + '</a><img class="lazy close-item-nick imgae-nick-rank" src="/assets/frontend/theme_3/image/nick/close.png" alt=""></div>';
            $('.nick-findter-data').prepend(htmlrank);
            isSet = true;
            index = index + 1;
        }

        var started_at = $('.started_at').val();

        var ended_at = $('.ended_at').val();

        if (started_at == null || started_at == undefined || started_at == ''){
            if (ended_at == null || ended_at == undefined || ended_at == ''){}else {
                var htmltime = '';
                htmltime += '<div class="col-auto prepend-nick prepend-nick-timee" style="position: relative">';
                htmltime += '<a href="javascript:void(0)">';
                htmltime += 'Trước - ' + ended_at;
                htmltime += '</a>';
                htmltime += '<img class="lazy close-item-nick imgae-nick-rank" src="/assets/frontend/theme_3/image/nick/close.png" alt="">';
                htmltime += '</div>';

                $('.nick-findter-data').prepend(htmltime);
                isSet = true;
                index = index + 1;
            }
        }else {
            if (ended_at == null || ended_at == undefined || ended_at == ''){
                var htmltime = '';
                htmltime += '<div class="col-auto prepend-nick prepend-nick-times" style="position: relative">';
                htmltime += '<a href="javascript:void(0)">';
                htmltime += 'Sau - ' + started_at;
                htmltime += '</a>';
                htmltime += '<img class="lazy close-item-nick imgae-nick-rank" src="/assets/frontend/theme_3/image/nick/close.png" alt="">';
                htmltime += '</div>';

                $('.nick-findter-data').prepend(htmltime);
                isSet = true;
                index = index + 1;
            }else {
                var htmltime = '';
                htmltime += '<div class="col-auto prepend-nick prepend-nick-timese" style="position: relative">';
                htmltime += '<a href="javascript:void(0)">';
                htmltime += started_at + ' - ' + ended_at;
                htmltime += '</a>';
                htmltime += '<img class="lazy close-item-nick imgae-nick-rank" src="/assets/frontend/theme_3/image/nick/close.png" alt="">';
                htmltime += '</div>';

                $('.nick-findter-data').prepend(htmltime);
                isSet = true;
                index = index + 1;
            }
        }

        if (parseInt(index) > 0){
            $('.overlay-find').html(index);
            $('.overlay-find').css('display','block');
        }else {
            $('.overlay-find').html(index);
            $('.overlay-find').css('display','none');
        }

    }

    $('body').on('click','.button-modal-nick',function(){
        loadData();
    });

    $('body').on('click','.prepend-nick-status',function(){
        $('.status').val('');
        $('.status').niceSelect('update');
        $('.status-finter-nick .current').html('Chọn');
        $('.status-finter-nick .list:first-child').addClass('selected');
        loadData();

        $('.status_data_ls').val('');

        var serial_data = $('.serial_data_ls').val();
        var key_data =  $('.key_data_ls').val();
        var status_data =  $('.status_data_ls').val();
        var started_at_data = $('.started_at_data_ls').val();
        var ended_at_data =  $('.ended_at_data_ls').val();
        var page = 1;

        loadDataChargeHistory(page, serial_data, key_data, status_data,started_at_data,ended_at_data);
    });

    $('body').on('click','.prepend-nick-times',function(){
        $('.started_at').val('');

        loadData();

        $('.started_at_data_ls').val('');
        $('.ended_at_data_ls').val('');

        var serial_data = $('.serial_data_ls').val();
        var key_data =  $('.key_data_ls').val();
        var status_data =  $('.status_data_ls').val();
        var started_at_data = $('.started_at_data_ls').val();
        var ended_at_data =  $('.ended_at_data_ls').val();
        var page = 1;

        loadDataChargeHistory(page, serial_data, key_data, status_data,started_at_data,ended_at_data);
    });

    $('body').on('click','.prepend-nick-id',function(){
        $('.id').val('');

        loadData();

        $('.serial_data_ls').val('');

        var serial_data = $('.serial_data_ls').val();
        var key_data =  $('.key_data_ls').val();
        var status_data =  $('.status_data_ls').val();
        var started_at_data = $('.started_at_data_ls').val();
        var ended_at_data =  $('.ended_at_data_ls').val();
        var page = 1;

        loadDataChargeHistory(page, serial_data, key_data, status_data,started_at_data,ended_at_data);
    });

    $('body').on('click','.prepend-nick-transaction',function(){
        $('.transaction').val('');
        $('.transaction').niceSelect('update');
        $('.transaction-finter-nick .current').html('Chọn');
        $('.transaction-finter-nick .list:first-child').addClass('selected');
        loadData();


        $('.key_data_ls').val('');

        var serial_data = $('.serial_data_ls').val();
        var key_data =  $('.key_data_ls').val();
        var status_data =  $('.status_data_ls').val();
        var started_at_data = $('.started_at_data_ls').val();
        var ended_at_data =  $('.ended_at_data_ls').val();
        var page = 1;

        loadDataChargeHistory(page, serial_data, key_data, status_data,started_at_data,ended_at_data);
    });

    $('body').on('click','.prepend-nick-timee',function(){
        $('.ended_at').val('');

        loadData();

        $('.started_at_data_ls').val('');
        $('.ended_at_data_ls').val('');

        var serial_data = $('.serial_data_ls').val();
        var key_data =  $('.key_data_ls').val();
        var status_data =  $('.status_data_ls').val();
        var started_at_data = $('.started_at_data_ls').val();
        var ended_at_data =  $('.ended_at_data_ls').val();
        var page = 1;

        loadDataChargeHistory(page, serial_data, key_data, status_data,started_at_data,ended_at_data);
    });

    $('body').on('click','.prepend-nick-timese',function(){
        $('.ended_at').val('');
        $('.started_at').val('');
        loadData();

        $('.started_at_data_ls').val('');
        $('.ended_at_data_ls').val('');

        var serial_data = $('.serial_data_ls').val();
        var key_data =  $('.key_data_ls').val();
        var status_data =  $('.status_data_ls').val();
        var started_at_data = $('.started_at_data_ls').val();
        var ended_at_data =  $('.ended_at_data_ls').val();
        var page = 1;

        loadDataChargeHistory(page, serial_data, key_data, status_data,started_at_data,ended_at_data);
    });

    $('body').on('click','.reset-find',function(){
        $('.id').val('');
        $('.ended_at').val('');
        $('.started_at').val('');
        $('.transaction').val('');
        $('.transaction').niceSelect('update');
        $('.status').val('');
        $('.status').niceSelect('update');
        $('.transaction-finter-nick .current').html('Chọn');
        $('.transaction-finter-nick .list:first-child').addClass('selected');
        $('.status-finter-nick .current').html('Chọn');
        $('.status-finter-nick .list:first-child').addClass('selected');

        $('input[name="switch"]:checked').each(function () {
            if (this.checked) {
                $(this).prop('checked', false);
            }
        });
        loadData();
    });

    $('body').on('click','.close-modal-default',function(){
        $('#openFinter').modal('hide')
    });

    $(document).on('submit', '.search-txns', function(e){
        e.preventDefault();

        $('.span-timkiem').html('');

        var htmlloading = '';
        htmlloading += '<div class="loading"></div>';
        $('.btn-timkiem .loading-data__timkiem').html('');
        $('.btn-timkiem .loading-data__timkiem').html(htmlloading);

        var key = $('.search').val();

        $('.serial_data_ls').val(key);

        var serial_data = $('.serial_data_ls').val();
        var key_data =  $('.key_data_ls').val();
        var status_data =  $('.status_data_ls').val();
        var started_at_data = $('.started_at_data_ls').val();
        var ended_at_data =  $('.ended_at_data_ls').val();
        var page = 1;

        loadDataChargeHistory(page, serial_data, key_data, status_data,started_at_data,ended_at_data);
    });

    $(document).on('click', '.paginate__v1 .pagination a',function(event){
        event.preventDefault();

        var page = $(this).attr('href').split('page=')[1];

        $('#hidden_page').val(page);

        $('li').removeClass('active');
        $(this).parent().addClass('active');

        var serial = $('.serial_data_ls').val();
        var key =  $('.key_data_ls').val();
        var status =  $('.status_data_ls').val();
        var started_at = $('.started_at_data_ls').val();
        var ended_at =  $('.ended_at_data_ls').val();

        loadDataChargeHistory(page, serial, key, status,started_at,ended_at);
    });

    loadDataChargeHistory();

    function loadDataChargeHistory(page, serial, key, status,started_at,ended_at) {
        if (page == null || page == '' || page == undefined){
            page = 1;
        }

        request = $.ajax({
            type: 'GET',
            url: '/the-cao-da-mua/data',
            data: {
                page:page,
                serial:serial,
                key:key,
                status:status,
                started_at:started_at,
                ended_at:ended_at,
            },
            beforeSend: function (xhr) {

            },
            success: (res) => {
                $('.loading-data__timkiem').html('');
                console.log(res)
                $('#openFinter').modal('hide');
                if (res.status){
                    $("#data_pay_card_history_ls").html(res.data);
                }else {
                    let html = '';
                    html += '<div class="table-responsive" id="tableacchstory">';
                    html += '<table class="table table-hover table-custom-res">';
                    html += '<thead><tr><th>Thời gian</th><th>Nội dung</th><th>Nhà mạng</th><th>Mã thẻ/Serial</th><th>Mệnh giá</th><th>Thực nhận</th><th>Trạng thái</th><th>Chi tiết</th></tr></thead>';
                    html += '<tbody>';
                    html += `<tr style="width: 100%" id="table-notdata"><td colspan="7"><span>${res.message || ''}</span></td></tr>`;
                    html += '</tbody>';
                    html += '</table>';
                    html += '</div>';

                    $("#data_pay_card_history_ls").empty().html('');
                    $("#data_pay_card_history_ls").empty().html(html);
                }

                $('#data_pay_card_history_ls .default-paginate').removeClass('default-paginate-addpadding');

                $('#data_pay_card_history_ls .table-logs').addClass('table-responsive');
                $('.span-ap-dung').html('Áp dụng');
                $('.span-reset').html('Thiết lập lại');
                $('.span-timkiem').html('Tìm kiếm');

            },
            error: function (data) {

            },
            complete: function (data) {

            }
        });
    }

    $(document).on('submit', '.form-charge_ls', function(e){
        e.preventDefault();

        $('.span-ap-dung').html('');
        var htmlloading = '';
        htmlloading += '<div class="loading"></div>';
        $('.btn-ap-dung .loading-data__timkiem').html('');
        $('.btn-ap-dung .loading-data__timkiem').html(htmlloading);

        var serial = $('.serial').val();

        var telecomevalue = $('.transaction-finter-nick .list .option.selected').data('value');
        var telecome = $('.transaction-finter-nick .list .option.selected').text();

        var statusvalue = $('.status-finter-nick .list .option.selected').data('value');
        var status = $('.status-finter-nick .list .option.selected').text();

        var started_at = $('.started_at').val();
        var ended_at = $('.ended_at').val();

        if (serial == null || serial == undefined || serial == ''){
            $('.serial_data_ls').val('');
        }else {
            $('.serial_data_ls').val(serial);
        }

        if (telecomevalue == null || telecomevalue == undefined || telecomevalue == 'Chọn' || telecome == null || telecome == undefined || telecome == 'Chọn'){
            $('.key_data_ls').val('');
        }else {
            $('.key_data_ls').val(telecomevalue);
        }

        if (statusvalue == null || statusvalue == undefined || statusvalue == 'Chọn' || status == null || status == undefined || status == 'Chọn'){
            $('.status_data_ls').val('');
        }else {
            $('.status_data_ls').val(statusvalue);
        }

        var started_at = $('.started_at').val();
        if (started_at == null || started_at == undefined || started_at == ''){
            $('.started_at_data_ls').val('');
        }else {
            $('.started_at_data_ls').val(started_at);
        }

        var ended_at =  $('.ended_at').val();
        if (ended_at == null || ended_at == undefined || ended_at == ''){
            $('.ended_at_data_ls').val('');
        }else {
            $('.ended_at_data_ls').val(ended_at);
        }

        var serial_data = $('.serial_data_ls').val();
        var key_data =  $('.key_data_ls').val();
        var status_data =  $('.status_data_ls').val();
        var started_at_data = $('.started_at_data_ls').val();
        var ended_at_data =  $('.ended_at_data_ls').val();
        var page = 1;

        loadDataChargeHistory(page, serial_data, key_data, status_data,started_at_data,ended_at_data);
    });
})
