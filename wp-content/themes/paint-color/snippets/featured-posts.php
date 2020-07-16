<?php
/**
 * Created by PhpStorm.
 * User: Vanssiler
 * Date: 17/02/17
 * Time: 18:51
 */

?>
<!-- UPDATES -->

<?php
	$postColumns = get_theme_mod('ft_posts_columns');
	$itemButton = get_theme_mod('ft_posts_item_show_button');
?>

<?php switch($postColumns):
	case '1':
		$postCount = '1';
	break;
	case '2':
		$postCount = '2';
	break;
	case '3':
		$postCount = '3';
	break;
	case '4':
		$postCount = '4';
	break;
endswitch; ?>

<div class="featured-block featured-posts">
	<div class="container">
		<h1><?php echo get_theme_mod('ft_posts_block_title_icon')?> <?php echo get_theme_mod('ft_posts_block_title_content')?></h1>
		<div class="updates-wrapper">
			<ul class="updates-list row">

				<?php
				$updates = new WP_Query(
					array(
						'post_type' => 'post',
						'posts_per_page' => $postCount,
						'meta_query'	=> array(
							'relation'		=> 'AND',
							array(
								'key'	  	=> 'destaque_na_home',
								'value'	  	=> '1',
								'compare' 	=> '=',
							),
						),
					)
				);
				?>
				<?php if( $updates->have_posts() ): ?>
					<?php while( $updates->have_posts() ) : $updates->the_post(); ?>
						<?php switch($postColumns):
							case '1': ?>
								<li class="col-xs-12">
							<?php break; ?>
							<?php case '2': ?>
								<li class="col-xs-6">
							<?php break; ?>
							<?php case '3': ?>
								<li class="col-sm-4 col-xs-12">
							<?php break; ?>
							<?php case '4': ?>
								<li class="col-sm-3 col-xs-6">
							<?php break; ?>
						<?php endswitch; ?>

							<a href="<?php the_permalink() ?>">
								<?php the_post_thumbnail( 'homelist-thumb' ); ?>
								<h2><?php the_title()?></h2>
								<div class="data"><?php the_time('j M Y')?></div>
								<?php the_field('resumo');?>
							</a>
							<?php switch($itemButton):
							case 'yes': ?>
								<a href="<?php the_permalink() ?>" class="btn-default">Saiba mais</a>
							<?php break; ?>
							<?php endswitch; ?>
						</li>
					<?php endwhile;?>
				<?php endif;?>
				<?php wp_reset_query() ;?>

			</ul>
		</div>
	</div>
</div>
