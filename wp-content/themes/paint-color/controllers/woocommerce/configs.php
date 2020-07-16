<?php

/**
 * Set WooCommerce image dimensions upon theme activation
 */
// Remove each style one by one
add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
	unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
	unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
	return $enqueue_styles;
}

add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

/**
 * Change several of the breadcrumb defaults
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );
function jk_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => '',
            'wrap_before' => '<nav class="woocommerce-breadcrumb breadcrumb uk-section uk-section-xsmall" itemprop="breadcrumb"><div class="uk-container uk-container-large"><ul class="uk-breadcrumb">',
            'wrap_after'  => '</ul></div></nav>',
            'before'      => '<li><svg class="icon-arrow-left"><use xlink:href="#icon-arrow-left"></use></svg>',
            'after'       => '</li>',
            'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
        );
}

add_filter('cfpp_hook_location', function() {
    // Aqui o original é "woocommerce_before_add_to_cart_button". Note que estamos mudando para "woocommerce_after_add_to_cart_button". Veja a lista completa de filtros do WooCommerce aqui: https://wcsuccessacademy.com/woocommerce-visual-hook-guide-single-product-page/
    return 'woocommerce_after_add_to_cart_button';
});



add_filter( 'add_to_cart_text', 'woo_custom_single_add_to_cart_text' );                // < 2.1
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_single_add_to_cart_text' );  // 2.1 +
  
function woo_custom_single_add_to_cart_text() {
  
    return __( 'Adicionar no carrinho', 'woocommerce' );
  
}


/**
 * Change number of related products output
 */ 
function woo_related_products_limit() {
    global $product;
      
      $args['posts_per_page'] = 6;
      return $args;
  }
  add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args', 20 );
    function jk_related_products_args( $args ) {
      $args['posts_per_page'] = 3; // 4 related products
      $args['columns'] = 3; // arranged in 2 columns
      return $args;
  }


function wooc_extra_register_fields() {?>
    <p class="form-row form-row-first">
    <label for="reg_billing_postcode">Informe seu CEP</label>
    <input type="text" class="input-text" name="billing_postcode" id="reg_billing_postcode" value="<?php if ( ! empty( $_POST['billing_postcode'] ) ) esc_attr_e( $_POST['billing_postcode'] ); ?>" />
    </p>
    <div class="clear"></div>
    <?php
}
add_action( 'woocommerce_register_form', 'wooc_extra_register_fields' );


/**

* register fields Validating.

*/

function wooc_validate_extra_register_fields( $username, $email, $validation_errors ) {

    if ( isset( $_POST['billing_postcode'] ) && empty( $_POST['billing_postcode'] ) ) {

           $validation_errors->add( 'billing_postcode_error', __( '<strong>Error</strong>: Cep é obrigatório', 'woocommerce' ) );

    }
       return $validation_errors;
}

add_action( 'woocommerce_register_post', 'wooc_validate_extra_register_fields', 10, 3 );


add_filter( 'woocommerce_get_image_size_gallery_thumbnail', function( $size ) {
    return array(
        'width' => 150,
        'height' => 150,
        'crop' => 0,
    );
} );

// REORDENAR ITENS DO CHECKOUT

// add_filter("woocommerce_checkout_fields", "woocommerce_reorder_checkout_fields", 9999);

// if ( ! function_exists( 'woocommerce_reorder_checkout_fields' ) ) {
//     function woocommerce_reorder_checkout_fields( $fields ) {

//         /* To reorder state field you need to add this array. */
//         $order = array(
//         "billing_phone",
//         "billing_first_name", 
//         "billing_last_name", 
//         "billing_country", 
//         "billing_state", 
//         "billing_address_1", 
//         "billing_address_2", 
//         "billing_email", 
//         );

//         foreach($order as $field) {
//         $ordered_fields[$field] = $fields["billing"][$field];
//         }

//         $fields["billing"] = $ordered_fields;

//         /* To change email and phone number you have to add only class no need to add priority. */

//         $fields['billing']['billing_email']['class'][0] = 'form-row-first';
//         $fields['billing']['billing_phone']['class'][0] = 'form-row-last';

//     return $fields;
//     }
// }

// add_filter( 'woocommerce_checkout_fields', 'misha_email_first' );
 
// function misha_email_first( $checkout_fields ) {
// 	$checkout_fields['billing']['billing_email']['priority'] = 0;
// 	$checkout_fields['billing']['billing_first_name']['priority'] = 1;
// 	$checkout_fields['billing']['billing_last_name']['priority'] = 2;
// 	$checkout_fields['billing']['billing_first_name']['class'][0] = 'form-row-first';
// 	$checkout_fields['billing']['billing_last_name']['class'][0] = 'form-row-last';
// 	return $checkout_fields;
// }

// add_filter( 'woocommerce_default_address_fields', 'custom_override_default_locale_fields' );
// function custom_override_default_locale_fields( $fields ) {
//     $fields['state']['priority'] = 5;
//     $fields['address_1']['priority'] = 6;
//     $fields['address_2']['priority'] = 7;
//     return $fields;
// }