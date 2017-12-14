<?php
/**
 * Edit account form
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     3.2.0
 */

if (!defined('ABSPATH')) {
	exit;
}

do_action('woocommerce_before_edit_account_form'); ?>

<div class="o-hidden"><div class="row">
	<div class="col-md-12">

		<form class="woocommerce-EditAccountForm edit-account wc-form" action="" method="post">

			<?php do_action('woocommerce_edit_account_form_start'); ?>

			<p class="form-row form-row-first">
				<label for="account_first_name">
					<?php esc_html_e('First name', 'cairo'); ?> <abbr class="required" title="required">*</abbr>
				</label>
				<input type="text" class="input-text" name="account_first_name" id="account_first_name" value="<?php echo esc_attr($user->first_name); ?>" required>
			</p>

			<p class="form-row form-row-last">
				<label for="account_last_name">
					<?php esc_html_e('Last name', 'cairo'); ?> <abbr class="required" title="required">*</abbr>
				</label>
				<input type="text" class="input-text" name="account_last_name" id="account_last_name" value="<?php echo esc_attr($user->last_name); ?>" required>
			</p>

			<p class="form-row form-row-wide">
				<label for="account_email">
					<?php esc_html_e('Email address', 'cairo'); ?> <abbr class="required" title="required">*</abbr>
				</label>
				<input type="email" class="input-text" name="account_email" id="account_email" value="<?php echo esc_attr($user->user_email); ?>" required>
			</p>

			<div class="clear"></div>

			<div class="wc-box">
				<h3 class="wc-box-title"><?php esc_html_e('Password Change', 'cairo'); ?></h3>

				<p class="form-row form-row-wide">
					<label for="password_current">
						<?php esc_html_e('Current Password (leave blank to leave unchanged)', 'cairo'); ?>
					</label>
					<input type="password" class="input-text" name="password_current" id="password_current">
				</p>

				<p class="form-row form-row-wide">
					<label for="password_1">
						<?php esc_html_e('New Password (leave blank to leave unchanged)', 'cairo'); ?>
					</label>
					<input type="password" class="input-text" name="password_1" id="password_1">
				</p>

				<p class="form-row form-row-wide">
					<label for="password_2">
						<?php esc_html_e('Confirm New Password', 'cairo'); ?>
					</label>
					<input type="password" class="input-text" name="password_2" id="password_2">
				</p>
			</div>

			<?php do_action('woocommerce_edit_account_form'); ?>

			<p class="form-row form-row-wide">
				<?php wp_nonce_field('save_account_details'); ?>
				<input type="submit" class="full-width" name="save_account_details" value="<?php esc_attr_e('Save changes', 'cairo'); ?>">
				<input type="hidden" name="action" value="save_account_details">
			</p>

			<?php do_action('woocommerce_edit_account_form_end'); ?>

		</form>

	</div>
</div></div>

<?php do_action('woocommerce_after_edit_account_form'); ?>
