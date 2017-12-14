<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.0.0
 */

if (!defined('ABSPATH')) {
	exit;
}

get_header(); ?>

	<?php
	/**
	 * woocommerce_before_main_content hook
	 *
	 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
	 */
	do_action( 'woocommerce_before_main_content' );
	?>

	<!--Shop Products Start-->
	<div class="products-category-img"><?php do_action( 'woocommerce_category_image' ); ?></div>

	<?php if (have_posts()) { ?>

		<?php do_action( 'woocommerce_before_shop_loop' ); ?>

		<?php woocommerce_product_loop_start(); ?>

			<?php woocommerce_product_subcategories();?>

			<?php while (have_posts()) { the_post(); ?>

				<?php wc_get_template_part( 'content', 'product' ); ?>

			<?php } ?>

		<?php woocommerce_product_loop_end(); ?>

		<?php do_action( 'woocommerce_after_shop_loop' );

		}
		elseif ( !woocommerce_product_subcategories(array(
			'before' => woocommerce_product_loop_start(false),
			'after' => woocommerce_product_loop_end(false) ))
		) {  wc_get_template( 'loop/no-products-found.php' ); }
	?>
	<!--Shop Products End-->

	<?php do_action( 'woocommerce_after_main_content' ); ?>

<?php get_footer(); ?>
