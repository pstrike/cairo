<?php
// ==========================================================================================
// Codepages Page Teamplate
// @package Cairo
// @author Codepages - Codepages
// @link http://themeforest.net/user/codepages/portfolio
// ==========================================================================================

get_header();
$page_setting = get_post_meta(get_the_ID(), 'page_title', true);
$page_padding = get_post_meta(get_the_ID(), 'page_padding', true) ? get_post_meta(get_the_ID(), 'page_padding', true) : 'on';
$page_title_colors = get_post_meta(get_the_ID(), 'page_title_color', true);
$page_title__bg_colors = get_post_meta(get_the_ID(), 'page_title_bg_color', true);
?>

<?php if ($page_padding != 'off') { $page_inner = 'inner-Pages'; } else { $page_inner = ''; } ?>
<?php if ($page_setting != 'off'): ?>
	<div class="page-main-title">
		<div class="container">
			<div class="page-title-content text-center">
				<h1><?php echo get_the_title(); ?></h1>
				<?php codepages_breadcrumb(); ?>
			</div>
		</div><!-- container -->
	</div>
<?php endif ?>
<?php  if (have_posts()) :  while (have_posts()) : the_post(); ?>
  <div class="main-content page-content">
    <div class="container <?php echo esc_attr($page_inner);?>">
      <?php the_content(); ?>
      <?php
      wp_link_pages( array(
      'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cairo' ),
      'after'  => '</div>',
      ) );
      ?>
      <?php
      if ( comments_open() || get_comments_number() ) {
      comments_template();
      }
      ?>
      <?php edit_post_link( esc_html__( 'Edit Page', 'cairo' ), '<span class="edit-link">', '</span>' ); ?>

    </div>
  </div>
  <?php endwhile; endif; ?>
<?php get_footer(); ?>
