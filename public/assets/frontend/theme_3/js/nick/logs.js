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

        var transaction = $('.serial').val();

        if (transaction == null || transaction == undefined || transaction == ''){}else {
            if ($('.prepend-nick').hasClass('prepend-nick-transaction')){
                return false;
            }
            var htmlrank = '';
            htmlrank += '<div class="col-auto prepend-nick prepend-nick-transaction" style="position: relative"><a href="javascript:void(0)">' + transaction + '</a><img class="lazy close-item-nick imgae-nick-rank" src="/assets/frontend/theme_3/image/nick/close.png" alt=""></div>';
            $('.nick-findter-data').prepend(htmlrank);
            isSet = true;
            index = index + 1;
        }

        var pricevalue = $('.price-finter-nick .list .option.selected').data('value');
        var price = $('.price-finter-nick .list .option.selected').text();

        if (price == null || price == undefined || price == 'Chọn' || pricevalue == null || pricevalue == undefined || pricevalue == 'Chọn'){}else {
            if ($('.prepend-nick').hasClass('prepend-nick-price')){
                return false;
            }
            var htmlprice = '';
            htmlprice += '<div class="col-auto prepend-nick prepend-nick-price" style="position: relative"><a href="javascript:void(0)">' + price + '</a><img class="lazy close-item-nick imgae-nick-price" src="/assets/frontend/theme_3/image/nick/close.png" alt=""></div>';
            $('.nick-findter-data').prepend(htmlprice);
            isSet = true;
            index = index + 1;
        }

        var gamevalue = $('.game-finter-nick .list .option.selected').data('value');
        var game = $('.game-finter-nick .list .option.selected').text();

        if (game == null || game == undefined || game == '' || gamevalue == null || gamevalue == undefined || gamevalue == 'Chọn'){}else {
            if ($('.prepend-nick').hasClass('prepend-nick-game')){
                return false;
            }

            var htmlgame = '';
            htmlgame += '<div class="col-auto prepend-nick prepend-nick-game" style="position: relative"><a href="javascript:void(0)">' + game + '</a><img class="lazy close-item-nick imgae-nick-game" src="/assets/frontend/theme_3/image/nick/close.png" alt=""></div>';
            $('.nick-findter-data').prepend(htmlgame);
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
        var chitiet_data = $('.chitiet_data').val();
        var id_data = $('.id_data').val();
        var serial_data = $('.serial_data').val();
        var key_data = $('.key_data').val();
        var price_data = $('.price_data').val();
        var status_data = $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data = $('.ended_at_data').val();
        var sort_by_data = $('.sort_by_data').val();
        var page = 1;

        loadDataAccountList(page,serial_data,key_data,price_data,status_data,started_at_data,ended_at_data,sort_by_data,chitiet_data,id_data)
    })

    $('body').on('click','.prepend-nick-times',function(){
        $('.started_at').val('');

        loadData();

        $('.started_at_data').val('');
        $('.ended_at_data').val('');
        var chitiet_data = $('.chitiet_data').val();
        var id_data = $('.id_data').val();
        var serial_data = $('.serial_data').val();
        var key_data = $('.key_data').val();
        var price_data = $('.price_data').val();
        var status_data = $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data = $('.ended_at_data').val();
        var sort_by_data = $('.sort_by_data').val();
        var page = 1;

        loadDataAccountList(page,serial_data,key_data,price_data,status_data,started_at_data,ended_at_data,sort_by_data,chitiet_data,id_data)
    })

    $('body').on('click','.prepend-nick-transaction',function(){
        $('.serial').val('');
        loadData();

        var chitiet_data = $('.chitiet_data').val();
        var id_data = $('.id_data').val();
        var serial_data = $('.serial_data').val();
        var key_data = $('.key_data').val();
        var price_data = $('.price_data').val();
        var status_data = $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data = $('.ended_at_data').val();
        var sort_by_data = $('.sort_by_data').val();
        var page = 1;

        loadDataAccountList(page,serial_data,key_data,price_data,status_data,started_at_data,ended_at_data,sort_by_data,chitiet_data,id_data)
    })

    $('body').on('click','.prepend-nick-timee',function(){
        $('.ended_at').val('');

        loadData();

        $('.started_at_data').val('');
        $('.ended_at_data').val('');
        var chitiet_data = $('.chitiet_data').val();
        var id_data = $('.id_data').val();
        var serial_data = $('.serial_data').val();
        var key_data = $('.key_data').val();
        var price_data = $('.price_data').val();
        var status_data = $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data = $('.ended_at_data').val();
        var sort_by_data = $('.sort_by_data').val();
        var page = 1;

        loadDataAccountList(page,serial_data,key_data,price_data,status_data,started_at_data,ended_at_data,sort_by_data,chitiet_data,id_data)
    })

    $('body').on('click','.prepend-nick-timese',function(){
        $('.ended_at').val('');
        $('.started_at').val('');
        loadData();

        $('.started_at_data').val('');
        $('.ended_at_data').val('');
        var chitiet_data = $('.chitiet_data').val();
        var id_data = $('.id_data').val();
        var serial_data = $('.serial_data').val();
        var key_data = $('.key_data').val();
        var price_data = $('.price_data').val();
        var status_data = $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data = $('.ended_at_data').val();
        var sort_by_data = $('.sort_by_data').val();
        var page = 1;

        loadDataAccountList(page,serial_data,key_data,price_data,status_data,started_at_data,ended_at_data,sort_by_data,chitiet_data,id_data)
    })

    $('body').on('click','.prepend-nick-game',function(){
        $('.game').val('');
        $('.game').niceSelect('update');
        $('.game-finter-nick .current').html('Chọn');
        $('.game-finter-nick .list:first-child').addClass('selected');
        loadData();

        $('.key_data').val('');

        var chitiet_data = $('.chitiet_data').val();
        var id_data = $('.id_data').val();
        var serial_data = $('.serial_data').val();
        var key_data = $('.key_data').val();
        var price_data = $('.price_data').val();
        var status_data = $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data = $('.ended_at_data').val();
        var sort_by_data = $('.sort_by_data').val();
        var page = 1;

        loadDataAccountList(page,serial_data,key_data,price_data,status_data,started_at_data,ended_at_data,sort_by_data,chitiet_data,id_data)
    })

    $('body').on('click','.prepend-nick-price',function(){
        $('.price').val('');
        $('.price').niceSelect('update');
        $('.price-finter-nick .current').html('Chọn');
        $('.price-finter-nick .list:first-child').addClass('selected');
        loadData();

        $('.price_data').val('');

        var chitiet_data = $('.chitiet_data').val();
        var id_data = $('.id_data').val();
        var serial_data = $('.serial_data').val();
        var key_data = $('.key_data').val();
        var price_data = $('.price_data').val();
        var status_data = $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data = $('.ended_at_data').val();
        var sort_by_data = $('.sort_by_data').val();
        var page = 1;

        loadDataAccountList(page,serial_data,key_data,price_data,status_data,started_at_data,ended_at_data,sort_by_data,chitiet_data,id_data)
    })

    $('body').on('click','.reset-find',function(){

        $('.span-reset').html('')
        var htmlloading = '';
        htmlloading += '<div class="loading"></div>';
        $('.btn-reset .loading-data__timkiem').html('');
        $('.btn-reset .loading-data__timkiem').html(htmlloading);

        $('.ended_at').val('');
        $('.started_at').val('');
        $('.serial').val('');
        $('.status').val('');
        $('.status').niceSelect('update');
        $('.game').val('');
        $('.game').niceSelect('update');
        $('.price').val('');
        $('.price').niceSelect('update');
        $('.transaction-finter-nick .current').html('Chọn');
        $('.transaction-finter-nick .list:first-child').addClass('selected');
        $('.status-finter-nick .current').html('Chọn');
        $('.status-finter-nick .list:first-child').addClass('selected');
        $('.game-finter-nick .current').html('Chọn');
        $('.game-finter-nick .list:first-child').addClass('selected');
        $('.price-finter-nick .current').html('Chọn');
        $('.price-finter-nick .list:first-child').addClass('selected');

        $('input[name="switch"]:checked').each(function () {
            if (this.checked) {
                $(this).prop('checked', false);
            }
        });
        loadData();

        $('.chitiet_data').val('');
        $('.id_data').val('');
        $('.serial_data').val('');
        $('.key_data').val('');
        $('.price_data').val('');
        $('.status_data').val('');
        $('.started_at_data').val('');
        $('.ended_at_data').val('');
        $('.sort_by_data').val('');

        var chitiet_data = $('.chitiet_data').val();
        var id_data = $('.id_data').val();
        var serial_data = $('.serial_data').val();
        var key_data = $('.key_data').val();
        var price_data = $('.price_data').val();
        var status_data = $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data = $('.ended_at_data').val();
        var sort_by_data = $('.sort_by_data').val();
        var page = 1;

        loadDataAccountList(page,serial_data,key_data,price_data,status_data,started_at_data,ended_at_data,sort_by_data,chitiet_data,id_data)

    })

    $('body').on('click','.close-modal-default',function(){
        $('#openFinter').modal('hide')
        $('#showPassword').modal('hide')
    })

    // $('body').on('click','.openMatKhau',function(){
    //     $('#showPassword').modal('show')
    // })

    let page = $('#hidden_page_service').val();

    $(document).on('click', '.paginate__v1 .pagination a',function(event){
        event.preventDefault();

        var page = $(this).attr('href').split('page=')[1];

        $('#hidden_page_service').val(page);

        $('li').removeClass('active');
        $(this).parent().addClass('active');

        var serial_data = $('.serial_data').val();
        var key_data = $('.key_data').val();
        var price_data = $('.price_data').val();
        var status_data = $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data = $('.ended_at_data').val();
        var sort_by_data = $('.sort_by_data').val();
        var chitiet_data = $('.chitiet_data').val();
        var id_data = $('.id_data').val();

        loadDataAccountList(page,serial_data,key_data,price_data,status_data,started_at_data,ended_at_data,sort_by_data,chitiet_data,id_data)
    });

    $(document).on('submit', '.search-txns', function(e){
        e.preventDefault();

        $('.span-timkiem').html('');

        var htmlloading = '';
        htmlloading += '<div class="loading"></div>';
        $('.btn-timkiem .loading-data__timkiem').html('');
        $('.btn-timkiem .loading-data__timkiem').html(htmlloading);

        var id = $('.search').val();

        $('.id_data').val(id);
        var chitiet_data = $('.chitiet_data').val();
        var id_data = $('.id_data').val();
        var serial_data = $('.serial_data').val();
        var key_data = $('.key_data').val();
        var price_data = $('.price_data').val();
        var status_data = $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data = $('.ended_at_data').val();
        var sort_by_data = $('.sort_by_data').val();
        var page = 1;

        loadDataAccountList(page,serial_data,key_data,price_data,status_data,started_at_data,ended_at_data,sort_by_data,chitiet_data,id_data)
    })

    $(document).on('submit', '.form-charge__accountls', function(e){
        e.preventDefault();

        $('.span-ap-dung').html('');
        var htmlloading = '';
        htmlloading += '<div class="loading"></div>';
        $('.btn-ap-dung .loading-data__timkiem').html('');
        $('.btn-ap-dung .loading-data__timkiem').html(htmlloading);


        var serial = $('.serial').val();

        var keyvalue = $('.game-finter-nick .list .option.selected').data('value');
        var key = $('.game-finter-nick .list .option.selected').text();

        var pricevalue = $('.price-finter-nick .list .option.selected').data('value');
        var price = $('.price-finter-nick .list .option.selected').text();

        var statusvalue = $('.status-finter-nick .list .option.selected').data('value');
        var status = $('.status-finter-nick .list .option.selected').text();

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

        if (key == null || key == undefined || key == 'Chọn' || keyvalue == null || keyvalue == undefined || keyvalue == 'Chọn'){
            $('.key_data').val('');
        }else {
            $('.key_data').val(keyvalue);
        }

        if (price == null || price == undefined || price == 'Chọn' || pricevalue == null || pricevalue == undefined || pricevalue == 'Chọn'){
            $('.price_data').val('');
        }else {
            $('.price_data').val(pricevalue);
        }

        if (status == null || status == undefined || status == 'Chọn' || statusvalue == null || statusvalue == undefined || statusvalue == 'Chọn'){
            $('.status_data').val('');
        }else {
            $('.status_data').val(statusvalue);
        }


        var serial_data = $('.serial_data').val();
        var key_data = $('.key_data').val();
        var price_data = $('.price_data').val();
        var status_data = $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data = $('.ended_at_data').val();
        var sort_by_data = $('.sort_by_data').val();
        var page = 1;
        var chitiet_data = $('.chitiet_data').val();
        var id_data = $('.id_data').val();

        loadDataAccountList(page,serial_data,key_data,price_data,status_data,started_at_data,ended_at_data,sort_by_data,chitiet_data,id_data)

    });

    $('body').on('click','.show_chitiet',function(e){
        e.preventDefault();

        $('.chitiet_data').val(1);
        var serial_data = $('.serial_data').val();
        var id = $(this).data('id');
        $('.id_data').val(id);
        var key_data = $('.key_data').val();
        var price_data = $('.price_data').val();
        var status_data = $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data = $('.ended_at_data').val();
        var sort_by_data = $('.sort_by_data').val();
        var page = 1;
        var chitiet_data = $('.chitiet_data').val();
        var id_data = $('.id_data').val();

        loadDataAccountList(page,serial_data,key_data,price_data,status_data,started_at_data,ended_at_data,sort_by_data,chitiet_data,id_data)

    });

    loadDataAccountList()

    function loadDataAccountList(page,serial,key,price,status,started_at,ended_at,sort_by_data,chitiet_data,id_data) {
        if (page == null || page == '' || page == undefined){
            page = 1;
        }
        request = $.ajax({
            type: 'GET',
            url: '/lich-su-mua-account',
            data: {
                page:page,
                serial:serial,
                key:key,
                price:price,
                status:status,
                started_at:started_at,
                ended_at:ended_at,
                sort_by_data:sort_by_data,
                chitiet_data:chitiet_data,
                id_data:id_data,
            },
            beforeSend: function (xhr) {

            },
            success: (data) => {

                $('.result-amount-loadding').remove();
                $('.chitiet_data').val(0);
                $('.id_data').val('');


                $('.loading-data__timkiem').html('');
                $('#openFinter').modal('hide');

                if (data.status == 1){

                    $(".scroll-into-view")[0].scrollIntoView();

                    if (data.chitiet_data == 1){

                        $('#showPassword').modal('show');

                        //Tài khoản.

                        var htmltk = '';
                        htmltk += '<input readonly autocomplete="off" class="input-defautf-ct" id="email" type="text" value="' + data.datashow.title + '">';
                        htmltk += '<img class="lazy " src="/assets/frontend/theme_3/image/nick/copy.png" alt="" id="getCopyemail">';

                        $('.data-tai-khoan').html('');
                        $('.data-tai-khoan').html(htmltk);

                        //Mạt khẩu

                        var htmlpass = '';

                        if (data.time == null || data.time == '' || data.time == undefined){
                            htmlpass += '<input id="password" readonly autocomplete="off" class="input-defautf-ct" type="password" value="******" placeholder="Mật khẩu">';
                            htmlpass += '<img class="lazy img-copy" src="/assets/frontend/theme_3/image/nick/copy.png" id="getpass" alt="" data-slug="' + data.slugen + '" data-id="' + data.datashow.id + '">';
                        }else {
                            htmlpass += '<input id="password" readonly autocomplete="off" class="input-defautf-ct" type="password" value="' + data.key + '" placeholder="Mật khẩu">';
                            htmlpass += '<img class="lazy img-copy" src="/assets/frontend/theme_3/image/nick/copy.png" alt="" id="getCopypass">';
                            htmlpass += '<div class="getCopypass">';
                            htmlpass += '<img class="lazy img-show-password" src="/assets/frontend/theme_3/image/cay-thue/eyehide.png" alt="">';
                            htmlpass += '</div>';
                        }


                        $('.data-password').html('');
                        $('.data-password').html(htmlpass);


                        //thời gian.
                        var htmltg = '';

                        if (data.time == null || data.time == '' || data.time == undefined){

                        }else {
                            htmltg += '<small>';
                            htmltg += 'Đã lấy mật khẩu lúc: ' + data.time;
                            htmltg += '</small>';
                            // html += 'Đã lấy mật khẩu lần đầu tiên lúc: ' + data.time + '';
                        }


                        $('.data-time').html('');
                        $('.data-time').html(htmltg);

                        //child

                        var htmlchild = '';

                        if (data.count > 0){
                            $.each(data.dataAttribute,function(key,value){

                                if(value.position == 'text'){
                                    if (value.childs.length > 0){
                                        $.each(value.childs,function(keychild,valuechild){
                                            if (data.datashow.params == null || data.datashow.params == undefined || data.datashow.params == ''){}else {
                                                $.each(data.datashow.params.ext_info,function(keyparam,valueparam){
                                                    if (keyparam == valuechild.id && valuechild.is_slug_override == 1){

                                                        htmlchild += '<div class="row marginauto add-child">';
                                                        htmlchild += '<div class="col-md-12 left-right body-title-detail-span-ct"><span>' + valuechild.title + '</span></div>';
                                                        htmlchild += '<div class="col-md-12 left-right body-title-detail-select-ct email-success-nick">';
                                                        htmlchild += '<input readonly autocomplete="off" placeholder="'+ valueparam +'" class="input-defautf-ct" type="text" value="'+ valueparam +'">';
                                                        htmlchild += '</div>';
                                                        htmlchild += '</div>';

                                                    }
                                                })
                                            }

                                        })
                                    }
                                }

                            })
                        }

                        $('.add-child').html('');
                        $('.add-child').html(htmlchild);

                        //Thông tin bổ xung

                        var htmlboxung = '';

                        if (data.datashow == null || data.datashow == '' || data.datashow == undefined || data.datashow.idkey == null || data.datashow.idkey == '' || data.datashow.idkey == undefined){}else {
                            htmlboxung += '<div class="row marginauto add-child">';
                            htmlboxung += '<div class="col-md-12 left-right body-title-detail-span-ct"><span>T.tin bổ sung:</span></div>';
                            htmlboxung += '<div class="col-md-12 left-right body-title-detail-select-ct email-success-nick">';
                            htmlboxung += '<input readonly autocomplete="off" placeholder="Thông tin bổ sung" class="input-defautf-ct" type="text" value="' + data.datashow.idkey + '">';
                            htmlboxung += '</div>';
                            htmlboxung += '</div>';
                        }

                        $('.data-ttbxung').html('');
                        $('.data-ttbxung').html(htmlboxung);

                        tippy('#getShowpass', {
                            // default
                            trigger: 'click',
                            content: "Đã lấy mật khẩu!",
                            placement: 'right',
                        });

                        tippy('#getCopypass', {
                            // default
                            trigger: 'click',
                            content: "Đã copy mật khẩu!",
                            placement: 'right',
                        });

                        tippy('#getCopyemail', {
                            // default
                            trigger: 'click',
                            content: "Đã copy email!",
                            placement: 'right',
                        });

                        $('#showPassword .getCopypass').on('click', function(){


                            // Get the password field
                            var passwordField = $('#password');

                            // Get the current type of the password field will be password or text
                            var passwordFieldType = passwordField.attr('type');

                            // Check to see if the type is a password field
                            if(passwordFieldType == 'password')
                            {
                                // Change the password field to text
                                passwordField.attr('type', 'text');

                                var htmlpass = '';
                                htmlpass += '<img class="lazy img-show-password" src="/assets/frontend/theme_3/image/cay-thue/eyeshow.png" alt="">';
                                $('.getCopypass').html('');
                                $('.getCopypass').html(htmlpass);

                                // Change the Text on the show password button to Hide
                                $(this).val('Hide');
                            } else {
                                var htmlpass = '';
                                htmlpass += '<img class="lazy img-show-password" src="/assets/frontend/theme_3/image/cay-thue/eyehide.png" alt="">';
                                $('.getCopypass').html('');
                                $('.getCopypass').html(htmlpass);

                                // If the password field type is not a password field then set it to password
                                passwordField.attr('type', 'password');

                                // Change the value of the show password button to Show
                                $(this).val('Show');
                            }
                        });

                        $('#getCopyemail').on('click', function(){
                            var copyText = $('#email').val();

                            navigator.clipboard.writeText(copyText);
                        });

                        $('#getCopypass').on('click', function(){
                            var copyText = $('#password').val();

                            navigator.clipboard.writeText(copyText);
                        });

                    }else {
                        $("#data_pay_account_history").empty().html('');
                        $("#data_pay_account_history").empty().html(data.html);
                    }

                    $('.loading-data__timkiem').html('');
                    $('.loading-data__all').html('');
                }else if (data.status == 0){
                    var html = '';
                    html += '<div class="table-responsive" id="tableacchstory">';
                    html += '<table class="table table-hover table-custom-res">';
                    html += '<thead><tr><th>Thời gian</th><th>ID</th><th style="width: 30%">Game</th><th>Tài Khoản</th><th style="width: 20%">Trị giá</th><th>Trạng thái</th><th>Thao tác</th></tr></thead>';
                    html += '<tbody>';
                    html += '<tr style="width: 100%" id="table-notdata"><td colspan="7"><span>Tài khoản của quý khách chưa phát sinh giao dịch</span></td></tr>';
                    html += '</tbody>';
                    html += '</table>';
                    html += '</div>';

                    $("#data_pay_account_history").empty().html('');
                    $("#data_pay_account_history").empty().html(html);

                    $('.loading-data__timkiem').html('');
                    $('.loading-data__all').html('');
                }

                $('#data_pay_account_history .default-paginate').removeClass('default-paginate-addpadding');

                $('#data_pay_account_history .table-logs').addClass('table-responsive');
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

    $('body').on('click','#getpass',function(e){
        e.preventDefault();

        var id = $(this).data('id');
        var slug = $(this).data('slug');

        getShowPass(id,slug)
    });

    function getShowPass(id,slug) {

        request = $.ajax({
            type: 'GET',
            url: '/lich-su-mua-account/showpass',
            data: {
                id:id,
                slug:slug,
            },
            beforeSend: function (xhr) {

            },
            success: (data) => {

                if (data.status == 1){
                    if (data.data.success == 1){

                        //Mạt khẩu

                        var htmlpass = '';

                        htmlpass += '<input id="password" readonly autocomplete="off" class="input-defautf-ct" type="password" value="' + data.key + '" placeholder="Mật khẩu">';
                        htmlpass += '<img class="lazy img-copy" src="/assets/frontend/theme_3/image/nick/copy.png" alt="" id="getCopypass">';
                        htmlpass += '<div class="getCopypass">';
                        htmlpass += '<img class="lazy img-show-password" src="/assets/frontend/theme_3/image/cay-thue/eyehide.png" alt="">';
                        htmlpass += '</div>';


                        $('#showPassword .data-password').html('');
                        $('#showPassword .data-password').html(htmlpass);

                        //thời gian.
                        var htmltg = '';

                        htmltg += '<small>';
                        htmltg += 'Đã lấy mật khẩu lúc: ' + data.time;
                        htmltg += '</small>';

                        $('#showPassword .data-time').html('');
                        $('#showPassword .data-time').html(htmltg);

                        var key = data.key;

                        navigator.clipboard.writeText(key);

                        tippy('#getShowpass', {
                            // default
                            trigger: 'click',
                            content: "Đã lấy mật khẩu!",
                            placement: 'right',
                        });

                        tippy('#getCopypass', {
                            // default
                            trigger: 'click',
                            content: "Đã copy mật khẩu!",
                            placement: 'right',
                        });

                        tippy('#getCopyemail', {
                            // default
                            trigger: 'click',
                            content: "Đã copy email!",
                            placement: 'right',
                        });

                        $('#showPassword .getCopypass').on('click', function(){


                            // Get the password field
                            var passwordField = $('#password');

                            // Get the current type of the password field will be password or text
                            var passwordFieldType = passwordField.attr('type');

                            // Check to see if the type is a password field
                            if(passwordFieldType == 'password')
                            {
                                // Change the password field to text
                                passwordField.attr('type', 'text');

                                var htmlpass = '';
                                htmlpass += '<img class="lazy img-show-password" src="/assets/frontend/theme_3/image/cay-thue/eyeshow.png" alt="">';
                                $('.getCopypass').html('');
                                $('.getCopypass').html(htmlpass);

                                // Change the Text on the show password button to Hide
                                $(this).val('Hide');
                            } else {
                                var htmlpass = '';
                                htmlpass += '<img class="lazy img-show-password" src="/assets/frontend/theme_3/image/cay-thue/eyehide.png" alt="">';
                                $('.getCopypass').html('');
                                $('.getCopypass').html(htmlpass);

                                // If the password field type is not a password field then set it to password
                                passwordField.attr('type', 'password');

                                // Change the value of the show password button to Show
                                $(this).val('Show');
                            }
                        });

                        $('#getCopyemail').on('click', function(){
                            var copyText = $('#email').val();

                            navigator.clipboard.writeText(copyText);
                        });

                        $('#getCopypass').on('click', function(){
                            var copyText = $('#password').val();

                            navigator.clipboard.writeText(copyText);
                        });


                    }
                }else if (data.status == 0){

                }
            },
            error: function (data) {

            },
            complete: function (data) {

            }
        });
    }

})
