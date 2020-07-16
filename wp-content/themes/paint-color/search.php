<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package codesigner
 * @since codesigner 0.1
 */

get_header(); ?>

	<div class="filter-overlay"></div>

	<div id="category-breadcrumbs" class="breadcrumb-wrapper">
		<div class="container">
			<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
				<?php if(function_exists('bcn_display'))
				{
					bcn_display();
				}?>
			</div>
		</div>
	</div>

	<div id="page" class="page-single-column">
		<?php do_action( 'before' ); ?>
		<div id="main" class="row">

			<section id="primary" class="col-xs-12">
				<div id="content" role="main">

				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<h1 class="page-title"><?php printf( __( 'Resultados da busca para: %s', 'codesigner' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
					</header>


					<?php /* Start the Loop */ ?>
					<div class="postlist-row">
						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<div class="post-list-item">
								<div class="list-image">
									<a href="<?php the_permalink() ?>">
										<span class="data"><?php the_time('j M Y')?></span>
										<?php the_post_thumbnail()?>
									</a>
								</div>
								<div class="list-text">
									<a href="<?php the_permalink() ?>">
										<h2><?php the_title()?></h2>
										<?php the_content()?>
									</a>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
					<div class="pag text-right">
						<?php
						if ( function_exists('vb_pagination') ) {
							vb_pagination();
						}
						?>
					</div>

				<?php else : ?>

					<blockquote id="post-0" class="post no-results not-found">
						<header class="entry-header">
							<h1 class="entry-title"><?php _e( 'Ops', 'codesigner' ); ?></h1>
						</header><!-- .entry-header -->

						<div class="entry-content">
							<p><?php _e( 'A busca não encontrou resultados para sua pesquisa. Por favor tente novamente com outras palavras ou entre em contato conosco', 'codesigner' ); ?></p>
						</div><!-- .entry-content -->
					</blockquote><!-- #post-0 -->
						<?php get_search_form(); ?>
				<?php endif; ?>

				</div><!-- #content -->
			</section><!-- #primary -->

		</div>
	</div>
<?php get_footer(); ?>