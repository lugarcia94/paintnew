<?php
/**
 * Color or Image Variation Swatches for WooCommerce Pro - Core Class
 *
 * @version 1.0.0
 * @since   1.0.0
 * @author  Thanks to IT.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

if ( ! class_exists( 'Alg_WC_CIVS_Pro_Core' ) ) {

	class Alg_WC_CIVS_Pro_Core extends Alg_WC_CIVS_Core {

		/**
		 * Main Alg_WC_CIVS_Pro_Core Instance
		 *
		 * @version 1.0.0
		 * @since   1.0.0
		 * @static
		 * @return  Alg_WC_CIVS_Pro_Core - Main instance
		 */
		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}

			return self::$_instance;
		}

		/**
		 * Initialize frontend
		 *
		 * @version 1.0.0
		 * @since   1.0.0
		 */
		protected function init_frontend() {
			new Alg_WC_CIVS_Pro_Frontend();
		}

		/**
		 * Init admin fields
		 *
		 * @version 1.0.0
		 * @since   1.0.0
		 */
		public function init_admin() {
			// Creates settings tabs
			add_filter( 'woocommerce_get_settings_pages', array( $this, 'add_woocommerce_settings_tab' ) );

			// Creates action links on plugins page
			add_filter( 'plugin_action_links_' . ALG_WC_CIVS_PRO_BASENAME, array( $this, 'action_links' ) );

			// Create custom settings fields
			$this->create_custom_settings_fields();

			// Admin setting options inside WooCommerce
			new Alg_WC_CIVS_Pro_Settings_General();

			// Update version
			if ( is_admin() && get_option( 'alg_wc_civs_version', '' ) !== $this->version ) {
				update_option( 'alg_wc_civs_version', $this->version );
			}

			// Handles the admin part of the new WooCommerce variation types
			$this->admin = $this->get_admin();
			$this->admin->init();
		}


	}
}