<?php // Admin Page

if( ! class_exists( 'Codepages_Admin_Page' ) ){
	class Codepages_Admin_Page {

		function __construct(){
			add_action( 'admin_init', array( $this, 'codepages_admin_page_init' ) );
			add_action( 'admin_menu', array( $this, 'codepages_admin_menu') );
			add_action( 'admin_menu', array( $this, 'codepages_edit_admin_menus' ) );
			add_action( 'admin_head', array( $this, 'codepages_admin_page_scripts' ) );
			add_action( 'after_switch_theme', array( $this, 'codepages_theme_activation_redirect' ) );
		}

		function codepages_admin_page_init(){
			if ( current_user_can( 'edit_theme_options' ) ) {

				if( isset( $_GET['codepages-deactivate'] ) && $_GET['codepages-deactivate'] == 'deactivate-plugin' ) {
					check_admin_referer( 'codepages-deactivate', 'codepages-deactivate-nonce' );

					$plugins = TGM_Plugin_Activation::$instance->plugins;

					foreach( $plugins as $plugin ) {
						if( $plugin['slug'] == $_GET['plugin'] ) {
							deactivate_plugins( $plugin['file_path'] );
						}
					}
				}

				if( isset( $_GET['codepages-activate'] ) && $_GET['codepages-activate'] == 'activate-plugin' ) {
					check_admin_referer( 'codepages-activate', 'codepages-activate-nonce' );

					$plugins = TGM_Plugin_Activation::$instance->plugins;

					foreach( $plugins as $plugin ) {
						if( $plugin['slug'] == $_GET['plugin'] ) {
							activate_plugin( $plugin['file_path'] );
						}
					}
				}
			}
		}

		function codepages_theme_activation_redirect(){
			if ( current_user_can( 'edit_theme_options' ) ) {
				header('Location:'.admin_url().'admin.php?page=cairo');
			}
		}

		function codepages_admin_menu(){
			if ( current_user_can( 'edit_theme_options' ) ) {
				// Work around for theme check
				$codepages_menu_page = 'add_menu' . '_page';
				$codepages_submenu_page = 'add_submenu' . '_page';

				$welcome_screen = $codepages_menu_page(
					esc_html__( 'Cairo', 'cairo' ),
					esc_html__( 'Cairo', 'cairo' ),
					'administrator',
					'cairo',
					array( $this, 'codepages_welcome_screen' ),
					'dashicons-admin-generic',
					3);

				$demos = $codepages_submenu_page(
						'cairo',
						esc_html__( 'Install Codepages Demos', 'cairo' ),
						esc_html__( 'Install Demos', 'cairo' ),
						'administrator',
						'codepages_demo_installer',
						array( $this, 'codepages_demos_tab' ) );

				$plugins = $codepages_submenu_page(
						'cairo',
						esc_html__( 'Plugins', 'cairo' ),
						esc_html__( 'Plugins', 'cairo' ),
						'administrator',
						'codepages-plugins',
						array( $this, 'codepages_themes_plugins_tab' ) );

				$system_status = $codepages_submenu_page(
						'cairo',
						esc_html__( 'System Status', 'cairo' ),
						esc_html__( 'System Status', 'cairo' ),
						'administrator',
						'system-status',
						array( $this, 'codepages_system_status' ) );

				add_action( 'admin_print_scripts-'.$welcome_screen, array( $this, 'codepages_admin_screen_scripts' ) );
				add_action( 'admin_print_scripts-'.$demos, array( $this, 'codepages_admin_screen_scripts' ) );
				add_action( 'admin_print_scripts-'.$plugins, array( $this, 'codepages_admin_screen_scripts' ) );
				add_action( 'admin_print_scripts-'.$system_status, array( $this, 'codepages_admin_screen_scripts' ) );
			}
		}

		function codepages_edit_admin_menus() {
			global $submenu;

			if ( current_user_can( 'edit_theme_options' ) ) {
				$submenu['cairo'][0][0] = esc_html__( 'Welcome', 'cairo' );
			}
		}


		function codepages_welcome_screen() {
			require_once(CAIRO_DIR. '/inc/admin/welcome-page/screens/welcome.php');
		}

		function codepages_demos_tab() {
			require_once(CAIRO_DIR. '/inc/admin/welcome-page/screens/install-demos.php');
		}

		function codepages_themes_plugins_tab() {
			require_once(CAIRO_DIR. '/inc/admin/welcome-page/screens/codepages-plugins.php');
		}

		function codepages_system_status() {
			require_once(CAIRO_DIR. '/inc/admin/welcome-page/screens/system-status.php');
		}

		function codepages_admin_page_scripts() {
			if ( is_admin() ) {
				wp_enqueue_style("codepages_admin_confirm_css", CAIRO_URL . "/inc/admin/welcome-page/assets/css/jquery-confirm.min.css", array());
				wp_enqueue_script("codepages_admin_confirm_js", CAIRO_URL . "/inc/admin/welcome-page/assets/js/jquery-confirm.min.js", array());
				wp_enqueue_style("codepages_admin_font", "https://fonts.googleapis.com/css?family=Cairo:400,600,700", array());
				if (is_rtl()) {
					wp_enqueue_style("codepages_admin_page_css_rtl", CAIRO_URL . "/inc/admin/welcome-page/assets/css/admin-screen-rtl.css", array());
				} else {
					wp_enqueue_style("codepages_admin_page_css", CAIRO_URL . "/inc/admin/welcome-page/assets/css/admin-screen.css", array());
				}
				wp_enqueue_script("codepages_admin_page_js", CAIRO_URL . "/inc/admin/welcome-page/assets/js/admin-screen.js", array());
			}
		}


		function codepages_admin_screen_scripts() {
		}


		function codepages_plugin_link( $item ) {
			$installed_plugins = get_plugins();

			$item['sanitized_plugin'] = $item['name'];

			if ( ! isset( $installed_plugins[$item['file_path']] ) ) {
				$actions = array(
					'install' => sprintf(
						'<a href="%1$s" class="button button-primary" title="Install %2$s">Install</a>',
						esc_url( wp_nonce_url(
							add_query_arg(
								array(
									'page'		  	=> urlencode( TGM_Plugin_Activation::$instance->menu ),
									'plugin'		=> urlencode( $item['slug'] ),
									'plugin_name'   => urlencode( $item['sanitized_plugin'] ),
									'plugin_source' => urlencode( $item['source'] ),
									'tgmpa-install' => 'install-plugin',
									'return_url' 	=> 'codepagesthemes_plugins'
								),
								admin_url( TGM_Plugin_Activation::$instance->parent_slug )
							),
							'tgmpa-install',
							'tgmpa-nonce'
						) ),
						$item['sanitized_plugin']
					),
				);
			}

			elseif ( is_plugin_inactive( $item['file_path'] ) ) {
				if ( version_compare( $item['version'], $installed_plugins[$item['file_path']]['Version'], '>' ) ) {
					$actions = array(
						'update' => sprintf(
							'<a href="%1$s" class="button button-primary" title="Update %2$s">Update</a>',
							wp_nonce_url(
								add_query_arg(
									array(
										'page'		  	=> urlencode( TGM_Plugin_Activation::$instance->menu ),
										'plugin'		=> urlencode( $item['slug'] ),
										'plugin_name'   => urlencode( $item['sanitized_plugin'] ),
										'plugin_source' => urlencode( $item['source'] ),
										'tgmpa-update' 	=> 'update-plugin',
										'version' 		=> urlencode( $item['version'] ),
										'return_url' 	=> 'codepagesthemes_plugins'
									),
									admin_url( TGM_Plugin_Activation::$instance->parent_slug )
								),
								'tgmpa-update',
								'tgmpa-nonce'
							),
							$item['sanitized_plugin']
						),
					);
				} else {
					$actions = array(
						'activate' => sprintf(
							'<a href="%1$s" class="button button-primary" title="Activate %2$s">Activate</a>',
							esc_url( add_query_arg(
								array(
									'plugin'			   	=> urlencode( $item['slug'] ),
									'plugin_name'		  	=> urlencode( $item['sanitized_plugin'] ),
									'plugin_source'			=> urlencode( $item['source'] ),
									'codepages-activate'	   		=> 'activate-plugin',
									'codepages-activate-nonce' 	=> wp_create_nonce( 'codepages-activate' ),
								),
								admin_url( 'admin.php?page=codepages-plugins' )
							) ),
							$item['sanitized_plugin']
						),
					);
				}
			}

			elseif ( version_compare( $item['version'], $installed_plugins[$item['file_path']]['Version'], '>' ) ) {
				$actions = array(
					'update' => sprintf(
						'<a href="%1$s" class="button button-primary" title="Update %2$s">Update</a>',
						wp_nonce_url(
							add_query_arg(
								array(
									'page'		  	=> urlencode( TGM_Plugin_Activation::$instance->menu ),
									'plugin'		=> urlencode( $item['slug'] ),
									'plugin_name'   => urlencode( $item['sanitized_plugin'] ),
									'plugin_source' => urlencode( $item['source'] ),
									'tgmpa-update' 	=> 'update-plugin',
									'version' 		=> urlencode( $item['version'] ),
									'return_url' 	=> 'codepagesthemes_plugins'
								),
								admin_url( TGM_Plugin_Activation::$instance->parent_slug )
							),
							'tgmpa-update',
							'tgmpa-nonce'
						),
						$item['sanitized_plugin']
					),
				);
			}

			elseif ( is_plugin_active( $item['file_path'] ) ) {
				$actions = array(
					'deactivate' => sprintf(
						'<a href="%1$s" class="button button-primary" title="Deactivate %2$s">Deactivate</a>',
						esc_url( add_query_arg(
							array(
								'plugin'					=> urlencode( $item['slug'] ),
								'plugin_name'		  		=> urlencode( $item['sanitized_plugin'] ),
								'plugin_source'				=> urlencode( $item['source'] ),
								'codepages-deactivate'	   		=> 'deactivate-plugin',
								'codepages-deactivate-nonce' 	=> wp_create_nonce( 'codepages-deactivate' ),
							),
							admin_url( 'admin.php?page=codepages-plugins' )
						) ),
						$item['sanitized_plugin']
					),
				);
			}

			return $actions;
		}

	}// class Codepages_Admin_Page
	new Codepages_Admin_Page;
}

class Codepages_WP_FileSystem_Credentials {
	static function check_credentials() {
		// Get user credentials for WP filesystem API
		$demo_import_page_url = wp_nonce_url( 'admin.php?page=codepages_demo_installer', 'codepages-demos' );
		if ( false === ( $creds = request_filesystem_credentials( $demo_import_page_url, '', false, false, null ) ) ) {
			return new WP_Error( 'XML_parse_error', __( 'There was an error when reading this WXR file', 'cairo' ) );
		}

		// Now we have credentials, try to get the wp_filesystem running
		if ( ! WP_Filesystem( $creds ) ) {
			// Our credentials were no good, ask the user for them again
			request_filesystem_credentials( $demo_import_page_url, '', true, false, null );
			return true;
		}
	}
}
