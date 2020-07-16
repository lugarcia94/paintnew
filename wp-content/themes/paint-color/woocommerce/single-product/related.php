<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

            <!-- Showcase -->
            <section class="showcase showcase--featured uk-section uk-section-small">

                <div class="uk-container uk-container-large">

                    <div class="showcase__header uk-grid uk-grid-collapse uk-grid-match" uk-grid>

                        <div class="uk-width-expand">
                            <h2 class="showcase__title">PRODUTOS RELACIONADOS</h2>
                        </div>

                        <!-- <div>
                            <a href="" class="showcase__allview">Ver todos</a>
                        </div> -->

                    </div>

	<section class="related products">

		
		<?php if(wp_is_mobile()):?>
			<ul class="showcase__list uk-grid uk-grid-small uk-child-width-1-1">
		<?php else :?>
			<ul class="showcase__list products uk-slider-items uk-child-width-1-2 uk-child-width-1-3@m uk-grid">
		<?php endif ;?>
			

			<?php foreach ( $related_products as $related_product ) : ?>

				<?php
				 	$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object );

					wc_get_template_part( 'content', 'product' ); ?>

			<?php endforeach; ?>

		</ul>

		</div>

	</section>

	</div>

</section>

<?php endif;

wp_reset_postdata();
