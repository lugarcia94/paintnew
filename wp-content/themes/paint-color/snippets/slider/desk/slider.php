<?php 
	$posts = get_field('slider_desktop');
?>

<!-- Banner Full -->
<section class="banner--full">
    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider="sets: true">
        <?php if( $posts ): ?>
            <ul class="uk-slider-items uk-child-width-1-1">
            <?php foreach( $posts as $post):?>
                <?php setup_postdata($post); ?>
                <li>
                    <a href="<?php the_field('url'); ?>"><?php the_post_thumbnail('full', array( 'uk-img' => 'target: !.uk-slideshow-items' )); ?></a>
                </li>
            <?php endforeach; ?>
            </ul>
            <?php wp_reset_postdata();?>
            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
        <?php endif; ?>		
    </div>
</section>

<!-- Banner Full -->
<!-- <section class="banner--full">

<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider="sets: true">

    <ul class="uk-slider-items uk-child-width-1-1">

        <li>
            <a href=""><img data-src="banner-full.jpg" width="1920" height="400" alt="" uk-img="target: !.uk-slideshow-items"></a>
        </li>
        <li>
            <a href=""><img data-src="banner-full.jpg" width="1920" height="400" alt=""  uk-img="target: !.uk-slideshow-items"></a>
        </li>
        <li>
            <a href=""><img data-src="banner-full.jpg" width="1920" height="400" alt=""  uk-img="target: !.uk-slideshow-items"></a>
        </li>
    </ul>


    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>


</div>

</section> -->