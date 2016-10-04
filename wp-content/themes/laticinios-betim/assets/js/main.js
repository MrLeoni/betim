$(document).ready(function() {
  
  // Banner Slider Function
  $(".home-slider").bxSlider({
    controls: false,
    auto: true,
    autoHover: true,
    pause: 8000,
    speed: 800,
  });
  
  // Produtos Slider Function
  $(".home-produtos").bxSlider({
    pager: false,
    infiniteLoop: false,
    startSlide: 3,
  });
  
  // Toggle ".active" class on the products filters
  var $menu = $('.category-menu li');
  $menu.click(function () {
    $menu.not(this).removeClass('active');
    $(this).addClass('active');
  });
  
});