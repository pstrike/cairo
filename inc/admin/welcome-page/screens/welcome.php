<?php
$codepages_theme = wp_get_theme();
if($codepages_theme->parent_theme) {
    $template_dir =  basename( get_template_directory() );
    $codepages_theme = wp_get_theme($template_dir);
}
$codepages_theme_version = $codepages_theme->get( 'Version' );
$codepages_theme_name = $codepages_theme->get('Name');

$codepagesthemes_url = 'http://docs.codepagesthemes.com';
?>

<div class="wrap about-wrap welcome-wrap codepagesthemes-wrap">
	<h1 class="hide" style="display:none;"></h1>
	<div class="codepagesthemes-welcome-inner">
		<div class="welcome-wrap">
			<h1><?php echo esc_html__( "Welcome to", "cairo" ) . ' ' . '<span>'. $codepages_theme_name .'</span>'; ?></h1>
			<div class="about-text"><?php echo esc_html__( "Nice!", "cairo" ) . ' ' . $codepages_theme_name . ' ' . esc_html__( "is now installed and ready to use. Get ready to build your site with more powerful WordPress theme. We hope you enjoy using it.", "cairo" ); ?></div>
      <div class="wp-badge"><?php echo esc_html__( "Version", "cairo" ); ?> <?php echo esc_attr( $codepages_theme_version ); ?></div>
    </div>
		<h2 class="codepages-nav-tab-wrapper nav-tab-wrapper">
			<?php
			printf( '<a href="#" class="nav-tab nav-tab-active">%s</a>', esc_html__( "Support", "cairo" ) );
			printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=codepages_demo_installer' ), esc_html__( "Install Demos", "cairo" ) );
			printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=codepages-plugins' ), esc_html__( "Plugins", "cairo" ) );
      printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=codepages-options' ), esc_html__( "Theme Option", "cairo" ) );
			printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=system-status' ), esc_html__( "System Status", "cairo" ) );
			?>
		</h2>
	</div>

	<div class="codepagesthemes-support-wrapper clearfix">
    	<div class="features-section three-col">
        	<div class="feature-item col">
				<h4><span class="dashicons dashicons-admin-generic"></span><?php echo esc_html__( "Submit A Ticket", "cairo" ); ?></h4>
				<p><?php echo esc_html__( "We would happy to help you solve any issues. If you have any questions, ideas or suggestions, please feel free to contact us.", "cairo" ); ?></p>
                <?php printf( '<a href="%s" class="button button-large button-primary btn-lg-button" target="_blank">%s</a>', 'https://codepagesthemes.ticksy.com', esc_html__( "Submit A Ticket", "cairo" ) ); ?>
            </div>
            <div class="feature-item col">
				<h4><span class="dashicons dashicons-book-alt"></span><?php echo esc_html__( "Documentation", "cairo" ); ?></h4>
				<p><?php echo esc_html__( "Our online documentation helps you to learn how to setup and customize your needs with Codepages. We will launch online documentation soon.", "cairo" ); ?></p>
                <?php printf( '<a href="%s" class="button button-large button-primary btn-lg-button" target="_blank">%s</a>', $codepagesthemes_url . '/codepages/', esc_html__( "Documentation", "cairo" ) ); ?>
            </div>

            <div class="feature-item col last-item">
				<h4><span class="dashicons dashicons-groups"></span><?php echo esc_html__( "Community Forum", "cairo" ); ?></h4>
				<p><?php echo esc_html__( "We also have a community forum for user to user interactions. Ask another User!", "cairo" ); ?></p>
                <?php printf( '<a href="%s" class="button button-large button-primary btn-lg-button" target="_blank">%s</a>', $codepagesthemes_url . 'forum/', esc_html__( "Community Forum", "cairo" ) ); ?>
            </div>
        </div>
    </div>

    <div class="codepagesthemes-thanks">
        <hr />
    	<p class="description"><?php echo esc_html__( "Thank you for choosing", "cairo" ) . ' ' . $codepages_theme_name . '.'; ?></p>
    </div>
</div>
