<?php
// ==========================================================================================
// Codepages Footer Teamplate
// @package Cairo
// @author Codepages - Codepages
// @link http://themeforest.net/user/codepages/portfolio
// ==========================================================================================

	$footer_style = ot_get_option('footer_style', 'style1');
	get_template_part( 'loop/footer/'.$footer_style );
?>
</div>
<!-- End Theme Wrapper  -->

<?php if(ot_get_option('page_scroll_up')=='on'):?>
	<!-- Back to top Link -->
	<div id="to-top" class="main-bg"><span class="fa fa-long-arrow-up"></span></div>
<?php else:
endif;?>
<?php wp_footer(); ?>
</body>
</html>
