if (window.matchMedia('(min-width: 1000px)').matches) {
    function openNav() {
    document.getElementsByClassName('js-main-nav')[0].style.height = '588px';
    document.getElementsByClassName('js-main-nav')[0].style.padding = '40px 40px 0';
    document.getElementsByClassName('header__column-line')[0].style.opacity = '1';
    document.getElementsByClassName('js-navbar__close-icon')[0].style.display = 'block';
    document.getElementsByClassName('js-navbar__burger-icon')[0].style.display = 'none';
    document.getElementsByClassName('js-navbar__logo--white')[0].style.display = 'none';
    document.getElementsByClassName('js-navbar__logo--black')[0].style.display = 'block';
    document.getElementsByClassName('js-navbar')[0].classList.add('open');
    }
    function closeNav() {
        document.getElementsByClassName('js-main-nav')[0].style.height = '0';
        document.getElementsByClassName('js-main-nav')[0].style.padding = '0 40px 0';
        document.getElementsByClassName('header__column-line')[0].style.opacity = '0';
        document.getElementsByClassName('js-navbar__close-icon')[0].style.display = 'none';
        document.getElementsByClassName('js-navbar__burger-icon')[0].style.display = 'block';
        document.getElementsByClassName('js-navbar__logo--white')[0].style.display = 'block';
        document.getElementsByClassName('js-navbar__logo--black')[0].style.display = 'none';
        document.getElementsByClassName('js-navbar')[0].classList.remove('open');
    }
}
if (window.matchMedia('(max-width: 999px)').matches) {
    function openNav() {
        document.getElementsByClassName('js-main-nav')[0].style.height = '945px';
        document.getElementsByClassName('js-main-nav')[0].style.padding = '40px 40px 60px';
        document.getElementsByClassName('js-navbar__close-icon')[0].style.display = 'block';
        document.getElementsByClassName('js-navbar__burger-icon')[0].style.display = 'none';
        document.getElementsByClassName('js-navbar__logo--white')[0].style.display = 'none';
        document.getElementsByClassName('js-navbar__logo--black')[0].style.display = 'block';
        document.getElementsByClassName('js-navbar')[0].classList.add('open');
    }
    function closeNav() {
        document.getElementsByClassName('js-main-nav')[0].style.height = '0';
        document.getElementsByClassName('js-main-nav')[0].style.padding = '0 40px 0';
        document.getElementsByClassName('js-navbar__close-icon')[0].style.display = 'none';
        document.getElementsByClassName('js-navbar__burger-icon')[0].style.display = 'block';
        document.getElementsByClassName('js-navbar__logo--white')[0].style.display = 'block';
        document.getElementsByClassName('js-navbar__logo--black')[0].style.display = 'none';
        document.getElementsByClassName('js-navbar')[0].classList.remove('open');
    }
}
jQuery(document).ready(function () {

    //Function to add the titles at the top of the sub menus in the main nav
    jQuery('.menu-item').hover(
        function() {
            const title = jQuery(this).find('a').first().text();
            //add the title to the top of the menu
            jQuery(this).find('li').first().before(`<h3 class="js-sub-menu__title">${title}</h3>`);
        },
        function() {
            //remove the appended item
            jQuery(this).find('.js-sub-menu__title').last().remove();
        }
    )
    if (window.matchMedia('(min-width: 1000px)').matches) {
        //Function to add the grey menu breaker for the sub sub menu
        jQuery('.main-nav__container .sub-menu .menu-item-has-children').hover(
            function() {
                //find the line and increase the height to show it
                jQuery('.header__column-line--second').first().height(543);
            },
            function() {
                //decrease the height to hide it
                jQuery('.header__column-line--second').first().height(0);
            }
        )
    }
});