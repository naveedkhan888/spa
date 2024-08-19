(function($){
	"use strict";
	
	$(window).on('elementor/frontend/init', function () {
		
        elementorFrontend.hooks.addAction('frontend/element_ready/spalisho_elementor_toggle_content.default', function(){
	   
	        $('.xp-toggle-content .button-toggle').each(function(){
		        $(this).off().on('click', function() {
		            $(this).closest( '.xp-toggle-content' ).toggleClass('toggled');
		        });
		    });
	        
	       	if( $('.xp-toggle-content .site-overlay').length > 0 ){
	        	$('.xp-toggle-content .site-overlay').off().on('click', function () {
		        	$(this).closest( '.xp-toggle-content' ).toggleClass('toggled');
		        });
	        }

	        if( $('.xp-toggle-content .close-menu').length > 0 ){
	        	$('.xp-toggle-content .close-menu').off().on('click', function () {
		        	$(this).closest( '.xp-toggle-content' ).toggleClass('toggled');
		        });
	        }

        });
   });

})(jQuery);