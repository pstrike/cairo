<?php
// ==========================================================================================
// Codepages functions and definitions
// @package Cairo
// @author Codepages - Codepages
// @link http://themeforest.net/user/codepages/portfolio
// ==========================================================================================

//Define Theme Name for localization
define( 'CAIRO_URL', trailingslashit( get_parent_theme_file_uri() ));
define( 'CAIRO_DIR', trailingslashit( get_parent_theme_file_path() ));
define( 'CAIRO_THEME_VERSION', '1.0' );

//Setting constant to inform the plugin that them is activated
define ('CAIRO_THEME_ACTIVATED' , true);

//Require option-tree functions & files
add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_show_new_layout', '__return_false' );
add_filter( 'ot_theme_mode', '__return_true' );
$cairo_admin = array( 'ot-category', 'ot-radioimages', 'ot-metaboxes', 'ot-themeoptions', 'ot-functions', 'ot-google-fonts');
foreach ( $cairo_admin as $k ) {
	require_once CAIRO_DIR . 'inc/admin/'. sanitize_key( $k ) .'.php';
}
if ( ! class_exists( 'OT_Loader' ) ) { require CAIRO_DIR .'/admin/ot-loader.php'; }

//Theme Require core functionality
$cairo_core = array( 'custom-walker-menu', 'helpers', 'scripts', 'ajax');
foreach ( $cairo_core as $k ) {
	require_once CAIRO_DIR . 'inc/core/'. sanitize_key( $k ) .'.php';
}

//Register Plugin
require_once CAIRO_DIR .'/inc/plugins/register-plugins.php';

//Theme Custom Breadcrumb
require_once CAIRO_DIR . '/inc/breadcrumb.php';

//Theme Custom Pagination
require_once CAIRO_DIR . '/inc/pagination_nav.php';

//Theme Admin Welcom Screen
require_once CAIRO_DIR . '/inc/admin/welcome-page/admin-welcome.php';
