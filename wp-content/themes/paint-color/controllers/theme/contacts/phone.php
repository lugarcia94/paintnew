<?php
/**
 * Created by PhpStorm.
 * User: Vanssiler
 * Date: 15/02/17
 * Time: 13:46
 */

function phone_number( $wp_customize ){
	$wp_customize->add_section( 'codesigner_telefone' , array(
		'title' 		=> __( 'Telefones', 'txt_footer' ),
		'priority' 		=> 20,
		'description' 	=> '<strong>TELEFONES PARA CONTATO.</strong>',
	) );

	$wp_customize->add_setting( 'tel_1' );
	$wp_customize->add_setting( 'tel_2' );
	$wp_customize->add_setting( 'whatsapp');
	$wp_customize->add_setting( 'whatsapp_link');

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tel_1', array(
		'label' 	=> __('TELEFONE 1'),
		'description' 	=> 'Número',
		'section' 	=> 'codesigner_telefone',
		'settings'	=> 'tel_1',
		'type'      => 'text',
	) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tel_2', array(
		'label' 	=> __('TELEFONE 2'),
		'description' 	=> 'Número',
		'section' 	=> 'codesigner_telefone',
		'settings'	=> 'tel_2',
		'type'      => 'text',
	) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'whatsapp', array(
		'label' 	=> __('Whatsapp'),
		'description' 	=> 'Número',
		'section' 	=> 'codesigner_telefone',
		'settings'	=> 'whatsapp',
		'type'      => 'text',
	) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'whatsapp_link', array(
		'label' 	=> __('Link do Whatsapp'),
		'description' 	=> '(Insira o número com código do país e área, sem espaço entre os caracteres)',
		'section' 	=> 'codesigner_telefone',
		'settings'	=> 'whatsapp_link',
		'type'      => 'text',
	) ) );

}
add_action('customize_register', 'phone_number');