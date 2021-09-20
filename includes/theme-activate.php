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
	 	'homejumbotronusedby'        => false,
	 	'homejumbotrontitle'         => get_bloginfo( 'name', 'raw' ),
	 	'homejumbotronbtnlabel'      => '',
	 	'homejumbotronbtnhref'       => '#',
	 	'homejumbotronexcerpt'       => get_bloginfo( 'description', 'raw' ),
	 	'homejumbotronbgisrc'        => '',

	 	// Главная страница - О нас
	 	'homeaboutusedby'            => false,
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

	 	// Главная страница - Магазин
	 	'homeshopusedby'             => true,
	 	'homeshoptitle'              => 'Магазин',
	 	'homeshopbtnlabel'           => 'Все товары',

	 	// Главная страница - Портфолио
	 	'homeportfoliousedby'        => false,
	 	'homeportfoliotitle'         => '',
	 	'homeportfoliobtnlabel'      => '',
	 	'homeportfoliocategoryid'    => '',

	 	// Главная страница - Заказать расчет
	 	'homeactionusedby'           => '',
	 	'homeactiontitle'            => '',
	 	'homeactionexcerpt'          => '',
	 	'homeactionbtnlabel'         => '',
	 	'homeactionbtnhref'          => '#',

	 	// Главная страница - Отзывы
	 	'homereviewsusedby'          => false,
	 	'homereviewstitle'           => '',

	 	// Главная страница - Блог
	 	'homeblogusedby'             => '',
	 	'homeblogtitle'              => '',
	 	'homeblogbtnlabel'           => '',
	 	'homeblogcategoryid'         => '',

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

	 	// страница ошибки 404
	 	'error404title'              => 'Страница не найдена',
	 	'error404description'        => '',

	], $mods ) );
}

add_action( 'after_switch_theme', 'alpcitymrplth\setup_default_mods' );