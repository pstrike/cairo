<?php
/**
 * Single Product Image
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     3.1.0
 */

if (!defined('ABSPATH')) {
	exit;
}

global $post, $product;

$product_id = esc_attr($product->get_id());

if (has_post_thumbnail()) {

	$images = array();
	$main_image = array();

	$image_index = 0;
	$image_id = get_post_thumbnail_id($post->ID);

	$main_image['title'] = esc_attr(get_the_title($image_id));

	$image_full = wp_get_attachment_image_src($image_id, 'full');
	$main_image['large']['src'] = esc_url($image_full[0]);
	$main_image['large']['width'] = esc_attr($image_full[1]);
	$main_image['large']['height'] = esc_attr($image_full[2]);

	$image_shop_single = wp_get_attachment_image_src($image_id, 'cairo-post-small-three');
	$main_image['medium']['src'] = esc_url($image_shop_single[0]);
	$main_image['medium']['width'] = esc_attr($image_shop_single[1]);
	$main_image['medium']['height'] = esc_attr($image_shop_single[2]);

	$image_thumbnail = wp_get_attachment_image_src($image_id, 'cairo-post-medium-tow');
	$main_image['thumbnail']['src'] = esc_url($image_thumbnail[0]);
	$main_image['thumbnail']['width'] = esc_attr($image_thumbnail[1]);
	$main_image['thumbnail']['height'] = esc_attr($image_thumbnail[2]);

	$attachment_ids = $product->get_gallery_image_ids();

	if ($attachment_ids) {
		foreach ($attachment_ids as $attachment_id) {
			$attachment_full = wp_get_attachment_image_src($attachment_id, 'full');
			if (!$attachment_full)
				continue;

			$images[$attachment_id]['title'] = esc_attr(get_the_title($attachment_id));

			$images[$attachment_id]['large']['src'] = esc_url($attachment_full[0]);
			$images[$attachment_id]['large']['width'] = esc_attr($attachment_full[1]);
			$images[$attachment_id]['large']['height'] = esc_attr($attachment_full[2]);

			$attachment_shop_single = wp_get_attachment_image_src($attachment_id, 'cairo-post-small-three');
			$images[$attachment_id]['medium']['src'] = esc_url($attachment_shop_single[0]);
			$images[$attachment_id]['medium']['width'] = esc_attr($attachment_shop_single[1]);
			$images[$attachment_id]['medium']['height'] = esc_attr($attachment_shop_single[2]);

			$attachment_thumbnail = wp_get_attachment_image_src($attachment_id, 'cairo-post-medium-tow');
			$images[$attachment_id]['thumbnail']['src'] = esc_url($attachment_thumbnail[0]);
			$images[$attachment_id]['thumbnail']['width'] = esc_attr($attachment_thumbnail[1]);
			$images[$attachment_id]['thumbnail']['height'] = esc_attr($attachment_thumbnail[2]);
		} ?>

		<div class="row">
			<div class="slider-for">
				<div id="product-slider-<?php echo $product_id; ?>" class="flexslider js-flexslider"
				data-direction-nav="true"
				data-control-nav="true"
				data-manual-controls="#product-slider-manual-controls-<?php echo $product_id; ?>">
					<ul class="slides-single-shop">
						<li>
							<a href="#">
								<img src="<?php echo $main_image['thumbnail']['src']; ?>" alt="<?php echo $main_image['title']; ?>">
							</a>
						</li>
						<?php foreach ($images as $image) { ?>
							<li>
								<a href="#">
									<img src="<?php echo $image['thumbnail']['src']; ?>" alt="<?php echo $image['title']; ?>">
								</a>
							</li>
						<?php } ?>
					</ul>
				</div>
				<ul id="product-slider-manual-controls-<?php echo $product_id; ?>" class="flex-control-manual slider-nav">
					<li>
							<img src="<?php echo $main_image['medium']['src']; ?>" alt="<?php echo $main_image['title']; ?>">
					</li>
					<?php foreach ($images as $image) { ?>
						<li>
							<img src="<?php echo $image['medium']['src']; ?>" alt="<?php echo $image['title']; ?>">
						</li>
					<?php } ?>
				</ul>

			</div>
		</div>

		<?php } else { ?>
			<a href="<?php echo $main_image['large']['src']; ?>"
				data-img-width="<?php echo $main_image['large']['width']; ?>"
				data-img-height="<?php echo $main_image['large']['height']; ?>"
				data-img-index="<?php echo $image_index; ?>"
				data-pswp-uid="<?php echo $product_id; ?>"
				title="<?php echo $main_image['title']; ?>"
				class="js-pswp-img-lk block">
				<img src="<?php echo $main_image['medium']['src']; ?>" alt="<?php echo $main_image['title']; ?>">
			</a>
		<?php }

	} else {
		echo apply_filters('woocommerce_single_product_image_html', sprintf('<img src="%s" alt="%s">', wc_placeholder_img_src(), esc_html__('Placeholder', 'cairo')), $product_id);
	}
