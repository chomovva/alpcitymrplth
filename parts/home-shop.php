<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


global $post;


if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

	$title = get_theme_mod( 'homeshoptitle' );
	$label = get_theme_mod( 'homeshopbtnlabel' );
	$permalink = get_permalink( wc_get_page_id( 'shop' ) );
	$content = '';
	$entries = wc_get_products( [] );

	if ( is_array( $entries ) && ! empty( $entries ) ) {

		ob_start();
		
		foreach ( $entries as $entry ) {
			$post = $entry;
			setup_postdata( $post );
			include get_theme_file_path( 'views/entry-product.php' );
		}
	
		wp_reset_postdata();
	
		$content = ob_get_contents();

		ob_end_clean();

		wp_enqueue_script( 'slick' );
	
		add_action( 'get_footer', function () {
			wp_enqueue_style( 'slick' );
		}, 10, 0 );
	
		if ( file_exists( $init_shop_script_path = get_theme_file_path( 'scripts/init/home-shop.js' ) ) ) {
			wp_add_inline_script( 'slick', file_get_contents( $init_shop_script_path ), 'after' );
		}

		include get_theme_file_path( 'views/home-shop.php' );

	}

}