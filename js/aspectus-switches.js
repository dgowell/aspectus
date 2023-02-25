jQuery(document).ready(function () {
    const switches = jQuery('.js-person__switch');
    const dropdowns = jQuery('.js-person__info');

    jQuery.each(switches, addClickHandler);

    function addClickHandler(index, value) {
        jQuery(value).click(function () {
            if (jQuery(dropdowns[index]).hasClass('open')) {
                jQuery(dropdowns[index]).removeClass('open');
                jQuery(this).removeClass('open');
            } else {
                jQuery(dropdowns[index]).addClass('open');
                jQuery(this).addClass('open');
            }
        })
    }
});

jQuery(document).ready(function () {
    //only run on this page 1739 sectors
   if (jQuery("body").hasClass('page-id-1739')) {
        const switches = jQuery('.js-service__toggle');
        const submenus = jQuery('.js-service__dropdown');
        const outerContainers = jQuery('.js-service__container');

        jQuery.each(switches, addClickHandler);

        function addClickHandler(index, value) {
            jQuery(value).click(function () {
                if (jQuery(submenus[index]).hasClass('open')) {
                    jQuery(submenus[index]).removeClass('open');
                    jQuery(outerContainers[index]).removeClass('open');
                    jQuery(this).removeClass('open');

                } else {
                    jQuery(submenus[index]).addClass('open');
                    jQuery(outerContainers[index]).addClass('open');
                    jQuery(this).addClass('open');
                }
            })
        }
        //when the switch is clicked
        //get the index of the switch and then get all the drop down containers and using the same index
        //apply the active tab
  }
});

jQuery(document).ready(function () {
    //only run on contact page 1747 sectors
    if (jQuery("body").hasClass('page-id-1747')) {
        const switches = jQuery('.js-location__toggle');
        const submenus = jQuery('.js-location__dropdown');
        const locationSeparators = jQuery('.js-location__separator');

        jQuery.each(switches, addClickHandler);

        function addClickHandler(index, value) {
            jQuery(value).click(function () {
                if (jQuery(submenus[index]).hasClass('open')) {
                    jQuery(submenus[index]).removeClass('open');
                    jQuery(this).removeClass('open');
                    if (locationSeparators[index]){
                        jQuery(locationSeparators[index]).removeClass('open');
                    }

                } else {
                    jQuery(submenus[index]).addClass('open');
                    jQuery(this).addClass('open');
                    if (locationSeparators[index]) {
                        jQuery(locationSeparators[index]).addClass('open');
                    }

                }
            })
        }
    }
});