<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Загрузка "переводов"
 */
function load_textdomain() {
	load_theme_textdomain( ALPCITYMRPLTH_TEXTDOMAIN, ALPCITYMRPLTH_DIR . 'languages/' );
}
add_action( 'after_setup_theme', 'alpcitymrplth\load_textdomain' );
