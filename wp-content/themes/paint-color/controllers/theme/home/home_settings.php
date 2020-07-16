<?php
/**
 * Created by PhpStorm.
 * User: Vanssiler
 * Date: 17/02/17
 * Time: 22:45
 */

function home_settings( $wp_customize ) {


	$wp_customize->add_section( 'home_configs' , array(
		'panel' 		=> __( 'codesigner_home_panel' ),
		'title' 		=> __( 'Habilitar Blocos', 'codesigner' ),
		'priority' 		=> 40,
		'description' 	=> '<strong>DEFINIÇÕES GERAIS DA HOME.</strong>',
	) );


	$wp_customize->add_setting( 'slider_trigger', array('default' => '1'));
	$wp_customize->add_setting( 'posts_trigger', array('default' => '1'));
	$wp_customize->add_setting( 'products_trigger', array('default' => '1'));
	$wp_customize->add_setting( 'events_trigger', array('default' => '1'));
	$wp_customize->add_setting( 'about_trigger', array('default' => '1'));


	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'slider_trigger',
		array(
			'type' 			=> 'checkbox',
			'label' 		=> 'Habilitar Slider',
			'section' 		=> 'home_configs',
			'settings' 		=> 'slider_trigger',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'posts_trigger',
		array(
			'type' 			=> 'checkbox',
			'label' 		=> 'Habilitar Posts em destaque',
			'section' 		=> 'home_configs',
			'settings' 		=> 'posts_trigger',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'products_trigger',
		array(
			'type' 			=> 'checkbox',
			'label' 		=> 'Habilitar Produtos em destaque',
			'section' 		=> 'home_configs',
			'settings' 		=> 'products_trigger',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'events_trigger',
		array(
			'type' 			=> 'checkbox',
			'label' 		=> 'Habilitar Eventos em destaque',
			'section' 		=> 'home_configs',
			'settings' 		=> 'events_trigger',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'about_trigger',
		array(
			'type' 			=> 'checkbox',
			'label' 		=> 'Habilitar Resumo da página quem somos',
			'section' 		=> 'home_configs',
			'settings' 		=> 'about_trigger',
		)
	) );




}
add_action('customize_register', 'home_settings');