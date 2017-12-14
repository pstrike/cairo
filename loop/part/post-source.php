<?php
	$id = get_the_ID();
	$source = get_post_meta($id, 'source_post', true);
?>
<div class="single-post-source">
	<span class="source-title"><?php esc_html_e('Source', 'cairo'); ?></span>
	<ul>
		<?php foreach($source as $sources) { ?>
			<li><a href="<?php echo esc_url($sources['link_source']); ?>"><?php echo esc_attr($sources['title']); ?></a></li>
		<?php } ?>
	</ul>
</div>
