<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_aside( $wp_customize ) {

	$wp_customize->add_section(
		ALPCITYMRPLTH_SLUG . '_aside_basement',
		[
			'title'            => __( 'Сайдбар подвала', ALPCITYMRPLTH_TEXTDOMAIN ),
			'description'      => __( 'Отображается в подвале сайта на всех страницах сайта', ALPCITYMRPLTH_TEXTDOMAIN ),
			'priority'         => 110,
			'panel'            => 'template_parts',
		]
	); /**/

	$wp_customize->add_setting(
		'asidephone',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'asidephone',
		[
			'section'           => ALPCITYMRPLTH_SLUG . '_aside_basement',
			'label'             => __( 'Номер телефона', ALPCITYMRPLTH_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'asidephone', [
		'selector'         => '#aside-phone',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'asidephone' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'asideaddress',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_textarea_field',
		]
	);
	$wp_customize->add_control(
		'asideaddress',
		[
			'section'           => ALPCITYMRPLTH_SLUG . '_aside_basement',
			'label'             => __( 'Адрес', ALPCITYMRPLTH_TEXTDOMAIN ),
			'type'              => 'textarea',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'asideaddress', [
		'selector'         => '#aside-address',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'asideaddress' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'asideemail',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_email',
		]
	);
	$wp_customize->add_control(
		'asideemail',
		[
			'section'           => ALPCITYMRPLTH_SLUG . '_aside_basement',
			'label'             => __( 'Email', ALPCITYMRPLTH_TEXTDOMAIN ),
			'type'              => 'email',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'asideemail', [
		'selector'         => '#aside-email',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'asideemail' ); },
		'fallback_refresh' => true,
	] ); /**/

	foreach ( apply_filters( 'social_networks', [] ) as $key => $label ) {
		$wp_customize->add_setting(
			'asidesocial' . $key,
			[
				'transport'         => 'postMessage',
				'sanitize_callback' => 'esc_url_raw',
			]
		);
		$wp_customize->add_control(
			'asidesocial' . $key,
			[
				'section'           => ALPCITYMRPLTH_SLUG . '_aside_basement',
				'label'             => $label,
				'type'              => 'url',
			]
		); /**/
		$wp_customize->selective_refresh->add_partial( 'asidesocial' . $key, [
			'selector'         => '#aside-socials',
			'render_callback'  => '__return_false',
			'fallback_refresh' => true,
		] ); /**/
	}

}

add_action( 'customize_register', 'alpcitymrplth\customizer_register_aside', 10, 1 );