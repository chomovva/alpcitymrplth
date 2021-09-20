<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


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
					<button class="slider-button prev" id="reviews-prev-button">
						<span class="sr-only"><?php _e( 'Предыдущая запись', ALPCITYMRPLTH_TEXTDOMAIN ); ?></span>
					</button>
					<button class="slider-button next" id="reviews-next-button">
						<span class="sr-only"><?php _e( 'Следующая запись', ALPCITYMRPLTH_TEXTDOMAIN ); ?></span>
					</button>
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