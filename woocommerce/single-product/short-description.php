<?php
/**
 * Single product short description
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     3.2.0
 */

if (!defined('ABSPATH')) {
	exit;
}

global $post;

if (!$post->post_excerpt) {
	return;
}

?>

<div class="product-page-desc" itemprop="description">
	<?php echo apply_filters('woocommerce_short_description', $post->post_excerpt); ?>
</div>
