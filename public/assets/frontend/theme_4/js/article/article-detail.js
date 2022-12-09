function handleTocPosition() {
    let tocHtml = '<div id="toctoc" class="toc-container d-none"></div>';
    $(tocHtml).insertBefore( $(".article-content h2").first());
}

handleTocPosition();

$(document).ready(function() {
    var options = {
        opened: false,
        target: '.article-content',
        smooth: true,
        headText: 'Mục lục',
        headLinkText: ['<i class="fas fa-expand-arrows-alt"></i>', '<i class="fas fa-compress-arrows-alt"></i>'],
        headBackgroundColor: 'transparent',
    };

    if ( $(".article-content h2").length >=2 ) {
        $.toctoc(options);
    }
});