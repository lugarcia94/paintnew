<div class="categorys__content uk-position-relative uk-visible-toggle" tabindex="-1" uk-slider="sets: true">


	<?php wp_nav_menu( array(
            'theme_location' => 'home_cat_menu',
			'container' =>false,
			'menu_class' => 'uk-slider-items uk-child-width-1-2 uk-child-width-1-4@s uk-child-width-1-6@m uk-grid',
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
    
    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
</div>