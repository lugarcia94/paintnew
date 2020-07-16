<?php
/**
 * The Template for displaying all single posts.
 *
 * @package codesigner
 * @since codesigner 0.1
 */

get_header(); ?>
	<div class="filter-overlay"></div>
	<div id="post-breadcrumbs" class="breadcrumb-wrapper">
		<div class="container">
			<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
				<?php if(function_exists('bcn_display'))
				{
					bcn_display();
				}?>
			</div>
		</div>
	</div>

	<div id="page" class="container">
		<?php do_action( 'before' ); ?>
		<div id="main" class="row">

			<div class="col-xs-12 visible-xs">
				<div class="category-menu">
					<strong>Mais novidades</strong>
					<div class="category-trigger">
						<i></i>
						<i></i>
						<i></i>
					</div>
				</div>
			</div>

			<div id="primary" class="col-sm-8 col-xs-12 single-eventos">

				<?php while ( have_posts() ) : the_post(); ?>
					<div class="post-heading">
						<span class="data"><i class="icon-calendar"></i></span>
						<h1><?php the_title() ?></h1>
					</div>

					<?php
						$periodo = get_field('periodo');
						$local = get_field('local');
					?>

					<?php if($periodo || $local) :?>
						<div class="infos-evento">
						<?php if($periodo):?>
							<div><?php echo $periodo;?></div>
						<?php endif;?>
						<?php if($local):?>
							<div><?php echo $local;?></div>
						<?php endif;?>
						</div>
					<?php endif; ?>

					<div class="post-img">
						<?php the_post_thumbnail(); ?>
					</div>
					<div class="post-content">
						<?php the_content(); ?>
					</div>
					<div class="post-share">
						<div class="row">
							<div class="col-xs-12">
								<ul class="sharelist">
									<li><strong>Compartilhe</strong></li>
									<li><a href="http://www.facebook.com/share.php?u=<?php the_permalink()?>&title=<?php the_title()?>" target="_blank"><i class="icon-facebook"></i></a></li>
									<li><a href="http://twitter.com/intent/tweet?status=<?php the_title()?>+<?php the_permalink()?>" target="_blank"><i class="icon-twitter"></i></a></li>
									<li><a href="https://plus.google.com/share?url=<?php the_permalink()?>" target="_blank"><i class="icon-google"></i></a></li>
									<li><a href="http://pinterest.com/pin/create/bookmarklet/?media=<?php the_post_thumbnail_url(); ?>&url=<?php the_permalink()?>&is_video=false&description=<?php the_title()?>" target="_blank"><i class="icon-pinterest"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="facebook-comment-post">
						<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-num-posts="10"></div>
					</div>


				<?php endwhile; // end of the loop. ?>
			</div><!-- #primary -->
			<?php get_sidebar(); ?>
		</div>
	</div>

<?php get_footer(); ?>