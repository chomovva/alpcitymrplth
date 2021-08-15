<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<div <?php post_class( [ 'product' ], null ); ?> id="post-<?php the_ID(); ?>">
	<a class="wrap" href="<?php the_permalink(); ?>">
		<?php the_post_thumbnail( 'medium' ); ?>
		<div class="overlay">
			<h3 class="title"><?php the_title( '', '', true ); ?></h3>
			<?php if ( has_excerpt() ) : the_excerpt(); endif; ?>
		</div>
	</a>
</div>