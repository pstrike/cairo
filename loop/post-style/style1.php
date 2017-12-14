<?php
cairo_set_post_views($post->ID);
$views = cairo_get_post_views(get_the_ID());
$socialenable = ot_get_option('cairo_social_share_enable', 'on');
?>
<div class="col-md-12 col-sm-12 col-xs-12">
	<article itemscope itemtype="http://schema.org/Article" <?php post_class('post full-width status-publish post-style1'); ?> role="article">
		<figure class="post-image">
			<?php if ( has_post_thumbnail() ) { ?>
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
				<?php the_post_thumbnail('cairo-post-large-five', array('itemprop'=>'image')); ?>
			</a>
		<?php } ?>
		</figure>
		<div class="post-content">
			<div class="post-details">
				<div class="post-cat">
					<?php cairo_category_name_color(); ?>
				</div><!-- post-cat -->
				<?php if (class_exists('codepages_shortcode')) { ?>
					<div class="post-share">
						<?php cairo_social_share(); ?>
					</div><!-- post-shear -->
				<?php } ?>
			</div><!-- post-inwrap -->
			<div class="post-title">
				<?php the_title('<h2 class="entry-title" itemprop="name headline"><a href="'.get_permalink().'" title="'.the_title_attribute("echo=0").'">', '</a></h2>'); ?>
			</div><!-- post-title -->
			<div class="post-excerpt">
				<p><?php echo cairo_string_limit_words(get_the_excerpt(), 50);?>&hellip;</p>
			</div> <!-- post-entry -->
			<div class="post-meta-box">
				<aside class="post-author">
				 <?php echo get_avatar( get_the_author_meta( 'ID' ), 45 ); ?>
				 <?php the_author_posts_link(); ?>
				</aside>
				<ul class="post-meta no-sep">
					<li class="post-data"><i class="fa fa-commenting-o"></i><?php cairo_post_comments_count(); ?></li>
					<li class="post-data"><i class="fa fa-clock-o"></i><?php the_time( get_option('date_format') ); ?></li>
					<li class="post-data"><i class="fa fa-eye"></i><?php echo ($views); ?> <?php echo esc_html__('Views', 'cairo'); ?></li>
				</ul>
			</div><!-- post-meta -->
		</div><!-- post-content -->
	</article>
</div>
