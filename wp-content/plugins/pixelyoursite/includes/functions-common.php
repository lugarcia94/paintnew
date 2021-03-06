<?php

namespace PixelYourSite;

use URL;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

function isPysProActive() {

    if ( ! function_exists( 'is_plugin_active' ) ) {
        include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    }

    return is_plugin_active( 'pixelyoursite-pro/pixelyoursite-pro.php' );

}

function isPinterestActive( $checkCompatibility = true ) {
	
	if ( ! function_exists( 'is_plugin_active' ) ) {
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	}
	
	$active = is_plugin_active( 'pixelyoursite-pinterest/pixelyoursite-pinterest.php' );
	
	if ( $checkCompatibility ) {
		return $active && ! isPinterestVersionIncompatible();
	} else {
		return $active;
	}
	
}

function isPinterestVersionIncompatible() {
    
    if ( ! function_exists( 'get_plugin_data' ) ) {
        include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    }
    
    $data = get_plugin_data( WP_PLUGIN_DIR . '/pixelyoursite-pinterest/pixelyoursite-pinterest.php', false, false );
    
    return ! version_compare( $data['Version'], PYS_FREE_PINTEREST_MIN_VERSION, '>=' );
    
}

function isSuperPackActive( $checkCompatibility = true ) {
    
    if ( ! function_exists( 'is_plugin_active' ) ) {
        include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    }
    
    $active = is_plugin_active( 'pixelyoursite-super-pack/pixelyoursite-super-pack.php' );
    
    if ( $checkCompatibility ) {
        return $active && function_exists( 'PixelYourSite\SuperPack' ) && ! isSuperPackVersionIncompatible();
    } else {
        return $active;
    }
    
}

function isBingActive( $checkCompatibility = true ) {

    if ( ! function_exists( 'is_plugin_active' ) ) {
        include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    }

    $active = is_plugin_active( 'pixelyoursite-bing/pixelyoursite-bing.php' );

    if ( $checkCompatibility ) {
        return $active && ! isBingVersionIncompatible()
            && function_exists( 'PixelYourSite\Bing' )
            && Bing() instanceof Plugin; // false for dummy
    } else {
        return $active;
    }

}

function isBingVersionIncompatible() {

    if ( ! function_exists( 'get_plugin_data' ) ) {
        include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    }

    $data = get_plugin_data( WP_PLUGIN_DIR . '/pixelyoursite-bing/pixelyoursite-bing.php', false, false );

    return ! version_compare( $data['Version'], PYS_FREE_BING_MIN_VERSION, '>=' );

}

/**
 * Check if WooCommerce plugin installed and activated.
 *
 * @return bool
 */
function isWooCommerceActive() {
    return function_exists( 'WC' );
}

/**
 * Check if Easy Digital Downloads plugin installed and activated.
 *
 * @return bool
 */
function isEddActive() {
    return function_exists( 'EDD' );
}

/**
 * Check if Product Catalog Feed Pro plugin installed and activated.
 *
 * @return bool
 */
function isProductCatalogFeedProActive() {
	return class_exists( 'wpwoof_product_catalog' );
}

/**
 * Check if EDD Products Feed Pro plugin installed and activated.
 *
 * @return bool
 */
function isEddProductsFeedProActive() {
	return class_exists( 'Wpeddpcf_Product_Catalog' );
}

function isBoostActive() {

	if ( ! function_exists( 'is_plugin_active' ) ) {
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	}

	return is_plugin_active( 'boost/boost.php' );

}

/**
 * Check if Pixel Cost of goods plugin installed and activated.
 *
 * @return bool
 */
function isPixelCogActive() {

	if ( ! function_exists( 'is_plugin_active' ) ) {
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	}

	return is_plugin_active( 'pixel-cost-of-goods/pixel-cost-of-goods.php' );

}

/**
 * Check if Smart OpenGraph plugin installed and activated.
 *
 * @return bool
 */
function isSmartOpenGraphActive() {
    
    if ( ! function_exists( 'is_plugin_active' ) ) {
        include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    }
    
    return is_plugin_active( 'smart-opengraph/catalog-plugin.php' );
    
}

/**
 * Clean variables using sanitize_text_field. Arrays are cleaned recursively.
 * Non-scalar values are ignored.
 *
 * @param string|array $var
 *
 * @return string|array
 */
