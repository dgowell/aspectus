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