function openNav() {
    document.getElementsByClassName('js-navbar')[0].classList.add('open');
}
function closeNav() {
    document.getElementsByClassName('js-navbar')[0].classList.remove('open');
    //remove color the navbar grey
    jQuery('.js-navbar').removeClass('highlight');
    jQuery('.sub-menu.show').removeClass('show');
    jQuery('.js-main-nav').removeClass('hide');
}


function displaySubmenu(e) {
    //move main menu
    jQuery('.js-main-nav').addClass('hide');
    //get submenu

    const submenu = jQuery(`.sub-menu:contains('${e.currentTarget.innerText}')`);
    //display submenu
    jQuery(submenu).addClass('show');

    //color the navbar grey
    jQuery('.js-navbar').addClass('highlight');

}
function hideSubmenu() {
    console.log("hidesubmenu called");
    //move main menu
    jQuery('.js-main-nav').removeClass('hide');
    //get submenu
    jQuery('.sub-menu.show').removeClass('show');
    //display submenu


    //remove color the navbar grey
    jQuery('.js-navbar').removeClass('highlight');
}
function handleBack() {

    hideSubmenu();
}

jQuery(document).ready(function () {

    /*
    * Add the titles at the top of the sub menus in the main nav
    */
    const menuItems = jQuery('.menu-item-has-children');
    jQuery.each(menuItems, function () {
        const title = jQuery(this).find('a').first().text();
        //add the title to the top of the menu
        jQuery(this).find('li').first().before(`<h3 class="js-sub-menu__title">${title}</h3>`);
    });



    //ONLY RUN ON DESKTOP]
    if (window.matchMedia('(min-width: 1000px)').matches) {
        /*
        * Add the grey menu breaker for the sub sub menu
        */
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
    }//END DESKTOP

    //ONLY RUN ON MOBILE
    if (window.matchMedia('(max-width: 1000px)').matches) {

        /*
        * Remove a links in menu on mobile
        */


        jQuery('.menu-item-has-children>a').click((e) => {
            e.preventDefault();
            displaySubmenu(e);
        });


        /*
        * 1.find the items that have children
        * 2. attach fucntion
        * 3. function moves main menu to the side and displays sub menu
        * 4. displays the back button at the top, which does the reverse
        *
        */


        const menuItems = jQuery('.menu-item-has-children');
        jQuery.each(menuItems, function () {
            const backName = 'Main menu';
            const backLink = `<span class="sub-menu__backlink" onclick="handleBack()">< Back to <strong>${backName}</strong></span>`;
            //add the title to the top of the menu
            jQuery(this).find('h3').before(backLink);
        });

    }
});


