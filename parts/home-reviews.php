<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };



$title = get_theme_mod( 'homeshoptitle' );
$label = get_theme_mod( 'homeshopbtnlabel' );
$permalink = get_permalink( woocommerce_get_page_id( 'shop' ) );
$content = '';
$entries = get_posts( [
	''
] );

if ( is_array( $entries ) && ! empty( $entries ) ) {

	ob_start();
	
	foreach ( $entries as $entry ) {
		$post = $entry;
		setup_postdata( $post );
		include get_theme_file_path( 'views/entry-blockquote.php' );
	}

	wp_reset_postdata();

	$content = ob_get_contents();

	ob_end_clean();

	wp_enqueue_script( 'slick' );

	add_action( 'get_footer', function () {
		wp_enqueue_style( 'slick' );
	}, 10, 0 );

	if ( file_exists( $init_shop_script_path = get_theme_file_path( 'scripts/init/home-reviews.js' ) ) ) {
		wp_add_inline_script( 'slick', file_get_contents( $init_shop_script_path ), 'after' );
	}

	include get_theme_file_path( 'views/home-reviews.php' );

}


?>


<section class="section section--reviews slider reviews" id="reviews">
	<div class="container">
		<div class="row middle-xs mb-3">

			<?php if ( isset( $title ) && ! empty( trim( $title ) ) ) : ?>
				<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
					<h2 id="reviews-title"><?php echo $title; ?></h2>
				</div>
			<?php endif; ?>
			
			<div class="col-xs-offset-8 col-sm-offset-0 col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<div class="controls">
					<button class="slider-button prev" id="reviews-prev-button"><span class="sr-only"><?php _e( 'Предыдущая запись', ALPCITYMRPLTH_TEXTDOMAIN ); ?></span></button>
					<button class="slider-button next" id="reviews-next-button"><span class="sr-only"><?php _e( 'Следующая запись', ALPCITYMRPLTH_TEXTDOMAIN ); ?></span></button>
				</div>
			</div>

		</div>
		
		<?php if ( isset( $content ) ) : ?>
			<div id="reviews-content">
				<?php echo $content; ?>
			</div>
		<?php endif; ?>

	</div>
</section>