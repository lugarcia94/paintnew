<?php
/**
Template Name: Sem colunas, conteúdo centralizado
Description: This part is optional, but helpful for describing the Post Template

 */

get_header(); ?>
	<div id="page-breadcrumbs" class="breadcrumb-wrapper">
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
		<div id="main" class="uk-container uk-container-large">

			<header class="entry-header">
				<h1 class="entry-title"><?php the_title();?></h1>		
			</header>

			<div id="primary">
				<div id="content" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php the_content(); ?>

					<?php endwhile; // end of the loop. ?>

				</div><!-- #content -->
			</div><!-- #primary -->
		</div>
	</div>
<?php get_footer(); ?>