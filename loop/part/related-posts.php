<!-- Start Related Posts -->
<?php
  $id = get_the_id();

  $args = array(
  	'post_type'=>'post',
    'orderby' => 'rand',
  	'post_status' => 'publish',
  	'ignore_sticky_posts' => 1,
  	'no_found_rows' => true,
  	'post__not_in' => array($id),
  	'posts_per_page' => ot_get_option('related_post_number', 4)
  );

  $query = new WP_Query( $args );
?>
<div class="related-post-content">
	<div class="row">
  	<div class="related-wrap">
  		<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
      cairo_set_post_views($post->ID);
    	$views = cairo_get_post_views(get_the_ID());
      ?>
  		<div class="col-md-3 col-sm-12 col-xs-12">
  			<article <?php post_class('post full-width status-publish post-style2'); ?> role="article">
  				<figure class="post-image">
  					<?php if ( has_post_thumbnail() ) { ?>
  					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
  						<?php the_post_thumbnail('cairo-post-medium-five', array('itemprop'=>'image')); ?>
  					</a>
            <?php } ?>
  					<div class="post-cat">
  						<?php cairo_category_name_color(); ?>
  					</div><!-- post-cat -->
  				</figure>
  				<div class="post-detail">
  					<div class="post-meta-box">
  						<ul class="post-meta no-sep">
  							<li class="post-data"><i class="fa fa-commenting-o"></i><?php cairo_post_comments_count(); ?></li>
  							<li class="post-data"><i class="fa fa-eye"></i><?php echo ($views); ?> <?php echo esc_html__('Views', 'cairo'); ?></li>
  						</ul>
  					</div><!-- post-meta -->
  					<div class="post-title">
  						<?php the_title('<h5 class="entry-title" itemprop="name headline"><a href="'.get_permalink().'" title="'.the_title_attribute("echo=0").'">', '</a></h5>'); ?>
  					</div><!-- post-title -->
  				</div>
  			</article>
  		</div>
  		<?php endwhile;
  		wp_reset_postdata();
  		else : ?>
        <div class="col-md-12 col-sm-12 col-xs-12">
    			<p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'cairo' ); ?></p>
        </div>
  		<?php endif; ?>
  	</div>
	</div>
</div>
<!-- End Related Posts -->
