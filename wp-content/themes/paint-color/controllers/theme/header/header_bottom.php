<?php
/**
 * Created by PhpStorm.
 * User: Vanssiler
 * Date: 14/02/17
 * Time: 21:53
 */

function codesigner_header_bottom( $wp_customize ) {

	$wp_customize->add_section( 'header_bottom' , array(
		'panel' 		=> __( 'codesigner_header_panel' ),
		'title' 		=> __( 'Parte inferior do topo', 'codesigner' ),
		'priority' 		=> 20,
		'description' 	=> '<strong>DEFINIÇÕES DO CABEÇALHO INFERIOR.</strong> <br><br>Este tema utiliza <strong>FontAwesome</strong> como base de ícones. Para encontrar seus ícones visite o <a href="http://fontawesome.io/icons/" target="_blank">site oficial</a> e faça uma busca pelo ícone desejado.',
	) );


	$wp_customize->add_setting( 'header_bottom_height', array('default' => '70'));
	$wp_customize->add_setting( 'header_bottom_search_switch', array('default' => '1'));
	$wp_customize->add_setting( 'header_bottom_search_icon', array('default' => '<i class="fa fa-search" aria-hidden="true"></i>'));
	$wp_customize->add_setting( 'header_bottom_background', array('default' => '#FFF', 'transport' => 'refresh'));
	$wp_customize->add_setting( 'header_bottom_txt_color', array('default' => '#3a3a3a', 'transport' => 'refresh'));
	$wp_customize->add_setting( 'header_menu_hover_bg', array('default' => '#3a3a3a', 'transport' => 'refresh'));
	$wp_customize->add_setting( 'header_menu_hover_color', array('default' => '#FFF', 'transport' => 'refresh'));
	$wp_customize->add_setting( 'header_menu_lv2_hover_bg', array('default' => '#666', 'transport' => 'refresh'));
	$wp_customize->add_setting( 'header_menu_lv2_hover_color', array('default' => '#FFF', 'transport' => 'refresh'));
	$wp_customize->add_setting( 'header_menu_lv3_hover_bg', array('default' => '#333', 'transport' => 'refresh'));
	$wp_customize->add_setting( 'header_menu_lv3_hover_color', array('default' => '#FFF', 'transport' => 'refresh'));


	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_bottom_height', array(
		'description' 	=> 'Altura da parte inefrior (em pixels)',
		'section' 	=> 'header_bottom',
		'settings'	=> 'header_bottom_height',
		'type'      => 'number',
	) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_bottom_search_switch',
		array(
			'type' 		=> 'checkbox',
			'label' 	=> 'Exibir busca',
			'section' 	=> 'header_bottom',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_bottom_search_icon', array(
		'description' 	=> 'Ícone da busca',
		'section' 	=> 'header_bottom',
		'settings'	=> 'header_bottom_search_icon',
		'type'      => 'text',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_bottom_background', array(
		'label' 		=> __('CORES PRINCIPAIS', 'codesigner'),
		'description'	=> 'Cor de fundo',
		'section' 		=> 'header_bottom',
		'settings' 		=> 'header_bottom_background',
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_bottom_txt_color', array(
		'description'	=> 'Cor dos textos',
		'section' => 'header_bottom',
		'settings' => 'header_bottom_txt_color',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_menu_hover_bg', array(
		'label'			=> 'CORES DO MENU - nível 1',
		'description'	=> 'Cor de fundo dos links ao passar o mouse',
		'section' => 'header_bottom',
		'settings' => 'header_menu_hover_bg',
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_menu_hover_color', array(
		'description'	=> 'Cor dos links ao passar o mouse',
		'section' => 'header_bottom',
		'settings' => 'header_menu_hover_color',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_menu_lv2_hover_bg', array(
		'label'			=> 'CORES DO MENU - nível 2',
		'description'	=> 'Cor de fundo dos links ao passar o mouse',
		'section' => 'header_bottom',
		'settings' => 'header_menu_lv2_hover_bg',
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_menu_lv2_hover_color', array(
		'description'	=> 'Cor dos links ao passar o mouse',
		'section' => 'header_bottom',
		'settings' => 'header_menu_lv2_hover_color',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_menu_lv3_hover_bg', array(
		'label'			=> 'CORES DO MENU - nível 3',
		'description'	=> 'Cor de fundo dos links ao passar o mouse',
		'section' => 'header_bottom',
		'settings' => 'header_menu_lv3_hover_bg',
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_menu_lv3_hover_color', array(
		'description'	=> 'Cor dos links ao passar o mouse',
		'section' => 'header_bottom',
		'settings' => 'header_menu_lv3_hover_color',
	) ) );

}
add_action('customize_register', 'codesigner_header_bottom');

function codesigner_headerbottom_css() { ?>

	<style type="text/css">

		.header-bottom{background-color: <?php echo get_theme_mod('header_bottom_background'); ?>;}
		.header-bottom *{color: <?php echo get_theme_mod('header_bottom_txt_color'); ?>;}
		@media(min-width: 991px) {
			.header-bottom .wrapper{height: <?php echo get_theme_mod('header_bottom_height'); ?>px;}
			.main-menu-list > li > a:hover,
			.main-menu-list > li:hover > a,
			.main-menu-list > li > .sub-menu > li > a{background-color: <?php echo get_theme_mod('header_menu_hover_bg'); ?>;}
			.main-menu-list > li > a:hover,
			.main-menu-list > li:hover > a{color: <?php echo get_theme_mod('header_menu_hover_color'); ?>;}

			.main-menu-list > li > .sub-menu > li > a{height: <?php echo get_theme_mod('header_bottom_height'); ?>px;}
			.main-menu-list > li > .sub-menu > li > a:hover,
			.main-menu-list > li > .sub-menu > li:hover > a{background-color: <?php echo get_theme_mod('header_menu_lv2_hover_bg'); ?>;}
			.main-menu-list > li > .sub-menu > li > a:hover,
			.main-menu-list > li > .sub-menu > li:hover > a{color: <?php echo get_theme_mod('header_menu_lv2_hover_color'); ?>;}

			.main-menu-list > li > .sub-menu > li > .sub-menu > li > a{background-color: <?php echo get_theme_mod('header_menu_lv2_hover_bg'); ?>; color: <?php echo get_theme_mod('header_menu_lv2_hover_color'); ?>; height: <?php echo get_theme_mod('header_bottom_height'); ?>px;}
			.main-menu-list > li > .sub-menu > li > .sub-menu > li > a:hover,
			.main-menu-list > li > .sub-menu > li > .sub-menu > li:hover > a{background-color: <?php echo get_theme_mod('header_menu_lv3_hover_bg'); ?>;}
			.main-menu-list > li > .sub-menu > li > .sub-menu > li > a:hover,
			.main-menu-list > li > .sub-menu > li > .sub-menu > li:hover > a{color: <?php echo get_theme_mod('header_menu_lv3_hover_color'); ?>;}
		}

		@media (max-width: 991px){
			.main-menu-list > li > .sub-menu > li > a{
				background-color: <?php echo get_theme_mod('header_menu_lv2_hover_bg'); ?>;
				color: <?php echo get_theme_mod('header_menu_lv2_hover_color'); ?>;
			}
			.main-menu-list > li > .sub-menu > li > .sub-menu > li > a{
				background-color: <?php echo get_theme_mod('header_menu_lv3_hover_bg'); ?>;
				color: <?php echo get_theme_mod('header_menu_lv3_hover_color'); ?>;;
			}
		}

	</style>

<?php }

add_action('wp_head', 'codesigner_headerbottom_css');
