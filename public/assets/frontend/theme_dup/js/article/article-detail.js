function handleTocPosition() {
    let tocHtml = '<div id="toctoc" class="toc-container d-none"></div>';
    $(tocHtml).insertBefore( $(".news_detail_content h2").first());
}

handleTocPosition();

$(document).ready(function() {
    var options = {
        opened: false,
        target: '.news_detail_content',
        smooth: true,
        headText: 'Mục lục',
        headLinkText: ['<i class="fas fa-expand-arrows-alt"></i>', '<i class="fas fa-compress-arrows-alt"></i>'],
        headBackgroundColor: 'transparent',
    };
    $.toctoc(options);
});