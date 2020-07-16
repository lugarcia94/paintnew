<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package codesigner
 * @since codesigner 0.1
 */
?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'paintcolor' ), max( $paged, $page ) );

	?></title>

<?php 
	if(wp_is_mobile()){?>
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/debug/mob/app.css" />
		<script defer type="text/javascript" src="<?php bloginfo('template_url'); ?>/debug/mob/app.js"></script>
	<?php }else{ ?>
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/debug/desk/app.css" />
		<script defer type="text/javascript" src="<?php bloginfo('template_url'); ?>/debug/desk/app.js"></script>
	<?php };
;?>



<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php get_template_part('snippets/svg-sprite');?>

<?php 
	if(wp_is_mobile()){
		get_template_part('snippets/header/header-mobile');
	}else{
		get_template_part('snippets/header/header-desktop');
	};
?>
