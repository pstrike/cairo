<?php
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'tax_query' => array(
      array(
        'taxonomy' => 'post_format',
        'field' => 'slug',
        'terms' => array('post-format-video'),
      )
    ),
    'orderby' => 'ID',
);
$query = new WP_Query($args);
cairo_set_post_views($post->ID);
$views = cairo_get_post_views(get_the_ID());
?>

<div class="playlist-post-video">
  <h5 class="title-playlist-video"> <?php echo esc_html__("Other Videos",'cairo') ?> </h5>
  <div class="playlist-video">
    <ul>
      <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
      <li>
        <div class="post-meta-box">
  				<ul class="post-meta no-sep">
  					<li class="post-data"><i class="fa fa-commenting-o"></i><?php cairo_post_comments_count(); ?></li>
  					<li class="post-data"><i class="fa fa-eye"></i><?php echo ($views); ?> <?php echo esc_html__('Views', 'cairo'); ?></li>
  				</ul>
  			</div><!-- post-meta -->
        <figure class="post-image">
    			<?php if ( has_post_thumbnail() ) { ?>
    			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
    				<?php the_post_thumbnail('cairo-post-small-one', array('itemprop'=>'image')); ?>
    			</a>
        <?php } ?>
    		</figure>
        <div class="post-title">
  				<?php the_title('<h5 class="entry-title"><a href="'.get_permalink().'" title="'.the_title_attribute("echo=0").'">', '</a></h5>'); ?>
  			</div><!-- post-title -->
      </li>
      <?php endwhile;
      wp_reset_postdata();
      else : ?>
        <p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'cairo' ); ?></p>
      <?php endif; ?>
    </ul>
  </div>
</div>
