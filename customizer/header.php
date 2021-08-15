<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_header( $wp_customize ) {

	$wp_customize->add_section(
		ALPCITYMRPLTH_SLUG . '_header',
		[
			'title'            =>  __( 'Верхняя панель', ALPCITYMRPLTH_TEXTDOMAIN ),
			'priority'         => 10,
			'panel'            => 'template_parts',
		]
	); /**/

	$wp_customize->add_setting(
		'headerphone',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'headerphone',
		[
			'section'           => ALPCITYMRPLTH_SLUG . '_header',
			'label'             => __( 'Номер телефона', ALPCITYMRPLTH_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'headerphone', [
		'selector'         => '#panel-phone',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'headerphone' ); },
		'fallback_refresh' => true,
	] ); /**/

}

add_action( 'customize_register', 'alpcitymrplth\customizer_register_header', 10, 1 );