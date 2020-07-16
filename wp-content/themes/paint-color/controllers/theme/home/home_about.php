<?php
/**
 * Created by PhpStorm.
 * User: Vanssiler
 * Date: 17/02/17
 * Time: 22:45
 */

function featured_about_settings( $wp_customize ) {



	$wp_customize->add_section( 'featured_about' , array(
		'panel' 		=> __( 'codesigner_home_panel' ),
		'title' 		=> __( 'Sobre', 'codesigner'),
		'priority' 		=> 60,
		'description' 	=> '<strong>BLOCO DE DESTAQUE SOBRE A EMPRESA.</strong>',
	) );

	$wp_customize->add_setting( 'ft_about_parallax_switch', array('default' => 'no'));
	$wp_customize->add_setting( 'ft_about_img_bg' );
	$wp_customize->add_setting( 'ft_about_bg' );
	$wp_customize->add_setting( 'ft_about_padding_top', array('default' => '60'));
	$wp_customize->add_setting( 'ft_about_padding_bottom', array('default' => '60'));
	$wp_customize->add_setting( 'ft_about_block_text_align', array('default' => 'left'));

	$wp_customize->add_setting( 'ft_about_block_title_content', array('default' => 'Sobre a empresa'));
	$wp_customize->add_setting( 'ft_about_block_title_transform', array('default' => 'uppercase'));
	$wp_customize->add_setting( 'ft_about_block_title_size');
	$wp_customize->add_setting( 'ft_about_block_title_color');
	$wp_customize->add_setting( 'ft_about_block_title_icon');
	$wp_customize->add_setting( 'ft_about_block_title_margin_bottom', array('default' => '60'));

	$wp_customize->add_setting( 'ft_about_item_txt_content');
	$wp_customize->add_setting( 'ft_about_item_txt_transform', array('default' => 'uppercase'));
	$wp_customize->add_setting( 'ft_about_item_txt_size');
	$wp_customize->add_setting( 'ft_about_item_txt_color');

	$wp_customize->add_setting( 'ft_about_block_url');

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ft_about_parallax_switch',
		array(
			'label'			=> 'FUNDO EM PARALLAX',
			'description' 	=> 'Para utilizar imagens de fundo com efeito parallax, faça o upload de imagens com resolução de 1980px por 1080px. Desta forma o fundo aparecerá adequadamente em todos os tipos monitores.',
			'type' 			=> 'radio',
			'section' 		=> 'featured_about',
			'settings' 		=> 'ft_about_parallax_switch',
			'choices' 		=> array(
				'yes' 		=> 'Sim',
				'no' 		=> 'Não',
			),
		)
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'codesigner_logo', array(
		'label' 			=> 'FUNDO DO BLOCO',
		'section' 			=> 'featured_about',
		'settings' 			=> 'ft_about_img_bg',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ft_about_bg', array(
		'label'				=> 'ESTRUTURA DO BLOCO',
		'description'		=> 'Cor de fundo do bloco',
		'section' 			=> 'featured_about',
		'settings' 			=> 'ft_about_bg',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ft_about_padding_top',
		array(
			'type' 			=> 'number',
			'description' 	=> 'Espaçamento interno superior',
			'section' 		=> 'featured_about',
			'settings' 		=> 'ft_about_padding_top',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ft_about_padding_bottom',
		array(
			'type' 			=> 'number',
			'description' 	=> 'Espaçamento interno inferior',
			'section' 		=> 'featured_about',
			'settings' 		=> 'ft_about_padding_bottom',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ft_about_block_text_align',
		array(
			'type' 			=> 'radio',
			'description'	=> 'Alinhamento do conteúdo',
			'section' 		=> 'featured_about',
			'settings' 		=> 'ft_about_block_text_align',
			'choices' 		=> array(
				'left' 		=> 'Esquerda',
				'right' 	=> 'Direita',
				'center' 	=> 'Centralizado',
			),
			'default' 		=> 'left',
		)
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ft_about_block_title_content',
		array(
			'type' 			=> 'text',
			'label' 		=> 'TÍTULO DO BLOCO',
			'description' 	=> 'Texto de título do bloco',
			'section' 		=> 'featured_about',
			'settings' 		=> 'ft_about_block_title_content',
		)
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ft_about_block_title_transform',
		array(
			'type' 			=> 'radio',
			'description'	=> 'formato do título do bloco',
			'section' 		=> 'featured_about',
			'settings' 		=> 'ft_about_block_title_transform',
			'choices' 		=> array(
				'normal' 		=> 'Normal',
				'uppercase' 	=> 'Caixa alta',
				'lowercase' 	=> 'Caixa baixa',
			),
			'default' 		=> 'uppercase',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ft_about_block_title_size',
		array(
			'type' 			=> 'number',
			'description' 	=> 'Tamanho do título do bloco',
			'section' 		=> 'featured_about',
			'settings' 		=> 'ft_about_block_title_size',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ft_about_block_title_color', array(
		'description'		=> 'Cor do título do bloco',
		'section' 			=> 'featured_about',
		'settings' 			=> 'ft_about_block_title_color',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ft_about_block_title_margin_bottom',
		array(
			'type' 			=> 'number',
			'description' 	=> 'Margem inferior do título do bloco',
			'section' 		=> 'featured_about',
			'settings' 		=> 'ft_about_block_title_margin_bottom',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ft_about_block_title_icon',
		array(
			'type' 			=> 'text',
			'description' 	=> 'Ícone do bloco',
			'section' 		=> 'featured_about',
			'settings' 		=> 'ft_about_block_title_icon',
		)
	) );


	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ft_about_item_txt_content',
		array(
			'type' 			=> 'textarea',
			'label' 		=> 'TEXTO DO BLOCO',
			'description' 	=> 'Texto',
			'section' 		=> 'featured_about',
			'settings' 		=> 'ft_about_item_txt_content',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ft_about_item_txt_transform',
		array(
			'type' 			=> 'radio',
			'description'	=> 'Formato do texto do bloco',
			'section' 		=> 'featured_about',
			'settings' 		=> 'ft_about_item_txt_transform',
			'choices' 		=> array(
				'normal' 		=> 'Normal',
				'uppercase' 	=> 'Caixa alta',
				'lowercase' 	=> 'Caixa baixa',
			),
			'default' 		=> 'uppercase',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ft_about_item_txt_size',
		array(
			'type' 			=> 'number',
			'description' 	=> 'Tamanho do texto dos ítens',
			'section' 		=> 'featured_about',
			'settings' 		=> 'ft_about_item_txt_size',
		)
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ft_about_item_txt_color', array(
		'description'		=> 'Cor do texto dos ítens',
		'section' 			=> 'featured_about',
		'settings' 			=> 'ft_about_item_txt_color',
	) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ft_about_block_url',
		array(
			'type' 			=> 'text',
			'label' 		=> 'LINK DO BOTÃO',
			'description' 	=> 'Link para onde será direcionado após clicar no botão.',
			'section' 		=> 'featured_about',
			'settings' 		=> 'ft_about_block_url',
		)
	) );


}
add_action('customize_register', 'featured_about_settings');

function featured_about_settings_css() { ?>


	<style type="text/css">

		#sobre{
			padding-top: <?php echo get_theme_mod('ft_about_padding_top');?>px;
			padding-bottom: <?php echo get_theme_mod('ft_about_padding_bottom');?>px;
			text-align: <?php echo get_theme_mod('ft_about_block_title_align')?>;
			background-image: url('<?php echo esc_url( get_theme_mod( 'ft_about_img_bg' ) ); ?>');
			background-color: <?php echo get_theme_mod('ft_about_bg')?>;

		}
		#sobre h1{
			font-size: <?php echo get_theme_mod('ft_about_block_title_size')?>px;
			color: <?php echo get_theme_mod('ft_about_block_title_color')?>;
			text-transform: <?php echo get_theme_mod('ft_about_block_title_transform')?>;
			margin-bottom: <?php echo get_theme_mod('ft_about_block_title_margin_bottom')?>px
		}

		#sobre p,
		#sobre p a{
			font-size: <?php echo get_theme_mod('ft_about_item_txt_size')?>px;
			color: <?php echo get_theme_mod('ft_about_item_txt_color')?>;
			text-transform: <?php echo get_theme_mod('ft_about_item_txt_transform')?>;
		}

	</style>


<?php }

add_action('wp_head', 'featured_about_settings_css');