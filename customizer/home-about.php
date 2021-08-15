<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_home_about( $wp_customize ) {

	$wp_customize->add_section(
		ALPCITYMRPLTH_SLUG . '_home_about',
		[
			'title'            => sprintf( '%s - %s', __( 'Главная страница', ALPCITYMRPLTH_TEXTDOMAIN ),  __( 'О нас', ALPCITYMRPLTH_TEXTDOMAIN ) ),
			'priority'         => 30,
			'panel'            => 'template_parts',
		]
	); /**/

	$wp_customize->add_setting(
		'homeaboutusedby',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'alpcitymrplth\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'homeaboutusedby',
		[
			'section'           => ALPCITYMRPLTH_SLUG . '_home_about',
			'label'             => __( 'Использовать секцию', ALPCITYMRPLTH_TEXTDOMAIN ),
			'type'              => 'checkbox',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homeaboutusedby', [
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homeabouttitle',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homeabouttitle',
		[
			'section'           => ALPCITYMRPLTH_SLUG . '_home_about',
			'label'             => __( 'Заголовок &lt;H2&gt;', ALPCITYMRPLTH_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homeabouttitle', [
		'selector'         => '#about-title',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homeabouttitle' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homeaboutdescription',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'wp_kses_post',
		]
	);
	$wp_customize->add_control(
		new WP_Customize_Control_Tinymce_Editor(
			$wp_customize,
			'homeaboutdescription',
			[
				'label'                 => __( 'Описание', ALPCITYMRPLTH_TEXTDOMAIN ),
				'section'               => ALPCITYMRPLTH_SLUG . '_home_about',
				'settings'              => 'homeaboutdescription'
			]
		)
	);
	$wp_customize->selective_refresh->add_partial( 'homeaboutdescription', [
		'selector'         => '#about-description',
		'render_callback'  => function () { return customizer_get_editor_theme_mod( 'homeaboutdescription' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homeaboutthumbnailsrc',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'esc_url_raw',
		]
	);
	$wp_customize->add_control(
		new \WP_Customize_Image_Control(
			$wp_customize,
			'homeaboutthumbnailsrc',
			[
				'label'         => __( 'Превью', ALPCITYMRPLTH_TEXTDOMAIN ),
				'section'       => ALPCITYMRPLTH_SLUG . '_home_about',
				'settings'      => 'homeaboutthumbnailsrc',
			]
		)
	);
	$wp_customize->selective_refresh->add_partial( 'homeaboutthumbnailsrc', [
		'selector'         => '#about-thumbnail',
		'render_callback'  => function () {
			return customizer_render_parts_element_by_id( 'parts/home', 'about', [], 'about-thumbnail' );
		},
		'container_inclusive' => true,
		'fallback_refresh' => true,
	] ); /**/

}

add_action( 'customize_register', 'alpcitymrplth\customizer_register_home_about', 10, 1 );