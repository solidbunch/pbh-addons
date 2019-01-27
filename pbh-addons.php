<?php
/*
 * Dev Addons for Page Builder Hub
 *
 * @category   Wordpress
 * @package    PBH Addons
 * @author     SolidBunch
 * @link       https://solidbunch.com
 * @version    Release: 1.0.0
 * @since      1.0.0
 *
 * Plugin Name: PBH Addons
 * Description: Plugin for SolidBunch developers
 * Version: 1.0.0
 * Author: SolidBunch
 * Author URI: https://solidbunch.com
 * License: GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: pbh-addons
 * Domain Path: /languages
 *
 */

if ( ! defined( 'PBH_ADDONS_PLUGIN_DIR' ) ) {
    define( 'PBH_ADDONS_PLUGIN_DIR', untrailingslashit(plugin_dir_path( __FILE__ )) );
}
if ( ! defined( 'PBH_ADDONS_PLUGIN_URL' ) ) {
    define( 'PBH_ADDONS_PLUGIN_URL', untrailingslashit(plugin_dir_url( __FILE__ )) );
}

add_action('pbh/addons-dirs', function($args) {
	$args[] = PBH_ADDONS_PLUGIN_DIR . '/addons';
	return $args;
});
