<?php
// ==========================================================================================
// Codepages Category Teamplate
// @package Cairo
// @author Codepages - Codepages
// @link http://themeforest.net/user/codepages/portfolio
// ==========================================================================================

	$cat = get_queried_object();
	$cat_id = $cat->term_id;
	//Sidebar On Off
	$sidebar_onoff = get_term_meta( $cat_id, 'cairo_category_sidebar_onoff', true );
	$category_sidebar_on_off = $sidebar_onoff ? $sidebar_onoff : ot_get_option('cairo_category_sidebar_onoff', 'style1');
	//Featured Style
	$featured_style = get_term_meta( $cat_id, 'cairo_category_featured_style', true );
	$cairo_category_featured_style = $featured_style ? $featured_style : ot_get_option('cairo_category_featured_style', 'close');
	//Header Style
	$header_style = get_term_meta( $cat_id, 'cairo_category_header', true );
	$cairo_category_header = $header_style ? $header_style : ot_get_option('cairo_category_header', 'style1');
	//Post Style
	$post_style = get_term_meta( $cat_id, 'cairo_category_style', true );
	$category_post_style = $post_style ? $post_style : ot_get_option('cairo_category_style', 'style1');
	//Category Ads
	$category_ads = get_term_meta( $cat_id, 'cairo_category_custom_banner', true );
	$category_ads_banner = $category_ads ? $category_ads : ot_get_option('cairo_category_custom_banner', '');
	//Category Ads Link
	$category_ads_link = get_term_meta( $cat_id, 'cairo_category_custom_banner_link', true );
	$category_ads_banner_link = $category_ads_link ? $category_ads_link : ot_get_option('cairo_category_custom_banner_link', '');
	$id = get_the_ID();
	$ratings_count = get_post_meta($id, 'review_score', true);
?>
<?php get_header(); ?>

<div id="category-content">

	<!-- Start Category Featured Slider -->
	<div class="featured-category-slider">
	<?php get_template_part( '/loop/slider-category/'.$cairo_category_featured_style ); ?>
	</div>
	<!-- End Category Featured Slider -->

	<!--Category Title Start -->
	<div class="header-category-title">
	<?php get_template_part( '/loop/category-style/category-header-'.$cairo_category_header ); ?>
	</div>
	<!--Category Title End -->

	<!-- Category Ads Start -->
	<?php if (!$category_ads_banner == '' || !$category_ads_banner_link == ''): ?>
		<div class="col-md-12 text-center inner-small">
			<div class="category-ads">
				<a href="<?php echo esc_url($category_ads_banner_link); ?>" target="_blank">
					<img src="<?php echo esc_url($category_ads_banner); ?>" alt="">
				</a>
			</div>
		</div>
	<?php endif ?>
	<!-- Category Ads End -->

	<div class="container inner-f">
		<div class="row">
			<!-- category-content -->

			<!--Sidebar Start-->
			<?php if ($category_sidebar_on_off == 'style2'): ?>
				<div class="sidebar col-sm-4 col-xs-12">
					<div class="sidebar-content">
						<?php if ( is_active_sidebar( 'cairo_category' ) ) { ?>
							<?php dynamic_sidebar( 'cairo_category' ); ?>
						<?php } else { ?>
							<?php dynamic_sidebar( 'cairo_category' ); ?>
						<?php } ?>
					</div>
				</div>
			<?php else : ?>
			<?php endif ?>
			<!--Sidebar End-->

			<?php if ($category_sidebar_on_off == 'style3'): ?>
				<div class="main-content col-sm-12 col-xs-12">
			<?php else : ?>
				<div class="main-content col-sm-8 col-xs-12">
			<?php endif ?>

				<!--Blog Post Start-->
				<div class="blog-posts">
					<div class="row">
						<?php $i = 0; if (have_posts()) :  ?>
							<?php while (have_posts()) : the_post(); ?>
								<?php get_template_part( 'loop/post-style/'.$category_post_style.'' ); ?>
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
				<!--Blog Post End-->
			</div>


			<!--Sidebar Start-->
			<?php if ($category_sidebar_on_off == 'style1'): ?>
				<div class="sidebar wpb_column col-sm-4 col-xs-12 margin-top">
					<div class="sidebar-content">
						<?php if ( is_active_sidebar( 'cairo_category' ) ) { ?>
							<?php dynamic_sidebar( 'cairo_category' ); ?>
						<?php } else { ?>
							<?php dynamic_sidebar( 'cairo_category' ); ?>
						<?php } ?>
					</div>
				</div>
			<?php else : ?>
			<?php endif ?>
			<!--Sidebar End-->

		</div>
	</div>
</div>
<!-- End category Content -->

<?php get_footer(); ?>
