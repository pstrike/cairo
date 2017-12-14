<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     3.2.0
 */

if (!defined('ABSPATH')) {
	exit;
}

?>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<p class="wc-lead text-center-sm">
			<?php
			echo sprintf(esc_attr__('Hello %s%s%s (not %2$s? %sSign out%s)', 'cairo'), '<strong>', esc_html($current_user->display_name), '</strong>', '<a href="' . esc_url(wc_get_endpoint_url('customer-logout', '', wc_get_page_permalink('myaccount'))) . '">', '</a>');

			echo '. ';

			echo sprintf(esc_attr__('From your account dashboard you can view your %1$srecent orders%2$s, manage your %3$sshipping and billing addresses%2$s and %4$sedit your password and account details%2$s.', 'cairo'), '<a href="' . esc_url(wc_get_endpoint_url('orders')) . '">', '</a>', '<a href="' . esc_url(wc_get_endpoint_url('edit-address')) . '">', '<a href="' . esc_url(wc_get_endpoint_url('edit-account')) . '">');
			?>
		</p>
	</div>
</div>

<?php
/**
 * My Account dashboard.
 *
 * @since 3.2.0
 */
do_action('woocommerce_account_dashboard');

/**
 * Deprecated woocommerce_before_my_account action.
 *
 * @deprecated 3.2.0
 */
do_action('woocommerce_before_my_account');

/**
 * Deprecated woocommerce_after_my_account action.
 *
 * @deprecated 3.2.0
 */
do_action('woocommerce_after_my_account');
?>
