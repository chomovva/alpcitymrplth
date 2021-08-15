<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<section class="section section--experience experience pt-3 pb-3 mb-3 mt-3 bg-primary" id="experience">
	<div class="container">

		<?php if ( isset( $title ) && ! empty( trim( $title ) ) ) : ?>
			<h2 class="hide" id="experience-title"><?php echo $title; ?></h2>
		<?php endif; ?>
		
		<div id="experience-wrap" class="row">
			<?php if ( isset( $content ) ) : echo $content; endif; ?>
		</div>

	</div>
</section>