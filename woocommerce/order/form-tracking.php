<?php
/**
 * Order tracking form
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     3.2.0
 */

if (!defined('ABSPATH')) {
	exit;
}

global $post;

?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12 form-wc">
		<div class="wc-box">
			<form action="<?php echo esc_url(get_permalink($post->ID)); ?>" method="post" class="wc-form">

				<p class="form-row"><?php esc_attr_e('To track your order please enter your Order ID in the box below and press the "Track" button. This was given to you on your receipt and in the confirmation email you should have received.', 'cairo'); ?></p>

				<p class="form-row">
					<label for="orderid"><?php esc_attr_e('Order ID', 'cairo'); ?></label>
					<input class="input-text" type="text" name="orderid" id="orderid" placeholder="<?php esc_attr_e('Found in your order confirmation email.', 'cairo'); ?>">
				</p>

				<p class="form-row">
					<label for="order_email"><?php esc_attr_e('Billing Email', 'cairo'); ?></label>
					<input class="input-text" type="text" name="order_email" id="order_email" placeholder="<?php esc_attr_e('Email you used during checkout.', 'cairo'); ?>">
				</p>

				<p class="form-row form-last-row">
					<input type="submit" class="full-width" name="track" value="<?php esc_attr_e('Track', 'cairo'); ?>" />
				</p>

				<?php wp_nonce_field('woocommerce-order_tracking'); ?>

			</form>
		</div>
	</div>
</div>
