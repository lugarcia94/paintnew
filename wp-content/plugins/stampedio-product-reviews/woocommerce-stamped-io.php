<?php
/*
  Plugin Name: Stamped.io Reviews & UGC for WooCommerce
  Plugin URI: https://stamped.io/
  Description: Stamped.io Product Reviews, Ratings, Questions & Answers, Social Integrations, Marketing & Upselling, Loyalty & Rewards and more!
  Version: 2.1.8
  Author: Stamped.io
  Author URI: https://stamped.io/
  License: GPLv2 or later
  License URI: http://www.gnu.org/licenses/gpl-2.0.html
  Text Domain: stamped-io-reviews-for-woocommerce
 */

define("Woo_stamped_wc_least_version", "2.4.0");
require_once( 'woo-includes/woo-functions.php' );
if (!is_woocommerce_active()) {
    add_action('admin_notices', 'Woo_stamped_woocommerce_not_installed_notice');

    return;
}
add_action('plugins_loaded', 'Woo_stamped_io', 0);
add_action('upgrader_process_complete', 'my_upgrade_function', 10, 2);

function my_upgrade_function( $upgrader_object, $options ) {
	//Woo_stamped_api::Woo_stamped_logging("");
}

/**
 * Include all Woo Stamped Io files
 */
function Woo_stamped_io() {

    if (is_woocommerce_active()) {
        global $woocommerce;
        if (!version_compare($woocommerce->version, Woo_stamped_wc_least_version, ">=")) {
            add_action('admin_notices', 'Woo_stamped_woocommerce_version_check_notice');
            return false;
        }
    }
    require 'includes/cls_stamped_io_api.php';
    require 'admin/cls_stamped_io_admin.php';
    require 'view/cls_stamped_io_public.php';
    require 'includes/cls_stamped_io.php';

	//Woo_stamped_api::Woo_stamped_logging("");
}

function Woo_stamped_woocommerce_version_check_notice() {
    ?>
    <div class="error">
        <p><?php _e("WooCommerce Stamped.io require WooCommerce version " . Woo_stamped_wc_least_version . " or greater", 'woo-stamped-io'); ?></p>
    </div>
    <?php
}

function Woo_stamped_woocommerce_not_installed_notice() {
    ?>
    <div class="error">
        <p><?php _e("WooCommerce Stamped.io: WooCommerce  not Activated or not Installed.", 'woo-stamped-io'); ?></p>
    </div>
    <?php
}