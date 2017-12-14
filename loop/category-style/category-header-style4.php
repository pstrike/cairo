<?php
if (is_category()) {
	$cat = get_queried_object();
	$cat_id = $cat->term_id;
	//Category Text Color
	$category_text_color = get_term_meta( $cat_id, 'cairo_category_text_color', true );
	//Category Bg Image
	$category_bg_image = get_term_meta( $cat_id, 'cairo_category_header_image', true );
	//Category Bg Color
	$category_bg_color = get_term_meta( $cat_id, 'cairo_category_bg_color', true );
	//Category Header Subcategory
	$cairo_category_sub = get_term_meta( $cat_id, 'cairo_category_sub', true );
}

$current_cat_slug = $cat_slug = get_category(get_query_var('cat'))->term_id;
$sub_category = get_term_meta( $cat_id, 'cairo_category_sub', true );
$cairo_sub_category = $sub_category ? $sub_category : ot_get_option('cairo_category_sub', 'sub_show');
?>

<div class="container">
	<div class="category-title-style2 category-title-style4">
		<div class="entry-crumbs text-center">
		<?php codepages_breadcrumb(); ?>
		</div>
		<div class="category-title text-center">
			<?php echo '<h2>'.single_cat_title('', false).'</h2>'; ?>
			<?php echo category_description( $cat_id ); ?>
		</div>
		<?php if ($cairo_sub_category == 'sub_show'): ?>
			<?php echo cairo_get_sub_categories($current_cat_slug, $cairo_sub_category); ?>
		<?php else : ?>
		<?php endif ?>
	</div>
</div><!-- container -->

<style>
.category-title-style4 {
	background-image: url(<?php echo esc_attr($category_bg_image); ?>);
	background-position: center center;
	background-repeat: no-repeat;
	background-size: cover;
}
.category-title-style4:before {
  background: <?php echo esc_attr($category_bg_color); ?>;
}
.category-title h2{
	color: <?php echo esc_attr($category_text_color); ?>;
}
</style>

<?php
$out = ob_get_contents();
if (ob_get_contents()) ob_end_clean();
// Remove comments
$out = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $out);
// Remove space after colons
$out = str_replace(': ', ':', $out);
// Remove whitespace
$out = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $out);

echo $out;
