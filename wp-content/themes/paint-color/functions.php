<?php 

function woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'woocommerce_support' );


// Remove the default filters
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

// Add the new function to be the the_content and the_excerpt filter
add_filter( 'the_content', 'pu_wpautop_without_br' , 99);
add_filter( 'the_excerpt', 'pu_wpautop_without_br' , 99);

/**
 * Create a new function that uses the default wpautop function passing in a false as the second parameter to stop adding line breaks
 */
function pu_wpautop_without_br( $content ) 
{
    return wpautop( $content, false );
}



// ADICIONA CONFIGURAÇÕES DIVERSAS AO TEMA
	require_once('controllers/configs/misc.php');
	add_filter('use_block_editor_for_post', '__return_false', 10);

// // ADICIONA SELEÇÃO DE TEMA NO POST
// 	require_once('controllers/configs/post_templates.php');

// // ADICIONA TAMANHOS ESPECIAIS DAS IMAGENS
// 	require_once('controllers/configs/image_size.php');

// // ADICIONA POSTS POR ORDEM DE POPULARIDADE (MAIS LIDOS)
// 	require_once('controllers/posts/popular.php');

// // ATIVA LISTAGEM DAS CATEGORIA DOS POSTS ESPECIAIS
// 	require_once('controllers/custom_taxonomies/term_links.php');

// // CATEGORIAS DE CUSTOM POST (ECHO)
// 	require_once('controllers/custom_taxonomies/categories.php');

// // CUSTOM POST WIDGET
// 	require_once('controllers/widgets/recent_posts.php');

// MENU BOOTSTRAP
	// require_once ('controllers/menu/MenuHomeWalker.php');

// // SLUG DA CATEGORIA NO POST
// 	require_once ('controllers/configs/single_slug.php');




// TAXONOMIAS ESPECIAIS =========================================================
// ==============================================================================

// CUSTOM POST TYPE => SLIDER
	require_once ('controllers/custom_taxonomies/slider.php');



// CUSTOMIZAÇÃO DO TEMA =========================================================
// ==============================================================================

// //INSERE LOGO NO TEMA
// 	require_once('controllers/theme/general/logo.php');

//INFORMAÇÕES GERAIS DO SITE
	require_once('controllers/theme/general/general.php');

//ADICIONA TELEFONES DE CONTATO
	require_once ('controllers/theme/contacts/phone.php');

//EMAILS DO SITE
	require_once ('controllers/theme/contacts/email.php');

//ADICIONA REDES SOCIAIS
	require_once ('controllers/theme/contacts/social.php');

// //ADICIONA CONFIGURAÇÕES DE FONTES E CORES
// 	require_once ('controllers/theme/defaults/defaults_panel.php');

// //OPÇÕES DO CABEÇALHO DO TEMA
// 	require_once ('controllers/theme/header/header_panel.php');

// //OPÇÕES DA HOME
// 	require_once ('controllers/theme/home/home_panel.php');

// //OPÇÕES DO RODAPÉ
// 	require_once ('controllers/theme/footer/footer_panel.php');

// //OPÇÕES DA SIDEBAR
// 	require_once ('controllers/theme/sidebar/sidebar.php');

// //OPÇÕES DE SEO
// 	require_once ('controllers/theme/seo/analytics.php');

// WOOCOMMERCE
	require_once ('controllers/woocommerce/configs.php');