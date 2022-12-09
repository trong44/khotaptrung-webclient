$(document).ready(function(){
    const csrf_token = $('meta[name="csrf-token"]').attr('content');
    const token =  $('meta[name="jwt"]').attr('content');
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

    $(document).on('submit', '.form-charge__accountls', function(e){
        e.preventDefault();

        var htmlloading = '';

        htmlloading += '<div class="loading"></div>';
        $('.loading-data__timkiem').html('');
        $('.loading-data__timkiem').html(htmlloading);

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
        var sort_by_data = $('.sort_by_data').val();
        var page = $('#hidden_page_service').val();
        var chitiet_data = $('.chitiet_data').val();
        var id_data = $('.id_data').val();

        loadDataAccountList(page,serial_data,key_data,price_data,status_data,started_at_data,ended_at_data,sort_by_data,chitiet_data,id_data)

    });

    $('body').on('click','.btn-all',function(e){
        e.preventDefault();
        var htmlloading = '';

        htmlloading += '<div class="loading"></div>';
        $('.loading-data__all').html('');
        $('.loading-data__all').html(htmlloading);

        $('.serial_data').val('');
        $('.key_data').val('');
        $('.price_data').val('');
        $('.status_data').val('');
        $('.started_at_data').val('');
        $('.ended_at_data').val('');

        var serial_data = $('.serial_data').val();
        var key_data = $('.key_data').val();
        var price_data = $('.price_data').val();
        var status_data = $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data = $('.ended_at_data').val();
        var sort_by_data = $('.sort_by_data').val();
        var chitiet_data = $('.chitiet_data').val();
        var page = $('#hidden_page_service').val();
        var id_data = $('.id_data').val();

        loadDataAccountList(page,serial_data,key_data,price_data,status_data,started_at_data,ended_at_data,sort_by_data,chitiet_data,id_data)

    });

    $('body').on('change','.sort_by',function(e){
        e.preventDefault();
        var serial_data = $('.serial_data').val();
        var key_data = $('.key_data').val();
        var price_data = $('.price_data').val();
        var status_data = $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data = $('.ended_at_data').val();

        var sort_by = $('.sort_by').val();
        $('.sort_by_data').val(sort_by);
        var sort_by_data = $('.sort_by_data').val();
        var chitiet_data = $('.chitiet_data').val();
        var page = $('#hidden_page_service').val();
        var id_data = $('.id_data').val();

        loadDataAccountList(page,serial_data,key_data,price_data,status_data,started_at_data,ended_at_data,sort_by_data,chitiet_data,id_data)

    });

    $('body').on('click','.show_chitiet',function(e){
        e.preventDefault();

        $('.chitiet_data').val(1);
        var chitiet_data = $('.chitiet_data').val();
        var id = $(this).data('id');
        $('.id_data').val(id);
        var id_data = $('.id_data').val();
        var serial_data = $('.serial_data').val();
        var key_data = $('.key_data').val();
        var price_data = $('.price_data').val();
        var status_data = $('.status_data').val();
        var started_at_data = $('.started_at_data').val();
        var ended_at_data = $('.ended_at_data').val();
        var sort_by_data = $('.sort_by_data').val();
        var page = $('#hidden_page_service').val();

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
                if (data.status == 1){

                    $(".booking_detail")[0].scrollIntoView();

                    if (data.chitiet_data == 1){
                        $('#taikhoandamua_password').modal('show');

                        var html = '';
                        html += '<div class="form-group m-t-10 row">';
                        html += '<label class="col-md-3 control-label"><b>Tài khoản:</b></label>';
                        html += '<div class="col-md-6">';
                        html += '<div class="input-group c-square">';
                        html += '<input class="form-control c-square c-theme" type="text" placeholder="Tài khoản taikhoan" id="taikhoan" readonly value="' + data.datashow.title + '">';
                        html += '<span class="input-group-btn">';

                        html += '<button class="btn btn-default c-font-dark copy_acc" type="button" onclick="myFunctiontk()" id="getpasstk">Copy</button>';
                        html += '</span>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';

                        html += '<div class="form-group m-t-10 row">';
                        html += '<label class="col-md-3 control-label"><b>Mật khẩu:</b></label>';
                        html += '<div class="col-md-6">';
                        html += '<div class="input-group c-square data__showpassword" style="margin-bottom: 4px" >';
                        if (data.time == null || data.time == '' || data.time == undefined){
                            html += '<input type="password" class="form-control c-square c-theme show_password" name="password" id="password" placeholder="Mật khẩu" readonly value="********" >';
                        }else {
                            html += '<input type="password" class="form-control c-square c-theme show_password" name="password" id="password" placeholder="Mật khẩu" readonly value="' + data.key + '" >';
                        }
                        if (data.time == null || data.time == '' || data.time == undefined){

                        }else {
                            html += '<span class="show-btn show-btn-password hide-btn"><i class="fas fa-eye fa-eye-password"></i></span>';
                        }

                        html += '<span class="input-group-btn">';
                        if (data.time == null || data.time == '' || data.time == undefined){
                            html += '<button class="btn btn-default c-font-dark copy_acc" type="button" id="getShowpass" data-slug="' + data.slugen + '" data-id="' + data.datashow.id + '">Copy</button>';
                        }else {
                            html += '<button class="btn btn-default c-font-dark copy_acc" type="button" onclick="myFunction()" id="getpass">Copy</button>';
                        }
                        html += '</span>';
                        html += '</div>';
                        html += '<span class="help-block" style="font-size: 14px">Click vào nút copy để sao chép mật khẩu.</span>';
                        html += '<span class="help-block" style="font-size: 14px">Hoặc vào icon để thấy mật khẩu.</span>';
                        html += '</div>';
                        html += '</div>';
                        if (data.count > 0){
                            $.each(data.dataAttribute,function(key,value){

                                if(value.position == 'text'){
                                    if (value.childs.length > 0){
                                        $.each(value.childs,function(keychild,valuechild){
                                            if (data.datashow.params == null || data.datashow.params == undefined || data.datashow.params == ''){}else {
                                                $.each(data.datashow.params.ext_info,function(keyparam,valueparam){
                                                    if (keyparam == valuechild.id && valuechild.is_slug_override == 1){
                                                        html += '<div class="form-group m-t-10 row">';
                                                        html += '<label class="col-md-3 control-label">';
                                                        html += '<b>';
                                                        html += valuechild.title;
                                                        html += '</b>';
                                                        html += '</label>';
                                                        html += '<div class="col-md-6">';
                                                        html += '<input class="form-control c-square c-theme" type="text" placeholder="'+ valueparam +'" readonly value="'+ valueparam +'">';
                                                        html += '</div>';
                                                        html += '</div>';
                                                    }
                                                })
                                            }

                                        })
                                    }
                                }

                            })
                        }
                        //
                        if (data.datashow == null || data.datashow == '' || data.datashow == undefined || data.datashow.idkey == null || data.datashow.idkey == '' || data.datashow.idkey == undefined){}else {
                            html += '<div class="form-group m-t-10 row">';
                            html += '<label class="col-md-3 control-label"><b>T.tin bổ sung:</b></label>';
                            html += '<div class="col-md-6">';
                            html += '<textarea rows="4" class="form-control c-square c-theme" type="text" placeholder="Thông tin bổ sung" readonly="" >' + data.datashow.idkey + '</textarea>';
                            html += '</div>';
                            html += '</div>';
                        }

                        html += '<p class="c-font-bold c-font-blue data__timeshowpass" style="font-size: 14px;font-weight: bold;color: #32c5d2;">';
                        if (data.time == null || data.time == '' || data.time == undefined){

                        }else {
                            html += 'Đã lấy mật khẩu lần đầu tiên lúc: ' + data.time + '';
                        }

                        html += '</p>';

                        html += '<div class="alert alert-info c-font-dark" style="background: rgb(47, 106, 124)">';
                        html += 'Sau khi nhận tài khoản mật khẩu bạn hãy thực hiện đổi mật khẩu để bảo mật.';
                        html += '<br>';
                        html += 'Bạn hãy click truy cập đường dẫn sau để chuyển qua trang đổi mật khẩu.';
                        html += '<br>';
                        html += '<a class="c-font-bold c-font-red" target="_blank" href="#" style="color: red;font-weight: bold">';
                        html += 'Đăng nhập và Đổi mật khẩu game ' + data.datashow.category.title + ' Giá Rẻ';
                        html += '</a>';
                        html += '</div>';
                        $('.form__show__chitiet').html(html);

                    }

                    $("#data_pay_account_history").empty().html('');
                    $("#data_pay_account_history").empty().html(data.html);

                    $('.loading-data__timkiem').html('');
                    $('.loading-data__all').html('');
                }else if (data.status == 0){
                    var html = '';
                    html += '<div class="table-responsive" id="tableacchstory">';
                        html += '<table class="table table-hover table-custom-res">';
                            html += '<thead><tr><th>Thời gian</th><th>ID</th><th>Game</th><th>Tài khoản</th><th>Trị giá</th><th>Trạng thái</th><th>Thao tác</th></tr></thead>';
                            html += '<tbody>';
                                html += '<tr><td colspan="8"><span style="color: red;font-size: 16px;">' + data.message + '</span></td></tr>';
                            html += '</tbody>';
                        html += '</table>';
                    html += '</div>';

                    $("#data_pay_account_history").empty().html('');
                    $("#data_pay_account_history").empty().html(html);

                    $('.loading-data__timkiem').html('');
                    $('.loading-data__all').html('');
                }
            },
            error: function (data) {

            },
            complete: function (data) {

            }
        });
    }

    $('body').on('click','#getShowpass',function(e){
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

                        var html ='';
                        html += '<input type="password" class="form-control c-square c-theme show_password" name="password" id="password" placeholder="Mật khẩu" readonly value="' + data.key + '" >';

                        html += '<span class="show-btn show-btn-password hide-btn"><i class="fas fa-eye fa-eye-password"></i></span>';
                        html += '<span class="input-group-btn">';
                        html += '<button class="btn btn-default c-font-dark copy_acc" type="button" onclick="myFunction()" id="getpass">Copy</button>';
                        html += '</span>';
                        html += '</div>';


                        $('#taikhoandamua_password .data__showpassword').html('');
                        $('#taikhoandamua_password .data__showpassword').html(html);

                        var htmltime = '';
                        htmltime += 'Đã lấy mật khẩu lần đầu tiên lúc: ' + data.time + '';

                        $('#taikhoandamua_password .data__timeshowpass').html('');
                        $('#taikhoandamua_password .data__timeshowpass').html(htmltime);
                        var key = data.key;

                        navigator.clipboard.writeText(key);

                        // Click event of the showPassword button
                        $('.show-btn-password').on('click', function(){

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
                                htmlpass += '<i class="fas fa-eye-slash fa-eye-slash-password"></i>';
                                $('.show-btn-password').html('');
                                $('.show-btn-password').html(htmlpass);

                                // Change the Text on the show password button to Hide
                                $(this).val('Hide');
                            } else {
                                var htmlpass = '';
                                htmlpass += '<i class="fas fa-eye fa-eye-password"></i>';
                                $('.show-btn-password').html('');
                                $('.show-btn-password').html(htmlpass);

                                // If the password field type is not a password field then set it to password
                                passwordField.attr('type', 'password');

                                // Change the value of the show password button to Show
                                $(this).val('Show');
                            }
                        });

                        // Click event of the showPassword button
                        $('.show-btn-idkey').on('click', function(){

                            // Get the password field
                            var passwordField = $('#idkey');

                            // Get the current type of the password field will be password or text
                            var passwordFieldType = passwordField.attr('type');

                            // Check to see if the type is a password field
                            if(passwordFieldType == 'password')
                            {
                                // Change the password field to text
                                passwordField.attr('type', 'text');

                                var htmlpass = '';
                                htmlpass += '<i class="fas fa-eye-slash fa-eye-slash-idkey"></i>';
                                $('.show-btn-idkey').html('');
                                $('.show-btn-idkey').html(htmlpass);

                                // Change the Text on the show password button to Hide
                                $(this).val('Hide');
                            } else {
                                var htmlpass = '';
                                htmlpass += '<i class="fas fa-eye fa-eye-idkey"></i>';
                                $('.show-btn-idkey').html('');
                                $('.show-btn-idkey').html(htmlpass);

                                // If the password field type is not a password field then set it to password
                                passwordField.attr('type', 'password');

                                // Change the value of the show password button to Show
                                $(this).val('Show');
                            }
                        });

                        tippy('#getShowpass', {
                            // default
                            trigger: 'click',
                            content: "Đã lấy mật khẩu!",
                            placement: 'right',
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
