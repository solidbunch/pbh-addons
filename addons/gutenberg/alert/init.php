<?php

defined( 'ABSPATH' ) || exit;

/**
 * Load translations.
 *
 * Passes translations to JavaScript.
 *
 * Registers all block assets.
 */


add_action( 'init', function () {
	
	if ( ! function_exists( 'register_block_type' ) ) {
		// Gutenberg is not active.
		return;
	}
	
	load_plugin_textdomain( 'pbh-blocks-alert', false, basename( __DIR__ ) . '/languages' );
	
	
	// ---------------------------------------------------------------------------------
	// Editor Scripts
	// ---------------------------------------------------------------------------------
	
	wp_register_script(
		'pbh-blocks-alert-editor', // Handle
		plugins_url( 'assets/js/block.build.min.js', __FILE__ ),
		[ 'wp-editor', 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-components' ],
		filemtime( plugin_dir_path( __FILE__ ) . 'assets/js/block.build.min.js' ),
		true
	);
	
	
	// ---------------------------------------------------------------------------------
	// Front Scripts ( enqueued at both : front and back )
	// ---------------------------------------------------------------------------------
	
	wp_register_script(
		'pbh-blocks-alert-front',
		plugins_url( 'assets/js/scripts.min.js', __FILE__ ),
		[ 'jquery' ],
		filemtime( plugin_dir_path( __FILE__ ) . 'assets/js/scripts.min.js' ),
		true
	);
	
	
	// ---------------------------------------------------------------------------------
	// Editor Styles
	// ---------------------------------------------------------------------------------
	
	wp_register_style(
		'pbh-blocks-alert-editor',
		plugins_url( 'assets/css/block-editor.min.css', __FILE__ ),
		[ 'wp-edit-blocks' ],
		filemtime( plugin_dir_path( __FILE__ ) . 'assets/css/block-editor.min.css' )
	);
	
	
	// ---------------------------------------------------------------------------------
	// Front Styles ( enqueued at both : front and back ) 
	// ---------------------------------------------------------------------------------
	
	wp_register_style(
		'pbh-blocks-alert-front',
		plugins_url( 'assets/css/block-style.min.css', __FILE__ ),
		[],
		filemtime( plugin_dir_path( __FILE__ ) . 'assets/css/block-style.min.css' )
	);
	
	
	// ---------------------------------------------------------------------------------
	// BLOCK REGISTRATION
	// ---------------------------------------------------------------------------------
	
	register_block_type( 'pbh-blocks/alert', [
		'editor_script' => 'pbh-blocks-alert-editor', // backend only
		'editor_style'  => 'pbh-blocks-alert-editor', // backend only
		'style'         => 'pbh-blocks-alert-front',  // backend + frontend
		'script'        => 'pbh-blocks-alert-front',  // backend + frontend
	] );
	
	
	// ---------------------------------------------------------------------------------
	// TRANSLATION ( since WP 5.0 )
	// May be extended to wp_set_script_translations( 'my-handle', 'my-domain', plugin_dir_path( MY_PLUGIN ) . 'languages' ) ).
	// For details see * https://make.wordpress.org/core/2018/11/09/new-javascript-i18n-support-in-wordpress/
	// ---------------------------------------------------------------------------------
	
	if ( function_exists( 'wp_set_script_translations' ) ) {
		wp_set_script_translations( 'pbh-blocks-alert-editor', 'pbh-blocks-alert' );
	}
	
} );
