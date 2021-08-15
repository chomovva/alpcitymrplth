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

	 	// верхняя панель сайта
	 	'headerphone'                => '380688478820',

	 	// Главная страница - Первый экран
	 	'homejumbotrontitle'         => get_bloginfo( 'name', 'raw' ),
	 	'homejumbotronbtnlabel'      => 'и',
	 	'homejumbotronbtnhref'       => '',
	 	'homejumbotronexcerpt'       => get_bloginfo( 'description', 'raw' ),
	 	'homejumbotronbgisrc'        => '',

	 	// Главная страница - О нас
	 	'homeaboutusedby'            => true,
	 	'homeabouttitle'             => '',
	 	'homeaboutdescription'       => '',
	 	'homeaboutthumbnailsrc'      => '',

	 	// Главная страница - Опыт
	 	'homeexperienceusedby'       => true,
	 	'homeexperiencetitle'        => 'Опыт',
	 	'homeexperience'             => [],

	 	// Главная страница - Услуги
	 	'homeservicesusedby'         => true,
	 	'homeservicestitle'          => 'Чем мы занимаемся',
	 	'homeservices'               => [],

	 	// Главная страница - Заказать расчет
	 	'homeactionusedby'           => '',
	 	'homeactiontitle'            => '',
	 	'homeactionexcerpt'          => '',
	 	'homeactionbtnlabel'         => '',
	 	'homeactionbtnhref'          => '',

	 	// Главная страница - Магазин
	 	'homeshopusedby'             => true,
	 	'homeshoptitle'              => 'Магазин',
	 	'homeshopbtnlabel'           => 'Все товары',

	 	// Сайдбар подвала
	 	'asidephone'                 => '',
	 	'asideaddress'               => '',
	 	'asideemail'                 => '',
	 	'asidesocialfacebook'        => '',
	 	'asidesocialinstagram'       => '',

	 	// Подвал сайта
	 	'footercopyname'             => get_bloginfo( 'name', 'raw' ),

	 	// настройки шаблона Архива
	 	'archivetitleprefix'         => '',

	], $mods ) );
}

add_action( 'after_switch_theme', 'alpcitymrplth\setup_default_mods' );