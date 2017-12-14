<?php
/**
 * Loop Price
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     3.2.0
 */

if (!defined('ABSPATH')) {
	exit;
}

global $product;

?>

<?php if ($price_html = $product->get_price_html()) { ?>
	<div class="product-card-price price"><?php echo wp_kses_post($price_html); ?></div>
<?php } ?>
