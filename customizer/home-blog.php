<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_home_blog( $wp_customize ) {

	$wp_customize->add_section(
		ALPCITYMRPLTH_SLUG . '_home_blog',
		[
			'title'            => sprintf( '%s - %s', __( 'Главная страница', ALPCITYMRPLTH_TEXTDOMAIN ),  __( 'Блог', ALPCITYMRPLTH_TEXTDOMAIN ) ),
			'priority'         => 100,
			'panel'            => 'template_parts',
		]
	); /**/

	$wp_customize->add_setting(
		'homeblogusedby',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'alpcitymrplth\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'homeblogusedby',
		[
			'section'           => ALPCITYMRPLTH_SLUG . '_home_blog',
			'label'             => __( 'Использовать секцию', ALPCITYMRPLTH_TEXTDOMAIN ),
			'type'              => 'checkbox',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homeblogusedby', [
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homeblogtitle',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homeblogtitle',
		[
			'section'           => ALPCITYMRPLTH_SLUG . '_home_blog',
			'label'             => __( 'Заголовок &lt;H2&gt;', ALPCITYMRPLTH_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homeblogtitle', [
		'selector'         => '#blog-title',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homeblogtitle' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homeblogcategoryid',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'absint',
		]
	);
	$wp_customize->add_control(
		'homeblogcategoryid',
		[
			'section'           => ALPCITYMRPLTH_SLUG . '_home_blog',
			'label'             => __( 'Категория', ALPCITYMRPLTH_TEXTDOMAIN ),
			'type'              => 'select',
			'choices'           => get_terms( [
				'taxonomy'   => 'category',
				'hide_empty' => false,
				'fields'     => 'id=>name',
			] ),
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homeblogcategoryid', [
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homeblogbtnlabel',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homeblogbtnlabel',
		[
			'section'           => ALPCITYMRPLTH_SLUG . '_home_blog',
			'label'             => __( 'Подпись кнопки', ALPCITYMRPLTH_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homeblogbtnlabel', [
		'selector'         => '#blog-permalink',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homeblogbtnlabel' ); },
		'fallback_refresh' => true,
	] ); /**/

}

add_action( 'customize_register', 'alpcitymrplth\customizer_register_home_blog', 10, 1 );