function deepSanitizeTextField( $var ) {

    if ( is_array( $var ) ) {
        return array_map( 'deepSanitizeTextField', $var );
    } else {
        return is_scalar( $var ) ? sanitize_text_field( $var ) : $var;
    }

}

function getAvailableUserRoles() {

	$wp_roles   = new \WP_Roles();
	$user_roles = array();

	foreach ( $wp_roles->get_names() as $slug => $name ) {
		$user_roles[ $slug ] = $name;
	}

	return $user_roles;

}

function getAvailableProductCog($product_id) {

	$parent_id  = wp_get_post_parent_id( $product_id );
	$cog_product_val = get_post_meta( $product_id, '_pixel_cost_of_goods_cost_val', true );
	$cog_term_val = get_product_cost_by_cat( $product_id );
	if (($parent_id > 0) && $cog_product_val == '') {
		$cog_product_val = get_post_meta( $parent_id, '_pixel_cost_of_goods_cost_val', true );
	}
	if ($cog_product_val) {
		$cog = array(
			'type' => get_post_meta( $product_id, '_pixel_cost_of_goods_cost_type', true ),
			'val' => $cog_product_val
		);
	} elseif ($cog_term_val) {
		$cog = array(
			'type' => get_product_type_by_cat( $product_id ),
			'val' => $cog_term_val
		);
	} else {
		$cog = array(
			'type' => get_option( '_pixel_cost_of_goods_cost_type'),
			'val' => get_option( '_pixel_cost_of_goods_cost_val')
		);
	}

	return $cog;

}

function getAvailableProductCogOrder($order_id) {
	$order = wc_get_order( $order_id );
	$orderData = $order->get_data();
	$order_shipping_total = $orderData['shipping_total'];
	$order_total = $order->get_total();
	$cost = 0;
	$notice = '';
	$custom_total = 0;
	$cat_isset = 0;
	foreach ( $order->get_items() as $item_id => $item ) {
		$parent_id = false;
		if (isset( $item['variation_id'] ) && 0 != $item['variation_id']) {
			$parent_id = $item['product_id'];
		}
		$product_id = ( isset( $item['variation_id'] ) && 0 != $item['variation_id'] ? $item['variation_id'] : $item['product_id'] );
		$cost_type = get_post_meta( $product_id, '_pixel_cost_of_goods_cost_type', true );
		$product_cost = get_post_meta( $product_id, '_pixel_cost_of_goods_cost_val', true );
		if ($parent_id && $product_cost == '') {
			$product_cost = get_post_meta( $parent_id, '_pixel_cost_of_goods_cost_val', true );
		}
		$price = get_post_meta($product_id, '_regular_price', true);
		$qlt = $item['quantity'];
		if ($product_cost) {
			$cost = ($cost_type == 'percent') ? $cost + ($price * ($product_cost / 100) * $qlt) : $cost + ($product_cost * $qlt);
			$custom_total = $custom_total + ($price * $qlt);
		} else {
			$product_cost = get_product_cost_by_cat( $product_id );
			$cost_type = get_product_type_by_cat( $product_id );
			if ($product_cost) {
				$cost = ($cost_type == 'percent') ? $cost + ($price * ($product_cost / 100) * $qlt) : $cost + ($product_cost * $qlt);
				$custom_total = $custom_total + ($price * $qlt);
				$notice = "Category Cost of Goods was used for some products.";
				$cat_isset = 1;
			} else {
				$product_cost = get_option( '_pixel_cost_of_goods_cost_val');
				$cost_type = get_option( '_pixel_cost_of_goods_cost_type' );
				if ($product_cost) {
					$cost = ($cost_type == 'percent') ? (float) $cost + ((float) $price * ((float) $product_cost / 100) * $qlt) : (float) $cost + ((float) $product_cost * $qlt);
					$custom_total = $custom_total + ($price * $qlt);
					if ($cat_isset == 1) {
						$notice = "Global and Category Cost of Goods was used for some products.";
					} else {
						$notice = "Global Cost of Goods was used for some products.";
					}
				} else {
					$notice = "Some products don't have Cost of Goods.";
				}
			}
		}
	}
	if (($order_total - $cost - $order_shipping_total) > 0) {
		$profit = $order_total - $cost - $order_shipping_total;
	} else {
		$profit = '';
	}
	if ('' !== $notice) {
		if (($custom_total - $cost) > 0) {
			$profit = $custom_total - $cost;
		} else {
			$profit = '';
		}
	}

	return $profit;

}

