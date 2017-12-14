<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.2.0
 */

if (!defined('ABSPATH')) {
	exit;
}

global $post, $product;

?>

<div class="product-page-meta">

	<?php do_action('woocommerce_product_meta_start'); ?>

	<?php if (wc_product_sku_enabled() && ($product->get_sku() || $product->is_type('variable'))) { ?>

		<span class="product-page-meta-item sku_wrapper">
			<span class="product-page-meta-item-title">
				<?php esc_html_e('SKU:', 'cairo'); ?>
			</span>
			<span class="product-page-meta-item-desc sku" itemprop="sku">
				<?php echo ($sku = $product->get_sku()) ? $sku : esc_html__('N/A', 'cairo'); ?>
			</span>
		</span>

	<?php } ?>


	<?php echo wc_get_product_category_list( $product->get_id(), ', ',
	'<span class="product-page-meta-item posted_in">
	<span class="product-page-meta-item-title">'
		. _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'cairo' ) .
		'</span>
		<span class="product-page-meta-item-desc">',
		'</span>
		</span>'
	); ?>

	<?php echo wc_get_product_tag_list( $product->get_id(), ', ',
	'<span class="product-page-meta-item posted_in">
	<span class="product-page-meta-item-title">'
		. _n( 'Category:', 'Categories:', count( $product->get_tag_ids() ), 'cairo' ) .
		'</span>
		<span class="product-page-meta-item-desc">',
		'</span>
		</span>'
	); ?>

	<?php do_action('woocommerce_product_meta_end'); ?>

</div>
