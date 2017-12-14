<!-- Start Mobile Navbar -->
<div class="mobile-topbar visible-sm visible-xs">
	<div class="mobile-icons">
		<div class="sidebar-button">
			<a href="#"><i class="fa fa-navicon"></i></a>
		</div>
		<div class="search-button search-for-mobile">
			<div class="Search-Icon-header">
				<a class="Search-Icon-click" href="#"><i class="fa fa-search"></i></a>
			</div><!-- mobile-search -->
		</div><!-- search-button -->
	</div>
	<div class="logo-aria">
		<div class="col-md-12 text-center">
			<?php if (ot_get_option('logo')) { $logo = ot_get_option('logo'); } else { $logo = CAIRO_URL. 'assets/images/logo/cairo-logo.png'; } ?>
			<a href="<?php echo esc_url(home_url('/')); ?>">
				<img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('name'); ?>"/>
			</a>
		</div>
		<div class="Social-header">
			<?php get_template_part( 'loop/part/social-icon' ); ?>
		</div>
	</div>
</div>
<!-- End Mobile Navbar -->
