<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<?php if ( isset( $entry ) && is_array( $entry ) && ! empty( $entry ) && array_key_exists( 'usedby', $entry ) && $entry[ 'usedby' ] ) : ?>

	<?php if ( array_key_exists( 'slug', $entry ) && ! empty( trim( $entry[ 'slug' ] ) ) ) : ?>
		<div
			id="<?php echo $entry[ 'slug' ] ?>"
			class="modal-<?php echo $entry[ 'slug' ] ?>"
			<?php if ( array_key_exists( 'maxwidth', $entry ) && is_numeric( $entry[ 'maxwidth' ] ) && $entry[ 'maxwidth' ] > 280 ) : ?>
				style="min-width: <?php echo $entry[ 'maxwidth' ]; ?>px;"
			<?php endif; ?>
		>
			<?php if ( array_key_exists( 'title', $entry ) && ! empty( trim( $entry[ 'title' ] ) ) ) : ?>
				<h2 class="text-center"><?php echo $entry[ 'title' ] ?></h2>
			<?php endif; ?>
			<?php if ( array_key_exists( 'content', $entry ) && ! empty( trim( $entry[ 'content' ] ) ) ) : echo do_shortcode( stripcslashes( $entry[ 'content' ] ), false ); endif; ?>
		</div>
	<?php endif; ?>

<?php endif; ?>