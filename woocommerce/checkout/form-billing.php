<?php
/**
 * Checkout billing information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-billing.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.9
 */

if (!defined('ABSPATH')) {
	exit;
}

/** @global WC_Checkout $checkout */

?>

<div class="checkout-billing">


	<?php if (wc_ship_to_billing_address_only() && WC()->cart->needs_shipping()) { ?>
		<h3 class="checkout-billing-title"><?php esc_html_e('Billing &amp; Shipping', 'cairo'); ?></h3>
	<?php } else { ?>
		<h3 class="checkout-billing-title"><?php esc_html_e('Billing Details', 'cairo'); ?></h3>
	<?php } ?>


	<?php do_action('woocommerce_before_checkout_billing_form', $checkout); ?>

	<?php foreach ($checkout->checkout_fields['billing'] as $key => $field) { ?>
		<?php woocommerce_form_field($key, $field, $checkout->get_value($key)); ?>
	<?php } ?>

	<?php do_action('woocommerce_after_checkout_billing_form', $checkout); ?>


	<?php if (!is_user_logged_in() && $checkout->enable_signup) { ?>


		<?php if ($checkout->enable_guest_checkout) { ?>

			<div class="checkout-create-account">
				<input
					class="input-checkbox"
					id="createaccount"
					type="checkbox"
					name="createaccount"
					value="1"
					<?php checked((true === $checkout->get_value('createaccount') || (true === apply_filters('woocommerce_create_account_default_checked', false))), true); ?>
				>
				<label for="createaccount" class="checkbox checkout-create-account-label">
					<?php esc_html_e('Create an account?', 'cairo'); ?>
				</label>

		<?php } ?>


			<?php do_action('woocommerce_before_checkout_registration_form', $checkout); ?>

			<?php if (!empty($checkout->checkout_fields['account'])) { ?>

				<div class="checkout-create-account-inner">
					<p><?php esc_html_e('Create an account by entering the information below. If you are a returning customer please login at the top of the page.', 'cairo'); ?></p>

					<?php foreach ($checkout->checkout_fields['account'] as $key => $field) { ?>
						<?php woocommerce_form_field($key, $field, $checkout->get_value($key)); ?>
					<?php } ?>

					<div class="clear"></div>
				</div>

			<?php } ?>

			<?php do_action('woocommerce_after_checkout_registration_form', $checkout); ?>


		<?php if ($checkout->enable_guest_checkout) { ?>

			</div>

		<?php } ?>


	<?php } ?>


</div>
