<?php
// ==========================================================================================
// Codepages Cairo Theme Function
// @package Cairo
// @author Codepages - Codepages
// @link http://themeforest.net/user/codepages/portfolio
// ==========================================================================================

/* Cairo theme setup */
if ( ! function_exists( 'cairo_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function cairo_setup() {
	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Cairo, use a find and replace
	 * to change 'cairo' to the name of your theme in all the template files
	 */
	load_theme_textdomain('cairo', get_template_directory() . '/languages');

	//This theme allows title tag
	add_theme_support( 'title-tag' );

	//Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	//This theme allows users to set a custom background
	add_theme_support( 'custom-background' );

	//This theme allows custom header
	add_theme_support( 'custom-header' );

	//This theme allows Woocommerce
	add_theme_support('woocommerce');

	//This theme allows editor style
	add_editor_style();

	// Do Shortcodes inside html output
	add_filter('html_output', 'do_shortcode');

	/* Background Support */
	add_theme_support( 'custom-background', array( 'default-color' => 'ffffff') );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support('post-thumbnails');

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support('post-formats', array('image', 'gallery', 'video', 'audio'));

	/* This theme uses wp_nav_menu() in one location. */
	register_nav_menus( array(
	  'primary' 	=> __('Header Menu', 'cairo'),
	  'secondary' => __('Top Bar Menu', 'cairo'),
	  'sticky' 		=> __('Sticky Header Menu', 'cairo'),
	  'mobile' 		=> __('Mobile Menu', 'cairo'),
	  'footer'		=> __('Footer Menu', 'cairo'),
 	));

	/* cairo GIF Unset sizes */
	if( ! function_exists( 'cairo_unset_sizes_if_gif' ) )
	{
		add_action( 'intermediate_image_sizes_advanced', 'cairo_unset_sizes_if_gif' );
		function cairo_unset_sizes_if_gif( $sizes )
	    {
			// we're only having the sizes available
			// we're using debug_backtrace to get additional information
			$dbg_back = debug_backtrace();
			// scan $dbg_back array for function and get $args
			foreach ( $dbg_back as $sub ) {
				if ( $sub[ 'function'] == 'wp_generate_attachment_metadata' ) {
					$args = $sub[ 'args' ];
				}
			}
			// attachment id
			$att_id       = $args[0];
			// attachment path
			$att_path     = $args[1];
			// split up file information
			$pathinfo = pathinfo( $att_path );
			// if extension is gif unset sizes
			if ( $pathinfo[ 'extension' ] == 'gif' ) {
				// get all intermediate sizes
				$intermediate_image_sizes = get_intermediate_image_sizes();
				// loop trough the intermediate sizes array
				foreach ( $intermediate_image_sizes as $size ) {
					// unset the size in the sizes array
					unset( $sizes[ $size ] );
				}
			}
			// return sizes
			return $sizes;
		}
	}

	/* Cairo Theme resize image */
	add_image_size( 'cairo-mega-menu-thumb', 250, 200, true );
	add_image_size( 'cairo-post-full', 1280, 900, true );
	add_image_size( 'cairo-post-large-one', 1170, 650, true );
	add_image_size( 'cairo-post-large-tow', 1024, 640, true );
	add_image_size( 'cairo-post-large-three', 760, 610, true );
	add_image_size( 'cairo-post-large-four', 700, 500, true );
	add_image_size( 'cairo-post-large-five', 750, 415, true );

	add_image_size( 'cairo-post-medium-one', 760, 785, true );
	add_image_size( 'cairo-post-medium-tow', 568, 582, true );
	add_image_size( 'cairo-post-medium-three', 600, 600, true );
	add_image_size( 'cairo-post-medium-four', 555, 445, true );
	add_image_size( 'cairo-post-medium-five', 570, 400, true );
	add_image_size( 'cairo-post-medium-six', 614, 493, true );

	add_image_size( 'cairo-post-small-one', 568, 290, true );
	add_image_size( 'cairo-post-small-tow', 360, 252, true );
	add_image_size( 'cairo-post-small-three', 283, 290, true );
	add_image_size( 'cairo-post-small-four', 250, 145, true );
	add_image_size( 'cairo-post-small-five', 380, 493, true );

	add_image_size( 'cairo-post-thumb-one', 180, 180, true );
	add_image_size( 'cairo-post-thumb-tow', 150, 150, true );
	add_image_size( 'cairo-post-thumb-three', 80, 80, true );

}
endif;
add_action('after_setup_theme', 'cairo_setup');

/* Cairo Excerpt Words */
function cairo_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit) {
		array_pop($words);
	}
	return implode(' ', $words);
}
/* Cairo Content Start */
if ( ! isset( $content_width ) ) {
	$content_width = 1170; /* pixels */
}


