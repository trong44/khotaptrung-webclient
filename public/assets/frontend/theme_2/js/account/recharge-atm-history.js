$(document).ready(function(){
    let page = $('#hidden_page_service_tranfer').val();
    const csrf_token = $('meta[name="csrf-token"]').attr('content');
    const token =  $('meta[name="jwt"]').attr('content');

    $(document).on('click', '.paginate__v1_index_transfer .pagination a',function(event){
        event.preventDefault();

        var page = $(this).attr('href').split('page=')[1];

        $('#hidden_page_service_transfer').val(page);

        $('li').removeClass('active');
        $(this).parent().addClass('active');

        // var started_at_transfer = $('.started_at_transfer_data').val();
        // var ended_at_transfer =  $('.ended_at_transfer_data').val();

        // loadDataChargeATMHistory(page,started_at_transfer,ended_at_transfer);
        loadDataChargeATMHistory(page);
    });


    function loadDataChargeATMHistory(page) {

        request = $.ajax({
            type: 'GET',
            url: '/lich-su-nap-the-atm',
            data: {
                page:page,

            },
            beforeSend: function (xhr) {
                $(".load_spinner").show();
                $("#data_charge_atm_history").hide();
            },
            success: (data) => {
                $(".load_spinner").hide();
                $("#data_charge_atm_history").show();
                $("#data_charge_atm_history").empty().html('');
                $("#data_charge_atm_history").empty().html(data);
            },
            error: function (data) {

            },
            complete: function (data) {

            }
        });
    }

    // $(document).on('submit', '.form__transfer', function(e){
    //     e.preventDefault();
    //
    //     var started_at_transfer = $('.started_at_transfer').val();
    //
    //     if (started_at_transfer == null || started_at_transfer == undefined || started_at_transfer == ''){
    //         $('.started_at_data_transfer').val('');
    //     }else {
    //         $('.started_at_data_transfer').val(started_at_transfer);
    //     }
    //
    //     var ended_at_transfer =  $('.ended_at_transfer').val();
    //
    //     if (ended_at_transfer == null || ended_at_transfer == undefined || ended_at_transfer == ''){
    //         $('.ended_at_data_transfer').val('');
    //     }else {
    //         $('.ended_at_data_transfer').val(ended_at_transfer);
    //     }
    //
    //     var started_at = $('.started_at_data_transfer').val();
    //     var ended_at =  $('.ended_at_data_transfer').val();
    //     // var page = $('#hidden_page_service_transfer').val();
    //     var page = 1;
    //     loadDataChargeATMHistory(page,started_at,ended_at);
    // });

    $('body').on('click','.data__charge_atm',function(e){

        e.preventDefault();
        $('.started_at_txns_data').val('');
        $('.ended_at_txns_data').val('');

        // var started_at_transfer_data = $('.started_at_transfer_data').val();
        // var ended_at_transfer_data = $('.ended_at_transfer_data').val();
        var page = $('#hidden_page_service_transfer').val();

        loadDataChargeATMHistory(page)

    });
    var loc = window.location.search;

    if(loc.replace('?log=','') == 'charge-atm-history'){
        $('.nav-link').removeClass('active');
        $('.tab-pane').removeClass('active');
        $('.tab-pane').removeClass('show');
        $('.data__charge_atm').addClass('active');
        $('.data__charge_atm').addClass('show');
        $('.data__charge_atm_tab').addClass('active');
        $('.data__charge_atm_tab').addClass('show');



        let page = $('#hidden_page_service_transfer').val();

        loadDataChargeATMHistory(page)


    }
})
