<?php
// ==========================================================================================
// Categories Background Color
// ==========================================================================================
$categories = get_categories();
foreach ( $categories as $category ) {
	$cat_id = $category->term_id;
	$cat_data = get_option("category_$cat_id");
	if( !empty( $cat_data ) ) :
		$cat_color = $cat_data['catBG'];
		$cat_text = $cat_data['catText'];
	else:
		$cat_color = "";
		$cat_text = "";
	endif;
	echo '.cat-color-' . $category->term_id . '{ background-color:' . $cat_color . ' !important; color : '.$cat_text.' !important; } ';
	echo '.subcategory .cat-item-' . $category->term_id . ' a:hover { color:' . $cat_color . ' !important; } ';
	echo '
		.category-content-module.cat-color-module-' . $category->term_id . ' .module-title.style1 h4:before {
			background-color:' . $cat_color . ' !important;
		}
		.category-content-module.cat-color-module-' . $category->term_id . ' .module-title.style1 h4 {
			color:' . $cat_color . ' !important;
		}
		.category-content-module.cat-color-module-' . $category->term_id . ' .module-title.style2 h4 {
			background-color:' . $cat_color . ' !important;
		}
		.category-content-module.cat-color-module-' . $category->term_id . ' .module-title.style3 h4 {
			color:' . $cat_color . ' !important;
		}
		.category-content-module.cat-color-module-' . $category->term_id . ' .module-title.style4 {
			border-top: 3px Solid ' . $cat_color . ' !important;
		}
		.category-content-module.cat-color-module-' . $category->term_id . ' .module-title.style4 h4 {
			color:' . $cat_color . ' !important;
		}
		.category-content-module.cat-color-module-' . $category->term_id . ' .module-title.style5 {
			background: ' . $cat_color . ' !important;
		}
		.category-content-module.cat-color-module-' . $category->term_id . ' .module-title.style6 {
			background: ' . $cat_color . ' !important;
		}
		.category-content-module.cat-color-module-' . $category->term_id . ' .module-title.style6:after {
			border-top-color: ' . $cat_color . ' !important;
		}
		.category-content-module.cat-color-module-' . $category->term_id . ' .post-title .entry-title a:hover {
			color:' . $cat_color . ' !important;
		}
		.category-content-module.cat-color-module-' . $category->term_id . ' .module-title.style7 h4 {
			background-color:' . $cat_color . ' !important;
		}
		.category-content-module.cat-color-module-' . $category->term_id . ' .module-title.style7 {
			border-color:' . $cat_color . ' !important;
		}
		';
}

// ==========================================================================================
// Boxed Background Color & Images
// ==========================================================================================
if ( $boxed_color = ot_get_option('general_boxed_bg_color') ) { ?>
.wrapper-boxed {
	background-color: <?php echo esc_attr($boxed_color); ?>;
  background-position: top center;
  background-repeat: no-repeat;
  background-size: 100%;
  background-attachment: fixed;
}
<?php }

if ( $boxed_image = ot_get_option('general_boxed_bg_image') ) { ?>
.wrapper-boxed {
	background-color: <?php if($boxed_image['background-color']){echo $boxed_image['background-color'] ; }else{ echo '#000';} ?>;
	background-repeat:<?php if($boxed_image['background-repeat']){echo $boxed_image['background-repeat'] ; }else{ echo 'repeat-x';} ?>;
	background-attachment:<?php if($boxed_image['background-attachment']){echo $boxed_image['background-attachment'] ; }else{ echo 'fixed';} ?>;
	background-position:<?php if($boxed_image['background-position']){echo $boxed_image['background-position'] ; }else{ echo 'top';} ?>;
	background-size:<?php if($boxed_image['background-size']){echo $boxed_image['background-size'] ; }else{ echo 'cover';} ?>;
	background-image:url(<?php if($boxed_image['background-image']){echo $boxed_image['background-image'] ; }?>) ;
}
<?php }

if ( $border_color = ot_get_option('general_border_bg_color') ) { ?>
.wrapper-border {
    border-color: <?php echo esc_attr($border_color); ?>;
}
<?php }

if ( $logo_height = ot_get_option('logo_height') ) { ?>
.logo-header a img {
    max-height: <?php echo esc_attr($logo_height); ?>px;
}
.header-style3 .Social-header, .header-style4 .Social-header {
	  padding: <?php echo esc_attr($logo_height); ?>px 0px;
}
<?php }

