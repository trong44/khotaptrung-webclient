$(document).ready(function (e) {
    var openProfileBar = false;
    $('.open-profile-sidebar').click(function (e) {
        if (!openHamburgerBar) {
            e.preventDefault();
            $('.menu-category-mobile').addClass('menu-category-mobile_show');
            $('.open-profile-sidebar').css('display', 'none');
            $('.close-profile-sidebar').css('display', 'flex');
            openHamburgerBar = true;
        }
    });

    $('.close-profile-sidebar').click(function (e) {
        if (openHamburgerBar) {
            e.preventDefault();
            $('.menu-category-mobile').removeClass('menu-category-mobile_show');
            $('.open-profile-sidebar').css('display', 'flex');
            $('.close-Profile-sidebar').css('display', 'none');
            openHamburgerBar = false;
        }
    });
})
