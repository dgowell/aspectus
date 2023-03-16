jQuery(document).ready(function () {
    jQuery('.slider-control a').click(()=>{
        const tabs = jQuery('.atbs__tab-labels');
        if (tabs.hasClass('switched')) {
            tabs.removeClass('switched');
        } else {
            tabs.addClass("switched");
        }
    })
});
