<?php
// ==========================================================================================
// Codepages Custom Theme Options
// @package Cairo
// @author Codepages - Codepages
// @link http://themeforest.net/user/codepages/portfolio
// ==========================================================================================

/**
 * Initialize the custom Theme Options.
 */
add_action( 'init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 *
 * @return    void
 * @since     2.0
 */
function custom_theme_options() {

  /* OptionTree is not loaded yet, or this is not an admin request */
  if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() )
    return false;

  /**
   * Get a copy of the saved settings array.
   */
  $saved_settings = get_option( ot_settings_id(), array() );

  /**
   * Custom settings array that will eventually be
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array(
    'contextual_help' => array(
      'content'       => array(
        array(
          'id'        => 'option_types_help',
          'title'     => __( 'Header Settings', 'cairo' ),
          'content'   => '<p>' . __( 'Help content goes here!', 'cairo' ) . '</p>'
        )
      ),
      'sidebar'       => '<p>' . __( 'Sidebar content goes here!', 'cairo' ) . '</p>'
    ),
    // SECTION START
    'sections'        => array(
      array(
        'title'       => '<i class="ti ti-settings"></i> '.esc_html__( 'General Settings', 'cairo' ),
        'id'          => 'general'
      ),
      array(
        'title'       => '<i class="ti ti-layout-media-center"></i> '.esc_html__( 'Header Options', 'cairo' ),
        'id'          => 'header'
      ),
      // array(
      //   'title'       => '<i class="ti ti-layout-slider-alt"></i> '.esc_html__( 'Featured Posts', 'cairo' ),
      //   'id'          => 'featuredslider'
      // ),
      array(
        'title'       => '<i class="ti ti-layout-list-thumb-alt"></i> '.esc_html__( 'Sidebar Settings', 'cairo' ),
        'id'          => 'sidebar'
      ),
      array(
        'title'       => '<i class="ti ti-shopping-cart"></i> '.esc_html__( 'Shop', 'cairo' ),
        'id'          => 'shop'
      ),
      array(
        'title'       => '<i class="ti ti-layout-media-overlay-alt"></i> '.esc_html__( 'Footer Options', 'cairo' ),
        'id'          => 'footer'
      ),
      array(
        'title'       => '<i class="ti ti-text"></i> '.esc_html__( 'Typography Settings', 'cairo' ),
        'id'          => 'typography'
      ),
      array(
        'title'       => '<i class="ti ti-paint-roller"></i> '.esc_html__( 'Theme Styling', 'cairo' ),
        'id'          => 'styling'
      ),
      array(
        'title'       => '<i class="ti ti-sharethis"></i> '.esc_html__( 'Social Media', 'cairo' ),
        'id'          => 'social'
      ),
      array(
        'title'       => '<i class="ti ti-layout-media-left-alt"></i> '.esc_html__( 'Single Blog', 'cairo' ),
        'id'          => 'blog'
      ),
      array(
        'title'       => '<i class="ti ti-announcement"></i> '.esc_html__( 'Ads Options', 'cairo' ),
        'id'          => 'ads'
      ),
    ),
    // SECTION END

    // SETTINGS HEADER START
    'settings'        => array(

          // GENERAL SETTINGS
          array(
            'label'       => 'Layout Blog Post',
            'id'          => 'blog_layout_style',
            'type'        => 'radio-image',
            'desc'        => 'You can choose different Blog layout styles here for archive, author etc. page',
            'std'         => 'style1',
            'section'     => 'general'
          ),
          array(
            'label'       => 'Layout Homepage',
            'id'          => 'layout_home_style',
            'type'        => 'radio-image',
            'desc'        => 'You can choose different Layout Homepage styles here for Boxed or wide or border layout homepage .',
            'std'         => 'wide_layout',
            'section'     => 'general'
          ),
          array(
            'label'       => 'Boxed Background Color',
            'id'          => 'general_boxed_bg_color',
            'type'        => 'colorpicker',
            'desc'        => 'Boxed version for background color',
            'section'     => 'general',
            'condition'   => 'layout_home_style:is(boxed_layout)'
          ),
          array(
            'label'       => 'Boxed Image',
            'id'          => 'general_boxed_bg_image',
            'type'        => 'background',
            'desc'        => 'Boxed version for background image',
            'section'     => 'general',
            'std'         => '',
            'condition'   => 'layout_home_style:is(boxed_layout)'
          ),
          array(
            'label'       => 'Border layout Color',
            'id'          => 'general_border_bg_color',
            'type'        => 'colorpicker',
            'desc'        => 'Border version for background color',
            'section'     => 'general',
            'condition'   => 'layout_home_style:is(border_layout)'
          ),
          array(
            'label'       => 'Scroll to top button',
            'id'          => 'page_scroll_up',
            'type'        => 'on_off',
            'desc'        => 'Enabled or Disabled Scroll To Top.',
            'std'         => 'on',
            'section'     => 'general'
          ),
          //HEADER SETTINGS
          array(
            'id'          => 'header_tab1',
            'label'       => 'Header Layout',
            'type'        => 'tab',
            'section'     => 'header'
          ),
          array(
            'label'       => 'Header Style',
            'id'          => 'header_style',
            'type'        => 'radio-image',
            'desc'        => 'You can choose different header styles here',
            'std'         => 'style1',
            'section'     => 'header'
          ),
          array(
              'label'       => 'Header Dark or Light Style',
              'id'          => 'header_dark_light',
              'type'        => 'radio',
              'desc'        => 'You can choose different color footer style here',
              'choices'     => array(
                  array (
                      'label'     => 'Dark',
                      'value'     => 'dark'
                  ),
                  array (
                      'label'     => 'Light',
                      'value'     => 'light'
                  ),
              ),
              'std'         => 'light',
              'section'     => 'header'
          ),
          array(
            'label'       => 'Show Date',
            'id'          => 'data_top_menu',
            'desc'        => 'Enable/disable the theme login modal. (default is disabled)',
            'type'        => 'on_off',
            'section'     => 'header',
            'std'         => 'off',
          ),
          array(
            'label'         => 'Date Format',
            'id'            => 'data_time_format',
            'type'          => 'text',
            'desc'          => 'Default value: l, F j, Y. Read more about the (its the same with the php date function).',
            'condition'     => 'data_top_menu:is(on)',
            'section'       => 'header',
          ),
          array(
            'id'          => 'header_tab2',
            'label'       => 'Header Style',
            'type'        => 'tab',
            'section'     => 'header'
          ),
          array(
            'label'       => 'Top Header ON/OFF',
            'id'          => 'top_header_hide_show',
            'type'        => 'on_off',
            'desc'        => 'Enabled or Disabled Top Header.',
            'std'         => 'on',
            'section'     => 'header'
          ),
          array(
            'label'         => 'Top Header Background Color',
            'id'            => 'top_header_background_color',
            'type'          => 'colorpicker',
            'desc'          => 'Background color for top header',
            'section'       => 'header',
            'condition'     => 'top_header_hide_show:is(on)'
          ),
          array(
            'label'         => 'Top Header Text Color',
            'id'            => 'top_header_text_color',
            'type'          => 'colorpicker',
            'desc'          => 'Text color for top header',
            'section'       => 'header',
            'condition'     => 'top_header_hide_show:is(on)'
          ),
          array(
            'label'         => 'Top Header Border Color',
            'id'            => 'top_header_border_color',
            'type'          => 'colorpicker-opacity',
            'desc'          => 'Border color for top header',
            'section'       => 'header',
            'condition'     => 'top_header_hide_show:is(on)'
          ),
          array(
            'label'         => 'Top Header Text Hover Color',
            'id'            => 'top_header_text_hover_color',
            'type'          => 'colorpicker',
            'desc'          => 'Text hover color for top header',
            'section'       => 'header',
            'condition'     => 'top_header_hide_show:is(on)'
          ),
          array(
            'label'         => 'Header Menu Background Color',
            'id'            => 'header_menu_background_color',
            'type'          => 'colorpicker',
            'desc'          => 'Header Menu Background Color',
            'section'       => 'header',
            'condition'     => 'header_style:is(style2)'
          ),
          array(
            'label'         => 'Header Menu Text Color',
            'id'            => 'header_menu_text_color',
            'type'          => 'colorpicker',
            'desc'          => 'Header Menu Background Color',
            'section'       => 'header',
            'condition'     => 'header_style:is(style2)'
          ),
          array(
            'label'         => 'Header Menu Background Hover Color',
            'id'            => 'header_menu_background_h_color',
            'type'          => 'colorpicker',
            'desc'          => 'Header Menu Background Hover Color',
            'section'       => 'header',
            'condition'     => 'header_style:is(style2)'
          ),
          array(
            'label'         => 'Header Menu Text Hover Color',
            'id'            => 'header_menu_text_h_color',
            'type'          => 'colorpicker',
            'desc'          => 'Header Menu Text Hover Color',
            'section'       => 'header',
            'condition'     => 'header_style:is(style2)'
          ),
          array(
            'label'         => 'Menu Header Background Color',
            'id'            => 'menu_header_background_color',
            'type'          => 'colorpicker',
            'desc'          => 'Background color for menu header',
            'section'       => 'header',
            'condition'     => 'header_style:is(style1)'
          ),
          array(
            'label'         => 'Menu Header Text Color',
            'id'            => 'menu_header_text_color',
            'type'          => 'colorpicker',
            'desc'          => 'Text color for menu header',
            'section'       => 'header',
            'condition'     => 'header_style:is(style1)'
          ),
          array(
            'label'         => 'Menu Header Text Hover Color',
            'id'            => 'menu_header_text_hover_color',
            'type'          => 'colorpicker',
            'desc'          => 'Text color for menu header',
            'section'       => 'header',
            'condition'     => 'header_style:is(style1)'
          ),
          array(
            'label'         => 'Menu Header Border Color',
            'id'            => 'menu_header_border_color',
            'type'          => 'colorpicker-opacity',
            'desc'          => 'Border color for menu header',
            'section'       => 'header',
            'condition'     => 'header_style:is(style1)'
          ),
          array(
            'label'         => 'Header Background Image',
            'id'            => 'header_background_image',
            'type'          => 'background',
            'desc'          => 'Header for background image',
            'section'       => 'header',
            'condition'     => 'header_style:is(style5)'
          ),
          array(
            'label'         => 'Menu Header Background Color',
            'id'            => 'menu_header_bg_color_5',
            'type'          => 'colorpicker',
            'desc'          => 'Background color for menu header',
            'section'       => 'header',
            'condition'     => 'header_style:is(style5)'
          ),
          array(
            'label'         => 'Menu Header Text Color',
            'id'            => 'menu_header_txet_color_5',
            'type'          => 'colorpicker',
            'desc'          => 'Text color for menu header',
            'section'       => 'header',
            'condition'     => 'header_style:is(style5)'
          ),
          array(
            'label'         => 'Menu Header Border Color',
            'id'            => 'menu_header_bo_color_5',
            'type'          => 'colorpicker-opacity',
            'desc'          => 'Border color for menu header',
            'section'       => 'header',
            'condition'     => 'header_style:is(style5)'
          ),


          array(
            'id'          => 'header_tab3',
            'label'       => 'Upload Logo',
            'type'        => 'tab',
            'section'     => 'header'
          ),
          array(
            'label'       => 'Logo Upload',
            'id'          => 'logo',
            'type'        => 'upload',
            'desc'        => 'You can upload your own logo here. Since this theme is retina-ready, <strong>please upload a double size image.</strong>',
            'section'     => 'header',
            'std'         => CAIRO_URL . 'assets/images/logo/cairo-logo.png',
          ),
          array(
            'label'       => 'Sidebar Menu Logo Upload',
            'id'          => 'sidebar-logo',
            'type'        => 'upload',
            'desc'        => 'You can upload your own logo here. Since this theme is retina-ready, <strong>please upload a double size image.</strong>',
            'section'     => 'header'
          ),
          array(
            'label'       => 'Header Search Area Logo Upload',
            'id'          => 'search-logo',
            'type'        => 'upload',
            'desc'        => 'You can upload your own logo here. Since this theme is retina-ready, <strong>please upload a double size image.</strong>',
            'section'     => 'header'
          ),
          array(
            'label'       => 'Header Sticky Menu Logo Upload',
            'id'          => 'sticky-logo',
            'type'        => 'upload',
            'desc'        => 'You can upload your own logo here. Since this theme is retina-ready, <strong>please upload a double size image.</strong>',
            'section'     => 'header'
          ),
          array(
            'label'       => 'Favico Upload',
            'id'          => 'logo-favico',
            'type'        => 'upload',
            'desc'        => 'You can upload your own favico here.',
            'section'     => 'header'
          ),
          array(
            'label'         => 'Logo Height',
            'id'            => 'logo_height',
            'type'          => 'text',
            'desc'          => 'Default: 70. Upload retina logo (2x size) and input your regular logo height here. For example if your retina logo have 200px height put 100 value here. If you does not use retina logo input regular logo height here (your logo image height).',
            'std'           => '70',
            'section'       => 'header',
          ),
          array(
            'label'         => 'Logo Padding Top',
            'id'            => 'logo_padding_top',
            'type'          => 'measurement',
            'desc'          => 'Default Padding 40.',
            'std'           => '40',
            'section'       => 'header',
          ),
          array(
            'label'         => 'Logo Padding Bottom',
            'id'            => 'logo_padding_bottom',
            'type'          => 'measurement',
            'desc'          => 'Default Padding 40.',
            'std'           => '40',
            'section'       => 'header',
          ),
          array(
            'id'          => 'header_tab4',
            'label'       => 'Header Sticky',
            'type'        => 'tab',
            'section'     => 'header'
          ),
          array(
            'label'       => 'Header Sticky',
            'id'          => 'sticky_menu',
            'desc'        => 'You can on/off the sticky header',
            'type'        => 'on_off',
            'section'     => 'header',
            'std'         => 'off',
          ),
          array(
              'label'       => 'Header Sticky Dark or Light Style',
              'id'          => 'header_sticky_menu_dark_light',
              'type'        => 'radio',
              'desc'        => 'You can choose different color footer style here',
              'choices'     => array(
                  array (
                      'label'     => 'Dark',
                      'value'     => 'dark'
                  ),
                  array (
                      'label'     => 'Light',
                      'value'     => 'light'
                  ),
              ),
              'std'         => 'light',
              'condition'     => 'sticky_menu:is(on)',
              'section'     => 'header'
          ),
          array(
            'label'         => 'Menu Header Sticky Background Color',
            'id'            => 'menu_header_sticky_background_color',
            'type'          => 'colorpicker',
            'desc'          => 'Background color for menu header',
            'section'       => 'header',
          ),
          array(
            'label'         => 'Menu Header Sticky Text Color',
            'id'            => 'menu_header_sticky_text_color',
            'type'          => 'colorpicker',
            'desc'          => 'Text color for menu header',
            'section'       => 'header',
          ),
          array(
            'label'         => 'Menu Header Sticky Text Hover Color',
            'id'            => 'menu_header_sticky_text_hover_color',
            'type'          => 'colorpicker',
            'desc'          => 'Text color for menu header',
            'section'       => 'header',
          ),
          array(
            'label'         => 'Menu Header Sticky Text Hover Background Color',
            'id'            => 'menu_header_sticky_text_hover_backgroundcolor',
            'type'          => 'colorpicker',
            'desc'          => 'Text color for menu header',
            'section'       => 'header',
          ),

          // SIDEBAR SETTINGS
          array(
            'id'          => 'sidebar_tab1',
            'label'       => 'Layout Sidebar',
            'type'        => 'tab',
            'section'     => 'sidebar'
          ),
          array(
            'label'       => 'Layout Sidebar',
            'id'          => 'layout_sidebar',
            'type'        => 'radio-image',
            'desc'        => 'You can choose Layout Sidebar styles here for Full or Left or Right layout Sidebar.',
            'std'         => 'sidebar_right',
            'section'     => 'sidebar'
          ),
          array(
              'label'       => 'Sidebar Block Style',
              'id'          => 'sidebar_style',
              'type'        => 'radio',
              'desc'        => 'You can choose different style sidebar style here',
              'choices'     => array(
                  array (
                      'label'     => 'Style 1',
                      'value'     => 'style1'
                  ),
                  array (
                      'label'     => 'Style 2',
                      'value'     => 'style2'
                  ),
                  array (
                      'label'     => 'Style 3',
                      'value'     => 'style3'
                  ),
                  array (
                      'label'     => 'Style 4',
                      'value'     => 'style4'
                  ),
                  array (
                      'label'     => 'Style 5',
                      'value'     => 'style5'
                  ),
                  array (
                      'label'     => 'Style 6',
                      'value'     => 'style6'
                  ),
                  array (
                      'label'     => 'Style 7',
                      'value'     => 'style7'
                  ),
              ),
              'std'         => 'style1',
              'section'     => 'sidebar'
          ),
          array(
            'id'          => 'sidebar_tab2',
            'label'       => 'Style Sidebar',
            'type'        => 'tab',
            'section'     => 'sidebar'
          ),
          array(
            'id'          => 'bg_sidebar_color',
            'label'       => 'Main Sidebar Background Color',
            'desc'        => 'Main Sidebar Background color, default : #FFF',
            'type'        => 'colorpicker',
            'section'     => 'sidebar',
          ),
          array(
            'id'          => 'text_sidebar_color',
            'label'       => 'Main Sidebar Text Color',
            'desc'        => 'Main Sidebar Text color, default : #FFF',
            'type'        => 'colorpicker',
            'section'     => 'sidebar',
          ),
          array(
            'id'          => 'bg_text_sidebar_color',
            'label'       => 'Main Sidebar Background Text Color',
            'desc'        => 'Main Sidebar Background Text color, default : #FFF',
            'type'        => 'colorpicker',
            'section'     => 'sidebar',
            'condition'   => 'sidebar_style:is(style2)',
          ),
          array(
            'id'          => 'border_sidebar_color',
            'label'       => 'Main Sidebar Border Color',
            'desc'        => 'Main Sidebar Border color, default : #FFF',
            'type'        => 'colorpicker',
            'section'     => 'sidebar',
            'condition'   => 'sidebar_style:is(style2)',
          ),
          array(
            'id'          => 'border_sidebar_color_6',
            'label'       => 'Main Sidebar Border Color',
            'desc'        => 'Main Sidebar Border color, default : #FFF',
            'type'        => 'colorpicker',
            'section'     => 'sidebar',
            'condition'   => 'sidebar_style:is(style6)',
          ),
          array(
            'id'          => 'border_sidebar_color_7',
            'label'       => 'Main Sidebar Border Color',
            'desc'        => 'Main Sidebar Border color, default : #FFF',
            'type'        => 'colorpicker',
            'section'     => 'sidebar',
            'condition'   => 'sidebar_style:is(style7)',
          ),
          array(
            'id'          => 'sidebar_tab3',
            'label'       => 'Custom Sidebar',
            'type'        => 'tab',
            'section'     => 'sidebar'
          ),
          array(
    				'id'          => 'custom_sidebars',
    				'label'       => esc_html__( 'Sidebars', 'cairo' ),
    				'desc'        => esc_html__( 'Create custom sidebar to use on various layouts.', 'cairo' ),
    				'type'        => 'list-item',
    				'section'     => 'sidebar',
    				'settings'    => array()
    			),

          // SOCIAL SETTINGS
          array(
            'id'          => 'social_tab1',
            'label'       => 'Social Links',
            'type'        => 'tab',
            'section'     => 'social'
          ),
          array(
            'label'       => 'Facebook Link',
            'id'          => 'fb_link',
            'type'        => 'text',
            'desc'        => 'Facebook profile/page link',
            'section'     => 'social'
          ),
          array(
            'label'       => 'Twitter Link',
            'id'          => 'twitter_link',
            'type'        => 'text',
            'desc'        => 'Twitter profile/page link',
            'section'     => 'social'
          ),
          array(
            'label'       => 'Dribble Link',
            'id'          => 'dribble_link',
            'type'        => 'text',
            'desc'        => 'Dribble profile/page link',
            'section'     => 'social'
          ),
          array(
            'label'       => 'Linkden Link',
            'id'          => 'linkden_link',
            'type'        => 'text',
            'desc'        => 'Linkden profile/page link',
            'section'     => 'social'
          ),
          array(
            'label'       => 'Flicker Link',
            'id'          => 'flicker_link',
            'type'        => 'text',
            'desc'        => 'Flicker profile/page link',
            'section'     => 'social'
          ),
          array(
            'label'       => 'Tumblr Link',
            'id'          => 'tumblr_link',
            'type'        => 'text',
            'desc'        => 'Tumblr profile/page link',
            'section'     => 'social'
          ),
          array(
            'label'       => 'Vimeo Link',
            'id'          => 'vimeo_link',
            'type'        => 'text',
            'desc'        => 'Vimeo profile/page link',
            'section'     => 'social'
          ),
          array(
            'label'       => 'Youtube Link',
            'id'          => 'youtube_link',
            'type'        => 'text',
            'desc'        => 'Youtube profile/page link',
            'section'     => 'social'
          ),
          array(
            'label'       => 'Instagram Link',
            'id'          => 'instagram_link',
            'type'        => 'text',
            'desc'        => 'Instagram profile/page link',
            'section'     => 'social'
          ),
          array(
            'label'       => 'Google Plus Link',
            'id'          => 'google_link',
            'type'        => 'text',
            'desc'        => 'Instagram profile/page link',
            'section'     => 'social'
          ),
          array(
            'label'       => 'Pinterest Link',
            'id'          => 'pinterest_link',
            'type'        => 'text',
            'desc'        => 'Pinterest profile/page link',
            'section'     => 'social'
          ),
          array(
            'label'       => 'Behance Link',
            'id'          => 'behance_link',
            'type'        => 'text',
            'desc'        => 'Behance profile/page link',
            'section'     => 'social'
          ),
          array(
            'id'          => 'social_tab2',
            'label'       => 'Twitter API',
            'type'        => 'tab',
            'section'     => 'social'
          ),
          array(
            'label'       => 'Twitter User Name',
            'id'          => 'twitter_username',
            'type'        => 'text',
            'desc'        => 'Twitter User Name',
            'section'     => 'social'
          ),
          array(
            'label'       => 'Consumer Key (API Key)',
            'id'          => 'twitter_consumer_key',
            'type'        => 'text',
            'desc'        => 'Consumer Key (API Key)',
            'section'     => 'social'
          ),
          array(
            'label'       => 'Consumer Secret (API Secret)',
            'id'          => 'twitter_consumer_secret',
            'type'        => 'text',
            'desc'        => 'Consumer Secret (API Secret)',
            'section'     => 'social'
          ),
          array(
            'label'       => 'Access Token',
            'id'          => 'twitter_access_token',
            'type'        => 'text',
            'desc'        => 'Access Token',
            'section'     => 'social'
          ),
          array(
            'label'       => 'Access Token Secret',
            'id'          => 'twitter_access_token_secret',
            'type'        => 'text',
            'desc'        => 'Access Token Secret',
            'section'     => 'social'
          ),
          array(
            'id'          => 'social_tab3',
            'label'       => 'Facebook API',
            'type'        => 'tab',
            'section'     => 'social'
          ),
          array(
            'label'       => 'Facebook App ID',
            'id'          => 'facebook_app_ID',
            'type'        => 'text',
            'desc'        => 'Facebook App ID',
            'section'     => 'social'
          ),

          // //Featured Slider For Home Page
          // array(
          //   'id'          => 'featured-slider-enable',
          //   'label'       => 'Featured Slider For Home Page',
          //   'desc'        => 'Yo can choose on or off for featured slider',
          //   'type'        => 'on_off',
          //   'std'         => 'off',
          //   'section'     => 'featuredslider'
          // ),
          // array(
          //   'label'       => 'Slider Layout Style',
          //   'id'          => 'slider_layout_style',
          //   'type'        => 'radio-image',
          //   'desc'        => 'You can choose different Slider layout styles here',
          //   'std'         => 'style1',
          //   'section'     => 'featuredslider'
          // ),
          // array(
          //   'label'       => 'Slider Posts Number',
          //   'id'          => 'slider_post_num',
          //   'type'        => 'text',
          //   'desc'        => 'You can choose Slider Posts Number here',
          //   'std'         => '8',
          //   'section'     => 'featuredslider'
          // ),


          array(
            'id'          => 'cairo_related_post_enable',
            'desc'        => 'Related Post For Single Page',
            'label'       => 'Related Post',
            'type'        => 'on_off',
            'section'     => 'blog',
            'std'         => 'off',
          ),
          array(
            'label'       => 'Number of Related Post For Single Page',
            'id'          => 'related_post_number',
            'type'        => 'text',
            'desc'        => 'Add number of related post for single page',
            'section'     => 'blog',
            'condition'     => 'cairo_related_post_enable:is(on)'
          ),


          array(
            'id'          => 'cairo_social_share_enable',
            'desc'        => 'Social Share For Single Page',
            'label'       => 'Post Share Social Media',
            'type'        => 'on_off',
            'section'     => 'blog',
            'std'         => 'off',
          ),
          array(
            'id'          => 'cairo_author_meta_enable',
            'desc'        => 'Author Name For Single Page',
            'label'       => 'Post Author Name and images',
            'type'        => 'on_off',
            'section'     => 'blog',
            'std'         => 'off',
          ),
          array(
            'id'          => 'tag-enable',
            'desc'        => 'Post Tag For Single Page',
            'label'       => 'Tag',
            'type'        => 'on_off',
            'section'     => 'blog',
            'std'         => 'on',
          ),
          array(
            'id'          => 'prev_next_enable',
            'desc'        => 'Previous / Next Articles For Single Page',
            'label'       => 'Previous / Next Articles',
            'type'        => 'on_off',
            'section'     => 'blog',
            'std'         => 'on',
          ),
          array(
            'id'          => 'author-bio-enable',
            'desc'        => 'Author Bio For Single Page and Author Page',
            'label'       => 'Author Bio',
            'type'        => 'on_off',
            'section'     => 'blog',
            'std'         => 'on',
          ),
          array(
            'id'          => 'post-comment-enable',
            'desc'        => 'Comment For Single Page',
            'label'       => 'Post Comment',
            'type'        => 'on_off',
            'section'     => 'blog',
            'std'         => 'on',
          ),


          //TYPOGRAPHY SETTINGS
          array(
            'label'       => 'Heading1 Typography',
            'id'          => 'heading_1',
            'type'        => 'typography',
            'desc'        => 'Font Settings for general body font.',
            'section'     => 'typography',
          ),
          array(
            'label'       => 'Heading2 Typography',
            'id'          => 'heading_2',
            'type'        => 'typography',
            'desc'        => 'Font Settings for general body font.',
            'section'     => 'typography',
          ),
          array(
            'label'       => 'Heading3 Typography',
            'id'          => 'heading_3',
            'type'        => 'typography',
            'desc'        => 'Font Settings for general body font.',
            'section'     => 'typography',
          ),
          array(
            'label'       => 'Heading4 Typography',
            'id'          => 'heading_4',
            'type'        => 'typography',
            'desc'        => 'Font Settings for general body font.',
            'section'     => 'typography',
          ),
          array(
            'label'       => 'Heading5 Typography',
            'id'          => 'heading_5',
            'type'        => 'typography',
            'desc'        => 'Font Settings for general body font.',
            'section'     => 'typography',
          ),
          array(
            'label'       => 'Heading6 Typography',
            'id'          => 'heading_6',
            'type'        => 'typography',
            'desc'        => 'Font Settings for general body font.',
            'section'     => 'typography',
          ),
          array(
            'label'       => 'Body Text Typography',
            'id'          => 'body_font',
            'type'        => 'typography',
            'desc'        => 'If you are using text instead of image, select font options for the logo.',
            'section'     => 'typography',
          ),
          array(
            'label'       => 'Text Typography',
            'id'          => 'text_font',
            'type'        => 'typography',
            'desc'        => 'If you are using text instead of image, select font options for the logo.',
            'section'     => 'typography',
          ),
          array(
            'label'       => 'Post Meta Text Typography',
            'id'          => 'post_meta_font',
            'type'        => 'typography',
            'desc'        => 'If you are using text instead of image, select font options for the logo.',
            'section'     => 'typography',
          ),
          array(
            'label'       => 'Header Menu Text Typography',
            'id'          => 'header_menu_font',
            'type'        => 'typography',
            'desc'        => 'If you are using text instead of image, select font options for the logo.',
            'section'     => 'typography',
          ),

          //Theme Styling
          array(
            'id'          => 'cairo_main_color',
            'desc'        => 'Main Text color, default : #0561fc',
            'label'       => 'Main Theme Color',
            'type'        => 'colorpicker',
            'section'     => 'styling',
            'std'         => '#0561fc'
          ),
          array(
            'id'          => 'cairo_author_name_color',
            'desc'        => 'Author name text color, default : #FF9800',
            'label'       => 'Author name color',
            'type'        => 'colorpicker',
            'section'     => 'styling',
            'std'         => '#FF9800'
          ),
          array(
            'id'          => 'cairo_review_score_bg',
            'desc'        => 'Background review post number color, default : #3b55e6',
            'label'       => 'Background review post number',
            'type'        => 'colorpicker',
            'section'     => 'styling',
            'std'         => '#3b55e6'
          ),
          array(
            'id'          => 'cairo_review_score_color',
            'desc'        => 'Text review post number color, default : #FFF',
            'label'       => 'Text review post number',
            'type'        => 'colorpicker',
            'section'     => 'styling',
            'std'         => '#fff'
          ),

          //Ads Settings
          array(
            'label'         => 'Header Ads',
            'id'            => 'advertising_header',
            'type'          => 'on_off',
            'desc'          => 'Yo can choose on or off for header ads',
            'std'           => 'off',
            'section'       => 'ads',
          ),
          array(
            'label'     => 'Advertising in Header',
            'id'        => 'header_banner',
            'desc'      => 'Header for banner (728X90)',
            'rows'      =>   '4',
            'condition'   => 'advertising_header:is(on)',
            'type'      =>  'textarea-simple',
            'section'   =>  'ads',
          ),
          array(
            'label'         => 'Footer Ads',
            'id'            => 'advertising_footer',
            'type'          => 'on_off',
            'desc'          => 'Yo can choose on or off for header ads',
            'std'           => 'off',
            'section'       => 'ads',
          ),
          array(
            'label'     => 'Advertising in Footer',
            'id'        => 'footer_banner',
            'desc'      => 'Header for banner (728X90)',
            'rows'      =>   '4',
            'condition'   => 'advertising_footer:is(on)',
            'type'      =>  'textarea-simple',
            'section'   =>  'ads',
          ),

          //SHOP SETTINGS
          array(
            'label'     => 'Woocommerce cart on/off',
            'id'        => 'header_cart_on_off',
            'type'      => 'on_off',
            'desc'      => 'You can remove the card icon in the header',
            'std'       => 'off',
            'section'   => 'shop'
          ),
          array(
            'label'       => 'Layout Sidebars in shop',
            'id'          => 'layout_sidebar_shop',
            'type'        => 'radio-image',
            'desc'        => 'You can choose Layout Sidebar styles here for Full or Left or Right layout Sidebar.',
            'std'         => 'sidebar_right',
            'section'     => 'shop'
          ),
          array(
            'label'       => 'Products per page',
            'id'          => 'products_per_page_shop',
            'type'        => 'text',
            'desc'        => 'Define the number of products displayed per page..',
            'std'         => '8',
            'section'     => 'shop'
          ),
          array(
            'label'       => 'Products in row page',
            'id'          => 'products_columns',
            'desc'        => 'Value should be between 0-10',
            'std'         => '5',
            'type'        => 'numeric-slider',
            'section'     => 'shop',
            'min_max_step'=> '0,4,1'
          ),
          array(
            'label'       => 'Related Products per page',
            'id'          => 'related_products_per_page_shop',
            'type'        => 'text',
            'desc'        => 'Define the number of related products displayed per page..',
            'std'         => '3',
            'section'     => 'shop'
          ),
          // array(
          //   'label'         => 'Shop Title',
          //   'id'            => 'shop_title_onoff',
          //   'type'          => 'on_off',
          //   'desc'          => 'Shop title on or off',
          //   'section'       => 'shop',
          //   'std'           => 'off'
          // ),
          // array(
          //   'label'         => 'Shop Title',
          //   'id'            => 'shop_title',
          //   'type'          => 'text',
          //   'desc'          => 'Title for shop page',
          //   'section'       => 'shop',
          //   'condition'   => 'shop_title_onoff:is(on)'
          // ),
          // array(
          //   'label'         => 'Shop Title Color',
          //   'id'            => 'shop_title_color',
          //   'type'          => 'colorpicker',
          //   'desc'          => 'Title color for shop page',
          //   'section'       => 'shop',
          //   'condition'   => 'shop_title_onoff:is(on)'
          // ),
          // array(
          //   'label'         => 'Shop Title Bg Color',
          //   'id'            => 'shop_title_bg_color',
          //   'type'          => 'colorpicker',
          //   'desc'          => 'Title bg color for shop page',
          //   'section'       => 'shop',
          //   'condition'   => 'shop_title_onoff:is(on)'
          // ),
          // array(
          //   'label'         => 'Shop Title Bg Image',
          //   'id'            => 'shop_title_bg_image',
          //   'type'          => 'upload',
          //   'desc'          => 'Title bg image for shop page',
          //   'section'       => 'shop',
          //   'condition'   => 'shop_title_onoff:is(on)'
          // ),

          //Footer Settings
          array(
            'label'       => 'Footer Blog Style',
            'id'          => 'footer_style',
            'type'        => 'radio-image',
            'desc'        => 'You can choose different footer styles here',
            'std'         => 'style1',
            'section'     => 'footer',
          ),
          array(
            'label'       => 'Footer Background Upload',
            'id'          => 'footer_background_image',
            'type'        => 'background',
            'desc'        => 'You can upload your footer background here. Since this theme is retina-ready, <strong>please upload a double size image.</strong>',
            'section'     => 'footer',
          ),
          array(
              'label'       => 'Footer Dark or Light Style',
              'id'          => 'footer_dark_light',
              'type'        => 'radio',
              'desc'        => 'You can choose different color footer style here',
              'choices'     => array(
                  array (
                      'label'     => 'Dark',
                      'value'     => 'dark'
                  ),
                  array (
                      'label'     => 'Light',
                      'value'     => 'light'
                  ),
              ),
              'std'         => 'dark',
              'section'     => 'footer'
          ),
          array(
            'label'         => 'Footer Top Widget Area',
            'id'            => 'footer_top_widget',
            'type'          => 'on_off',
            'desc'          => 'footer top widget area on or off',
            'section'       => 'footer',
            'std'           => 'off'
          ),
          array(
            'label'       => 'Footer Top Widget Style',
            'id'          => 'footer_top_area',
            'type'        => 'radio-image',
            'desc'        => 'You can choose different footer styles here',
            'std'         => 'style1',
            'section'     => 'footer',
            'condition'   => 'footer_top_widget:is(on)'
          ),
          array(
            'label'         => 'Footer Bottom Widget Area',
            'id'            => 'footer_bottom_widget',
            'type'          => 'on_off',
            'desc'          => 'footer top widget area on or off',
            'section'       => 'footer',
            'std'           => 'off'
          ),
          array(
            'label'       => 'Footer Bottom Widget Style',
            'id'          => 'footer_bottom_area',
            'type'        => 'radio-image',
            'desc'        => 'You can choose different footer styles here',
            'std'         => 'style1',
            'section'     => 'footer',
            'condition'   => 'footer_bottom_widget:is(on)'
          ),
          array(
              'label'     => 'Footer Copyright Text',
              'id'        => 'footercopyrgiht',
              'rows'      =>  '4',
              'type'      =>  'textarea-simple',
              'section'   =>  'footer',
              'std'       =>  '2017 ALL RIGHT RESERVED - CAIRO NEWS WORDPRESS THEME by CODEPAGES'
          ),
      // SETTINGS HEADER END
    ),
  );

  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );

  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( ot_settings_id(), $custom_settings );
  }

  /* Lets OptionTree know the UI Builder is being overridden */
  global $ot_has_custom_theme_options;
  $ot_has_custom_theme_options = true;
}
