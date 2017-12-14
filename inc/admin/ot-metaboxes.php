<?php
// ==========================================================================================
// Codepages meta boxes functions theme
// @package Cairo
// @author Codepages - Codepages
// @link http://themeforest.net/user/codepages/portfolio
// ==========================================================================================

/**
 * Initialize the meta boxes.
 */
add_action( 'admin_init', 'codepages_custom_meta_boxes' );
/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types
 * in demo-theme-options.php.
 *
 * @return    void
 * @since     2.0
 */
function codepages_custom_meta_boxes() {

  /**
   * Create a custom meta boxes array that we pass to
   * the OptionTree Meta Box API Class.
   */

  $posts_meta_box = array(
    'id'          => 'posts_settings',
    'title'       => 'Post Settings',
    'pages'       => array( 'post' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'id'          => 'tab1',
        'label'       => 'General Settings',
        'type'        => 'tab'
      ),
      array(
        'id'          => 'post_featured_image_on_off',
        'label'       => 'Can turn off the image post',
        'desc'        => 'Can turn off the image post',
        'type'        => 'on_off',
        'std'         => 'off'
      ),
      array(
        'id'          => 'post_source_on_off',
        'label'       => 'Can turn off the post source',
        'desc'        => 'Can turn off the post source',
        'type'        => 'on_off',
        'std'         => 'off'
      ),
      array(
        'id'          => 'source_post',
        'label'       => esc_html__( 'Source Post', 'cairo' ),
        'desc'        => esc_html__( 'add post source.', 'cairo' ),
        'type'        => 'list-item',
        'settings'    => array(
          array(
            'label'       => 'Link',
            'type'        => 'text',
            'id'          => 'link_source',
            'desc'        => 'Value should be between 0-10',
          )
        ),
        'std'       => 'off',
        'condition' => 'post_source_on_off:is(on)',
      ),
      array(
        'label'       => 'Layout Sidebar',
        'desc'        => 'You can choose Layout Sidebar styles here for Full or Left or Right layout Sidebar.',
        'id'          => 'single_post_sidebar',
        'type'        => 'radio-image',
        'std'         => 'sidebar_right'
      ),


      //Standart
      array(
        'id'          => 'tab2',
        'label'       => 'Standard Post Layout',
        'type'        => 'tab'
      ),
      array(
        'label'       => 'Standard Post Layout',
        'desc'        => 'These layouts are used for "Standard" post format.',
        'id'          => 'standard-post-detail-style',
        'type'        => 'radio-image',
        'std'         => 'style1'
      ),

      //Gallery
      array(
        'id'          => 'tab3',
        'label'       => 'Gallery Post Layout',
        'type'        => 'tab'
      ),
      array(
        'label'       => 'Gallery Post Layout',
        'desc'        => 'These layouts are used for "Gallery" post format.',
        'id'          => 'gallery-post-detail-style',
        'type'        => 'radio-image',
        'std'         => 'style1'
      ),
       array(
        'id'        => 'gallery_posts',
        'label'     => __('Gallery', 'cairo'),
        'desc'      => '',
        'std'       => '',
        'type'      => 'gallery',
        'rows'      => '10',
        'post_type' => '',
        'taxonomy'  => '',
        'min_max_step'  => '',
        'class'     => '',
        'condition' => '',
        'operator'  => '',
       ),

      //Video
      array(
        'id'          => 'tab4',
        'label'       => 'Video Post Layout',
        'type'        => 'tab'
      ),
      array(
        'label'       => 'Video Post Layout',
        'desc'        => 'These layouts are used for "Video" post format.',
        'id'          => 'video-post-detail-style',
        'type'        => 'radio-image',
        'std'         => 'style1'
      ),
      array(
        'label'       => 'Style',
        'id'          => 'video_style',
        'type'        => 'radio',
        'choices'     => array(
          array(
            'label'       => 'Dark',
            'value'       => 'dark'
          ),
          array(
            'label'       => 'Light',
            'value'       => 'light'
          )
        ),
        'desc'        => 'You can choose between 2 color sets for the video layout.'
      ),
      array(
        'label'       => 'Video URL',
        'id'          => 'post_video',
        'type'        => 'text',
        'desc'        => 'Video URL. You can find a list of websites you can embed here: <a href="http://codex.wordpress.org/Embeds">WordPress Embeds</a>',
        'std'         => ''
      ),

      //Audio
      array(
        'id'          => 'tab5',
        'label'       => 'Audio Post Layout',
        'type'        => 'tab'
      ),
      array(
        'label'       => 'Audio Post Layout',
        'desc'        => 'These layouts are used for "Audio" post format.',
        'id'          => 'audio-post-detail-style',
        'type'        => 'radio-image',
        'std'         => ''
      ),
      array(
        'label'       => 'Style',
        'id'          => 'audio_style',
        'type'        => 'radio',
        'choices'     => array(
          array(
            'label'       => 'Dark',
            'value'       => 'dark'
          ),
          array(
            'label'       => 'Light',
            'value'       => 'light'
          )
        ),
        'desc'        => 'You can choose between 2 color sets for the audio layout.'
      ),
      array(
        'label'       => 'Audio URL',
        'id'          => 'post_audio',
        'type'        => 'text',
        'desc'        => 'Audio URL. You can find a list of websites you can embed here: <a href="http://codex.wordpress.org/Embeds">WordPress Embeds</a>',
        'std'         => ''
      ),

      //Review
      array(
        'id'          => 'tab6',
        'label'       => 'Review Settings',
        'type'        => 'tab'
      ),
      array(
        'id'          => 'review_post_on_off',
        'label'       => 'Review Post',
        'desc'        => 'You can Review this post',
        'type'        => 'on_off',
        'std'         => 'off'
      ),
      array(
        'label'       => 'Style',
        'id'          => 'review_style',
        'type'        => 'radio',
        'choices'     => array(
          array(
            'label'       => 'Dark',
            'value'       => 'dark'
          ),
          array(
            'label'       => 'Light',
            'value'       => 'light'
          )
        ),
        'desc'        => 'You can choose between 2 color sets for the review layout.',
        'condition'   => 'review_post_on_off:is(on)'
      ),
      array(
        'label'       => 'Review Title',
        'id'          => 'review_title',
        'type'        => 'text',
        'desc'        => 'Add your Review Title',
        'condition'   => 'review_post_on_off:is(on)',
        'std'         => ''
      ),
      array(
          'label'     => 'Review Description',
          'id'        => 'review_description',
          'desc'      => 'Add Your Review Description',
          'rows'      =>   '4',
          'condition' => 'review_post_on_off:is(on)',
          'type'      =>  'textarea-simple',
      ),
      array(
        'id'          => 'custom_review',
        'label'       => esc_html__( 'Review Ratings', 'cairo' ),
        'desc'        => esc_html__( 'Create custom sidebar to use on various layouts.', 'cairo' ),
        'type'        => 'list-item',
        'settings'    => array(
          array(
            'label'       => 'Score',
            'id'          => 'feature_score',
            'desc'        => 'Value should be between 0-10',
            'std'         => '5',
            'type'        => 'numeric-slider',
            'min_max_step'=> '0,10,1'
          )
        ),
        'condition'   => 'review_post_on_off:is(on)'
      ),
      array(
        'label'       => 'Ratings Score',
        'id'          => 'review_score',
        'type'        => 'text',
        'desc'        => 'Add your Ratings Score.',
        'condition'   => 'review_post_on_off:is(on)',
        'std'         => ''
      ),
      array(
        'id'          => 'custom_review_comment',
        'label'       => esc_html__( 'Review Comment', 'cairo' ),
        'desc'        => esc_html__( 'Create custom sidebar to use on various layouts.', 'cairo' ),
        'type'        => 'list-item',
        'settings'    => array(
          array(
            'label'       => 'Comment Type',
            'id'          => 'feature_comment_type',
            'type'        => 'radio',
            'desc'        => 'Is this a negative or a positive comment?',
            'choices'     => array(
              array(
                'label'       => 'Positive',
                'value'       => 'positive'
              ),
              array(
                'label'       => 'Negative',
                'value'       => 'negative'
              )
            ),
            'std'         => 'negative'
          ),
        ),
        'condition'   => 'review_post_on_off:is(on)'
      ),

    )
  );
  /**
   * Register our meta boxes using the
   * ot_register_meta_box() function.
   */
  ot_register_meta_box( $posts_meta_box );

  $page_meta_box = array(
    'id'          => 'page_settings',
    'title'       => 'Page Settings',
    'pages'       => array( 'page' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'id'          => 'page_padding',
        'label'       => 'Page Padding On/Off',
        'type'        => 'on_off',
        'std'         => 'on',
      ),
      array(
        'id'          => 'page_title',
        'label'       => 'Page Title On/Off',
        'type'        => 'on_off',
        'std'         => 'on',
      ),
      array(
        'id'          => 'page_title_color',
        'label'       => 'Page Title Color',
        'type'        => 'colorpicker',
        'std'         => '#ffffff',
        'condition'   => 'page_title:is(on)',
      ),
      array(
        'id'          => 'page_title_bg_color',
        'label'       => 'Page Title Background Color',
        'type'        => 'colorpicker',
        'std'         => '#000000',
        'condition'   => 'page_title:is(on)',
      ),
    )
  );
  /**
   * Register our meta boxes using the
   * ot_register_meta_box() function.
   */
  ot_register_meta_box( $page_meta_box );

}
