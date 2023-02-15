jQuery(document).ready(function () {
  jQuery('.slick-slider ul').slick({
    infinite: !0,
    dots: !0,
    slidesToShow: 3,
    slidesToScroll: 1,
    prevArrow: jQuery('.js-slider-prev'),
    nextArrow: jQuery('.js-slider-next'),
    dotsClass: "js-client-slider__indicators",
    responsive: [
      {
        breakpoint: 600,
        settings: { slidesToShow: 1, slidesToScroll: 1 }
      }
    ]
  });
});