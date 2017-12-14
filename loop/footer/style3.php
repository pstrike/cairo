<?php
	$footer_dark_light 	= ot_get_option ('footer_dark_light', 'dark');
	$footer_style 			= ot_get_option('footer_style', 'style1');
?>

<footer class="main-footer <?php echo esc_attr($footer_dark_light);?> footer-<?php echo esc_attr($footer_style);?>">
	<div class="cairo_footer_instagram">
	<?php dynamic_sidebar("cairo_footer_instagram"); ?>
	</div>
	<div class="top_footer">
		<div class="container">
			<div class="row">
				<?php if(ot_get_option('footer_top_widget')=='on'):?>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="footer-top-widget">
						<?php get_template_part( 'loop/footer/footer-top-widget' ); ?>
					</div>
				</div>
				<?php else:
				endif; ?>

				<?php if(ot_get_option('advertising_footer')=='on'):?>
				<div class="footer_advs">
					<!-- Start Navbar Ads -->
					<div class="footer-banner-advs">
					<?php $footerad = ot_get_option('footer_banner');
						echo do_shortcode($footerad);
					?>
					</div>
					<!-- End Navbar Ads -->
				</div>
				<?php else:
				endif;?>

				<?php if(ot_get_option('footer_bottom_widget')=='on'):?>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="footer-bottom-widget">
						<?php get_template_part( 'loop/footer/footer-bottom-widget' ); ?>
					</div>
				</div>
				<?php else:
				endif;?>

			</div>
		</div>
	</div>
	<div class="bottom_footer">
		<div class="container">
			<div class="row">
				<div class="footer-nav">
					<div class="col-md-12 col-sm-12 com-xs-12">
						<div class="copyright text-center">
							<?php if (! ot_get_option('footercopyrgiht')): ?>
							<p>2017 ALL RIGHT RESERVED - CAIRO NEWS WORDPRESS THEME by CODEPAGES</p>
							<?php else : ?>
								<p><?php echo wp_kses_post(ot_get_option('footercopyrgiht'))?></p>
							<?php endif ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
