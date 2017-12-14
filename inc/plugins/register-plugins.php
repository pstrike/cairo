<?php
/*** Include the TGM_Plugin_Activation class.***/
require get_template_directory() .'/inc/plugins/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'cairo_register_required_plugins');
function cairo_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name, slug and required.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin pre-packaged with a theme
		array(
			'name'               => esc_html__( 'Cairo Addons & Shortcode', 'cairo' ),
			'slug'               => 'cairo-addons-shortcode',
			'source'             => get_template_directory() . '/inc/plugins/cairo-addons-shortcode.zip',
			'version'            => '1.0',
			'image_url' 		 		 => esc_url( CAIRO_URL . 'inc/admin/welcome-page/assets/images/plugin/cairo-addons.png' ),
			'required'           => true,
			'force_activation'   => false,
			'force_deactivation' => false,
		),
		array(
			'name'               => esc_html__('WPBakery Visual Composer', 'cairo'),
			'slug'               => 'js_composer',
			'source'             => get_template_directory() . '/inc/plugins/js_composer.zip',
			'image_url' 		 		 => esc_url( CAIRO_URL . 'inc/admin/welcome-page/assets/images/plugin/visual-composer.png' ),
			'required'           => true,
		  'force_activation'   => false,
		  'force_deactivation' => false,
		),
		array(
      'name'               => esc_html__( 'Yoast SEO', 'cairo' ),
      'slug'               => 'wordpress-seo',
			'image_url' 		 		 => esc_url( CAIRO_URL . 'inc/admin/welcome-page/assets/images/plugin/wordpress-seo.png' ),
			'required'           => true,
		  'force_activation'   => false,
		  'force_deactivation' => false,
    ),
		array(
		  'name'               => esc_html__( 'Contact Form 7', 'cairo' ),
		  'slug'               => 'contact-form-7',
			'image_url' 		 		 => esc_url( CAIRO_URL . 'inc/admin/welcome-page/assets/images/plugin/contact-7.png' ),
			'required'           => true,
		  'force_activation'   => false,
		  'force_deactivation' => false,
		),
		array(
		  'name'               => esc_html__( 'MailChimp For WordPress', 'cairo' ),
		  'slug'               => 'mailchimp-for-wp',
			'image_url' 		 		 => esc_url( CAIRO_URL . 'inc/admin/welcome-page/assets/images/plugin/mailChimp.png' ),
			'required'           => true,
		  'force_activation'   => false,
		  'force_deactivation' => false,
		),
		array(
      'name'               => esc_html__( 'WooCommerce - eCommerce', 'cairo' ),
      'slug'               => 'woocommerce',
			'image_url' 		 		 => esc_url( CAIRO_URL . 'inc/admin/welcome-page/assets/images/plugin/woocommerce.png' ),
			'required'           => true,
		  'force_activation'   => false,
		  'force_deactivation' => false,
    ),

	);

	$config = array(
		'domain'           => 'cairo', // Text domain - likely want to be the same as your theme.
		'default_path'     => '', // Default absolute path to pre-packaged plugins
		'menu'             => 'install-required-plugins', // Menu slug
		'has_notices'      => TRUE, // Show admin notices or not
		'is_automatic'     => FALSE, // Automatically activate plugins after installation or not
		'message'          => '', // Message to output right before the plugins table
		'strings'          => array(
			'page_title'                      => esc_html__('Install Required Plugins', 'cairo'),
			'menu_title'                      => esc_html__('Install Plugins', 'cairo'),
			'installing'                      => esc_html__('Installing Plugin: %s', 'cairo'), // %1$s = plugin name
			'oops'                            => esc_html__('Something went wrong with the plugin API.', 'cairo'),
			'notice_can_install_required'     => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'cairo'), // %1$s = plugin name(s)
			'notice_can_install_recommended'  => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'cairo'), // %1$s = plugin name(s)
			'notice_cannot_install'           => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'cairo'), // %1$s = plugin name(s)
			'notice_can_activate_required'    => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'cairo'), // %1$s = plugin name(s)
			'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'cairo'), // %1$s = plugin name(s)
			'notice_cannot_activate'          => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'cairo'), // %1$s = plugin name(s)
			'notice_ask_to_update'            => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'cairo'), // %1$s = plugin name(s)
			'notice_cannot_update'            => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'cairo'), // %1$s = plugin name(s)
			'install_link'                    => _n_noop('Begin installing plugin', 'Begin installing plugins', 'cairo'),
			'activate_link'                   => _n_noop('Activate installed plugin', 'Activate installed plugins', 'cairo'),
			'return'                          => esc_html__('Return to Required Plugins Installer', 'cairo'),
			'plugin_activated'                => esc_html__('Plugin activated successfully.', 'cairo'),
			'complete'                        => esc_html__('All plugins installed and activated successfully. %s', 'cairo') // %1$s = dashboard link
		)
	);
	tgmpa($plugins, $config);
}
