<?php
/**
 * Created by PhpStorm.
 * User: Vanssiler
 * Date: 23/02/17
 * Time: 01:26
 */

function google_settings( $wp_customize ) {

	$wp_customize->add_section( 'google_settings' , array(
		'title' 		=> __( 'Google', 'codesigner'),
		'priority' 		=> 60,
		'description' 	=> '<strong>CÓDIGOS ADICIONAIS DO GOOGLE</strong>',
	) );

	$wp_customize->add_setting( 'analytics' );


	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'analytics',
		array(
			'type' 			=> 'textarea',
			'label'			=> 'Analytics',
			'description'	=> 'Código do Google Analytics',
			'section' 		=> 'google_settings',
			'settings' 		=> 'analytics',
		)
	) );
}
add_action('customize_register', 'google_settings');

