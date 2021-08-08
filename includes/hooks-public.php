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