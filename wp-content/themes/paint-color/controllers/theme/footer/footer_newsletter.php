<?php
/**
 * Created by PhpStorm.
 * User: Vanssiler
 * Date: 17/02/17
 * Time: 22:45
 */

function footer_news_settings( $wp_customize ) {



	$wp_customize->add_section( 'footer_news_settings' , array(
		'panel' 		=> __( 'codesigner_footer_panel' ),
		'title' 		=> __( 'Newsletter', 'codesigner'),
		'priority' 		=> 60,
		'description' 	=> '<strong>NEWSLETTER DO RODAPÉ.</strong>',
	) );

	$wp_customize->add_setting( 'footer_news_bg');
	$wp_customize->add_setting( 'footer_news_padding_top');
	$wp_customize->add_setting( 'footer_news_padding_bottom');
	$wp_customize->add_setting( 'footer_news_icon');
	$wp_customize->add_setting( 'footer_news_title', array('default' => 'Cadastre-se e receba nossas novidades'));
	$wp_customize->add_setting( 'footer_news_title_color');
	$wp_customize->add_setting( 'footer_news_title_size');
	$wp_customize->add_setting( 'footer_news_title_align');
	$wp_customize->add_setting( 'footer_news_title_transform');
	$wp_customize->add_setting( 'footer_news_title_margin_bottom');


	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_news_bg', array(
		'description'		=> 'Cor de fundo do bloco',
		'section' 			=> 'footer_news_settings',
		'settings' 			=> 'footer_news_bg',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_news_padding_top',
		array(
			'type' 			=> 'number',
			'description' 	=> 'Espaçamento interno superior',
			'section' 		=> 'footer_news_settings',
			'settings' 		=> 'footer_news_padding_top',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_news_padding_bottom',
		array(
			'type' 			=> 'number',
			'description' 	=> 'Espaçamento interno inferior',
			'section' 		=> 'footer_news_settings',
			'settings' 		=> 'footer_news_padding_bottom',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_news_icon',
		array(
			'type' 			=> 'text',
			'description' 	=> 'Ícone do bloco',
			'section' 		=> 'footer_news_settings',
			'settings' 		=> 'ft_about_block_title_icon',
		)
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_news_title',
		array(
			'type' 			=> 'text',
			'description' 	=> 'Texto de título do bloco',
			'section' 		=> 'footer_news_settings',
			'settings' 		=> 'footer_news_title',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_news_title_color', array(
		'description'		=> 'Cor do título do bloco',
		'section' 			=> 'footer_news_settings',
		'settings' 			=> 'footer_news_title_color',
	) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_news_title_size',
		array(
			'type' 			=> 'number',
			'description' 	=> 'Tamanho do título do bloco',
			'section' 		=> 'footer_news_settings',
			'settings' 		=> 'footer_news_title_size',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_news_title_align',
		array(
			'type' 			=> 'radio',
			'description'	=> 'Alinhamento do título',
			'section' 		=> 'footer_news_settings',
			'settings' 		=> 'footer_news_title_align',
			'choices' 		=> array(
				'left' 		=> 'Esquerda',
				'right' 	=> 'Direita',
				'center' 	=> 'Centralizado',
			),
			'default' 		=> 'left',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_news_title_transform',
		array(
			'type' 			=> 'radio',
			'description'	=> 'formato do título do bloco',
			'section' 		=> 'footer_news_settings',
			'settings' 		=> 'footer_news_title_transform',
			'choices' 		=> array(
				'normal' 		=> 'Normal',
				'uppercase' 	=> 'Caixa alta',
				'lowercase' 	=> 'Caixa baixa',
			),
			'default' 		=> 'uppercase',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_news_title_margin_bottom',
		array(
			'type' 			=> 'number',
			'description' 	=> 'Margem inferior do título do bloco',
			'section' 		=> 'footer_news_settings',
			'settings' 		=> 'footer_news_title_margin_bottom',
		)
	) );


}
add_action('customize_register', 'footer_news_settings');

function footer_news_settings_css() { ?>


	<style type="text/css">

		.footer-newsletter{
			background: <?php echo get_theme_mod('footer_news_bg')?>;
			padding-top: <?php echo get_theme_mod('footer_news_padding_top')?>px;
			padding-bottom: <?php echo get_theme_mod('footer_news_padding_bottom')?>px;
		}
		.footer-newsletter h3{
			color: <?php echo get_theme_mod('footer_news_title_color')?>;
			font-size: <?php echo get_theme_mod('footer_news_title_size')?>px;
			text-align: <?php echo get_theme_mod('footer_news_title_align')?>;
			text-transform: <?php echo get_theme_mod('footer_news_title_transform')?>;
			margin-bottom: <?php echo get_theme_mod('footer_news_title_margin_bottom')?>px;
		}

	</style>


<?php }

add_action('wp_head', 'footer_news_settings_css');