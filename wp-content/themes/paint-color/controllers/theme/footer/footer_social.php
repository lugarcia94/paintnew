<?php
/**
 * Created by PhpStorm.
 * User: Vanssiler
 * Date: 17/02/17
 * Time: 22:45
 */

function footer_social_settings( $wp_customize ) {



	$wp_customize->add_section( 'footer_social' , array(
		'panel' 		=> __( 'codesigner_footer_panel' ),
		'title' 		=> __( 'Redes Sociais', 'codesigner'),
		'priority' 		=> 60,
		'description' 	=> '<strong>REDES SOCIAIS DO RODAPÉ.</strong>',
	) );

	$wp_customize->add_setting( 'footer_social_bg');
	$wp_customize->add_setting( 'footer_social_color');
	$wp_customize->add_setting( 'footer_social_size');
	$wp_customize->add_setting( 'footer_social_padding_top');
	$wp_customize->add_setting( 'footer_social_padding_bottom');

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_social_bg', array(
		'description' 	=> 'Cor de fundo do bloco',
		'section' 		=> 'footer_social',
		'settings'		=> 'footer_social_bg',
	) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_social_size', array(
		'description' 	=> 'Tamanho dos ícones',
		'section' 		=> 'footer_social',
		'settings'		=> 'footer_social_size',
		'type'      	=> 'number',
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_social_color', array(
		'description' 	=> 'Cor dos textos e links',
		'section' 		=> 'footer_social',
		'settings'		=> 'footer_social_color',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_social_padding_top', array(
		'description' 	=> 'Espaçamento interno superior',
		'section' 		=> 'footer_social',
		'settings'		=> 'footer_social_padding_top',
		'type'			=> 'number',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_social_padding_bottom', array(
		'description' 	=> 'Espaçamento interno inferior',
		'section' 		=> 'footer_social',
		'settings'		=> 'footer_social_padding_bottom',
		'type'			=> 'number',
	) ) );


}
add_action('customize_register', 'footer_social_settings');

function footer_social_css() { ?>


	<style type="text/css">

		.footer_social{
			background: <?php echo get_theme_mod('footer_social_bg')?>;
			padding-top: <?php echo get_theme_mod('footer_social_padding_top')?>px;
			padding-bottom: <?php echo get_theme_mod('footer_social_padding_bottom')?>px;
		}
		.footer_social i{
			line-height: 1em;
			font-size: <?php echo get_theme_mod('footer_social_size')?>px;
			color: <?php echo get_theme_mod('footer_social_color')?>;
		}
	</style>


<?php }

add_action('wp_head', 'footer_social_css');