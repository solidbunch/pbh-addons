<?php

defined( 'ABSPATH' ) || exit;

/**
 * Alert Gutenberg Block
 *
 */

use PBH\Model\Abstracts\GutenbergAbstract;

if ( ! class_exists( 'PBH_Alert_Gutenberg' ) ) {
	class PBH_Alert_Gutenberg extends GutenbergAbstract {
		
		public function __construct() {
			parent::__construct();
			
			$this->slug = 'alert';
			$this->dir  = __DIR__;
			$this->url  = plugins_url( '', __FILE__ );
			
		}
		
		
		/**
		 * Register Block Type
		 */
		public function register_block_type() {
			
			register_block_type( "pbh-blocks/{$this->slug}", [
				'editor_script' => "pbh-blocks-{$this->slug}-editor", // backend only
				'editor_style'  => "pbh-blocks-{$this->slug}-editor", // backend only
				'style'         => "pbh-blocks-{$this->slug}-front",  // backend + frontend
				'script'        => "pbh-blocks-{$this->slug}-front",  // backend + frontend
				//'attributes'      => [],               // for dynamic Block
				//'render_callback' => function () {},   // for dynamic Block
			] );
		}
		
	}
}