function getAvailableProductCogCart($amount) {
	$cart_total = $amount;
	$cost = 0;
	$notice = '';
	$custom_total = 0;
	$cat_isset = 0;
	foreach ( WC()->cart->cart_contents as $cart_item_key => $item ) {
		$parent_id = false;
		if (isset( $item['variation_id'] ) && 0 != $item['variation_id']) {
			$parent_id = $item['product_id'];
		}
		$product_id = ( isset( $item['variation_id'] ) && 0 != $item['variation_id'] ? $item['variation_id'] : $item['product_id'] );
		$cost_type = get_post_meta( $product_id, '_pixel_cost_of_goods_cost_type', true );
		$product_cost = get_post_meta( $product_id, '_pixel_cost_of_goods_cost_val', true );
		if ($parent_id && $product_cost == '') {
			$product_cost = get_post_meta( $parent_id, '_pixel_cost_of_goods_cost_val', true );
		}
		$price = get_post_meta($product_id, '_regular_price', true);
		$qlt = $item['quantity'];
		if ($product_cost) {
			$cost = ($cost_type == 'percent') ? $cost + ($price * ($product_cost / 100) * $qlt) : $cost + ($product_cost * $qlt);
			$custom_total = $custom_total + ($price * $qlt);
		} else {
			$product_cost = get_product_cost_by_cat( $product_id );
			$cost_type = get_product_type_by_cat( $product_id );
			if ($product_cost) {
				$cost = ($cost_type == 'percent') ? $cost + ($price * ($product_cost / 100) * $qlt) : $cost + ($product_cost * $qlt);
				$custom_total = $custom_total + ($price * $qlt);
				$notice = "Category Cost of Goods was used for some products.";
				$cat_isset = 1;
			} else {
				$product_cost = get_option( '_pixel_cost_of_goods_cost_val');
				$cost_type = get_option( '_pixel_cost_of_goods_cost_type' );
				if ($product_cost) {
					$cost = ($cost_type == 'percent') ? $cost + ((float) $price * ((float) $product_cost / 100) * $qlt) : (float) $cost + ((float) $product_cost * $qlt);
					$custom_total = $custom_total + ($price * $qlt);
					if ($cat_isset == 1) {
						$notice = "Global and Category Cost of Goods was used for some products.";
					} else {
						$notice = "Global Cost of Goods was used for some products.";
					}
				} else {
					$notice = "Some products don't have Cost of Goods.";
				}
			}
		}
	}
	if (($cart_total - $cost) > 0) {
		$profit = $cart_total - $cost;
	} else {
		$profit = '';
	}
	if ('' !== $notice) {
		if (($custom_total - $cost) > 0) {
			$profit = $custom_total - $cost;
		} else {
			$profit = '';
		}
	}

	return $profit;

}

/**
 * get_product_type_by_cat.
 *
 * @version 1.0.0
 * @since   1.0.0
 */
function get_product_type_by_cat( $product_id ) {
	$term_list = wp_get_post_terms($product_id,'product_cat',array('fields'=>'ids'));
	$cost = array();
	foreach ($term_list as $term_id) {
		$cost[$term_id] = array(
			get_term_meta( $term_id, '_pixel_cost_of_goods_cost_val', true ),
			get_term_meta( $term_id, '_pixel_cost_of_goods_cost_type', true )
		);
	}
	if ( empty( $cost ) ) {
		return '';
	} else {
		asort( $cost );
		$max = end( $cost );
		return $max[1];
	}
}

/**
 * get_product_cost_by_cat.
 *
 * @version 1.0.0
 * @since   1.0.0
 */
function get_product_cost_by_cat( $product_id ) {
	$term_list = wp_get_post_terms($product_id,'product_cat',array('fields'=>'ids'));
	$cost = array();
	foreach ($term_list as $term_id) {
		$cost[$term_id] = get_term_meta( $term_id, '_pixel_cost_of_goods_cost_val', true );
	}
	if ( empty( $cost ) ) {
		return '';
	} else {
		asort( $cost );
		$max = end( $cost );
		return $max;
	}
}

