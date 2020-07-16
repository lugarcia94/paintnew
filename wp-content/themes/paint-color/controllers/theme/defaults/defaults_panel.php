<?php
/**
 * Created by PhpStorm.
 * User: Vanssiler
 * Date: 16/02/17
 * Time: 15:27
 */

function codesigner_default_settings( $wp_customize ) {
	$wp_customize->add_panel('codesigner_defaults_panel', array(
		'title' 		=> __( 'Fontes, Cores e Botões', 'codesigner' ),
		'priority' 		=> 40,
	));

}
add_action('customize_register', 'codesigner_default_settings');

	include_once ('fonts.php');
	include_once ('font_settings.php');
	include_once ('colors.php');
	include_once ('buttons.php');