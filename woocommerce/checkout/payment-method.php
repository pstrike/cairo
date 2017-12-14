<?php
/**
 * Output a single payment method
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.3.0
 */

if (!defined('ABSPATH')) {
	exit;
}

?>

<li class="wc_payment_method payment_method_<?php echo esc_attr($gateway->id); ?> payment-methods-item">
	<input
		id="payment_method_<?php echo esc_attr($gateway->id); ?>"
		type="radio"
		class="input-radio payment-methods-item-input"
		name="payment_method"
		value="<?php echo esc_attr($gateway->id); ?>"
		data-order_button_text="<?php echo esc_attr($gateway->order_button_text); ?>"
		<?php checked($gateway->chosen, true); ?>
	>

	<label for="payment_method_<?php echo esc_attr($gateway->id); ?>" class="payment-methods-item-label">
		<?php echo $gateway->get_title(); ?> <?php echo $gateway->get_icon(); ?>
	</label>

	<?php if ($gateway->has_fields() || $gateway->get_description()) { ?>
		<div
			class="payment_box payment_method_<?php echo esc_attr($gateway->id); ?>"
			<?php if (!$gateway->chosen) { ?>style="display:none;"<?php } ?>
		>
			<?php $gateway->payment_fields(); ?>
		</div>
	<?php } ?>
</li>
