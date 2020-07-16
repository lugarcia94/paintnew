<?php
/**
 * Created by PhpStorm.
 * User: Vanssiler
 * Date: 17/02/17
 * Time: 22:47
 */

function codesigner_home_settings( $wp_customize ) {
	$wp_customize->add_panel('codesigner_home_panel', array(
		'title' 		=> __( 'Homepage', 'codesigner' ),
		'priority' 		=> 45,
	));

}
add_action('customize_register', 'codesigner_home_settings');



include_once ('home_settings.php');
include_once ('default_slider.php');
include_once ('featured_posts.php');
include_once ('featured_products.php');
include_once ('featured_events.php');
include_once ('home_about.php');