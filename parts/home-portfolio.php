<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


global $post;


$title = get_theme_mod( 'homeportfoliotitle' );
$label = get_theme_mod( 'homeportfoliobtnlabel' );
$permalink = '';
$category = get_theme_mod( 'homeportfoliocategoryid' );
$numberposts = get_theme_mod( 'homeportfolionumberposts', 2 );
$content = '';


if ( absint( $category ) ) {

	$permalink = get_category_link( $category );

	$entries = get_posts( [
		'numberposts' => $numberposts,
		'category'    => $category,
		'orderby'     => 'date',
		'order'       => 'DESC',
		'post_type'   => 'post',
		'suppress_filters' => true,
	] );

	if ( is_array( $entries ) && ! empty( $entries ) ) {
		
		ob_start();
		
		foreach ( $entries as $entry ) {
			$post = $entry;
			setup_postdata( $post );
			include get_theme_file_path( 'views/entry-portfolio.php' );
		}

		wp_reset_postdata();
		
		$content = ob_get_contents();
		
		ob_end_clean();

		wp_enqueue_script( 'slick' );
	
		add_action( 'get_footer', function () {
			wp_enqueue_style( 'slick' );
		}, 10, 0 );
	
		if ( file_exists( $init_portfolio_script_path = get_theme_file_path( 'scripts/init/home-portfolio.js' ) ) ) {
			wp_add_inline_script( 'slick', file_get_contents( $init_portfolio_script_path ), 'after' );
		}

		include get_theme_file_path( 'views/home-portfolio.php' );

	}

}