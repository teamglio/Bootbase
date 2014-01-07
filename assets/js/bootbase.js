jQuery(document).ready(function() {

		jQuery('.iosSlider').iosSlider({
			desktopClickDrag: true,
			snapToChildren: true,
			infiniteSlider: true,
			navSlideSelector: '.sliderContainer .slideSelectors .item',
			onSlideComplete: slideComplete,
			onSliderLoaded: sliderLoaded,
			onSlideChange: slideChange,
			autoSlide: true,
			scrollbar: true,
			scrollbarContainer: '.sliderContainer .scrollbarContainer',
			scrollbarMargin: '0',
			scrollbarBorderRadius: '0',
			keyboardControls: true
		});

	});

	function slideChange(args) {
				
		jQuery('.sliderContainer .slideSelectors .item').removeClass('selected');
		jQuery('.sliderContainer .slideSelectors .item:eq(' + (args.currentSlideNumber - 1) + ')').addClass('selected');

	}

	function slideComplete(args) {
		
		if(!args.slideChanged) return false;
		
		jQuery(args.sliderObject).find('.text1, .text2, .text3').attr('style', '');
		
		jQuery(args.currentSlideObject).find('.text1').animate({
			top: '300px',
			opacity: '0.8'
		}, 400, 'easeOutQuint');
		
		jQuery(args.currentSlideObject).find('.text2').delay(200).animate({
			top: '300px',
			opacity: '0.8'
		}, 400, 'easeOutQuint');

		jQuery(args.currentSlideObject).find('.text3').delay(400).animate({
			top: '300px',
			opacity: '0.8'
		}, 400, 'easeOutQuint');
		
	}

	function sliderLoaded(args) {
			
		jQuery(args.sliderObject).find('.text1, .text2, .text3').attr('style', '');
		
		jQuery(args.currentSlideObject).find('.text1').animate({
			top: '300px',
			opacity: '0.8'
		}, 400, 'easeOutQuint');
		
		jQuery(args.currentSlideObject).find('.text2').delay(200).animate({
			top: '300px',
			opacity: '0.8'
		}, 400, 'easeOutQuint');

		jQuery(args.currentSlideObject).find('.text3').delay(400).animate({
			top: '300px',
			opacity: '0.8'
		}, 400, 'easeOutQuint');
		
		slideChange(args);
		
	}
//
jQuery(function(){
    var windowH = jQuery(window).height();
    var wrapperH = jQuery('#fullpage').height();
    if(windowH > wrapperH) {                            
        jQuery('#fullpage').css({'height':(jQuery(window).height())-102+'px'});
    }                                                                               
    jQuery(window).resize(function(){
        var windowH = jQuery(window).height();
        var wrapperH = jQuery('#fullpage').height();
        var differenceH = windowH - wrapperH;
        var newH = wrapperH + differenceH;
        var truecontentH = jQuery('#fullpage-inside').height();
        if(windowH > truecontentH) {
            jQuery('#fullpage').css('height', (newH)+'px');
        }

    })          
});

//fadeslider //responsiveSlides
jQuery(function() {
    jQuery(".rslides").responsiveSlides({
	  auto: true,             // Boolean: Animate automatically, true or false
	  speed: 2000,            // Integer: Speed of the transition, in milliseconds
	  timeout: 8000,          // Integer: Time between slide transitions, in milliseconds
	  pager: false,           // Boolean: Show pager, true or false
	  nav: true,             // Boolean: Show navigation, true or false
	  random: false,          // Boolean: Randomize the order of the slides, true or false
	  pause: false,           // Boolean: Pause on hover, true or false
	  pauseControls: true,    // Boolean: Pause when hovering controls, true or false
	  prevText: "<i class='icon-chevron-left'></i>",   // String: Text for the "previous" button
	  nextText: "<i class='icon-chevron-right'></i>",       // String: Text for the "next" button
	  maxwidth: "",           // Integer: Max-width of the slideshow, in pixels
	  navContainer: "",       // Selector: Where controls should be appended to, default is after the 'ul'
	  manualControls: "",     // Selector: Declare custom pager navigation
	  namespace: "homeslider",   // String: Change the default namespace used
	  before: function(){},   // Function: Before callback
	  after: function(){}     // Function: After callback
	});
});

jQuery(document).ready(function(){
				//Examples of how to assign the Colorbox event to elements
				jQuery(".images").colorbox({rel:'colorbox', width:"60%", height:"60%", retinaImage:true});
				jQuery(".callbacks").colorbox({
					onOpen:function(){ alert('onOpen: colorbox is about to open'); },
					onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
					onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
					onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
					onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
				});

			});
jQuery(document).ready(function () {
     if (jQuery("[data-toggle=tooltip]").length) {
     jQuery("[data-toggle=tooltip]").tooltip();
     }
   });