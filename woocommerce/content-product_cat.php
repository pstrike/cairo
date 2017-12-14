<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.6.1
 */

if (!defined('ABSPATH')) {
	exit;
}

if (cairoHelpers::is_title_wrapper() && (is_shop() || is_product_taxonomy())) { ?>
	<div <?php wc_product_cat_class('products-category', $category); ?>>
		<?php
		/**
		 * woocommerce_before_subcategory hook.
		 */
		do_action('woocommerce_before_subcategory', $category);
		?>
		<a href="<?php echo get_term_link($category->slug, 'product_cat'); ?>" class="products-category-link" >
			<?php echo esc_html($category->name); ?>
		</a>
		<?php
		/**
		 * woocommerce_after_subcategory hook.
		 */
		do_action('woocommerce_after_subcategory', $category);
		?>
	</div><?php

	} else {

	global $woocommerce_loop;

	// Store loop count we're currently on
	if (empty($woocommerce_loop['loop'])) {
		$woocommerce_loop['loop'] = 0;
	}

	// Store column count for displaying the grid
	$column_classes = ot_get_option('products_columns', '2');
	if ($column_classes == 1) {
		$column = 'col-md-12 col-sm-12 col-xs-12';
	} elseif ($column_classes == 2) {
		$column = 'col-md-6 col-sm-12 col-xs-12';
	} elseif ($column_classes == 3) {
		$column = 'col-md-4 col-sm-12 col-xs-12';
	} elseif ($column_classes == 4) {
		$column = 'col-md-3 col-sm-12 col-xs-12';
	} else {
		$column = '';
	}

	?>

	<div class="<?php echo esc_attr($column); ?>">
		<div class="animate-on-screen js-animate-on-screen">
			<div <?php wc_product_cat_class('products-category-card', $category); ?>>
				<?php
				/**
				 * woocommerce_before_subcategory hook.
				 */
				do_action('woocommerce_before_subcategory', $category);
				?>

				<a href="<?php echo get_term_link($category->slug, 'product_cat'); ?>" class="products-category-card-link" title="<?php echo esc_attr($category->name); ?>">
					<?php
					/**
					 * woocommerce_before_subcategory_title hook
					 *
					 * @hooked woocommerce_subcategory_thumbnail - 10
					 */
					do_action('woocommerce_before_subcategory_title', $category);
					?>

					<div class="products-category-card-bottom">
						<h5 class="products-category-card-title"><?php echo esc_html($category->name); ?></h5>
					</div>

					<?php
					/**
					 * woocommerce_after_subcategory_title hook
					 */
					do_action('woocommerce_after_subcategory_title', $category);
					?>
				</a>

				<?php
				/**
				 * woocommerce_after_subcategory hook.
				 */
				do_action('woocommerce_after_subcategory', $category);
				?>
			</div>
		</div>
	</div>

<?php } ?>
