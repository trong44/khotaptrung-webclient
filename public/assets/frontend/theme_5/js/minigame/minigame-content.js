
function handleTocPosition() {
    let tocHtml = '<div id="toctoc" class="toc-container d-none"></div>';
    $(tocHtml).insertBefore( $(".minigame-content-ml h2").first());
}

$('#viewMore').on('shown.bs.modal', function (e) {
    $('#viewMore').find('.data-content').toggleClass('minigame-content-ml',true);
    handleTocPosition();
    if ( $(".minigame-content-ml h2").length >=2 ) {
        $.toctoc( {
            opened: false,
            target: '.minigame-content-ml',
            smooth: true,
            headText: 'Mục lục',
            headLinkText: ['<i class="fas fa-expand-arrows-alt"></i>', '<i class="fas fa-compress-arrows-alt"></i>'],
            headBackgroundColor: 'transparent',
        });
    }
})
