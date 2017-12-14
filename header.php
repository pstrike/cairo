<?php
// ==========================================================================================
// Codepages Header functions
// @package Cairo
// @author Codepages - Codepages
// @link http://themeforest.net/user/codepages/portfolio
// ==========================================================================================

$header_style		= ot_get_option('header_style', 'style1');
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta property="fb:app_id" content="<?php echo ot_get_option('facebook_app_ID'); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php if (ot_get_option('logo-favico')) { $fav_logo = ot_get_option('logo-favico'); } else { $fav_logo = CAIRO_URL. 'assets/images/favicon.ico'; } ?>
	<link rel="shortcut icon" href="<?php echo esc_url($fav_logo); ?>" />
	<?php
	$htmlcodes = ot_get_option('custom_html_codes');
	?>
	<?php echo do_shortcode($htmlcodes); ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div class="theme-wrapper">
		<?php
		get_template_part( 'loop/header/sidebar-menu' );
		get_template_part( 'loop/header/'.$header_style );
		?>
