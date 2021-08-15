<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<section class="section section--about mt-3 mb-3 pt-3 pb-3 about" id="about">
	<div class="container">
		<div class="row middle-xs">

			<div class="col-xs-12 col-sm-6 col-md-5 col-lg-5 first-sm">

				<?php if ( isset( $title ) && ! empty( trim( $title ) ) ) : ?>
					<h2 class="mb-3" id="about-title"><?php echo $title; ?></h2>
				<?php endif; ?>
				
				<?php if ( isset( $description ) && ! empty( trim( $description ) ) ) : ?>
					<div class="mt-3 description" id="about-description">
						<?php echo $description; ?>
					</div>
				<?php endif; ?>

			</div>

			<?php if ( isset( $thumbnail_id ) && absint( $thumbnail_id ) && $thumbnail_id ) : ?>
				<div class="col-xs-12 col-sm-6 col-md-5 col-lg-6 col-lg-offset-1 text-xs-center first-xs">
					<?php echo wp_get_attachment_image( $thumbnail_id,  is_customize_preview() ? 'medium' : 'large', false, [ 'class' => 'thumbnail' ] ); ?>
				</div>
			<?php endif; ?>

		</div>
	</div>
</section>