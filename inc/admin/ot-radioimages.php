<?php
// ==========================================================================================
// Codepages option-tree functions theme
// @package Cairo
// @author Codepages - Codepages
// @link http://themeforest.net/user/codepages/portfolio
// ==========================================================================================

function cairo_radio_images( $array, $field_id ) {
	//POSTS SETTINGS
	if ( $field_id == 'standard-post-detail-style' ) {
	  $array = array(
	    array(
	      'value'   => 'style1',
	      'label'   => esc_html__( 'Single Style 1', 'cairo' ),
				'src'     => CAIRO_URL . '/assets/images/admin/single_post/cairo_standard_style_1.png'
	    ),
	    array(
	      'value'   => 'style2',
	      'label'   => esc_html__( 'Single Style 2', 'cairo' ),
				'src'     => CAIRO_URL . '/assets/images/admin/single_post/cairo_standard_style_2.png'
	    ),
	    array(
	      'value'   => 'style3',
	      'label'   => esc_html__( 'Single Style 3', 'cairo' ),
				'src'     => CAIRO_URL . '/assets/images/admin/single_post/cairo_standard_style_3.png'
	    ),
	    array(
	      'value'   => 'style4',
	      'label'   => esc_html__( 'Single Style 4', 'cairo' ),
				'src'     => CAIRO_URL . '/assets/images/admin/single_post/cairo_standard_style_4.png'
	    ),
	    array(
	      'value'   => 'style5',
	      'label'   => esc_html__( 'Single Style 5', 'cairo' ),
				'src'     => CAIRO_URL . '/assets/images/admin/single_post/cairo_standard_style_5.png'
	    ),
	    array(
	      'value'   => 'style6',
	      'label'   => esc_html__( 'Single Style 6', 'cairo' ),
				'src'     => CAIRO_URL . '/assets/images/admin/single_post/cairo_standard_style_6.png'
	    ),
	    array(
	      'value'   => 'style7',
	      'label'   => esc_html__( 'Single Style 7', 'cairo' ),
				'src'     => CAIRO_URL . '/assets/images/admin/single_post/cairo_standard_style_7.png'
	    ),
	    array(
	      'value'   => 'style8',
	      'label'   => esc_html__( 'Single Style 8', 'cairo' ),
				'src'     => CAIRO_URL . '/assets/images/admin/single_post/cairo_standard_style_8.png'
	    ),
	    array(
	      'value'   => 'style9',
	      'label'   => esc_html__( 'Single Style 9', 'cairo' ),
				'src'     => CAIRO_URL . '/assets/images/admin/single_post/cairo_standard_style_9.png'
	    )

	  );
	}
	//SLIDER SINGLE POST SETTINGS
	if ( $field_id == 'single_post_sidebar' ) {
		$array = array(
      array(
        'value'   => 'sidebar_wide',
        'label'   => esc_html__( 'Sidebar Full', 'cairo' ),
        'src'     => CAIRO_URL . 'assets/images/admin/home_layout/cairo_sidebar_fullwidth.png'
      ),
      array(
        'value'   => 'sidebar_left',
        'label'   => esc_html__( 'Sidebar Left', 'cairo' ),
        'src'     => CAIRO_URL . 'assets/images/admin/home_layout/cairo_sidebar_left.png'
      ),
      array(
        'value'   => 'sidebar_right',
        'label'   => esc_html__( 'Sidebar Right', 'cairo' ),
        'src'     => CAIRO_URL . 'assets/images/admin/home_layout/cairo_sidebar_right.png'
      ),
    );
	}
	//Slider Layout
  if ( $field_id == 'slider_layout_style' ) {
	  $array = array(
	    array(
	      'value'   => 'style1',
	      'label'   => esc_html__( 'Slider Layout Style 1', 'cairo' ),
	      'src'     => CAIRO_URL . '/assets/images/admin/slider-posts/cairo-featured-style-1.png'
	    ),
	    array(
	      'value'   => 'style2',
	      'label'   => esc_html__( 'Slider Layout Style 2', 'cairo' ),
	      'src'     => CAIRO_URL . '/assets/images/admin/slider-posts/cairo-featured-style-2.png'
	    ),
	    array(
	      'value'   => 'style3',
	      'label'   => esc_html__( 'Slider Layout Style 3', 'cairo' ),
	      'src'     => CAIRO_URL . '/assets/images/admin/slider-posts/cairo-featured-style-3.png'
	    ),
	    array(
	      'value'   => 'style4',
	      'label'   => esc_html__( 'Slider Layout Style 4', 'cairo' ),
	      'src'     => CAIRO_URL . '/assets/images/admin/slider-posts/cairo-featured-style-4.png'
	    ),
	    array(
	      'value'   => 'style5',
	      'label'   => esc_html__( 'Slider Layout Style 5', 'cairo' ),
	      'src'     => CAIRO_URL . '/assets/images/admin/slider-posts/cairo-featured-style-5.png'
	    ),
	    array(
	      'value'   => 'style6',
	      'label'   => esc_html__( 'Slider Layout Style 6', 'cairo' ),
	      'src'     => CAIRO_URL . '/assets/images/admin/slider-posts/cairo-featured-style-6.png'
	    ),
	    array(
	      'value'   => 'style7',
	      'label'   => esc_html__( 'Slider Layout Style 7', 'cairo' ),
	      'src'     => CAIRO_URL . '/assets/images/admin/slider-posts/cairo-featured-style-7.png'
	    ),
	    array(
	      'value'   => 'style8',
	      'label'   => esc_html__( 'Slider Layout Style 8', 'cairo' ),
	      'src'     => CAIRO_URL . '/assets/images/admin/slider-posts/cairo-featured-style-8.png'
	    ),
	  );
	}
	//Gallery Style
  if ( $field_id == 'gallery-post-detail-style' ) {
    $array = array(
      array(
        'value'   => 'style1',
        'label'   => esc_html__( 'Gallery Style Images', 'cairo' ),
        'src'     => CAIRO_URL . '/assets/images/admin/single_post/cairo_gallery_style_2.png'
      ),
      array(
        'value'   => 'style2',
        'label'   => esc_html__( 'Gallery Style Slider', 'cairo' ),
        'src'     => CAIRO_URL . '/assets/images/admin/single_post/cairo_gallery_style_1.png'
      )
    );
	}
	//Large Video
	if ( $field_id == 'video-post-detail-style' ) {
	  $array = array(
	    array(
	      'value'   => 'style1',
	      'label'   => esc_html__( 'Video Player Style1', 'cairo' ),
	      'src'     => CAIRO_URL . '/assets/images/admin/single_post/cairo_video_style_1.png'
	    ),
	    array(
	      'value'   => 'style2',
	      'label'   => esc_html__( 'Video Player Style2', 'cairo' ),
	      'src'     => CAIRO_URL . '/assets/images/admin/single_post/cairo_video_style_2.png'
	    ),
	    array(
	      'value'   => 'style3',
	      'label'   => esc_html__( 'Video Player Style3', 'cairo' ),
	      'src'     => CAIRO_URL . '/assets/images/admin/single_post/cairo_video_style_3.png'
	    ),
	  );
	}
	//Large Video
	if ( $field_id == 'audio-post-detail-style' ) {
	  $array = array(
	    array(
	      'value'   => 'style1',
	      'label'   => esc_html__( 'Audio Player Style1', 'cairo' ),
	      'src'     => CAIRO_URL . '/assets/images/admin/single_post/cairo_audio_style_1.png'
	    ),
	    array(
	      'value'   => 'style2',
	      'label'   => esc_html__( 'Audio Player Style2', 'cairo' ),
	      'src'     => CAIRO_URL . '/assets/images/admin/single_post/cairo_audio_style_2.png'
	    ),
	  );
	}

	//Layout Posts Style
	if ( $field_id == 'blog_layout_style' ) {
    $array = array(
      array(
        'value'   => 'style1',
        'label'   => esc_html__( 'Blog Style 1', 'cairo' ),
        'src'     => CAIRO_URL . '/assets/images/admin/blog_style/cairo_post_style_1.png'
      ),
      array(
        'value'   => 'style2',
        'label'   => esc_html__( 'Blog Style 2', 'cairo' ),
        'src'     => CAIRO_URL . '/assets/images/admin/blog_style/cairo_post_style_2.png'
      ),
      array(
        'value'   => 'style3',
        'label'   => esc_html__( 'Blog Style 3', 'cairo' ),
        'src'     => CAIRO_URL . '/assets/images/admin/blog_style/cairo_post_style_3.png'
      ),
      array(
        'value'   => 'style4',
        'label'   => esc_html__( 'Blog Style 4', 'cairo' ),
        'src'     => CAIRO_URL . '/assets/images/admin/blog_style/cairo_post_style_4.png'
      ),
      array(
        'value'   => 'style5',
        'label'   => esc_html__( 'Blog Style 5', 'cairo' ),
        'src'     => CAIRO_URL . '/assets/images/admin/blog_style/cairo_post_style_5.png'
      ),
      array(
        'value'   => 'style6',
        'label'   => esc_html__( 'Blog Style 6', 'cairo' ),
        'src'     => CAIRO_URL . '/assets/images/admin/blog_style/cairo_post_style_6.png'
      ),
      array(
        'value'   => 'style7',
        'label'   => esc_html__( 'Blog Style 7', 'cairo' ),
        'src'     => CAIRO_URL . '/assets/images/admin/blog_style/cairo_post_style_7.png'
      )
    );
	}
	if ( $field_id == 'layout_home_style' ) {
    $array = array(
      array(
        'value'   => 'wide_layout',
        'label'   => esc_html__( 'Wide', 'cairo' ),
        'src'     => CAIRO_URL . 'assets/images/admin/home_layout/cairo_homepage_fullwidth.png'
      ),
      array(
        'value'   => 'boxed_layout',
        'label'   => esc_html__( 'Boxed', 'cairo' ),
        'src'     => CAIRO_URL . 'assets/images/admin/home_layout/cairo_homepage_boxed.png'
      ),
      array(
        'value'   => 'border_layout',
        'label'   => esc_html__( 'Border', 'cairo' ),
        'src'     => CAIRO_URL . 'assets/images/admin/home_layout/cairo_homepage_border.png'
      ),
    );
	}
	//Breaking News Style
	if ( $field_id == 'breaking_style' ) {
    $array = array(
      array(
        'value'   => 'style1',
        'label'   => esc_html__( 'Breaking Style 1', 'cairo' ),
        'src'     => CAIRO_URL . 'assets/images/admin/breaking_news/cairo_breaking_news_1.png'
      ),
      array(
        'value'   => 'style2',
        'label'   => esc_html__( 'Breaking Style 2', 'cairo' ),
        'src'     => CAIRO_URL . 'assets/images/admin/breaking_news/cairo_breaking_news_2.png'
      ),
    );
	}
	if ( $field_id == 'footer_style' ) {
    $array = array(
      array(
        'value'   => 'style1',
        'label'   => esc_html__( 'Footer Style 1', 'cairo' ),
        'src'     => CAIRO_URL . 'assets/images/admin/footer_column/cairo_footer_style1.png'
      ),
      array(
        'value'   => 'style2',
        'label'   => esc_html__( 'Footer Style 2', 'cairo' ),
        'src'     => CAIRO_URL . 'assets/images/admin/footer_column/cairo_footer_style2.png'
      ),
      array(
        'value'   => 'style3',
        'label'   => esc_html__( 'Footer Style 3', 'cairo' ),
        'src'     => CAIRO_URL . 'assets/images/admin/footer_column/cairo_footer_style3.png'
      ),
    );
	}
	if ( $field_id == 'footer_top_area' ) {
    $array = array(
      array(
        'value'   => 'onecolumns',
        'label'   => esc_html__( 'Footer Top Widget 1Column', 'cairo' ),
        'src'     => CAIRO_URL . 'assets/images/admin/footer_column/cairo_footer_1column.png'
      ),
      array(
        'value'   => 'towcolumns',
        'label'   => esc_html__( 'Footer Top Widget 2Column', 'cairo' ),
				'src'     => CAIRO_URL . 'assets/images/admin/footer_column/cairo_footer_2column.png'
      ),
      array(
        'value'   => 'threecolumns',
        'label'   => esc_html__( 'Footer Top Widget 3Column', 'cairo' ),
				'src'     => CAIRO_URL . 'assets/images/admin/footer_column/cairo_footer_3column.png'
      ),
      array(
        'value'   => 'fourcolumns',
        'label'   => esc_html__( 'Footer Top Widget 4Column', 'cairo' ),
				'src'     => CAIRO_URL . 'assets/images/admin/footer_column/cairo_footer_4column.png'
      ),
    );
	}
	if ( $field_id == 'footer_bottom_area' ) {
    $array = array(
      array(
        'value'   => 'onecolumns',
        'label'   => esc_html__( 'Footer Bottom Widget 1Column', 'cairo' ),
				'src'     => CAIRO_URL . 'assets/images/admin/footer_column/cairo_footer_1column.png'
      ),
      array(
        'value'   => 'towcolumns',
        'label'   => esc_html__( 'Footer Bottom Widget 2Column', 'cairo' ),
				'src'     => CAIRO_URL . 'assets/images/admin/footer_column/cairo_footer_2column.png'
      ),
      array(
        'value'   => 'threecolumns',
        'label'   => esc_html__( 'Footer Bottom Widget 3Column', 'cairo' ),
				'src'     => CAIRO_URL . 'assets/images/admin/footer_column/cairo_footer_3column.png'
      ),
      array(
        'value'   => 'fourcolumns',
        'label'   => esc_html__( 'Footer Bottom Widget 4Column', 'cairo' ),
				'src'     => CAIRO_URL . 'assets/images/admin/footer_column/cairo_footer_4column.png'
      ),
    );
	}
	if ( $field_id == 'layout_sidebar' ) {
    $array = array(
      array(
        'value'   => 'sidebar_wide',
        'label'   => esc_html__( 'Sidebar Full', 'cairo' ),
        'src'     => CAIRO_URL . 'assets/images/admin/home_layout/cairo_sidebar_fullwidth.png'
      ),
      array(
        'value'   => 'sidebar_left',
        'label'   => esc_html__( 'Sidebar Left', 'cairo' ),
        'src'     => CAIRO_URL . 'assets/images/admin/home_layout/cairo_sidebar_left.png'
      ),
      array(
        'value'   => 'sidebar_right',
        'label'   => esc_html__( 'Sidebar Right', 'cairo' ),
        'src'     => CAIRO_URL . 'assets/images/admin/home_layout/cairo_sidebar_right.png'
      ),
    );
	}
	if ( $field_id == 'layout_sidebar_shop' ) {
    $array = array(
      array(
        'value'   => 'sidebar_wide',
        'label'   => esc_html__( 'Sidebar Full', 'cairo' ),
        'src'     => CAIRO_URL . 'assets/images/admin/home_layout/cairo_sidebar_fullwidth.png'
      ),
      array(
        'value'   => 'sidebar_left',
        'label'   => esc_html__( 'Sidebar Left', 'cairo' ),
        'src'     => CAIRO_URL . 'assets/images/admin/home_layout/cairo_sidebar_left.png'
      ),
      array(
        'value'   => 'sidebar_right',
        'label'   => esc_html__( 'Sidebar Right', 'cairo' ),
        'src'     => CAIRO_URL . 'assets/images/admin/home_layout/cairo_sidebar_right.png'
      ),
    );
	}
	if ( $field_id == 'header_style' ) {
    $array = array(
      array(
        'value'   => 'style1',
        'label'   => esc_html__( 'Header Style 1', 'cairo' ),
        'src'     => CAIRO_URL . '/assets/images/admin/header_style/cairo_header_style_1.png'
      ),
      array(
        'value'   => 'style2',
        'label'   => esc_html__( 'Header Style 2', 'cairo' ),
				'src'     => CAIRO_URL . '/assets/images/admin/header_style/cairo_header_style_2.png'
      ),
      array(
        'value'   => 'style3',
        'label'   => esc_html__( 'Header Style 3', 'cairo' ),
				'src'     => CAIRO_URL . '/assets/images/admin/header_style/cairo_header_style_3.png'
      ),
      array(
        'value'   => 'style4',
        'label'   => esc_html__( 'Header Style 4', 'cairo' ),
				'src'     => CAIRO_URL . '/assets/images/admin/header_style/cairo_header_style_4.png'
      ),
      array(
        'value'   => 'style5',
        'label'   => esc_html__( 'Header Style 5', 'cairo' ),
				'src'     => CAIRO_URL . '/assets/images/admin/header_style/cairo_header_style_5.png'
      ),
    );
	}
	if ( $field_id == 'cairo-demo' ) {
	  $array = array(
	    array(
	      'value'   => 'cairofashion',
	      'label'   => esc_html__( 'cairo', 'cairo' ),
	      'src'     => CAIRO_URL . '/assets/images/demo/cairofashion.jpg'
	    ),
	  );
	}
  return $array;

}
add_filter( 'ot_radio_images', 'cairo_radio_images', 10, 2 );

function cairo_options_name() {
	return esc_html__('Codepages Theme', 'cairo');
}
add_filter( 'ot_header_version_text', 'cairo_options_name', 10, 2 );


function cairo_upload_name() {
	return esc_html__('Send to Theme Options', 'cairo');
}
add_filter( 'ot_upload_text', 'cairo_upload_name', 10, 2 );
