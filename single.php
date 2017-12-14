<?php
// ==========================================================================================
// Codepages Single Pages Teamplate
// @package Cairo
// @author Codepages - Codepages
// @link http://themeforest.net/user/codepages/portfolio
// ==========================================================================================

get_header();
	$id = get_the_ID();
	$format = get_post_format($id);

	if ($format == 'video' ){
		$post_style = get_post_meta($id, 'video-post-detail-style', true) ? get_post_meta($id, 'video-post-detail-style', true) : 'style1';
		get_template_part( 'loop/single-style/'.$format.'-'.$post_style );
	} else if ($format == 'gallery' ){
		$post_style = get_post_meta($id, 'gallery-post-detail-style', true) ? get_post_meta($id, 'gallery-post-detail-style', true) : 'style1';
		get_template_part( 'loop/single-style/'.$format.'-'.$post_style );
	} else if ($format == 'audio' ){
		$post_style = get_post_meta($id, 'audio-post-detail-style', true) ? get_post_meta($id, 'audio-post-detail-style', true) : 'style1';
		get_template_part( 'loop/single-style/'.$format.'-'.$post_style );
	} else {
		$post_style = get_post_meta($id, 'standard-post-detail-style', true) ? get_post_meta($id, 'standard-post-detail-style', true) : 'style1';
		get_template_part( 'loop/single-style/'.$post_style );
	}
get_footer(); ?>