if ( $logo_padding_top = ot_get_option('logo_padding_top') ) { ?>
.header-style1 .logo-header,
.header-style2 .logo-header,
.header-style3 .logo-header,
.header-style4 .logo-header,
.header-style5 .logo-header {
    padding-top: <?php echo $logo_padding_top['0']; ?><?php echo $logo_padding_top['1']; ?>;
}
<?php }

if ( $logo_padding_bottom = ot_get_option('logo_padding_bottom') ) { ?>
.header-style1 .logo-header,
.header-style2 .logo-header,
.header-style3 .logo-header,
.header-style4 .logo-header,
.header-style5 .logo-header {
    padding-bottom: <?php echo $logo_padding_bottom['0']; ?><?php echo $logo_padding_bottom['1']; ?>;
}
<?php }


// ==========================================================================================
// Fonts And Option Typography
// ==========================================================================================
?>
h1, .h1{
	<?php cairo_font_typography(ot_get_option('heading_1'), false, 'Poppins');?>
}
h2, .h2{
	<?php cairo_font_typography(ot_get_option('heading_2'), false, 'Poppins');?>
}
h3, .h3{
	<?php cairo_font_typography(ot_get_option('heading_3'), false, 'Poppins');?>
}
h4, .h4{
	<?php cairo_font_typography(ot_get_option('heading_4'), false, 'Poppins');?>
}
h5, .h5{
	<?php cairo_font_typography(ot_get_option('heading_5'), false, 'Poppins');?>
}
h6, .h6{
	<?php cairo_font_typography(ot_get_option('heading_6'), false, 'Poppins');?>
}

.post-category, .post-category a, .post-author a, .post-data, .post-data a, .post-comment, .post-comment a,
.post-views, .newsticker-title, .post-share-count, .post-print, .post-email, .social-share-button ul li a span,
.comment-body .reply a, .comment-body .comment-edit-link, .error-page a, .product-rating-link,
.product-page-add-to-cart .woocommerce-variation-price .price span, .product-page-meta-item-title, .product-page-meta-item-desc,
.product-label, .product-page-add-to-cart .woocommerce-variation-availability .stock, .products-table-title,
.review-rating-post .review-rating-score  {
  <?php cairo_font_typography(ot_get_option('post_meta_font'), false, 'Rajdhani');?>
}


body, .error-page h1, .products-table-item-column._product a {
  <?php cairo_font_typography(ot_get_option('text_font'), false, 'Poppins');?>
}

.post-excerpt p, .post-content p, .product-page-desc p {
  <?php cairo_font_typography(ot_get_option('body_font'), false, 'Droid Serif');?>
}

#headermenu > ul > li > a, #headermenu ul ul li a,#headermenu ul > li.mega-menu .mega-menu-content .sub-menu li > a,
header #headermenu ul > li.mega-menu .mega-menu-content .mega-category-content li .post .post-title h6 a, .topbar-nav-menu li a {
<?php cairo_font_typography(ot_get_option('header_menu_font'), false, 'Poppins');?>
}


<?php
// ==========================================================================================
// Body Background Color & Images
// ==========================================================================================
?>


<?php if ( $cairo_main_color = ot_get_option('cairo_main_color', '#0561fc') ) { ?>
.title-news-ticker, .post-category a, #menu-line, #headermenu > ul > li.menu-item:hover > a::after, .header-style2 .total-product,
.total-product, #to-top, .cairo-category-posts-style2 .cairo-category-posts-small .post-details:before,
ul.author-social-icons li a:hover, .cairo-posts-widgets-style2 .post-details:before, .single-post-tags ul li a:hover,
.single-post-source ul li a:hover, .about-author-social a:hover, .author-url a:hover, .form-submit input:hover, .loading-posts:before,
.codepages-loading:after, .cairo-post-review .review-detail .review-rating-score, .cairo-post-review .progress-bar, .tags ul li a:hover,
#headermenu > ul > li:hover > a, .codepages-logged-in form p input[type="submit"].button:hover, .error-page a:hover,
#headermenu > ul > li.current-menu-item > a, .codepages-fb-style1 .home-links:hover a, .codepages-fb-style2 .home-links:hover a,
#headermenu > ul > li.current-menu-item > a, .codepages-fb-style3 .home-links:hover a, .codepages-logged-in form p input[type="submit"],
.mc4wp-form input[type="submit"], .add-to-cart-wrapper a.add-to-cart, .product-page-tabs-nav-link:after, button.single_add_to_cart_button,
.sidebar-style3 .cairo-posts-tap-widgets .nav-tabs > li.active > a, .featured-post-slider .slick-arrow:hover, p.no-results-page-desc a,
.button, button, input[type=button], input[type=reset], input[type=submit].full-width, .wc-coupon button.wc-coupon-button, .woocommerce-message a.button,
.demo-button a, .featured-style-11 .post-detail .Read-More a:hover, .sidebar-navigation .navbar ul li.active>a {
	background-color: <?php echo esc_attr($cairo_main_color); ?>;
}
<?php } ?>

