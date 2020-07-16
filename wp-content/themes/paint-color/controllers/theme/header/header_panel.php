<?php
/**
 * Created by PhpStorm.
 * User: Vanssiler
 * Date: 14/02/17
 * Time: 21:53
 */

function codesigner_header( $wp_customize ) {
	$wp_customize->add_panel('codesigner_header_panel', array(
		'title' 		=> __( 'Header', 'codesigner' ),
		'priority' 		=> 40,
	));

}
add_action('customize_register', 'codesigner_header');

include_once ('header_top.php');
include_once ('header_bottom.php');