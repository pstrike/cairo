<?php
/**
 * Display single product reviews (comments)
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     3.2.0
 */

if (!defined('ABSPATH')) {
	exit;
}

global $product;

if (!comments_open()) {
	return;
}

?>

<div id="comments" class="theme-comments _shop">

	<?php if (have_comments()) { ?>

		<h3 class="theme-comments-title"><?php
			if (get_option('woocommerce_enable_review_rating') === 'yes' && ($count = $product->get_review_count())) {
				printf(_n('%s review for %s%s%s', '%s reviews for %s%s%s', $count, 'cairo'), $count, '<span>', get_the_title(), '</span>');
			} else {
				esc_html_e('Reviews', 'cairo');
			}
		?></h3>

		<ul class="theme-comments-list">
			<?php wp_list_comments(apply_filters('woocommerce_product_review_list_args', array('callback' => 'woocommerce_comments'))); ?>
		</ul>

		<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) {
			echo '<nav class="theme-comments-nav">';
			paginate_comments_links(apply_filters('woocommerce_comment_pagination_args', array(
				'prev_text'    => '<span class="arrow-left"></span>',
				'next_text'    => '<span class="arrow-right"></span>',
				'type'         => 'list',
				'add_fragment' => '#product-page-tabs-reviews'
			)));
			echo '</nav>';
		} ?>

	<?php } ?>


	<?php if (get_option('woocommerce_review_rating_verification_required') === 'no' || wc_customer_bought_product('', get_current_user_id(), $product->id)) { ?>

		<?php
		$commenter = wp_get_current_commenter();

		$comment_form = array(
			'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title comment-respond-title">',
			'title_reply_after' => '</h3>',
			'title_reply' => have_comments() ?
				esc_html__('Add a review', 'cairo') :
				sprintf(esc_html__('Be the first to review &ldquo;%s&rdquo;', 'cairo'), get_the_title()),
			'title_reply_to' => esc_html__('Leave a Reply to %s', 'cairo'),
			'comment_notes_before' => '',
			'comment_notes_after' => '',
			'fields' => array(
				'author' => '
					<p class="comment-form-author form-row form-row-first">
						<label for="author">
							' . esc_html__('Name', 'cairo') . '
							<abbr class="required" title="required">*</abbr>
						</label>
						<input
							id="author"
							class="_dark"
							name="author"
							type="text"
							minlength="3"
							value="' . esc_attr($commenter['comment_author']) . '"
							required
						>
					</p>
				',
				'email' => '
					<p class="comment-form-email form-row form-row-last">
						<label for="email">
							' . esc_html__('Email', 'cairo') . '
							<abbr class="required" title="required">*</abbr>
						</label>
						<input
							id="email"
							class="_dark"
							name="email"
							type="email"
							value="' . esc_attr($commenter['comment_author_email']) . '"
							required
						>
					</p>
				',
			),
			'label_submit'  => esc_html__('Submit', 'cairo'),
			'logged_in_as'  => '',
			'comment_field' => '',
		);

		if ($account_page_url = wc_get_page_permalink('myaccount')) {
			$comment_form['must_log_in'] = '
				<p class="must-log-in form-row">
					' . sprintf(wp_kses_post(__('You must be <a href="%s">logged in</a> to post a review.', 'cairo')), esc_url($account_page_url)) . '
				</p>
			';
		}

		if (get_option('woocommerce_enable_review_rating') === 'yes') {
			$comment_form['comment_field'] = '
				<p class="comment-form-rating form-row">
					<label for="rating" title="' . esc_html__('Your Rating', 'cairo') .'">
						' . esc_html__('Your Rating', 'cairo') .'
						<abbr class="required" title="required">*</abbr>
					</label>
					<select name="rating" id="rating" required>
						<option value="">' . esc_html__('Rate&hellip;', 'cairo') . '</option>
						<option value="5">' . esc_html__('Perfect', 'cairo') . '</option>
						<option value="4">' . esc_html__('Good', 'cairo') . '</option>
						<option value="3">' . esc_html__('Average', 'cairo') . '</option>
						<option value="2">' . esc_html__('Not that bad', 'cairo') . '</option>
						<option value="1">' . esc_html__('Very Poor', 'cairo') . '</option>
					</select>
				</p>
			';
		}

		$comment_form['comment_field'] .= '
			<p class="comment-form-comment form-row">
				<label for="comment">
					' . esc_html__('Your Review', 'cairo') . '
					<abbr class="required" title="required">*</abbr>
				</label>
				<textarea id="comment" class="_dark" name="comment" cols="45" rows="8" required></textarea>
			</p>
		';


		comment_form(apply_filters('woocommerce_product_review_comment_form_args', $comment_form));
		?>

	<?php } else { ?>

		<p class="theme-comments-clesed"><?php esc_html_e('Only logged in customers who have purchased this product may leave a review.', 'cairo'); ?></p>

	<?php } ?>

</div>
