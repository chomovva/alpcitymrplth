<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<div <?php post_class( 'entry' ) ?> id="post-<?php the_ID(); ?>">

	<blockquote>

		<?php the_content(); ?>

		<cite>
			
			<?php if ( array_key_exists( 'author', $entry ) ) : ?>
				<span><?php echo $entry[ 'author' ]; ?>, </span>
			<?php endif; ?>
			
			<?php if ( array_key_exists( 'author', $entry ) ) : ?>
				<snap class="text-primary">Утепление</snap>
			<?php endif; ?>

			<br>

			<span class="star"></span> <span class="star"></span> <span class="star"></span> <span class="star"></span> <span class="star"></span>

		</cite>

	</blockquote>

</div>