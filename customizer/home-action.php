<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_home_action( $wp_customize ) {

	$wp_customize->add_section(
		ALPCITYMRPLTH_SLUG . '_home_action',
		[
			'title'            => sprintf( '%s - %s', __( 'Главная страница', ALPCITYMRPLTH_TEXTDOMAIN ),  __( 'Призыв', ALPCITYMRPLTH_TEXTDOMAIN ) ),
			'priority'         => 90,
			'panel'            => 'template_parts',
		]
	); /**/

	$wp_customize->add_setting(
		'homeactionusedby',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'alpcitymrplth\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'homeactionusedby',
		[
			'section'           => ALPCITYMRPLTH_SLUG . '_home_action',
			'label'             => __( 'Использовать секцию', ALPCITYMRPLTH_TEXTDOMAIN ),
			'type'              => 'checkbox',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homeactionusedby', [
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homeactiontitle',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homeactiontitle',
		[
			'section'           => ALPCITYMRPLTH_SLUG . '_home_action',
			'label'             => __( 'Заголовок &lt;H2&gt;', ALPCITYMRPLTH_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homeactiontitle', [
		'selector'         => '#action-title',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homeactiontitle' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homeactionexcerpt',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_textarea_field',
		]
	);
	$wp_customize->add_control(
		'homeactionexcerpt',
		[
			'section'           => ALPCITYMRPLTH_SLUG . '_home_action',
			'label'             => __( 'Подзаголовок', ALPCITYMRPLTH_TEXTDOMAIN ),
			'type'              => 'textarea',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homeactionexcerpt', [
		'selector'         => '#action-excerpt',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homeactionexcerpt' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homeactionbtnlabel',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homeactionbtnlabel',
		[
			'section'           => ALPCITYMRPLTH_SLUG . '_home_action',
			'label'             => __( 'Подпись кнопки;', ALPCITYMRPLTH_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homeactionbtnlabel', [
		'selector'         => '#action-permalink',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homeactionbtnlabel' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homeactionbtnhref',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homeactionbtnhref',
		[
			'section'           => ALPCITYMRPLTH_SLUG . '_home_action',
			'label'             => __( 'Атрибут HREF кнопки', ALPCITYMRPLTH_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homeactionbtnhref', [
		'selector'         => '#action-permalink',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homeactionbtnhref' ); },
		'fallback_refresh' => true,
	] ); /**/

}

add_action( 'customize_register', 'alpcitymrplth\customizer_register_home_action', 10, 1 );