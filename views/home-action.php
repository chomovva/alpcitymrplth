<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<section class="section section--action mt-3 mb-3 pt-3 pb-3 bg-primary action" id="action">
	<div class="container">
		<div class="row middle-xs">
			<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 text-xs-center text-sm-left">

				<?php if ( isset( $title ) && ! empty( $title ) ) : ?>
					<h2 id="action-title"><?php echo $title; ?></h2>
				<?php endif; ?>
				
				<?php if ( isset( $excerpt ) && ! empty( $excerpt ) ) : ?>
					<p id="action-excerpt"><?php echo $excerpt; ?></p>
				<?php endif; ?>

			</div>

			<?php if ( isset( $label ) && ! empty( $label ) && isset( $permalink ) && ! empty( $permalink ) ) : ?>
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-xs-center text-sm-right mt-2 mb-1">
					<a id="action-permalink" class="permalink" href="<?php echo esc_attr( $permalink ); ?>"><?php echo $label; ?></a>
				</div>
			<?php endif; ?>

		</div>
	</div>
</section>