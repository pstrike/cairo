<?php
/**
 * Single Product Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/rating.php.
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

global $product;

if (get_option('woocommerce_enable_review_rating') === 'no') {
	return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();

if ($rating_count > 0) { ?>

	<div class="product-page-rating">
		<div
			class="product-rating"
			itemprop="aggregateRating"
			itemscope
			itemtype="http://schema.org/AggregateRating"
		>

			<div
				class="product-rating-stars"
				title="<?php printf(esc_html__('Rated %s out of 5', 'cairo'), $average); ?>"
			>
				<span style="width:<?php echo (($average / 5) * 100); ?>%">
					<strong itemprop="ratingValue"><?php echo esc_html($average); ?></strong>
					<?php printf(
						esc_html__('out of %s5%s', 'cairo'),
						'<span itemprop="bestRating">',
						'</span>'
					); ?>
					<?php printf(
						_n(
							'based on %s customer rating',
							'based on %s customer ratings',
							$rating_count,
							'cairo'
						),
						'<span itemprop="ratingCount">' . $rating_count . '</span>'
					); ?>
				</span>
			</div>

			<?php if (comments_open()) { ?>
				<a href="<?php the_permalink(); ?>#product-page-tabs-reviews" class="product-rating-link" rel="nofollow">
					<?php printf(
						_n('%s customer review', '%s customer reviews', $review_count, 'cairo'),
						'<span itemprop="reviewCount">' . $review_count . '</span>'
					); ?>
				</a>
			<?php } ?>

		</div>
	</div>

<?php } ?>
