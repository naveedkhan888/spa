(function($){
	"use strict";
	

	$(window).on('elementor/frontend/init', function () {
		
        
		elementorFrontend.hooks.addAction('frontend/element_ready/spalisho_elementor_counter.default', function(){

			$(".xp-counter").appear(function(){
				var count    = $(this).attr('data-count');
				var odometer = $(this).closest('.xp-counter').find('.odometer');

		        setTimeout(function(){
				    odometer.html(count);
				}, 500);
				
		    });
		    
		});


   });

})(jQuery);
