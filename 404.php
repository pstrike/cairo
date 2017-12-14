<?php
// ==========================================================================================
// Codepages 404 Teamplate
// @package Cairo
// @author Codepages - Codepages
// @link http://themeforest.net/user/codepages/portfolio
// ==========================================================================================

get_header(); ?>

<section id="Home-404page">
	<div class="container inner">
		<div class="row">

			<div class="main-content">
				<div class="error-page text-center">
					<h1><?php echo esc_html__( '404', 'cairo' ); ?></h1>
					<p><?php echo esc_html__( 'We are sorry, the page you are looking for does not exist. It may have been moved, or removed.. You might try searching our site.', 'cairo'); ?></p>
					<a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html__('Back to Home Page', 'cairo'); ?></a>
				</div>
				<div class="page-content">
					<div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2">
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>

<?php get_footer(); ?>
