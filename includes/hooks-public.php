<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Выводит доп скрипты сразу посте тега HEAD
 * */
function add_additional_scripts_head_start() {
	echo get_theme_mod( 'additionalscriptsheadstart' );
}

add_action( 'body_start', 'alpcitymrplth\add_additional_scripts_head_start', 10, 0 );


/**
 * Выводит доп скрипты перед закрывающим тегом HEAD
 * */
function add_additional_scripts_head_end() {
	echo get_theme_mod( 'additionalscriptsheadend' );
}

add_action( 'body_end', 'alpcitymrplth\add_additional_scripts_head_end', 10, 0 );


/**
 * Выводит доп скрипты сразу посте тега BODY
 * */
function add_additional_scripts_body_start() {
	echo get_theme_mod( 'additionalscriptsbodystart' );
}

add_action( 'body_start', 'alpcitymrplth\add_additional_scripts_body_start', 10, 0 );


/**
 * Выводит доп скрипты перед закрывающим тегом BODY
 * */
function add_additional_scripts_body_end() {
	echo get_theme_mod( 'additionalscriptsbodyend' );
}

add_action( 'body_end', 'alpcitymrplth\add_additional_scripts_body_end', 10, 0 );


/**
 * Устанавливает префикс для архивов
 * */
function get_custom_archive_title_prefix( $prefix ){
	return get_theme_mod( 'archivetitleprefix' );
}

add_filter( 'get_the_archive_title_prefix', 'alpcitymrplth\get_custom_archive_title_prefix' );


/**
 * Добавляет обёртку для основного контента
 * */
function add_theme_container_wrap_start() {
	include get_theme_file_path( 'views/container-before.php' );
}

add_action( 'theme_container_before', 'alpcitymrplth\add_theme_container_wrap_start', 10, 0 );


/**
 * Закрывает обёртку для основного контента
 * */
function add_theme_container_wrap_end() {
	include get_theme_file_path( 'views/container-after.php' );
}

add_action( 'theme_container_after', 'alpcitymrplth\add_theme_container_wrap_end', 10, 0 );


/**
 * добавляет классы для кастомных шаблонов вывода постов
 * */
function add_body_class_taxonomy_template( $classes, $class ) {
	$queried_object = get_queried_object();
	if (
		true
		&& is_object( $queried_object )
		&& isset( $queried_object->term_id )
		&& isset( $queried_object->taxonomy )
		&& in_array( $queried_object->taxonomy, apply_filters( 'taxonomy_template_names', [] ) )
	) {
		$template_list = apply_filters( 'taxonomy_template_list', [] );
		$selected_template = get_term_meta( $queried_object->term_id, 'posts_template', true );
		$default_template = apply_filters( 'taxonomy_template_default', '' );
		if ( array_key_exists( $selected_template, $template_list ) && $selected_template != $default_template ) {
			array_push( $classes, $selected_template );
		}
	}
	return $classes;
}

add_filter( 'body_class', 'alpcitymrplth\add_body_class_taxonomy_template', 10, 2 );