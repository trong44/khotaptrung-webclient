$(document).ready(function () {
    getShowAccRandomDetail()

    function getShowAccRandomDetail() {

        var url = '/ajax/mua-nick-random';
        request = $.ajax({
            type: 'GET',
            url: url,
            data: {
            },
            beforeSend: function (xhr) {

            },
            success: (data) => {

                if (data.status == 1){

                    $('#nick-random-home-data').html('');
                    $('#nick-random-home-data').html(data.data);

                    $('#nick-random-home .loading-wrap').remove();
                    $('#nick-random-home').removeClass('is-load');

                    initSwiperConfigAccGame()

                }else if (data.status == 0){

                    var html = '';
                    html += '<div class="row pb-3 pt-3"><div class="col-md-12 text-center"><span style="color: red;font-size: 16px;">' + data.message + '</span></div></div>';

                    $('#nick-random-home-data').html('');
                    $('#nick-random-home-data').html(html);

                }

            },
            error: function (data) {

            },
            complete: function (data) {

            }
        });
    }
})
