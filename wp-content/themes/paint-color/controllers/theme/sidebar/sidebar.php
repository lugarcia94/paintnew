<?php
/**
 * Created by PhpStorm.
 * User: Vanssiler
 * Date: 23/02/17
 * Time: 01:26
 */

function sidebar_settings( $wp_customize ) {

	$wp_customize->add_section( 'sidebar_settings' , array(
		'title' 		=> __( 'Sidebar', 'codesigner'),
		'priority' 		=> 60,
		'description' 	=> '<strong>DEFINIÇÕES GERAIS DA COLUNA LATERAL.</strong>',
	) );

	$wp_customize->add_setting( 'sidebar_bg' );
	$wp_customize->add_setting( 'sidebar_title_transform', array('default' => 'uppercase'));
	$wp_customize->add_setting( 'sidebar_title_size');
	$wp_customize->add_setting( 'sidebar_title_color');
	$wp_customize->add_setting( 'sidebar_block_margin_bottom');

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_bg', array(
		'description'		=> 'Cor de fundo do bloco',
		'section' 			=> 'sidebar_settings',
		'settings' 			=> 'sidebar_bg',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sidebar_title_transform',
		array(
			'type' 			=> 'radio',
			'description'	=> 'Formato dos títulos',
			'section' 		=> 'sidebar_settings',
			'settings' 		=> 'sidebar_title_transform',
			'choices' 		=> array(
				'normal' 		=> 'Normal',
				'uppercase' 	=> 'Caixa alta',
				'lowercase' 	=> 'Caixa baixa',
			),
			'default' 		=> 'uppercase',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sidebar_title_size',
		array(
			'type' 			=> 'number',
			'description' 	=> 'Tamanho da fonte dos títulos',
			'section' 		=> 'sidebar_settings',
			'settings' 		=> 'sidebar_title_size',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_title_color',
		array(
			'description' 	=> 'Cor dos títulos',
			'section' 		=> 'sidebar_settings',
			'settings' 		=> 'sidebar_title_color',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sidebar_block_margin_bottom',
		array(
			'type' 			=> 'number',
			'description' 	=> 'Margem inferior dos blocos',
			'section' 		=> 'sidebar_settings',
			'settings' 		=> 'sidebar_block_margin_bottom',
		)
	) );

}
add_action('customize_register', 'sidebar_settings');


function sidebar_settings_css() { ?>


	<style type="text/css">

		#secondary .widget{
			background: <?php echo get_theme_mod('sidebar_bg')?>;
			margin-bottom: <?php echo get_theme_mod('sidebar_block_margin_bottom')?>px;
		}
		#secondary .sidebar-heading h3{
			color: <?php echo get_theme_mod('sidebar_title_color')?>;
			font-size: <?php echo get_theme_mod('sidebar_title_size')?>px;
			text-transform: <?php echo get_theme_mod('sidebar_title_transform')?>;
		}

	</style>

<?php }

add_action('wp_head', 'sidebar_settings_css');
