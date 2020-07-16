<?php
/**
 * Created by PhpStorm.
 * User: Vanssiler
 * Date: 17/02/17
 * Time: 23:42
 */?>

<!-- SOBRE A EMPRESA -->

<div id="sobre" class="parallax-about">
	<div class="container">
		<?php
		$sobre = new WP_Query(
			array(
				'pagename' => 'quem-somos',
				'posts_per_page' => 1,
			)
		);
		?>
		<?php if( $sobre->have_posts() ): ?>
			<?php while( $sobre->have_posts() ) : $sobre->the_post(); ?>
				<h1><?php echo (get_theme_mod('ft_about_block_title_content'));?></h1>
				<p><?php echo (get_theme_mod('ft_about_item_txt_content'));?></p>
				<a class="btn-default about-btn" id="sobre-btn" href="<?php echo(get_theme_mod('ft_about_block_url')) ?>">Saiba mais</a>
			<?php endwhile;?>
		<?php endif;?>
		<?php wp_reset_query() ;?>
	</div>
</div>
<?php switch(get_theme_mod('ft_about_parallax_switch')):
	case 'yes': ?>
		<script type="text/javascript">

			$(document).ready(function(){
				$('.parallax-about').parallax("50%", -0.2);
			});

			$(window).resize(function() {
				if ($(window).width() < 991) {
					$('.parallax-about').parallax("50%", -0.2);
				}
			});

		</script>
	<?php break; ?>
<?php endswitch; ?>

