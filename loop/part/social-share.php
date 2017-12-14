<?php

// ==========================================================================================
// Cairo Social Share Style1
// ==========================================================================================

if ( ! function_exists( 'cairo_social_share' ) ) :
	function cairo_social_share() {
		$socials = array(
			'facebook',
			'twitter',
			'google',
			'linkedin',
			'pinterest',
		);

		$socials = apply_filters( 'cairo_social_share', $socials ); ?>
			<div class="social-share">
				<ul>
				<?php if ( in_array( 'facebook', $socials ) ) : ?>
					<li><a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-facebook"></i><?php echo esc_html__('Share', 'cairo'); ?></a></li>
				<?php endif; ?>

				<?php if ( in_array( 'twitter', $socials ) ) : ?>
					<li><a class="twitter" href="https://twitter.com/intent/tweet?url=<?php echo the_permalink(); ?>&text=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>" target="_blank"><i class="fa fa-twitter"></i><?php echo esc_html__( 'Tweet', 'cairo' ) ?></a></li>
				<?php endif; ?>

				<?php if ( in_array( 'google', $socials ) ) : ?>
					<li><a class="google" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-google-plus"></i><?php echo esc_html__('Share', 'cairo'); ?></a></li>
				<?php endif; ?>

				<?php if ( in_array( 'pinterest', $socials ) ) : ?>
					<li><a class="pinterest" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=&amp;description=<?php echo rawurlencode(get_the_title()); ?>"><i class="fa fa-pinterest"></i><?php echo esc_html__( 'Pin it', 'cairo' ) ?></a></li>
				<?php endif; ?>

				</ul>
			</div>
<?php } endif;

// ==========================================================================================
// Cairo Social Share Style2
// ==========================================================================================

if ( ! function_exists( 'cairo_social_share_icons' ) ) :
	function cairo_social_share_icons() {
		$socials = array(
			'facebook',
			'twitter',
			'google',
			'linkedin',
			'pinterest',
		);

		$socials = apply_filters( 'cairo_social_share_icons', $socials ); ?>
			<div class="social-share style2">
				<ul>
				<?php if ( in_array( 'facebook', $socials ) ) : ?>
					<li><a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
				<?php endif; ?>

				<?php if ( in_array( 'twitter', $socials ) ) : ?>
					<li><a class="twitter" href="https://twitter.com/intent/tweet?url=<?php echo the_permalink(); ?>&text=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
				<?php endif; ?>

				<?php if ( in_array( 'google', $socials ) ) : ?>
					<li><a class="google" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
				<?php endif; ?>

				<?php if ( in_array( 'pinterest', $socials ) ) : ?>
					<li><a class="pinterest" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=&amp;description=<?php echo rawurlencode(get_the_title()); ?>"><i class="fa fa-pinterest"></i></a></li>
				<?php endif; ?>

				</ul>
			</div>
<?php } endif;

// ==========================================================================================
// Cairo Social Share Style3
// ==========================================================================================

if ( ! function_exists( 'cairo_social_single_top' ) ) :
	function cairo_social_single_top() {
		$socials = array(
			'facebook',
			'twitter',
			'google',
			'linkedin',
			'pinterest',
			'whatsapp',
		);
		$socials = apply_filters( 'cairo_social_share', $socials ); ?>
			<div class="social-share-button">
				<ul>
				<?php if ( in_array( 'facebook', $socials ) ) : ?>
					<li><a class="large-button facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-facebook"></i><span><?php echo esc_html__('Share On Facebook', 'cairo'); ?></span></a></li>
				<?php endif; ?>

				<?php if ( in_array( 'twitter', $socials ) ) : ?>
					<li><a class="large-button twitter" href="https://twitter.com/intent/tweet?url=<?php echo the_permalink(); ?>&text=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>" target="_blank"><i class="fa fa-twitter"></i><span><?php echo esc_html__( 'Tweet On Twitter', 'cairo' ) ?></span></a></li>
				<?php endif; ?>

				<?php if ( in_array( 'google', $socials ) ) : ?>
					<li><a class="google" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
				<?php endif; ?>

				<?php if ( in_array( 'pinterest', $socials ) ) : ?>
					<li><a class="pinterest" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=&amp;description=<?php echo rawurlencode(get_the_title()); ?>"><i class="fa fa-pinterest"></i></a></li>
				<?php endif; ?>

				<?php if ( in_array( 'whatsapp', $socials ) ) : ?>
					<li><a class="whatsapp" href="whatsapp://send?text=<?php the_permalink(); ?>" data-action="share/whatsapp/share"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
				<?php endif; ?>

				</ul>
			</div>
<?php } endif;

// ==========================================================================================
// Cairo Social Share Style4
// ==========================================================================================

if ( ! function_exists( 'cairo_social_single_bottom' ) ) :
	function cairo_social_single_bottom() {
		$socials = array(
			'facebook',
			'twitter',
			'google',
			'linkedin',
			'pinterest',
			'whatsapp',
		);
		$socials = apply_filters( 'cairo_social_share', $socials ); ?>
			<div class="social-share-button small-share-text">
				<ul>
				<?php if ( in_array( 'facebook', $socials ) ) : ?>
					<li><a class="large-button facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-facebook"></i><span><?php echo esc_html__('Share', 'cairo'); ?></span></a></li>
				<?php endif; ?>

				<?php if ( in_array( 'twitter', $socials ) ) : ?>
					<li><a class="large-button twitter" href="https://twitter.com/intent/tweet?url=<?php echo the_permalink(); ?>&text=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>" target="_blank"><i class="fa fa-twitter"></i><span><?php echo esc_html__( 'Tweet', 'cairo' ) ?></span></a></li>
				<?php endif; ?>

				<?php if ( in_array( 'google', $socials ) ) : ?>
					<li><a class="google" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-google-plus"></i><span><?php echo esc_html__('Share', 'cairo'); ?></span></a></li>
				<?php endif; ?>

				<?php if ( in_array( 'pinterest', $socials ) ) : ?>
					<li><a class="pinterest" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=&amp;description=<?php echo rawurlencode(get_the_title()); ?>"><i class="fa fa-pinterest"></i><span><?php echo esc_html__('Pin', 'cairo'); ?></span></a></li>
				<?php endif; ?>

				<?php if ( in_array( 'whatsapp', $socials ) ) : ?>
					<li><a class="whatsapp" href="whatsapp://send?text=<?php the_permalink(); ?>" data-action="share/whatsapp/share"><i class="fa fa-whatsapp" aria-hidden="true"></i><span><?php echo esc_html__('Send', 'cairo'); ?></span></a></li>
				<?php endif; ?>

				</ul>
			</div>
<?php } endif;
