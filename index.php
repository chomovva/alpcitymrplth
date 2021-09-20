<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


get_header();


do_action( 'theme_container_before' );


?>
	
	<h1><?php the_archive_title( '', '' ); ?></h1>

	<?php get_template_part( 'parts/breadcrumbs', null ); ?>

	<?php the_archive_description( '', '' ); ?>

	<?php if ( have_posts() ) : ?>
	
		<h2 class="sr-only"><?php _e( 'Список постов', ALPCITYMRPLTH_TEXTDOMAIN ); ?></h2>

		<div class="row center-xs mb-3">

		<?php

			$selected_template = '';
			$template_list = apply_filters( 'taxonomy_template_list', [] );
			$queried_object = get_queried_object();

			if (
				true
				&& is_object( $queried_object )
				&& isset( $queried_object->term_id )
				&& isset( $queried_object->taxonomy )
				&& in_array( $queried_object->taxonomy, apply_filters( 'taxonomy_template_names', [] ) )
			) {
				$selected_template = get_term_meta( $queried_object->term_id, 'posts_template', true );
			}

			if ( empty( $selected_template ) || ! array_key_exists( $selected_template, $template_list ) ) {
				$selected_template = apply_filters( 'taxonomy_template_default', '' );
			}


			while ( have_posts() )  {
				the_post();
				include get_theme_file_path( 'views/entry-' . $selected_template . '.php' );	
			}

			the_posts_pagination();

		?>

		</div>

	<?php else : ?>

		<p><?php _e( 'Записи не найдены', ALPCITYMRPLTH_TEXTDOMAIN ); ?></p>

	<?php endif; ?>


<?php


do_action( 'theme_container_after' );


get_footer();