<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Добавляет опции темы по умолчанию при её активации
 **/
function setup_default_mods( $old_name ) {
	$theme_slug = get_option( 'stylesheet' );
	$mods = get_theme_mods();
	if ( ! is_array( $mods ) ) {
		$mods = [];
	}
	update_option( 'theme_mods_' . $theme_slug, array_merge( [

	 	// дополнительные скрипты
	 	'additionalscriptsheadstart' => '',
	 	'additionalscriptsheadend'   => '',
	 	'additionalscriptsbodystart' => '',
	 	'additionalscriptsbodyend'   => '',

	 	// админпанель
	 	'showadminbarstatus'         => true,

	 	// 


	 	// настройки шаблона Архива
	 	'archivetitleprefix'         => '',

	], $mods ) );
}

add_action( 'after_switch_theme', 'alpcitymrplth\setup_default_mods' );