<?php
/**
 * Color or Image Variation Swatches for WooCommerce Pro - Frontend
 *
 * Handles the admin part of the new WooCommerce variation types
 *
 * @version 1.1.2
 * @since   1.0.0
 * @author  Thanks to IT.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

if ( ! class_exists( 'Alg_WC_CIVS_Pro_Frontend' ) ) {

	class Alg_WC_CIVS_Pro_Frontend extends Alg_WC_CIVS_Frontend {

		/**
		 * Constructor.
		 *
		 * @version 1.0.0
		 * @since   1.0.0
		 */
		function __construct() {
			parent::__construct();

			// Handles admin option to save images on gallery
			new Alg_WC_CIVS_Pro_Option_Gallery();

			// Handles admin option to use Select 2
			new Alg_WC_CIVS_Pro_Option_Select2();
		}

		/**
		 * Load scripts and styles
		 *
		 * @version 1.1.2
		 * @since   1.0.0
		 */
		function enqueue_scripts() {
			if (
				'yes' === get_option( Alg_WC_CIVS_Settings_General::OPTION_SCRIPTS_ON_PRODUCT_PAGE, 'yes' ) &&
				! is_product()
			) {
				return;
			}
			$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

			// Main js file
			$js_file = 'assets/dist/frontend/js/alg-wc-civs' . $suffix . '.js';
			$js_ver  = date( "ymd-Gis", filemtime( ALG_WC_CIVS_PRO_DIR . $js_file ) );
			wp_register_script( 'alg-wc-civs', ALG_WC_CIVS_PRO_URL . $js_file, array( 'jquery' ), $js_ver, true );
			wp_enqueue_script( 'alg-wc-civs' );

			// Main css file
			$css_file = 'assets/dist/frontend/css/alg-wc-civs' . $suffix . '.css';
			$css_ver  = date( "ymd-Gis", filemtime( ALG_WC_CIVS_PRO_DIR . $css_file ) );
			wp_register_style( 'alg-wc-civs', ALG_WC_CIVS_PRO_URL . $css_file, array(), $css_ver );
			wp_enqueue_style( 'alg-wc-civs' );

			// Localize script
			$localize_obj = array(
				'only_valid_term_combinations' => filter_var( get_option( Alg_WC_CIVS_Pro_Settings_General::OPTION_POSSIBLE_COMBINATIONS ), FILTER_VALIDATE_BOOLEAN ),
			);
			wp_localize_script( 'alg-wc-civs', 'alg_wc_civs_opt', apply_filters( 'alg_wc_civs_localize', $localize_obj ) );
		}
	}
}