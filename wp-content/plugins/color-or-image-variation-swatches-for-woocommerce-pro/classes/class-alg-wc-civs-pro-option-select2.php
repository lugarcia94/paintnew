<?php
/**
 * Color or Image Variation Swatches for WooCommerce Pro - Select2 option
 *
 * Handles the admin part of the new WooCommerce variation types
 *
 * @version 1.1.0
 * @since   1.0.0
 * @author  Thanks to IT.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

if ( ! class_exists( 'Alg_WC_CIVS_Pro_Option_Select2' ) ) {

	class Alg_WC_CIVS_Pro_Option_Select2 {

		/**
		 * Constructor.
		 *
		 * @version 1.0.0
		 * @since   1.0.0
		 */
		function __construct() {
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ), 10 );
			add_filter( 'alg_wc_civs_localize', array( $this, 'localize_scripts' ) );
		}

		/**
		 * Load scripts and styles
		 *
		 * @version 1.1.0
		 * @since   1.0.0
		 */
		public function localize_scripts( $localize_object ) {
			if (
				! filter_var( get_option( Alg_WC_CIVS_Pro_Settings_General::OPTION_USE_SELECT2 ), FILTER_VALIDATE_BOOLEAN ) ||
				! wp_script_is( 'alg-select2', 'enqueued' )
			) {
				return $localize_object;
			}
			$localize_object['use_select2'] = true;


			$css = '
				.alg-wc-civs-original-select{
					display:block;
				}
				.alg-wc-civs-attribute{
					display:none;
				}
			';
			wp_add_inline_style( 'alg-wc-civs', $css );


			return $localize_object;
		}

		/**
		 * Load scripts and styles
		 *
		 * @version 1.1.0
		 * @since   1.0.0
		 */
		public function enqueue_scripts() {
			// Select2
			$select2_opt_enqueue = filter_var( get_option( Alg_WC_CIVS_Pro_Settings_General::OPTION_ENQUEUE_SELECT2, true ), FILTER_VALIDATE_BOOLEAN );
			$select2_opt_use     = filter_var( get_option( Alg_WC_CIVS_Pro_Settings_General::OPTION_USE_SELECT2, true ), FILTER_VALIDATE_BOOLEAN );

			// Checks if it is product page
			if ( ! is_product() ) {
				return;
			}

			// Checks if it is a variable product
			global $post;
			$product = wc_get_product( $post );
			if ( ! is_a( $product, 'WC_Product_Variable' ) ) {
				return;
			}

			if ( $select2_opt_enqueue ) {
				wp_register_script( 'alg-select2', '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js', array( 'jquery' ), false, true );
				wp_enqueue_script( 'alg-select2' );
				wp_register_style( 'alg-select2', '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css', array(), false );
				wp_enqueue_style( 'alg-select2' );
			}
		}
	}
}