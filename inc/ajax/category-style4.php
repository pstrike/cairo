<?php
$style 		 			  	= $_POST['style'];
$categorypost       = $_POST['categorypost'];
$postcount 			  	= $_POST['postcount'];
$columnsection 	  	= $_POST['columnsection'];
$categorytitle 	  	= $_POST['categorytitle'];
$titlestyle 		  	= $_POST['titlestyle'];
$categoryorderby  	= $_POST['categoryorderby'];
$source 				  	= $_POST['source'];
$cat   					  	= $_POST['cat'];
$excludecategory  	= $_POST['excludecategory'];
$excludeposts 	  	= $_POST['excludeposts'];
$excludetag 		  	= $_POST['excludetag'];
$author_ids 		  	= $_POST['author_ids'];
$autherimgdisplay 	= $_POST['autherimgdisplay'];
$postreview       	= $_POST['postreview'];
$subcategorydisplay = $_POST['subcategorydisplay'];
$desdisplay 				= $_POST['desdisplay'];
$metadisplay 				= $_POST['metadisplay'];

$category_post_module = array(
  'author'								=> $_POST['author_ids'],
  'posts_per_page' 				=> 6,
  'post_status'				    => 'publish',
  'orderby'  				   		=> $categoryorderby,
  'cat' 									=> $categorypost,
  'category__not_in' 			=> $excludecategory,
  'tag__not_in'						=> $excludetag,
  'post__not_in'					=> $excludeposts,
  'ignore_sticky_posts' 	=> true,
  'post_type' 						=> 'post'
);

//Start Post Count
$post_count = $_POST['postcount'];
if (empty($_POST['postcount'])) {
  $category_post_module = wp_parse_args( array( 'posts_per_page' 	=> '6',), $category_post_module );
}
else{
  $category_post_module = wp_parse_args( array( 'posts_per_page' 	=> $post_count, ) , $category_post_module );
}


$query = new WP_Query($category_post_module);
?>

  <?php $i = 0;
  if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); $i++?>

    <?php
    cairo_set_post_views($post->ID);
    $views = cairo_get_post_views(get_the_ID());
    ?>
    <?php if ($i == 1) { ?>
      <div class="col-md-6 col-sm-12 col-xs-12"><div class="category-module-blocks block-category-larg">
      <article <?php post_class('post post-overlay post-style6 hover-style1'); ?>>
        <figure class="post-image">
          <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
           <?php the_post_thumbnail('cairo-post-small-five', array('itemprop'=>'image')); ?>
          </a>
        </figure>

        <?php if ($postreview == 'on') { ?>
        <?php if(! get_post_meta($id, 'review_score', true)) :
           $ratings_count = "";
         else:
           $ratings_count = get_post_meta($id, 'review_score', true); ?>
           <div class="review-rating-post"><span class="review-rating-score"><?php echo "$ratings_count";?></span></div>
         <?php endif; ?>
        <?php } ?>
  			<div class="post-detail">
  				<div class="entry-header">
  					<?php cairo_category_name_color(); ?>
  					<div class="post-title">
  						<?php the_title('<h3 class="entry-title" itemprop="name headline"><a href="'.get_permalink().'" title="'.the_title_attribute("echo=0").'">', '</a></h3>'); ?>
  					</div><!-- post-title -->
  					<div class="post-meta-box">
  						<ul class="post-meta no-sep">
                <li class="post-views"><i class="fa fa-eye"></i><?php echo ($views); ?> <?php echo esc_html__('Views', 'cairo'); ?></li>
            		<li class="post-data"><i class="fa fa-clock-o"></i><a href="<?php get_the_permalink() ?>"><?php the_time( get_option('date_format') ); ?><a/></li>
                <li class="post-comment"><i class="fa fa-commenting-o"></i><?php cairo_post_comments_count(); ?></li>
  						</ul>
  					</div><!-- post-meta -->
  				</div><!-- entry-header -->
  			</div><!-- post-detail -->
  		</article><!-- post -->

    <?php } ?>
    <?php if ($i == 2 ) { ?>
      </div></div><div class="col-md-6 col-sm-12 col-xs-12"><div class="category-module-blocks block-category-small scrollbar-inner">
    <?php } ?>
    <?php if ($i > 1 ) { ?>
      <article <?php post_class('post post-overlay hover-style1'); ?>>
        <figure class="post-image">
          <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
           <?php the_post_thumbnail('cairo-post-thumb-three', array('itemprop'=>'image')); ?>
          </a>
        </figure>
        <div class="post-detail">
          <div class="post-title">
            <?php the_title('<h5 class="entry-title" itemprop="name headline"><a href="'.get_permalink().'" title="'.the_title_attribute("echo=0").'">', '</a></h5>'); ?>
          </div><!-- post-title -->
          <div class="post-meta-box">
            <ul class="post-meta no-sep">
              <li class="post-views"><i class="fa fa-eye"></i><?php echo ($views); ?> <?php echo esc_html__('Views', 'cairo'); ?></li>
              <li class="post-comment"><i class="fa fa-commenting-o"></i><?php cairo_post_comments_count(); ?></li>
            </ul>
          </div>
        </div>
        <div class="post-excerpt"><p><?php echo cairo_string_limit_words(get_the_excerpt(), 10);?>&hellip;</p></div><!-- post-entry -->
      </article>
    <?php } ?>

 <?php endwhile;?>
 </div></div>
 <?php else :
   get_template_part( '/inc/post-style/content-none');
 endif; ?>
