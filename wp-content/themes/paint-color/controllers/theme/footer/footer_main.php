<?php
/**
 * Created by PhpStorm.
 * User: Vanssiler
 * Date: 17/02/17
 * Time: 22:45
 */

function footer_main( $wp_customize ) {



	$wp_customize->add_section( 'footer_main' , array(
		'panel' 		=> __( 'codesigner_footer_panel' ),
		'title' 		=> __( 'Bloco principal', 'codesigner'),
		'priority' 		=> 60,
		'description' 	=> '<strong>BLOCO PRINCIPAL DO RODAPÉ.</strong>',
	) );

	$wp_customize->add_setting( 'footer_bg');
	$wp_customize->add_setting( 'footer_padding_top');
	$wp_customize->add_setting( 'footer_padding_bottom');
	$wp_customize->add_setting( 'footer_title_size');
	$wp_customize->add_setting( 'footer_title_color');
	$wp_customize->add_setting( 'footer_title_transform', array('default' => 'uppercase'));
	$wp_customize->add_setting( 'footer_text_size');
	$wp_customize->add_setting( 'footer_text_color');

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bg', array(
		'description' 	=> 'Cor de fundo do bloco',
		'section' 		=> 'footer_main',
		'settings'		=> 'footer_bg',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_padding_top', array(
		'description' 	=> 'Espaçamento interno superior',
		'section' 		=> 'footer_main',
		'settings'		=> 'footer_padding_top',
		'type'			=> 'number',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_padding_bottom', array(
		'description' 	=> 'Espaçamento interno inferior',
		'section' 		=> 'footer_main',
		'settings'		=> 'footer_padding_bottom',
		'type'			=> 'number',
	) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_title_size', array(
		'description' 	=> 'Tamanho dos títulos',
		'section' 		=> 'footer_main',
		'settings'		=> 'footer_title_size',
		'type'      	=> 'text',
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_title_color', array(
		'description' 	=> 'Cor dos títulos',
		'section' 		=> 'footer_main',
		'settings'		=> 'footer_title_color',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_title_transform',
		array(
			'type' 			=> 'radio',
			'description'	=> 'Formato do título do bloco',
			'section' 		=> 'footer_main',
			'settings' 		=> 'footer_title_transform',
			'choices' 		=> array(
				'normal' 		=> 'Normal',
				'uppercase' 	=> 'Caixa alta',
				'lowercase' 	=> 'Caixa baixa',
			),
			'default' 		=> 'uppercase',
		)
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_text_size', array(
		'description' 	=> 'Tamanho dos textos e links',
		'section' 		=> 'footer_main',
		'settings'		=> 'footer_text_size',
		'type'      	=> 'text',
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_text_color', array(
		'description' 	=> 'Cor dos textos e links',
		'section' 		=> 'footer_main',
		'settings'		=> 'footer_text_color',
	) ) );


}
add_action('customize_register', 'footer_main');

function footer_main_css() { ?>


	<style type="text/css">

		.footer-bottom{
			background-color: <?php echo get_theme_mod('footer_bg')?>;
			padding-top: <?php echo get_theme_mod('footer_padding_top')?>px;
			padding-bottom: <?php echo get_theme_mod('footer_padding_bottom')?>px;
		}
		.footer-bottom h3{
			font-size: <?php echo get_theme_mod('footer_title_size')?>px;
			color: <?php echo get_theme_mod('footer_title_color')?>;
			text-transform: <?php echo get_theme_mod('footer_title_transform')?>;
		}
		.footer-bottom .televendas{
			color: <?php echo get_theme_mod('footer_text_color')?>;
		}
		.footer-bottom p{
			color: <?php echo get_theme_mod('footer_text_color')?>;
			font-size: <?php echo get_theme_mod('footer_text_size')?>px;
		}
		.footer-bottom p a{
			color: echo <?php get_theme_mod('footer_text_color')?>;
			font-size: echo <?php get_theme_mod('footer_text_size')?>px;
		}

	</style>


<?php }

add_action('wp_head', 'footer_main_css');