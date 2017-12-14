<?php
// ==========================================================================================
// Codepages Author Teamplate
// @package Cairo
// @author Codepages - Codepages
// @link http://themeforest.net/user/codepages/portfolio
// ==========================================================================================

$authorenable = ot_get_option('author-bio-enable', 'on');
$blog_style = ot_get_option('blog_layout_style', 'style1');

get_header(); ?>

	<section class="main">

		<div class="content">
			<div class="container inner">
				<div class="row">

					<?php if (ot_get_option('layout_sidebar') == 'sidebar_left'){ get_sidebar('cairo_category'); } ?>

					<?php if (ot_get_option('layout_sidebar') == 'sidebar_wide'): ?>
						<?php $wide_sidebar = "col-md-12" ?>
					<?php else: ?>
						<?php $wide_sidebar = "col-md-8" ?>
					<?php	endif ?>

					<div class="main-content <?php echo esc_attr($wide_sidebar);?> col-sm-12 col-xs-12">
						<div class="authorpage">
							<?php cairo_post_author_bio(); ?>
						</div>
						<!--Blog Post Start-->
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
							<div class="col-md-12 col-sm-12 col-xs-12">
								<?php cairo_pagination(); ?>
							</div>
						</div>
					</div>
					<!--Blog Post End-->

					<?php if (ot_get_option('layout_sidebar') == 'sidebar_right'){ get_sidebar('cairo_category'); } ?>

				</div>
			</div>
		</div>

	</section><!-- main -->



<?php get_footer(); ?>
