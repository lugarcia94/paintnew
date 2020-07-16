<?php
/**
 * Color or Image Variation Swatches for WooCommerce Pro - Gallery option
 *
 * Handles the admin part of the new WooCommerce variation types
 *
 * @version 1.0.0
 * @since   1.0.0
 * @author  Thanks to IT.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

if ( ! class_exists( 'Alg_WC_CIVS_Pro_Option_Gallery' ) ) {

	class Alg_WC_CIVS_Pro_Option_Gallery {

		/**
		 * Constructor.
		 *
		 * @version 1.0.0
		 * @since   1.0.0
		 */
		function __construct() {
			add_filter( 'woocommerce_product_get_gallery_image_ids', array(
				$this,
				'add_image_attributes_on_gallery',
			), 10, 2 );
		}

		/**
		 * Adds image attributes on variable product gallery
		 *
		 * @param $gallery
		 * @param $product
		 *
		 * @return array|void
		 */
		public function add_image_attributes_on_gallery( $gallery, $product ) {
			if ( is_admin() ) {
				return $gallery;
			}

			if ( ! is_a( $product, 'WC_Product_Variable' ) ) {
				return $gallery;
			}

			if ( ! filter_var( get_option( Alg_WC_CIVS_Pro_Settings_General::OPTION_ADD_ATTRIBUTE_IMAGES_ON_GALLERY ), FILTER_VALIDATE_BOOLEAN ) ) {
				return $gallery;
			}

			$civs                = color_or_image_variation_swatches_for_wc();
			$admin               = $civs->get_admin();
			$types               = $admin->wc_attribute_types;
			$wc_functions        = $civs->get_wc_functions();
			$attributes          = $product->get_attributes();
			$has_image_attribute = false;
			$final_attribute     = '';

			// Check if variable product has image terms
			foreach ( $attributes as $key => $attribute ) {
				$attr_taxonomy = $wc_functions->get_attribute_taxonomy_by_attribute( $key );
				if ( $attr_taxonomy->attribute_type == 'alg_wc_civs_image' ) {
					$final_attribute     = $key;
					$has_image_attribute = true;
				}
			}
			if ( ! $has_image_attribute ) {
				return $gallery;
			}

			// Get images
			$terms = wc_get_product_terms( $product->get_id(), $final_attribute, array( 'fields' => 'all' ) );
			foreach ( $terms as $term ) {
				$value     = get_term_meta( $term->term_id, 'alg_wc_civs_term_image_image_id', true );
				$gallery[] = $value;
			}

			return $gallery;
		}
	}
}