$(document).ready(function () {

    var slug = $('.slug').val();

    getShowMinigameDetail(slug)

    function getShowMinigameDetail(slug) {

        var url = '/minigame-' + slug + '';
        request = $.ajax({
            type: 'GET',
            url: url,
            data: {

            },
            beforeSend: function (xhr) {

            },
            success: (data) => {
                if (data.status == 1) {

                    $('#data_rotation-detail').html('');
                    $('#data_rotation-detail').html(data.data);
                    $('#data_rotation-detail').removeClass('minigame-add-heard');

                    $('.data_number_item').html('');
                    $('.data_number_item').html(data.data_item);


                } else if (data.status == 0) {

                    var html = '';
                    html += '<div class="row pb-3 pt-3"><div class="col-md-12 text-center"><span style="color: red;font-size: 16px;">' + data.message + '</span></div></div>';

                    $('#data_rotation-detail').html('');
                    $('#data_rotation-detail').html(html);

                }

            },
            error: function (data) {

            },
            complete: function (data) {

            }
        });
    }

})