function isDisabledForCurrentRole() {

	$user = wp_get_current_user();
	$disabled_for = PYS()->getOption( 'do_not_track_user_roles' );

	foreach ( (array) $user->roles as $role ) {

		if ( in_array( $role, $disabled_for ) ) {

			add_action( 'wp_head', function() {
				echo "<script type='text/javascript'>console.warn('PixelYourSite is disabled for current user role.');</script>\r\n";
			} );

			return true;

		}

	}

	return false;

}

/**
 * Retrieves parameters values for for current queried object
 *
 * @return array
 */
function getTheContentParams( $allowedContentTypes = array() ) {
	global $post;

	$defaults = array(
		'on_posts_enabled'      => true,
		'on_pages_enables'      => true,
		'on_taxonomies_enabled' => true,
		'on_cpt_enabled'        => true,
		'on_woo_enabled'        => true,
		'on_edd_enabled'        => true,
	);

	$contentTypes = wp_parse_args( $allowedContentTypes, $defaults );

	$params = array();
	$cpt = get_post_type();

	/**
	 * POSTS
	 */
	if ( $contentTypes['on_posts_enabled'] && is_singular( 'post' ) ) {

		$params['post_type']    = 'post';
		$params['post_id']      = $post->ID;
		$params['content_name'] = $post->post_title;
		$params['categories']   = implode( ', ', getObjectTerms( 'category', $post->ID ) );
		$params['tags']         = implode( ', ', getObjectTerms( 'post_tag', $post->ID ) );

		return $params;

	}

	/**
	 * PAGES or FRONT PAGE
	 */
	if ( $contentTypes['on_pages_enables'] && ( is_singular( 'page' ) || is_home() ) ) {

		$params['post_type']    = 'page';
		$params['post_id']      = is_home() ? null : $post->ID;
		$params['content_name'] = is_home() == true ? get_bloginfo( 'name' ) : $post->post_title;

		return $params;

	}

	// WooCommerce Shop page
	if ( $contentTypes['on_pages_enables'] && isWooCommerceActive() && is_shop() ) {

		$page_id = (int) wc_get_page_id( 'shop' );

		$params['post_type'] = 'page';
		$params['post_id']   = $page_id;
		$params['content_name'] = get_the_title( $page_id );

		return $params;

	}

	/**
	 * TAXONOMIES
	 */
	if ( $contentTypes['on_taxonomies_enabled'] && ( is_category() || is_tax() || is_tag() ) ) {

		if ( is_category() ) {

			$cat  = get_query_var( 'cat' );
			$term = get_category( $cat );

			$params['post_type']    = 'category';
			$params['post_id']      = $cat;
			$params['content_name'] = $term->name;

		} elseif ( is_tag() ) {

			$slug = get_query_var( 'tag' );
			$term = get_term_by( 'slug', $slug, 'post_tag' );

			$params['post_type']    = 'tag';
			$params['post_id']      = $term->term_id;
			$params['content_name'] = $term->name;

		} else {
            
            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            
            $params['post_type'] = get_query_var( 'taxonomy' );
            
            if ( $term ) {
                $params['post_id'] = $term->term_id;
                $params['content_name'] = $term->name;
            }

		}

		return $params;

	}

	// WooCommerce Products
	if ( $contentTypes['on_woo_enabled'] && isWooCommerceActive() && $cpt == 'product' ) {

		$params['post_type']    = 'product';
		$params['post_id']      = $post->ID;
		$params['content_name'] = $post->post_title;

		$params['categories'] = implode( ', ', getObjectTerms( 'product_cat', $post->ID ) );
		$params['tags']       = implode( ', ', getObjectTerms( 'product_tag', $post->ID ) );

		return $params;

	}

	// Easy Digital Downloads
	if ( $contentTypes['on_edd_enabled'] && isEddActive() && $cpt == 'download' ) {

		$params['post_type']    = 'download';
		$params['post_id']      = $post->ID;
		$params['content_name'] = $post->post_title;

		$params['categories'] = implode( ', ', getObjectTerms( 'download_category', $post->ID ) );
		$params['tags']       = implode( ', ', getObjectTerms( 'download_tag', $post->ID ) );

		return $params;

	}

	/**
	 * Custom Post Type should be last one.
	 */

	// Custom Post Type
	if ( $contentTypes['on_cpt_enabled'] && $cpt ) {

		// skip products and downloads is plugins are activated
		if ( ( isWooCommerceActive() && $cpt == 'product' ) || ( isEddActive() && $cpt == 'download' ) ) {
			return $params;
		}
        
        // fixes issue #88 from PRO
        if ( ! $post instanceof \WP_Post ) {
            return $params;
        }

		$params['post_type']    = $cpt;
		$params['post_id']      = $post->ID;
		$params['content_name'] = $post->post_title;

		$params['tags'] = implode( ', ', getObjectTerms( 'post_tag', $post->ID ) );

		$taxonomies = get_post_taxonomies( get_post() );

		if ( ! empty( $taxonomies ) && $terms = getObjectTerms( $taxonomies[0], $post->ID ) ) {
			$params['categories'] = implode( ', ', $terms );
		} else {
			$params['categories'] = array();
		}

		return $params;

	}

	return array();

}

