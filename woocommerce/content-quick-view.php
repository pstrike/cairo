<?php
/**
 * The template for displaying quick view product content.
 */

if (!defined('ABSPATH')) {
	exit;
}

if (post_password_required()) {
	echo get_the_password_form();
	return;
}

?>

<div
	<?php post_class('js-product product-page _quick-view'); ?>
	id="product-<?php the_ID(); ?>"
	itemscope
	itemtype="<?php echo woocommerce_get_product_schema(); ?>"
>

	<div class="row _inline">
		<div class="col-sm-6 col-md-5 _inline relative"><div>
			<?php
			/**
			 * woocommerce_before_single_product_summary hook
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary' );
			?>
		</div></div>

		<div class="col-sm-6 col-md-7 _inline"><div>
			<div class="product-page-summary">
				<?php
				/**
				 * woocommerce_single_product_summary hook
				 *
				 * @hooked woocommerce_template_single_rating - 1
				 * @hooked woocommerce_template_single_title - 5
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
				 * @hooked woocommerce_template_single_sharing - 50
				 */
				remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);
				do_action('woocommerce_single_product_summary');
				?>
			</div>
		</div></div>
	</div>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div>
<a href="#" class="popup-quick-view-close-button js-hide-quick-view"><span class="icon-cross"></span></a>
