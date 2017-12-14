<?php
$codepages_theme = wp_get_theme();
if($codepages_theme->parent_theme) {
    $template_dir =  basename( get_template_directory() );
    $codepages_theme = wp_get_theme($template_dir);
}
$codepages_theme_version = $codepages_theme->get( 'Version' );
$codepages_theme_name = $codepages_theme->get('Name');

$plugins = TGM_Plugin_Activation::$instance->plugins;
$installed_plugins = get_plugins();
$active_action = '';
if( isset( $_GET['plugin_status'] ) ) {
	$active_action = $_GET['plugin_status'];
}
$tgm_obj = new Codepages_Admin_Page();
?>

<div class="wrap about-wrap welcome-wrap codepagesthemes-wrap">
	<h1 class="hide" style="display:none;"></h1>
	<div class="codepagesthemes-welcome-inner">
		<div class="welcome-wrap">
			<h1><?php echo esc_html__( "Import demos", "cairo" ) . ' ' . '<span>'. $codepages_theme_name .'</span>'; ?></h1>
			<div class="about-text"><?php echo esc_html__( "Nice!", "cairo" ) . ' ' . $codepages_theme_name . ' ' . esc_html__( "is now installed and ready to use. Get ready to build your site with more powerful WordPress theme. We hope you enjoy using it.", "cairo" ); ?></div>
      <div class="wp-badge"><?php echo esc_html__( "Version", "cairo" ); ?> <?php echo esc_attr( $codepages_theme_version ); ?></div>
    </div>
		<h2 class="codepages-nav-tab-wrapper nav-tab-wrapper">
			<?php
			printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=cairo' ),  esc_html__( "Support", "cairo" ) );
			printf( '<a href="#" class="nav-tab nav-tab-active">%s</a>', esc_html__( "Install Demos", "cairo" ) );
      printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=codepages-plugins' ), esc_html__( "Plugins", "cairo" ) );
			printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=codepages-options' ), esc_html__( "Theme Option", "cairo" ) );
      printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=system-status' ), esc_html__( "System Status", "cairo" ) );
			?>
		</h2>
	</div>
  <div class="codepagesthemes-required-notices">
    <p class="notice-description" style="color:red";><?php echo esc_html__( "When Active Cairo Addons & Shortcode Plugin you can use a import demos Please Active Cairo Addons & Shortcode Plugin Now!!", "cairo" ); ?></p>
  </div>
</div>
