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
		'error404'    => __( 'Меню страницы 404', ALPCITYMRPLTH_TEXTDOMAIN ),
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


/**
 * Добавляет дополнительные классы для элементов меню
 * */
function add_nav_menu_link_classes( $atts, $item, $args, $depth ) {
	if ( 'error404' == $args->menu ) {
		$atts['class'] = isset( $atts[ 'class' ] ) ? $atts[ 'class' ] . ' ' . $class : 'text-primary';
	}
	return $atts;
}

add_filter( 'nav_menu_link_attributes', 'alpcitymrplth\add_nav_menu_link_classes', 10, 4 );