<?php


namespace alpcitymrplth;


use WP_Post;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = get_theme_mod( 'homeblogtitle' );
$category_id = get_theme_mod( 'homeblogcategoryid' );
$label = get_theme_mod( 'homeblogbtnlabel' );
$sticky_posts = get_option( 'sticky_posts' );
$permalink = '';
$sticky = false;
$entries = false;


if ( $category_id ) {

	$permalink = get_category_link( $category_id );

	if ( is_array( $sticky_posts ) ) {
		if ( is_object_in_term( array_shift( $sticky_posts ), 'category', $category_id ) ) {
			$sticky = get_post( array_shift( $sticky_posts ), OBJECT, 'raw' );
		}
	}

	if ( ! $sticky || ! $sticky instanceof WP_Post ) {
		
		$sticky = get_posts( [
			'numberposts' => 1,
			'category'    => $category_id,
			'orderby'     => 'date',
			'order'       => 'DESC',
			'post_type'   => 'post',
			'suppress_filters' => false,
		] );

		if ( is_array( $sticky ) && ! empty( $sticky ) ) {
			
			$sticky = array_shift( $sticky );

		}

	}

	$entries = get_posts( [
		'numberposts' => 2,
		'category'    => $category_id,
		'orderby'     => 'date',
		'order'       => 'DESC',
		'exclude'     => $sticky instanceof WP_Post ? [ $sticky->ID ] : [],
		'post_type'   => 'post',
		'suppress_filters' => false,
	] );

	include get_theme_file_path( 'views/home-blog.php' );

}
