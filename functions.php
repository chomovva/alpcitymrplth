<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };


define( 'ALPCITYMRPLTH_URL', get_template_directory_uri() . '/' );
define( 'ALPCITYMRPLTH_DIR', get_template_directory() . '/' );
define( 'ALPCITYMRPLTH_TEXTDOMAIN', 'alpcitymrplth' );
define( 'ALPCITYMRPLTH_SLUG', 'alpcitymrplth' );


get_template_part( 'includes/textdomain' );
get_template_part( 'includes/theme-functions' );
get_template_part( 'includes/brand' );
get_template_part( 'includes/sidebars' );
get_template_part( 'includes/theme-supports' );
get_template_part( 'includes/menus' );


if ( function_exists( 'pll_register_string' ) && function_exists( 'pll__' ) ) {
	// get_template_part( 'pll/language-switcher' );
	// get_template_part( 'pll/register-strings' );
	// get_template_part( 'pll/translation-mods' );
}


if ( is_admin() ) {
	global $pagenow;
	if ( isset( $_GET[ 'activated' ] ) && $pagenow == 'themes.php' ) {
		get_template_part( 'includes/theme-activate' );
	}
	if ( ! wp_doing_ajax() ) {
		//
	}
} else {
	get_template_part( 'includes/hooks-public' );
	get_template_part( 'includes/lazyload.php' );
	get_template_part( 'includes/enqueue-public' );
	get_template_part( 'includes/search-result' );
}


if ( is_customize_preview() ) {
	get_template_part( 'includes/enqueue-customizer' );
	get_template_part( 'customizer/wp-customize-control-separator' );
	get_template_part( 'customizer/wp-customize-control-range' );
	get_template_part( 'customizer/wp-customize-control-list' );
	get_template_part( 'customizer/wp-customize-control-gallery' );
	get_template_part( 'customizer/wp-customize-control-tinymce-editor' );
	get_template_part( 'customizer/register-panels' );
	get_template_part( 'customizer/additional-scripts' );
	get_template_part( 'customizer/header' );
	get_template_part( 'customizer/modals' );
	get_template_part( 'customizer/home-jumbotron' );
	get_template_part( 'customizer/home-about' );
	get_template_part( 'customizer/home-experience' );
	get_template_part( 'customizer/home-services' );
	get_template_part( 'customizer/home-shop' );
	get_template_part( 'customizer/home-porfolio' );
	get_template_part( 'customizer/home-reviews' );
	get_template_part( 'customizer/home-action' );
	get_template_part( 'customizer/home-blog' );
	get_template_part( 'customizer/aside-basement' );
	get_template_part( 'customizer/footer' );
}