jQuery(document).ready(function () {
  //standard image slider
  jQuery('.image-slider').slick({
    infinite: true,
    dots: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    prevArrow: '<button type="button" class="image-slider__button image-slider__button--prev"></button>',
    nextArrow: '<button type="button" class="image-slider__button image-slider__button--next"></button>',
  });

  if (window.matchMedia('(max-width: 1000px)').matches) {
    //website slider on website page
    jQuery('.js-website-slider .gb-layout-column-wrap').slick({
      infinite: true,
      arrows: false,
      dots: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      dotsClass: 'website-dots'
    });
  };

//client logos
jQuery('.client-slider ul').slick({
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


const fullscreen = '.js-fullscreen-slider .gb-layout-column-wrap';
const animationTime = 4000;

//homepage full screen slider
jQuery(fullscreen).slick({
  infinite: true,
  dots: true,
  arrows: false,
  slidesToShow: 1,
  slidesToScroll: 1,
  speed: 1000,
  fade: true,
  autoplay: true,
  autoplaySpeed: animationTime,
  cssEase: 'linear',
  appendDots: jQuery('.js-fullscreen-slider__controls'),
  dotsClass: "js-fullscreen-slider__indicators",
});

const slides = [
  "Capital Markets",
  "Energy",
  "Financial Service",
  "Industrials",
  "Professional Services",
  "Technology",
];

//for each  button insert the corresponding text
const controls = jQuery('.js-fullscreen-slider__indicators li button');
jQuery.each(controls, constructButton);

function constructButton(index, button) {
  jQuery(button).prop('textContent', slides[index]);
  jQuery(button).prepend('<div class="js-indicator__container"><div class="indicator__chart" data-percent="100" data-scale-color="#022C2E"></></div>');
}


//first time around run the circular countdown
const charts = jQuery('.indicator__chart').easyPieChart({
  size: 16,
  barColor: "#E6EBEB",
  easing: 'easeinoutsine',
  scaleLength: 0,
  lineWidth: 1,
  trackColor: "#373737",
  lineCap: "circle",
  animate: animationTime + 1000,
});

jQuery(fullscreen).on('beforeChange', function (event, slick, currentSlide) {
  jQuery.each(charts, update);
  function update(index, chart) {
    jQuery(chart).data('easyPieChart').disableAnimation();
    jQuery(chart).data('easyPieChart').update(0);
    jQuery(chart).data('easyPieChart').enableAnimation();
    jQuery(chart).data('easyPieChart').update(100);
  }
});
});