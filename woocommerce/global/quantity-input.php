<?php
/**
 * Product quantity inputs
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     3.2.0
 */

if (!defined('ABSPATH')) {
	exit;
}

?>

<input
	type="number"
	step="<?php echo esc_attr($step); ?>"
	min="<?php echo esc_attr($min_value); ?>"
	max="<?php echo esc_attr($max_value); ?>"
	name="<?php echo esc_attr($input_name); ?>"
	value="<?php echo esc_attr($input_value); ?>"
	title="<?php esc_attr_x('Qty', 'Product quantity input tooltip', 'cairo'); ?>"
	class="<?php echo (empty($class) ? '' : esc_attr($class)); ?>"
	pattern="<?php echo esc_attr($pattern); ?>"
	inputmode="<?php echo esc_attr($inputmode); ?>"
>
