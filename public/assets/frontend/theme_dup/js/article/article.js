$(document).ready(function(){


    $('.btn-article').click(function (e) {
        e.preventDefault();
        var querry = $('.input-article').val();

        window.location.href = '/tin-tuc?page=1&querry=' + querry + '';
    })


});
