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
  'author'								=> $atts['author_ids'],
  'posts_per_page' 				=> $postcount,
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

  <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

    <?php if ($columnsection == 'style2') { ?>
      <div class="col-md-3 col-sm-12 col-xs-12">
    <?php } else { ?>
      <div class="col-md-4 col-sm-12 col-xs-12">
    <?php } ?>

     <article <?php post_class('post post-overlay'); ?> role="article">

       <figure class="post-image">
         <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
          <?php the_post_thumbnail('cairo-post-small-tow', array('itemprop'=>'image')); ?>
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
         <div class="post-meta-box">
           <ul class="post-meta no-sep">
             <li class="post-data"><i class="fa fa-commenting-o"></i><?php cairo_post_comments_count(); ?></li>
             <li class="post-data"><a href="<?php get_the_permalink() ?>"><i class="fa fa-clock-o"></i><?php the_time( get_option('date_format') ); ?></a></li>
           </ul>
         </div>
         <div class="post-title">
           <?php the_title('<h5 class="entry-title" itemprop="name headline"><a href="'.get_permalink().'" title="'.the_title_attribute("echo=0").'">', '</a></h5>'); ?>
         </div>

       </div>
       <?php if ($_POST['desdisplay']=='show') { ?>
         <div class="post-excerpt"><p><?php cairo_string_limit_words(get_the_excerpt(), 10) ?></p></div><!-- post-entry -->
       <?php } ?>


     </article>
   </div>

 <?php endwhile; else :
   get_template_part( '/inc/post-style/content-none');
 endif; ?>
