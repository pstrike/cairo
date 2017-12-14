<?php
/**
 * Show error messages
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

<div class="wc-message wc-message-error">
	<div class="wc-message-icon"><i class="fa fa-exclamation-triangle"></i></div>
	<div class="wc-message-content">
		<ul class="woocommerce-error">
			<?php foreach ($messages as $message) { ?>
				<li><?php echo wp_kses_post($message); ?></li>
			<?php } ?>
		</ul>
	</div>
</div>
