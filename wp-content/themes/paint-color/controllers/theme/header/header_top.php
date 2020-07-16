<?php
/**
 * Created by PhpStorm.
 * User: Vanssiler
 * Date: 14/02/17
 * Time: 21:53
 */

function codesigner_header_top( $wp_customize ) {

	$wp_customize->add_section( 'codesigner_header_top' , array(
		'panel' 		=> __( 'codesigner_header_panel' ),
		'title' 		=> __( 'Parte superior do topo', 'codesigner' ),
		'priority' 		=> 20,
		'description' 	=> 'Defina as cores de fundo e elementos da parte superior.',
	) );

	$wp_customize->add_setting( 'codesigner_header_top_switch');
	$wp_customize->add_setting( 'codesigner_header_top_slogan_switch', array('default' => '1'));
	$wp_customize->add_setting( 'codesigner_header_top_phone_switch', array('default' => '1'));
	$wp_customize->add_setting( 'codesigner_header_top_background', array('default' => '#FFF', 'transport' => 'refresh'));
	$wp_customize->add_setting( 'codesigner_header_top_txt_color', array('default' => '#3a3a3a', 'transport' => 'refresh'));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'codesigner_header_top_switch',
		array(
			'type' 		=> 'radio',
			'label' 	=> 'Exibir parte superior?',
			'section' 	=> 'codesigner_header_top',
			'choices' 	=> array(
				'yes' 		=> 'Sim',
				'no' 		=> 'Não',
			),
			'default'			=> 'yes',
		)
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'codesigner_header_top_slogan_switch',
		array(
			'type' 		=> 'checkbox',
			'label' 	=> 'Exibir slogan',
			'section' 	=> 'codesigner_header_top',
		)
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'codesigner_header_top_phone_switch',
		array(
			'type' 		=> 'checkbox',
			'label' 	=> 'Exibir telefone primário',
			'section' 	=> 'codesigner_header_top',
		)
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'codesigner_header_top_background', array(
		'label' => __('Cor de fundo', 'codesigner'),
		'section' => 'codesigner_header_top',
		'settings' => 'codesigner_header_top_background',
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'codesigner_header_top_txt_color', array(
		'label' => __('Cor dos textos', 'codesigner'),
		'section' => 'codesigner_header_top',
		'settings' => 'codesigner_header_top_txt_color',
	) ) );



}
add_action('customize_register', 'codesigner_header_top');

function codesigner_headertop_css() { ?>

	<style type="text/css">

		.header-top{background-color: <?php echo get_theme_mod('codesigner_header_top_background'); ?>;}
		.header-top *{color: <?php echo get_theme_mod('codesigner_header_top_txt_color'); ?>}

	</style>

<?php }

add_action('wp_head', 'codesigner_headertop_css');