/**
 * @param string $taxonomy Taxonomy name
 *
 * @return array Array of object term names
 */
function getObjectTerms( $taxonomy, $post_id ) {

	$terms   = get_the_terms( $post_id, $taxonomy );
	$results = array();

	if ( is_wp_error( $terms ) || empty ( $terms ) ) {
		return array();
	}

	// decode special chars
	foreach ( $terms as $term ) {
		$results[] = html_entity_decode( $term->name );
	}

	return $results;

}

/**
 * Sanitize event name. Only letters, numbers and underscores allowed.
 *
 * @param string $name
 *
 * @return string
 */
function sanitizeKey( $name ) {

	$name = str_replace( ' ', '_', $name );
	$name = preg_replace( '/[^0-9a-zA-z_]/', '', $name );

	return $name;

}

function getCommonEventParams() {

	$user = wp_get_current_user();

	if ( $user->ID !== 0 ) {
		$user_roles = implode( ',', $user->roles );
	} else {
		$user_roles = 'guest';
	}

	return array(
		'domain'     => substr( get_home_url( null, '', 'http' ), 7 ),
		'user_roles' => $user_roles,
		'plugin'     => 'PixelYourSite',
	);

}

function sanitizeParams( $params ) {

	$sanitized = array();

	foreach ( $params as $key => $value ) {

		// skip empty (but not zero)
		if ( ! isset( $value ) && ! is_numeric( $value ) ) {
			continue;
		}

		$key = sanitizeKey( $key );

		if ( is_array( $value ) ) {
			$sanitized[ $key ] = sanitizeParams( $value );
		} elseif ( $key == 'value' ) {
			$sanitized[ $key ] = (float) $value; // do not encode value to avoid error messages on Pinterest
		} elseif ( is_bool( $value ) ) {
			$sanitized[ $key ] = (bool) $value;
		} else {
			$sanitized[ $key ] = html_entity_decode( $value );
		}

	}

	return $sanitized;

}

/**
 * Checks if specified event enabled at least for one configured pixel
 *
 * @param string $eventName
 *
 * @return bool
 */
function isEventEnabled( $eventName ) {

	foreach ( PYS()->getRegisteredPixels() as $pixel ) {
		/** @var Pixel|Settings $pixel */

		if ( $pixel->configured() && $pixel->getOption( $eventName ) ) {
			return true;
		}

	}

	return false;

}

function startsWith( $haystack, $needle ) {
    // search backwards starting from haystack length characters from the end
    return $needle === "" || strrpos( $haystack, $needle, - strlen( $haystack ) ) !== false;
}

function endsWith( $haystack, $needle ) {
    // search forward starting from end minus needle length characters
    return $needle === "" || ( ( $temp = strlen( $haystack ) - strlen( $needle ) ) >= 0 && strpos( $haystack, $needle,
                $temp ) !== false );
}

function getCurrentPageUrl() {
    return  $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ;
}

