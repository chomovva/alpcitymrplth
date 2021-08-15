<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<?php if ( isset( $entry ) && is_array( $entry ) && ! empty( $entry ) && array_key_exists( 'usedby', $entry ) && $entry[ 'usedby' ] ) : ?>
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
		<strong class="entry text-xs-center mb-2 d-block">
			
			<?php if ( array_key_exists( 'value', $entry ) && absint( $entry[ 'value' ] ) ) : ?>
				<span class="d-block value h1"><?php echo number_format( $entry[ 'value' ], 0, ',', ' '); ?></span>
			<?php endif; ?>

			<?php if ( array_key_exists( 'title', $entry ) && ! empty( $entry[ 'title' ] ) ) : ?>
				<span class="d-block title"><?php echo esc_html( $entry[ 'title' ] ); ?></span>
			<?php endif; ?>

		</strong>
	</div>
<?php endif; ?>