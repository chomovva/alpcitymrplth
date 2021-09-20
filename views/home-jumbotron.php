<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<div class="section section--jumbotron jumbotron xy-center bg-primary mt-0" id="jumbotron">
	
	<?php
		if ( isset( $bgi_id ) && $bgi_id ) {
			echo wp_get_attachment_image( $bgi_id, wp_is_mobile() ? 'large' : 'full', false, [
				'id' => 'jumbotron-bgi',
				'class' => 'bgi'
			] );
		}
	?>
	
	<div class="container mt-3 mb-3">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-5 col-lg-5 col-sm-offset-2 col-md-offset-3 col-lg-offset-3">

				<?php if ( isset( $title ) && ! empty( $title ) ) : ?>
					<h1 class="title" id="jumbotron-title"><?php echo $title; ?></h1>
				<?php endif; ?>
				
				<?php if ( isset( $excerpt ) && ! empty( $excerpt ) ) : ?>
					<p class="excerpt" id="jumbotron-excerpt"><?php echo $excerpt; ?></p>
				<?php endif; ?>
				
				<?php if ( isset( $permalink ) && ! empty( $permalink ) && isset( $label ) && ! empty( $label ) ) : ?>
					<a class="permalink" id="jumbotron-permalink" href="<?php echo esc_attr( $permalink ); ?>"><?php echo esc_html( $label ); ?></a>
				<?php endif; ?>
				
			</div>
		</div>
	</div>
</div>