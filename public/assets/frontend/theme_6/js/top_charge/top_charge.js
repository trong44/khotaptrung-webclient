// $(document).ready(function(){
//     function formatNumber(num) {
//         return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
//     }
//     function fn(text, count){
//         return text.slice(0, count) + (text.length > count ? "..." : "");
//     }
//     function getTopCharge(){
//         var url = '/top-charge';
//         $.ajax({
//             type: "GET",
//             url: url,
//             success: function (data) {
//                 if(data.status == 1){
//                     let html = '';
//                     if(data.data.length > 0 ){
//                         $.each(data.data,function(key,value){
//                             if (key <5){
//                                 html += '<li>';
//                                 html += '<p>'+key+'</p>';
//                                 html += '<span>'+fn(value.username, 12) +'</span>';
//                                 // html += '<label>'+value.username+'<sup>đ</sup></label>';
//                                 html += '<label>'+ formatNumber(value.amount) +'<sup>đ</sup></label>';
//                                 html +='</li>';
//                             }
//
//                         });
//                     }
//                     else{
//                     }
//                     $('.content-banner-card-top').html(html)
//                 }
//                 // else{
//                 //     swal({
//                 //         title: "Có lỗi xảy ra !",
//                 //         text: data.message,
//                 //         icon: "error",
//                 //         buttons: {
//                 //             cancel: "Đóng",
//                 //         },
//                 //     })
//                 // }
//             },
//             error: function (data) {
//                 swal({
//                     title: "Lỗi !",
//                     text: "Có lỗi phát sinh vui lòng liên hệ QTV để kịp thời xử lý.",
//                     icon: "error",
//                     buttons: {
//                         cancel: "Đóng",
//                     },
//                 })
//             },
//             complete: function (data) {
//
//             }
//         });
//     }
//     getTopCharge();
// });
