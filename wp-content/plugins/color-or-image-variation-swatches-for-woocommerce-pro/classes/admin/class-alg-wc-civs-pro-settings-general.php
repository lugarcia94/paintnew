<?php
/**
 * Color or Image Variation Swatches for WooCommerce Pro - General Section Settings
 *
 * @version 1.0.0
 * @since   1.0.0
 * @author  Thanks to IT.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

if ( ! class_exists( 'Alg_WC_CIVS_Pro_Settings_General' ) ) {

	class Alg_WC_CIVS_Pro_Settings_General extends Alg_WC_CIVS_Settings_General {

		const OPTION_POSSIBLE_COMBINATIONS           = 'alg_wc_civs_possible_combinations';
		const OPTION_ADD_ATTRIBUTE_IMAGES_ON_GALLERY = 'alg_wc_civs_add_images_on_gal';
		const OPTION_USE_SELECT2                     = 'alg_wc_civs_use_select_2';
		const OPTION_ENQUEUE_SELECT2                 = 'alg_wc_civs_enqueue_select_2';

		/**
		 * get_settings.
		 *
		 * @version 1.0.0
		 * @since   1.0.0
		 */
		function get_settings( $settings = null ) {
			$settings = parent::get_settings( $settings );

			// Removes the end section
			foreach ( $settings as $key => $setting ) {
				if ( $setting['id'] == 'alg_wc_civs_opt' && $setting['type'] == 'sectionend' ) {
					unset( $settings[ $key ] );
				}
			}

			$new_settings = array(
				array(
					'title'   => __( 'Only valid combinations', 'color-or-image-variation-swatches-for-woocommerce' ),
					'desc'    => __( 'Displays only the possible term combinations', 'color-or-image-variation-swatches-for-woocommerce' ),
					'id'      => self::OPTION_POSSIBLE_COMBINATIONS,
					'default' => 'yes',
					'type'    => 'checkbox',
				),
				array(
					'title'   => __( 'Add images on Gallery', 'color-or-image-variation-swatches-for-woocommerce' ),
					'desc'    => __( 'Add attribute images of a variable product on its own gallery', 'color-or-image-variation-swatches-for-woocommerce' ),
					'id'      => self::OPTION_ADD_ATTRIBUTE_IMAGES_ON_GALLERY,
					'default' => 'yes',
					'type'    => 'checkbox',
				),
				array(
					'type' => 'sectionend',
					'id'   => 'alg_wc_civs_opt',
				),
				array(
					'title' => __( 'Select2', 'color-or-image-variation-swatches-for-woocommerce' ),
					'desc'  => __( 'Select2 is library that enhances and improves the native HTML select', 'color-or-image-variation-swatches-for-woocommerce' ),
					'type'  => 'title',
					'id'    => 'alg_wc_select2',
				),
				array(
					'title'    => __( 'Use Select2', 'color-or-image-variation-swatches-for-woocommerce' ),
					'desc'     => __( 'Replaces attributes on frontend by Select2', 'color-or-image-variation-swatches-for-woocommerce' ),
					'desc_tip' => __( 'Useful when you have a bunch of variations', 'color-or-image-variation-swatches-for-woocommerce' ),
					'id'       => self::OPTION_USE_SELECT2,
					'default'  => 'no',
					'type'     => 'checkbox',
				),
				array(
					'title'    => __( 'Load Select2', 'color-or-image-variation-swatches-for-woocommerce' ),
					'desc'     => sprintf( __( 'Loads most recent version of <a target="_blank" href="%s">Select2</a>', 'color-or-image-variation-swatches-for-woocommerce' ), 'https://select2.github.io/' ),
					'desc_tip' => __( 'Mark this only if you are not loading Select2 nowhere else' ),
					'id'       => self::OPTION_ENQUEUE_SELECT2,
					'default'  => 'yes',
					'type'     => 'checkbox',
				),
				array(
					'type' => 'sectionend',
					'id'   => 'alg_wc_select2',
				),

			);

			return array_merge( $settings, $new_settings );
		}

	}
}