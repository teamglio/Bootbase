(function($) { 
$(document).ready(
	function(){
	
	// Frontpage slideshow
	if ($('.frontpage').length > 0){
    		
		$('#panel_1').cycle({
			fx: 'scrollDown',
			speed: 1000,
    		sync:1,
			timeout: 10000,
			easing: 'easeInOutQuad',
			pause:1

		});
		$('#panel_2').cycle({
			fx: 'scrollDown',
			speed: 1000,
    		sync:1,
			timeout: 10000,
			delay:2000,
			easing: 'easeInOutQuad',
			pause:1
		});
		$('#panel_3').cycle({
			fx: 'scrollDown',
			speed: 1000,
    		sync:1,
			timeout: 10000,
			delay:4000,
			easing: 'easeInOutQuad',
			pause:1

		});
		
		$('#hero dl dt').hide();
		
		function animate(){
			$('#hero #panel_1 dl dt').slideDown('fast');
			$('#hero #panel_2 dl dt').slideDown('normal');
			$('#hero #panel_3 dl dt').slideDown('slow');
		}
		
		animate();
		
    	$('#hero dl').hover(
 			function(){
				$(this).find('dd').css('display','block');
			},
			function(){
				$(this).find('dd').css('display','none');
 			})
    		
   	 }

	// Frontpage slideshow
	if ($('.competitions').length > 0){
		$('#hero ul').cycle({
			fx: 'scrollDown',
			speed: 1000,
			random: '0',
			timeout: 10000,
			easing: 'easeInOutQuad'

		});
	}


	$('.caption span.name').hide();
	$('.caption').hover(
		function(){
		$('.caption span.name').show();
		},
		function(){
		$('.caption span.name').hide();
		}
	)
	

	$("#details a").addClass("external").click(function() { window.open($(this).href); return false; });
	


	if ($(".label").length>0) {
	$("input:text").labelify({
		text: "label",
		labelledClass: "labeltext"
		});
	}
	



$('.panels').kwicks({
		max : 320,
		spacing : 0,
		easing: 'easeInOutQuad',
		duration: 900
	});


})
})(jQuery);