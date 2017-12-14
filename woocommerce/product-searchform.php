<?php
/**
 * The template for displaying product search form
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     3.2.0
 */

if (!defined('ABSPATH')) {
	exit;
}

?>

<form
	class="search-form"
	role="search"
	method="get"
	action="<?php echo esc_url(home_url('/')); ?>"
>
	<input
		class="search-form-input js-focus-me"
		type="search"
		value="<?php echo get_search_query(); ?>"
		name="s"
		placeholder="<?php echo esc_attr_x( 'Search Products&hellip;', 'placeholder', 'cairo' ); ?>"
		size="40"
	>
	<button
		class="search-form-submit"
		type="submit"
		value="<?php echo esc_attr_x( 'Search', 'submit button', 'cairo' ); ?>"
	>
		<span class="search-form-submit-icon"><span class="icon-search"></span></span>
		<span class="search-form-submit-text">
			<?php echo esc_attr_x( 'Search', 'submit button', 'cairo' ); ?>
		</span>
	</button>
	<input type="hidden" name="post_type" value="product">
</form>
