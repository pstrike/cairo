<?php
/**
 * Checkout Form
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.3.0
 */

if (!defined('ABSPATH')) {
	exit;
}

wc_print_notices();

do_action('woocommerce_before_checkout_form', $checkout);

// If checkout registration is disabled and not logged in, the user cannot checkout
if (!$checkout->enable_signup && !$checkout->enable_guest_checkout && !is_user_logged_in()) {
	echo apply_filters('woocommerce_checkout_must_be_logged_in_message', esc_html__('You must be logged in to checkout.', 'cairo'));
	return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">
	<div class="row" id="customer_details">

		<?php if (sizeof($checkout->checkout_fields) > 0) { ?>
			<div class="col-md-7">
				<?php do_action('woocommerce_checkout_before_customer_details'); ?>
				<?php do_action('woocommerce_checkout_billing'); ?>
				<?php do_action('woocommerce_checkout_shipping'); ?>
				<?php do_action('woocommerce_checkout_after_customer_details'); ?>
			</div>
		<?php } ?>

		<div class="col-md-5">
			<div class="checkout-order-review">
				<h3 id="order_review_heading" class="checkout-order-review-title">
					<?php esc_html_e('Your order', 'cairo'); ?>
				</h3>

				<?php do_action('woocommerce_checkout_before_order_review'); ?>
				<?php do_action('woocommerce_checkout_order_review'); ?>
				<?php do_action('woocommerce_checkout_after_order_review'); ?>
			</div>
		</div>

	</div>
</form>

<?php do_action('woocommerce_after_checkout_form', $checkout); ?>
