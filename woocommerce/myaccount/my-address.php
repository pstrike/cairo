<?php
/**
 * My Addresses
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     3.2.0
 */

if (!defined('ABSPATH')) {
	exit;
}

$customer_id = get_current_user_id();

if (!wc_ship_to_billing_address_only() && wc_shipping_enabled()) {
	$get_addresses = apply_filters('woocommerce_my_account_get_addresses', array(
		'billing' => esc_html__('Billing Address', 'cairo'),
		'shipping' => esc_html__('Shipping Address', 'cairo')
	), $customer_id);
} else {
	$get_addresses = apply_filters('woocommerce_my_account_get_addresses', array(
		'billing' =>  esc_html__('Billing Address', 'cairo')
	), $customer_id);
}

?>

<p class="wc-lead">
	<?php echo apply_filters('woocommerce_my_account_my_address_description', esc_html__('The following addresses will be used on the checkout page by default.', 'cairo')); ?>
</p>

<div class="o-hidden"><div class="row">

	<?php foreach ($get_addresses as $name => $title) { ?>

		<div class="col-sm-6">
			<div class="wc-box">
				<header class="woocommerce-Address-title title">
					<h3 class="wc-box-title"><?php echo wp_kses_post($title); ?></h3>
				</header>
				<address>
					<?php
					$address = apply_filters('woocommerce_my_account_my_address_formatted_address', array(
						'first_name'  => get_user_meta($customer_id, $name . '_first_name', true),
						'last_name'   => get_user_meta($customer_id, $name . '_last_name', true),
						'company'     => get_user_meta($customer_id, $name . '_company', true),
						'address_1'   => get_user_meta($customer_id, $name . '_address_1', true),
						'address_2'   => get_user_meta($customer_id, $name . '_address_2', true),
						'city'        => get_user_meta($customer_id, $name . '_city', true),
						'state'       => get_user_meta($customer_id, $name . '_state', true),
						'postcode'    => get_user_meta($customer_id, $name . '_postcode', true),
						'country'     => get_user_meta($customer_id, $name . '_country', true)
					), $customer_id, $name);

					$formatted_address = WC()->countries->get_formatted_address($address);

					if (!$formatted_address) {
						esc_html_e('You have not set up this type of address yet.', 'cairo');
					} else {
						echo wp_kses_post($formatted_address);
					}
					?>
				</address>
				<footer>
					<a href="<?php echo esc_url(wc_get_endpoint_url('edit-address', $name)); ?>" class="wc-box-edit">
						<?php esc_html_e('Edit', 'cairo'); ?>
					</a>
				</footer>
			</div>
		</div>

	<?php } ?>

</div></div>
