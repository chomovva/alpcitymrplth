<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * 
 * */
function add_register_strings() {
	$strings = apply_filters( 'template_pll_register_strings', [
		'headerphone'            => false,
		'homejumbotrontitle'     => false,
		'homejumbotronbtnlabel'  => false,
		'homejumbotronbtnhref'   => false,
		'homejumbotronexcerpt'   => true,
		'homeabouttitle'         => false,
		'homeaboutdescription'   => true,
		'homeexperiencetitle'    => false,
		'homeservicestitle'      => false,
		'homeshoptitle'          => false,
		'homeshopbtnlabel'       => false,
		'homeportfoliotitle'     => false,
		'homeactiontitle'        => false,
		'homeactionexcerpt'      => true,
		'homeactionbtnlabel'     => false,
		'homeactionbtnhref'      => false,
		'homereviewstitle'       => false,
		'homeblogtitle'          => false,
		'homeblogbtnlabel'       => false,
		'asidephone'             => false,
		'asideaddress'           => true,
		'asideemail'             => false,
		'asidesocialfacebook'    => false,
		'asidesocialinstagram'   => false,
		'footercopyname'         => false,
		'error404title'          => false,
		'error404description'    => true,
	] );
	foreach ( $strings as $name => $multiline ) {
		$string = get_theme_mod( $name );
		if ( ! empty( $string ) ) {
			pll_register_string( $name, $string, ALPCITYMRPLTH_TEXTDOMAIN, $multiline );
		}
	}
}

add_action( 'init', 'alpcitymrplth\add_register_strings', 10, 0 );


/**
 * 
 * */
function add_register_strings_home_experience() {
	$homeexperience = get_theme_mod( 'homeexperience' );
	if ( is_string( $homeexperience ) ) {
		$homeexperience = json_decode( $homeexperience, true );
	}
	if ( is_array( $homeexperience ) && ! empty( $homeexperience ) ) {
		foreach ( $homeexperience as $index => $entry ) {
			foreach ( [
				'title'   => false,
			] as $key => $multiline ) {
				if ( array_key_exists( $key, $entry ) && is_string( $entry[ $key ] ) && ! empty( trim( $entry[ $key ] ) ) ) {
					pll_register_string( 'experience' . $index . $key, $entry[ $key ], ALPCITYMRPLTH_TEXTDOMAIN, $multiline );
				}
			}
		}
	}
}

add_action( 'init', 'alpcitymrplth\add_register_strings_home_experience', 10, 0 );


/**
 * 
 * */
function add_register_strings_home_services() {
	$homeservices = get_theme_mod( 'homeservices' );
	if ( is_string( $homeservices ) ) {
		$homeservices = json_decode( $homeservices, true );
	}
	if ( is_array( $homeservices ) && ! empty( $homeservices ) ) {
		foreach ( $homeservices as $index => $entry ) {
			foreach ( [
				'title'   => false,
			] as $key => $multiline ) {
				if ( array_key_exists( $key, $entry ) && is_string( $entry[ $key ] ) && ! empty( trim( $entry[ $key ] ) ) ) {
					pll_register_string( 'experience' . $index . $key, $entry[ $key ], ALPCITYMRPLTH_TEXTDOMAIN, $multiline );
				}
			}
		}
	}
}

add_action( 'init', 'alpcitymrplth\add_register_strings_home_services', 10, 0 );