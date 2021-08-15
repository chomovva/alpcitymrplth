<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


get_header();


?>


<div class="container">
	
	<h1><?php the_archive_title( '', '' ); ?></h1>

	<?php get_template_part( 'parts/breadcrumbs', null ); ?>

	<?php the_archive_description( '', '' ); ?>

	<?php if ( have_posts() ) : ?>
	
		<h2 class="sr-only"><?php _e( 'Список постов', ALPCITYMRPLTH_TEXTDOMAIN ); ?></h2>

		<?php

			while ( have_posts() )  {
				the_post();
				include get_theme_file_path( 'views/entry-archive.php' );	
			}

			the_posts_pagination();

		?>

	<?php else : ?>

		<p><?php _e( 'Записи не найдены', ALPCITYMRPLTH_TEXTDOMAIN ); ?></p>

	<?php endif; ?>

</div>


<?php


get_footer();