<?php
// ==========================================================================================
// Codepages Archive Teamplate
// @package Cairo
// @author Codepages - Codepages
// @link http://themeforest.net/user/codepages/portfolio
// ==========================================================================================

	$blog_style = ot_get_option('blog_layout_style', 'style1');
?>
<?php get_header(); ?>

<div class="page-title light">
	<div class="container">
		<div class="page-title-wrapper text-center">

				<?php
				if ( is_category() ) :
				echo '<p>'.esc_html__( 'Category', 'cairo' ).'</p>';
				echo ( '<h1>' . single_cat_title( '', false ) . '</h1>' );
				elseif ( is_tag() ) :
				echo '<p>'.esc_html__( 'Tag', 'cairo' ).'</p>';
				echo ( '<h1>' . single_tag_title( '', false ) . '</h1>' );
				elseif ( is_day() ) :
				//printf( __( 'Daily Archives: %s', 'cairo' ), '<span>' . get_the_date() . '</span>' );
				echo '<p>'.esc_html__( 'Daily Archives', 'cairo' ).'</p>';
				echo ( '<h1>' . get_the_date() . '</h1>' );
				elseif ( is_month() ) :
				//printf( __( 'Monthly Archives: %s', 'cairo' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
				echo '<p>'.esc_html__( 'Monthly Archives', 'cairo' ).'</p>';
				echo ( '<h1>' . get_the_date( 'F Y' ) . '</h1>' );
				elseif ( is_year() ) :
				//printf( __( 'Yearly Archives: %s', 'cairo' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
				echo '<p>'.esc_html__( 'Yearly Archives', 'cairo' ).'</p>';
				echo ( '<h1>' . get_the_date( 'Y' ) . '</h1>' );
				elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
				//esc_html_e( 'Asides', 'cairo' );
				echo '<p>'.esc_html__( 'Post format', 'cairo' ).'</p>';
				echo ( '<h1>' . esc_html__( 'Aside', 'cairo' ) . '</h1>' );
				elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
				//esc_html_e( 'Images', 'cairo');
				echo '<p>'.esc_html__( 'Post format', 'cairo' ).'</p>';
				echo ( '<h1>' . esc_html__( 'Images', 'cairo' ) . '</h1>' );
				elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
				//esc_html_e( 'Videos', 'cairo' );
				echo '<p>'.esc_html__( 'Post format', 'cairo' ).'</p>';
				echo ( '<h1>' . esc_html__( 'Videos', 'cairo' ) . '</h1>' );
				elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
				//esc_html_e( 'Quotes', 'cairo' );
				echo '<p>'.esc_html__( 'Post format', 'cairo' ).'</p>';
				echo ( '<h1>' . esc_html__( 'Quotes', 'cairo' ) . '</h1>' );
				elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
				//esc_html_e( 'Links', 'cairo' );
				echo '<p>'.esc_html__( 'Post format', 'cairo' ).'</p>';
				echo ( '<h1>' . esc_html__( 'Links', 'cairo' ) . '</h1>' );
				else :
				//esc_html_e( 'Archives', 'cairo' );
				echo '<p>'.esc_html__( 'Posts', 'cairo' ).'</p>';
				echo ( '<h1>' . esc_html__( 'Archives', 'cairo' ) . '</h1>' );
				endif;
				?>
		</div>
	</div><!-- container -->
</div>


	<div class="content">
		<div class="container inner">
			<div class="row">

				<?php if (ot_get_option('layout_sidebar') == 'sidebar_left'){ get_sidebar(); } ?>

				<?php if (ot_get_option('layout_sidebar') == 'sidebar_wide'): ?>
					<?php $wide_sidebar = "col-md-12" ?>
				<?php else: ?>
					<?php $wide_sidebar = "col-md-8" ?>
				<?php	endif ?>

				<div class="main-content <?php echo esc_attr($wide_sidebar);?> col-sm-12 col-xs-12">
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

				<?php if (ot_get_option('layout_sidebar') == 'sidebar_right'){ get_sidebar(); } ?>

			</div>
		</div>
	</div>

<?php get_footer(); ?>
