<?php
$cat = get_queried_object();
$cat_id = $cat->term_id;

//Featured Count Posts
$showposts = get_term_meta( $cat_id, 'cairo_category_featured_post_count', true );
$cairo_category_featured_post_count = $showposts ? $showposts : ot_get_option('cairo_category_featured_post_count', '5');

$args = array(
		'post_type' => 'post',
		'posts_per_page' => $cairo_category_featured_post_count,
		'cat' 				=> $cat_id,
		'orderby' => 'ID',
);
$query = new WP_Query($args);
?>
<!-- Start Slider Style 7 -->
<section class="featured-post-slider">
	<div class="container">
		<div class="featured-block">
			<ul class="featured-slider-posts featured-style-8">
				<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();?>
				<li>
					<div class="featured-posts">
							<?php
							cairo_set_post_views($post->ID);
							$views = cairo_get_post_views(get_the_ID());
							?>
							<article <?php post_class('post post-overlay'); ?> role="article">
								<div class="featured-slider">
									<figure class="post-image">
										<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
										 <?php the_post_thumbnail('cairo-post-medium-tow', array('itemprop'=>'image')); ?>
										</a>
									</figure>
									<div class="post-detail">
										<?php cairo_category_name_color(); ?>
										<div class="post-title">
										 <?php the_title('<h2 class="entry-title" itemprop="name headline"><a href="'.get_permalink().'" title="'.the_title_attribute("echo=0").'">', '</a></h2>'); ?>
										</div>
										<div class="meta-slider-content">
											<ul>
												<li class="post-views"><span><i class="fa fa-eye"></i><?php echo ($views); ?> <?php echo esc_html__('Views', 'cairo'); ?></span></li>
												<li class="post-data"><span><i class="fa fa-clock-o"></i><?php the_time( get_option('date_format') ); ?></span></li>
												<li class="post-comment"><span><i class="fa fa-commenting-o"></i><?php cairo_post_comments_count(); ?></span></li>
											</ul>
										</div>
									</div>
							 </div>
						 </article>
					</div>
				</li>
			<?php endwhile;
			wp_reset_postdata();
			else : ?>
			 <p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'cairo' ); ?></p>
		 <?php endif; ?>
			</ul>
		</div>
	</div>
</section>
<!-- End Slider Style 7 -->
