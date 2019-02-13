<?php
/**
 * Alert Shortcode
 *
 */

use PBH\Model\Abstracts\WPBAbstract;

/*
if ( ! class_exists( 'PBH_Alert_Gutenberg' ) ) {
	class PBH_Alert_Gutenberg extends GutenbergAbstract {
		
		public function __construct() {
			parent::__construct();
			
			$this->slug = 'alert';
			$this->dir  = __DIR__;
			$this->url  = plugins_url( '', __FILE__ );
			
		}
		
	}
}

*/

if ( !class_exists( 'PBH_Alert_WPB' ) ) {
	class PBH_Alert_WPB extends WPBAbstract {

		public function content( $atts, $content = null ) {

			$atts = shortcode_atts( [
				'icon' 			=> '',
				'el_id' 		=> '',
				'style' 		=> '',
				'classes'		=> ''
			], $this->atts($atts), $this->shortcode );

			if ( $atts['icon'] <> '' ) {
				wp_enqueue_style( 'font-awesome' );
			}

			\StarterKit\Helper\Assets::enqueue_style( $this->shortcode.'-style', $this->shortcode_uri.'/assets/style.css' );

			$data = $this->data( array(
				'atts'    => $atts,
				'content' => $content,
			));

			return Starter_Kit()->View->load( '/view/view', $data, true, $this->shortcode_dir );
		}

	}
}


