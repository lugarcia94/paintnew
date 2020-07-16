<?php
/**
 * Created by PhpStorm.
 * User: Vanssiler
 * Date: 17/02/17
 * Time: 22:45
 */

function default_slider_settings( $wp_customize ) {



	$wp_customize->add_section( 'slider_section' , array(
		'panel' 		=> __( 'codesigner_home_panel' ),
		'title' 		=> __( 'Slider', 'codesigner'),
		'priority' 		=> 45,
		'description' 	=> '<strong>DEFINIÇÕES GERAIS DO SLIDER.</strong>',
	) );

	$wp_customize->add_setting( 'codesigner_banner_background' );
	$wp_customize->add_setting( 'slider_item_count', array('default' => '10'));
	$wp_customize->add_setting( 'slider_auto_play', array('default' => 'false'));
	$wp_customize->add_setting( 'slider_time', array('default' => '7'));
	$wp_customize->add_setting( 'slider_padding_y', array('default' => '90'));
	$wp_customize->add_setting( 'slider_padding_x', array('default' => '70'));

	$wp_customize->add_setting( 'slider_left_arrow', array('default' => '<i class="fa fa-angle-left" aria-hidden="true"></i>'));
	$wp_customize->add_setting( 'slider_right_arrow', array('default' => '<i class="fa fa-angle-right" aria-hidden="true"></i>'));
	$wp_customize->add_setting( 'slider_arrow_size', array('default' => '28'));
	$wp_customize->add_setting( 'slider_arrow_radius', array('default' => '30'));
	$wp_customize->add_setting( 'slider_arrow_color', array('default' => '#333'));
	$wp_customize->add_setting( 'slider_arrow_bg');
	$wp_customize->add_setting( 'slider_arrow_hover_bg', array('default' => '#fff'));

	$wp_customize->add_setting( 'slider_alignment', array('default' => 'left'));
	$wp_customize->add_setting( 'slider_show_category', array('default' => '1'));
	$wp_customize->add_setting( 'slider_block_bg');
	$wp_customize->add_setting( 'slider_block_padding_y', array('default' => '30'));
	$wp_customize->add_setting( 'slider_block_padding_x', array('default' => '30'));
	$wp_customize->add_setting( 'slider_box_text_transform', array('default' => 'uppercase'));
	$wp_customize->add_setting( 'slider_block_title_color');
	$wp_customize->add_setting( 'slider_block_title_size');
	$wp_customize->add_setting( 'slider_block_text_color');
	$wp_customize->add_setting( 'slider_block_text_size');
	$wp_customize->add_setting( 'slider_block_link_color');
	$wp_customize->add_setting( 'slider_block_link_size');

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'codesigner_banner_background', array(
		'description' 		=> 'Imagem padrão que será exibida quando o post não tiver imagem própria para o slider.',
		'section' 			=> 'slider_section',
		'settings' 			=> 'codesigner_banner_background',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'slider_item_count',
		array(
			'type' 		=> 'number',
			'description' 	=> 'Quantidade de posts no slider',
			'section' 	=> 'slider_section',
			'settings' 	=> 'slider_item_count',
		)
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'slider_auto_play',
		array(
			'type' 			=> 'radio',
			'description'	=> 'Rolagem automática do slider',
			'section' 		=> 'slider_section',
			'settings' 		=> 'slider_auto_play',
			'choices' 		=> array(
				'true' 		=> 'Habilitada',
				'false' 	=> 'Desabilitada',
			),
			'default'			=> 'false',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'slider_time',
		array(
			'type' 			=> 'number',
			'description' 	=> 'Tempo de exibição de cada slider',
			'section' 		=> 'slider_section',
			'settings' 		=> 'slider_time',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'slider_padding_y',
		array(
			'type' 			=> 'number',
			'description' 	=> 'Espaçamento interno superior e inferior',
			'section' 		=> 'slider_section',
			'settings' 		=> 'slider_padding_y',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'slider_padding_x',
		array(
			'type' 			=> 'number',
			'description' 	=> 'Espaçamento interno nas laterais',
			'section' 		=> 'slider_section',
			'settings' 		=> 'slider_padding_x',
		)
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'slider_left_arrow',
		array(
			'type' 			=> 'text',
			'label' 		=> 'ÍCONES DE SETA',
			'description' 	=> 'Ícone de seta para a esquerda',
			'section' 		=> 'slider_section',
			'settings' 		=> 'slider_left_arrow',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'slider_right_arrow',
		array(
			'type' 			=> 'text',
			'description' 	=> 'Ícone de seta para a direita',
			'section' 		=> 'slider_section',
			'settings' 		=> 'slider_right_arrow',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'slider_arrow_size',
		array(
			'type' 			=> 'number',
			'description' 	=> 'Tamanho ícone de seta',
			'section' 		=> 'slider_section',
			'settings' 		=> 'slider_arrow_size',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'slider_arrow_radius',
		array(
			'type' 			=> 'number',
			'description' 	=> 'Cantos arredondados do botão de seta',
			'section' 		=> 'slider_section',
			'settings' 		=> 'slider_arrow_radius',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'slider_arrow_color', array(
		'description'		=> 'Cor das setas',
		'section' 			=> 'slider_section',
		'settings' 			=> 'slider_arrow_color',
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'slider_arrow_bg', array(
		'description'				=> 'Cor de fundo das setas',
		'section' 			=> 'slider_section',
		'settings' 			=> 'slider_arrow_bg',
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'slider_arrow_hover_bg', array(
		'description'				=> 'Cor de fundo das setas ao passar o mouse',
		'section' 			=> 'slider_section',
		'settings' 			=> 'slider_arrow_hover_bg',
	) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'slider_alignment',
		array(
			'type' 			=> 'radio',
			'label' 		=> 'CONTEÚDO DO SLIDER',
			'description'	=> 'Alinhamento dos blocos',
			'section' 		=> 'slider_section',
			'settings' 		=> 'slider_alignment',
			'choices' 		=> array(
				'left' 		=> 'Esquerda',
				'right' 	=> 'Direita',
				'center' 	=> 'Centralizado',
			),
			'default'			=> 'left',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'slider_show_category',
		array(
			'type' 			=> 'checkbox',
			'label' 		=> 'Exibir categoria',
			'section' 		=> 'slider_section',
			'settings' 		=> 'slider_show_category',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'slider_block_bg', array(
		'description'		=> 'Cor de fundo dos blocos',
		'section' 			=> 'slider_section',
		'settings' 			=> 'slider_block_bg',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'slider_block_padding_y',
		array(
			'type' 			=> 'number',
			'description' 	=> 'Espaçamento interno superior e inferior dos blocos',
			'section' 		=> 'slider_section',
			'settings' 		=> 'slider_block_padding_y',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'slider_block_padding_x',
		array(
			'type' 			=> 'number',
			'description' 	=> 'Espaçamento interno lateral dos blocos',
			'section' 		=> 'slider_section',
			'settings' 		=> 'slider_block_padding_x',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'slider_box_text_transform',
		array(
			'type' 			=> 'radio',
			'label' 		=> 'TEXTOS',
			'description'	=> 'Formato dos títulos e link',
			'section' 		=> 'slider_section',
			'settings' 		=> 'slider_box_text_transform',
			'choices' 		=> array(
				'normal' 	=> 'Normal',
				'uppercase' => 'Caixa alta',
				'lowercase' => 'Caixa baixa',
			),
			'default'			=> 'uppercase',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'slider_block_title_color', array(
		'description'		=> 'Cor do título',
		'section' 			=> 'slider_section',
		'settings' 			=> 'slider_block_title_color',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'slider_block_title_size', array(
		'type'				=> 'number',
		'description'		=> 'Tamanho da fonte do título',
		'section' 			=> 'slider_section',
		'settings' 			=> 'slider_block_title_size',
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'slider_block_text_color', array(
		'description'		=> 'Cor do resumo',
		'section' 			=> 'slider_section',
		'settings' 			=> 'slider_block_text_color',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'slider_block_text_size', array(
		'type'				=> 'number',
		'description'		=> 'Tamanho da fonte do resumo',
		'section' 			=> 'slider_section',
		'settings' 			=> 'slider_block_text_size',
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'slider_block_link_color', array(
		'description'		=> 'Cor do link',
		'section' 			=> 'slider_section',
		'settings' 			=> 'slider_block_link_color',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'slider_block_link_size', array(
		'type'				=> 'number',
		'description'		=> 'Tamanho da fonte do link',
		'section' 			=> 'slider_section',
		'settings' 			=> 'slider_block_link_size',
	) ) );


}
add_action('customize_register', 'default_slider_settings');

function codesigner_slider_css() { ?>


	<style type="text/css">

		@media(min-width: 768px){
			.homeslider .banner-item .container{padding: <?php echo get_theme_mod('slider_padding_y')?>px <?php echo get_theme_mod('slider_padding_x')?>px}
		}
		.homeslider .owl-nav i{color: <?php echo get_theme_mod('slider_arrow_color')?>; font-size: <?php echo get_theme_mod('slider_arrow_size')?>px;}
		.homeslider .owl-nav > div{border-radius: <?php echo get_theme_mod('slider_arrow_radius')?>px; background: <?php echo get_theme_mod('slider_arrow_bg')?>;}
		.homeslider:hover .owl-nav > div{background: <?php echo get_theme_mod('slider_arrow_hover_bg')?>}
		.banner-itembox{padding: <?php echo get_theme_mod('slider_block_padding_y')?>px <?php echo get_theme_mod('slider_block_padding_x')?>px; background: <?php echo get_theme_mod('slider_block_bg')?>}
		.banner-itembox h1,
		.banner-itembox .category,
		.banner-itembox .action-link{text-transform: <?php echo get_theme_mod('slider_box_text_transform')?>}
		.banner-itembox h1{color: <?php echo get_theme_mod('slider_block_title_color')?>; font-size: <?php echo get_theme_mod('slider_block_title_size')?>px;}
		.banner-itembox .slider-content *{color: <?php echo get_theme_mod('slider_block_text_color')?>; font-size: <?php echo get_theme_mod('slider_block_text_size')?>px;}
		.banner-itembox .action-link,
		.banner-itembox .action-link i{color: <?php echo get_theme_mod('slider_block_link_color')?>; font-size: <?php echo get_theme_mod('slider_block_link_size')?>px;}

	</style>

<?php }

add_action('wp_head', 'codesigner_slider_css');