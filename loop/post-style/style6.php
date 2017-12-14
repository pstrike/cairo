<?php
cairo_set_post_views($post->ID);
$views = cairo_get_post_views(get_the_ID());
?>
<div class="col-sm-6 col-xs-12 hg-item">
	<article itemscope itemtype="http://schema.org/Article" <?php post_class('post status-publish post-style6'); ?> role="article">
		<figure class="post-image">
			<?php if ( has_post_thumbnail() ) { ?>
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
				<?php the_post_thumbnail('cairo-post-medium-tow', array('itemprop'=>'image')); ?>
			</a>
		<?php } ?>
		</figure><!-- post-image -->
		<div class="post-detail">
			<div class="entry-header">
				<?php cairo_category_name_color(); ?>
				<div class="post-title">
					<?php the_title('<h3 class="entry-title" itemprop="name headline"><a href="'.get_permalink().'" title="'.the_title_attribute("echo=0").'">', '</a></h3>'); ?>
				</div><!-- post-title -->
				<div class="post-meta-box">
					<ul class="post-meta no-sep">
						<li class="post-data"><i class="fa fa-commenting-o"></i><?php cairo_post_comments_count(); ?></li>
						<li class="post-data"><i class="fa fa-clock-o"></i><?php the_time( get_option('date_format') ); ?></li>
						<li class="post-data"><i class="fa fa-eye"></i><?php echo ($views); ?> <?php echo esc_html__('Views', 'cairo'); ?></li>
					</ul>
				</div><!-- post-meta -->
			</div><!-- entry-header -->
		</div><!-- post-detail -->
	</article><!-- post -->
</div>
