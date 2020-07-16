<?php 
	$posts = get_field('slider_mobile');
?>

<!-- Banner Full -->
<section class="banner--full">
	<div class="uk-container uk-container-small">
	<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>
			<?php if( $posts ): ?>
				<ul class="uk-slider-items uk-child-width-1-1">
				<?php foreach( $posts as $post):?>
					<?php setup_postdata($post); ?>
					<li>
						<a href="<?php the_field('url'); ?>"><?php the_post_thumbnail(); ?></a>
					</li>
				<?php endforeach; ?>
				</ul>
				<?php wp_reset_postdata();?>
			<?php endif; ?>		
		</div>
	</div>
</section>