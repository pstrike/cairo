<?php
/**
 * Single Product tabs
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.4.0
 */

if (!defined('ABSPATH')) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters('woocommerce_product_tabs', array());

if (!empty($tabs)) { ?>

	<div class="product-page-tabs tab-details" id="product-page-tabs">
			<!-- Nav tabs -->
			<ul class="product-page-tabs-nav nav-block" role="tablist">
				<?php foreach ($tabs as $key => $tab) { ?>
				<li role="presentation" class="product-page-tabs-nav-item">
					<a class="product-page-tabs-nav-link" href="#product-page-tabs-<?php echo esc_attr($key); ?>" aria-controls="product-page-tabs-<?php echo esc_attr($key); ?>" role="tab" data-toggle="tab">
						<?php echo apply_filters('woocommerce_product_' . $key . '_tab_title', $tab['title'], $key); ?>
					</a>
				</li>
				<?php } ?>
			</ul>

		<div class="product-page-tabs-content-wrapper tab-content">
			<?php foreach ($tabs as $key => $tab) { ?>
			<div role="tabpanel" class="product-page-tabs-content tab-pane fade in shop-tab-content" id="product-page-tabs-<?php echo esc_attr($key); ?>">
				<?php call_user_func($tab['callback'], $key, $tab); ?>
			</div>
			<?php } ?>
		</div>

	</div>

<?php } ?>