/* Cairo Customize Body Class */
function cinco_body_class( $classes ) {
		if (ot_get_option('layout_home_style') == 'boxed_layout') {
			$classes[] = 'wrapper-boxed';
		}
		elseif (ot_get_option('layout_home_style') == 'border_layout') {
			$classes[] = 'wrapper-border';
		}
		else {
			$classes[] = 'wrapper-default';
		}
    return $classes;
}
add_filter( 'body_class', 'cinco_body_class' );

/* Cairo Post Content views */
function cairo_get_post_views($postID){
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
			return 0;
	}
	return $count;
}

function cairo_set_post_views($postID) {
	if (is_single()) {
		$count_key = 'post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if($count==''){
			$count = 0;
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
		}else{
			$count++;
			update_post_meta($postID, $count_key, $count);
		}
	}
}

/* Cairo Menu Fallback */
function menu_fallback() {
	echo '<div data-breakpoint="992" class="menu-fallback flexnav">';
		echo '<p>Please assign a menu to the primary menu location under Menus.</p>';
	echo '</div>';
}

function cairo_category_name_color(){
	if (has_category()) {
		$categories = get_the_category( get_the_ID() );
		$catname = $categories[0]->name;
		$class = strtolower($catname);
		$class = str_replace(' ', '-', $class);
		$class = sanitize_title($class);

		$categories_category = "";
		$categories_category = get_the_category( get_the_ID() );
		$categories_firstCategory = $categories_category[0]->cat_ID;
	?>
	<div class="post-category category-bg-color">
		<a  class="cat-color-<?php echo esc_html($categories_firstCategory) ?>" href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ) ?> "><?php echo esc_html( $categories[0]->name ) ?></a>
	</div>
<?php }
}


/* Cairo Post Comment Count */
if ( ! function_exists( 'cairo_post_comments_count' ) ) :
	function cairo_post_comments_count() {
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			comments_popup_link( __( '0 COMMENT', 'cairo' ), __( '1 COMMENT', 'cairo' ), __( '% COMMENT', 'cairo' ) );
		}
	}
endif;

if ( ! function_exists( 'cairo_comment_nav' ) ) :
function cairo_comment_nav() {
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	?>
	<nav class="navigation comment-navigation" role="navigation">
		<h3 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'cairo' ); ?></h3>
		<div class="nav-links">
			<?php
				if ( $prev_link = get_previous_comments_link( esc_html__( 'Older Comments', 'cairo' ) ) ) :
					printf( '<div class="nav-previous">%s</div>', $prev_link );
				endif;

				if ( $next_link = get_next_comments_link( esc_html__( 'Newer Comments', 'cairo' ) ) ) :
					printf( '<div class="nav-next">%s</div>', $next_link );
				endif;
			?>
		</div>
	</nav>
	<?php endif; }
endif;

/* Cairo Custom Sidebar Widget */
function cairo_ot_list_item_settings( $settings, $id ) {
	if ( $id == 'custom_sidebars' ) {
		return array();
	}
	return $settings;
}
add_filter( 'ot_list_item_settings', 'cairo_ot_list_item_settings', 10, 2 );

function cairo_ot_list_item_title_label( $label, $id ) {
	switch ( $id ) {
		case 'custom_sidebars':
		$label = esc_html__( 'Sidebar Name', 'cairo' );
		break;
	}
	return $label;
}
add_filter( 'ot_list_item_title_label', 'cairo_ot_list_item_title_label', 10, 2 );

function cairo_ot_list_item_description( $label, $id ) {
	if ( $id == 'custom_sidebars' ) {
		$label = '';
	}
	return $label;
}
add_filter( 'ot_list_item_description', 'cairo_ot_list_item_description', 10, 2 );


