<?php
	$id = get_the_ID();
	$user_id = get_the_author_meta( 'ID');
	cairo_set_post_views($post->ID);
	$views = cairo_get_post_views(get_the_ID());
	$sidebar_position = get_post_meta($id, 'single_post_sidebar', true) ? get_post_meta($id , 'single_post_sidebar', true) : 'sidebar_right';
	$featuredpost = get_post_meta( get_the_ID(), 'post_featured_image_on_off', true );
	$review_onoff = get_post_meta($id, 'review_post_on_off', true);
	$soueceenable = get_post_meta($id, 'post_source_on_off', true);
	//Enable or Disable Settings
	$relatedpostenable = ot_get_option('cairo_related_post_enable', 'off');
	$socialenable = ot_get_option('cairo_social_share_enable', 'off');
	$cairo_author_meta_enable = ot_get_option('cairo_author_meta_enable', 'off');
	$tagenable = ot_get_option('tag-enable', 'on');
	$prevnextenable = ot_get_option('prev_next_enable', 'on');
	$authorenable = ot_get_option('author-bio-enable', 'on');
	$postcommentenable = ot_get_option('post-comment-enable', 'on');
?>

<?php if ($sidebar_position == 'sidebar_wide'): ?>
	<?php $wide_sidebar = "col-md-12" ?>
<?php else: ?>
	<?php $wide_sidebar = "col-md-8" ?>
<?php	endif ?>


<section class="main">
<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
	<div class="container inner-single">

		<div class="row">
		<?php if ($sidebar_position == 'sidebar_left') { ?>
			<!--Sidebar Start-->
			<div id="sidebar" class="sidebar col-md-4 col-sm-12 col-xs-12">
				<div class="sidebar-content">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("cairo-single") ) : ?>
					<?php endif; ?>
				</div>
			</div>
			<!--Sidebar End-->
		<?php } ?>

		<div class="main-content <?php echo esc_attr($wide_sidebar);?> col-sm-12 col-xs-12">

			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<?php codepages_breadcrumb();?>
				</div>
			</div>

			<article <?php post_class('page-post post single-style-4'); ?> id="post-<?php the_ID(); ?>" itemscope itemtype="http://schema.org/Article" role="article" >

				<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'cairo-post-large-four' );?>
				<figure class="post-image" style="background-image: url('<?php echo esc_url($thumb['0']);?>')">
					<div class="post-image-header">
						<div class="display-table">
							<div class="post-header">
								<header class="entry-header">
									<div class="post-meta-info top">
										<?php cairo_category_name_color(); ?>
										<div class="post-data item"><?php the_time( get_option('date_format') ); ?></div>
									</div>
									<div class="post-title">
										<?php the_title('<h1 class="entry-title" itemprop="name headline">', '</h1>'); ?>
									</div><!-- post-title -->
								</header>
								<div class="post-meta-box">
									<ul class="post-meta no-sep">
										<li class="post-data"><i class="fa fa-commenting-o"></i><?php cairo_post_comments_count(); ?></li>
										<li class="post-data"><i class="fa fa-eye"></i><?php echo ($views); ?> <?php echo esc_html__('Views', 'cairo'); ?></li>
									</ul>
									<div class="post-print item pull-right">
										<a href="" onClick="window.print()"><i class="fa fa-print"></i><?php echo esc_html__('Print', 'cairo'); ?> </a>
									</div>
									<div class="post-email item pull-right">
										<a href="mailto:?subject=<?php echo the_title();?>&amp;body=<?php the_permalink() ?>">
											<i class="fa fa-envelope-o"></i><?php echo esc_html__('EMail', 'cairo'); ?>
										</a>
									</div>
								</div><!-- post-meta -->
							</div>
						</div>
					</div>
				</figure>
				<div class="post-share-info">
					<?php if (class_exists('codepages_shortcode')) { ?>
					<?php if($socialenable =='on'):?>
					<div class="social-single-larg text-right pull-right">
						<div class="visible-lg visible-md">
							<?php cairo_social_single_top(); ?>
						</div>
						<div class="visible-sm visible-xs">
							<?php cairo_social_single_bottom(); ?>
						</div>
					</div><!-- post-share -->
					<?php else: endif;?>
					<?php } ?>
						<?php if($cairo_author_meta_enable =='on'):?>
						<div class="author-info-small text-left pull-left">
							<aside class="post-author">
								<?php echo get_avatar( $user_id, 50 ); ?>
								<div class="author-detail">
									<?php the_author_posts_link(); ?>
									<span><?php if(get_the_author_meta('user_subtitle')) : ?><?php echo the_author_meta('user_subtitle'); ?><?php endif; ?></span>
								</div><!-- author-detail -->
							</aside>
						</div>
						<?php else: endif;?>
				</div>

				<?php if($review_onoff == 'on'):?>
					<?php get_template_part( 'loop/part/post-review' ); ?>
				<?php else:
				endif; ?>

				<div class="post-content entry-content">
					<?php the_content(); ?>
					<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'cairo' ),
							'after'  => '</div>',
						) );
					?>
				</div><!-- post-content -->

				<?php if($soueceenable == 'on'):?>
					<?php get_template_part( 'loop/part/post-source' ); ?>
				<?php else:
				endif; ?>
				<!-- post-source -->

				<?php if ($tagenable == 'on'){ ?>
					<div class="single-post-tags">
						<?php cairo_post_tag(); ?>
					</div><!-- post-tags -->
				<?php } else{}?>

				<?php if ($prevnextenable == 'on'){
					cairo_content_nav( 'nav-posts' );
				} else{}?>
				<!-- post-navigation -->

				<?php if ($authorenable == 'on'){
					get_template_part("loop/part/post-author");
				} else{}?>
				<!-- post-author -->

				<?php if (class_exists('codepages_shortcode')) { ?>
				<?php if($socialenable =='on'):?>
				<div class="text-left clearfix">
					<?php cairo_social_single_bottom(); ?>
				</div><!-- post-share -->
				<?php else: endif;?>
				<?php } ?>


				<?php if ($postcommentenable == 'on'){
					if ( comments_open() || get_comments_number() ) : comments_template(); endif;
				} else{}?>
				<!--post-comment-->

			</article><!-- post -->

		</div><!-- main-content -->

		<?php if ($sidebar_position == 'sidebar_right') { ?>
			<!--Sidebar Start-->
			<div id="sidebar" class="sidebar col-md-4 col-sm-12 col-xs-12">
				<div class="sidebar-content">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("cairo-single") ) : ?>
					<?php endif; ?>
				</div>
			</div>
			<!--Sidebar End-->
		<?php } ?>
		</div>
	</div><!-- container -->

	<?php if ($relatedpostenable == 'on'){ ?>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-xs-12">
					<div class="related-posts style-1">
						<div class="item-title"><h4><?php echo esc_html__('Related Posts','cairo'); ?></h4></div>
						<?php get_template_part( 'loop/part/related-posts' ); ?>
					</div><!-- related-posts -->
				</div><!-- col-sm-12 col-xs-12 -->
			</div><!-- row -->
		</div><!-- container -->
	<?php }
	else{} ?>

<?php endwhile; else : endif; ?>
</section><!-- main -->
