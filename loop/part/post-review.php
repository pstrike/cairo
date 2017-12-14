<?php
	$id = get_the_ID();
	cairo_set_post_views($post->ID);
	$views = cairo_get_post_views(get_the_ID());
	$review_title = get_post_meta($id, 'review_title', true);
	$review_style = get_post_meta($id, 'review_style', true);
	$review_description = get_post_meta($id, 'review_description', true);
	$ratings_count = get_post_meta($id, 'review_score', true);
	$comments = get_post_meta($id, 'custom_review_comment', true);
	$ratings_score = get_post_meta($id, 'custom_review', true);
?>
<?php do_action('cairo_post_review_svg'); ?>
<div class="cairo-post-review <?php echo esc_html($review_style); ?>">
	<div class="review-detail">
		<div class="review-header">
			<h2><?php echo esc_html($review_title); ?></h2>
			<div class="review-rating-score">
				<h1><?php echo esc_html($ratings_count); ?></h1>
				<span><?php echo esc_html__('Score', 'cairo'); ?></span>
			</div>
			<div class="review-rating-description">
				<p><?php echo esc_html($review_description); ?></p>
			</div>
		</div>
		<div class="review-comments">
			<div class="row">
				<div class="col-sm-6 col-xs-12 good-review">
					<span class="comment-review"><i class="fa fa-check"></i><?php esc_html_e('The Good', 'cairo'); ?></span>
					<?php if ( ! empty ( $comments ) ) { ?>
						<ul>
							<?php foreach($comments as $comment) { ?>
								<?php if ($comment['feature_comment_type'] == 'positive') { ?>
								<li><?php echo esc_attr($comment['title']); ?></li>
								<?php }
								} ?>
						</ul>
					<?php } ?>
				</div>
				<div class="col-sm-6 col-xs-12 bad-review">
					<span class="comment-review"><i class="fa fa-close"></i><?php esc_html_e('The Bad', 'cairo'); ?></span>
					<?php if ( ! empty ( $comments ) ) { ?>
						<ul>
							<?php foreach($comments as $comment) { ?>
								<?php if ($comment['feature_comment_type'] == 'negative') { ?>
								<li><?php echo esc_attr($comment['title']); ?></li>
								<?php }
								} ?>
						</ul>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<div class="review-count">
		<ul>
			<?php foreach($ratings_score as $rating_score) { ?>
				<li>
					<h5 class="review-item-title"><?php echo esc_attr($rating_score['title']); ?></h5>
					<div class="review-item-rating"><?php echo esc_attr($rating_score['feature_score']); ?></div>
					<div class="progress-point">
						<span class="progress-bar" role="progressbar" data-width="<?php echo 10*$rating_score['feature_score'] ?>" data-percent="<?php echo 10*$rating_score['feature_score'] ?>"></span>
					</div>
				</li>
			<?php } ?>
		</ul>
	</div>
</div>
