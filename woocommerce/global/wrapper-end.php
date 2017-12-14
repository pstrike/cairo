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

			</div>
			<?php if (ot_get_option('layout_sidebar_shop') == 'sidebar_right'){ ?>
				<!--Sidebar Start-->
				<div id="sidebar" class="sidebar col-md-4 col-sm-12 col-xs-12">
					<div class="sidebar-content">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("cairo_shop") ) : ?>
						<?php endif; ?>
					</div>
				</div>
				<!--Sidebar End-->
			<?php } ?>
		</div>
	</div>
</div>
