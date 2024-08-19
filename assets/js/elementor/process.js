(function($){
	"use strict";
	

	$(window).on('elementor/frontend/init', function () {
		
        elementorFrontend.hooks.addAction('frontend/element_ready/spalisho_elementor_process.default', function(){
	       
	        /* Add your code here */
	      	$('.xp-process .xp-invisible').each(function() {
	      		var that = $(this);

	      		if ( $(window).width() <= 1024 ) {
	      			that.removeClass('xp-invisible')
	      		} else {
	      			that.appear(function(){
		   				var data_animation = that.data('animation');

		   				if ( data_animation ) {
		   					var animation 	= data_animation['animation'];
		   					var duration 	= data_animation['duration'];
		   					var delay 		= data_animation['delay'] ? data_animation['delay'] : 0;

		   					setTimeout(function () {
		   						that.removeClass('xp-invisible').addClass('animated').addClass(animation);
		   						if ( duration ) {
		   							that.addClass(  'animated-' + duration );
		   						}
						    }, delay);
		   				}
		   			});
	      		}
	      	});

        });

   });

})(jQuery);
