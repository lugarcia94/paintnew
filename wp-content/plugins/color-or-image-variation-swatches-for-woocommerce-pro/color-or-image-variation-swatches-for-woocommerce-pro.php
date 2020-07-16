<?php
/*
Plugin Name: Color or Image Variation Swatches for WooCommerce Pro
Description: Provides new WooCommerce type attributes (color,label,image) for creating beautiful variations
Version: 1.1.2
WC requires at least: 3.0.0
WC tested up to: 3.8
Author: Thanks to IT
Author URI: https://github.com/thanks-to-it
Copyright: © 2017 Thanks to IT.
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Text Domain: color-or-image-variation-swatches-for-woocommerce
Domain Path: /languages
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

// Check if WooCommerce is active
$plugin = 'woocommerce/woocommerce.php';
if (
	! in_array( $plugin, apply_filters( 'active_plugins', get_option( 'active_plugins', array() ) ) ) &&
	! ( is_multisite() && array_key_exists( $plugin, get_site_option( 'active_sitewide_plugins', array() ) ) )
) {
	return;
}

// Autoloader without namespace
if ( ! function_exists( 'alg_wc_civs_pro_autoloader' ) ) {

	/**
	 * Autoloads all classes
	 *
	 * @version 1.0.0
	 * @since   1.0.0
	 *
	 * @param   type $class
	 */
	function alg_wc_civs_pro_autoloader( $class ) {
		if ( false !== strpos( $class, 'Alg_WC_CIVS_Pro' ) ) {
			$classes_dir = array();
			$plugin_dir_path = realpath( plugin_dir_path( __FILE__ ) );
			$classes_dir[0] = $plugin_dir_path . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR;
			$classes_dir[1] = $plugin_dir_path . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR;
			$classes_dir[2] = $plugin_dir_path . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'frontend' . DIRECTORY_SEPARATOR;
			$class_file = 'class-' . strtolower( str_replace( array( '_', "\0" ), array(
						'-',
						'',
					), $class ) . '.php' );

			foreach ( $classes_dir as $key => $dir ) {
				$file = $dir . $class_file;
				if ( is_file( $file ) ) {
					require_once $file;
					break;
				}
			}
		}
	}

	spl_autoload_register( 'alg_wc_civs_pro_autoloader' );
}

// Constants
if ( ! defined( 'ALG_WC_CIVS_PRO_DIR' ) ) {
	define( 'ALG_WC_CIVS_PRO_DIR', untrailingslashit( plugin_dir_path( __FILE__ ) ) . DIRECTORY_SEPARATOR );
}

if ( ! defined( 'ALG_WC_CIVS_PRO_URL' ) ) {
	define( 'ALG_WC_CIVS_PRO_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'ALG_WC_CIVS_PRO_BASENAME' ) ) {
	define( 'ALG_WC_CIVS_PRO_BASENAME', plugin_basename( __FILE__ ) );
}

if ( ! defined( 'ALG_WC_CIVS_PRO_FOLDER_NAME' ) ) {
	define( 'ALG_WC_CIVS_PRO_FOLDER_NAME', untrailingslashit( plugin_dir_path( plugin_basename( __FILE__ ) ) ) );
}

if ( ! function_exists( 'color_or_image_variation_swatches_for_wc' ) ) {
	/**
	 * Returns the main instance of Alg_WC_CIVS_Pro_Core to prevent the need to use globals.
	 *
	 * @version 1.0.0
	 * @since   1.0.0
	 * @return  Alg_WC_CIVS_Pro_Core
	 */
	function color_or_image_variation_swatches_for_wc() {
		return Alg_WC_CIVS_Pro_Core::instance();
	}
}

add_action( 'plugins_loaded', 'alg_wc_civs_pro_plugins_loaded' );


function alg_wc_civs_pro_plugins_loaded() {


	if ( defined( 'ALG_WC_CIVS_BASENAME' ) ) {
		// Disable free version
		add_action( 'admin_init', function () {
			deactivate_plugins( ALG_WC_CIVS_BASENAME );
		} );
	} else {
		// Includes composer dependencies
		require __DIR__ . '/vendor/autoload.php';

		alg_wc_civs_start_plugin();
	}

	//require __DIR__ . '/vendor/autoload.php';
}