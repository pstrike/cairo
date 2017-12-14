<?php
// ==========================================================================================
// Codepages Cairo Theme Script and Css
// @package Cairo
// @author Codepages - Codepages
// @link http://themeforest.net/user/codepages/portfolio
// ==========================================================================================

function cairo_stylesheet() {
	//css
	wp_enqueue_style("cairo-bootstrap-css", CAIRO_URL . "assets/css/bootstrap.min.css", array());
	wp_enqueue_style("cairo-flexnav-css", CAIRO_URL . "assets/css/flexnav.min.css", array());
	wp_enqueue_style("cairo-animate-css", CAIRO_URL . "assets/css/animate.min.css", array());
	wp_enqueue_style("cairo-font-awesome", CAIRO_URL . "assets/css/font-awesome.min.css", array());
	wp_enqueue_style("cairo-themify-icons", CAIRO_URL . "assets/css/themify-icons.min.css", array());
	wp_enqueue_style("cairo-reset-css", CAIRO_URL . "assets/css/reset.min.css", array());
	wp_enqueue_style("cairo-slick-css", CAIRO_URL . "assets/css/slick.min.css", array());
	wp_enqueue_style("cairo-slick-theme", CAIRO_URL . "assets/css/slick-theme.min.css", array());
	wp_enqueue_style("cairo-magnific-theme", CAIRO_URL . "assets/css/magnific-popup.min.css", array());
	wp_enqueue_style("cairo-justifiedgallery-theme", CAIRO_URL . "assets/css/justifiedGallery.min.css", array());
	wp_enqueue_style("cairo-style-woocommerce", CAIRO_URL . "assets/css/woocommerce.min.css", array());

	echo cairo_google_fonts();
	if (is_rtl()) {
		wp_enqueue_style("cairo-rtl-min", CAIRO_URL . "assets/css/main-rtl.min.css", array());
	} else {
		wp_enqueue_style("cairo-style-min", CAIRO_URL . "assets/css/main.min.css", array());
	}

	ob_start();
	get_template_part( 'inc/admin/styles' );
	$styles = ob_get_contents();
	ob_end_clean();
	if (is_rtl()) {
		wp_add_inline_style( 'cairo-rtl-min', $styles );
	} else {
		wp_add_inline_style( 'cairo-style-min', $styles );
	}

	wp_enqueue_style("cairo-dark-min", CAIRO_URL . "assets/css/dark-style.min.css", array());
	wp_enqueue_style("cairo-responsive-css", CAIRO_URL . "assets/css/responsive.min.css", array());

  //script
	wp_enqueue_script("cairo-app-min", CAIRO_URL . "assets/js/app.js", array());
	if (is_rtl()) {
		wp_enqueue_script('cairo-custom-rtl', CAIRO_URL . 'assets/js/custom-rtl.js', array());
	} else {
		wp_enqueue_script('cairo-custom-script', CAIRO_URL . 'assets/js/custom.js', array());
	}
	wp_enqueue_script( 'hoverIntent' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }

	//Ajax Load More And Pagination
	wp_register_script('cairo-ajax', CAIRO_URL . 'assets/js/ajax-app.js', array('jquery'), null);
	wp_localize_script( 'cairo-ajax', 'themeajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
	wp_enqueue_script('cairo-ajax');

}
add_action( 'wp_enqueue_scripts', 'cairo_stylesheet', 999);

// Cairo Admin Scripts
function load_custom_wp_admin_style() {
	wp_register_style( 'cairo-custom-wp-admin-css', CAIRO_URL . 'admin/cairo-admin-css.css', false, '1.0.0' );
	wp_register_style( "cairo-stroke-gap", CAIRO_URL . "assets/css/Stroke-Gap-Icons.min.css", array(), "4.4.0" );
	wp_register_style( "cairo-themify", CAIRO_URL . "assets/css/themify-icons.min.css", array(), "4.4.0" );
	wp_register_script( "cairo-js-admin", CAIRO_URL . "admin/cairo-admin.js", array( "wp-color-picker" ), "1.0.0" );

	wp_enqueue_style( "cairo-custom-wp-admin-css" );
	wp_enqueue_style( "cairo-stroke-gap" );
	wp_enqueue_style( "cairo-themify" );
	wp_enqueue_style( "wp-color-picker" );
	wp_enqueue_script( "cairo-js-admin" );

}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

// Cairo Option Style
function cairo_ot_admin_styles_after() {
	if (is_rtl()) {
		wp_register_style( 'cairo-custom-wp-admin-css-rtl', CAIRO_URL . 'admin/cairo-admin-rtl.css', false, '1.0.0' );
		wp_register_style( 'codepages-option-font', 'https://fonts.googleapis.com/css?family=Cairo:400,600,700', false, '1.0.0' );
		wp_enqueue_style( 'cairo-custom-wp-admin-css-rtl' );
		wp_enqueue_style( 'codepages-option-font' );
	} else {
		wp_register_style( 'cairo-custom-admin-css', CAIRO_URL . 'admin/cairo-admin.css', false, '1.0.0' );
		wp_register_style( 'codepages-option-font', 'https://fonts.googleapis.com/css?family=Ubuntu:400,500,700', false, '1.0.0' );
		wp_enqueue_style( 'cairo-custom-admin-css' );
		wp_enqueue_style( 'codepages-option-font' );
	}
}
add_action( 'ot_admin_styles_after', 'cairo_ot_admin_styles_after' );

function puck_ie_conditional_scripts( $tag, $handle ) {
	if ( $handle == 'cairo-html5shiv' ) {
		$tag = "<!--[if lt IE 9]>\n" . $tag . "<![endif]-->\n";
	}
	return $tag;
}

add_filter( 'script_loader_tag', 'puck_ie_conditional_scripts', 10, 2 );
