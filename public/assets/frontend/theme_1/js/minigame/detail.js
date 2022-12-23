$(document).ready(function () {

    var module = $('.module').val();
    var id_group = $('.id_group').val();
    var slug = $('.slug').val();

    getShowMinigameDetail(id_group,module,slug)

    function getShowMinigameDetail(id_group,module,slug) {

        var url = '/minigame-' + slug + '';
        request = $.ajax({
            type: 'GET',
            url: url,
            data: {
                id_group:id_group,
                module:module,
            },
            beforeSend: function (xhr) {

            },
            success: (data) => {

                if (data.status == 1) {

                    $('.data_minigame_detail').html('');
                    $('.data_minigame_detail').html(data.data);

                } else if (data.status == 0) {

                    var html = '';
                    html += '<div class="row pb-3 pt-3"><div class="col-md-12 text-center"><span style="color: red;font-size: 16px;">' + data.message + '</span></div></div>';

                    $('.data_minigame_detail').html('');
                    $('.data_minigame_detail').html(html);

                }

            },
            error: function (data) {

            },
            complete: function (data) {

            }
        });
    }
})
