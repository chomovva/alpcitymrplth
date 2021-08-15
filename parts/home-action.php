<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = trim( get_theme_mod( 'homeactiontitle' ) );
$excerpt = trim( get_theme_mod( 'homeactionexcerpt' ) );
$label = trim( get_theme_mod( 'homeactionbtnlabel' ) );
$permalink = trim( get_theme_mod( 'homeactionbtnhref' ) );


include get_theme_file_path( 'views/home-action.php' );