<?php if ( $cairo_main_color = ot_get_option('cairo_main_color') ) { ?>
a, .topbar-nav-menu li a:hover, .social-icons li a:hover, .navbar-top-menu li a:hover,
.menu-top-nav ul li a:hover, #headermenu > ul > li.current-menu-item > a i,
#headermenu ul ul li:hover::before, #headermenu ul ul li:hover > a, #headermenu ul ul li a:hover, #headermenu ul ul li.active a,
.header-style3 .social-icons li a:hover, .header-style4 .social-icons li a:hover, .header-style5 .social-icons li a:hover,
.header-style5 #headermenu ul ul li:hover > a, .header-style5 #headermenu ul ul li a:hover, .footer-menu li a:hover,
.post-title .entry-title a:hover, #nav-posts .post-nav a:hover, .entry-subcategory ul li a:hover, .page-title-wrapper h1, .product-card-price,
header #headermenu ul > li.mega-menu .mega-menu-content .mega-category-content li .post .post-title h6 a:hover, .entry-title a:hover, .breadcrumbs span,
.product-page-add-to-cart .woocommerce-variation-price .price span, .product-page-meta-item-desc a:hover, .woocommerce div.product p.price ins,
.woocommerce div.product span.price ins, .slick-next:before, .slick-next:after, .slick-prev:before, .slick-prev:after, .product-page-price,
.tweet-community ul li a, .products-list-pagination .current, .products-list-pagination a:hover, .entry-content blockquote:before,
.products-table-item-column._product a:hover, a.wc-box-edit, .woocommerce-MyAccount-navigation ul li.is-active a, .wc-lead a {
	color: <?php echo esc_attr($cairo_main_color); ?>;
}

#headermenu ul ul ul, #headermenu ul ul li.has-sub:hover > a::after,
.codepages-about-me ul.author-social-icons li a:hover, .entry-content blockquote, .product-page-title:before,
input[type=date]:focus, input[type=datetime-local]:focus, input[type=datetime]:focus, input[type=email]:focus,
input[type=month]:focus, input[type=number]:focus, input[type=password]:focus, input[type=search]:focus,
input[type=tel]:focus, input[type=text]:focus, input[type=time]:focus, input[type=url]:focus, input[type=week]:focus,
select:focus, textarea:focus, .content-shop .slider-nav .slick-current, .main-footer.dark .sidebar-style6 .widget-title,
.main-footer.dark .sidebar-style5, .sidebar-style3 .cairo-posts-tap-widgets .nav-tabs, button.single_add_to_cart_button,
.add-to-cart-wrapper a.add-to-cart, .wc-coupon button.wc-coupon-button, input[type=submit].full-width, .button, button, input[type=button],
input[type="submit"].button, a.button, .featured-post-slider .slick-arrow:hover, .featured-style-11 .post-detail .Read-More a:hover,
.sidebar-navigation .navbar ul li ul {
	border-color: <?php echo esc_attr($cairo_main_color); ?>;
}
<?php } ?>

<?php if ( $review_bg = ot_get_option('cairo_review_score_bg') ) { ?>
.review-rating-post .review-rating-score {
	background-color: <?php echo esc_attr($review_bg); ?>;
}
<?php }

if ( $review_color = ot_get_option('cairo_review_score_color') ) { ?>
.review-rating-post .review-rating-score {
  color: <?php echo esc_attr($review_color); ?>;
}
<?php }

if ( $author_color = ot_get_option('cairo_author_name_color') ) { ?>
.post-author a {
  color: <?php echo esc_attr($author_color); ?>;
}
<?php }

// ==========================================================================================
// Header Background Color & Images
// ==========================================================================================
?>
<?php if ( $header1_bg = ot_get_option('top_header_background_color') ) { ?>
.header-topbar.topbar-menu {
	background-color: <?php echo esc_attr($header1_bg); ?>;
}
<?php } ?>

