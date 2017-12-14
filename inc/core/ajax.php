<?php
// ==========================================================================================
// Codepages Ajax Function
// @package Cairo
// @author Codepages - Codepages
// @link http://themeforest.net/user/codepages/portfolio
// ==========================================================================================


//Video Ajax
add_action( 'wp_ajax_nopriv_ajax_video_pagination', 'my_ajax_video_pagination' );
add_action( 'wp_ajax_ajax_video_pagination', 'my_ajax_video_pagination' );

function my_ajax_video_pagination() {
  $style    = $_POST['style'];
  $bypostid = $_POST['postid'];

  $video_posts = array(
    'post_type'             =>'post',
    'post__in' => array($bypostid),
    'tax_query' => array(
	    array(
	        'taxonomy' => 'post_format',
	        'field' => 'slug',
	        'terms' => array(
	            'post-format-video'
	        ),
	        'operator' => 'IN'
	    )
		),
  );

?>


<?php
$query = new WP_Query( $video_posts );
if ($query->have_posts()) :  while ($query->have_posts()) : $query->the_post(); ?>

  <div class="loading-posts"></div>
  <div id="<?php get_the_ID(); ?>" class="video-wrapper">
    <?php
    global $wp_embed;
    $id = get_the_ID();
    $embed = get_post_meta( $id , 'post_video', TRUE);
    echo $wp_embed->run_shortcode('[embed]'.$embed.'[/embed]'); ?>
  </div>

<?php endwhile; else :
  get_template_part( '/inc/post-style/content-none');
endif; ?>


<?php die();

}


//Cat Ajax
add_action( 'wp_ajax_nopriv_ajax_cat_pagination', 'my_ajax_cat_pagination' );
add_action( 'wp_ajax_ajax_cat_pagination', 'my_ajax_cat_pagination' );

function my_ajax_cat_pagination() { ?>

<div class="loading-posts"></div>
<div class="custom-category-posts">
  <div class="row">
  <?php
  if ($_POST['style'] == 'style1') {
    get_template_part( '/inc/ajax/category-style1' );
  } elseif ($_POST['style'] == 'style3') {
    get_template_part( '/inc/ajax/category-style3' );
  } elseif ($_POST['style'] == 'style-4') {
    get_template_part( '/inc/ajax/category-style4' );
  }
  ?>
  </div>
</div>
<?php die();

}
