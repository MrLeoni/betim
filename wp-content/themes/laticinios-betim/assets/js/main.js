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
    speed: 500,
    hideControlOnEnd: true,
  });
  
	// Amplify the size of the initial image on load page
	var initialAmplify = function() {
		
		// Get img parent
		imgParent = $(".home-produtos li");
		
		// Target the 3 img, using the same number of "startSlider"
		// in bxSlider() function
		$(imgParent[3]).children().animate({
			height: "70%",
			opacity: "1",
		}, 0);
	}
	initialAmplify();
  
	// Make images grow when they are in the center off te screen
	var amplify = function(direction) {
	
		// Get screen size, only works in screens larger than 1200px
		windowWidth = $(window).width();
		
		// Using check the screen size
		if(windowWidth > 1200) {
		
			// Get the offset of the slider wrapper
			sliderWrapper = $(".produtos-slider-wrapper").offset();
			// Creating a object with all slider's "<li>"
			sliderLi = $(".home-produtos li");
			
			// Check the direction of the click and calculate what <li> element
			// that has to target, based on the offset
			if(direction == "right") {
				offsetResult = sliderWrapper.left - 360;
			} else {
				offsetResult = sliderWrapper.left + 360;
			}
			
			// Creating a Loop to iterate all the <li> elements
			for (i = 0; i < sliderLi.length; i++ ){
			
				// Get the poisition of the <li>
				eachSliderLi = $(sliderLi[i]).offset();
				
				// Get the img of each slide
				sliderImg = $(sliderLi[i]).children();
				imgTitle = sliderImg.attr("title");
				
				// if the position match with position of the slider wrapper
				// amplify the image, if not decrease size of the image
				// Get the img title and apply in #js-products-link HTML text and title
				if(eachSliderLi.left == offsetResult) {
					
					sliderImg.animate({
					height: "70%",
					opacity: "1",
					},150);
					
					$("#js-products-link").html(imgTitle).attr("title", imgTitle);
				
				} else {
					
					sliderImg.animate({
					height: "30%",
					opacity: "0.3",
					}, 150);	
					
				}
				
			}
		
		}
		
	}
  
	$(".bx-prev").click(function() {
		amplify("right");
	});
	
	$(".bx-next").click(function() {
		amplify("left");
	});
  
  /* Filtros Produtos */
  
  // Toggle ".active" class on the products filters
  var $menu = $('.category-menu li');
  $menu.click(function () {
    $menu.not(this).removeClass('active');
    $(this).addClass('active');
  });
  
  // Hide & Show products related with the clicked category
  $(".category-menu .cat-btn").click(function() {
    var category = $(this).attr("data-category");
    $(".product-box").fadeOut(120);
    $("."+category).delay(120).fadeIn(200);
  });
  
  // Show all products
  $("#show-all").click(function() {
     $(".product-box") .fadeIn(120);
  });
  
});