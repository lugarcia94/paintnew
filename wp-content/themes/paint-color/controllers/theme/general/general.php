<?php
/**
 * Created by PhpStorm.
 * User: Vanssiler
 * Date: 15/02/17
 * Time: 16:20
 */

function general_info( $wp_customize ){

	$wp_customize->add_section( 'codesigner_infogeral' , array(
		'title' 		=> __( 'Informações gerais', 'txt_footer' ),
		'priority' 		=> 20,
		'description' 	=> 'Preencha as informações do site aqui.',
	) );

	$wp_customize->add_setting( 'garantia_da_loja' );
	$wp_customize->add_setting( 'dados_empresa' );
	$wp_customize->add_setting( 'endereco' );
	$wp_customize->add_setting( 'gmaps' );
	$wp_customize->add_setting( 'horario_atendimento' );
	$wp_customize->add_setting( 'ressalva_rodape' );
	$wp_customize->add_setting( 'footer_logo' );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'garantia_da_loja', array(
		'label' 	=> __( 'Garantia da loja' ),
		'section' 	=> 'codesigner_infogeral',
		'settings'	=> 'garantia_da_loja',
		'type'      => 'textarea',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dados_empresa', array(
		'label' 	=> __( 'Dados da empresa' ),
		'section' 	=> 'codesigner_infogeral',
		'settings'	=> 'dados_empresa',
		'type'      => 'textarea',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'endereco', array(
		'label' 	=> __( 'Endereço' ),
		'section' 	=> 'codesigner_infogeral',
		'settings'	=> 'endereco',
		'type'      => 'textarea',
	) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'gmaps', array(
		'label'			=> 'Endereço no Google Maps',
		'description'	=> 'Cole o código embed do Google Maps',
		'section' 		=> 'codesigner_infogeral',
		'settings'		=> 'gmaps',
		'type'      	=> 'text',
	) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'horario_atendimento', array(
		'label' 	=> __( 'Horários de atendimento' ),
		'section' 	=> 'codesigner_infogeral',
		'settings'	=> 'horario_atendimento',
		'type'      => 'textarea',
	) ) );
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ressalva_rodape', array(
		'label' 	=> __( 'Ressalva do rodapé' ),
		'section' 	=> 'codesigner_infogeral',
		'settings'	=> 'ressalva_rodape',
		'type'      => 'textarea',
	) ) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_logo', array(
		'label' 	=> __( 'Logo do rodapé', 'codesigner' ),
		'section' 	=> 'codesigner_infogeral',
		'settings' 	=> 'footer_logo',
	) ) );


}
add_action('customize_register', 'general_info');