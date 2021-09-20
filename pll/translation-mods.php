<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Перевод настроект блока главной "Опыт"
 * */
function translate_pll_home_experience_list( $value ) {
	return translate_list_strings( $value, [
		'title'                 => 'pll__',
	] );
}


/**
 * Перевод настроект блока главной "Опыт"
 * */
function translate_pll_home_services_list( $value ) {
	return translate_list_strings( $value, [
		'title'                 => 'pll__',
		'page_id'               => 'pll_get_post',
	] );
}


/**
 * перевод всех настроек
 * */
function add_translation_string_mods() {
	$mods = apply_filters( 'template_pll_theme_mod_translate', [
		'headerphone'            => 'pll__',
		'homejumbotrontitle'     => 'pll__',
		'homejumbotronbtnlabel'  => 'pll__',
		'homejumbotronbtnhref'   => 'pll__',
		'homejumbotronexcerpt'   => 'pll__',
		'homeabouttitle'         => 'pll__',
		'homeaboutdescription'   => 'pll__',
		'homeexperiencetitle'    => 'pll__',
		'homeexperience'         => 'alpcitymrplth\translate_pll_home_experience_list',
		'homeservicestitle'      => 'pll__',
		'homeservices'           => 'alpcitymrplth\translate_pll_home_services_list',
		'homeshoptitle'          => 'pll__',
		'homeshopbtnlabel'       => 'pll__',
		'homeportfoliotitle'     => 'pll__',
		'homeportfoliocategoryid' => 'pll_get_term',
		'homeactiontitle'        => 'pll__',
		'homeactionexcerpt'      => 'pll__',
		'homeactionbtnlabel'     => 'pll__',
		'homeactionbtnhref'      => 'pll__',
		'homereviewstitle'       => 'pll__',
		'homeblogtitle'          => 'pll__',
		'homeblogbtnlabel'       => 'pll__',
		'homeblogcategoryid'     => 'pll_get_term',
		'asidephone'             => 'pll__',
		'asideaddress'           => 'pll__',
		'asideemail'             => 'pll__',
		'asidesocialfacebook'    => 'pll__',
		'asidesocialinstagram'   => 'pll__',
		'footercopyname'         => 'pll__',
		'error404title'          => 'pll__',
		'error404description'    => 'pll__',
	] );
	foreach ( $mods as $name => $func ) {
		add_filter( 'theme_mod_' . $name, $func, 10, 1 );
	}
}

add_action( 'init', 'alpcitymrplth\add_translation_string_mods', 10, 0 );