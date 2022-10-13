$(document).ready(function(){

    $('.btn-article').click(function (e) {
        e.preventDefault();
        var querry = $('.input-article').val();

        var slug = $('.slug-article').val();

        window.location.href = '/tin-tuc/' + slug + '?page=1&querry=' + querry + '';
    })

});
