$(document).ready(function () {
$('.media-form-search').submit(function (e) {
    e.preventDefault();
    let searchValue = $(this).find('input.input-search-ct').val().toLowerCase();
    $('.body-detail-nick-col-ct').css('display', 'block');
    $('.body-detail-nick-col-ct').each(function () {
        let title = $(this).data('title').toLowerCase();
        if (title.indexOf(searchValue) < 0) {
            $(this).css('display', 'none');
        }
    });
});
});
