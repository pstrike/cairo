<?php
/**
 * Show messages
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     3.2.0
 */

if (!defined('ABSPATH')) {
	exit;
}

if (!$messages) {
	return;
}

?>

<div class="wc-message wc-message-success">
	<div class="wc-message-icon"><i class="fa fa-check"></i></div>
	<div class="wc-message-content">
		<?php foreach ($messages as $message) { ?>
			<div class="woocommerce-message"><?php echo wp_kses_post($message); ?></div>
		<?php } ?>
	</div>
</div>
