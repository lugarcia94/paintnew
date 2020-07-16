<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); 

global $product;

?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php while ( have_posts() ) : the_post(); ?>


    <section class="product">
        <?php if(!wp_is_mobile()){?>
            <div class="uk-container uk-container-large">
        <?php };?>
                <div class="product__card uk-card uk-card-default uk-card-small">
                    
                    <div class="uk-grid uk-grid-collapse">

                        <div>
                            <div class="uk-grid uk-grid-small uk-child-width-expand" uk-grid>

                                

                                <?php if(wp_is_mobile()):?>
                                    <div class="product__col-1 uk-width-1-1">
                                <?php else :?>
                                    <div class="product__col-1 uk-width-3-5">
                                <?php endif ;?>
                                    
                                    <div class="product__image">

                                    <?php echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );?>
                                    

                                    <?php
                                        /**
                                         * Hook: woocommerce_before_single_product_summary.
                                         *
                                         * @hooked woocommerce_show_product_sale_flash - 10
                                         * @hooked woocommerce_show_product_images - 20
                                         */
                                        do_action( 'woocommerce_before_single_product_summary' );
                                    ?>
                                    </div>
                                    <?php if(!wp_is_mobile()){?>
                                        <ul class="product__groupinfo-list product__groupinfo--description" uk-accordion="multiple: true">
                                            <li class="uk-open">
                                                <a class="uk-accordion-title" href="#">
                                                    <div class="product__groupinfo-inner">
                                                        <span class="product__groupinfo-inner-content description-title">
                                                            <span>Descrição</span>
                                                            <?php if(wp_is_mobile()):?><svg class="icon icon-arrow-left"><use xlink:href="#icon-arrow-left"></use></svg><?php endif ;?>
                                                        </span>
                                                    </div>
                                                </a>
                                                
                                                <div class="uk-accordion-content">
                                                    <div class="product__description">
                                                    <?php the_excerpt(); ?>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    <?php };?>
                                        
                                </div>

                                
                                <?php if(wp_is_mobile()):?>
                                    <div class="product__col-2">
                                <?php else :?>
                                    <div class="product__col-2 uk-width-2-5">
                                <?php endif ;?>
                                

                                    <h1 class="product__name ">
                                        <?php the_title()?>
                                    </h1>

                                    <?php
                                    /**
                                     * Hook: woocommerce_single_product_summary.
                                     *
                                     * @hooked woocommerce_template_single_title - 5
                                     * @hooked woocommerce_template_single_rating - 10
                                     * @hooked woocommerce_template_single_price - 10
                                     * @hooked woocommerce_template_single_excerpt - 20
                                     * @hooked woocommerce_template_single_add_to_cart - 30
                                     * @hooked woocommerce_template_single_meta - 40
                                     * @hooked woocommerce_template_single_sharing - 50
                                     * @hooked WC_Structured_Data::generate_product_data() - 60
                                     */
                                    // do_action( 'woocommerce_single_product_summary' );
                                    
                                    ?>

                                    <div class="product__review-top">
                                        <span class="product__code">SKU: <?php echo $product->get_sku(); ?></span> 
                                        <?php woocommerce_template_single_rating();?>
                                    </div>


                                    <div class="product__price product">
                                        <?php
                                            woocommerce_template_single_price();
                                        ?>
                                    </div>

                                    <div class="product__buy">
                                        <?php woocommerce_template_single_add_to_cart();?>
                                    </div>


                                    <div class="product__groupinfo">

                                        <ul class="product__groupinfo-list" uk-accordion="multiple: true">
                                            <li>
                                                <a class="uk-accordion-title" href="#">
                                                    <div class="product__groupinfo-inner">
                                                    <svg class="icon icon-garantia"><use xlink:href="#icon-garantia"></use></svg>

                                                        <span class="product__groupinfo-inner-content">
                                                            <span>Garantia da loja</span>
                                                            Saiba mais sobre a garantia dos produtos
                                                            <svg class="icon icon-arrow-left"><use xlink:href="#icon-arrow-left"></use></svg>
                                                        </span>
                                                    </div>
                                                </a>
                                                <div class="uk-accordion-content">
                                                    <?php $garantia = get_theme_mod( 'garantia_da_loja' ); ;?>
                                                <p><?php echo $garantia;?></p>
                                                </div>

                                            </li>

                                            <?php if(wp_is_mobile()){?>
                                                <li>
                                                    <a class="uk-accordion-title" href="#">
                                                        <div class="product__groupinfo-inner">
                                                            <span class="product__groupinfo-inner-content description-title">
                                                                <span>Descrição</span>
                                                                <?php if(wp_is_mobile()):?><svg class="icon icon-arrow-left"><use xlink:href="#icon-arrow-left"></use></svg><?php endif ;?>
                                                            </span>
                                                        </div>
                                                    </a>
                                                    
                                                    <div class="uk-accordion-content">
                                                        <div class="product__description">
                                                        <?php the_excerpt(); ?>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php };?>

                                            <li class="uk-open">
                                                <a class="uk-accordion-title" href="#">
                                                    <div class="product__groupinfo-inner">
                                                        <span class="product__groupinfo-inner-content">
                                                            <span>Características</span>
                                                            <svg class="icon icon-arrow-left"><use xlink:href="#icon-arrow-left"></use></svg>
                                                        </span>
                                                    </div>
                                                </a>
                                                <div class="uk-accordion-content">
                                                    <?php 
                                                        global $product;
                                                        echo wc_display_product_attributes( $product );
                                                    ;?>
                                                </div>

                                            </li>
                                        </ul>

                                    </div>


                                    

                                </div>   
                                                             
                            </div>
                        </div>

                        <div>

                        </div>

                    </div>

                </div>

            <?php if(!wp_is_mobile()){?>
            </div>
            <?php };?>
        </section>




        <?php woocommerce_output_related_products();?>



				
		<?php endwhile; // end of the loop. ?>





<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
