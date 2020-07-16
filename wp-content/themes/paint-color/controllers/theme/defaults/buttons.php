<?php
/**
 * Created by PhpStorm.
 * User: Vanssiler
 * Date: 16/02/17
 * Time: 15:26
 */

function codesigner_buttons_settings( $wp_customize ) {


	$wp_customize->add_section( 'buttons_defaults' , array(
		'panel' 		=> __( 'codesigner_defaults_panel' ),
		'title' 		=> __( 'Botões', 'codesigner' ),
		'priority' 		=> 40,
		'description' 	=> '<strong>DEFINIÇÕES GERAIS DOS BOTÕES.</strong>',
	) );


	$wp_customize->add_setting( 'button_text_transform', array('default' => 'uppercase'));
	$wp_customize->add_setting( 'button_font_size', array('default' => '15'));
	$wp_customize->add_setting( 'button_text_color', array('default' => '#FFF'));
	$wp_customize->add_setting( 'button_text_hover_color', array('default' => '#CCC'));
	$wp_customize->add_setting( 'button_bg', array('default' => '#d04333'));
	$wp_customize->add_setting( 'button_bg_hover', array('default' => '#b5362d'));
	$wp_customize->add_setting( 'button_height', array('default' => '40'));
	$wp_customize->add_setting( 'button_border_radius', array('default' => '4'));
	$wp_customize->add_setting( 'button_side_padding', array('default' => '15'));


	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'button_text_transform',
		array(
			'type' 			=> 'radio',
			'label' 		=> 'TEXTOS DOS BOTÕES',
			'description' 	=> 'Formatação do Texto',
			'section' 		=> 'buttons_defaults',
			'settings' 		=> 'button_text_transform',
			'choices' 		=> array(
				'uppercase' 	=> 'Caixa alta',
				'lowercase' 	=> 'Letras minúsculas',
				'normal' 		=> 'Primeira maiúscula',
			),
			'default'			=> 'uppercase',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'button_font_size', array(
		'description'	=> 'Tamanho da fonte',
		'section' 		=> 'buttons_defaults',
		'settings'		=> 'button_font_size',
		'type'      	=> 'number',
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_text_color', array(
		'label'			=> 'CORES',
		'description'	=> 'Cor da fonte',
		'section' 		=> 'buttons_defaults',
		'settings' 		=> 'button_text_color',
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_text_hover_color', array(
		'description'	=> 'Cor da fonte ao passar o mouse',
		'section' 		=> 'buttons_defaults',
		'settings' 		=> 'button_text_hover_color',
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_bg', array(
		'description'	=> 'Cor de fundo',
		'section' 		=> 'buttons_defaults',
		'settings' 		=> 'button_bg',
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_bg_hover', array(
		'description'	=> 'Cor de fundo ao passar o mouse',
		'section' 		=> 'buttons_defaults',
		'settings' 		=> 'button_bg_hover',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'button_height', array(
		'label'			=> 'OUTROS PARÂMETROS',
		'description'	=> 'Altura do botão',
		'section' 		=> 'buttons_defaults',
		'settings'		=> 'button_height',
		'type'      	=> 'number',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'button_border_radius', array(
		'description'	=> 'Borda arredondada',
		'section' 		=> 'buttons_defaults',
		'settings'		=> 'button_border_radius',
		'type'      	=> 'number',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'button_side_padding', array(
		'description'	=> 'Espaçamento interno nas laterais',
		'section' 		=> 'buttons_defaults',
		'settings'		=> 'button_side_padding',
		'type'      	=> 'number',
	) ) );



}
add_action('customize_register', 'codesigner_buttons_settings');

function codesigner_buttons_css() { ?>


	<style type="text/css">

		.btn-default,
		.lightbox-wrapper input[type=submit],
		.footer-newsletter form input[type=submit]{
			text-transform: <?php echo get_theme_mod('button_text_transform') ?>;
			font-size: <?php echo get_theme_mod('button_font_size')?>px;
			color: <?php echo get_theme_mod('button_text_color')?>;
			background: <?php echo get_theme_mod('button_bg')?>;
			border-radius: <?php echo get_theme_mod('button_border_radius')?>px;
			padding: 0 <?php echo get_theme_mod('button_side_padding')?>px;
			height: <?php echo get_theme_mod('button_height')?>px;
		}
		.btn-default:hover,
		.lightbox-wrapper input[type=submit]:hover,
		.footer-newsletter form input[type=submit]:hover{
			background: <?php echo get_theme_mod('button_bg_hover')?>;
			color: <?php echo get_theme_mod('button_text_hover_color')?>;
		}


	</style>

<?php }

add_action('wp_head', 'codesigner_buttons_css');
