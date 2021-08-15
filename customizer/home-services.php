<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_home_services( $wp_customize ) {

	$wp_customize->add_section(
		ALPCITYMRPLTH_SLUG . '_home_services',
		[
			'title'            => sprintf( '%s - %s', __( 'Главная страница', ALPCITYMRPLTH_TEXTDOMAIN ),  __( 'Услуги', ALPCITYMRPLTH_TEXTDOMAIN ) ),
			'priority'         => 50,
			'panel'            => 'template_parts',
		]
	); /**/

	$wp_customize->add_setting(
		'homeservicesusedby',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'alpcitymrplth\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'homeservicesusedby',
		[
			'section'           => ALPCITYMRPLTH_SLUG . '_home_services',
			'label'             => __( 'Использовать секцию', ALPCITYMRPLTH_TEXTDOMAIN ),
			'type'              => 'checkbox',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homeservicesusedby', [
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homeservicestitle',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homeservicestitle',
		[
			'section'           => ALPCITYMRPLTH_SLUG . '_home_services',
			'label'             => __( 'Заголовок &lt;H2&gt;', ALPCITYMRPLTH_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homeservicestitle', [
		'selector'         => '#services-title',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homeservicestitle' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homeservices',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => function ( $data ) {
				$result = array_filter( array_map( function ( $value ) {
					return parse_only_allowed_args(
						[ 'usedby' => '', 'title' => '', 'logo' => [], 'page_id' => '' ],
						$value,
						[ 'alpcitymrplth\sanitize_checkbox', 'sanitize_text_field', 'alpcitymrplth\sanitize_attachment_data', 'absint' ]
					);
				}, json_decode( $data, true ) ) );
				return ( is_array( $result ) ) ? wp_json_encode( $result, JSON_UNESCAPED_UNICODE ) : '[]';
			},
		]
	);
	$wp_customize->add_control(
		new WP_Customize_Control_list(
			$wp_customize,
			'homeservices',
			[
				'label'      => __( 'Список', ALPCITYMRPLTH_TEXTDOMAIN ),
				'section'    => ALPCITYMRPLTH_SLUG . '_home_services',
				'type'       => 'list',
				'controls'   => [
					'logo'      => [
						'type'     => 'image',
						'label'    => __( 'Фото с соотношением сторон 1:1', ALPCITYMRPLTH_TEXTDOMAIN ),
					],
					'page_id' => [
						'type'     => 'entries',
						'label'    => __( 'Страница услуги', ALPCITYMRPLTH_TEXTDOMAIN ),
						'post_type' => 'pages',
					],
				],
			]
		)
	);
	$wp_customize->selective_refresh->add_partial( 'homeservices', [
		'selector'         => '#services-wrap',
		'render_callback'  => function () {
			return customizer_render_parts_element_by_id( 'parts/home', 'services', [], 'services-wrap' );
		},
		'container_inclusive' => true,
		'fallback_refresh' => true,
	] ); /**/

}

add_action( 'customize_register', 'alpcitymrplth\customizer_register_home_services', 10, 1 );