function showDiv() {
    setTimeout(function () {
        $(".modal-sedding-notification").addClass('modal-sedding-notification_show').delay( 10000);
        setTimeout(function () {
            $(".modal-sedding-notification").removeClass('modal-sedding-notification_show').delay( 6000);
        },6000)
    }, 10000);

}
showDiv();

$(".close-sedding").click(function(){
    $("#sedding-notification").hide();
})

let json= [
    {
        title:'Acc Liên Minh Tự chọn',
        desc:'Một khách hàng đã thêm vào giỏ hàng cách đây 44 phút',
        price:'150.000',
    },
    // {
    //     title:'Acc Liên Quân',
    //     desc:'Một khách hàng đã thêm vào giỏ hàng cách đây 44 phút',
    //     price:150000,
    // },
    // {
    //     title:'Acc Liên Minh Tự chọn',
    //     desc:'Một khách hàng đã thêm vào giỏ hàng cách đây 44 phút',
    //     price:150000,
    // }
];
json.forEach(function (item) {
    let html = `
    <div class="modal-sedding-image">
        <img onerror="imgError(this)" src="https://recmiennam.com/wp-content/uploads/2018/01/top-hinh-nen-game-dep-nhat-full-hd-3.jpg" alt="">
    </div>
    <div class="modal-sedding">
    <div class="modal-sedding-title">
         ${item.title}
    </div>
    <div class="modal-sedding-content">
         ${item.desc}
    </div>
        <span>${item.price}đ</span>
    </div>`;
    $('#sedding-notification').append(html);
})
 /* js mobile */


/* khong cho click modal */
$('.sedding-notification-mobile').click(function(e) {
    e.stopPropagation();
});

/* click body an modal */
$('body').click( function() {
    $('.sedding-notification-mobile').hide();
});
