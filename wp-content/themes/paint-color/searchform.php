<?php
/**
 * The template for displaying search forms in Twenty Eleven
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<!-- Variable Woordpress -->
<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="header__search--form">
	<input type="hidden" name="post_type" value="product"> 
	<input class="header-search-input" name="s" type="text" placeholder="O que você está procurando?"> 
	<button class="header-search-button" type="submit"><svg class="icon icon-search"><use xlink:href="#icon-search"></use></svg></button>
</form>


