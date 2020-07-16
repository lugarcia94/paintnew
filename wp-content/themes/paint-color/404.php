<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package codesigner
 * @since codesigner 0.1
 */

get_header(); ?>

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
			<div id="primary" class="col-xs-12">
				<div id="content" role="main">

					<blockquote id="post-0" class="post no-results not-found">
						<header class="entry-header">
							<h1 class="entry-title"><?php _e( 'Ops', 'codesigner' ); ?></h1>
						</header><!-- .entry-header -->

						<div class="entry-content">
							<p><?php _e( 'A página que você está tentando acessar não foi encontrada.', 'codesigner' ); ?></p>
							<small>Tente a busca ou entre em contato conosco.</small>
						</div><!-- .entry-content -->
					</blockquote><!-- #post-0 -->
					<?php get_search_form(); ?>

				</div><!-- #content -->
			</div><!-- #primary -->

		</div>
	</div>

<?php get_footer(); ?>