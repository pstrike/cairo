<?php
/**
 * Proceed to checkout button
 *
 * Contains the markup for the proceed to checkout button on the cart.
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.4.0
 */

if (!defined('ABSPATH')) {
	exit;
}

echo '<a href="' . esc_url( wc_get_checkout_url() ) . '" class="cart-totals-checkout-button button">' . esc_html__( 'Proceed to Checkout', 'cairo' ) . '</a>';
