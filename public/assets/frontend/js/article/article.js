$(document).ready(function(){
    let page = $('#hidden_page').val();
    let append = $('#append-article').val();
    let is_over = false;
    let not_loaded = true;
    const media = "https://media-tt.nick.vn";
    loadData();
    $(window).scroll(function () {
        if ($(window).scrollTop() == $(document).height() - $(window).height() && !is_over && not_loaded) {
            page++;
            not_loaded = false;
            $('.hidden_page').val(page);
            var querry = $('.input-news').val();
            $('#append-article').val(1);
            append = $('#append-article').val();
            var slug = $('#slug-article').val();
            loadData(page,querry,append,slug)
        }
    })

    function loadData(page,querry, append = false,slug) {

        request = $.ajax({
            type: 'GET',
            url: '/tin-tuc/data',
            data: {
                page:page,
                append:append,
                querry:querry,
                slug:slug,
            },
            beforeSend: function (xhr) {
                $('#loading-item').removeClass('hide');
            },
            success: (data) => {

                let html = "";

                if (data.is_over){
                    is_over = true;
                } else {
                    if (data.append == 0){

                        data.data.forEach(function (data) {
                            html += '<div class="news_content_list_item">';
                                html += '<div class="news_content_list_image">';
                                    html += '<a href="/tin-tuc/' + data.slug + '">';
                                        html += '<img src="'+media+data.image+'" alt="">';
                                    html += '</a>';
                                html += '</div>';

                                html += '<div class="news_content_list_info">';
                                    html += '<div class="news_content_list_title">';
                                        html += '<a href="/tin-tuc/' + data.slug + '">'+ data.title +'</a>';
                                    html += '</div>';

                                    html += '<div class="news_content_list_date">';
                                        html += '<div>';
                                            html += '<i class="fas fa-calendar-alt"></i> ' + new Date(data.created_at).toLocaleDateString() +'';
                                        html += '</div>';
                                        html += '<div>';
                                            html += '<i class="fas fa-newspaper"></i><a href=""> ' + data.groups[0].title + ' </a>';
                                        html += '</div>';
                                    html += '</div>';

                                    html += '<div class="news_content_list_decription">';
                                        html += data.description;
                                    html += '</div>';
                                html += '</div>';
                            html += '</div>';
                        });
                        $('#article_data').html('');
                        $('#article_data').html(html);
                    }
                    else {
                        data.data.forEach(function (data) {
                            html += '<div class="news_content_list_item">';
                                html += '<div class="news_content_list_image">';
                                    html += '<a href="/tin-tuc/' + data.slug + '">';
                                        html += '<img src="'+media+data.image+'" alt="">';
                                    html += '</a>';
                            html += '</div>';

                            html += '<div class="news_content_list_info">';
                            html += '<div class="news_content_list_title">';
                            html += '<a href="/tin-tuc/' + data.slug + '">'+ data.title +'</a>';
                            html += '</div>';

                            html += '<div class="news_content_list_date">';
                            html += '<div>';
                            html += '<i class="fas fa-calendar-alt"></i> ' + new Date(data.created_at).toLocaleDateString() +'';
                            html += '</div>';
                            html += '<div>';
                            html += '<i class="fas fa-newspaper"></i><a href=""> ' + data.groups[0].title + ' </a>';
                            html += '</div>';
                            html += '</div>';

                            html += '<div class="news_content_list_decription">';
                            html += data.description;
                            html += '</div>';

                            html += '</div>';
                            html += '</div>';
                        });
                        $('#article_data').append(html);
                        append = false;

                    }

                    not_loaded = true;
                }

            },
            error: function (data) {

            },
            complete: function (data) {
                $('#loading-item').addClass('hide')
            }
        });
    }

    $('.btn-news').click(function (e) {
        e.preventDefault();
        var querry = $('.input-news').val();

        $('#append-article').val(0);
        append = $('#append-article').val();

        $('#hidden_page').val(1);
        page = $('#hidden_page').val();

        if (querry == '' || querry == undefined || querry == null){
            return false;
        }
        is_over = false;
        var slug = $('#slug-article').val();

        loadData(page,querry,append,slug)
    })


    $('.btn-tatca').click(function (e) {
        e.preventDefault();
        $('#append-article').val(0);
        append = $('#append-article').val();
        $('.input-news').val('');
        $('#hidden_page').val(1);
        page = $('#hidden_page').val();
        var querry = $('.input-news').val();
        is_over = false;
        $('#slug-article').val('');
        var slug = $('#slug-article').val();
        loadData(page,querry,append,slug);
    })

    $('body').on('click','.btn-slug',function(){

        var slug = $(this).data('slug');
        $('#slug-article').val(slug);
        $('.input-news').val('');
        var querry = $('.input-news').val();
        $('#append-article').val(0);
        append = $('#append-article').val();
        $('#hidden_page').val(1);
        page = $('#hidden_page').val();
        is_over = false;
        loadData(page,querry,append,slug);

    })
});