<?php
/**
 * Alert : WPBa Addon
 *
 **/

if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_Alert extends WPBakeryShortCode {

		protected function content( $atts, $content = null ) {

			$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

			return PBH()->Controller->Shortcodes->content($this->settings['base'], $atts, $content);
		}

	}
}