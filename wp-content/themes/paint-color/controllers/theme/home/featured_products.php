<?php
/**
 * Created by PhpStorm.
 * User: Vanssiler
 * Date: 17/02/17
 * Time: 22:45
 */

function featured_products_settings( $wp_customize ) {



	$wp_customize->add_section( 'featured_products' , array(
		'panel' 		=> __( 'codesigner_home_panel' ),
		'title' 		=> __( 'Produtos', 'codesigner'),
		'priority' 		=> 55,
		'description' 	=> '<strong>DEFINIÇÕES GERAIS DO BLOCO DE PRODUTOS.</strong>',
	) );

	$wp_customize->add_setting( 'ft_products_bg' );
	$wp_customize->add_setting( 'ft_products_padding_top', array('default' => '80'));
	$wp_customize->add_setting( 'ft_products_padding_bottom', array('default' => '80'));
	$wp_customize->add_setting( 'ft_products_columns', array('default' => '4'));

	$wp_customize->add_setting( 'ft_products_block_title_content', array('default' => 'Posts'));
	$wp_customize->add_setting( 'ft_products_block_title_align', array('default' => 'left'));
	$wp_customize->add_setting( 'ft_products_block_title_transform', array('default' => 'uppercase'));
	$wp_customize->add_setting( 'ft_products_block_title_size');
	$wp_customize->add_setting( 'ft_products_block_title_color');
	$wp_customize->add_setting( 'ft_products_block_title_icon');
	$wp_customize->add_setting( 'ft_products_block_title_margin_bottom', array('default' => '60'));

	$wp_customize->add_setting( 'ft_products_item_title_transform', array('default' => 'normal'));
	$wp_customize->add_setting( 'ft_products_item_title_size');
	$wp_customize->add_setting( 'ft_products_item_title_color');
	$wp_customize->add_setting( 'ft_products_item_txt_size');
	$wp_customize->add_setting( 'ft_products_item_txt_color');
	$wp_customize->add_setting( 'ft_products_item_show_button', array('default' => 'yes'));


	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ft_products_bg', array(
		'label'				=> 'ESTRUTURA DO BLOCO',
		'description'		=> 'Cor de fundo do bloco',
		'section' 			=> 'featured_products',
		'settings' 			=> 'ft_products_bg',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ft_products_padding_top',
		array(
			'type' 			=> 'number',
			'description' 	=> 'Espaçamento interno superior',
			'section' 		=> 'featured_products',
			'settings' 		=> 'ft_products_padding_top',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ft_products_padding_bottom',
		array(
			'type' 			=> 'number',
			'description' 	=> 'Espaçamento interno inferior',
			'section' 		=> 'featured_products',
			'settings' 		=> 'ft_products_padding_bottom',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ft_products_columns',
		array(
			'type' 			=> 'radio',
			'description'	=> 'Quantidade de colunas',
			'section' 		=> 'featured_products',
			'settings' 		=> 'ft_products_columns',
			'choices' 		=> array(
				'1' 	=> '1',
				'2' 	=> '2',
				'3' 	=> '3',
				'4' 	=> '4',
			),
			'default' 		=> '4',
		)
	) );


	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ft_products_block_title_content',
		array(
			'label' 		=> 'TÍTULO DO BLOCO',
			'type' 			=> 'text',
			'description' 	=> 'Texto de título do bloco',
			'section' 		=> 'featured_products',
			'settings' 		=> 'ft_products_block_title_content',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ft_products_block_title_align',
		array(
			'type' 			=> 'radio',
			'description'	=> 'Alinhamento do título do bloco',
			'section' 		=> 'featured_products',
			'settings' 		=> 'ft_products_block_title_align',
			'choices' 		=> array(
				'left' 		=> 'Esquerda',
				'right' 	=> 'Direita',
				'center' 	=> 'Centralizado',
			),
			'default' 		=> 'left',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ft_products_block_title_transform',
		array(
			'type' 			=> 'radio',
			'description'	=> 'formato do título do bloco',
			'section' 		=> 'featured_products',
			'settings' 		=> 'ft_products_block_title_transform',
			'choices' 		=> array(
				'normal' 		=> 'Normal',
				'uppercase' 	=> 'Caixa alta',
				'lowercase' 	=> 'Caixa baixa',
			),
			'default' 		=> 'uppercase',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ft_products_block_title_size',
		array(
			'type' 			=> 'number',
			'description' 	=> 'Tamanho do título do bloco',
			'section' 		=> 'featured_products',
			'settings' 		=> 'ft_products_block_title_size',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ft_products_block_title_color', array(
		'description'		=> 'Cor do título do bloco',
		'section' 			=> 'featured_products',
		'settings' 			=> 'ft_products_block_title_color',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ft_products_block_title_icon',
		array(
			'type' 			=> 'text',
			'description' 	=> 'Ícone do bloco',
			'section' 		=> 'featured_products',
			'settings' 		=> 'ft_products_block_title_icon',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ft_products_block_title_margin_bottom',
		array(
			'type' 			=> 'number',
			'description' 	=> 'Margem inferior do título do bloco',
			'section' 		=> 'featured_products',
			'settings' 		=> 'ft_products_block_title_margin_bottom',
		)
	) );


	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ft_products_item_title_transform',
		array(
			'label' 		=> 'ÍTENS DO BLOCO',
			'type' 			=> 'radio',
			'description'	=> 'Formato do título dos ítens',
			'section' 		=> 'featured_products',
			'settings' 		=> 'ft_products_item_title_transform',
			'choices' 		=> array(
				'normal' 		=> 'Normal',
				'uppercase' 	=> 'Caixa alta',
				'lowercase' 	=> 'Caixa baixa',
			),
			'default' 		=> 'normal',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ft_products_item_title_size',
		array(
			'type' 			=> 'number',
			'description' 	=> 'Tamanho do título dos ítens',
			'section' 		=> 'featured_products',
			'settings' 		=> 'ft_products_item_title_size',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ft_products_item_title_color', array(
		'description'		=> 'Cor do título dos ítens',
		'section' 			=> 'featured_products',
		'settings' 			=> 'ft_products_item_title_color',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ft_products_item_txt_size',
		array(
			'type' 			=> 'number',
			'description' 	=> 'Tamanho do texto dos ítens',
			'section' 		=> 'featured_products',
			'settings' 		=> 'ft_products_item_txt_size',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ft_products_item_txt_color', array(
		'description'		=> 'Cor do texto dos ítens',
		'section' 			=> 'featured_products',
		'settings' 			=> 'ft_products_item_txt_color',
	) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ft_products_item_show_button',
		array(
			'type' 			=> 'radio',
			'description'	=> 'Mostrar botão "Saiba Mais" em cada bloco individual?',
			'section' 		=> 'featured_products',
			'settings' 		=> 'ft_products_item_show_button',
			'choices' 		=> array(
				'yes' 		=> 'Sim',
				'no' 		=> 'Não',
			),
			'default' 		=> 'yes',
		)
	) );


}
add_action('customize_register', 'featured_products_settings');

function featured_products_settings_css() { ?>


	<style type="text/css">

		.featured-products{
			background-color: <?php echo get_theme_mod('ft_products_bg');?>;
			padding-top: <?php echo get_theme_mod('ft_products_padding_top');?>px;
			padding-bottom: <?php echo get_theme_mod('ft_products_padding_bottom');?>px;
		}
		.featured-products h1{
			text-align: <?php echo get_theme_mod('ft_products_block_title_align')?>;
			font-size: <?php echo get_theme_mod('ft_products_block_title_size')?>px;
			color: <?php echo get_theme_mod('ft_products_block_title_color')?>;
			text-transform: <?php echo get_theme_mod('ft_products_block_title_transform')?>;
			margin-bottom: <?php echo get_theme_mod('ft_products_block_title_margin_bottom')?>px
		}
		.featured-products h2{
			text-align: <?php echo get_theme_mod('ft_products_item_title_align')?>;
			font-size: <?php echo get_theme_mod('ft_products_item_title_size')?>px;
			color: <?php echo get_theme_mod('ft_products_item_title_color')?>;
			text-transform: <?php echo get_theme_mod('ft_products_item_title_transform')?>;
		}
		.featured-products p,
		.featured-products p a{
			font-size: <?php echo get_theme_mod('ft_products_item_txt_size')?>px;
			color: <?php echo get_theme_mod('ft_products_item_txt_color')?>;
		}

	</style>

<?php }

add_action('wp_head', 'featured_products_settings_css');