<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = get_theme_mod( 'homeservicestitle' );
$entries = get_theme_mod( 'homeservices' );
$content = '';

if ( is_string( $entries ) ) {
	$entries = json_decode( $entries, true );
}

if ( is_array( $entries ) && ! empty( $entries ) ) {
	ob_start();
	foreach ( $entries as $entry ) {
		include get_theme_file_path( 'views/entry-service.php' );
	}
	$content = ob_get_contents();
	ob_end_clean();
}

include get_theme_file_path( 'views/home-services.php' );