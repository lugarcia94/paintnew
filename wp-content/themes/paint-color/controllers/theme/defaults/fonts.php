<?php
/**
 * Created by PhpStorm.
 * User: Vanssiler
 * Date: 16/02/17
 * Time: 15:26
 */

function codesigner_fonts( $wp_customize ) {

	$wp_customize->add_section( 'fonts_defaults' , array(
		'panel' 		=> __( 'codesigner_defaults_panel' ),
		'title' 		=> __( 'Fonte', 'codesigner' ),
		'priority' 		=> 20,
		'description' 	=> '<strong>SELEÇÃO DA FONTE UTILIZADA NO SITE.</strong> <br><br>Este tema utiliza <strong>Google Fonts</strong> como base de fontes. Para encontrar suas fontes, visite o <a href="https://fonts.google.com/" target="_blank">site oficial</a> e faça uma busca.',
	) );



	$wp_customize->add_setting( 'font_family', array('default' => '<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">'));
	$wp_customize->add_setting( 'font_family_css', array('default' => 'font-family: "Roboto", sans-serif'));



	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'font_family', array(
		'label' 		=> 'CÓDIGO HTML DA FONTE',
		'section' 		=> 'fonts_defaults',
		'settings'		=> 'font_family',
		'type'      	=> 'text',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'font_family_css', array(
		'label' 		=> 'CÓDIGO CSS DA FONTE',
		'section' 		=> 'fonts_defaults',
		'settings'		=> 'font_family_css',
		'type'      	=> 'text',
	) ) );



}
add_action('customize_register', 'codesigner_fonts');

function codesigner_fonts_css() { ?>

	<style type="text/css">
		body{<?php echo get_theme_mod('font_family_css')?>;}
		p,
		p a,
		body{font-size: <?php echo get_theme_mod('font_size')?>px; color: <?php echo get_theme_mod('font_color')?>}

	</style>

<?php }

add_action('wp_head', 'codesigner_fonts_css');
