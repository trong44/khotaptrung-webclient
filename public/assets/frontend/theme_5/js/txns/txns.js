$(document).ready(function (e) {

    $('body').on('click','.nick-findter',function(){
        $('#openFinter').modal('show');
    })

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
    })

    $('body').on('click','.prepend-nick-status',function(){
        $('.status').val('');
        $('.status').niceSelect('update');
        $('.status-finter-nick .current').html('Chọn');
        $('.status-finter-nick .list:first-child').addClass('selected');
        loadData();

        $('.status_data').val('');
        var config_data = $('.config_data').val();

        var status_data = $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data = $('.ended_at_data').val();
        var sort_by_data = $('.sort_by_data').val();
        var page = 1;

        $('.search').val('');
        var id = $('.search').val();

        loadDataAccountList(page,config_data,status_data,started_at_data,ended_at_data,sort_by_data,id)
    })

    $('body').on('click','.prepend-nick-times',function(){
        $('.started_at').val('');

        loadData();

        $('.started_at_data').val('');
        $('.ended_at_data').val('');
        var config_data = $('.config_data').val();

        var status_data = $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data = $('.ended_at_data').val();
        var sort_by_data = $('.sort_by_data').val();
        var page = 1;

        $('.search').val('');
        var id = $('.search').val();

        loadDataAccountList(page,config_data,status_data,started_at_data,ended_at_data,sort_by_data,id)
    })

    $('body').on('click','.prepend-nick-transaction',function(){
        $('.config').val('');
        $('.config').niceSelect('update');
        $('.transaction-finter-nick .current').html('Chọn');
        $('.transaction-finter-nick .list:first-child').addClass('selected');
        loadData();

        $('.config_data').val('');
        var config_data = $('.config_data').val();

        var status_data = $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data = $('.ended_at_data').val();
        var sort_by_data = $('.sort_by_data').val();
        var page = 1;

        $('.search').val('');
        var id = $('.search').val();

        loadDataAccountList(page,config_data,status_data,started_at_data,ended_at_data,sort_by_data,id)
    })

    $('body').on('click','.prepend-nick-timee',function(){
        $('.ended_at').val('');

        loadData();

        $('.started_at_data').val('');
        $('.ended_at_data').val('');
        var config_data = $('.config_data').val();

        var status_data = $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data = $('.ended_at_data').val();
        var sort_by_data = $('.sort_by_data').val();
        var page = 1;

        $('.search').val('');
        var id = $('.search').val();

        loadDataAccountList(page,config_data,status_data,started_at_data,ended_at_data,sort_by_data,id)
    })

    $('body').on('click','.prepend-nick-timese',function(){
        $('.ended_at').val('');
        $('.started_at').val('');
        loadData();

        $('.started_at_data').val('');
        $('.ended_at_data').val('');

        var config_data = $('.config_data').val();
        var status_data = $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data = $('.ended_at_data').val();
        var sort_by_data = $('.sort_by_data').val();
        var page = 1;
        $('.search').val('');
        var id = $('.search').val();

        loadDataAccountList(page,config_data,status_data,started_at_data,ended_at_data,sort_by_data,id)
    })

    $('body').on('click','.reset-find',function(){

        $('.span-reset').html('')
        var htmlloading = '';
        htmlloading += '<div class="loading"></div>';
        $('.btn-reset .loading-data__timkiem').html('');
        $('.btn-reset .loading-data__timkiem').html(htmlloading);


        $('.ended_at').val('');
        $('.started_at').val('');
        $('.config').val('');
        $('.config').niceSelect('update');
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

        $('.config_data').val('');
        $('.status_data').val('');
        $('.started_at_data').val('');
        $('.ended_at_data').val('');
        $('.sort_by_data').val('');
        var config_data = $('.config_data').val();

        var status_data = $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data = $('.ended_at_data').val();
        var sort_by_data = $('.sort_by_data').val();
        var page = 1;

        $('.search').val('');
        var id = $('.search').val();

        loadDataAccountList(page,config_data,status_data,started_at_data,ended_at_data,sort_by_data,id)

    })

    $('body').on('click','.close-modal-default',function(){
        $('#openFinter').modal('hide')
    })


    let page = $('#hidden_page_service').val();

    $(document).on('click', '.paginate__v1 .pagination a',function(event){
        event.preventDefault();

        var page = $(this).attr('href').split('page=')[1];

        $('#hidden_page_service').val(page);

        $('li').removeClass('active');
        $(this).parent().addClass('active');
        var sort_by_data = $('.sort_by_data').val();
        var config_data = $('.config_data').val();
        var status_data = $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data = $('.ended_at_data').val();

        loadDataAccountList(page,config_data,status_data,started_at_data,ended_at_data,sort_by_data)
    });

    $(document).on('submit', '.search-txns', function(e){
        e.preventDefault();

        $('.span-timkiem').html('');

        var htmlloading = '';
        htmlloading += '<div class="loading"></div>';
        $('.btn-timkiem .loading-data__timkiem').html('');
        $('.btn-timkiem .loading-data__timkiem').html(htmlloading);

        var id = $('.search').val();

        var config_data = $('.config_data').val();
        var status_data = $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data = $('.ended_at_data').val();
        var sort_by_data = $('.sort_by_data').val();
        var page = 1;

        loadDataAccountList(page,config_data,status_data,started_at_data,ended_at_data,sort_by_data,id)
    })

    $(document).on('submit', '.form-charge__accounttxns', function(e){
        e.preventDefault();
        $('.span-ap-dung').html('');
        var htmlloading = '';
        htmlloading += '<div class="loading"></div>';
        $('.btn-ap-dung .loading-data__timkiem').html('');
        $('.btn-ap-dung .loading-data__timkiem').html(htmlloading);

        // var config = $('.config').val();
        var configvalue = $('.transaction-finter-nick .list .option.selected').data('value');
        var config = $('.transaction-finter-nick .list .option.selected').text();

        var started_at = $('.started_at').val();
        var ended_at = $('.ended_at').val();

        var statusvalue = $('.status-finter-nick .list .option.selected').data('value');
        var status = $('.status-finter-nick .list .option.selected').text();

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

        if (configvalue == null || configvalue == undefined || configvalue == 'Chon' || config == null || config == undefined || config == 'Chọn'){
            $('.config_data').val('');
        }else {
            $('.config_data').val(configvalue);
        }

        if (status == null || status == undefined || status == '' || statusvalue == null || statusvalue == undefined || statusvalue == 'Chọn'){
            $('.status_data').val('');
        }else {
            $('.status_data').val(statusvalue);
        }

        var config_data = $('.config_data').val();

        var status_data = $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data = $('.ended_at_data').val();
        var sort_by_data = $('.sort_by_data').val();
        var page = 1;

        $('.search').val('');
        var id = $('.search').val();

        loadDataAccountList(page,config_data,status_data,started_at_data,ended_at_data,sort_by_data,id)

    });

    loadDataAccountList()

    function loadDataAccountList(page,config_data,status_data,started_at_data,ended_at_data,sort_by_data,id) {
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
                id:id,
            },
            beforeSend: function (xhr) {

            },
            success: (data) => {

                $('.loading-data__timkiem').html('');
                $('#openFinter').modal('hide');

                if (data.status == 1){

                    $("#data_lich__su_history").empty().html('');
                    $("#data_lich__su_history").empty().html(data.data);


                    $(".scroll-into-view")[0].scrollIntoView();

                }else if (data.status == 0){
                    var html = '';
                    html += '<div class="table-responsive">';
                    html += '<table class="table table-hover table-custom-res">';
                    html += '<thead><tr><th>Thời gian</th><th>ID</th><th>Tài khoản</th><th>Giao dịch</th><th>Số tiền</th><th>Số dư cuối</th><th>Nội dung</th><th>Trạng thái</th></tr></thead>';
                    html += '<tbody>';
                    html += '<tr style="width: 100%" id="table-notdata"><td colspan="8"><span>Tài khoản của quý khách chưa phát sinh giao dịch</span></td></tr>';
                    html += '</tbody>';
                    html += '</table>';
                    html += '</div>';

                    $("#data_lich__su_history").empty().html('');
                    $("#data_lich__su_history").empty().html(html);


                }

                $('#data_lich__su_history .default-paginate').removeClass('default-paginate-addpadding');

                $('#data_lich__su_history .table-logs').addClass('table-responsive');

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
})
