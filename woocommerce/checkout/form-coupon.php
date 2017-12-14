<?php
/**
 * Checkout coupon form
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.2.0
 */

if (!defined('ABSPATH')) {
	exit;
}

if (!wc_coupons_enabled()) {
	return;
}

if (empty(WC()->cart->applied_coupons)) {
	$info_message = apply_filters(
		'woocommerce_checkout_coupon_message',
		esc_html__('Have a coupon?', 'cairo') . '
		<a href="#" class="showcoupon">'
			. esc_html__('Click here to enter your code', 'cairo') .
		'</a>'
	);
	wc_print_notice($info_message, 'notice');
}

?>

<form class="checkout_coupon" method="post" style="display:none">
	<div class="wc-coupon">
		<input
			type="text"
			name="coupon_code"
			class="wc-coupon-input"
			id="coupon_code"
			value=""
			placeholder="<?php esc_attr_e('Coupon code', 'cairo'); ?>"
			size="25"
		>
		<button
			type="submit"
			name="apply_coupon"
			value="<?php esc_attr_e('Apply Coupon', 'cairo'); ?>"
			class="wc-coupon-button"
		>
			<?php esc_attr_e('Apply Coupon', 'cairo'); ?>
		</button>
	</div>
</form>
