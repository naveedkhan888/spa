<?php if (!defined( 'ABSPATH' )) exit;

if( !class_exists('Spalisho_Widgets') ){
	
	class Spalisho_Widgets {

		function __construct(){

			/**
			 * Regsiter Widget
			 */
			add_action( 'widgets_init', array( $this, 'spalisho_register_widgets' ) );

		}
		

		function spalisho_register_widgets() {
		  
		  $args_blog = array(
		    'name' => esc_html__( 'Main Sidebar', 'spalisho'),
		    'id' => "main-sidebar",
		    'description' => esc_html__( 'Main Sidebar', 'spalisho' ),
		    'class' => '',
		    'before_widget' => '<div id="%1$s" class="widget %2$s">',
		    'after_widget' => "</div>",
		    'before_title' => '<h4 class="widget-title">',
		    'after_title' => "</h4>",
		  );
		  register_sidebar( $args_blog );

		  if( spalisho_is_woo_active() ){
		    $args_woo = array(
		      'name' => esc_html__( 'WooCommerce Sidebar', 'spalisho'),
		      'id' => "woo-sidebar",
		      'description' => esc_html__( 'WooCommerce Sidebar', 'spalisho' ),
		      'class' => '',
		      'before_widget' => '<div id="%1$s" class="widget woo_widget %2$s">',
		      'after_widget' => "</div>",
		      'before_title' => '<h4 class="widget-title">',
		      'after_title' => "</h4>",
		    );
		    register_sidebar( $args_woo );
		  }

		 
		  

		}


	}
}

return new Spalisho_Widgets();