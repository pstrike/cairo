<?php global $cairo_codepage; ?>
<div class="codepages-logged-in">
	<div class="widget-title"><h2 class="title">Login</h2></div>
<?php
if ( ! is_user_logged_in() ) { // Display WordPress login form:
    $args = array(
        'redirect' => admin_url(),
        'form_id' => 'loginform-custom',
        'label_username' => esc_html__("Username or Email Address",'cairo'),
        'label_password' => esc_html__("Password",'cairo'),
        'label_remember' => esc_html__("Remember Me",'cairo'),
        'label_log_in' => esc_html__("Log In",'cairo'),
        'remember' => true
    );
    wp_login_form( $args );
} else { // If logged in:
    wp_loginout( home_url() ); // Display "Log Out" link.
    echo " | ";
    wp_register('', ''); // Display "Site Admin" link.
}
?>
</div>
