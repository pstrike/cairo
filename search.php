<?php
// ==========================================================================================
// Codepages Search Results Teamplate
// @package Cairo
// @author Codepages - Codepages
// @link http://themeforest.net/user/codepages/portfolio
// ==========================================================================================

$blog_style = ot_get_option('blog_layout_style', 'style1');

get_header(); ?>

	<section class="main">

		<div class="page-title light">
			<div class="container">
				<div class="page-title-wrapper text-center">
					<?php
						echo '<p>'.esc_html__( 'Search Results', 'cairo' ).'</p>';
						echo ( '<h1>' . get_search_query() . '</h1>' );
					?>
				</div>
			</div>
		</div><!-- page-main-title -->

		<div class="container inner-Pages">
			<div class="main-content col-sm-8 col-xs-12">
				<div class="blog-posts">
					<div class="row">
						<?php $i = 0; if (have_posts()) :  ?>
							<?php while (have_posts()) : the_post(); ?>
								<?php get_template_part( 'loop/post-style/'.$blog_style.'' ); ?>
							<?php endwhile; ?>
						<?php else : ?>
							<?php get_template_part( 'loop/post-style/content-none'); ?>
						<?php $i++; endif;?>
					</div>
					<div class="row">
						<div class="col-md-8 col-sm-12 col-xs-12">
							<?php cairo_pagination(); ?>
						</div>
					</div>
				</div>
			</div>

			<!--Sidebar Start-->
			<div class="sidebar wpb_column col-sm-4 col-xs-12 margin-top">
				<div class="sidebar-content">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("cairo-general") ) : ?>
					<?php endif; ?>
				</div>
			</div>
			<!--Sidebar End-->

		</div><!-- container -->

	</section>

<?php get_footer(); ?>
