<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
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

wc_print_notices();

do_action('woocommerce_before_cart'); ?>

<div class="cart-page">
	<div class="row">
		<div class="col-md-12">
			<form id="cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">

				<?php do_action('woocommerce_before_cart_table'); ?>

				<div class="products-table-wrapper">
					<table class="products-table" cellspacing="0">

						<thead>
							<tr>
								<th class="products-table-title">&nbsp;</th>
								<th class="products-table-title text-left"><?php esc_html_e('Product', 'cairo'); ?></th>
								<th class="products-table-title"><?php esc_html_e('Price', 'cairo'); ?></th>
								<th class="products-table-title"><?php esc_html_e('Quantity', 'cairo'); ?></th>
								<th class="products-table-title"><?php esc_html_e('Total', 'cairo'); ?></th>
								<th class="products-table-title">&nbsp;</th>
							</tr>
						</thead>

						<tbody>
							<?php

							do_action('woocommerce_before_cart_contents');

							foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
								$_product = apply_filters(
									'woocommerce_cart_item_product',
									$cart_item['data'],
									$cart_item,
									$cart_item_key
								);

								$product_id = apply_filters(
									'woocommerce_cart_item_product_id',
									$cart_item['product_id'],
									$cart_item,
									$cart_item_key
								);

								if (
									$_product &&
									$_product->exists() &&
									$cart_item['quantity'] > 0 &&
									apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)
								) {

									$product_permalink = apply_filters(
										'woocommerce_cart_item_permalink',
										$_product->is_visible() ? $_product->get_permalink($cart_item) : '',
										$cart_item,
										$cart_item_key
									);

									?>

									<tr class="
										products-table-item
										<?php echo esc_attr(apply_filters(
											'woocommerce_cart_item_class',
											'cart_item',
											$cart_item,
											$cart_item_key
										)); ?>
									">

										<td class="products-table-item-column _thumbnail">
											<?php
											if (!$product_permalink) {
												echo apply_filters(
													'woocommerce_cart_item_thumbnail',
													$_product->get_image(),
													$cart_item,
													$cart_item_key
												);
											} else {
												printf(
													'<a href="%s">%s</a>',
													$_product->get_permalink($cart_item),
													apply_filters(
														'woocommerce_cart_item_thumbnail',
														$_product->get_image(),
														$cart_item,
														$cart_item_key
													)
												);
											}
											?>
										</td>

										<td
											class="products-table-item-column _product"
											data-title="<?php esc_attr_e('Product', 'cairo'); ?>"
										>
											<?php
											if (!$product_permalink) {
												echo apply_filters(
													'woocommerce_cart_item_name',
													$_product->get_title(),
													$cart_item,
													$cart_item_key
												) . '&nbsp;';
											} else {
												echo apply_filters(
													'woocommerce_cart_item_name',
													sprintf(
														'<a href="%s">%s</a>',
														$_product->get_permalink($cart_item),
														$_product->get_title()
													),
													$cart_item,
													$cart_item_key
												);
											}

											// Meta data
											echo WC()->cart->get_item_data($cart_item);

											// Backorder notification
											if (
												$_product->backorders_require_notification() &&
												$_product->is_on_backorder($cart_item['quantity'])
											) {
												echo '<p class="backorder_notification">'
													. esc_html__('Available on backorder', 'cairo') .
												'</p>';
											}
											?>
										</td>

										<td
											class="products-table-item-column _price"
											data-title="<?php esc_attr_e('Price', 'cairo'); ?>"
										>
											<?php
											echo apply_filters(
												'woocommerce_cart_item_price',
												WC()->cart->get_product_price($_product),
												$cart_item,
												$cart_item_key
											);
											?>
										</td>

										<td
											class="products-table-item-column _quantity"
											data-title="<?php esc_attr_e('Quantity', 'cairo'); ?>"
										>
											<?php
											if ($_product->is_sold_individually()) {
												$product_quantity = sprintf(
													'1 <input type="hidden" name="cart[%s][qty]" value="1">',
													$cart_item_key
												);
											} else {
												$product_quantity = woocommerce_quantity_input(array(
													'input_name'  => "cart[{$cart_item_key}][qty]",
													'input_value' => $cart_item['quantity'],
													'min_value'   => '0',
													'max_value'   => $_product->backorders_allowed() ?
														'' : $_product->get_stock_quantity(),
												), $_product, false);
											}

											echo apply_filters(
												'woocommerce_cart_item_quantity',
												$product_quantity,
												$cart_item_key,
												$cart_item
											);
											?>
										</td>

										<td
											class="products-table-item-column _subtotal"
											data-title="<?php esc_attr_e('Total', 'cairo'); ?>"
										>
											<?php
											echo apply_filters(
												'woocommerce_cart_item_subtotal',
												WC()->cart->get_product_subtotal($_product, $cart_item['quantity']),
												$cart_item,
												$cart_item_key
											);
											?>
										</td>

										<td class="products-table-item-column _remove text-right">
											<?php
											echo apply_filters('woocommerce_cart_item_remove_link', sprintf(
												'<a
													href="%s"
													title="%s"
													data-product_id="%s"
													data-product_sku="%s"
												><span class="icon-cross"></span></a>',
												esc_url(WC()->cart->get_remove_url($cart_item_key)),
												esc_html__('Remove this item', 'cairo'),
												esc_attr($product_id),
												esc_attr($_product->get_sku())
											), $cart_item_key);
											?>
										</td>
									</tr>
									<?php
								}
							}

							do_action('woocommerce_cart_contents');

							do_action('woocommerce_after_cart_contents');

							?>
						</tbody>

					</table>
				</div>

				<?php if (wc_coupons_enabled()) { ?>
					<div class="wc-coupon">
						<input
							type="text"
							name="coupon_code"
							class="wc-coupon-input"
							id="coupon_code"
							value=""
							placeholder="<?php esc_attr_e('Coupon code', 'cairo'); ?>"
							size="25"
						>
						<button
							type="submit"
							name="apply_coupon"
							value="<?php esc_attr_e('Apply Coupon', 'cairo'); ?>"
							class="wc-coupon-button"
						>
							<?php esc_attr_e('Apply Coupon', 'cairo'); ?>
						</button>
						<?php do_action('woocommerce_cart_coupon'); ?>
					</div>
				<?php } ?>

				<?php do_action('woocommerce_cart_actions'); ?>

				<?php wp_nonce_field('woocommerce-cart'); ?>

				<?php do_action('woocommerce_after_cart_table'); ?>

			</form>
		</div>

		<div class="col-md-5 pull-right">
			<?php do_action('woocommerce_cart_collaterals'); ?>
		</div>

	</div>
</div>

<?php do_action('woocommerce_after_cart'); ?>
