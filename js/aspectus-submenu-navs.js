jQuery(document).ready(function () {
    //only run on this page 1737 sectors
    if (jQuery("body").hasClass('page-id-1737')){
        const switches = jQuery('.js-sector-menu__switch');
        const submenus = jQuery('.submenu-nav>.wp-block-navigation__container');

        jQuery.each(switches, addClickHandler);

        function addClickHandler(index, value){
            jQuery(value).click(function() {
                if (jQuery(submenus[index]).hasClass('open')){
                    jQuery(submenus[index]).removeClass('open');
                    jQuery(this).removeClass('open');
                } else {
                    jQuery(submenus[index]).addClass('open');
                    jQuery(this).addClass('open');
                }
            })
        }
        //when the switch is clicked
        //get the index of the switch and then get all the drop down containers and using the same index
        //apply the active tab
    }
});