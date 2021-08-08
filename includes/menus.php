<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация меню
 */
function register_theme_nav_menus() {
	register_nav_menus( [
		'main'        => __( 'Главное меню', ALPCITYMRPLTH_TEXTDOMAIN ),
		'mobile'      => __( 'Мобильное меню', ALPCITYMRPLTH_TEXTDOMAIN ),
	] );
}

add_action( 'after_setup_theme', 'alpcitymrplth\register_theme_nav_menus' );


/**
 * Добавляет класс к родительским пунктам меню
 */
function add_class_to_parent_menu_item( $items ) {
	foreach( $items as $item ) {
		if ( is_nav_has_sub_menu( $item->ID, $items ) ) {
			$item->classes[] = 'has-sub-menu';
		}
	}
	return $items;
}

add_filter( 'wp_nav_menu_objects', 'alpcitymrplth\add_class_to_parent_menu_item' );