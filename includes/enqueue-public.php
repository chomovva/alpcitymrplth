<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Подключение скриптов
 *
 * @param string $handle Имя / идентификатор скрипта
 * @param string $src URL на файл скрипта
 * @param array $deps массив зависимостей
 * @param string|bool $ver версия
 * @param bool $in_footer подключать в шапке или подвале
 */
function scripts() {
	$suffix = ( SCRIPT_DEBUG ) ? '.min' : '';
	wp_enqueue_script( 'alpcitymrplth-public', get_theme_file_uri( "scripts/public{$suffix}.js" ), [ 'jquery', 'fancybox' ], filemtime( get_theme_file_path( "scripts/public{$suffix}.js" ) ), true );
	wp_enqueue_script( 'lazyload', get_theme_file_uri( "scripts/lazyload{$suffix}.js" ), [ 'jquery' ], '1.7.6', true );
	wp_enqueue_script( 'slick', get_theme_file_uri( "scripts/slick{$suffix}.js" ), [ 'jquery' ], '1.8.0', true );
	wp_enqueue_script( 'fancybox', get_theme_file_uri( "scripts/fancybox{$suffix}.js" ), [ 'jquery' ], '3.3.5', true );
	if ( file_exists( $init_gallery_script_path = get_theme_file_path( 'scripts/init/fancybox-gallery.js' ) ) ) {
		wp_add_inline_script( 'fancybox', file_get_contents( $init_gallery_script_path ), 'after' );
	}
	wp_add_inline_script( 'fancybox', "jQuery( '.fancybox' ).fancybox();", 'after' );
	wp_add_inline_script( 'lazyload', "jQuery( '[data-src]' ).lazy();", 'after' );
	wp_enqueue_script( 'superembed', get_theme_file_uri( "scripts/superembed{$suffix}.js" ), [ 'jquery' ], '3.1', true );
}

add_action( 'wp_enqueue_scripts', 'alpcitymrplth\scripts' );


/**
 * Добавляет предварительную загрузку шрифтов
 * */
function add_preload_resource() {
	foreach ( apply_filters( 'preload_resource_part', [
		//
	] ) as $file_path ) {
		$file_uri = get_theme_file_uri( $file_path );
		if ( $file_uri ) {
			echo '<link rel="preload" href="' . $file_uri . '" as="font" crossorigin="anonymous">';
		}
	}
}

add_action( 'head_start', 'alpcitymrplth\add_preload_resource' );


/**
 * Отключение стилей при выводе их в шапке, чтобы подкючить в подвале сайта
 */
function dequeue_style() {
	wp_dequeue_style( 'contact-form-7' );
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wpdiscuz-font-awesome' );
	wp_dequeue_style( 'wpdiscuz-frontend-css' );
	wp_dequeue_style( 'wpdiscuz-user-content-css' );
	wp_dequeue_style( 'exactmetrics-popular-posts-style-css' );
	wp_dequeue_style( 'tablepress-default-css' );
	wp_dequeue_style( 'site-reviews-css' );
}

add_action( 'wp_print_styles', 'alpcitymrplth\dequeue_style' );


/**
 * Подключение стилей
 *
 * @param string $handle Имя / идентификатор стиля
 * @param string $src URL на файла стиля
 * @param array $deps массив зависимостей
 * @param string|bool $ver версия
 * @param string $media для каких устройств подключать
 */
function print_styles() {
	$suffix = ( SCRIPT_DEBUG ) ? '' : '.min';
	wp_enqueue_style( 'alpcitymrplth-fonts', get_theme_file_uri( "styles/fonts{$suffix}.css" ), [], filemtime( get_theme_file_path( "styles/fonts{$suffix}.css" ) ), 'all' );
	wp_enqueue_style( 'alpcitymrplth-public', get_theme_file_uri( "styles/public{$suffix}.css" ), [], filemtime( get_theme_file_path( "styles/public{$suffix}.css" ) ), 'all' );
	wp_enqueue_style( 'slick', get_theme_file_uri( "styles/slick{$suffix}.css" ), [], '1.8.0', 'all' );
	wp_enqueue_style( 'fancybox', get_theme_file_uri( "styles/fancybox{$suffix}.css" ), [], '3.3.5', 'all' );
	wp_enqueue_style( 'contact-form-7' );
	wp_enqueue_style( 'wp-block-library' );
	wp_enqueue_style( 'wpdiscuz-font-awesome' );
	wp_enqueue_style( 'wpdiscuz-frontend-css' );
	wp_enqueue_style( 'wpdiscuz-user-content-css' );
	wp_enqueue_style( 'exactmetrics-popular-posts-style-css' );
	wp_enqueue_style( 'tablepress-default-css' );
	wp_enqueue_style( 'site-reviews-css' );
}
add_action( 'get_footer', 'alpcitymrplth\print_styles', 10, 0 );


/**
 * Подключение стилей инлайн для более быстрой отрисовки страницы
 * */
function ctitical_styles() {
	$suffix = ( SCRIPT_DEBUG ) ? '' : '.min';
	$critical_file_path = get_theme_file_path( "styles/critical{$suffix}.css" );
	if ( file_exists( $critical_file_path ) ) {
		echo '<style type="text/css">' . file_get_contents( $critical_file_path ) . '</style>';
	}
}
add_action( 'wp_head', 'alpcitymrplth\ctitical_styles', 10, 0 );