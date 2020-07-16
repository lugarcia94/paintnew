<?php
/**
 * Created by PhpStorm.
 * User: Vanssiler
 * Date: 17/02/17
 * Time: 22:45
 */

function footer_ressalva_settings( $wp_customize ) {



	$wp_customize->add_section( 'footer_ressalva' , array(
		'panel' 		=> __( 'codesigner_footer_panel' ),
		'title' 		=> __( 'Ressalva do rodapé', 'codesigner'),
		'priority' 		=> 60,
		'description' 	=> '<strong>RESSALVA DO RODAPÉ.</strong>',
	) );

	$wp_customize->add_setting( 'ressalva_bg');
	$wp_customize->add_setting( 'ressalva_padding_top');
	$wp_customize->add_setting( 'ressalva_padding_bottom');
	$wp_customize->add_setting( 'ressalva_title');
	$wp_customize->add_setting( 'ressalva_title_size');
	$wp_customize->add_setting( 'ressalva_title_color');
	$wp_customize->add_setting( 'ressalva_title_transform', array('default' => 'uppercase'));
	$wp_customize->add_setting( 'ressalva_text');
	$wp_customize->add_setting( 'ressalva_text_size');
	$wp_customize->add_setting( 'ressalva_text_color');

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ressalva_bg', array(
		'description' 	=> 'Cor de fundo do bloco',
		'section' 		=> 'footer_ressalva',
		'settings'		=> 'ressalva_bg',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ressalva_padding_top', array(
		'description' 	=> 'Espaçamento interno superior',
		'section' 		=> 'footer_ressalva',
		'settings'		=> 'ressalva_padding_top',
		'type'			=> 'number',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ressalva_padding_bottom', array(
		'description' 	=> 'Espaçamento interno inferior',
		'section' 		=> 'footer_ressalva',
		'settings'		=> 'ressalva_padding_bottom',
		'type'			=> 'number',
	) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ressalva_title', array(
		'description' 	=> 'Título da ressalva',
		'section' 		=> 'footer_ressalva',
		'settings'		=> 'ressalva_title',
		'type'      	=> 'text',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ressalva_title_size', array(
		'description' 	=> 'Tamanho dos títulos',
		'section' 		=> 'footer_ressalva',
		'settings'		=> 'ressalva_title_size',
		'type'      	=> 'number',
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ressalva_title_color', array(
		'description' 	=> 'Cor dos títulos',
		'section' 		=> 'footer_ressalva',
		'settings'		=> 'ressalva_title_color',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ressalva_title_transform',
		array(
			'type' 			=> 'radio',
			'description'	=> 'Formato do título do bloco',
			'section' 		=> 'footer_ressalva',
			'settings' 		=> 'ressalva_title_transform',
			'choices' 		=> array(
				'normal' 		=> 'Normal',
				'uppercase' 	=> 'Caixa alta',
				'lowercase' 	=> 'Caixa baixa',
			),
			'default' 		=> 'uppercase',
		)
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ressalva_text', array(
		'description' 	=> 'Conteúdo da ressalva',
		'section' 		=> 'footer_ressalva',
		'settings'		=> 'ressalva_text',
		'type'      	=> 'textarea',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ressalva_text_size', array(
		'description' 	=> 'Tamanho dos textos e links',
		'section' 		=> 'footer_ressalva',
		'settings'		=> 'ressalva_text_size',
		'type'      	=> 'number',
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ressalva_text_color', array(
		'description' 	=> 'Cor dos textos e links',
		'section' 		=> 'footer_ressalva',
		'settings'		=> 'ressalva_text_color',
	) ) );


}
add_action('customize_register', 'footer_ressalva_settings');

function footer_ressalva_css() { ?>


	<style type="text/css">

		.footer-ressalva{
			background-color: <?php echo get_theme_mod('ressalva_bg')?>;
			padding-top: <?php echo get_theme_mod('ressalva_padding_top')?>px;
			padding-bottom: <?php echo get_theme_mod('ressalva_padding_bottom')?>px;
		}
		.footer-ressalva h3{
			font-size: <?php echo get_theme_mod('ressalva_title_size')?>px;
			color: <?php echo get_theme_mod('ressalva_title_color')?>;
			text-transform: <?php echo get_theme_mod('ressalva_title_transform')?>;
			margin-bottom: 15px;
		}
		.footer-ressalva .televendas{
			color: <?php echo get_theme_mod('ressalva_text_color')?>;
		}
		.footer-ressalva p{
			color: <?php echo get_theme_mod('ressalva_text_color')?>;
			font-size: <?php echo get_theme_mod('ressalva_text_size')?>px;
		}
		.footer-ressalva p a{
			color: echo <?php get_theme_mod('ressalva_text_color')?>;
			font-size: echo <?php get_theme_mod('ressalva_text_size')?>px;
		}

	</style>


<?php }

add_action('wp_head', 'footer_ressalva_css');