$(document).ready(function(){
    let page = $('#hidden_page_service').val();
    let append = $('#append-service').val();
    let is_over = false;
    let not_loaded = true;
    //let slug = $('#slug').val();
    const media = "https://media-tt.nick.vn";

    loadDataService();

    $(window).scroll(function () {

        if ($(window).scrollTop() == $(document).height() - $(window).height() && !is_over && not_loaded) {

            page++;
            not_loaded = false;
            $('#hidden_page_service').val(page);
            $('#append-service').val(1);
            append = $('#append-service').val();

            var querry = $('.input-article').val();

            if (querry == '' || querry == undefined || querry == null){
                querry = $('.input-article-mobile').val();
            }

            loadDataService(page,querry,append)
        }
    });

    function loadDataService(page,querry, append = false) {
        let slug = $('#slug').val();

        request = $.ajax({
            type: 'GET',
            url: '/dich-vu/'+ slug +'/data',
            data: {
                page:page,
                querry:querry,
                append:append,
            },
            beforeSend: function (xhr) {

            },
            success: (data) => {

                let html = "";

                if (data.is_over){
                    is_over = true;
                } else {
                    if (data.append == 0){
                        data.data.forEach(function (data) {
                            html += '<div class="col-6 col-sm-6 col-lg-3">';
                            html += '<div class="item_buy_list_in">';
                            html += '<div class="item_buy_list_img">';
                            html += '<a href="/dich-vu/' + data.slug + '">';
                            html += '<img class="item_buy_list_img-main" src="'+media+data.image+'" alt="">';
                            html += '</a>';
                            html += '</div>';

                            html += '<div class="item_buy_list_info">';
                            html += '<div class="row">';
                            html += '<div class="col-12 item_buy_list_info_in">';
                            html += '<span style="font-weight: bold;color: #f7b03c;font-size: 16px;">' + data.title + '</span>';
                            html += '</div>';

                            html += '<div class="col-12 item_buy_list_info_in">';
                            // html += '<span>Hỗ trợ dịch vụ:</span> 5';
                            html += '</div>';

                            html += '<div class="col-12 item_buy_list_info_in">';
                            // html += '<span>Giao dịch:</span> 19,878';
                            html += '</div>';

                            html += '</div>';
                            html += '</div>';

                            html += '<div class="item_buy_list_more">';
                            html += '<div class="row">';

                            html += '<a href="/dich-vu/' + data.slug + '" class="col-12">';
                            html += '<div class="item_buy_list_view">';
                            html += 'CHI TIẾT';
                            html += '</div>';
                            html += '</a>';
                            html += '</div>';
                            html += '</div>';
                            html += '</div>';
                            html += '</div>';
                        });
                        $('#showcategoryservice_data').html('');
                        $('#showcategoryservice_data').html(html);
                    }else {
                        data.data.forEach(function (data) {
                            html += '<div class="col-6 col-sm-6 col-lg-3">';
                            html += '<div class="item_buy_list_in">';
                            html += '<div class="item_buy_list_img">';
                            html += '<a href="/dich-vu/' + data.slug + '">';
                            html += '<img class="item_buy_list_img-main" src="'+media+data.image+'" alt="">';
                            html += '</a>';
                            html += '</div>';

                            html += '<div class="item_buy_list_info">';
                            html += '<div class="row">';
                            html += '<div class="col-12 item_buy_list_info_in">';
                            html += '<span style="font-weight: bold;color: #f7b03c;font-size: 16px;">' + data.title + '</span>';
                            html += '</div>';

                            html += '<div class="col-12 item_buy_list_info_in">';
                            // html += '<span>Hỗ trợ dịch vụ:</span> 5';
                            html += '</div>';

                            html += '<div class="col-12 item_buy_list_info_in">';
                            // html += '<span>Giao dịch:</span> 19,878';
                            html += '</div>';

                            html += '</div>';
                            html += '</div>';

                            html += '<div class="item_buy_list_more">';
                            html += '<div class="row">';

                            html += '<a href="/dich-vu/' + data.slug + '" class="col-12">';
                            html += '<div class="item_buy_list_view">';
                            html += 'CHI TIẾT';
                            html += '</div>';
                            html += '</a>';
                            html += '</div>';
                            html += '</div>';
                            html += '</div>';
                            html += '</div>';
                        });
                        $('#showcategoryservice_data').append(html);
                    }

                    not_loaded = true;
                }

                if ((data.data == '' || data.data == null) && is_over == false){

                    var htmld = '';
                    htmld += '<div class="row pb-3">';
                    htmld += '<div class="col-md-12 text-center">'
                    htmld += '<span style="color: red;font-size: 16px;">Hiện tại chưa có dịch vụ ! Hệ thống sẽ cập nhật dịch vụ thường xuyên bạn vui lòng theo dõi web trong thời gian tới !\n' +
                        '\n</span>';
                    htmld += '</div>';
                    htmld += '</div>';
                    $('#showcategoryservice_data').html('');
                    $('#showcategoryservice_data').html(htmld);
                }

            },
            error: function (data) {

            },
            complete: function (data) {

            }
        });
    }

    $('.btn-category-service').click(function (e) {
        e.preventDefault();
        var querry = $('.input-article').val();
        if (querry == '' || querry == undefined || querry == null){
            return false;
        }

        $('#append-service').val(0);
        append = $('#append-service').val();
        is_over = false;
        $('#hidden_page_service').val(1);
        page = $('#hidden_page_service').val();

        loadDataService(page,querry,append);
    })

    $('.btn-category-service-mobile').click(function (e) {
        e.preventDefault();
        var querry = $('.input-article-mobile').val();
        if (querry == '' || querry == undefined || querry == null){
            return false;
        }

        $('#append-service').val(0);
        append = $('#append-service').val();
        is_over = false;
        $('#hidden_page_service').val(1);
        page = $('#hidden_page_service').val();

        loadDataService(page,querry,append);
    })

    $('.btn-tatca').click(function (e) {
        e.preventDefault();
        $('#append-service').val(0);
        append = $('#append-service').val();
        is_over = false;
        $('#hidden_page_service').val(1);
        page = $('#hidden_page_service').val();
        $('.input-article').val('');
        var querry = $('.input-article').val();
        loadDataService(page,querry,append);
    })

    $('.btn-tatca-mobile').click(function (e) {
        e.preventDefault();
        $('#append-service').val(0);
        append = $('#append-service').val();
        is_over = false;
        $('#hidden_page_service').val(1);
        page = $('#hidden_page_service').val();
        $('.input-article-mobile').val('');
        var querry = $('.input-article-mobile').val();
        loadDataService(page,querry,append);
    })
})
