<?php
/**
 * Created by PhpStorm.
 * User: Vanssiler
 * Date: 15/02/17
 * Time: 16:12
 */

function email( $wp_customize ){
	$wp_customize->add_section( 'codesigner_email' , array(
		'title' 		=> __( 'E-mails', 'txt_footer' ),
		'priority' 		=> 30,
		'description' 	=> '<strong>E-MAILS PARA CONTATO.</strong> <br>Este tema utiliza <strong>FontAwesome</strong> como base de ícones. Para encontrar seus ícones visite o <a href="http://fontawesome.io/icons/" target="_blank">site oficial</a> e faça uma busca pelo ícone desejado.',
	) );
	$wp_customize->add_setting( 'email_1' );
	$wp_customize->add_setting( 'email_2' );
	$wp_customize->add_setting( 'email_3' );
	$wp_customize->add_setting( 'email_4' );


	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'email_1', array(
		'section' 		=> 'codesigner_email',
		'settings'		=> 'email_1',
		'type'      	=> 'text',
		'description' 	=> 'Endereço de e-mail 1',
	) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'email_2', array(
		'section' 		=> 'codesigner_email',
		'settings'		=> 'email_2',
		'type'      	=> 'text',
		'description' 	=> 'Endereço de e-mail 2',
	) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'email_3', array(
		'section' 		=> 'codesigner_email',
		'settings'		=> 'email_3',
		'type'      	=> 'text',
		'description' 	=> 'Endereço de e-mail 3',
	) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'email_4', array(
		'section' 		=> 'codesigner_email',
		'settings'		=> 'email_4',
		'type'      	=> 'text',
		'description' 	=> 'Endereço de e-mail 4',
	) ) );

}
add_action('customize_register', 'email');