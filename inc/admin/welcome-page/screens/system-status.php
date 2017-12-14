<?php
$codepages_theme = wp_get_theme();
if($codepages_theme->parent_theme) {
    $template_dir =  basename( get_template_directory() );
    $codepages_theme = wp_get_theme($template_dir);
}
$codepages_theme_version = $codepages_theme->get( 'Version' );
$codepages_theme_name = $codepages_theme->get('Name');

$codepagesthemes_url = 'http://codepagesthemes.com/';

$ins_demo_stat = get_theme_mod( 'codepages_demo_installed' );
$ins_demo_id = get_theme_mod( 'codepages_installed_demo_id' );

?>
<div class="wrap about-wrap welcome-wrap codepagesthemes-wrap">
	<h1 class="hide" style="display:none;"></h1>
	<div class="codepagesthemes-welcome-inner">
		<div class="welcome-wrap">
			<h1><?php echo esc_html__( "System Status", "cairo" ) . ' ' . '<span>'. $codepages_theme_name .'</span>'; ?></h1>
			<div class="about-text"><?php echo esc_html__( "Nice!", "cairo" ) . ' ' . $codepages_theme_name . ' ' . esc_html__( "is now installed and ready to use. Get ready to build your site with more powerful WordPress theme. We hope you enjoy using it.", "cairo" ); ?></div>
      <div class="wp-badge"><?php echo esc_html__( "Version", "cairo" ); ?> <?php echo esc_attr( $codepages_theme_version ); ?></div>
    </div>
		<h2 class="codepages-nav-tab-wrapper nav-tab-wrapper">
			<?php
			printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=cairo' ),  esc_html__( "Support", "cairo" ) );
			printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=codepages_demo_installer' ), esc_html__( "Install Demos", "cairo" ) );
			printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=codepages-plugins' ), esc_html__( "Plugins", "cairo" ) );
      printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=codepages-options' ), esc_html__( "Theme Option", "cairo" ) );
			printf( '<a href="#" class="nav-tab nav-tab-active">%s</a>', esc_html__( "System Status", "cairo" ) );
			?>
		</h2>
	</div>

	<div class="system-status-wrapper">
		<?php
			$codepages_theme = wp_get_theme();
			$max_execution_time = ini_get('max_execution_time');
			$max_input_vars = ini_get('max_input_vars');
			$post_max_size = ini_get('post_max_size');
			$php_version = phpversion();
			$php_version_class = version_compare( $php_version, '5.4.7', '>=') ? ' success' : ' warning';

			ob_start();
			phpinfo(INFO_MODULES);
			$info = ob_get_contents();
			ob_end_clean();
			$info = stristr($info, 'Client API version');
			preg_match('/[1-9].[0-9].[1-9][0-9]/', $info, $match);
			$mysql_version = $match[0];
			$mysql_version_class = version_compare( $mysql_version, '5', '>=') ? ' success' : ' warning';

			$max_exe_class = $max_execution_time >= 300 ? ' success' : ' warning';
			$max_input_class = $max_input_vars >= 2000 ? ' success' : ' warning';
			$post_max = str_replace("M","",$post_max_size);
			$post_max_class = $post_max >= 10 ? ' success' : ' warning';

			$wp_version = get_bloginfo('version');
			$wp_version_class = version_compare( $wp_version, '4.5', '>=') ? ' success' : ' warning';

			$wp_mem = str_replace("M","",WP_MEMORY_LIMIT);
			$wp_mem_class = $wp_mem >= 64 ? ' success' : ' warning';
		?>
    
		<table class="widefat" cellspacing="0">
			<thead>
				<tr>
					<th colspan="4"><b><?php esc_html_e('Theme Config', 'cairo'); ?></b></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td width="20%"><?php esc_html_e('Theme Name', 'cairo'); ?></td>
					<td><?php esc_html_e('Cairo', 'cairo'); ?></td>
				</tr>
				<tr>
					<td><?php esc_html_e('Theme Version', 'cairo'); ?></td>
					<td><?php echo esc_attr( $codepages_theme->get( 'Version' ) ); ?></td>
				</tr>
			</tbody>
		</table>

		<table class="widefat" cellspacing="0">
			<thead>
				<tr>
					<th colspan="4"><b><?php esc_html_e('PHP Config', 'cairo'); ?></b></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td width="20%"><?php esc_html_e('Server Software', 'cairo'); ?></td>
					<td width="30%"><?php echo esc_attr( $_SERVER['SERVER_SOFTWARE'] ); ?></td>
				</tr>
				<tr>
					<td><?php esc_html_e('PHP', 'cairo'); ?></td>
					<td><?php echo esc_attr( $php_version ); ?></td>
					<td width="40%"><?php esc_html_e('Required version 5.4.0. Recommended 5.6 or greater.', 'cairo'); ?></td>
					<td><i class="fa fa-check<?php echo esc_attr( $php_version_class ); ?>" aria-hidden="true"></i></td>
				</tr>
				<tr>
					<td><?php esc_html_e('MySQL', 'cairo'); ?></td>
					<td><?php echo esc_attr( $mysql_version ); ?></td>
					<td><?php esc_html_e('Required version 5. Recommended 5.0 or greater.', 'cairo'); ?></td>
					<td><i class="fa fa-check<?php echo esc_attr( $php_version_class ); ?>" aria-hidden="true"></i></td>
				</tr>
				<tr>
					<td><?php esc_html_e('max_execution_time', 'cairo'); ?></td>
					<td><?php echo esc_attr( $max_execution_time ); ?></td>
					<td><?php esc_html_e('Required max_execution_time 300.', 'cairo'); ?></td>
					<td><i class="fa fa-check<?php echo esc_attr( $max_exe_class ); ?>" aria-hidden="true"></i></td>
				</tr>
				<tr>
					<td><?php esc_html_e('max_input_vars', 'cairo'); ?></td>
					<td><?php echo esc_attr( $max_input_vars ); ?></td>
					<td><?php esc_html_e('Required max_input_vars 2000.', 'cairo'); ?></td>
					<td><i class="fa fa-check<?php echo esc_attr( $max_input_class ); ?>" aria-hidden="true"></i></td>
				</tr>
				<tr>
					<td><?php esc_html_e('post_max_size', 'cairo'); ?></td>
					<td><?php echo esc_attr( $post_max_size ); ?></td>
					<td><?php esc_html_e('Required post_max_size 10M.', 'cairo'); ?></td>
					<td><i class="fa fa-check<?php echo esc_attr( $post_max_class ); ?>" aria-hidden="true"></i></td>
				</tr>
			</tbody>
		</table>

		<table class="widefat" cellspacing="0">
			<thead>
				<tr>
					<th colspan="4"><b><?php esc_html_e('WordPress Config', 'cairo'); ?></b></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td width="20%"><?php esc_html_e('Site URL', 'cairo'); ?></td>
					<td><?php echo esc_url( get_site_url() );?></td>
				</tr>
				<tr>
					<td width="20%"><?php esc_html_e('Home URL', 'cairo'); ?></td>
					<td><?php echo esc_url( get_home_url() ); ?></td>
				</tr>
				<tr>
					<td width="20%"><?php esc_html_e('WP version', 'cairo'); ?></td>
					<td width="30%"><?php echo esc_attr( $wp_version ); ?></td>
					<td width="40%"><?php esc_html_e('Required version 4.5. Recommended 4.6.1', 'cairo'); ?></td>
					<td><i class="fa fa-check<?php echo esc_attr( $wp_version_class ); ?>" aria-hidden="true"></i></td>
				</tr>
				<tr>
					<td width="20%"><?php esc_html_e('WP Multisite Status', 'cairo'); ?></td>
					<td><?php echo is_multisite() ? esc_html('Yes', 'cairo') : esc_html('No', 'cairo'); ?></td>
				</tr>
				<tr>
					<td width="20%"><?php esc_html_e('WP Language', 'cairo'); ?></td>
					<td><?php echo get_locale(); ?></td>
				</tr>
				<tr>
					<td width="20%"><?php esc_html_e('WP Memory Limit', 'cairo'); ?></td>
					<td><?php echo WP_MEMORY_LIMIT; ?></td>
					<td width="40%"><?php esc_html_e('Required memory limit 64M.', 'cairo'); ?></td>
					<td><i class="fa fa-check<?php echo esc_attr( $wp_mem_class ); ?>" aria-hidden="true"></i></td>
				</tr>
			</tbody>
		</table>

	</div>

	<div class="codepagesthemes-thanks">
        <hr />
    	<p class="description"><?php echo esc_html__( "Thank you for choosing", "cairo" ) . ' ' . $codepages_theme_name . '.'; ?></p>
    </div>
</div>
