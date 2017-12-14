<?php
/**
 * Order Customer Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-customer.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.2.0
 */

if (!defined('ABSPATH')) {
	exit;
}
?>
<div class="col-sm-6">
	<div class="wc-box">

		<h2 class="wc-box-title"><?php esc_html_e('Customer Details', 'cairo'); ?></h2>

		<table class="shop_table customer_details"><tfoot>
			<?php if ($order->customer_note) { ?>
				<tr>
					<th><?php esc_html_e('Note:', 'cairo'); ?></th>
					<td><?php echo wptexturize($order->customer_note); ?></td>
				</tr>
			<?php } ?>

			<?php if ($order->billing_email) { ?>
				<tr>
					<th><?php esc_html_e('Email:', 'cairo'); ?></th>
					<td><?php echo esc_html($order->billing_email); ?></td>
				</tr>
			<?php } ?>

			<?php if ($order->billing_phone) { ?>
				<tr>
					<th><?php esc_html_e('Telephone:', 'cairo'); ?></th>
					<td><?php echo esc_html($order->billing_phone); ?></td>
				</tr>
			<?php } ?>

			<?php do_action('woocommerce_order_details_after_customer_details', $order); ?>
		</tfoot></table>

		<h3 class="wc-box-title"><?php esc_html_e('Billing Address', 'cairo'); ?></h3>
		<address>
			<?php echo ($address = $order->get_formatted_billing_address()) ? $address : esc_html__('N/A', 'cairo'); ?>
		</address>

		<?php if (!wc_ship_to_billing_address_only() && $order->needs_shipping_address()) { ?>
			<h3 class="wc-box-title"><?php esc_html_e('Shipping Address', 'cairo'); ?></h3>
			<address>
				<?php echo ($address = $order->get_formatted_shipping_address()) ? $address : esc_html__('N/A', 'cairo'); ?>
			</address>
		<?php } ?>

	</div>
</div>
