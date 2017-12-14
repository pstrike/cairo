<?php
$header_sticky_style = ot_get_option('header_sticky_menu_dark_light', 'light');
?>
<?php if(ot_get_option('sticky_menu')=='on'):?>
<!-- Start Header Sticky -->
<div class="header-sticky header-sticky-<?php echo esc_attr($header_sticky_style); ?> visible-lg visible-md">
	<div class="container">
		<div class="row">
			<?php if (ot_get_option('sticky-logo')) { $logo = ot_get_option('sticky-logo'); } else { $logo = CAIRO_URL. 'assets/images/logo/cairo-logo.png'; } ?>
			<div class="logo-header">
				<a href="<?php echo esc_url(home_url('/')); ?>">
					<img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('name'); ?>"/>
				</a>
			</div>
			<div class="sticky-menu">
				<nav class="navbar theme-menu">
					<div class="main-menu">
						<div id="headermenu" class="Menu-Header top-menu">
							<?php
							wp_nav_menu( array(
								'theme_location'  	=> 'sticky',
								'container'       	=> false,
								'menu_id'       	=> 'navmenu',
								'menu_class'    	=> 'flexnav one-page',
								'items_wrap' 		=> '<ul data-breakpoint="992" id="%1$s" class="flexnav one-page %2$s">%3$s</ul>',
								'walker' => new cairo_navigation_walker(), 'fallback_cb' => 'menu_fallback',
								) );
								?>
						</div>
					</div>
				</nav><!-- navbar -->
			</div><!-- sticky-menu -->
		</div>
	</div><!-- container -->
</div>
<!-- End Header Sticky -->
<?php else:
endif;?>
