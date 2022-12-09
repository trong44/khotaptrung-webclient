$(document).ready(function(){

    let page = $('#hidden_page_service').val();
    let loadingHtml = $("<div />").append($(".body-box-loadding.result-amount-loadding").first().clone()).html();

    $(document).on('click', '.paginate__v1 .pagination a',function(event){
        event.preventDefault();

        var page = $(this).attr('href').split('page=')[1];

        $('#hidden_page_service').val(page);

        $('li').removeClass('active');
        $(this).parent().addClass('active');

        var id_data = $('.id_data').val();
        var title_data = $('.title_data').val();
        var price_data = $('.price_data').val();
        var status_data = $('.status_data').val();
        var select_data = $('.select_data').val();
        var sort_by_data = $('.sort_by_data').val();

        //LM

        var champions_data = $('.champions_data').val();
        var skill_data = $('.skill_data').val();
        var tftcompanions_data = $('.tftcompanions_data').val();
        var tftdamageskins_data = $('.tftdamageskins_data').val();
        var tftmapskins_data = $('.tftmapskins_data').val();

        loadDataAccountList(page,id_data,title_data,price_data,status_data,select_data,sort_by_data,champions_data,skill_data,tftcompanions_data,tftdamageskins_data,tftmapskins_data)
    });

    loadDataAccountList();

    function loadDataAccountList(page,id_data = '',title_data = '',price_data = '',status_data = '',select_data = '',sort_by_data = '',champions_data = '',skill_data = '',tftcompanions_data = '',tftdamageskins_data = '',tftmapskins_data = '') {

        let slug = $('.slug').val();

        var url = '/mua-acc/' + slug;

        if (page == null || page == '' || page == undefined){
            page = 1;
        }
        // alert(url)
        request = $.ajax({
            type: 'GET',
            url: url,
            data: {
                page:page,
                id_data:id_data,
                title_data:title_data,
                price_data:price_data,
                status_data:status_data,
                select_data:select_data,
                sort_by_data:sort_by_data,
                champions_data:champions_data,
                skill_data:skill_data,
                tftcompanions_data:tftcompanions_data,
                tftdamageskins_data:tftdamageskins_data,
                tftmapskins_data:tftmapskins_data
            },
            beforeSend: function (xhr) {
                $("#account_data").empty();
                $("#account_data").html(loadingHtml);
            },
            success: (data) => {
                $('.loading').css('display','none');

                if (data.status == 0){

                    var html = '';
                    html += '<div class="row pb-3 pt-3"><div class="col-md-12 text-center"><span style="color: red;font-size: 16px;">' + data.message + '</span></div></div>';

                    $("#account_data").html(html);

                }else if (data.status == 1){
                    
                    $("#account_data").html(data.data);
                }
                
            },
            error: function (data) {
                
            },
            complete: function (data) {
                $(".booking_detail")[0].scrollIntoView();
            }
        });
    }

    $(document).on('submit', '.form-group__accountlist', function(e){
        e.preventDefault();

        var id = $('.id').val();
        var title = $('.title').val();
        var price = $('.price').val();
        var status = $('.status').val();

        var itemselect = '';
        $('.select').each(function (idx, elm) {
            if (itemselect != '') {
                itemselect += '|';
            }

            itemselect += $(elm).val();
        })
        if (id == null || id == undefined || id == ''){
            $('.id_data').val('');
        }else {
            $('.id_data').val(id);
        }

        if (title == null || title == undefined || title == ''){
            $('.title_data').val('');
        }else {
            $('.title_data').val(title);
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

        if (itemselect == null || itemselect == undefined || itemselect == ''){
            $('.select_data').val('');
        }else {
            $('.select_data').val(itemselect);
        }

        //lm
        var champions = $('.champions').val();
        var skill = $('.skill').val();
        var tftcompanions = $('.tftcompanions').val();
        var tftdamageskins = $('.tftdamageskins').val();
        var tftmapskins = $('.tftmapskins').val();

        if (champions == null || champions == undefined || champions == ''){
            $('.champions_data').val('');
        }else {
            $('.champions_data').val(champions);
        }

        if (skill == null || skill == undefined || skill == ''){
            $('.skill_data').val('');
        }else {
            $('.skill_data').val(skill);
        }

        if (tftcompanions == null || tftcompanions == undefined || tftcompanions == ''){
            $('.tftcompanions_data').val('');
        }else {
            $('.tftcompanions_data').val(tftcompanions);
        }

        if (tftdamageskins == null || tftdamageskins == undefined || tftdamageskins == ''){
            $('.tftdamageskins_data').val('');
        }else {
            $('.tftdamageskins_data').val(tftdamageskins);
        }

        if (tftmapskins == null || tftmapskins == undefined || tftmapskins == ''){
            $('.tftmapskins_data').val('');
        }else {
            $('.tftmapskins_data').val(tftmapskins);
        }


        var id_data = $('.id_data').val();
        var title_data = $('.title_data').val();
        var price_data = $('.price_data').val();
        var status_data = $('.status_data').val();
        var select_data = $('.select_data').val();
        var sort_by_data = $('.sort_by_data').val();

        var champions_data = $('.champions_data').val();
        var skill_data = $('.skill_data').val();
        var tftcompanions_data = $('.tftcompanions_data').val();
        var tftdamageskins_data = $('.tftdamageskins_data').val();
        var tftmapskins_data = $('.tftmapskins_data').val();


        $('#hidden_page_service').val(1);
        var page = $('#hidden_page_service').val();

        loadDataAccountList(page,id_data,title_data,price_data,status_data,select_data,sort_by_data,champions_data,skill_data,tftcompanions_data,tftdamageskins_data,tftmapskins_data);

    });

    $('body').on('click','.btn-all',function(e){
        e.preventDefault();

        let page = 1;

        loadDataAccountList(page);

    });

    // Buy nick Random JS
    $(document).on('click', '.buyacc',function(e){
        e.preventDefault();

        var id = $(this).data("id");

        var html = $('.formDonhangAccount' + id + '').html();
        $('.data__form__random').html('');
        $('.data__form__random').html(html);

        $('.loadModal__acount').modal('toggle');
        $('.loading-data__buyacc').html('');
        // getBuyAcc(id)
    });

    $(document).on('submit', '#LoadModal .formDonhangAccount', function(e){
        e.preventDefault();
        var htmlloading = '';

        htmlloading += '<div class="loading"></div>';
        $('.loading-data__muangay').html('');
        $('.loading-data__muangay').html(htmlloading);

        var formSubmit = $(this);
        var url = formSubmit.attr('action');
        let accRanId = formSubmit.data('ranid');
        var btnSubmit = formSubmit.find(':submit');
        btnSubmit.prop('disabled', true);
        $('.loginBox__layma__button__displayabs').prop('disabled', true);

        $.ajax({
            type: "POST",
            url: url,
            data: formSubmit.serialize(), // serializes the form's elements.
            beforeSend: function (xhr) {

            },
            success: function (response) {

                $('.data__form__random').html('');

                if(response.status == 1){
                    $('.loadModal__acount').modal('hide');
                    $('#nickIdInput').val(accRanId);
                    $('#successModal').modal('show');
                }
                else if (response.status == 2){
                    $('.loadModal__acount').modal('hide');

                    swal(
                        'Thông báo!',
                        response.message,
                        'warning'
                    )
                    $('.loginBox__layma__button__displayabs').prop('disabled', false);
                }else {
                    $('.loadModal__acount').modal('hide');
                    swal(
                        'Lỗi!',
                        response.message,
                        'error'
                    )
                    $('.loginBox__layma__button__displayabs').prop('disabled', false);
                }
                $('.loading-data__muangay').html('');
            },
            error: function (response) {
                
            },
            complete: function (data) {
                btnSubmit.prop('disabled', false);
            }
        })


    });

    $('#successModal').on('hidden.bs.modal', function () {
        location.reload();
    });

})
