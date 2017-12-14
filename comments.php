<?php
// ==========================================================================================
// Codepages Comments Teamplate
// @package Cairo
// @author Codepages - Codepages
// @link http://themeforest.net/user/codepages/portfolio
// ==========================================================================================
?>

<?php if ( post_password_required() ) { return;} ?>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<div class="Title-Comment">
			<h3>
				<?php comments_number( esc_html__( 'No Comments', 'cairo' ), esc_html__( 'One Comment', 'cairo' ), esc_html( _n( '% Comment', '% Comments', number_format_i18n( get_comments_number() ), 'cairo' ) ) ); ?>
			</h3>
		</div>

		<?php cairo_comment_nav(); ?>

		<ul class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       	=> 'ul',
					'short_ping'  	=> true,
					'reply_text'    => 'Reply',
					'avatar_size'   => 60,
				));
			?>
		</ul>

		<?php cairo_comment_nav(); ?>

	<?php endif; ?>

	<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'cairo' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>

</div>
