<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.2.0
 */

if (!defined('ABSPATH')) {
	exit;
}

if ($order) { ?>

	<div class="wc-box">

		<?php if ($order->has_status('failed')) { ?>

			<p class="wc-box-title"><?php esc_attr_e('Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'cairo'); ?></p>

			<p class="woocommerce-thankyou-order-failed-actions">
				<a href="<?php echo esc_url($order->get_checkout_payment_url()); ?>" class="button pay"><?php esc_attr_e('Pay', 'cairo') ?></a>
				<?php if (is_user_logged_in()) { ?>
					<a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="button pay"><?php esc_attr_e('My Account', 'cairo'); ?></a>
				<?php } ?>
			</p>

		<?php } else { ?>

			<p class="wc-box-title"><?php echo apply_filters('woocommerce_thankyou_order_received_text', esc_attr__('Thank you. Your order has been received.', 'cairo'), $order); ?></p>

			<ul class="woocommerce-thankyou-order-details">
				<li class="order">
					<?php esc_attr_e('Order Number:', 'cairo'); ?>
					<strong><?php echo wp_kses_post($order->get_order_number()); ?></strong>
				</li>
				<li class="date">
					<?php esc_attr_e('Date:', 'cairo'); ?>
					<strong><?php echo wp_kses_post(date_i18n(get_option('date_format'), strtotime($order->order_date))); ?></strong>
				</li>
				<li class="total">
					<?php esc_attr_e('Total:', 'cairo'); ?>
					<strong><?php echo wp_kses_post($order->get_formatted_order_total()); ?></strong>
				</li>
				<?php if ($order->payment_method_title) { ?>
				<li class="method">
					<?php esc_attr_e('Payment Method:', 'cairo'); ?>
					<strong><?php echo wp_kses_post($order->payment_method_title); ?></strong>
				</li>
				<?php } ?>
			</ul>
			<div class="clear"></div>

		<?php } ?>

		<?php do_action('woocommerce_thankyou_' . $order->payment_method, $order->id); ?>

	</div>

	<?php do_action('woocommerce_thankyou', $order->id); ?>

<?php } else { ?>

	<p class="wc-lead"><?php echo apply_filters('woocommerce_thankyou_order_received_text', esc_attr__('Thank you. Your order has been received.', 'cairo'), null); ?></p>

<?php } ?>