<?php if ( $header1_color = ot_get_option('top_header_text_color') ) { ?>
.social-icons li a, .topbar-nav-menu li a, .data-time-header, .header-style2 .woocommerce-cart-icon a,
.header-style2 a.login-icon-click, .header-style2 a.logout-icon-click, .header-style2 a.Search-Icon-click {
	color: <?php echo esc_attr($header1_color); ?>;
}
<?php } ?>

<?php if ( $header1_border = ot_get_option('top_header_border_color') ) { ?>
.data-time-header, .header-topbar.topbar-menu, .topbar-left, .topbar-right, .topbar-nav-menu, .Social-header,
.header-style2 .login-icon-header, .header-style2 .woocommerce-cart-icon, .header-style2 .Social-header, .topbar-nav-menu li a {
	border-color: <?php echo esc_attr($header1_border); ?>;
}
<?php } ?>

<?php if ( $header1_hover = ot_get_option('top_header_text_hover_color') ) { ?>
.social-icons li a:hover, .topbar-nav-menu li a:hover, .woocommerce-cart-icon a:hover, .login-icon-header a:hover,
.Search-Icon-header a:hover {
	color: <?php echo esc_attr($header1_hover); ?>;
}
<?php } ?>

<?php if ( $header1_bg_menu = ot_get_option('menu_header_background_color') ) { ?>
.header-dark.header-style1, .header-style1 {
	background: <?php echo esc_attr($header1_bg_menu); ?> !important;
}
<?php } ?>

<?php if ( $header1_text_menu = ot_get_option('menu_header_text_color') ) { ?>
.header-style1 #headermenu > ul > li > a, .header-style1.header-dark #headermenu > ul > li > a, .header-style1 .woocommerce-cart-icon a,
.header-style1.header-dark .woocommerce-cart-icon a,.header-style1 a.login-icon-click, .header-style1.header-dark a.login-icon-click,
.header-style1 a.logout-icon-click, .header-style1.header-dark a.logout-icon-click, .header-style1 a.Search-Icon-click {
	color: <?php echo esc_attr($header1_text_menu); ?>;
}
<?php } ?>

<?php if ( $header1_text_hover_menu = ot_get_option('menu_header_text_hover_color') ) { ?>
.header-style1 #headermenu > ul > li:hover > a, .header-style1 #headermenu > ul > li.current-menu-item > a,
.header-style1 #headermenu > ul > li.current-menu-item > a i {
	background-color: <?php echo esc_attr($header1_text_hover_menu); ?>;
}
<?php } ?>

<?php if ( $header1_text_hover_menu = ot_get_option('menu_header_text_hover_color') ) { ?>
.header-style1 .woocommerce-cart-icon a:hover, .header-style1 a.login-icon-click:hover,
.header-style1 a.logout-icon-click:hover, .header-style1 a.Search-Icon-click:hover {
	color: <?php echo esc_attr($header1_text_hover_menu); ?>;
}
<?php } ?>

<?php if ( $header1_border_menu = ot_get_option('menu_header_border_color') ) { ?>
.header-dark .header-menu, .header-dark .woocommerce-cart-icon, .header-dark .login-icon-header,
.header-menu, .woocommerce-cart-icon, .login-icon-header {
	border-color: <?php echo esc_attr($header1_border_menu); ?> !important;
}
<?php } ?>

<?php if ( $header5_bg_img = ot_get_option('header_background_image') ) { ?>
.header-blog.header-style5 {
	background-color: <?php if($header5_bg_img['background-color']){echo $header5_bg_img['background-color'] ; }else{ echo '#000';} ?>;
	background-repeat:<?php if($header5_bg_img['background-repeat']){echo $header5_bg_img['background-repeat'] ; }else{ echo 'repeat-x';} ?>;
	background-attachment:<?php if($header5_bg_img['background-attachment']){echo $header5_bg_img['background-attachment'] ; }else{ echo 'fixed';} ?>;
	background-position:<?php if($header5_bg_img['background-position']){echo $header5_bg_img['background-position'] ; }else{ echo 'top';} ?>;
	background-size:<?php if($header5_bg_img['background-size']){echo $header5_bg_img['background-size'] ; }else{ echo 'cover';} ?>;
	background-image:url(<?php if($header5_bg_img['background-image']){echo $header5_bg_img['background-image'] ; }?>) ;
}
<?php } ?>

