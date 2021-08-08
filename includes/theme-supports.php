<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function theme_supports() {
	add_theme_support( 'menus' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_filter( 'widget_text', 'do_shortcode' );
}

add_action( 'after_setup_theme', 'alpcitymrplth\theme_supports' );


/**
 * Возвращает список социальных сетей для кнопок "поделиться"
 * */
function get_list_of_social_networks( $items = [] ) {
	return array_merge( $items, [
		'facebook'  => __( 'Facebook', ALPCITYMRPLTH_TEXTDOMAIN ),
		'instagram' => __( 'instaram', ALPCITYMRPLTH_TEXTDOMAIN ),
	] );
}

add_filter( 'social_networks', 'alpcitymrplth\get_list_of_social_networks', 10, 1 );