function removeProtocolFromUrl( $url ) {
    
    if ( extension_loaded( 'mbstring' ) ) {
        
        $un = new URL\Normalizer();
        $un->setUrl( $url );
        $url = $un->normalize();
        
    }
    
    // remove fragment component
    $url_parts = parse_url( $url );
    if ( isset( $url_parts['fragment'] ) ) {
        $url = preg_replace( '/#' . $url_parts['fragment'] . '$/', '', $url );
    }
    
    // remove scheme and www and current host if any
    $url = str_replace( array( 'http://', 'https://', 'http://www.', 'https://www.', 'www.' ), '', $url );
    $url = trim( $url );
    $url = ltrim( $url, '/' );
    //$url = rtrim( $url, '/' );
    
    return $url;
    
}

/**
 * Compare single URL or array of URLs with base URL. If base URL is not set, current page URL will be used.
 *
 * @param string|array $url
 * @param string       $base
 * @param string       $rule
 *
 * @return bool
 */
function compareURLs( $url, $base = '', $rule = 'match' ) {
    
    // use current page url if not set
    if ( empty( $base ) ) {
        $base = getCurrentPageUrl();
    }
    
    $base = removeProtocolFromUrl( $base );
    
    if ( is_string( $url ) ) {
        
        if ( empty( $url ) || '*' === $url ) {
            return true;
        }
        
        $url = rtrim( $url, '*' );  // for backward capability
        $url = removeProtocolFromUrl( $url );
        
        if ( $rule == 'match' ) {
            return $base == $url;
        }
        
        if ( $rule == 'contains' ) {
            
            if ( $base == $url ) {
                return true;
            }

            if(empty($base) || empty($url)) {
                return false;
            }
            
            if ( strpos( $base, $url ) !== false ) {
                return true;
            }
            
            return false;
            
        }
        
        return false;
        
    } else {
        
        // recursively compare each url
        foreach ( $url as $single_url ) {
            
            if ( compareURLs( $single_url['value'], $base, $single_url['rule'] ) ) {
                return true;
            }
            
        }
        
        return false;
        
    }

}

/**
 * Currency symbols
 *
 * @return array
 * */

