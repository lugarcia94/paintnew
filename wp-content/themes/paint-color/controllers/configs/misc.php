<?php
/**
 * Created by PhpStorm.
 * User: Vanssiler
 * Date: 15/02/17
 * Time: 16:29
 */

show_admin_bar(false);

add_theme_support( 'post-thumbnails' );


function codesigner_customize_register( $wp_customize ) {
	$wp_customize->remove_control("nav_menus");
	$wp_customize->remove_panel("widgets");
	$wp_customize->remove_section("static_front_page");

}
add_action('customize_register', 'codesigner_customize_register');

add_action( 'customize_register', function( $wp_customize ) {
	/** @var WP_Customize_Manager $wp_customize */
	remove_action( 'customize_controls_enqueue_scripts', array( $wp_customize->nav_menus, 'enqueue_scripts' ) );
	remove_action( 'customize_register', array( $wp_customize->nav_menus, 'customize_register' ), 11 );
	remove_filter( 'customize_dynamic_setting_args', array( $wp_customize->nav_menus, 'filter_dynamic_setting_args' ) );
	remove_filter( 'customize_dynamic_setting_class', array( $wp_customize->nav_menus, 'filter_dynamic_setting_class' ) );
	remove_action( 'customize_controls_print_footer_scripts', array( $wp_customize->nav_menus, 'print_templates' ) );
	remove_action( 'customize_controls_print_footer_scripts', array( $wp_customize->nav_menus, 'available_items_template' ) );
	remove_action( 'customize_preview_init', array( $wp_customize->nav_menus, 'customize_preview_init' ) );
}, 10 );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'codesigner_setup' ) ):
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which runs
	 * before the init hook. The init hook is too late for some features, such as indicating
	 * support post thumbnails.
	 *
	 * To override codesigner_setup() in a child theme, add your own codesigner_setup to your child theme's
	 * functions.php file.
	 */
	function codesigner_setup() {
		/**
		 * Make theme available for translation
		 * Translations can be filed in the /languages/ directory
		 * If you're building a theme based on codesigner, use a find and replace
		 * to change 'codesigner' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'codesigner', get_template_directory() . '/languages' );

		$locale = get_locale();
		$locale_file = get_template_directory() . "/languages/$locale.php";
		if ( is_readable( $locale_file ) )
			require_once( $locale_file );

		/**
		 * This theme uses wp_nav_menu() in one location.
		 */
		register_nav_menus( array(
			'primary' => __( 'Menu Principal', 'smartux' ),
		) );

		register_nav_menus( array(
			'home_cat_menu' => __( 'Menu categorias home', 'smartux' ),
		) );
		
		register_nav_menus( array(
			'home_brands_menu' => __( 'Menu Marcas home', 'smartux' ),
		) );
		
		register_nav_menus( array(
			'footer_institucional_menu' => __( 'Menu Rodapé Institucional', 'smartux' ),
		) );
		
		register_nav_menus( array(
			'footer_user_menu' => __( 'Menu Rodapé Usuário', 'smartux' ),
		) );
		register_nav_menus( array(
			'header_user_menu' => __( 'Menu Header Usuário', 'smartux' ),
		) );
		


	}
endif; // codesigner_setup

add_action( 'after_setup_theme', 'codesigner_setup' );


function vb_pagination( $query=null ) {

	global $wp_query;
	$query = $query ? $query : $wp_query;
	$big = 999999999;

	$paginate = paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'type' => 'array',
			'total' => $query->max_num_pages,
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'prev_text' => __('&laquo;'),
			'next_text' => __('&raquo;'),
		)
	);

	if ($query->max_num_pages > 1) :
		?>
		<ul class="pagination">
			<?php
			foreach ( $paginate as $page ) {
				echo '<li>' . $page . '</li>';
			}
			?>
		</ul>
		<?php
	endif;
}

/**
 * ====================================================
 * Help Contact Form 7 Play Nice With Bootstrap
 * ====================================================
 * Add a Bootstrap-friendly class to the "Contact Form 7" form
 */
add_filter( 'wpcf7_form_class_attr', 'wildli_custom_form_class_attr' );
function wildli_custom_form_class_attr( $class ) {
	$class .= ' form-horizontal';
	return $class;
}


/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function codesigner_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'codesigner_page_menu_args' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function codesigner_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar 1', 'codesigner' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="sidebar-heading"> <h3>',
		'after_title' => '</h3></div>',
	) );
}
add_action( 'init', 'codesigner_widgets_init' );

if ( ! function_exists( 'codesigner_content_nav' ) ):
	/**
	 * Display navigation to next/previous pages when applicable
	 *
	 * @since codesigner 1.2
	 */
	function codesigner_content_nav( $nav_id ) {
		global $wp_query;

		?>
		<nav id="<?php echo $nav_id; ?>">
			<h1 class="assistive-text section-heading"><?php _e( 'Post navigation', 'codesigner' ); ?></h1>

			<?php if ( is_single() ) : // navigation links for single posts ?>

				<?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'codesigner' ) . '</span> %title' ); ?>
				<?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'codesigner' ) . '</span>' ); ?>

			<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

				<?php if ( get_next_posts_link() ) : ?>
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'codesigner' ) ); ?></div>
				<?php endif; ?>

				<?php if ( get_previous_posts_link() ) : ?>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'codesigner' ) ); ?></div>
				<?php endif; ?>

			<?php endif; ?>

		</nav><!-- #<?php echo $nav_id; ?> -->
		<?php
	}
endif; // codesigner_content_nav




if ( ! function_exists( 'codesigner_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 * Create your own codesigner_posted_on to override in a child theme
	 *
	 * @since codesigner 1.2
	 */
	function codesigner_posted_on() {
		printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="byline"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'codesigner' ),
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'codesigner' ), get_the_author() ) ),
			esc_html( get_the_author() )
		);
	}
endif;

/**
 * Adds custom classes to the array of body classes.
 *
 * @since codesigner 1.2
 */
function codesigner_body_classes( $classes ) {
	// Adds a class of single-author to blogs with only 1 published author
	if ( ! is_multi_author() ) {
		$classes[] = 'single-author';
	}

	return $classes;
}
add_filter( 'body_class', 'codesigner_body_classes' );

/**
 * Returns true if a blog has more than 1 category
 *
 * @since codesigner 1.2
 */
function codesigner_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so codesigner_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so codesigner_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in codesigner_categorized_blog
 *
 * @since codesigner 1.2
 */
function codesigner_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'codesigner_category_transient_flusher' );
add_action( 'save_post', 'codesigner_category_transient_flusher' );

/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 */
function codesigner_enhanced_image_navigation( $url ) {
	global $post, $wp_rewrite;

	$id = (int) $post->ID;
	$object = get_post( $id );
	if ( wp_attachment_is_image( $post->ID ) && ( $wp_rewrite->using_permalinks() && ( $object->post_parent > 0 ) && ( $object->post_parent != $id ) ) )
		$url = $url . '#main';

	return $url;
}
add_filter( 'attachment_link', 'codesigner_enhanced_image_navigation' );

