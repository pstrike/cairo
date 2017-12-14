<?php
/**
 * Login form
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.1.0
 */

if (!defined('ABSPATH')) {
	exit;
}

if (is_user_logged_in()) {
	return;
}

?>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12 form-wc">
		<form method="post" class="login wc-form" <?php if ($hidden) { ?>style="display:none;"<?php } ?>>

			<?php do_action('woocommerce_login_form_start'); ?>

			<?php if ($message) echo wpautop(wptexturize($message)); ?>

			<p class="form-row">
				<label for="username">
					<?php esc_html_e('Username or email', 'cairo'); ?>
					<abbr class="required" title="required">*</abbr>
				</label>
				<input type="text" class="input-text" name="username" id="username" placeholder="<?php esc_attr_e('Username or email', 'cairo'); ?>" required>
			</p>
			<p class="form-row">
				<label for="password">
					<?php esc_html_e('Password', 'cairo'); ?>
					<abbr class="required" title="required">*</abbr>
				</label>
				<input type="password" class="input-text" name="password" id="password" placeholder="<?php esc_attr_e('Password', 'cairo'); ?>" required>
			</p>

			<?php do_action('woocommerce_login_form'); ?>

			<p class="form-row form-row-first line-height-1">
				<input name="rememberme" type="checkbox" id="rememberme" value="forever">
				<label for="rememberme" class="inline">
					<?php esc_html_e('Remember me', 'cairo'); ?>
				</label>
			</p>

			<p class="form-row form-row-last text-right-sm line-height-1">
				<a href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Lost your password?', 'cairo'); ?></a>
			</p>

			<p class="form-row">
				<?php wp_nonce_field('woocommerce-login'); ?>
				<input type="submit" class="full-width" name="login" value="<?php esc_attr_e('Login', 'cairo'); ?>">
				<input type="hidden" name="redirect" value="<?php echo esc_url($redirect) ?>">
			</p>

			<?php do_action('woocommerce_login_form_end'); ?>

		</form>
	</div>
</div>
