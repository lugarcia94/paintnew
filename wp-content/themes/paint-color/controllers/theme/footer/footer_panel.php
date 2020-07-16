<?php
/**
 * Created by PhpStorm.
 * User: Vanssiler
 * Date: 17/02/17
 * Time: 22:45
 */

function codesigner_footer_settings( $wp_customize ) {
	$wp_customize->add_panel('codesigner_footer_panel', array(
		'title' 		=> __( 'Rodapé', 'codesigner' ),
		'priority' 		=> 45,
	));

}
add_action('customize_register', 'codesigner_footer_settings');



include_once ('footer_settings.php');
include_once ('footer_newsletter.php');
include_once ('footer_main.php');
include_once ('footer_ressalva.php');
include_once ('footer_social.php');