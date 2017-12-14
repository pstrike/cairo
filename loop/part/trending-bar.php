<?php
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 5,
    'orderby' => 'ID',
);
$query = new WP_Query($args);
?>

<div class="trending-bar">
  <h2 class="title-news-ticker">Trending News</h2>
  <div class="trending">
    <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
    <div class="item">
      <div class="title-trending-content">
        <?php the_title('<h2 class="entry-title" itemprop="name headline"><a href="'.get_permalink().'" title="'.the_title_attribute("echo=0").'">', '</a></h2>'); ?>
        <span class="post-data"><?php the_time( get_option('date_format') ); ?></span>
      </div>
    </div>
    <?php endwhile;
    wp_reset_postdata();
    else : ?>
      <p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'cairo' ); ?></p>
    <?php endif; ?>
  </div>
  <div class="ticker-slide-nav">
    <div class="prev-arrow"></div>
    <div class="next-arrow"></div>
  </div>
</div>  
