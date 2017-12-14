<?php
/**
 * Review Comments Template
 *
 * Closing li is left out on purpose!
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     3.2.0
 */

if (!defined('ABSPATH')) {
	exit;
}

?>

<li
	id="comment-<?php comment_ID(); ?>"
	<?php comment_class('theme-comment _dark'); ?>
	itemprop="review"
	itemscope
	itemtype="http://schema.org/Review"
>
	<article id="div-comment-<?php comment_ID(); ?>" class="theme-comment-inner comment_container">

		<div class="theme-comment-content">
			<?php
			/**
			 * The woocommerce_review_before hook
			 */
			do_action('woocommerce_review_before', $comment);

			/**
			 * The woocommerce_review_before_comment_meta hook.
			 */
			do_action('woocommerce_review_before_comment_meta', $comment);

			/**
			 * The woocommerce_review_meta hook.
			 *
			 * @hooked woocommerce_review_display_meta - 10
			 */
			do_action('woocommerce_review_meta', $comment);

			/**
			 * The woocommerce_review_before_comment_text hook.
			 */
			do_action('woocommerce_review_before_comment_text', $comment);
			?>

			<div class="theme-comment-desc">
				<?php
				/**
				 * The woocommerce_review_comment_text hook
				 *
				 * @hooked woocommerce_review_display_comment_text - 10
				 */
				do_action('woocommerce_review_comment_text', $comment);
				?>
			</div>

			<?php
			/**
			 * The woocommerce_review_after_comment_text hook
			 *
			 * @hooked woocommerce_review_display_rating - 25
			 */
			do_action('woocommerce_review_after_comment_text', $comment);
			?>
		</div>

	</article>
</li>
