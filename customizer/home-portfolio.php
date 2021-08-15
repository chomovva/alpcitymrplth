<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_home_portfolio( $wp_customize ) {

	$wp_customize->add_section(
		ALPCITYMRPLTH_SLUG . '_home_portfolio',
		[
			'title'            => sprintf( '%s - %s', __( 'Главная страница', ALPCITYMRPLTH_TEXTDOMAIN ),  __( 'Портфолио', ALPCITYMRPLTH_TEXTDOMAIN ) ),
			'priority'         => 70,
			'panel'            => 'template_parts',
		]
	); /**/

	$wp_customize->add_setting(
		'homeportfoliousedby',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'alpcitymrplth\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'homeportfoliousedby',
		[
			'section'           => ALPCITYMRPLTH_SLUG . '_home_portfolio',
			'label'             => __( 'Использовать секцию', ALPCITYMRPLTH_TEXTDOMAIN ),
			'type'              => 'checkbox',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homeportfoliousedby', [
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homeportfoliotitle',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homeportfoliotitle',
		[
			'section'           => ALPCITYMRPLTH_SLUG . '_home_portfolio',
			'label'             => __( 'Заголовок &lt;H2&gt;', ALPCITYMRPLTH_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homeportfoliotitle', [
		'selector'         => '#portfolio-title',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homeportfoliotitle' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homeportfoliobtnlabel',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homeportfoliobtnlabel',
		[
			'section'           => ALPCITYMRPLTH_SLUG . '_home_portfolio',
			'label'             => __( 'Подпись кнопки;', ALPCITYMRPLTH_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homeportfoliobtnlabel', [
		'selector'         => '#portfolio-permalink',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homeportfoliobtnlabel' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homeportfoliobtnhref',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homeportfoliobtnhref',
		[
			'section'           => ALPCITYMRPLTH_SLUG . '_home_portfolio',
			'label'             => __( 'Атрибут HREF кнопки', ALPCITYMRPLTH_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homeportfoliobtnhref', [
		'selector'         => '#portfolio-permalink',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homeportfoliobtnhref' ); },
		'fallback_refresh' => true,
	] ); /**/

	// выбор категории

}

add_action( 'customize_register', 'alpcitymrplth\customizer_register_home_portfolio', 10, 1 );