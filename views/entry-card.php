<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<div <?php post_class( 'card' ) ?> id="post-<?php the_ID(); ?>">
	<a class="wrap" href="<?php the_pernalink(); ?>">
		<?php the_post_thumbnail( 'medium', '' ); ?>
		<div class="overlay">
			<h3 class="title"><?php the_title( '', '', true ); ?></h3>
			<?php the_excerpt(); ?>
		</div>
	</a>
</div>