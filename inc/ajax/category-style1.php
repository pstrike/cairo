<?php
$postauthorimage = get_avatar( get_the_author_meta( 'ID' ), $size = '35' );
$postauthorname = the_author();

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

$query = new WP_Query($category_post_module);
?>

  <?php $i = 0;
  if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); $i++?>

  <?php if($i % 6 == 1) {
  echo '<div class="col-md-6 col-sm-12 col-xs-12"><div class="category-module-blocks block-category-larg">';
  }
  if($i % 6 == 2) {
  echo '<div class="col-md-6 col-sm-12 col-xs-12"><div class="category-module-blocks block-category-small">';
  } ?>

   <article <?php post_class('post post-overlay'); ?> role="article">

     <?php if ($i % 6 == 1) { ?>
       <figure class="post-image">
         <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
          <?php the_post_thumbnail('cairo-post-medium-five', array('itemprop'=>'image')); ?>
         </a>
       </figure>
       <?php cairo_category_name_color(); ?>
       <?php if ($postreview == 'on') { ?>
       <?php if(! get_post_meta($id, 'review_score', true)) :
   				$ratings_count = "";
   			else:
          $ratings_count = get_post_meta($id, 'review_score', true); ?>
   				<div class="review-rating-post"><span class="review-rating-score"><?php echo "$ratings_count";?></span></div>
   			<?php endif; ?>
       <?php } ?>

     <?php }
     elseif ($i % 6 == 2 || $i % 6 == 3 ||  $i % 6 == 4 || $i % 6 == 5 || $i % 6 == 0 ) { ?>
       <figure class="post-image">
         <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
          <?php the_post_thumbnail('cairo-post-thumb-three', array('itemprop'=>'image')); ?>
        </a>
       </figure>
     <?php } ?>

     <div class="post-detail">
        <?php if ($i % 6 == 1) { ?>
         <div class="post-title">
           <?php the_title('<h3 class="entry-title" itemprop="name headline"><a href="'.get_permalink().'" title="'.the_title_attribute("echo=0").'">', '</a></h3>'); ?>
         </div><!-- post-title -->

         <div class="post-meta-info top author-images">
           <aside class="post-author">
            <?php if ($autherimgdisplay == 'show') { ?>
            <?php echo $postauthorimage; ?>
            <?php } ?>
            <?php the_author_link(); ?>
           </aside><!-- post-author -->
           <span class="post-data"><a href="<?php get_the_permalink() ?>"><?php the_time( get_option('date_format') ); ?><a/></span>
         </div><!-- post-meta -->

         <?php if ($desdisplay == 'show') { ?>
          <div class="post-excerpt"><p><?php echo cairo_string_limit_words(get_the_excerpt(), 20);?>&hellip;</p></div>
         <?php } ?>

        <?php }
        elseif ($i % 6 == 2 || $i % 6 == 3 ||  $i % 6 == 4 || $i % 6 == 5 || $i % 6 == 0 ) { ?>
         <div class="post-title">
           <?php the_title('<h5 class="entry-title" itemprop="name headline"><a href="'.get_permalink().'" title="'.the_title_attribute("echo=0").'">', '</a></h5>'); ?>
         </div><!-- post-title -->
        <?php } ?>

        <?php if ($metadisplay == 'show') { ?>
				<div class="post-meta-box">
					<ul class="post-meta no-sep">
            <li class="post-data"><i class="fa fa-eye"></i><?php echo ($views); ?> <?php echo esc_html__('Views', 'cairo'); ?></li>
            <li class="post-data"><i class="fa fa-commenting-o"></i><?php cairo_post_comments_count(); ?></li>
					</ul>
				</div><!-- post-meta -->
        <?php } ?>

     </div>
   </article>
 <?php if($i % 6 == 1) {
 echo '</div></div>';
 }
 if($i % 6 == 0) {
 echo '</div></div>';
 } ?>
 <?php endwhile; else :
   get_template_part( '/inc/post-style/content-none');
 endif; ?>
