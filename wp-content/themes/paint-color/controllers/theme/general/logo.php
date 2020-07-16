<?php
/**
 * Created by PhpStorm.
 * User: Vanssiler
 * Date: 14/02/17
 * Time: 21:51
 */
function codesigner_default_logo( $wp_customize ) {
	$wp_customize->add_setting('upload_logo');

	$wp_customize->add_control(
		new \WP_Customize_Image_Control(
			$wp_customize,
			'upload_logo',
			array(
				'label' => 'Logo',
				'section' => 'title_tagline',
				'settings' => 'upload_logo',
				'transport' => 'postMessage'
			)
		)
	);

}
add_action('customize_register', 'codesigner_default_logo');