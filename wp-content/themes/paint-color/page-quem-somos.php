<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package codesigner
 * @since codesigner 0.1
 */

get_header(); ?>
	<div id="page-breadcrumbs" class="breadcrumb-wrapper">
		<div class="container">
			<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
				<span></span>
				<span></span>
				<span>Quem somos</span>
			</div>
		</div>
	</div>
	<div id="page" class="page-single-column quem-somos">
	<?php do_action( 'before' ); ?>
		<div id="main" class="row">
			<div id="primary" class="col-xs-12">
				<div id="content" role="main">
					<?php
					global $more;
					$more = 0;
					?>
					<?php while ( have_posts() ) : the_post(); ?>
						<blockquote><?php echo the_field('gravata');?></blockquote>

						<div class="post-thumbnail">
							<?php the_post_thumbnail();?>
						</div>

						<?php the_content(); ?>

					<?php endwhile; // end of the loop. ?>

				</div><!-- #content -->
			</div><!-- #primary -->
		</div>
	</div>
<?php get_footer(); ?>