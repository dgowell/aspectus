/*
* Function: Adds accordian effect to menus in each section
* Function: Converts menus to drop down selectors when on mobile
* Run on Sectors page 1737
*/
jQuery(document).ready(function () {
    if (jQuery("body").hasClass('page-id-1737')) {
        const switches = jQuery('.js-sector-menu__switch');
        const submenus = jQuery('.submenu-nav>.wp-block-navigation__container');
        const sub = jQuery('.submenu-nav');

        const columns = jQuery('.sector-menu__col--text');

        jQuery.each(switches, addClickHandler);

        function addClickHandler(index, value) {
            jQuery(value).click(function () {
                if (jQuery(submenus[index]).hasClass('open')) {
                    jQuery(submenus[index]).removeClass('open');
                    jQuery(this).removeClass('open');
                } else {
                    jQuery(submenus[index]).addClass('open');
                    jQuery(this).addClass('open');
                }
            })
        }

        function addMobileClickHandler(index, value) {
            jQuery(value).click(function () {
                if (jQuery(sub[index]).hasClass('open')) {
                    jQuery(sub[index]).removeClass('open');
                    jQuery(this).removeClass('open');
                } else {
                    jQuery(sub[index]).addClass('open');
                    jQuery(this).addClass('open');
                }
            })
        }
        //when the switch is clicked
        //get the index of the switch and then get all the drop down containers and using the same index
        //apply the active tab
        if (window.matchMedia('(max-width: 1000px)').matches) {

            //move switch button down below other button
            jQuery.each(switches, moveSwitch);
            jQuery.each(sub, createSelector);
            jQuery(submenus).remove();
            jQuery.each(switches, addMobileClickHandler);

            function moveSwitch(index, value) {
                jQuery(columns[index]).append(value);
            };

            function createSelector(index, value) {
                //create a dropdown container div
                const div  = jQuery("<div class='selectbox__container'></div>").appendTo(value);
                // Create the dropdown base
                const select = jQuery("<select class='selectbox__select' />").appendTo(div);



                // Create default option "Go to..."
                jQuery("<label />", {
                    "class": "selectbox__label",
                    "text": "Select a sub sector    "
                }).prependTo(div);

                // Create default option "Go to..."
                jQuery("<option />", {
                    "selected": "selected",
                    "value": "",
                    "text": "Go to..."
                }).appendTo(select);

                // Populate dropdown with menu items
                jQuery(value).find('a').each(function () {
                    var el = jQuery(this);
                    jQuery("<option />", {
                        "value": el.attr("href"),
                        "text": el.text()
                    }).appendTo(select);
                });

                //activate the links
                jQuery(select).change(function () {
                    window.location = jQuery(this).find("option:selected").val();
                });

            }
        }
    }
});

/*
* Function: Adds accordian effect to menus in each section
* Function: Converts menus to drop down selectors when on mobile
* Run on all Sub Sectors pages parent-pageid-1737
*/
jQuery(document).ready(function () {
    if (jQuery("body").hasClass('page-child')) {
        const nav = jQuery('.subsectors-list');
        const menu = jQuery('.subsectors-list>.wp-block-navigation__container');

        if (window.matchMedia('(max-width: 1000px)').matches) {

            jQuery.each(menu, createSelector);
            jQuery(menu).remove();

            function createSelector(index, value) {
                //create a dropdown container div
                const div = jQuery("<div class='selectbox__container'></div>").appendTo(nav);
                // Create the dropdown base
                const select = jQuery("<select class='selectbox__select' />").appendTo(div);



                // Create default option "Go to..."
                jQuery("<label />", {
                    "class": "selectbox__label",
                    "text": "Select a sub sector    "
                }).prependTo(div);

                // Create default option "Go to..."
                jQuery("<option />", {
                    "selected": "selected",
                    "value": "",
                    "text": "Go to..."
                }).appendTo(select);

                // Populate dropdown with menu items
                jQuery(value).find('a').each(function () {
                    var el = jQuery(this);
                    jQuery("<option />", {
                        "value": el.attr("href"),
                        "text": el.text()
                    }).appendTo(select);
                });

                //activate the links
                jQuery(select).change(function () {
                    window.location = jQuery(this).find("option:selected").val();
                });

            }
        }
    }
});