<?php
/**
 * Cart totals
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.3.6
 */

if (!defined('ABSPATH')) {
	exit;
}

?>

<div class="
	cart-totals
	cart_totals
	<?php if (WC()->customer->has_calculated_shipping()) { echo 'calculated_shipping'; } ?>
">

	<?php do_action('woocommerce_before_cart_totals'); ?>

	<h2 class="cart-totals-title"><?php esc_html_e('Cart Totals', 'cairo'); ?></h2>

	<table cellspacing="0" class="shop_table shop_table_responsive">


		<tr class="cart-subtotal">
			<th><?php esc_html_e('Subtotal', 'cairo'); ?></th>
			<td data-title="<?php esc_attr_e('Subtotal', 'cairo'); ?>">
				<?php wc_cart_totals_subtotal_html(); ?>
			</td>
		</tr>


		<?php foreach (WC()->cart->get_coupons() as $code => $coupon) { ?>
			<tr class="cart-discount coupon-<?php echo esc_attr(sanitize_title($code)); ?>">
				<th><?php wc_cart_totals_coupon_label($coupon); ?></th>
				<td data-title="<?php echo esc_attr(wc_cart_totals_coupon_label($coupon, false)); ?>">
					<?php wc_cart_totals_coupon_html($coupon); ?>
				</td>
			</tr>
		<?php } ?>


		<?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) { ?>

			<?php do_action('woocommerce_cart_totals_before_shipping'); ?>
			<?php wc_cart_totals_shipping_html(); ?>
			<?php do_action('woocommerce_cart_totals_after_shipping'); ?>

		<?php } elseif (WC()->cart->needs_shipping() && 'yes' === get_option('woocommerce_enable_shipping_calc')) { ?>

			<tr class="shipping">
				<td colspan=2 data-title="<?php esc_attr_e('Shipping', 'cairo'); ?>">
					<?php woocommerce_shipping_calculator(); ?>
				</td>
			</tr>

		<?php } ?>


		<?php foreach (WC()->cart->get_fees() as $fee) { ?>
			<tr class="fee">
				<th><?php echo esc_html($fee->name); ?></th>
				<td data-title="<?php echo esc_attr($fee->name); ?>">
					<?php wc_cart_totals_fee_html($fee); ?>
				</td>
			</tr>
		<?php } ?>


		<?php if (wc_tax_enabled() && 'excl' === WC()->cart->tax_display_cart) {
			$taxable_address = WC()->customer->get_taxable_address();
			$estimated_text  = WC()->customer->is_customer_outside_base() && !WC()->customer->has_calculated_shipping()
					? sprintf(
						' <small>(' . __('estimated for %s', 'cairo') . ')</small>',
						WC()->countries->estimated_for_prefix($taxable_address[0]) . WC()->countries->countries[ $taxable_address[0] ]
					) : '';

			if ('itemized' === get_option('woocommerce_tax_total_display')) {
				foreach (WC()->cart->get_tax_totals() as $code => $tax) { ?>

					<tr class="tax-rate tax-rate-<?php echo sanitize_title($code); ?>">
						<th><?php echo esc_html($tax->label) . $estimated_text; ?></th>
						<td data-title="<?php echo esc_attr($tax->label); ?>">
							<?php echo wp_kses_post($tax->formatted_amount); ?>
						</td>
					</tr>

				<?php } ?>
			<?php } else { ?>

				<tr class="tax-total">
					<th><?php echo esc_html(WC()->countries->tax_or_vat()) . $estimated_text; ?></th>
					<td data-title="<?php echo esc_attr(WC()->countries->tax_or_vat()); ?>">
						<?php wc_cart_totals_taxes_total_html(); ?>
					</td>
				</tr>

			<?php } ?>
		<?php } ?>


		<?php do_action('woocommerce_cart_totals_before_order_total'); ?>


		<tr class="order-total">
			<th><?php esc_html_e('Total', 'cairo'); ?></th>
			<td data-title="<?php esc_attr_e('Total', 'cairo'); ?>">
				<div class="cart-totals-total"><?php wc_cart_totals_order_total_html(); ?></div>
			</td>
		</tr>


		<?php do_action('woocommerce_cart_totals_after_order_total'); ?>


	</table>

	<div class="cart-totals-buttons wc-proceed-to-checkout">
		<input
			type="submit"
			class="cart-totals-update-button _light"
			name="update_cart"
			value="<?php esc_attr_e('Update Cart', 'cairo'); ?>"
			form="cart-form"
		>
		<?php do_action('woocommerce_proceed_to_checkout'); ?>
	</div>

	<?php do_action('woocommerce_after_cart_totals'); ?>

</div>