<?php if ( $header5_bg_menu = ot_get_option('menu_header_bg_color_5') ) { ?>
.header-style5 .header-main-buttons {
    background-color: <?php echo esc_attr($header5_bg_menu); ?>;
}
<?php } ?>

<?php if ( $header5_bo_menu = ot_get_option('menu_header_bo_color_5') ) { ?>
.header-style5 .header-main-buttons, .header-dark.header-style5 .header-main-buttons,
.header-style5 .woocommerce-cart-icon, .header-dark.header-style5 .woocommerce-cart-icon,
.header-style5 .login-icon-header, .header-dark.header-style5 .login-icon-header {
    border-color: <?php echo esc_attr($header5_bo_menu); ?>;
}
<?php } ?>

<?php if ( $header5_text_menu = ot_get_option('menu_header_txet_color_5') ) { ?>
.header-style5 #headermenu > ul > li > a, .header-style5 a.login-icon-click, .header-style5 a.logout-icon-click,
.header-style5 a.Search-Icon-click, .header-style5 .woocommerce-cart-icon a, .header-style5 .social-toggle {
    color: <?php echo esc_attr($header5_text_menu); ?>;
}
<?php } ?>

<?php if ( $header2_bg_color = ot_get_option('header_menu_background_color') ) { ?>
.header-style2 .header-main, .header-style2 .header-sticky {
	background-color: <?php echo esc_attr($header2_bg_color); ?> ;
}
<?php } ?>

<?php if ( $header2_text_color = ot_get_option('header_menu_text_color') ) { ?>
.header-style2 #headermenu > ul > li > a {
	color: <?php echo esc_attr($header2_text_color); ?> ;
}
<?php } ?>

<?php if ( $header2_bg_h_color = ot_get_option('header_menu_background_h_color') ) { ?>
	.header-style2 #headermenu > ul > li:hover > a, .header-style2 #headermenu > ul > li.current-menu-item > a,
	.header-style2 #headermenu > ul > li.current-menu-item > a i {
	background-color: <?php echo esc_attr($header2_bg_h_color); ?> ;
}
<?php } ?>

<?php if ( $header2_text_h_color = ot_get_option('header_menu_text_h_color') ) { ?>
.header-style2 #headermenu > ul > li:hover > a, .header-style2 #headermenu > ul > li.current-menu-item > a,
.header-style2 #headermenu > ul > li.current-menu-item > a i {
	color: <?php echo esc_attr($header2_text_h_color); ?> ;
}
<?php } ?>


<?php if ( $page_title__bg_colors = get_post_meta(get_the_ID(), 'page_title_bg_color', true) ) { ?>
.page-main-title {
	background-color: <?php echo esc_attr($page_title__bg_colors); ?> ;
}
<?php } ?>

<?php if ( $page_title_colors = get_post_meta(get_the_ID(), 'page_title_color', true) ) { ?>
.page-main-title h1, .breadcrumb li a, .breadcrumbs a, .breadcrumbs i {
	color: <?php echo esc_attr($page_title_colors); ?> ;
}
<?php }

if ( $header1_sticky_bg_menu = ot_get_option('menu_header_sticky_background_color') ) { ?>
.header-sticky {
	background-color: <?php echo esc_attr($header1_sticky_bg_menu); ?>;
}
<?php } ?>

<?php if ( $header1_sticky_text_menu = ot_get_option('menu_header_sticky_text_color') ) { ?>
.header-sticky #headermenu > ul > li > a {
	color: <?php echo esc_attr($header1_sticky_text_menu); ?>;
}
<?php } ?>

<?php if ( $header1_sticky_text_hover_menu = ot_get_option('menu_header_sticky_text_hover_color') ) { ?>
.header-sticky #headermenu > ul > li:hover > a {
	color: <?php echo esc_attr($header1_sticky_text_hover_menu); ?>;
}
<?php }

if ( $header1_sticky_text_hover_menu_backgroundcolor = ot_get_option('menu_header_sticky_text_hover_backgroundcolor') ) { ?>
.header-sticky #headermenu > ul > li:hover > a {
	background-color: <?php echo esc_attr($header1_sticky_text_hover_menu_backgroundcolor); ?>;
}
<?php }

// ==========================================================================================
// Sidebar Widget Background & Color
// ==========================================================================================
?>

