<?php global $cairo_codepage; ?>
<div class="sidebar-navigation">
	<div class="sidebar-scroll scrollbar-macosx">

		<div class="close-sidebar-button">
			<a href="#" class="close-btn"><span>Close Sidebar</span><i class="fa fa-close"></i></a>
		</div><!-- close-sidebar-button -->
		<div class="sidebar-logo">
			<div class="brand-logo">
				<?php if (ot_get_option('sidebar-logo')) { $logo = ot_get_option('sidebar-logo'); } else { $logo = CAIRO_URL. 'assets/images/logo/cairo-logo.png'; } ?>
				<a href="<?php echo esc_url(home_url('/')); ?>">
					<img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('name'); ?>"/>
				</a>
			</div>
		</div>

		<nav class="navbar">
			<?php wp_nav_menu( array( 'theme_location' => 'mobile', 'container' => false, 'menu_class' => 'mobile-menu') ); ?>
		</nav><!-- navbar -->
		<?php if($cairo_codepage['advertising_sidebar_mobile']=='1'):?>
		<!-- Start Navbar Ads -->
		<div class="sidebar-banner-ads text-center">
		<?php $headerad = $cairo_codepage['side_ad'];
			echo do_shortcode($headerad);
		?>
		</div>
		<!-- End Navbar Ads -->
		<?php else:
		endif;?>
		<div class="footer-sidebar">
			<div class="sidebar-social">
				<ul>
					<?php if (! $cairo_codepage['social_media_facebook']): ?>
					<?php else : ?>
						<li><a href="<?php echo esc_url($cairo_codepage['social_media_facebook']); ?>"><i class="fa fa-facebook"></i></a></li>
					<?php endif ?>
					<?php if (! $cairo_codepage['social_media_twitter']): ?>
					<?php else : ?>
						<li><a href="<?php echo esc_url($cairo_codepage['social_media_twitter']); ?>"><i class="fa fa-twitter"></i></a></li>
					<?php endif ?>
					<?php if (! $cairo_codepage['social_media_google_plus']): ?>
					<?php else : ?>
						<li><a href="<?php echo esc_url($cairo_codepage['social_media_google_plus']);?>"><i class="fa fa-google-plus"></i></a></li>
					<?php endif ?>
					<?php if (! $cairo_codepage['social_media_instagram']): ?>
					<?php else : ?>
						<li><a href="<?php echo esc_url($cairo_codepage['social_media_instagram']); ?>"><i class="fa fa-instagram"></i></a></li>
					<?php endif ?>
					<?php if (! $cairo_codepage['social_media_pinterest']): ?>
					<?php else : ?>
						<li><a href="<?php echo esc_url($cairo_codepage['social_media_pinterest']); ?>"><i class="fa fa-pinterest"></i></a></li>
					<?php endif ?>
					<?php if (! $cairo_codepage['social_media_linkedin']): ?>
					<?php else : ?>
						<li><a href="<?php echo esc_url($cairo_codepage['social_media_linkedin']); ?>"><i class="fa fa-linkedin"></i></a></li>
					<?php endif ?>
					<?php if (! $cairo_codepage['social_media_youtube']): ?>
					<?php else : ?>
						<li><a href="<?php echo esc_url($cairo_codepage['social_media_youtube']); ?>"><i class="fa fa-youtube-play"></i></a></li>
					<?php endif ?>
					<?php if (! $cairo_codepage['social_media_tumblr']): ?>
					<?php else : ?>
						<li><a href="<?php echo esc_url($cairo_codepage['social_media_tumblr']); ?>"><i class="fa fa-tumblr"></i></a></li>
					<?php endif ?>
					<?php if (! $cairo_codepage['social_media_vimeo']): ?>
					<?php else : ?>
						<li><a href="<?php echo esc_url($cairo_codepage['social_media_vimeo']); ?>"><i class="fa fa-vimeo"></i></a></li>
					<?php endif ?>
					<?php if (! $cairo_codepage['social_media_rss']): ?>
					<?php else : ?>
						<li><a href="<?php echo esc_url($cairo_codepage['social_media_rss']); ?>"><i class="fa fa-rss"></i></a></li>
					<?php endif ?>
				</ul>
			</div><!-- sidebar-social -->

			<div class="copyright">
				<?php if (! $cairo_codepage['credit_txt']): ?>
					<div class="text-center"><p>2015 ALL RIGHT RESERVED - <span>cairo</span> WordPress Theme</p></div>
				<?php else : ?>
					<?php echo ( $cairo_codepage['credit_txt'] );?>
				<?php endif ?>
			</div><!-- copyright -->
		</div>
	</div><!-- sidebar-scroll -->
</div><!-- sidebar-navigation -->

<div class="sidebar-overlay close-btn"></div>
