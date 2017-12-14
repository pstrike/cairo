<?php
/**
 * Login Form
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     3.2.0
 */

if (!defined('ABSPATH')) {
	exit;
}

?>

<?php wc_print_notices(); ?>

<?php do_action('woocommerce_before_customer_login_form'); ?>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12 form-wc">
		<div id="wc-account-login-tabs">

			<div id="wc-account-login">

				<h1 class="text-center"><?php esc_html_e('Login', 'cairo'); ?></h1>

				<form method="post" class="wc-form">

					<?php do_action('woocommerce_login_form_start'); ?>

					<p class="form-row form-row-wide">
						<label for="username">
							<?php esc_html_e('Username or email address', 'cairo'); ?>
							<abbr class="required" title="required">*</abbr>
						</label>
						<input type="text" class="input-text" name="username" id="username" value="<?php if (!empty($_POST['username'])) echo esc_attr($_POST['username']); ?>" required>
					</p>
					<p class="form-row form-row-wide">
						<label for="password">
							<?php esc_html_e('Password', 'cairo'); ?>
							<abbr class="required" title="required">*</abbr>
						</label>
						<input class="input-text" type="password" name="password" id="password" required>
					</p>

					<?php do_action('woocommerce_login_form'); ?>

					<p class="form-row form-row-first line-height-1">
						<input name="rememberme" type="checkbox" id="rememberme" value="forever">
						<label for="rememberme" class="inline rememberme">
							<?php esc_html_e('Remember me', 'cairo'); ?>
						</label>
					</p>

					<p class="form-row form-row-last text-right-sm line-height-1">
						<a href="<?php echo esc_url(wp_lostpassword_url()); ?>">
							<?php esc_html_e('Lost your password?', 'cairo'); ?>
						</a>
					</p>

					<p class="form-row">
						<?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
						<input type="submit" class="full-width" name="login" value="<?php esc_attr_e('Login', 'cairo'); ?>">
					</p>

					<?php do_action('woocommerce_login_form_end'); ?>

				</form>

			</div>

			<?php if (get_option('woocommerce_enable_myaccount_registration') === 'yes') { ?>

				<div id="wc-account-register">

					<h1 class="text-center"><?php esc_html_e('Register', 'cairo'); ?></h1>

					<form method="post" class="wc-form">

						<?php do_action('woocommerce_register_form_start'); ?>

						<?php if ('no' === get_option('woocommerce_registration_generate_username')) { ?>

							<p class="form-row form-row-wide">
								<label for="reg_username">
									<?php esc_html_e('Username', 'cairo'); ?>
									<abbr class="required" title="required">*</abbr>
								</label>
								<input type="text" class="input-text" name="username" id="reg_username" value="<?php if (!empty($_POST['username'])) echo esc_attr($_POST['username']); ?>" required>
							</p>

						<?php } ?>

						<p class="form-row form-row-wide">
							<label for="reg_email">
								<?php esc_html_e('Email address', 'cairo'); ?>
								<abbr class="required" title="required">*</abbr>
							</label>
							<input type="email" class="input-text" name="email" id="reg_email" value="<?php if (!empty($_POST['email'])) echo esc_attr($_POST['email']); ?>" required>
						</p>

						<?php if ('no' === get_option('woocommerce_registration_generate_password')) { ?>

							<p class="form-row form-row-wide">
								<label for="reg_password">
									<?php esc_html_e('Password', 'cairo'); ?>
									<abbr class="required" title="required">*</abbr>
								</label>
								<input type="password" class="input-text" name="password" id="reg_password" required>
							</p>

						<?php } ?>

						<!-- Spam Trap -->
						<div style="<?php echo ((is_rtl()) ? 'right' : 'left'); ?>: -999em; position: absolute;">
							<label for="trap">
								<?php esc_html_e('Anti-spam', 'cairo'); ?>
							</label>
							<input type="text" name="email_2" id="trap" tabindex="-1" autocomplete="off">
						</div>

						<?php do_action('woocommerce_register_form'); ?>
						<?php do_action('register_form'); ?>

						<p class="form-row">
							<?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
							<input type="submit" class="full-width" name="register" value="<?php esc_attr_e('Register', 'cairo'); ?>">
						</p>

						<?php do_action('woocommerce_register_form_end'); ?>

					</form>

				</div>

				<div class="wc-separator"><span><?php esc_html_e('Or', 'cairo'); ?></span></div>

				<ul class="wc-account-login-tabs">
					<li>
						<a href="#wc-account-login" class="button _o full-width">
							<?php esc_html_e('Login', 'cairo'); ?>
						</a>
					</li>
					<li>
						<a href="#wc-account-register" class="button _o full-width">
							<?php esc_html_e('Register', 'cairo'); ?>
						</a>
					</li>
				</ul>

			<?php } ?>

		</div>
	</div>
</div>

<?php do_action('woocommerce_after_customer_login_form'); ?>
