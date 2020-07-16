<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>



<li <?php wc_product_class( 'showcase__list-item', $product ); ?>  >
    <div class="uk-card uk-card-default uk-card-body uk-card-small uk-border-rounded">
        <button class="showcase__giftlist">
            <?php echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );?>
        </button>
        <div class="uk-flex uk-flex-middle uk-flex-center">
            <figure class="showcase__figure uk-card-media-left uk-cover-container">
                <?php do_action( 'woocommerce_before_shop_loop_item_title' );?>
                <?php //echo get_the_post_thumbnail( $product->ID, 'medium', array('class' => 'showcase__image') ); ?>
            </figure>
        </div>

        <h3 class="showcase__name">
            <a href="<?php echo get_permalink( $product->ID); ?>" class="showcase__link"><?php echo get_the_title($product->ID);?></a>
        </h3>

        <div class="showcase__data">
            <?php
                $_product = wc_get_product( $product->ID );
            ?>
            <strong class="showcase__offer"><?php do_action( 'woocommerce_after_shop_loop_item_title' );?></strong>
        </div>

        <div class="showcase__labels">
            <span class="showcase__label frete-gratis">FRETE GRÁTIS</span>
        </div>

    </div>
</li>
