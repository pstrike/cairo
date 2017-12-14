<?php
$header_dark_light = ot_get_option('header_dark_light', 'light');
?>

<!-- Start Section Header style1 -->
<header class="header-blog header-style1 header-<?php echo esc_attr($header_dark_light); ?>">
	<?php
	get_template_part( 'loop/header/mobile-header' );
	get_template_part( 'loop/header/sticky-menu' );
	?>
	<div class="Navbar-Header visible-lg visible-md">
		<?php if(ot_get_option('top_header_hide_show')=='on'):?>
			<!-- Start Header Topbar -->
		<div class="header-topbar topbar-menu">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-12 pull-left">
						<div class="topbar-left">
							<?php
							// show the date and time if needed
							if(ot_get_option('data_top_menu')=='on'):
							$codepages_data_time = ot_get_option('data_time_format');
							if ($codepages_data_time == '') {
									$codepages_data_time = 'l, F j, Y';
							}?>
							<div class="data-time-header">
							<?php echo date_i18n(stripslashes(''.$codepages_data_time.'')); ?>
							</div>
							<?php endif;?>
							<nav class="topbar-nav-menu">
								<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'container' => false, 'menu_class' => 'top-navbar-menu', 'fallback_cb' => 'menu_fallback',) ); ?>
							</nav>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 pull-right">
						<div class="topbar-right">
							<div class="Social-header">
								<?php get_template_part( 'loop/part/social-icon' ); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Header Topbar -->
		<?php endif;?>
		<div class="header-main header-logo">
			<div class="container">
				<div class="row">
					<?php if(ot_get_option('advertising_header')=='on'):?>
						<?php $ads_classes = "col-md-4 col-sm-4 pull-left" ?>
					<?php else: ?>
						<?php $ads_classes = "col-md-12 col-sm-12 text-center" ?>
					<?php endif;?>
					<div class="<?php echo esc_html($ads_classes);?>">
						<?php if (ot_get_option('logo')) { $logo = ot_get_option('logo'); } else { $logo = CAIRO_URL. 'assets/images/logo/cairo-logo.png'; } ?>
						<div class="logo-header">
							<a href="<?php echo esc_url(home_url('/')); ?>">
								<img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('name'); ?>"/>
							</a>
						</div>
					</div>
					<?php if(ot_get_option('advertising_header')=='on'):?>
						<div class="col-md-8 col-sm-8 pull-right">
							<div class="header_adv">
								<!-- Start Navbar Ads -->
								<div class="header-banner-adv">
									<?php $headerad = ot_get_option('header_banner');
									echo do_shortcode($headerad);
									?>
								</div>
								<!-- End Navbar Ads -->
							</div>
						</div>
					<?php else:
					endif;?>
				</div>
			</div>
		</div>
		<!-- End Header Logo -->
		<div class="header-navigation">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="header-menu">
							<div class="main-menu pull-left">
								<div id="headermenu" class="Menu-Header top-menu">
									<?php
									wp_nav_menu( array(
										'theme_location'  	=> 'primary',
										'container'       	=> false,
										'menu_id'       	=> 'navmenu',
										'menu_class'    	=> 'flexnav one-page',
										'items_wrap' 		=> '<ul data-breakpoint="992" id="%1$s" class="flexnav one-page %2$s">%3$s</ul>',
										'walker' => new cairo_navigation_walker(), 'fallback_cb' => 'menu_fallback',
										) );
										?>
									</div>
								</div>

								<div class="header-icons pull-right">
									<!-- Start Search Area Icon -->
									<div class="Search-Icon-header">
										<a class="Search-Icon-click" href="#"><i class="fa fa-search"></i></a>
									</div>
									<!-- End Search Area Icon -->

									<!-- Start Login Area Icon -->
									<div class="login-icon-header">
										<?php
										if ( ! is_user_logged_in() ) { // Display WordPress login form: ?>
										  <a class="login-icon-click" href="#"><i class="fa fa-user"></i></a>
										<?php } else { // If logged in: ?>
										  <a class="logout-icon-click" href="<?php echo wp_logout_url( home_url() ); ?>"><i class="fa fa-sign-out"></i></a>
										<?php } ?>
									</div>
									<!-- End Login Area Icon -->

									<!-- Start Woocommerce Cart Icon -->
									<?php if(ot_get_option('header_cart_on_off')=='on'):?>
										<div class="woocommerce-cart-icon">
											<a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php echo esc_html__( 'View your shopping cart', 'cairo' ); ?>">
												<div class="total-product"><?php echo sprintf (( WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></div> <i class="fa fa-shopping-basket"></i>
											</a>
										</div><!-- woocommerce-cart -->
									<?php else:
									endif;?>
									<!-- End Woocommerce Cart Icon -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Header Navigation -->
		</div>
		<!-- Start Search Area Form -->
		<div class="Block-Search-header Search-header1">
			<button type="button" class="close-search"></button>
			<div class="form-container">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-lg-offset-2 col-xl-6 col-xl-offset-3 text-center logo-search">
							<?php if (ot_get_option('logo')) { $logo = ot_get_option('search-logo'); } else { $logo = CAIRO_URL. 'assets/images/logo/cairo-logo.png'; } ?>
							<a href="<?php echo esc_url(home_url('/')); ?>">
								<img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('name'); ?>"/>
							</a>
						</div>
						<div class="col-lg-8 col-lg-offset-2 col-xl-6 col-xl-offset-3">
							<?php get_search_form(); ?>
							<p><?php echo esc_html__('Input your search keywords and press Enter.', 'cairo'); ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Search Area Icon-->
		<!-- Start Login Area Icon-->
		<div class="login-popup-header">
			<button type="button" class="close-login"></button>
			<div class="form-container">
				<?php get_template_part( 'loop/part/login-popup' ); ?>
			</div>
		</div>
		<!-- End Login Area Icon-->
	</header>
	<!-- End Section Header style1 -->
