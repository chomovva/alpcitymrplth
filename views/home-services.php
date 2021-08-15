<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<section class="section section--services services mt-3 mb-3 pt-3 pb-3" id="services">
	<div class="container">

		<?php if ( isset( $title ) && ! empty( trim( $title ) ) ) : ?>		
			<h2 class="mb-3" id="servies-title"><?php echo $title; ?></h2>
		<?php endif; ?>
		
		<?php if ( isset( $content ) ) : ?>
			<div id="services-wrap" class="row stratch-xs center-xs">
				<?php echo $content; ?>
			</div>
		<?php endif; ?>

	</div>
</section>