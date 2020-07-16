<?php
/**
 * Created by PhpStorm.
 * User: Vanssiler
 * Date: 14/02/17
 * Time: 21:03
 */

function add_custom_sizes() {
	add_image_size( 'productlist-thumb', 400, 300, true );
	add_image_size( 'homelist-thumb', 400, 300, true );
	add_image_size( 'sidebar-thumb', 120, 100, true );
}
add_action('after_setup_theme','add_custom_sizes');