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
    if (window.matchMedia('(min-width: 1000px)').matches) {
        //Function to add the titles at the top of the sub menus in the main nav
        jQuery('.menu-item').hover(
            function () {
                const title = jQuery(this).find('a').first().text();
                //add the title to the top of the menu
                jQuery(this).find('li').first().before(`<h3 class="js-sub-menu__title">${title}</h3>`);
            },
            function () {
                //remove the appended item
                jQuery(this).find('.js-sub-menu__title').last().remove();
            }
        )
        if (window.matchMedia('(min-width: 1000px)').matches) {
            //Function to add the grey menu breaker for the sub sub menu
            jQuery('.main-nav__container .sub-menu .menu-item-has-children').hover(
                function () {
                    //find the line and increase the height to show it
                    jQuery('.header__column-line--second').first().height(543);
                },
                function () {
                    //decrease the height to hide it
                    jQuery('.header__column-line--second').first().height(0);
                }
            )
        }
    }
});

jQuery(document).ready(function () {
    const linksWithChildren = jQuery('.menu-item-has-children');
    Array.from(linksWithChildren).forEach(modifyLinkBehaviour);

    function modifyLinkBehaviour(listItem) {
        //grab link to use later
        const link = jQuery(listItem).children('a').attr('href');
        //change link to nothing
        jQuery(listItem).children('a').attr('href', '#');
        //add a click handler onto the list item
        jQuery(listItem).click(handleClick);

        function handleClick(event) {
            event.preventDefault();
            console.log(this);
            const subMenu = jQuery(this).children('ul.sub-menu')[0];
            jQuery(subMenu).find('.menu-item').eq(0).before(`<li class="menu-item"><a href="${link}">Test</a></li>`);
            jQuery(this).children('ul.sub-menu')[0].style.display = "block";
            debugger;
            //show the submenu related to that link
        }
    }
});
//for each link that has children
//remove the oiginal link
//and when clicked
//show the submenu related to that link
//full width
//with back button to take us back to the open menu
