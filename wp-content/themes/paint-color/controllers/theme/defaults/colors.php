<?php
/**
 * Created by PhpStorm.
 * User: Vanssiler
 * Date: 16/02/17
 * Time: 15:26
 */

function codesigner_color_settings( $wp_customize ) {


	$wp_customize->add_section( 'color_defaults' , array(
		'panel' 		=> __( 'codesigner_defaults_panel' ),
		'title' 		=> __( 'Cores', 'codesigner' ),
		'priority' 		=> 30,
		'description' 	=> '<strong>DEFINIÇÕES GERAIS DE COR.</strong><br><br>Estas opções poderão ser substituidas nos blocos de listagem, por configurações próprias de cada bloco.',
	) );


	$wp_customize->add_setting( 'body_bg', array('default' => '#FFF'));
	$wp_customize->add_setting( 'primary_color', array('default' => '#d04333'));
	$wp_customize->add_setting( 'secondary_color', array('default' => '#54667a'));



	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_bg', array(
		'label'			=> 'COR DE FUNDO',
		'section' 		=> 'color_defaults',
		'settings' 		=> 'body_bg',
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array(
		'label'			=> 'COR PRIMÁRIA DO TEMA',
		'section' 		=> 'color_defaults',
		'settings' 		=> 'primary_color',
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary_color', array(
		'label'			=> 'COR SECUNDÁRIA DO TEMA',
		'section' 		=> 'color_defaults',
		'settings' 		=> 'secondary_color',
	) ) );



}
add_action('customize_register', 'codesigner_color_settings');

function codesigner_color_css() { ?>

	<style type="text/css">
		body{background-color: <?php echo get_theme_mod('body_bg')?>}

		.banner-itembox{border-left-color: <?php echo get_theme_mod('primary_color')?>}
		.banner-itembox .action-link,
		.lightbox-wrapper input.assunto,
		.infos-evento{color: <?php echo get_theme_mod('primary_color')?>}
		.banner-itembox .category,
		.homeslider .owl-dot.active,
		.breadcrumb-wrapper,
		.label-lightbox,
		.post-list-item .data,
		.post-heading .data,
		#product-main-infos .action-link,
		ul.tabs li.current span:before{background: <?php echo get_theme_mod('primary_color')?>;}
		blockquote,
		.post-heading h1{border-left-color: <?php echo get_theme_mod('primary_color')?>;}

	</style>

<?php }

add_action('wp_head', 'codesigner_color_css');
