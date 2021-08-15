<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_home_shop( $wp_customize ) {

	$wp_customize->add_section(
		ALPCITYMRPLTH_SLUG . '_home_shop',
		[
			'title'            => sprintf( '%s - %s', __( 'Главная страница', ALPCITYMRPLTH_TEXTDOMAIN ),  __( 'Магазин', ALPCITYMRPLTH_TEXTDOMAIN ) ),
			'description'      => __( 'сеция отображается при наличии активированного WooCommerce', ALPCITYMRPLTH_TEXTDOMAIN ),
			'priority'         => 60,
			'panel'            => 'template_parts',
		]
	); /**/

	$wp_customize->add_setting(
		'homeshopusedby',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'alpcitymrplth\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'homeshopusedby',
		[
			'section'           => ALPCITYMRPLTH_SLUG . '_home_shop',
			'label'             => __( 'Использовать секцию', ALPCITYMRPLTH_TEXTDOMAIN ),
			'type'              => 'checkbox',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homeshopusedby', [
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homeshoptitle',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homeshoptitle',
		[
			'section'           => ALPCITYMRPLTH_SLUG . '_home_shop',
			'label'             => __( 'Заголовок &lt;H2&gt;', ALPCITYMRPLTH_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homeshoptitle', [
		'selector'         => '#shop-title',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homeshoptitle' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homeshopbtnlabel',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homeshopbtnlabel',
		[
			'section'           => ALPCITYMRPLTH_SLUG . '_home_shop',
			'label'             => __( 'Подпись кнопки &lt;H2&gt;', ALPCITYMRPLTH_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homeshopbtnlabel', [
		'selector'         => '#shop-permalink',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homeshopbtnlabel' ); },
		'fallback_refresh' => true,
	] ); /**/

}

add_action( 'customize_register', 'alpcitymrplth\customizer_register_home_shop', 10, 1 );