<?php
/**
 * Created by PhpStorm.
 * User: Vanssiler
 * Date: 17/02/17
 * Time: 22:45
 */

function footer_settings( $wp_customize ) {



	$wp_customize->add_section( 'footer_settings' , array(
		'panel' 		=> __( 'codesigner_footer_panel' ),
		'title' 		=> __( 'Configurações', 'codesigner'),
		'priority' 		=> 60,
		'description' 	=> '<strong>BLOCO DE AJUSTES DO RODAPÉ.</strong>',
	) );

	$wp_customize->add_setting( 'footer_newsletter_switch', array('default' => '1'));
	$wp_customize->add_setting( 'footer_social_switch', array('default' => '1'));
	$wp_customize->add_setting( 'footer_ressalva_switch', array('default' => '1'));
	$wp_customize->add_setting( 'footer_main_switch', array('default' => '1'));
	$wp_customize->add_setting( 'footer_social_bg');
	$wp_customize->add_setting( 'footer_social_color');
	$wp_customize->add_setting( 'footer_bg_color');
	$wp_customize->add_setting( 'footer_padding');
	$wp_customize->add_setting( 'footer_title_size');
	$wp_customize->add_setting( 'footer_title_color');
	$wp_customize->add_setting( 'footer_text_size');
	$wp_customize->add_setting( 'footer_text_color');
	$wp_customize->add_setting( 'ressalva_rodape');

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_newsletter_switch',
		array(
			'type' 			=> 'checkbox',
			'label'		 	=> 'Exibir Newsletter',
			'section' 		=> 'footer_settings',
			'settings' 		=> 'footer_newsletter_switch',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_social_switch',
		array(
			'type' 			=> 'checkbox',
			'label'		 	=> 'Exibir redes sociais',
			'section' 		=> 'footer_settings',
			'settings' 		=> 'footer_social_switch',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_ressalva_switch',
		array(
			'type' 			=> 'checkbox',
			'label'		 	=> 'Exibir ressalva',
			'section' 		=> 'footer_settings',
			'settings' 		=> 'footer_ressalva_switch',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_main_switch',
		array(
			'type' 			=> 'checkbox',
			'label'		 	=> 'Exibir bloco principal',
			'section' 		=> 'footer_settings',
			'settings' 		=> 'footer_main_switch',
		)
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_social_bg', array(
		'label'	 		=> 'REDES SOCIAIS',
		'description' 	=> 'Cor de fundo do bloco de redes sociais',
		'section' 		=> 'footer_settings',
		'settings'		=> 'footer_social_bg',
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_social_color', array(
		'description' 	=> 'Cor dos ícones',
		'section' 		=> 'footer_settings',
		'settings'		=> 'footer_social_color',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_padding', array(
		'description' 	=> 'Espaçamento interno superior e inferior',
		'section' 		=> 'footer_settings',
		'settings'		=> 'footer_padding',
		'type'			=> 'number',
	) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ressalva_rodape', array(
		'label' 		=> 'RESSALVA',
		'description' 	=> 'Texto de ressalva do rodapé',
		'section' 		=> 'footer_settings',
		'settings'		=> 'ressalva_rodape',
		'type'      	=> 'textarea',
	) ) );



}
add_action('customize_register', 'footer_settings');

function footer_settings_css() { ?>


	<style type="text/css">

		

	</style>


<?php }

add_action('wp_head', 'footer_settings_css');