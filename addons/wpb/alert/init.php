<?php
/**
 * Alert Shortcode
 *
 */
use PBH\Model\Abstracts\WPBAbstract;

if ( !class_exists( 'PBH_Alert_WPB' ) ) {
	class PBH_Alert_WPB extends WPBAbstract {

		public function __construct($data) {
			$this->slug = 'pbh_alert';
			$this->dir  = __DIR__;
			$this->url  = plugins_url( '', __FILE__ );
			
			parent::__construct($data);
		}
		
		public function content( $atts, $content = null ) {

			$atts = shortcode_atts( [
				'icon' 			=> '',
				'el_id' 		=> '',
				'style' 		=> '',
				'classes'		=> ''
			], $this->atts($atts), $this->slug );

			if ( $atts['icon'] !== '' ) {
				wp_enqueue_style( 'font-awesome' );
			}

			//\StarterKit\Helper\Assets::enqueue_style( $this->shortcode.'-style', $this->shortcode_uri.'/assets/style.css' );

			$data = $this->data( array(
				'atts'    => $atts,
				'content' => $content,
			));

			return PBH()->View->load( '/view/view', $data, true, $this->dir );
		}

	}
}