/* Cairo Sidebar Widget */
if( !function_exists( 'cairo_sidebars' ) ) {
	add_action( 'widgets_init', 'cairo_sidebars' );
	function cairo_sidebars() {
		$sidebar_style = "sidebar-style1";
		if ( ot_get_option( 'sidebar_style' ) == 'style1') {
			$sidebar_style = "sidebar-style1";
		}
		elseif ( ot_get_option( 'sidebar_style' ) == 'style2' ) {
			$sidebar_style = "sidebar-style2";
		}
		elseif ( ot_get_option( 'sidebar_style' ) == 'style3' ) {
			$sidebar_style = "sidebar-style3";
		}
		elseif ( ot_get_option( 'sidebar_style' ) == 'style4' ) {
			$sidebar_style = "sidebar-style4";
		}
		elseif ( ot_get_option( 'sidebar_style' ) == 'style5' ) {
			$sidebar_style = "sidebar-style5";
		}
		elseif ( ot_get_option( 'sidebar_style' ) == 'style6' ) {
			$sidebar_style = "sidebar-style6";
		}
		elseif ( ot_get_option( 'sidebar_style' ) == 'style7' ) {
			$sidebar_style = "sidebar-style7";
		}

		register_sidebar( array(
			'id'            => 'cairo-general',
			'name'          => esc_html__( 'Primary Sidebar', 'cairo' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget '.$sidebar_style.' %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h2 class="title">',
			'after_title'   => '</h2></div>'
		));
		register_sidebar(array(
			'id'					  => 'cairo-single',
			'name' 					=> esc_html__( 'Single Page Sidebar', 'cairo' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget '.$sidebar_style.' %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h2 class="title">',
			'after_title'   => '</h2></div>'
		));
		register_sidebar(array(
			'id' 						=> 'cairo_category',
			'name' 					=> esc_html__( 'Category & Author Sidebar', 'cairo' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget '.$sidebar_style.' %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h2 class="title">',
			'after_title'   => '</h2></div>'
		));
		register_sidebar(array(
			'id' 						=> 'cairo_shop',
			'name' 					=> esc_html__( 'Shop Sidebar', 'cairo' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget '.$sidebar_style.' %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h2 class="title">',
			'after_title'   => '</h2></div>'
		));
		register_sidebar(array(
			'id' 						=> 'cairo_footer_instagram',
			'name' 					=> esc_html__( 'Footer Instagram Sidebar', 'cairo' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget '.$sidebar_style.' %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h2 class="title">',
			'after_title'   => '</h2></div>'
		));
		register_sidebar(array(
			'id' 						=> 'cairo_footer_top_1',
			'name' 					=> esc_html__( 'Footer Top Sidebar 1Column', 'cairo' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget '.$sidebar_style.' %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h2 class="title">',
			'after_title'   => '</h2></div>'
		));
		register_sidebar(array(
			'id' 						=> 'cairo_footer_top_2',
			'name' 					=> esc_html__( 'Footer Top Sidebar 2Column', 'cairo' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget '.$sidebar_style.' %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h2 class="title">',
			'after_title'   => '</h2></div>'
		));
		register_sidebar(array(
			'id' 						=> 'cairo_footer_top_3',
			'name' 					=> esc_html__( 'Footer Top Sidebar 3Column', 'cairo' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget '.$sidebar_style.' %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h2 class="title">',
			'after_title'   => '</h2></div>'
		));
		register_sidebar(array(
			'id' 						=> 'cairo_footer_top_4',
			'name' 					=> esc_html__( 'Footer Top Sidebar 4Column', 'cairo' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget '.$sidebar_style.' %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h2 class="title">',
			'after_title'   => '</h2></div>'
		));
		register_sidebar(array(
			'id' 						=> 'cairo_footer_bottom_1',
			'name' 					=> esc_html__( 'Footer Bottom Sidebar 1Column', 'cairo' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget '.$sidebar_style.' %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h2 class="title">',
			'after_title'   => '</h2></div>'
		));
		register_sidebar(array(
			'id' 						=> 'cairo_footer_bottom_2',
			'name' 					=> esc_html__( 'Footer Bottom Sidebar 2Column', 'cairo' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget '.$sidebar_style.' %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h2 class="title">',
			'after_title'   => '</h2></div>'
		));
		register_sidebar(array(
			'id' 						=> 'cairo_footer_bottom_3',
			'name' 					=> esc_html__( 'Footer Bottom Sidebar 3Column', 'cairo' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget '.$sidebar_style.' %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h2 class="title">',
			'after_title'   => '</h2></div>'
		));
		register_sidebar(array(
			'id' 						=> 'cairo_footer_bottom_4',
			'name' 					=> esc_html__( 'Footer Bottom Sidebar 4Column', 'cairo' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget '.$sidebar_style.' %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h2 class="title">',
			'after_title'   => '</h2></div>'
		));
		$cairo_opts = ot_get_option( 'custom_sidebars' );
		if ( ! empty( $cairo_opts ) ) {
			foreach( $cairo_opts as $k => $v ) {
				register_sidebar( array(
					'name'          => esc_html( $v['title'] ),
					'id'            => 'cairo-sidebar-' . intval( $k + 1 ),
					'before_widget' => '<div id="%1$s" class="sidebar-widget '.$sidebar_style.' %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<div class="widget-title"><h2 class="title">',
					'after_title'   => '</h2></div>'
				));
			}
		}
	}
}

//Enqueue scripts for file uploader
function cairo_media_upload(){
  wp_enqueue_media();
  wp_enqueue_script('adsScript', CAIRO_URL . '/assets/js/media-uploader.js');
}
add_action('admin_enqueue_scripts', 'cairo_media_upload');

//Cairo Tag Posts
if ( ! function_exists( 'cairo_post_tag' ) ) :
	function cairo_post_tag() {
		if(has_tag()) {
		$posttags = get_the_tags();
		?>
		<span class="tags-title"><?php esc_html_e('Tags', 'cairo'); ?></span>
		<ul>
			<?php if ($posttags) {
				$return = '';
				foreach($posttags as $tag) {
					$return .= '<li><a href="'. get_tag_link($tag->term_id).'" title="'. get_tag_link($tag->name).'" class="tag-link">' . $tag->name . '</a></li>';
				}
				echo substr($return, 0, -1);
			} ?>
		</ul>
<?php } } endif;


//Cairo Remove Pages From Search
function remove_pages_from_search() {
    global $wp_post_types;
    $wp_post_types['page']->exclude_from_search = true;
}
add_action('init', 'remove_pages_from_search');

//Cairo Author Bio
if ( ! function_exists( 'cairo_post_author_bio' ) ) :
function cairo_post_author_bio() {
	$id =  get_the_author_meta( 'ID' );
	if (is_author()) {
		$count = count_user_posts($id);
		$comments = get_comments(array('author__in' => array($id), 'count' => 1));
	}
	?>
	<?php echo get_avatar( $id , '164'); ?>
	<div class="author-content">
		<h4><a href="<?php echo esc_url(get_author_posts_url( $id )); ?>"><?php the_author_meta('display_name', $id ); ?></a></h4>
		<?php if (is_author()) { ?>
			<?php if(get_the_author_meta('position', $id) != '') { ?>
				<h4><?php echo get_the_author_meta('position', $id ); ?></h4>
			<?php } ?>
		<?php } ?>

		<div class="author-url">
			<?php if(get_the_author_meta('url', $id ) != '') { ?>
				<a href="<?php echo esc_url(get_the_author_meta('url', $id )); ?>"><?php echo get_the_author_meta('url', $id ); ?></a>
			<?php } ?>
		</div>

		<div class="about-author-bio">
			<p><?php the_author_meta('description', $id ); ?></p>
		</div>

		<div class="about-author-social">
			<?php if(get_the_author_meta('twitter', $id ) != '') { ?>
				<a href="<?php echo esc_url(get_the_author_meta('twitter', $id )); ?>" class="twitter"><i class="fa fa-twitter"></i></a>
			<?php } ?>
			<?php if(get_the_author_meta('facebook', $id ) != '') { ?>
				<a href="<?php echo esc_url(get_the_author_meta('facebook', $id )); ?>" class="facebook"><i class="fa fa-facebook"></i></a>
			<?php } ?>
			<?php if(get_the_author_meta('instagram', $id ) != '') { ?>
				<a href="<?php echo esc_url(get_the_author_meta('googleplus', $id )); ?>" class="instagram"><i class="fa fa-instagram"></i></a>
			<?php } ?>
			<?php if(get_the_author_meta('linkedin', $id ) != '') { ?>
				<a href="<?php echo esc_url(get_the_author_meta('linkedin', $id )); ?>" class="linkedin"><i class="fa fa-linkedin"></i></a>
			<?php } ?>
			<?php if(get_the_author_meta('googleplus', $id ) != '') { ?>
				<a href="<?php echo esc_url(get_the_author_meta('googleplus', $id )); ?>" class="google-plus"><i class="fa fa-google-plus"></i></a>
			<?php } ?>
			<?php if(get_the_author_meta('pinterest', $id ) != '') { ?>
				<a href="<?php echo esc_url(get_the_author_meta('pinterest', $id )); ?>" class="pinterest"><i class="fa fa-pinterest"></i></a>
			<?php } ?>
			<?php if(get_the_author_meta('tumblr', $id ) != '') { ?>
				<a href="<?php echo esc_url(get_the_author_meta('tumblr', $id )); ?>" class="tumblr"><i class="fa fa-tumblr"></i></a>
			<?php } ?>
			<?php if(get_the_author_meta('youtube', $id ) != '') { ?>
				<a href="<?php echo esc_url(get_the_author_meta('youtube', $id )); ?>" class="youtube"><i class="fa fa-youtube"></i></a>
			<?php } ?>
			<?php if(get_the_author_meta('vimeo', $id ) != '') { ?>
				<a href="<?php echo esc_url(get_the_author_meta('vimeo', $id )); ?>" class="vimeo"><i class="fa fa-vimeo"></i></a>
			<?php } ?>
		</div>
		<div class="author-info-articles">
			<span><?php echo esc_attr($count); ?> <?php esc_html_e('Articles', 'cairo'); ?></span><span><?php echo esc_attr($comments); ?> <?php esc_html_e('Comments', 'cairo'); ?></span>
		</div>
	</div>
	<?php
} endif;
add_action( 'cairo_author', 'cairo_post_author_bio',3 );

//Shorten large numbers into abbreviations (i.e. 1,500 = 1.5k)
function cairo_number_abbreviations($number) {
    $abbrevs = array(12 => "T", 9 => "B", 6 => "M", 3 => "K", 0 => "");
	if ($number > 999) {
    foreach($abbrevs as $exponent => $abbrev) {
      if($number >= pow(10, $exponent)) {
      	$display_num = $number / pow(10, $exponent);
      	$decimals = ($exponent >= 3 && round($display_num) < 100) ? 1 : 0;
          return number_format($display_num,$decimals) . $abbrev;
      }
    }
	} else {
		return $number;
	}
}

// remove wp version param from any enqueued scripts
function vc_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );

//Get Sub Categories for Parent Category
if( ! function_exists('cairo_get_sub_categories') ) {
	function cairo_get_sub_categories($cat_id, $page_tit_cat_tag){

		$args = array(
			'type'                     => 'post',
			'child_of'                 => $cat_id,
			'orderby'                  => 'name',
			'hide_empty'               => FALSE,
			'hierarchical'             => 1,
			'taxonomy'                 => 'category',
		);
		//Header Style
		$header_style = get_term_meta( $cat_id, 'cairo_category_header', true );
		$cairo_category_header = $header_style ? $header_style : ot_get_option('cairo_category_header', 'style1');

		if( $cairo_category_header == 'style3' ){
			$child_cat_class = 'text-center';
		}elseif( $cairo_category_header == 'style4' ){
			$child_cat_class = 'text-center';
		}else{
			$child_cat_class = '';
		}

		$child_categories = get_categories($args);
		$output = '';
		if ( !empty ( $child_categories ) ){
			$output .= '<div class="subcategory entry-subcategory '.esc_attr($child_cat_class).'">';
				$output .= '<ul class="child-categories">';
				foreach ( $child_categories as $child_category ){
					$cat_class = 'category-tag';
					$output .= '<li><a href="' . esc_url( get_category_link( $child_category->term_id ) ) . '" class="'. esc_attr( $cat_class ) .'" >'. esc_attr( $child_category->name ) .'</a></li>';
				}
				$output .= '</ul>';
			$output .= '</div>';
		}
		return $output;
	}
}

//Cairo Pagination
if ( ! function_exists( 'cairo_pagination' ) ) {
	function cairo_pagination() {
			if( is_singular() )
				return;
			global $wp_query;
			if( $wp_query->max_num_pages <= 1 )
				return;
			$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
			$max   = intval( $wp_query->max_num_pages );
			if( $paged >= 1 )
				$links[] = $paged;

			if( $paged >= 3 ) {
				$links[] = $paged - 1;
				$links[] = $paged - 2;
			}

			if( ( $paged + 2 ) <= $max ) {
				$links[] = $paged + 2;
				$links[] = $paged + 1;
			}

			echo '<div class="pagination"><ul>' . "\n";

			if( get_previous_posts_link() )
			printf( '<li style="margin-right:3px;">' . get_previous_posts_link( '<span aria-hidden="true">&laquo;</span>' ) . '</li>' );

			if( ! in_array( 1, $links ) ) {
				$class = 1 == $paged ? ' class="active"' : '';

				printf( '<li%s><a class="page-numbers" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

				if( ! in_array( 2, $links ) )
					echo '<li><a href="" class="page-numbers">&middot;&middot;&middot;</a></li>';
			}

			sort( $links );
			foreach ( (array) $links as $link ) {
				$class = $paged == $link ? ' class="active"' : '';
				printf( '<li%s><a href="%s" class="page-numbers">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
			}

			if( ! in_array( $max, $links ) ) {
				if( ! in_array( $max - 1, $links ) )
					echo '<li><a href="" class="page-numbers">&middot;&middot;&middot;</a></li>' . "\n";

				$class = $paged == $max ? ' class="active"' : '';
				printf( '<li%s><a href="%s" class="page-numbers">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
			}

			if( get_next_posts_link() )
			printf( '<li>' . get_next_posts_link( '<span aria-hidden="true">&raquo;</span>' ) . '</li>' );

			echo '</ul></div>' . "\n";
	}
}

//WooCommerce Cairo Page Per
add_filter( 'loop_shop_per_page', 'cairo_loop_shop_per_page', 20 );
// Products per page
function cairo_loop_shop_per_page( $cols ) {
	$cols = ot_get_option('products_per_page_shop');
	return $cols;
}

// remove woocommerce styles, then add woo styles back in on woo-related pages
function child_manage_woocommerce_css(){
	wp_dequeue_style('woocommerce-general');
}
add_action( 'wp_enqueue_scripts', 'child_manage_woocommerce_css' );

// Breadcrumbs
function codepages_woocommerce_breadcrumbs() {
	return array(
		'delimiter'   => ' <i class="fa fa-angle-right"></i> ',
		'wrap_before' => '<div class="breadcrumb-trail breadcrumbs breadcrumbs-woocommerce"><div id="crumbs">',
		'wrap_after'  => '</div></div>',
		'before'      => '',
		'after'       => '',
		'home'        => _x( 'Home', 'breadcrumb', 'cairo' ),
	);
}

add_filter( 'woocommerce_breadcrumb_defaults', 'codepages_woocommerce_breadcrumbs' );

//////////////////////////////////////////////////////////////////////
//
//      Products list
//
//////////////////////////////////////////////////////////////////////

// Remove link tag from category card
remove_action('woocommerce_before_subcategory', 'woocommerce_template_loop_category_link_open', 10);
remove_action('woocommerce_after_subcategory', 'woocommerce_template_loop_category_link_close', 10);

// Remove link tag from product card
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);

// Change position of sale label in product card
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
add_action('woocommerce_before_shop_loop_item', 'woocommerce_show_product_loop_sale_flash', 10);

// Change position of product thumbnail in product card
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_thumbnail', 10);

//////////////////////////////////////////////////////////////////////
//
//      Common
//
//////////////////////////////////////////////////////////////////////

// Remove default woocmmerce styles
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
function jk_related_products_args( $args ) {
	$args['posts_per_page'] = ot_get_option('related_products_per_page_shop', '4'); // 4 related products
	$args['columns'] = 2; // arranged in 2 columns
	return $args;
}
