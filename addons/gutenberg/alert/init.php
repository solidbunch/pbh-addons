<?php

defined( 'ABSPATH' ) || exit;

/**
 * Alert Gutenberg Block
 *
 *
 */
use PBH\Model\Gutenberg;

if ( !class_exists( 'PBH_Alert_Gutenberg' ) ) {
    class PBH_Alert_Gutenberg extends Gutenberg {

        public function __construct() {
            parent::__construct();

            $this->slug = 'alert';
            $this->dir = __DIR__;
			$this->url = plugins_url( '', __FILE__);
        }
    }
}