function getPysCurrencySymbols() {
    return array(
        'AED' => '&#x62f;.&#x625;',
        'AFN' => '&#x60b;',
        'ALL' => 'L',
        'AMD' => 'AMD',
        'ANG' => '&fnof;',
        'AOA' => 'Kz',
        'ARS' => '&#36;',
        'AUD' => '&#36;',
        'AWG' => 'Afl.',
        'AZN' => 'AZN',
        'BAM' => 'KM',
        'BBD' => '&#36;',
        'BDT' => '&#2547;&nbsp;',
        'BGN' => '&#1083;&#1074;.',
        'BHD' => '.&#x62f;.&#x628;',
        'BIF' => 'Fr',
        'BMD' => '&#36;',
        'BND' => '&#36;',
        'BOB' => 'Bs.',
        'BRL' => '&#82;&#36;',
        'BSD' => '&#36;',
        'BTC' => '&#3647;',
        'BTN' => 'Nu.',
        'BWP' => 'P',
        'BYR' => 'Br',
        'BYN' => 'Br',
        'BZD' => '&#36;',
        'CAD' => '&#36;',
        'CDF' => 'Fr',
        'CHF' => '&#67;&#72;&#70;',
        'CLP' => '&#36;',
        'CNY' => '&yen;',
        'COP' => '&#36;',
        'CRC' => '&#x20a1;',
        'CUC' => '&#36;',
        'CUP' => '&#36;',
        'CVE' => '&#36;',
        'CZK' => '&#75;&#269;',
        'DJF' => 'Fr',
        'DKK' => 'DKK',
        'DOP' => 'RD&#36;',
        'DZD' => '&#x62f;.&#x62c;',
        'EGP' => 'EGP',
        'ERN' => 'Nfk',
        'ETB' => 'Br',
        'EUR' => '&euro;',
        'FJD' => '&#36;',
        'FKP' => '&pound;',
        'GBP' => '&pound;',
        'GEL' => '&#x20be;',
        'GGP' => '&pound;',
        'GHS' => '&#x20b5;',
        'GIP' => '&pound;',
        'GMD' => 'D',
        'GNF' => 'Fr',
        'GTQ' => 'Q',
        'GYD' => '&#36;',
        'HKD' => '&#36;',
        'HNL' => 'L',
        'HRK' => 'kn',
        'HTG' => 'G',
        'HUF' => '&#70;&#116;',
        'IDR' => 'Rp',
        'ILS' => '&#8362;',
        'IMP' => '&pound;',
        'INR' => '&#8377;',
        'IQD' => '&#x639;.&#x62f;',
        'IRR' => '&#xfdfc;',
        'IRT' => '&#x062A;&#x0648;&#x0645;&#x0627;&#x0646;',
        'ISK' => 'kr.',
        'JEP' => '&pound;',
        'JMD' => '&#36;',
        'JOD' => '&#x62f;.&#x627;',
        'JPY' => '&yen;',
        'KES' => 'KSh',
        'KGS' => '&#x441;&#x43e;&#x43c;',
        'KHR' => '&#x17db;',
        'KMF' => 'Fr',
        'KPW' => '&#x20a9;',
        'KRW' => '&#8361;',
        'KWD' => '&#x62f;.&#x643;',
        'KYD' => '&#36;',
        'KZT' => 'KZT',
        'LAK' => '&#8365;',
        'LBP' => '&#x644;.&#x644;',
        'LKR' => '&#xdbb;&#xdd4;',
        'LRD' => '&#36;',
        'LSL' => 'L',
        'LYD' => '&#x644;.&#x62f;',
        'MAD' => '&#x62f;.&#x645;.',
        'MDL' => 'MDL',
        'MGA' => 'Ar',
        'MKD' => '&#x434;&#x435;&#x43d;',
        'MMK' => 'Ks',
        'MNT' => '&#x20ae;',
        'MOP' => 'P',
        'MRU' => 'UM',
        'MUR' => '&#x20a8;',
        'MVR' => '.&#x783;',
        'MWK' => 'MK',
        'MXN' => '&#36;',
        'MYR' => '&#82;&#77;',
        'MZN' => 'MT',
        'NAD' => 'N&#36;',
        'NGN' => '&#8358;',
        'NIO' => 'C&#36;',
        'NOK' => '&#107;&#114;',
        'NPR' => '&#8360;',
        'NZD' => '&#36;',
        'OMR' => '&#x631;.&#x639;.',
        'PAB' => 'B/.',
        'PEN' => 'S/',
        'PGK' => 'K',
        'PHP' => '&#8369;',
        'PKR' => '&#8360;',
        'PLN' => '&#122;&#322;',
        'PRB' => '&#x440;.',
        'PYG' => '&#8370;',
        'QAR' => '&#x631;.&#x642;',
        'RMB' => '&yen;',
        'RON' => 'lei',
        'RSD' => '&#x434;&#x438;&#x43d;.',
        'RUB' => '&#8381;',
        'RWF' => 'Fr',
        'SAR' => '&#x631;.&#x633;',
        'SBD' => '&#36;',
        'SCR' => '&#x20a8;',
        'SDG' => '&#x62c;.&#x633;.',
        'SEK' => '&#107;&#114;',
        'SGD' => '&#36;',
        'SHP' => '&pound;',
        'SLL' => 'Le',
        'SOS' => 'Sh',
        'SRD' => '&#36;',
        'SSP' => '&pound;',
        'STN' => 'Db',
        'SYP' => '&#x644;.&#x633;',
        'SZL' => 'L',
        'THB' => '&#3647;',
        'TJS' => '&#x405;&#x41c;',
        'TMT' => 'm',
        'TND' => '&#x62f;.&#x62a;',
        'TOP' => 'T&#36;',
        'TRY' => '&#8378;',
        'TTD' => '&#36;',
        'TWD' => '&#78;&#84;&#36;',
        'TZS' => 'Sh',
        'UAH' => '&#8372;',
        'UGX' => 'UGX',
        'USD' => '&#36;',
        'UYU' => '&#36;',
        'UZS' => 'UZS',
        'VEF' => 'Bs F',
        'VES' => 'Bs.S',
        'VND' => '&#8363;',
        'VUV' => 'Vt',
        'WST' => 'T',
        'XAF' => 'CFA',
        'XCD' => '&#36;',
        'XOF' => 'CFA',
        'XPF' => 'Fr',
        'YER' => '&#xfdfc;',
        'ZAR' => '&#82;',
        'ZMW' => 'ZK',
    );
}