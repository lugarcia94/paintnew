<?php
/**
 * Admin View: Notice - Currency not supported.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div class="error">
	<p><?php printf( __( 'Currency <code>%s</code> is not supported. Works only with Brazilian Real.', 'wc-itau-shopline' ), get_woocommerce_currency() ); ?>
	</p>
</div>
