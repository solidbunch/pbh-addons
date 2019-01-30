<?php

defined( 'ABSPATH' ) || exit;

/**
 * Alert Gutenberg Block
 *
 */

use PBH\Model\Gutenberg;

if ( ! class_exists( 'PBH_Alert_Gutenberg' ) ) {
	class PBH_Alert_Gutenberg extends Gutenberg {
		
		public function __construct() {
			parent::__construct();
			
			$this->slug = 'alert';
			$this->dir  = __DIR__;
			$this->url  = plugins_url( '', __FILE__ );
			
			
			// --------------------------------------------------------------
			//  Example to enqueue additional assets (plugins such as slick) 
			// --------------------------------------------------------------
			/*
			// enqueue back-end assets only
			$this->enqueue_block_editor_assets( [
				[
					'type'          => 'script',
					'handle_suffix' => 'slick',
					'filename'      => 'slack_alert.js',
					// .. OPTIONAL
				],
				[
					'type'          => 'style',
					'handle_suffix' => 'slick',
					'filename'      => 'slack_alert.css',
					'deps'          => [ 'wp-edit-blocks' ], // OPTIONAL
					// .. OPTIONAL
				]
			] );
			
			// load both front-end + back-end assets
			$this->enqueue_block_assets( [
				[
					'type'          => 'script',
					'target'        => 'frontend', // 'backend', 'frontend', 'all'
					'handle_suffix' => 'slick',
					'filename'      => 'slack_alert2.js',
					'deps'          => [ 'jquery' ], // OPTIONAL
					'ver'           => 1111,         // OPTIONAL
					'in_footer'     => true          // OPTIONAL
				],
				[
					'type'          => 'style',
					'target'        => 'frontend', // 'backend', 'frontend', 'all'
					'handle_suffix' => 'slick',
					'filename'      => 'slack_alert2.css',
					'deps'          => [],   // OPTIONAL,  [] - frontend,  [ 'wp-edit-blocks' ] - backend 
					'ver'           => 1111, // OPTIONAL
					'media'         => 'all' // OPTIONAL
				]
			] );
			*/
			
		}
	}
}