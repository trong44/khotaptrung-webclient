$(document).ready(function(){
    let page = $('.hidden_page').val();
    const media = "https://media-tt.nick.vn";

    $(document).on('click', '.paginate__v1_index .pagination a',function(event){
        event.preventDefault();

        var page = $(this).attr('href').split('page=')[1];

        $('.hidden_page').val(page);

        $('li').removeClass('active');
        $(this).parent().addClass('active');

        var querry = $('.input-news').val();
        var slug = $('.slug-article').val();

        loadData(page,querry,slug)
    });

    function loadData(page,querry,slug) {

        if (slug == null || slug == undefined || slug == ''){
            var slug_category = $('.slug-article').val();

            slug = slug_category;
        }

        if (slug == undefined || slug == null || slug == ''){
            var url = '/tin-tuc/data';
        }else {
            var url = '/tin-tuc/'+ slug +'/data';
        }

        request = $.ajax({
            type: 'GET',
            url: url,
            data: {
                page:page,
                querry:querry,
                slug:slug,
            },
            beforeSend: function (xhr) {
                $('#loading-item').removeClass('hide');
            },
            success: (data) => {
                $(".article_data").empty().html('');
                $(".article_data").empty().html(data);
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

        $('.hidden_page').val(1);
        page = $('.hidden_page').val();

        if (querry == '' || querry == undefined || querry == null){
            return false;
        }

        var slug = $('.slug-article').val();

        loadData(page,querry,slug)
    })

});