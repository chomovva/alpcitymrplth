<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Плитка каталога
 * */

remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );


/**
 * Каталог
 * */
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
add_action( 'woocommerce_archive_description', 'woocommerce_breadcrumb', 20 );
add_action( 'woocommerce_before_main_content', 'alpcitymrplth\add_theme_container_wrap_start', 10, 0 );
add_action( 'woocommerce_after_main_content', 'alpcitymrplth\add_theme_container_wrap_end', 10, 0 );


/**
 * 
 * */
function add_shop_body_class( $classes, $class ) {
	if ( is_shop() ) {
		array_push( $classes, 'catalog' );
	}
	return $classes;
}

add_action( 'body_class', 'alpcitymrplth\add_shop_body_class', 10, 2 );


/**
 * 
 * */
function add_part_shop_controls() {
	get_template_part( 'parts/shop-controls' );
}

add_action( 'woocommerce_before_shop_loop', 'alpcitymrplth\add_part_shop_controls', 20 );


/**
 * 
 * */
function change_quantity_input_classes( $classes, $product ) {
	return [ 'form-control', 'control-lg', 'mt-2' ];
}

add_filter( 'woocommerce_quantity_input_classes', 'alpcitymrplth\change_quantity_input_classes', 20, 2 );


function qwerqwer( $classes, $endpoint ) {
	if ( in_array( 'is-active', $classes ) ) {
		array_push( $classes, 'font-weight-bold' );
		array_push( $classes, 'text-primary' );
		array_push( $classes, 'lead' );
	}
	return $classes;
}

add_filter( 'woocommerce_account_menu_item_classes', 'alpcitymrplth\qwerqwer', 10, 2 );


function customizer_deregister_woocommerce_settings( $wp_customize ) {
	$wp_customize->remove_setting( 'woocommerce_catalog_columns' );
	$wp_customize->remove_setting( 'woocommerce_catalog_rows' );
	$wp_customize->remove_control( 'woocommerce_catalog_columns' );
	$wp_customize->remove_control( 'woocommerce_catalog_rows' );
}

add_action( 'customize_register', 'alpcitymrplth\customizer_deregister_woocommerce_settings', 20, 1 );