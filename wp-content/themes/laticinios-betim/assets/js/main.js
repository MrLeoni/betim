$(document).ready(function() {
  
  $(".home-slider").bxSlider({
    controls: false,
    auto: true,
    autoHover: true,
    pause: 8000,
    speed: 800,
  });
  
  $(".home-produtos").bxSlider({
    pager: false,
    infiniteLoop: false,
    startSlide: 3,
  });
  
});