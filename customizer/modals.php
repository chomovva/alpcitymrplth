<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_modals( $wp_customize ) {

	$wp_customize->add_section(
		ALPCITYMRPLTH_SLUG . '_modals',
		[
			'title'            => __( 'Модальные окна', ALPCITYMRPLTH_TEXTDOMAIN ),
			'priority'         => 70,
		]
	); /**/

	$wp_customize->add_setting(
		'modals',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => function ( $data ) {
				$result = array_filter( array_map( function ( $value ) {
					return parse_only_allowed_args(
						[ 'usedby' => '', 'title' => '', 'slug' => '', 'maxwidth' => 280, 'content' => '' ],
						$value,
						[ 'alpcitymrplth\sanitize_checkbox', 'sanitize_text_field', 'sanitize_key', 'absint', '' ]
					);
				}, json_decode( $data, true ) ) );
				return ( is_array( $result ) ) ? wp_json_encode( $result, JSON_UNESCAPED_UNICODE ) : '[]';
			},
		]
	);
	$wp_customize->add_control(
		new WP_Customize_Control_list(
			$wp_customize,
			'modals',
			[
				'label'      => __( 'Модальные окна', ALPCITYMRPLTH_TEXTDOMAIN ),
				'section'    => ALPCITYMRPLTH_SLUG . '_modals',
				'type'       => 'list',
				'controls'   => [
					'slug'  => [
						'type'     => 'text',
						'label'    => __( 'Идентификтаор (обязательное поле, только латинские символы без пробелов и знаков препинания)', ALPCITYMRPLTH_TEXTDOMAIN ),
					],
					'maxwidth' => [
						'type'     => 'number',
						'label'    => __( 'Максимальная ширина окна в PX', ALPCITYMRPLTH_TEXTDOMAIN ),
						'input_atts' => [ 'min' => 280 ],
					],
					'content'  => [
						'type'     => 'editor',
						'label'    => __( 'Содержимое', ALPCITYMRPLTH_TEXTDOMAIN ),
					],
				],
			]
		)
	);
	$wp_customize->selective_refresh->add_partial( 'homesteps', [
		'render_callback'  => '__retuurn_false',
		'fallback_refresh' => true,
	] ); /**/

}

add_action( 'customize_register', 'alpcitymrplth\customizer_register_modals', 10, 1 );