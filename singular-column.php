<?php


namespace alpcitymrplth;


/*
	Template Name: Колонка (сайдбар)
	Template Post Type: post, page
*/



if ( ! defined( 'ABSPATH' ) ) { exit; };


if ( is_active_sidebar( 'column' ) ) :

	get_header();

	?>

		<div class="container">

			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
				
				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); include get_theme_file_path( 'views/entry-singular.php' ); endwhile; ?>

				<?php endif; ?>

			</div>

			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				
				<?php get_sidebar( 'column' ); ?>

			</div>


		</div>

	<?php

	get_footer();

else :

	include get_theme_file_path( 'singular.php' );

endif;