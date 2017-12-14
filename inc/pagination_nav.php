<?php
// ==========================================================================================
// Codepages Pagination Nav Function
// @package Cairo
// @author Codepages - Codepages
// @link http://themeforest.net/user/codepages/portfolio
// ==========================================================================================

if ( ! function_exists( 'cairo_content_nav' ) ) :

function cairo_content_nav( $nav_id ) {
	global $wp_query, $post;
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );
		if ( ! $next && ! $previous )
			return;
	}
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;
	$nav_class = ( is_single() ) ? 'post-navigation clearfix' : 'paging-navigation clearfix';
	?>

	<div class="<?php echo esc_attr($nav_class); ?>">
	<nav id="<?php echo esc_attr( $nav_id ); ?>">
		<?php if ( is_single() ) : ?>
			<ul class="post-nav">
				<?php previous_post_link( '<li class="nav-previous previous">%link</li>', '</p><span>'. esc_html__( 'Previous post', 'cairo' ) . '</span> %title' ); ?>
				<?php next_post_link( '<li class="nav-next next">%link</li>', '</p><span>'. esc_html__( 'Next post', 'cairo' ) . '</span> %title' ); ?>
			</ul>
		<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : ?>
			<ul id="pagination" class="pagination">
				<li class="nav-previous Read-More">
					<?php if ( get_next_posts_link() ) : ?>
					<?php next_posts_link( '<span>'. esc_html__( 'Older posts', 'cairo' ) . '</span><span><i class="fa fa-angle-left"></i></span>' ); ?>
					<?php endif; ?>
				</li>
				<li class="nav-next Read-More">
					<?php if ( get_previous_posts_link() ) : ?>
					<?php previous_posts_link( '<span>'. esc_html__( 'Newer posts', 'cairo' ) . '</span><span><i class="fa fa-angle-right"></i></span>' ); ?>
					<?php endif; ?>
				</li>
			</ul>
		<?php endif; ?>
	</nav>
	</div>
	<?php
}
endif;

/* Cairo Pagination */
if ( ! function_exists( 'cairo_pagination' ) ) {
	function cairo_pagination() {

			if( is_singular() )
				return;

			global $wp_query;

			if( $wp_query->max_num_pages <= 1 )
				return;

			$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
			$max   = intval( $wp_query->max_num_pages );

			if( $paged >= 1 )
				$links[] = $paged;

			if( $paged >= 3 ) {
				$links[] = $paged - 1;
				$links[] = $paged - 2;
			}

			if( ( $paged + 2 ) <= $max ) {
				$links[] = $paged + 2;
				$links[] = $paged + 1;
			}

			echo '<div class="pagination"><ul>' . "\n";

			if( get_previous_posts_link() )
			printf( '<li style="margin-right:3px;">' . get_previous_posts_link( '<span aria-hidden="true">&laquo;</span>' ) . '</li>' );

			if( ! in_array( 1, $links ) ) {
				$class = 1 == $paged ? ' class="active"' : '';

				printf( '<li%s><a class="page-numbers" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

				if( ! in_array( 2, $links ) )
					echo '<li><a href="" class="page-numbers">&middot;&middot;&middot;</a></li>';
			}

			sort( $links );
			foreach ( (array) $links as $link ) {
				$class = $paged == $link ? ' class="active"' : '';
				printf( '<li%s><a href="%s" class="page-numbers">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
			}

			if( ! in_array( $max, $links ) ) {
				if( ! in_array( $max - 1, $links ) )
					echo '<li><a href="" class="page-numbers">&middot;&middot;&middot;</a></li>' . "\n";

				$class = $paged == $max ? ' class="active"' : '';
				printf( '<li%s><a href="%s" class="page-numbers">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
			}

			if( get_next_posts_link() )
			printf( '<li>' . get_next_posts_link( '<span aria-hidden="true">&raquo;</span>' ) . '</li>' );

			echo '</ul></div>' . "\n";
	}
}
