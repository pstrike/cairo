<?php
/**
 * Displayed when no products are found matching the current query.
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.0.0
 */

if (!defined('ABSPATH')) {
	exit;
}

?>
<div class="woocommerce-no-products">
	<p class="woocommerce-info"><?php esc_html_e( 'No products were found matching your selection.', 'cairo' ); ?></p>
</div>
