<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация "сайдбаров"
 */
function register_sidebars() {
	register_sidebar( [
		'name'             => __( 'Колонка', ALPCITYMRPLTH_TEXTDOMAIN ),
		'id'               => 'column',
		'description'      => __( 'Отображается на постоянных страницах и постах', ALPCITYMRPLTH_TEXTDOMAIN ),
		'class'            => '',
		'before_widget'    => '<div class="col-xs-12 col-sm-4 col-md-12 col-lg-12 mt-3 mb-3"><div id="%1$s" class="widget %2$s">',
		'after_widget'     => '</div></div>',
		'before_title'     => '<h3 class="widget__title">',
		'after_title'      => '</h3>',
	] );
	register_sidebar( [
		'name'             => __( 'Подвал', ALPCITYMRPLTH_TEXTDOMAIN ),
		'id'               => 'basement',
		'description'      => __( 'Отображается внизу сайта на всех страницах', ALPCITYMRPLTH_TEXTDOMAIN ),
		'class'            => '',
		'before_widget'    => '<div class="col-xs-12 col-sm-6 col-md"><div id="%1$s" class="widget %2$s">',
		'after_widget'     => '</div></div>',
		'before_title'     => '<h3 class="widget__title">',
		'after_title'      => '</h3>',
	] );
}

add_action( 'widgets_init', 'alpcitymrplth\register_sidebars' );