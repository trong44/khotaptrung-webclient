$(document).ready(function () {
    $('.load-modal').each(function (index, elem) {
        $(elem).unbind().click(function (e) {
            e.preventDefault();
            e.preventDefault();
            var curModal = $('#LoadModal');
            curModal.find('.modal-content').html("<div class=\"loader\" style=\"text-align: center\"><img src=\"/assets/frontend/images/loader.gif\" style=\"width: 50px;height: 50px;\"></div>");
            curModal.modal('show').find('.modal-content').load($(elem).attr('rel'));
        });
    });
});

// $(document).ready(function () {
//     if ($.cookie('noticeModal') != '1') {
//
//         $('#noticeModal').modal('show')
//         //show popup here
//         var date = new Date();
//         var minutes = 60 * 12;
//         date.setTime(date.getTime() + (minutes * 60 * 1000));
//         $.cookie('noticeModal', '1', {expires: date});
//     }
// });
$('body').delegate('.viewmore', 'click', function () {
    $(this).addClass('viewless').removeClass('viewmore');
    $(this).text('« Thu gọn');
    $('.hidetext').addClass('showtext').removeClass('hidetext');
})
$('body').delegate('.viewless', 'click', function () {
    $(this).addClass('viewmore').removeClass('viewless');
    $(this).text('Xem tất cả »');
    $('.showtext').addClass('hidetext').removeClass('showtext');
})
$(document).ready(function () {
    $('.load-modal').each(function (index, elem) {
        $(elem).unbind().click(function (e) {
            e.preventDefault();
            e.preventDefault();
            var curModal = $('#LoadModal');
            curModal.find('.modal-content').html("<div class=\"loader\" style=\"text-align: center\"><img src=\"/assets/frontend/images/loader.gif\" style=\"width: 50px;height: 50px;\"></div>");
            curModal.modal('show').find('.modal-content').load($(elem).attr('rel'));
        });
    });
    $(".toggle-password").click(function () {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
});
