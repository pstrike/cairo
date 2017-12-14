<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.2.0
 */

if (!defined('ABSPATH')) {
	exit;
}

global $product, $woocommerce_loop;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
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
		<div <?php post_class('product-card'); ?>>

			<div class="product-card-top">
				<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
			</div>

			<div class="product-card-bottom">
				<?php
				/**
				 * woocommerce_before_shop_loop_item_title hook
				 */
				do_action( 'woocommerce_before_shop_loop_item_title' );
				?>

				<div class="product-card-title">
					<?php do_action( 'woocommerce_shop_loop_item_title' );?>
				</div>

				<?php
				/**
				 * woocommerce_after_shop_loop_item_title hook
				 *
				 * @hooked woocommerce_template_loop_price - 10
				 */
				do_action( 'woocommerce_after_shop_loop_item_title' );
				?>
			</div>

			<?php
			$attachment_ids = $product->get_gallery_image_ids();
			if ($attachment_ids) {
				foreach ($attachment_ids as $attachment_id) {
					$image = wp_get_attachment_image_src($attachment_id, 'cairo-post-medium-one');
					if (empty($image)) continue; ?>
					<div class="product-card-back-img" style="background-image:url(<?php echo esc_url($image[0]); ?>);"></div>
					<?php
					break;
				}
			}
			?>

			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="product-card-link"></a>

			<?php if (class_exists('YITH_WCWL')) { ?>
				<div class="product-card-add-to-wishlist">
					<?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
				</div>
			<?php } ?>

			<div class="product-card-buttons">
				<?php
				/**
				 * woocommerce_after_shop_loop_item hook
				 *
				 * @hooked quick_view - 1
				 * @hooked woocommerce_template_loop_add_to_cart - 10
				 */
				do_action( 'woocommerce_after_shop_loop_item' );
				?>
			</div>

		</div>
	</div>
</div>