<?php if ( $sidebar_border_color = ot_get_option('border_sidebar_color') ) { ?>
.sidebar-style1, .sidebar-style4 .widget-title, .main-footer.dark .sidebar-style4 .widget-title,
.sidebar-style3 .cairo-posts-tap-widgets .nav-tabs, .sidebar-style5, .sidebar-style6 .widget-title {
	border-color: <?php echo esc_attr($sidebar_border_color); ?> ;
}
<?php }
if ( $sidebar_border_color_6 = ot_get_option('border_sidebar_color_6') ) { ?>
.sidebar-style6 .widget-title {
	border-color: <?php echo esc_attr($sidebar_border_color_6); ?> ;
}
<?php }
if ( $sidebar_border_color_7 = ot_get_option('border_sidebar_color_7') ) { ?>
.sidebar-style7 .widget-title:after, .main-footer.dark .sidebar-style7 .widget-title:after {
	border-top-color: <?php echo esc_attr($sidebar_border_color_7); ?> ;
}
<?php }
if ( $sidebar_background_color = ot_get_option('bg_sidebar_color') ) { ?>
.sidebar-style1 .widget-title h2:before, .sidebar-style2, .sidebar-style3 .widget-title h2, .sidebar-style6, .sidebar-style7 .widget-title,
.main-footer .sidebar-style1 .widget-title h2:before, .main-footer .sidebar-style2, .main-footer .sidebar-style3 .widget-title h2,
.sidebar-style3 .cairo-posts-tap-widgets .nav-tabs > li.active > a,
.main-footer .sidebar-style5 .widget-title h2, .main-footer .sidebar-style6, .main-footer .sidebar-style7 .widget-title,
.main-footer.dark .sidebar-style1 .widget-title h2:before, .main-footer.dark .sidebar-style2, .main-footer.dark .sidebar-style3 .widget-title h2,
.main-footer.dark .sidebar-style5 .widget-title h2, .main-footer.dark .sidebar-style6, .main-footer.dark .sidebar-style7 .widget-title {
	background-color: <?php echo esc_attr($sidebar_background_color); ?> ;
}
<?php }
if ( $sidebar_border_color_3 = ot_get_option('bg_sidebar_color') ) { ?>
.sidebar-style3 .widget-title, .main-footer .sidebar-style3 .widget-title, .sidebar-style5 {
	border-color: <?php echo esc_attr($sidebar_border_color_3); ?> ;
}
<?php }
if ( $sidebar_text_color = ot_get_option('text_sidebar_color') ) { ?>
.sidebar-style1 .widget-title h2, .sidebar-style2 .widget-title h2, .sidebar-style3 .cairo-posts-tap-widgets .nav-tabs > li.active > a,
.sidebar-style3 .widget-title h2, .sidebar-style4 .widget-title h2,
.main-footer.dark .sidebar-style4 .widget-title h2, .sidebar-style5 .widget-title h2, .sidebar-style6 .widget-title h2,
.sidebar-style7 .widget-title h2 {
	color: <?php echo esc_attr($sidebar_text_color); ?> ;
}
<?php }
if ( $sidebar_bg_text_color = ot_get_option('bg_text_sidebar_color') ) { ?>
.main-footer.dark .sidebar-style2 .widget-title, .main-footer .sidebar-style2 .widget-title, .sidebar-style2 .widget-title {
	background-color: <?php echo esc_attr($sidebar_bg_text_color); ?> ;
}
<?php }

// ==========================================================================================
// Footer Background Images
// ==========================================================================================
?>

<?php if ( $footer_background_image = ot_get_option( 'footer_background_image', array() ) ) { ?>
.main-footer {
background-color: <?php if($footer_background_image['background-color']){echo $footer_background_image['background-color'] ; } else { echo '#000';} ?>;
background-repeat:<?php if($footer_background_image['background-repeat']){echo $footer_background_image['background-repeat'] ; }else{ echo 'repeat-x';} ?>;
background-attachment:<?php if($footer_background_image['background-attachment']){echo $footer_background_image['background-attachment'] ; }else{ echo 'fixed';} ?>;
background-position:<?php if($footer_background_image['background-position']){echo $footer_background_image['background-position'] ; }else{ echo 'top';} ?>;
background-size:<?php if($footer_background_image['background-size']){echo $footer_background_image['background-size'] ; }else{ echo 'cover';} ?>;
background-image:url(<?php if($footer_background_image['background-image']){echo $footer_background_image['background-image'] ; }?>) ;
}
.main-footer .sidebar-style5 .widget-title h2 {
background-color: <?php if($footer_background_image['background-color']){echo $footer_background_image['background-color'] ; }else{ echo '#ffffff';} ?>;
}
<?php } ?>
