<div class="product-primary-infos">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-6">
						<?php woocommerce_show_product_images()?>
					</div>

					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="product-options">
							<header class="product-header">
								<h1><?php the_title()?></h1>
								<div class="extra">
									<div class="sku">
										<strong>Código:</strong> <span><?php echo $product->get_sku(); ?></span>
									</div>
									<div class="categories">
										<strong>Categorias:</strong> <span><?php echo $product->get_categories(); ?></span>
									</div>
								</div>
								<div class="description">
									<?php the_excerpt(); ?>
								</div>
							</header>
							<section class="product-configs <?php if( $product->is_type( 'variable' ) ) {echo 'hasAttribute';} else {echo 'noAttribute';} ?>">
								<div class="product-type-wrapper">
									<?php
									/**
									 * woocommerce_single_product_summary hook.
									 *
									 * @hooked woocommerce_template_single_title - 5
									 * @hooked woocommerce_template_single_rating - 10
									 * @hooked woocommerce_template_single_price - 10
									 * @hooked woocommerce_template_single_excerpt - 20
									 * @hooked woocommerce_template_single_add_to_cart - 30
									 * @hooked woocommerce_template_single_meta - 40
									 * @hooked woocommerce_template_single_sharing - 50
									 */
	//								do_action( 'woocommerce_single_product_summary' );

									woocommerce_template_single_add_to_cart();
									?>

								</div>
								<?php echo do_shortcode('[shipping-calculator]');?>

							</section>
						</div>

					</div>
				</div>
			</div>
			
			<div class="product-share">
				<div class="row">
					<div class="col-xs-12">
						<ul class="sharelist">
							<li><strong>Compartilhe</strong></li>
							<li><a href="http://www.facebook.com/share.php?u=<?php the_permalink()?>&title=<?php the_title()?>" target="_blank"><i class="icon-facebook"></i></a></li>
							<li><a href="http://twitter.com/intent/tweet?status=<?php the_title()?>+<?php the_permalink()?>" target="_blank"><i class="icon-twitter"></i></a></li>
							<li><a href="https://plus.google.com/share?url=<?php the_permalink()?>" target="_blank"><i class="icon-gplus"></i></a></li>
							<li><a href="http://pinterest.com/pin/create/bookmarklet/?media=<?php the_post_thumbnail_url(); ?>&url=<?php the_permalink()?>&is_video=false&description=<?php the_title()?>" target="_blank"><i class="icon-pinterest"></i></a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="product-secondary-infos">
				<div class="row">
					<div class="col-xs-12">
						<?php get_template_part('woocommerce/single-product/tabs/tabs')?>
					</div>
					<div class="col-xs-12">
						<?php get_template_part('woocommerce/single-product/related')?>
					</div>
				</div>
			</div>