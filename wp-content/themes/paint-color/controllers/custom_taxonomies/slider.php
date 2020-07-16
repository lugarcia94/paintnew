<?php
/**
 * Created by PhpStorm.
 * User: Vanssiler
 * Date: 14/02/17
 * Time: 21:26
 */

// CATEGORIA ESPECIAL DE PRODUTOS

function categorias_de_slider() {

	register_taxonomy(
		'slider-category',
		'slider',
		array(
			'label' => __( 'Categoria de Slider' ),
			'rewrite' => array( 'slug' => 'slider-category' ),
			'hierarchical' => true,
		)
	);
}
add_action( 'init', 'categorias_de_slider' );


function slider_register() {

	$labels = array(
		'name' => _x('Slider', 'post type general name'),
		'singular_name' => _x('Slider', 'post type singular name'),
		'add_new' => _x('Adicionar novo', 'slider item'),
		'add_new_item' => __('Adicionar novo slider'),
		'edit_item' => __('Editar slider'),
		'new_item' => __('Novo slider'),

		'view_item' => __('Ver slider'),
		'search_items' => __('Buscar slider'),
		'not_found' => __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_position'       => 5,
		'menu_icon' => 'dashicons-format-gallery',
		'rewrite' => array( 'slug' => 'slider', 'with_front'=> false ),
		'capability_type' => 'post',
		'hierarchical' => true,
		'has_archive' => true,
		'supports' => array('title','editor','thumbnail','comments'),
	);

	register_post_type( 'slider' , $args );

}

add_action( 'init', 'slider_register' );