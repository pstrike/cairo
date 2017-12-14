<?php
// ==========================================================================================
// Codepages Sidebar Teamplate
// @package Cairo
// @author Codepages - Codepages
// @link http://themeforest.net/user/codepages/portfolio
// ==========================================================================================
?>
<!--Sidebar Start-->
<div id="sidebar" class="sidebar col-md-4 col-sm-12 col-xs-12">
	<div class="sidebar-content">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("cairo-general") ) : ?>
		<?php endif; ?>
	</div>
</div>
<!--Sidebar End-->
