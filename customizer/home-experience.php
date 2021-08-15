<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_home_experience( $wp_customize ) {

	$wp_customize->add_section(
		ALPCITYMRPLTH_SLUG . '_home_experience',
		[
			'title'            => sprintf( '%s - %s', __( 'Главная страница', ALPCITYMRPLTH_TEXTDOMAIN ),  __( 'Опыт', ALPCITYMRPLTH_TEXTDOMAIN ) ),
			'priority'         => 40,
			'panel'            => 'template_parts',
		]
	); /**/

	$wp_customize->add_setting(
		'homeexperienceusedby',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'alpcitymrplth\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'homeexperienceusedby',
		[
			'section'           => ALPCITYMRPLTH_SLUG . '_home_experience',
			'label'             => __( 'Использовать секцию', ALPCITYMRPLTH_TEXTDOMAIN ),
			'type'              => 'checkbox',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homeexperienceusedby', [
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homeexperiencetitle',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homeexperiencetitle',
		[
			'section'           => ALPCITYMRPLTH_SLUG . '_home_experience',
			'label'             => __( 'Заголовок &lt;H2&gt;', ALPCITYMRPLTH_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homeexperiencetitle', [
		'selector'         => '#experience-title',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homeexperiencetitle' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homeexperience',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => function ( $data ) {
				$result = array_filter( array_map( function ( $value ) {
					return parse_only_allowed_args(
						[ 'usedby' => '', 'title' => '', 'value' => '' ],
						$value,
						[ 'alpcitymrplth\sanitize_checkbox', 'sanitize_text_field', 'absint' ]
					);
				}, json_decode( $data, true ) ) );
				return ( is_array( $result ) ) ? wp_json_encode( $result, JSON_UNESCAPED_UNICODE ) : '[]';
			},
		]
	);
	$wp_customize->add_control(
		new WP_Customize_Control_list(
			$wp_customize,
			'homeexperience',
			[
				'label'      => __( 'Список', ALPCITYMRPLTH_TEXTDOMAIN ),
				'section'    => ALPCITYMRPLTH_SLUG . '_home_experience',
				'type'       => 'list',
				'controls'   => [
					'value'      => [
						'type'     => 'text',
						'label'    => __( 'Значение', ALPCITYMRPLTH_TEXTDOMAIN ),
						'input_atts' => [
							'min'      => '1',
						],
					],
				],
			]
		)
	);
	$wp_customize->selective_refresh->add_partial( 'homeexperience', [
		'selector'         => '#experience-wrap',
		'render_callback'  => function () {
			return customizer_render_parts_element_by_id( 'parts/home', 'experience', [], 'experience-wrap' );
		},
		'container_inclusive' => true,
		'fallback_refresh' => true,
	] ); /**/

}

add_action( 'customize_register', 'alpcitymrplth\customizer_register_home_experience', 10, 1 );