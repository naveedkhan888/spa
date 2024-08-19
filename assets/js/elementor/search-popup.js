(function($){
	"use strict";
	

	$(window).on('elementor/frontend/init', function () {
		
        elementorFrontend.hooks.addAction('frontend/element_ready/spalisho_elementor_search_popup.default', function(){
	       
	        /* Add your code here */
	    	
	    	$( '.xp_wrap_search_popup i' ).on( 'click', function(){
                $( this ).closest( '.xp_wrap_search_popup' ).toggleClass( 'show' );
            });

            $( '.search-popup__overlay' ).on( 'click', function(){
                $( this ).closest( '.xp_wrap_search_popup' ).removeClass( 'show' );
            });
      
        });
   });

})(jQuery);
