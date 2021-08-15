<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>

<?php if ( isset( $entry ) && is_array( $entry ) && ! empty( $entry ) && array_key_exists( 'usedby', $entry ) && $entry[ 'usedby' ] ) : ?>
	<?php if ( array_key_exists( 'page_id', $entry ) && absint( $entry[ 'page_id' ] ) && $entry[ 'page_id' ] ) : ?>
		<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
			<a class="entry" href="<?php echo get_permalink( $entry[ 'page_id' ], false ); ?>">
				<?php
					if ( array_key_exists( 'logo', $entry ) && is_array( $entry[ 'logo' ] ) && array_key_exists( 'id', $entry[ 'logo' ] ) ) {
						echo wp_get_attachment_image( $entry[ 'logo' ][ 'id' ], 'logo', false, [ 'class' => 'thumbnail' ] );
					}
				?>
				<?php if ( array_key_exists( 'title', $entry ) && ! empty( trim( $entry[ 'title' ] ) ) ) : ?>
					<strong class="title"><?php echo esc_html( $entry[ 'title' ] ); ?></strong>
				<?php endif; ?>
			</a>
		</div>
	<?php endif; ?>
<?php endif; ?>