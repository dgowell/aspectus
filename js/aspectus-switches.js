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

        // handle the accordian like dropdown office locations
        const switches = jQuery('.js-location__toggle');
        const submenus = jQuery('.js-location__dropdown');
        const locationSeparators = jQuery('.js-location__separator');

        //set the first accordian to open
        jQuery(submenus[0]).addClass('open');
        jQuery(locationSeparators[0]).addClass('open');
        jQuery(switches[0]).addClass('open');

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

        //hanlde the switches between the two different sections on the contact page
        const officeSwitch = jQuery('.js-office-switch');
        const formSwitch = jQuery('.js-contact-switch');
        const formSection = jQuery('.js-contact-form__section');
        const officeSection = jQuery('.js-locations__section');

        //clicking the office switch will
        //1. add active class to office switch
        //2. remove actve class from contact form switch
        //3. add active class to office locations section
        //4. remove active class from contact form section
        jQuery(officeSwitch).click(()=>{
            if (jQuery(formSwitch).hasClass('active')){
                jQuery(officeSwitch).addClass('active');
                jQuery(formSwitch).removeClass('active');
                jQuery(officeSection).addClass('active');
                jQuery(formSection).removeClass('active');
            }
        });
        //then we do the opposite for the other switch so it's like a toggle
        jQuery(formSwitch).click(() => {
            if (jQuery(officeSwitch).hasClass('active')) {
                jQuery(formSwitch).addClass('active');
                jQuery(officeSwitch).removeClass('active');
                jQuery(formSection).addClass('active');
                jQuery(officeSection).removeClass('active');
            }
        });
    }
});