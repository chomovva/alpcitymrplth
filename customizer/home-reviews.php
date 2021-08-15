<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_home_reviews( $wp_customize ) {

	$wp_customize->add_section(
		ALPCITYMRPLTH_SLUG . '_home_reviews',
		[
			'title'            => sprintf( '%s - %s', __( 'Главная страница', ALPCITYMRPLTH_TEXTDOMAIN ),  __( 'Отзывы', ALPCITYMRPLTH_TEXTDOMAIN ) ),
			'priority'         => 80,
			'description'      => __( 'Блок отображается при включённом плагине Site Reviews.', ALPCITYMRPLTH_TEXTDOMAIN ),
			'panel'            => 'template_parts',
		]
	); /**/

	$wp_customize->add_setting(
		'homereviewsusedby',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'alpcitymrplth\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'homereviewsusedby',
		[
			'section'           => ALPCITYMRPLTH_SLUG . '_home_reviews',
			'label'             => __( 'Использовать секцию', ALPCITYMRPLTH_TEXTDOMAIN ),
			'type'              => 'checkbox',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homereviewsusedby', [
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homereviewstitle',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homereviewstitle',
		[
			'section'           => ALPCITYMRPLTH_SLUG . '_home_reviews',
			'label'             => __( 'Заголовок &lt;H2&gt;', ALPCITYMRPLTH_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homereviewstitle', [
		'selector'         => '#reviews-title',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homereviewstitle' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homereviewsbtnlabel',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homereviewsbtnlabel',
		[
			'section'           => ALPCITYMRPLTH_SLUG . '_home_reviews',
			'label'             => __( 'Подпись кнопки;', ALPCITYMRPLTH_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homereviewsbtnlabel', [
		'selector'         => '#reviews-permalink',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homereviewsbtnlabel' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homereviewsbtnhref',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homereviewsbtnhref',
		[
			'section'           => ALPCITYMRPLTH_SLUG . '_home_reviews',
			'label'             => __( 'Атрибут HREF кнопки', ALPCITYMRPLTH_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homereviewsbtnhref', [
		'selector'         => '#reviews-permalink',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homereviewsbtnhref' ); },
		'fallback_refresh' => true,
	] ); /**/

}

add_action( 'customize_register', 'alpcitymrplth\customizer_register_home_reviews', 10, 1 );