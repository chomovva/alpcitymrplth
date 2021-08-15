<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<section class="section section--shop mt-3 mb-3 pt-3 pb-3 shop slider" id="shop">
	<div class="container">
		<div class="row middle-xs mb-3">
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-5">

				<?php if ( isset( $title ) && ! empty( trim( $title ) ) ) : ?>
					<h2 id="shop-title"><?php echo $title; ?></h2>
				<?php endif; ?>

			</div>
			
			<div class="col-xs-8 col-sm-8 col-md-4 col-lg-4">
				<?php if ( isset( $permalink ) && is_url( $permalink ) && isset( $label ) && ! empty( trim( $label ) ) ) : ?>
					<a id="shop-permalink" class="btn btn-lg btn-primary" href="<?php echo esc_url( $permalink, null, 'display' ); ?>"><?php echo $label; ?></a>
				<?php endif; ?>
			</div>
			
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-3">
				<div class="controls">
					<button class="slider-button prev" id="shop-prev-button"><span class="sr-only"><?php _e( 'Предыдущая запись', ALPCITYMRPLTH_TEXTDOMAIN ); ?></span></button>
					<button class="slider-button next" id="shop-next-button"><span class="sr-only"><?php _e( 'Следующая запись', ALPCITYMRPLTH_TEXTDOMAIN ); ?></span></button>
				</div>
			</div>

		</div>

		<?php if ( isset( $content ) ) : ?>
			<div id="shop-content">
				<?php echo $content; ?>
			</div>
		<?php endif; ?>

	</div>
</section>