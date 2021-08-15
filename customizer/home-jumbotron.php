<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_home_jumbotron( $wp_customize ) {

	$wp_customize->add_section(
		ALPCITYMRPLTH_SLUG . '_home_jumbotron',
		[
			'title'            => sprintf( '%s - %s', __( 'Главная страница', ALPCITYMRPLTH_TEXTDOMAIN ),  __( 'Первый экран', ALPCITYMRPLTH_TEXTDOMAIN ) ),
			'priority'         => 20,
			'panel'            => 'template_parts',
		]
	); /**/

	$wp_customize->add_setting(
		'homejumbotronusedby',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'alpcitymrplth\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'homejumbotronusedby',
		[
			'section'           => ALPCITYMRPLTH_SLUG . '_home_jumbotron',
			'label'             => __( 'Использовать секцию', ALPCITYMRPLTH_TEXTDOMAIN ),
			'type'              => 'checkbox',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homejumbotronusedby', [
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homejumbotrontitle',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homejumbotrontitle',
		[
			'section'           => ALPCITYMRPLTH_SLUG . '_home_jumbotron',
			'label'             => __( 'Заголовок &lt;H1&gt;', ALPCITYMRPLTH_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homejumbotrontitle', [
		'selector'         => '#jumbotron-title',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homejumbotrontitle' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homejumbotronbtnlabel',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homejumbotronbtnlabel',
		[
			'section'           => ALPCITYMRPLTH_SLUG . '_home_jumbotron',
			'label'             => __( 'Подпись кнопки;', ALPCITYMRPLTH_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homejumbotronbtnlabel', [
		'selector'         => '#jumbotron-permalink',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homejumbotronbtnlabel' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homejumbotronbtnhref',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homejumbotronbtnhref',
		[
			'section'           => ALPCITYMRPLTH_SLUG . '_home_jumbotron',
			'label'             => __( 'Атрибут HREF кнопки', ALPCITYMRPLTH_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homejumbotronbtnhref', [
		'selector'         => '#jumbotron-permalink',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homejumbotronbtnhref' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homejumbotronexcerpt',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_textarea_field',
		]
	);
	$wp_customize->add_control(
		'homejumbotronexcerpt',
		[
			'section'           => ALPCITYMRPLTH_SLUG . '_home_jumbotron',
			'label'             => __( 'Описание', ALPCITYMRPLTH_TEXTDOMAIN ),
			'type'              => 'textarea',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homejumbotronexcerpt', [
		'selector'         => '#jumbotron-excerpt',
		'render_callback'  => function () { return customizer_get_editor_theme_mod( 'homejumbotronexcerpt' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homejumbotronbgisrc',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'esc_url_raw',
		]
	);
	$wp_customize->add_control(
		new \WP_Customize_Image_Control(
			$wp_customize,
			'homejumbotronbgisrc',
			[
				'label'         => __( 'Превью', ALPCITYMRPLTH_TEXTDOMAIN ),
				'section'       => ALPCITYMRPLTH_SLUG . '_home_jumbotron',
				'settings'      => 'homejumbotronbgisrc',
			]
		)
	);
	$wp_customize->selective_refresh->add_partial( 'homejumbotronbgisrc', [
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

}

add_action( 'customize_register', 'alpcitymrplth\customizer_register_home_jumbotron', 10, 1 );