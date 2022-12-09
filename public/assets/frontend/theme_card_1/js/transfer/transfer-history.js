// $(document).ready(function(){
//     let page = $('#hidden_page_atm').val();
//
//     $(document).on('click', '.paginate__v1 .pagination a',function(event){
//         event.preventDefault();
//
//         var page = $(this).attr('href').split('page=')[1];
//
//         $('#hidden_page_atm').val(page);
//
//         $('li').removeClass('active');
//         $(this).parent().addClass('active');
//
//
//         loadDataTransferHistoryATM(page);
//     });
//
//     function loadDataTransferHistoryATM(page) {
//
//         request = $.ajax({
//             type: 'GET',
//             url: '/get-bank',
//             data: {
//                 page:page,
//             },
//             beforeSend: function (xhr) {
//
//             },
//             success: (data) => {
//                 $('.data_pay_card_history__atm').empty().html('');
//                 $('.data_pay_card_history__atm').empty().html(data);
//             },
//             error: function (data) {
//
//             },
//             complete: function (data) {
//
//             }
//         });
//     }
// })
//
//
//
