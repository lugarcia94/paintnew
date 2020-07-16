<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package codesigner
 * @since codesigner 0.1
 */
?>


<?php 
	if(wp_is_mobile()){
		get_template_part('snippets/footer/mob/footer-mobile');
	}else{
		get_template_part('snippets/footer/desk/footer-desktop');
	};
?>


<?php wp_footer(); ?>
<?php echo get_theme_mod('analytics');?>
</body>
</html>