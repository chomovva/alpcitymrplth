<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


get_header();


do_action( 'theme_container_before' );


$title = trim( get_theme_mod( 'error404title' ) );
$description = trim( get_theme_mod( 'error404description' ) );


?>


<div class="row center-xs middle-xs pt-3 pb-3">

	<div class="col-xs-8 col-sm-6 col-md-4 col-lg-4">
		<img
			class="logo lazy center-block"
			src="<?php echo esc_attr( get_theme_file_uri( 'images/error404.png' ) ); ?>"
			alt="<?php esc_attr_e( 'Страница не найдена', ALPCITYMRPLTH_TEXTDOMAIN ); ?>"
			loading="lazy"
		/>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-8 col-lg-8">
		
		<?php if ( ! empty( $title ) ) : ?>
			<h1 id="error404-title" class="title"><?php echo $title; ?></h1>
		<?php endif; ?>
		
		<?php
			wp_nav_menu( [
				'theme_location'  => 'error404',
				'menu'            => 'error404',
				'container'       => false,
				'menu_id'         => 'error404-nav',
				'menu_class'      => 'list-inline mb-3 mt-3',
				'echo'            => true,
				'depth'           => 1,
				'fallback_cb'     => '__return_empty_string',
			] );
		?>
		
		<?php if ( ! empty( $description ) ) : ?>
			<div id="error404-description"><?php echo $description; ?></div>
		<?php endif; ?>
		
		<p class="mt-3">
			<a class="btn btn-primary" href="<?php echo home_url( '/', null ); ?>">
				<?php _e( 'Вернуться на главную', ALPCITYMRPLTH_TEXTDOMAIN ); ?>
			</a>
		</p>

	</div>
</div>


<?php


do_action( 'theme_container_after' );


get_footer();