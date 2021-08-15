<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_footer( $wp_customize ) {

	$wp_customize->add_section(
		ALPCITYMRPLTH_SLUG . '_home_footer',
		[
			'title'            => __( 'Подвал сайта', ALPCITYMRPLTH_TEXTDOMAIN ),
			'priority'         => 120,
			'panel'            => 'template_parts',
		]
	); /**/

	$wp_customize->add_setting(
		'footercopyname',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'footercopyname',
		[
			'section'           => ALPCITYMRPLTH_SLUG . '_home_footer',
			'label'             => __( 'Номер телефона', ALPCITYMRPLTH_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'footercopyname', [
		'selector'         => '#footer-copy-name',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'footercopyname' ); },
		'fallback_refresh' => true,
	] ); /**/

}

add_action( 'customize_register', 'alpcitymrplth\customizer_register_footer', 10, 1 );