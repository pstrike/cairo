<?php
/**
 * Checkout login form
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.0.0
 */

if (!defined('ABSPATH')) {
	exit;
}

if ( is_user_logged_in() || 'no' === get_option( 'woocommerce_enable_checkout_login_reminder' ) ) {
	return;
}

$info_message = apply_filters( 'woocommerce_checkout_login_message', esc_html__( 'Returning customer?', 'cairo' ) );
$info_message .= ' <a href="#" class="showlogin">' . esc_html__( 'Click here to login', 'cairo' ) . '</a>';
wc_print_notice( $info_message, 'notice' );
?>

<?php
	woocommerce_login_form(
		array(
			'redirect' => wc_get_page_permalink( 'checkout' ),
			'hidden' => true
		)
	);
?>
