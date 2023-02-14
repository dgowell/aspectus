jQuery(document).ready(function () {
    jQuery('.slick-slider ul').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        prevArrow: jQuery('.js-slider-prev'),
        nextArrow: jQuery('.js-slider-next'),
  });
});