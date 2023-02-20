jQuery(document).ready(function () {

    const animationTime = 6000;
    //get all accordian items
    const items = jQuery('.js-accordian__item');
    //add spinner to each item
    jQuery.each(items, addSpinner);
    function addSpinner() {
        jQuery(this).prepend('<div class="js-indicator__container"><div class="indicator__chart" data-percent="100" data-scale-color="#022C2E"></></div>');
    }
    let index = 0;
    setInterval(() => {
        setNext(index);
        if (index < items.length - 1) {
            index++;
        } else {
            index = 0;
        }
    }, animationTime);

    //first time around run the circular countdown
    const charts = jQuery('.indicator__chart').easyPieChart({
        size: 26,
        barColor: "#E6EBEB",
        easing: 'easeinoutsine',
        scaleLength: 0,
        lineWidth: 1,
        trackColor: "#373737",
        lineCap: "circle",
        animate: animationTime + 1000,
    });



    function setNext(itemIndex) {
        const active = jQuery('.js-accordian__item.active').removeClass('active');
        const items = jQuery('.js-accordian__item');
        jQuery(items[itemIndex]).addClass('active');
        jQuery.each(charts, update);
    }

    
    function update(index, chart) {
        jQuery(chart).data('easyPieChart').disableAnimation();
        jQuery(chart).data('easyPieChart').update(0);
        jQuery(chart).data('easyPieChart').enableAnimation();
        jQuery(chart).data('easyPieChart').update(100);
    }


});