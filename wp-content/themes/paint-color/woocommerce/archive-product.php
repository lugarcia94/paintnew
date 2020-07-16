<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );?>
<?php // get the current taxonomy term
    $term = get_queried_object();
    // vars
    $sliders = get_field('banner_full', $term);
    $slidersMobile = get_field('banner_full_mobile', $term);
    $titulominibanners = get_field('titulo_mini_banners', $term);
    $minibanners = get_field('mini_banners', $term);

?>
<?php if( wp_is_mobile() ): ?>
    <?php if( $slidersMobile ): ?>
        <section class="category__banners">
            <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider="sets: true">
                <ul class="uk-slider-items uk-child-width-1-1">
                <?php foreach( $slidersMobile as $sliderMobile):?>
                    <?php 
                        setup_postdata($sliderMobile->ID); 
                    ?>
                    <li>
                        <a href="<?php echo $sliderMobile['url']; ?>">
                            <img src="<?php echo $sliderMobile['imagem']; ?>" alt="" uk-img="target: !.uk-slideshow-items">
                        </a>
                    </li>
                <?php endforeach; ?>
                </ul>
                <?php wp_reset_postdata();?>
                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
            </div>
        </section>
    <?php endif; ?>
<?php else :?>
    <?php if( $sliders ): ?>
        <section class="category__banners">
            <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider="sets: true">
                <ul class="uk-slider-items uk-child-width-1-1">
                <?php foreach( $sliders as $slider):?>
                    <?php 
                        setup_postdata($slider->ID); 
                    ?>
                    <li>
                        <a href="<?php echo $slider['url']; ?>">
                            <img src="<?php echo $slider['imagem']; ?>" alt="" uk-img="target: !.uk-slideshow-items">
                        </a>
                    </li>
                <?php endforeach; ?>
                </ul>
                <?php wp_reset_postdata();?>
                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?>

<?php if($titulominibanners):?>
<section class="archive_title">
    <h1><?php echo $titulominibanners;?></h1>
</section>
<?php endif;?>

<?php if($minibanners) :?>
    <section class=" uk-container uk-container-large">
        <div class="minibanners_container">
        <ul class="minibanners">
        
        <?php foreach( $minibanners as $minibanner):?>
                <?php 
                    setup_postdata($minibanner->ID); 
                ?>
                <li>
                    <a href="<?php echo $minibanner['url']; ?>">
                        <img src="<?php echo $minibanner['imagem']; ?>" alt="">
                        <h3><?php echo $minibanner['titulo'];?></h3>
                        <p><?php echo $minibanner['texto'];?></p>
                        <div class="link_more">Ver mais</div>
                    </a>
                </li>
            <?php endforeach; ?>
        
        </ul>
        </div>
    </section>
<?php endif;?>

<div class="uk-container uk-container-large">

<?php
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
<header class="woocommerce-products-header">
	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
</header>

<div class="uk-grid">
    
    <?php /**
     * Hook: woocommerce_sidebar.
     *
     * @hooked woocommerce_get_sidebar - 10
     */
    do_action( 'woocommerce_sidebar' );?>


    <div class="uk-width-expand@m">

        <?php
        if ( woocommerce_product_loop() ) {?>
            <div class="catalog-header">

                <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                    <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
                <?php endif; ?>
                <?php /**
                 * Hook: woocommerce_before_shop_loop.
                 *
                 * @hooked woocommerce_output_all_notices - 10
                 * @hooked woocommerce_result_count - 20
                 * @hooked woocommerce_catalog_ordering - 30
                 */
                do_action( 'woocommerce_before_shop_loop' );?>
            </div>

            <?php woocommerce_product_loop_start();?>
            <div class="uk-child-width-1-3@m uk-grid-match uk-grid">
            <?php 
            if ( wc_get_loop_prop( 'total' ) ) {
                while ( have_posts() ) {
                    the_post();

                    /**
                     * Hook: woocommerce_shop_loop.
                     */
                    do_action( 'woocommerce_shop_loop' );

                    wc_get_template_part( 'content', 'product' );
                }
            };?>
            </div>
            <?php
            woocommerce_product_loop_end();

            /**
             * Hook: woocommerce_after_shop_loop.
             *
             * @hooked woocommerce_pagination - 10
             */
            do_action( 'woocommerce_after_shop_loop' );
        } else {
            /**
             * Hook: woocommerce_no_products_found.
             *
             * @hooked wc_no_products_found - 10
             */
            do_action( 'woocommerce_no_products_found' );
        }?>


    
    </div>

</div>

<?php /**
         * Hook: woocommerce_after_main_content.
         *
         * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
         */
        do_action( 'woocommerce_after_main_content' );?>

</div>

<div class="filter_open">
<svg height="512pt" viewBox="0 0 512 512" width="512pt" xmlns="http://www.w3.org/2000/svg"><path d="m165.332031 448c-2.261719 0-4.542969-.46875-6.675781-1.472656-5.695312-2.601563-9.324219-8.277344-9.324219-14.527344v-168.980469c0-7.019531-2.855469-13.910156-7.808593-18.859375l-124.328126-124.246094c-11.09375-11.070312-17.195312-25.8125-17.195312-41.492187v-41.089844c0-20.585937 16.746094-37.332031 37.332031-37.332031h336c20.589844 0 37.335938 16.746094 37.335938 37.332031v40.640625c0 15.828125-6.53125 31.234375-17.921875 42.21875l-128.574219 124.054688c-5.207031 5.011718-8.171875 12.011718-8.171875 19.21875v84.910156c0 17.148438-7.464844 33.386719-20.480469 44.542969l-59.753906 51.21875c-2.964844 2.539062-6.675781 3.863281-10.433594 3.863281zm-128-416c-2.941406 0-5.332031 2.390625-5.332031 5.332031v41.089844c0 7.125 2.773438 13.824219 7.828125 18.878906l124.308594 124.222657c10.925781 10.902343 17.195312 26.027343 17.195312 41.496093v134.207031l33.34375-28.585937c5.910157-5.078125 9.324219-12.4375 9.324219-20.246094v-84.90625c0-15.828125 6.527344-31.230469 17.921875-42.21875l128.574219-124.054687c5.183594-4.992188 8.148437-11.988282 8.148437-19.199219v-40.683594c0-2.941406-2.386719-5.332031-5.332031-5.332031zm0 0"/><path d="m474.667969 512h-138.667969c-20.585938 0-37.332031-16.746094-37.332031-37.332031v-181.335938c0-20.585937 16.746093-37.332031 37.332031-37.332031h138.667969c20.585937 0 37.332031 16.746094 37.332031 37.332031v181.335938c0 20.585937-16.746094 37.332031-37.332031 37.332031zm-138.667969-224c-2.945312 0-5.332031 2.390625-5.332031 5.332031v181.335938c0 2.941406 2.386719 5.332031 5.332031 5.332031h138.667969c2.941406 0 5.332031-2.390625 5.332031-5.332031v-181.335938c0-2.941406-2.390625-5.332031-5.332031-5.332031zm0 0"/><path d="m432 368h-53.332031c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h53.332031c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"/><path d="m432 432h-53.332031c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h53.332031c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"/></svg>
</div>

<?php get_footer( 'shop' );
