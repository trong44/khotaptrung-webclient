$(document).ready(function (e) {

    $('body').on('click','.nick-findter',function(){
        $('#openFinter').modal('show')
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

        if (status == null || status == undefined || status == 'Chọn' || statusvalue == null || statusvalue == undefined || statusvalue == 'Chọn'){}else {
            if ($('.prepend-nick').hasClass('prepend-nick-status')){
                return false;
            }

            var htmlstatus = '';
            htmlstatus += '<div class="col-auto prepend-nick prepend-nick-status" style="position: relative"><a href="javascript:void(0)">' + status + '</a><img class="lazy close-item-nick imgae-nick-status" src="/assets/frontend/theme_3/image/nick/close.png" alt=""></div>';
            $('.nick-findter-data').prepend(htmlstatus);
            isSet = true;
            index = index + 1;
        }

        var servicevalue = $('.service-finter-nick .list .option.selected').data('value');
        var service = $('.service-finter-nick .list .option.selected').text();

        if (service == null || service == undefined || service == 'Chọn' || servicevalue == null || servicevalue == undefined || servicevalue == 'Chọn'){}else {
            if ($('.prepend-nick').hasClass('prepend-nick-service')){
                return false;
            }
            var htmlrank = '';
            htmlrank += '<div class="col-auto prepend-nick prepend-nick-service" style="position: relative"><a href="javascript:void(0)">' + service + '</a><img class="lazy close-item-nick imgae-nick-rank" src="/assets/frontend/theme_3/image/nick/close.png" alt=""></div>';
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

        var id_data = $('.id_data').val();
        var key_data = $('.key_data').val();
        var status_data = $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data = $('.ended_at_data').val();
        var page = 1;

        loadDataServiceHistory(page,id_data,key_data,status_data,started_at_data,ended_at_data)
    })
    $('body').on('click','.prepend-nick-id',function(){
        $('.id').val('');

        loadData();

        $('.id_data').val('');
        var id_data = $('.id_data').val();
        var key_data = $('.key_data').val();
        var status_data = $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data = $('.ended_at_data').val();
        var page = 1;

        loadDataServiceHistory(page,id_data,key_data,status_data,started_at_data,ended_at_data)
    })
    $('body').on('click','.prepend-nick-times',function(){
        $('.started_at').val('');

        loadData();

        $('.started_at_data').val('');
        $('.ended_at_data').val('');
        var id_data = $('.id_data').val();
        var key_data = $('.key_data').val();
        var status_data = $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data = $('.ended_at_data').val();
        var page = 1;

        loadDataServiceHistory(page,id_data,key_data,status_data,started_at_data,ended_at_data)
    })

    $('body').on('click','.prepend-nick-service',function(){
        $('.service').val('');
        $('.service').niceSelect('update');
        $('.service-finter-nick .current').html('Chọn');
        $('.service-finter-nick .list:first-child').addClass('selected');
        loadData();

        $('.key_data').val('');
        var id_data = $('.id_data').val();
        var key_data = $('.key_data').val();
        var status_data = $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data = $('.ended_at_data').val();
        var page = 1;

        loadDataServiceHistory(page,id_data,key_data,status_data,started_at_data,ended_at_data)
    })

    $('body').on('click','.prepend-nick-timee',function(){
        $('.ended_at').val('');

        loadData();

        $('.started_at_data').val('');
        $('.ended_at_data').val('');
        var id_data = $('.id_data').val();
        var key_data = $('.key_data').val();
        var status_data = $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data = $('.ended_at_data').val();
        var page = 1;

        loadDataServiceHistory(page,id_data,key_data,status_data,started_at_data,ended_at_data)
    })
    $('body').on('click','.prepend-nick-timese',function(){
        $('.ended_at').val('');
        $('.started_at').val('');
        loadData();

        $('.started_at_data').val('');
        $('.ended_at_data').val('');
        var id_data = $('.id_data').val();
        var key_data = $('.key_data').val();
        var status_data = $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data = $('.ended_at_data').val();
        var page = 1;

        loadDataServiceHistory(page,id_data,key_data,status_data,started_at_data,ended_at_data)
    })

    $(document).on('submit', '.search-txns', function(e){
        e.preventDefault();

        $('.span-timkiem').html('');

        var htmlloading = '';
        htmlloading += '<div class="loading"></div>';
        $('.btn-timkiem .loading-data__timkiem').html('');
        $('.btn-timkiem .loading-data__timkiem').html(htmlloading);

        var id = $('.search').val();

        $('.id_data').val(id);
        var id_data = $('.id_data').val();
        var key_data = $('.key_data').val();
        var status_data = $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data = $('.ended_at_data').val();
        var page = 1;

        loadDataServiceHistory(page,id_data,key_data,status_data,started_at_data,ended_at_data)
    })

    $('body').on('click','.reset-find',function(){

        $('.span-reset').html('')
        var htmlloading = '';
        htmlloading += '<div class="loading"></div>';
        $('.btn-reset .loading-data__timkiem').html('');
        $('.btn-reset .loading-data__timkiem').html(htmlloading);


        $('.id').val('');
        $('.ended_at').val('');
        $('.started_at').val('');
        $('.service').val('');
        $('.service').niceSelect('update');
        $('.status').val('');
        $('.status').niceSelect('update');
        $('.service-finter-nick .current').html('Chọn');
        $('.service-finter-nick .list:first-child').addClass('selected');
        $('.status-finter-nick .current').html('Chọn');
        $('.status-finter-nick .list:first-child').addClass('selected');

        $('input[name="switch"]:checked').each(function () {
            if (this.checked) {
                $(this).prop('checked', false);
            }
        });
        loadData();


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
        var page = 1;

        loadDataServiceHistory(page,id_data,key_data,status_data,started_at_data,ended_at_data)
    })


    $('body').on('click','.close-modal-default',function(e){
        e.preventDefault();
        $('#openFinter').modal('hide');
    })

    let page = $('#hidden_page').val();

    $(document).on('click', '.paginate__v1 .pagination a',function(event){
        event.preventDefault();

        var page = $(this).attr('href').split('page=')[1];

        $('#hidden_page').val(page);

        $('li').removeClass('active');
        $(this).parent().addClass('active');

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
                $('#openFinter').modal('hide');
                if (data.status == 1){
                    $('#data_service_history').html('');
                    $('#data_service_history').html(data.data);

                    $(".scroll-into-view")[0].scrollIntoView();
                }else if (data.status == 0){
                    var html = '';
                    html += '<div class="table-responsive">';
                    html += '<table class="table table-hover table-custom-res">';
                    html += '<thead><tr><th>Thời gian</th><th>ID</th><th>MGD SMS</th><th>Dịch vụ</th><th>Trị giá</th><th>Thạng thái</th><th>Thao tác</th></tr></thead>';
                    html += '<tbody>';
                    html += '<tr style="width: 100%" id="table-notdata"><td colspan="7"><span>Tài khoản của quý khách chưa phát sinh giao dịch</span></td></tr>';
                    html += '</tbody>';
                    html += '</table>';
                    html += '</div>';

                    $('#data_service_history').html('');
                    $('#data_service_history').html(html);

                }

                $('#data_service_history .default-paginate').removeClass('default-paginate-addpadding');

                $('#data_service_history .table-logs').addClass('table-responsive');
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

    $(document).on('submit', '.account_service_history__v2', function(e){
        e.preventDefault();

        $('.span-ap-dung').html('');
        var htmlloading = '';
        htmlloading += '<div class="loading"></div>';
        $('.btn-ap-dung .loading-data__timkiem').html('');
        $('.btn-ap-dung .loading-data__timkiem').html(htmlloading);

        var id = $('.id').val();

        var servicevalue = $('.service-finter-nick .list .option.selected').data('value');
        var service = $('.service-finter-nick .list .option.selected').text();

        var statusvalue = $('.status-finter-nick .list .option.selected').data('value');
        var status = $('.status-finter-nick .list .option.selected').text();

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

        if (service == null || service == undefined || service == 'Chọn' || servicevalue == null || servicevalue == undefined || servicevalue == 'Chọn'){
            $('.key_data').val('');
        }else {
            $('.key_data').val(servicevalue);
        }

        if (status == null || status == undefined || status == 'Chọn' || statusvalue == null || statusvalue == undefined || statusvalue == 'Chọn'){
            $('.status_data').val('');
        }else {
            $('.status_data').val(statusvalue);
        }


        var id_data = $('.id_data').val();
        var key_data = $('.key_data').val();
        var status_data = $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data = $('.ended_at_data').val();
        var page = 1;

        loadDataServiceHistory(page,id_data,key_data,status_data,started_at_data,ended_at_data)

    });


})
