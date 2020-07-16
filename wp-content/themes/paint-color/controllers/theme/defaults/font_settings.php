<?php
/**
 * Created by PhpStorm.
 * User: Vanssiler
 * Date: 16/02/17
 * Time: 15:26
 */

function codesigner_font_settings( $wp_customize ) {

	$wp_customize->add_section( 'fonts_settings' , array(
		'panel' 		=> __( 'codesigner_defaults_panel' ),
		'title' 		=> __( 'Textos', 'codesigner' ),
		'priority' 		=> 20,
		'description' 	=> '<strong>DEFINIÇÕES DO TEXTO GERAL DO SITE</strong> <br><br>Este tema utiliza <strong>Google Fonts</strong> como base de fontes. Para encontrar suas fontes, visite o <a href="https://fonts.google.com/" target="_blank">site oficial</a> e faça uma busca.',
	) );



	$wp_customize->add_setting( 'font_size', array('default' => '15'));
	$wp_customize->add_setting( 'font_color', array('default' => '#333'));
	$wp_customize->add_setting( 'blockquote_size', array('default' => '20'));
	$wp_customize->add_setting( 'blockquote_color', array('default' => '#333'));
	$wp_customize->add_setting( 'title_color', array('default' => '#333'));
	$wp_customize->add_setting( 'h1_size', array('default' => '24'));
	$wp_customize->add_setting( 'h2_size', array('default' => '22'));
	$wp_customize->add_setting( 'h3_size', array('default' => '20'));
	$wp_customize->add_setting( 'h4_size', array('default' => '18'));
	$wp_customize->add_setting( 'h5_size', array('default' => '16'));



	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'font_size', array(
		'label'			=> 'TAMANHO DOS PARÁGRAFOS',
		'section' 		=> 'fonts_settings',
		'settings'		=> 'font_size',
		'type'      	=> 'number',
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'font_color', array(
		'label'			=> 'COR DOS PARÁGRAFOS',
		'section' 		=> 'fonts_settings',
		'settings' 		=> 'font_color',
	) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'blockquote_size', array(
		'label'			=> 'TAMANHO DAS CITAÇÕES',
		'section' 		=> 'fonts_settings',
		'settings'		=> 'blockquote_size',
		'type'      	=> 'number',
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blockquote_color', array(
		'label'			=> 'COR DAS CITAÇÕES',
		'section' 		=> 'fonts_settings',
		'settings' 		=> 'blockquote_color',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'title_color', array(
		'label'			=> 'COR DOS TÍTULOS',
		'section' 		=> 'fonts_settings',
		'settings' 		=> 'title_color',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'h1_size', array(
		'label'			=> 'TAMANHO DOS TÍTULOS H1',
		'section' 		=> 'fonts_settings',
		'settings'		=> 'h1_size',
		'type'      	=> 'number',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'h2_size', array(
		'label'			=> 'TAMANHO DOS TÍTULOS H2',
		'section' 		=> 'fonts_settings',
		'settings'		=> 'h2_size',
		'type'      	=> 'number',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'h3_size', array(
		'label'			=> 'TAMANHO DOS TÍTULOS H3',
		'section' 		=> 'fonts_settings',
		'settings'		=> 'h3_size',
		'type'      	=> 'number',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'h4_size', array(
		'label'			=> 'TAMANHO DOS TÍTULOS H4',
		'section' 		=> 'fonts_settings',
		'settings'		=> 'h4_size',
		'type'      	=> 'number',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'h5_size', array(
		'label'			=> 'TAMANHO DOS TÍTULOS H5',
		'section' 		=> 'fonts_settings',
		'settings'		=> 'h5_size',
		'type'      	=> 'number',
	) ) );


}
add_action('customize_register', 'codesigner_font_settings');

function codesigner_font_settings_css() { ?>

	<style type="text/css">

		p{color: <?php echo get_theme_mod('font_color')?>; font-size: <?php echo get_theme_mod('font_size')?>px;}
		blockquote,
		blockquote p,
		blockquote a{color: <?php echo get_theme_mod('blockquote_color')?>; font-size: <?php echo get_theme_mod('blockquote_size')?>px;}
		h1, h2, h3, h4, h5{color: <?php echo get_theme_mod('title_color')?>;}
		h1{font-size: <?php echo get_theme_mod('h1_size')?>px;}
		h2{font-size: <?php echo get_theme_mod('h2_size')?>px;}
		h3{font-size: <?php echo get_theme_mod('h3_size')?>px;}
		h4{font-size: <?php echo get_theme_mod('h4_size')?>px;}
		h5{font-size: <?php echo get_theme_mod('h5_size')?>px;}

	</style>

<?php }

add_action('wp_head', 'codesigner_font_settings_css');
