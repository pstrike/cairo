<?php
/**
 * Product loop title
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<a href="<?php echo esc_url(get_permalink()); ?>" title="<?php the_title_attribute(); ?>"><h2><?php the_title(); ?></h2></a>
