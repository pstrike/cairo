	<?php if ( has_post_format( 'image' )) : ?>
	<span class="format-button">
    <i class="fa fa-photo"></i>
  </span>

	<?php elseif( has_post_format( 'standard' )) :?>
	<span class="format-button">
    <i class="fa fa-photo"></i>
  </span>

	<?php elseif( has_post_format( 'video' )) :?>
	<span class="format-button">
    <i class="fa fa-youtube-play"></i>
  </span>

	<?php elseif( has_post_format( 'audio' )) :?>
	<span class="format-button">
    <i class="fa fa-volume-up"></i>
  </span>

	<?php elseif( has_post_format( 'gallery' )) :?>
	<span class="format-button">
    <i class="fa fa-file-image-o"></i>
  </span>
<?php endif ?>
