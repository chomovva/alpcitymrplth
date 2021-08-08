<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_additional_scripts( $wp_customize ) {

	$wp_customize->add_section(
		ALPCITYMRPLTH_SLUG . '_additional_scripts',
		[
			'title'            => __( 'Дополнительные скрипты', ALPCITYMRPLTH_TEXTDOMAIN ),
			'priority'         => 70,
		]
	); /**/

	$wp_customize->add_setting(
		'additionalscriptsheadstart',
		[
			'transport'         => 'reset',
		]
	);
	$wp_customize->add_control(
		'additionalscriptsheadstart',
		[
			'section'           => ALPCITYMRPLTH_SLUG . '_additional_scripts',
			'label'             => __( 'Скрипты сразу после тега HEAD', ALPCITYMRPLTH_TEXTDOMAIN ),
			'type'              => 'textarea',
		]
	); /**/

	$wp_customize->add_setting(
		'additionalscriptsheadend',
		[
			'transport'         => 'reset',
		]
	);
	$wp_customize->add_control(
		'additionalscriptsheadend',
		[
			'section'           => ALPCITYMRPLTH_SLUG . '_additional_scripts',
			'label'             => __( 'Скрипты сразу перед закрывающим тегом HEAD', ALPCITYMRPLTH_TEXTDOMAIN ),
			'type'              => 'textarea',
		]
	); /**/

	$wp_customize->add_setting(
		'additionalscriptsbodystart',
		[
			'transport'         => 'reset',
		]
	);
	$wp_customize->add_control(
		'additionalscriptsbodystart',
		[
			'section'           => ALPCITYMRPLTH_SLUG . '_additional_scripts',
			'label'             => __( 'Скрипты сразу после тега BODY', ALPCITYMRPLTH_TEXTDOMAIN ),
			'type'              => 'textarea',
		]
	); /**/

	$wp_customize->add_setting(
		'additionalscriptsbodyend',
		[
			'transport'         => 'reset',
		]
	);
	$wp_customize->add_control(
		'additionalscriptsbodyend',
		[
			'section'           => ALPCITYMRPLTH_SLUG . '_additional_scripts',
			'label'             => __( 'Скрипты сразу перед закрывающим тегом BODY', ALPCITYMRPLTH_TEXTDOMAIN ),
			'type'              => 'textarea',
		]
	); /**/

}

add_action( 'customize_register', 'alpcitymrplth\customizer_register_additional_scripts', 10, 1 );