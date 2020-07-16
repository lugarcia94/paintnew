<?php
/**
 * Created by PhpStorm.
 * User: Vanssiler
 * Date: 17/02/17
 * Time: 18:51
 */

?>
<!-- UPDATES -->

<div class="featured-block featured-events">
	<div class="container">
		<h1 class="alt-font">Eventos</h1>
		<div class="updates-wrapper">
			<ul class="updates-list row">

				<!-- POST DE EVENTOS -->
				<?php
				$events = new WP_Query(
					array(
						'post_type' => 'eventos',
						'posts_per_page' => 1,
					)
				);
				?>
				<?php if( $events->have_posts() ): ?>
					<?php while( $events->have_posts() ) : $events->the_post(); ?>
						<li class="col-sm-3 col-xs-6 featured-evento">
							<a href="<?php the_permalink() ?>">
								<?php the_post_thumbnail( 'homelist-thumb' ); ?>
								<h2><?php the_title()?></h2>
								<?php the_content();?>
							</a>
							<a href="<?php echo get_post_type_archive_link( 'eventos' ); ?>" class="more-events btn-default">Mais eventos</a>
						</li>
					<?php endwhile;?>
				<?php endif;?>
				<?php wp_reset_query() ;?>
			</ul>
		</div>
	</div>
</div>
