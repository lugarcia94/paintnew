<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider="center: true">


	<?php wp_nav_menu( array(
            'theme_location' => 'home_cat_menu',
			'container' =>false,
			'menu_class' => 'uk-slider-items uk-child-width-1-2 uk-child-width-1-4@s uk-grid',
			'echo' => true,
			'before' => '',
			'after' => '',
			'link_before' => '',
			'link_after' => '',
			'depth' => 0,
			'current_category' => 0,
			'pad_counts' => 0,
			'taxonomy' => 'product_cat')
	); ?>
</div>