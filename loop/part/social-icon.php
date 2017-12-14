	<ul class="social-icons text-right">
		<?php if (! ot_get_option('fb_link')): ?>
		<?php else : ?>
			 <li><a class="facebook" href="<?php echo esc_url(ot_get_option('fb_link')); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
		<?php endif ?>

		<?php if (! ot_get_option('twitter_link')): ?>
		<?php else : ?>
			<li><a class="twitter" href="<?php echo esc_url(ot_get_option('twitter_link')); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
		<?php endif ?>

		<?php if (! ot_get_option('dribble_link')): ?>
		<?php else : ?>
			<li><a class="dribbble" href="<?php echo esc_url(ot_get_option('dribble_link')); ?>" target="_blank"><i class="fa fa-dribbble"></i></a></li>
		<?php endif ?>

		<?php if (! ot_get_option('linkden_link')): ?>
		<?php else : ?>
			<li><a class="linkedin" href="<?php echo esc_url(ot_get_option('linkden_link')); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
		<?php endif ?>

		<?php if (! ot_get_option('flicker_link')): ?>
		<?php else : ?>
			<li><a class="flickr" href="<?php echo esc_url(ot_get_option('flicker_link')); ?>" target="_blank"><i class="fa fa-flickr"></i></a></li>
		<?php endif ?>

		<?php if (! ot_get_option('tumblr_link')): ?>
		<?php else : ?>
			<li><a class="tumblr" href="<?php echo esc_url(ot_get_option('tumblr_link')); ?>" target="_blank"><i class="fa fa-tumblr"></i></a></li>
		<?php endif ?>

		<?php if (! ot_get_option('vimeo_link')): ?>
		<?php else : ?>
			<li><a class="vimeo" href="<?php echo esc_url(ot_get_option('vimeo_link')); ?>" target="_blank"><i class="fa fa-vimeo"></i></a></li>
		<?php endif ?>

		<?php if (! ot_get_option('youtube_link')): ?>
		<?php else : ?>
			<li><a class="youtube" href="<?php echo esc_url(ot_get_option('youtube_link')); ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
		<?php endif ?>

		<?php if (! ot_get_option('instagram_link')): ?>
		<?php else : ?>
			<li><a class="instagram" href="<?php echo esc_url(ot_get_option('instagram_link')); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
		<?php endif ?>

		<?php if (! ot_get_option('google_link')): ?>
		<?php else : ?>
			<li><a class="google" href="<?php echo esc_url(ot_get_option('google_link')); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
		<?php endif ?>

		<?php if (! ot_get_option('foursquare_link')): ?>
		<?php else : ?>
			<li><a class="foursquare" href="<?php echo esc_url(ot_get_option('foursquare_link')); ?>" target="_blank"><i class="fa fa-foursquare"></i></a></li>
		<?php endif ?>

		<?php if (! ot_get_option('pinterest_link')): ?>
		<?php else : ?>
			<li><a class="pinterest" href="<?php echo esc_url(ot_get_option('pinterest_link')); ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
		<?php endif ?>

		<?php if (! ot_get_option('deviantart_link')): ?>
		<?php else : ?>
			<li><a class="deviantart" href="<?php echo esc_url(ot_get_option('deviantart_link')); ?>" target="_blank"><i class="fa fa-deviantart"></i></a></li>
		<?php endif ?>

		<?php if (! ot_get_option('behance_link')): ?>
		<?php else : ?>
			<li><a class="behance" href="<?php echo esc_url(ot_get_option('behance_link')); ?>" target="_blank"><i class="fa fa-behance"></i></a></li>
		<?php endif ?>
	</ul>
