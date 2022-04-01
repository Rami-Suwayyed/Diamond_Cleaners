(function($) {

	"use strict";
	
		// Mouse pointer
		$(".wrapper-main").prepend("<div class='mouse-pointer'></div>");

		function showCoords(event) {
			var x = event.pageX;
			var y = event.pageY;
			var follower = $(".mouse-pointer");
			follower.css({
				left: x + (-12.5) + "px",
				top: y + (-12.5) + "px",
			});

		}
		
		$(window).on("mousemove", function(event) {
			showCoords(event);
		});

		$("li, a, button, input, textarea, .navbar-toggles").mouseenter(function () {
			$(".mouse-pointer").css("opacity", "0");
			$("li, a, button, input, textarea, .navbar-toggles").mouseleave(function () {
				$(".mouse-pointer").css("opacity", "1");
			});
		});
		
		
		// fixed-menu
		$(window).on('scroll', function () {
			if ($(window).scrollTop() > 50) {
				$('.top-nav').addClass('fixed-menu');
			} else {
				$('.top-nav').removeClass('fixed-menu');
			}
		});

		
		// blog-slider
		$("#blog-slider").owlCarousel({
			items:3,
			itemsDesktop:[1199,3],
			itemsDesktopSmall:[1000,2],
			itemsMobile : [650,1],
			navigationText:false,
			autoPlay:true
		});
		
		// customers-slider
		$("#customers-slider").owlCarousel({
			items:5,
			itemsDesktop:[1199,5],
			itemsDesktopSmall:[1000,3],
			itemsMobile : [650,2],
			navigationText:false,
			autoPlay:true
		});
		
	
})(window.jQuery);	


$(document).ready(function(){
	$w_value = 0;
	$d_value = 0;
	$total_field = $('#total').val();
	$all_pro = $('#all_pro').val();

	$('#wash_qua').click(function(){
		$value = $(this).val();
		$('#wash_num').attr('value',$value);
		$('#wash_msg').val(($value * 0.4).toFixed(2));

		$total = Number($all_pro) + Number($('#wash_msg').val());
		$('#total').attr('value',$total);

		$('#wash_input_values').attr('value',$value);
		
	});

	$('#wash_qua').change(function(){
		$value = $(this).val();
		$('#wash_num').attr('value',$value);	
		$('#wash_msg').text(($value * 0.4).toFixed(2));	

		$total = Number($all_pro) + Number($('#wash_msg').val());
		$('#total').attr('value',$total);

		$('#wash_input_values').attr('value',$value);
	});


	$('#donate_qua').click(function(){
		$d_value = $(this).val();
		$('#donate_num').attr('value',$d_value);


		$('#donate_input_values').attr('value',$d_value);
	});

	$('#donate_qua').keyup(function(){
		$d_value = $(this).val();
		$('#donate_num').attr('value',$d_value);	


		$('#donate_input_values').attr('value',$d_value);	
	});

});