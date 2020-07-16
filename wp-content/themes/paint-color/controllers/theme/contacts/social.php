<?php
/**
 * Created by PhpStorm.
 * User: Vanssiler
 * Date: 15/02/17
 * Time: 13:46
 */

function social_links( $wp_customize ){
	$wp_customize->add_section( 'codesigner_social' , array(
		'title' 		=> __( 'Redes Sociais', 'social' ),
		'priority' 		=> 35,
		'description' 	=> '<strong>LINKS DAS REDES SOCIAIS.</strong> <br>Este tema utiliza <strong>FontAwesome</strong> como base de ícones. Para encontrar seus ícones visite o <a href="http://fontawesome.io/icons/" target="_blank">site oficial</a> e faça uma busca pelo ícone desejado.',
	) );
	$wp_customize->add_setting( 'facebook_url' );
	$wp_customize->add_setting( 'twitter_url' );
	$wp_customize->add_setting( 'youtube_url' );
	$wp_customize->add_setting( 'instagram_url' );
	$wp_customize->add_setting( 'pinterest_url' );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'facebook_url', array(
		'label'			=> 'FACEBOOK',
		'description'	=> 'Link',
		'section' 		=> 'codesigner_social',
		'settings'		=> 'facebook_url',
		'type'      	=> 'text',
	) ) );


	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'twitter_url', array(
		'label'			=> 'TWITTER',
		'description'	=> 'Link',
		'section' 		=> 'codesigner_social',
		'settings'		=> 'twitter_url',
		'type'      	=> 'text',
	) ) );


	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'youtube_url', array(
		'label'			=> 'YOUTUBE',
		'description'	=> 'Link',
		'section' 		=> 'codesigner_social',
		'settings'		=> 'youtube_url',
		'type'      	=> 'text',
	) ) );


	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'instagram_url', array(
		'label'			=> 'INSTAGRAM',
		'description'	=> 'Link',
		'section' 		=> 'codesigner_social',
		'settings'		=> 'instagram_url',
		'type'      	=> 'text',
	) ) );


	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pinterest_url', array(
		'label'			=> 'PINTEREST',
		'description'	=> 'Link',
		'section' 		=> 'codesigner_social',
		'settings'		=> 'pinterest_url',
		'type'      	=> 'text',
	) ) );


}
add_action('customize_register', 'social_links');