<?php
	if(defined('SPALISHO_URL') 	== false) 	define('SPALISHO_URL', get_template_directory());
	if(defined('SPALISHO_URI') 	== false) 	define('SPALISHO_URI', get_template_directory_uri());

	load_theme_textdomain( 'spalisho', SPALISHO_URL . '/languages' );

	// Main Feature
	require_once( SPALISHO_URL.'/inc/class-main.php' );

	// Functions
	require_once( SPALISHO_URL.'/inc/functions.php' );

	// Hooks
	require_once( SPALISHO_URL.'/inc/class-hook.php' );

	// Widget
	require_once (SPALISHO_URL.'/inc/class-widgets.php');
	

	// Elementor
	if (defined('ELEMENTOR_VERSION')) {
		require_once (SPALISHO_URL.'/inc/class-elementor.php');
	}
	
	// WooCommerce
	if (class_exists('WooCommerce')) {
		require_once (SPALISHO_URL.'/inc/class-woo.php');	
	}
	
	
	/* Customize */
	if( current_user_can('customize') ){
	    require_once SPALISHO_URL.'/customize/custom-control/google-font.php';
	    require_once SPALISHO_URL.'/customize/custom-control/heading.php';
	    require_once SPALISHO_URL.'/inc/class-customize.php';
	}
    
   
	require_once ( SPALISHO_URL.'/install-resource/active-plugins.php' );
	

	
	