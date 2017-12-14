<?php
// ==========================================================================================
// Codepages Search Forms Teamplate
// @package Cairo
// @author Codepages - Codepages
// @link http://themeforest.net/user/codepages/portfolio
// ==========================================================================================
?>

<form method="get" class="search-form" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="form-control" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php echo esc_html__( 'Search...', 'cairo' ); ?>">
	<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
</form>
