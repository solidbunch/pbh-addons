<?php

// enqueue admin scripts and styles
add_action( 'enqueue_block_editor_assets', function () {

	$block_name = 'alert-gutenberg';
	//$block_url  = FF_SHORTCODES()->plugin_url . FF_SHORTCODES()->gutenberg_blocks_dir . '/' . $block_name . '/';
	//$assets_url = FF_SHORTCODES()->plugin_url . FF_SHORTCODES()->assets_dir . '/' . $block_name . '/';
	$block_url  = PBH_ADDONS_PLUGIN_URL . '/addons/gutenberg/' . $block_name . '/';
	
	
	// Block Scripts
	/*
	wp_enqueue_script(
		'fruitful-blocks-alert', // Handle
		$block_url . 'block/block.build.js',
		[ 'wp-editor', 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-components' ],
		FF_SHORTCODES()->cache_time,
		true
	);
	*/
	wp_enqueue_script(
		'pbh-alert', // Handle
		$block_url . 'assets/js/block.build.min.js',
		[ 'wp-editor', 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-components' ],
		PBH()->cache_time,
		true
	);
	
	// Block Styles
	/*
	wp_enqueue_style(
		'pbh-alert', // Handle
		$assets_url . '/css/styles.css',
		[ 'wp-edit-blocks' ],
		'b' . PBH()->cache_time
	);
	*/
	wp_enqueue_style(
		'pbh-alert', // Handle
		$block_url . '/assets/css/block-editor.min.css',
		[ 'wp-edit-blocks' ],
		'b' . PBH()->cache_time
	);
	
	// Set translations ( since WP 5.0 )
	if ( function_exists( 'wp_set_script_translations' ) ) {
		wp_set_script_translations( 'pbh-alert', 'page-builder-hub' );
	}
	
	/*
	// pre WP 5.0 with gutenberg plugin
	if ( function_exists( 'gutenberg_get_jed_locale_data' ) ) {
		wp_add_inline_script(
			'pbh-alert',
			sprintf(
				'var pbh_blocks_alert = { localeData: %s };',
				json_encode( gutenberg_get_jed_locale_data( 'ff-shortcodes' ) )
			),
			'before'
		);
	}
	*/
	
} );


// load both front-end + back-end assets
add_action( 'enqueue_block_assets', function () {
	
	if ( ! is_admin() ) {
		wp_enqueue_style( 'pbh-alert' );
		wp_enqueue_script( 'pbh-alert' );
	}
	
} );


// register the block
add_action( 'admin_init', function () {
	register_block_type( 'pbh-blocks/alert-gutenberg', [
		'script' => 'pbh-alert',
	] );
} );