<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


global $post;


get_header();


if (
	true
	&& $page_on_front_id = get_option( 'page_on_front' )
	&& is_object( $page_on_front = get_page( $page_on_front_id, OBJECT, 'raw' ) )
	&& ! is_wp_error( $page_on_front )
) {

	include get_theme_file_path( 'singular.php' );

} else {

	// выводим секции главной
	$sections_keys = apply_filters( 'home_section_list', [
		'jumbotron', 'about', 'experience', 'services', 'shop', 'portfolio', 'reviews', 'action', 'blog'
	] );

	if ( is_array( $sections_keys ) && ! empty( $sections_keys ) ) {

		foreach ( $sections_keys as $key ) {
			if ( get_theme_mod( 'home' . $key . 'usedby' ) ) {
				get_template_part( 'parts/home', $key );
			}
		}

	} else {

		include get_theme_file_path( 'archive.php' );

	}

}


get_footer();