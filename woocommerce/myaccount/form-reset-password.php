<?php
/**
 * Lost password reset form.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-reset-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.2.0
 */

if (!defined('ABSPATH')) {
	exit;
}

wc_print_notices(); ?>

<div class="o-hidden"><div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12 form-wc">

		<h1 class="text-center"><?php esc_html_e('Reset Password', 'cairo'); ?></h1>

		<form method="post" class="woocommerce-ResetPassword lost_reset_password wc-form">

			<p class="wc-lead text-center"><?php echo apply_filters('woocommerce_reset_password_message', esc_html__('Enter a new password below.', 'cairo')); ?></p>

			<p class="form-row">
				<label for="password_1">
					<?php esc_html_e('New password', 'cairo'); ?>
					<abbr class="required" title="required">*</abbr>
				</label>
				<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password_1" id="password_1">
			</p>

			<p class="form-row">
				<label for="password_2">
					<?php esc_html_e('Re-enter new password', 'cairo'); ?>
					<abbr class="required" title="required">*</abbr>
				</label>
				<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password_2" id="password_2">
			</p>

			<input type="hidden" name="reset_key" value="<?php echo esc_attr($args['key']); ?>">
			<input type="hidden" name="reset_login" value="<?php echo esc_attr($args['login']); ?>">

			<?php do_action('woocommerce_resetpassword_form'); ?>

			<p class="form-row">
				<input type="hidden" name="wc_reset_password" value="true">
				<input type="submit" class="full-width" value="<?php esc_attr_e('Save', 'cairo'); ?>">
			</p>

			<?php wp_nonce_field('reset_password'); ?>

		</form>

	</div>
</div></div>
