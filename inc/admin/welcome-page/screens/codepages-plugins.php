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
			<h1><?php echo esc_html__( "Plugins", "cairo" ) . ' ' . '<span>'. $codepages_theme_name .'</span>'; ?></h1>
			<div class="about-text"><?php echo esc_html__( "Nice!", "cairo" ) . ' ' . $codepages_theme_name . ' ' . esc_html__( "is now installed and ready to use. Get ready to build your site with more powerful WordPress theme. We hope you enjoy using it.", "cairo" ); ?></div>
      <div class="wp-badge"><?php echo esc_html__( "Version", "cairo" ); ?> <?php echo esc_attr( $codepages_theme_version ); ?></div>
    </div>
		<h2 class="codepages-nav-tab-wrapper nav-tab-wrapper">
			<?php
			printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=cairo' ),  esc_html__( "Support", "cairo" ) );
			printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=codepages_demo_installer' ), esc_html__( "Install Demos", "cairo" ) );
			printf( '<a href="#" class="nav-tab nav-tab-active">%s</a>', esc_html__( "Plugins", "cairo" ) );
			printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=codepages-options' ), esc_html__( "Theme Option", "cairo" ) );
      printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=system-status' ), esc_html__( "System Status", "cairo" ) );
			?>
		</h2>
	</div>

	<div class="codepagesthemes-required-notices">
		<p class="notice-description"><?php echo esc_html__( "These are the plugins we recommended for CodePages. Currently CodePages Cairo Addons & Shortcode, Visual Composer are required plugins that is needed to use in Cairo. You can activate, deactivate or update the plugins from this tab.", "cairo" ); ?></p>
	</div>

	<div class="codepagesthemes-plugin-action-notices">
		<?php $plugin_deactivated = '';
		if( isset( $_GET['codepages-deactivate'] ) && $_GET['codepages-deactivate'] == 'deactivate-plugin' ) {
			$plugin_deactivated = $_GET['plugin_name']; ?>
			<?php printf( '<p class="plugin-action-notices deactivate">%1$s, %2$s <strong>%3$s</strong>.', esc_attr( $plugin_deactivated ), esc_html('plugin', 'cairo'), esc_html('deactivated.', 'cairo') );
		} ?>
		<?php $plugin_activated = '';
		if( isset( $_GET['codepages-activate'] ) && $_GET['codepages-activate'] == 'activate-plugin' ) {
			$plugin_activated = $_GET['plugin_name']; ?>
			<?php printf( '<p class="plugin-action-notices activate">%1$s, %2$s <strong>%3$s</strong>.', esc_attr( $plugin_activated ), esc_html('plugin', 'cairo'), esc_html('activated.', 'cairo') );
		} ?>
	</div>

	<div class="codepagesthemes-demo-wrapper codepagesthemes-install-plugins">
		<div class="feature-section theme-browser rendered">
			<?php
			foreach( $plugins as $plugin ):
				$class = '';
				$plugin_status = '';
				$active_action_class = '';
				$file_path = $plugin['file_path'];
				$plugin_action = $tgm_obj->codepages_plugin_link( $plugin );
				foreach( $plugin_action as $action => $value ) {
					if( $active_action == $action ) {
						$active_action_class = ' plugin-' .$active_action. '';
					}
				}

				if( is_plugin_active( $file_path ) ) {
					$plugin_status = 'active';
					$class = 'active';
				}
			?>
			<div class="theme <?php echo esc_attr( $class . $active_action_class ); ?>">
				<div class="install-plugin-inner">

					<div class="theme-screenshot">
						<img src="<?php echo esc_url( $plugin['image_url'] ); ?>" alt="" />
					</div>

					<h3 class="theme-name">
						<?php echo esc_html( $plugin['name'] ); ?>
					</h3>

          <?php if( $plugin_status == 'active' ) { ?>
            <div class="plugin-active">
					<?php echo sprintf( '<span>%s</span> ', esc_html__( 'Active', 'cairo' ) ); ?>
            </div>
					<?php }else { ?>
            <div class="plugin-deactivate">
					<?php echo sprintf( '<span>%s</span> ', esc_html__( 'Deactivate', 'cairo' ) ); ?>
            </div>
					<?php } ?>

					<div class="theme-actions">
						<?php foreach( $plugin_action as $action ) { echo ( $action ); } ?>
					</div>
					<?php if( isset( $plugin_action['update'] ) && $plugin_action['update'] ): ?>
					<div class="theme-update"><?php echo esc_html__('Update Available: Version', 'cairo'); ?> <?php echo esc_attr( $plugin['version'] ); ?></div>
					<?php endif; ?>

					<?php if( $plugin['required'] ): ?>
					<div class="plugin-required">
						<?php esc_html_e( 'Required', 'cairo' ); ?>
					</div>
					<?php endif; ?>

				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>

	<div class="codepagesthemes-thanks">
        <hr />
    	<p class="description"><?php echo esc_html__( "Thank you for choosing", "cairo" ) . ' ' . $codepages_theme_name . '.'; ?></p>
    </div>
</div>
