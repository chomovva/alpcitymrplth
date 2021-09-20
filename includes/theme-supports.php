<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function theme_supports() {
	add_theme_support( 'menus' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );
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


/**
 * Возвращает список таксономий для постов которых есть отдельный шаблон на странице терма
 * */
function get_taxonomy_template_names( $taxonomy_names = [] ) {
	return array_merge( $taxonomy_names, [ 'category' ] );
}

add_filter( 'taxonomy_template_names', 'alpcitymrplth\get_taxonomy_template_names', 10, 1 );


/**
 * Возвращает список шаблонов для постов на странице термов
 * */
function get_taxonomy_template_list( $template_names  = [] ) {
	return array_merge( $template_names, [
		'archive'   => __( 'Архив', ALPCITYMRPLTH_TEXTDOMAIN ),
		'portfolio' => __( 'Портфолио', ALPCITYMRPLTH_TEXTDOMAIN ),
		'catalog'   => __( 'Продукт', ALPCITYMRPLTH_TEXTDOMAIN ),
	] );
}

add_filter( 'taxonomy_template_list', 'alpcitymrplth\get_taxonomy_template_list', 10, 1 );


/**
 * Возвращает стандартный шаблон для постов на странице терма
 * */
function get_taxonomy_template_default( $template_name = '' ) {
	return 'archive';
}

add_filter( 'taxonomy_template_default', 'alpcitymrplth\get_taxonomy_template_default', 10, 1 );