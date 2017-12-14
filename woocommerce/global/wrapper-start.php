<?php
/**
 * Content wrappers
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     3.2.0
 */

if (!defined('ABSPATH')) {
	exit;
}
?>
<div class="main-content content-shop">
	<div class="container inner-shop">
	  <div class="row">

			<?php if (ot_get_option('layout_sidebar_shop') == 'sidebar_left'){ ?>
				<!--Sidebar Start-->
				<div id="sidebar" class="sidebar col-md-4 col-sm-12 col-xs-12">
					<div class="sidebar-content">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("cairo_shop") ) : ?>
						<?php endif; ?>
					</div>
				</div>
				<!--Sidebar End-->
			 <?php } ?>

			<?php if (ot_get_option('layout_sidebar_shop') == 'sidebar_wide'): ?>
				<?php $wide_sidebar = "col-md-12" ?>
			<?php else: ?>
				<?php $wide_sidebar = "col-md-8" ?>
			<?php	endif ?>

			<div class="main-content-shop <?php echo esc_attr($wide_sidebar);?> col-sm-12 col-xs-12">
