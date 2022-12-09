let elm_modal_spin_bonus = $('#data-ajax-render');
function getLogs(...query) {
    elm_modal_spin_bonus.toggleClass('is-loading',true);
    let data_query= {};
    data_query.type = query[0] || '';
    data_query.id = query[1] || '';
    data_query.gift_name = query[2] || '';
    data_query.started_at = query[3] || '';
    data_query.ended_at = query[4] || '';
    data_query.page = query[5] || '1';
    $.ajax({
        url:'/ajax-modal-logs-spin-bonus',
        type:'GET',
        data: data_query,
        success:function (res) {
            if (res.status){
                elm_modal_spin_bonus.html(res.html);
            }
        }
    }).done(function () {
        elm_modal_spin_bonus.toggleClass('is-loading',false);
    });
}

let minigame_id = elm_modal_spin_bonus.data('id');
getLogs('spin-bonus',minigame_id);

$('#modal-spin-bonus').on('change','[name="id"],[name="type"]',function (e) {
    e.preventDefault();
    let data_query = getQuerySpin();
    getLogs(...data_query);
});

$(document).on('click','#submit-filter-spin',function (e) {
    e.preventDefault();
    getLogs(...getQuerySpin())
})

elm_modal_spin_bonus.on('click','.page-link',function (e) {
    e.preventDefault();
    let data_query = getQuerySpin();
    const urlParams = new URLSearchParams($(this).attr('href'));
    let page = urlParams.get('page');
    getLogs(...data_query,page);
});
function getQuerySpin() {
    let type,id,gift_name,started_at,ended_at;
    type = $('#data-ajax-render [name="type"]').val();
    id = $('#data-ajax-render [name="id"]').val();
    gift_name = $('#data-ajax-render [name="gift_name"]').val();
    started_at = $('#data-ajax-render [name="started_at"]').val();
    ended_at = $('#data-ajax-render [name="ended_at"]').val();
    return [type,id,gift_name,started_at,ended_at];
}
