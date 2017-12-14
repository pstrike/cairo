<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

if (!defined('ABSPATH')) { exit; }
?>

<?php
/**
 * woocommerce_before_single_product hook
 *
 * @hooked wc_print_notices - 10
 */
do_action('woocommerce_before_single_product');
?>

<?php
if (post_password_required()) { ?>
	<div class="row">
		<?php echo get_the_password_form(); ?>
	</div>
	<?php
	return;
}
?>

<!--Shop Products Start-->
<div <?php post_class('product product-page'); ?> id="product-<?php the_ID(); ?>" itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>">
	<div class="product-page-inner-top">
		<div class="col-md-6 relative">
			<?php
			/**
			 * woocommerce_before_single_product_summary hook
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action('woocommerce_before_single_product_summary');
			?>
		</div>
		<div class="col-md-6">
			<div class="product-page-summary">
				<?php
				/**
				 * woocommerce_single_product_summary hook
				 *
				 * @hooked woocommerce_template_single_title - 5
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_rating - 15
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
				 * @hooked woocommerce_template_single_sharing - 50
				 */
				do_action('woocommerce_single_product_summary');
				?>
			</div>
		</div>
	</div>

	<div class="product-page-inner-bottom">
		<?php
		/**
		 * woocommerce_after_single_product_summary hook
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_template_single_meta - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action('woocommerce_after_single_product_summary');
		?>
	</div>
	<meta itemprop="url" content="<?php the_permalink(); ?>" />
	<?php do_action('woocommerce_after_single_product'); ?>
</div>
<!--Shop Products End-->
