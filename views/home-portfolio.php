<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<section class="section section--portfolio mt-3 mb-3 pt-3 pb-3 portfolio slider" id="portfolio">
	<div class="container">
		<div class="row middle-xs mb-3">

			<?php if ( isset( $title ) && ! empty( trim( $title ) ) ) : ?>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-5">
					<h2 id="portfolio-title"><?php echo $title; ?></h2>
				</div>
			<?php endif; ?>
			
			<div class="col-xs-8 col-sm-8 col-md-4 col-lg-4">
				<?php if ( isset( $permalink ) && is_url( $permalink ) && isset( $label ) && ! empty( trim( $label ) ) ) : ?>
					<a id="portfolio-permalink" class="btn btn-lg btn-primary" href="<?php echo esc_url( $permalink, null, 'display' ); ?>"><?php echo $label; ?></a>
				<?php endif; ?>
			</div>
			
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-3">
				<div class="controls">
					<button class="slider-button prev" id="portfolio-prev-button"><span class="sr-only"><?php _e( 'Предыдущая запись', ALPCITYMRPLTH_TEXTDOMAIN ); ?></span></button>
					<button class="slider-button next" id="portfolio-next-button"><span class="sr-only"><?php _e( 'Следующая запись', ALPCITYMRPLTH_TEXTDOMAIN ); ?></span></button>
				</div>
			</div>

		</div>

		<?php if ( isset( $content ) ) : ?>
			<div id="portfolio-content">
				<?php echo $content; ?>
			</div>
		<?php endif; ?>

	</div>
</section>