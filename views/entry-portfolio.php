<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<div <?php post_class( 'card' ) ?> id="post-<?php the_ID(); ?>">
	<a class="wrap" href="<?php the_permalink(); ?>">
		<?php the_post_thumbnail( 'large', '' ); ?>
		<div class="overlay">
			<h3 class="title"><?php the_title( '', '', true ); ?></h3>
			<?php the_excerpt(); ?>
		</div>
	</a>
</div>