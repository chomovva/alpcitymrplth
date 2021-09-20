<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}


do_action( 'woocommerce_before_shop_loop_item' );

include get_theme_file_path( 'views/entry-catalog.php' );

do_action( 'woocommerce_after_shop_loop_item' );
