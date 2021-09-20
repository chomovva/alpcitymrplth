<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = trim( get_theme_mod( 'homejumbotrontitle' ) );
$excerpt = trim( get_theme_mod( 'homejumbotronexcerpt' ) );
$label = trim( get_theme_mod( 'homejumbotronbtnlabel' ) );
$permalink = trim( get_theme_mod( 'homejumbotronbtnhref' ) );
$bgi_src = get_theme_mod( 'homejumbotronbgisrc' );
$bgi_id = 0;

if ( is_url( $bgi_src ) ) {
	$bgi_id = attachment_url_to_postid( removing_image_size_from_url( $bgi_src ) );
}

include get_theme_file_path( 'views/home-jumbotron.php' );