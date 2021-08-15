<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = get_theme_mod( 'homeabouttitle' );
$description = get_theme_mod( 'homeaboutdescription' );

$thumbnail_src = get_theme_mod( 'homeaboutthumbnailsrc' );
$thumbnail_id = 0;

if ( is_url( $thumbnail_src ) ) {
	$thumbnail_id = attachment_url_to_postid( removing_image_size_from_url( $thumbnail_src ) );
}


include get_theme_file_path( 'views/home-about.php' );