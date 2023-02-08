function openNav() {
    document.getElementsByClassName('js-main-nav')[0].style.height = '588px';
    document.getElementsByClassName('js-navbar__close-icon')[0].style.display = 'block';
    document.getElementsByClassName('js-navbar__burger-icon')[0].style.display = 'none';
    document.getElementsByClassName('js-navbar__logo--white')[0].style.display = 'none';
    document.getElementsByClassName('js-navbar__logo--black')[0].style.display = 'block';
    document.getElementsByClassName('js-navbar')[0].classList.add('open');
}
function closeNav() {
    document.getElementsByClassName('js-main-nav')[0].style.height = '0';
    document.getElementsByClassName('js-navbar__close-icon')[0].style.display = 'none';
    document.getElementsByClassName('js-navbar__burger-icon')[0].style.display = 'block';
    document.getElementsByClassName('js-navbar__logo--white')[0].style.display = 'block';
    document.getElementsByClassName('js-navbar__logo--black')[0].style.display = 'none';
    document.getElementsByClassName('js-navbar')[0].classList.remove('open');
}
jQuery(document).ready(function () {
    jQuery('.menu-item').hover(
        function() {
            console.log(this);
            const title = jQuery(this).find('a').first().text();
            //add the title to the top of the menu
            jQuery(this).find('li').first().before(`<h3 class="js-sub-menu__title">${title}</h3>`);
        },
        function() {
            //remove the appended item
            jQuery(this).find('.js-sub-menu__title').last().remove();
        }
    )
});